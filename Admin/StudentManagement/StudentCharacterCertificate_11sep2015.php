<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Character Certificate</title>
<script src="autofil/jquery-1.11.0.js" type="text/javascript"></script>
<script>
function printcontent(e1)
{
	var restorepage=document.body.innerHTML;
	var printcontent=document.getElementById(e1).innerHTML;
	document.body.innerHTML=printcontent;
	window.print(e1); 
	document.body.innerHTML=restorepage;
}
function GetStudentDetails()
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
			        	if(rows !="")
			        	{
				        	arr_row=rows.split(",");
				        	var studetndetail="Name:" + arr_row[0] + ", Class:" + arr_row[1] + ", Roll No:" + arr_row[2];
				        	//rows=rows.replace(","," , ");
				        	document.getElementById("tdStudentDetail").innerHTML ='<font face="Cambria">' + rows + '</font>';
				        }
				        else
				        {
				        	document.getElementById("tdStudentDetail").innerHTML ='<font face="Cambria">' + "" + '</font>';
				        }
						//alert(rows);														
			        }
		      }

			var submiturl="GetStudentDetail.php?AdmissionId=" + document.getElementById("txtsadmission").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
}
function Validate()
{
	/*
	if(document.getElementById("txtYear").value=="")
	{
		alert("Year is mandatory!");
		return;
	}
	if(document.getElementById("txtRollNo").value=="")
	{
	alert("Roll No is mandatory!");
		return;
	}
	if(document.getElementById("txtMarks").value=="")
	{
	alert("Marks is mandatory!");
		return;
	}
	*/
	document.getElementById("frmCertificate").submit();

	
}
</script>
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
.word
{
font-size:18px;
font-family:Arial, Helvetica, sans-serif;
margin:0px 0px 0px 200px; 
}
.inputword
{
font-size:18px;
text-align:center;
}
</style>
</head>

<body>
<form name="frmCertificate" id="frmCertificate" method="post" action="SubmitStudentCharacterCertificate.php">
<p>&nbsp;</p>
<p><b><font face="Cambria" size=3>Issue Character Certificate</font></b></p>
<hr>
<p>&nbsp;</p>
<table border="1px" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse" height="38">
  <tr>
	<td style="width: 118px; height: 38px" class="auto-style23">
	  <font face="Cambria">
	  <span>Admission No.</span>
		<span style="font-weight: 700; color: #CC3300">:</span>
	</font>
	</td>
    <td style="width: 182px; height: 38px">
       <p align="center">
       <font face="Cambria">
       <input type="text" name="txtsadmission" id="txtsadmission" size="15" onkeyup="Javascript:GetStudentDetails();" style="color: #CC0033; width: 151px;" required />
		</font>
	</td>
    <td style="width: 919px; height: 38px" id="tdStudentDetail">
       </td>
	</tr>
	
<?php 
		
			if(isset($_POST['FillDetail'])) 
			{
			 $ID=$_POST['txtsadmission'];
    
				$result1=mysql_query("SELECT * FROM   student_master where sadmission=$ID");
									 
			 
			  $rs = mysql_fetch_array($result1);
			 }
?>
</table>
	


<div id="print">
<h1 align="center"><image src="../images/logo.png" height="80px" width="280px"></image><br/>
<span style="font-weight: 400"><font face="Cambria" size="3">(Affiliated to C.B.S.E , New Delhi)
<?php echo $SchoolAddress; ?></font></span><br><?php echo $SchoolAffiliation; ?><br></h1>

<br>
<h2 align="center"><font face="Cambria" size="3"><u><b>Character Certificate</b></u></font></h2>
<table width="100%">
<tr>
<td width="50%">
<b><font face="Cambria" size="3">Date : </font></b></td>
<td width="50%">
<p align="right">
<b><font face="Cambria" size="3">Certificate No: </font></b>

</td>
</tr>
</table>
<p align="left">
<font size="3" face="Cambria">This is to certify that&nbsp;<b>
<?php if(isset($_POST['FillDetail'])) {   echo $rs['sname']; } ?></b>
&nbsp;S/D/O Mr. / Mrs.<b>
<?php if(isset($_POST['FillDetail'])) {   echo $rs['sfathername']; } ?></b>&nbsp; 
resident of <b><?php if(isset($_POST['FillDetail'])) {   echo $rs['Address']; } ?></b>  has been a bonafide 
student of<?php if(isset($_POST['FillDetail'])) {   echo $rs['sclass']; } ?> our school during the session 
<input name="txtSession" id="txtSession" type="text">.
He / She appeared / passed / failed in class .<br>
As per school records his / her data of birth is <b><?php echo $DOB; ?></b>. 
<br></font> 
<font face="Cambria" size="3">He / She bears a <b>Good </b>moral character. We wish him / her all the success in life.</font></p>
<p align="left"><b><font face="Cambria" size="3">Principal</font></b></p><b>
</div>
<table align="center">
<tr>
	<td>
	<!--<button onclick="printcontent('print')"><b><font face="Cambria">PRINT</font></b></button>-->
	<input type="button" name="FillDetail" value="Fill Detail" style="width:82px; font-weight:700" onclick="Javascript:Validate();" />
	</font></td>
</tr>
</table>
<p>&nbsp;</p>
</form>
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>