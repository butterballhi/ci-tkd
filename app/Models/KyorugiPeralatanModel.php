<?php

namespace App\Models;

use CodeIgniter\Model;

class KyorugiPeralatanModel extends Model
{
    protected $table            = 'kyorugi_peralatan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'id_kategori', 
        'judul', 
        'peralatan_wajib', 
        'peralatan_tambahan', 
        'catatan_seragam', 
        'image'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];
}
