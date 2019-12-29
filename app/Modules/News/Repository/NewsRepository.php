<?php

namespace News\Repository;

interface NewsRepository
{
    public function findAll(): array;
    public function find($slug = false);
    public function save($data): bool;
}
