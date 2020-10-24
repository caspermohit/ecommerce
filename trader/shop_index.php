<!DOCTYPE html>

<head>
    <title>index</title>

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


    <!-- container -->

    <div class="page-header" style="display:flex;justify-content: center;">
        <h1>Read shop</h1>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 col-sm-3 col-3">
               
            </div>

            <div class="col-md-9 col-sm-9 col-9">

                <?php
include 'config/database.php';

session_start();
$uname= $_SESSION['username'];

$sql="SELECT USER_ID FROM User1 WHERE Name='$uname'";
$stid=oci_parse($con,$sql);
oci_execute($stid);
$row=  oci_fetch_assoc($stid);
$id = $row['USER_ID'];
//echo $id;

$action = isset($_GET['action']) ? $_GET['action'] : "";

// if it was redirected from delete.php
if($action=='deleted'){
echo "<div class='alert alert-danger'>Record was deleted.</div>";
}
$qry = "SELECT * FROM SHOP WHERE USER_ID = '$id'";  //this is table in APEX Oracle
$stid = oci_parse($con, $qry);
oci_execute($stid);

echo "<a href='shop_create.php' class='btn btn-primary m-b-1em'>Create New shop</a>";
echo "<table class='table table-hover table-responsive table-bordered'>";//start table

//creating our table heading
"<tr>";
echo "<th>ID</th>";

echo"<th> SHOP_NAME</th>";
echo"<th>SHOP TYPE</th>";
echo"<th>USER_ID</th>";

echo"<th>Action</th>";
"</tr>";

while ($row=oci_fetch_array($stid))
{
?>


                <tr>
                    <td><?php echo $row['SHOP_ID']; ?></td>
                    <td><?php echo $row['SHOP_NAME']; ?></td>
                    <td><?php echo $row['SHOP_TYPE']; ?></td>
                    <td><?php echo $row['USER_ID']; ?></td>



                    <td>

                        <a href="update_test1.php?id=<?= $row['SHOP_ID'] ?>" class="btn btn-success ">Edit</a>



                        <a href="shop_delete.php?id=<?php echo $row['SHOP_ID']; ?>" class='btn btn-danger'>Delete</a>

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