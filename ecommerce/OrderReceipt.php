<?php
session_start();
include_once("config.php");
include '../connection.php';
?>
<?php
	set_include_path('../lib'.PATH_SEPARATOR.get_include_path());
	
        //Replace this with your secret key from the citrus panel
	$secret_key = "ac3d61806bd38e9dd0c3b3a8d42082143b5ba3a9";
	 
	$data = "";
	$flag = "true";
	
	
	if(isset($_POST['marketplaceTxId'])) {
		$trans_id= $_POST['marketplaceTxId'];
		$data .= $trans_id;
	}
	if(isset($_POST['TxId'])) {
		$txnid = $_POST['TxId'];
		$data .= $txnid;
	}
	 if(isset($_POST['TxStatus'])) {
		$txnstatus = $_POST['TxStatus'];
		$data .= $txnstatus;
	 }
	 if(isset($_POST['amount'])) {
		$amount = $_POST['amount'];
		$data .= $amount;
	 }
	 if(isset($_POST['pgTxnNo'])) {
		$pgtxnno = $_POST['pgTxnNo'];
		$data .= $pgtxnno;
	 }
	 if(isset($_POST['issuerRefNo'])) {
		$issuerrefno = $_POST['issuerRefNo'];
		$data .= $issuerrefno;
	 }
	 if(isset($_POST['authIdCode'])) {
		$authidcode = $_POST['authIdCode'];
		$data .= $authidcode;
	 }
	 if(isset($_POST['firstName'])) {
		$firstName = $_POST['firstName'];
		$data .= $firstName;
	 }
	 if(isset($_POST['lastName'])) {
		$lastName = $_POST['lastName'];
		$data .= $lastName;
	 }
	 if(isset($_POST['pgRespCode'])) {
		$pgrespcode = $_POST['pgRespCode'];
		$data .= $pgrespcode;
	 }
	 if(isset($_POST['addressZip'])) {
		$pincode = $_POST['addressZip'];
		$data .= $pincode;
	 }
	 if(isset($_POST['signature'])) {
		$signature = $_POST['signature'];
	 }
     
         $respSignature = hash_hmac('sha1', $data, $secret_key);
	 if($signature != "" && strcmp($signature, $respSignature) != 0) {
		$flag = "false";
	 }
 ?>
 <?php
if ($txnid != "")
{
		$currentdate=date("d-m-Y");
		 $ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster` where `Status`='Active'";
            $rsFY= mysql_query($ssqlFY);
            $row4=mysql_fetch_row($rsFY);
	        $CurrentFinancialYear=$row4[1];
           	$Year=$row4[0];

		
		$ssql="UPDATE `Commerce_Order_temp` SET `TxnStatus`='$txnstatus',`PGTxnId`='$pgtxnno',`trans_id`='$trans_id' where `TxnId`='$txnid'";	
		mysql_query($ssql) or die(mysql_error());
		mysql_query("update `Commerce_OrderDetail` set `trans_id`='$trans_id' where `TxnId`='$txnid'");
		$txnstatus ="SUCCESS";
		if($txnstatus !="SUCCESS")
		{
			echo "<br><br><center>Your Transaction was not successfully completed!<br>Order processing could not be completed successfully!";
			exit();
		}
			
			$rsTxnDetail=mysql_query("select `OrderNo` from `Commerce_Order_temp` where `TxnId`='$txnid'");
			$rowTxnDetail=mysql_fetch_row($rsTxnDetail);
			$OrderNo=$rowTxnDetail[0];
			
			$InvoiceNo=$CurrentFinancialYear."/".$OrderNo;
			//$ReceiptNo="MR/2015-16/OL/AF".$NewSrNo;
			
			mysql_query("update `Commerce_OrderDetail` set `InvoiceNo`='$InvoiceNo' where `TxnId`='$txnid'");
			mysql_query("UPDATE `Commerce_Order_temp` SET `InvoiceNo`='$InvoiceNo' where `TxnId`='$txnid'") or die(mysql_error());
			
			$rsChk= mysql_query("select * from `Commerce_OrderFinal` where `TxnId`='$txnid'");
			if (mysql_num_rows($rsChk) == 0)
			{
				mysql_query("insert into `Commerce_OrderFinal` (`OrderNo`, `InvoiceNo`, `CustId`, `Cust_Name`, `Cust_Address`, `Cust_Mobile`, `Cust_Email`, `Cust_Phone`, `DateOfPurchase`, `BillAmount`, `VAT`, `ServiceTax`, `ShippingCharges`, `FinalAmount`, `OrderStatus`, `DateOfDelivery`, `TxnId`, `TxnStatus`, `PGTxnId`, `PGTxnStatus`,`trans_id`, `PaymentMode`, `SystemDateandTime`,`ShippingAddress`, `BillingAddress`,`seller_id`,`ZIPCode`) select `OrderNo`, `InvoiceNo`, `CustId`, `Cust_Name`, `Cust_Address`, `Cust_Mobile`, `Cust_Email`, `Cust_Phone`, `DateOfPurchase`, `BillAmount`, `VAT`, `ServiceTax`, `ShippingCharges`, `FinalAmount`, `OrderStatus`, `DateOfDelivery`, `TxnId`, `TxnStatus`, `PGTxnId`, `PGTxnStatus`,`trans_id`, `PaymentMode`, `SystemDateandTime`,`ShippingAddress`,`BillingAddress`,`seller_id`,`ZIPCode` from `Commerce_Order_temp` where `TxnId`='$txnid'") or die(mysql_error());
			}
			
			
			$ssqlRegi="SELECT `OrderNo`, `InvoiceNo`, `CustId`, `Cust_Name`, `Cust_Address`, `Cust_Mobile`, `Cust_Email`, `Cust_Phone`, `DateOfPurchase`, `BillAmount`, `VAT`, `ServiceTax`, `ShippingCharges`, `FinalAmount`, `OrderStatus`, `DateOfDelivery`, `TxnId`, `TxnStatus`, `PGTxnId`, `PGTxnStatus`, `PaymentMode`, `SystemDateandTime`,`ShippingAddress`, `BillingAddress` FROM `Commerce_OrderFinal` as `a` where `TxnId`='$txnid'";	
			$rsRegiNo1= mysql_query($ssqlRegi);
			if (mysql_num_rows($rsRegiNo1) > 0)
			{
				while($row2 = mysql_fetch_row($rsRegiNo1))
				{
							$OrderNo=$row2[0];
							$InvoiceNo=$row2[1];
							$CustId=$row2[2];
							$Cust_Name=$row2[3];
							$Cust_Address=$row2[4];
							$Cust_Mobile=$row2[5];
							$Cust_Email=$row2[6];
							$Cust_Phone=$row2[7];
							$DateOfPurchase=$row2[8];
							$$BillAmount=$row2[9];
							$VAT=$row2[10];
							$ServiceTax=$row2[11];
							$ShippingCharges=$row2[12];
							$FinalAmount=$row2[13];
							$OrderStatus=$row2[14];
							$DateOfDelivery=$row2[15];
							$TxnId=$row2[16];
							$TxnStatus=$row2[17];
							$PGTxnId=$row2[18];
							$PGTxnStatus=$row2[19];
							$PaymentMode=$row2[20];
							$SystemDateandTime=$row2[21];
							$ShippingAddress=$row2[22];
							$BillingAddress=$row2[23];
							break;							
				}
			}

}
?>
<script language="javascript">
	function fnRedirect()
	{
		var FileLocation="http://emeraldsis.com/Admin/StudentManagement/PDFInvoices/" + document.getElementById("FileName").value ;
		//alert (FileLocation);	
		window.location.assign(FileLocation);
	}
	function printDiv() 
	{

        //Get the HTML of div

        var divElements = document.getElementById("MasterDiv").innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;



        //Reset the page's HTML with div's HTML only

        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";



        //Print Page

        window.print();



        //Restore orignal HTML

        document.body.innerHTML = oldPage;

 	}
</script>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logo Comes Here</title>
<style type="text/css">
.style1 {
	text-align: center;
}
</style>
</head>

<body>

<div align="center" id="MasterDiv">
<table style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; border-collapse: collapse; width: 679px; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221); margin-bottom: 20px; background-color: rgb(255, 255, 255);">
	<thead>
		<tr>
			<td colspan="2" style="border-right: 1px solid rgb(221, 221, 221); border-bottom: 1px solid rgb(221, 221, 221); font-family: arial, sans-serif; margin: 0px; font-size: 12px; font-weight: bold; padding: 7px; color: rgb(34, 34, 34); " class="style1">
<img src="../Admin/images/logo.png" height="84" width="282"></td>
		</tr>
		<tr>
			<td colspan="2" style="border-right: 1px solid rgb(221, 221, 221); border-bottom: 1px solid rgb(221, 221, 221); font-family: arial, sans-serif; margin: 0px; font-size: 12px; font-weight: bold; text-align: left; padding: 7px; color: rgb(34, 34, 34); ">
Thank you for placing your order on<span class="Apple-converted-space">&nbsp;</span><span class="il">DPS</span><span class="Apple-converted-space">&nbsp;</span>E-Shop. 
Your order has been received and will be processed as soon as possible. This is 
a cash on delivery order and you need to make the payment once order has been 
delivered to you!</td>
		</tr>
		<tr>
			<td colspan="2" style="border-right: 1px solid rgb(221, 221, 221); border-bottom: 1px solid rgb(221, 221, 221); font-family: arial, sans-serif; margin: 0px; font-size: 12px; font-weight: bold; text-align: left; padding: 7px; color: rgb(34, 34, 34); ">
			&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); font-weight: bold; text-align: left; padding: 7px; color: rgb(34, 34, 34); background-color: rgb(239, 239, 239);">
			Order Details</td>
		</tr>
	</thead>
	<tr>
		<td style="border-right: 1px solid rgb(221, 221, 221); border-bottom: 1px solid rgb(221, 221, 221); font-family: arial, sans-serif; margin: 0px; font-size: 12px; text-align: left; padding: 7px; width: 339px;">
		<b>Order ID: <?php echo $OrderNo;?></b><span class="Apple-converted-space">&nbsp;</span><br />
		<b>Date:<?php echo $currentdate;?></b><span class="Apple-converted-space">&nbsp;</span><br />
		<b>Payment Method:</b><span class="Apple-converted-space">&nbsp;<strong>COD</strong></span><br />
		<b>Shipping Method: By Courier</b><span class="Apple-converted-space">&nbsp;</span></td>
		<td style="border-right: 1px solid rgb(221, 221, 221); border-bottom: 1px solid rgb(221, 221, 221); font-family: arial, sans-serif; margin: 0px; font-size: 12px; text-align: left; padding: 7px; width: 339px;">
		<b>Name: <?php echo $Cust_Name;?><br>
		Address: <?php echo $ShippingAddress;?><br>
		E-mail: <?php echo $Cust_Email;?></b><span class="Apple-converted-space">&nbsp;</span><br />
		<b>Telephone: <?php echo $Cust_Mobile;?></b><span class="Apple-converted-space">&nbsp;</span>
		<!--<br /><b>IP Address: dff</b><span class="Apple-converted-space">&nbsp;&nbsp;</span>--><br />
		<b>Order Status: Pending</b><span class="Apple-converted-space">&nbsp;</span><br />
		&nbsp;</td>
	</tr>
</table>
<table style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; border-collapse: collapse; width: 679px; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221); margin-bottom: 20px; background-color: rgb(255, 255, 255);">
	<thead>
		<tr>
			<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); font-weight: bold; text-align: left; padding: 7px; color: rgb(34, 34, 34); background-color: rgb(239, 239, 239);">
			Payment Address</td>
			<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); font-weight: bold; text-align: left; padding: 7px; color: rgb(34, 34, 34); background-color: rgb(239, 239, 239);">
			Shipping Address</td>
		</tr>
	</thead>
	<tr>
		<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: left; padding: 7px;">
		<?php echo $BillingAddress;?></td>
		<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: left; padding: 7px;">
		<?php echo $ShippingAddress; ?></td>
	</tr>
</table>
<table style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; border-collapse: collapse; width: 679px; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221); margin-bottom: 20px; background-color: rgb(255, 255, 255);">
	<thead>
		<tr>
			<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); font-weight: bold; text-align: left; padding: 7px; color: rgb(34, 34, 34); background-color: rgb(239, 239, 239);">
			Product</td>
			<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); font-weight: bold; text-align: left; padding: 7px; color: rgb(34, 34, 34); background-color: rgb(239, 239, 239);">
			Model</td>
			<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); font-weight: bold; text-align: right; padding: 7px; color: rgb(34, 34, 34); background-color: rgb(239, 239, 239);">
			Quantity</td>
			<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); font-weight: bold; text-align: right; padding: 7px; color: rgb(34, 34, 34); background-color: rgb(239, 239, 239);">
			Price</td>
			<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); font-weight: bold; text-align: right; padding: 7px; color: rgb(34, 34, 34); background-color: rgb(239, 239, 239);">
			Total</td>
		</tr>
	</thead>
	<?php
	$ssql="SELECT `Product_Id`, `ProductName`, `Quantity`, `UnitPrice`, `TotalAmount`, `SystemDateandTime` FROM `Commerce_OrderDetail` WHERE `OrderNo`='$OrderNo'";
	$rsOrderDeatail=mysql_query($ssql);
	while($rowP=mysql_fetch_row($rsOrderDeatail))
	{
		$ProductName=$rowP[1];
		$Quantity=$rowP[2];
		$UnitPrice=$rowP[3];
		$TotalAmount=$rowP[4];
	
	?>
	<tr>
		<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: left; padding: 7px;">
			<b><?php echo $ProductName;?></b></td>
		<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: left; padding: 7px;">
			&nbsp;</td>
		<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: right; padding: 7px;">
			<b><?php echo $Quantity;?></b></td>
		<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: right; padding: 7px;">
			<b><?php echo $UnitPrice;?></b></td>
		<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: right; padding: 7px;">
			<b><?php echo $TotalAmount;?></b></td>
	</tr>
	<?php
	}
	?>
	<tfoot>
		<tr>
			<td colspan="4" style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: right; padding: 7px;">
			<b>Sub-Total:</b></td>
			<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: right; padding: 7px;">
			<b><?php echo $$BillAmount;?></b></td>
		</tr>
		<tr>
			<td colspan="4" style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: right; padding: 7px;">
			<b>VAT:</b></td>
			<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: right; padding: 7px;">
			<b><?php echo $VAT;?></b></td>
		</tr>
		<tr>
			<td colspan="4" style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: right; padding: 7px;">
			<b>Service Tax:</b></td>
			<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: right; padding: 7px;">
			<b><?php echo $ServiceTax;?></b></td>
		</tr>
		<tr>
			<td colspan="4" style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: right; padding: 7px;">
			<b>Flat Shipping Rate:</b></td>
			<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: right; padding: 7px;">
			<b><?php echo $ShippingCharges;?></b></td>
		</tr>
		<tr>
			<td colspan="4" style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: right; padding: 7px;">
			<b>Total:</b></td>
			<td style="font-family: arial, sans-serif; margin: 0px; font-size: 12px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); text-align: right; padding: 7px;">
			<b><?php echo $FinalAmount;?></b></td>
		</tr>
	</tfoot>
</table>
<table style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; border-collapse: collapse; width: 679px; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221); margin-bottom: 20px; background-color: rgb(255, 255, 255);">
	<thead>
		<tr>
			<td style="border-right: 1px solid rgb(221, 221, 221); border-bottom: 1px solid rgb(221, 221, 221); font-family: arial, sans-serif; margin: 0px; font-size: 12px; font-weight: bold; text-align: left; padding: 7px; color: rgb(34, 34, 34); ">
Please send an email at <a href="mailto:support@eduworldtech.com">
support@eduworldtech.com</a> for any support.</td>
		</tr>
	</thead>
</table>

</div>
<div id="divPrint">
	<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a> | <a href="dpsfsis.com">HOME</a></font> 
 </div>
</body>

</html>
<?php
$_SESSION['SelectedAppName']="";
$_SESSION['userid']="";
session_destroy();
?>