<?php

include'Header.php';
?>
<html>

<body>
    <br>
    <br>
    <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="1"></li>
            <li data-target="#carousel-example-1z" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item active">
                <img class="d-block w-100" src="image/ecommerce.jpg" alt="First slide">
            </div>
            <!--/First slide-->
            <!--Second slide-->
            <div class="carousel-item">
                <img class="d-block w-100" src="image/e-commerce.jpg" alt="Second slide">
            </div>
            <!--/Second slide-->
            <!--Third slide-->
            <div class="carousel-item">
                <img class="d-block w-100" src="image/slide-1.jpg" alt="Third slide">
            </div>
            <!--/Third slide-->
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->


    <!--PRODUCT DISPLAY-->
    <br>
    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-9 order-2">


                    <div class="row mb-5">

                        <section>
                            <div class="row" id="result">

                                <?php

if(isset($_POST['search']))
{
$search_term = $_POST['search'];

$search_term=preg_replace("#[^0-9a-z]#i"," ",$search_term);

$search_term = htmlspecialchars($search_term);
$split_search_terms = explode(" ", $search_term);
$search_terms = "";

foreach ($split_search_terms as $index => $term) {
if ($index == 0) {
$search_terms .= "%";
}
$search_terms .= strtolower($term);
$search_terms .= "%";
}


$sql = "SELECT * FROM Product WHERE LOWER(Product_Name) LIKE  '%$search_terms%'";
$stid = oci_parse($con, $sql);
oci_execute($stid);
$output='';


while($row = oci_fetch_array($stid))
{

?>

                                <div class="col-md-4">
                                    <div style="border:1px solid #333;width:250px; background-color:#f1f1f1; border-radius:5px;margin-bottom:8px; margin-left:50px;  margin-right:90px; padding:20px;"
                                        align="center">
                                        <form method="post" action="add_cart.php">

                                            <img src="<?php echo $row["IMAGE"]; ?>" style="width:100px;height:100px;" />
                                            <br>

                                            <h4 class="text-info"><?php echo $row["PRODUCT_NAME"];?></h4>
                                            <h4 class="text-info"><?php echo $row["CATEGORY"];?></h4>

                                            <h4 class="text-info">£ <?php echo $row["PRICE"]?></h4>

                                            <input type="number" name="hidden_quantity" value="" class="form-control"
                                                id="quantity" required />

                                            <input type="hidden" name="hidden_name"
                                                value="<?php echo ["PRODUCT_NAME"];?>" />

                                            <input type="hidden" name="hidden_price"
                                                value="<?php echo $row["PRICE"]?>" />
                                            <br>
                                            <input type="submit" name="submit" value="Add to cart"
                                                class="btn btn-primary btn-block" autocomplete="off">






                                            <div class="overlay">
                                                <h2 class="text">Information:<?php echo $row["INFORMATION"]; ?></h2>
                                                <h3 class="text-info1">Allergic info:<?php echo $row["ALLERGY_INFO"]; ?>
                                                </h3>
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


$fetch=oci_fetch($stid);
$count=oci_num_rows($stid);

if($count==0)
{
$output .='No Products Found';
}

echo $output;



}

?>


                            </div>
                        </section>



                    </div>
                    <!--carousel button needed-->
                    <div class="pagination p5">
                        <ul>

                            <a href="#">
                                <li></li>
                            </a>
                            <a class="is-active" href="#">
                                <li></li>
                            </a>
                            <a href="#">
                                <li></li>
                            </a>
                        </ul>
                    </div>

                </div>
                <!--SIDEBAR-->
                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Select Shop</h3>
                        <ul class="list-unstyled mb-0">
                            <?php
$query="SELECT DISTINCT Shop_Name FROM Product";
$stid = oci_parse($con, $query);
oci_execute($stid);

while ($row=oci_fetch_assoc($stid))
{
?>

                            <li class="mb-1">
                                <div class="form-check">

                                    <label class="d-flex form-check-label">
                                        <input type="checkbox" class="form-check-input product_check"
                                            value="<?php echo $row['SHOP_NAME']; ?>" id="shop">
                                        <?php echo $row['SHOP_NAME']; ?>
                                    </label>
                                </div>
                            </li>
                            <?php
}
?>
                        </ul>
                    </div>
                    <div class="mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                        <ul class="list-unstyled mb-0">
                            <?php
$query="SELECT DISTINCT Category FROM PRODUCT";
$stid = oci_parse($con, $query);
oci_execute($stid);


while ($row=oci_fetch_array($stid))
{
?>


                            <li class="mb-1">
                                <div class="form-check">

                                    <label class="d-flex form-check-label">
                                        <input type="checkbox" class="form-check-input product_check"
                                            value="<?php echo $row['CATEGORY'];?>" id="cat">
                                        <?php echo $row['CATEGORY'];?>
                                    </label>
                                </div>
                            </li>
                            <?php
}
?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!--SIDEBAR END-->


        <!--offer card-->
        <div class="container col-md-8">

            <!-- Section: Block Content -->
            <section>
                <!-- Nav tabs -->
                <ul class="nav md-tabs nav-justified grey lighten-3 mx-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active dark-grey-text font-weight-bold" data-toggle="tab" href="#panel5"
                            role="tab"> Bestsellers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dark-grey-text font-weight-bold" data-toggle="tab" href="#panel6"
                            role="tab">Top offers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dark-grey-text font-weight-bold" data-toggle="tab" href="#panel7"
                            role="tab">Best rated</a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content px-0 pt-5">

                    <!-- Panel 1 -->
                    <div class="tab-pane fade in show active" id="panel5" role="tabpanel">

                        <!-- Grid row -->
                        <div class="row">

                            <!-- Grid column -->
                            <div class="col-lg-4 col-md-12 mb-4 d-flex align-items-stretch">

                                <!-- Card -->
                                <div class="card card-ecommerce">

                                    <div class="view-overlay">
                                        <img src="image/1.jpg" class="img-fluid" alt="sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <div class="card-body">

                                        <h5 class="card-title mb-1"><strong><a
                                                    class="dark-grey-text">Bakery</a></strong></h5>
                                        <span class="badge badge-danger mb-2">bestseller</span>

                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>

                                        <div class="card-footer pb-0">
                                            <div class="row mb-0">
                                                <span class="float-left">
                                                    <strong>1439$</strong>
                                                </span>
                                                <span class="float-right">
                                                    <a data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                        <i class="icon-shopping_cart ml-3"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">

                                <!-- Card -->
                                <div class="card card-ecommerce">

                                    <div class="view-overlay">
                                        <img src="image/2.jpg" class="img-fluid" alt="sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <div class="card-body">

                                        <h5 class="card-title mb-1"><strong><a
                                                    class="dark-grey-text">Bakery</a></strong></h5>
                                        <span class="badge badge-danger mb-2">bestseller</span>
                                        <span class="badge badge-success mb-2 ml-2">SALE</span>

                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>

                                        <div class="card-footer pb-0">
                                            <div class="row mb-0">
                                                <h5 class="mb-0 pb-0 mt-1 font-weight-bold">
                                                    <span class="red-text">
                                                        <strong>$699</strong>
                                                    </span>
                                                    <span class="grey-text">
                                                        <small>
                                                            <s>$920</s>
                                                        </small>
                                                    </span>
                                                </h5>
                                                <span class="float-right">
                                                    <a data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                        <i class="icon-shopping_cart ml-3"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">

                                <!-- Card -->
                                <div class="card card-ecommerce">

                                    <div class="view-overlay">
                                        <img src="image/1.jpg" class="img-fluid" alt="sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <div class="card-body">

                                        <h5 class="card-title mb-1"><strong><a
                                                    class="dark-grey-text">Bakery</a></strong></h5>
                                        <span class="badge badge-danger mb-2">bestseller</span>
                                        <span class="badge badge-info mb-2 ml-2">new</span>

                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>

                                        <div class="card-footer pb-0">
                                            <div class="row mb-0">
                                                <span class="float-left">
                                                    <strong>1439$</strong>
                                                </span>
                                                <span class="float-right">
                                                    <a data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                        <i class="icon-shopping_cart ml-3"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->

                    </div>
                    <!-- Panel 1 -->

                    <!-- Panel 2 -->
                    <div class="tab-pane fade" id="panel6" role="tabpanel">

                        <!-- Grid row -->
                        <div class="row mb-3">

                            <!-- Grid column -->
                            <div class="col-lg-4 col-md-12 mb-4 d-flex align-items-stretch">

                                <!-- Card -->
                                <div class="card card-ecommerce">

                                    <div class="view-overlay">
                                        <img src="image/1.jpg" class="img-fluid" alt="sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <div class="card-body">

                                        <h5 class="card-title mb-1"><strong><a
                                                    class="dark-grey-text">Bakery</a></strong></h5>
                                        <span class="badge grey mb-2">best rated</span>

                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>

                                        <div class="card-footer pb-0">
                                            <div class="row mb-0">
                                                <span class="float-left">
                                                    <strong>1439$</strong>
                                                </span>
                                                <span class="float-right">
                                                    <a data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                        <i class="icon-shopping_cart ml-3"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">

                                <!-- Card -->
                                <div class="card card-ecommerce">

                                    <div class="view-overlay">
                                        <img src="image/1.jpg" class="img-fluid" alt="sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <div class="card-body">

                                        <h5 class="card-title mb-1"><strong><a
                                                    class="dark-grey-text">Bakery</a></strong></h5>
                                        <span class="badge badge-info mb-2">new</span>

                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>

                                        <div class="card-footer pb-0">
                                            <div class="row mb-0">
                                                <span class="float-left">
                                                    <strong>1439$</strong>
                                                </span>
                                                <span class="float-right">
                                                    <a data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                        <i class="icon-shopping_cart ml-3"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">

                                <!-- Card -->
                                <div class="card card-ecommerce">

                                    <div class="view-overlay">
                                        <img src="image/1.jpg" class="img-fluid" alt="sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <div class="card-body">

                                        <h5 class="card-title mb-1"><strong><a
                                                    class="dark-grey-text">Bakery</a></strong></h5>
                                        <span class="badge badge-info mb-2">new</span>
                                        <span class="badge badge-success mb-2 ml-2">SALE</span>

                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>

                                        <div class="card-footer pb-0">
                                            <div class="row mb-0">
                                                <h5 class="mb-0 pb-0 mt-1 font-weight-bold">
                                                    <span class="red-text">
                                                        <strong>$1199</strong>
                                                    </span>
                                                    <span class="grey-text">
                                                        <small>
                                                            <s>$1520</s>
                                                        </small>
                                                    </span>
                                                </h5>
                                                <span class="float-right">
                                                    <a data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                        <i class="icon-shopping_cart ml-3"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->

                    </div>
                    <!-- Panel 2 -->

                    <!-- Panel 3 -->
                    <div class="tab-pane fade" id="panel7" role="tabpanel">

                        <!-- Grid row -->
                        <div class="row">

                            <!-- Grid column -->
                            <div class="col-lg-4 col-md-12 mb-4 d-flex align-items-stretch">

                                <!-- Card -->
                                <div class="card card-ecommerce">

                                    <div class="view-overlay">
                                        <img src="image/1.jpg" class="img-fluid" alt="sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <div class="card-body">

                                        <h5 class="card-title mb-1"><strong><a
                                                    class="dark-grey-text">Bakery</a></strong></h5>
                                        <span class="badge badge-danger mb-2">bestseller</span>

                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>

                                        <div class="card-footer pb-0">
                                            <div class="row mb-0">
                                                <span class="float-left">
                                                    <strong>1439$</strong>
                                                </span>
                                                <span class="float-right">
                                                    <a data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                        <i class="icon-shopping_cart ml-3"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">

                                <!-- Card -->
                                <div class="card card-ecommerce">

                                    <div class="view-overlay">
                                        <img src="image/1.jpg" class="img-fluid" alt="sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <div class="card-body">

                                        <h5 class="card-title mb-1"><strong><a
                                                    class="dark-grey-text">Bakery</a></strong></h5>
                                        <span class="badge badge-info mb-2">new</span>

                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                        <div class="card-footer pb-0">
                                            <div class="row mb-0">
                                                <span class="float-left">
                                                    <strong>1439$</strong>
                                                </span>
                                                <span class="float-right">
                                                    <a data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                        <i class="icon-shopping_cart ml-3"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">

                                <!-- Card -->
                                <div class="card card-ecommerce">

                                    <div class="view-overlay">
                                        <img src="image/1.jpg" class="img-fluid" alt="sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <div class="card-body">

                                        <h5 class="card-title mb-1"><strong><a
                                                    class="dark-grey-text">Bakery</a></strong></h5>
                                        <span class="badge badge-danger mb-2">bestseller</span>

                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>

                                        <div class="card-footer pb-0">
                                            <div class="row mb-0">
                                                <span class="float-left">
                                                    <strong>1439$</strong>
                                                </span>
                                                <span class="float-right">
                                                    <a data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                        <i class="icon-shopping_cart ml-3"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->

                    </div>
                    <!-- Panel 3 -->

                </div>
                <!-- Tab panels -->

            </section>
            <!-- Section: Block Content -->

        </div>

    </div>
    <script>
    $(document).ready(function() {
        $('.product_check').click(function() {
            $('#loader').show();
            var action = 'data';
            var shop = get_filter_text('shop');
            var cat = get_filter_text('cat');

            $.ajax({
                url: 'fetch_data.php',
                method: 'POST',
                data: {
                    action: action,
                    shop: shop,
                    cat: cat
                },
                success: function(response) {
                    $('#result').html(response);
                    $('#loader').hide();
                }

            });

        });

        function get_filter_text(text_id) {
            var filterData = [];
            $('#' + text_id + ':checked').each(function() {
                filterData.push($(this).val());

            });
            return filterData;

        }


    });
    </script>
</body>

</html>
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
    width: 100%;
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

<?php include'footer.php';?>