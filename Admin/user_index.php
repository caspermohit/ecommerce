<!DOCTYPE html>
<head>
    <title>read user</title>

  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         
    <!-- custom css -->
    <style>
    body {
   
   margin-left: 250px;
}
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    
    </style>

</head>
<body>


<!-- container -->
<div class="container">
  
  <div class="page-header">
      <h1>Read users</h1>
  </div>

<?php
session_start();
include ('config/database.php');
$action = isset($_GET['action']) ? $_GET['action'] : "";
 
// if it was redirected from delete.php
if($action=='deleted'){
    echo "<div class='alert alert-danger'>Record was deleted.</div>";
}
$qry = 'SELECT * FROM USER1';  //this is table in APEX Oracle
  $stid = oci_parse($con, $qry);
  oci_execute($stid);
  
  echo "<a href='user_create.php' class='btn btn-primary m-b-1em'>Create New users</a>";
  echo "<table class='table table-hover table-responsive table-bordered'>";//start table
 
  //creating our table heading
  "<tr>";
  echo "<th>USERID</th>";
  echo"<th>NAME</th>";
  echo"<th>EMAIL</th>";
  echo"<th>CONTACT_NO</th>";
  echo"<th>ADDRESS</th>";
  echo"<th>GENDER</th>";
  echo"<th>ROLE</th>";
  echo"<th>password</th>";
  echo"<th>IMAGE</th>";
  echo"<th>Action</th>";
 "</tr>";
   
  while ($row=oci_fetch_array($stid))
{$IMAGE = htmlspecialchars($row['IMAGE'], ENT_QUOTES);
  ?>

  
  <tr>
  <td><?php echo $row['USER_ID']; ?></td>
  <td><?php echo $row['NAME']; ?></td>
    <td><?php echo $row['EMAIL']; ?></td>
    <td><?php echo $row['CONTACT_NO']; ?></td>
    <td><?php echo $row['ADDRESS']; ?></td>
    <td><?php echo$row['GENDER']; ?></td>
    <td><?php echo $row['ROLE']; ?></td>
    <td><?php echo $row['PASSWORD']; ?></td>
    
    <td><?php echo $IMAGE ? "<img  src='{$IMAGE}'style='width:50px;height:50px;' />" : "No image found.";  ?></td>
  
  
  
 
    
    <td>       
            
    <a href='update_test.php?USER_ID={$id}' class='btn btn-primary m-r-1em'>update</a>
 
 
    
    <a href="user_delete.php?id=<?php echo $row['USER_ID']; ?>"class='btn btn-danger'>Delete</a>
           
        </td>
     </tr>
    
  </tr>
 


<?php   
}

?>
<?php include 'admin.php'; ?>
</div> 


<!-- end .container -->
<!-- <script type='text/javascript'> -->
<!-- // confirm record deletion -->
<!-- function delete_user( id ){ -->
     
    <!-- var answer = confirm('Are you sure?'); -->
    <!-- if (answer){ -->
        <!-- // if user clicked ok,  -->
        <!-- // pass the id to delete.php and execute the delete query -->
        <!-- window.location = 'delete.php?id =' + id; -->
    <!-- }  -->
<!-- } -->
<!-- </script> -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


