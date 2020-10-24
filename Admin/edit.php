<?php 
include'Header.php';
$uname= $_SESSION['username'];
$sql="SELECT * FROM User1 WHERE Name='$uname'";
  $stid=oci_parse($con,$sql);
  oci_execute($stid);//
  $row=oci_fetch_array($stid);
  //print_r($row);

  $img=$row['IMAGE'];
  $about=$row['ABOUT'];
  $pass=$row['PASSWORD'];
  $email=$row['EMAIL'];
  $address=$row['ADDRESS'];
?>
<?php include 'admin.php'; ?>
<body>
    <div class="container">
        <div class="profile-page tx-13">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="profile-header">
                        <div class="cover">
                            <div class="gray-shade"></div>
                             <figure>
                                 <img src="images/1.jpg" alt="profile cover">
                             </figure>
                         
                                
                            <div class="cover-body d-flex justify-content-between align-items-center">
                                <div>
                                     <?php
                                if((empty($img)))
                            {
                                ?>
                                <figure>
                                 <img class="profile-pic" id="image" src="image/avatar.png" alt="profile">
                             </figure>
                                    <?php
                            }
                            else
                            {
                                ?>
                                <figure> 
                                <img class="profile-pic" src="<?php echo $img;?>" id="image"  alt="profile">
                                 </figure>
                                <?php

                            }
                            ?>

                                    
                                    <span style="margin-left:5px" class="profile-name"><?php echo $uname;?></span>
                                    
                                </div>
                                <div class="d-none d-md-block">
                                     <a href="edit.php"> <button class="btn btn-primary btn-icon-text btn-edit-profile">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-edit btn-icon-prepend">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg> Edit profile
                                    </button></a>
                                </div>
                            </div>
                        </div>
                        <div class="header-links">
                            <ul class="links d-flex align-items-center mt-3 mt-md-0">
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <span class="icon-user"></span>
                                    <a class="pt-1px d-none d-md-block" href="adminprofile.php">About</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <span class="icon-settings"></span>
                                    <a class="pt-1px d-none d-md-block" href="settings.php">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row profile-body">
                 <!-- left wrapper start -->
                <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="card-title mb-0">About</h6>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-horizontal icon-lg text-muted pb-3px">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="edit.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-edit-2 icon-sm mr-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                </path>
                                            </svg> <span class="">Edit</span></a>
                                    </div>
                                </div>
                            </div>
                            <p><?php
                            if((empty($about)))
                            {
                                ?>
                                <a href ="edit.php">Add Description</a>
                                    <?php
                            }
                            else
                            {
                                echo $about;

                            }
                            ?></p>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Joined:</label>
                                <p class="text-muted"><?php echo date("F j, Y");?></p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Lives:</label>
                                <p class="text-muted"><?php echo $address;?></p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email:</label>
                                <p class="text-muted"><?php echo $email;?></p>
                            </div>
                            <div class="mt-3 d-flex social-links">
                                <a href="javascript:;"
                                    class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github">
                                    <span class="icon-facebook"></span>
                                </a>
                                <a href="javascript:;"
                                    class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter">
                                    <span class="icon-instagram"></span>
                                </a>
                                <a href="javascript:;"
                                    class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram">
                                    <span class="icon-twitter"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left wrapper end -->
                <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-6 middle-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="ml-2">
                                                <p><b>Edit</b></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">

                                 
                                  <h6>          
                                <form method="post" action="editpass.php">
                                    <table width="500px" cellspacing="0">
                                        <tr>
                                        <td height="50" width="100">
                                             <label for="password">Password:</label>
                                        </td>
                                        <td>
                                             <input style="width:300px" type="text" name="pass"/>  
                                             <input type="hidden" name="id" value="<?php echo $row['USER_ID'];?>"/> 
                                             <input  type="hidden" name="email" value="<?php echo $row['EMAIL'];?>"/> 
                                         </td>
                                         <td>
                                             <button class="btn btn-primary btn-icon-text " style="float:right" name="edit">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"
                                              class="feather feather-edit btn-icon-prepend">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg> Edit
                                             </button>
                                        </td>
                                        </tr>
                                    </table>
                                </form>
                                <form method="post" action="editdescription.php">
                                    <table width="500px" cellspacing="0">
                                    <tr>
                                    <td width="100">
                                      <label  for="description">Description:</label>
                                    </td>
                                    <td>
                                      <input style="width:300px" type="text" name="des"/>  
                                      <input type="hidden" name="id" value="<?php echo $row['USER_ID'];?>"/> 
                                      <input  type="hidden" name="email" value="<?php echo $row['EMAIL'];?>"/>
                                    </td>
                                    <td>
                                      <button class="btn btn-primary btn-icon-text " style="float:right" name="edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-edit btn-icon-prepend">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg> Edit
                                       </button>
                                    </td>
                                    </tr>
                                    </table>
                                </form>
                                    </h6>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- middle wrapper end -->

            </div>
        </div>
    </div>

</body>
<style>
body {
    background-color: #f9fafb;
   margin-left: 150px;
}

.profile-page .profile-header {
    box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
    border: 1px solid #f2f4f9;
}

.profile-page .profile-header .cover {
    position: relative;
    border-radius: .25rem .25rem 0 0;
}


.profile-page .profile-header .cover figure {
    margin-bottom: 0;
}

@media (max-width: 767px) {
    .profile-page .profile-header .cover figure {
        height: 110px;
        overflow: hidden;
    }
}

@media (min-width: 2400px) {
    .profile-page .profile-header .cover figure {
        height: 280px;
        overflow: hidden;
    }
}

.profile-page .profile-header .cover figure img {
    border-radius: .25rem .25rem 0 0;
    width: 100%;
    height:200px;
}

@media (max-width: 767px) {
    .profile-page .profile-header .cover figure img {
        -webkit-transform: scale(2);
        transform: scale(2);
        margin-top: 15px;
    }
}

@media (min-width: 2400px) {
    .profile-page .profile-header .cover figure img {
        margin-top: -55px;
    }
}

.profile-page .profile-header .cover .gray-shade {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    background: linear-gradient(rgba(255, 255, 255, 0.1), #fff 99%);
}

.profile-page .profile-header .cover .cover-body {
    position: absolute;
    bottom: -20px;
    left: 0;
    z-index: 2;
    width: 100%;
    padding: 0 20px;
}

.profile-page .profile-header .cover .cover-body .profile-pic {
    border-radius: 50%;
    width: 100px;
    height:100px;
}

@media (max-width: 767px) {
    .profile-page .profile-header .cover .cover-body .profile-pic {
        width: 70px;
    }
}

.profile-page .profile-header .cover .cover-body .profile-name {
    font-size: 20px;
    font-weight: 600;
    margin-left: 17px;
}

.profile-page .profile-header .header-links {
    padding: 15px;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
    background: #fff;
    border-radius: 0 0 .25rem .25rem;
}

.profile-page .profile-header .header-links ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.profile-page .profile-header .header-links ul li a {
    color: #000;
    -webkit-transition: all .2s ease;
    transition: all .2s ease;
}

.profile-page .profile-header .header-links ul li:hover,
.profile-page .profile-header .header-links ul li.active {
    color: #727cf5;
}

.profile-page .profile-header .header-links ul li:hover a,
.profile-page .profile-header .header-links ul li.active a {
    color: #727cf5;
}

.profile-page .profile-body .left-wrapper .social-links a {
    width: 30px;
    height: 30px;
}

.profile-page .profile-body .right-wrapper .latest-photos>.row {
    margin-right: 0;
    margin-left: 0;
}

.profile-page .profile-body .right-wrapper .latest-photos>.row>div {
    padding-left: 3px;
    padding-right: 3px;
}

.profile-page .profile-body .right-wrapper .latest-photos>.row>div figure {
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
    margin-bottom: 6px;
}

.profile-page .profile-body .right-wrapper .latest-photos>.row>div figure:hover {
    -webkit-transform: scale(1.06);
    transform: scale(1.06);
}

.profile-page .profile-body .right-wrapper .latest-photos>.row>div figure img {
    border-radius: .25rem;
}

.rtl .profile-page .profile-header .cover .cover-body .profile-name {
    margin-left: 0;
    margin-right: 17px;
}

.img-xs {
    width: 37px;
    height: 37px;
}

.rounded-circle {
    border-radius: 50% !important;
}

img {
    vertical-align: middle;
    border-style: none;
}

.card-header:first-child {
    border-radius: 0 0 0 0;
}

.card-header {
    padding: 0.875rem 1.5rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, 0);
    border-bottom: 1px solid #f2f4f9;
}

.card-footer:last-child {
    border-radius: 0 0 0 0;
}

.card-footer {
    padding: 0.875rem 1.5rem;
    background-color: rgba(0, 0, 0, 0);
    border-top: 1px solid #f2f4f9;
}

.grid-margin {
    margin-bottom: 1rem;
    
}

.card {
    box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
    -webkit-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
    -moz-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
    -ms-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
}

.rounded {
    border-radius: 0.25rem !important;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #f2f4f9;
    border-radius: 0.25rem;
}
</style>


                    
               
              