
<?php
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST']."/aa";   
    
include 'configuration/connection.php';
$c_con = new ClassConnection();
$conn = $c_con->f_connection();
if ($conn==="fail")
{
    echo '<center><h1>Connection Failed</h1></center>';
}
else
{
        echo '<!DOCTYPE html>
        <html class="no-js">';
        include "view/partial/head.php";
echo '<body class="hold-transition login-page">';
        if(isset($_GET["data"]))
        {
            $data = $_GET["data"];
            if(strtoupper($data) == "HOME")
            {
                print "home/home";
            }
            else if(strtoupper($data) == "ABOUT")
            {
                print "home/about";
            }else if(strtoupper($data) == "LOGIN")
            {                
                include "view/auth/login.front.php";
            }
            else if(strtoupper($data) == "REGISTER")
            {
                include "view/auth/register.front.php";
            }
            else if(strtoupper($data) == "FORGOT")
            {
                include "view/auth/forgotpassword.php";
            }
            else{
                print "404";
                print $data;
            }
        }
        else{
            print "Error";
        }       
        include "view/partial/js.php";
        echo '</body></html>';


}
