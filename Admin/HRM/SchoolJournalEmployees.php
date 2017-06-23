<?php 
include '../connection.php';
include '../AppConf.php';

?>
<?php

session_start();
$class=$_SESSION['StudentClass'];
$sadmission=$_SESSION['userid'];

	if($sadmission== "")
	{
		echo "<br><br><center><b>You are not logged-in!<br>Please click <a href='http://dpsfsis.com/'>here</a> to login into parent portal!";
		exit();
	}

	
		if($_REQUEST["isSubmit"]=="yes")
		{
			  
			  $sadmission=$_POST['admissionno'];
			  $sname=$_POST['name'];
			  $sclass=$_POST['class'];
			  $srollno=$_POST['rollno'];
			  $Description=$_POST['txtDescription'];
			  
			  $t=time();				
			  $extension = end(explode(".", $_FILES["F1"]["name"]));
			  
			  $ArticleName="";
			  if($_FILES["F1"]["name"] !="")
			  {
			      $ArticleName="ArticleName".$t.$_FILES["F1"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F1"]["tmp_name"],"../SchoolJournelArticles/ArticleName".$t.$_FILES["F1"]["name"]);
		      
		      mysql_query("INSERT INTO `School_Journal`(`sadmission`, `sname`, `sclass`, `srollno`,`JournalDescription`,`JournalName`) VALUES('$sadmission','$sname','$sclass','$srollno','$Description','$ArticleName')");
		      echo "<br><br><center><b>Article Uploaded Successfully!<br>Click <a href='javascript:window.close();'>here</a> to close window";
		 }
		      
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select File</title>
<script language="javascript" type="text/javascript">


function sname()
{
	
	var itm;
	try
	{
		itm = new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			itm = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
			itm = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("Your Browser Broke!");
				return false;
			}
		}
	}
	
	itm.onreadystatechange=function()
		      {
			      if(itm.readyState==4)
			        {
						var rows="";
			        	rows=new String(itm.responseText);
			        	arr_row=rows.split(",");
			        	document.getElementById('name').value=arr_row[0];
						document.getElementById('clas').value=arr_row[1];       	 
						document.getElementById('roll').value=arr_row[2];
						document.getElementById('user').value=arr_row[3];
						document.getElementById('pass').value=arr_row[4];       	 
			        }
		      }
			
			var submiturl="get_info2.php?c=" + document.getElementById('adm').value;
			itm.open("GET", submiturl,true);
			itm.send(null);
}



</script>


	

<style type="text/css">
.style1 {
	border-collapse: collapse;
}
.style2 {
	text-align: right;
	font-family: Cambria;
}
.style3 {
	text-align: center;
}
</style>
<link rel="stylesheet" type="text/css" href="../tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<script type="text/javascript" src="../tcal.js"></script>

</head>

<body>
<table width="100%">
<tr>
<td>
<h1 align="center"><b><font face="cambria">
<img src="<?php echo $SchoolLogo; ?>" height="80" width="360"></font></b></h1>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b></font>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b></font>
</td>
</tr>
<tr>
<td align="center">
<u><b><font face="Cambria">Contribution To School Annual Journal : 2016 -17</font></b></u></td>
</tr>
<tr>
<td align="center">
<p align="left"><u><b><font face="Cambria">Instructions:</font></b></u></p>
<p align="left"><font face="Cambria">1. Photographs must be uploaded in jpeg, 
jpg, png format only</font></p>
<p align="left"><font face="Cambria">2. You can upload your article in any form 
including pdf files, jpegs, word document, xls file, etc.. </font></p></td>
</tr>
<tr>
<td align="center">
&nbsp;</td>
</tr>
</table>
<table style="width: 100%" class="style1">
<form name="frmUpload" id="frmUpload" method="post" action="SchoolJournal.php" enctype="multipart/form-data">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<tr>
		  <td align="center" >
			<b><font face="Cambria">Employee ID</font></b></td>
		  <td align="center" >
			<font face="Cambria">
			<input name="admissionno" id="adm" onkeyup="javascript:sname();" class="textbox"/></font></td>
		  <td align="center">
			<b><font face="Cambria">Name</font></b></td>
		  <td align="center" >
			<font face="Cambria">
			<input name="name" id="name" class="textbox" /></font></td>
		  <td align="center" >
			<b><font face="Cambria">Department</font></b></td>
		  <td align="center" colspan="2">
			<font face="Cambria">
			<input name="class" id="clas" class="textbox"/></font></td>
 	</tr>
	<tr>
		<td class="style2" colspan="7">&nbsp;</td>
	</tr>
	<tr>
		<td class="style2" colspan="6">
		<p style="text-align: left">1. Please provide a photograph in Summer 
		Uniform, against dark green background :</td>
		<td class="style2"><font face="Cambria">
			<input type="file" name="F1" size="20" style="float: left; font-weight: 700" ></font></td>
	</tr>
	<tr>
		<td class="style2" colspan="6">
		<p style="text-align: left">2. Details and photographs of achievement in 
		sports, Music, Art or any other at District, State, National and 
		International level</td>
		<td class="style2">
		<p style="text-align: left"><font face="Cambria">
			<input type="file" name="F2" size="20" style="float: left; font-weight: 700"></font></td>
	</tr>
	<tr>
		<td class="style2" colspan="6">
		<p style="text-align: left">3. Contribution for the magazine in the form 
		of poems, articles, puzzles, short stories in English, Hindi, Sanskrit, 
		French, German; paintings, sketches along with a passport size 
		photograph in school uniform</td>
		<td class="style2">
		<p style="text-align: left"><font face="Cambria">
		<textarea rows="2" name="txtDescription" id="txtDescription" cols="20" style="font-weight: 700" class="text-box-address"></textarea></font></td>
	</tr>
	<tr>
		<td colspan="7" class="style3">
		&nbsp;</td>
	</tr>
	<tr>
		<td colspan="7" class="style3">
		<font face="Cambria">
		<input name="Submit1" type="submit" value="Submit" class="text-box"></font></td>
	</tr>
</form>
</table>

</body>

</html>