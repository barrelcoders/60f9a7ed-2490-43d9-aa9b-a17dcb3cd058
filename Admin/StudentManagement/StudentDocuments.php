<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php
if($_REQUEST["txtAdmissionNo"] !="")
{
	$AdmissionNo=$_REQUEST["txtAdmissionNo"];
	$Name=$_REQUEST["txtName"];
	$Class=$_REQUEST["txtClass"];
	$RollNo=$_REQUEST["txtRollNo"];
	$DocFileName=$_FILES["file"]["name"];
	
	$DocType1=$_REQUEST["cboDocumentType1"];
	$DocType2=$_REQUEST["cboDocumentType2"];
	$DocType3=$_REQUEST["cboDocumentType3"];
	$DocType4=$_REQUEST["cboDocumentType4"];
	$DocType5=$_REQUEST["cboDocumentType5"];
	
	$DocName1=$_REQUEST["cboDocument1"];
	$DocName2=$_REQUEST["cboDocument2"];
	$DocName3=$_REQUEST["cboDocument3"];
	$DocName4=$_REQUEST["cboDocument4"];
	$DocName5=$_REQUEST["cboDocument5"];
	if ($DocType1 != "")
	{
		$ssql="insert into `StudentDocument_URL` (`AdmissionNo`,`Name`,`Class`,`RollNo`,`DocumentType`,`DocumentName`,`DocumentURL`) values ('$AdmissionNo','$Name','$Class','$RollNo','$DocType1','$DocName1','$DocFileName')";
		mysql_query($ssql) or die(mysql_error());
	}
	if ($DocType2 != "")
	{
		$ssql="insert into `StudentDocument_URL` (`AdmissionNo`,`Name`,`Class`,`RollNo`,`DocumentType`,`DocumentName`,`DocumentURL`) values ('$AdmissionNo','$Name','$Class','$RollNo','$DocType2','$DocName2','$DocFileName')";
		mysql_query($ssql) or die(mysql_error());
	}
	if ($DocType3 != "")
	{
		$ssql="insert into `StudentDocument_URL` (`AdmissionNo`,`Name`,`Class`,`RollNo`,`DocumentType`,`DocumentName`,`DocumentURL`) values ('$AdmissionNo','$Name','$Class','$RollNo','$DocType3','$DocName3','$DocFileName')";
		mysql_query($ssql) or die(mysql_error());
	}
	if ($DocType4 != "")
	{
		$ssql="insert into `StudentDocument_URL` (`AdmissionNo`,`Name`,`Class`,`RollNo`,`DocumentType`,`DocumentName`,`DocumentURL`) values ('$AdmissionNo','$Name','$Class','$RollNo','$DocType4','$DocName4','$DocFileName')";
		mysql_query($ssql) or die(mysql_error());
	}
	if ($DocType5 != "")
	{
		$ssql="insert into `StudentDocument_URL` (`AdmissionNo`,`Name`,`Class`,`RollNo`,`DocumentType`,`DocumentName`,`DocumentURL`) values ('$AdmissionNo','$Name','$Class','$RollNo','$DocType5','$DocName5','$DocFileName')";
		mysql_query($ssql) or die(mysql_error());
	}
	
	//$extension = end(explode(".", $_FILES["file"]["name"]));
	
	move_uploaded_file($_FILES["file"]["tmp_name"],"StudentDocuments/" . $_FILES["file"]["name"]);
	
	$ssql="UPDATE `student_master` SET `DocumentFileName`='$DocFileName' where `sadmission`='$AdmissionNo'";
	mysql_query($ssql) or die(mysql_error());
	
	
	$Message="Student document has been successfully uploaded!";
}

$sql = "SELECT distinct `DocumentType` FROM `StudentDocument_Type` where `Status`='Active'";
$rsDocType = mysql_query($sql, $Con);
$rsDocType1 = mysql_query($sql, $Con);
$rsDocType2 = mysql_query($sql, $Con);
$rsDocType3 = mysql_query($sql, $Con);
$rsDocType4 = mysql_query($sql, $Con);
				
$sql = "SELECT distinct `DocumentName` FROM `StudentDocument_Name` where `Status`='Active'";
$rsDocName = mysql_query($sql, $Con);
$rsDocName1 = mysql_query($sql, $Con);
$rsDocName2 = mysql_query($sql, $Con);
$rsDocName3 = mysql_query($sql, $Con);
$rsDocName4 = mysql_query($sql, $Con);
				/*
				while($row = mysql_fetch_row($rsDocName))
				{
   					$DocName=$row[0];
   				} 
   				*/  				
?>
<script language="javascript">
	function GetStudentDetail()
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
			        	document.getElementById("txtName").value=arr_row[0];
			        	document.getElementById("txtClass").value=arr_row[1];
			        	document.getElementById("txtRollNo").value=arr_row[2];
			        }
		      }
			
			var submiturl="GetStudentDetail.php?AdmissionId=" + document.getElementById("txtAdmissionNo").value;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
	}
	function Validate()
	{
		if(document.getElementById("txtName").value=="")
		{
			alert("Please enter valid student!");
			return;
		}
		if(document.getElementById("cboDocumentType1").value != "" && document.getElementById("cboDocument1").value == "") 
		{
			alert("Please select Document!");
			return;
		}
		if(document.getElementById("cboDocumentType2").value != "" && document.getElementById("cboDocument2").value == "") 
		{
			alert("Please select Document!");
			return;
		}
		if(document.getElementById("cboDocumentType3").value != "" && document.getElementById("cboDocument3").value == "") 
		{
			alert("Please select Document!");
			return;
		}
		if(document.getElementById("cboDocumentType4").value != "" && document.getElementById("cboDocument4").value == "") 
		{
			alert("Please select Document!");
			return;
		}
		if(document.getElementById("cboDocumentType5").value != "" && document.getElementById("cboDocument5").value == "") 
		{
			alert("Please select Document!");
			return;
		}
		document.getElementById("frmStudentDocument").submit();
	}
</script>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Upload Student Documents</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

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

<!--
}
.style1 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}
.style2 {
	color: #000000;
}
.style2 {
	font-family: Cambria;
}
.style3 {
	font-family: Cambria;
	color: #CC3300;
}
-->
</style>
</head>

<body>
				&nbsp;<p><strong><font face="Cambria">Upload Student Documents</font></strong></p>
				<hr>			
				<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">

<img height="30" src="emeraldsis.com/Admin/images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>
<form name="frmStudentDocument" id="frmStudentDocument" method="post" action="StudentDocuments.php" enctype="multipart/form-data">

				<table cellspacing="0" cellpadding="0" style="width: 100%;" height="40" class="style1">
					<tr>
						<td align="center" height="40" style="border-style: solid; border-width: 1px; width: 132px;" class="style2">
						<strong>Student Adm No.</strong></td>
						<td align="center" height="40" style="border-style: solid; border-width: 1px; width: 132px;">
							<input name="txtAdmissionNo" id="txtAdmissionNo" type="text" class="text-box" value="" size="15" onkeyup="Javascript:GetStudentDetail();" >
						</td>
						<td align="center" height="40" style="border-style: solid; border-width: 1px; width: 132px;">
						<b><font face="Cambria">Name:</font></b></td>
						<td align="center" height="40" style="border-style: solid; border-width: 1px; width: 132px;">
						<input name="txtName" id="txtName" class="text-box" type="text" readonly="readonly" size="17"></td>
						<td align="center" height="40" style="border-style: solid; border-width: 1px; width: 133px;">
						<b><font face="Cambria">Class</font></b></td>
						<td align="center" height="40" style="border-style: solid; border-width: 1px; width: 133px;">
						<input name="txtClass" id="txtClass" type="text" class="text-box" readonly="readonly" size="17"></td>
						<td align="center" height="40" style="border-style: solid; border-width: 1px; width: 133px;">
						<b><font face="Cambria">Roll No</font></b></td>
						<td align="center" height="40" style="border-style: solid; border-width: 1px; width: 133px;">
						<input name="txtRollNo" id="txtRollNo" type="text" class="text-box" readonly="readonly"></td>
					</tr>
					</table>

				<p>&nbsp;</p>

				<table cellspacing="0" cellpadding="0" class="CSSTableGenerator" height="111" >
					<tr>
						<td width="134" align="center" height="22" style="border-style: solid; border-width: 1px" class="style2" bgcolor="#95C23D">
						<b>Sr No</b></td>
						<td width="602" align="center" height="22" style="border-style: solid; border-width: 1px" class="style2" bgcolor="#95C23D">
						<strong>Select Document Type</strong></td>
						<td width="560" align="center" height="22" style="border-style: solid; border-width: 1px" bgcolor="#95C23D">
							&nbsp;<b><font face="Cambria">Select Document</font></b></td>
					</tr>
					<tr>
						<td width="134" align="center" height="28" style="border-style: solid; border-width: 1px" class="style2">
						1</td>
						<td width="602" align="center" height="28" style="border-style: solid; border-width: 1px" class="style2">
						<select size="1" name="cboDocumentType1" id="cboDocumentType1" class="text-box">
						<option value="">Select One</option>
						<?php
							while($row = mysql_fetch_row($rsDocType))
							{
			   					$DocType=$row[0];
			   				
						?>
						<option value="<?php echo $DocType;?>"><?php echo $DocType;?></option>
						<?php
							}
						?>
						</select></td>
						<td width="560" align="center" height="28" style="border-style: solid; border-width: 1px">
							<select size="1" name="cboDocument1" id="cboDocument1" class="text-box">
							<option value="">Select One</option>
							<?php
							while($row = mysql_fetch_row($rsDocName))
							{
			   					$DocName=$row[0];
			   				?>
			   				<option value="<?php echo $DocName;?>"><?php echo $DocName;?></option>
			   				<?php
			   				}
			   				?>
			   				
										</select></td>
					</tr>
					<tr>
						<td width="134" align="center" height="32" style="border-style: solid; border-width: 1px" class="style2">
						2</td>
						<td width="602" align="center" height="32" style="border-style: solid; border-width: 1px" class="style2">
						<select size="1" name="cboDocumentType2" id="cboDocumentType2" class="text-box">
						<option value="">Select One</option>
						<?php
							$DocType="";
							while($row1 = mysql_fetch_row($rsDocType1))
							{
			   					$DocType=$row1[0];
			   				
						?>
						<option value="<?php echo $DocType;?>"><?php echo $DocType;?></option>
						<?php
							}
						?>
						</select></td>
						<td width="560" align="center" height="32" style="border-style: solid; border-width: 1px">
							<select size="1" name="cboDocument2" id="cboDocument2" class="text-box">
							<option value="">Select One</option>
							<?php
							$DocName="";
							while($row = mysql_fetch_row($rsDocName1))
							{
			   					$DocName=$row[0];
			   				?>
			   				<option value="<?php echo $DocName;?>"><?php echo $DocName;?></option>
			   				<?php
			   				}
			   				?>
							</select></td>
					</tr>
					<tr>
						<td width="134" align="center" height="32" style="border-style: solid; border-width: 1px" class="style2">
						3</td>
						<td width="602" align="center" height="32" style="border-style: solid; border-width: 1px" class="style2">
						<select size="1" name="cboDocumentType3" id="cboDocumentType3" class="text-box">
						<option value="">Select One</option>
						<?php
							$DocType="";
							while($row2 = mysql_fetch_row($rsDocType2))
							{
			   					$DocType=$row2[0];
			   				
						?>
						<option value="<?php echo $DocType;?>"><?php echo $DocType;?></option>
						<?php
							}
						?>
						</select></td>
						<td width="560" align="center" height="32" style="border-style: solid; border-width: 1px">
							<select size="1" name="cboDocument3" id="cboDocument3" class="text-box">
							<option value="">Select One</option>
							<?php
							$DocName="";
							while($row = mysql_fetch_row($rsDocName2))
							{
			   					$DocName=$row[0];
			   				?>
			   				<option value="<?php echo $DocName;?>"><?php echo $DocName;?></option>
			   				<?php
			   				}
			   				?>
							</select></td>
					</tr>
					<tr>
						<td width="134" align="center" height="32" style="border-style: solid; border-width: 1px" class="style2">
						4</td>
						<td width="602" align="center" height="32" style="border-style: solid; border-width: 1px" class="style2">
						<select size="1" name="cboDocumentType4" id="cboDocumentType4" class="text-box">
						<option value="">Select One</option>
						<?php
							$DocType="";
							while($row3 = mysql_fetch_row($rsDocType3))
							{
			   					$DocType=$row3[0];
			   				
						?>
						<option value="<?php echo $DocType;?>"><?php echo $DocType;?></option>
						<?php
							}
						?>
						</select>
						</td>
						<td width="560" align="center" height="32" style="border-style: solid; border-width: 1px">
							<select size="1" name="cboDocument4" id="cboDocument4" class="text-box">
							<option value="">Select One</option>
							<?php
							$DocName="";
							while($row = mysql_fetch_row($rsDocName3))
							{
			   					$DocName=$row[0];
			   				?>
			   				<option value="<?php echo $DocName;?>"><?php echo $DocName;?></option>
			   				<?php
			   				}
			   				?>
							</select></td>
					</tr>
					<tr>
						<td width="134" align="center" height="32" style="border-style: solid; border-width: 1px" class="style2">
						5</td>
						<td width="602" align="center" height="32" style="border-style: solid; border-width: 1px" class="style2">
						<select size="1" name="cboDocumentType5" id="cboDocumentType5" class="text-box">
						<option value="">Select One</option>
						<?php
							$DocType="";
							while($row4 = mysql_fetch_row($rsDocType4))
							{
			   					$DocType=$row4[0];
			   				
						?>
						<option value="<?php echo $DocType;?>"><?php echo $DocType;?></option>
						<?php
							}
						?>
						</select></td>
						<td width="560" align="center" height="32" style="border-style: solid; border-width: 1px">
							<select size="1" name="cboDocument5" id="cboDocument5" class="text-box">
							<option value="">Select One</option>
							<?php
							$DocName="";
							while($row = mysql_fetch_row($rsDocName4))
							{
			   					$DocName=$row[0];
			   				?>
			   				<option value="<?php echo $DocName;?>"><?php echo $DocName;?></option>
			   				<?php
			   				}
			   				?>
							</select></td>
					</tr>
					</table>

				<p><b><font face="Cambria">&nbsp; </font></b></p>
				
					<p><b><font face="Cambria">Upload Scanned Document File:
					</font></b>
					<input type="file" name="file" size="20" class="text-box"></p>
				
				<p align="center">
		<input name="btnSubmit" type="button" class="text-box"value="Submit" onclick="Javascript:Validate();"></p>
<p align="center" class="style3"><strong><?php echo $Message;?></strong></p>
</form>
<?php include"footer.php";?>
<!--<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>-->
</body>

</html>
