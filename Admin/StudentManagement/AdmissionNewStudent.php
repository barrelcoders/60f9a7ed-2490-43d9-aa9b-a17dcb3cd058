<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
//$ssql="SELECT `RegistrationNo`,`sname`,`DOB`,`Age`,`Sex`,`sclass`,`sfathername`,`FatherEducation`,`status` FROM `NewStudentRegistration` order by `RegistrationNo` desc";

if($_REQUEST["isSubmit"]=="yes")
{
	$ssql="SELECT `RegistrationNo`,`sname`,`DOB`,`Age`,`Sex`,`sclass`,`sfathername`,`FatherEducation`,`status`,`SchoolId` FROM `NewStudentRegistration` where 1=1";
	if($_REQUEST["cboSchool"] !="All")
	{
		$SchoolId=$_REQUEST["cboSchool"];
		$ssql=$ssql." and `SchoolId`='$SchoolId'";
	}
	$ssql=$ssql." order by `RegistrationNo` desc";
	$rs= mysql_query($ssql);
}
$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");
?>
<script language="javascript">
function Validate()
{
	document.getElementById("frmRegApp").submit();
}
</script>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" type="text/css" href="../css/style.css" />

<title>Pending for Approval</title>
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
.style1 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style2 {
	font-family: Cambria;
	font-size: 12pt;
	border: 1px solid #000000;
}
.style3 {
	text-align: center;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
	border: 1px solid #000000;

}
.style4 {
	font-family: Cambria;
	font-size: 12pt;
	border: 1px solid #000000;
	text-align: center;
}
.style6 {
	font-family: Cambria;
	border: 1px solid #000000;
}
.style5 {
	border: 1px solid #000000;
}
.style7 {
	border: 1px solid #000000;
	text-align: center;
}
</style>
<script type="text/javascript" language="javascript">
function fnlApprove(cnt,RegId)
{
	ctrlRemarks="txtRemarks" + cnt;
	ctrlApproveBtn="btnApprove" + cnt;
	ctrlRejectBtn="btnReject" + cnt;
	document.getElementById(ctrlApproveBtn).disabled="true";
	document.getElementById(ctrlRejectBtn).disabled="true";
	
	var Remarks=document.getElementById(ctrlRemarks).value;
	var RegistrationId=RegId;
	var myWindow = window.open("RegistrationApproveRej.php?RegId=" + RegistrationId + "&Remarks=" + Remarks + "&action=approve", "", "width=200, height=100");	
}
function fnlReject(cnt,RegId)
{
	ctrlRemarks="txtRemarks" + cnt;
	ctrlApproveBtn="btnApprove" + cnt;
	ctrlRejectBtn="btnReject" + cnt;
	document.getElementById(ctrlApproveBtn).disabled="true";
	document.getElementById(ctrlRejectBtn).disabled="true";
	
	var Remarks=document.getElementById(ctrlRemarks).value;
	var RegistrationId=RegId;
	var myWindow = window.open("RegistrationApproveRej.php?RegId=" + RegistrationId + "&Remarks=" + escape(Remarks) + "&action=reject", "", "width=200, height=100");	
}
function fnlProceedToAdm(RegId)
{
	document.getElementById("txtRegistrationId").value=RegId;
	document.getElementById("frmProceedToAdmission").submit();
}
</script>

</head>

<body>

		<p></p>

		<table style="width: 100%; border-collapse:collapse" class="style14" cellpadding="0">



			<tr>



				<td class="auto-style49" style="height: 10px; background-color:#FFFFFF">







				<strong><font face="Cambria">New Student Admission</font></strong><hr>
				
				<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">

<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>

				</td>





			</tr>



			
		</table>


		<table style="width: 592px" class="style1">
		<form name="frmRegApp" id="frmRegApp" method="post" action="">
		<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
			<tr>
				<td class="style6" style="width: 196px">School</td>
		<td class="style5" style="width: 197px">







				<select name="cboSchool" id="cboSchool" class="text-box">
				<option selected="" value="All">All</option>
				<?php
				while($row = mysql_fetch_row($rsSchool))
				{
				?>
				<option  value="<?php echo $row[0];?>" <?php if($SchoolId==$row[0]) {?>selected="selected" <?php } ?> ><?php echo $row[1];?></option>
				<?php
				}
				?>
				</select></td>
		<td class="style7" style="width: 197px">
		<input name="btnSubmit" type="button" value="submit" class="text-box" onclick="Javascript:Validate();"></td>
		</tr>
		</form>
	</table>
&nbsp;<table style="border-color:#000000; width: 100%" class="CSSTableGenerator">
<form name="frmProceedToAdmission" id="frmProceedToAdmission" method="post" action="StudentAdmission.php">
<input type="hidden" name="txtRegistrationId" id="txtRegistrationId" value="">
</form>

	<tr>
		<td class="style3" style="width: 60px" bgcolor="#95C23D"><strong>Sr. No</strong></td>
		<td class="style3" style="width: 71px" bgcolor="#95C23D"><strong>Reg.#</strong></td>
		<td class="style3" style="width: 145px" bgcolor="#95C23D"><strong>School</strong></td>
		<td class="style3" style="width: 145px" bgcolor="#95C23D"><strong>Name</strong></td>
		<td class="style3" style="width: 92px" bgcolor="#95C23D"><strong>D.O.B</strong></td>
		<td class="style3" style="width: 92px" bgcolor="#95C23D"><strong>Age</strong></td>
		<td class="style3" style="width: 92px" bgcolor="#95C23D"><strong>Gender</strong></td>
		<td class="style3" style="width: 92px" bgcolor="#95C23D"><strong>Class</strong></td>
		<td class="style3" style="width: 116px" bgcolor="#95C23D"><strong>Father&#39;s Name</strong></td>
		<td class="style3" style="width: 102px" bgcolor="#95C23D"><strong>Father&#39;s Edu.</strong></td>
		<td class="style3" style="width: 93px" bgcolor="#95C23D"><strong>Status</strong></td>
		<td class="style3" style="width: 93px" bgcolor="#95C23D"><strong>Proceed 
		To Admission</strong></td>
	</tr>
	<?php
				$cnt=1;
				while($row = mysql_fetch_row($rs))
				{
							$RegistrationNo=$row[0];
							$sname=$row[1];
							$DOB=$row[2];
							$Age=$row[3];
							$Sex=$row[4];
							$sclass=$row[5];
							$sfathername=$row[6];
							$FatherEducation=$row[7];
							$Status=$row[8];
							$SchoolId=$row[9];
							
							$ssqlchk="select * from `AdmissionFees` where `sadmission`='$RegistrationNo'";
							$rsChk= mysql_query($ssqlchk);
							$View="yes";
							if(mysql_num_rows($rsChk)>0)
							{
								$View="no";							
							}
							
							
				?>

	<tr>
		<td class="style4" style="width: 60px"><?php echo $cnt;?></td>
		<td class="style2" style="width: 71px"><?php echo $RegistrationNo;?></td>
		<td class="style2" style="width: 145px"><?php echo $SchoolId;?></td>
		<td class="style2" style="width: 145px"><?php echo $sname;?></td>
		<td class="style2" style="width: 92px"><?php echo $DOB;?></td>
		<td class="style2" style="width: 92px"><?php echo $Age;?></td>
		<td class="style2" style="width: 92px"><?php echo $Sex;?></td>
		<td class="style2" style="width: 92px"><?php echo $sclass;?></td>
		<td class="style2" style="width: 116px"><?php echo $sfathername;?></td>
		<td class="style2" style="width: 102px"><?php echo $FatherEducation;?></td>
		<td class="style4" style="width: 93px"><?php echo $Status;?></td>
		<td class="style4" style="width: 93px">
		<?php 
			if($Status=="Approve")
			{
				if($View=="yes")
				{
		?>
		<input name="btnProceed<?php echo $RegistrationNo;?>" id="btnProceed<?php echo $RegistrationNo;?>" type="button" value="Proceed" class="text-box" onclick="Javascript:fnlProceedToAdm('<?php echo $RegistrationNo;?>');">
		<?php
			}
			}
		?>
		</td>
	</tr>
	<?php
	$cnt=$cnt+1;
	}
	?>
</table>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>

</body>

</html>