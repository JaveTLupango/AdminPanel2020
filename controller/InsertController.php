<?php
/**
 * Insertion Class function
 */
class Insert_Controller
{
	
	/**
	* registration function controller
	*/
	function fn_register($conn, $username, $password, $passkey, $name, $email)
	{
		try
		{  
			    $now = new DateTime();
                $dt = $now->format('Y-m-d H:i:s');
                $dt1 = $now->format('m-Y-d H:i:s');
                $dt2 = $now->format('d-m-Y H:i:s');
                $dttime = $now->format('Y-m-d H:i:s');
                $id = round($dt).round($dt1).round($dt2).round(microtime(true));

				$sql = "INSERT INTO users (userid, username, password, passkey, name, usertype, status, upline, dtjoin, email, duration, label)
	                           VALUES ('$id', '$username', '$password', '$passkey', '$name', 'client', 'active', 'admin', '$dttime', '$email', '7200', 'trial')";
	                                $conn->exec($sql);	
				return "success";
		}
		catch (Exception $e)
		{			
			return $e->getMessage();
		}
	}

	/**
	* Add new user function controller
	*/
	function fn_AddNewUser($conn, $username, $password, $passkey, $name, $email, $upline, $usertype)
	{
		try
		{  
			    $now = new DateTime();
                $dt = $now->format('Y-m-d H:i:s');
                $dt1 = $now->format('m-Y-d H:i:s');
                $dt2 = $now->format('d-m-Y H:i:s');
                $dttime = $now->format('Y-m-d H:i:s');
                $id = round($dt).round($dt1).round($dt2).round(microtime(true));

				$sql = "INSERT INTO users (userid, username, password, passkey, name, usertype, status, upline, dtjoin, email, duration, label)
	                            VALUES ('$id', '$username', '$password', '$passkey', '$name', '$usertype', 'active', '$upline', '$dttime', '$email', '7200', 'trial')";
	                                $conn->exec($sql);	
				return "success";
		}
		catch (Exception $e)
		{			
			return $e->getMessage();
		}
	}

	/**
	* Insert CridetLogs
	*/
	function fn_LogsCredit($conn, $userid, $type, $credit, $ap_id)
	{
		try
		{  
			    $now = new DateTime();
                $dt = $now->format('Y-m-d H:i:s');
                $dt1 = $now->format('m-Y-d H:i:s');
                $dt2 = $now->format('d-m-Y H:i:s');
                $dttime = $now->format('Y-m-d H:i:s');
                $id = round($dt).round($dt1).round($dt2).round(microtime(true));
                $duration = 0;
                if ($type == "ReloadVoucher")
                {
                	$duration = 0;
                }
                else
                {
                	$vV1 = 2592000;
                	$duration = $vV1 * $credit;
                }
				$sql = "INSERT INTO creditlogs (logs_id, userid, ap_id, type, duration, credit)
	                          VALUES ('$id', '$userid', '$ap_id', '$type', '$duration', '$credit')";
	                                $conn->exec($sql);	
				return "success";
		}
		catch (Exception $e)
		{			
			return $e->getMessage();
		}
	}

	/**
	* username validation function controller
	*/

	function fn_username_Validate($conn, $username)
	{
		try
		{  
			$query = "SELECT * FROM users WHERE username = :username";  
		    $stmt = $conn->prepare($query);
		    $stmt->execute(
		    	array(  
                          'username'     =>    $username
                     ) );

		     $count = $stmt->rowCount();
		    return $count;
		}
		catch (Exception $e)
		{			
			return $e->getMessage();
		}
	}


	/**
	* username validation function controller
	*/
	function fn_email_Validate($conn, $email)
	{
		try
		{  
			$query = "SELECT * FROM users WHERE email = :email";  
		    $stmt = $conn->prepare($query);
		    $stmt->execute(
		    	array(  
                          'email'     =>    $email
                     ) );

		     $count = $stmt->rowCount();
		    return $count;
		}
		catch (Exception $e)
		{			
			return $e->getMessage();
		}
	}

}