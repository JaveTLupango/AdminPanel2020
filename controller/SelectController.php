<?php

/**
 * Select Class controller
 */
class Select_Controller
{	
	function fn_SingleResponse($conn, $sql, $name, $val1)
	{
		$stmt = $conn->prepare($sql);
		$stmt->execute([$val1]); 
		$user = $stmt->fetch();
		$data = array();
		array_push($data,$user);	
		return $data[0]["".$name.""];
	}

	function fb_SelectCount($conn, $sql)
	{
		$nRows = $conn->query($sql)->fetchColumn(); 
		return $nRows;
	}

	function fn_SelectAll($conn, $sql)
	{
		$stmt = $conn->query($sql);
		return $stmt;
	}

	function fn_SelectAll_RetJSON($conn, $sql)
	{
		$stmt = $conn->query($sql)->fetchAll();
		return json_encode($stmt);
	}
}