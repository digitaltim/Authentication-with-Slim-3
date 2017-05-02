<?php
declare(strict_types=1);

namespace App\Auth;

use App\Models\User;


/**
* 
*/
class Auth
{
	public function user()
	{
		return User::find($_SESSION['user']);
	}

	public function check()
		{
			return isset($_SESSION['user']);
		}	

	public function attempt(string $email, string $password): bool
	{
		// grab user by their username
		$user = User::where('email', $email)->first();

        // check if user exists
        if (!$user) {
            return false;
        }
        
        // verify password for that user
        if (password_verify($password, $user['password'])) {
        	// set session for that user
        	$_SESSION['user'] = $user['id'];
        	return true;
        }
        return false;
	}

	public function logout()
	{
		unset($_SESSION['user']);
	}

}

