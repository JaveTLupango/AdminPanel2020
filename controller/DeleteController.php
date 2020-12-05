<?php

/**
 * Delete Controller
 */
class delete_Controller
{	
	function deleteRecord($conn, $sql)
	{
		  $conn->exec($sql);
		  return "success";
	}
}