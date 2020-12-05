<?php

/**
 * Logs Controller
 */

use \Chirp\Cryptor;

class Logs_Controller
{	
	function InsertLogs($conn, $sqlBase, $apid, $userid, $doing)
	{	

		  require '../class/hash/hashing.php';	
		    $now = new DateTime();
	        $dt = $now->format('Y-m-d H:i:s');
	        $dt1 = $now->format('m-Y-d H:i:s');
	        $dt2 = $now->format('d-m-Y H:i:s');
	        $dttime = $now->format('Y-m-d H:i:s');
	        $id = round($dt).round($dt1).round($dt2).round(microtime(true));
  		  $key = Cryptor::sec_key();
  		  $cryptor = new Cryptor($key);
  		  $crypted_token = $cryptor->encrypt($sqlBase);
  		  $sql = "INSERT INTO logs (logsID, logsData, do, doer, ap_user) VALUES('$id','$crypted_token','$doing','$userid','$apid')";
		  $conn->exec($sql);		 
	}
}