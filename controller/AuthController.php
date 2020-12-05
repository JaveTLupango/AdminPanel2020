<?php

/**
 * Authentacation
 */
class Auth_Controller 
{
	
	function fn_Login($conn, $username, $password)
	{		
		try
		{  
			$query = "SELECT * FROM users WHERE username = :username AND password = :password";  
		    $stmt = $conn->prepare($query);
		    $stmt->execute(
		    	array(  
                          'username'     =>    $username,  
                          'password'     =>    md5($password)  
                     ) );

		     $count = $stmt->rowCount();
		     if ($count == "1")
		     {
				return "success";
		     }	
		     else{
		     	return "Failed to login " .$count;
		     }  
		}
		catch (Exception $e)
		{			
			return "Failed to login " .$e->getMessage();
		}
	}
}