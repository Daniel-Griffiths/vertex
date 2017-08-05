<?php

namespace Vertex\Controller;

use Vertex\Model\ExampleModel;
use Vertex\Core\Controller;

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
