<?php 
session_start();
include_once("config.php");
include '../connection.php';
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if($_REQUEST["sadmission"] !="")
$sadmission=$_REQUEST["sadmission"];
else
$sadmission=$_SESSION['userid'];

$rsDetail=mysql_query("select `email`,`sfathername`,`Address`,`smobile`,`sname`,`Sex` from `student_master` where `sadmission`='$sadmission'");
$rowDetail=mysql_fetch_row($rsDetail);
$email=$rowDetail[0];
$sfathername=$rowDetail[1];
$Address=$rowDetail[2];
$smobile=$rowDetail[3];
$sname=$rowDetail[4];
$Gender=$rowDetail[5];
if($Gender=="M")
$Title="Mr.";
elseif($Gender=="F")
$Title="Ms.";
else
$Title="";
?>
<script language="javascript">
function fnlSubmit()
{
	document.getElementById("hsadmission").value=document.getElementById("txtsadmission").value;
	document.getElementById("hCustName").value=document.getElementById("txtCustName").value;
	document.getElementById("hShippingAddress1").value=document.getElementById("txtShippingAddress1").value;
	document.getElementById("hShippingAddress2").value=document.getElementById("txtShippingAddress2").value;
	document.getElementById("hEmail").value=document.getElementById("txtEmail").value;
	document.getElementById("hState").value=document.getElementById("cboState").value;
	document.getElementById("hMobile").value=document.getElementById("txtMobile").value;
	document.getElementById("hZip").value=document.getElementById("txtZip").value;
	
	if(document.getElementById("hsadmission").value=="")
	{
		alert("Please enter admission id!");
		return;
	}
	if(document.getElementById("hCustName").value=="")
	{
		alert("Your Name is mandatory!");
		return;
	}
	if(document.getElementById("hShippingAddress1").value=="")
	{
		alert("Shipping Address is mandatory!");
		return;
	}
	if(document.getElementById("hEmail").value=="")
	{
		alert("Email Id is mandatory!");
		return;
	}
	if(document.getElementById("hMobile").value=="")
	{
		alert("Mobile is mandatory!");
		return;
	}
	if(document.getElementById("cboState").value=="")
	{
		alert("Please select State!");
		return;
	}
	if(document.getElementById("txtZip").value=="")
	{
		alert("ZIP Code is mandatory!");
		return;
	}

	document.getElementById("frmCheckout").submit();
}
function fnlAddQty(ProdCode)
{
	document.getElementById("product_qty[" + ProdCode +"]").value=parseInt(document.getElementById("product_qty[" + ProdCode +"]").value) +1;
	fnlSubmit();
	
}
function fnlSubQty(ProdCode)
{
	document.getElementById("product_qty[" + ProdCode +"]").value=parseInt(document.getElementById("product_qty[" + ProdCode +"]").value) -1;
	fnlSubmit();
}
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart |Online Commerce Portal</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	
	<!-- Include header-->

	<?php include 'header.php'; ?>

<form name="frmCart" id="frmCart" method="post" action="cart_update.php">
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
			<?php
			if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
			{
				$total =0;
				$b = 0;
			?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Product Detail</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
					<?php
					$ShippingCharges=0;
					foreach ($_SESSION["cart_products"] as $cart_itm)
					{
						$product_name = $cart_itm["product_name"];
						$product_qty = $cart_itm["product_qty"];
						$product_price = $cart_itm["product_price"];
						$product_code = $cart_itm["product_code"];
						$product_color = $cart_itm["product_color"];
						$subtotal = ($product_price * $product_qty);
						$total = ($total + $subtotal);
						$rsShippingCost=mysql_query("select `CourierCharges` from `Commerce_Product` where `ProductId`='$product_code'");
						$row=mysql_fetch_row($rsShippingCost);
						$ShippingCharges=$ShippingCharges+$row[0];
					?>
						<tr>
							<td class="cart_product">
								<a href="">
								<!--<img src="images/cart/one.png" alt="">-->
								<img src="images/home/bag1.png" alt="">
								</a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $product_name;?></a></h4>
								<p>Product ID: <?php echo $product_code;?></p>
							</td>
							<td class="cart_price">
								<p><?php echo $product_price;?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<!--<a class="cart_quantity_up" href="Javascript:fnlAddQty('<?php echo $product_code;?>');"> + </a>-->
									<input class="cart_quantity_input" type="text" maxlength="2" name="product_qty[<?php echo $product_code;?>]" id="product_qty[<?php echo $product_code;?>]" value="<?php echo $product_qty; ?>" autocomplete="off" size="2" readonly="readonly">
									<!--<a class="cart_quantity_down" href="Javascript:fnlSubQty('<?php echo $product_code;?>');"> - </a>-->
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $subtotal;?></p>
							</td>
						</tr>
					<?php
					}
					$ShippingCharges=75;
					$rsVAT=mysql_query("select `TaxRate` from `Commerce_Tax` where `TaxType`='VAT'");
					$rowVAT=mysql_fetch_row($rsVAT);
					$VAT=$total*$rowVAT[0]/100;
					$GrandTotal=$total+$VAT+$ShippingCharges;
					?>	
					</tbody>
				</table>
				<?php
				}
				?>
			</div>
		</div>
	</section> <!--/#cart_items-->

	
	<?php
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	?>
</form>


	<section id="cart_items">
		<div class="container">
			<div class="shopper-informations">
				<div class="row">
					
								
					
					<div class="col-sm-5 clearfix">
						<div class="shopper-info">
							<p><u>Shopper Information</u></p>
							<div class="form-one">
									<form>
									<input type="text" name="txtsadmission" id="txtsadmission" placeholder="AdmissionId" required="true" value="<?php echo $sadmission;?>">
									<input type="text" placeholder="Title" required="true" value="<?php echo $Title;?>">
									<input type="text" name="txtCustName" id="txtCustName" placeholder="Name *" value="<?php echo $sname; ?>" required="true">
									<input type="text" name="txtShippingAddress1" id="txtShippingAddress1" placeholder="Address *" value="<?php echo $Address; ?>" required="true">
									<input type="text" name="txtShippingAddress2" id="txtShippingAddress2" placeholder="Address 2">
									<input type="text" name="txtEmail" id="txtEmail" placeholder="Email*" value="<?php echo $email; ?>" required="true">
									</form>
							</div>
							<div class="form-two">
								<form>
									<input type="text" name="txtCity" id="txtEmail" placeholder="City*" value="<?php echo $city; ?>" required="true">
									<select name="cboState" id="cboState">
										<option value="">-- State --</option>
										<option value="Haryana" selected="selected">Haryana</option>
										<option value="Delhi">Delhi</option>
										<option value="Gurgaon">Gurgaon</option>
										<option value="Ghaziabad">Ghaziabad</option>
										<option value="Noida">Noida</option>
									</select>
									
									<select>
										<option>-- Country --</option>
										<option selected="selected" value="India">India</option>
										
									</select>
									
									<input type="text" name="txtZip" id="txtZip" placeholder="Zip / Postal Code *" required="true">
									<input type="text" placeholder="Phone *" value="<?php echo $smobile; ?>">
									<input type="text" name="txtMobile" id="txtMobile" placeholder="Mobile Phone" value="<?php echo $smobile; ?>" required="true">									
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p><u>Shipping Notes</u></p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>
					
											
				</div>
			</div>

		<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>How would you like to make the Payment?</h3>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span><?php echo $total;?></span></li>
							<li>VAT <span><?php echo $VAT;?></span></li>
							<li>Shipping Cost <span><?php echo $ShippingCharges;?></span></li>
							<li>Total <span><?php echo $GrandTotal;?></span></li>
						</ul>
						<p align="center">
						<a class="btn btn-default check_out" href="javascript:fnlSubmit();">Pay Now</a>
						<!--<a class="btn btn-default check_out" href="ChequePaymentDetails.php">Cheque Payment</a>
						<a class="btn btn-default check_out" href="COD.php">Cash On Delivery</a>-->
					</div></div>
			</div>
		</div>
	</section><!--/#do_action-->
	
	
	
		<!-- Include Footer -->
		
			<?php include 'footer.php'; ?>
	
		<!--Include Footer Ends -->
  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<form name="frmCheckout" id="frmCheckout" method="post" action="checkout4Payment.php">
<input type="hidden" name="hsadmission" id="hsadmission" value="">
<input type="hidden" name="hCustName" id="hCustName" value="">
<input type="hidden" name="hShippingAddress1" id="hShippingAddress1" value="">
<input type="hidden" name="hShippingAddress2" id="hShippingAddress2" value="">
<input type="hidden" name="hEmail" id="hEmail" value="">
<input type="hidden" name="hState" id="hState" value="">
<input type="hidden" name="hMobile" id="hMobile" value="">
<input type="hidden" name="hSellerId" id="hSellerId" value="576">
<input type="hidden" name="hZip" id="hZip" value="">
</form>