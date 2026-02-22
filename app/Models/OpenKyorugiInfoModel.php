<?php

namespace App\Models;

use CodeIgniter\Model;

class OpenKyorugiInfoModel extends Model
{
    protected $table            = 'open_kyorugi_info';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'id_kategori', 
        'judul', 
        'teknik_legal', 
        'teknik_ilegal', 
        'aturan_tambahan'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];
}
