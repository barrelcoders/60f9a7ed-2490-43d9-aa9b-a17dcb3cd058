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
<title>Student Income Tax Certificate</title>
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
				        	var studetndetail="Name:" + arr_row[0] + ", Class:" + arr_row[1] + ", Roll No:" + arr_row[2] + ", Gender:" + arr_row[3];
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
<form name="frmCertificate" id="frmCertificate" method="post" action="SubmitStudentIncomeTaxCertificate.php">
<p>&nbsp;</p>
<p><b><font face="Cambria" size="4">Issue Student Income Tax Certificate</font></b></p>
<hr>
<p>&nbsp;</p>
<table border="1px" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse" height="38">
  <tr>
	<td style="width: 118px; height: 38px" class="auto-style23">
	  <font face="Cambria" size="4">
	  <span>Admission No.</span>
		<span style="font-weight: 700; color: #CC3300">:</span>
	</font>
	</td>
    <td style="width: 182px; height: 38px">
       <p align="center">
       <font size="4" face="Cambria">
       <input type="text" name="txtsadmission" id="txtsadmission" size="15" onkeyup="Javascript:GetStudentDetails();" style="color: #CC0033; width: 151px;" required />
		</font>
	</td>
    <td style="width: 919px; height: 38px" id="tdStudentDetail">
       
	&nbsp;</td>
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
<h1 align="center"><font size="4" face="Cambria"><image src="../images/logo.png" height="100px" width="300px"></image><br><?php echo $SchoolName; ?><br />
<?php echo $SchoolAddress; ?><br />
<span style="font-weight: 400">(Affiliated to C.B.S.E. New Delhi) <br></span> </font>
</h1>
<br>
<h1 align="center"><font face="Cambria"><u> Fee Certificate For 2016-2017</u></font></h1>
<p>
<b><font face="Cambria" size="4">Date : </font></b></p>
<p>
<b><font face="Cambria" size="4">Certificate No: </font></b></p>
<p>
&nbsp;</p>

<table width=100%>
<tr>
	<td>
	<p>
	<font size="4" face="Cambria">Certify that Master/Kum.&nbsp;
	</td>
	<td><b>
	<?php if(isset($_POST['FillDetail'])) {   echo $rs['sname']; } ?></b>
	</td>
</tr>
<tr>
	<td>
	S/o, D/o Mr. / Mrs<b>.
	</td>
	<td><b>
	<?php if(isset($_POST['FillDetail'])) {   echo $rs['sfathername']; } ?> / <?php if(isset($_POST['FillDetail'])) {   echo $rs['MotherName']; } ?></b>
	</td>
</tr>
<tr>
	<td>
	Bearing Admn. No<b>.</b>
	</td>
	<td>
	<b><?php if(isset($_POST['FillDetail'])) {   echo $rs['sadmission']; } ?></b> 
	</td>
</tr>
<tr>
	<td>
	Student of class
	</td>
	<td>
	<b><?php if(isset($_POST['FillDetail'])) {   echo $rs['sclass']; } ?></b>
	</td>
</tr>
</table>
<br>
<p><font size="4" face="Cambria">Has paid tution fee for the period from <font size="3" face="Cambria"><input type="text" name="txtSession" id="txtSession"></font> to <font size="3" face="Cambria"><input type="text" name="txtSession1" id="txtSession1"></font>
 as per the details given below :-</font></p>
<br>
<table width=100%>
<tr>
  <td> 1. Tuition Fee</td>
  <td> @ Rs. <font size="3" face="Cambria"><input type="text" name="txtSession2" id="txtSession2"></font> </td>
</tr>
</table>
<br>
<p><font size="4" face="Cambria">
It is also certified that this School is affiliated to the Central Board of Secondary Education ( CBSE ).
</font></p> 
<br>
<br>
<br>
</b> 
<font size="4" face="Cambria"><br />&nbsp;</font></p><p><b>
<font face="Cambria" size="4">( Seal of the Institution )</font></b></p>
<br>
<br>
<br>
<p><b><font face="Cambria" size="4"> Date: </font></p>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</table>
<table align="center">
<tr>
	<td>
	<font size="4">
	<!--<button onclick="printcontent('print')"><b><font face="Cambria">PRINT</font></b></button>-->
       </font>
       <b>
	<font size="4">
	<input type="submit" name="FillDetail" value="Fill Detail" style="width:82px; font-weight:700" /></font></b><font size="4">&nbsp;</font></font></td>
</tr>
</table>
<p>&nbsp;</p>
</form>
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="4">Powered by Online School Planet</font></div>
</div>
</body>
</html>