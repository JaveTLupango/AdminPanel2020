<?php
session_start();

include 'configuration/connection.php'; //connection
include 'controller/InsertController.php'; // insertion Controller
include 'controller/AuthController.php'; // Auth Controller
require 'controller/SelectController.php'; // Select Controller
require 'controller/FuncController.php'; // Function Controller
require 'controller/EmailController.php'; // Function Controller
require 'controller/DeleteController.php'; // Function Controller

$c_Del = new Delete_Controller(); // Delete controller declarati0n
$c_con = new ClassConnection(); // connection declaration
$c_InsertControl = new Insert_Controller(); // Insertion controller declaration
$c_Auth = new Auth_Controller(); // Auth controller Decleration
$c_Select = new Select_Controller(); // Select controller declaration
$c_Func = new Func_Controller(); // Select controller declaration
$c_email = new Email_Controller(); // Delete controller declarati0n
$logsURL = "local";
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST']."/aa";
$logsURL = $url;
$conn = $c_con->f_connection();
if ($conn==="fail")
{
    echo '<center><h1>Connection Failed</h1></center>';
}
else
{
        if(isset($_GET["data"]))
        {
            $data = $_GET["data"];

            if (strtoupper($data) == "LOGIN" || 
                strtoupper($data) == "REGISTER" ||
                strtoupper($data) == "FORGOTPASS" || 
                strtoupper($data) == "LOGOUT" || 
                strtoupper($data) == "TWOAUTHFACTOR")
            {
                        echo '<!DOCTYPE html>
                        <html class="no-js">';
                        include "view/partial/head.php";
                        echo '<body class="hold-transition login-page">';                       
                           
                            if(strtoupper($data) == "LOGIN")
                            {                
                                if (isset($_SESSION["username"]))
                                {
                                    header("Location: ".$url."/home");
                                }
                                else
                                {
                                    include "view/auth/login.front.php";
                                }                                
                            }
                            else if(strtoupper($data) == "REGISTER")
                            {
                                include "view/auth/register.front.php";
                            }
                            else if(strtoupper($data) == "FORGOTPASS")
                            {
                                include "view/auth/forgotpassword.php";
                            }  
                            else if(strtoupper($data) == "TWOAUTHFACTOR")
                            {
                                include "view/auth/2authfactor.front.php";
                            }            
                            else if(strtoupper($data) == "LOGOUT")
                            {
                                header("Location: ".$url."/logout.php");
                            }
                            else
                            {
                                print "404";
                                print $data;
                            }
                               
                        include "view/partial/js.php";
                        echo '</body></html>';
            }
            else if (strtoupper($data) == "HOME" || 
                    strtoupper($data) == "RESETPASSWORD" || 
                    strtoupper($data) == "ADDNEWRESELLER" || 
                    strtoupper($data) == "ADDQUICKUSER"|| 
                    strtoupper($data) == "ADDBULKUSER" ||
                    strtoupper($data) == "SETTING")
            {
                 if (isset($_SESSION["username"]))
                {
                   
                    echo '<!DOCTYPE html>
                        <html>';
                    include 'view/partial/admin.head.php';

                    echo '<body class="hold-transition sidebar-mini layout-fixed">
                                <div class="wrapper">';
                         include 'view/partial/admin.navbar.php'; 
                           include 'view/partial/admin.aside.php';; 
                    echo '<div class="content-wrapper">';                    

                             if(strtoupper($data) == "HOME")
                            {                              
                                $Dashboard_100 = strtoupper($data);
                                include 'view/partial/admin.dashboard.php';
                                include 'view/body/dashboard.body.php';                                
                            } 
                            else if(strtoupper($data) == "ADDQUICKUSER") //addquickuser
                            {                              
                                $Dashboard_100 = strtoupper($data);
                                include 'view/partial/admin.dashboard.php';
                                include 'view/body/form.body.php';                                
                            }  
                            else if(strtoupper($data) == "ADDBULKUSER") //addquickuser
                            {                              
                                $Dashboard_100 = strtoupper($data);
                                include 'view/partial/admin.dashboard.php';
                                include 'view/body/form.body.php';                                
                            } 
                            else if(strtoupper($data) == "SETTING") //addquickuser
                            {                              
                                $Dashboard_100 = strtoupper($data);
                                include 'view/partial/admin.dashboard.php';
                                include 'view/body/form.body.php';                                
                            }                           
                            else
                            {
                                $Dashboard_100 = "404";
                                include 'view/partial/admin.dashboard.php';
                              echo '<center><h1> 404 Not Found </h1></center>';
                            }

                    echo ' </div>';
                    include 'view/partial/admin.footer.php'; 
                    echo 
                           '<aside class="control-sidebar control-sidebar-dark">
                          </aside>
                        </div>';
                    include 'view/partial/admin.js.php';
                        echo '</body>
                                </html>';
                }
                else
                {
                    header("Location: ".$url."/home/login");
                }                            
            }
            else if (strtoupper($data) == "HISTORY" || 
                    strtoupper($data) == "VIEWALLUSER" || 
                    strtoupper($data) == "VIEWRESELLER" || 
                    strtoupper($data) == "VIEWBLOCKUSER"|| 
                    strtoupper($data) == "VIEWACTIVEUSER" || 
                    strtoupper($data) == "VIEWCLIENT") //VIEWCLIENT
            {
                if (isset($_SESSION["username"]))
                {
                   
                    echo '<!DOCTYPE html>
                        <html>';
                    include 'view/partial/table.head.php';

                    echo '<body class="hold-transition sidebar-mini layout-fixed">
                                <div class="wrapper">';
                         include 'view/partial/admin.navbar.php'; 
                         include 'view/partial/admin.aside.php';; 
                    echo '<div class="content-wrapper">';                    

                             if(strtoupper($data) == "HISTORY")
                            {   
                                $tableLogs = "View All Credits History";
                                $Dashboard_100 = strtoupper($data);
                                include 'view/partial/admin.dashboard.php';
                                include 'view/body/viewuser.body.php';                                 
                            }
                            else if(strtoupper($data) == "VIEWALLUSER")
                            {
                                $tableLogs = "View All Users";
                                $Dashboard_100 = strtoupper($data);
                                include 'view/partial/admin.dashboard.php'; //viewuser.dashboard.php
                                include 'view/body/viewuser.body.php';     
                                //print "home/about";
                            }
                            else if(strtoupper($data) == "VIEWRESELLER")
                            {
                                $tableLogs = "View All Reseller";
                                $Dashboard_100 = strtoupper($data);
                                include 'view/partial/admin.dashboard.php'; //viewuser.dashboard.php
                                include 'view/body/viewuser.body.php';     
                                //print "home/about";
                            }
                            else if(strtoupper($data) == "VIEWBLOCKUSER")
                            {
                                $tableLogs = "View All Block User";
                                $Dashboard_100 = strtoupper($data);
                                include 'view/partial/admin.dashboard.php'; //viewuser.dashboard.php
                                include 'view/body/viewuser.body.php';     
                                //print "home/about";
                            }
                            else if(strtoupper($data) == "VIEWACTIVEUSER")
                            {
                                $tableLogs = "View All Active User";
                                $Dashboard_100 = strtoupper($data);
                                include 'view/partial/admin.dashboard.php'; //viewuser.dashboard.php
                                include 'view/body/viewuser.body.php';     
                                //print "home/about";
                            }
                            else if(strtoupper($data) == "VIEWCLIENT")
                            {
                                $tableLogs = "View All Client";
                                $Dashboard_100 = strtoupper($data);
                                include 'view/partial/admin.dashboard.php'; //viewuser.dashboard.php
                                include 'view/body/viewuser.body.php';     
                                //print "home/about";
                            }
                            else
                            {
                                $Dashboard_100 = "404";
                                include 'view/partial/admin.dashboard.php';
                                echo '<center><h1> 404 Not Found </h1></center>';
                            }

                    echo ' </div>';
                    include 'view/partial/admin.footer.php'; 
                    echo 
                           '<aside class="control-sidebar control-sidebar-dark">
                          </aside>
                        </div>';
                    include 'view/partial/table.js.php';
                        echo '</body>
                                </html>';
                }
                else
                {
                    header("Location: ".$url."/home/login");
                } 
            }
            else
            {
                echo '<center><h1>404 BAD REQUEST</h1><center>';
            }

        }
        else{
            print "Error";
        }
}
?>
