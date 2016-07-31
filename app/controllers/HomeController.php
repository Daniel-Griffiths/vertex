<?php
namespace Controller;

class HomeController 
{	
	function index()
	{
		return view('welcome',[
			'title' => 'Vertex',
			'tagline' => 'Build Something Amazing'
		]);
	}
}