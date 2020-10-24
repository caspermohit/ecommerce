<?php
session_start();
 include'config/database.php';
 ?>

<!DOCTYPE html>
<HTML lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <link rel="stylesheet" href="icomoon/style.css">

    <!---navbar-->
    <nav class="navbar fixed-top navbar-expand-lg " style="background-color:rgb(121, 204, 219);">
        <a id="brand" class="navbar-brand" href="index.php"><img class="img-responsive"
                style=" margin-left:0px; height: 50px; width:150px; " alt="logo" src="image/logo.png"></a>
        <!---SEARCH-->
        <form class="form-inline" action="search.php" method="post">
            <div class="md-form my-0">
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search for products"
                    aria-label="Search">
            </div>
            <button class="btn btn-primary btn-shadow btn-rounded w-md" name="submit" type="submit">Search</button>
        </form>
        <!---SEARCH END-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contact Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="faq.php">FAQ</a>
                </li>
                <br>




            </ul>

            <ul class="navbar-nav ml-auto nav-flex-icons">

                <?php
            if(isset($_SESSION['username'])){
                $uname= $_SESSION['username'];
                            $sql="SELECT * FROM User1 WHERE Name='$uname'";
                             $stid=oci_parse($con,$sql);
                            oci_execute($stid);//
                            $row=oci_fetch_array($stid);
                            echo'welcome!!!';
                            echo'<br>';
                            echo $row["NAME"];
                            
                        }
                      
                     
                        else{
                            echo '
                            <a class="button" href="signup.php">register !!</a> 
                     </button>
                                
                            ';
                        }
                        ?>

                <li class=" nav-item dropdown">
                    <?php
                         if(isset($_SESSION['username']))
                         {
                       echo '<a class="nav-link icon-user dropdown-toggle" id="navbar"  data-toggle="dropdown"><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item ">
                            <a href="logout.php" style="color:black;display:flex;justify-content: center;">Logout</a>
                            </li> ';
                        }
                            ?>
                <li class="nav-item ">
                    <?php
                        
                         if(isset($_SESSION['username']))
                         {
                         if($_SESSION['role']=="Customer")
                         {
                             echo'<a class="nav-link" style="color:black;display:flex;justify-content: center;"  href="customerprofile.php">Myprofile</a>';

                         
                         }
                         elseif($_SESSION['role']=="Admin")
                         {
                             echo'<a class="nav-link" style="color:black;"  href="Admin/user_index.php">Dashboard</a>';

                         
                         }
                         elseif($_SESSION['role']=="Trader")
                         {
                             echo'<a class="nav-link" style="color:black;"  href="trader/index.php">Dashboard</a>';

                         
                         }
                           }

                           ?>
                </li>
            </ul>
            </li>
            <li class="nav-item">
                <?php
                     if(!isset($_SESSION['username']))
                         {
                    echo'<a class="nav-link icon-user" id="navbar" data-toggle="modal" data-target="#elegantModalForm"></a>';
                         }
                         ?>
            </li>
            <?php
            if(isset($_SESSION['username'])){
                            echo '
                                <li class="nav-item">
                <a class="nav-link waves-effect waves-light icon-shopping_cart ml-3" data-toggle="modal"
                    data-target="#modalCart"></a>
            </li>
                            ';
                        }
                      
                     
                        else{
                            echo '
                            <a id="button-a" class="nav-link waves-effect waves-light icon-shopping_cart ml-3" data-toggle="modal"
                            onclick="myFunction()"></a>
                                
                            ';
                        }
                        ?>



            </ul>
        </div>


    </nav>
    <!--navbar-->

    <!-- Modal  signin-->
    <form action="login.php" method="post" onsubmit="return Validate()" name="lform">
        <div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!--Content-->
                <div class="modal-content form-elegant">
                    <!--Header-->
                    <div class="modal-header text-center">
                        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel">
                            <strong>Sign in</strong></h3><br>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body mx-4">
                        <!--Body-->
                        <h5 class="text-danger text-center">
                        </h5>
                        <div id="username_div" class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="Form-name">username</label>
                            <input type="text" name="username" id="Form-name" class="form-control validate">
                            <div id="name_error"></div>
                        </div>

                        <div id="password_div" class="md-form pb-3">
                            <label data-error="wrong" data-success="right" for="Form-pass1">Your password</label>
                            <input type="password" name="password" id="Form-pass1" class="form-control validate">
                            <div id="password_error"></div>
                        </div>
                        <div id="rolelist_div" class="form-group">
                            <label for="Role">Choose your Role</label>
                            <select name="rolelist" value="">
                                <option>Customer</option>
                                <option>Trader</option>
                                <option>Admin</option>
                            </select>
                            <div id="rolelist_error"></div>
                        </div>

                        <div class="text-center mb-3">
                            <input type="submit" name="signin" value="Signin"
                                class="btn btn-secondary btn-block btn-rounded z-depth-1a"> </input>
                        </div>
                        <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or
                            Sign in
                            with:</p>

                        <div class="row my-3 d-flex justify-content-center">
                            <!--Facebook-->
                            <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i
                                    class="icon-facebook"></i></button>
                            <!--Twitter-->
                            <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i
                                    class="icon-twitter"></i></button>
                            <!--Google +-->
                            <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i
                                    class="icon-google-plus"></i></button>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer mx-5 pt-3 mb-1">
                        <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="signup.php"
                                class="blue-text ml-1">
                                Sign Up</a></p>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
    </form>
    <!-- Modal signin -->

    <!--cart-->
    <!-- Modal: modalCart -->
    <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Your cart</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product name</th>
                                <th>quantity</th>
                                <th>Price</th>
                                <th>sub-total </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalprice = 0;
                            $num = 1;
                            
                            $uname= $_SESSION['username'];
                            $sql="SELECT * FROM User1 WHERE Name='$uname'";
                             $stid=oci_parse($con,$sql);
                            oci_execute($stid);//
                            $row=oci_fetch_array($stid);
                            $user_id=$row['USER_ID'];
                    $qry = "SELECT * FROM CART where USER_ID = $user_id";
                    $stid = oci_parse($con, $qry);
                    oci_execute($stid);
                    while($row =oci_fetch_assoc($stid)){
                     
                    $productid = $row['PRODUCT_ID'];
                    $innerqry ="SELECT PRODUCT_NAME, PRICE ,DISCOUNT_ID FROM PRODUCT WHERE PRODUCT_ID= $productid";
                    $stmt =oci_parse($con, $innerqry);
                    oci_execute($stmt);
                    while($rows =oci_fetch_assoc($stmt)) {
                         
                         $quantity= $row[ 'QTY'];
                        
                           $tnum = $num ++;  
                          $total = $rows['PRICE'] * $row['QTY'];
          $totalafterdiscount = $total;
          $totalprice = $totalafterdiscount + $totalprice;                  
                    
                    ?>
                            <tr>

                                <td><?php echo number_format($tnum) ?></td>
                                <td><?php echo $rows["PRODUCT_NAME"]; ?></a></td>
                                <td><?php echo $row["QTY"]; ?></td>
                                <td>£<?php echo $rows["PRICE"]; ?></td>
                                <td>£<?php echo $totalafterdiscount ?></td>


                                <?php
                    }
                }
                    ?>
                            <tr>
                                <td colspan="4" align="right">Total</td>
                                <td align="right">£<?php echo number_format($totalprice, 2); ?></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <a href="checkout.php" type="done" name="done" class="btn btn-primary">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: modalCart -->
    <!--cart-end-->

    <style>
    .card-columns {
        @include media-breakpoint-only(lg) {
            column-count: 4;
        }

        @include media-breakpoint-only(xl) {
            column-count: 5;
        }
    }

    hr {
        display: block;
        margin-top: 0.1em;
        margin-bottom: 0.1em;
        margin-left: 150px;
        margin-right: 150px;
        border-style: inset;
        border-width: 3px;

    }

    .form-elegant .font-small {
        font-size: 0.8rem;
    }

    .form-elegant .z-depth-1a {
        -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
        box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
    }

    .form-elegant .z-depth-1-half,
    .form-elegant .btn:hover {
        -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
        box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
    }

    .form-elegant .modal-header {
        border-bottom: none;
    }

    .modal-dialog .form-elegant .btn {
        color: #2196f3 !important;
    }

    .form-elegant .modal-body,
    .form-elegant .modal-footer {
        font-weight: 400;
    }

    .button {
        background-color: #1c87c9;
        -webkit-border-radius: 60px;
        border-radius: 10px;
        border: none;
        color: #eeeeee;
        cursor: pointer;
        display: inline-block;
        font-family: sans-serif;
        font-size: 20px;
        padding: 10px 10px;
        text-align: center;
        text-decoration: none;
    }

    @keyframes glowing {
        0% {
            background-color: #1E90FF;
            box-shadow: 0 0 5px #1E90FF;
        }

        50% {
            background-color: #6495ED;
            box-shadow: 0 0 20px #6495ED;
        }

        100% {
            background-color: #4169E1;
            box-shadow: 0 0 5px #4169E1;
        }
    }

    .button {
        animation: glowing 1300ms infinite;
    }
    </style>
</head>
<script>
var username = document.forms['lform']['username'];
var password = document.forms['lform']['password'];
var rolelist = document.forms['lform']['rolelist'];

// SELECTING ALL ERROR DISPLAY ELEMENTS
var name_error = document.getElementById('name_error');
var password_error = document.getElementById('password_error');
var rolelist_error = document.getElementById('rolelist_error');

// SETTING ALL EVENT LISTENERS
username.addEventListener('blur', nameVerify, true);
password.addEventListener('blur', passwordVerify, true);
rolelist.addEventListener('blur', roleVerify, true);



// validation function
function Validate() {
    // validate username
    if (username.value == "") {
        username.style.border = "1px solid red";
        document.getElementById('username_div').style.color = "red";
        name_error.textContent = "Username is required";
        username.focus();
        return false;
    }


    // validate username
    if (username.value.length < 3) {
        username.style.border = "1px solid red";
        document.getElementById('username_div').style.color = "red";
        name_error.textContent = "Username must be at least 3 characters";
        username.focus();
        return false;
    }

    if (!isNaN(username.value)) {
        username.style.border = "1px solid red";
        document.getElementById('username_div').style.color = "red";
        name_error.textContent = "Username should not be a number";
        username.focus();
        return false;
    }

    // validate password
    if (password.value == "") {
        password.style.border = "1px solid red";
        document.getElementById('password_div').style.color = "red";
        //password_confirm.style.border = "1px solid red";
        password_error.textContent = "Password is required";
        password.focus();
        return false;
    }

    if (rolelist.value == "") {
        rolelist.style.border = "1px solid red";
        document.getElementById('rolelist_div').style.color = "red";
        rolelist_error.textContent = "Role is required";
        rolelist.focus();
        return false;
    }
}
// event handler functions
function nameVerify() {
    if (username.value != "") {
        username.style.border = "1px solid #5e6e66";
        document.getElementById('username_div').style.color = "#5e6e66";
        name_error.innerHTML = "";
        return true;
    }
}

function passwordVerify() {
    if (password.value != "") {
        password.style.border = "1px solid #5e6e66";
        document.getElementById('password_div').style.color = "#5e6e66";
        password_error.innerHTML = "";
        return true;
    }
}

function roleVerify() {
    if (rolelist.value != "") {
        rolelist.style.border = "1px solid #5e6e66";
        document.getElementById('rolelist_div').style.color = "#5e6e66";
        rolelist_error.innerHTML = "";
        return true;
    }
}
</script>
<script>
$('#button-a').click(function() {
    swal.fire({
        imageUrl: 'image/lock.gif',

        imageAlt: 'Custom image',
        title: 'Oops...',
        text: 'Dear customer please login to access the cart!!',
        confirmButtonText: " <u>ok</u>",
        width: 600,
        padding: '3em',

        backdrop: `
    rgba(0,0,123,0.4)
   
    no-repeat
  `

    });
});
</script>