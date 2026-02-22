<?php

namespace App\Models;

use CodeIgniter\Model;

class KyorugiInfoModel extends Model
{
    protected $table            = 'kyorugi_info';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'id_kategori', 
        'judul', 
        'sistem_pertandingan', 
        'sistem_poin_teknik', 
        'area_serang', 
        'pelanggaran_sanksi', 
        'aturan_clinch', 
        'penentuan_pemenang'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];
}
