<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesNews extends Model
{
    protected $table            = 'categoriesnews';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['newId', 'name'];

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
