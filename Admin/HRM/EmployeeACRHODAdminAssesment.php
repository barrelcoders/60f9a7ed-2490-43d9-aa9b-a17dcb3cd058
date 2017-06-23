<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
	include '../Header/Header3.php';

?>
<?php
$EmployeeId=$_SESSION['userid'];


?>

<script language="javascript">

function Validate()
{
    if(document.getElementById("txtIntelligence").value.trim()=="")
	{
		alert ("Please fill intelligence Remarks !");
		return;
	}
	if(document.getElementById("txtInitiative").value.trim()=="")
	{
		alert ("Please fill Initiative Remarks !");
		return;
	}
if(document.getElementById("txtDevotion").value.trim()=="")
	{
		alert ("Please fill Duty Devotion Remarks !");
		return;
	}
if(document.getElementById("txtSkillEmployed").value.trim()=="")
	{
		alert ("Please fill Employee Skill Remarks !");
		return;
	}
if(document.getElementById("txtDutyRecord").value.trim()=="")
	{
		alert ("Please fill Duty Record Maintainence Remarks !");
		return;
	}
if(document.getElementById("txtDiscipline").value.trim()=="")
	{
		alert ("Please fill Discipline  Remarks !");
		return;
	}
if(document.getElementById("txtRelation").value.trim()=="")
	{
		alert ("Please fill Employee Relation Remarks !");
		return;
	}
if(document.getElementById("txtPunctuality").value.trim()=="")
	{
		alert ("Please fill Punctuality Remarks !");
		return;
	}
if(document.getElementById("txtOutstandingWork").value.trim()=="")
	{
		alert ("Please fill Outstanding Work Remarks !");
		return;
	}
if(document.getElementById("txtSpecialWork").value.trim()=="")
	{
		alert ("Please fill Special Work Remarks !");
		return;
	}
if(document.getElementById("txtQualities").value.trim()=="")
	{
		alert ("Please fill Qualities  Remarks !");
		return;
	}
if(document.getElementById("txtConduct").value.trim()=="")
	{
		alert ("Please fill Employee Conduct Remarks !");
		return;
	}

	document.getElementById("frmEmployeeACR").submit();
}




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
<table width="90%">
<tr>
<td>
<h1 align="center"><b><font face="Cambria">
<img src="<?php echo $SchoolLogo; ?>" height="100px" width="400px"></font></b></h1>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b><?php echo $SchoolAddress; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
&nbsp;</td>
</tr>
</table>
<table style="width: 90%" cellspacing="0" cellpadding="0" class="style15">
	<tr>
		<td class="style16">
<p  style="height: 12px" align="center">
<strong><font face="Cambria" style="font-size: 14pt">Annual Confidential Report</font></strong></p>
<p  style="height: 12px" align="center">
&nbsp;</p>
</td>
</tr>
<tr>
		<td class="style16">
<p  style="height: 12px" align="center">
<strong><font face="Cambria" style="font-size: 14pt">To be filled by the Head of 
Department</font></strong></p>
<p  style="height: 12px" align="center">
&nbsp;</p>
<p  style="height: 12px" align="left" class="style25">&nbsp;</p>
</td>
</tr>
		</table>
		
		<form name="frmEmployeeACR" id="frmEmployeeACR" method="post" action="SubmitACRHodAssesmentAdmin.php" enctype="multipart/form-data">


		<table class="name" width="100%" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px; border-top-width:0px" border="1">
 <tr id="trWait" style="display: none;">
		  <td align="center" style="border-left:medium none #C0C0C0; border-right:medium none #808080; border-top:medium none #C0C0C0; border-bottom-style:none; border-bottom-width:medium" colspan="8">&nbsp;</td>
 </tr>
 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px; " width="146">
			<p><b><font face="Cambria">Emp Id.</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px; " width="146">
			<font face="Cambria">
			<input name="txtEmpNo" id="txtEmpNo" onkeyup="javascript:sname();" style="float: left" value="" class="text-box" size="9"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; " width="146">
			<p><b><font face="Cambria"><span class="style4">Employee</span> Name</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px; " width="147">
			<font face="Cambria">
			<input name="txtEmpName" id="txtEmpName" style="float: left"/ value="" class="text-box" size="42"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; " width="147">
			<font face="Cambria"><b>Employee Department</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px; " width="147">
			<font face="Cambria">
			<input name="txtEmpType" id="txtEmpType" style="float: left"/ value="" class="text-box" size="36"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; " width="147"><font face="Cambria">
			<p><b>Emp Designation</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px; " width="147">
			<font face="Cambria">
			<input name="txtDesig" id="txtMobile" style="float: left"/ value="" class="text-box" size="29"></font></td>
		  
		
 </tr>
</table>
<table id="Table1" style="border-style:solid; border-width:0px; border-collapse:collapse" style="border-style: solid; border-width: 1px" width="1327" cellpadding="0">
			<p align="left">&nbsp;<tr>
				<td align="center" style="border-left:1px none #C0C0C0; border-right:1px none #808080; border-top:1px none #C0C0C0; border-bottom-style:none; border-bottom-width:medium" width="802" colspan="4">
			&nbsp;</td>
		  
 </tr>
 
			<tr>
				<td align="center" style="border-left:1px none #C0C0C0; border-right:1px none #808080; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="802" colspan="4">
			<p align="left"><font face="Cambria">1. Observations on</font></td>
		  
 </tr>
 
			<tr>
				<td align="left" style="border-left:1px none #C0C0C0; border-right:1px none #808080; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="669" colspan="4">
			&nbsp;</td>
		  	</tr>
			<tr>
				<td align="left" style="border-style: solid; border-width: 1px; " width="331">
			<font face="Cambria">a. Intelligence</font></td>
				<td align="left" style="border-style: solid; border-width: 1px; " width="331">
			<font face="Cambria">b. Initiative</font></td>
		  <td align="left" style="border-style: solid; border-width: 1px; " width="331">

			<font face="Cambria">c. Devotion to duty</font></td>
		  <td align="left" style="border-style: solid; border-width: 1px; " width="332">

			<font face="Cambria">d. Skill in&nbsp; the work for&nbsp; which employed</font></td>
		  	</tr>
			<tr>
				<td align="center" style="border-style: solid; border-width: 1px; " width="331">
<font face="Cambria">
<textarea rows="2" name="txtIntelligence" id="txtIntelligence" cols="20"  class="text-box-address"></textarea></font></td>
				<td align="center" style="border-style: solid; border-width: 1px; " width="331">

<font face="Cambria">

<textarea rows="2" name="txtInitiative" id="txtInitiative" cols="20"  class="text-box-address"></textarea></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; " width="331">

<font face="Cambria">

<textarea rows="2" name="txtDevotion" id="txtDevotion" cols="20"  class="text-box-address"></textarea></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; " width="332">

<font face="Cambria">

<textarea rows="2" name="txtSkillEmployed" id="txtSkillEmployed" cols="20"  class="text-box-address"></textarea></font></td>
		  	</tr>
			<tr>
				<td align="left" style="border-style: solid; border-width: 1px; " width="1325" colspan="4">
			&nbsp;</td>
		  	</tr>
			<tr>
				<td align="left" style="border-style: solid; border-width: 1px; " width="331">
			<font face="Cambria">e. Maintains all official records neatly&nbsp; 
			and keeps them upto date</font></td>
				<td align="left" style="border-style: solid; border-width: 1px; " width="331">
			<font face="Cambria">f.&nbsp; Discipline</font></td>
		  <td align="left" style="border-style: solid; border-width: 1px; " width="331">

<form method="POST" action="--WEBBOT-SELF--">

</form>
			<font face="Cambria">g. Relation with other staff members</font></td>
		  <td align="left" style="border-style: solid; border-width: 1px; " width="332">

			<font face="Cambria">h. Punctuality in attendance.</font></td>
		  	</tr>
			<tr>
				<td align="center" style="border-style: solid; border-width: 1px; " width="331">
			
<font face="Cambria">

<textarea rows="2" name="txtDutyRecord" id="txtDutyRecord" cols="20"  class="text-box-address"></textarea></font></td>
				<td align="center" style="border-style: solid; border-width: 1px; " width="331">

<font face="Cambria">

<textarea rows="2" name="txtDiscipline" id="txtDiscipline" cols="20"  class="text-box-address"></textarea></font></td>
				<td align="center" style="border-style: solid; border-width: 1px; " width="331">

<font face="Cambria">

<textarea rows="2" name="txtRelation" id="txtRelation" cols="20"  class="text-box-address"></textarea></font></td>
				<td align="center" style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px" width="332">

<font face="Cambria">

<textarea rows="2" name="txtPunctuality" id="txtPunctuality" cols="20"  class="text-box-address"></textarea></font></td>
		  	</tr>
			<tr>
				<td align="left" style="border-style: solid; border-width: 1px; " width="669" colspan="4">
			&nbsp;</td>
		  	</tr>
			<tr>
				<td align="left" style="border-style: solid; border-width: 1px; " width="331">
			<p>
			<font face="Cambria">i. Whether responsible for any outstanding work 
			during the period under review</font></td>
				<td align="left" style="border-style: solid; border-width: 1px; " width="331">
			<p align="center">

<font face="Cambria">

<textarea rows="2" name="txtOutstandingWork" id="txtOutstandingWork" cols="20"  class="text-box-address"></textarea></font></td>
				<td align="left" style="border-style: solid; border-width: 1px; " width="334" colspan="2">
			&nbsp;</td>
		  	</tr>
			<tr>
				<td align="left" style="border-left:1px none #C0C0C0; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="334" colspan="2">
			&nbsp;</td>
		  <td align="left" style="border-right:1px none #808080; border-left-style:none; border-left-width:medium; border-bottom-style:none; border-bottom-width:medium" width="335" colspan="2">

&nbsp;</td>
		 
 			</tr>
			<tr>
				<td align="left" style="border-left:1px none #C0C0C0; border-right:1px none #808080; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="802" colspan="4" height="22">
			&nbsp;</td>
		  	</tr>
			<tr>
				<td align="left" style="border-left:1px none #C0C0C0; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="335" colspan="2">
			<p align="justify">
			<font face="Cambria">2.</font><span style="font-size: 12.0pt; font-family: Cambria">Whether he/she has been reprimanded for&nbsp; any indifferent work or for other cases during the period under review</span></td>
				<td align="left" style="border-right:1px none #808080; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="334" colspan="2">

<font face="Cambria">

<textarea rows="2" name="txtSpecialWork" id="txtSpecialWork" cols="20"  class="text-box-address"></textarea></font></td>

		  
 			</tr>
			<tr>
				<td align="left" style="border-left:1px none #C0C0C0; border-right:1px none #808080; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="802" colspan="4">
			&nbsp;</td>
		  	</tr>
			<tr>
				<td align="left" style="border-left:1px none #C0C0C0; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="334" colspan="2">
			<span style="font-size: 12.0pt; font-family: Cambria">
			3.General assessment of good and bad qualities</span></td>
		  <td align="left" style="border-right:1px none #808080; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="335" colspan="2">

<font face="Cambria">

<textarea rows="2" name="txtQualities" id="txtQualities" cols="20"  class="text-box-address"></textarea></font></td>
		  
 			</tr>
			<tr>
				<td align="left" style="border-left:1px none #C0C0C0; border-right:1px none #808080; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="669" colspan="4">
			&nbsp;</td>
		  
 			</tr>
			<tr>
				<td align="left" style="border-left:1px none #C0C0C0; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="334" colspan="2">
			<font face="Cambria">4.</font><span style="font-family:&quot;Cambria&quot;">Conduct 
			and Integrity</span></td>
		  <td align="left" style="border-right:1px none #808080; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="335" colspan="2">

<font face="Cambria">

<textarea rows="2" name="txtConduct" id="txtConduct" cols="20"  class="text-box-address"></textarea></font></td>
		  
 			</tr>
			<tr>
				<td align="left" style="border-left:1px none #C0C0C0; border-right:1px none #808080; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="802" colspan="4">
			&nbsp;</td>
		  	</tr>
			<tr>
				<td align="left" style="border-left:1px none #C0C0C0; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="334" colspan="2">
			<font face="Cambria">5.</font><span style="font-size: 12.0pt; font-family: Cambria">Any 
			other remarks</span></td>
		  <td align="left" style="border-right:1px none #808080; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="335" colspan="2">

<font face="Cambria">

<textarea rows="2" name="txtRemarks" id="txtRemarks" cols="20" class="text-box-address"></textarea></font></td>
		  
 			</tr>
			<tr>
				<td align="left" style="border-left:1px none #C0C0C0; border-right:1px none #808080; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="669" colspan="4">
			&nbsp;</td>
		  
 			</tr>
 
 
			<tr>
				<td  style="border-left:1px none #C0C0C0; border-right:1px none #808080; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="669" colspan="4">
			<p align="center">
			<font face="Cambria">
			<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" style="font-weight: 700" class="text-box"></font></td>
		  
 			</tr>
 
 
			<tr>
				<td align="left" style="border-left:1px none #C0C0C0; border-right:1px none #808080; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="669" colspan="4">
			&nbsp;</td>
		  
 			</tr>
 
 
			<tr>
				<td align="left" style="border-left:1px none #C0C0C0; border-right:1px none #808080; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="669" colspan="4">
			&nbsp;</td>
		  
 			</tr>
 
 
			<tr>
 
			<td align="center" style="border-left:1px none #C0C0C0; border-right:1px none #808080; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" width="802" colspan="4">
			&nbsp;</td>
		  
 </tr>
 
 
			</table>


</div>

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