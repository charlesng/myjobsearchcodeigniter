<?php

namespace News\Controllers;

use CodeIgniter\Controller;
use News\Models\NewsModel;

class News extends Controller
{
    /**
     * In second
     * @var int
     */
    private $cacheTime = 10;

    public function index()
    {
        $this->cachePage($this->cacheTime);
        log_message('info', 'News Index page is visited');
        $model = new NewsModel();

        $data = [
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];

        echo view('templates/header', $data);
        echo view('News\Views\overview', $data);
        echo view('templates/footer');
    }

    public function view($slug = NULL)
    {
        $this->cachePage($this->cacheTime);
        $info = [
            'slug' => $slug,
        ];
        log_message('info', 'News with {slug} is visited', $info);
        $model = new NewsModel();

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        echo view('templates/header', $data);
        echo view('News\Views\view', $data);
        echo view('templates/footer');
    }

    public function create()
    {
        log_message('info', 'Create New Page is visited');
        helper('form');
        $model = new NewsModel();

        if (!$this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'  => 'required'
        ])) {
            echo view('templates/header', ['title' => 'Create a news item']);
            echo view('News\Views\create');
            echo view('templates/footer');
        } else {
            $model->save([
                'title' => $this->request->getVar('title'),
                'slug'  => url_title($this->request->getVar('title')),
                'body'  => $this->request->getVar('body'),
            ]);
            echo view('News\Views\success');
        }
    }
}
