<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
{
	$ssql="SELECT `srno`, `EmpId`, `Name`, `L1_Approver_Id`, `L2_Approver_Id`, `Department`, `Designation` FROM `employee_master` WHERE 1=1";
		
		$rs= mysql_query($ssql);
}


$num_rows=0;

?>

<script language="javascript">

function ShowEdit(SrNo)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("EditEmployeeApprover.php?srno=" + SrNo ,"","width=700,height=650");
}



</script>



<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Delegation Of Authoriry</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	
<link rel="stylesheet" type="text/css" href="../../Admin/tcal.css" />

	<script type="text/javascript" src="../../Admin/tcal.js"></script>
	

<style type="text/css">

.style2 {

	border-collapse: collapse;

	border-style: solid;

	border-width: 1px;

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

{

        height:20px; 

        width: 100%; 

        margin:auto;        

        background-color:Blue;

        font-family: Calibri;

        font-weight:bold;

}



.style3 {

	text-decoration: none;

}

.auto-style7 {
	border-width: 0px;
}
.auto-style6 {
	
	font-family: Cambria;
	color: #000000;
}
.auto-style3 {
	font-family: Cambria;
	color: #000000;
}
.auto-style1 {
	
	text-align: center;
	font-family: Cambria;
	color: #000000;
	font-style: normal;
	text-decoration: none;
	}

.style11 {
	border-width: 1px;
}
.style12 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 15px;
	color: #000000;
	font-weight: bold;
}

.auto-style10 {
	
	text-align: right;
}

.auto-style11 {
	

	text-align: left;
	font-family: Cambria;
	color: #000000;
}
.auto-style12 {
	
	text-align: left;
}

.auto-style13 {
	color: #000000;
}
.auto-style15 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	font-style: normal;
	text-decoration: none underline;
}
.auto-style16 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	text-decoration: underline;
}
.auto-style17 {
	border-style: none;
	border-width: medium;
	color: #000000;
}
.auto-style18 {
	border-collapse: collapse;
	border-width: 0px;
}
.auto-style19 {
	border-collapse: collapse;
	border-width: 0;
}

.auto-style5 {
	text-align: left;
	font-family: Calibri;
	color: #000000;
	text-decoration: underline;
	font-size: medium;
}

.auto-style20 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 15px;
	color: #000000;
}

</style>

</head>



<body>


<table width="100%" cellspacing="1" height="80" bordercolor="#000000" id="table1" class="auto-style19">

		<tr>

		<td>

		<table border="1" width="100%" id="table2" bordercolor="#000000" class="auto-style18">

			<tr>

				<td class="auto-style17">
<p class="auto-style5" style="height: 12px">&nbsp;</p>
<p class="auto-style5" style="height: 12px"><strong>
<font face="Cambria" size="3">Delegation Of Authority</font></strong></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></p>
				
				</table>
	
	&nbsp;<table  id="table3" class="CSSTableGenerator">

			<tr>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 42px" class="style11">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">

				Sr. No.</span></td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 80px" class="style12">

				Employee Id</td>
				
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 48px" class="style12">

				Employee Name</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Designation</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Department</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Level 1 Approver</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Level 2 Approver</td>
				
				<!--
				<td height="35" bgcolor="#95C23D" align="center" style="width: 55px" class="style12">

				Nationality</td>
				-->
				
				<!--
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="style12">

				LastSchool</td>
				-->
				<!--
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="style12">

				Father's Education</td>
				
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="style12">

				Father's Occupation</td>
				-->
				
				<!--
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="style12">

				Mother's Education</td>
				-->
				
				<!--
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="auto-style20">
				<strong>IMEI</strong></td>
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="auto-style20">

				<strong>User Id</strong></td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="auto-style20">

				<strong>Password </strong></td>
				
-->

				<!--
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="auto-style20">

				<strong>Fee Payment Mode</strong></td>
				
					<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="auto-style20">

					<strong>Fee Discount Type</strong></td>
				-->

				<td height="35" bgcolor="#95C23D" align="center" style="width: 96px" class="style11">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">

				Edit</span></td>

							</tr>

			<?php
				$record_count=0;
				while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$record_count=$record_count+1;

					$Name=$row[2];

					$EmpID=$row[1];
					
				
					
					$Designation=$row[6];

					$Department=$row[5];

					$Level1Approver=$row[3];

					$Level2Approver=$row[4];

					
					$num_rows=$num_rows+1;

			?>

			<tr>

				<td height="35" align="center" style="width: 42px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $record_count; ?></span></td>
				<td height="35" align="center" style="width: 80px" class="style11">
				<?php echo $EmpID;?>
				</td>

				<td height="35" align="center" style="width: 48px" class="style11">
				<?php echo $Name;?>
				</td>
				
				<td height="35" align="center" style="width: 95px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Designation; ?></span></td>
				
				<td height="35" align="center" style="width:95px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Department; ?></span></td>
				
				<td height="35" align="center" style="width: 95px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Level1Approver; ?></span></td>
				
				<td height="35" align="center" style="width: 95px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Level2Approver; ?></span></td>


				<td height="35" align="center" style="width: 96px" class="style11">

				<font face="Cambria">

				<a href="Javascript:ShowEdit(<?php echo $srno ?>);" class="style3">Edit</a></font></td>

				</tr>

			<?php

			}

			?>

			
		</table>

		</td>

		<td>

		&nbsp;</td>

	</tr>

</table>

<!--<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>-->


</body>



</html>