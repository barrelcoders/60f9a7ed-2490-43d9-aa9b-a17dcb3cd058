<?php
session_start();
include '../../connection.php';
?>
<?php
$SrNo=$_REQUEST["srno"];



if ($SrNo !="")
{
	$ssql="SELECT  `srno`,`Name`, `Designation`, `CompanyName`, `AppointmentType`, `EmployeeName`, `EmployeeMobile`, `DateofAppointment`, `FromTimeOfAppointment`,`ToTimeOfAppointment`, `Remarks` FROM `appointment` WHERE  `srno`='$SrNo'";
	$rs= mysql_query($ssql);
	
	//echo $ssql;
	//exit();
	while($row = mysql_fetch_row($rs))
	{
				  $srno=$row[0];

                     $name=$row[1];
                    $designation=$row[2];
                    $companyname=$row[3];
                    $appointmenttype=$row[4];
  				    $employeename=$row[5];
                    $employeemobile=$row[6];
                    $dateofappointment=$row[7];
                    $fromtimeofappointment=$row[8];
                     $totimeofappointment=$row[9];
                    $remarks=$row[10];
	}
}
	
if ($_REQUEST["Name"] !="")
{

 

  $srno=$_REQUEST["SrNo"];
   $name=$_REQUEST["Name"];
   $designation=$_REQUEST["Designation"];
   $companyname=$_REQUEST["CompanyName"];
   $appointmenttype=$_REQUEST["AppointmentType"];
    $employeename=$_REQUEST["cboEmployeeName"];
   $employeemobile=$_REQUEST["txtEmpMobileNo"];
   $dateofappointment=$_REQUEST["DateofAppointment"];
   $fromtimeofappointment=$_REQUEST["FromTimeOfAppointment"];
   $totimeofappointment=$_REQUEST["ToTimeOfAppointment"];
   $remarks=$_REQUEST["Remarks"];

   
			$ssql="UPDATE `appointment` SET `Name`='$name',`Designation`='$designation',`CompanyName`='$companyname',`AppointmentType`='$appointmenttype',`EmployeeName`='$employeename',`EmployeeMobile`='$employeemobile',`DateofAppointment`='$dateofappointment',`FromTimeOfAppointment`='$fromtimeofappointment',`ToTimeOfAppointment`='$totimeofappointment',`Remarks`='$remarks'  WHERE `srno`='$srno'";
			mysql_query($ssql) or die(mysql_error());
			
			echo $ssql;
	exit();
					
			echo "<br><center> <b>Updated Successfully <br> Click <a href='Javascript: window.close();'>here</a> to close window";
			exit();
}



?>


<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Edit Appointment</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../StudentManagement/tcal.css" />

	<script type="text/javascript" src="../StudentManagement/tcal.js"></script>



<style type="text/css">

.style1 {

	border-collapse: collapse;

	border: 1px solid #808080;

}

.style2 {

	text-align: center;

}

.style3 {

	color: #000000;

	font-family: Cambria;

	font-size: 12pt;

	background-color: #FFFFFF;

}
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

.style4 {

	text-align: left;

	font-family: Cambria;

	font-size: 12pt;

	color: #000000;

	background-color: #FFFFFF;

}

.style5 {

	text-align: left;

}

</style>
<script language="javascript">

function Validate()

{

	if (document.getElementById("Name").value=="")

	{

		alert("Name is mandatory");

		return;

	}

	if (document.getElementById("Designation").value=="")

	{

		alert("Designation  is mandatory");

		return;

	}

	if (document.getElementById("CompanyName").value=="")

	{

		alert("Company Name is mandatory");

		return;

	}

	if (document.getElementById("cboEmployeeName").value=="")

	{

		alert("Employee name is mandatory");

		return;

	}

	if (document.getElementById("txtEmpMobileNo").value=="")

	{

		alert("Mobile No is mandatory");

		return;

	}

	

	
	document.getElementById("EditAppointment").submit();

	

}

</script>
<script language="javascript">
	function fnlGetEmpMobileNo()
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
			        	document.getElementById("txtEmpMobileNo").value=rows;
			        	
			        	//CalculatTotal();
						//alert(rows);														
			        }
		      }
		      

			var submiturl="GetEmpMobileNo.php?EmpName=" + document.getElementById("cboEmployeeName").value +"";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
	}
</script>

</head>



<body onunload="window.opener.location.reload();">



<table style="width: 100%" class="style1">

<form name="EditAppointment" id="EditAppointment" method="post" action="EditAppointment.php">

<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">

	<tr>

		<td style="width: 523px" class="style3"><strong>Name:</strong></td>

		<td style="width: 524px">

		<strong>

		<input name="Name" id="Name" type="text" value="<?php echo $name; ?>"></strong></td>

	</tr>

	<tr>

		<td style="width: 523px" class="style3"><strong>Designation:</strong></td>

		<td style="width: 524px">

		<strong>

		<input name="Designation" id="Designation"  type="text" value="<?php echo $designation; ?>"></strong></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Organization:</strong></td>

		<td style="width: 524px">

		<strong>

		<input name="CompanyName" id="CompanyName" type="text" value="<?php echo $companyname; ?>"></strong></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3" height="24"><strong>Type of Appointment:</strong></td>

		<td style="width: 524px" height="24">

		<strong>

		<input name="AppointmentType" id="AppointmentType" type="text" value="<?php echo $appointmenttype; ?>"></strong></td>

	

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Whom To Meet: </strong></td>

		<td style="width: 524px">

		<select name="cboEmployeeName" id="cboEmployeeName" style="float: left" ; class="text-box" onchange="fnlGetEmpMobileNo();">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `Name` FROM `employee_master`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select></font></td>
	

	</tr>

	<tr>

		<td style="width: 523px" class="style3"><strong>Employee Mobile:</strong></td>

		<td style="width: 524px">

		<strong>

		<input name="txtEmpMobileNo" id="txtEmpMobileNo" type="text" value="<?php echo $employeemobile; ?>" readonly="readonly">

		</strong>

		</td>

	</tr>

	<tr>

		<td class="style4">

		<strong>Date:</strong></td>

		<td class="style5">

		<strong>

		<input name="DateofAppointment" id="DateofAppointment" type="date" value="<?php echo $dateofappointment; ?>"></strong></td>

	</tr>

<tr>

		<td class="style4">

		<strong>&nbsp;From Time:</strong></td>

		<td class="style5">



		<strong>



		<input name="FromTimeOfAppointment" id="FromTimeOfAppointment" type="time" value="<?php echo $fromtimeofappointment; ?>"></strong></td>

	</tr>

	

<tr>

		<td class="style4">

		<strong>To Time :</strong></td>

		<td class="style5">



		<strong>



		<input name="ToTimeOfAppointment" id="ToTimeOfAppointment" type="time" value="<?php echo $totimeofappointment; ?>"></strong></td>

	</tr>

	

	

<tr>

		<td class="style4">

		<strong>Remark:</strong></td>

		<td class="style5">



		<input name="Remarks" id="Remarks" type="text" value="<?php echo $remarks; ?>"></td>

	</tr>

	

	

	</tr>

	<tr>

		<td colspan="2" class="style2">

		<input name="btnSubmit1" type="button" value="Submit" onclick="javascript:Validate();"></td>

	</tr>

	</form>

</table>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>



</html>
