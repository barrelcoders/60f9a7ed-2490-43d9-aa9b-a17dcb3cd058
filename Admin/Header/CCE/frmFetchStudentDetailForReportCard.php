<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
   $sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   
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
	if (document.getElementById("cboTerm").value=="Select One")
	{
		alert("Please select Term!");
		return;
	}
	
	if (document.getElementById("cboTerm").value=="Term1")
	{
		document.getElementById("frmClassWork").action="FinalReportcardTerm1.php";
	}
	else
	{
		document.getElementById("frmClassWork").action="FinalReportcard.php";
	}

	
	//document.getElementById("frmClassWork").action="FinalReportcard.php";
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
</script>
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
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
        font-family: Calibri;
        font-weight:bold;
}

</style>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enter Student Marks</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>

</head>

<body>

<p>&nbsp;</p>

<table style="width: 100%" class="style1">
	
	<tr>
		<td class="auto-style7" colspan="2">

				<div class="auto-style21">

					<font face="Cambria">

					<strong>Approve or Print Final Report Card </strong></font><hr class="auto-style3" style="height: -15px">
				</div>
<p class="auto-style6" style="height: 7px"><font face="Cambria"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
				
				</td>
	</tr>	
	
	<tr>
		<td class="auto-style36" style="width =520px"50%"><font face="Cambria">
		<strong>Select Student to View Details</strong></font></td>
		<td class="auto-style4" width="521">&nbsp;</td>
	</tr>	</table>	
<table class="auto-style29" style="width: 100%; border-collapse:collapse" cellpadding="0" border="1">
	<form name="frmClassWork" id="frmClassWork" method="post" action="FinalReportcard.php">	
			<font face="Cambria">	
			<input type="hidden" name="totalSubject" id="totalSubject" value="<?php echo $Cnt; ?>" class="auto-style40">
	<input type="hidden" name="SubmitType" id="SubmitType" value="yes" class="auto-style5">		
	<input type="hidden" name="MaxMarks" id="MaxMarks" value="" class="auto-style5">
	<input type="hidden" name="txtAdmissionId" id="txtAdmissionId" value="">
			</font>
	<tr>
		<td class="auto-style25" style="border-style:solid; border-width:1px; width: 171px; height: 29px">
		<p align="center">
		<font face="Cambria">Class: </font> </td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 385px; height: 29px">
		
			<font face="Cambria"><span class="auto-style40">
		
			<!--<select name="cboClass" id="cboClass" onchange="FillSubject();">-->
			</span><select name="cboClass" id="cboClass" class="auto-style40">
			<option selected="" value="Select One">Select One</option>
			<?php
				while($row = mysql_fetch_assoc($result))
   				{
   					$class=$row['class'];
			?>
			<option value="<?php echo $class; ?>" <?php if ($class==$SelectedClass) { echo "selected"; } ?> ><?php echo $class; ?>
			</option>
			<?php
				}
			?></select><span class="auto-style40"> </span></font>
		</td>
		<td class="auto-style37" style="border-style:solid; border-width:1px; width: 273px; height: 29px">
		<p align="center">
		<font face="Cambria">Roll No:</font></td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 319px; height: 29px">
		<span class="auto-style40">
		</span>
		<font face="Cambria">
		<input name="txtRollNo" id="txtRollNo" type="text" onkeyup="GetStudentName();" value="<?php echo $RollNo; ?>" class="auto-style40"></font></td>
	</tr>
	 
	<tr>
		<td class="auto-style25" style="border-style:solid; border-width:1px; width: 171px">
		<p align="center">
		<font face="Cambria">Student Name:</font></td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 385px">
		
			<font face="Cambria">
		
			<input name="txtStudentName" id="txtStudentName" type="text" style="width: 242px" value="<?php echo $SelectStudentName; ?>" readonly class="auto-style40"></font></td>
		<td class="auto-style37" style="border-style:solid; border-width:1px; width: 273px">
		<p align="center">
		<font face="Cambria">Term:</font></td>
		<td class="auto-style32" style="border-style:solid; border-width:1px; width: 319px">
		<select name="cboTerm" id="cboTerm" style="height: 22px">
		<option selected="Select One" value="Select One">Select One</option>
		<option value="Term1">Term1</option>
		<option value="Term2">Term2</option>
		</select></td>
	</tr>
	
	<tr>
		<td class="auto-style23" colspan="4">
		<p align="center"><font face="Cambria">
		<input name="Submit" type="button" value="View Report Card" onclick="Javascript:Validate();" class="auto-style40" style="width: 128; height:25; font-weight:700"></font></td>
	</tr>
	</form>
</table>


<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>
</div>
</body>

</html>