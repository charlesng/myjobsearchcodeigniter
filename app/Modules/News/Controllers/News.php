<?php

namespace News\Controllers;

use App\Controllers\BaseController;
use App\Helpers\Convertor;
use News\Entities\News as NewsEntity;
use News\Repository\CIModelNewsRepository;

class News extends BaseController
{
    /**
     * In second
     * @var int
     */
    private $cacheTime = 10;

    /**
     * @var NewsRepository
     */
    private $repo;

    public function initController($request, $response, $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        $this->repo = new CIModelNewsRepository();
    }
    public function index()
    {

        $this->cachePage($this->cacheTime);
        log_message('info', 'News Index page is visited');

        $data = [
            'news'  => $this->repo->find(),
            'title' => 'News archive',
            'locale' => $this->request->getLocale(),
            'msgNoNews' => lang('News.msgNoNews'),
            'msgNoNewsDetail' => lang('News.msgNoNewsDetail')
        ];
        return view('News\Views\overview', $data);
    }

    public function view($slug = NULL)
    {
        $this->cachePage($this->cacheTime);
        $info = [
            'slug' => $slug,
        ];
        log_message('info', 'News with {slug} is visited', $info);


        $data['news'] = $this->repo->find($slug);

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('News\Views\view', $data);
    }

    public function create()
    {
        log_message('info', 'Create New Page is visited');
        helper('form');

        if (!$this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'  => 'required'
        ], [
            'title' => [
                'required' => lang('NewsError.TitleMissed')
            ],
            'body'  => [
                'required' => lang('NewsError.BodyMissed')
            ]
        ])) {
            $data = [
                'title' => 'Create a news item',
                'locale' => $this->request->getLocale(),
                'createTitleLabel' => lang('News.createTitleLabel'),
                'createTextLabel' => lang('News.createTextLabel')
            ];
            return  view('News\Views\create', $data);
        } else {
            $news = new NewsEntity();
            $news->title = $this->request->getVar('title');
            $news->slug = url_title($this->request->getVar('title'));
            $news->body = $this->request->getVar('body');
            $this->repo->save($news);
            $data = [
                'title' => 'Created successfully',
                'locale' => $this->request->getLocale(),
                'createTitleLabel' => lang('News.createTitleLabel'),
                'createTextLabel' => lang('News.createTextLabel'),
                'msgNewsCreatedSuccess' => lang('News.msgNewsCreatedSuccess')
            ];
            return view('News\Views\success', $data);
        }
    }
}
