<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
?>
<?php

$MasterClass=$_REQUEST["MasterClass"];
   $sql = "SELECT distinct `class` FROM `class_master` where `class` like '".$MasterClass."%'";
   $result = mysql_query($sql, $Con);
   
   $sqlex = "SELECT distinct `examtype` FROM `exam_master`";
   $rsltex = mysql_query($sqlex, $Con);
   
if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
	$class = $_REQUEST["cboClass"];
	$SelectedClass = $_REQUEST["cboClass"];
	$SelectedSubject = $_REQUEST["cboSubject"];
	$SelectedTestType = $_REQUEST["cboTestType"];
	
	$sql = "SELECT `MaxMarks` FROM `exam_master` WHERE `examtype`='$SelectedTestType'";
   $rsMaxMarks = mysql_query($sql, $Con);
   while($row = mysql_fetch_assoc($rsMaxMarks))
   				{
   					$MaxMarks=$row['MaxMarks'];
   					break;
   				}
   				
	$ssql="SELECT `sname`,`srollno`,`sadmission` FROM `student_master` a  where  `sclass`='$SelectedClass' order by CAST(`srollno` AS UNSIGNED)";
	$rs= mysql_query($ssql);
		
}  
?>   

<script language="javascript">
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
		
		if(document.getElementById("txtUT"+i).value=="")
		{
			document.getElementById("txtUT"+i).style.borderColor="red";
		}
		if(document.getElementById("txtA1"+i).value=="")
		{
			document.getElementById("txtA1"+i).style.borderColor="red";
		}
		if(document.getElementById("txtA2"+i).value=="")
		{
			document.getElementById("txtA2"+i).style.borderColor="red";
		}


		/*
		if(document.getElementById(varCtrlMarksName).value == "")
		{
			alert("Please check the value, can not be blank!");
			return;
		}
		*/
		
		
		
		if (document.getElementById(varCtrlMarksName).value != "")
		{
			
				if (parseInt(document.getElementById(varCtrlMarksName).value) > parseInt(document.getElementById("txtMaxMarks" +i).value))
				{
					StudentName = document.getElementById(varCtrlStudentName).value;
					alert("Obtained marks greater then max. marks, Please check for Student :" + StudentName);
					return;
				}	
		}
		
		
	}
	
	//if(ErrMsg != "")
	//{
		//alert(ErrMsg);
		//return;
	//}
	
	document.getElementById("frmClassWork").action="SubmitfrmBulkReportCard.php";
	document.getElementById("frmClassWork").submit();
}
function fnlFillTestType()
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

			var submiturl="GetExamType6to10.php?Class=" + document.getElementById("cboClass").value + "";
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
			        	fnlFillTestType();
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
		
		var ctrlSubject="txtStudentName" + cnt;
		
		var ctrlUT="txtUT" + cnt;
		var ctrlUTMaxMarks="UTMaxMarks" + cnt;
		
		var ctrlA1="txtA1" + cnt;
		var ctrlA1MaxMarks="A1MaxMarks" + cnt;
		
		var ctrlA2="txtA2" + cnt;
		var ctrlA2MaxMarks="A2MaxMarks" + cnt;
		
		var ctrlA3="txtA3" + cnt;
		var ctrlA3MaxMarks="A3MaxMarks" + cnt;
		
		var ctrlOTBA="txtOTBA" + cnt;
		var ctrlOTBAMaxMarks="OTBAMaxMarks" + cnt;
		
		var ctrlASL="txtASL" + cnt;
		var ctrlASLMaxMarks="ASLMaxMarks" + cnt;
		
		var ctrlMaxMarks="txtMaxMarks" + cnt;
		
		var ctrlTotalMarks="txtTotalMarks" + cnt;
		
		var ctrlGrade="txtGrd" + cnt;
		var ctrlGradePoint="txtGradePoint" + cnt;
		
		var UTObtainMarks=0;
		var A1ObtainMarks=0;
		var A2ObtainMarks=0;
		var A3ObtainMarks=0;
		var OTBAObtainMarks=0;
		var ASLObtainMarks=0;
		var TotalObtainedMarks=0;
		
		if (document.getElementById(ctrlUTMaxMarks).value != "" && document.getElementById(ctrlUTMaxMarks).value != "0")
		{
			if (document.getElementById(ctrlUT).value != "")
			{
				UTObtainMarks = parseInt(document.getElementById(ctrlUT).value);
				if (parseInt(document.getElementById(ctrlUT).value) > parseInt(document.getElementById(ctrlUTMaxMarks).value))
				{
					alert ("UT Marks can not be more then" + document.getElementById(ctrlUTMaxMarks).value + " for Student: " + document.getElementById(ctrlSubject).value);
					document.getElementById(ctrlUT).value="";
					return;
				}
			}
		}
		
		
		//alert(document.getElementById(ctrlA1MaxMarks).value);
		
		if (document.getElementById(ctrlA1MaxMarks).value != "" && document.getElementById(ctrlA1MaxMarks).value != "0")
		{
			if (document.getElementById(ctrlA1).value != "")
			{
				A1ObtainMarks = parseInt(document.getElementById(ctrlA1).value);
				if (parseInt(document.getElementById(ctrlA1).value) > parseInt(document.getElementById(ctrlA1MaxMarks).value))
				{
					alert ("Activity1 Marks can not be more then" + document.getElementById(ctrlA1MaxMarks).value + " for Student: " + document.getElementById(ctrlSubject).value);
					document.getElementById(ctrlA1).value="";
					return;
				}
			}
		}
		
		if (document.getElementById(ctrlA2MaxMarks).value != "" && document.getElementById(ctrlA2MaxMarks).value != "0")
		{
			if (document.getElementById(ctrlA2).value != "")
			{
				A2ObtainMarks = parseInt(document.getElementById(ctrlA2).value);
				if (parseInt(document.getElementById(ctrlA2).value) > parseInt(document.getElementById(ctrlA2MaxMarks).value))
				{
					alert ("Activity2 Marks can not be more then" + document.getElementById(ctrlA2MaxMarks).value + " for Student: " + document.getElementById(ctrlSubject).value);
					document.getElementById(ctrlA2).value="";
					return;
				}
			}
		}
		
		if (document.getElementById(ctrlA3MaxMarks).value != "" && document.getElementById(ctrlA3MaxMarks).value != "0")
		{
			if (document.getElementById(ctrlA3).value != "")
			{
				A3ObtainMarks = parseInt(document.getElementById(ctrlA3).value);
				if (parseInt(document.getElementById(ctrlA3).value) > parseInt(document.getElementById(ctrlA3MaxMarks).value))
				{
					alert ("Activity3 Marks can not be more then" + document.getElementById(ctrlA3MaxMarks).value + " for Student: " + document.getElementById(ctrlSubject).value);
					document.getElementById(ctrlA3).value="";
					return;
				}
			}
		}
		
		
		if (document.getElementById(ctrlOTBAMaxMarks).value != "" && document.getElementById(ctrlOTBAMaxMarks).value != "0")
		{
			if (document.getElementById(ctrlOTBA).value != "")
			{
				OTBAObtainMarks = parseInt(document.getElementById(ctrlOTBA).value);
				if (parseInt(document.getElementById(ctrlOTBA).value) > parseInt(document.getElementById(ctrlOTBAMaxMarks).value))
				{
					alert ("OTBA Marks can not be more then" + document.getElementById(ctrlOTBAMaxMarks).value + " for Student: " + document.getElementById(ctrlSubject).value);
					document.getElementById(ctrlOTBA).value="";
					return;
				}
			}
		}
		
		
		if (document.getElementById(ctrlASLMaxMarks).value != "" && document.getElementById(ctrlASLMaxMarks).value != "0")
		{
			if (document.getElementById(ctrlASL).value != "")
			{
				ASLObtainMarks = parseInt(document.getElementById(ctrlASL).value);
				if (parseInt(document.getElementById(ctrlASL).value) > parseInt(document.getElementById(ctrlASLMaxMarks).value))
				{
					alert ("ASL Marks can not be more then" + document.getElementById(ctrlASLMaxMarks).value + " for Student: " + document.getElementById(ctrlSubject).value);
					document.getElementById(ctrlOTBA).value="";
					return;
				}
			}
		}
		
		
		TotalObtainedMarks=parseInt(UTObtainMarks)+parseInt(A1ObtainMarks)+parseInt(A2ObtainMarks)+parseInt(A3ObtainMarks)+parseInt(OTBAObtainMarks)+parseInt(ASLObtainMarks);
			
		tempMaxMarks=0;
		if(parseInt(A1ObtainMarks)>parseInt(tempMaxMarks))
		{
			tempMaxMarks=parseInt(A1ObtainMarks);
		}
		if(parseInt(A2ObtainMarks)>parseInt(tempMaxMarks))
		{
			tempMaxMarks=parseInt(A2ObtainMarks);
		}
		if(parseInt(A3ObtainMarks)>parseInt(tempMaxMarks))
		{
			tempMaxMarks=parseInt(A3ObtainMarks);
		}
		
		if(document.getElementById("txtSelectedTestType").value=="FA1" || document.getElementById("txtSelectedTestType").value=="FA2")
		{
			MarksObtained=(parseInt(UTObtainMarks)+parseInt(tempMaxMarks))/2;
		}
		if(document.getElementById("txtSelectedTestType").value=="SA1")
		{
			MarksObtained=parseInt(UTObtainMarks)+parseInt(tempMaxMarks)+parseInt(OTBAObtainMarks)+parseInt(ASLObtainMarks);
		}
		if(document.getElementById("txtSelectedTestType").value=="SA2")
		{
			MarksObtained=parseInt(UTObtainMarks)+parseInt(tempMaxMarks)+parseInt(OTBAObtainMarks)+parseInt(ASLObtainMarks);
		}
		
		//alert(MarksObtained.toFixed(1));
		//return;
		
		//MarksObtained = parseInt(TotalObtainedMarks);
		MaxMarks = parseInt(document.getElementById(ctrlMaxMarks).value);
		document.getElementById(ctrlTotalMarks).value=MarksObtained;
		
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
						//alert(rows);
			        	arr_row=rows.split(",");
			        	
			        	document.getElementById(ctrlGrade).value=arr_row[0];
			        	document.getElementById(ctrlGradePoint).value=arr_row[1];
			        	
			        							
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
.style6 {
	border-style: solid;
	border-width: 1px;
	border-collapse: collapse;
		font-family: Cambria;
}
.style8 {
	text-align: center;
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
.style9 {
	text-align: center;
	border-style: none;
	border-width: medium;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
	font-size: defulat (size);
}
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
<table class="auto-style29" style="width: 100%; border-collapse:collapse; border-left-width:1px; border-right-width:1px; border-bottom-width:1px" cellpadding="0">
	<form name="frmClassWork" id="frmClassWork" method="post" action="frmBulkReportCardClass6to10.php">	
	<input type="hidden" name="SubmitType" id="SubmitType" value="" class="auto-style5">
	<input type="hidden" name="txtSelectedClass" id="txtSelectedClass" value="<?php echo $SelectedClass; ?>">
	<input type="hidden" name="txtSelectedSubject" id="txtSelectedSubject" value="<?php echo $SelectedSubject; ?>">
	<input type="hidden" name="txtSelectedTestType" id="txtSelectedTestType" value="<?php echo $SelectedTestType; ?>">	
	<input type="hidden" name="MaxMarks" id="MaxMarks" value="<?php echo $MaxMarks;?>" class="auto-style5">
	<input type="hidden" name="MasterClass" id="MasterClass" value="<?php echo $MasterClass;?>">
	
	<tr>
		<td class="auto-style25" style="border-style:solid; border-width:1px; width: 258px; height: 29px">
		<p style="text-align: center">Class: </td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 259px; height: 29px">
		
			<span class="auto-style40">
		
			<!--<select name="cboClass" id="cboClass" onchange="FillSubject();">-->
			</span>
			<?php
			if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
			{
			?>
			<input type="text" name="SelectedClass" id="SelectedClass" value="<?php echo $SelectedClass;?>" readonly="readonly">
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
		<td class="auto-style37" style="border-style:solid; border-width:1px; width: 259px; height: 29px">
		<p style="text-align: center">Subject:</td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 259px; height: 29px">
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
			<input type="text" name="SelectedSubject" id="SelectedSubject" value="<?php echo $SelectedSubject;?>" readonly="readonly">
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
	</tr>
	 
	<tr>
		<td class="auto-style25" style="border-style:solid; border-width:1px; width: 258px">
		<p style="text-align: center">Test Type:</td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 259px">
			<?php
			if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
			{
			?>
			<input type="text" name="SelectedTestType" id="SelectedTestType" value="<?php echo $SelectedTestType;?>" readonly="readonly">
			<?php
			}
			else
			{
			?>
		<select name="cboTestType" id="cboTestType" onclick="GetMaxMarks();" class="auto-style40">
		<option selected="" value="Select One">Select One</option>
		<?php
		while($rsEx=mysql_fetch_row($rsltex))
		{
			$ExamType=$rsEx[0];
		?>
		<option value="<?php echo $ExamType;?>"><?php echo $ExamType;?></option>
		<?php
		}
		?>
		</select>
		<?php
			}
		?>
		</td>
		<td class="auto-style37" style="border-style:solid; border-width:1px; width: 259px">&nbsp;</td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 259px">
		&nbsp;</td>
	</tr>
	
	<tr>
		<td class="style9" colspan="4">
		<input name="btnShow" type="button" value="Show Student" onclick="Javascript:ReloadWithSubject();" style="font-weight: 700"></td>
	</tr>
	<?php
	if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
	{
	?>
	<tr>
		<td class="auto-style22" colspan="4">
		<table width="100%" cellpadding="0" class="style6" cellspacing="0">
			<tr>
				<td style="width: 66px; height: 24px;" class="auto-style33" bgcolor="#95C23D">
				Name</td>
				<td style="width: 66px; height: 24px;" class="auto-style33" bgcolor="#95C23D">
				Roll No</td>
				<td style="width: 66px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				UT</td>
				<td style="width: 66px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				A1</td>
				<td style="width: 67px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				A2</td>
				<td style="width: 67px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				A3</td>
				<td style="width: 67px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				OTBA</td>
				<td style="width: 67px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				ASL</td>
				<td style="width: 126px; height: 24px;" class="auto-style39" bgcolor="#95C23D">Max. Marks</td>
				<td style="width: 127px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				Obtained</td>
				<td style="width: 127px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				Grade</td>
				<td style="width: 127px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				Grade Points</td>
			</tr>
			<?php
				$Cnt=1;
				while($row = mysql_fetch_assoc($rs))
   				{
   				
   					$StudentName=$row['sname'];
   					$StudentRollNo=$row['srollno'];
   					$StudentAdmission=$row['sadmission'];
   					
   					$ssql="SELECT `subject`,`evaluation`,`elective`,`UT`,`Activity1`,`Activity2`,`Activity3`,`OTBA`,`ASL`,`MaxMarks` FROM `subject_master` WHERE `class`='$SelectedClass' and `subject`='$SelectedSubject' and `exam_type`='$SelectedTestType' and `evaluation`='Y' and `elective`='N'";
					$ssql=$ssql ." union ";
					$ssql=$ssql ."SELECT `subject`,`evaluation`,`elective`,`UT`,`Activity1`,`Activity2`,`Activity3`,`OTBA`,`ASL`,`MaxMarks` FROM `subject_master` WHERE `class`='$SelectedClass' and `subject`='$SelectedSubject' and `exam_type`='$SelectedTestType' and `evaluation`='Y' and `elective`='Y' and ";
					$ssql=$ssql ."`subject` in (select distinct `subject` from `student_elective_mapping` where `class`='$SelectedClass' and `srollno`='$RollNo' and `subject`='$SelectedSubject' and `evaluation`='Y' and `elective`='Y')";
					$rsD= mysql_query($ssql);
					
						$UTMaxMarks="";
	   					$A1MaxMarks="";
	   					$A2MaxMarks="";
	   					$A3MaxMarks="";
	   					$OTBAMaxMarks="";
	   					$ASLMaxMarks="";
	   					$MaxMarks="";
	   				if (mysql_num_rows($rsD) > 0)
	   				{	
						while($row1 = mysql_fetch_assoc($rsD))
	   					{
		   					$UTMaxMarks=$row1['UT'];
		   					$A1MaxMarks=$row1['Activity1'];
		   					$A2MaxMarks=$row1['Activity2'];
		   					$A3MaxMarks=$row1['Activity3'];
		   					$OTBAMaxMarks=$row1['OTBA'];
		   					$ASLMaxMarks=$row1['ASL'];
		   					$MaxMarks=$row1['MaxMarks'];   					
		   					break;
		   				}
		   				$ssql="select `remarks`,`marks`,`Grade`,`GradePoint`,`UT`,`A1`,`A2`,`A3`,`OTBA`,`ASL` from `report_card` where `sname`='$StudentName' and `sclass`='$SelectedClass' and `srollno`='$StudentRollNo' and `subject`='$SelectedSubject' and `testtype`='$SelectedTestType'";
		   				$rsReportCard= mysql_query($ssql);
		   						$Filledremarks="";
		   						$Filledmarks="";
		   						$FilledGrade="";
		   						$FilledGradePoint="";	
		   						$FilledUT="";	
		   						$FilledA1="";	
		   						$FilledA2="";	
		   						$FilledA3="";	
		   						$FilledOTBA="";	
		   						$FilledASL="";						
		   				if (mysql_num_rows($rsReportCard) > 0)
	   					{	
							while($row2 = mysql_fetch_assoc($rsReportCard))
		   					{
		   						$Filledremarks=$row2['remarks'];
		   						$Filledmarks=$row2['marks'];
		   						$FilledGrade=$row2['Grade'];
		   						$FilledGradePoint=$row2['GradePoint'];
		   						
		   						$FilledUT=$row2['UT'];	
		   						$FilledA1=$row2['A1'];
		   						$FilledA2=$row2['A2'];
		   						$FilledA3=$row2['A3'];
		   						$FilledOTBA=$row2['OTBA'];
		   						$FilledASL=$row2['ASL'];
		   						break;
		   					}
		   				}

		   				
   					
			?>
			<input type="hidden" name="hsadmission<?php echo $Cnt; ?>" id="hsadmission<?php echo $Cnt; ?>" value="<?php echo $StudentAdmission;?>">
			<tr>
				<td style="width: 66px; height: 31px;" class="style8">
		
			<input name="txtStudentName<?php echo $Cnt; ?>" id="txtStudentName<?php echo $Cnt;?>" type="text" style="width: 140px" value="<?php echo $StudentName; ?>" readonly class="auto-style40"></td>
				<td style="width: 66px; height: 31px;" class="style8">
				<input name="txtRollNo<?php echo $Cnt; ?>" id="txtRollNo<?php echo $Cnt; ?>" type="text" style="width: 148px" value="<?php echo $StudentRollNo; ?>" readonly="readonly" class="auto-style40"></td>
				<td style="width: 66px; height: 31px;" class="style8">
		<input type="text" name="txtUT<?php echo $Cnt; ?>" id="txtUT<?php echo $Cnt; ?>" size="15" onkeyup="Javascript:GetGrade('<?php echo $Cnt; ?>');" class="auto-style40" style="width: 35px" value="<?php echo $FilledUT;?>">
		<input type="hidden" name="UTMaxMarks<?php echo $Cnt; ?>" id="UTMaxMarks<?php echo $Cnt; ?>" value="<?php echo $UTMaxMarks;?>">
				/<?php echo $UTMaxMarks;?>
		</td>
				<td style="width: 66px; height: 31px;" class="style8">
		<input name="txtA1<?php echo $Cnt; ?>" id="txtA1<?php echo $Cnt; ?>" type="text" size="15" style="width: 35px" onkeyup="Javascript:GetGrade('<?php echo $Cnt; ?>');" value="<?php echo $FilledA1;?>">
		<input type="hidden" name="A1MaxMarks<?php echo $Cnt; ?>" id="A1MaxMarks<?php echo $Cnt; ?>" value="<?php echo $A1MaxMarks;?>">/<?php echo $A1MaxMarks;?>
		</td>
				<td style="width: 67px; height: 31px;" class="style8">
		<input name="txtA2<?php echo $Cnt; ?>" id="txtA2<?php echo $Cnt; ?>" type="text" size="15" style="width: 35px" onkeyup="Javascript:GetGrade('<?php echo $Cnt; ?>');" value="<?php echo $FilledA2;?>">
		<input type="hidden" name="A2MaxMarks<?php echo $Cnt; ?>" id="A2MaxMarks<?php echo $Cnt; ?>" value="<?php echo $A2MaxMarks;?>">/<?php echo $A2MaxMarks;?>
		</td>
				<td style="width: 67px; height: 31px;" class="style8">
		<input name="txtA3<?php echo $Cnt; ?>" id="txtA3<?php echo $Cnt; ?>" type="text" size="15" style="width: 35px" value="<?php echo $FilledA3;?>" onkeyup="Javascript:GetGrade('<?php echo $Cnt; ?>');" <?php if ($A3MaxMarks ==0) {?>readonly="readonly" <?php } ?> >
		<input type="hidden" name="A3MaxMarks<?php echo $Cnt; ?>" id="A3MaxMarks<?php echo $Cnt; ?>" value="<?php echo $A3MaxMarks;?>">/<?php echo $A3MaxMarks;?>
		</td>
				<td style="width: 67px; height: 31px;" class="style8">
		<input name="txtOTBA<?php echo $Cnt; ?>" id="txtOTBA<?php echo $Cnt; ?>" type="text" size="15" value="<?php echo $FilledOTBA;?>" style="width: 35px" <?php if ($OTBAMaxMarks =="" || $OTBAMaxMarks =="0") { ?>readonly="readonly" <?php } ?> onkeyup="Javascript:GetGrade('<?php echo $Cnt; ?>');">
		<input type="hidden" name="OTBAMaxMarks<?php echo $Cnt; ?>" id="OTBAMaxMarks<?php echo $Cnt; ?>" value="<?php echo $OTBAMaxMarks;?>">/<?php echo $OTBAMaxMarks;?>
		</td>
				<td style="width: 67px; height: 31px;" class="style8">
		<input name="txtASL<?php echo $Cnt; ?>" id="txtASL<?php echo $Cnt; ?>" type="text" size="15" value="<?php echo $FilledASL;?>" style="width: 35px" <?php if ($ASLMaxMarks == "" || $ASLMaxMarks == "0") { ?>readonly="readonly" <?php } ?> onkeyup="Javascript:GetGrade('<?php echo $Cnt; ?>');">
		<input type="hidden" name="ASLMaxMarks<?php echo $Cnt; ?>" id="ASLMaxMarks<?php echo $Cnt; ?>" value="<?php echo $ASLMaxMarks;?>">/<?php echo $ASLMaxMarks;?>
		</td>
				<td style="width: 126px; height: 31px;" class="style8">
				<input name="txtMaxMarks<?php echo $Cnt; ?>" id="txtMaxMarks<?php echo $Cnt; ?>" type="text" readonly class="auto-style40" style="width: 136px" value="<?php echo $MaxMarks; ?>"></td>
				<td style="width: 127px; height: 31px;" class="style8">
				<input name="txtTotalMarks<?php echo $Cnt; ?>" id="txtTotalMarks<?php echo $Cnt; ?>" type="text" class="auto-style40" style="width: 73; height:21" value="<?php echo $Filledmarks;?>" readonly="readonly"></td>
				<td style="width: 127px; height: 31px;" class="style8">
				<input name="txtGrd<?php echo $Cnt; ?>" id="txtGrd<?php echo $Cnt; ?>" type="text" readonly class="auto-style40" style="width: 138px" value="<?php echo $FilledGrade;?>"></td>
				<td style="width: 127px; height: 31px;" class="auto-style2">
				<input name="txtGradePoint<?php echo $Cnt; ?>" id="txtGradePoint<?php echo $Cnt; ?>" type="text" readonly class="auto-style40" style="width: 138px" value="<?php echo $FilledGradePoint;?>"></td>
			</tr>
			<?php
				$Cnt = $Cnt+1;	
				}//End of If Condition			
			}//End of whiile Loop
			?>
			<input type="hidden" name="totalSubject" id="totalSubject" value="<?php echo $Cnt; ?>" class="auto-style40">
			</table>
		</td>
	</tr>
	
	<tr>
		<td class="auto-style23" colspan="4">
		<input name="Submit" type="button" value="Submit" onclick="Javascript:Validate();" class="auto-style40" style="font-weight: 700"></td>
	</tr>
	<?php
	}
	?>
	</form>
</table>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>

</div>
</body>

</html>