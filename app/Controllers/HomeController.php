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
		// $user = $this->db->table('users')->find(1);
		$user = User::where('email', 'tim@tim.com')->first();
		var_dump($user->email);
		die();
		return $this->view->render($response, 'home.twig');
	}
}