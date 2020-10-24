<!DOCTYPE html>

<head>
    <title>Create product</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
    .m-r-1em {
        margin-right: 1em;
    }

    .m-b-1em {
        margin-bottom: 1em;
    }

    .m-l-1em {
        margin-left: 1em;
    }

    .mt0 {
        margin-top: 0;
    }
    </style>

</head>

<body>
    <div class="page-header" style="display:flex;justify-content: center;">
        <h1>Read Products</h1>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 col-sm-3 col-3">
              
            </div>

            <div class="col-md-9 col-sm-9 col-9">

                <?php
include ('config/database.php');
session_start();
$action = isset($_GET['action']) ? $_GET['action'] : "";

// if it was redirected from delete.php
if($action=='deleted'){
echo "<div class='alert alert-danger'>Record was deleted.</div>";
}

$uname= $_SESSION['username'];

/*
$sql="SELECT * FROM User1 WHERE Name='$uname'";
$stid=oci_parse($con,$sql);
oci_execute($stid);//
$row=oci_fetch_array($stid);
$usrname=$row['NAME']; //this is the session user_id, you can use this to replace constant values. (edited)
*/

$qry = "SELECT * FROM PRODUCT where (ENTERED_BY)= '$uname'";  //this is table in APEX Oracle

$stid = oci_parse($con, $qry);
oci_execute($stid);

echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";
echo "<table class='table table-hover table-responsive table-bordered'>";//start table





//creating our table heading
"<tr>";
echo "<th>ID</th>";
echo"<th>Name</th>";
echo"<th>shop Name</th>";
echo"<th>Price</th>";
echo"<th>stock</th>";
echo"<th>Category</th>";
echo"<th>infromation</th>";
echo"<th>ALLERGY IFO</th>";
echo"<th>image</th>";
echo"<th>Action</th>";
"</tr>";

while ($row=oci_fetch_array($stid))
{$IMAGE = htmlspecialchars($row['IMAGE'], ENT_QUOTES);
?>


                <tr>
                    <td><?php echo $row['PRODUCT_ID']; ?></td>
                    <td><?php echo $row['PRODUCT_NAME']; ?></td>
                    <td><?php echo $row['SHOP_NAME']; ?></td>
                    <td><?php echo $row['PRICE']; ?></td>
                    <td><?php echo $row['STOCK']; ?></td>
                    <td><?php echo$row['CATEGORY']; ?></td>
                    <td><?php echo $row['INFORMATION']; ?></td>
                    <td><?php echo$row['ALLERGY_INFO']; ?></td>
                    <td><?php echo $IMAGE ? "<img src='{$IMAGE}' style='width:50px;height:50px;' />" : "No image found.";  ?>
                    </td>


                    <td>

                        <a href="update_test.php?id=<?= $row['PRODUCT_ID'] ?>" class="btn btn-success ">Edit</a>



                        <a href="delete.php?id=<?php echo $row['PRODUCT_ID']; ?>" class='btn btn-danger'>Delete</a>

                    </td>
                </tr>

                </tr>



                <?php
}

?>

            </div>


        </div>
        <?php include 'sidebar.php'; ?>
    </div>



    </div>


    <!-- end .container -->
    <!-- <script type='text/javascript'> -->
    <!-- // confirm record deletion -->
    <!-- function delete_user( id ){ -->

    <!-- var answer = confirm('Are you sure?'); -->
    <!-- if (answer){ -->
    <!-- // if user clicked ok,  -->
    <!-- // pass the id to delete.php and execute the delete query -->
    <!-- window.location = 'delete.php?id =' + id; -->
    <!-- }  -->
    <!-- } -->
    <!-- </script> -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>