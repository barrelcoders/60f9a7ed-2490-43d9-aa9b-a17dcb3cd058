<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>

<?php
   $sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   
   $sqlex = "SELECT distinct `examtype` FROM `exam_master`";
   $rsltex = mysql_query($sqlex, $Con);
   
if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
	$class = $_REQUEST["cboClass"];
	$SelectedClass = $_REQUEST["cboClass"];
	$SelectStudentName= str_replace("﻿﻿","",$_REQUEST["txtStudentName"]);
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
	
	var totalSubject = document.getElementById("totalSubject").value;
		/*
		if (document.getElementById("txtPosition").value=="")
		{
			alert("Position is mandatory");
			return;
		}
		else
		{
			if (isNaN(document.getElementById("txtPosition").value)==true)
			{
				alert("Position should be numeric value");
				return;
			}
		}
		*/
		
	for (i=1;i<totalSubject;i++)
	{
		//varCtrlName = "txtDate" + i;
		varCtrlSubjectName = "txtName" + i;
		varCtrlMarksName="txtMarks" + i;
		//alert(isNaN(document.getElementById(varCtrlMarksName).value));
		
		
		//if (isNaN(document.getElementById(varCtrlMarksName).value)==true || document.getElementById(varCtrlMarksName).value=="")
		if (document.getElementById(varCtrlMarksName).value != "")
		{
			if (isNaN(document.getElementById(varCtrlMarksName).value)==true)
			{
				SubjectName = document.getElementById(varCtrlSubjectName).value;
				//alert (SubjectName);
				alert("Please enter numeric data in Subject :" + SubjectName);
				return;
			}
			else
			{
				if (parseInt(document.getElementById(varCtrlMarksName).value) > parseInt(document.getElementById("MaxMarks").value))
				{
					SubjectName = document.getElementById(varCtrlSubjectName).value;
					alert("Obtained marks greater then max. marks, Please check in Subject :" + SubjectName);
					return;
				}
			}
		}
		
	}
	
	
	if (document.getElementById("cboClass").value=="Select One")
	{
		alert("Please select Class !");
		return;
	}
	if (document.getElementById("cboTestType").value=="Select One")
	{
		alert("Please select Test Type !");
		return;
	}
	
	
	document.getElementById("frmClassWork").action="SubmitfrmReportCard.php";
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
			        	document.getElementById("MaxMarks").value=parseInt(rows);
			        	for(i=1;i<=MaxControl;i++)
			        	{
			        		varCtrlMarksName="txtMaxMarks" + i;							
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
			        	document.getElementById("txtStudentName").value=arr_row[0];
			        	
			        	ReloadWithSubject();
			        	if (document.getElementById("cboTestType").value !="Select One")
			        	{
			        		GetMaxMarks();
			        	}
						//alert(rows);														
			        }
		      }
			
			var submiturl="GetStudentName.php?RollNo=" + document.getElementById("txtRollNo").value + "&Class=" + document.getElementById("cboClass").value;
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
	function GetGrade(marksobtained,maxmarks,gradectrl,gradepointctrl)
	{
		//alert(marksobtained);
		//alert(document.getElementById(marksobtained).value);
		MarksObtained = parseInt(document.getElementById(marksobtained).value);
		MaxMarks = parseInt(document.getElementById(maxmarks).value);
		
		
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
			        	
			        	document.getElementById(gradectrl).value=arr_row[0];
			        	document.getElementById(gradepointctrl).value=arr_row[1];
			        	
			        							
			        }
		      }
			
			var submiturl="GetGrade.php?MarksObtained=" + MarksObtained  + "&MaxMarks=" + MaxMarks;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
	}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enter Class Work Details</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">
.style1 {
	border-color: #808080;
	border-width: 0px;
	border-collapse: collapse;
	font-family: Cambria; 
	}
.style2 {
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
}
.style3 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
}

	.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;
	color: #CD222B;
	font-family: Cambria;
}
.style5 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;
	font-family: Cambria;
}
.style6 {
	border-collapse: collapse;
	font-family: Cambria;
}
.style7 {
	text-align: right;
	font-family: Cambria;
}
.style8 {
	text-align: center;
	font-family: Cambria;
}
.auto-style2 {
	text-align: center;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #CD222B;
}
.auto-style4 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;
	color: #CD222B;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}
.auto-style5 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #CD222B;
}
.auto-style6 {
	color: #CD222B;
}
.auto-style7 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	color: #CD222B;
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
	background-color: #DCBA7B;
	font-family: Cambria;
}
.auto-style25 {
	text-align: right;
	border-style: none;
	border-width: medium;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #CD222B;
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
	color: #CD222B;
	font-size: defulat (size);
}
.auto-style36 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;
	color: #CD222B;
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
	color: #CD222B;
	font-size: defulat (size);
}
.auto-style39 {
	text-align: center;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #CD222B;
	font-size: defulat (size);
}
.auto-style40 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #CD222B;
	font-size: defulat (size);
}
</style>
</head>

<body>

<table style="width: 100%" class="style1">
	
	<tr>
		<td class="auto-style7" colspan="2">

				<div class="auto-style21">

					<strong>Upload Student Report Card</strong><hr class="auto-style3" style="height: -15px">
				</div>
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="images/BackButton.png" width="70" style="float: right"></a></p>
				
				</td>
	</tr>	
	
	<tr>
		<td class="auto-style36" style="width ="50%"><strong>Upload Student 
		Report Card Details</strong></td>
		<td class="auto-style4"><a href="UploadReportCard.php">
		<span class="auto-style6"><strong>View Previous Uploaded Report Card 
		Details</strong></span></a></td>
	</tr>	</table>	<table class="auto-style29">
	<form name="frmClassWork" id="frmClassWork" method="post" action="frmReportCard.php">	
	<input type="hidden" name="SubmitType" id="SubmitType" value="" class="auto-style5">		
	<input type="hidden" name="MaxMarks" id="MaxMarks" value="" class="auto-style5">
	<tr>
		<td class="auto-style25" style="width: 318px; height: 29px;">Class: </td>
		<td class="auto-style32" style="width: 319px; height: 29px;">
		
			<span class="auto-style40">
		
			<!--<select name="cboClass" id="cboClass" onchange="FillSubject();">-->
			</span>
			<select name="cboClass" id="cboClass" class="auto-style40">
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
		<td class="auto-style37" style="width: 273px; height: 29px;">Roll No:</td>
		<td class="auto-style32" style="width: 319px; height: 29px;">
		<span class="auto-style40">
		<!--
		<select name="cboSubject" id="cboSubject">
		<option></option>
		<option selected="" value="Select One">Select One</option>
		</select>
		-->
		</span>
		<input name="txtRollNo" id="txtRollNo" type="text" onkeyup="GetStudentName();" value="<?php echo $RollNo; ?>" class="auto-style40"></td>
	</tr>
	 
	<tr>
		<td class="auto-style25" style="width: 318px">Student Name:</td>
		<td class="auto-style32" style="width: 319px">
		
			<input name="txtStudentName" id="txtStudentName" type="text" style="width: 242px" value="<?php echo $SelectStudentName; ?>" readonly class="auto-style40"></td>
		<td class="auto-style37" style="width: 273px">Test Type:</td>
		<td class="auto-style32" style="width: 319px">
		<select name="cboTestType" id="cboTestType" onclick="GetMaxMarks();" class="auto-style40">
		<option selected="" value="Select One">Select One</option>
		<?php
				while($row = mysql_fetch_assoc($rsltex))
   				{
   					$ExamType=$row['examtype'];
		?>
		<option value="<?php echo $ExamType; ?>"><?php echo $ExamType; ?></option>
		<?php
		}
		?>
		
		</select></td>
	</tr>
	
	<tr>
		<td class="auto-style25" style="width: 318px">Position:</td>
		<td class="auto-style32" colspan="3">
		
			<input name="txtPosition" id="txtPosition" type="text" class="auto-style40"></td>
	</tr>
	
	<tr>
		<td class="auto-style22" colspan="4">
		<table width="100%" border="1" cellpadding="0" class="style6">
			
			<tr>
				<td style="width: 196px; height: 36px;" class="auto-style33">
				Subject</td>
				<td style="width: 197px; height: 36px;" class="auto-style39">
				Marks</td>
				<td style="width: 197px; height: 36px;" class="auto-style39">
				Max. Marks</td>
				<td style="width: 197px; height: 36px;" class="auto-style39">
				Remarks</td>
				<td style="width: 197px; height: 36px;" class="auto-style39">
				Grade</td>
				<td style="width: 197px; height: 36px;" class="auto-style39">
				Grade Points</td>
			</tr>
			<?php
				$Cnt=1;
				while($row = mysql_fetch_assoc($rs))
   				{
   				
   					$Subject=$row['subject'];
   					
			?>
			<tr>
				<td style="width: 196px; height: 36px;" class="style8">
				<input name="txtName<?php echo $Cnt; ?>" id="txtName<?php echo $Cnt; ?>" type="text" style="width: 148px" value="<?php echo $Subject; ?>" readonly="readonly" class="auto-style40"></td>
				<td style="width: 197px; height: 36px;" class="style8">
		<input type="text" name="txtMarks<?php echo $Cnt; ?>" id="txtMarks<?php echo $Cnt; ?>" size="15" onkeyup="Javascript:GetGrade('txtMarks<?php echo $Cnt; ?>','txtMaxMarks<?php echo $Cnt; ?>','txtGrd<?php echo $Cnt; ?>','txtGrdPoint<?php echo $Cnt; ?>');" class="auto-style40"></td>
				<td style="width: 197px; height: 36px;" class="style8">
				<input name="txtMaxMarks<?php echo $Cnt; ?>" id="txtMaxMarks<?php echo $Cnt; ?>" type="text" readonly class="auto-style40" style="width: 136px"></td>
				<td style="width: 197px; height: 36px;" class="style8">
				<input name="txtRemarks<?php echo $Cnt; ?>" id="txtRemarks<?php echo $Cnt; ?>" type="text" class="auto-style40" style="width: 142px"></td>
				<td style="width: 197px; height: 36px;" class="style8">
				<input name="txtGrd<?php echo $Cnt; ?>" id="txtGrd<?php echo $Cnt; ?>" type="text" readonly class="auto-style40" style="width: 138px"></td>
				<td style="width: 197px; height: 36px;" class="auto-style2">
				<input name="txtGrdPoint<?php echo $Cnt; ?>" id="txtGrdPoint<?php echo $Cnt; ?>" type="text" readonly class="auto-style40" style="width: 138px"></td>
			</tr>
			<?php
				$Cnt = $Cnt+1;
			}
			?>
			<input type="hidden" name="totalSubject" id="totalSubject" value="<?php echo $Cnt; ?>" class="auto-style40">
			</table>
		</td>
	</tr>
	<tr>
		<td class="auto-style23" colspan="4">
		<input name="Submit" type="button" value="Submit" onclick="Javascript:Validate();" class="auto-style40"></td>
	</tr>
	</form>
</table>

</body>

</html>
