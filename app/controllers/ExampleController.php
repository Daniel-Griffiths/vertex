<?php

namespace Vertex\Controller;

use Vertex\Model\ExampleModel;
use Vertex\Core\Controller;
use Vertex\Core\View;

class ExampleController extends Controller
{
    public function index()
    {
        return View::render('example', [
            'title' => 'Vertex',
            'tagline' => 'Build Something Amazing'
        ]);
    }
}
