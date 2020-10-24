<?php include'Header.php';?>

<body>


    <!--slider-->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/ecommerce.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">

                    <h1 style="color:black;">Make your shopping easy!!!!</h1>
                    <p style="color:black;font-size:20px;">We have huge variety of items for Clerkhuddersfax's people
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/e-commerce.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1 style=";">Save time Save Money Clerkhuddersfax people </h1>
                    <p style="color:black;font-size:20px;">Clerkhuddersfax people have the easiest way to shop multiple
                        Products in one place.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/slide-1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1 style="color:rgb(121, 204, 219);">Time has come for the greatest time to save the money with
                        exciting discounts and time by shopping at one place!</h1>
                    <p style="color:rgb(121, 204, 219);font-size:50px;">Great sale!!!!!! on the new opening of
                        <strong>Cleck E-market</strong>.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--slider-->
    <!--welcome part-->
    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4"><strong>The world of Clerck E-Market</strong></h1>
            </div>
            <hr>
            <div class="col-12">
                <p class="lead">The Cleck E-market aim is to provide our customers best products please register an
                    account to use our services.
                    <strong>The Cleck E-market sets the standard for consistently exceptional customer service.
                        Who else sells you greet you?.We do.“Our business is earning your trust” and we like doing that
                        as fast as we can.
                    </strong> Through word of mouth, a lot of hard work and a commitment to producingone-of-a-kind
                    products,
                    The Cleck E-market aim is to become one of the most beloved online Ecommerce Site in
                    Clerkhuddersfax area.
                    <a href="index.php">The Cleck E-market</a> </p>
            </div>
        </div>
    </div>
    <!--welcome part-->
    <br>
    <hr class="my-4">
    <br>
    <!--product cards-->
    <div class="container ">

        <!-- Section: Block Content -->
        <section>

            <h1 class="font-weight-bold text-center dark-grey-text mb-5">Popular Products</h1>

            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->

                <?php
$qry = "SELECT * FROM CART WHERE ROWNUM <= 6 ";
$stmt = oci_parse($con, $qry);
oci_execute($stmt);

while($rows=oci_fetch_array($stmt)){
$products= $rows['PRODUCT_ID'];


$qry = "SELECT * FROM PRODUCT where PRODUCT_ID =$products";
$stid = oci_parse($con, $qry);
if(oci_execute($stid))
{
while($row=oci_fetch_array($stid))
{$IMAGE = htmlspecialchars($row['IMAGE'], ENT_QUOTES);
?>
                <div class="col-md-4">
                    <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px;margin-bottom:8px; padding:20px;"
                        align="center">
                        <form method="post" action="add_cart.php">

                            <?php echo $IMAGE ? "<img src='{$IMAGE}' style='width:100px;height:100px;' />" : "No image found.";  ?><br />

                            <h4 class="text-info"><?php echo $row["PRODUCT_NAME"]; ?></h4>
                            <h4 class="text-info"><?php echo $row["CATEGORY"]; ?></h4>

                            <h4 class="text-info">£ <?php echo $row["PRICE"]; ?></h4>

                            <input type="number" name="hidden_quantity" value="" class="form-control" id="quantity"
                                required />

                            <input type="hidden" name="hidden_name" value="<?php echo $row["PRODUCT_NAME"]; ?>"
                                id="name" />

                            <input type="hidden" name="hidden_price" value="<?php echo $row["PRICE"]; ?>" id="price" />

                            <input type="hidden" name="hidden_id" value="<?php echo $row['PRODUCT_ID']; ?>">
                            <br>
                            <input type="submit" name="submit" value="Add to cart" class="btn btn-primary btn-block"
                                autocomplete="off">






                            <div class="overlay">
                                <div class="text">information:<?php echo $row["INFORMATION"]; ?></div>
                                <div class="text-info1">Allergic info:<?php echo $row["ALLERGY_INFO"]; ?></div>
                            </div>
                        </form>
                        <form method="post" action="review.php">
                            <input type="hidden" name="id" value="<?php echo $row["PRODUCT_ID"];?>">
                            <button style="margin-top:10px;" name="submit" type="submit"
                                class="btn btn-outline-secondary">Reviews</button>
                        </form>
                    </div>
                </div>
                <?php
}
}
}
?>




            </div>
            <!-- Grid row -->




        </section>
        <!-- Section: Block Content -->
    </div>
    <!--product cards finished-->

    <hr class="my-4">
    <!--discription-->
    <div class="container mt-5">


        <!--Section: Content-->
        <section class="">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-5 col-md-12 mb-lg-0 mb-4">

                    <!-- Featured image -->
                    <div class="view-overlay rounded z-depth-1 mb-lg-0 mb-4">
                        <a href="index.php"><img class="img-fluid" src="image/logo.png" alt="Sample image"></a>

                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-7 col-md-6 mb-md-0 mb-4 mt-xl-4">

                    <h1 class="font-weight-normal mb-4">About our <strong>Clerk E-market</strong> website</h1>
                    <p class="text-muted">The Cleck E-market aim is to provide our customers best products please
                        register an account to use our services.
                        <sapn id="dots">...</sapn><span id="more"><strong>The Cleck E-market sets the standard for
                                consistently exceptional customer service.
                                Who else sells you greet you?.We do.“Our business is earning your trust” and we like
                                doing that as fast as we can.
                            </strong> Through word of mouth, a lot of hard work and a commitment to
                            producingone-of-a-kind products,
                            The Cleck E-market aim is to become one of the most beloved online Ecommerce Site in
                            Clerkhuddersfax area.
                            <a href="index.php">The Cleck E-market</a></span></p>
                    <button class="btn btn-outline-primary mx-0" id="read" onclick="read()">read more</button>

                    <script>
                    var i = 0;

                    function read() {
                        if (!i) {
                            document.getElementById("more").style.display = "inline";
                            document.getElementById("dots").style.display = "none";
                            document.getElementById("read").innerHTML = "read less";
                            i = 1;
                        } else {

                            document.getElementById("more").style.display = "none";
                            document.getElementById("dots").style.display = "inline";
                            document.getElementById("read").innerHTML = "read more";
                            i = 0;
                        }
                    }
                    </script>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </section>
        <!--Section: Content-->


    </div>
    <!-- discription-->
    <hr class="my-4">
    <!--buzz-->
    <div class="container z-depth-1 my-5">

        <section class="text-center py-5">

            <h1 class="mb-4 pb-2 lead font-weight-bold"><strong>The local Buzz,as seen in:</strong></h1>

            <!--  trader Logo carousel -->
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="1800">
                <div class="carousel-inner">
                    <!-- First slide -->
                    <div class="carousel-item active">
                        <!--Grid row-->
                        <div class="row">

                            <!--First column-->
                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                <img src="image/Fresh Mart.png" class="img-fluid px-4" alt="Logo">
                            </div>
                            <!--/First column-->

                            <!--Second column-->
                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                <img src="image/FreshBakery.png" class="img-fluid px-4" alt="Logo">
                            </div>
                            <!--/Second column-->

                            <!--Third column-->
                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                <img src="image/Fresh Meat.png" class="img-fluid px-4" alt="Logo">
                            </div>
                            <!--/Third column-->

                            <!--Fourth column-->
                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                <img src="image/FreshDeli.png" class="img-fluid px-4" alt="Logo">
                            </div>
                            <!--/Fourth column-->

                        </div>
                        <!--/Grid row-->
                    </div>
                    <!-- First slide -->

                    <!-- Second slide -->
                    <div class="carousel-item">
                        <!--Grid row-->
                        <div class="row">

                            <!--First column-->
                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                <img src="image/FishShop.png" class="img-fluid px-4" alt="Logo">
                            </div>
                            <!--/First column-->

                            <!--Second column-->
                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                <img src="image/Fresh Mart.png" class="img-fluid px-4" alt="Logo">
                            </div>
                            <!--/Second column-->

                            <!--Third column-->
                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                <img src="image/Fresh Meat.png" class="img-fluid px-4" alt="Logo">
                            </div>
                            <!--/Third column-->

                            <!--Fourth column-->
                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                <img src="image/FreshBakery.png" class="img-fluid px-4" alt="Logo">
                            </div>
                            <!--/Fourth column-->

                        </div>
                        <!--/Grid row-->
                    </div>
                    <!-- Second slide -->

                    <!-- Third slide -->
                    <div class="carousel-item">
                        <!--Grid row-->
                        <div class="row">

                            <!--First column-->
                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                <img src="image/FreshDeli.png" class="img-fluid px-4" alt="Logo">
                            </div>
                            <!--/First column-->

                            <!--Second column-->
                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                <img src="image/FreshBakery.png" class="img-fluid px-4" alt="Logo">
                            </div>
                            <!--/Second column-->

                            <!--Third column-->
                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                <img src="image/Fresh Mart.png" class="img-fluid px-4" alt="Logo">
                            </div>
                            <!--/Third column-->

                            <!--Fourth column-->
                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                <img src="image/FishShop.png" class="img-fluid px-4" alt="Logo">
                            </div>
                            <!--/Fourth column-->

                        </div>
                        <!--/Grid row-->
                    </div>
                    <!-- Third slide -->
                </div>

            </div>
            <!--trader  Logo carousel -->

        </section>

    </div>
    <!--buzz-->
</body>
<?php include 'footer.php';?>
<style>
.overlay {
    position: absolute;
    bottom: 0;
    left: 0.5;
    right: 1;
    top: 0;
    background-color: #008CBA;
    opacity: 75%;
    overflow: hidden;
    width: 85%;
    height: 56%;
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
    color: black;
    font-size: 20px;
    position: absolute;
    top: 20%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
}

.text-info1 {
    color: black;
    font-size: 15px;
    position: absolute;
    top: 60%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
}
</style>