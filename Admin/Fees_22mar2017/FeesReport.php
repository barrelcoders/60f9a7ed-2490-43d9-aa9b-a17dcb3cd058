<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php

if ($_REQUEST["cboQuarter"] !="")
{
	if ($_REQUEST["cboQuarter"] !="Select One")
	{
				$SelectedQuarter=$_REQUEST["cboQuarter"];
				if ($_REQUEST["cboClass"] =="All")
				{
					//TOTAL TUTION FEE FOR SELECTED QUARTER
					$ssql="select sum(Q1_Amt) from (SELECT `sname`,`sclass`,(SELECT `amount` FROM  `fees_master` where `class`= a.`sclass` and `quarter`='$SelectedQuarter') Q1_Amt FROM `student_master` a) as x";
					$rsTutionFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTutionFee))
						{
							$TotalTutionFee=$row[0];
						}
					
					//TOTAL TRANSPORT FEE FOR ONE QUARTER
					$ssql="select SUM(x.routecharge) from (SELECT  `sname` ,  `sclass` ,  `routeno` , (SELECT  `routecharges` FROM  `RouteMaster` WHERE  `routeno` = a.`routeno`) routecharge FROM  `student_master` a) as x where routecharge !='NULL'";
					$rsTransportFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTransportFee))
						{
							$TotalTransportFee=$row[0];
						}
					$TotalFee4Quarter=$TotalTutionFee + $TotalTransportFee;
					
					$ssql="SELECT sum(`amountpaid`) FROM `fees` WHERE `quarter`='$SelectedQuarter'";
					$rsCollectedInQuarter = mysql_query($ssql);
					while($row = mysql_fetch_row($rsCollectedInQuarter))
						{
							$TotalFeeCollectedInQuarter=$row[0];
						}
				}
				else
				{
					//FOR SELECTED CLASS
					//TOTAL TUTION FEE FOR SELECTED QUARTER AND SELECTED CLASS
					$SelectedClass=$_REQUEST["cboClass"];
					$ssql="select sum(Q1_Amt) from (SELECT `sname`,`sclass`,(SELECT `amount` FROM  `fees_master` where `class`= a.`sclass` and `quarter`='$SelectedQuarter') Q1_Amt FROM `student_master` a WHERE `sclass`='$SelectedClass') as x";
					$rsTutionFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTutionFee))
						{
							$TotalTutionFee=$row[0];
						}
					
					//TOTAL TRANSPORT FEE FOR ONE QUARTER
					$ssql="select SUM(x.routecharge) from (SELECT  `sname` ,  `sclass` ,  `routeno` , (SELECT  `routecharges` FROM  `RouteMaster` WHERE  `routeno` = a.`routeno`) routecharge FROM  `student_master` a WHERE `sclass`='$SelectedClass') as x where routecharge !='NULL'";
					$rsTransportFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTransportFee))
						{
							$TotalTransportFee=$row[0];
						}
					$TotalFee4Quarter=$TotalTutionFee + $TotalTransportFee;
					
					$ssql="SELECT sum(`amountpaid`) FROM `fees` WHERE `quarter`='$SelectedQuarter' and `sclass`='$SelectedClass'";
					$rsCollectedInQuarter = mysql_query($ssql);
					while($row = mysql_fetch_row($rsCollectedInQuarter))
						{
							$TotalFeeCollectedInQuarter=$row[0];
						}
				
				}
	}
	else
	{
		//ALL QUARTER SELECTED
				if ($_REQUEST["cboClass"] =="All")
				{
					//TOTAL TUTION FEE FOR SELECTED QUARTER
					//TOTAL TUTION FEE FOR SELECTED QUARTER
					$ssql="select sum(Q1_Amt) from (SELECT `sname`,`sclass`,(SELECT `amount` FROM  `fees_master` where `class`= a.`sclass` and `quarter`='Q1') Q1_Amt FROM `student_master` a) as x";
					$rsTutionFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTutionFee))
						{
							$Q1TotalTutionFee=$row[0];
						}
					
										
					$ssql="select sum(Q1_Amt) from (SELECT `sname`,`sclass`,(SELECT `amount` FROM  `fees_master` where `class`= a.`sclass` and `quarter`='Q2') Q1_Amt FROM `student_master` a) as x";
					$rsTutionFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTutionFee))
						{
							$Q2TotalTutionFee=$row[0];
						}
					
					$ssql="select sum(Q1_Amt) from (SELECT `sname`,`sclass`,(SELECT `amount` FROM  `fees_master` where `class`= a.`sclass` and `quarter`='Q3') Q1_Amt FROM `student_master` a) as x";
					$rsTutionFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTutionFee))
						{
							$Q3TotalTutionFee=$row[0];
						}
					
					$ssql="select sum(Q1_Amt) from (SELECT `sname`,`sclass`,(SELECT `amount` FROM  `fees_master` where `class`= a.`sclass` and `quarter`='Q4') Q1_Amt FROM `student_master` a) as x";
					$rsTutionFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTutionFee))
						{
							$Q4TotalTutionFee=$row[0];
						}
					
					$ssql="SELECT sum(`amountpaid`) FROM `fees` WHERE `quarter`='Q1'";
					$rsCollectedInQuarter = mysql_query($ssql);
					while($row = mysql_fetch_row($rsCollectedInQuarter))
						{
							$Q1TotalFeeCollected=$row[0];
						}
					$ssql="SELECT sum(`amountpaid`) FROM `fees` WHERE `quarter`='Q2'";
					$rsCollectedInQuarter = mysql_query($ssql);
					while($row = mysql_fetch_row($rsCollectedInQuarter))
						{
							$Q2TotalFeeCollected=$row[0];
						}
					$ssql="SELECT sum(`amountpaid`) FROM `fees` WHERE `quarter`='Q3'";
					$rsCollectedInQuarter = mysql_query($ssql);
					while($row = mysql_fetch_row($rsCollectedInQuarter))
						{
							$Q3TotalFeeCollected=$row[0];
						}
					$ssql="SELECT sum(`amountpaid`) FROM `fees` WHERE `quarter`='Q4'";
					$rsCollectedInQuarter = mysql_query($ssql);
					while($row = mysql_fetch_row($rsCollectedInQuarter))
						{
							$Q4TotalFeeCollected=$row[0];
						}
					
					//TOTAL TRANSPORT FEE FOR ONE QUARTER
					$ssql="select SUM(x.routecharge) from (SELECT  `sname` ,  `sclass` ,  `routeno` , (SELECT  `routecharges` FROM  `RouteMaster` WHERE  `routeno` = a.`routeno`) routecharge FROM  `student_master` a) as x where routecharge !='NULL'";
					$rsTransportFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTransportFee))
						{
							$TotalTransportFee=$row[0];
						}
						//For 4 Quarters						
					
					$Q1TotalTutionFee=$Q1TotalTutionFee + $TotalTransportFee;
					$Q2TotalTutionFee=$Q2TotalTutionFee + $TotalTransportFee;
					$Q3TotalTutionFee=$Q3TotalTutionFee + $TotalTransportFee;
					$Q4TotalTutionFee=$Q4TotalTutionFee + $TotalTransportFee;
					
				}
				else
				{
					//FOR SELECTED CLASS
					//TOTAL TUTION FEE FOR SELECTED QUARTER AND SELECTED CLASS
					$SelectedClass=$_REQUEST["cboClass"];
					
					$ssql="select sum(Q1_Amt) from (SELECT `sname`,`sclass`,(SELECT `amount` FROM  `fees_master` where `class`= a.`sclass` and `quarter`='Q1') Q1_Amt FROM `student_master` a WHERE `sclass`='$SelectedClass') as x";
					$rsTutionFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTutionFee))
						{
							$Q1TotalTutionFee=$row[0];
						}
					
					$ssql="select sum(Q1_Amt) from (SELECT `sname`,`sclass`,(SELECT `amount` FROM  `fees_master` where `class`= a.`sclass` and `quarter`='Q2') Q1_Amt FROM `student_master` a WHERE `sclass`='$SelectedClass') as x";
					$rsTutionFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTutionFee))
						{
							$Q2TotalTutionFee=$row[0];
						}
					
					$ssql="select sum(Q1_Amt) from (SELECT `sname`,`sclass`,(SELECT `amount` FROM  `fees_master` where `class`= a.`sclass` and `quarter`='Q3') Q1_Amt FROM `student_master` a WHERE `sclass`='$SelectedClass') as x";
					$rsTutionFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTutionFee))
						{
							$Q3TotalTutionFee=$row[0];
						}
					
					$ssql="select sum(Q1_Amt) from (SELECT `sname`,`sclass`,(SELECT `amount` FROM  `fees_master` where `class`= a.`sclass` and `quarter`='Q4') Q1_Amt FROM `student_master` a WHERE `sclass`='$SelectedClass') as x";
					$rsTutionFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTutionFee))
						{
							$Q4TotalTutionFee=$row[0];
						}
					
					
					//TOTAL TRANSPORT FEE FOR ONE QUARTER
					$ssql="select SUM(x.routecharge) from (SELECT  `sname` ,  `sclass` ,  `routeno` , (SELECT  `routecharges` FROM  `RouteMaster` WHERE  `routeno` = a.`routeno`) routecharge FROM  `student_master` a WHERE `sclass`='$SelectedClass') as x where routecharge !='NULL'";
					$rsTransportFee = mysql_query($ssql);
					while($row = mysql_fetch_row($rsTransportFee))
						{
							$TotalTransportFee=$row[0];
						}
						
					$Q1TotalTutionFee=$Q1TotalTutionFee + $TotalTransportFee;
					$Q2TotalTutionFee=$Q2TotalTutionFee + $TotalTransportFee;
					$Q3TotalTutionFee=$Q3TotalTutionFee + $TotalTransportFee;
					$Q4TotalTutionFee=$Q4TotalTutionFee + $TotalTransportFee;
				
				}
		
		
		
	}	

}
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);

?>
<script language="javascript">
function Validate2()
{
	document.getElementById("frmReportCard").submit();
}

</script>
<html>
<head>
<style type="text/css">
.style1 {
	border-color: #000000;
	border-width: 0px;
	border-collapse: collapse;
	}

.auto-style7 {
	border-width: 0px;
}
.auto-style6 {
	border-left-style: none;
	border-left-width: medium;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.auto-style3 {
	font-family: Cambria;
	color: #CD222B;
}

.auto-style1 {
	border-style: none;
	border-width: medium;
	text-align: right;
	font-family: Cambria;
	color: #CD222B;
	font-style: normal;
	text-decoration: none;
	}
.auto-style11 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	color: #CD222B;
}
.auto-style12 {
	font-family: Cambria;
	font-size: small;
	color: #CD222B;
}
.auto-style15 {
	font-family: Cambria;
	color: #CD222B;
	text-decoration: underline;
}
.auto-style16 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
	font-family: Cambria;
	color: #CD222B;
	text-decoration: underline;
}
.auto-style17 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	color: #CD222B;
	text-align: left;
}
.auto-style18 {
	color: #CC333A;
}
.auto-style19 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	color: #CD222B;
	font-style: normal;
	text-decoration: none;
}
.auto-style20 {
	text-align: center;
	font-family: Cambria;
	color: #CD222B;
	font-style: normal;
	text-decoration: none;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: none;
	border-bottom-width: medium;
	border-right-style: none;
	border-right-width: medium;
}
.auto-style21 {
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
	text-align: center;
}

.auto-style23 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	color: #FFFFFF;
}
.auto-style24 {
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #CC333A;
	text-align: center;
}

.auto-style30 {
	text-align: left;
	background-color: #C0C0C0;
	font-family: Cambria;
	color: #CD222B;
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.auto-style39 {
	color: #CC333A;
	font-weight: bold;
}
.auto-style45 {
	text-align: center;
	font-family: Cambria;
	color: #CD222B;
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style46 {
	text-align: center;
	font-family: Cambria;
	color: #CD222B;
	border-left-style: none;
	border-left-width: medium;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style47 {
	text-align: center;
	font-family: Cambria;
	color: #CD222B;
	border-left-style: none;
	border-left-width: medium;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style50 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #C0C0C0;
	font-family: Cambria;
	color: #CD222B;
}
.auto-style57 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
	font-family: Cambria;
	color: #CD222B;
}
.auto-style58 {
	color: #FFFFFF;
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

</style>
</head>
<body>

<p>&nbsp;</p>

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style20" style="height: 33px">

	

	
	<tr>
		<td bgcolor="#CC0033" class="auto-style23" style="width: 34%"><a href="FeesPayment.php">
		<span class="auto-style58">Pay Fees</span></a><td class="auto-style24" style="width: 317px">
		
	<a href="FeesReport.php">	<span class="auto-style18">Fees Record and Report</span></a><td class="auto-style21">
		
		<a href="FeesMaster.php"><span class="auto-style18">Fees Master</span></a></table>


	
	<table>
	<tr>
	<td>
	
	<table class="auto-style7" style="width: 855px">
		<form name="frmReportCard" id="frmReportCard" method="post" action="FeesReport.php">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<td class="auto-style6" style="width: 224px">
				<span class="auto-style3"><strong>Report By </strong></span>
				<span style="text-decoration:none;" class="auto-style3"><strong>
				Quarter</strong></span></td>
	
	<td class="auto-style20" style="width: 325px">

		<select name="cboQuarter" id="cboQuarter" style="width: 156px" onchange="GetFeeDetail();" class="auto-style12" >
		<option selected="" value="Select One">Select One</option>
		<option value="Q1">Quarter 1 [April - June]</option>
		<option value="Q2">Quarter 2 [July - September]</option>
		<option value="Q3">Quarter 3 [October - December]</option>
		<option value="Q4">Quarter 4 [ January - March]</option>
		</select></td>
	
	<td class="auto-style1" rowspan="2">
				&nbsp;</td>
	
			<tr>
	<td class="auto-style11" style="width: 224px">
				<strong>Select Class</strong></td>
	
	<td class="auto-style19" style="width: 325px">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">



		<select name="cboClass" id="cboClass" style="height: 22px">



		<option selected="" value="All">All</option>



		<?php

		while($row1 = mysql_fetch_row($rsClass))

		{

					$Class=$row1[0];

		?>

		<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>

		<?php

		}

		?>

		</select></span></td>
	
			</tr>
			<tr>
	<td class="auto-style17" style="height: 17px;" colspan="3">
				<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input class="auto-style39" name="Button1" type="submit" value="Show Report"><br>
				</strong></td>
	
			</tr>
				</form>
	</table>
	
		</td></tr></table>
	<!--
<table style="width: 100%; border-collapse: collapse" cellspacing="0" cellpadding="3" bordercolor="#cc0000" border=".5" align="left"> 

<tr valign="top">
<th scope="row" valign="middle">
<p><font face="wp_bogus_font">Upload Date Sheet</font></p></th>
<td width="67%" valign="middle">
<form action="upload_datesheet.php" method="post" enctype="multipart/form-data"><font face="wp_bogus_font">Select File to upload Homework:<input type="file" name="file" id="file" /><br />
<input type="submit" name="submit" value="Submit" /></font></form>
<p><font face="wp_bogus_font">Click <a target="_blank" href="datesheet.csv"><span style="text-decoration: none; font-weight: 700">here</span></a> for download sample &nbsp;&nbsp;  &nbsp;&nbsp; <br />
</font></td>
</tr>

</table>

<br />
<br />
<br />
<br />
<br />
<br />
<br />-->

<?php
if ($_REQUEST["cboClass"] =="All")
{ 
?>
<table style="width: 100%" class="style1">
	<tr>
		<td class="auto-style30" colspan="5"><strong>Complete School Fees 
		Pendancy Summary&nbsp;</strong></td>
	</tr>
	<tr>
		<td class="auto-style50" style="width: 43px">Sr.No.</td>
		<td class="auto-style50" style="width: 212px">Quarter</td>
		<td class="auto-style50" style="width: 212px">Total Fees For Quarter</td>
		<td class="auto-style50" style="width: 213px">Fees Collected in Quarter</td>
		<td class="auto-style50" style="width: 213px">Pending Amount for Quarter</td>
	</tr>
	<?php
	if ($_REQUEST["cboQuarter"] !="Select One")
	{
	?>
	<tr>
		<td class="auto-style57" style="width: 43px">1.</td>
		<td class="auto-style57" style="width: 212px"><?php echo $_REQUEST["cboQuarter"];?></td>
		<td class="auto-style57" style="width: 212px"><?php echo $TotalFee4Quarter;?></td>
		<td class="auto-style57" style="width: 213px"><?php echo $TotalFeeCollectedInQuarter; ?></td>
		<td class="auto-style57" style="width: 213px"><?php echo ($TotalFee4Quarter-$TotalFeeCollectedInQuarter);?></td>
	</tr>
	<?php
	}
	else
	{
	?>
	<tr>
		<td class="auto-style57" style="width: 43px">1.</td>
		<td class="auto-style57" style="width: 212px">Q1</td>
		<td class="auto-style57" style="width: 212px"><?php echo $Q1TotalTutionFee; ?></td>
		<td class="auto-style57" style="width: 213px"><?php echo $Q1TotalFeeCollected; ?></td>
		<td class="auto-style57" style="width: 213px"><?php echo $Q1TotalTutionFee-$Q1TotalFeeCollected; ?></td>
	</tr>
	<tr>
		<td class="auto-style57" style="width: 43px">2.</td>
		<td class="auto-style57" style="width: 212px">Q2</td>
		<td class="auto-style57" style="width: 212px"><?php echo $Q2TotalTutionFee; ?></td>
		<td class="auto-style57" style="width: 213px"><?php echo $Q2TotalFeeCollected; ?></td>
		<td class="auto-style57" style="width: 213px"><?php echo $Q2TotalTutionFee-$Q2TotalFeeCollected; ?></td>
	</tr>
	<tr>
		<td class="auto-style57" style="width: 43px">3.</td>
		<td class="auto-style57" style="width: 212px">Q3</td>
		<td class="auto-style57" style="width: 212px"><?php echo $Q3TotalTutionFee; ?></td>
		<td class="auto-style57" style="width: 213px"><?php echo $Q3TotalFeeCollected; ?></td>
		<td class="auto-style57" style="width: 213px"><?php echo $Q3TotalTutionFee-$Q3TotalFeeCollected; ?></td>
	</tr>
	<tr>
		<td class="auto-style57" style="width: 43px">4.</td>
		<td class="auto-style57" style="width: 212px">Q4</td>
		<td class="auto-style57" style="width: 212px"><?php echo $Q4TotalTutionFee; ?></td>
		<td class="auto-style57" style="width: 213px"><?php echo $Q4TotalFeeCollected; ?></td>
		<td class="auto-style57" style="width: 213px"><?php echo $Q4TotalTutionFee-$Q4TotalFeeCollected; ?></td>
	</tr>
	<?php
	}
	?>
	
</table>
<?php
}
?>

<p class="auto-style15">&nbsp;</p>


<table style="width: 100%" class="style1">
	<tr>
		<td class="auto-style30" colspan="6"><span class="auto-style18"><strong>Class Wise&nbsp;- Pendancy 
		Summary</strong></span></td>
	</tr>
	<tr>
		<td class="auto-style50" style="width: 43px">Sr.No.</td>
		<td class="auto-style50" style="width: 212px">Quarter</td>
		<td class="auto-style50" style="width: 212px">Class&nbsp;</td>
		<td class="auto-style50" style="width: 212px">Total Fees For Quarter</td>
		<td class="auto-style50" style="width: 213px">Fees Collected in Quarter</td>
		<td class="auto-style50" style="width: 213px">Pending Amount for Quarter</td>
	</tr>
	<?php
		while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$sclass=$row[1];
					$subject=$row[2];
					$weekday=$row[3];
					$daytime=$row[4];
					$datetime=$row[5];
	?>
	<tr>
		<td class="auto-style16" style="width: 43px"><strong><?php echo $srno;?>
		</strong></td>
		<td class="auto-style16" style="width: 212px"><strong><?php echo $sclass;?>
		</strong></td>
		<td class="auto-style16" style="width: 212px"><strong>&nbsp;</strong></td>
		<td class="auto-style16" style="width: 212px"><strong><?php echo $subject;?>
		</strong></td>
		<td class="auto-style16" style="width: 213px"><strong>&nbsp;</strong></td>
		<td class="auto-style16" style="width: 213px"><strong><?php echo $weekday;?>
		</strong></td>
	</tr>
	<?php
	}
	?>
</table>


<p class="auto-style15">&nbsp;</p>


<table style="width: 100%" class="style1">
	<tr>
		<td class="auto-style30" colspan="6"><strong>Student Wise&nbsp;- Pendancy 
		Summary</strong></td>
	</tr>
	<tr>
		<td class="auto-style50" style="width: 43px">Sr.No.</td>
		<td class="auto-style50" style="width: 212px">Quarter</td>
		<td class="auto-style50" style="width: 212px">Student Name&nbsp;</td>
		<td class="auto-style50" style="width: 212px">Class&nbsp;</td>
		<td class="auto-style50" style="width: 212px">Roll No&nbsp;</td>
		<td class="auto-style50" style="width: 212px">Pending Amount&nbsp;</td>
	</tr>
	<?php
		while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$sclass=$row[1];
					$subject=$row[2];
					$weekday=$row[3];
					$daytime=$row[4];
					$datetime=$row[5];
	?>
	<tr>
		<td class="auto-style45" style="width: 43px"><?php echo $srno;?></td>
		<td class="auto-style46" style="width: 212px"><?php echo $sclass;?></td>
		<td class="auto-style46" style="width: 212px">&nbsp;</td>
		<td class="auto-style46" style="width: 212px">&nbsp;</td>
		<td class="auto-style46" style="width: 212px">&nbsp;</td>
		<td class="auto-style47" style="width: 212px"><?php echo $subject;?></td>
	</tr>
	<?php
	}
	?>
</table>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>
</div>

</body>
</html>