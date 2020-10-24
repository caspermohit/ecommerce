<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<?php include'Header.php';?>
<br>
<br>
<br>
<br>
<br>

<body>


    <!-- Shopping cart table -->
    <div class=" container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="border-0 bg-light" style="width:40%">
                            <div class="p-2 px-3 text-uppercase">Product</div>
                        </th>
                        <th class="border-0 bg-light" style="width:15%">
                            <div class="py-2 text-uppercase">Quantity</div>
                        </th>
                        <th class="border-0 bg-light" style="width:15%">
                            <div class="py-2 text-uppercase">Price</div>
                        </th>
                        <th class="border-0 bg-light" style="width:10%">
                            <div class="py-2 text-uppercase">Discount</div>
                        </th>
                        <th class="border-0 bg-light" style="width:10%">
                            <div class="py-2 text-uppercase">subtotal</div>
                        </th>

                        <th class="border-0 bg-light" style="width:5%">
                            <div class="py-2 text-uppercase">Remove</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$totalprice=0;
$uname= $_SESSION['username'];
$sql="SELECT * FROM User1 WHERE Name='$uname'";
$stid=oci_parse($con,$sql);
oci_execute($stid);//
$row=oci_fetch_array($stid);
$user_id=$row['USER_ID'];
$qry = "SELECT * FROM CART where USER_ID =$user_id";
$stid = oci_parse($con, $qry);
oci_execute($stid);
while($row =oci_fetch_assoc($stid)){

$productid = $row['PRODUCT_ID'];
$innerqry ="SELECT PRODUCT_NAME, PRICE,CATEGORY,DISCOUNT_ID ,IMAGE FROM PRODUCT WHERE PRODUCT_ID= $productid";
$stmt =oci_parse($con, $innerqry);
oci_execute($stmt);
while($rows =oci_fetch_assoc($stmt)) {
$IMAGE = htmlspecialchars($rows['IMAGE'], ENT_QUOTES);
$quantity= $row[ 'QTY'];

$prices= $rows['PRICE'];

$total = ($rows['PRICE'] - $rows['DISCOUNT_ID'])* $row['QTY'];

$totalprice = $total + $totalprice;




?>

                    <tr>
                        <th scope="row" class="border-0">
                            <div class="p-2">

                                <div class="ml-3 d-inline-block align-middle">
                                    <a><?php echo $IMAGE ? "<img src='{$IMAGE}' style='width:50px;height:50px;' />" : "No image found.";  ?></a>
                                    <h5 class="mb-0"> <a href="#"
                                            class="text-dark d-inline-block align-middle"><?php echo $rows["PRODUCT_NAME"]; ?></a>
                                    </h5><span class="text-muted font-weight-normal font-italic d-block">Category:
                                        <?php echo $rows["CATEGORY"]; ?></span>
                                </div>
                            </div>
                        </th>
                        <td class="border-0 align-middle"><strong><?php echo $row["QTY"]; ?></strong></td>
                        <td class="border-0 align-middle"><strong>£<?php echo $rows["PRICE"]; ?></strong></td>
                        <td class="border-0 align-middle"><strong>£<?php echo $rows["DISCOUNT_ID"]; ?></strong></td>
                        <td class="border-0 align-middle"><strong>£<?php echo $totalprice; ?></strong></td>
                        <td class="border-0 align-middle"><a
                                href="delete_checkout.php?id=<?php echo $row['PRODUCT_ID']; ?>"
                                class='btn btn-danger'><span class="btn btn-danger"><span
                                        class="icon-remove_shopping_cart"></span></span></a></td>
                    </tr>
                    <?php

}
?>

                    <?php
}
?>
                </tbody>
            </table>
        </div>


        <!-- End -->


        <div class="row py-5 p-4 bg-white rounded shadow-sm">
            
            <div class="col-lg-6">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                <div class="p-4">
                    <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have
                        entered.</p>
                    <ul class="list-unstyled mb-4">



                        <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                class="text-muted">Total</strong>
                            <h5 class="font-weight-bold">£<?php echo number_format($totalprice, 2, '.', ','); ?></h5>
                        </li>

                    </ul>

                    <button class="btn btn-dark rounded-pill py-2 btn-block"
                        onclick="GFG_Fun(); this.style.visibility='hidden'" ;>Checkout</button>

                    <div id="paypal-button-container" style="display: none;"></div>
                    <script
                        src="https://www.paypal.com/sdk/js?client-id=AZXvIa6bFzraPAvTzc6TFAj12czi0EXPOeDChwudb4iV6tCGr7wRYcyVSeLSFhfdjPgM6n2B5uulKHCs&currency=GBP"
                        data-sdk-integration-source="button-factory"></script>
                </div>
            </div>
        </div>
    </div>
    <script>
    function show(divId) {
        $("#" + divId).show();
    }

    function GFG_Fun() {
        show('paypal-button-container');
        $('#GFG_DOWN').text("");
    }
    </script>
    <script>
    paypal.Buttons({
        style: {
            shape: 'pill',
            color: 'blue',
            layout: 'vertical',
            label: 'pay',

        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo $totalprice; ?>'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
                window.location.href = 'paydone.php';
            });
        }
    }).render('#paypal-button-container');
    </script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
<?php include'footer.php';?>