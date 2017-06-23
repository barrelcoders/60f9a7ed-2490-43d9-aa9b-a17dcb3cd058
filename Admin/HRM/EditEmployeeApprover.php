<?php
session_start();
include '../../connection.php';
?>
<?php
$SrNo=$_REQUEST["srno"];


$sstr="SELECT distinct `discounttype` FROM `discounttable`";
$rsDiscount= mysql_query($sstr);

if ($SrNo !="")
{
	$ssql="SELECT `srno`, `EmpId`, `Name`, `L1_Approver_Id`, `L2_Approver_Id`, `Department`, `Designation` FROM `employee_master` WHERE `srno`=$SrNo";
	$rs= mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
					$srno=$row[0];
					$EmpID=$row[1];
					
					$Name=$row[2];
					$Designation=$row[6];
					$Department=$row[5];
					$Level1Approver=$row[3];
					$Level2Approver=$row[4];
					
	}
}
	
if ($_REQUEST["txtName"] !="")
{
	$srno=$_REQUEST["SrNo"];
		$EmpID=$_REQUEST["txtEmpID"];


	$Name=$_REQUEST["txtName"];

	$Designation=$_REQUEST["txtDesignation"];
	$Category=$_REQUEST["txtCategory"];
	$Department=$_REQUEST["txtDepartment"];
	$Level1Approver=$_REQUEST["txtLevel1Approver"];
	$Level2Approver=$_REQUEST["txtLevel2Approver"];
	
			$ssql="UPDATE `employee_master` SET `L1_Approver_Id`='$Level1Approver',`L2_Approver_Id`='$Level2Approver' WHERE `srno` = '$srno'";
			mysql_query($ssql) or die(mysql_error());
			
			echo "<br><center> <b>Updated Successfully <br> Click <a href='Javascript: window.close();'>here</a> to close window";
			exit();
}



?>

<script language="javascript">

function Validate()

{

	if (document.getElementById("txtName").value=="")

	{

		alert("Name is mandatory");

	}

	document.getElementById("frmEditStudentMaster").submit();

	

}
	
	
</script>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Edit Employee Master</title>

<!-- link calendar resources -->

		<link rel="stylesheet" type="text/css" href="../css/style.css" />
	
<link rel="stylesheet" type="text/css" href="../../Admin/tcal.css" />

	<script type="text/javascript" src="../../Admin/tcal.js"></script>
	
<style type="text/css">

.style1 {

	border-collapse: collapse;

	border: 1px solid #808080;

}

.style2 {

	text-align: center;

}

.style3 {

	color: #000000;

	font-family: Cambria;

	font-size: 12pt;

	background-color: #FFFFFF;

}
.footer {
    height:20px; 
    width: 100%; 
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    position: fixed;
    bottom: 2pt;
    left: 0pt;
}   

.footer_contents 

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}

.style4 {

	text-align: left;

	font-family: Cambria;

	font-size: 12pt;

	color: #000000;

	background-color: #FFFFFF;

}

.style5 {

	text-align: left;

}

</style>

</head>



<body onunload="window.opener.location.reload();">



<table style="width: 100%" class="style1">

<form name="frmEditStudentMaster" id="frmEditStudentMaster" method="post" action="EditEmployeeApprover.php">

<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">

	<tr>

		<td style="width: 523px" class="style3"><strong>Emp Id:</strong></td>

		<td style="width: 524px">

		<input name="txtEmpID" id="txtEmpID" type="text" value="<?php echo $EmpID; ?>"></td>

	</tr>

	<tr>

		<td style="width: 523px" class="style3"><strong>Name:</strong></td>

		<td style="width: 524px">

		<input name="txtName" id="txtName" type="text" value="<?php echo $Name; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Department:</strong></td>

		<td style="width: 524px">

		<input name="txtDepartment" id="txtDepartment" type="text" value="<?php echo $Department; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Designation:</strong></td>

		<td style="width: 524px">

		<input name="txtDesignation" id="txtDesignation" type="text" value="<?php echo $Designation; ?>"></td>

	

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Level 1 Approver:</strong></td>

		<td style="width: 524px">

		<input name="txtLevel1Approver" id="txtLevel1Approver" type="text" value="<?php echo $Level1Approver; ?>" style="height: 22px"></td>

	</tr>

	<tr>

		<td style="width: 523px" class="style3"><strong>Level 2 Approver</strong>:</td>

		<td style="width: 524px">



		<input name="txtLevel2Approver" id="txtLevel2Approver" type="text" value="<?php echo $Level2Approver; ?>" style="height: 22px"></td>

	</tr>

	
	<tr>

		<td colspan="2" class="style2">

		<input name="Submit1" type="button" value="submit" onclick="Javascript:Validate();"></td>

	</tr>

	</form>

</table>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>



</html>