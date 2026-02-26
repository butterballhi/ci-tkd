<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasBeratModel extends Model
{
    protected $table            = 'kelas_berat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'id_kategori', 
        'judul', 
        'definisi_umum', 
        'spesifikasi_hogu', 
        'hit_level_pss', 
        'image'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];
}
