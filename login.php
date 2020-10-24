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
<?php
include('config/database.php');
session_start();
$error='';

if(isset($_POST['signin']))
{
$uname=$_POST['username'];
$password=$_POST['password'];
$userType=$_POST['rolelist'];

$sql="SELECT * FROM User1 WHERE Name= '$uname'";
$stid=oci_parse($con,$sql);
oci_execute($stid);
$row= oci_fetch_assoc($stid);

if(oci_num_rows($stid)==0)
{
$error= 'Username not found';
}

else
{
$sql="SELECT * FROM User1 WHERE Password = '$password'";
$stid=oci_parse($con,$sql);
oci_execute($stid);
$row= oci_fetch_assoc($stid);

if(oci_num_rows($stid)==0)
{
$error= 'Password not found';
}
else
{
$sql="SELECT * FROM User1 WHERE Name ='$uname' AND Password = '$password' AND Role ='$userType'";
$stid=oci_parse($con,$sql);
oci_execute($stid);
$row= oci_fetch_assoc($stid);

if(oci_num_rows($stid)==0)
{
$error= 'Match not found. Please try again.';
}

else
{

$sql="SELECT * FROM User1 WHERE Name= '$uname' AND Password = '$password' AND Role ='$userType'";
$stid=oci_parse($con,$sql);
oci_execute($stid);

$row= oci_fetch_assoc($stid);


$_SESSION['username']= $row['NAME'];
$_SESSION['userid']= $row['USER_ID'];
$_SESSION['role']= $row['ROLE'];


if(oci_num_rows($stid)==1)
{
if($_SESSION['role']=="Customer")
{

$_SESSION['userid']=$userid;
header("location:customerprofile.php");
exit();
}
elseif($_SESSION['role']=="Admin")
{
$_SESSION['username']=$uname;
header("location:Admin/user_index.php");
exit();
}
elseif($_SESSION['role']=="Trader")
{
$_SESSION['username']=$uname;
header("location:trader/index.php");
exit();
}
}
}
}
}
}
?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="icomoon/style.css">
</head>

<body>
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
                            <input type="submit" name="signin"
                                class="btn blue-gradient btn-block btn-rounded z-depth-1a"></input>
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
    <br>
    <br>
    <div class="container">
        <div class="box">
            <img src="error.png" />
            <div class="box1">


                <div class="caption">

                    <p id="h2"> <?php echo $error;?>

                    </p>


                </div>

            </div>
            <div id="note" class="center">

                <a style="color:black;" class="nav-link icon-user" id="navbar" data-toggle="modal"
                    data-target="#elegantModalForm">
                    Login
                </a>


            </div>
        </div>
    </div>
    <br>

    <body>

        <style>
        body {
            background-color: #f9fafb;

        }

        main {
            display: flex;
            flex-direction: column;
            justify-items: center;
            align-items: center;
            box-sizing: border-box;
        }

        .box {
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-top-left-radius: 17px;
            border-top-right-radius: 17px;
            border-bottom-right-radius: 17px;
            border-bottom-left-radius: 17px;
            background-color: rgb(121, 204, 219);
            margin-left: 22em;
        }



        .caption {
            text-align: center;
            margin-top: 3em;
            margin-bottom: 2.5em;
            margin-left: 4.2em;
            margin-right: 4.2em;
        }

        h2,
        p {
            margin: 0;
            font-family: sans-serif;
        }

        #h2 {
            font-size: 1.5rem;
            color: #000000;

        }

        #p1 {
            font-size: 1.2rem;
            color: #000000;

        }

        .box1 {
            width: 10% display: flex;
            flex-direction: column;
            margin-left: .5em;
            margin-right: .5em;
        }

        #note {
            color: snow;
            font-size: 1rem;
            font-family: sans-serif;
            text-align: center;
            cursor: pointer;
            margin-bottom: 2em;
        }
        </style>
    </body>

</html>