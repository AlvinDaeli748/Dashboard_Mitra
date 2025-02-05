<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TapMitraModel;

class TapMitraController extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();

        // Check if user is logged in for all functions
        if (!session()->get('logged_in')) {
            header('Location: ' . base_url('/login'));
            exit;
        }
    }

    public function tap_mitra()
    {
        $query = $this->db->table('data_tap')
                          ->select('*')
                          ->orderBy('created_at', 'DESC')
                          ->get();
        $data['dataTAPMitra'] = $query->getResult();

        return view('tap_mitra_view', $data);
    }


    public function getBranches()
    {
        $region = $this->request->getPost('region');
        $query = $this->db->table('territory_reference')
                          ->select('DISTINCT(BRANCH) AS branch')
                          ->where('REGIONAL', $region)
                          ->orderBy('BRANCH', 'ASC')
                          ->get();
        $data = $query->getResultArray();

        echo '<option value="">Pilih Branch</option>';
        foreach ($data as $row) {
            echo '<option value="' . $row['branch'] . '">' . $row['branch'] . '</option>';
        }
    }

    public function getClusters()
    {
        $branch = $this->request->getPost('branch');
        $query = $this->db->table('territory_reference')
                          ->select('DISTINCT(CLUSTER_NAME_1) AS cluster')
                          ->where('BRANCH', $branch)
                          ->orderBy('CLUSTER_NAME_1', 'ASC')
                          ->get();
        $data = $query->getResultArray();

        echo '<option value="">Pilih Cluster</option>';
        foreach ($data as $row) {
            echo '<option value="' . $row['cluster'] . '">' . $row['cluster'] . '</option>';
        }
    }

    public function getCities()
    {
        $cluster = $this->request->getPost('cluster');
        $query = $this->db->table('territory_reference')
                          ->select('DISTINCT(KABUPATEN) AS city')
                          ->where('CLUSTER_NAME_1', $cluster)
                          ->orderBy('KABUPATEN', 'ASC')
                          ->get();
        $data = $query->getResultArray();

        echo '<option value="">Pilih City</option>';
        foreach ($data as $row) {
            echo '<option value="' . $row['city'] . '">' . $row['city'] . '</option>';
        }
    }

    public function getMitras()
    {
        $city = $this->request->getPost('city');

        $query = $this->db->table('territory_reference')
                        ->select('DISTINCT(COMPANY_NAME) AS name')
                        ->where('KABUPATEN', $city)
                        ->orderBy('COMPANY_NAME', 'ASC')
                        ->get();

        $data = $query->getResultArray();

        // $options = '<option value="">Pilih Mitra</option>';
        $autoSelectMitra = '';

        foreach ($data as $row) {
            $options = '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
            
            // Auto-select first Mitra if available
            if (!$autoSelectMitra) {
                $autoSelectMitra = $row['name'];
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'mitraOptions' => $options,
            'autoSelectMitra' => $autoSelectMitra
        ]);
    }


    public function getNamaTAP()
    {
        $region = $this->request->getPost('region');
        $branch = $this->request->getPost('branch');
        $cluster = $this->request->getPost('cluster');
        $city = $this->request->getPost('city');
        $mitra = $this->request->getPost('mitra');

        // Ensure city is fetched correctly
        if (!$city) {
            echo json_encode(['options' => '<option value="">City not found</option>', 'autoFill' => '']);
            return;
        }

        // Generate base TAP name
        $baseTAPName = "TAP " . $city;
        $finalTAPName = $baseTAPName;
        $counter = 1;

        // Check for duplicates in `data_tap`
        while ($this->db->table('data_tap')->where('nama_tap', $finalTAPName)->countAllResults() > 0) {
            $finalTAPName = $baseTAPName . " [" . $counter . "]";
            $counter++;
        }

        // Generate dropdown option
        $options = '<option value="' . $finalTAPName . '" selected>' . $finalTAPName . '</option>';

        echo json_encode([
            'options' => $options,
            'autoFill' => $finalTAPName
        ]);
    }

    public function save()
    {
        $validationRules = [
            'region' => 'required',
            'branch' => 'required',
            'cluster' => 'required',
            'city' => 'required',
            'mitra' => 'required',
            'nama_tap' => 'required',
            'alamat' => 'required|min_length[5]|regex_match[/^[a-zA-Z0-9\s.,\/\-\()]+$/]',
            'foto_1' => 'uploaded[foto_1]|is_image[foto_1]|max_size[foto_1,2048]',
            'foto_2' => 'uploaded[foto_2]|is_image[foto_2]|max_size[foto_2,2048]',
            'foto_3' => 'uploaded[foto_3]|is_image[foto_3]|max_size[foto_3,2048]',
            'foto_4' => 'uploaded[foto_4]|is_image[foto_4]|max_size[foto_4,2048]',
        ];
        
        $customErrors = [
            'foto_1' => [
                'uploaded' => 'Fascade Depan harus diunggah.',
                'is_image' => 'Fascade Depan harus berupa gambar.',
                'max_size' => 'Fascade Depan tidak boleh lebih dari 2MB.',
            ],
            'foto_2' => [
                'uploaded' => 'Ruang Receptionist harus diunggah.',
                'is_image' => 'Ruang Receptionist harus berupa gambar.',
                'max_size' => 'Ruang Receptionist tidak boleh lebih dari 2MB.',
            ],
            'foto_3' => [
                'uploaded' => 'WH harus diunggah.',
                'is_image' => 'WH harus berupa gambar.',
                'max_size' => 'WH tidak boleh lebih dari 2MB.',
            ],
            'foto_4' => [
                'uploaded' => 'Meeting Room harus diunggah.',
                'is_image' => 'Meeting Room harus berupa gambar.',
                'max_size' => 'Meeting Room tidak boleh lebih dari 2MB.',
            ],
        ];
        
        if (!$this->validate($validationRules, $customErrors)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }
        

        $mitraModel = new TapMitraModel();

        // Handling file uploads
        $uploadedFiles = [];
        foreach (["foto_1", "foto_2", "foto_3", "foto_4"] as $fileKey) {
            $file = $this->request->getFile($fileKey);
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'uploads/mitra', $newName);
                $uploadedFiles[$fileKey] = $newName;
            }
        }

        // Save data to database
        $mitraModel->save([
            'region' => $this->request->getPost('region'),
            'branch' => $this->request->getPost('branch'),
            'cluster' => $this->request->getPost('cluster'),
            'city' => $this->request->getPost('city'),
            'mitra' => $this->request->getPost('mitra'),
            'nama_tap' => $this->request->getPost('nama_tap'),
            'alamat' => $this->request->getPost('alamat'),
            'foto_1' => $uploadedFiles['foto_1'] ?? null,
            'foto_2' => $uploadedFiles['foto_2'] ?? null,
            'foto_3' => $uploadedFiles['foto_3'] ?? null,
            'foto_4' => $uploadedFiles['foto_4'] ?? null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('tap_mitra'))->with('success', 'Data berhasil disimpan.');
    }
}
