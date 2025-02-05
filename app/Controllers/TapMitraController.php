<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TapMitraModel;

class TapMitraController extends BaseController
{
    public function tap_mitra()
    {
        if (!session()->get('logged_in')) 
        {
            return redirect()->to('/login')->send();
        } else {
            return view('tap_mitra_view');
        }
    }

    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
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

        echo '<option value="">Pilih Mitra</option>';
        foreach ($data as $row) {
            echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
        }
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
            'region' => 'required|min_length[5]',
            'branch' => 'required|min_length[5]',
            'cluster' => 'required|min_length[5]',
            'city' => 'required|min_length[5]',
            'mitra' => 'required|min_length[5]',
            'nama_tap' => 'required|min_length[5]',
            'alamat' => 'required|min_length[5]',
            'foto_1' => 'uploaded[foto_1]|is_image[foto_1]|max_size[foto_1,5120]',
            'foto_2' => 'uploaded[foto_2]|is_image[foto_2]|max_size[foto_2,5120]',
            'foto_3' => 'uploaded[foto_3]|is_image[foto_3]|max_size[foto_3,5120]',
            'foto_4' => 'uploaded[foto_4]|is_image[foto_4]|max_size[foto_4,5120]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        $mitraModel = new TapMitraModel();

        // Handling file uploads
        $uploadedFiles = [];
        foreach (["foto_1", "foto_2", "foto_3", "foto_4"] as $fileKey) {
            $file = $this->request->getFile($fileKey);
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads/mitra', $newName);
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

        return redirect()->to(base_url('tap_mitra'))->with('success', 'Data successfully saved');
    }
}
