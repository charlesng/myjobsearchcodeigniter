<?php

namespace CodeIgniter;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIDatabaseTestCase;

class PagesTest extends CIDatabaseTestCase
{
    use ControllerTester;

    public function testIndex()
    {
        $result = $this->withURI('http://localhost:8080/en')
            ->controller(\App\Controllers\Pages::class)
            ->execute('index');
        $this->assertTrue($result->isOK());
        $this->assertTrue($result->see("Welcome"));
    }

    public function testShowMeWithHome()
    {
        $result = $this->withURI('http://localhost:8080/en/home')
            ->controller(\App\Controllers\Pages::class)
            ->execute('showme');
        $this->assertTrue($result->isOK());
        $this->assertTrue($result->see("I am home page"));
    }

    public function testShowMeWithAbout()
    {
        $result = $this->withURI('http://localhost:8080/en/showme/about')
            ->controller(\App\Controllers\Pages::class)
            ->execute('showme', 'about');
        $this->assertTrue($result->isOK());
        $this->assertTrue($result->see("About me"));
    }
}
