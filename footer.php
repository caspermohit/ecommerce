<br>
<!-- Footer -->
<section id="footer">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Menu</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="index.php"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a href="about.php"><i class="fa fa-angle-double-right"></i>About us</a></li>
                    <li><a href="product.php"><i class="fa fa-angle-double-right"></i>products</a></li>
                    <li><a href="contactus.php"><i class="fa fa-angle-double-right"></i>contact us</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Accounts</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Account</a></li>
                    <li><a id="button-a" href="checkout.php"><i class="fa fa-angle-double-right" onclick="myFunction()"></i>mycart</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>my favourite</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Social</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="javascript:void();"><i class="fa fa-facebook"></i>facebook</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-twitter"></i>twitter</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-instagram"></i>instagram</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-google-plus"></i>google+</a></li>
                    <li><a href="" title="Design and developed by"><i class="fa fa-envelope"></i>Email</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p><u><a href="index.php">clecksemarket.com</a></u> </p>
                <p class="h6">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by<a class="text-green ml-2" href="index.php"
                        target="_blank">clecksemarket</a></p>
            </div>
        </div>
    </div>
</section>
<!-- ./Footer -->
<style>
/* Footer */
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}

#footer {
    background: #3b3b3b !important;
}

#footer h5 {
    padding-left: 10px;
    border-left: 3px solid #eeeeee;
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:  #eee;
}

#footer a {
    color:  #eee;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}

#footer ul.social li {
    padding: 3px 0;
}

#footer ul.social li a i {
    margin-right: 5px;
    font-size: 25px;
    -webkit-transition: .5s all ease;
    -moz-transition: .5s all ease;
    transition: .5s all ease;
}

#footer ul.social li:hover a i {
    font-size: 30px;
    margin-top: -10px;
}

#footer ul.social li a,
#footer ul.quick-links li a {
    color:  #eee;
}

#footer ul.social li a:hover {
    color: #eeeeee;
}

#footer ul.quick-links li {
    padding: 3px 0;
    -webkit-transition: .5s all ease;
    -moz-transition: .5s all ease;
    transition: .5s all ease;
}

#footer ul.quick-links li:hover {
    padding: 3px 0;
    margin-left: 5px;
    font-weight: 700;
}

#footer ul.quick-links li a i {
    margin-right: 5px;
}

#footer ul.quick-links li:hover a i {
    font-weight: 700;
}

@media (max-width:767px) {
    #footer h5 {
        padding-left: 0;
        border-left: transparent;
        padding-bottom: 0px;
        margin-bottom: 10px;
    }
</style>

</html>