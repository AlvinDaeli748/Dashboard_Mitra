<?php

namespace App\Models;

use CodeIgniter\Model;

class TapMitraModel extends Model
{
    protected $table = 'data_tap'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true; 
    protected $allowedFields = [
        'region', 'branch', 'cluster', 'city', 'mitra', 'nama_tap', 'alamat', 'foto_1', 'foto_2', 'foto_3', 'foto_4', 'event_date'
    ];
}
