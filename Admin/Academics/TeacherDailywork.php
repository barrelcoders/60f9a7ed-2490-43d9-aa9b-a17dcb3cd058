<?php
session_start();
include '../../connection.php';
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
if($_REQUEST["cboClass"] !="")
{
	$Dt = $_REQUEST["txtDate"];
	$arr=explode('/',$Dt);
	$SelectedDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];

	$SelectedClass=$_REQUEST["cboClass"];
	$SelectedSubject=$_REQUEST["cboSubject"];
	
	$Classwork=$_REQUEST["txtClassWork"];
	$Homework=$_REQUEST["txtHomeWork"];
	
	$ssql="INSERT INTO `classwork_master` (`sclass`,`subject`,`classworkdate`,`classwork`) VALUES ('$SelectedClass','$SelectedSubject','$SelectedDate','$Classwork')";
	mysql_query($ssql) or die(mysql_error());
	
	$ssql="INSERT INTO `homework_master` (`sclass`,`subject`,`homeworkdate`,`homework`) VALUES ('$SelectedClass','$SelectedSubject','$SelectedDate','$Homework')";
	mysql_query($ssql) or die(mysql_error());
	$Msg="Classwork / Homework submitted successfully!";
}
?>
<!DOCTYPE html>

<script language="javascript">
function Validate()
{
	if(document.getElementById("txtDate").value=="")
	{
		alert("Please select date!");
		return;
	}
	if(document.getElementById("cboClass").value=="")
	{
		alert("Please select class!");
		return;
	}
	if(document.getElementById("cboSubject").value=="")
	{
		alert("Please select subject!");
		return;
	}
	
	document.getElementById("frmHomeWork").submit();
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
			        	removeAllOptions(document.frmHomeWork.cboSubject);
			        	//document.getElementById("txtName").value="";
			        	addOption(document.frmHomeWork.cboSubject,"Select One","Select One")
			        	arr_row=rows.split(",");
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmHomeWork.cboSubject,arr_row[row_count],arr_row[row_count])			        			 
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
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../mPortal/bootstrap.min.css">
	<style type="text/css">
.style1 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}
.style2 {
	text-align: center;
}
.style3 {
	text-align: center;
	color: #CC3300;
}
</style>
</head>
<title>Student Registration</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>
<body>

<table width="100%" cellspacing="0" cellpadding="0" class="style1">
	<form name="frmHomeWork" id="frmHomeWork" method="post" action="">
	<tr>
		<td colspan="2">
		<p align="center"><b><font face="Cambria">Upload Class work / Homework</font></b></td>
	</tr>
	<tr>
		<td width="100%" colspan="2" class="style3"><strong><?php echo $Msg; ?></strong></td>
	</tr>
	<tr>
		<td width="50%"><b><font face="Cambria">Select Date</font></b></td>
		<td width="50%"><input type="text" name="txtDate" id="txtDate" size="20" class="tcal"></td>
	</tr>
	<tr>
		<td width="50%"><b><font face="Cambria">Select Class</font></b></td>
		<td width="50%">
		
			<select name="cboClass" id="cboClass" onchange="Javascript:FillSubject();">
			<option selected="" value="Select One">Select One</option>
			<?php
		while($row = mysql_fetch_row($rsClass))
		{
			$ClassFromClassMaster=$row[0];
		?>		
		<option value="<?php echo $ClassFromClassMaster; ?>"><?php echo $ClassFromClassMaster; ?></option>
		<?php
		}
		?>
			</select>
		</td>
	</tr>
	<tr>
		<td width="50%"><b><font face="Cambria">Select Subject</font></b></td>
		<td width="50%"><select name="cboSubject">
		<option selected="" value="Select One">Select One</option>
		</select></td>
	</tr>
	<tr>
		<td colspan="2"><font face="Cambria"><b>Classwork</b> : </font>
		<textarea rows="4" name="txtClassWork" id="txtClassWork" style="width: 100%"></textarea></td>
	</tr>
	<tr>
		<td colspan="2"><font face="Cambria"><b>Homework</b> : </font>
		<textarea rows="5" name="txtHomeWork" id="txtHomeWork" cols="100%" style="width: 100%"></textarea></td>
	</tr>
	<tr>
		<td colspan="2" class="style2">
		<input name="btnSave" type="button" value="Save" onclick="Javascript:Validate();"></td>
	</tr>
	</form>
</table>
</body>
</html>
