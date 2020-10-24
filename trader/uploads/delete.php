<?php
include ('config/database.php');
$id = $_GET['id'];
$qry = "DELETE FROM PRODUCT WHERE PRODUCT_ID = '$id'";
$stid=oci_parse($con, $qry);
oci_execute($stid);

if(row=$stid)
{
    echo "Record deleted from table";
   
}
else 
{ 
    echo "Delete Process Failed";
}
?>
