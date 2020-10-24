<!DOCTYPE html>

<head>
    <title>update</title>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
   <!-- Latest compiled and minified Bootstrap JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="page-header"style="display:flex;justify-content: center;">
            <h1>Update Product</h1>
        </div>

        <div class="col-md-3 col-sm-3 col-3">
        <?php include 'sidebar.php'; ?>
    </div>
<?php
    require_once 'file.php';
    if (isset($_GET['id'])) {
      $product_id = $_GET['id'];
     
      $sql = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = :id";
      $stmt = oci_parse($conn,$sql);
      oci_bind_by_name($stmt, ':id', $product_id);    
      oci_execute($stmt);
    
      while (($row = oci_fetch_array($stmt, OCI_ASSOC)) != false) {
    
        $product_id  = $row['PRODUCT_ID']; 
        $product_name  = $row['PRODUCT_NAME'];  
       
        $shop = $row['SHOP_NAME'];
        $price = $row['PRICE'];
        $discount = $row['DISCOUNT_ID']; 
        $stock = $row ['STOCK'];
        $info = $row ['INFORMATION'];
        // $review = $row ['REVIEW'];
        $category =$row ['CATEGORY'];
        $allergy = $row ['ALLERGY_INFO'];

    
       
 }
 oci_free_statement($stmt);
 oci_close($conn);
 
  } 
 ?>

<div class="container">
<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6">

<form action="product_update.php" method="POST" enctype="multipart/form-data" class="bg-light" style= "text-align:center;">
<table class='table table-hover table-responsive table-bordered'>
<tr class="form-group">
  <label>ProductID</label> 
  <input type="text" name="id" class="form-control" value ="<?php echo  $product_id ?? '' ?> "><br>
</tr>

<tr class="form-group">
  <label>Product_Name</label> 
  <input type="text" name="name" class="form-control" value ="<?php echo $product_name ?? '' ?>"><br>
</tr>

<tr class="form-group">
  <label>Shop_Name</label>  
  <input type="text" name="shop" class="form-control" value ="<?php echo $shop ?? ''?>"><br>
</tr>

<tr class="form-group">
  <label>Price</label> 
  <input type="text" name="rate" class="form-control" value ="<?php echo $price ?? '' ?>"><br>
</tr>


<tr class="form-group">
  <label>Discount</label> 
  <input type="text" name="discount" class="form-control" value = "<?php echo $discount ?? '' ?>" ><br>
</tr>

<tr class="form-group">
  <label>Stock</label> 
  <input type="text" name="stock" class="form-control" value ="<?php echo $stock ?? '' ?>"><br>
</tr>

<tr class="form-group">
  <label>Information</label> 
  <input type="text" name="info" class="form-control" value ="<?php echo $info ?? '' ?>"> <br>
</tr>

<!-- <tr class="form-group">
  <label>Review</label> 
  <input type="text" name="review" class="form-control" value ="<?php echo $review ?? '' ?>"><br>
</tr> -->

<tr class="form-group">
  <label>Category</label> 
  <input type="text" name="cat" class="form-control" value ="<?php echo $category ?? '' ?>" ><br>
</tr>


<tr class="form-group">
  <label>Allergy_Info</label> 
  <input type="text" name="all" class="form-control" value ="<?php echo $allergy ?? '' ?>" ><br>
</tr>


<tr class="form-group">
<input type="file" name="uploadfile" value=""> <br><br>

</tr>
<td>
<button type="submit" name="submit" value="Submit" class="btn btn-success "><?=  isset($product_id) ? 'Update' : 'Submit' ?></button>

<a href='index.php' class='btn btn-danger'>Back to read products</a>
</td>


 </form> 
 </table >
</div>
<div class="col-md-3">
</div>
</div>
</div>



   







   




