<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() 
    {
        $title = 'Welcome to the blog';
        return view('pages.index')->with('title', $title);
    }

    public function about() 
    {
        $title = 'About us';
        return view('pages.about')->with('title', $title);
    }
    public function services() 
    {
        $title = 'Services';
        $data = array(
            'title'     => 'Services',
            'services'  => ['Web Desing', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
