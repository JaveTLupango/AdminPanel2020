<?php

if (isset($_POST['id']) == "register")
{	
    include '../configuration/connection.php';
    $c_con = new ClassConnection();
	$conn = $c_con->f_connection();
	if ($conn==="fail")
	{
	    printf($conn);
	}
	else
	{
		require '../controller/InsertController.php';
		$IC_ = new Insert_Controller();
		$ret = $IC_->fn_register($conn,"","","","");
		printf($ret);
	}	
}
elseif (isset($_GET['id']))
{	
	header("Location: http://javelupango.com");
}
else
{
	printf("Bad Request");
}
