<?php

namespace News\Repository;

use News\Models\NewsModel;
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

    public function save($data): bool
    {
        $model = new NewsModel();
        return $model->save($data);
    }
}
