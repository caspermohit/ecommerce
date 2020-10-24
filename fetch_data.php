<html>

<body>
    <html>

    <body>

        <?php
require'config/database.php';

if(isset($_POST["action"]))

{
if (isset($_POST['shop']))
{
$shop=$_POST['shop'];
$shop_filter = implode(',',$shop); //convert variable value from array to string
$sql ="SELECT * FROM Product WHERE Shop_Name IN ('".$shop_filter."')";
$stid = oci_parse($con,$sql);
oci_execute($stid);
$output='';
?>



        <?php
while ($row=oci_fetch_array($stid))
{
echo $output =  '
<div class="col-md-4">
<div style="border:1px solid #333; width:250px; background-color:#f1f1f1; border-radius:5px;margin-bottom:20px; margin-left:50px;  margin-right:90px; padding:20px;" align="center">
<form method="post" action="add_cart.php">

<img src='.$row["IMAGE"].' style="width:100px;height:100px;"><br/>

<h4 class="text-info">'.$row["PRODUCT_NAME"].'</h4>
<h4 class="text-info">'.$row["CATEGORY"].'</h4>

<h4 class="text-info">$ '.$row["PRICE"].'</h4>

<input type="number" name="hidden_quantity" value="" class="form-control" id ="quantity" required />

<input type="hidden" name="hidden_name" value="'.$row["PRODUCT_NAME"].'" />

<input type="hidden" name="hidden_price" value="'.$row["PRICE"].'" />
<br>
<input type = "submit"   name= "submit" value= "Add to cart" class="btn btn-primary btn-block" autocomplete= "off">
<div class="overlay">
<h2 class="text">Information:'.$row["INFORMATION"].' </h2>
<h3 class="text-info1">Allergic info:  '.$row["ALLERGY_INFO"].'</h3>
</div>
</form>

<form method="post" action="review.php">
<input type="hidden" name="id" value="'.$row["PRODUCT_ID"].'">
<button style="margin-top:10px;" name="submit" type="submit" class="btn btn-outline-secondary">Reviews</button>
</form>
</div>
</div>';
}
}



if (isset($_POST['cat']))
{
$cat=$_POST['cat'];
$cat_filter = implode(',',$cat);

$sql = "SELECT * FROM Product WHERE Category IN ('$cat_filter')";
$stid = oci_parse($con,$sql);
oci_execute($stid);

$output='';
while ($row=oci_fetch_assoc($stid))
{
echo $output =  '<div class="col-md-4">
<div style="border:1px solid #333; width:250px; background-color:#f1f1f1; border-radius:5px;margin-bottom:20px; margin-left:50px;  margin-right:90px; padding:20px;" align="center">
<form method="post" action="add_cart.php">
<img src='.$row["IMAGE"].' style="width:100px;height:100px;"><br/>

<h4 class="text-info">'.$row["PRODUCT_NAME"].'</h4>
<h4 class="text-info">'.$row["CATEGORY"].'</h4>

<h4 class="text-info">$ '.$row["PRICE"].'</h4>

<input type="number" name="hidden_quantity" value="" class="form-control" id ="quantity" required />

<input type="hidden" name="hidden_name" value="'.$row["PRODUCT_NAME"].'" />

<input type="hidden" name="hidden_price" value="'.$row["PRICE"].'" />
<br>
<input type = "submit"   name= "submit" value= "Add to cart" class="btn btn-primary btn-block" autocomplete= "off">

<div class="overlay">
<h2 class="text">Information:'.$row["INFORMATION"].' </h2>
<h3 class="text-info1">Allergic info:  '.$row["ALLERGY_INFO"].'</h3>
</div>
</form>
<form method="post" action="review.php">
<input type="hidden" name="id" value="'.$row["PRODUCT_ID"].'">
<button style="margin-top:10px;" name="submit" type="submit" class="btn btn-outline-secondary">Reviews</button>
</form>
</div>

</div>';
}
}
}

?>
        </div>
        </section>
        </div>
        <style>
        .pagination {
            padding: 0;
            justify-content: center;
        }

        .pagination ul {
            margin-top: -81px;
            margin-bottom: auto;
            padding: 0;
            list-style-type: none;
        }

        .pagination a {
            display: inline-block;
            padding: 10px 18px;
            color: #222;
        }

        .p5 a {
            width: 30px;
            height: 5px;
            padding: 0;
            margin: auto 5px;
            background-color: rgba(46, 204, 113, 0.4);
        }

        .p5 .is-active {
            background-color: #2ecc71;
        }


        .overlay {
            position: absolute;
            bottom: 0;
            left: 1;
            right: 1;
            top: 0;
            background-color: #008CBA;
            opacity: 75%;
            overflow: hidden;
            width: 90%;
            height: 54%;
            -webkit-transform: scale(0);
            -ms-transform: scale(0);
            transform: scale(0);
            -webkit-transition: .3s ease;
            transition: .3s ease;
        }

        .col-md-4:hover .overlay {
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
        }

        .text {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 15%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .text-info1 {
            color: white;
            font-size: 15px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }
        </style>
    </body>

    </html>