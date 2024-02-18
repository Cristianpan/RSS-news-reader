<?php

namespace App\Models;

use CodeIgniter\Model;

class News extends Model
{
    protected $table            = 'news';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['title', 'url', 'description', 'image', 'date', 'websiteId'];
    private $lastIds; 

    // Callbacks
    protected $beforeInsert   = [];
    protected $afterInsertBatch    = ['setLastIds'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Insert multiple news into the database
     *
     * @param array $newsData
     * @param string $websiteId
     * @param boolean $disabledAutoCommit
     * @return void
     */
    public function createMultipleNews(array $newsData, string $websiteId, bool $disabledAutoCommit = false)
    {
        try {
            !$disabledAutoCommit ?  $this->db->transException(true)->transStart() : '';

            $newsDataToInsert = array_map(function ($new) use ($websiteId) {
                return array_merge(['websiteId' => $websiteId], $new);
            }, $newsData);

            $this->insertBatch($newsDataToInsert);
            
            $categoryModel = new CategoriesNews(); 
            
            foreach ($newsData as $index => $data) {
                $categoryModel->createMultipleCategories($data['categories'], $this->lastIds[$index]);    
            } 
            !$disabledAutoCommit ? $this->db->transCommit() : '';
        } catch (\Throwable $th) {
            !$disabledAutoCommit ? $this->db->transRollback() : '';
            throw $th;
        }
    }


    /**
     * Callback after saving new
     *
     * @param array $data the array of key new from post
     *
     * @return array
     */
    public function setLastIds(array $data)
    {
        $lastId        = $this->insertID() + $data['result'];
        
        
        $auxLasIds = $this->select('id')->where('id <= ', $lastId)->orderBy('id', 'DESC')->limit($data['result'])->find();
        $this->lastIds = array_column($auxLasIds, 'id'); 
        return $data;
    }

    /**
     * get the last Ids inserted on database
     *
     * @return array
     */
    public function getLastIds()
    {
        return $this->lastIds;
    }
}
