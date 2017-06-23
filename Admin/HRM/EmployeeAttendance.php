<?php
error_reporting(0);
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if(isset($_POST['Submit1'])) 
{
 		$result1=mysql_query("SELECT * FROM   employee_master");
			$i=1;
	   while($rs1 = mysql_fetch_array($result1))
			{	
				$query=mysql_query("INSERT INTO `employeeattendance` (`date`,`empID`, `name`, `attendance`, `timein`, `timeout`) VALUES ('".$_POST['bday']."','".$rs1['EmpId']."', '".$rs1['Name']."', '".$_POST['Attendance']."', '".$_POST['timein']."', '".$_POST['timeinout']."')");
				$i=$i+1;
			}			
			//mysql_close($conn);
}
?>

<script language="javascript">
function Validate()
{
	TotalEmployee=document.getElementById("totalemployee").value;
	//alert(document.getElementById("bday").value);
	for(var i=1;i<=TotalEmployee;i++)
	{
		GetFeeDetail(document.getElementById("EmpID"+i).value,i);
	}
	return;
}

function CheckAttandance()
{
	TotalEmployee=document.getElementById("totalemployee").value;
	//alert(TotalEmployee);
	//alert(document.getElementById("bday").value);
	
	for(var i=1;i<TotalEmployee;i++)
	{
		GetFeeDetail(document.getElementById("EmpID"+i).value,i);
	}
	
	return;
}
function GetFeeDetail()
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
	TotalEmployee=document.getElementById("totalemployee").value; 
	for(var i=1;i<TotalEmployee;i++)
	{
		 xmlHttp.onreadystatechange=function()
	     {
		      if(xmlHttp.readyState==4)
	        	{
					var rows="";
		        	rows=new String(xmlHttp.responseText);
		        	if (rows=="yes")
		        	{
		        		document.getElementById("cboAttendance"+i).value="L";
		        		return;
		        	}
		        }
	      }
		  var submiturl="ValidateAttandance.php?EmployeeId=" + document.getElementById("EmpID"+i).value + "&Dt=" + document.getElementById("bday").value;
		  xmlHttp.open("GET", submiturl,false);
		  xmlHttp.send(null);
	  }	  
}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Employee Attendance</title>
</head>
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

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;

}

</style>
<body>
<form action="" method="post" id="form">

<div align="center">

&nbsp;<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td align="center">
		<p align="left"><b>
		<font size="3" face="Cambria">Employee Attendance</font></b></p>
		<hr>
		<p>
<font face="Cambria"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></font></td>
		
	</tr>
	<tr>
		<td><font face="Cambria">Date: </font><font face="Cambria" size="3"> <input type="date" name="bday" id="bday" onchange="Javascript:GetFeeDetail();"></font></td>
	</tr>
	
</table>
</div>
<div align="center">
<table cellpadding="0" width="100%" style="border-collapse: collapse" border="1" cellspacing="0">
<?php

			$result=mysql_query("SELECT * FROM  employee_master");
			$i=0;
?>
	<tr>
	<td style="padding:0px 0px 0px 40px;" align="center" width="247" bgcolor="#95C23D">
	<b><font face="Cambria">Emp Id</font></b></td>
	<td align="center" width="248" bgcolor="#95C23D"><font face="Cambria"><b>
	Employee Name</b></font></td>
	<td align="center" width="248" bgcolor="#95C23D"><font face="Cambria"><b>Attendance</b></font></td>
	<td align="center" width="248" bgcolor="#95C23D"><font face="Cambria"><b>Time 
	In</b></font></td>
	<td align="center" width="248" bgcolor="#95C23D" ><font face="Cambria"><b>Time 
	Out</b></font></td>
	</tr>
<?php
			while($rs = mysql_fetch_array($result))
			{
				$i=$i+1;
?>
	<tr>
	<td width="247">
	<p align="center">
	<font face="Cambria">
	<input type="text" name="EmpID<?php echo $i;?>" id="EmpID<?php echo $i;?>" value="<?php echo $rs['EmpId'];?>" readonly/>
	</font>
	</td>
	<td width="248">
	<p align="center">
	<font face="Cambria">
	<input type="text" name="Name <?php echo $i;?>" value="<?php echo $rs['Name'];?>" readonly/>   
	</font>   
	</td>      
	<td style='padding:0px 0px 0px 40px;' width="248">
	<p align="center">
	<font face="Cambria">
	<select name="cboAttendance<?php echo $i;?>" id="cboAttendance<?php echo $i;?>">
	    <option> P </option>
		<option value='A'> A </option>
		<option value='L' >L </option>
	</select>
		</font>
		</td><td width="248"> 
	<p align="center"> <font face="Cambria"> <input type='time' name='timein' value='12:01:00;'></font></td>
	<td width="248">
	<p align="center"><font face="Cambria">&nbsp;&nbsp;&nbsp;<input type='time' name='timeout' value='12:01:00;'>&nbsp;&nbsp;&nbsp; 
	</font> </td></tr>
				
				
				
	<?php			
			}			
?>
<font face="Cambria">
<input type="hidden" name="totalemployee" id="totalemployee" value="<?php echo $i;?>">

</font>

</table>
</div>
<table cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td align="center"><font face="Cambria" size="3">
    <input name="Submit1" type="button" value="Submit" onclick="Javascript:Validate();"/></font></td>
  </tr>
</table>


</form>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>

</body>
</html>