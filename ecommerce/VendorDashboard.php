<?php
include '../connection.php';
include '../AppConf.php';
session_start(); 

?>
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

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<link rel="stylesheet" type="text/css" href="../../Admin/css/style.css" />
<title>Vendor Dashoard</title>
</head>

<body>
<form name="frmRpt" method="post" action="">

<p>&nbsp;</p>
<hr>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center"><b><font face="Cambria" style="font-size: 14pt">Vendor DashBoard</font></b><font face="Cambria" style="font-size: 11pt"><b></b></font></p>

<div>
<table style="border-collapse: collapse" width="100%" border="1">
<tr>
<td><a href=""><img  height="110px" width="110px" src="CMS/img/VendorProfile.jpg"><b><font face="Cambria" style="font-size: 11pt">My Profile</font></b></a></td>
<td><a href="../Admin/StudentManagement/CheckUserNamePassword.php"><img  height="110px" width="110px" src="CMS/img/StudentDetail.png"><b><font face="Cambria" style="font-size: 11pt">Check Student Details</font></a></b></td>
<td><a href="CMS/ProductReport.php"><img   height="110px" width="110px" src="CMS/img/ProductDetail.png"><b><font face="Cambria" style="font-size: 11pt">My Products</font></b></a></td>
<td><a href="CMS/OrderDetail.php"><img   height="110px" width="110px" src="CMS/img/OrderDetail.png"><b><font face="Cambria" style="font-size: 11pt">My Orders</font></b></a></td>
<td><a href="CMS/CreateProduct.php"><img   height="110px" width="110px" src="CMS/img/AddProduct.png"><b><font face="Cambria" style="font-size: 11pt">Add Product</font></b></a></td>
</tr>


</table>


</div>
<br>
<br>

</form>
</body>

</html>