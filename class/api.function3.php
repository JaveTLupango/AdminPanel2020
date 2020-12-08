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
		if ($id == "UpdateInfo")
		{
			$name = $_POST['data1'];
			$email = $_POST['data2'];
			$username = $_POST['data3'];
			$password = $_POST['data4'];
			$passhash = md5($password);
			$id = $_POST['data5'];
			$usertype = $_POST['data6'];
			echo $c_Del->deleteRecord($conn, "UPDATE users SET name='$name', email='$email', username='$username', password='$passhash', passkey='$password', usertype='$usertype' WHERE id = '$id'");			
		} 
		else if ($id == "ReloadVoucher")
		{
			$doerVoucher = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "voucher", $_SESSION['username']);
			if ($doerVoucher != 0 && $doerVoucher >= $_POST['data4'])
			{
				$vID = $_POST['data1'];
				$vName = $_POST['data2'];
				$vUsername = $_POST['data3'];
				$vCredit = $_POST['data4'];
				$vCredit2 = $vCredit + $_POST['data6'];
				$doerID = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "id", $_SESSION['username']);
				$sqlCommand = "UPDATE users SET voucher='$vCredit2' WHERE id = '$vID'";
				$c_Logs->InsertLogs($conn, $sqlCommand,$vID, $doerID, "ReloadVoucher");
				$c_Del->deleteRecord($conn, $sqlCommand);
				$doerVoucher = ($doerVoucher - $_POST['data6']);
				$sqlCommand = "UPDATE users SET voucher='$doerVoucher' WHERE id = '$doerID'";
				$c_Del->deleteRecord($conn, $sqlCommand);
				$c_InsertControl->fn_LogsCredit($conn, $doerID,"ReloadVoucher", $_POST['data6'], $vID);
				echo "success";
			}
			else
			{
				echo "error";
			}			
			//echo $c_Del->UpdateRecode($conn, "UPDATE users SET name='$name', email='$email', username='$username', password='$passhash', passkey='$password', usertype='$usertype' WHERE id = '$id'");
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
