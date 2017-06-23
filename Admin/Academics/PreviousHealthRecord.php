<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>

<?php


$ssql="SELECT `srno` ,`sname`,`sclass`,`srollno`, `month`,`height`,`weight` ,`BMI`,`datetime` FROM `health_record`";

$rs= mysql_query($ssql);



?>

<html>

<head>

<style type="text/css">

.style1 {

	border-color: #000000;

	border-width: 0px;

	border-collapse: collapse;
font-family: Cambria;
	}

.style2 {

	border-style: solid;

	border-width: 1px;

	text-align: center;

}

.style3 {

	text-align: center;

	border-style: solid;

	border-width: 1px;

	background-color: #C0C0C0;

}

.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;
	color: #CD222B;
	font-family: Cambria;
}

.auto-style7 {
	border-width: 0px;
}
.auto-style6 {
	border-left-style: solid;
	border-left-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style3 {
	font-family: Cambria;
	color: #CD222B;
}
.auto-style10 {
	text-align: center;
	font-family: Cambria;
	color: #CD222B;
	font-style: normal;
	text-decoration: none;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}

.auto-style1 {
	text-align: right;
	font-family: Cambria;
	color: #CD222B;
	font-style: normal;
	text-decoration: none;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style9 {
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
	text-align: center;
}
.auto-style11 {
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
	text-align: center;
	font-family: Cambria;
	color: #CD222B;
}
.auto-style8 {
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
	text-align: center;
}
</style>

</head>

<body>
<font="Cambria">
<table style="width: 100%" class="style4">


	<tr>

		<td class="style4" colspan="4"><a href="frmHealthRecord.php">Upload Heatlh Record Details Details</a></td>
		<td class="style4" colspan="4">View Previous Uploaded Health Record Details</td>

	</tr>
</table>
<table>
<tr>
<td>

	<table class="auto-style7" style="width: 855px">
		
	<td class="auto-style6" style="width: 113px">
				<span style="text-decoration:none;" class="auto-style3">Class</span></td>
	
	<td class="auto-style10">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;"><select name="cboClass" id="cboClass" style="height: 22px; width: 62px;" onchange="FillRollNo();">

		<option selected="" value="All">All</option>

		<?php
		while($row1 = mysql_fetch_row($rsClass))
		{
					$Class=$row1[0];
		?>
		<option value="<?php echo $sclass; ?>"><?php echo $sclass; ?></option>
		<?php
		}
		?>
		</select></span></td>
	
	<td class="auto-style1" style="width: 161px">
				Roll No</td>
	
	<td class="auto-style10" style="width: 161px">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<select name="cboRollNo" id="cboClass2" style="width: 62px;" onchange="FillRollNo();">

		<option selected="" value="All">All</option>

		<?php
		while($row1 = mysql_fetch_row($rsClass))
		{
					$Class=$row1[0];
		?>
		<option value="<?php echo $sclass; ?>"><?php echo $sclass; ?></option>
		<?php
		}
		?>
		</select></span></td>
	
	<td class="auto-style1" style="width: 161px">
				Name</td>
	
	<td style="width: 294px" class="auto-style9">
				<form method="post">
					<input name="Text1" type="text"></form>
		</td>
	
	<td style="width: 294px" class="auto-style11">
				Month</td>
	
	<td style="width: 294px" class="auto-style9">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<select name="cboMonth" id="cboClass1" style="height: 22px; width: 79px;" onchange="FillRollNo();">

		<option selected="" value="All">All</option>

				<option>January</option>
				<option>February</option>
				<option>March</option>
				<option>April</option>
				<option>May</option>
				<option>June</option>
				<option>July</option>
				<option>August</option>
				<option>September</option>
				<option>October</option>
				<option>November</option>
				<option>December</option>
		</select></span></td>
	
	<td style="width: 130px" class="auto-style8">
				<img border="0" src="images/SearchImg.jpg" width="106" height="37" onclick ="Javascript:Validate2();"></td>
	</table>
	
</td></tr></table>


<table style="width: 100%" class="style1">
<Font face="Cambria">
	<tr>

		<td class="style3" style="width: 43px">Sr.No.</td>

		<td class="style3" style="width: 212px">Student Name</td>

		<td class="style3" style="width: 212px">Student Class</td>

		<td class="style3" style="width: 213px">Roll No</td>

		<td class="style3" style="width: 213px">Month</td>

		<td class="style3" style="width: 213px">Height</td>
		
		<td class="style3" style="width: 213px">Weight</td>
		
		<td class="style3" style="width: 213px">BMI</td>
		
		<td class="style3" style="width: 213px">Date Time</td>

	</tr>

	<?php

		while($row = mysql_fetch_row($rs))

				{

					$srno=$row[0];

					$sname=$row[1];

					$sclass=$row[2];
					
					$srollno=$row[3];

					$month=$row[4];
					
					$height=$row[5];

					$weight=$row[6];
					
					$BMI=$row[7];
					
					$datetime=$row[8];

	?>

	<tr>

		<td class="style2" style="width: 43px"><?php echo $srno;?></td>

		<td class="style2" style="width: 212px"><?php echo $sname;?></td>

		<td class="style2" style="width: 212px"><?php echo $sclass;?></td>

		<td class="style2" style="width: 212px"><?php echo $srollno;?></td>

		<td class="style2" style="width: 212px"><?php echo $month;?></td>

		<td class="style2" style="width: 213px"><?php echo $height;?> Cms</td>

		<td class="style2" style="width: 213px"><?php echo $weight;?> Kg</td>
				
		<td class="style2" style="width: 213px"><?php echo $BMI;?></td>
		
		<td class="style2" style="width: 213px"><?php echo $datetime;?></td>
	</tr>

	<?php

	}

	?>

</table>





</body>

</html>