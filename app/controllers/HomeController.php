<?php

namespace Controller;

use App\Core\Controller;
use App\Core\View;

class HomeController extends Controller
{	
	function index()
	{
		return View::render('welcome',[
			'title' => 'Vertex',
			'tagline' => 'Build Something Amazing'
		]);
	}
}