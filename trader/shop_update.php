<?php
require_once 'file.php';
if (isset($_POST['id'])) {



$shop_id  = $_POST['id'];
$shop_name  = $_POST['name'];
$shop_type =  $_POST['shop'];
$user_id =  $_POST['uid'];


$stid = oci_parse($conn,'UPDATE SHOP SET SHOP_NAME = :shop_name, SHOP_TYPE= :shop_type, USER_ID= :user_id WHERE SHOP_ID= :shop_id');


oci_bind_by_name($stid,':shop_name',$shop_name);
oci_bind_by_name($stid,':shop_type', $shop_type);
oci_bind_by_name($stid,':user_id', $user_id);
oci_bind_by_name($stid,':shop_id', $shop_id);

oci_execute($stid);

if($stid){
header ('Location:shop_index.php');
}
oci_free_statement($stid);
oci_close($conn);





}