<?php
include 'config/database.php';
session_start();
// if (!isset($_SESSION['user'])) {
	// header('Location: ../index.php');
// }
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$qry = 'DELETE FROM USER1 WHERE USER_ID = :userID';
	$stid = oci_parse($con, $qry);
	oci_bind_by_name($stid, ':userID', $id);
	oci_execute($stid);
	header('Location:user_index.php?action=deleted');

}
else{
	header('Location: user_index.php');
}

?>