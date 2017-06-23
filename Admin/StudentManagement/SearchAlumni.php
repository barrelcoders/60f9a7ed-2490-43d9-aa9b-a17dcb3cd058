<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>

<?php

if ($_REQUEST["isSubmit"]=="yes")
{
	$ssql="SELECT `srno` , `sname` , `DOB`,`Sex`,`Category`,`Nationality`,`sadmission` ,`sclass`,`srollno`,`LastSchool`,`sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`,`smobile`,`simei`,`suser`,`spassword`,`email`,`routeno`,`SchoolId` FROM `Almuni` where 1=1";
		
		
	if($_REQUEST["cboSchool"] != "Select One")
	{
		$SchoolId=$_REQUEST["cboSchool"];		
		$ssql = $ssql . " and `SchoolId`='$SchoolId'";
	}
	
	if ($_REQUEST["txtAdmissionId"] !="")
	{
		$AddmissionId=$_REQUEST["txtAdmissionId"];
		$ssql = $ssql . " and `sadmission`='$AddmissionId'";
	}
	else
	{
		if ($_REQUEST["cboClass"] != "All")
		{
			$SelectedClass=$_REQUEST["cboClass"];
			$ssql = $ssql . " and `sclass`='$SelectedClass'";
			
			if ($_REQUEST["txtRollNo"] != "")
			{	
				$EnteredRollNo=$_REQUEST["txtRollNo"];
				$ssql = $ssql . " and `srollno`='$EnteredRollNo'";
			}
			else
			{
				if ($_REQUEST["txtStudentName"] != "")
				{
					$StudentName=$_REQUEST["txtStudentName"];
					$ssql = $ssql . " and `sname` like '%" . $StudentName . "%'";
				}
			}
			
		}
		else
		{
			if ($_REQUEST["txtStudentName"] != "")
				{
					$StudentName=$_REQUEST["txtStudentName"];
					$ssql = $ssql . " and `sname` like '%" . $StudentName . "%'";
				}
		}
		
	}
	$rs= mysql_query($ssql);
}


$num_rows=0;

$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);



?>

<script language="javascript">

function ShowEdit(SrNo)

{

	//window.open "EditHoliday.php?srno" . SrNo;

	var myWindow = window.open("EditStudentMaster1.php?srno=" + SrNo ,"","width=700,height=650");

}

function Validate2()
{
	document.getElementById("frmStudentMaster").submit();
}



</script>



<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Search Alumni</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>

	

<style type="text/css">

.style2 {

	border-collapse: collapse;

	border-style: solid;

	border-width: 1px;

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

</head>



<body>


<p>&nbsp;</p>


<table width="100%" cellspacing="1" height="80" bordercolor="#000000" id="table1" class="auto-style19">

		<tr>

		<td>

		<table border="1" width="100%" id="table2" bordercolor="#000000" class="auto-style18">

			<tr>

				<td class="auto-style17">
<p class="auto-style5" style="height: 12px"><font face="Cambria" size="3"><strong>Search Alumni Student</strong></font></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img src="images/BackButton.png" style="float: right" height="20"></a></p>
				
				</table>
	
	<table class="auto-style7" style="width: 100%">
		<form name="frmStudentMaster" id="frmStudentMaster" method="post" action="SearchAlumni.php">
	<font face="Cambria">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	
	</font>
	
	<td class="auto-style6" style="width: 192px">
				Search By</td>
	
	<td class="auto-style1" style="width: 99px">
				Admission No</td>
	
	<td style="width: 149px" class="auto-style13">
				<font face="Cambria">
				<input name="txtAdmissionId" id="txtAdmissionId" type="text" class="text-box"></font></td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 91px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			<tr>
	
	<td class="auto-style6" style="width: 192px">
				&nbsp;</td>
	
	<td class="auto-style15" style="width: 99px">
				&nbsp;</td>
	
	<td style="width: 149px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 91px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">
				Search By Class &amp; Roll No</td>
	
	<td style="width: 99px" class="auto-style12">
				<span style="text-decoration:none;" class="auto-style3">Select 
	Class</span><span style="font-family:Cambria;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826">
	</span></td>
	
	<td style="width: 150px" class="auto-style13">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<font face="Cambria">
	<select name="cboClass" id="cboClass" class="text-box" onchange="FillRollNo();">

		<option selected="" value="All">All</option>

		<?php
		while($row1 = mysql_fetch_row($rsClass))
		{
					$Class=$row1[0];
		?>
		<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
		<?php
		}
		?>
		</select></font></span></td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 91px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 99px" class="auto-style11">
				Roll No:</td>
	
	<td style="width: 150px" class="auto-style13">
				<font face="Cambria">
				<input name="txtRollNo" id="txtRollNo" type="text" class="text-box"></font></td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 91px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 99px" class="auto-style16">
				</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 91px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">
				Search By Name</td>
	
	<td style="width: 99px" class="auto-style11">
				Name</td>
	
	<td style="width: 150px" class="auto-style13">
				<font face="Cambria">
				<input name="txtStudentName" id="txtStudentName" type="text" class="text-box"></font></td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 91px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">
				Search by School</td>
	
	<td style="width: 99px" class="auto-style11">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">







				<select name="cboSchool" id="cboSchool" class="text-box">
				<option selected="" value="Select One">Select One</option>
				<?php
				while($row = mysql_fetch_row($rsSchool))
				{
				?>
				<option  value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
				<?php
				}
				?>
				</select></td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 91px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 99px" class="auto-style10">
				<font face="Cambria">
				<input name="Button1" type="button" value="Submit" onclick ="Javascript:Validate2();" class="text-box"></font></td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 91px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
	</form>
	</table>
	
	
	
<div id="MasterDiv">
<style type="text/css">
@media print {
   thead {display: table-header-group;}
}
</style>
	
	
	&nbsp;<table  id="table3" class="CSSTableGenerator">

			<tr>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 54px" class="style11">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">

				Sr. No.</span></td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 57px" class="style12">

				School </td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 57px" class="style12">

				Student Name</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 57px" class="style12">

				Date Of Birth</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 57px" class="style12">

				Gender</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 57px" class="style12">

				Category</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 57px" class="style12">

				Nationality</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 57px" class="style12">

				Admission</td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 57px" class="style12">

				Class</td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 57px" class="style12">

				Roll No</td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 58px" class="style12">

				LastSchool</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 58px" class="style12">

				Father's Name</td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 58px" class="style12">

				Father's Education</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 58px" class="style12">

				Father's Occupation</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 58px" class="style12">

				Mother's Name</td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 58px" class="style12">

				Mother's Education</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 58px" class="style12">

				Address</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 58px" class="style12">

				Mobile</td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 58px" class="auto-style20">

				<strong>IMEI</strong></td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 58px" class="auto-style20">

				<strong>User Id</strong></td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 58px" class="auto-style20">

				<strong>Password </strong></td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 58px" class="auto-style20">

				<strong>Email </strong></td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 58px" class="auto-style20">

				<strong>Route </strong></td>


							</tr>

			<?php

				while($row = mysql_fetch_row($rs))

				{

					$srno=$row[0];

					$Name=$row[1];

					$DOB=$row[2];
					
					$Sex=$row[3];

					$Category=$row[4];

					$Nationality=$row[5];

					$Admission=$row[6];

					$Class=$row[7];

					$RollNo=$row[8];

					$LastSchool=$row[9];

					$FatherName=$row[10];

					$FatherEducation=$row[11];
					
					$FatherOccupation=$row[12];

					$MotherName=$row[13];
					
					$MotherEducation=$row[14];

					$Address=$row[15];
					
					$smobile=$row[16];
					
					$Imei=$row[17];
					
					$UserId=$row[18];

					$Password=$row[19];

					$email=$row[20];
					$Route=$row[21];
					$SchoolId=$row[22];
					
					$num_rows=$num_rows+1;

			?>

			<tr>

				<td height="35" align="center" style="width: 54px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $srno; ?></span></td>

				<td height="35" align="center" style="width: 57px" class="style11">

				<?php echo $SchoolId;?></td>
				
				<td height="35" align="center" style="width: 57px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Name; ?></span></td>
				
				<td height="35" align="center" style="width:57px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $DOB; ?></span></td>
				
				<td height="35" align="center" style="width: 57px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Sex; ?></span></td>
				
				<td height="35" align="center" style="width: 57px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Category; ?></span></td>
				
				<td height="35" align="center" style="width: 57px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Nationality; ?></span></td>
				
				<td height="35" align="center" style="width: 57px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Admission; ?></span></td>
				
				<td height="35" align="center" style="width: 57px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Class; ?></span></td>
				
				<td height="35" align="center" style="width: 57px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $RollNo; ?></span></td>
				
				<td height="35" align="center" style="width: 58px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $LastSchool; ?></span></td>
				
				<td height="35" align="center" style="width: 58px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				
				<?php echo $FatherName; ?></td>

				<td height="35" align="center" style="width: 58px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				
				<?php echo $FatherEducation; ?></td>
				
				<td height="35" align="center" style="width: 58px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				
				<?php echo $FatherOccupation; ?></td>
				
				<td height="35" align="center" style="width: 58px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				
				<?php echo $MotherName; ?></td>

				<td height="35" align="center" style="width: 58px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				
				<?php echo $MotherEducation; ?></td>
				
				<td height="35" align="center" style="width: 58px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				
				<?php echo $Address; ?></td>
				
				<td height="35" align="center" style="width: 58px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				
				<?php echo $smobile; ?></td>

				<td height="35" align="center" style="width: 58px" class="style11">

				<font face="Cambria">

				<?php echo $Imei; ?></font></td>

				<td height="35" align="center" style="width: 58px" class="style11">

				<font face="Cambria">

				<?php echo $UserId; ?></font></td>

				<td height="35" align="center" style="width: 58px" class="style11">

				<font face="Cambria">

				<?php echo $Password; ?></font></td>

				<td height="35" align="center" style="width: 58px" class="style11">

				<font face="Cambria">

				<?php echo $email; ?></font></td>

				<td height="35" align="center" style="width: 58px" class="style11">

				<font face="Cambria">

				<?php echo $Route; ?></font></td>

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



</div>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>


</font>
<?php include"footer.php";?>


<!--<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered Online School Planet</font></div>

</div>-->

</body>



</html>