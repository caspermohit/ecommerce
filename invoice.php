<?php
//index.php
$message = '';
include 'Header.php';


//Calling session variable to extract the user_id that can be used where its needed.
//this is the session user_id, you can use this to replace constant values. (edited)

function fetch_customer_data($con)
{   $date=  date('d-m-Y' );
$invoiceno= date("dmY") . stripslashes(mt_rand());
$uname= $_SESSION['username'];
$sql="SELECT * FROM User1 WHERE Name='$uname'";
$stid=oci_parse($con,$sql);
oci_execute($stid);//
$row=oci_fetch_array($stid);
$user_id=$row['USER_ID'];
$select_customer ="SELECT * FROM USER1 WHERE USER_ID ='$user_id'";// added user_id is here.
$run_customer =oci_parse($con, $select_customer);
oci_execute($run_customer);

$output = '
<div class="container">
<div class="card">
<div class="card-header" style="display= flex;content-justify=left;">
<h1>Invoice </h1>
<a id="brand" class="navbar-brand" href="index.php"><img class="img-responsive"
style=" margin-left:0px; height: 50px; width:150px; " alt="logo" src="image/logo.png"></a>
<span class="float-right" ><form method="post" action="tinvoice.php">
<input type="submit" name="action" class="btn btn-secondary" value="PDF Send" />
</form></button></span>
</div>
<br>
<br>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-12">
<br>
<br>
<br>
<br>

<h6 class="mb-3">billed to:</h6>
';

$rows =oci_fetch_assoc($run_customer);{

$output .= '

<div>'.$rows["NAME"].'</div>
<div>'.$rows["EMAIL"].'</div>
<div>'.$rows["CONTACT_NO"].'</div>
<div>'.$rows["ADDRESS"].'</div>
<br>
<div>Date:'.$date.'</div>
<div style="float:right; ">Invoice No:'.$invoiceno.'</div>
';

}

return $output;
}


function fetch_cart_data($con)
{




$output = '

<br>


<div class="table-responsive">
<table class="table table-bordered">
<tr>
<th>Name</th>
<th>Information</th>
<th>Qty</th>
<th> Unit Price</th>
<th>Discount</th>
<th>Subtotal</th>
</tr>

';
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
$innerqry ="SELECT PRODUCT_NAME, PRICE ,INFORMATION, DISCOUNT_ID FROM PRODUCT WHERE PRODUCT_ID= $productid";
$stmt =oci_parse($con, $innerqry);
oci_execute($stmt);


$rowss =oci_fetch_assoc($stmt);{
$total = ($rowss['PRICE'] - $rowss['DISCOUNT_ID'])* $row['QTY'];

$totalprice = $total + $totalprice;

$output .='

<tr>

<td>'.$rowss["PRODUCT_NAME"].'</td>
<td>'.$rowss["INFORMATION"].'</td>
<td>'.$row["QTY"].'</td>
<td>£'.$rowss["PRICE"].'</td>
<td>£'.$rowss["DISCOUNT_ID"].'</td>
<td>£'.$totalprice.'</td>
</tr>


';


}
}


$output .= '
<tr>
<th colspan="5" align="right"> totalprice</th>
<td align="right">£'.$totalprice.'</td>
</tr>

</div>
</div>
</div>
</div>
</div>
';
return $output;
}



if(isset($_POST["action"]))
{
include('pdf.php');
$file_name = md5(rand()) . '.pdf';
$html_code = '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">';
$html_code .= fetch_customer_data($con);
$html_code .= fetch_cart_data($con);
$pdf = new Pdf();
$pdf->load_html($html_code);
$pdf->render();
$file = $pdf->output();
file_put_contents($file_name, $file);

// calling user name from the log in  profile
$uname= $_SESSION['username'];
$sql="SELECT * FROM User1 WHERE Name='$uname'";
$stid=oci_parse($con,$sql);
oci_execute($stid);//
while($row = oci_fetch_assoc($stid)){

$customer_email=$row['EMAIL'];


require 'class/class.phpmailer.php';
$mail = new PHPMailer;
$mail->IsSMTP();								//Sets Mailer to send message using SMTP
$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
$mail->Port = '587';								//Sets the default SMTP server port
$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
$mail->Username = 'hero690358@gmail.com';					//Sets SMTP username
$mail->Password = 'Casper@77';					//Sets SMTP password
$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
$mail->From = 'hero690358@gmail.com';			//Sets the From email address for the message
$mail->FromName = 'Clecks Emarket';
$address = array  ($customer_email);//Sets the From name of the message
while (list ($key, $val) = each ($address)) {
$mail->AddAddress	($val);}					//Adds a "To" address
$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
$mail->IsHTML(true);							//Sets message type to HTML
$mail->AddAttachment($file_name);     				//Adds an attachment from a path on the filesystem
$mail->Subject = 'Invoice Details';			//Sets the Subject of the message
$mail->Body = 'Please Find Invoice details in attach PDF File.';				//An HTML or plain text message body
if($mail->Send())								//Send an Email. Return true on success or false on error
{
$message = '<label class="alert alert-success"> Dear Customer  Invoice of your product has been emailed to you successfully.</label>';
}
else
{
$message = '<label class="alert alert-danger"> Dear Customer Invoice  of your product could not be mailed please do  check your email address or contact our admin  with this email .</label>';
}
unlink($file_name);
}
}


?>

<html>

<body>

    <br>
    <br>
    <br>
    <br>
    <div class="container">


        <form method="post">
            <input type="submit" name="action" class="btn btn-primary" value="PDF Send" /> <?php echo $message; ?>
        </form>




        <br>
        <?php
echo fetch_customer_data($con);
echo fetch_cart_data($con);
?>
    </div>
    <br />
    <br />
</body>
<style>
.table
</style>

</html>