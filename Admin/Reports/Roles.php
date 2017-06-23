<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php
	if ($_REQUEST["txtEmpId"] != "")
	{
		$EmpId=$_REQUEST["txtEmpId"];
	
	   	$ssql="SELECT `srno` , `EmpId` , `ApplicationName`,`MasterMenu`,`Menu`,`PageURL`,`BaseURL` ,`status` FROM `user_menu_master` where `EmpId`='$EmpId' order by `ApplicationName`,`MasterMenu`";
		$rs= mysql_query($ssql);
	}
?>

<script language="javascript">

function ShowEdit(SrNo)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("DeleteEmpRole.php?srno=" + SrNo ,"","width=400,height=350");
}

function Validate()
{
	if(document.getElementById("txtEmpId").value=="")
	{
		alert("Employee Id is mandatory!");
		return;
	}
	document.getElementById("frmDeleteRole").submit();
}



</script>



<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Student Registration</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

	

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

.style13 {
	border-width: 1px;
	font-family: Cambria;
}
.style14 {
	text-decoration: none;
}
.style15 {
	background-color: #95C23D;
}

.style16 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style17 {
	border: 1px solid #000000;
}
.style18 {
	font-family: Cambria;
}

.style19 {
	border: 1px solid #000000;
	text-align: center;
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
<p class="auto-style5" style="height: 12px"><font face="Cambria" size="3">
<strong>Employee Role &amp; Responsibility</strong></font></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px" align="center"><a href="javascript:history.back(1)">
<img src="../images/BackButton.png" style="float: right" height="26" width="62"></a></p>
				
				</table>
	
		<table style="width: 100%" class="style16" cellspacing="0" cellpadding="0" height="38">
			<form name="frmDeleteRole" id="frmDeleteRole" method="post" action="">
			<tr>
				<td class="style17" style="width: 157px"><span class="style18">
				<strong>Enter Employee ID:</strong></span>&nbsp;</td>
				<td class="style19" style="width: 197px">&nbsp;<input name="txtEmpId" id="txtEmpId" type="text"></td>
				<td class="style19" style="width: 950px">
				<input name="btnSubmit" type="button" value="Submit" onclick="Javascript:Validate();" style="float: left; font-weight:700"></td>
			</tr>
			</form>
		</table>
<?php
	if ($_REQUEST["txtEmpId"] != "")
	{
?>
		<br>
		<table width="100%" bordercolor="#000000" id="table3" class="style2" border=1 cellspacing="0" cellpadding="0" style="border-width: 1px" height="44">

			<tr>

				<td height="20" bgcolor="#95C23D" align="center" style="width: 55px" class="style11">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">

				Sr. No.</span></td>

				<td height="20" bgcolor="#95C23D" align="center" style="width: 117px" class="style12">

				Emp. Id.</td>
				
				<td height="20" bgcolor="#95C23D" align="center" style="width: 199px" class="style12">

				Application Name</td>
				
				<td height="20" bgcolor="#95C23D" align="center" style="width: 182px" class="style12">

				Master M<span class="style15">enu</span></td>
				
				<td height="20" bgcolor="#95C23D" align="center" style="width: 160px" class="style12">

				Menu</td>
				
				<td height="20" bgcolor="#95C23D" align="center" style="width: 144px" class="style12">

				Page U<span class="style15">RL</span></td>
				
				<td height="20" bgcolor="#95C23D" align="center" style="width: 134px" class="style12">

				Base URL</td>

				<td height="20" bgcolor="#95C23D" align="center" style="width: 100px" class="style12">

				Status</td>


				

							</tr>

			<?php
				$num_rows=0;
				while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$EmpId=$row[1];
					$ApplicationName=$row[2];
					$MasterMenu=$row[3];
					$Menu=$row[4];
					$PageURL=$row[5];
					$BaseURL=$row[6];
					$status=$row[7];
					
					$num_rows=$num_rows+1;

			?>

			<tr>

				<td height="25" align="center" style="width: 55px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $srno; ?></span></td>

				<td height="25" align="center" style="width: 117px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $EmpId; ?></span></td>
				
				<td height="25" align="center" style="width:199px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $ApplicationName; ?></span></td>
				
				<td height="25" align="center" style="width: 182px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $MasterMenu; ?></span></td>
				
				<td height="25" align="center" style="width: 160px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Menu; ?></span></td>
				
				<td height="25" align="left" style="width: 144px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $PageURL; ?></span></td>
				
				<td height="25" align="left" style="width: 134px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $BaseURL; ?></span></td>
				
				<td height="25" align="center" style="width: 100px" class="style11">
				
				<font face="Cambria"><?php echo $status; ?></font></td>
				
				

				</tr>

			<?php

			}

			?>

			
		</table>
<?php
}
?>
		</td>

		<td>
</td>

	</tr>

</table>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>


</body>



</html>