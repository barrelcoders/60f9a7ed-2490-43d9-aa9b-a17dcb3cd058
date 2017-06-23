<?php 
include '../Header/Header3.php';
include '../../AppConf.php';
include '../../connection.php';
?>
<?php
$sql = "SELECT distinct `class` FROM `class_master` where `class` like '11%' or `class` like '12%' order by `class`";
 $result = mysql_query($sql);
$sqlex = "SELECT distinct `examtype` FROM `exam_master` where `class` in (select `MasterClass` from `class_master` where `class`='$class')";
$rsltex = mysql_query($sqlex);


if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
	$class = $_REQUEST["cboClass"];
	
	$SelectedClass = $_REQUEST["cboClass"];
	$SelectedSubject = $_REQUEST["cboSubject"];
	$SelectedTestType = $_REQUEST["cboTestType"];
	
	$sql = "SELECT `TheoryMaxMarks`,`PracticalMaxMarks` FROM `subject_master` WHERE `class`='$class' and `subject`='$SelectedSubject' and `exam_type`='$SelectedTestType' and `evaluation`='Y' and `elective`='N'";
   
   $rsMaxMarks = mysql_query($sql, $Con);
   while($row = mysql_fetch_assoc($rsMaxMarks))
   				{
   					$TheoryMaxMarks=$row['TheoryMaxMarks'];
   					$PracticalMaxMarks=$row['PracticalMaxMarks'];
   					break;
   				}
   				
	$ssql="SELECT `sadmission`,`sname`,`srollno` FROM `student_master` a  where  `sclass`='$SelectedClass' order by CAST(`srollno` AS UNSIGNED) limit 5";
	$rs= mysql_query($ssql);	
	
	//$TotalColumns= mysql_num_rows($rsSkillCnt);	
}
if($_REQUEST["SubmitType"]=="FinalSubmit")
{
	$TotalControl=$_REQUEST["txtTotalControl"];
	for($i=1;$i<=$TotalControl;$i++)
	{
		$ctrlName="txtTheoryObtainedMarks".$i;
		$ctrlPractical="txtPracticalObtainedMarks".$i;
		
		$ctrlsaddmission="hsadmission".$i;
		$ctrlStudentName="hstudentName".$i;
		$ctrlRollNo="hRollNo".$i;
		
		$SelClass=$_REQUEST["txtSelectedClass"];
		$SelRollNo=$_REQUEST[$ctrlRollNo];
		$SelSubject=$_REQUEST["txtSelectedSubject"];
		$SelTestType=$_REQUEST["txtSelectedTestType"];
		
		$TheoryObtainedMarks=$_REQUEST[$ctrlName];
		$TheoryMaxMarks=$_REQUEST["hTheoryMaxMarks"];
		
		$PracticalObtainedMarks=$_REQUEST[$ctrlPractical];
		$PracticalMaxMarks=$_REQUEST["hPracticalMaxMarks"];
		
		$StudentName=$_REQUEST[$ctrlStudentName];
		$StudentAdmissionId=$_REQUEST[$ctrlsaddmission];
		
		//echo $_REQUEST[$ctrlName]."<BR>";
		//echo $StudentName."/".$StudentAdmissionId."/".$SelClass."/".$SelRollNo."/".$SelSubject."/".$SelTestType."/".$TheoryObtainedMarks."/".$TheoryMaxMarks."/".$PracticalObtainedMarks."/".$PracticalMaxMarks."<br>";
		mysql_query("insert into `reportcard_Class11and12_values` (`sadmission`,`sname`,`sclass`,`srollno`,`subject`,`testtype`,`TheoryMaxMarks`,`TheoryMarksObtained`,`PracticalMaxMarks`,`PracticalMarksObtained`) values ('$StudentAdmissionId','$StudentName','$SelClass','$SelRollNo','$SelSubject','$SelTestType','$TheoryMaxMarks','$TheoryObtainedMarks','$PracticalMaxMarks','$PracticalObtainedMarks')") or die(mysql_error());

	}
	echo "<br><br><center><b>Seuccessfully Submitted!";
	exit();
}
?>

<script language="javascript">
function ReloadWithSubject1()
{
	var TotalStudent=document.getElementById("txtTotalControl").value;
	for(var i=1;i<=TotalStudent;i++)
	{
		if(document.getElementById("txtTheoryObtainedMarks"+i).value=="")
		{
			alert("All the theory marks are mandatory!");
			return;
		}
		else
		{
			if(isNaN(document.getElementById("txtTheoryObtainedMarks"+i).value)=="true")
			{
				alert("Theory Marks should be numeric!");
				return;
			}
		}
		if(document.getElementById("txtPracticalObtainedMarks"+i).value=="")
		{
			alert("All the Practical marks are mandatory!");
			return;
		}
		else
		{
			if(isNaN(document.getElementById("txtPracticalObtainedMarks"+i).value)=="true")
			{
				alert("Practical Marks should be numeric!");
				return;
			}
		}
		if(parseInt(document.getElementById("txtTheoryObtainedMarks"+i).value)>parseInt(document.getElementById("hTheoryMaxMarks").value))
		{
			alert("Theory Obtained Marks can not be greater than Theory Max Marks");
			return;
		}
		if(parseInt(document.getElementById("txtPracticalObtainedMarks"+i).value)>parseInt(document.getElementById("hPracticalMaxMarks").value))
		{
			alert("Practical Obtained Marks can not be greater than Practical Max Marks");
			return;
		}
		
	}
	if(document.getElementById("txtTestType").value=="Select One" || document.getElementById("txtTestType").value=="")
	{
		alert("Exam Type is mandatory!");
		return;
	}
	
	document.getElementById("SubmitType").value="FinalSubmit";
	document.getElementById("frmClassWork").submit();
}
function ReloadWithSubject()
{
	if(document.getElementById("cboClass").value=="Select One")
	{
		alert("Class is mandatory!");
		return;
	}
	if(document.getElementById("cboSubject").value=="Select One")
	{
		alert("Subject is mandatory!");
		return;
	}
	if(document.getElementById("cboTestType").value=="Select One")
	{
		alert("Exam Type is mandatory!");
		return;
	}
	
	document.getElementById("SubmitType").value="ReloadWithSubject";
	document.getElementById("frmClassWork").submit();
	
}
function Validate()
{
	
	var totalSubject = document.getElementById("totalSubject").value;
		
		
	for (i=1;i<totalSubject;i++)
	{
		//varCtrlName = "txtDate" + i;
		varCtrlStudentName = "txtStudentName" + i;
		varCtrlMarksName="txtTotalMarks" + i;
		//alert(isNaN(document.getElementById(varCtrlMarksName).value));
		
		
		//if (isNaN(document.getElementById(varCtrlMarksName).value)==true || document.getElementById(varCtrlMarksName).value=="")
		
		if (document.getElementById(varCtrlMarksName).value != "")
		{
				if (parseInt(document.getElementById(varCtrlMarksName).value) > parseInt(document.getElementById("MaxMarks").value))
				{
					StudentName = document.getElementById(varCtrlStudentName).value;
					alert("Obtained marks greater then max. marks, Please check for Student :" + StudentName);
					return;
				}	
		}
		
		
	}
	document.getElementById("frmClassWork").action="SubmitfrmPrimaryBulkReportCard.php";
	document.getElementById("frmClassWork").submit();
}
function fnlFillExamType()
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
			        	//rows=rows.substr(3,rows.length);
			        	//alert(rows);
			        	removeAllOptions(document.frmClassWork.cboTestType);
			        	 
			        	//document.getElementById("txtStudentName").value="";
			        	addOption(document.frmClassWork.cboTestType,"Select One","Select One")
			        	arr_row=rows.split(',');
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmClassWork.cboTestType,arr_row[row_count],arr_row[row_count])			        			 
			        	}
						//alert(rows);														
			        }
		      }

			var submiturl="GetExamType.php?Class=" + document.getElementById("cboClass").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);	

}
function fnlFillSubject()
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
			        	//rows=rows.substr(3,rows.length);
			        	//alert(rows);
			        	removeAllOptions(document.frmClassWork.cboSubject);
			        	 
			        	//document.getElementById("txtStudentName").value="";
			        	addOption(document.frmClassWork.cboSubject,"Select One","Select One")
			        	arr_row=rows.split(',');
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmClassWork.cboSubject,arr_row[row_count],arr_row[row_count])			        			 
			        	}
			        	fnlFillExamType();
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
			        	document.getElementById("txtStudentName").value=rows;
			        	
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
	function GetGradeOld(marksobtained,maxmarks,gradectrl,gradepointctrl)
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
			        	arr_row=rows.split(",");
			        	
			        	document.getElementById(gradectrl).value=arr_row[0];
			        	document.getElementById(gradepointctrl).value=arr_row[1];
						//alert(rows);														
			        }
		      }
			
			var submiturl="GetGrade.php?MarksObtained=" + MarksObtained  + "&MaxMarks=" + MaxMarks;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
	}
	function GetGrade(cnt)
	{
		//alert(marksobtained);
		//alert(document.getElementById(marksobtained).value);
		//alert(document.getElementById("TotalColumn").value);
		
		/*
		var ctrlSubject="txtStudentName" + cnt;
		
		var ctrlMaxMarks="txtMaxMarks" + cnt;
		
		var ctrlTotalMarks="txtTotalMarks" + cnt;
		
		var ctrlGrade="txtGrd" + cnt;
		var ctrlGradePoint="txtGrdPoint" + cnt;
		*/
		
		var TotalCoumns=document.getElementById("TotalColumn").value;
		var MaxMarks=document.getElementById("txtMaxMarks"+cnt).value;
		
		var TotalObtainedMarks=0;
		for(var i=1;i<=TotalCoumns;i++)
		{
			var ctrlName="txtSkill_" + cnt + "_" + i;
			var ctrlValue=document.getElementById(ctrlName).value;
			if(ctrlValue !="")
			{
				TotalObtainedMarks=TotalObtainedMarks+ parseInt(ctrlValue);
			}			
		}
		//alert(TotalObtainedMarks);
		document.getElementById("txtTotalMarks"+cnt).value=TotalObtainedMarks;
		//return;
		
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
			        	
			        	document.getElementById("txtGrd"+cnt).value=arr_row[0];
			        	document.getElementById("txtGradePoint"+cnt).value=arr_row[1];
			        	
			        							
			        }
		      }
			
			var submiturl="GetGrade.php?MarksObtained=" + TotalObtainedMarks  + "&MaxMarks=" + MaxMarks;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
		
		
		
	}
	function fnlCalculateTotal(cnt)
	{
		var TheoryObtainedMarks=0;
		var PracticalObtainedMarks=0;
		
		if(document.getElementById("txtTheoryObtainedMarks"+cnt).value !="")
		{
			TheoryObtainedMarks=document.getElementById("txtTheoryObtainedMarks"+cnt).value;
		}
		
		if(document.getElementById("txtPracticalObtainedMarks"+cnt).value !="")
		{
			PracticalObtainedMarks=document.getElementById("txtPracticalObtainedMarks"+cnt).value;
		}
		document.getElementById("tdTotalObtained"+cnt).innerHTML=parseInt(TheoryObtainedMarks)+parseInt(PracticalObtainedMarks);
		
	}
</script>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Upload Student Report Card</title>
<style>
<!--

.style1 {
	border-color: #808080;
	border-width: 0px;
	border-collapse: collapse;
	font-family: Cambria; 
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
.auto-style3 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 15px;
	color: #000000;
}
.auto-style6 {
	color: #000000;
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
.auto-style4 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}
.auto-style29 {
	border-right-width: 0px;
	border-top-width: 0px;
	border-bottom-width: 0px;
}
.auto-style5 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
}
.auto-style25 {
	text-align: right;
	border-style: none;
	border-width: medium;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
	font-size: defulat (size);
}
.auto-style32 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
}
.auto-style40 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
	font-size: defulat (size);
}
.auto-style37 {
	text-align: left;
	border-style: none;
	border-width: medium;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
	font-size: defulat (size);
}
.style9 {
	text-align: center;
	border-style: none;
	border-width: medium;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
	font-size: defulat (size);
}
.style10 {
	text-align: center;
}
.style12 {
	text-align: center;
	font-family: Cambria;
}
-->
</style>
</head>

<body>

<p>&nbsp;</p>

<table style="border-width:1px; width: 100%" class="style1" cellspacing="0" cellpadding="0">
	
	<tr>
		<td class="auto-style7" colspan="2" style="border-style: none; border-width: medium">

				<div class="auto-style21">

					<strong>Upload Student Report Card</strong><hr class="auto-style3" style="height: -15px">
				</div>
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
				
				</td>
	</tr>	
	
	<tr>
		<td class="auto-style36" style="width =517px; border-top-style:solid; border-top-width:1px; background-color:#95C23D"><strong>Upload 
		Marks</strong></td>
		<td class="auto-style4" width="50%" style="border-top-style: solid; border-top-width: 1px">
		<a href="UploadReportCard.php">
		<span class="auto-style6"><strong>Uploaded Marks Report</strong></span></a></td>
	</tr>	</table>
	<form name="frmClassWork" id="frmClassWork" method="post">	
	<input type="hidden" name="SubmitType" id="SubmitType" value="" class="auto-style5">
	<input type="hidden" name="txtSelectedClass" id="txtSelectedClass" value="<?php echo $SelectedClass; ?>">
	<input type="hidden" name="txtSelectedSubject" id="txtSelectedSubject" value="<?php echo $SelectedSubject; ?>">
	<input type="hidden" name="txtSelectedTestType" id="txtSelectedTestType" value="<?php echo $SelectedTestType; ?>">	
	<input type="hidden" name="MaxMarks" id="MaxMarks" value="<?php echo $MaxMarks;?>" class="auto-style5">	
	<input type="hidden" name="hTheoryMaxMarks" id="hTheoryMaxMarks" value="<?php echo $TheoryMaxMarks;?>">
	<input type="hidden" name="hPracticalMaxMarks" id="hPracticalMaxMarks" value="<?php echo $PracticalMaxMarks;?>">
	
<table class="auto-style29" style="width: 100%; border-collapse:collapse; border-left-width:1px; border-right-width:1px; border-bottom-width:1px" cellpadding="0">
	
	
	<tr>
		<td class="auto-style25" style="height: 26px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" colspan="6">
		&nbsp;</td>
	</tr>
	 
	<tr>
		<td class="auto-style25" style="border-style:solid; border-width:1px; width: 258px; height: 26px">
		<p style="text-align: center">Class: </td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 259px; height: 26px">
		
			<span class="auto-style40">
		
			<!--<select name="cboClass" id="cboClass" onchange="FillSubject();">-->
			</span>
			<?php
			if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
			{
			?>
			<input type="text" id="txtClass" name="txtClass" value="<?php echo $class;?>" readonly="readonly">
			<?php
			}
			else
			{
			?>
			<select name="cboClass" id="cboClass" class="auto-style40" style="height: 21px" onchange="Javascript:fnlFillSubject();">
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
			<?php
			}
			?>
			<span class="auto-style40"> </span>
		</td>
		<td class="auto-style37" style="border-style:solid; border-width:1px; width: 259px; height: 26px">
		Select Subject</td>
		<td class="auto-style37" style="border-style:solid; border-width:1px; width: 259px; height: 26px">
		<?php
			if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
			{
			?>
			<input type="text" id="txtSubject" name="txtSubject" value="<?php echo $SelectedSubject;?>" readonly="readonly">
			<?php
			}
			else
			{
			?>
		<select name="cboSubject" id="cboSubject">
		<option selected="" value="Select One">Select One</option>
		</select>
		<?php
		}
		?>
		</td>
		<td class="auto-style37" style="border-style:solid; border-width:1px; width: 259px; height: 26px">
		<p style="text-align: center">Test Type:</td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 259px; height: 26px">
		<span class="auto-style40">
		<!--
		<select name="cboSubject" id="cboSubject">
		<option></option>
		<option selected="" value="Select One">Select One</option>
		</select>
		-->
		</span>
		<?php
			if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
			{
			?>
			<input type="text" id="txtTestType" name="txtTestType" value="<?php echo $SelectedTestType;?>" readonly="readonly">
			<?php
			}
			else
			{
			?>
		<select name="cboTestType" id="cboTestType" onclick="GetMaxMarks();" class="auto-style40">
		<option selected="" value="Select One">Select One</option>
		<?php
		if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
		{

		while($row = mysql_fetch_assoc($rsltex))
   		{
   					$ExamType=$row['examtype'];
		?>
		<option value="<?php echo $ExamType; ?>"><?php echo $ExamType; ?></option>
		<?php
		}
		}
		?>
		
		</select>
		<?php
		}
		?>
		</td>
	</tr>
	 
	<tr>
		<td class="auto-style25" style="border-style:solid; border-width:1px; " colspan="6">
		<p style="text-align: center">
		<input name="btnShow" type="button" value="Show Student" onclick="Javascript:ReloadWithSubject();" style="font-weight: 700"></td>
	</tr>
	
	<tr>
		<td class="style9" colspan="6"></td>
	</tr>
	
</table>

<table border="1" width="100%" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td width="51" bgcolor="#95C23D">
		<p align="center"><b><font face="Cambria">SNo</font></b></td>
		<td width="241" bgcolor="#95C23D">
		<p align="center"><b><font face="Cambria">Student Name</font></b></td>
		<td width="67" bgcolor="#95C23D">
		<p align="center"><b><font face="Cambria">Roll No</font></b></td>
		<td width="112" bgcolor="#95C23D" align="center">
		<b><font face="Cambria">Theory MM</font></b></td>
		<td width="221" bgcolor="#95C23D" align="center">
		<p align="center"><b><font face="Cambria">Theory (Marks Obtained)</font></b></td>
		<td width="117" bgcolor="#95C23D" align="center">
		<font face="Cambria"><b>Practical MM</b></font></td>
		<td width="271" bgcolor="#95C23D" align="center">
		<p align="center"><b><font face="Cambria">Practical (Marks Obtained)</font></b></td>
		<td width="197" bgcolor="#95C23D" align="center">
		<font face="Cambria"><b>Total Marks Obtained</b></font></td>
	</tr>
	<?php
				$Cnt=0;
				while($row = mysql_fetch_assoc($rs))
   				{   	
   					$sadmission=$row['sadmission'];			
   					$StudentName=$row['sname'];
   					$StudentRollNo=$row['srollno'];
   					$Cnt=$Cnt+1;
   					
   					$rsSubmittedDetail=mysql_query("select `TheoryMarksObtained`,`PracticalMarksObtained` from `reportcard_Class11and12_values` where `testtype`='$SelectedTestType' and `subject`='$SelectedSubject' and `sadmission`='$sadmission'");
   					$SubmittedTheoryMarksObtained=0;
   					$SubmittedPracticalMarksObtained=0;
   					while($rowSub = mysql_fetch_assoc($rsSubmittedDetail))
   					{   
   						$SubmittedTheoryMarksObtained=$rowSub['TheoryMarksObtained'];
   						$SubmittedPracticalMarksObtained=$rowSub['PracticalMarksObtained'];
   					}
			?>
	<tr>
		<td width="51" class="style10"><?php echo $Cnt;?>.</td>
		<td width="241" class="style12"><?php echo $StudentName;?>
		<input type="hidden" name="hsadmission<?php echo $Cnt;?>" id="hsadmission<?php echo $Cnt;?>" value="<?php echo $sadmission;?>">
		<input type="hidden" name="hstudentName<?php echo $Cnt;?>" id="hstudentName<?php echo $Cnt;?>" value="<?php echo $StudentName;?>">
		</td>
		<td width="67" class="style12"><?php echo $StudentRollNo;?>
		<input type="hidden" name="hRollNo<?php echo $Cnt;?>" id="hRollNo<?php echo $Cnt;?>" value="<?php echo $StudentRollNo;?>">
		</td>
		<td width="112" class="style12"><?php echo $TheoryMaxMarks;?></td>
		<td width="221">
		<p align="center"><input type="text" name="txtTheoryObtainedMarks<?php echo $Cnt;?>" id="txtTheoryObtainedMarks<?php echo $Cnt;?>" size="20" onkeyup="javascript:fnlCalculateTotal('<?php echo $Cnt;?>');" value="<?php echo $SubmittedTheoryMarksObtained;?>"></td>
		<td width="117" class="style10"><?php echo $PracticalMaxMarks;?></td>
		<td width="271" align="center">
		<p align="center"><input type="text" name="txtPracticalObtainedMarks<?php echo $Cnt;?>" id="txtPracticalObtainedMarks<?php echo $Cnt;?>" size="20" onkeyup="javascript:fnlCalculateTotal('<?php echo $Cnt;?>');" value="<?php echo $SubmittedPracticalMarksObtained;?>"></td>
		<td width="197" align="center" id="tdTotalObtained<?php echo $Cnt;?>"><?php echo ($SubmittedTheoryMarksObtained+$SubmittedPracticalMarksObtained) ?></td>
	</tr>
	<?php
	
		}
	?>
	<input type="hidden" name="txtTotalControl" id="txtTotalControl" value="<?php echo $Cnt;?>">
</table>
<p align="center"><input name="btnShow0" type="button" value="Submit" onclick="Javascript:ReloadWithSubject1();" style="font-weight: 700"></p>
</form>
</body>

</html>
