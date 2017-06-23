<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>
<?php
$Con = mysql_connect("","mobilise","Welcome@123");
if (!$Con)
{
  die('Could not connect: ' . mysql_error());
}

	mysql_select_db("mobilise_emerald", $Con);
	session_start();
	
   $sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   
   if($_REQUEST["SubmitType"] == "yes")
   {
   		$Class=$_REQUEST["cboClass"];
   		$RollNo=$_REQUEST["cboRollNo"];
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
	
	
	document.getElementById("frmClassWork").action="frmFetchCCEMarksUploadStatus.php";
	
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
.style1 {
	border-color: #808080;
	border-width: 0px;
	border-collapse: collapse;
	font-family: Cambria; 
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

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;

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
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	text-decoration: underline;
}
.style25 {
	border: 1px solid #000000;
	border-collapse: collapse;
	font-family: Cambria;
}
</style>
</head>

<body>

<p>&nbsp;</p>

<table style="width: 100%" class="style1">
	
	<tr>
		<td class="auto-style7" style="border-style: none; border-width: medium">

				<div class="auto-style21">

					<strong>Student Report Card Upload Status</strong><hr class="auto-style3" style="height: -15px">
				</div>
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
				
				</td>
	</tr>	
	
	</table>	
<table class="auto-style29" style="width: 100%; border-collapse:collapse" cellpadding="0">
	<form name="frmClassWork" id="frmClassWork" method="post" action="frmFetchCCEMarksUploadStatus.php">	
			<input type="hidden" name="totalSubject" id="totalSubject" value="<?php echo $Cnt; ?>" class="auto-style40">
	<input type="hidden" name="SubmitType" id="SubmitType" value="yes" class="auto-style5">		
	<input type="hidden" name="MaxMarks" id="MaxMarks" value="" class="auto-style5">
	<input type="hidden" name="txtAdmissionId" id="txtAdmissionId" value="">
	<tr>
		<td class="auto-style25" style="border-style:solid; border-width:1px; width: 258px; height: 32px;">
		<p style="text-align: center">Class: </td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 259px; height: 32px;">
		
			<p align="center">
		
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
		<td class="auto-style37" style="border-style:solid; border-width:1px; width: 259px; height: 32px;">
		<p style="text-align: center">Roll No:</td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 259px; height: 32px;">
		<p align="center">
		<span class="auto-style40">
		</span>
		<select name="cboRollNo" id="cboRollNo" onchange="Javascript:GetStudentName();">
		<option selected="" value="All">All</option>
		</select></td>
	</tr>
	 
	<tr>
		<td class="auto-style25" style="border-style:solid; border-width:1px; width: 258px" height="32">
		<p style="text-align: center">Student Name:</td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 259px" height="32">
		
			<p align="center">
		
			<input name="txtStudentName" id="txtStudentName" type="text" style="width: 210; height:21" value="<?php echo $SelectStudentName; ?>" readonly class="auto-style40"></td>
		<td class="auto-style37" style="border-style:solid; border-width:1px; width: 259px" height="32">&nbsp;</td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 259px" height="32">
		&nbsp;</td>
	</tr>
	
	<tr>
		<td class="auto-style23" colspan="4">
		<input name="Submit" type="button" value="Marks Entry Status" onclick="Javascript:Validate();" class="auto-style40" style="width: 161px; font-weight:700"></td>
	</tr>
	</form>
</table>

<?php
if($_REQUEST["SubmitType"]=="yes")
{
?>
<br>
<table style="width: 100%" class="style25">
	<tr>
		<td class="style22" style="width: 129px" bgcolor="#95C23D">Student Name</td>
		<td class="style22" style="width: 129px" bgcolor="#95C23D">Roll No</td>
		<td class="style22" style="width: 129px" bgcolor="#95C23D">FA 1</td>
		<td class="style22" style="width: 129px" bgcolor="#95C23D">
		FA 2</td>
		<td class="style22" style="width: 129px" bgcolor="#95C23D">
		<a href="frmPart2DAttitudeAndValues.php" class="style20">
		<span class="style21">SA 1</span></a></td>
		<td class="style22" style="width: 129px" bgcolor="#95C23D">
		<a href="frmPart3ACoScholasticActivities.php" class="style20">
		<span class="style21">FA 3</span></a></td>
		<td class="style22" style="width: 129px" bgcolor="#95C23D">
		<a href="frmPart3BHealthAndPhysical.php" class="style20">
		<span class="style21">FA 4</span></a></td>
		<td class="style22" style="width: 130px" bgcolor="#95C23D">SA 2</td>
	</tr>
	<?php
				while($row = mysql_fetch_assoc($rsStudents))
   				{
   					$class=$row['sclass'];
   					$rollno=$row['srollno'];
   					$name=$row['sname'];
   					
   					
   					$sql = "SELECT * FROM `subject_master` where `class`='$class' and `subject` not in (select distinct `subject` from `report_card_temp` where `sclass`='$class' and `srollno`='$rollno' and `testtype`='FA1')";
					
					$rsFA1 = mysql_query($sql);
					if (mysql_num_rows($rsFA1) > 0)
					{
						$bgFA1='bgcolor="maroon"';
					}
					else
					{
						$bgFA1='bgcolor="green"';
					}
					
					$sql = "SELECT * FROM `subject_master` where `class`='$class' and `subject` not in (select distinct `subject` from `report_card_temp` where `sclass`='$class' and `srollno`='$rollno' and `testtype`='FA2')";  
					$rsFA2 = mysql_query($sql);
					if (mysql_num_rows($rsFA2) > 0)
					{
						$bgFA2='bgcolor="maroon"';
					}
					else
					{
						$bgFA2='bgcolor="green"';
					}
					
					$sql = "SELECT * FROM `subject_master` where `class`='$class' and `subject` not in (select distinct `subject` from `report_card_temp` where `sclass`='$class' and `srollno`='$rollno' and `testtype`='SA1')";  
					$rsSA1 = mysql_query($sql);
					if (mysql_num_rows($rsSA1) > 0)
					{
						$bgSA1='bgcolor="maroon"';
					}
					else
					{
						$bgSA1='bgcolor="green"';
					}
					$sql = "SELECT * FROM `subject_master` where `class`='$class' and `subject` not in (select distinct `subject` from `report_card_temp` where `sclass`='$class' and `srollno`='$rollno' and `testtype`='FA3')";
					$rsFA3 = mysql_query($sql);
					if (mysql_num_rows($rsFA3) > 0)
					{
						$bgFA3='bgcolor="maroon"';
					}
					else
					{
						$bgFA3='bgcolor="green"';
					}
					$sql = "SELECT * FROM `subject_master` where `class`='$class' and `subject` not in (select distinct `subject` from `report_card_temp` where `sclass`='$class' and `srollno`='$rollno' and `testtype`='FA4')";
					$rsFA4 = mysql_query($sql);
					if (mysql_num_rows($rsFA4) > 0)
					{
						$bgFA4='bgcolor="maroon"';
					}
					else
					{
						$bgFA4='bgcolor="green"';
					}
					$sql = "SELECT * FROM `subject_master` where `class`='$class' and `subject` not in (select distinct `subject` from `report_card_temp` where `sclass`='$class' and `srollno`='$rollno' and `testtype`='SA2')";
					$rsSA2 = mysql_query($sql);
					if (mysql_num_rows($rsSA2) > 0)
					{
						$bgSA2='bgcolor="maroon"';
					}
					else
					{
						$bgSA2='bgcolor="green"';
					}

	?>
	<tr>
		<td class="style12" style="width: 129px"><?php echo $name;?></td>
		<td class="style12" style="width: 129px"><?php echo $rollno;?></td>
		<td style="width: 129px" class="style12" <?php echo $bgFA1;?>></td>
		<td style="width: 129px" class="style12" <?php echo $bgFA2;?>></td>
		<td style="width: 129px" class="style12" <?php echo $bgSA1;?>></td>
		<td style="width: 129px" class="style12" <?php echo $bgFA3;?>></td>
		<td style="width: 129px" class="style12" <?php echo $bgFA4;?>></td>
		<td style="width: 130px" class="style12" <?php echo $bgSA2;?>></td>
	</tr>
	<?php
		mysql_free_result($rsFA1);
		mysql_free_result($rsFA2);
		mysql_free_result($rsSA1);
		mysql_free_result($rsFA3);		
		mysql_free_result($rsFA4);
		mysql_free_result($rsSA2);				
	}
	?>
</table>
<?php
	}
	?>
	<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>

</div>
</body>

</html>
