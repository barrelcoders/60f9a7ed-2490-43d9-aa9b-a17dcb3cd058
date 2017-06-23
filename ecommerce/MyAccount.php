<?php 
session_start();
include_once("config.php");
include '../connection.php';
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<script language="javascript">
function fnlSubmit()
{
	document.getElementById("frmCart").submit();
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
				  <li class="active">My Account</li>
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
							<td class="image" colspan="6">My Order History</td>
						</tr>

						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Product Detail</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Remove from Wishlist</td>
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
								<a href=""><img src="images/cart/one.png" alt=""></a>
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
									<a class="cart_quantity_up" href="Javascript:fnlAddQty('<?php echo $product_code;?>');"> + </a>
									<input class="cart_quantity_input" type="text" maxlength="2" name="product_qty[<?php echo $product_code;?>]" id="product_qty[<?php echo $product_code;?>]" value="<?php echo $product_qty; ?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="Javascript:fnlSubQty('<?php echo $product_code;?>');"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $subtotal;?></p>
							</td>
							<td class="cart_delete">
								
								<?php
								echo '<input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> <a class="cart_quantity_delete" href="Javascript:fnlSubmit();"><i class="fa fa-times"></i></a>';
								?>
							</td>
						</tr>
					<?php
					}
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

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				
				
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span><?php echo $total;?></span></li>
							<li>VAT <span><?php echo $VAT;?></span></li>
							<li>Shipping Cost <span><?php echo $ShippingCharges;?></span></li>
							<li>Total <span><?php echo $GrandTotal;?></span></li>
						</ul>
							<a class="btn btn-default update" href="Javascript:fnlSubmit();">Update</a>
							<a class="btn btn-default check_out" href="index.php">Continue Shopping</a>
							<a class="btn btn-default check_out" href="checkout.php">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	<?php
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	?>
</form>

	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">			
				
			</div>
		</div>
		
		<!-- Include Footer -->
		
			<?php include 'footer.php'; ?>
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>