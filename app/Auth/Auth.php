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
		if (isset($_SESSION['user'])) {
			//grab user by their username
			$q = new QueryBuilder("SELECT id, username, password FROM admins WHERE id = $1 ", $_SESSION['user']);
	        $rs = $q->execute();
	        return pg_fetch_assoc($rs);
	    }
	    return false;
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

