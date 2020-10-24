<!DOCTYPE HTML>
<html>

<head>
    <title>create users</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <style> 
select {
  width: 100%;
  padding: 16px 20px;
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
}
</style>

</head>

<body>

    <!-- container -->
    <div class="container"style=" width: 950px;
    content= justify";>
   
        <div class="page-header">
            <h1>Create users</h1>
        </div>

        <?php
        session_start();
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
 

       // insert query
       $filename=$_FILES["uploadfile"]["name"];
  $tempname=$_FILES["uploadfile"]["tmp_name"];
  $folder="./images/".$filename;
  move_uploaded_file($tempname,$folder);


  
$NAME=htmlspecialchars(strip_tags($_POST['NAME']));
$EMAIL=htmlspecialchars(strip_tags($_POST['EMAIL']));
$CONTACT_NO=htmlspecialchars(strip_tags($_POST['CONTACT_NO']));
$ADDRESS=htmlspecialchars(strip_tags($_POST['ADDRESS']));
$GENDER=htmlspecialchars(strip_tags($_POST['GENDER']));
$ROLE=htmlspecialchars(strip_tags($_POST['ROLE']));
$PASSWORD=htmlspecialchars(strip_tags($_POST['PASSWORD']));





$qry="INSERT INTO USER1 (USER_ID,NAME,EMAIL,CONTACT_NO,ADDRESS,GENDER,ROLE,PASSWORD,IMAGE) VALUES (USER_SEQUENCE.nextval,'$NAME', '$EMAIL', '$CONTACT_NO','$ADDRESS','$GENDER','$ROLE','$PASSWORD','$folder')";
   $stid=oci_parse($con, $qry);
  
if(oci_execute($stid))
{
   
    echo "<div class='alert alert-success'>Record was saved.</div>";

}else{
    echo "<div class='alert alert-danger'>Record not found.</div>";
}

    
}
?>

        <!-- html form here where the product information will be entered -->

        <form action="user_create.php" method="post" enctype="multipart/form-data">


            <table class='table table-hover table-responsive table-bordered'>
            
                <tr>
                    <td>NAME</td>
                    <td><input type='text' name='NAME' class='form-control' required /></td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td><input type='text' name='EMAIL' class='form-control' required /></td>
                </tr>
                <tr>
                    <td>CONTACT_NO</td>
                    <td><input type='text' name='CONTACT_NO' class='form-control' required /></td>
                </tr>
                <tr>
                    <td>ADDRESS</td>
                    <td><input type='text' name='ADDRESS' class='form-control' required /></td>
                </tr>
                <tr>
                    <td>GENDER</td>
                    <td><select name="GENDER" value=""  required>
                          <option>Click To Select<i class="fas fa-angle-down"></i></option>
                          <option>male</option>
                          <option>female</option>
                             <option>not specified</option>
                            </select></td>
                </tr>
                <tr>
                    <td>ROLE</td>
                         <td>
                         <select name="ROLE" value=""  required>
                          <option>Click To Select<i class="fas fa-angle-down"></i></option>
                          <option>customer</option>
                          <option>Trader</option>
                             <option>Admin</option>
                            </select>
                        </td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><input type='password' name='PASSWORD' class='form-control' required /></td>
                </tr>
                <tr>
                    <td>IMAGE</td>
                    <td><input type="file" name="uploadfile" required /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type='submit' value='Save' class='btn btn-primary'>Submit</button>
                        <a href='user_index.php' class='btn btn-danger'>Back to read users</a>
                    </td>
                </tr>
            </table>
        </form>

    </div> <!-- end .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src='https://unpkg.com/feather-icons'></script>
    <script src="./script.js"></script>


    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php include 'admin.php'; ?>
</body>

</html>


