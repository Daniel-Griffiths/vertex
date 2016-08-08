<?php

namespace Controller;

use Vertex\Core\Controller;
use Vertex\Core\View;

class HomeController extends Controller
{
    public function index()
    {
        return View::render('welcome', [
            'title' => 'Vertex',
            'tagline' => 'Build Something Amazing'
        ]);
    }
}
