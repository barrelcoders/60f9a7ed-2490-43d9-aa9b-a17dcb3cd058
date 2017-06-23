<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php

   $sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   
   $sqlex = "SELECT distinct `examtype` FROM `exam_master`";
   $rsltex = mysql_query($sqlex, $Con);
   
if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
	$class = $_REQUEST["cboClass"];
	$SelectedClass = $_REQUEST["cboClass"];
	$SelectStudentName= $_REQUEST["txtStudentName"];
	$RollNo= $_REQUEST["txtRollNo"];
	$ssql="SELECT distinct `subject` FROM `subject_master` a  where  `class`='$class'";
	
	$rs= mysql_query($ssql);	
}   
   
?>   

<script language="javascript">
function ReloadWithSubject()
{
	document.getElementById("SubmitType").value="ReloadWithSubject";
	document.getElementById("frmClassWork").submit();
	
}

function Validate()
{
	
	if (document.getElementById("cboClass").value=="Select One")
	{
		alert("Please select Class !");
		return;
	}
	if (document.getElementById("txtRollNo").value=="")
	{
		alert("Please enter roll no !");
		return;
	}
	if (document.getElementById("txtStudentName").value=="")
	{
		alert("Please enter student name !");
		return;
	}
	if (document.getElementById("txtHeight").value=="")
	{
		alert("Please enter height !");
		return;
	}
	else
	{
		if (isNaN(document.getElementById("txtHeight").value)==true)
		{
			alert ("Please enter height with numeric value");
			return;
		}
	}
	
	if (document.getElementById("txtWeight").value=="")
	{
		alert("Please enter weight !");
		return;
	}
	else
	{
		if (isNaN(document.getElementById("txtWeight").value)==true)
		{
			alert ("Please enter weight with numeric value");
			return;
		}
	}
	
	if (document.getElementById("txtBMI").value=="")
	{
		alert("Please enter BMI !");
		return;
	}
	else
	{
		if (isNaN(document.getElementById("txtBMI").value)==true)
		{
			alert ("Please enter BMI with numeric value");
			return;
		}
	}
	
	document.getElementById("frmClassWork").action="SubmitfrmHealthRecord.php";
	document.getElementById("frmClassWork").submit();
}	

function GetStudentName1()
{
try
		    {    
				// Firefox, Opera 8.0+, Safari    
				xmlHttp=new XMLHttpRequest();
			}
		  catch (e)
		    {    // Internet Explorer    
				try
			      {      
					xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				  }
			    catch (e)
			      {      
					  try
				        { 
							xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				      catch (e)
				        {        
							alert("Your browser does not support AJAX!");        
							return false;        
						}      
				  }    
			 } 
			 xmlHttp.onreadystatechange=function()
		      {
			      if(xmlHttp.readyState==4)
			        {
						var rows="";
			        	rows=new String(xmlHttp.responseText);
			        	document.getElementById("txtStudentName").value=rows;
			        	
			        	//ReloadWithSubject();
						//alert(rows);														
			        }
		      }
			
			var submiturl="GetStudentName.php?RollNo=" + document.getElementById("txtRollNo").value + "&Class=" + document.getElementById("cboClass").value;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);

}

</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload health record</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">
.style1 {
	border-color: #808080;
	border-width: 0px;
	border-collapse: collapse;
	}
.style2 {
	border-style: solid;
	border-width: 1px;
}
.style3 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
}
.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
}
.style5 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
}
.style6 {
	text-align: left;
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

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Cambria;
        font-weight:bold;
}
</style>
</head>

<body>

<p>&nbsp;</p>

<table style="width: 1121px" class="style1">
	
	<tr>
		<td class="style4" colspan="4">
		<p style="text-align: center"><font face="Cambria">Enter Health Record Details</font></td>		
		<td class="style4" colspan="4" width="50%">
		<p style="text-align: center"><font face="Cambria"><a href="PreviousHealthRecord.php">View Previous Uploaded Health Record Details</a></font></td>
	</tr>		</table>		
<table cellpadding="0" style="border-collapse: collapse" width="1120" border="1"><form name="frmClassWork" id="frmClassWork" method="post" action="frmReportCard.php">			
	<font face="Cambria">			<input type="hidden" name="totalSubject" id="totalSubject" value="<?php echo $Cnt; ?>">	<input type="hidden" name="SubmitType" id="SubmitType" value="">
	</font>
	<tr>
		<td class="style3" style="width: 318px; height: 29px; text-align:left">
		<font face="Cambria">Class: </font> </td>
		<td class="style2" style="width: 319px; height: 29px;" align="center">
		
			<font face="Cambria">
		
			<!--<select name="cboClass" id="cboClass" onchange="FillSubject();">-->
			<select name="cboClass" id="cboClass">
			<option selected="" value="Select One">Select One</option>
			<?php
				while($row = mysql_fetch_assoc($result))
   				{
   					$class=$row['class'];
			?>
			<option value="<?php echo $class; ?>" <?php if ($class==$SelectedClass) { echo "selected"; } ?> ><?php echo $class; ?></option>
			<?php
				}
			?>
			</select>
		</font>
		</td>
		<td class="style3" style="width: 319px; height: 29px; text-align:left">
		<font face="Cambria">Roll No:</font></td>
		<td class="style2" style="width: 788px; height: 29px" align="center">
		<font face="Cambria">
		<input name="txtRollNo" id="txtRollNo" type="text" onkeyup="GetStudentName1();" ></font></td>
	</tr>
	 
	<tr>
		<td class="style3" style="width: 318px; text-align:left">
		<font face="Cambria">Student Name:</font></td>
		<td class="style2" style="width: 319px" align="center">
		
			<font face="Cambria">
		
			<input name="txtStudentName" id="txtStudentName" type="text" style="width: 114; height:22"></font></td>
		<td class="style3" style="width: 319px; text-align:left">
		<font face="Cambria">Height</font></td>
		<td class="style2" style="width: 788px" align="center">
		<font face="Cambria">
		<input name="txtHeight" id="txtHeight" type="text"></font></td>
	</tr>
	
	<tr>
		<td class="style3" style="height: 25px; text-align:left">
		<font face="Cambria">Weight</font></td>
		<td class="style6" style="height: 25px; text-align:center">
		<font face="Cambria">
		<input name="txtWeight" id="txtWeight" type="text"></font></td>
		<td class="style3" style="height: 25px; text-align:left">
		<font face="Cambria">BMI</font></td>
		<td class="style6" style="height: 25px; text-align:center">
		<font face="Cambria">
		<input name="txtBMI" id="txtBMI" type="text"></font></td>
	</tr>		<tr>		<td class="style3" style="height: 25px">		
		<p style="text-align: left">		
		<font face="Cambria">Month</font></td>		<td class="style2" style="width: 319px">		
		<font face="Cambria">		<select name="cboMonth" id="cboMonth">		<option selected="" value="Select One">Select One</option>		<option value="Jan">January</option>		<option value="Feb">February</option>		<option value="Mar">March</option>		<option value="Apr">April</option>		<option value="May">May</option>		<option value="Jun">June</option>		<option value="Jul">July</option>		<option value="Aug">August</option>		<option value="Sep">September</option>		<option value="Oct">October</option>		<option value="Nov">November</option>		<option value="Dec">December</option>				</select></font></td>	</tr>
	<tr>
		<td class="style5" colspan="4">
		<font face="Cambria">
		<input name="Submit" type="button" value="Submit" onclick="Javascript:Validate();" style="font-weight: 700"></font></td>
	</tr>
	</form>
</table>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>

</html>