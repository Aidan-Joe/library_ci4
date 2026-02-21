<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;
use App\Models\CategoryModel;

class BookController extends BaseController
{
    public function index()
    {
        $model = new BookModel();
        $data['books'] = $model->getAll();

        return view('books/index', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();

        return view('books/create', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'title' => 'required|min_length[3]',
            'author' => 'required',
            'year' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('image');
        $namaFile = $file->getRandomName();
        $file->move('uploads', $namaFile);

        $model = new BookModel();

        $model->save([
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'year' => $this->request->getPost('year'),
            'category_id' => $this->request->getPost('category_id'),
            'image' => $namaFile
        ]);

        return redirect()->to('/books')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new BookModel();
        $categoryModel = new CategoryModel();

        $data['book'] = $model->find($id);
        $data['categories'] = $categoryModel->findAll();

        return view('books/edit', $data);
    }

    public function update($id)
    {
        $model = new BookModel();
        $file = $this->request->getFile('image');

        if ($file->isValid() && !$file->hasMoved()) {
            $namaFile = $file->getRandomName();
            $file->move('uploads', $namaFile);

            $oldImage = $this->request->getPost('old_image');
            if ($oldImage && file_exists('uploads/' . $oldImage)) {
                unlink('uploads/' . $oldImage);
            }
        } else {
            $namaFile = $this->request->getPost('old_image');
        }

        $model->update($id, [
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'year' => $this->request->getPost('year'),
            'category_id' => $this->request->getPost('category_id'),
            'image' => $namaFile
        ]);

        return redirect()->to('/books')->with('success', 'Buku berhasil diupdate');
    }

    public function delete($id)
    {
        $model = new BookModel();
        $book = $model->find($id);

        if ($book['image'] && file_exists('uploads/' . $book['image'])) {
            unlink('uploads/' . $book['image']);
        }

        $model->delete($id);

        return redirect()->to('/books')->with('success', 'Buku berhasil dihapus');
    }
}