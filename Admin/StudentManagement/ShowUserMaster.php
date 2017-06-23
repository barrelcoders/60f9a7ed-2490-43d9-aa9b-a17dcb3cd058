<?php  
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if ($_REQUEST["isSubmit"]=="yes")
{
	$ssql="SELECT `sname`, `sadmission`, `sclass`,  `srollno`, `sfathername`, `smobile`,`suser`, `spassword`, `email` FROM `user_master` WHERE 1=1";
		
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
//echo $ssql;
//exit();
	$rs= mysql_query($ssql);
}


$num_rows=0;

$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Master</title>
<script type="text/javascript" language="javascript">

function Validate2()
{
	document.getElementById("frmStudentMaster").submit();
}

//function fnlEmail(cnt,sadmission)
function fnlEmail()
{
	/*
	ctrlProceed="btnEmail" + cnt;
	document.getElementById(ctrlProceed).disabled="true";
	
	var sadmission=sadmission;
	window.location.href="SendUserNamePasswordEmail.php?sadmission=" + sadmission;
	return;
	*/
	document.getElementById("frmFrm1").action="SendUserNamePasswordEmail.php";
	document.getElementById("frmFrm1").submit();
}

//function fnlSMS(cnt,sadmission)
function fnlSMS(cnt,sadmission)
{
	/*
	ctrlProceed="btnSMS" + cnt;
	document.getElementById(ctrlProceed).disabled="true";
	
	var sadmission=sadmission;
	window.location.href="SendUserNamePasswordSMS.php?sadmission=" + sadmission;
	return;
	*/
	document.getElementById("frmFrm1").action="SendUserNamePasswordSMS.php";
	document.getElementById("frmFrm1").submit();
}

</script>

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
</style>
</head>

<body>

<div align="center">
<p align="left">&nbsp;</p>
<p align="left"><font face="Cambria"><b>Mobile Application User Master</b></font></p>
<hr>
<p>&nbsp;</p>
<table width="100%" cellspacing="1" height="80" bordercolor="#000000" id="table1" class="auto-style19">

		<form name="frmStudentMaster" id="frmStudentMaster" method="post" action="ShowUserMaster.php">
	<font face="Cambria">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	
	</font>
	
	<td class="auto-style6" style="border-style:solid; border-width:1px; width: 153px">
				<font face="Cambria">Search By</font></td>
	
	<td class="auto-style1" style="border-style:solid; border-width:1px; width: 221px">
				<font face="Cambria">Admission No</font></td>
	
	<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style13">
				<font face="Cambria">
				<input name="txtAdmissionId" id="txtAdmissionId" class="text-box" type="text"></font></td>
	
	<td style="border-style:solid; border-width:1px; width: 110px" class="auto-style6">
				<font face="Cambria">Search By Class</font></td>
	
	<td style="border-style:solid; border-width:1px; width: 178px" class="auto-style13">
				






				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<font face="Cambria">
	<select name="cboClass" id="cboClass" class="text-box" >

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
	

			<tr>
	
	<td class="auto-style6" style="border-style:solid; border-width:1px; width: 153px">
				&nbsp;</td>
	
	<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style13">
				&nbsp;</td>
	
	<td style="border-style:solid; border-width:1px; width: 110px" class="auto-style6">
				&nbsp;</td>
	
	<td style="border-style:solid; border-width:1px; width: 115px" class="auto-style6">
				&nbsp;</td>
	
	<td style="border-style:solid; border-width:1px; width: 165px" class="auto-style13">
				&nbsp;</td>
	
			</tr>
			<tr>
	
	<td style="border-style:solid; border-width:1px; width: 153px" class="auto-style6">
				<font face="Cambria">Search By Name</font></td>
	
	<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style13">
				<font face="Cambria">
				<input name="txtStudentName" id="txtStudentName" type="text" class="text-box"></font></td>
	
	<td style="border-style:solid; border-width:1px; width: 110px" class="auto-style6">
				&nbsp;</td>
	
	<td style="border-style:solid; border-width:1px; width: 115px" class="auto-style13">
				&nbsp;</td>
	
	<td style="border-style:solid; border-width:1px; width: 165px" class="auto-style13">
				&nbsp;</td>
	
			</tr>
			<tr>
	
	<td style="border-style:solid; border-width:1px; width: 153px" class="auto-style6">
				&nbsp;</td>
	
	<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style13">
				&nbsp;</td>
	
	<td style="border-style:solid; border-width:1px; width: 110px" class="auto-style6">
				&nbsp;</td>
	
	<td style="border-style:solid; border-width:1px; width: 115px" class="auto-style13">
				&nbsp;</td>
	
	<td style="border-style:solid; border-width:1px; width: 165px" class="auto-style13">
				&nbsp;</td>
	
			</tr>
			<tr>
	
	<td style="border-style:solid; border-width:1px; width: 153px" class="auto-style6">
				&nbsp;</td>
	
	<td style="border-style:solid; border-width:1px; width: 212px" class="auto-style13">
				<font face="Cambria">
				<input name="Button1" type="button" value="Submit" class="text-box" onclick ="Javascript:Validate2();"></font></td>
	
	<td style="border-style:solid; border-width:1px; width: 110px" class="auto-style6">
				&nbsp;</td>
	
	<td style="border-style:solid; border-width:1px; width: 115px" class="auto-style13">
				&nbsp;</td>
	
	<td style="border-style:solid; border-width:1px; width: 165px" class="auto-style13">
				&nbsp;</td>
	
			</tr>
			</form>
	</table>
	<br>
	<br>
	<br>
<div id="divExcel">	
<table border=1 style="width:100% border-collapse:collapse" cellspacing="0" cellpadding="0" class="CSSTableGenerator">
<form name ="frmFrm1" id="frmFrm1" method ="post" action ="" target ="_blank">
   <tr>
   		<td height="22" align="center" style="width: 82px" bgcolor="#95C23D"><b><font face="Cambria">Serial No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width="82"><b><font face="Cambria">Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width="82"><b><font face="Cambria">Admission No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width="83"><b><font face="Cambria">Class</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width="83"><b><font face="Cambria">Roll No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width="83"><b><font face="Cambria">Father Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width="83"><b><font face="Cambria">Mobile</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width="83"><b><font face="Cambria">User Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width="83"><b><font face="Cambria">Password</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width="83"><b><font face="Cambria">Email</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width="83"><b>
		<font face="Cambria">Send Message</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width="83"><b>
		<font face="Cambria">Send Email</font></b></td>
   	</tr>
			<?php
			$cnt=1;
			

				$record_count=0;
				while($row = mysql_fetch_row($rs))
				{
				
					$sname=$row[0];
					$sadmission=$row[1];
					$sclass=$row[2];
					$srollno=$row[3];
					$sfathername=$row[4];
					$smobile=$row[5];
					$suser=$row[6];
					$spassword=$row[7];
					$email=$row[8];
					
					

			?>
<tr>
	<td height="35" align="center" style="width: 42px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $cnt; ?></span></td>
				<td height="35" align="center" style="width: 95px" class="style11">
				<?php echo $sname;?>
				</td>

				<td height="35" align="center" style="width: 95px" class="style11">
				<?php echo $sadmission; ?></td>
				
				<td height="35" align="center" style="width: 95px" class="style11">
				<?php echo $sclass;?></td>
				
				<td height="35" align="center" style="width: 95px" class="style11">
				<?php echo $srollno;?>
				</td>
				
				<td height="35" align="center" style="width: 95px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $sfathername; ?></span></td>
				
				<td height="35" align="center" style="width:95px" class="style11">
				
				<?php echo $smobile; ?></td>
				
				<td height="35" align="center" style="width: 95px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $suser; ?></span></td>
				
				<!--
				<td height="35" align="center" style="width: 55px" class="style11">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<?php //echo $Nationality; ?></span></td>
				-->
				
				
				<td height="35" align="center" style="width: 77px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $spassword; ?></span></td>
				
				<td height="35" align="center" style="width: 4px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<?php echo $email; ?>	</span></td>
				
				<td height="35" align="center" style="width: 4px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<!--<input name="btnSMS<?php echo $cnt;?>" id="btnSMS<?php echo $cnt;?>" type="button" value="Send Message" onclick="Javascript:fnlSMS('<?php echo $cnt;?>','<?php echo $sadmission;?>');">-->
				<input type="checkbox" name="chkAdmissionId[]" value="<?php echo $sadmission; ?>" />
				</span></td>
				
				
				
				<td height="35" align="center" style="width: 4px" class="style11">
		<!--		
		<input name="btnEmail<?php echo $cnt;?>" id="btnEmail<?php echo $cnt;?>" type="button" value="Send Email" onclick="Javascript:fnlEmail('<?php echo $cnt;?>','<?php echo $sadmission;?>');">-->
		<input type="checkbox" name="chkAdmissionId4Email[]" value="<?php echo $sadmission; ?>" />
		</td>
				
				
				
</tr>
<?php   	 
$cnt=$cnt+1;
}
?>
</form>
</table>
</div>
</div><br>
<p align ="center"><input type="button" name ="btnExcel" value ="Export To Excel" onclick ="javascript:fnlExcel();">  <input name="btnSMS<?php echo $cnt;?>" id="btnSMS<?php echo $cnt;?>" type="button" value="Send Message" onclick="Javascript:fnlSMS();">  <input name="btnEmail<?php echo $cnt;?>" id="btnEmail<?php echo $cnt;?>" type="button" value="Send Email" onclick="Javascript:fnlEmail();"></p>
<p align ="center">
<form name ="frmExcel" id="frmExcel" method ="post" action ="ExportToExcel.php">
<input type ="hidden" name ="htmlCode" id="htmlCode" value ="">
</form>
</p>
<script language ="javascript">
function fnlExcel()
{
	document.getElementById("htmlCode").value=document.getElementById("divExcel").innerHTML;
	document.getElementById("frmExcel").submit();
}
</script>
<?php include "footer.php";?>
<!--<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>-->
</body>
</html>