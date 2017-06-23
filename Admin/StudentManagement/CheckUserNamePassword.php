<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>


<?php
$ssqlsadmission="SELECT distinct `sadmission` FROM `fees_student`";
$rssadmission= mysql_query($ssqlsadmission);

$rsFeeHeadMaster=mysql_query("select distinct `feeshead` from `fees_student`");

if($_REQUEST["isSubmit"]=="yes")
{	
	$Selectedsadmission=$_REQUEST["admissionno"];
	$AddNewFeeHead	=$_REQUEST["cboAddNewFeeHead"];
	$NewFeeHeadAmount=$_REQUEST["txtNewFeeHeadAmount"];
	if($AddNewFeeHead !="" && $NewFeeHeadAmount !="")
	{
		$rsStudentDetail= mysql_query("select `sclass`,`sname` from `student_master` where `sadmission`='$Selectedsadmission'");
		while($rowS=mysql_fetch_row($rsStudentDetail))
		{
			$sclass=$rowS[0];
			$sname=$rowS[1];
			break;
		}
		$rsChk=mysql_query("select * from `fees_student` where `sadmission`='$Selectedsadmission' and `feeshead`='$AddNewFeeHead'");
		if(mysql_num_rows($rsChk)==0)
		{
			$rsTotalAmt=mysql_query("select `amount` from `fees_student` as `a` where `sadmission`='$Selectedsadmission' and `feeshead`='TOTAL BILL AMOUNT'");
			$TotalAmout=0;
			if(mysql_num_rows($rsTotalAmt)>0)
			{
				while($rowTot=mysql_fetch_row($rsTotalAmt))
				{
					$TotalAmout=$NewFeeHeadAmount+$rowTot[0];
					break;
				}
			}
			else
			{
				$TotalAmout=$NewFeeHeadAmount;
			}
			
			mysql_query("update `fees_student` set `amount`='$TotalAmout' where `sadmission`='$Selectedsadmission' and `feeshead`='TOTAL BILL AMOUNT'") or die(mysql_error());
			
			$ssql="insert into `fees_student` (`sadmission`,`class`,`Name`,`feeshead`,`amount`,`financialyear`,`FeesType`) values ('$Selectedsadmission','$sclass','$sname','$AddNewFeeHead','$NewFeeHeadAmount','2015','Regular')";
			mysql_query($ssql) or die(mysql_error());	
		}
	}

	
	$ssql="select distinct `feeshead`,`amount`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,`FeesType` from `fees_student` as `a` where `sadmission`='$Selectedsadmission' and `feeshead`!='TOTAL BILL AMOUNT' and `FeesType` in ('Regular','Hostel') and `feeshead` not like '%INSTAL%'";
	
	$rs= mysql_query($ssql);
	
	$ssql1="select `amount`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,`class` from `fees_student` as `a` where `sadmission`='$Selectedsadmission' and `feeshead`='TOTAL BILL AMOUNT'";
	
	$rs1= mysql_query($ssql1);
	while($row1=mysql_fetch_row($rs1))
	{
		$TotalExistingBillAmount=$row1[0];
		$sname=$row1[1];
		$discounttype=$row1[2];
		$Class=$row1[3];
		break;
	}
}
?>
<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Check User Name Password</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>
	
<script language="javascript" type="text/javascript">


function sname()
{
	
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
			        	document.getElementById('name').value=arr_row[0];
						document.getElementById('clas').value=arr_row[1];       	 
						document.getElementById('roll').value=arr_row[2];
						document.getElementById('user').value=arr_row[3];
						document.getElementById('pass').value=arr_row[4];       	 
			        }
		      }
			
			var submiturl="get_info2.php?c=" + document.getElementById('adm').value;
			itm.open("GET", submiturl,true);
			itm.send(null);
}



</script>


	

<style>
<!--

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
	text-align: left;
}

.style2 {
	font-weight: bold;
	text-align: center;
	background-color: #C0C0C0;
}

.style3 {
	text-align: center;
}

-->
</style>

	

</head>



<body>
<form name="frmRpt" id="frmRpt" method="post" action="CheckUserNamePassword.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font size="3" face="Cambria">Check User Name Password </p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

        <img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></td>
  </tr>
</table>
<font face="Cambria"> 
<br /><br />
</font>  

<table class="name" width="100%">

 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria">
			Admission No.</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria"><input  class="textbox" name="admissionno" id="adm" onkeyup="javascript:sname();" style="float: left" /></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria">
			Student Name</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria"><input name="name" id="name" style="float: left"  class="textbox" readonly /></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria">
			Class</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria"><input name="class" id="clas"  class="textbox" style="float: left" readonly/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;"><font face="Cambria">
			Roll No</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;"><font face="Cambria"><input name="rollno" id="roll" class="textbox" style="float: left" readonly/></font></td>
 </tr>

 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;">
			<font face="Cambria">User Name</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; height: 28px;" colspan="2">
			<input name="txtusername"  id="user" id="txtNewFeeHeadAmount0" class="textbox" type="text" readonly></td> 
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;">
			<font face="Cambria">Password</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; height: 28px;" colspan="2" class="style1">
			<input name="txtpassword" id="pass" id="txtNewFeeHeadAmount" type="text" class="textbox" readonly></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;">
			&nbsp;</td>
 </tr>

 <tr>
		  <td style="border-style: solid; border-width: 1px; " align=center colspan="8" class="style1">&nbsp;<!--
		  <input name="btnAddNew" type="button" value="Add New" onclick="javascript:ValidateAddNew();">
		  --><input name="Submit1" type="submit" value="Search" class="theButton"></td>
 </tr>
 </table>
</form>
<font face="Cambria"><br>
</font>

<?php
if($_REQUEST["isSubmit"]=="yes")
{
	
?>
<br/>
<br/>
<br/>
<br/>
<table class="name" width="100%">


</form>
</table>
<?php
}
?>
</div>
<?php include "footer.php";?>

<!--<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>-->

</body>
</html>