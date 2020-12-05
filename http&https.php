<?php

   if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    //$url.= $_SERVER['REQUEST_URI'];    
      
    echo $url. '<br>';
   require 'controller/SelectController.php';
   require 'controller/FuncController.php';
include 'configuration/connection.php'; //connection
  $c_Func = new Func_Controller();
   $c_con = new ClassConnection(); 
   $conn = $c_con->f_connection();
   $c_select = new Select_Controller();
   $s_res = $c_select->fn_SelectAll($conn, "SELECT * FROM users WHERE status = 'active'");
   //echo $s_res;=
    echo "<br>";
    echo "<br>";
  while ($row = $s_res->fetch()) {
    echo $row['id']."<br />";
}

   $s_res2 = $c_select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "userid", '0');

echo $s_res2. "<br>";


$a= array();

for($x = 1; $x <= 10; $x++) 
{
  $b = array($x,$x);
  array_push($a,$b);

}  

 print_r($a). "<br>";

 for ($row = 0; $row <= 9; $row++)
 {
  echo $a[$row][0]. " ==== " . $a[$row][1]. "<br>";
 }

 //header("Location: /home");


  $charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
  $base = strlen($charset);
  $result = '';

  $now = explode(' ', microtime())[1];
  while ($now >= $base){
    $i = $now % $base;
    $result = $charset[$i] . $result;
    $now /= $base;
  }
  echo substr($result, -10)."<br>";


echo "<br>";  
echo "<br>";  

   $s_res = $c_select->fn_SelectAll_RetJSON($conn, "SELECT * FROM users");

   echo $s_res;