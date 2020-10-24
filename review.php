<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<?php 
include'Header.php';
session_start();
?>
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
                        <th class="border-0 bg-light" style="width:30%">
                        </th>
                        <th class="border-0 bg-light" style="width:20%">
                            <div class="p-2 px-3 text-uppercase">Product Name</div>
                        </th>
                        <th class="border-0 bg-light" style="width:10%">
                            <div class="py-2 text-uppercase">Price</div>
                        </th>
                        <th class="border-0 bg-light" style="width:10%">
                            <div class="py-2 text-uppercase">Description</div>
                        </th>
                        <th class="border-0 bg-light" style="width:20%">
                            <div class="py-2 text-uppercase">Allergy Info</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
      
if (isset($_POST['submit']))
{
$id=$_POST['id'];
$sql=" SELECT * FROM PRODUCT where PRODUCT_ID='$id'";
$stid= oci_parse($con,$sql);
oci_execute($stid);
while($row=oci_fetch_assoc($stid))
{
?>
                    <tr>

                        <td class="border-0 align-middle"><img width="100px" height="100px"
                                src="<?php echo $row["IMAGE"]; ?>" alt="Image"></td>
                        <td class="border-0 align-middle"><?php echo $row["PRODUCT_NAME"]; ?><span
                                class="text-muted font-weight-normal font-italic d-block">Category:
                                <?php echo $row["CATEGORY"]; ?></span>
                        </td>
                        <td class="border-0 align-middle">£<?php echo $row["PRICE"]; ?></td>
                        <td class="border-0 align-middle"><?php echo $row["INFORMATION"]; ?></td>
                        <td class="border-0 align-middle"><?php echo $row["ALLERGY_INFO"]; ?></td>
                    </tr>
                    <?php
                }
            }
                             ?>

                </tbody>
            </table>
        </div>
        <hr style="width:100%; margin-left:-10px;">
        <!-- End -->

        <?php 
if (isset($_POST['submit']))
{
$id=$_POST['id'];
$sql=" SELECT * FROM PRODUCT where PRODUCT_ID='$id'";
$stid= oci_parse($con,$sql);
oci_execute($stid);
while($row=oci_fetch_assoc($stid))
{
?>

        <div class="row py-5 p-4 bg-white rounded shadow-sm">
            <div class="col-lg-6">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Add Review:
                </div>
                <div class="p-4">
                    <p class="font-italic mb-4">If you have some review for the product you can leave them in the
                        box below</p>
                    <form style="margin-left:15px" class="form" action="addreview.php?id=$id" method="post">
                        <input type="text" name="review" class="form-control"><br>
                        <input type="hidden" name="id" value="<?php echo $row["PRODUCT_ID"];?>">
                        <div class="input-group-append border-0">

                            <button name="edit" style="margin-left: 200px;" class="btn btn-lg btn-success"
                                type="submit">Add Review</button>

                        </div>
                    </form>
                </div>
            </div>
            <?php

}
}

    ?>




            <div class="col-lg-6">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Product Reviews</div>
                <?php       
if (isset($_POST['submit']))
{
$id=$_POST['id'];
$sql=" SELECT * FROM Review where PRODUCT_ID='$id'";
$stid= oci_parse($con,$sql);
oci_execute($stid);
while($row=oci_fetch_assoc($stid))
{
?>
                <div class="p-4">
                    <p class="font-italic mb-4">
                        <?php 
                  if($row["REVIEW"])
                  {
                  echo $row["REVIEW"];
                  }
                  else
                  {
                 echo "No review yet";
                   }
                  ?>

                    </p>
                    <hr style="width:100%; margin-left:-20px;">
                </div>

                <?php
}
}

    ?>

            </div>


        </div>
    </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>

    </script>
</body>
<?php include'footer.php';?>