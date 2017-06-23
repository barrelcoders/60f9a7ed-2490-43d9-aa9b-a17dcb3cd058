<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
	include '../Header/Header3.php';
     $EmployeeId=$_SESSION['userid'];
?>

<?php
$EmpId=$_REQUEST["txtEmpId"];
//echo $EmpId;
//exit();
$rsEmpDetail=mysql_query("SELECT `srno`, `EmpId`, `EmpName`, `EmpFatherName`, `DOB`, `Designation`, `smobile`, `semail`, `Address`, `PayScale`, `Upgradation`, `Class1`, `Student1`, `Subject1`, `Distinction1`, `1Division1`, `2Division1`, `3Division1`, `Class2`, `Student2`, `Subject2`, `Distinction2`, `1Division2`, `2Division2`, `3Division2`, `Class3`, `Student3`, `Subject3`, `Distinction3`, `1Division3`, `2Division3`, `3Division3`, `Class4`, `Student4`, `Subject4`, `Distinction4`, `1Division4`, `2Division4`, `3Division4`, `Publication`, `Seminar`, `ComputerKnowledge`, `Innovative`, `Competition`, `Sport`, `CulturalActivity`, `LiteraryActivity`, `Adventure`, `SpecialResponsibility`, `Exhibition`, `Association`, `Award`, `Account`, `Estate`, `Hostel`, `Transport`, `AnyOther`, `BookRead`, `LibrarySuggestion` FROM `Employee_ACR_SelfAppraisal` WHERE  `EmpId`='$EmpId'");
//echo "SELECT `srno`, `EmpId`, `EmpName`, `EmpFatherName`, `DOB`, `Designation`, `smobile`, `semail`, `Address`, `PayScale`, `Upgradation`, `Class1`, `Student1`, `Subject1`, `Distinction1`, `1Division1`, `2Division1`, `3Division1`, `Class2`, `Student2`, `Subject2`, `Distinction2`, `1Division2`, `2Division2`, `3Division2`, `Class3`, `Student3`, `Subject3`, `Distinction3`, `1Division3`, `2Division3`, `3Division3`, `Class4`, `Student4`, `Subject4`, `Distinction4`, `1Division4`, `2Division4`, `3Division4`, `Publication`, `Seminar`, `ComputerKnowledge`, `Innovative`, `Competition`, `Sport`, `CulturalActivity`, `LiteraryActivity`, `Adventure`, `SpecialResponsibility`, `Exhibition`, `Association`, `Award`, `Account`, `Estate`, `Hostel`, `Transport`, `AnyOther`, `BookRead`, `LibrarySuggestion` FROM `Employee_ACR_SelfAppraisal` WHERE  `EmpId`='$EmpId'";
//exit();
$row=mysql_fetch_row($rsEmpDetail);
   {
			$srno=$row[0];
			$EmpId=$row[1];
			$EmpName=$row[2];
			$EmpFatherName=$row[3];
			$DOB=$row[4];
			$Designation=$row[5];
			$smobile=$row[6];
			$semail=$row[7];
			$Address=$row[8];
			$PayScale=$row[9];
			$Upgradation=$row[10];
			$Class1=$row[11];
			$Student1=$row[12];
			$Subject1=$row[13];
			$Distinction1=$row[14];
			$OneDivision1=$row[15];
			$TwoDivision1=$row[16];
			$ThreeDivision1=$row[17];
			$Class2=$row[18];
			$Student2=$row[19];
			$Subject2=$row[20];
			$Distinction2=$row[21];
			$OneDivision2=$row[22];
			$TwoDivision2=$row[23];
			$ThreeDivision2=$row[24];
			$Class3=$row[25];
			$Student3=$row[26];
			$Subject3=$row[27];
			$Distinction3=$row[28];
			$OneDivision3=$row[29];
			$TwoDivision3=$row[30];
			$ThreeDivision3=$row[31];
			$Class4=$row[32];
			$Student4=$row[33];
			$Subject4=$row[34];
			$Distinction4=$row[35];
			$OneDivision4=$row[36];
			$TwoDivision4=$row[37];
			$ThreeDivision4=$row[38];
			$Publication=$row[39];
			$Seminar=$row[40];
			$ComputerKnowledge=$row[41];
			$Innovative=$row[42];
			$Competition=$row[43];
			$Sport=$row[44];
			$CulturalActivity=$row[45];
			$LiteraryActivity=$row[46];
			$Adventure=$row[47];
			$SpecialResponsibility=$row[48];
			$Exhibition=$row[49];
			$Association=$row[50];
			$Award=$row[51];
			$Account=$row[52];
			$Estate=$row[53];
			$Hostel=$row[54];
			$Transport=$row[55];
			$AnyOther=$row[56];
			$BookRead=$row[57];
			$LibrarySuggestion=$row[58];
    
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
<div align="center">
<table width="80%">
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
</div>
<div align="center">
<table id="table_10" style="width: 80%" cellspacing="0" cellpadding="0" class="style15">
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
		<font face="Cambria" style="font-size: 14pt">Period of Review: 2015- 16 
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
</div>
<div align="center">
<table width="80%">
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
		<td align=left></td>
	</tr>
</table>

</div>
<div align="center">

<table border="1" width="80%" style="border-collapse: collapse">
	<form name="frmSelfAppraisal" id="frmSelfAppraisal" method="post" action="SubmitSelfAppraisal.php">
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			<font face="Cambria"><b><u>Basic Information</u></b></font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top: 1px solid #C0C0C0; border-bottom-style: solid; border-bottom-width: 1px" width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			<font face="Cambria">Name :</font></td>
			<td style="border-style: solid; border-width: 1px; " width="373"><b>
			<font face="Cambria">
			<?php echo $EmpName; ?> </font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			<font face="Cambria">Father's/ Husband's Name :</font></td>
			<td style="border-style: solid; border-width: 1px; " width="373"><b>
			<font face="Cambria">
			 <?php echo $FatherName; ?></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			<font face="Cambria">Date Of Birth :</font></td>
			<td style="border-style: solid; border-width: 1px; " width="373"><b>
			<font face="Cambria">
			<?php echo $DOB; ?></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			<font face="Cambria">Designation :</font></td>
			<td style="border-style: solid; border-width: 1px; " width="373"><b>
			<font face="Cambria">
			<?php echo $Designation ; ?></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			<font face="Cambria">Contact No :</font></td>
			<td style="border-style: solid; border-width: 1px; " width="373"><b>
			<font face="Cambria">
			<?php echo $smobile; ?></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			<font face="Cambria">Email Id :</font></td>
			<td style="border-style: solid; border-width: 1px; " width="373"><b>
			<font face="Cambria">
			<?php echo $semail; ?></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			<font face="Cambria">Residential Address :</font></td>
			<td style="border-style: solid; border-width: 1px; " width="373"><b>
			<font face="Cambria">
			<?php echo $Address; ?></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			<font face="Cambria">Present Pay Scale &amp; Grade :</font></td>
			<td style="border-style: solid; border-width: 1px; " width="373"><b>
			<font face="Cambria">
			<?php echo $PayScale; ?></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			<font face="Cambria">Date of Last Up gradation /Promotion :</font></td>
			<td style="border-style: solid; border-width: 1px; " width="373"><b>
			<font face="Cambria">
			<?php echo $Upgradation;?></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " height="26">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373" height="26">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; ">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; ">
			<font face="Cambria"><u>Personal Particulars</u></font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; ">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			</td>
		</tr>
		</table>
</div>
<div align="center">
<table border="1" width="80%" style="border-collapse: collapse">
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6"><b>
			<font face="Cambria">Result of Classes taught during the academic 
			session</font></b></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<b><font face="Cambria">2015-16</font></b></td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria">
			<b>Class</b></font></td>
			<td style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" align="center">
			<font face="Cambria">
			<b>No. of Students</b></font></td>
			<td style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" align="center">
			<font face="Cambria">
			<b>Subjects Taught</b></font></td>
			<td style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" align="center">
			<font face="Cambria">
			<b>Distinction</b></font></td>
			<td style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" align="center">
			<font face="Cambria">
			<b>I-Div</b></font></td>
			<td style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" align="center">
			<font face="Cambria">
			<b>II Div</b></font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " align="center" width="373">
			<p align="left"><font face="Cambria">
			<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; III- Div</b></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " align="center" width="373">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Class1;?>&nbsp;</b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Student1;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Subject1;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Distinction1;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $OneDivision1;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $TwoDivision1;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $ThreeDivision1;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " align="center" width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Class2;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Student2;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Subject2;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Distinction2;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $OneDivision2;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $TwoDivision2;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $ThreeDivision2;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " align="center" width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Class3;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Student3;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Subject3;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Distinction3;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $OneDivision3;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $TwoDivision3;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $ThreeDivision3;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " align="center" width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Class4;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Student4;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Subject4;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $Distinction4;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $OneDivision4;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $TwoDivision4;?></b></font></td>
			<td style="border-style: solid; border-width: 1px; " align="center">
			<font face="Cambria"><b><?php echo $ThreeDivision4;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px; " align="center">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " align="center" width="373">&nbsp;</td>
		</tr>
		
		</table>
</div>
<div align="center">
<table border="1" width="80%" style="border-collapse: collapse">
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Publications</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $Publication;?></b></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Seminars/Workshops Organised</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $Seminar;?></b></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Knowledge Of Computers</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $ComputerKnowledge;?></b></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Innovative Experience</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $Innovative;?></b></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria"><b>
			Contribution in the following</b></font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">School Functions/ Competitions</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $Competition;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Sports</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $Sport;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Cultural Activities</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $CulturalActivity;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Literary Activities</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $LiteraryActivity;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Community Service</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $Division4;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Adventure and Excursions</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $Adventure;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Any 
			Special Responsibility in the School</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $SpecialResponsibility;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Major shows/ Exhibitions held</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $Exhibition;?></b></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Whether a Member of any&nbsp; Organisation/ Association</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $Association;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Awards/Scholarships/Honours Received</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $Award;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Experience in School Management under the following heads :-</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">a. 
			Accounts</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b><?php echo $Account	;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">b. 
			Estate</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b><?php echo $Estate;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">c. 
			Hostel</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b><?php echo $Hostel;?></b></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">d. 
			Transport</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b><?php echo $Transport;?></b></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">e. 
			Any Other</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b><?php echo $AnyOther;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Names of books recently read&nbsp;</font><p>
			<font face="Cambria">Related to your subject</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $BookRead;?></b></font></td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			&nbsp;</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<font face="Cambria">Suggested for Library</font></td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">
			<font face="Cambria"><b>&nbsp;<?php echo $LibrarySuggestion;?></b></font></td>
		</tr>
		
		
		<tr>
			<td style="border-style: solid; border-width: 1px; " colspan="6">
			<p align="center">
			&nbsp;</td>
			<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom: 1px solid #808080; " width="373">&nbsp;</td>
		</tr>
		
		
</table>	
<font face="Cambria">	
<br>
<br>
<br>
<br>
</font>
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=2515 colspan="12" >
		<p style="text-align: center"><font face="Cambria"><b>Educational Details</b></font></td>
		
   	</tr>
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Examination</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Board</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Division/CGPA</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">Year Of Passing </font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>



		<b><font face="Cambria">Entry Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>

<b>

		<font face="Cambria">Subjects&nbsp;</font></td>

		<td height="22" align="center" bgcolor="#95C23D" width=65>

<b>

		<font face="Cambria">Remarks&nbsp;</font></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_Education where `EmpID`='$EmpId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Examination"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Board"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Division"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Year"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateOfEntry"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Subjects"];?></font></td>
   <td align="center"><font face="Cambria"><?php echo $rs["Remarks"];?></font></td>
	

</tr>
<?php   	 
}
?>
</table>
<font face="Cambria">
<br>
<br>
<br>
</font>
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=2515 colspan="12" style="text-align: center" >
		<font face="Cambria">
		<b>Experience Details</b></font></td>
		
   	</tr>
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Organization Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Period From</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Period To</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">Class Taught </font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>

<b>

		<font face="Cambria">Subjects Taught</font></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>

<b>

		<font face="Cambria">Date Of Entry&nbsp;</font></td>

		<td height="22" align="center" bgcolor="#95C23D" width=65>

<b>

		<font face="Cambria">Remarks&nbsp;</font></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_Experiecnce  where `EmpID`='$EmpId'");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["NameOfInstitution"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["PeriodFrom"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["PeriodTo"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["ClassTaught"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["SubjectsTaught"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateOfEntry"];?></font></td>
   <td align="center"><font face="Cambria"><?php echo $rs["Remarks"];?></font></td>
	

</tr>
<?php   	 
}
?>
</table>
<font face="Cambria">
<br>
<br>
<br>
</font>
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=2415 colspan="11" >
		<p style="text-align: center"><font face="Cambria"><b>Training Details</b></font></td>
		
   	</tr>
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">&nbsp;Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Training Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Topic</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Venue</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Training Duration</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>
		<font face="Cambria"><b>
		Organization Name</b></font></td>
		
		<td height="22" align="center" bgcolor="#95C23D" width=65>
		<font face="Cambria"><b>Entry Date</b></font></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_TrainingDetails where `EmpID`='$EmpId'");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["TrainingDate"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Topic"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Venue"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Duration"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["NameOfInstitution"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateOfEntry"];?></font></td>
	

</tr>
<?php   	 
}
?>
</table>
		</div>
		
		
		<p align="center">
<font face="Cambria"><br>

		&nbsp;<a href='EmployeeACRHODTeaching.php?txtEmpId=<?php echo $EmpId;?>' target='_blank'><strong><input name="BtnSubmit" size="500" type=button value="Proceed to Fill HOD Assessment "  style="font-weight: 700"></strong></a></font></div>
		

</body>

</html>