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
		     	return "Failed to login ";
		     }  
		}
		catch (Exception $e)
		{			
			return "Failed to login " .$e->getMessage();
		}
	}

	function insert_2authfactorlogs($conn,$username, $hash)
	{
		try
		{  			
			$now = new DateTime();
			$dt = $now->format('Y-m-d H:i:s');
			$dt1 = $now->format('m-Y-d H:i:s');
			$dt2 = $now->format('d-m-Y H:i:s');
			$dttime = $now->format('Y-m-d H:i:s');
			$id = round($dt).round($dt1).round($dt2).round(microtime(true));

			$sql = "INSERT INTO 2authfactorlogs (2authID, username, status, dt, hash, try, duration)
						   VALUES ('$id', '$username', 'active', '$dttime', '$hash', 5, 900)";
								$conn->exec($sql);
			return "success";
		}
		catch (Exception $e)
		{			
			return "Failed to login " .$e->getMessage();
		}
	}

	function insert_2authfactor_func($conn,$username, $code)
	{
		try
		{  			
			$now = new DateTime();
			$dttime = $now->format('Y-m-d H:i:s');
			$sql = "INSERT INTO 2authfactor (userid, status, code, dt, duration)
						   VALUES ('$username', 'active', '$code', '$dttime', '900')";
								$conn->exec($sql);
			return "success";
		}
		catch (Exception $e)
		{			
			return "Failed to login " .$e->getMessage();
		}
	}

}