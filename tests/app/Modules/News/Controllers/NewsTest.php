<?php

namespace CodeIgniter;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIDatabaseTestCase;
use \News\Controllers\News;

class NewsTest extends CIDatabaseTestCase
{
    use ControllerTester;

    public function testIndexLocale_en()
    {
        $result = $this->withURI('http://localhost:8080/en/news')
            ->controller(News::class)
            ->execute('index');
        $this->assertTrue($result->isOK());
        $this->assertTrue($result->see("Welcome"));
        $this->assertTrue($result->see("News archive"));
    }
}
