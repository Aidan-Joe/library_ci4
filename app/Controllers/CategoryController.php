<?php

namespace App\Controllers;
use App\Models\CategoryModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CategoryController extends BaseController
{
    public function index()
    {
        $model = new CategoryModel();
        $data['categories'] = $model->findAll();

        return view('categories/index', $data);
    }

    public function create()
    {
        return view('categories/create');
    }

    public function store()
    {
        $model = new CategoryModel();

        $model->save([
            'name' => $this->request->getPost('name')
        ]);

        return redirect()->to('/categories')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new CategoryModel();
        $data['category'] = $model->find($id);

        return view('categories/edit', $data);
    }

    public function update($id)
    {
        $model = new CategoryModel();

        $model->update($id, [
        'name' => $this->request->getPost('name')
        ]);

        return redirect()->to('/categories')->with('success', 'Kategori berhasil diupdate');
    }

    public function delete($id)
    {
        $model = new CategoryModel();
        $model->delete($id);

        return redirect()->to('/categories')->with('success', 'Kategori berhasil dihapus');
    }

}
