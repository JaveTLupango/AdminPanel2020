<?php
session_start();

include '../configuration/connection.php'; //connection
include '../controller/InsertController.php'; // insertion Controller
include '../controller/AuthController.php'; // Auth Controller
require '../controller/SelectController.php'; // Select Controller
require '../controller/FuncController.php'; // Function Controller
require '../controller/DeleteController.php'; // Function Controller
require '../controller/LogsController.php'; // Function Controller

$c_con = new ClassConnection(); // connection declaration
$c_InsertControl = new Insert_Controller(); // Insertion controller declaration
$c_Auth = new Auth_Controller(); // Auth controller Decleration
$c_Select = new Select_Controller(); // Select controller declaration
$c_Func = new Func_Controller(); // Func controller declaration
$c_Del = new Delete_Controller(); // Delete controller declaration
$c_Logs = new Logs_Controller(); // Delete controller declaration


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
		if ($id == "validate")
		{
			$retval = null;
			$_id1 = $_POST['data1'];
			$_id2 = $_POST['data2'];
			$_id3 = $_POST['data3'];
		    $s_res1 = $c_Select->fn_SelectAll_RetJSON($conn, "SELECT * FROM users WHERE email='$_id1' AND id!='$_id3'");
		    if ($s_res1 == "[]")
		    {
		    	$retval = "0";
		    }
		    else
		    {
		    	$retval = "1";
		    }

		    $s_res2 = $c_Select->fn_SelectAll_RetJSON($conn, "SELECT * FROM users WHERE username='$_id2' AND id!='$_id3'");

		    if ($s_res2 == "[]")
		    {
		    	$retval = $retval."-0";
		    }
		    else
		    {
		    	$retval = $retval."-1";
		    }

		    print($retval);
		    
		}
		else if ($id == "functionReloadDurationToClient")
		{
			$_id1 = $_POST['data1'];
			$_id2 = $_POST['data2'];
			$_id3 = $_POST['data3'];
			$doerVoucher = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "voucher", $_SESSION['username']);
			$Clientduration = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE id=?", "duration", $_id1);
			if ($doerVoucher  >= $_id2)
			{
				$t_cleintDuration = ($_id2 * 2592000);
				$doerID = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "id", $_SESSION['username']);
				$t_cleintDuration = $t_cleintDuration + $Clientduration;
				$sqlCommand = "UPDATE users SET duration='$t_cleintDuration' WHERE id = '$_id1'";
				$c_Logs->InsertLogs($conn, $sqlCommand, $_id1, $doerID, "ReloadDuration");
				$c_Del->deleteRecord($conn, $sqlCommand);
				$doerVoucher = ($doerVoucher - $_id2);
				$sqlCommand = "UPDATE users SET voucher='$doerVoucher' WHERE id = '$doerID'";
				$c_Del->deleteRecord($conn, $sqlCommand);
				$c_InsertControl->fn_LogsCredit($conn, $doerID,"ReloadDuration", $_id2, $_id1);
				echo "Success";
			}
			else
			{
				echo "not enough credit";
			}
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
