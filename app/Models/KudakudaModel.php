<?php

namespace App\Models;

use CodeIgniter\Model;

class KudakudaModel extends Model
{
    protected $table            = 'kuda_kuda';
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
        'height_type',
        'length_desc',
        'width_desc',
        'poomsae_desc',
        'practical_app',
        'image'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];
}
