<?php

/**
 * Delete Controller
 */
class delete_Controller
{	
	function deleteRecord($conn, $sql)
	{
		try
		{
			$conn->exec($sql);
			return "success";
		}catch(Exception $err)
		{
			return $err;
		}		  
	}
}