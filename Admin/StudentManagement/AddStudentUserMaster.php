<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>


<?php
if(isset($_POST['submit']))
{
   $sadmission=$_POST['admissionno'];
   $sname=$_POST['name'];
   $sclass=$_POST['class'];
   $srollno=$_POST['rollno'];
   $suser=$_POST['txtusername'];
   $spassword=$_POST['txtpassword'];
   $FinancialYear=$_POST['fy'];
   $sfathername=$_POST['fathername'];
   $smobile=$_POST['mobile'];
   $simei=$_POST['imei'];
   $email=$_POST['email'];
   $status=$_POST['status'];
   
   $sql="INSERT INTO user_master(`sadmission`,`sname`,`sclass`,`srollno`,`suser`,`spassword`,`FinancialYear`,`sfathername`,`smobile`,`simei`,`email`,`status`)VALUES('$sadmission','$sname','$sclass','$srollno','$suser','$spassword','$FinancialYear','$sfathername','$smobile','$simei','$email','$status')";
   //echo $sql;
   //exit();
   
   $rs=mysql_query($sql);
   
   
   
}
?>


<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Add Student in User Master</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>
	
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
						document.getElementById('fy').value=arr_row[5];
						document.getElementById('fathername').value=arr_row[6];
						document.getElementById('mobile').value=arr_row[7];
						document.getElementById('imei').value=arr_row[8];
						document.getElementById('email').value=arr_row[9];
						document.getElementById('status').value=arr_row[10];       	 
			        }
		      }
			
			var submiturl="get_info_user.php?c=" + document.getElementById('adm').value;
			itm.open("GET", submiturl,true);
			itm.send(null);
}





</script>


	

<style>
<!--

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

.style1 {
	text-align: left;
}

.style2 {
	font-weight: bold;
	text-align: center;
	background-color: #C0C0C0;
}

.style3 {
	text-align: center;
}

-->
</style>

	

</head>



<body>
<form name="frmRpt" id="frmRpt" method="post" action="AddStudentUserMaster.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font size="3" face="Cambria">Add Student In User Master </p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

        <img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></td>
  </tr>
</table>
<font face="Cambria"> 
<br /><br />
</font>  

<table class="name" width="100%">

 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria">
			Admission No.</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria"><input  class="textbox" name="admissionno" id="adm" onkeyup="javascript:sname();" style="float: left" /></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria">
			Student Name</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria"><input name="name" id="name" style="float: left"  class="textbox" readonly /></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria">
			Class</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria"><input name="class" id="clas"  class="textbox" style="float: left" readonly/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;"><font face="Cambria">
			Roll No</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;"><font face="Cambria"><input name="rollno" id="roll" class="textbox" style="float: left" readonly/></font></td>
 </tr>

 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;">
			<font face="Cambria">User Name</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; height: 28px;" colspan="2">
			<input name="txtusername"  id="user" id="txtNewFeeHeadAmount0" class="textbox" type="text" readonly></td> 
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;">
			<font face="Cambria">Password</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; height: 28px;" colspan="2" class="style1">
			<input name="txtpassword" id="pass" id="txtNewFeeHeadAmount" type="text" class="textbox" readonly></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;">
			<font face="Cambria">Financial Year</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;"><font face="Cambria">
			<input name="fy" id="fy" class="textbox" style="float: left" readonly/></font><p>&nbsp;</td>
 </tr>

 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;">
			<font face="Cambria">Father Name</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria">
			<input  class="textbox" name="fathername" id="fathername"  style="float: left" /></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;">
			<font face="Cambria">Mobile No.</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria">
			<input name="mobile" id="mobile" style="float: left"  class="textbox" readonly /></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;">
			<font face="Cambria">IMEI No.</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria">
			<input name="imei" id="imei"  class="textbox" style="float: left" /></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;">
			<font face="Cambria">Email Id</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;"><font face="Cambria">
			<input name="email" id="email" class="textbox" style="float: left" readonly/></font></td>
 	</tr>
 	</table>

<table class="name" width="100%">

 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;">
			<font face="Cambria">Status</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria">
			<input  class="textbox" name="status" id="status"  style="float: left" /></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; height: 28px">
			&nbsp;</td>
 	</tr>
 	</table>
<p>&nbsp;</p>
<br> 	

<table class="name" width="100%">
 <tr>
		  <td  align=center colspan="8" >
		  <input name="submit" type="submit" value="Submit" class="theButton" ></td>
 </tr>
 </table>
</form>
<font face="Cambria"><br>
</font>&nbsp;<br/>
<br/>
<br/>
<br/>
<table class="name" width="100%">


</form>
</table>

</div>
<?php include"footer.php";?>

<!--<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>-->

</body>
</html>