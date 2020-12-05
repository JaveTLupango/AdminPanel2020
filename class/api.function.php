<?php
include '../configuration/connection.php'; //connection
include '../controller/InsertController.php'; // insertion Controller
include '../controller/AuthController.php'; // Auth Controller
require '../controller/SelectController.php'; // Select Controller
require '../controller/FuncController.php'; // Function Controller
require '../controller/DeleteController.php'; // Function Controller

$c_con = new ClassConnection(); // connection declaration
$c_InsertControl = new Insert_Controller(); // Insertion controller declaration
$c_Auth = new Auth_Controller(); // Auth controller Decleration
$c_Select = new Select_Controller(); // Select controller declaration
$c_Func = new Func_Controller(); // Func controller declaration
$c_Del = new Delete_Controller(); // Delete controller declaration


$conn = $c_con->f_connection();
if ($conn==="fail")
{
    echo '<center><h1>Connection Failed</h1></center>';
}
else
{
	if (isset($_POST['id']) != "")
	{
		$id = $_POST['id'];
		if ($id == "user_edit_function")
		{
			$_id = $_POST['data'];
		    $s_res = $c_Select->fn_SelectAll_RetJSON($conn, "SELECT * FROM users WHERE id='$_id'");
		    echo $s_res;
		}
		else if ($id == "functionDeleteUsers")
		{
			$_id = $_POST['data'];
			echo $c_Del->deleteRecord($conn, "UPDATE users SET status='delete' WHERE id='$_id'");
		}
		else if ($id == "validateDuration")
		{
			$_id = $_POST['data'];
			echo $c_Func->_duration($_id);
		}
		else
		{
			echo "[]";
		}		
	}
	else
	{
		echo "x";
	}
}
