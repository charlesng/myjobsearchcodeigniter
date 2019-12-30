<?php

namespace News\Repository;

use News\Entities\News;

interface NewsRepository
{
    public function findAll(): array;
    public function find($slug = false);
    public function save(News $data): bool;
}
