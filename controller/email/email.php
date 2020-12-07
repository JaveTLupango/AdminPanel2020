<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';

$mail = new PHPMailer(true);            // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 3;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.hostinger.ph';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@vpnproviderph.site';                 // SMTP username
    $mail->Password = 'vpnproviderph';                     // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ));

    //Recipients

    $mail->setFrom('info@vpnproviderph.site', 'vpnproviderph');
    $mail->addAddress('lupangojave@gmail.com', 'Jave Lupango'); 

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test Only';
    $mail->Body    = '

            <center>
                <tbody>
                <tr height="32" style="height:32px">
                    <td>
                        
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <div>
                            <div>
                                
                            </div>
                        </div>
                        <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px">
                            <tbody>
                                <tr>
                                    <td width="8" style="width:8px">                            
                                    </td>
                                    <td>
                                        <div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px" align="center" class="">
                                            <img width="75" height="24" src="../picture/dafault/logo.jpg" style="width:200px;height:130px;margin-bottom:-10px" class="CToWUd">
                                            <div style="font-family:,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                                             <div style="font-size:30px">
                                                CHBC Ministry
                                            </div>
                                         
                                            </div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">

                                            Thank You Jave Lupango For Sending Us email. <br> We Appreciate Your effort And We Do Our Best To Response Youre Concern Immediately. <br> Thank You And GOD BLESS..

                                                <div style="padding-top:32px;text-align:center">

                                                    <a href="http://www.chbc-ministry.cf/" style="padding: 15px 25px;font-size: 24px;text-align: center;cursor: pointer;outline: none;color: #fff;background-color: #4CAF50;border: none; border-radius: 15px;box-shadow: 0 9px #999;" type="button" class="btn button">Visit Our WebSite</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>                       
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr height="32" style="height:32px">
                    <td>
                        <center>NOTE: Donot Reply; This Message is System Generated!...</center> 
                    </td>
                </tr>
            </tbody></center>

    ' ;

    $mail->send();                   
                    
    echo 'Message has been sent';

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>