<?php include '../../Connection.php'; ?>
<?php include '../AppConf.php';?>
<?php include '../Header/Header3.php'; ?>
<?php
	$sadmission=$_REQUEST["txtAdmission"];
	
	//************STUDENT PROFILE*******************
	$ssql="SELECT `srno`, `sname`, date_format(`DOB`,'%d-%m-%Y') as `DOB`, `Sex`, `Category`, `Nationality`, `sadmission`, `sclass`, `srollno`, `LastSchool`, `sfathername`, `FatherEducation`, `FatherOccupation`, `MotherName`, `MotherEducation`, `Address`, `smobile`, `simei`, `suser`, `spassword`, `email`, `GCMAccountId` from student_master where `sadmission`='$sadmission'";
	$rs= mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
					$srno=$row[0];
					$sname=$row[1];
					$DOB=$row[2];
					$Sex=$row[3];
					$Category=$row[4];
					$Nationality=$row[5];
					$admissionId=$row[6];
					$Class1=$row[7];
					$srollNo=$row[8];
					$sfathername=$row[10];
					$FatherEducation=$row[11];
					$FatherOccupation=$row[12];
					$MotherName=$row[13];
					$MotherEducation=$row[14];
					$Address=$row[15];
					$smobile=$row[16];
					$simei=$row[17];
					$suser=$row[18];
					$spassword=$row[19];
					$email=$row[20];
					break;
	}
	//*************ATTANDANCE**************
	
	$ssql="select x.*,";
	$ssql=$ssql . "(select count(distinct `attendancedate`) from `attendance` where `attendance`='P' and DATE_FORMAT( `attendancedate` , '%M-%Y' )=x.MonthYear and `srollno` ='$srollNo' AND `sclass` ='$Class1') Attandance,";
	$ssql=$ssql . "(select count(distinct `attendancedate`) from `attendance` where `attendance`='L' and DATE_FORMAT( `attendancedate` , '%M-%Y' )=x.MonthYear and `srollno` ='$srollNo' AND `sclass` ='$Class1') Leave1 ";
	$ssql=$ssql . "from ";
	$ssql=$ssql . "(";
	$ssql=$ssql . "SELECT DISTINCT DATE_FORMAT( `attendancedate` , '%M-%Y' ) MonthYear, count( distinct `attendancedate` ) TotalWorkingDays";
	$ssql=$ssql . " FROM `attendance`";
	$ssql=$ssql . " WHERE `srollno` ='$srollNo'";
	$ssql=$ssql . " AND `sclass` ='$Class1'";
	$ssql=$ssql . " GROUP BY DATE_FORMAT( `attendancedate` , '%M-%Y')";
	$ssql=$ssql . " ORDER BY  `attendancedate`) x";
	$rsAttandance= mysql_query($ssql);
	
	$num_rows=0;
	//***************
	//*******Fee History*******
	$ssql = "SELECT `quarter`,`fees_amount`,`amountpaid`,`BalanceAmt`,`status`,`receipt`,date_format(`date`,'%d-%m-%Y') as `date`,`FinancialYear` FROM `fees` where `sadmission`='$sadmission' order by `quarter`,`FinancialYear` desc";
	$rsFee = mysql_query($ssql);


?>
<script language="javascript">
	function ShowTab(TabNo)
	{
		
		
		if (TabNo==1)
		{
			document.getElementById("td1").style.backgroundColor="#FFFFFF";
			document.getElementById("td2").style.backgroundColor="#C0C0C0";
			document.getElementById("td3").style.backgroundColor="#C0C0C0";
			document.getElementById("td4").style.backgroundColor="#C0C0C0";
			document.getElementById("td5").style.backgroundColor="#C0C0C0";
			document.getElementById("td6").style.backgroundColor="#C0C0C0";
			document.getElementById("td7").style.backgroundColor="#C0C0C0";
			document.getElementById("td9").style.backgroundColor="#C0C0C0";

			
			document.getElementById("Table1").style.display="";
			document.getElementById("Table2").style.display="none";
			document.getElementById("Table3").style.display="none";
			document.getElementById("Table4").style.display="none";	
			document.getElementById("Table5").style.display="none";
			document.getElementById("Table6").style.display="none";
			document.getElementById("Table7").style.display="none";	
			document.getElementById("Table9").style.display="none";
				
		}
		if (TabNo==2)
		{
			document.getElementById("td1").style.backgroundColor="#C0C0C0";
			document.getElementById("td2").style.backgroundColor="#FFFFFF";
			document.getElementById("td3").style.backgroundColor="#C0C0C0";
			document.getElementById("td4").style.backgroundColor="#C0C0C0";
			document.getElementById("td5").style.backgroundColor="#C0C0C0";
			document.getElementById("td6").style.backgroundColor="#C0C0C0";
			document.getElementById("td7").style.backgroundColor="#C0C0C0";
			document.getElementById("td9").style.backgroundColor="#C0C0C0";

			
			
			document.getElementById("Table1").style.display="none";
			document.getElementById("Table2").style.display="";
			document.getElementById("Table3").style.display="none";
			document.getElementById("Table4").style.display="none";	
			document.getElementById("Table5").style.display="none";
			document.getElementById("Table6").style.display="none";
			document.getElementById("Table7").style.display="none";	
			document.getElementById("Table9").style.display="none";
				
		}
		if (TabNo==3)
		{
			document.getElementById("td1").style.backgroundColor="#C0C0C0";
			document.getElementById("td2").style.backgroundColor="#C0C0C0";
			document.getElementById("td3").style.backgroundColor="#FFFFFF";
			document.getElementById("td4").style.backgroundColor="#C0C0C0";
			document.getElementById("td5").style.backgroundColor="#C0C0C0";
			document.getElementById("td6").style.backgroundColor="#C0C0C0";
			document.getElementById("td7").style.backgroundColor="#C0C0C0";
			document.getElementById("td9").style.backgroundColor="#C0C0C0";

		
			document.getElementById("Table1").style.display="none";
			document.getElementById("Table2").style.display="none";
			document.getElementById("Table3").style.display="";
			document.getElementById("Table4").style.display="none";	
			document.getElementById("Table5").style.display="none";	
			document.getElementById("Table6").style.display="none";
			document.getElementById("Table7").style.display="none";	
			document.getElementById("Table9").style.display="none";
	
		}
		if (TabNo==4)
		{
			document.getElementById("td1").style.backgroundColor="#C0C0C0";
			document.getElementById("td2").style.backgroundColor="#C0C0C0";
			document.getElementById("td3").style.backgroundColor="#C0C0C0";
			document.getElementById("td4").style.backgroundColor="#FFFFFF";
			document.getElementById("td5").style.backgroundColor="#C0C0C0";
			document.getElementById("td6").style.backgroundColor="#C0C0C0";
			document.getElementById("td7").style.backgroundColor="#C0C0C0";
			document.getElementById("td9").style.backgroundColor="#C0C0C0";

			
			document.getElementById("Table1").style.display="none";
			document.getElementById("Table2").style.display="none";
			document.getElementById("Table3").style.display="none";
			document.getElementById("Table4").style.display="";	
			document.getElementById("Table5").style.display="none";
			document.getElementById("Table6").style.display="none";
			document.getElementById("Table7").style.display="none";	
			document.getElementById("Table9").style.display="none";
	
		}
		if (TabNo==5)
		{
			document.getElementById("td1").style.backgroundColor="#C0C0C0";
			document.getElementById("td2").style.backgroundColor="#C0C0C0";
			document.getElementById("td3").style.backgroundColor="#C0C0C0";
			document.getElementById("td4").style.backgroundColor="#C0C0C0";
			document.getElementById("td5").style.backgroundColor="#FFFFFF";
			document.getElementById("td6").style.backgroundColor="#C0C0C0";
			document.getElementById("td7").style.backgroundColor="#C0C0C0";
			document.getElementById("td9").style.backgroundColor="#C0C0C0";

			
			document.getElementById("Table1").style.display="none";
			document.getElementById("Table2").style.display="none";
			document.getElementById("Table3").style.display="none";
			document.getElementById("Table4").style.display="none";	
			document.getElementById("Table5").style.display="";			
			document.getElementById("Table6").style.display="none";
			document.getElementById("Table7").style.display="none";	
			document.getElementById("Table9").style.display="none";

		}
		if (TabNo==6)
		{
			document.getElementById("td1").style.backgroundColor="#C0C0C0";
			document.getElementById("td2").style.backgroundColor="#C0C0C0";
			document.getElementById("td3").style.backgroundColor="#C0C0C0";
			document.getElementById("td4").style.backgroundColor="#C0C0C0";
			document.getElementById("td5").style.backgroundColor="#C0C0C0";
			document.getElementById("td6").style.backgroundColor="#FFFFFF";
			document.getElementById("td7").style.backgroundColor="#C0C0C0";
			document.getElementById("td9").style.backgroundColor="#C0C0C0";

			
			document.getElementById("Table1").style.display="none";
			document.getElementById("Table2").style.display="none";
			document.getElementById("Table3").style.display="none";
			document.getElementById("Table4").style.display="none";	
			document.getElementById("Table5").style.display="none";	
			document.getElementById("Table6").style.display="";
			document.getElementById("Table7").style.display="none";
			document.getElementById("Table9").style.display="none";

		}
		if (TabNo==7)
		{
			document.getElementById("td1").style.backgroundColor="#C0C0C0";
			document.getElementById("td2").style.backgroundColor="#C0C0C0";
			document.getElementById("td3").style.backgroundColor="#C0C0C0";
			document.getElementById("td4").style.backgroundColor="#C0C0C0";
			document.getElementById("td5").style.backgroundColor="#C0C0C0";
			document.getElementById("td6").style.backgroundColor="#C0C0C0";
			document.getElementById("td7").style.backgroundColor="#FFFFFF";
			document.getElementById("td9").style.backgroundColor="#C0C0C0";

			
			document.getElementById("Table1").style.display="none";
			document.getElementById("Table2").style.display="none";
			document.getElementById("Table3").style.display="none";
			document.getElementById("Table4").style.display="none";	
			document.getElementById("Table5").style.display="none";	
			document.getElementById("Table6").style.display="none";
			document.getElementById("Table7").style.display="";
			document.getElementById("Table9").style.display="none";

		}
		if (TabNo==9)
		{
			document.getElementById("td1").style.backgroundColor="#C0C0C0";
			document.getElementById("td2").style.backgroundColor="#C0C0C0";
			document.getElementById("td3").style.backgroundColor="#C0C0C0";
			document.getElementById("td4").style.backgroundColor="#C0C0C0";
			document.getElementById("td5").style.backgroundColor="#C0C0C0";
			document.getElementById("td6").style.backgroundColor="#C0C0C0";
			document.getElementById("td7").style.backgroundColor="#C0C0C0";
			document.getElementById("td9").style.backgroundColor="#FFFFFF";

			
			document.getElementById("Table1").style.display="none";
			document.getElementById("Table2").style.display="none";
			document.getElementById("Table3").style.display="none";
			document.getElementById("Table4").style.display="none";	
			document.getElementById("Table5").style.display="none";	
			document.getElementById("Table6").style.display="none";
			document.getElementById("Table7").style.display="none";
			document.getElementById("Table9").style.display="";

		}

	}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Complete Profile</title>

<style type="text/css">
.style1 {
	color: #000000;
}
</style>
<style type="text/css">

.style1 {

	border-collapse: collapse;

	border: 0px solid #808080;

}

.style5 {

	text-align: left;

}

.auto-style1 {

	text-align: left;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style2 {

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style3 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 12pt;

	color: #FFFFFF;

	text-decoration: underline;

	background-color: #000000;

}

.auto-style4 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style5 {

	border-left: 0px solid #808080;

	border-right: 0px solid #808080;

	border-top: 0px solid #808080;

	border-bottom: 0px solid #808080;

	border-collapse: collapse;

}

.auto-style8 {

	border-bottom-style: solid;

	border-bottom-width: 1px;

}

.auto-style16 {

	border-left: 0px solid #808080;

	text-align: left;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style17 {

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

	border-left-color: #808080;

}

.auto-style19 {

	text-align: left;

	border-right-style: solid;

	border-right-width: 0px;

}

.auto-style20 {

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

	border-right-style: solid;

	border-right-width: 0px;

}

.auto-style22 {

	font-family: Calibri;

	font-size: 12pt;

	color: #FFFFFF;

	text-decoration: underline;

	background-color: #000000;

}

.auto-style23 {

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

	margin-left: 2px;

}

.auto-style25 {

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

	text-align: center;

}

.auto-style26 {

	color: #000000;

	font-weight: bold;

}

.auto-style27 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

	text-align: center;

}

.auto-style28 {

	font-family: Calibri;

	font-size: 12pt;

	color: #FFFFFF;

	border-left-color: #808080;

}

.auto-style29 {

	font-family: Calibri;

	font-size: 12pt;

	color: #FFFFFF;

	border-left-color: #808080;

	text-decoration: underline;

	background-color: #000000;

}

.auto-style30 {

	text-align: center;

	border-right-style: solid;

	border-right-width: 0px;

}

.style6 {
	border-top-style: solid;
	border-top-width: 1px;
	padding-top: 1px;
}
.style7 {
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.style8 {
	color: #000000;
	border-collapse: collapse;
	border: 0px solid #808080;
}
.style9 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
	font-size: 12pt;
	color: #000000;
	text-decoration: underline;
}
.style11 {
	text-decoration: none;
}

.style12 {
	color: #000000;
}
.style14 {
	border-top-style: none;
	border-top-width: medium;
	background-color: #A4C400;
}
.style15 {
	border-collapse: collapse;
	border-top-width: 0px;
}

.style16 {
	border-collapse: collapse;
	border: 1px solid #FFFFFF;
}

.style17 {
	border-top-style: none;
	border-top-width: medium;
}

.style18 {
	font-family: Cambria;
}

.style19 {
	text-align: center;
}

.style20 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style23 {
	text-align: center;
	font-family: Cambria;
	border: 1px solid #000000;
}

.style24 {
	text-align: center;
	font-family: Cambria;
	border: 1px solid #000000;
	background-color: #A4C400;
}

</style>

</head>

<body>

<p>&nbsp;</p>
<p><b><font face="Cambria" style="font-size: 12pt">Complete Student Dossier</font></b></p>
<hr>

<p>&nbsp;</p>

<table style="width: 100%; " class="style8" cellpadding="0" height="31">
	<tr>
		<td  style="border-style:solid; border-width:1px; width: 145px; " id="td1" align="center">
		<a href="Javascript:ShowTab('1');" >
		<span class="style1">
		<font face="Cambria" style="font-size: 11pt"><strong>Student 
		Details</strong></font></span></a></td>
		<td  style="border-style:solid; border-width:1px; width: 145px; background-color:#C0C0C0; " id="td9" align="center">
		<span class="style12" >
		<font face="Cambria"><span style="font-size: 11pt; font-weight: 700">
		<a href="Javascript:ShowTab('9');" >
		Student Remarks</a></font></span></font></td>

		<td  style="border-style:solid; border-width:1px; width: 145px; background-color:#C0C0C0; " id="td2" align="center">
		<span ><a href="Javascript:ShowTab('2');">
		<span style="font-weight:700" class="style12">
		<font face="Cambria" style="font-size: 11pt">Attendance</font></span></a></span></td>
		<td  style="border-style:solid; border-width:1px; width: 195px; background-color:#C0C0C0; " id="td3" align="center">
		<b>
		<a href="Javascript:ShowTab('3');" >
		<font face="Cambria" style="font-size: 11pt"><span class="style12">Fees Details</span> </font>
		</a>
		</b>
		</td>
		<td  style="border-style:solid; border-width:1px; width: 145px; background-color:#C0C0C0; " id="td4" align="center">
		<b>
		<a href="Javascript:ShowTab('4');" >
		<font face="Cambria" style="font-size: 11pt">
		<span class="style12">Notices &amp; Circulars</span></font></a></b></td>
		<td  style="border-style:solid; border-width:1px; width: 145px; background-color:#C0C0C0; " id="td5" align="center">
		<b>
		<font face="Cambria" style="font-size: 11pt">
		<a href="Javascript:ShowTab('5');" >
		<span class="style12">Academics</span></a></font></b></td>
		<td  style="border-style:solid; border-width:1px; width: 145px; background-color:#C0C0C0; " id="td6" align="center">
		<a href="Javascript:ShowTab('6');" ><span >
		<font face="Cambria" style="font-size: 11pt; font-weight:700"><span class="style12">Report Card</span></font></span></a></td>
		<td  style="border-style:solid; border-width:1px; width: 145px; background-color:#C0C0C0; " id="td7" align="center">
		<b>
		<a href="Javascript:ShowTab('7');" ><font face="Cambria">
		<span style="font-size: 11pt">SMS Details</span></font></a></b></td>
		
		
		<td  style="border-style:solid; border-width:1px; width: 145px; background-color:#C0C0C0; " id="td8" align="center">
		<font face="Cambria"><span >
		<b>
		<a href="Javascript:ShowTab('8');" >
		<span style="font-size: 11pt">Student Documents</span></font></a></b></font></td>
		
		


	</tr>
</table>	
<table style="width: 100%" id="Table1">
	<tr>
		<td>
						<table style="width: 100%" >
					<tr>
				
						<td class="style9" colspan="6">
						&nbsp;</td>
				
					</tr>
				
					<tr>
				
						<td class="style9" colspan="6">
						<font face="Cambria"><strong>Student Detail 
						<span class="style6">Snapshot</span></strong></font></td>
				
					</tr>
				
					<tr>
				
						<td style="width: 1140px; height: 24px;" class="auto-style4">
						<font face="Cambria">Name</font></td>
				
						<td style="width: 314px; height: 24px;" class="auto-style41">
				
						<font face="Cambria">
				
						<input name="txtName" id="txtName" type="text" value="<?php echo $sname; ?>" readonly="readonly" class="auto-style2"></font></td>
				
						<td style="width: 414px; height: 24px; text-align:left" class="auto-style27">
				
						<font face="Cambria">Date of Birth</font></td>
				
						<td style="width: 394px; height: 24px;" class="auto-style41">
				
						<font face="Cambria">
				
						<input name="txtDOB" id="txtDOB" type="text" value="<?php echo $DOB; ?>" readonly="readonly" class="auto-style2" style="width: 124px"></font></td>
				
						<td style="width: 524px; height: 24px; text-align:left" class="auto-style27">
				
						<font face="Cambria">Gender</font></td>
				
						<td style="width: 524px; height: 24px;" class="auto-style41">
				
						<font face="Cambria">
				
						<input name="txtSex" id="txtSex" type="text" value="<?php echo $Sex; ?>" readonly="readonly" class="auto-style2"></font></td>
				
					</tr>
				
					<tr>
				
						<td style="width: 1140px; height: 21px;" class="auto-style4"></td>
				
						<td style="width: 314px; height: 21px;" class="auto-style41">
				
						</td>
				
						<td style="width: 414px; height: 21px;" class="auto-style4" align="left">
				
						</td>
				
						<td style="width: 394px; height: 21px;" class="auto-style41">
				
						</td>
				
						<td style="width: 524px; height: 21px;" class="auto-style41" align="left">
				
						</td>
				
						<td style="width: 524px; height: 21px;" class="auto-style41">
				
						</td>
				
					</tr>
				
					
				
					<tr>
				
						<td style="width: 1140px" class="auto-style4">
						<font face="Cambria">Category</font></td>
				
						<td style="width: 314px" class="auto-style41">
				
						<font face="Cambria">
				
						<input name="txtCategory" id="txtCategory" type="text" value="<?php echo $Category; ?>" readonly="readonly" class="auto-style2"></font></td>
				
						<td style="width: 414px; text-align:left" class="auto-style27">
				
						<font face="Cambria">Nationality</font></td>
				
						<td style="width: 394px" class="auto-style41">
				
						<font face="Cambria">
				
						<input name="txtNationality" id="txtNationality" type="text" value="<?php echo $Nationality; ?>" style="height: 22px; width: 122px;" readonly="readonly" class="auto-style2"></font></td>
				
						<td style="width: 524px" class="auto-style41" align="left">
				
						&nbsp;</td>
				
						<td style="width: 524px" class="auto-style41">
				
						&nbsp;</td>
				
					</tr>
				
					
				
					<tr>
				
						<td style="width: 1140px; height: 21px;" class="auto-style4"></td>
				
						<td style="width: 314px; height: 21px;" class="auto-style41">
				
						</td>
				
					
				
						<td style="width: 414px; height: 21px;" class="auto-style41" align="left">
				
						</td>
				
					
				
						<td style="width: 394px; height: 21px;" class="auto-style41">
				
						</td>
				
					
				
						<td style="width: 524px; height: 21px;" class="auto-style41" align="left">
				
						</td>
				
					
				
						<td style="width: 524px; height: 21px;" class="auto-style41">
				
						</td>
				
					
				
					</tr>
				
					
				
					<tr>
				
						<td style="width: 1140px; " class="auto-style2">
						<font face="Cambria">Admission 
				
						No.</font></td>
				
						<td style="width: 314px" class="auto-style41">
				
				
				
						<font face="Cambria">
				
				
				
						<input type="text" name="txtAdmission" id="txtAdmission" size="15" value="<?php echo $sadmission; ?>" readonly="readonly" class="auto-style2" style="width: 164px"></font></td>
				
						<td style="width: 414px; text-align:left" class="auto-style27">
				
				
				
						<font face="Cambria">Class</font></td>
				
						<td style="width: 394px" class="auto-style41">
				
				
				
						<font face="Cambria">
				
				
				
						<input name="cboClass" id="cboClass" type="text" value="<?php echo $StudentClass; ?>" readonly="readonly" class="auto-style2" style="width: 123px" ></font></td>
				
						<td style="width: 524px; text-align:left" class="auto-style27">
				
				
				
						<font face="Cambria">Roll No.</font></td>
				
						<td style="width: 524px" class="auto-style41">
				
				
				
						<font face="Cambria">
				
				
				
						<input name="txtRollNo" id="txtRollNo" type="text" value="<?php echo $srollNo; ?>" readonly="readonly" class="auto-style2"></font></td>
				
					</tr>
				
					
				
					<tr>
				
						<td class="auto-style50" colspan="6">&nbsp;</td>
				
					</tr>
				
					<tr>
				
						<td style="width: 1140px; ">
				
						&nbsp;</td>
				
						<td style="width: 314px" class="auto-style8">
				
						&nbsp;</td>
				
						<td style="width: 414px" class="auto-style8">
				
						&nbsp;</td>
				
						<td style="width: 394px" class="auto-style8">
				
						&nbsp;</td>
				
						<td style="width: 524px" class="auto-style8">
				
						&nbsp;</td>
				
						<td style="width: 524px" class="auto-style8">
				
						&nbsp;</td>
				
					</tr>
				
					
				
					<tr>
				
						<td class="auto-style29" colspan="6" style="background-color: #008000">
				
						<font face="Cambria">
				
						<strong>Family Details Snapshot</strong></font></td>
				
					</tr>
				
					<tr>
				
						<td class="auto-style16" style="width: 1140px; ">
				
						<font face="Cambria">Father Name</font></td>
				
						<td class="auto-style1" style="width: 314px">
				
				
				
						<font face="Cambria">
				
				
				
						<input name="txtFatherName" id="txtFatherName" type="text" value="<?php echo $sfathername; ?>" readonly="readonly" style="width: 154px" class="auto-style2"></font></td>
				
						<td class="auto-style25" style="width: 414px">
				
				
				
						<p style="text-align: left">
				
				
				
						<font face="Cambria">Father Education</font></td>
				
						<td class="style5" style="width: 394px">
				
				
				
						<font face="Cambria">
				
				
				
						<input name="txtFatherEducation" id="txtFatherEducation" type="text" value="<?php echo $FatherEducation; ?>" style="width: 153px" class="auto-style2"></font></td>
				
						<td class="auto-style25">
				
				
				
						<p style="text-align: left">
				
				
				
						<font face="Cambria">Father Occupation</font></td>
				
						<td class="auto-style19">
				
				
				
						<font face="Cambria">
				
				
				
						<input name="txtFatherOccupation" id="txtFatherOccupation" type="text" value="<?php echo $FatherOccupation; ?>" style="width: 153px" class="auto-style2"></font></td>
				
					</tr>
				
					
				
					<tr>
				
						<td style="width: 1140px; " class="auto-style17">
				
						&nbsp;</td>
				
						<td style="width: 314px" class="auto-style2">
				
						&nbsp;</td>
				
						<td style="width: 414px" class="auto-style2">
				
						&nbsp;</td>
				
						<td style="width: 394px" class="auto-style2">
				
						&nbsp;</td>
				
						<td style="width: 524px" class="auto-style2">
				
						&nbsp;</td>
				
						<td style="width: 524px" class="auto-style20">
				
						&nbsp;</td>
				
					</tr><tr>
				
					
				
					
				
						<td style="width: 1140px; " class="auto-style17">
						<font face="Cambria">Mother Name</font></td>
				
						<td style="width: 314px">
				
						<font face="Cambria">
				
						<input name="txtMotherName" id="txtMotherName" type="text" value="<?php echo $MotherName; ?>" readonly="readonly" style="width: 153px" class="auto-style2"></font></td>
				
						<td style="width: 414px" class="auto-style25">
				
						<p style="text-align: left">
				
						<font face="Cambria">Mother Education</font></td>
				
						<td style="width: 394px">
				
						<font face="Cambria">
				
						<input name="txtMotherEducation" id="txtMotherEducation" type="text" value="<?php echo $MotherEducation; ?>" style="width: 151px" class="auto-style2"></font></td>
				
						<td style="width: 524px" class="auto-style2">
				
						&nbsp;</td>
				
						<td style="width: 524px" class="auto-style20">
				
						&nbsp;</td>
				
					</tr>
				
					
				
					<tr>
				
					
				
					
				
						<td style="width: 1140px; " class="auto-style17">&nbsp;</td>
				
						<td style="width: 314px">
				
						&nbsp;</td>
				
						<td style="width: 414px" class="auto-style2">
				
						&nbsp;</td>
				
						<td style="width: 394px">
				
						&nbsp;</td>
				
						<td style="width: 524px" class="auto-style2">
				
						&nbsp;</td>
				
						<td style="width: 524px" class="auto-style20">
				
						&nbsp;</td>
				
					</tr>
				
					
				
					<tr>
				
						<td style="width: 1140px; " class="auto-style17">
				
						<font face="Cambria">Student Address</font><p>
						<font face="Cambria">(If you have changed your address, please update)</font></td>
				
						<td class="auto-style2" colspan="5">
				
						<font face="Cambria">
				
						<textarea name="txtAddress" id="txtAddress" rows="4" class="auto-style23" style="width: 384px" cols="20"><?php echo $Address; ?></textarea></font></td>
				
					</tr>
				
					
				
				<tr>
				
						<td class="auto-style35" style="width: 1140px; ">
				
						&nbsp;</td>
				
						<td class="auto-style30" colspan="2">
				
						&nbsp;</td>
				
						<td class="auto-style36" style="width: 394px">
				
						&nbsp;</td>
				
						<td class="auto-style30" colspan="2">
				
						&nbsp;</td>
				
					</tr>
				
				<tr>
				
						<td class="auto-style22" colspan="6" style="background-color: #008000">
				
						<font face="Cambria">
				
						<strong>Portal and Mobile Application Login Details</strong></font></td>
				
					</tr>
				
				<tr>
				
						<td class="auto-style2" style="width: 1140px; ">
				
						<font face="Cambria">Mobile</font><p><span class="auto-style2">
						<font face="Cambria">(Please 
				
						update - If required)</font></span></td>
				
						<td class="auto-style1" colspan="2">
				
						<font face="Cambria">
				
						<input name="txtMobile" id="txtMobile" type="text" value="<?php echo $smobile; ?>" style="width: 155px" class="auto-style2" readonly></font><span class="auto-style2"><font face="Cambria"><br>&nbsp;</font></span></td>
				
						<td class="auto-style25" style="width: 394px">
				
						<font face="Cambria">IMEI</font></td>
				
						<td class="auto-style19" colspan="2">
				
						<font face="Cambria">
				
						<input name="txtImei" id="txtImei" type="text" value="<?php echo $simei; ?>" style="width: 154px" class="auto-style2" readonly></font></td>
				
					</tr>
				
				<tr>
				
						<td class="auto-style28" style="width: 1140px; ">
				
						&nbsp;</td>
				
						<td class="style5" style="width: 314px">
				
						&nbsp;</td>
				
						<td class="auto-style25" style="width: 414px">
				
						&nbsp;</td>
				
						<td class="style5" style="width: 394px">
				
						&nbsp;</td>
				
						<td class="style5">
				
						&nbsp;</td>
				
						<td class="auto-style34">
				
						&nbsp;</td>
				
					</tr>
				
				<tr>
				
						<td class="auto-style1" style="width: 1140px; ">
				
						<font face="Cambria">Password</font><p><span class="auto-style2">
						<font face="Cambria">(If 
				
						you change your current password then your password will be reset)</font></span></td>
				
						<td class="auto-style19" colspan="5">
				
						<font face="Cambria">
				
						<input name="txtPassword" id="txtPassword" type="text" value="<?php echo $spassword; ?>" style="width: 154px" class="auto-style2"></font></td>
				
					</tr>
				
				<tr>
				
						<td class="auto-style1" style="width: 1140px; ">
				
						&nbsp;</td>
				
						<td class="auto-style19" colspan="5">
				
						&nbsp;</td>
				
					</tr>
				
					<tr>
				
						<td class="auto-style1" style="width: 1140px; ">
				
						<font face="Cambria">Email Id</font></td>
				
						<td class="auto-style19" colspan="5">
				
						<font face="Cambria">
				
						<input name="txtEmail" id="txtEmail" type="text" value="<?php echo $email; ?>" style="width: 332; height:25" class="auto-style2" readonly></font></td>
				
					</tr>
				
				
				
				</table>
		
		
		</td>
	</tr>
</table>
<table style="width: 100%;display: none" id="Table2">
	<tr>
		<td>
					<table border="1" width="100%" bordercolor="#000000" class="style15">
			
						<tr>
			
							<td height="35" width="278" align="center" class="style14">
			
							<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">
			
							Month</span></td>
			
							<td height="35" width="278" align="center" class="style14">
			
							<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">
			
							Total Work Days</span></td>
			
							<td height="35" width="279" align="center" class="style14">
			
							<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">
			
							Attendance<br> Total Days Present</span></td>
			
							<td height="35" align="center" width="279" class="style14">
			
							<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">
			
							Total Days Leave</span></td>
			
							<td height="35" align="center" width="279" class="style14">
			
							<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">
			
							Total Days Absent</span></td>
			
							<td height="35" align="center" width="279" class="style14">
			
							<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">
			
							Percentage %</span></td>
			
							<td height="35" align="center" width="279" class="style14">
			
							<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">
			
							Holidays in Month</span></td>
			
						</tr>
			
						<?php
			
							while($row = mysql_fetch_row($rsAttandance))
							{
								$MonthYear=$row[0];
								$TotalWorkingDays=$row[1];
								$Attandance=$row[2];
								$Leave=$row[3];
								$Percentage=(($Attandance+$Leave)/$TotalWorkingDays)*100;
			
						?>
			
						<tr>
			
							<td height="35" width="278" align="center">
			
							<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
			
							<?php echo $MonthYear; ?></span></td>
			
							<td height="35" width="278" align="center">
			
							<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
			
							<?php echo $TotalWorkingDays; ?></span></td>
			
							<td height="35" width="279" align="center">
			
							<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
			
							<?php echo $Attandance; ?></span></td>
			
							<td height="35" width="279" align="center">
			
							<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
			
							<?php echo $Leave; ?></span></td>
			
							<td height="35" width="279" align="center">
							<font face="Cambria">
							<?php echo ($TotalWorkingDays-($Attandance+$Leave)); ?>
							</font>
							</td>
			
							<td height="35" width="279" align="center">
			
							<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
			
							<?php echo round($Percentage,2); ?>%</span></td>
			
							<td height="35" width="279" align="center">
			
							&nbsp;</td>
			
						</tr>
			
						<?php
			
						}
			
						?>
			
						<tr>
			
							<td height="35" width="278" align="center">&nbsp;</td>
			
							<td height="35" width="278" align="center">&nbsp;</td>
			
							<td height="35" width="279" align="center">&nbsp;</td>
			
							<td height="35" width="279" align="center">&nbsp;</td>
			
							<td height="35" width="279" align="center">&nbsp;</td>
			
							<td height="35" width="279" align="center">&nbsp;</td>
			
							<td height="35" width="279" align="center">&nbsp;</td>
			
						</tr>
			
					</table>
		
		
		
		
		</td>
	</tr>
</table>
<br>
<table style="width: 100%;display: none;" class="style20" id="Table3">
	<tr>
		<td class="style24" style="width: 152px"><strong>Quarter</strong></td>
		<td class="style24" style="width: 152px"><strong>Receipt</strong></td>
		<td class="style24" style="width: 152px"><strong>Fee Payable</strong></td>
		<td class="style24" style="width: 152px"><strong>Fee Paid</strong></td>
		<td class="style24" style="width: 153px"><strong>Balance</strong></td>
		<td class="style24" style="width: 153px"><strong>Status</strong></td>
		<td class="style24" style="width: 153px"><strong>Payment Date</strong></td>
		<td class="style24" style="width: 153px"><strong>Financial Year</strong></td>
	</tr>
	<?php
	while($rowF=mysql_fetch_row($rsFee))
	{
		$quarter=$rowF[0];
		$fees_amount=$rowF[1];
		$amountpaid=$rowF[2];
		$BalanceAmt=$rowF[3];
		$status=$rowF[4];
		$receipt=$rowF[5];
		$date=$rowF[6];
		$FinancialYear=$rowF[7];
	?>
	<tr>
		<td class="style23" style="width: 152px"><?php echo $quarter;?></td>
		<td class="style23" style="width: 152px"><?php echo $receipt;?></td>
		<td class="style23" style="width: 152px"><?php echo $fees_amount;?></td>
		<td class="style23" style="width: 152px"><?php echo $amountpaid;?></td>
		<td class="style23" style="width: 153px"><?php echo $BalanceAmt;?></td>
		<td class="style23" style="width: 153px"><?php echo $status;?></td>
		<td class="style23" style="width: 153px"><?php echo $date;?></td>
		<td class="style23" style="width: 153px"><?php echo $FinancialYear;?></td>
	</tr>
	<?php
	}
	?>
</table>
<?php
	$ssql="select `srno`,DATE_FORMAT(`NoticeDate`,'%d-%b-%y') as `datetime`,`notice`,`noticetitle` from `student_notice` where (`sclass` ='$Class1' and `srollno`='$srollNo') or `sclass`='All' or (`sclass` ='$Class1' and `srollno`='All') order by `NoticeDate` desc";
	$rs= mysql_query($ssql);
	$num_rows=0;
?>	
<table style="width: 100%;display: none;" id="Table4">
	<tr>
		<td>
			<table width="100%" cellspacing="1" height="80" class="style16">
				<tr>
			
			
			
					<td bgcolor="#A4C400">
			
			
			
					<p style="margin-left: 10px">
			
			
			
					<span style="font-family:Cambria;font-size:12pt;font-weight:bold;font-style:normal;text-decoration:none;">
			
			
			
					Important Notice</span></td>
			
			
			
				</tr>
			
			
			
				<tr>
			
			
					<td>
			
			
			
					<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000">
			
			
			
						<tr>
			
			
			
							<td height="35" align="center" class="auto-style1" style="width: 242px">
			
			
			
							<font face="Cambria">
			
			
			
							<strong>Date</strong></font></td>
			
			
			
							<td height="35" align="center" class="auto-style1" style="width: 1571px">
			
			
			
							<font face="Cambria">
			
			
			
							<strong>Notice Title</strong></font></td>
			
			
			
							<td height="35" align="center" class="auto-style2" style="width: 631px">
			
			
			
							<font face="Cambria">
			
			
			
							<strong>View</strong></font></td>
			
			
			
						</tr>
			
			
			
						<?php
			
				
							$row_num=0;
							while($row = mysql_fetch_row($rs))
							{
			
			
			
								$SrNo=$row[0];
			
			
			
								$datetime=$row[1];
			
			
			
								$notice=$row[2];
			
								$noticetitle=$row[3];
								$row_num=$row_num+1;
			
													
			
			
			
						?>
			
			
			
						<tr>
			
			
			
							<td height="35" align="left" style="width: 242px">
			
			
			
							<span style="font-family:Cambria;font-size:14px;font-weight:normal;font-style:normal;text-decoration:none;color:#000000;"><?php echo $datetime; ?></span><font face="Cambria"><br><br>
							</font></td>
			
			
			
							<td height="35" align="left" style="width: 1571px">
			
			
			
							<span style="font-family:Cambria;font-size:14px;font-weight:normal;font-style:normal;text-decoration:none;color:#000000;"><?php echo $noticetitle; ?></span></td>
			
			
			
							<td height="35" style="width: 631px; border-right-style:solid; border-right-width:1px" class="style1">
			
			
			
							<p align="center">
			
			
			
							<a href="Javascript:ShowPreviewNotice(<?php echo $SrNo ?>);">
							<font face="Cambria">
							Preview</span></font></span></a></td>
			
			
			
						</tr>
			
			
			
						<?php
			
			
			
						}
			
			
			
						?>
			
			
			
						<tr>
			
			
			
							<td height="35" align="center" style="width: 242px">&nbsp;</td>
			
			
			
							<td height="35" align="center" style="width: 1571px">&nbsp;</td>
			
			
			
							<td height="35" align="center" style="width: 631px">&nbsp;</td>
			
			
			
						</tr>
			
			
			
					</table>
			
			
			
					</td>
			
			
			
				</tr>
			
			
			
			</table>
</td>
</tr>
</table>
<?php
$ssql="SELECT a.`sclass` , a.`subject` , a.`homework` ,a.`homeworkdate` FROM `homework_master` a where a.`sclass`='$Class1' order by a.`homeworkdate` desc";
$rs= mysql_query($ssql);
?>
<table style="width: 100%;display: none" id="Table5">
<tr>
<td>
	<table border="1" width="100%" bordercolor="#000000" class="style15" height="38">

			<tr>

				<td height="20" width="129" bgcolor="#A4C400" align="center" class="style17">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; ">

				Subject</span></td>

				<td height="20" width="129" bgcolor="#A4C400" align="center" class="style17">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; ">

				Date</span></td>

				<!--<td height="35" width="129" bgcolor="#FFFFFF" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #FFFFFF">

				Teacher Name</span></td>-->

				<td height="20" bgcolor="#A4C400" align="center" width="499" class="style17">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; ">

				Homework</span></td>

			</tr>

			<?php

				while($row = mysql_fetch_row($rs))

				{

					$sclass=$row[0];

					$subject=$row[1];

					$homework=$row[2];

					$homeworkdate=$row[3];

					$num_rows=$num_rows+1;

			?>

			<tr>

				<td height="19" width="129" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">

				<?php echo $subject; ?></span></td>

				<td height="19" width="129" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">

				<?php echo $homeworkdate; ?></span></td>

				<!--<td height="35" width="129" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #CC3300">

				Asha Mathur</span></td>-->

				<td height="19" width="499" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">

				<?php echo $homework; ?></span></td>

			</tr>

			<?php

			}

			?>


		</table>	
</td>
</tr>
</table>
<?php
	$ssql="SELECT `testtype`,`subject`,`marks`,`remarks`,`Grade`,`Position`";
	$ssql=$ssql . " FROM `report_card`";
	$ssql=$ssql . " WHERE `sclass` = '$class' and `srollno` ='$StudentRollNo' order by `testtype`";
	$rs= mysql_query($ssql);
?>
<table style="width: 100%; display: none" id="Table6">
<tr>
<td>
			<table border="1" width="100%" cellspacing="1" style="border-collapse: collapse" height="80" bordercolor="#000000">
			<tr>
				<td bgcolor="#FA6800">
				<p style="margin-left: 10px">
				<span style="font-family:Cambria;font-size:18px;font-weight:bold;font-style:normal;text-decoration:none;color:#FFFFFF;">
				Report Card</span></td>
			</tr>
			<tr>
				<td>
				<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000">
					<tr>
						<td height="35" width="278" bgcolor="#FFFFFF" align="center">
						<span style="font-family:Cambria;font-size:15px;font-weight:bold;font-style:normal;text-decoration:none;color:#000000;">
						Exam Type</span></td>
						<td height="35" width="278" bgcolor="#FFFFFF" align="center">
						<span style="font-family:Cambria;font-size:15px;font-weight:bold;font-style:normal;text-decoration:none;color:#000000;">
						Subject</span></td>
						<td height="35" width="278" bgcolor="#FFFFFF" align="center">
						<span style="font-family:Cambria;font-size:15px;font-weight:bold;font-style:normal;text-decoration:none;color:#000000;">
						Max. Marks</span></td>
						<td height="35" width="279" bgcolor="#FFFFFF" align="center">
						<span style="font-family:Cambria;font-size:15px;font-weight:bold;font-style:normal;text-decoration:none;color:#000000;">
						Marks Obtained</span></td>
						<td height="35" bgcolor="#FFFFFF" align="center" width="279">
						<span style="font-family:Cambria;font-size:15px;font-weight:bold;font-style:normal;text-decoration:none;color:#000000;">
						Grade</span></td>
					</tr>
					<?php
						while($row = mysql_fetch_row($rs))
						{
							$TestType=$row[0];
							$Subject=$row[1];
							$Marks=$row[2];
							$Remarks=$row[3];
							$Grade=$row[4];
							$Position=$row[5];
					?>
					<tr>
						<td height="35" width="278" align="center">
						<?php echo $TestType;?></td>
						<td height="35" width="278" align="center">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
						<?php echo $Subject; ?></span></td>
						<td height="35" width="278" align="center">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
						<?php echo $MaxMarks; ?></span></td>
						<td height="35" width="279" align="center">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
						<?php echo $Marks; ?></span></td>
						<td height="35" width="279" align="center">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
						<?php echo $Grade; ?></span></td>
					</tr>
					<?php
					}
					?>
					<tr>
						<td height="35" width="278" align="center">&nbsp;</td>
						<td height="35" width="278" align="center">&nbsp;</td>
						<td height="35" width="278" align="center">&nbsp;</td>
						<td height="35" width="279" align="center">&nbsp;</td>
						<td height="35" width="279" align="center">&nbsp;</td>
					</tr>
				</table>
				</td>
			</tr>
		</table>

</td>
</tr>
</table>
<?php
	
	$sql = "SELECT `srno`,`sname` ,`sadmission` ,`sclass`,`rollno`,`smstype`,`mobileno`,`message`,`sentdate`,`deliverydate`,`finalstatus`,`systemdatetime` FROM `sms_logs` where `sadmission`='$sadmission' order by `sentdate` desc";
	$rs = mysql_query($sql);
?>

<table style="width: 100%;display: none" id="Table7">
<tr>
<td>
		<table style="width: 100%" class="style3">
			<tr>
				<td class="style5" style="border-style:solid; border-width:1px; width: 47px" bgcolor="#95C23D"><strong>
				<font face="Cambria">Sr. No.</font></strong></td>
				<td class="style5" style="border-style:solid; border-width:1px; width: 96px" bgcolor="#95C23D">
				<strong><font face="Cambria">Student Name</font></strong></td>
				<td class="style5" style="border-style:solid; border-width:1px; width: 104px" bgcolor="#95C23D">
				<strong><font face="Cambria">Admission No</font></strong></td>
				<td class="style5" style="border-style:solid; border-width:1px; width: 104px" bgcolor="#95C23D">
				<strong><font face="Cambria">Class</font></strong></td>
				<td class="style5" style="border-style:solid; border-width:1px; width: 104px" bgcolor="#95C23D">
				<strong><font face="Cambria">Roll No</font></strong></td>
				<td class="style5" style="border-style:solid; border-width:1px; width: 104px" bgcolor="#95C23D">
				<strong><font face="Cambria">SMS Type</font></strong></td>
				<td class="style5" style="border-style:solid; border-width:1px; width: 104px" bgcolor="#95C23D">
				<strong><font face="Cambria">Mobile No</font></strong></td>
				<td class="style5" style="border-style:solid; border-width:1px; width: 104px" bgcolor="#95C23D">
				<strong><font face="Cambria">Message</font></strong></td>
				<td class="style5" style="border-style:solid; border-width:1px; width: 104px" bgcolor="#95C23D">
				<strong><font face="Cambria">Sent Date</font></strong></td>
				<td class="style5" style="border-style:solid; border-width:1px; width: 105px" bgcolor="#95C23D">
				<strong><font face="Cambria">Delivery Date</font></strong></td>
				<td class="style5" style="border-style:solid; border-width:1px; width: 105px" bgcolor="#95C23D">
				<strong><font face="Cambria">Final Status</font></strong></td>
				<td class="style5" style="border-style:solid; border-width:1px; width: 105px" bgcolor="#95C23D">
				<strong><font face="Cambria">System Time</font></strong></td>
			</tr>
			<?php
				$rownum=1;
				while($row = mysql_fetch_row($rs))
				{
						$srno=$row[0];
						$sname=$row[1];
						$sadmission=$row[2];
						$sclass=$row[3];
						$rollno=$row[4];
						$smstype=$row[5];
						$mobileno=$row[6];
						$message=$row[7];
						$sentdate=$row[8];
						$deliverydate=$row[9];
						$finalstatus=$row[10];
						$systemdatetime=$row[11];
			?>
			<tr>
				
		<td class="style19" style="border-style:solid; border-width:1px; width: 47px; "><font face="Cambria"><?php echo $rownum;?></font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 96px; text-align:left"><font face="Cambria"><?php echo $sname;?></font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 104px; text-align:left"><font face="Cambria"><?php echo $sadmission;?></font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 104px; text-align:left"><font face="Cambria"><?php echo $sclass;?></font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 104px; text-align:left"><font face="Cambria"><?php echo $rollno;?></font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 104px; text-align:left"><font face="Cambria"><?php echo $smstype;?></font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 104px; text-align:left"><font face="Cambria"><?php echo $mobileno;?></font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 104px; text-align:left"><font face="Cambria"><?php echo $message= str_replace("%20"," ",$message);?></font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 104px; text-align:left"><font face="Cambria"><?php echo $sentdate;?></font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 105px; text-align:left"><font face="Cambria"><?php echo $deliverydate;?></font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 105px; text-align:left"><font face="Cambria"><?php echo $finalstatus;?></font></td>
				<td class="style5" style="border-style:solid; border-width:1px; width: 105px; text-align:left"><font face="Cambria"><?php echo $systemdatetime;?></font></td>
	</tr>
		<?php
			$rownum=$rownum+1;
			}//End of while loop
		?>
</table>
		</td>
</tr>
</table>
<?php
	
	$ssql="SELECT `sadmisson`, `sname`, `sclass`, `srollno`, `sfathername`, `smothername`, `FYear`, `CGPASem1`, `CGPASem2`, `CGPAOverall`, `ConceptWorkHabits`, `AttitudeBehaviour`, `ExtraCurricular`, `SpecialTalent`, `LongLeaveReason`, `SpecialIncident`, `EmpId`, `DateOfEntry`, `SystemDateTime` FROM `StudentDossier` WHERE `sadmisson`='$sadmission' and `L1ApprovalStatus`='Approved' and `L2ApprovalStatus`='Approved'";
	$rs = mysql_query($ssql);
	?>

<table style="width: 100%; display: none" id="Table9">
<tr>
<td>
			<table border="1" width="100%" cellspacing="1" style="border-collapse: collapse" height="80" bordercolor="#000000">
			<tr>
				<td bgcolor="#FA6800">
				<p style="margin-left: 10px">
				<span style="font-family:Cambria;font-size:18px;font-weight:bold;font-style:normal;text-decoration:none;color:#FFFFFF;">
				Personality Remarks</span></td>
			</tr>
			<tr>
			
				
				<td>
				<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000">
				<?php
						while($row = mysql_fetch_row($rs))
						{
							$CGPASem1=$row[7];
							$CGPASem2=$row[8];
							$CGPAOverall=$row[9];
							$ConceptWorkHabits=$row[10];
							$AttitudeBehaviour=$row[11];
							$ExtraCurricular=$row[12];
							$SpecialTalent=$row[13];
							$LongLeaveReason=$row[14];
							$SpecialIncident=$row[15];
					?>
					<tr>
						<td height="35" width="314" bgcolor="#FFFFFF" align="center">
						<span style="font-family: Cambria; font-weight: 700; font-size: 15px; font-style:normal; text-decoration:none; color:#000000">
						Parameters</span></td>
						<td height="35" bgcolor="#FFFFFF" align="center" width="956">
						<span style="font-family: Cambria; font-weight: 700; font-size: 15px; font-style:normal; text-decoration:none; color:#000000">
						Remarks</span></td>
					</tr>
					
					<tr>
						<td height="35" width="314" align="left">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">CGPA Semester 1</span></td>
						<td height="35" width="956" align="center">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
						<?php echo $CGPASem1; ?></span></td>
					</tr>
					<tr>
						<td height="35" width="314" align="left">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">CGPA Semester 2</span></td>
						<td height="35" width="956" align="center">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
						<?php echo $CGPASem2; ?></span></td>
					</tr>
					<tr>
						<td height="35" width="314" align="left">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">Overall CGPA</span></td>
						<td height="35" width="956" align="center">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
						<?php echo $CGPAOverall; ?></span></td>
					</tr>
					<tr>
						<td height="35" width="314" align="left">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">Concepts/ Work Habits</span></td>
						<td height="35" width="956" align="center">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
						<?php echo $ConceptWorkHabits; ?></span></td>
					</tr>
					<tr>
						<td height="35" width="314" align="left">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">Attitude/ Behavior</span></td>
						<td height="35" width="956" align="center">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
						<?php echo $AttitudeBehaviour; ?></span></td>
					</tr>
					<tr>
						<td height="35" width="314" align="left">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">Extra Curricular Activities</span></td>
						<td height="35" width="956" align="center">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
						<?php echo $ExtraCurricular; ?></span></td>
					</tr>
					<tr>
						<td height="35" width="314" align="left">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">Special Talent</span></td>
						<td height="35" width="956" align="center">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
						<?php echo $SpecialTalent; ?></span></td>
					</tr>
					<tr>
						<td height="35" width="314" align="left">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
						Record for long leave and reason</span></td>
						<td height="35" width="956" align="center">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
						<?php echo $LongLeaveReason; ?></span></td>
					</tr>
									<tr>
						<td height="35" width="314" align="left">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">Any special 
						incident and measures takes</span></td>
						<td height="35" width="956" align="center">
						<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000"><?php echo $SpecialIncident; ?></span></td>
					</tr>
					<?php
						$rownum=$rownum+1;
			//End of while loop

					}
					?>
					</table>
				
	
				</td>
			</tr>
		</table>

</td>
</tr>
</table>
			</body>

</html>