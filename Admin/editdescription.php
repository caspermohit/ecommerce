<?php
//Set up the database access credentials
require_once('config/database.php');
if(isset($_POST['edit']))
{
	$id= $_POST['id'];
	$des=$_POST['des'];
	

	$sql ="UPDATE User1 SET About='$des' WHERE User_ID='$id'";
   $stid=oci_parse($con,$sql);
   oci_execute($stid);
     header("Location:adminprofile.php");

}
?>
