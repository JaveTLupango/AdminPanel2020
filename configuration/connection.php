<?php

class ClassConnection
{
	public function f_connection()
	{		
		include 'config.php';
		try {
		    $conn = new PDO("mysql:host=$con_host;dbname=$con_dbname", $con_username, $con_password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    //echo "Connected successfully"; 
		    return $conn;
		    }
		catch(PDOException $e)
		    {
		    //echo "Connection failed: " . $e->getMessage();
		     return "fail";
			}
			
	}
}