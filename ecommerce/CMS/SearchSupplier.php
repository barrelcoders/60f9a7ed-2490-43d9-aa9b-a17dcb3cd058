<?php 
include '../../connection.php'; 
include '../../Admin/Header/Header3.php';

?>
<?php
$VendorName=$_REQUEST["VendorName"];
$PRNo=$_REQUEST["PRNo"];
$VendorNo=$_REQUEST["VendorNo"];

$rs=mysql_query("select `SupplierCode`,`suppliername`,`mobileno`,`emailid` from `Commerce_supplier_master` where `suppliername`='".$VendorName."'");
$rsPO=mysql_query("select `PONumber` from `inv_POMaster` where `VendorName`='$VendorName'");



if($_REQUEST["txtSupplierCode"] !="")
{
	$SupplierCode=$_REQUEST["txtSupplierCode"];
	$SupplierName=$_REQUEST["txtSupplierName"];
	$Address=$_REQUEST["txtAddress"];
	$City=$_REQUEST["txtCity"];
	$Mobile=$_REQUEST["txtMobile"];
	$Email=$_REQUEST["txtEmail"];
	$Description=$_REQUEST["txtDescription"];
	$rsChk=mysql_query("select * from `Commerce_supplier_master` where `SupplierCode`='$SupplierCode'");
	if(mysql_num_rows($rsChk)>0)
	{
		echo "<br><center><b>Supplier Code aready exists!";
		exit();
	}

	mysql_query("insert into `Commerce_supplier_master` (`SupplierCode`, `suppliername`, `address`, `city`, `state`, `mobileno`, `emailid`, `description`) values ('$SupplierCode','$SupplierName','$Address','$City','$Mobile','$Email','$Description')");
	echo "<br><center><b>New Supplier has been added successfully!<br>Click here to generate PO";
	exit();	
}

?>
<script language="javascript">
function Validate()
{
	if (document.getElementById("txtSupplierCode").value=="")
	{
		alert("Please enter supplier code");
		return;
	}
	if (document.getElementById("txtSupplierName").value=="")
	{
		alert("Please enter supplier name");
		return;
	}
	if (document.getElementById("txtAddress").value=="")
	{
	alert("Please enter supplier address");
		return;
	}
	if (document.getElementById("txtCity").value=="")
	{
	alert("Please enter supplier city");
		return;
	}
	if (document.getElementById("txtMobile").value=="")
	{
	alert("Please enter supplier mobilie");
		return;
	}
	if (document.getElementById("txtEmail").value=="")
	{
	alert("Please enter supplier email");
		return;
	}
	if (document.getElementById("txtDescription").value=="")
	{
	alert("Please enter supplier description");
		return;
	}
	document.getElementById("frmAddSupplier").submit();
}
function fnlAddNew()
{
window.opener.location.href='suppliermaster.php';
close();
}
function fnlRaisePO(cnt)
{
	PRNo=document.getElementById("txtPRNo"+cnt).value;
	VendorCode=document.getElementById("txtVendorCode"+cnt).value;
	VendorName=document.getElementById("txtVendorName"+cnt).value;
	POType=document.getElementById("cboPO"+cnt).value;
	//window.location.href='PurchaseOrder.php?PRNNo='+PRNo+'&VendorCode='+VendorCode+'&VendorName='+VendorName+'&POType='+POType;
	

document.getElementById("btnPO"+cnt).disabled=true;
document.getElementById("hVendorCode").value=VendorCode;
document.getElementById("hVendorName").value=VendorName;
document.getElementById("hPRNo").value=PRNo;
document.getElementById("hPOType").value=POType;
document.getElementById("frmDetail").submit();
	
}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../Admin/css/style.css" />

<title>Untitled 1</title>
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style3 {
	font-family: Cambria;
	text-align: center;
	border: 1px solid #000000;
}
.style4 {
	font-family: Cambria;
	text-align: left;
	border: 1px solid #000000;
}
</style>
</head>

<body>
<?php
if(mysql_num_rows($rs)==0)
{
	echo "<b><center>Supplier does not found!<br>Please click <a href='javascript:fnlAddNew();'>here</a> to add a new supplier";
	exit();
}
else
{
?>

<table style="width: 100%" class="style1">
	<tr>
		<td class="style4" colspan="7"><strong>Select Supplier from the list :</strong></td>
	</tr>
	<tr>
		<td class="style3" style="width: 256px">Sr.No</td>
		<td class="style3" style="width: 256px">Supplier Code</td>
		<td class="style3" style="width: 256px">Supplier Name</td>
		<td class="style3" style="width: 257px">Mobile</td>
		<td class="style3" style="width: 257px">Email</td>
		<td class="style3" style="width: 257px">Add to Existing PO</td>
		<td class="style3" style="width: 257px">Add</td>
	</tr>
	<?php
	$recno=1;
	while($row=mysql_fetch_row($rs))
	{
		$SupplierCode=$row[0];
		$suppliername=$row[1];
		$mobileno=$row[2];
		$emailid=$row[3];
	?>
	<tr>
		<td class="style3" style="width: 256px"><?php echo $recno;?>.</td>
		<td class="style3" style="width: 256px">
		<?php echo $SupplierCode;?>
		<input type="hidden" name="txtVendorCode<?php echo $recno;?>" id="txtVendorCode<?php echo $recno;?>" value="<?php echo $SupplierCode;?>">
		<input type="hidden" name="txtVendorName<?php echo $recno;?>" id="txtVendorName<?php echo $recno;?>" value="<?php echo $suppliername;?>">
		<input type="hidden" name="txtPRNo<?php echo $recno;?>" id="txtPRNo<?php echo $recno;?>" value="<?php echo $PRNo;?>">
		</td>
		<td class="style3" style="width: 256px"><?php echo $suppliername;?></td>
		<td class="style3" style="width: 257px"><?php echo $mobileno;?></td>
		<td class="style3" style="width: 257px"><?php echo $emailid;?></td>
		<td class="style3" style="width: 257px">
			<select name="cboPO<?php echo $recno;?>" id="cboPO<?php echo $recno;?>">
			<option selected="selected" value="">Raise New P.O.</option>
			<?php
			mysql_data_seek($rsPO, 0);
			while($rowV=mysql_fetch_row($rsPO))
			{
				$PONo=$rowV[0];
			?>
			<option value="<?php echo $PONo;?>"><?php echo $PONo;?></option>
			<?php
			}
			?>
			</select>
		</td>
		<td class="style3" style="width: 257px">
			<input name="btnPO<?php echo $recno;?>" id="btnPO<?php echo $recno;?>" type="button" value="Convert To PO" onclick="javascript:fnlRaisePO('<?php echo $recno;?>');">
		</td>
	</tr>
	<?php
		$recno=$recno+1;
	}
	?>
</table>
<?php
}
?>
<form name="frmDetail" id="frmDetail" method="post" action="PurchaseOrder.php" target="_blank">
<input type="hidden" name="hVendorCode" id="hVendorCode" value="">
<input type="hidden" name="hVendorName" id="hVendorName" value="">
<input type="hidden" name="hPRNo" id="hPRNo" value="">
<input type="hidden" name="hPOType" id="hPOType" value="">
<input type="VendorNo" id="VendorNo" value="<?php echo $VendorNo;?>">
</form>
</body>

</html>
