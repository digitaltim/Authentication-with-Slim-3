<?php

namespace App\Controllers;

/**
* 
*/
class HomeController extends Controller
{
	public function index($request, $response)
	{
		$user = $this->db->table('users')->find(1);
		var_dump($user);
		die();
		return $this->view->render($response, 'home.twig');
	}
}