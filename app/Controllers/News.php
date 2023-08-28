<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;   

class News extends BaseController
{
    public function index()
    {

        helper(['date', 'array']);

        $multiArray = [
            'row1' => [
                'subrow1' => ['hexlet' => 'otlichno'],
                'subrow2' => ['A21', 'A22', 'A23'],
                'subrow3' => ['A31', 'A32', 'A33'],
            ],
            'row2' => [
                'subrow1' => ['B11', 'B12', 'B13'],
                'red' => 'gray',
                'subrow3' => ['B31', 'B32', 'B33'],
            ],
            'row3' => [
                'subrow1' => ['C11', 'C12', 'C13'],
                'subrow2' => ['C21', 'C22', 'C23'],
                'subrow3' => ['C31', 'C32', 'C33'],
            ],
        ];

        $array = [
            'array' => $multiArray,
        ];

        $model = model(NewsModel::class);
        $db = getenv('database.default.database');

        $data = [
            'news'  => $model->getNews(),
            'title' => $db,
        ];

        return view('templates/header', $data)
            . view('news/index', $array)
            . view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header')
                . view('news/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['title', 'body']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header')
                . view('news/create')
                . view('templates/footer');
        }

        $model = model(NewsModel::class);

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ]);

        return redirect()->to(route_to('newsIndex'));
    }
}
