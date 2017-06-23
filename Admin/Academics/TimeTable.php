<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");
$SubmitType=$_REQUEST["submittype"];
if($SubmitType=="filldata")
{
	$SelectedClass=$_REQUEST["cboClass"];
	$rsModayP1=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-1' and `weekday`='Monday'");
	$rsModayP2=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-2' and `weekday`='Monday'");
	$rsModayP3=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-3' and `weekday`='Monday'");
	$rsModayP4=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-4' and `weekday`='Monday'");
	$rsModayP5=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-5' and `weekday`='Monday'");
	$rsModayP6=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-6' and `weekday`='Monday'");
	$rsModayP7=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-7' and `weekday`='Monday'");
	$rsModayP8=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-8' and `weekday`='Monday'");
	$rsModayP9=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-9' and `weekday`='Monday'");
	$rsModayP10=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-10' and `weekday`='Monday'");
	
	
	$rsTuesdayP1=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-1' and `weekday`='Tuesday'");
	$rsTuesdayP2=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-2' and `weekday`='Tuesday'");
	$rsTuesdayP3=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-3' and `weekday`='Tuesday'");
	$rsTuesdayP4=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-4' and `weekday`='Tuesday'");
	$rsTuesdayP5=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-5' and `weekday`='Tuesday'");
	$rsTuesdayP6=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-6' and `weekday`='Tuesday'");
	$rsTuesdayP7=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-7' and `weekday`='Tuesday'");
	$rsTuesdayP8=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-8' and `weekday`='Tuesday'");
	$rsTuesdayP9=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-9' and `weekday`='Tuesday'");
	$rsTuesdayP10=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-10' and `weekday`='Tuesday'");
	
	$rsWednesdayP1=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-1' and `weekday`='Wednesday'");
	$rsWednesdayP2=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-2' and `weekday`='Wednesday'");
	$rsWednesdayP3=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-3' and `weekday`='Wednesday'");
	$rsWednesdayP4=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-4' and `weekday`='Wednesday'");
	$rsWednesdayP5=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-5' and `weekday`='Wednesday'");
	$rsWednesdayP6=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-6' and `weekday`='Wednesday'");
	$rsWednesdayP7=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-7' and `weekday`='Wednesday'");
	$rsWednesdayP8=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-8' and `weekday`='Wednesday'");
	$rsWednesdayP9=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-9' and `weekday`='Wednesday'");
	$rsWednesdayP10=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-10' and `weekday`='Wednesday'");
	
	$rsThursdayP1=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-1' and `weekday`='Thursday'");
	$rsThursdayP2=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-2' and `weekday`='Thursday'");
	$rsThursdayP3=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-3' and `weekday`='Thursday'");
	$rsThursdayP4=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-4' and `weekday`='Thursday'");
	$rsThursdayP5=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-5' and `weekday`='Thursday'");
	$rsThursdayP6=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-6' and `weekday`='Thursday'");
	$rsThursdayP7=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-7' and `weekday`='Thursday'");
	$rsThursdayP8=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-8' and `weekday`='Thursday'");
	$rsThursdayP9=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-9' and `weekday`='Thursday'");
	$rsThursdayP10=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-10' and `weekday`='Thursday'");
	
	$rsFridayP1=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-1' and `weekday`='Friday'");
	$rsFridayP2=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-2' and `weekday`='Friday'");
	$rsFridayP3=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-3' and `weekday`='Friday'");
	$rsFridayP4=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-4' and `weekday`='Friday'");
	$rsFridayP5=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-5' and `weekday`='Friday'");
	$rsFridayP6=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-6' and `weekday`='Friday'");
	$rsFridayP7=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-7' and `weekday`='Friday'");
	$rsFridayP8=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-8' and `weekday`='Friday'");
	$rsFridayP9=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-9' and `weekday`='Friday'");
	$rsFridayP10=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-10' and `weekday`='Friday'");
	
	$rsSaturdayP1=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-1' and `weekday`='Saturday'");
	$rsSaturdayP2=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-2' and `weekday`='Saturday'");
	$rsSaturdayP3=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-3' and `weekday`='Saturday'");
	$rsSaturdayP4=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-4' and `weekday`='Saturday'");
	$rsSaturdayP5=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-5' and `weekday`='Saturday'");
	$rsSaturdayP6=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-6' and `weekday`='Saturday'");
	$rsSaturdayP7=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-7' and `weekday`='Saturday'");
	$rsSaturdayP8=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-8' and `weekday`='Saturday'");
	$rsSaturdayP9=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-9' and `weekday`='Saturday'");
	$rsSaturdayP10=mysql_query("select `subject` from `time_table` where `sclass`='$SelectedClass' and `daytime`='PERIOD-10' and `weekday`='Saturday'");
	
	
	$rowMondayP1=mysql_fetch_row($rsModayP1);
	$rowMondayP2=mysql_fetch_row($rsModayP2);
	$rowMondayP3=mysql_fetch_row($rsModayP3);
	$rowMondayP4=mysql_fetch_row($rsModayP4);
	$rowMondayP5=mysql_fetch_row($rsModayP5);
	$rowMondayP6=mysql_fetch_row($rsModayP6);
	$rowMondayP7=mysql_fetch_row($rsModayP7);
	$rowMondayP8=mysql_fetch_row($rsModayP8);
	$rowMondayP9=mysql_fetch_row($rsModayP9);
	$rowMondayP10=mysql_fetch_row($rsModayP10);
	
	$rowTuesdayP1=mysql_fetch_row($rsTuesdayP1);
	$rowTuesdayP2=mysql_fetch_row($rsTuesdayP2);
	$rowTuesdayP3=mysql_fetch_row($rsTuesdayP3);
	$rowTuesdayP4=mysql_fetch_row($rsTuesdayP4);
	$rowTuesdayP5=mysql_fetch_row($rsTuesdayP5);
	$rowTuesdayP6=mysql_fetch_row($rsTuesdayP6);
	$rowTuesdayP7=mysql_fetch_row($rsTuesdayP7);
	$rowTuesdayP8=mysql_fetch_row($rsTuesdayP8);
	$rowTuesdayP9=mysql_fetch_row($rsTuesdayP9);
	$rowTuesdayP10=mysql_fetch_row($rsTuesdayP10);
	
	$rowWednesdayP1=mysql_fetch_row($rsWednesdayP1);
	$rowWednesdayP2=mysql_fetch_row($rsWednesdayP2);
	$rowWednesdayP3=mysql_fetch_row($rsWednesdayP3);
	$rowWednesdayP4=mysql_fetch_row($rsWednesdayP4);
	$rowWednesdayP5=mysql_fetch_row($rsWednesdayP5);
	$rowWednesdayP6=mysql_fetch_row($rsWednesdayP6);
	$rowWednesdayP7=mysql_fetch_row($rsWednesdayP7);
	$rowWednesdayP8=mysql_fetch_row($rsWednesdayP8);
	$rowWednesdayP9=mysql_fetch_row($rsWednesdayP9);
	$rowWednesdayP10=mysql_fetch_row($rsWednesdayP10);
	
	$rowThursdayP1=mysql_fetch_row($rsThursdayP1);
	$rowThursdayP2=mysql_fetch_row($rsThursdayP2);
	$rowThursdayP3=mysql_fetch_row($rsThursdayP3);
	$rowThursdayP4=mysql_fetch_row($rsThursdayP4);
	$rowThursdayP5=mysql_fetch_row($rsThursdayP5);
	$rowThursdayP6=mysql_fetch_row($rsThursdayP6);
	$rowThursdayP7=mysql_fetch_row($rsThursdayP7);
	$rowThursdayP8=mysql_fetch_row($rsThursdayP8);
	$rowThursdayP9=mysql_fetch_row($rsThursdayP9);
	$rowThursdayP10=mysql_fetch_row($rsThursdayP10);
	
	$rowFridayP1=mysql_fetch_row($rsFridayP1);
	$rowFridayP2=mysql_fetch_row($rsFridayP2);
	$rowFridayP3=mysql_fetch_row($rsFridayP3);
	$rowFridayP4=mysql_fetch_row($rsFridayP4);
	$rowFridayP5=mysql_fetch_row($rsFridayP5);
	$rowFridayP6=mysql_fetch_row($rsFridayP6);
	$rowFridayP7=mysql_fetch_row($rsFridayP7);
	$rowFridayP8=mysql_fetch_row($rsFridayP8);
	$rowFridayP9=mysql_fetch_row($rsFridayP9);
	$rowFridayP10=mysql_fetch_row($rsFridayP10);
	
	$rowSaturdayP1=mysql_fetch_row($rsSaturdayP1);
	$rowSaturdayP2=mysql_fetch_row($rsSaturdayP2);
	$rowSaturdayP3=mysql_fetch_row($rsSaturdayP3);
	$rowSaturdayP4=mysql_fetch_row($rsSaturdayP4);
	$rowSaturdayP5=mysql_fetch_row($rsSaturdayP5);
	$rowSaturdayP6=mysql_fetch_row($rsSaturdayP6);
	$rowSaturdayP7=mysql_fetch_row($rsSaturdayP7);
	$rowSaturdayP8=mysql_fetch_row($rsSaturdayP8);
	$rowSaturdayP9=mysql_fetch_row($rsSaturdayP9);
	$rowSaturdayP10=mysql_fetch_row($rsSaturdayP10);

	$SubMondayP1=$rowMondayP1[0];
	$SubMondayP2=$rowMondayP2[0];
	$SubMondayP3=$rowMondayP3[0];
	$SubMondayP4=$rowMondayP4[0];
	$SubMondayP5=$rowMondayP5[0];
	$SubMondayP6=$rowMondayP6[0];
	$SubMondayP7=$rowMondayP7[0];
	$SubMondayP8=$rowMondayP8[0];
	$SubMondayP9=$rowMondayP9[0];
	$SubMondayP10=$rowMondayP10[0];
	
	$SubTuesdayP1=$rowTuesdayP1[0];
	$SubTuesdayP2=$rowTuesdayP2[0];
	$SubTuesdayP3=$rowTuesdayP3[0];
	$SubTuesdayP4=$rowTuesdayP4[0];
	$SubTuesdayP5=$rowTuesdayP5[0];
	$SubTuesdayP6=$rowTuesdayP6[0];
	$SubTuesdayP7=$rowTuesdayP7[0];
	$SubTuesdayP8=$rowTuesdayP8[0];
	$SubTuesdayP9=$rowTuesdayP9[0];
	$SubTuesdayP10=$rowTuesdayP10[0];
	
	$SubWednesdayP1=$rowWednesdayP1[0];
	$SubWednesdayP2=$rowWednesdayP2[0];
	$SubWednesdayP3=$rowWednesdayP3[0];
	$SubWednesdayP4=$rowWednesdayP4[0];
	$SubWednesdayP5=$rowWednesdayP5[0];
	$SubWednesdayP6=$rowWednesdayP6[0];
	$SubWednesdayP7=$rowWednesdayP7[0];
	$SubWednesdayP8=$rowWednesdayP8[0];
	$SubWednesdayP9=$rowWednesdayP9[0];
	$SubWednesdayP10=$rowWednesdayP10[0];
	
	$SubThursdayP1=$rowThursdayP1[0];
	$SubThursdayP2=$rowThursdayP2[0];
	$SubThursdayP3=$rowThursdayP3[0];
	$SubThursdayP4=$rowThursdayP4[0];
	$SubThursdayP5=$rowThursdayP5[0];
	$SubThursdayP6=$rowThursdayP6[0];
	$SubThursdayP7=$rowThursdayP7[0];
	$SubThursdayP8=$rowThursdayP8[0];
	$SubThursdayP9=$rowThursdayP9[0];
	$SubThursdayP10=$rowThursday10[0];
	
	$SubFridayP1=$rowFridayP1[0];
	$SubFridayP2=$rowFridayP2[0];
	$SubFridayP3=$rowFridayP3[0];
	$SubFridayP4=$rowFridayP4[0];
	$SubFridayP5=$rowFridayP5[0];
	$SubFridayP6=$rowFridayP6[0];
	$SubFridayP7=$rowFridayP7[0];
	$SubFridayP8=$rowFridayP8[0];
	$SubFridayP9=$rowFridayP9[0];
	$SubFridayP10=$rowFridayP10[0];
	
	$SubSaturdayP1=$rowSaturdayP1[0];
	$SubSaturdayP2=$rowSaturdayP2[0];
	$SubSaturdayP3=$rowSaturdayP3[0];
	$SubSaturdayP4=$rowSaturdayP4[0];
	$SubSaturdayP5=$rowSaturdayP5[0];
	$SubSaturdayP6=$rowSaturdayP6[0];
	$SubSaturdayP7=$rowSaturdayP7[0];
	$SubSaturdayP8=$rowSaturdayP8[0];
	$SubSaturdayP9=$rowSaturdayP9[0];
	$SubSaturdayP10=$rowSaturdayP10[0];
}
?>
<script language="javascript">
function fnlCheck()
{
	if(document.getElementById("cboClass").value=="")
	{
		alert("Plese select class!");
		return;
	}
	document.getElementById("submittype").value="filldata";
	document.getElementById("frmTimeTable").submit();
}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Search Student</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>

	

<style type="text/css">

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
	font-family: Cambria;
}
.style14 {
	font-family: Cambria;
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
<p class="auto-style5" style="height: 12px"><strong>
<font face="Cambria" size="3">Time Table</font></strong></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img src="images/BackButton.png" style="float: right" height="20"></a></p>
<table border="1" width="74%" class="CSSTableGenerator" align="center">
<form id="frmTimeTable" name="frmTimeTable" method="post" action="">
<input type="hidden" name="submittype" id="submittype" value="">
<tr>
		<td colspan="6">
		<p style="text-align: center" class="style13">Select Class</td>
		<td colspan="6">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<font face="Cambria">
	<select name="cboClass" id="cboClass" class="text-box" onchange="javascript:fnlCheck();">

		<option selected="" value="">Select One</option>

		<?php
		while($row1 = mysql_fetch_row($rsClass))
		{
					$Class=$row1[0];
		?>
		<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
		<?php
		}
		?>
		</select></font></span></td>
	</tr>

	<tr>
		<td class="style13">Days/Period</td>
		<td class="style13">1</td>
		<td class="style13">2</td>
		<td class="style13">3</td>
		<td class="style13">4</td>
		<td colspan="2" class="style13">5</td>
		<td class="style13">6</td>
		<td class="style13">7</td>
		<td class="style13">8</td>
		<td class="style13">9</td>
		<td class="style13">10</td>
	</tr>
	
	<tr>
		<td class="style13" style="height: 28px">Monday</td>
		<td style="height: 28px">
				<font face="Cambria">
				<input name="txtModayP1" id="txtRollNo" type="text" class="text-box" value="<?php echo $SubMondayP1;?>"></font></td>
		<td style="height: 28px">
				<font face="Cambria">
				<input name="txtModayP2" id="txtRollNo0" type="text" class="text-box" value="<?php echo $SubMondayP2;?>"></font></td>
		<td style="height: 28px">
				<font face="Cambria">
				<input name="txtModayP3" id="txtRollNo1" type="text" class="text-box" value="<?php echo $SubMondayP3;?>"></font></td>
		<td style="height: 28px">
				<font face="Cambria">
				<input name="txtModayP4" id="txtRollNo2" type="text" class="text-box" value="<?php echo $SubMondayP4;?>"></font></td>
		<td colspan="2" style="height: 28px">
				<font face="Cambria">
				<input name="txtModayP5" id="txtRollNo3" type="text" class="text-box" value="<?php echo $SubMondayP5;?>"></font></td>
		<td style="height: 28px">
				<font face="Cambria">
				<input name="txtModayP6" id="txtRollNo4" type="text" class="text-box" style="height: 22px" value="<?php echo $SubMondayP6;?>"></font></td>
		<td style="height: 28px">
				<font face="Cambria">
				<input name="txtModayP7" id="txtRollNo5" type="text" class="text-box" value="<?php echo $SubMondayP7;?>"></font></td>
		<td style="height: 28px">
				<font face="Cambria">
				<input name="txtModayP8" id="txtRollNo6" type="text" class="text-box" value="<?php echo $SubMondayP8;?>"></font></td>
		<td style="height: 28px">
				<font face="Cambria">
				<input name="txtModayP9" id="txtRollNo7" type="text" class="text-box" value="<?php echo $SubMondayP9;?>"></font></td>
		<td style="height: 28px">
				<font face="Cambria">
				<input name="txtModayP10" id="txtRollNo8" type="text" class="text-box" value="<?php echo $SubMondayP10;?>"></font></td>
	</tr>
	<tr>
		<td class="style13">Tuesday</td>
		<td>
				<font face="Cambria">
				<input name="txtTuesdayP1" id="txtRollNo9" type="text" class="text-box" value="<?php echo $SubTuesdayP1;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtTuesdayP2" id="txtRollNo10" type="text" class="text-box" value="<?php echo $SubTuesdayP2;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtTuesdayP3" id="txtRollNo11" type="text" class="text-box" value="<?php echo $SubTuesdayP3;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtTuesdayP4" id="txtRollNo12" type="text" class="text-box" value="<?php echo $SubTuesdayP4;?>"></font></td>
		<td colspan="2">
				<font face="Cambria">
				<input name="txtTuesdayP5" id="txtRollNo13" type="text" class="text-box" value="<?php echo $SubTuesdayP5;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtTuesdayP6" id="txtRollNo14" type="text" class="text-box" value="<?php echo $SubTuesdayP6;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtTuesdayP7" id="txtRollNo15" type="text" class="text-box" value="<?php echo $SubTuesdayP7;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtTuesdayP8" id="txtRollNo16" type="text" class="text-box" value="<?php echo $SubTuesdayP8;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtTuesdayP9" id="txtRollNo17" type="text" class="text-box" value="<?php echo $SubTuesdayP9;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtTuesdayP10" id="txtRollNo18" type="text" class="text-box" value="<?php echo $SubTuesdayP10;?>"></font></td>
	</tr>
	<tr>
		<td style="height: 26px" class="style13">Wednesday</td>
		<td style="height: 26px">
				<font face="Cambria">
				<input name="txtWednesdayP1" id="txtRollNo19" type="text" class="text-box" value="<?php echo $SubWednesdayP1;?>"></font></td>
		<td style="height: 26px">
				<font face="Cambria">
				<input name="txtWednesdayP2" id="txtRollNo20" type="text" class="text-box" value="<?php echo $SubWednesdayP2;?>"></font></td>
		<td style="height: 26px">
				<font face="Cambria">
				<input name="txtWednesdayP3" id="txtRollNo21" type="text" class="text-box" value="<?php echo $SubWednesdayP3;?>"></font></td>
		<td style="height: 26px">
				<font face="Cambria">
				<input name="txtWednesdayP4" id="txtRollNo22" type="text" class="text-box" value="<?php echo $SubWednesdayP4;?>"></font></td>
		<td colspan="2" style="height: 26px">
				<font face="Cambria">
				<input name="txtWednesdayP5" id="txtRollNo23" type="text" class="text-box" value="<?php echo $SubWednesdayP5;?>"></font></td>
		<td style="height: 26px">
				<font face="Cambria">
				<input name="txtWednesdayP6" id="txtRollNo24" type="text" class="text-box" value="<?php echo $SubWednesdayP6;?>"></font></td>
		<td style="height: 26px">
				<font face="Cambria">
				<input name="txtWednesdayP7" id="txtRollNo25" type="text" class="text-box" value="<?php echo $SubWednesdayP7;?>"></font></td>
		<td style="height: 26px">
				<font face="Cambria">
				<input name="txtWednesdayP8" id="txtRollNo26" type="text" class="text-box" value="<?php echo $SubWednesdayP8;?>"></font></td>
		<td style="height: 26px">
				<font face="Cambria">
				<input name="txtWednesdayP9" id="txtRollNo27" type="text" class="text-box" value="<?php echo $SubWednesdayP9;?>"></font></td>
		<td style="height: 26px">
				<font face="Cambria">
				<input name="txtWednesdayP10" id="txtRollNo28" type="text" class="text-box" value="<?php echo $SubWednesdayP10;?>"></font></td>
	</tr>
	<tr>
		<td class="style13">Thursday</td>
		<td>
				<font face="Cambria">
				<input name="txtThursdayP1" id="txtRollNo29" type="text" class="text-box" value="<?php echo $SubThursdayP1;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtThursdayP2" id="txtRollNo30" type="text" class="text-box" value="<?php echo $SubThursdayP2;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtThursdayP3" id="txtRollNo31" type="text" class="text-box" value="<?php echo $SubThursdayP3;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtThursdayP4" id="txtRollNo32" type="text" class="text-box" value="<?php echo $SubThursdayP4;?>"></font></td>
		<td colspan="2">
				<font face="Cambria">
				<input name="txtThursdayP5" id="txtRollNo33" type="text" class="text-box" value="<?php echo $SubThursdayP5;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtThursdayP6" id="txtRollNo34" type="text" class="text-box" value="<?php echo $SubThursdayP6;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtThursdayP7" id="txtRollNo35" type="text" class="text-box" value="<?php echo $SubThursdayP7;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtThursdayP8" id="txtRollNo36" type="text" class="text-box" value="<?php echo $SubThursdayP8;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtThursdayP9" id="txtRollNo37" type="text" class="text-box" value="<?php echo $SubThursdayP9;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtThursdayP10" id="txtRollNo38" type="text" class="text-box" value="<?php echo $SubThursdayP10;?>"></font></td>
	</tr>
	<tr>
		<td class="style13">Friday</td>
		<td>
				<font face="Cambria">
				<input name="txtFridayP1" id="txtRollNo39" type="text" class="text-box" value="<?php echo $SubFridayP1;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtFridayP2" id="txtRollNo40" type="text" class="text-box" value="<?php echo $SubFridayP2;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtFridayP3" id="txtRollNo41" type="text" class="text-box" value="<?php echo $SubFridayP3;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtFridayP4" id="txtRollNo42" type="text" class="text-box" value="<?php echo $SubFridayP4;?>"></font></td>
		<td colspan="2">
				<font face="Cambria">
				<input name="txtFridayP5" id="txtRollNo43" type="text" class="text-box" value="<?php echo $SubFridayP5;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtFridayP6" id="txtRollNo44" type="text" class="text-box" value="<?php echo $SubFridayP6;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtFridayP7" id="txtRollNo45" type="text" class="text-box" value="<?php echo $SubFridayP7;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtFridayP8" id="txtRollNo46" type="text" class="text-box" value="<?php echo $SubFridayP8;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtFridayP9" id="txtRollNo47" type="text" class="text-box" value="<?php echo $SubFridayP9;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtFridayP10" id="txtRollNo48" type="text" class="text-box" value="<?php echo $SubFridayP10;?>"></font></td>
	</tr>
	<tr>
		<td class="style13">Saturday</td>
		<td>
				<font face="Cambria">
				<input name="txtSaturdayP1" id="txtRollNo49" type="text" class="text-box" value="<?php echo $SubSaturdayP1;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtSaturdayP2" id="txtRollNo50" type="text" class="text-box" value="<?php echo $SubSaturdayP2;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtSaturdayP3" id="txtRollNo51" type="text" class="text-box" value="<?php echo $SubSaturdayP3;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtSaturdayP4" id="txtRollNo52" type="text" class="text-box" value="<?php echo $SubSaturdayP4;?>"></font></td>
		<td colspan="2">
				<font face="Cambria">
				<input name="txtSaturdayP5" id="txtRollNo53" type="text" class="text-box" value="<?php echo $SubSaturdayP5;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtSaturdayP6" id="txtRollNo54" type="text" class="text-box" value="<?php echo $SubSaturdayP6;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtSaturdayP7" id="txtRollNo55" type="text" class="text-box" value="<?php echo $SubSaturdayP7;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtSaturdayP8" id="txtRollNo56" type="text" class="text-box" value="<?php echo $SubSaturdayP8;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtSaturdayP9" id="txtRollNo57" type="text" class="text-box" value="<?php echo $SubSaturdayP9;?>"></font></td>
		<td>
				<font face="Cambria">
				<input name="txtSaturdayP10" id="txtRollNo58" type="text" class="text-box" value="<?php echo $SubSaturdayP10;?>"></font></td>
	</tr>
	<tr>
		<td class="style14" colspan="12">
			<input name="Submit1" type="submit" value="submit">
		</td>
	</tr>
	</form>
</table>
</body>
</html>