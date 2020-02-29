<?php

namespace Vertex\Controller;

use Vertex\Core\Controller;
use Vertex\Model\ExampleModel;

class ExampleController extends Controller
{
    public function index()
    {
        return view('examples.homepage', [
            'title' => 'Vertex',
            'tagline' => 'Build Something Amazing'
        ]);
    }
}
