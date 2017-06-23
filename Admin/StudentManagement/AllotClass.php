<?php
include '../../connection.php';
include '../Header/Header3.php';
session_start();
?>
<?php

if ($_REQUEST["isSubmit"]=="yes")
{
	//$ssql="(SELECT `srno` , `sname` , `sadmission`,`sclass` FROM `NewStudentAdmission` where 1=1";
		$ssql="(SELECT `srno` , `sname` , `sadmission`,`sclass`,`SchoolId` FROM `NewStudentAdmission` where `sadmission` not in (select distinct `sadmission` from `student_master`)";
	
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
			if ($_REQUEST["cboFinancialYear"] !="")
			{
				$SelectedFinancialYear=$_REQUEST["cboFinancialYear"];
				$ssql = $ssql . " and `FinancialYear`='$SelectedFinancialYear'";
			}
			
		}
		else
		{
			if ($_REQUEST["txtStudentName"] != "")
				{
					$StudentName=$_REQUEST["txtStudentName"];
					$ssql = $ssql . " and `sname` like '%" . $StudentName . "%'";
				}
			if ($_REQUEST["cboFinancialYear"] !="")
			{
				$SelectedFinancialYear=$_REQUEST["cboFinancialYear"];
				$ssql = $ssql . " and `FinancialYear`='$SelectedFinancialYear'";
			}
		}
		
	}
	$ssql=$ssql . " order by `sadmission` desc)";
	
	
	//echo $ssql;
	//exit();
	$rs= mysql_query($ssql);
}




//$ssqlClass="SELECT distinct `class` FROM `class_master`";
//$ssqlClass="SELECT distinct `sclass` FROM `NewStudentAdmission`";

$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);

$ssqlFY="SELECT distinct `year`,`financialyear` FROM `FYmaster`";
$rsFY= mysql_query($ssqlFY);
?>
<script language="javascript">

function Validate2()
{
	document.getElementById("frmStudentMaster").submit();
}

function Validate(cnt,AdmissionNo)
{
	var sclass="";
	var RollNo="";
	//TotalStudent=document.getElementById("txtTotalStudent").value;
	
		var ctrlRollNo="txtAllotRollNo" + cnt;
		var ctrlClass="cboAllotClass" + cnt;
		sclass=document.getElementById(ctrlClass).value;
		RollNo=document.getElementById(ctrlRollNo).value;
		//alert(RollNo);
		//ValidateClassRollNo(sclass,RollNo,cnt,AdmissionNo);	
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
		        		if (rows != "Already Exists")
		        		{
			        		alert(rows);
			        		var ctrlButton="btnAllot" + cnt;
			        		document.getElementById(ctrlButton).disabled="true";
			        		return;
		        		}
		        		else
		        		{
		        			alert(rows);
		        			return;
		        		}
				}
		}
		var submiturl="ValidateClassRollNo1.php?Class=" + sclass + "&RollNo=" + RollNo + "&AdmissionNo=" + AdmissionNo;
		xmlHttp.open("GET", submiturl,true);
		xmlHttp.send(null);
	
}

function ValidateClassRollNo(sclass,rollNo,cnt,AdmissionNo)
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
		        		if (rows != "Already Exists")
		        		{
			        		alert(rows);
			        		var ctrlButton="btnAllot" + cnt;
			        		document.getElementById(ctrlButton).disabled="true";
			        		return;
		        		}
		        		else
		        		{
		        			alert(rows);
		        			return;
		        		}
				}
		}
		var submiturl="ValidateClassRollNo1.php?Class=" + sclass + "&RollNo=" + rollNo + "&AdmissionNo=" + AdmissionNo;
		xmlHttp.open("GET", submiturl,true);
		xmlHttp.send(null);
}
</script>



<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Allot Class & Roll No. to New Student</title>

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
	color: #FFFFFF;
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
	color: #FFFFFF;
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
.style13 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	font-style: normal;
}

</style>
</head>
<body>
<table width="100%" cellspacing="1" height="80" bordercolor="#000000" id="table1" class="auto-style19">
		<tr>
		<td>
		&nbsp;<table border="1" width="100%" id="table2" bordercolor="#000000" class="auto-style18">
			<tr>
				<td class="auto-style17">
<p class="auto-style5" style="height: 12px"><font face="Cambria" size="3">
<strong>Allot Class &amp; Roll No To New Student</strong></font></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="images/BackButton.png" width="70" style="float: right"></a></p>
				
				</table>
	
	<table class="auto-style7" style="width: 1024px">
		<form name="frmStudentMaster" id="frmStudentMaster" method="post" action="AllotClass.php">
	<font face="Cambria">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	
	</font>
	
	<td class="auto-style6" style="width: 132px">
				Search By</td>
	
	<td class="auto-style1" style="width: 107px">
				Admission No</td>
	
	<td style="width: 191px" class="auto-style13">
				<font face="Cambria">
				<input name="txtAdmissionId" id="txtAdmissionId" type="text" class="text-box"></font></td>
	
	<td style="width: 78px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
			<tr>
	
	<td class="auto-style6" style="width: 132px">
				&nbsp;</td>
	
	<td class="auto-style15" style="width: 107px">
				&nbsp;</td>
	
	<td style="width: 191px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 78px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td class="auto-style6" style="width: 132px">
				Search By</td>
	
	<td class="style13" style="width: 107px">
				Financial Year</td>
	
	<td style="width: 191px" class="auto-style13">
				<font face="Cambria">
				<select name="cboFinancialYear" id="cboFinancialYear" class="text-box">
				<option selected="" value="">Select One</option>
				<?php
				while($rowFY = mysql_fetch_row($rsFY))
				{
							$Year=$rowFY[0];
							$FYear=$rowFY[1];
				?>
				<option value="<?php echo $Year; ?>"><?php echo $FYear; ?></option>
				<?php 
				}
				?>
				</select></font></td>
	
	<td style="width: 78px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td class="auto-style6" style="width: 132px">
				&nbsp;</td>
	
	<td class="auto-style15" style="width: 107px">
				&nbsp;</td>
	
	<td style="width: 191px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 78px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 132px" class="auto-style6">
				Search By Class</td>
	
	<td style="width: 107px" class="auto-style12">
				<font face="Cambria">Select Class</font></td>
	
	<td style="width: 191px" class="auto-style13">
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
	
	<td style="width: 78px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 132px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 107px" class="auto-style11">
				&nbsp;</td>
	
	<td style="width: 191px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 78px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 132px" class="auto-style6">
				Search By Roll No</td>
	
	<td style="width: 107px" class="auto-style11">
				Roll No:</td>
	
	<td style="width: 191px" class="auto-style13">
				<font face="Cambria">
				<input name="txtRollNo" id="txtRollNo" type="text" class="text-box"></font></td>
	
	<td style="width: 78px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 132px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 107px" class="auto-style16">
				</td>
	
	<td style="width: 191px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 78px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 132px" class="auto-style6">
				Search By Name</td>
	
	<td style="width: 107px" class="auto-style11">
				Name</td>
	
	<td style="width: 191px" class="auto-style13">
				<font face="Cambria">
				<input name="txtStudentName" id="txtStudentName" type="text" class="text-box"></font></td>
	
	<td style="width: 78px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 132px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 107px" class="auto-style10">
				<font face="Cambria">
				<input name="Button1" type="button" value="Submit" onclick ="Javascript:Validate2();" class="text-box"></font></td>
	
	<td style="width: 191px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 78px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 128px" class="auto-style13">
				&nbsp;</td>
			</tr>
	</form>
	</table>
	
	<table id="table3" class="CSSTableGenerator">
		<form name="frmAllotClassRollNo" id="frmAllotClassRollNo" method="post" action="SubmitAllotClass.php">
			<tr>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 90px" class="style11">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">

				Sr. No.</span></td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 294px" class="style12">

				School Id</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 294px" class="style12">

				Admission Id</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 238px" class="style12">

				Student Name</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 238px" class="style12">

				Admission

				Class</td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 238px" class="style12">

				Class</td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 238px" class="style12">

				Roll No</td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 238px" class="style12">

				Action</td>

							</tr>

			<?php
				$num_rows=1;
				while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$Name=$row[1];
					$Admission=$row[2];
					$Class=$row[3];
					$SchoolId=$row[4];
					

			?>

			<tr>

				<td height="35" align="center" style="width: 90px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $num_rows; ?></span></td>

				<td height="35" align="center" style="width: 294px" class="style11">

				<?php echo $SchoolId;?></td>
				
				<td height="35" align="center" style="width: 294px" class="style11">

				<font face="Cambria">

				<?php echo $Admission;?></font></td>
				
				<td height="35" align="center" style="width: 238px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Name; ?></span></td>
				
				<td height="35" align="center" style="width: 238px" class="style11">
				
				<?php echo $Class;?></td>
				
				<td height="35" align="center" style="width: 238px" class="style11">
				
				<font face="Cambria">
				
				<select name="cboAllotClass<?php echo $num_rows; ?>" class="text-box" id="cboAllotClass<?php echo $num_rows; ?>">
				<option selected="" value="Select One">Select One</option>
				<?php
					$ssqlClass="SELECT distinct `class` FROM `class_master`";
					$rsClass1= mysql_query($ssqlClass);
				while($row1 = mysql_fetch_row($rsClass1))
				{
							$Class=$row1[0];
				?>
				<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
				<?php
				}
				?>
				</select></font></td>
				
				<td height="35" align="center" style="width: 238px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $RollNo; ?></span><font face="Cambria"><input name="txtAllotRollNo<?php echo $num_rows; ?>" class="text-box" id="txtAllotRollNo<?php echo $num_rows; ?>" type="text"></font></td>
				
				<td height="35" align="center" style="width: 238px" class="style11">
				
				<font face="Cambria">
				
				<input name="btnAllot<?php echo $num_rows; ?>" id="btnAllot<?php echo $num_rows; ?>" class="text-box" type="button" value="Allot the Roll No" onclick="Javascript:Validate('<?php echo $num_rows; ?>','<?php echo $Admission;?>');" style="font-weight: 700"></font></td>
				
				</tr>

			<?php
			$num_rows=$num_rows+1;
			}

			?>
			<font face="Cambria">
			<input type="hidden" name="txtTotalStudent" id="txtTotalStudent" value="<?php echo $num_rows-1;?>">
			</font>
			<tr>

				<td height="35" align="center" class="style11" colspan="8">

				<font face="Cambria">

				<input name="btnSubmit" type="button" value="Submit" class="text-box"></font></td>

				</tr>
		</form>
			
		</table>

		</td>

		<td>

		&nbsp;</td>

	</tr>

</table>
<?php include"footer.php";?>
<!--<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>-->

</body>



</html>