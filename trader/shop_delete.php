<?php
include 'config/database.php';
session_start();
// if (!isset($_SESSION['trader'])) {
// header('Location: ../index.php');
// }
if (isset($_GET['id'])) {
$id = $_GET['id'];
$qry = 'DELETE FROM SHOP WHERE SHOP_ID = :shopID';
$stid = oci_parse($con, $qry);
oci_bind_by_name($stid, ':shopID', $id);
oci_execute($stid);
header('Location:shop_index.php?action=deleted');

}
else{
header('Location:shop_index.php');
}

?>