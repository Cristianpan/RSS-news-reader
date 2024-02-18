<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesNews extends Model
{
    protected $table            = 'categories';
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


    public function createMultipleCategories(array $categories, string $newId)
    {
        $categoriesToInsert = array_map(function ($category) use ($newId) {
            return array_merge(['newId' => $newId], $category);
        }, $categories);

        if (!empty($categoriesToInsert)) {
            $this->insertBatch($categoriesToInsert);
        }
    }
}
