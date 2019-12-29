<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{

    public function index()
    {
        return view('welcome_message');
    }

    public function showme($page = 'home')
    {
        if (!is_file(APPPATH . '/Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!            
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view('pages/' . $page, $data);
    }
}
