<?php

namespace App\Models;

use CodeIgniter\Model;

class TangkisanModel extends Model
{
    protected $table            = 'tangkisan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_kategori',
        'nama_en',
        'nama_kr',
        'hangeul',
        'description',
        'practical_app',
        'image'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];
}
