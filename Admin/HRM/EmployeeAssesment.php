<?php  

include '../../connection.php';
include '../Header/Header3.php';
$EmployeeId=$_SESSION['userid'];

?>
<?php

if($_REQUEST["isSubmit"]=="yes")
{

	$SelectedDepartment=$_REQUEST["cboDepartment"];
$result="select `EmpId`,`Name`,`Department`,`Designation` from `employee_master` where 1 ";

    if($SelectedDepartment !="Select One")
	{
		$result=$result." and `Department`='$SelectedDepartment' and `EmpId` NOT IN(SELECT `EmpId` from `Employee_ACR_HODAssesment`)";
	}

}

$rs= mysql_query($result);





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
<br>
<br>
<br>
<br>
<br>
<table width="100%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="EmployeeAssesment.php">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<tr>
<td style="width: 278px" align="left">
<p><font face="Cambria">Department</font></td>
<td style="width: 278px"><font face="Cambria">
<font face="Cambria">

		<select name="cboDepartment" style="float: left" ; class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `Department` FROM `employee_master` where `EmployeeCategory`='Teaching Staff'";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select></font></font>
</td>
<td style="width: 278px; border-right-style:none; border-right-width:medium"><p align="left">&nbsp;</td>
<td style="border-style:none; border-width:medium; width: 278px">&nbsp;</td>
<td colspan=4 align=center class="style1" style="border-style: none; border-width: medium"><font face="Cambria"><input name="Submit1" type="submit" value="Search" style="font-weight: 700" class="text-box"></font></td>
</tr>
</form>
</table>
<p>&nbsp;</p>



<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">
		Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">View Self Appraisal</font></b></td>
		
   	</tr>
<?php
$srno=1;
	while($row = mysql_fetch_row($rs))
	{
	$EmpId=$row[0];
	$Name=$row[1];
    $Department=$row[2];
    $Designation=$row[3];

?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $srno; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $EmpId;?></font></td>
		<td align="center"><font face="Cambria"><?php echo $Name;?></font></td>

    <td align="center"><font face="Cambria"><?php echo $Department;?></font></td>
	<td align="center"><font face="Cambria"><?php echo $Designation?></font></td>
	<td align="center"><font face="Cambria">
		<strong>

		<a href='EmployeeSelfAppraisal1.php?txtEmpId=<?php echo $EmpId;?>' target='_blank'><input name="BtnSubmit" type=button value="Proceed" class="text-box" style="font-weight: 700"></strong></a></font></td>
	

</tr>
<?php   	 
$srno=$srno+1;
}
?>
</table>


</div>

</form>



</p>



<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>
</html>
