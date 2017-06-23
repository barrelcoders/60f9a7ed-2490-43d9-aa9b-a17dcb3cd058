<?php
session_start();
include '../../connection.php';
?>
<?php
$DrawClass=$_REQUEST["cboClass"];
$ssql="Select `sadmission`,`sname`,`sclass`,`srollno`,`sfathername`,`MotherName`,`smobile`,`Address` from `student_master` where `sclass`='$DrawClass'";

//echo $ssql;

//exit();


$rs=mysql_query($ssql);


$cnt=0;
?>


<script language="javascript">
	function printDiv() 
	{
	        //Get the HTML of div
	        var divElements = document.getElementById("MasterDiv").innerHTML;
	        //Get the HTML of whole page
	        var oldPage = document.body.innerHTML;
	        //Reset the page's HTML with div's HTML only
	        document.body.innerHTML = "<html><head><title></title></head><body>" + 
	          divElements + "</body>";
	        //Print Page
	        window.print();
	        //Restore orignal HTML
	        document.body.innerHTML = oldPage;
	 }
</script>
<html>
<head>
	<meta http-equiv="Content-Language" content="en-us">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
	<meta name="author" content="gencyolcu" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<title>Identity Card</title>
	
</head>

<body>

<style type="text/css">
.style1 {
	font-family: Cambria;
}
.style2 {
	border-collapse: collapse;
}
.style3 {
	text-align: center;
}
.style4 {
	font-weight: bold;
	border-width: 1px;
	font-size: 11pt;
}
.style5 {
	border-collapse: collapse;
	border-top-width: 0px;
}
.style7 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 11pt;
}
.style8 {
	font-family: Cambria;
	font-size: x-small;
}
.style9 {
	font-size: 11pt;
	font-weight: normal;
}
.style10 {
	font-size: 11pt;
}
.style11 {
	font-size: 11pt;
	font-weight: bold;
}
.style12 {
	font-size: 11pt;
}
.style13 {
	font-family: Cambria;
	font-size: 11pt;
}
.style14 {
	text-align: right;
}
.style16 {
	font-size: 12pt;
}

.style17 {

	height: 75px;
	width: 420px;
	background-repeat-x: no-repeat;
	background-repeat-y: no-repeat;
}

</style>

<div id="MasterDiv">
<table border="1" width="100%"  style="border-collapse: collapse">
	<tr>
		<td height="46" width="25">S.No</td>
		<td height="46" width="60">Admission</td>
		<td height="46" width="74">Name</td>
		<td height="46" width="48">Class</td>
		<td height="46">Roll No</td>
		<td height="46" width="119">Father Name</td>
		<td height="46" width="91">Mother Name</td>
		<td height="46" width="65">Mobile No</td>
		<td height="46" width="101">Address</td>
		<td height="46">Father Photo</td>
		<td height="46">Mother Photo</td>
		<td height="46">Guardian Photo</td>
	</tr>
	<?php
$cnt=0;
$recno=1;
while($row = mysql_fetch_row($rs))
{
	$sadmission=$row[0];
	$ApplicantName=$row[1];
	$sclass=$row[2];
	$srollno=$row[3];
	$Address=$row[7];
	$FatherName=$row[4];
	$MotherName=$row[5];
	$MobileNo=$row[6];
	
	

?>

	<tr>
		<td width="25"><?php echo $recno; ?></td>
		<td width="60"><?php echo $sadmission; ?></td>
		<td width="74"><?php echo $ApplicantName; ?></td>
		<td width="48"><?php echo $sclass; ?></td>
		<td><?php echo $srollno; ?></td>
		<td width="119"><?php echo $FatherName; ?></td>
		<td width="91"><?php echo $MotherName; ?></td>
		<td width="65"><?php echo $MobileNo; ?></td>
		<td width="101"><?php echo $Address; ?></td>
		<td height="150px" width="126"></td>
		<td height="150px" width="111"></td>
		<td height="150px" width="121"></td>
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



</body>
</html>