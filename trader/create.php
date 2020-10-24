<!DOCTYPE HTML>
<html>

<head>
    <title>create product</title>

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

if($_POST){


include 'config/database.php';
session_start();
$uname= $_SESSION['username'];


$filename=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="./uploads/".$filename;
move_uploaded_file($tempname,$folder);



$PRODUCT_NAME=htmlspecialchars(strip_tags($_POST['PRODUCT_NAME']));
$SHOP_NAME=htmlspecialchars(strip_tags($_POST['SHOP_NAME']));
$PRICE=htmlspecialchars(strip_tags($_POST['PRICE']));
$STOCK=htmlspecialchars(strip_tags($_POST['STOCK']));
$INFROMATION=htmlspecialchars(strip_tags($_POST['INFROMATION']));
$CATEGORY=htmlspecialchars(strip_tags($_POST['CATEGORY']));
$ALLERGY_INFO=htmlspecialchars(strip_tags($_POST['ALLERGY_INFO']));
$DISCOUNT_AMOUNT=htmlspecialchars(strip_tags($_POST['DISCOUNT']));




$qry= "INSERT INTO PRODUCT (PRODUCT_ID,PRODUCT_NAME,SHOP_NAME,PRICE, DISCOUNT_ID, STOCK,INFORMATION,CATEGORY,ALLERGY_INFO, ENTERED_BY, IMAGE)
VALUES (SEQ_PRODUCT.nextval ,'$PRODUCT_NAME', '$SHOP_NAME', '$PRICE','$DISCOUNT_AMOUNT','$STOCK','$INFROMATION','$CATEGORY','$ALLERGY_INFO','$uname','$folder')";

$stid=oci_parse($con, $qry);

if(oci_execute($stid))
{
echo "<div class='alert alert-success'>Record was saved.</div>";

}else{
echo "<div class='alert alert-danger'>Record not found.</div>";
}
}

?>



                    <h1> Insert Product </h1>

                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <table class='table table-hover table-responsive table-bordered'>

                            <tr>
                                <td>PRODUCT_NAME</td>
                                <td><input type='text' name='PRODUCT_NAME' class='form-control' required /></td>
                            </tr>

                            <tr>
                                <td>SHOP_NAME</td>
                                <td><input type='text' name='SHOP_NAME' class='form-control' required /></td>
                            </tr>
                            <tr>
                                <td>PRICE</td>
                                <td><input type='number' name='PRICE' class='form-control' required /></td>
                            </tr>
                            <tr>
                                <td>STOCK</td>
                                <td><input type='number' name='STOCK' class='form-control' required /></td>
                            </tr>

                            <tr>
                                <td>DISOUNT AMOUNT</td>
                                <td><input type='number' name='DISCOUNT' class='form-control' required /></td>
                            </tr>

                            <tr>
                                <td>INFORMATION</td>
                                <td><textarea name='INFROMATION' class='form-control' required></textarea></td>
                            </tr>
                            <tr>
                                <td>CATEGORY</td>
                                <td><input type='text' name='CATEGORY' class='form-control' required /></td>
                            </tr>
                            <tr>
                                <td>ALLERGY_INFO</td>
                                <td><textarea name='ALLERGY_INFO' class='form-control' required></textarea></td>
                            </tr>
                            <tr>
                                <td>IMAGE</td>
                                <td><input type="file" name="uploadfile" required /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type='submit' value='Save' class='btn btn-primary'>Submit</button>
                                    <a href='index.php' class='btn btn-danger'>Back to read products</a>
                                </td>
                            </tr>
                        </table>
                    </form>


                </div>
            </div>
        </div>

        <!-- html form here where the product information will be entered -->


    </div> <!-- end .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src='https://unpkg.com/feather-icons'></script>
    <script src="./script.js"></script>


    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>

</html>