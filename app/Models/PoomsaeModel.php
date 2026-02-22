<?php

namespace App\Models;

use CodeIgniter\Model;

class PoomsaeModel extends Model
{
    protected $table            = 'poomsae';
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
        'geup_level',
        'philosophy',
        'technical_summary',
        'stances_list',
        'defensive_list',
        'offensive_list',
        'kihap_info',
        'image',
        'video_url',
        'chart_image'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];
}
