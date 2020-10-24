<?php
require_once 'file.php';
if (isset($_POST['id'])) {


$id = $_POST['id'];
$name  = $_POST['name'];




$shop = $_POST['shop'];
$price = $_POST['rate'];
$discount = $_POST['discount'];
$stock = $_POST['stock'];
$information = $_POST['info'];
$review = $_POST['review'];
$category = $_POST['cat'];
$allergy = $_POST['all'];
$filename=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="uploads/".$filename;
move_uploaded_file($tempname,$folder);


$stid = oci_parse($conn,'UPDATE PRODUCT SET PRODUCT_NAME = :product_name, SHOP_NAME= :shop_name, PRICE = :rate_number, DISCOUNT_ID = :discount_number,
STOCK = :stock_number, INFORMATION = :info_product, REVIEW = :customer_review, CATEGORY = :category_list, ALLERGY_INFO = :all_item, IMAGE = :folder_name WHERE PRODUCT_ID= :product_id');

oci_bind_by_name($stid,':product_name',$name);
oci_bind_by_name($stid,':shop_name',$shop);
oci_bind_by_name($stid,':rate_number', $price);
oci_bind_by_name($stid,':discount_number', $discount);
oci_bind_by_name($stid,':stock_number', $stock);
oci_bind_by_name($stid,':info_product', $information);
oci_bind_by_name($stid,':customer_review', $review);
oci_bind_by_name($stid,':category_list', $category);
oci_bind_by_name($stid,':all_item', $allergy);
oci_bind_by_name($stid,':folder_name', $folder);
oci_bind_by_name($stid,':product_id',$id);

oci_execute($stid);
if($stid){
header ('Location:index.php');
}
oci_free_statement($stid);
oci_close($conn);





}