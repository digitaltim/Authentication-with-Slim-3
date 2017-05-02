<?php

namespace App\Controllers;

use App\Models\User;
/**
* 
*/
class HomeController extends Controller
{
	public function index($request, $response)
	{
		$this->flash->addMessage('global', 'Test flash message');
		return $this->view->render($response, 'home.twig');
	}
}