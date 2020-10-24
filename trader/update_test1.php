<!DOCTYPE html>

<head>
    <title>update shop </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="page-header" style="display:flex;justify-content: center;">
        <h1>Update shop</h1>
    </div>

    <div class="col-md-3 col-sm-3 col-3">
        <?php include 'sidebar.php'; ?>
    </div>
    <?php
    require_once 'file.php';
    if (isset($_GET['id'])) {
      $shop_id = $_GET['id'];
     
$sql = "SELECT * FROM SHOP WHERE SHOP_ID = :id";
      $stmt = oci_parse($conn,$sql);
      oci_bind_by_name($stmt, ':id', $shop_id);    
      oci_execute($stmt);
    
      while (($row = oci_fetch_array($stmt, OCI_ASSOC)) != false) {
    
        $shop_id  = $row['SHOP_ID']; 
        $shop_name  = $row['SHOP_NAME'];  
        $shop_type =  $row['SHOP_TYPE'];
        $user_id =  $row['USER_ID'];

    
       
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

                <form action="shop_update.php" method="POST" enctype="multipart/form-data" class="bg-light"
                    style="text-align:center;">

                    <div class="form-group">
                        <label>Shop Id</label>
                        <input type="text" name="id" class="form-control" value="<?php echo  $shop_id ?? '' ?> "><br>
                    </div>

                    <div class="form-group">
                        <label>Shop_Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $shop_name ?? '' ?>"><br>
                    </div>

                    <div class="form-group">
                        <label>Shop_Type</label>
                        <input type="text" name="shop" class="form-control" value="<?php echo $shop_type ?? ''?>"><br>
                    </div>

                    <div class="form-group">
                        <label>USERID</label>
                        <input type="text" name="uid" class="form-control" value="<?php echo $user_id ?? '' ?>"><br>
                    </div>



                    <div class="form-group">

                        <button type="submit" name="submit" value="Submit"
                            class="btn btn-success btn-block"><?=  isset($shop_id) ? 'Updated' : 'Submit' ?></button>
                    </div>


                </form>

            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>