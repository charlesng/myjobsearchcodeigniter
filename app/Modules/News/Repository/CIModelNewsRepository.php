<?php

namespace News\Repository;

use App\Helpers\Convertor;
use News\Models\NewsModel;
use News\Entities\News;
use News\Repository\NewsRepository;

class CIModelNewsRepository implements NewsRepository
{
    public function findAll(): array
    {
        return [];
    }
    public function find($slug = false)
    {
        $model = new NewsModel();
        return $model->getNews($slug);
    }

    public function save(News $news): bool
    {
        //convert the object to associate array first
        $data = Convertor::obj2array($news);
        $model = new NewsModel();
        return $model->save($data);
    }
}
