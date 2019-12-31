<?php

namespace News\Database;

use CodeIgniter\Test\CIDatabaseTestCase;

class NewsDbTest extends CIDatabaseTestCase
{
    protected $refresh  = true;
    protected $seed     = 'CoreSeeder';
    protected $basePath = 'app/Database';
    protected $namespace = 'App\Database\Migrations';

    private $tableName = 'news';

    public function testFirstNewsExist()
    {
        $criteria = [
            'title' => 'Elvis sighted',
            'slug' => 'elvis-sighted'
        ];
        $this->seeInDatabase($this->tableName, $criteria);
    }
}
