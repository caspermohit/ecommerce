<!DOCTYPE HTML>
<html>

<head>
    <title>create shop</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>

<body>

    <!-- container -->
    <div class="container" style=" width: 950px;
content= justify" ;>

        <div class="container-fluid">
            <div class="row">



                <div class="col-md-3 col-sm-3 col-3">
                    <?php include 'sidebar.php'; ?>
                </div>

                <div class="col-md-9 col-sm-9 col-9">

                    <?php
include 'config/database.php';

session_start();

$uname= $_SESSION['username'];
//echo $uname;

$sql="SELECT USER_ID FROM User1 WHERE Name='$uname'";
$stid=oci_parse($con,$sql);
oci_execute($stid);
$row=  oci_fetch_assoc($stid);
$user_id = $row['USER_ID'];
//echo $user_id;


if($_POST){

$SHOP_NAME=htmlspecialchars(strip_tags($_POST['SHOP_NAME']));
$SHOP_TYPE=htmlspecialchars(strip_tags($_POST['SHOP_TYPE']));


$qry="INSERT INTO SHOP (SHOP_ID,SHOP_NAME,SHOP_TYPE,USER_ID) VALUES (seq_Shop.nextval ,'$SHOP_NAME', '$SHOP_TYPE', '$user_id')";

$stid=oci_parse($con, $qry);

if(oci_execute($stid))
{

echo "<div class='alert alert-success'>Record was saved.</div>";

}else{
echo "<div class='alert alert-danger'>Record not found.</div>";
}
}

?>


                    <div class="page-header">
                        <h1>Create shop</h1>
                    </div>

                    <form action="shop_create.php" method="post" enctype="multipart/form-data">

                        <table class='table table-hover table-responsive table-bordered'>

                            <tr>
                                <td>SHOP_NAME</td>
                                <td><input type='text' name='SHOP_NAME' class='form-control' required /></td>
                            </tr>

                            <tr>
                                <td>SHOP_TYPE</td>
                                <td><input type='text' name='SHOP_TYPE' class='form-control' required /></td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>
                                    <button type='submit' value='Save' class='btn btn-primary'>Submit</button>
                                    <a href='shop_index.php' class='btn btn-danger'>Back to read shop</a>
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>

                <!-- end .container -->

                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                <script src='https://unpkg.com/feather-icons'></script>
                <script src="./script.js"></script>


                <!-- Latest compiled and minified Bootstrap JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>

</html>