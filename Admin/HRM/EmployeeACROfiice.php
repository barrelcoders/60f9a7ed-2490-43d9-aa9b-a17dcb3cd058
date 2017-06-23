<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
	include '../Header/Header3.php';

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



</script>



<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>ACR</title>
	<link rel="stylesheet" type="text/css" href="../tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="../tcal.js"></script>

</head>

<body>
<div id="MasterDiv">
<div align="center">
<table width="100%">
<tr>
<td>
<h1 align="center"><b><font face="cambria">
<img src="<?php echo $SchoolLogo; ?>" height="100px" width="400px"></font></b></h1>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b><?php echo $SchoolAddress; ?></b></font>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b></font>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b></font>
</td>
</tr>
<tr>
<td align="center">
&nbsp;</td>
</tr>
</table>
<table id="table_10" style="width: 100%" cellspacing="0" cellpadding="0" class="style15">
	<tr>
		<td class="style16">
<p  style="height: 12px" align="center">
<strong><font face="Cambria" style="font-size: 14pt">Annual Confidential Report</font></strong></p>
<p  style="height: 12px" align="left" class="style25">&nbsp;</p>
</td>
</tr>
<tr>
		<td class="style16">
<p  style="height: 12px" align="center">
<strong><font face="Cambria" style="font-size: 14pt">To be filled by the Office</font></strong></p>
<p  style="height: 12px" align="left" class="style25">&nbsp;</p>
</td>
</tr>
		</table>
		<table class="name" width="100%" cellpadding="0" style="border-collapse: collapse" border="1">
 <tr id="trWait" style="display: none;">
		  <td align="center" style="border-style: solid; border-width: 1px" colspan="8">&nbsp;</td>
 </tr>
 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146">
			<p><b><font face="Cambria">Emp No.</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146"><font face="Cambria">
			<input name="txtEmpNo" id="txtEmpNo" onkeyup="javascript:sname();" style="float: left" value="" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146">
			<p><b><span class="style4">Emp</span><font face="Cambria"> Name</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtEmpName" id="txtEmpName" style="float: left"/ value="" class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147">
			<font face="Cambria"><b>Emp Department</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtEmpType" id="txtEmpType" style="float: left"/ value="" class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<p><b>Emp Designation</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtDesig" id="txtMobile" style="float: left"/ value="" class="text-box"></font></td>
		  
		
 </tr>
</table>
		
<table id="Table1" style="border-style:solid; border-width:1px; " style="border-style: solid; border-width: 1px" width="100%" cellpadding="0">
			<p align="left">&nbsp;<tr>
				<td align="center" style="border-style: solid; border-width: 1px" width="167">
			<b><font face="Cambria">Examination</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167"><b><font face="Cambria">Board</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			Division/CGPA/%</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167"><b><font face="Cambria">Year Of Passing</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2"><b><font face="Cambria">Subjects</font></b></td>
		  
 </tr>
 
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			
<b>

			<font face="Cambria">
			<input name="txtExamination0" id="txtExamination0"  style="float: left"/class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<input name="txtBoard0" id="txtBoard0" style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			
<b>

			<font face="Cambria">
			<input name="txtDivision0" id="txtDivision0" style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<input name="txtYear0" id="txtYear0" type=date style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2"><b><font face="Cambria">
			<input name="txtSubjects0" id="txtSubjects0" style="float: left" class="text-box"/></font></td>
		  	</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  	</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			
<b>

			<font face="Cambria">
			<input name="txtExamination1" id="txtExamination1"  style="float: left"/class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<input name="txtBoard1" id="txtBoard1" style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			
<b>

			<font face="Cambria">
			<input name="txtDivision1" id="txtDivision1" style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<input name="txtYear1" id="txtYear1" type=date style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2"><b><font face="Cambria">
			<input name="txtSubjects1" id="txtSubjects1" style="float: left" class="text-box"/></font></td>
		  	</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  	</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			
<b>

			<font face="Cambria">
			<input name="txtExamination2" id="txtExamination2"  style="float: left"/class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<input name="txtBoard2" id="txtBoard2" style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			
<b>

			<font face="Cambria">
			<input name="txtDivision2" id="txtDivision2" style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<input name="txtYear2" id="txtYear2" type=date style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2"><b><font face="Cambria">
			<input name="txtSubjects2" id="txtSubjects2" style="float: left" class="text-box"/></font></td>
		  	</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  	</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			
<b>

			<font face="Cambria">
			<input name="txtExamination3" id="txtExamination3"  style="float: left"/class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<input name="txtBoard3" id="txtBoard3" style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			
<b>

			<font face="Cambria">
			<input name="txtDivision3" id="txtDivision3" style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<input name="txtYear3" id="txtYear3" type=date style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2"><b><font face="Cambria">
			<input name="txtSubjects3" id="txtSubjects3" style="float: left" class="text-box"/></font></td>
		  	</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  
 </tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			<p>

<b>

			<font face="Cambria">
			<input name="txtExamination" id="txtExamination"  style="float: left"/class="text-box"></font></td>
		  </td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<input name="txtBoard" id="txtBoard" style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			<p>

<b>

			<font face="Cambria">
			<input name="txtDivision" id="txtDivision" style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<input name="txtYear" id="txtYear" type=date style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2"><b><font face="Cambria">
			<input name="txtSubjects" id="txtSubjects" style="float: left" class="text-box"/></font></td>
		  
 </tr>
 
 
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="801" colspan="6">
			&nbsp;</td>
		  
 </tr>
 
 
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="801" colspan="6">
			&nbsp;</td>
		  
 </tr>
 
 
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			Date Of Appointment</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

Date Of Confirmation</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  
 </tr>
 
 
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  
 </tr>
 
 
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			Pay Scale</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

Basic Salary</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  
 </tr>
 
 
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  
 			</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="801" colspan="6">
			&nbsp;</td>
		  	</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="801" colspan="6">
			&nbsp;</td>
		  	</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="334" colspan="2">
			Leave Record : Leaves availed during the year</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">















		<font face="Cambria">
				<select name="cboTransport" id="cboTransport" class="text-box" size="1" >
		<option value="Good">Good</option>
		<option value="Bad">Bad</option>
		<option value="Poor">Poor</option>

		</select></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  
 			</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  
 			</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			Casual Leave</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

Earned Leave</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			HPL</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

HPLM</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="67">
			Maternity/Paternity Leave</td>
		  
		  <td align="center" style="border-style: solid; border-width: 1px" width="66">
			Total Absence</td>
		  
 			</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="67">&nbsp;</td>
		  
		  <td align="center" style="border-style: solid; border-width: 1px" width="66">&nbsp;</td>
		  
 			</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  
 			</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="801" colspan="6">
			&nbsp;</td>
		  
 			</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="801" colspan="6">
			&nbsp;</td>
		  
 			</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="334" colspan="2">
			Jobs of Special Responsibilities</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  
 			</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="801" colspan="6">
			&nbsp;</td>
		  
 			</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="334" colspan="2">
			Foreign Assignments (if any)</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			














		<font face="Cambria">
				<select name="cboTransport0" id="cboTransport0" class="text-box" size="1" >
		<option value="Yes">Yes</option>
		<option value="No">No</option>
		

		</select></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  
 			</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  
 			</tr>
			<tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133" colspan="2">&nbsp;</td>
		  
 </tr>
 
 
</table>


</div>

</div>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
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


</body>

</html>