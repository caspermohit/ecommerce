<!DOCTYPE html>

<head>
    <title>update</title>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <link rel ="stylesheet" href = "style.css">
</head>

<body>

<?php 
$conn = oci_connect('example', 'example', '//localhost/xe'); ;
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
?>

<?php 


//include ('connection.php');
if (isset($_POST['submit']))

{

  $filename=$_FILES["uploadfile"]["name"];
  $tempname=$_FILES["uploadfile"]["tmp_name"];
  $folder="images/".$filename;
  move_uploaded_file($tempname,$folder);
  
  $prid = $_POST['id'];
  $prname = $_POST['name']; 
  $sip = $_POST['shop']; 
  $rate =$_POST['rate'];
  $did = $_POST ['discount'];
  $stid= $_POST['stock'];
  $info= $_POST['info'];
  $review = $_POST['review'];
  $cat =$_POST['cat'];
  $allergy= $_POST['all'];
  
  $isql= "UPDATE PRODUCT SET PRODUCT_NAME=':prname', SHOP_ID=':sip', PRICE=':rate', DISCOUNT_ID=':did', STOCK_ID=':stid', INFORMATION= ':info', REVIEW=':review', CATEGORY=':cat', ALLERGY_INFO=':allergy',IMAGE=':folder' 
  WHERE PRODUCT_ID=':prid'";
  
 //$isql = "INSERT INTO PRODUCT VALUES ('prid', ':prname',  ':sip', ':did', ' :stid',  ':info', ':review', ':cat', ':allergy', ':folder')"; 
 
 
 $stmt = oci_parse($conn, $isql);

 oci_bind_by_name($stmt, ":prid", $prid);
 oci_bind_by_name($stmt, ":prname", $prname);
 oci_bind_by_name($stmt, ":sip", $sip);
 oci_bind_by_name($stmt, ":rate", $rate);
 oci_bind_by_name($stmt, ":did", $did);
 oci_bind_by_name($stmt, ":stid", $stid);
 oci_bind_by_name($stmt, ":info", $info);
 oci_bind_by_name($stmt, ":review", $review);
 oci_bind_by_name($stmt, ":cat", $cat);
 oci_bind_by_name($stmt, ":allergy", $allergy);
 oci_bind_by_name($stmt, ":folder", $folder);


  $ec = oci_execute($stmt);

  if ($ec){ 
    echo "Data updated";
  }
 
}

?>

<div class= "jumbotron">
<form action="update.php" method="POST" enctype="multipart/form-data" class="bg-light" style= "align:center;">
  
<div class="form-group">
  <label>ProductID</label> 
  <input type="text" name="id" class="form-control" value ="<?php echo $_GET['pid'] ?> "><br>
</div>

<div class="form-group">
  <label>Product_Name</label> 
  <input type="text" name="name" class="form-control" value ="<?php echo $_GET['ppid'] ?>"><br>
</div>

<div class="form-group">
  <label>Shop_ID</label> 
  <input type="text" name="shop" class="form-control" value ="<?php echo $_GET['sid'] ?>"><br>
</div>

<div class="form-group">
  <label>Price</label> 
  <input type="text" name="rate" class="form-control" value ="<?php echo $_GET['prid'] ?>"><br>
</div>


<div class="form-group">
  <label>Discount</label> 
  <input type="text" name="discount" class="form-control" value = "<?php echo $_GET['stid'] ?>" ><br>
</div>

<div class="form-group">
  <label>Stock_ID</label> 
  <input type="text" name="stock" class="form-control" value ="<?php echo $_GET['stid'] ?>"><br>
</div>

<div class="form-group">
  <label>Information</label> 
  <input type="text" name="info" class="form-control" value ="<?php echo $_GET['info'] ?>"> <br>
</div>

<div class="form-group">
  <label>Review</label> 
  <input type="text" name="review" class="form-control" value ="<?php echo $_GET['psb'] ?>"><br>
</div>

<div class="form-group">
  <label>Category</label> 
  <input type="text" name="cat" class="form-control" value ="<?php echo $_GET['ctid'] ?>" ><br>
</div>


<div class="form-group">
  <label>Allergy_Info</label> 
  <input type="text" name="all" class="form-control" value ="<?php echo $_GET['aid'] ?>" ><br>
</div>


<div class="form-group">
<input type="file" name="uploadfile" value=""> <br><br>
<button type="submit" name="submit" value="Submit" class="btn btn-success btn-block">Submit</button>
</div>





