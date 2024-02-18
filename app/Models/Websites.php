<?php

namespace App\Models;

use CodeIgniter\Model;

class Websites extends Model
{
    protected $table            = 'websites';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'url', 'icon'];
  
    // Callbacks
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function createWebsite(array $websiteData)
    {
        try {
            $this->db->transException(true)->transStart();
            $websiteId = $this->insert($websiteData);
            (new News())->createMultipleNews($websiteData['news'], $websiteId, true); 

            $this->db->transCommit();
        } catch (\Throwable $th) {
            $this->db->transRollback();
            throw $th;
        }
    }

}
