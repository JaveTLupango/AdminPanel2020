<?php

   if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    //$url.= $_SERVER['REQUEST_URI'];    
      
    echo $url. "<br>";
    echo explode("//", $url)[1] . '<br>';

    
require 'controller/EmailController.php'; // Function Controller
$c_email = new Email_Controller(); // Delete controller declarati0n

$content1 = "You’re almost there! You have now enabled Two-Factor Authentication for your account and your login code is:";
$content2 = "The code will expire in 15 minutes.";
$content3 = "Having trouble to log into your account? Just hit reply and let us know.";

$EmailContent = $c_email->email_Content_Func("Admin Panel", "user101", "02514", $content1, $content2, $content3);
$c_email->sendEmailForgotPassword("lupangojave@gmail.com", $EmailContent, "user101", "Reset Password");
echo "<br>";
echo $EmailContent;