<?php
session_start();
//Set up the database access credentials
require_once('config/database.php');
if(isset($_POST['edit']))
{
$id= $_POST['id'];
$pass=$_POST['pass'];
$email=$_POST['email'];

$sql ="UPDATE User1 SET Password='$pass' WHERE User_ID='$id'";
$stid=oci_parse($con,$sql);
oci_execute($stid);

if($sql)
{
//send email

$_SESSION['email']=$email;
$_SESSION['password']=$pass;
require 'scripts/PHPMailerAutoload.php';

$mail = new PHPMailer;
$uname=$_SESSION['username'];
$pass=$_SESSION['password'];
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'clecks.emarket@gmail.com';                 // SMTP username
$mail->Password = 'Clecks@12';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$to=$_SESSION['email'];
$mail->setFrom('clecks.emarket@gmail.com', 'Clecks Emarket');
$mail->addAddress($to);     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Account Update';
$mail->Body = "
Hello " .$_SESSION['username'].",<br><br>
Your account has been updated!
<br>Your account detail has been updated as follows:
<br><br>
Password: " .$_SESSION['password']."
<br><br>
Regards,<br>
Clecks Emarket.
";

$mail->send();
header('location:updated.php');

}

}
}
?>