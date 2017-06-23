<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$rsFY=mysql_query("select `year` from `FYmaster` where `Status`='Active'");
$rowFy=mysql_fetch_row($rsFY);
$CurrentFY=$rowFy[0];

if($_REQUEST["isSubmit"]=="yes")
{
   $EmpId=$_POST["txtEmpNo"];
     $EmpName=$_POST["txtEmpName"];
  $Department=$_POST["txtEmpType"];
  $Designation=$_POST["txtDesig"];
    $Month=$_POST["cboMonth"];
  $Days=$_POST["txtDay"];
    $Remark=$_POST["txtRemark"];



	

	$ssql="INSERT INTO `Employee_Salary_ArrearDay`(`EmpId`, `EmpName`, `Department`, `Designation`, `Month`, `Days`,`FinancialYear`,`Remarks`) VALUES('$EmpId', '$EmpName', '$Department', '$Designation', '$Month', '$Days','$CurrentFY','$Remark')";
	//echo $ssql;
	$rs=mysql_query($ssql);

}
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Employee Arrear</title>
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

<p>&nbsp;</p>
<p><font face="Cambria"><b>Set Employee Arrear</b></font></p>
<hr>
<p>&nbsp;</p>
<form name ="frmAtt" id="frmAtt" method ="post" action="EmployeeArrearDay.php">
<font face="Cambria">
<input type ="hidden" name ="isSubmit" id="isSubmit" value ="yes">
</font>
<table border="1" width="100%" style="border-collapse: collapse">
	 <tr id="trWait" style="display: none;">
		  <td align="center" style="border-style: solid; border-width: 1px" colspan="8">&nbsp;</td>
 </tr>
 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146" height="45">
			<p><b><font face="Cambria">Emp No.</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146" height="45">
			<font face="Cambria">
			<input name="txtEmpNo" id="txtEmpNo" onkeyup="javascript:sname();" style="float: left" value="" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146" height="45">
			<p><b><font face="Cambria"><span class="style4">Emp</span> Name</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147" height="45">
			<font face="Cambria">
			<input name="txtEmpName" id="txtEmpName" style="float: left"/ value="" class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147" height="45">
			<font face="Cambria"><b>Emp Department</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147" height="45">
			<font face="Cambria">
			<input name="txtEmpType" id="txtEmpType" style="float: left"/ value="" class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147" height="45"><font face="Cambria">
			<p><b>Emp Designation</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147" height="45">
			<font face="Cambria">
			<input name="txtDesig" id="txtMobile" style="float: left"/ value="" class="text-box"></font></td>
		  
		
 </tr>
	<tr>
		<td>&nbsp;</td>
		<td>
		&nbsp;</td>
		<td>
		&nbsp;</td>
		<td>
		&nbsp;</td>
		<td>
		&nbsp;</td>
<td>
		&nbsp;</td>
<td>
		&nbsp;</td>
<td>
		&nbsp;</td>

	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
		<b><font face="Cambria">Select Month</font></b></td>
		<td>
		<span style="font-size: 9pt">
		<font face="Cambria">
		<select name="cboMonth" id="cboMonth"  class="text-box">
		<option value="" selected="selected" >Select One</option>
		<?php
		$ssql="select distinct `Month` from `Employee_Punching_Detail`";
		$rsBank	= mysql_query($ssql);
		while($row = mysql_fetch_row($rsBank))
		{
			$Month=$row[0];
		?>						
		<option value="<?php echo $Month;?>"><?php echo $Month;?></option>
		<?php
		}
		?>
		</select></font></span></td>
		<td>
		&nbsp;</td>
		<td>
		<b><font face="Cambria">No of Days</font></b></td>
<td>
		<font face="Cambria">
		<input name="txtDay" id="txtDay" size="20" class="text-box" style="font-weight: 700"></font></td>
<td>
		<font face="Cambria"><b>Remarks</b></font></td>
<td>
		<font face="Cambria">
		<input type="text" name="txtRemark" id="txtRemark" size="20" class="text-box"></font></td>

	</tr>
	<tr>
	<td colspan="8">
	<p align="center"><font face="Cambria"><input type="submit" value="Submit" name="B1"></font></td>
	</tr>
</table>
</form>
<p>&nbsp;</p>

</body>

</html>