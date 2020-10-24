<?php
include 'config/database.php';
session_start();
// if (!isset($_SESSION['trader'])) {
// header('Location: ../index.php');
// }
if (isset($_GET['id'])) {
$id = $_GET['id'];
$qry = 'DELETE FROM PRODUCT WHERE PRODUCT_ID = :productID';
$stid = oci_parse($con, $qry);
oci_bind_by_name($stid, ':productID', $id);
oci_execute($stid);
header('Location:index.php?action=deleted');

}
else{
header('Location: index.php');
}

?>