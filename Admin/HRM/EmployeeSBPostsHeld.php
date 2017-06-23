<?php  
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if(isset($_POST['submit']))
{
   $EmpNo=$_POST['txtEmpNo'];
   $EmpName=$_POST['txtEmpName'];
   $EmpType=$_POST['txtEmpType'];
   $Designation=$_POST['txtDesig'];
   $DOA=$_POST['DOA'];
   $position=$_POST['position'];
   $MJ=$_POST['MJ'];
   $PS=$_POST['PS'];
   $BP=$_POST['BP'];
   $GP=$_POST['GP'];
   $allowances=$_POST['allowances'];
   $TGP=$_POST['TGP'];
   $level=$_POST['level'];
   
   
	 $sql="INSERT INTO `EmployeeSB_PostsHeld` (`EmpID`,`EmpName`,`EmpDepartment`,`EmpDesignation`,`DateofApportionment`,`Position`,`MatchingJob`,`PayScale`,`BasicPay`,`GradePay`,`Allowances`,`TotalGrossPay`,`Level`)
	 VALUES('$EmpNo','$EmpName','$EmpType','$Designation','$DOA','$position','$MJ','$PS','$BP','$GP','$allowances','$TGP','$level')";
	 
	 $rs=mysql_query($sql);
	 //echo $rs;
	 //exit();
	 
	  			
	
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Services Book</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<style type="text/css">
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
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}
.style2 {
	text-align: center;
}
.style3 {
	font-size: medium;
	color: #FF0000;
}
.style4 {
	font-family: Cambria;
}
</style>


<script language="javascript">


function sname()
{
	document.getElementById("trWait").style.display="";
	document.getElementById("trWait").innerHTML ="Please Wait...";
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
			        	document.getElementById('txtEmpName').value=arr_row[0];
						document.getElementById('txtEmpType').value=arr_row[1];       	 
						document.getElementById('txtMobile').value=arr_row[2];       	 
						document.getElementById("trWait").style.display="none";
						document.getElementById("trWait").innerHTML ="";						
			        }
		      }
			
			var submiturl="get_info2.php?c=" + document.getElementById('txtEmpNo').value;
			itm.open("GET", submiturl,true);
			itm.send(null);
}



</script>


</head>

<body>
<form name="frmIssue" id="frmIssue" method="post">
<input type="hidden" name="SubmitType" id="SubmitType" value="">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font face="Cambria">Employee Services Book </font>
	<font size="3" face="Cambria">Posts Held</p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

        <img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></b></td>
  </tr>
</table>

<b>

<table class="name" width="100%" cellpadding="0" style="border-collapse: collapse" border="1">
 <tr id="trWait" style="display: none;">
		  <td align="center" style="border-style: solid; border-width: 1px" colspan="8">
			&nbsp;</td>
 </tr>
 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146">
			<p><b><font face="Cambria">Emp No.</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146"><font face="Cambria">
			<input name="txtEmpNo" id="txtEmpNo" onkeyup="javascript:sname();" style="float: left" value="" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146">
			<p><b><span class="style4">Emp</span><font face="Cambria"> Name</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtEmpName" id="txtEmpName" style="float: left"/ value="" class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147">
			<font face="Cambria"><b>Emp Department</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtEmpType" id="txtEmpType" style="float: left"/ value="" class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<p><b>Emp Designation</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtDesig" id="txtMobile" style="float: left"/ value="" class="text-box"></font></td>
		  
		
 </tr>
</table>
<font face="Cambria"> 
<br />
</font>
<table class="name" width="100%">
<p align="left">
<font face="Cambria"> 
<br />
</font></p>

<table id="Table1" style="border-style:solid; border-width:1px; border-collapse:collapse" style="border-style: solid; border-width: 1px" width="100%" cellpadding="0">
			<p align="left">&nbsp;<tr>
				<td align="center" style="border-style: solid; border-width: 1px" width="127">
			<b><font face="Cambria">Date of Apportionment</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="114"><b><font face="Cambria">Position</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<p>Matching Job<p>&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167"><b><font face="Cambria">Pay Scale</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="197">
			<b><font face="Cambria">Basic Pay</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133">
			<b><font face="Cambria">Grade Pay</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="168">

<b>

			<font face="Cambria">
			Allowances</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="84">
			<b><font face="Cambria">Total Gross Pay</font></b></td>
		  
		  <td align="center" style="border-style: solid; border-width: 1px" width="84">
			<b><font face="Cambria">Level</font></b></td>
		  
 </tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="127">
			<p>

<b>

			<font face="Cambria">
			<input name="DOA" id="DOA" type=date  style="float: left"/class="text-box"></font></td>
		  </td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="114">

<b>

			<font face="Cambria">
			<input name="position" id="position" style="float: left"  class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			<p>

<b>

			<font face="Cambria">
			<input name="MJ" id="MJ"  style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<input name="PS" id="PS"  style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="197">

<b>

			<font face="Cambria">
			<input name="BS" id="BS"  style="float: left"/class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133">

<b>

			<font face="Cambria">
			<input name="GP" id="GP" style="float: left"  class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="168">
			<p>

<b>

			<font face="Cambria">
			<input name="allowances" id="allowances"  style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="84">

<b>

			<font face="Cambria">
			<input name="TGP" id="TGP"  style="float: left" class="text-box"/></font></td>
		  
		  <td align="center" style="border-style: solid; border-width: 1px" width="84">

<b>

			<font face="Cambria">
			<input name="level" id="level"  style="float: left"/class="text-box"></font></td>
		  
 </tr>
 
</table>
&nbsp;<table class="name" width="100%">
<p align="left">
<font face="Cambria"> 
<br />
</font></p>

</table>
<p>
<br>

&nbsp;<table align="center">
  <tr>  
        <td>
		<p align="center"><font face="Cambria">
		<input name="submit" type="submit" value="Submit" style="font-weight: 700" class="text-box"></font>
		</td>
  </tr>
</table>

</form>
<font face="Cambria"><br>

</font>


<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">
		Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">
		Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">
		Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">
		Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">
		Appointment Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Position</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Matching Job</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Pay Scale</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b><font face="Cambria">
		Basic Pay</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Grade Pay</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Allowances</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">
		Gross Pay</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Level</font></b></td>
	
		
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_PostsHeld");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateofApportionment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Position"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["MatchingJob"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["PayScale"];?></font></td>
	 <td align="center"><font face="Cambria"><?php echo $rs["BasicPay"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["GradePay"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Allowances"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["TotalGrossPay"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Level"];?></font></td>
	>
	
</tr>
<?php   	 
}
?>
</table>


</div>


<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>
</html>