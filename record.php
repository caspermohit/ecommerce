<?php
session_start();
include'config/database.php';

if(isset($_POST['CREATE']))
{ 
    $uname = $_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    //$confirm=$_POST['password_confirm'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $role=$_POST['rolelist'];
    $gender= $_POST['gender'];
$output='';
    //Generate verification key

    $vkey = md5(time().$uname);
    $date=  date("Y/m/d");

  $sql="SELECT * FROM User1 WHERE Name= '$uname'";
  $stid=oci_parse($con,$sql);
  oci_execute($stid);
  $row= oci_fetch_assoc($stid);
  if(oci_num_rows($stid)>0)
{
  $output='Username already taken';
}

else
{
  $sql="SELECT * FROM User1 WHERE Email= '$email'";
  $stid=oci_parse($con,$sql);
  oci_execute($stid);
  $row= oci_fetch_assoc($stid);
  if(oci_num_rows($stid)>0)
{
  $output='Email already taken';
}

else
{
  $sql="SELECT * FROM User1 WHERE Password= '$pass'";
  $stid=oci_parse($con,$sql);
  oci_execute($stid);
  $row= oci_fetch_assoc($stid);
  if(oci_num_rows($stid)>0)
{
  $output='Password already taken';
}

else
{

  $sql1="INSERT INTO User1(Name,Email,Contact_no,Address,Gender,Role,Password,vkey) VALUES ('$uname','$email','$mobile','$address','$gender','$role','$pass','$vkey')";
  $stid=oci_parse($con,$sql1);
  oci_execute($stid);//

  if($sql1)
  {
    //send email

    $_SESSION['email']=$email;  
  $_SESSION['username']=$uname;
  $_SESSION['password']=$pass;
  $_SESSION['vkey']=$vkey;
  include('activateemail.php');
  }
}
}
}
}

?>

<body>
    <br>
    <br>
    <div class="container">
        <div class="box">
            <img src="error.png" />
            <div class="box1">


                <div class="caption">

                    <p id="h2">
                        <?php echo $output; ?>

                    </p>


                </div>

            </div>
            <div id="note" class="center">
                <a href="signup.php" style="color:black;">Try Again</a>
            </div>


        </div>
    </div>
    <br>
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