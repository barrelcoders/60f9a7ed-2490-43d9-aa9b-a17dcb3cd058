<?php include '../connection.php';?>
<?php
$Cat=$_REQUEST["Cat"];
$SubCat=$_REQUEST["SubCat"];
if($Cat !="")
{
	$rs=mysql_query("select `Category`,`ProductName`,`UnitPrice` from `Commerce_Product` where `Category`='$Cat' and `SubCategory`='$SubCat' and `Status`='InActive'");
}
else
{
	$rs=mysql_query("select `Category`,`ProductName`,`UnitPrice` from `Commerce_Product` where `SubCategory`='$SubCat' and `Status`='InActive'");
}
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sr</title>
<style type="text/css">
.style2 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style3 {
	font-family: Cambria;
	border: 1px solid #000000;
}
.style4 {
	font-family: Cambria;
	text-align: center;
	border: 1px solid #000000;
}
</style>
</head>

<body>

<table style="width: 100%" align="center" class="style2">
	<tr>
		<td class="style3" style="width: 38px">Sr.No</td>
		<td class="style4" style="width: 400px">Category</td>
		<td class="style4" style="width: 400px">Product Name</td>
		<td class="style4" style="width: 400px">Unit Price (INR)</td>
	</tr>
	<?php
	$recno=0;
	while($row=mysql_fetch_row($rs))
	{
			$Category=$row[0];
			$ProductName=$row[1];
			$UnitPrice=$row[2];
			$recno=$recno+1;
	
	?>
	<tr>
		<td class="style4" style="width: 38px"><?php echo $recno;?>.</td>
		<td class="style3" style="width: 400px"><?php echo $Category;?></td>
		<td class="style3" style="width: 400px"><?php echo $ProductName;?></td>
		<td class="style3" style="width: 400px"><?php echo $UnitPrice;?></td>
	</tr>
	<?php
	}
	?>
</table>

</body>

</html>
