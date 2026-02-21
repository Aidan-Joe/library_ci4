<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'author',
        'year',
        'category_id',
        'image'
    ];

    public function getAll()
    {
        return $this->select('books.*, categories.name as category')
            ->join('categories', 'categories.id = books.category_id')
            ->findAll();
    }
}