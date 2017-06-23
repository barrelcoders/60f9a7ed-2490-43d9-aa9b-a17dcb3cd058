<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
	include '../Header/Header3.php';
     $EmployeeId=$_SESSION['userid'];
?>

<?php
$ssqlCFY="SELECT distinct `year`,`financialyear` FROM `FYmaster` where `Status`='Active'";
	$rsCFY= mysql_query($ssqlCFY);

	while($row = mysql_fetch_row($rsCFY))
	{
		$CurrentFinancialYear = $row[0];
		$CurrentFinancialYearName=$row[1];					
	}

$rsEmpHistory=mysql_query("SELECT `EmployeeId`, `EmployeeName`, `LeaveFrom`, `LeaveTo`, `LeaveType`, `NoOfDays`, `ContactNoDuringLeave`, `AddressDuringLeave`, `Remarks`, `EntryDate`, `ApproverId`, `ApprovalStatus`, `L2ApproverId`, `L2ApproverStatus`,`L3ApproverId`,`L3ApproverStatus` ,`StatusUpdateDate` FROM `Employee_Leave_Transaction` WHERE `EmployeeId`='$EmployeeId'");
$rsEmpDetail=mysql_query("SELECT  `EmpId`, `Name`, `DOB`, `Gender`, `Category`, `Nationality`, `DOJ`, `LastSchool`, `employeetype`, `ClassTeacher`, `Education_Qualification`, `FatherName`, `Salary`, `Allowances`, `Address`, `MobileNo`, `Imei`, `UserId`, `Password`, `email`, `role`, `status`, `L1_Approver_Id`, `L2_Approver_Id`, `L3_Approver_Id`, `Department`, `Designation`, `PayBand`, `TeachingSubject`, `MaritalStatus`, `HusbandName`, `AnniversaryDate`, `DateTime`, `DesigOrder`, `EmpAccountNo` FROM `employee_master` WHERE  `EmpId`='$EmployeeId'");
$rowEmpDetail=mysql_fetch_row($rsEmpDetail);
{
    $EmpName=$rowEmpDetail[1];
    $DOB=$rowEmpDetail[2];
    $Gender=$rowEmpDetail[3];
    $Category=$rowEmpDetail[4];
    $Nationality=$rowEmpDetail[5];
    $DOJ=$rowEmpDetail[6];
    $LastSchool=$rowEmpDetail[7];
    $EmpType=$rowEmpDetail[8];
    $ClassTeacher=$rowEmpDetail[9];
    $EduQuali=$rowEmpDetail[10];
    $FatherName=$rowEmpDetail[11];
    $Salary=$rowEmpDetail[12];
    $Allowances=$rowEmpDetail[13];
    $Address=$rowEmpDetail[14];
    $MobileNo=$rowEmpDetail[15];
    $Department=$rowEmpDetail[25];
    $Designation=$rowEmpDetail[26];
    $PayBand=$rowEmpDetail[27];
    $Email=$rowEmpDetail[19];
    
}
    

?>


<script language="javascript">


function sname()
{
	document.getElementById("trWait").style.display="";
	document.getElementById("trWait").innerHTML ="Please Wait...";
	var itm;
	try
	{
		itm = new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			itm = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
			itm = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("Your Browser Broke!");
				return false;
			}
		}
	}
	
	itm.onreadystatechange=function()
		      {
			      if(itm.readyState==4)
			        {
						var rows="";
			        	rows=new String(itm.responseText);
			        	arr_row=rows.split(",");
			        	document.getElementById('txtEmpName').value=arr_row[0];
						document.getElementById('txtEmpType').value=arr_row[1];       	 
						document.getElementById('txtMobile').value=arr_row[2];       	 
						document.getElementById("trWait").style.display="none";
						document.getElementById("trWait").innerHTML ="";						
			        }
		      }
			
			var submiturl="get_info2.php?c=" + document.getElementById('txtEmpNo').value;
			itm.open("GET", submiturl,true);
			itm.send(null);
}


function Validate()
{
    if(document.getElementById("txtEmpName").value.trim()=="")
	{
		alert ("Employee Name is mandatory !");
		return;
	}
	

	document.getElementById("frmSelfAppraisal").submit();
}




</script>



</script>



<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>ACR</title>
	<link rel="stylesheet" type="text/css" href="../tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="../tcal.js"></script>

<style>
<!--
 li.MsoNormal
	{mso-style-parent:"";
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	margin-left:0in; margin-right:0in; margin-top:0in}
-->
</style>

</head>

<body>
<div id="MasterDiv">
<table width="100%">
	<tr>
		<td>
		<h1 align="center"><b><font face="Cambria">
		<img src="<?php echo $SchoolLogo; ?>" height="100px" width="400px"></font></b></h1>
		</td>
	</tr>
	<tr>
		<td align="center"><font face="Cambria"><b><?php echo $SchoolAddress; ?></b>
		</font></td>
	</tr>
	<tr>
		<td align="center"><font face="Cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b>
		</font></td>
	</tr>
	<tr>
		<td align="center"><font face="Cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b>
		</font></td>
	</tr>
	<tr>
		<td align="center">&nbsp;</td>
	</tr>
</table>
<table id="table_10" style="width: 100%" cellspacing="0" cellpadding="0" class="style15">
	<tr>
		<td class="style16">
		<p  style="height: 12px" align="center"><strong>
		<font face="Cambria" style="font-size: 14pt">Appraisal of Staff 
Personality and Performance</font></strong></p>
		<p  style="height: 12px" align="left" class="style25">&nbsp;</p></td>
	</tr>
	<tr>
		<td class="style16">
		<p  style="height: 12px" align="center"><strong>
		<font face="Cambria" style="font-size: 14pt; text-decoration: underline">SELF 
APPRAISAL</font></strong></p>
		<p  style="height: 12px" align="center">&nbsp;</p>
		<p  style="height: 12px" align="center">&nbsp;</p>
		<p  style="height: 12px" align="center"><strong>
		<font face="Cambria" style="font-size: 14pt">Period of Review:<?php echo $CurrentFinancialYearName; ?> 
		</font></strong></p>
		<p  style="height: 12px" align="left" class="style25">&nbsp;</p></td>
	</tr>
	<tr>
		<td>
		<p align="center"><font face="Cambria"><b>NAME:&nbsp;&nbsp;<?php echo $EmpName; ?> 
		</b></font></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><font face="Cambria">&nbsp;</font></td>
	</tr>
	<td>&nbsp;</td>
	</tr>
</table>
<table width="90%">
	<tr>
		<td><u><b><font face="Cambria">Guidelines to complete the Performance Report</font></b></u></td>
	</tr>
	<tr>
		<td align=left >&nbsp;</td>
	</tr>
	<tr>
		<td align=left ><font face="Cambria">1. This form is to be used to assess 
	the potential of the school staff &nbsp;(both administrative and teaching), 
	encourage&nbsp;&nbsp;&nbsp; improvement, correct negative tendencies/attitude, weed out chaff 
	and nourish the right material for improving performance and personal 
	advancement.
	</font></td>
	</tr>
	<tr>
		<td align=left>&nbsp;</td>
	</tr>
	<tr>
		<td align=left><font face="Cambria">2. The assessment should be of the 
		review period only.

	</font></td>
	</tr>
	<tr>
		<td align=left>&nbsp;</td>
	</tr>
	<tr>
		<td align=left><font face="Cambria">3. Over-assessment or under-assessment will have repercussions on the performance of the assessee, and the credibility of the school.</font></td>
	</tr>
	<tr>
		<td align=left>&nbsp;</td>
	</tr>
	<tr>
		<td align=left><font face="Cambria">4. It should be the endeavour of the appraiser to make a correct assessment of 
		the appraisee with regard to his/her performance, conduct, behaviour and 
		potential, keeping in mind the distinction between fact and opinion.
&nbsp;</font></td>
	</tr>
	<tr>
		<td align=left>&nbsp;</td>
	</tr>
	<tr>
		<td align=left><font face="Cambria">5. This qualitative and quantitative assessment will be of great assistance 
		in developing Human Resource for the programme, enhancement and 
		well-being of the school.
&nbsp;&nbsp; </font> </td>
	</tr>
	<tr>
		<td align=left>&nbsp;</td>
	</tr>
</table>
<div align="center">
<table border="1" width="80%" style="border-width:0px; border-collapse: collapse">
	<form name="frmSelfAppraisal" id="frmSelfAppraisal" method="post" action="SubmitSelfAppraisal.php">
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria"><b><u>Basic Information</u></b></font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: medium none #C0C0C0; border-bottom-style: none; border-bottom-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Name :</font></td>
			<td style="border-style: none; border-width: medium"><b>
			<font face="Cambria">
			<input name="txtEmpName" id="txtEmpName" type=text style="float: left" class="text-box"/ value="<?php echo $EmpName; ?>" ></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			&nbsp;</td>
			<td style="border-style: none; border-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Father's/ Husband's Name :</font></td>
			<td style="border-style: none; border-width: medium"><b>
			<font face="Cambria">
			<input name="txtFatherName" id="txtFatherName" type=text style="float: left" class="text-box"/ value="<?php echo $FatherName; ?>"></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			&nbsp;</td>
			<td style="border-style: none; border-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Date Of Birth :</font></td>
			<td style="border-style: none; border-width: medium"><b>
			<font face="Cambria">
			<input name="txtDOB" id="txtDOB" type=date style="float: left" class="text-box"/ value="<?php echo $DOB; ?>"></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			&nbsp;</td>
			<td style="border-style: none; border-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Designation :</font></td>
			<td style="border-style: none; border-width: medium"><b>
			<font face="Cambria">
			<input name="txtDesignation" id="txtDesignation" type=text style="float: left" class="text-box"/ value="<?php echo $Designation ; ?>"></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			&nbsp;</td>
			<td style="border-style: none; border-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Contact No :</font></td>
			<td style="border-style: none; border-width: medium"><b>
			<font face="Cambria">
			<input name="txtMobile" id="txtMobile" type=text style="float: left" class="text-box"/ value="<?php echo $MobileNo; ?>"></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			&nbsp;</td>
			<td style="border-style: none; border-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Email Id :</font></td>
			<td style="border-style: none; border-width: medium"><b>
			<font face="Cambria">
			<input name="txtEmail" id="txtEmail" type=text style="float: left" class="text-box"/ value="<?php echo $Email; ?>"></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			&nbsp;</td>
			<td style="border-style: none; border-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Residential Address :</font></td>
			<td style="border-style: none; border-width: medium"><b>
			<font face="Cambria">
			<input name="txtAddress" id="txtAddress" type=text style="float: left" class="text-box"/ value="<?php echo $Address ; ?>"></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			&nbsp;</td>
			<td style="border-style: none; border-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Present Pay Scale &amp; Grade :</font></td>
			<td style="border-style: none; border-width: medium"><b>
			<font face="Cambria">
			<input name="txtPayScale" id="txtPayScale" type=text style="float: left" class="text-box"/ value="<?php echo $PayBand ; ?>"></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			&nbsp;</td>
			<td style="border-style: none; border-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Date of Last Up gradation /Promotion :</font></td>
			<td style="border-style: none; border-width: medium"><b>
			<font face="Cambria">
			<input name="txtUpgradation" id="txtUpgradation" type=date style="float: left" class="text-box"/ ></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria"><u>Personal Particulars</u></font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6"><b>
			<font face="Cambria">Result of Classes taught during the academic 
			session</font></b></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080"><b>
			<font face="Cambria">
			<input name="txtResult" id="txtResult" type=text style="float: left" class="text-box"/ ></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" align="center">
			<font face="Cambria">
			<b>Class</b></font></td>
			<td style="border-style: none; border-width: medium" align="center">
			<font face="Cambria">
			<b>No. of Students</b></font></td>
			<td style="border-style: none; border-width: medium" align="center">
			<font face="Cambria">
			<b>Subjects Taught</b></font></td>
			<td style="border-style: none; border-width: medium" align="center">
			<font face="Cambria">
			<b>Distinction</b></font></td>
			<td style="border-style: none; border-width: medium" align="center">
			<font face="Cambria">
			<b>I-Div</b></font></td>
			<td style="border-style: none; border-width: medium" align="center">
			<font face="Cambria">
			<b>II Div</b></font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080" align="center">
			<p align="left"><font face="Cambria">
			<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; III- Div</b></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080" align="center">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtClass1" id="txtClass1" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtStudent1" id="txtStudent1" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtSubject1" id="txtSubject1" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtDistinction1" id="txtDistinction1" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txt1Division1" id="txt1Division1" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txt2Division1" id="txt2Division1" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080" align="center"><b>
			<font face="Cambria">
			<input name="txt3Division1" id="txt3Division1" type=text style="float: left" class="text-box"/ ></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtClass2" id="txtClass2" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtStudent2" id="txtStudent2" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtSubject2" id="txtSubject2" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtDistinction2" id="txtDistinction2" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txt1Division2" id="txt1Division2" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txt2Division2" id="txt2Division2" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080" align="center"><b>
			<font face="Cambria">
			<input name="txt3Division2" id="txt3Division2" type=text style="float: left" class="text-box"/ ></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtClass3" id="txtClass3" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtStudent3" id="txtStudent3" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtSubject3" id="txtSubject3" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtDistinction3" id="txtDistinction3" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txt1Division3" id="txt1Division3" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txt2Division3" id="txt2Division3" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080" align="center"><b>
			<font face="Cambria">
			<input name="txt3Division3" id="txt3Division3" type=text style="float: left" class="text-box"/ ></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtClass4" id="txtClass4" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtStudent4" id="txtStudent4" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtSubject4" id="txtSubject4" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txtDistinction4" id="txtDistinction4" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txt1Division4" id="txt1Division4" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-style: none; border-width: medium" align="center"><b>
			<font face="Cambria">
			<input name="txt2Division4" id="txt2Division4" type=text style="float: left" class="text-box"/ ></font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080" align="center"><b>
			<font face="Cambria">
			<input name="txt3Division4" id="txt3Division4" type=text style="float: left" class="text-box"/ ></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-style: none; border-width: medium" align="center">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080" align="center">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Publications</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria"><textarea rows="4" name="txtPublication" id="txtPublication" cols="44" ></textarea></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Seminars/Workshops Organised</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtSeminar" id="txtSeminar" cols="44" ></textarea></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Knowledge Of Computers</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtComputerKnowledge" id="txtComputerKnowledge" cols="44" ></textarea></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Innovative Experience</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtInovativeExperience" id="txtInovativeExperience" cols="44" ></textarea></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria"><b>
			Contribution in the following</b></font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">School Functions/ Competitions</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtCompetiition" id="txtCompetiition" cols="44" ></textarea></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Sports</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtSport" id="txtSport" cols="44" ></textarea></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Cultural Activities</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtCulturaActivity" id="txtCulturaActivity" cols="44" ></textarea></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Literary Activities</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtLiteraryActivity" id="txtLiteraryActivity" cols="44" ></textarea></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Community Service</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtCommunityService" id="txtCommunityService" cols="44" ></textarea></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Adventure and Excursions</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtAdventure" id="txtAdventure" cols="44" ></textarea></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Any 
			Special Responsibility in the School</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtSpecialResponsibility" id="txtSpecialResponsibility" cols="44" ></textarea></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Major shows/ Exhibitions held</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtExhibition" id="txtExhibition" cols="44" ></textarea></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Whether a Member of any&nbsp; Organisation/ Association</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtAssociation" id="txtAssociation" cols="44" ></textarea></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Awards/Scholarships/Honours Received</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtAward" id="txtAward" cols="44" ></textarea></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Experience in School Management under the following heads :-</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">a. 
			Accounts</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080"><b>
			<font face="Cambria">
			<input name="txtAccount" id="txtAccount" type=text style="float: left" class="text-box"/ ></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">b. 
			Estate</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080"><b>
			<font face="Cambria">
			<input name="txtEstate" id="txtEstate" type=text  style="float: left" class="text-box"/ ></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">c. 
			Hostel</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080"><b>
			<font face="Cambria">
			<input name="txtHostel" id="txtHostel" type=text  style="float: left" class="text-box"/ ></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">d. 
			Transport</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080"><b>
			<font face="Cambria">
			<input name="txtTransport" id="txtTransport" type=text style="float: left" class="text-box"/ ></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">e. 
			Any Other</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080"><b>
			<font face="Cambria">
			<input name="txtAnyOther" id="txtAnyOther" type=text style="float: left" class="text-box"/ ></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Names of books recently read&nbsp;</font><p>
			<font face="Cambria">Related to your subject</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtBookRead" id="txtBookRead" cols="44" ></textarea></font></td>
		</tr>
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<font face="Cambria">Suggested for Library</font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">
			<font face="Cambria">
			<textarea rows="4" name="txtLibrarySuggestion" id="txtLibrarySuggestion" cols="44" ></textarea></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: none; border-width: medium" colspan="6">
			<p align="center">
			<font face="Cambria">
			<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" style="font-weight: 700" class="text-box"></font></td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom: medium none #808080">&nbsp;</td>
		</tr>
		
		
</table>	
		</div>
		<font face="Cambria">
		</form>

</font>

</div>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a>
<br>
<br>
<br>

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


</font>


</body>

</html>