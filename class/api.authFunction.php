<?php
include '../configuration/connection.php'; //connection
require '../controller/DeleteController.php'; // Function Controller
$c_Del = new Delete_Controller(); // Delete controller declarati0n
$c_con = new ClassConnection(); // connection declaration
$conn = $c_con->f_connection();
$c_Del->deleteRecord($conn, "UPDATE users SET duration = duration - 300 WHERE duration > 0 AND status='active'");
$c_Del->deleteRecord($conn, "UPDATE users SET duration = 0 WHERE duration < 0 OR status='delete'");

$c_Del->deleteRecord($conn, "DELETE FROM 2authfactor WHERE status='inactive'");
$c_Del->deleteRecord($conn, "DELETE FROM 2authfactorlogs WHERE status='inactive'");

$c_Del->deleteRecord($conn, "UPDATE 2authfactor SET duration = duration - 300 WHERE duration > 0 AND status='active'");
$c_Del->deleteRecord($conn, "UPDATE 2authfactor SET duration = 0, status='inactive' WHERE duration <= 0");

$c_Del->deleteRecord($conn, "UPDATE 2authfactorlogs SET duration = duration - 300 WHERE duration > 0 AND (status='active' OR status='inactive')");
$c_Del->deleteRecord($conn, "UPDATE 2authfactorlogs SET duration = 0, status='inactive' WHERE duration <= 0");