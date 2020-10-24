<?php include'Header.php';?>
<br>
<br>
<br>
<br>
<br>
<br>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets">
    <div class="row">
        <!-- Contact form -->
        <div class="col-sm-6">
            <form role="form" name="ajax-form" id="ajax-form" action="contactprocess.php" method="post" class="form-main">

                <div class="form-group">
                    <label for="name2">Name</label>
                    <input class="form-control" id="name2" name="name" onblur="if(this.value == '') this.value='Name'"
                        onfocus="if(this.value == 'Name') this.value=''" type="text" value="Name">
                    <div class="error" id="err-name" style="display: none;">Please enter name</div>
                </div> <!-- /Form-name -->

                <div class="form-group">
                    <label for="email2">Email</label>
                    <input class="form-control" id="email2" name="email" type="text"
                        onfocus="if(this.value == 'E-mail') this.value='';"
                        onblur="if(this.value == '') this.value='E-mail';" value="E-mail">
                    <div class="error" id="err-emailvld" style="display: none;">E-mail is not a valid format</div>
                </div> <!-- /Form-email -->

                <div class="form-group">
                    <label for="message2">Message</label>
                    <textarea class="form-control" id="message2" name="message" rows="5"
                        onblur="if(this.value == '') this.value='Message'"
                        onfocus="if(this.value == 'Message') this.value=''">Message</textarea>

                    <div class="error" id="err-message" style="display: none;">Please enter message</div>
                </div> <!-- /col -->

                <div class="row">
                    <div class="col-xs-12">
                        <div id="ajaxsuccess" class="text-success">E-mail was successfully sent.</div>
                        <div class="error" id="err-form" style="display: none;">There was a problem validating the form
                            please check!</div>
                        <div class="error" id="err-timedout">The connection to the server timed out!</div>
                        <div class="error" id="err-state"></div>
                        <button type="submit" name="submit" class="btn btn-primary btn-shadow btn-rounded w-md"
                            id="send">Submit</button>
                    </div> <!-- /col -->
                </div> <!-- /row -->

            </form> <!-- /form -->
        </div> <!-- end col -->
        <div class="col-sm-6">
            <!-- Buttons-->
            <div class="row text-center">
                <div class="col-md-4">
                    <a class="btn-floating blue accent-1">
                        <i class="icon-room"></i>
                    </a>
                    <p>Kathmandu,+977</p>
                    <p class="mb-md-0">Nepal</p>
                </div>
                <div class="col-md-4">
                    <a class="btn-floating blue accent-1">
                        <i class="icon-room"></i>
                    </a>
                    <p>01677767</p>
                    <p class="mb-md-0">Mon - Fri, 8:00-22:00</p>
                </div>
                <div class="col-md-4">
                    <a class="btn-floating blue accent-1">
                        <i class="icon-room"></i>
                    </a>
                    <p>info@gmail.com</p>
                    <p class="mb-0">sale@gmail.com</p>
                </div>
            </div>
            <div class="contact-map">
                <iframe src="https://maps.google.com/maps?q=the%20british%20college&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    style="width: 100%; height: 360px;"></iframe>
            </div>
        </div><!-- end col -->


    </div> <!-- end row -->
    <br>
    <br>
</div>
<div class="container" style="color:black;">
    <blockquote class="blockquote">
        <p>You have several options: you can call us at (512)-656-4348, send us an email at clecks.emarket@gmail.com, or
            fill the form on the "Contact" tab on our website. We’ll gather details about your queries and then we’ll
            try to think based on your unique preferences.</p>
    </blockquote>
    <div class="container-fluid" style="text-align:center;">
        <h3>Our Partners and Sponsers</h3>
        <ul>
            <p>Sponser: Leeds beckket University./ The british College.</p>
            <p>Project Manager: Rohit Raj Pandey.</p>
        </ul></strong>
    </div>
</div>
<style>
body {
    margin-top: 20px;
}


/*======= Contact ======*/

.form-control {
    box-shadow: none !important;
    outline: none !important;
    border: 2px solid #cecece;
    height: 38px;
}

.form-control:hover,
.form-control:focus {
    border-color: #97a0af;
}


.error {
    margin: 8px 0px;
    display: none;
    color: red;
}

#ajaxsuccess {
    font-size: 16px;
    width: 100%;
    display: none;
    clear: both;
    margin: 8px 0px;
}

.con_sub_text {
    margin: 20px 0px;
    font-size: 15px;
}

.contact-detail-box {
    margin-bottom: 50px;
}

.contact-detail-box address {
    font-size: 14px;
}

.contact-map {
    background-color: #ededed;
}

.title-box .border,
.btn-primary,
.back-to-top,
.logo i,
.question-q-box,
.social-circle li a:hover {
    background-color: #007bff !important;
}

.title-box .title-alt,
.text-colored,
.footer a:hover,
.navbar-custom .navbar-nav li a:hover,
.navbar-custom .navbar-nav li a:focus,
.navbar-custom .navbar-nav li a:active,
.navbar-custom .navbar-nav li.active a {
    color: #007bff;
}

.btn-primary {
    border: 1px solid #007bff !important;
}

.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary.active,
.btn-primary.focus,
.btn-primary:active,
.btn-primary:focus,
.btn-primary:hover,
.open>.dropdown-toggle.btn-primary,
.btn-primary.active.focus,
.btn-primary.active:focus,
.btn-primary.active:hover,
.btn-primary:active.focus,
.btn-primary:active:focus,
.btn-primary:active:hover,
.open>.dropdown-toggle.btn-primary.focus,
.open>.dropdown-toggle.btn-primary:focus,
.open>.dropdown-toggle.btn-primary:hover {
    background-color: #007bff !important;
    border: 1px solid #007bff !important;
}

.btn-shadow.btn-primary {
    box-shadow: 1px 5px 9px rgba(79, 233, 199, 0.32);
}



/*======= Responsive ======*/
@media (min-width: 768px) {
    .nav-custom-left {
        margin-left: 5%;
    }

    .navbar-nav>li>a {
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .contact-page .col-sm-6 {
        padding-left: 30px;
        padding-right: 30px;
    }
}

@media (max-width: 768px) {
    .navbar-custom {
        -moz-box-shadow: 0 2px 2px rgba(0, 0, 0, .1);
        -webkit-box-shadow: 0 2px 2px rgba(0, 0, 0, .1);
        box-shadow: 0 2px 2px rgba(0, 0, 0, .1);
    }

    .screen-space {
        margin: 0px auto 50px auto;
    }

    .feature-detail {
        padding: 0px 0px 50px 30px !important;
    }

    .footer h5 {
        margin-top: 30px;
    }
}


@media only screen and (min-width: 768px) and (max-width: 991px) {
    .blog-wrapper .blog-item {
        width: 50%;
    }

    .navbar-custom .navbar-nav li a {
        font-size: 12px;
    }

    .blog-detail-box {
        padding-right: 0px;
    }
}

@media only screen and (min-width: 767px) and (max-width: 991px) {}

@media (max-width: 767px) {
    .blog-wrapper .blog-item {
        width: 100%;
    }

    .logo {
        margin-top: 7px;
    }

    .blog-detail-box {
        padding-right: 0px;
    }
</style>
<?php include'footer.php';?>