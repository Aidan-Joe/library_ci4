<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ArticleModel;
use App\Models\CategoryModel;


class ArticleController extends BaseController
{
    public function index()
    {
        $model = new ArticleModel();

        $data['articles'] = $model->getAll();

        return view('articles/index', $data);
    }

    public function detail($id)
    {
        $model = new ArticleModel();
        $data['article'] = $model->find($id);

        return view('articles/detail', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();

        $data['categories'] = $categoryModel->findAll();

        return view('articles/create', $data);
    }

    public function store()
    {
        $model = new ArticleModel();

        $model->save([
        'title' => $this->request->getPost('title'),
        'content' => $this->request->getPost('content'),
        'category_id' => $this->request->getPost('category_id'),
        ]);

        return redirect()->to('/')
        ->with('success', 'Artikel berhasil ditambahkan');
    }

    public function edit($id)
    {
        $articleModel = new ArticleModel();
        $categoryModel = new CategoryModel();

        $data['article'] = $articleModel->find($id);
        $data['categories'] = $categoryModel->findAll();

        return view('articles/edit', $data);
    }

    public function update($id)
    {
        $model = new ArticleModel();

        $model->update($id, [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'category_id' => $this->request->getPost('category_id'),
        ]);

        return redirect()->to('/')->with('success', 'Artikel berhasil diupdate');
    }

    public function delete($id)
    {
        $model = new ArticleModel();
        $model->delete($id);

        return redirect()->to('/')->with('success', 'Artikel berhasil dihapus');
    }

}
