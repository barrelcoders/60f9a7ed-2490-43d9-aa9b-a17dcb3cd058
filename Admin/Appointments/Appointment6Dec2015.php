<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';

if(isset($_POST['submit']))
{
  $name=$_POST['Name'];
   $designation=$_POST['Designation'];
   $companyname=$_POST['CompanyName'];
    $visitormobile=$_POST['VisitorMobile'];
  $appointmenttype=$_POST['AppointmentType'];
    $employeename=$_POST['cboEmployeeName'];
   $employeemobile=$_POST['txtEmpMobileNo'];
   $dateofappointment=$_POST['DateofAppointment'];
   $fromtimeofappointment=$_POST['FromTimeOfAppointment'];
   $totimeofappointment=$_POST['ToTimeOfAppointment'];
          $remarks=$_POST['Remarks'];

   
    
       
   mysql_query("INSERT INTO `appointment`(`Name`, `Designation`, `CompanyName`,`VisitorMobile`, `AppointmentType`, `EmployeeName`, `EmployeeMobile`, `DateofAppointment`, `FromTimeOfAppointment`,`ToTimeOfAppointment`, `Remarks`) VALUES ('$name','$designation','$companyname','$visitormobile','$appointmenttype','$employeename','$employeemobile','$dateofappointment','$fromtimeofappointment','$totimeofappointment','$remarks')");
  }

?>



<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Appointment</title>

<script language="javascript">

function ShowEdit(SrNo)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("EditAppointment.php?srno=" + SrNo ,"","width=700,height=650");
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
<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../StudentManagement/tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="../StudentManagement/tcal.js"></script>

	

<style type="text/css">

.style2 {

	border-collapse: collapse;

	border-style: solid;

	border-width: 1px;

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

{

        height:20px; 

        width: 100%; 

        margin:auto;        

        background-color:Blue;

        font-family: Calibri;

        font-weight:bold;

}



.style3 {

	text-decoration: none;

}

.auto-style7 {
	border-width: 0px;
}
.auto-style6 {
	
	font-family: Cambria;
	color: #000000;
}
.auto-style3 {
	font-family: Cambria;
	color: #000000;
}
.auto-style1 {
	
	text-align: center;
	font-family: Cambria;
	color: #000000;
	font-style: normal;
	text-decoration: none;
	}

.style11 {
	border-width: 1px;
}
.style12 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 15px;
	color: #000000;
	font-weight: bold;
}

.auto-style10 {
	
	text-align: right;
}

.auto-style11 {
	

	text-align: left;
	font-family: Cambria;
	color: #000000;
}
.auto-style12 {
	
	text-align: left;
}

.auto-style13 {
	color: #000000;
}
.auto-style15 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	font-style: normal;
	text-decoration: none underline;
}
.auto-style16 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	text-decoration: underline;
}
.auto-style17 {
	border-style: none;
	border-width: medium;
	color: #000000;
}
.auto-style18 {
	border-collapse: collapse;
	border-width: 0px;
}
.auto-style19 {
	border-collapse: collapse;
	border-width: 0;
}

.auto-style5 {
	text-align: left;
	font-family: Calibri;
	color: #000000;
	text-decoration: underline;
	font-size: medium;
}

.auto-style20 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 15px;
	color: #000000;
}

</style>

</head>



<body>


<table width="100%" cellspacing="1" height="80" id="table1" >

		<tr>

		<td>

		<table width="100%" id="table2">

			<tr>

				<td class="auto-style17">
<p class="auto-style5" style="height: 12px">&nbsp;</p>
<p class="auto-style5" style="height: 12px"><strong>
<font face="Cambria" size="3">Schedule An Appointment</font></strong></p>
<hr class="auto-style3" style="height: -15px">
				
				</table>
	
	<table class="auto-style7" style="width: 100%" height="301">
		<form name="frmAppointment" id="frmAppointment" method="post" action="Appointment.php">
	<font face="Cambria">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	
	</font>
	
			<tr>
	
	<td style="width: 338px"  height="48">
				<p style="text-align: left"><font face="Cambria">Appointee:</font></td>
	
	<td style="width: 206px"  height="48">
				
				<font face="Cambria">
				<input name="Name" id="Name" class="text-box" type="text"></font></td>
	
	<td style="width: 42px" class="auto-style6" height="48">
				&nbsp;</td>
	
	<td  colspan="2" height="48">
				<font face="Cambria">
				Designation:</font></td>
	
	<td style="width: 195px"  height="48">







				
				<font face="Cambria">
				<input name="Designation" id="Designation" class="text-box" type="text"></font></td>
	
	<td style="width: 195px"  height="48">







				
				&nbsp;</td>
	
			</tr>
			<tr>
	
	<td style="width: 338px"  height="48">
				<p style="text-align: left">
				<font face="Cambria">
				Organization/Company Name:</font></td>
	
	<td style="width: 206px"  height="48">
				
				<font face="Cambria">
				<input name="CompanyName" id="CompanyName" class="text-box" type="text"></font></td>
	
	<td style="width: 42px" class="auto-style6" height="48">
				&nbsp;</td>
	
	<td  colspan="2" height="48">
				<font face="Cambria">Visitor Mobile</font></td>
	
	<td style="width: 195px"  height="48">
				<input type="text" name="VisitorMobile" id="VisitorMobile" size="20" class="text-box"></td>
	
	<td style="width: 195px"  height="48">
				&nbsp;</td>
	
			</tr>
			<tr>
	
	<td style="width: 338px"  height="48">
				<p style="text-align: left">
				<font face="Cambria">
Type of Appointment:</td>
	
	<td style="width: 206px"  height="48">
				<font face="Cambria">
<select name="AppointmentType" id="AppointmentType"  type="text" ; class="text-box">
            <option selected="" value="Select One">Select One</option>
            <?php
			$ssqlitemcode="SELECT distinct `AppointmentType` FROM `appointment_type`";
$rsitemcode= mysql_query($ssqlitemcode);
			
		while($row1 = mysql_fetch_row($rsitemcode))
		{
					$itemcode=$row1[0];
		?>
            <option value="<?php echo $itemcode; ?>"><?php echo $itemcode; ?></option>
            <?php 
		}
		?>
          </select>      
</font></td>
	
	<td style="width: 42px" class="auto-style6" height="48">
				&nbsp;</td>
	
	<td  colspan="2" height="48">
				&nbsp;</td>
	
	<td style="width: 195px"  height="48">
				&nbsp;</td>
	
	<td style="width: 195px"  height="48">
				&nbsp;</td>
	
			</tr>
			<tr>
	
	<td style="width: 338px" class="auto-style11" height="33">
				<font face="Cambria">Whom To Meet (Employee Name)</font></td>
	
	<td style="width: 206px"  height="33">
				<font face="Cambria">

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
	
	<td style="width: 42px" class="auto-style6" height="33">
				&nbsp;</td>
	
	<td  colspan="2" height="33">
				<font face="Cambria">Employee Mobile No:</font></td>
	
	<td style="width: 195px"  height="33">
				<font face="Cambria">
				<input name="txtEmpMobileNo" id="txtEmpMobileNo" type="text" required  class="text-box"></font></td>
	
	<td style="width: 195px"  height="33">
				&nbsp;</td>
	
			</tr>
			<tr>
	
	<td style="width: 338px" class="auto-style11" height="54">
				Date:</td>
	
	<td style="width: 206px"  height="54">
				<font face="Cambria">
				<input name="DateofAppointment" id="DateofAppointment" type="date" class="text-box"></font></td>
	
	<td style="width: 42px" class="auto-style6" height="54">
				&nbsp;</td>
	
	<td  colspan="2" height="54">
				<font face="Cambria">&nbsp;From Time:</font></td>
	
	<td style="width: 195px"  height="54">
				<font face="Cambria">
				<input name="FromTimeOfAppointment" id="FromTimeOfAppointment" type="time" required  class="text-box">
				</font>
				</td>
	
	<td style="width: 195px"  height="54">
				&nbsp;</td>
	
			</tr>
			<tr>
	
	<td style="width: 338px" >
				<p style="text-align: left">
				<font face="Cambria">Remarks:</font></td>
	
	<td style="width: 206px" >
				<font face="Cambria">
				<input name="Remarks" id="Remarks" type="text" required  class="text-box-address"></font></td>
	
	<td style="width: 42px" class="auto-style6">
				&nbsp;</td>
	
	<td  width="307">
				<p style="text-align: left"><font face="Cambria">To Time:</font></td>
	
	<td  colspan="3">
				<font face="Cambria">
				<input name="ToTimeOfAppointment" id="ToTimeOfAppointment" type="time" required  class="text-box"></font></td>
	
			</tr>
			<tr>
	
	<td style="text-align:center"  colspan="7">
				&nbsp;</td>
	
			</tr>
			<tr>
	
	<td style="text-align:center"  colspan="7">
				<font face="Cambria">
				<input name="submit" type="submit" value="Submit" class="text-box" ></font></td>
	
			</tr>
	</form>
	</table>
	
	&nbsp;<table  id="table3" class="CSSTableGenerator" width="100%">

			<tr>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 42px" class="style11">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">

				Sr. No.</td>
				
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Name</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Designation</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Organization</td>
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Contact No</td>
				

				<td height="35" bgcolor="#95C23D" align="center" style="width: 161px" class="style12">

				Type of Appointment</td>
				
				

				<td height="35" bgcolor="#95C23D" align="center" style="width: 174px" class="auto-style20">

				<b>Employee Name</b></td>
				

				<td height="35" bgcolor="#95C23D" align="center" style="width: 174px" class="auto-style20">

				<b>Employee Mobile</b></td>
				

				<td height="35" bgcolor="#95C23D" align="center" style="width: 154px" class="auto-style20">

				<b>Date</b></td>

				


				<td height="35" bgcolor="#95C23D" align="center" style="width: 174px" class="auto-style20">

				<b>From Time</b></td>




				<td height="35" bgcolor="#95C23D" align="center" style="width: 174px" class="auto-style20">

				<b>To Time</b></td>


				<td height="35" bgcolor="#95C23D" align="center" style="width: 174px" class="auto-style20">

				<b>Remarks</b></td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 96px" class="style11">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">

				Edit</td>

							</tr>
							</tr>


<?php
$rs=mysql_query("SELECT `srno`, `Name`, `Designation`, `CompanyName`,`VisitorMobile`, `AppointmentType`, `EmployeeName`, `EmployeeMobile`, `DateofAppointment`, `FromTimeOfAppointment`, `ToTimeOfAppointment`, `Remarks` FROM `appointment` WHERE 1=1");
	while($row = mysql_fetch_row($rs))
	{
	$EmpId=$row[0];
?>
<tr>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[0];?></font></td>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[1];?></font></td>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[2];?></font></td>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[3];?></font></td>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[4];?></font></td>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[5];?></font></td>
    <td align="center" height="20"><font face="Cambria"><?php echo $row[6];?></font></td>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[7];?></font></td>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[8];?></font></td>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[9];?></font></td>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[10];?></font></td>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[11];?></font></td>
	<td height="35" align="center" style="width: 96px" class="style11"><font face="Cambria"><a href="Javascript:ShowEdit(<?php echo $srno ?>);" class="style3">Reschedule</a></font></td>

  </tr> 
  
  <?php 
  }
   ?> 

</table>

		</td>

		<td>

		&nbsp;</td>

	</tr>

</table>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>


</body>



</html>