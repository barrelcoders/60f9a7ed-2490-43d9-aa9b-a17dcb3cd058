<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php
   $sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   
   if($_REQUEST["SubmitType"] == "yes")
   {
   		$Class=$_REQUEST["cboClass"];
   		$RollNo=str_replace("﻿","",$_REQUEST["cboRollNo"]);
   		$RollNo=str_replace(" ","",$RollNo);
   		$RollNo=(int)$RollNo;
   		$StudentName=$_REQUEST["txtStudentName"];
   		
   		$sstr1="";
   		if ($RollNo != "All")
   		{
   			$sstr1=" and `srollno`='$RollNo'";
   		}
   		
   		$sql = "select `sclass`,`srollno`,`sname` from `student_master` where `sclass`='$Class'" . $sstr1;   		
   		
   		$rsStudents = mysql_query($sql, $Con);
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
	
	
	document.getElementById("frmClassWork").action="frmFetchCCEStatus.php";
	
	document.getElementById("frmClassWork").submit();
}
function FillSubject()
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
			        	removeAllOptions(document.frmClassWork.cboSubject);
			        	//document.getElementById("txtName").value="";
			        	addOption(document.frmClassWork.cboSubject,"Select One","Select One")
			        	arr_row=rows.split(",");
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmClassWork.cboSubject,arr_row[row_count],arr_row[row_count])			        			 
			        	}
						//alert(rows);														
			        }
		      }

			var submiturl="GetSubject.php?Class=" + document.getElementById("cboClass").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
			
}

function GetMaxMarks()
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
			        	MaxControl=document.getElementById("totalSubject").value
			        	document.getElementById("MaxMarks").value=rows;
			        	for(i=1;i<=MaxControl;i++)
			        	{
			        		varCtrlMarksName="txtGrade" + i;							
							document.getElementById(varCtrlMarksName).value=rows;
			        	}
						//alert(rows);														
			        }
		      }
			
			var submiturl="GetMaxMarks.php?TestType=" + document.getElementById("cboTestType").value;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);

}

function GetStudentName()
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
			        	arr_row=rows.split(",");
			        	
			        	//document.getElementById("txtStudentName").value=rows;
			        	document.getElementById("txtStudentName").value=arr_row[0];
			        	document.getElementById("txtAdmissionId").value=arr_row[1];
			        	
			        	/*
			        	ReloadWithSubject();
			        	if (document.getElementById("cboTestType").value !="Select One")
			        	{
			        		GetMaxMarks();
			        	}
			        	*/
						//alert(rows);														
			        }
		      }
			
			var submiturl="GetStudentName.php?RollNo=" + document.getElementById("cboRollNo").value + "&Class=" + document.getElementById("cboClass").value;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);

}

function removeAllOptions(selectbox)

	{

	

		var i;

		for(i=selectbox.options.length-1;i>=0;i--)

		{

			selectbox.remove(i);

		}

	}

	function removeOption(selectbox,indx)

	{

	

		var i;

		i=indx;

			selectbox.remove(i);

		

	}

	function addOption(selectbox,text,value )

	{

		var optn = document.createElement("OPTION");

		optn.text = text;

		optn.value = value;

		selectbox.options.add(optn);

	}
	function GetGrade(marksobtained,maxmarks,gradectrl)
	{
		//alert(marksobtained);
		//alert(document.getElementById(marksobtained).value);
		MarksObtained = document.getElementById(marksobtained).value;
		MaxMarks = document.getElementById(maxmarks).value;
		
		
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
			        	
			        	document.getElementById(gradectrl).value=rows;
						//alert(rows);														
			        }
		      }
			
			var submiturl="GetGrade.php?MarksObtained=" + MarksObtained  + "&MaxMarks=" + MaxMarks;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
	}
	
	function fnlFillRollNo()
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
			        	/*
			        	arr_row=rows.split(",");
			        	document.getElementById("txtAdmissionFees").value=arr_row[4];
			        	document.getElementById("txtSecurityFeesAmount").value=arr_row[5];
						CalculatTotal();
						*/
						
							arr_row=rows.split(",");
							removeAllOptions(document.frmClassWork.cboRollNo);
							//removeAllOptions(document.frmLifeSkill.cboDescription1);
							
						arr_row=rows.split(",");
						addOption(document.frmClassWork.cboRollNo,"All","All")
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmClassWork.cboRollNo,arr_row[row_count],arr_row[row_count])			        			 
			        	}

			        	
						
			        }
		      }
			var submiturl="GetRollNo.php?Class=" + escape(document.getElementById("cboClass").value);
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
	}
	
	
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enter Student Marks</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
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

.style1 {
	border-color: #808080;
	border-width: 0px;
	border-collapse: collapse;
	font-family: Cambria; 
	}
.auto-style2 {
	text-align: center;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
}
.auto-style4 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}
.auto-style5 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
}
.auto-style6 {
	color: #000000;
}
.auto-style7 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	color: #000000;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}
.auto-style21 {
	text-align: left;
}
.auto-style22 {
	text-align: right;
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: defulat (size);
}
.auto-style23 {
	text-align: center;
	border-style: none;
	border-width: medium;
	background-color: #FFFFFF;
	font-family: Cambria;
}
.auto-style25 {
	text-align: right;
	border-style: none;
	border-width: medium;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
	font-size: defulat (size);
}
.auto-style29 {
	border-right-width: 0px;
	border-top-width: 0px;
	border-bottom-width: 0px;
}
.auto-style32 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
}
.auto-style33 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	font-size: defulat (size);
}
.auto-style36 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	text-decoration: underline;
}
.auto-style3 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 15px;
	color: #000000;
}
.auto-style37 {
	text-align: left;
	border-style: none;
	border-width: medium;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
	font-size: defulat (size);
}
.auto-style39 {
	text-align: center;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
	font-size: defulat (size);
}
.auto-style40 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
	font-size: defulat (size);
}
.style12 {
	font-family: Cambria;
	border: 1px solid #000000;
}
.style20 {
	text-decoration: none;
}
.style21 {
	color: #000000;
}
.style22 {
	font-family: Cambria;
	border: 1px solid #000000;
	text-align: center;
}
.style23 {
	font-family: Cambria;
	border: 1px solid #000000;
	background-color: #008000;
}
.style24 {
	font-family: Cambria;
	border: 1px solid #000000;
	background-color: #000000;
}
</style>
</head>

<body>

<p>&nbsp;</p>

<table style="width: 100%" class="style1">
	
	<tr>
		<td class="auto-style7" colspan="2" style="border-style: none; border-width: medium">

				<div class="auto-style21">

					<strong>CCE Indicator Entry Status</strong><hr class="auto-style3" style="height: -15px">
				</div>
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
				
				</td>
	</tr>	
	
	<tr>
		<td class="auto-style36" style="width =620px; border-left-style:solid; border-left-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium"50%">
		<span style="text-decoration: none"><strong>Indicator Entry</strong></span></td>
		<td class="auto-style4" style="border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: none; border-bottom-width: medium; background-color:#95C23D" width="621">
		<a href="UploadReportCard.php">
		<span class="auto-style6"><strong><span style="text-decoration: none">
		Indicatory Entry Report</span></strong></span></a></td>
	</tr>	</table>	
<table class="auto-style29" style="border-width:1px; width: 100%; border-collapse:collapse" cellpadding="0">
	<form name="frmClassWork" id="frmClassWork" method="post" action="frmPart1BScholasticAreas.php">	
			<input type="hidden" name="totalSubject" id="totalSubject" value="<?php echo $Cnt; ?>" class="auto-style40">
	<input type="hidden" name="SubmitType" id="SubmitType" value="yes" class="auto-style5">		
	<input type="hidden" name="MaxMarks" id="MaxMarks" value="" class="auto-style5">
	<input type="hidden" name="txtAdmissionId" id="txtAdmissionId" value="">
	<tr>
		<td class="auto-style25" style="border-style:solid; border-width:1px; height: 29px" colspan="4">&nbsp;</td>
	</tr>
	 
	<tr>
		<td class="auto-style25" style="border-style:solid; border-width:1px; width: 318px; height: 29px">Class: </td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 319px; height: 29px">
		
			<span class="auto-style40">
		
			<!--<select name="cboClass" id="cboClass" onchange="FillSubject();">-->
			</span>
			<select name="cboClass" id="cboClass" class="auto-style40" onchange="Javascript:fnlFillRollNo();">
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
			</select><span class="auto-style40"> </span>
		</td>
		<td class="auto-style37" style="border-style:solid; border-width:1px; width: 273px; height: 29px">Roll No:</td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 319px; height: 29px">
		<span class="auto-style40">
		</span>
		<select name="cboRollNo" id="cboRollNo" onchange="Javascript:GetStudentName();">
		<option selected="" value="All">All</option>
		</select></td>
	</tr>
	 
	<tr>
		<td class="auto-style25" style="border-style:solid; border-width:1px; width: 318px">Student Name:</td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 319px">
		
			<input name="txtStudentName" id="txtStudentName" type="text" style="width: 242px" value="<?php echo $SelectStudentName; ?>" readonly class="auto-style40"></td>
		<td class="auto-style37" style="border-style:solid; border-width:1px; width: 273px">&nbsp;</td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 319px">
		&nbsp;</td>
	</tr>
	
	<tr>
		<td class="auto-style23" colspan="4">
		<input name="Submit" type="button" value="Show Status" onclick="Javascript:Validate();" class="auto-style40" style="width: 103; font-weight:700; height:25"></td>
	</tr>
	</form>
</table>

<?php
if($_REQUEST["SubmitType"]=="yes")
{
?>
<br>
<table style="width: 100%" class="style1">
	<tr>
		<td class="style22" style="width: 137px" bgcolor="#95C23D">Student Name</td>
		<td class="style22" style="width: 73px" bgcolor="#95C23D">Roll No</td>
		<td class="style22" style="width: 163px" bgcolor="#95C23D"><b>Step 1 </b> <br>
		(Scholastic Areas)</td>
		<td class="style22" style="width: 200px" bgcolor="#95C23D">
		<a href="frmPart2ALifeSkill.php" class="style20"><span class="style21">
		<b>Step 2 </b> <br>
		(Co-Scholastic -Life Skills)</span></a></td>
		<td class="style22" style="width: 182px" bgcolor="#95C23D">
		<a href="frmPart2DAttitudeAndValues.php" class="style20">
		<span class="style21"><b>Step 3 </b> <br>
		(Co-Scholastic- Attitude)</span></a></td>
		<td class="style22" style="width: 159px" bgcolor="#95C23D">
		<a href="frmPart3ACoScholasticActivities.php" class="style20">
		<span class="style21"><b>Step 4 </b> <br>
		Co-Scholastic Activities</span></a></td>
		<td class="style22" style="width: 169px" bgcolor="#95C23D">
		<a href="frmPart3BHealthAndPhysical.php" class="style20">
		<span class="style21"><b>Step 5 </b> <br>
		Health &amp; Physical Edu.</span></a></td>
		<td class="style22" style="width: 134px" bgcolor="#95C23D"><b>Step 6</b> <br>
		Self Awareness</td>
	</tr>
	<?php
				while($row = mysql_fetch_assoc($rsStudents))
   				{
   					$class=$row['sclass'];
   					$rollno=$row['srollno'];
   					$name=$row['sname'];
   					
   					
   					$sql = "select * from `reportcard_interim` where `sclass`='$class' and `srollno`='$rollno' and `indicatortype`='Scholastic Areas'";  
					$rsScholasticArea = mysql_query($sql);
					if (mysql_num_rows($rsScholasticArea) > 0)
					{
						$bgScholasticArea='class="style23"';
					}
					else
					{
						$bgScholasticArea='class="style24"';
					}
					
					$sql = "select * from `reportcard_interim` where `sclass`='$class' and `srollno`='$rollno' and `indicatortype`='Life Skills'";  
					$rsLifeSkill = mysql_query($sql);
					if (mysql_num_rows($rsLifeSkill ) > 0)
					{
						$bgLifeSkill='class="style23"';
					}
					else
					{
						$bgLifeSkill='class="style24"';
					}
					$sql = "select * from `reportcard_interim` where `sclass`='$class' and `srollno`='$rollno' and `indicatortype`='Attitude Values'";  
					$rsCoScholasticAttitue = mysql_query($sql);
					if (mysql_num_rows($rsCoScholasticAttitue) > 0)
					{
						$bgAttitue='class="style23"';
					}
					else
					{
						$bgAttitue='class="style24"';
					}
					$sql = "select * from `reportcard_interim` where `sclass`='$class' and `srollno`='$rollno' and `indicatortype`='Co-Scholastic Activities'";  
					$rsCoScholasticActivity = mysql_query($sql);
					if (mysql_num_rows($rsCoScholasticActivity) > 0)
					{
						$bgActivity='class="style23"';
					}
					else
					{
						$bgActivity='class="style24"';
					}
					$sql = "select * from `reportcard_interim` where `sclass`='$class' and `srollno`='$rollno' and `indicatortype`='Health and Physical'";  
					$rsHealthPhysical = mysql_query($sql);
					if (mysql_num_rows($rsHealthPhysical) > 0)
					{
						$bgHealthPhysical='class="style23"';
					}
					else
					{
						$bgHealthPhysical='class="style24"';
					}
					$sql = "select * from `reportcard_interim` where `sclass`='$class' and `srollno`='$rollno' and `indicatortype`='Self Awareness'";  
					$rsSelfAwareness = mysql_query($sql);
					if (mysql_num_rows($rsSelfAwareness) > 0)
					{
						$bgSelfAwareness='class="style23"';
					}
					else
					{
						$bgSelfAwareness='class="style24"';
					}

	?>
	<tr>
		<td class="style12" style="width: 137px"><?php echo $name;?></td>
		<td class="style12" style="width: 73px"><?php echo $rollno;?></td>
		<td <?php echo $bgScholasticArea;?> style="width: 164px"></td>
		<td <?php echo $bgLifeSkill;?> style="width: 201px"></td>
		<td <?php echo $bgAttitue;?> style="width: 183px"></td>
		<td <?php echo $bgActivity;?> style="width: 160px"></td>
		<td <?php echo $bgHealthPhysical;?> style="width: 170px"></td>
		<td <?php echo $bgSelfAwareness;?> style="width: 135px"></td>
	</tr>
	<?php
		mysql_free_result($rsSelfAwareness);
		mysql_free_result($rsHealthPhysical);
		mysql_free_result($rsCoScholasticActivity);
		mysql_free_result($rsCoScholasticAttitue);		
		mysql_free_result($rsLifeSkill);
		mysql_free_result($rsScholasticArea);				
	}
	?>
</table>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>

</div>

<?php
	}
	?>

</body>

</html>