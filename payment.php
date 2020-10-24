<?php
include'config/database.php';
session_start();
// $paytime = date("m/d/Y");

// $user_id = $_SESSION["USER_ID"]=12;
if (isset($_POST['done'])) {
//$product_id = $_GET['id'];
//echo $product_id;
$a = $_POST['taskoption'];
$b = $_POST['timeoption'];

$uname= $_SESSION['username'];
$sql="SELECT * FROM User1 WHERE Name='$uname'";
$stid=oci_parse($con,$sql);
oci_execute($stid);//
$row=oci_fetch_array($stid);
$user_id=$row['USER_ID']; //this is the session user_id, you can use this to replace constant values. (edited)


}

// user id should be added to it
$qry ="SELECT * FROM CART WHERE USER_ID = $user_id";
$stid = oci_parse($con, $qry);
oci_execute($stid);

while ($row=oci_fetch_array($stid))
{
$id = $row['CART_ID'];
$user_id = $row['USER_ID'];
$product_id = $row ['PRODUCT_ID'];
$qty = $row ['QTY'];


}

/*echo "<br>";
echo "Testing";
echo $stock;
echo $amount;
*/
date_default_timezone_set('Asia/Kathmandu');
$date = date("m/d/Y");

//--------------------------------------------------------------------
$qry = "INSERT into ORDER1 (ORDER_ID, TOTAL_ORDERS, PRODUCT_ID, PAYMENT_STATUS, ORDER_TIME, COLLECTION_SLOT, COLLECTION_DAY, DELIVER_STATUS)
VALUES (SEQ_ORDER1.nextval,$qty, $product_id, 'Y', TO_DATE('$date', 'mm/dd/yyyy'), TO_CHAR('$a'),  TO_CHAR('$b'), 'Y' )";



$stmt = oci_parse($con,$qry);
$row= oci_execute($stmt);
oci_free_statement($stmt);


if ($row){
echo "<br>";
echo "<script>window.location='invoice.php'</script>";
}

//---------------------------------------------------------------------------
//echo $stock; new value of stock

oci_close($con);




?>


<!-- date_default_timezone_set('Asia/Kathmandu'); -->
<!-- echo date("m/d/Y"); -->

<!-- echo date("m/d/Y l:h:i:sa"); //complete date -->

<!-- $var = date("m/d/Y"); -->
<!-- echo $var; -->