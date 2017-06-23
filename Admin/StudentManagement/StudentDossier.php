<?php
include '../../connection.php';
include '../Header/Header3.php';

?>
<?php
$EmployeeId=$_SESSION['userid'];
$currentdate=date("Y-m-d");

if($_POST["isSubmit"]=="Submit")
{
	
	$admission=$_POST["admissionno"];
	$StudentName=$_POST["name"];
	$Class=$_POST["class"];
	$FatherName=$_POST["sfather"];
	$RollNo=$_POST["rollno"];
	$MotherName=$_POST["smother"];
	$Session=$_POST["txtSession"];
    $Semester1=$_POST["CGPASem1"];
	$Semester2=$_POST["CGPASem2"];
	$OverallCGPA=$_POST["CGPAOverall"];
	$WorkHabbit=$_POST["WorkHabit"];
	$Attitude=$_POST["Attitude"];
	$CoCurricular=$_POST["CoCurricular"];
	$SpecialTalent=$_POST["SpecialTalent"];
	$LongLeave=$_POST["LongLeave"];
	$SpecialIncident=$_POST["SpecialIncident"];
	
	$rsCheck=mysql_query("select * from `StudentDossier` where `sadmisson`='$admission'");
	if(mysql_num_rows($rsCheck)>0)
	{
		mysql_query("update `StudentDossier` set `CGPASem1`='$Semester1',`CGPASem2`='$Semester2',`CGPAOverall`='$OverallCGPA',`ConceptWorkHabits`='$WorkHabbit',`AttitudeBehaviour`='$Attitude',`ExtraCurricular`='$CoCurricular',`SpecialTalent`='$SpecialTalent',`LongLeaveReason`='$LongLeave',`SpecialIncident`='$SpecialIncident',`EmpId`='$EmployeeId'  where `sadmisson`='$admission' and `FYear`='$Session'");
			
			
			echo "Record Updated Succussfully";
			}
	else
	{

	
	mysql_query("INSERT INTO `StudentDossier`(`sadmisson`, `sname`, `sclass`, `srollno`, `sfathername`, `smothername`, `FYear`, `CGPASem1`, `CGPASem2`, `CGPAOverall`, `ConceptWorkHabits`, `AttitudeBehaviour`, `ExtraCurricular`, `SpecialTalent`, `LongLeaveReason`, `SpecialIncident`, `EmpId`, `DateOfEntry`) VALUES('$admission','$StudentName','$Class','$RollNo','$FatherName','$MotherName','$Session','$Semester1','$Semester2','$OverallCGPA','$WorkHabbit','$Attitude','$CoCurricular','$SpecialTalent','$LongLeave','$SpecialIncident','$EmployeeId','$currentdate')");
	
	
		$Msg="Dossier submitted successfully!";
		   
	}
}
?>
	
		
	

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Student Dossier Entry</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
	


	<script type="text/javascript" src="tcal.js"></script>


<script language="javascript">




function sname()
{
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
			        	arr_row=rows.split("~");
			        	document.getElementById('name').value=arr_row[0];
						document.getElementById('clas').value=arr_row[1];       	 
						document.getElementById('roll').value=arr_row[2];
						document.getElementById('sfather').value=arr_row[3];
						document.getElementById('smother').value=arr_row[4];
						
						document.getElementById('CGPASem1').value=arr_row[5];       	 
						document.getElementById('CGPASem2').value=arr_row[6];
						document.getElementById('CGPAOverall').value=arr_row[7];
						document.getElementById('WorkHabit').value=arr_row[8];
						document.getElementById('Attitude').value=arr_row[9];
						document.getElementById('CoCurricular').value=arr_row[10];
						document.getElementById('SpecialTalent').value=arr_row[11];
						document.getElementById('LongLeave').value=arr_row[12];
						document.getElementById('SpecialIncident').value=arr_row[13];
						
			        }
		      }
			
			var submiturl="get_info3.php?c=" + document.getElementById('adm').value;
			itm.open("GET", submiturl,true);
			itm.send(null);
}


function srollno()
{
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
	
	var adm = document.getElementById('adm').value;

	var string = "?adm=" + adm;
	itm.open("GET","get_info.php"+string,true);
	itm.send(null);
	
	itm.onreadystatechange = function()
	{
		if(itm.readyState==4)
		{ 
			document.getElementById('roll').value=itm.responseText;
		}
	}
	
}


function sclass()
{
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
	
	var clas = document.getElementById('adm').value;

	var string = "?clas=" + clas;
	itm.open("GET","get_info.php"+string,true);
	itm.send(null);
	
	itm.onreadystatechange = function()
	{
		if(itm.readyState==4)
		{ 
			document.getElementById('clas').value=itm.responseText;
		}
	}
}

function sfather()
{
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
	
	var clas = document.getElementById('adm').value;

	var string = "?sfather=" + sfather;
	itm.open("GET","get_info.php"+string,true);
	itm.send(null);
	
	itm.onreadystatechange = function()
	{
		if(itm.readyState==4)
		{ 
			document.getElementById('sfather').value=itm.responseText;
		}
	}
}

function smother()
{
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
	
	var clas = document.getElementById('adm').value;

	var string = "?smother=" + smother;
	itm.open("GET","get_info.php"+string,true);
	itm.send(null);
	
	itm.onreadystatechange = function()
	{
		if(itm.readyState==4)
		{ 
			document.getElementById('smother').value=itm.responseText;
		}
	}
}






</script>

</head>

<body>
<p class="style1">



<strong><?php echo $Msg;?></strong>

</p>

<table width="100%" cellspacing="1" height="80" bordercolor="#000000" id="table1" class="auto-style19">

<tr>
<p>&nbsp;</p>
<p><b><font face="Cambria">Student Dossier Entry</font></b></p>
<hr>
<p>&nbsp;</p>
<table border="1" width="100%" style="border-collapse: collapse">
<form name="frmStudentDossier" id="frmStudentDossier" method="post" action="">

	<tr>
		<td><font face="Cambria">Student Adm. No</font></td>
		<td><font face="Cambria"><input  name="admissionno" id="adm" onkeyup="javascript:sname();" style="float: left" class="text-box" required="true" /></font></td>
		<td><font face="Cambria">Name</font></td>
		<td><font face="Cambria"><input type="text" name="name" id="name" size="20" class="text-box"></font></td>
	</tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td><font face="Cambria">Class</font></td>
		<td><font face="Cambria"><input type="text" name="class" id="clas" size="20" class="text-box"></font></td>
		<td><font face="Cambria">Father Name</font></td>
		<td><font face="Cambria"><input type="text" name="sfather" id="sfather"size="20" class="text-box"></font></td>
	</tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td><font face="Cambria">Roll No</font></td>
		<td><font face="Cambria"><input type="text" name="rollno" id="roll" size="20" class="text-box"></font></td>
		<td><font face="Cambria">Mother Name</font></td>
		<td><font face="Cambria"><input type="text" name="smother" id="smother" size="20" class="text-box"></font></td>
	</tr>
	<tr>
		<td rowspan="6"><font face="Cambria">Session</font></td>
		<td rowspan="6"><font face="Cambria">
		
		<font face="Cambria">
	 <select name="txtSession" id="txtSession" style="float: left; font-weight:700" class="text-box">
						<option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `financialyear` FROM `FYmaster`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select></font></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td><font face="Cambria">CGPA Sem 1</font></td>
		<td><font face="Cambria"><input type="text" name="CGPASem1" id="CGPASem1" size="20" class="text-box"></font></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td><font face="Cambria">CGPA Sem2</font></td>
		<td><font face="Cambria"><input type="text"name="CGPASem2" id="CGPASem2"size="20" class="text-box"></font></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td><font face="Cambria">CGPA Over All</font></td>
		<td><font face="Cambria"><input type="text" name="CGPAOverall" id="CGPAOverall" size="20" class="text-box"></font></td>
	</tr>
</table>
<p>&nbsp;</p>
<table border="1" width="100%" style="border-collapse: collapse">
	<tr>
		<td width="7%" align="center"><b><font face="Cambria">Sr No</font></b></td>
		<td align="center" width="45%"><b><font face="Cambria">Parameter</font></b></td>
		<td align="center" width="48%"><b><font face="Cambria">Value</font></b></td>
	</tr>
	<tr>
		<td width="7%" align="center"><b><font face="Cambria">1</font></b></td>
		<td width="45%"><b><font face="Cambria">Concepts / Work Habits</font></b></td>
		<td align="center" width="48%"><font face="Cambria"><textarea rows="4" name="WorkHabit" id="WorkHabit" cols="44" ></textarea> 
		</font> </td>
	</tr>
	<tr>
		<td width="7%" align="center">&nbsp;</td>
		<td width="45%">&nbsp;</td>
		<td align="center" width="48%">&nbsp;</td>
	</tr>
	<tr>
		<td width="7%" align="center"><b><font face="Cambria">2</font></b></td>
		<td width="45%"><b><font face="Cambria">Attitude / Behavior</font></b></td>
		<td align="center" width="48%"><font face="Cambria"><textarea rows="4" name="Attitude" id="Attitude" cols="44" ></textarea></font></td>
	</tr>
	<tr>
		<td width="7%" align="center">&nbsp;</td>
		<td width="45%">&nbsp;</td>
		<td align="center" width="48%">&nbsp;</td>
	</tr>
	<tr>
		<td width="7%" align="center"><b><font face="Cambria">3</font></b></td>
		<td width="45%"><b><font face="Cambria">Extra Curricular Activities</font></b></td>
		<td align="center" width="48%"><font face="Cambria"><textarea rows="4" name="CoCurricular" id="CoCurricular" cols="44" ></textarea></font></td>
	</tr>
	<tr>
		<td width="7%" align="center">&nbsp;</td>
		<td width="45%">&nbsp;</td>
		<td align="center" width="48%">&nbsp;</td>
	</tr>
	<tr>
		<td width="7%" align="center"><b><font face="Cambria">4</font></b></td>
		<td width="45%"><b><font face="Cambria">Special Talent</font></b></td>
		<td align="center" width="48%"><font face="Cambria"><textarea rows="4" name="SpecialTalent" id="SpecialTalent" cols="44" ></textarea></font></td>
	</tr>
	<tr>
		<td width="7%" align="center">&nbsp;</td>
		<td width="45%">&nbsp;</td>
		<td align="center" width="48%">&nbsp;</td>
	</tr>
	<tr>
		<td width="7%" align="center"><b><font face="Cambria">5</font></b></td>
		<td width="45%"><b><font face="Cambria">Record of long leave and reason</font></b></td>
		<td align="center" width="48%"><font face="Cambria"><textarea rows="4"  name="LongLeave" id="LongLeave"  cols="44" ></textarea></font></td>
	</tr>
	<tr>
		<td width="7%" align="center">&nbsp;</td>
		<td width="45%">&nbsp;</td>
		<td align="center" width="48%">&nbsp;</td>
	</tr>
	<tr>
		<td width="7%" align="center"><b><font face="Cambria">6</font></b></td>
		<td width="45%"><b><font face="Cambria">Any Special incident and measure 
		taken</font></b></td>
		<td align="center" width="48%"><font face="Cambria"><textarea rows="4" name="SpecialIncident" id="SpecialIncident" cols="44" ></textarea></font></td>
	</tr>
	<tr>
		<td align="center" colspan="3">
			&nbsp;</td>
	</tr>
	<tr>
		<td align="center" colspan="3">
			<p>

		<font face="Cambria">

		<input type="submit" value="Submit" name="isSubmit" style="font-weight: 700" class="text-box" ></font></p>
		
		</td>
	</tr>
</table>
<font face="Cambria">
</form>
</tr>

</table>

</font>
<?php include "footer.php";?>

<!--<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>-->

</body>



</html>
