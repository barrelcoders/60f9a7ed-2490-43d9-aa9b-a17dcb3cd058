<?php 
session_start();
include '../../AppConf.php';

include '../../connection.php';
include '../Header/Header3.php';

                  $suser=$_SESSION['suser'];
				$password1=$_SESSION['password'];
				$VendorName=$_SESSION['VendorName'];
				$VendorCode=$_SESSION['VendorCode'];

?>
<?php


//$rs=mysql_query("SELECT `srno`,`EmployeeID`, `EmployeeName`, `materialcategory`, `quantity`,`material_subcategory`,`Budget`,`requirement_No`,`Date_Of_Requirement`,`justification` FROM `inv_purchaserequest` WHERE `ApprovalL1`='Pending'");
$ssql="SELECT `srno`,`VendorCode`, `OrderNo`, `InvoiceNo`, `Cust_Id`, `Product_Id`, `ProductName`, `DateOfPurchase`, `Quantity`, `UnitPrice`, `TotalAmount`, `SystemDateandTime`, `TxnId`, `trans_id`, `seller_id`, `merchant_split_ref`, `split_id`, `split_amount`, `fee_amount`, `settlement_ref`, `settlement_amount`, `settlement_id`, `settlement_date_time`, `releasefund_ref`, `releaseamount`, `payout`, `VendorPaymentStatus` FROM `Commerce_OrderDetail` WHERE `VendorCode`='$VendorCode'";



$rs= mysql_query($ssql);



?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<link rel="stylesheet" type="text/css" href="../../Admin/css/style.css" />
<title>Purchase Request Status Report</title>
</head>

<body>
<form name="frmRpt" method="post" action="">

<p>&nbsp;</p>
<p><b><font face="Cambria" style="font-size: 11pt">Order Detail</font></b><font face="Cambria" style="font-size: 11pt"><b> Report</b></font></p>
<hr>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<div id="MasterDiv">
<table width="100%" class="CSSTableGenerator" style="border-collapse: collapse" border="1">
	<tr>
		   <td colspan="11">
			<p style="text-align: center"><b>
			<font size="4"><img src="../../Admin/images/logo.png" width=250 height="70"></img></font><br>
			<?php echo $SchoolAddress; ?></span></b><p style="text-align: center"><b>

			<font face="Cambria">Order  Report</font><br></strong></span></span><strong><font style="font-size: 12pt"> </font> </strong></td>
		   

		   			   
   	</tr>
	<tr>
		<td align="center" width="99"><font face="Cambria">Sr No</font></td>
		<td align="center" width="99"><font face="Cambria">Order No</font></td>
		<td align="center" width="99"><font face="Cambria">Invoice No</font></td>
		<td align="center" width="99"><font face="Cambria">Customer Id</font></td>
		<td align="center" width="99"><font face="Cambria">Product Id</font></td>
		<td align="center" width="99">Product Name</td>
		<td align="center" width="100">Date Of Purchase</td>
		<td align="center" width="100">Quantity</td>
		<td align="center" width="100">Unit Price</td>
		<td align="center" width="100">Total Amount</td>
		<td align="center" width="100">Txn Id</td>
	</tr>
	
<?php
	$recno=1;
	while($row=mysql_fetch_row($rs))
	{
		$srno=$row[0];
	    $OrderNo=$row[2];
		$InvoiceNo=$row[3];
		$CustomerId=$row[4];
		$ProductId=$row[5];
		$ProductName=$row[6];
		$DateOfPurchase=$row[7];
		$Quantity=$row[8];
		$UnitPrice=$row[9];
		$TotalAmount=$row[10];
		$TxnId=$row[12];
		

	?>
	<tr>
		<td width="99"><?php echo $recno;?></td>
		<td width="99"><?php echo $OrderNo;?></td>
		<td width="99"><?php echo $InvoiceNo;?></td>
		<td width="99"><?php echo $CustomerId;?></td>
		<td width="99" ><?php echo $ProductId;?></td>
		<td width="99" ><?php echo $ProductName;?></td>
		
		<td width="100"><?php echo $DateOfPurchase;?></td>
		<td width="100"><?php echo $Quantity;?></td>
		<td width="100"><?php echo $UnitPrice;?></td>
        
		<td width="100"><?php echo $TotalAmount;?></td>
		<td width="1"><?php echo $TxnId;?></td>
		

	</tr>
	<?php
	$recno=$recno+1;
	}
	?>
</table>
</div>
<br>
<br>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
<SCRIPT language="javascript">
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


</form>
</body>

</html>