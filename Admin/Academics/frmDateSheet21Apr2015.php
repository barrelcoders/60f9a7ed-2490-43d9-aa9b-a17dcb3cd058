<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

include '../../AppConf.';

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
	if (document.getElementById("cboTestType").value=="Select One")
	{
		alert("Please select Test Type !");
		return;
	}
	
	document.getElementById("frmClassWork").action="SubmitfrmDateSheet.php";
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
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Date Sheet</title>
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

.style5 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
}
.style6 {
	border-collapse: collapse;
}
.style7 {
	text-align: right;
}
.style8 {
	text-align: center;
}
</style>
</head>

<body>

<p>&nbsp;</p>
<p><font face="Cambria" style="font-size: 12pt"><u><b>Upload Exam Datesheet</b></u></font></p>
<hr>
<p>

<font face="Cambria">
<a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></a></font></p>
<p>&nbsp;</p>

<table style="width: 100%" class="style1" cellspacing="0" cellpadding="0">
	
	<tr>
		<td class="style4" colspan="4" style="text-align: center; border-style: solid; border-width: 1px; background-color:#95C23D">Upload Date Sheet</td>		
		<td class="style4" colspan="4" style="text-align: center; border-style: solid; border-width: 1px; " width="50%"><a href="UploadDateSheet.php">
		<span style="text-decoration: none"><font color="#000000">View Previous Uploaded Date Sheet Details</font></span></a></td>		
	</tr></table>		
<table style="border-width:1px; border-collapse:collapse" cellpadding="0" width="100%">		<form name="frmClassWork" id="frmClassWork" method="post" action="frmDateSheet.php">	<input type="hidden" name="SubmitType" id="SubmitType" value="">	
	<tr>
		<td class="style3" style="width: 307px">
		<p style="text-align: center">
		<font face="Cambria" style="font-size: 11pt">Class: </font> </td>
		<td class="style2" style="width: 311px">
		
			<!--<select name="cboClass" id="cboClass" onchange="FillSubject();">-->
			<select name="cboClass" id="cboClass" onchange="ReloadWithSubject();">
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
		</td>
		<td class="style3" style="width: 311px">
		<p style="text-align: center">
		<font face="Cambria" style="font-size: 11pt">Test Type:</font></td>
		<td class="style2" style="width: 309px">
		<!--
		<select name="cboSubject" id="cboSubject">
		<option></option>
		<option selected="" value="Select One">Select One</option>
		</select>
		-->
		<select name="cboTestType" id="cboTestType">
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
		<td class="style3" colspan="4" style="border-bottom-style: none; border-bottom-width: medium">
		<table width="1239" border="1" cellpadding="0" class="style6" style="border-width: 0px" height="91">
			
			<tr>
				<td style="height: 36px; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium" class="style7" colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td style="height: 22px; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium" class="style7" width="619">
				<p style="text-align: center"><font face="Cambria">
				<b>Subject</b></font></td>
				<td style="height: 22px; border-top-style:none; border-top-width:medium" class="style8" width="620">
				<font face="Cambria">
				<b>Date</b></font></td>
			</tr>
			<?php
				$Cnt=1;
				while($row = mysql_fetch_assoc($rs))
   				{
   				
   					$Subject=$row['subject'];
   					
			?>
			<tr>
				<td style="height: 34px; border-left-style:none; border-left-width:medium" class="style7" width="619">
				<p style="text-align: center">
				<input name="txtName<?php echo $Cnt; ?>" id="txtName<?php echo $Cnt; ?>" type="text" style="width: 148px" value="<?php echo $Subject; ?>" readonly="readonly"></td>
				<td style="height: 34px" class="style8" width="620">
		<input type="text" name="txtDate<?php echo $Cnt; ?>" id="txtDate<?php echo $Cnt; ?>" size="15" value="Select Date" class="tcal" style="font-family: Arial; color: #000000"></td>
			</tr>
			<?php
				$Cnt = $Cnt+1;
			}
			?>
			<input type="hidden" name="totalSubject" id="totalSubject" value="<?php echo $Cnt; ?>">
			
		</table>
		</td>
	</tr>
	<tr>
		<td class="style5" colspan="4" style="border-style: none; border-width: medium">
		&nbsp;</td>
	</tr>
	<tr>
		<td class="style5" colspan="4" style="border-style: none; border-width: medium">
		<input name="Submit" type="button" value="Submit" onclick="Javascript:Validate();" style="font-weight: 700"></td>
	</tr>
	</form>
</table>

</body>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>

</html>