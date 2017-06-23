<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if ($_REQUEST["isSubmit"]=="yes")
{
	$ssql="SELECT `srno` , `sname` , `DOB`,`Sex`,`Category`,`Nationality`,`sadmission` ,`sclass`,`srollno`,`LastSchool`,`sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`,`smobile`,`simei`,`suser`,`spassword`,`email`,`routeno`,`FeeSubmissionType`,`DiscontType`,`DocumentFileName`,`SchoolId`,`Remarks`,`LastUpdateDate`,DATE_FORMAT(`DateOfAdmission`,'%d-%c-%Y') FROM `student_master` where 1=1";
		
	if($_REQUEST["cboSchool"] !="All")
	{
		$SchoolId=$_REQUEST["cboSchool"];
		$ssql = $ssql . " and `SchoolId`='$SchoolId'";
	}
	if ($_REQUEST["txtAdmissionId"] !="")
	{
		$AddmissionId=$_REQUEST["txtAdmissionId"];
		$ssql = $ssql . " and `sadmission`='$AddmissionId'";
	}
	if ($_REQUEST["cboHouse"] !="Select One")
	{
		$House=$_REQUEST["cboHouse"];
		$ssql = $ssql . " and `house`='$House'";
	}
	if ($_REQUEST["cboQualificaton"] !="Select One")
	{
		$Qualification=$_REQUEST["cboQualificaton"];
		$ssql = $ssql . " and `FatherEducation` like '%" . $Qualification. "%'OR `MotherEducation` like '%" . $Qualification. "%' ";
	}
    if ($_REQUEST["cboWorkNature"] !="Select One")
	{
		$Nautre=$_REQUEST["cboWorkNature"];
		$ssql = $ssql . " and `F_OrganisationworkNature` like '%" . $Nautre. "%'OR `M_OrganisationworkNature` like '%" . $Nautre. "%' ";
	}

     if ($_REQUEST["cboDesignation"] !="Select One")
	{
		$Designation=$_REQUEST["cboDesignation"];
		$ssql = $ssql . " and `FatherDesignation` like '%" . $Designation. "%'OR `MotherDesignation` like '%" . $Designation. "%' ";
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

$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");

?>

<script language="javascript">

function ShowEdit(SrNo)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("EditStudentMaster1.php?srno=" + SrNo ,"","width=700,height=650");
}
function ChangeMobileNo(sadmission)
{
	var myWindow = window.open("ChangeMobileNo.php?sadmission=" + sadmission ,"","width=700,height=400");
}

function Validate2()
{
	document.getElementById("frmStudentMaster").submit();
}
function ChangeClass(sadmission,sclass)
{
	var myWindow = window.open("ChangeClassSection.php?sadmission=" + sadmission + "&MyClass=" + sclass ,"","width=700,height=400");
}



</script>



<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Search Student</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>

<!----Pagein------->
  <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />  
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />   
   <script src="../../bootstrap/bootstrap.min.js"></script> 
   <script src="../js/jquery.min.js"></script> 
   <script src="../js/dataTables-data.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
<!---->
<style type="text/css">
.row{padding:0; margin:0;}
.top{padding:0.5% 2% 2.5% 2%; border-bottom:1px solid #0b462d; margin:0.5% 0;}
.top div{float:left; width:50%;}
.top .head{font-size:16px; font-weight:bold;}
thead th{text-align:center;}
.btns .col-xs-6{padding:0;}
.btns .col-xs-6 a .btn{width:100%; background:#097b4d; color:#fff; border-radius:0;}
.btns .col-xs-6 a .btn:hover{background:#097b4d;}
.btns .col-xs-6 a button.active{background:#0b462d;}
.table>thead>tr>th{padding:1px 8px !important;}

</style>
	

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


<table width="100%" cellspacing="1" height="80" bordercolor="#000000" id="table1" class="auto-style19">

		<tr>

		<td>

		<table border="1" width="100%" id="table2" bordercolor="#000000" class="auto-style18">

			<tr>

				<td class="auto-style17">
<p class="auto-style5" style="height: 12px">&nbsp;</p>
<p class="auto-style5" style="height: 12px"><font face="Cambria" size="3">
<strong>Search Student</strong></font></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img src="images/BackButton.png" style="float: right" height="20"></a></p>
				
				</table>
	
	<table class="auto-style7" style="width: 61%">
		<form name="frmStudentMaster" id="frmStudentMaster" method="post" action="StudentMaster.php">
	<font face="Cambria">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	
	</font>
	
	<td class="auto-style6" style="width: 192px">
				Admission No</td>
	
	<td class="auto-style1" style="width: 384px">
				<font face="Cambria">
				<input name="txtAdmissionId" id="txtAdmissionId" class="text-box" style="float: left"></font></td>
	
	<td class="auto-style13" rowspan="11" width="42">&nbsp;
				</td>
	
	<td style="width: 184px" class="auto-style13">
	
	<!--<td style="width: 192px" class="auto-style6">-->
				Search By Name</td>
	
	<td style="width: 384px" class="auto-style16">
				<p style="text-align: left">
				<font face="Cambria">
				<input name="txtStudentName" id="txtStudentName" type="text" class="text-box"></font></td>
				<!--<span class="auto-style3"><span style="text-decoration: none">
				School</span></span></td>-->
	
	<td class="auto-style6">







				<!--<select name="cboSchool" id="cboSchool" class="text-box">
				<option selected="" value="All">All</option>
				<?php
				while($row = mysql_fetch_row($rsSchool))
				{
				?>
				<option  value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
				<?php
				}
				?>
				</select></td>-->
	
	<td class="auto-style6" rowspan="11">&nbsp;







				</td>
	
			<tr>
	
	<td class="auto-style6" style="width: 192px">&nbsp;
				</td>
	
	<td class="auto-style15" style="width: 384px"></td>
	
	<td style="width: 184px" class="auto-style13">&nbsp;
				</td>
	
	<td style="width: 101px" class="auto-style6">&nbsp;
				</td>
	
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">
				Search By Class</td>
	
	<td style="width: 384px" class="auto-style12">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<font face="Cambria">
	<select name="cboClass" id="cboClass" class="text-box" onChange="FillRollNo();">

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
		
	
	<td style="width: 184px" class="auto-style13">
				<span class="auto-style3"><span style="text-decoration: none">
				Search By Roll No</span></span></td>
	
	<td style="width: 101px" class="auto-style13">
				<font face="Cambria">
				<input name="txtRollNo" id="txtRollNo" type="text" class="text-box"></font></td>
	
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">&nbsp;
				</td>
	
	<td style="width: 384px" class="auto-style11">&nbsp;
				</td>
	
	<td style="width: 184px" class="auto-style13">&nbsp;
				</td>
	
	<td style="width: 101px" class="auto-style13">&nbsp;
				</td>
	
			</tr>
			<tr>
	
	<!--<td style="width: 192px" class="auto-style6">
				Search By Name</td>
	
	<td style="width: 384px" class="auto-style16">
				<p style="text-align: left">
				<font face="Cambria">
				<input name="txtStudentName" id="txtStudentName" type="text" class="text-box"></font></td>-->
	
	<!--<td style="width: 184px" class="auto-style13">
				Search By House</td>
	
	<td style="width: 101px" class="auto-style13">
				






				<select name="cboHouse" id="cboHouse" class="text-box">
					<option selected="" value="Select One">Select One</option>

				<?php
				$ssql="Select distinct `house` from `student_master`";
				$rshouse=mysql_query($ssql);
				while($row = mysql_fetch_row($rshouse))
				{
				?>
				<option  value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
				<?php
				}
				?>
				</select></td>-->
	
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">&nbsp;
				</td>
	
	<td style="width: 384px" class="auto-style11">&nbsp;
				</td>
	
	<td style="width: 184px" class="auto-style13">&nbsp;
				</td>
	
	<td style="width: 101px" class="auto-style13">&nbsp;
				</td>
	
			</tr>
			<tr>
	
	<!--<td style="width: 192px" class="auto-style6">
				Search By Gender</td>
	
	<td style="width: 384px" class="auto-style11">
				<font face="Cambria">
				<input name="txtGender" id="txtStudentName0" type="text" class="text-box"></font></td>
	
	<td style="width: 184px" class="auto-style13">
				<span class="auto-style3"><span style="text-decoration: none">
				Search By Bus Route</span></span></td>
	
	<td style="width: 101px" class="auto-style13">
				<select name="cboRoute" class="text-box">
				<option selected="" value="Select One">Select One</option>
				</select></td>-->
	
			</tr>
			<!--<tr>
	
	<td style="width: 192px" class="auto-style6">&nbsp;
				</td>
	
	<td style="width: 384px" class="auto-style11">&nbsp;
				</td>
	
	<td style="width: 184px" class="auto-style13">&nbsp;
				</td>
	
	<td style="width: 101px" class="auto-style13">&nbsp;
				</td>
	
			</tr>-->
			<tr>
	
	<!--<td style="width: 192px" class="auto-style6">
				Search
				Father/Mother Work Nature</td>
	
	<td style="width: 384px" class="auto-style11">
				






				<select name="cboWorkNature" id="cboWorkNature" class="text-box">
					<option selected="" value="Select One">Select One</option>

				<?php
				$ssql="Select distinct `M_OrganisationworkNature` from `student_master`";
				$rsWorkM=mysql_query($ssql);
				while($row = mysql_fetch_row($rsWorkM))
				{
				?>
				<option  value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
				<?php
				}
				?>
				<?php
				$ssql="Select distinct `F_OrganisationworkNature` from `student_master`";
				$rsWorkF=mysql_query($ssql);
				while($row1 = mysql_fetch_row($rsWorkF))
				{
				?>
				<option  value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
				<?php
				}
				?>

				</select></td>-->
	
	<!--<td style="width: 184px" class="auto-style13">
				<span class="auto-style3">Search F<span style="text-decoration: none">ather/ 
				Mother Qualification</span></span></td>
	
	<td style="width: 101px" class="auto-style13">
				






				<select name="cboQualificaton" id="cboQualificaton" class="text-box">
					<option selected="" value="Select One">Select One</option>

				<?php
				$ssql="Select distinct `FatherEducation` from `student_master`";
				$rsQuali=mysql_query($ssql);
				while($row = mysql_fetch_row($rsQuali))
				{
				?>
				<option  value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
				<?php
				}
				?>
				<?php
				$ssql1="Select distinct `MotherEducation` from `student_master`";
				$rsQuali1=mysql_query($ssql1);
				while($row1 = mysql_fetch_row($rsQuali1))
				{
				?>
				<option  value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
				<?php
				}
				?>

				</select></td>
	
			</tr>-->
			<tr>
	
	<!--//<td style="width: 192px" class="auto-style6">
				//Search Father/Mother Designation</td>
	
	//<td style="width: 384px" class="auto-style11">
				//&nbsp;<select name="cboDesignation" id="cboDesignation" class="text-box">
					//<option selected="" value="Select One">Select One</option>

				//<?php
				//$ssql="Select distinct `MotherDesignation` from `student_master`";
				//$rsDesingM=mysql_query($ssql);
				//while($row = mysql_fetch_row($rsDesingM))
				////{
				//?>
				//<option  value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
				//<?php
				//}
				//?>
				<?php
				$ssql="Select distinct `FatherDesignation` from `student_master`";
				$rsDesingF=mysql_query($ssql);
				while($row1 = mysql_fetch_row($rsDesingF))
				{
				?>
				<option  value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
				<?php
				}
				?>

				</select></td>-->
	
	<td style="width: 184px" class="auto-style13">&nbsp;
				</td>
	
	<td style="width: 101px" class="auto-style13">&nbsp;
				</td>
	
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">&nbsp;
				</td>
	
	<td style="width: 384px" class="auto-style10">
				<font face="Cambria">
				<input name="Button1" type="button" value="Submit" class="text-box" onclick ="Javascript:Validate2();" style="font-weight: 700"></font></td>
	
	<td style="width: 184px" class="auto-style13">&nbsp;
				</td>
	
	<td style="width: 101px" class="auto-style13">&nbsp;
				</td>
	
			</tr>
	</form>
	</table>
<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">	
											&nbsp;<table  id="datable_1" class="table table-hover display  pb-30">
												<thead>
													<tr>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Sr. No.</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Document</th>			
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">School</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Student Name</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Date Of Birth</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">>Gender</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Category</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Nationality</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Admission</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Class</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Roll No</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">House</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Last School</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Father's Name</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Father's Education</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Father's Occupation</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Mother's Name</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Mother's Education</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Address</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Mobile</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">IMEI</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">User Id</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Password </th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Email </th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Route </th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Fee Payment Mode</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Fee Discount Type</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Remarks</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Last Updated On</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Date Of Admission</th>
				<th style="border:1px solid #0b462d; background:#097b4d; color:#fff;">Edit</th>

							</tr>
						</thead>
						<tbody>
			<?php
				$record_count=0;
				while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$record_count=$record_count+1;

					$Name=$row[1];

					//$DOB=$row[2];
					
					$DOB=date('d-m-Y',strtotime($row[2]));
					
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
					$FeeSubmissionType=$row[22];
					$DiscontType=$row[23];
					$DocumentFileName=$row[24];
					$SchoolId=$row[25];
					$Remarks=$row[26];
					
					$LastUpdateDate=date('d-m-Y',strtotime($row[27]));
					
                     //$DateOfAdmission=date('d-m-Y',strtotime($row[30]));
                     $DateOfAdmission=$row[28];
                     $House=$row[29];

					
					$num_rows=$num_rows+1;

			?>

			<tr>

				<td style="border:1px solid #0b462d;"><?php echo $record_count; ?></span></td>
				<td style="border:1px solid #0b462d;"><?php echo $DocumentFileName;?></td>
				<td style="border:1px solid #0b462d;"><?php echo $SchoolId;?></td>
				<td style="border:1px solid #0b462d;"><?php echo $Name; ?></span></td>
				<td style="border:1px solid #0b462d;"><?php echo $DOB; ?></span></td>
				<td style="border:1px solid #0b462d;"><?php echo $Sex; ?></span></td>
				<td style="border:1px solid #0b462d;"><?php echo $Category; ?></span></td>
				<td style="border:1px solid #0b462d;"><?php //echo $Nationality; ?></span></td>
				<td style="border:1px solid #0b462d;"><?php echo $Admission; ?></span></td>
				<td style="border:1px solid #0b462d;"><a href="Javascript:ChangeClass('<?php echo $Admission;?>','<?php echo $Class; ?>');"><?php echo $Class; ?></a></span></td>
				<td style="border:1px solid #0b462d;"><?php echo $RollNo; ?></span></td>
				<td style="border:1px solid #0b462d;"><?php echo $House; ?></td>
				<td style="border:1px solid #0b462d;"><?php echo $LastSchool; ?></td>
				<td style="border:1px solid #0b462d;"><?php echo $FatherName; ?></td>
				<td style="border:1px solid #0b462d;"><?php //echo $FatherOccupation; ?></td>
				<td style="border:1px solid #0b462d;"><?php echo $MotherName; ?></td>
				<td style="border:1px solid #0b462d;"><?php //echo $MotherEducation; ?></td>
				<td style="border:1px solid #0b462d;"><?php echo $Address; ?></td>
				<td style="border:1px solid #0b462d;"><a href="Javascript:ChangeMobileNo('<?php echo $Admission;?>');"><?php echo $smobile;?></a></td>
				<td style="border:1px solid #0b462d;"><?php echo $Imei; ?></font></td>
				<td style="border:1px solid #0b462d;"><?php //echo $UserId; ?></font></td>
				<td style="border:1px solid #0b462d;"><?php //echo $Password; ?></font></td>
				<td style="border:1px solid #0b462d;">?php echo $email; ?></font></td>
				<td style="border:1px solid #0b462d;"><?php echo $Route; ?></font></td>
				<td style="border:1px solid #0b462d;"><?php  echo $FeeSubmissionType; ?></font></td>
				<td style="border:1px solid #0b462d;"><?php 	echo $DiscontType; ?></font></td>
				<td style="border:1px solid #0b462d;"><?php echo $Remarks ;?></td>
				<td style="border:1px solid #0b462d;"><?php echo $LastUpdateDate; ?></td>
				<td style="border:1px solid #0b462d;"><?php echo $DateOfAdmission; ?></td>
				<td style="border:1px solid #0b462d;"><a href="Javascript:ShowEdit(<?php echo $srno ?>);" class="style3">Edit</a></font></td>

				</tr>

			<?php } ?>

			
		</tbody>
											</table>
										</div>
									</div>	
								</div>	
							</div>	
						</div>	
					</div>
				</div>
				<!-- /Row -->

		</td>

		<td>&nbsp;

		</td>

	</tr>

</table>
<?php include 'footer.php';?>

<!--<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>-->


</body>



</html>