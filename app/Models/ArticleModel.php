<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'articles';
    protected $allowedFields = ['title', 'content', 'category_id'];

    public function getAll()
    {
        return $this->select('articles.*, categories.name as category')
            ->join('categories', 'categories.id = articles.category_id')
            ->findAll();
    }
}
