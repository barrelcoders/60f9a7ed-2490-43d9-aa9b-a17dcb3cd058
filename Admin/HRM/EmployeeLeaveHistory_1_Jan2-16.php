<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
	$SelectedMonth=$_REQUEST["cboMonth"];
	$SelectedEmpType=$_REQUEST["cboEmployeeType"];
	
	if($SelectedMonth=="Jan" || $SelectedMonth=="Mar" || $SelectedMonth=="May" || $SelectedMonth=="Jul" || $SelectedMonth=="Aug" || $SelectedMonth=="Oct" || $SelectedMonth=="Dec")
	{
		$DaysInMonth=31;		
	}
	if($SelectedMonth=="Apr" || $SelectedMonth=="Jun" || $SelectedMonth=="Sep" || $SelectedMonth=="Nov")
	{
		$DaysInMonth=30;		
	}
	if($SelectedMonth=="Feb")
	{
		$DaysInMonth=28;		
	}
	
	$ssql="SELECT distinct `EmpId` ,`Name`,`Department`,`Designation`,`employeetype`,`Designation` FROM `employee_master` where 1=1;
	if ($SelectedEmpType !="All")
	{
		$ssql=$ssql." and `employeetype`='$SelectedEmpType'";
	}
	$ssql=$ssql." order by `Designation`";
	
	$rs= mysql_query($ssql);
}
	//$ssql="SELECT distinct `employeetype` FROM `employee_master` order by `employeetype`";
	$ssql="SELECT distinct `employeetype` FROM `employee_master` order by `employeetype`";
	$rsEmpType= mysql_query($ssql);
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pending for Approval</title>
<style type="text/css">
.style1 {
	border-collapse: collapse;
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
</style>
<script type="text/javascript" language="javascript">
function fnlGenerate(Month,cnt)
{
	var ctrlEmployeeId="hEmployeeId" + cnt;
	EmployeeId=document.getElementById(ctrlEmployeeId).value;
	var ctrlEmployeeName="hEmployeeName" + cnt;
	EmployeeName=document.getElementById(ctrlEmployeeName).value;
	var ctrlDepartment="hDepartment" + cnt;
	Department=document.getElementById(ctrlDepartment).value;
	var ctrlDesignation="hDesignation" + cnt;
	Designation=document.getElementById(ctrlDesignation).value;
	
	var ctrlEmployeeType="hEmployeeType" + cnt;
	EmployeeType=document.getElementById(ctrlEmployeeType).value;
	
	var ctrlPayband="hPayband" + cnt;
	Payband=document.getElementById(ctrlPayband).value;
	var ctrlGradPay="hGradPay" + cnt;
	GradPay=document.getElementById(ctrlGradPay).value;
	var ctrlDA="hDA" + cnt;
	DA=document.getElementById(ctrlDA).value;
	var ctrlPF="hPF" + cnt;
	PF=document.getElementById(ctrlPF).value;
	var ctrlESI="hESI" + cnt;
	ESI=document.getElementById(ctrlESI).value;
	var ctrlTDS="hTDS" + cnt;
	TDS=document.getElementById(ctrlTDS).value;
	var ctrlDaysInMonth="hDaysInMonth" + cnt;
	DaysInMonth=document.getElementById(ctrlDaysInMonth).value;
	var ctrlTotalSalary="txtTotalSalary" + cnt;
	TotalSalary=document.getElementById(ctrlTotalSalary).value;
	var ctrlDayPresent="txtDayPresent" + cnt;
	DayPresent=document.getElementById(ctrlDayPresent).value;
	var ctrlDayLeave="txtDayLeave" + cnt;
	DayLeave=document.getElementById(ctrlDayLeave).value;
	var ctrlLOP="txtLOP" + cnt;
	LOP=document.getElementById(ctrlLOP).value;
	//var ctrlNetSalary="txtNetSalary" + cnt;
	//NetSalary=document.getElementById(ctrlNetSalary).value;
	var ctrlLOPAmount="txtLOPAmount" + cnt;
	LOPAmount=document.getElementById(ctrlLOPAmount).value;
	var ctrlNetPayout="txtNetPayout" + cnt;
	NetPayout=document.getElementById(ctrlNetPayout).value;
	var ctrlRemarks="txtRemarks" + cnt;
	Remarks=document.getElementById(ctrlRemarks).value;
	
	ctrlButton="btnGenerate" + cnt;
	document.getElementById(ctrlButton).disabled=true;
	
	var finalurl=EmployeeId + "&EmployeeName=" + EmployeeName + "&Department=" + Department + "&Designation=" + Designation + "&employeetype=" + EmployeeType + "&Payband=" + Payband + "&GradPay=" + GradPay;
	finalurl = finalurl + "&DA=" + DA + "&PF=" + PF + "&ESI=" + ESI + "&TDS=" + TDS + "&DaysInMonth=" + DaysInMonth + "&DayPresent=" + DayPresent + "&DayLeave=" + DayLeave;
	finalurl = finalurl + "&LOP=" + LOP + "&LOPAmount=" + LOPAmount + "&NetPayout=" + NetPayout + "&Remarks=" + Remarks + "&Month=" + Month;
	
	
	var myWindow = window.open("SubmitSalaryData.php?EmployeeId=" + finalurl, "", "width=200, height=100");	
}
function Validate()
{
	if(document.getElementById("cboMonth").value=="Select One")
	{
		alert("Please select month!");
		return;		
	}
	if(document.getElementById("cboEmployeeType").value=="Select One")
	{
		alert("Please select Employee Type");
		return;
	}
	document.getElementById("frmSalary").submit();
}
function CalculateLOP(cnt)
{
var ctrlDayPresent="txtDayPresent"+cnt;
var ctrlDayLeave="txtDayLeave"+cnt;
var ctrlLOP="txtLOP"+cnt;
var ctrlLOPAmt="txtLOPAmount"+cnt;
var ctrlTotalSalary="txtTotalSalary"+cnt;
var ctrlNetPayout="txtNetPayout"+cnt;

var ctrlOPayband="hOPayband"+cnt;
var ctrlPayband="hPayband"+cnt;
var ctrltdPayband="tdPayband"+cnt;

var ctrlOGradPay="hOGradPay"+cnt;
var ctrlGradPay="hGradPay"+cnt;
var ctrltdGradPay="tdGradPay"+cnt;

var ctrltdGrossPay="tdGrossPay"+cnt;

var ctrlODA="hODA"+cnt;
var ctrlDA="hDA"+cnt;
var crtltdDA="tdDA"+cnt;

var ctrlOPF="hOPF"+cnt;
var ctrlPF="hPF"+cnt;
var ctrltdPF="tdPF"+cnt;

var ctrlOESI="hOESI"+cnt;
var ctrlESI="hESI"+cnt;
var ctrltdESI="tdESI"+cnt;

if(isNaN(document.getElementById(ctrlPF).value)=="true")
{
	document.getElementById(ctrlPF).value="0";
}
if(isNaN(document.getElementById(ctrlOPF).value)=="true")
{
	document.getElementById(ctrlOPF).value="0";
}

var PFValue=parseInt(document.getElementById(ctrlPF).value);

var DaysInMonth=parseInt(document.getElementById("DaysOfMonth").value);

if(document.getElementById(ctrlDayPresent).value=="")
{
	DayPresent=0;
}
else
{
	DayPresent=parseInt(document.getElementById(ctrlDayPresent).value);
}
if(document.getElementById(ctrlDayLeave).value=="")
{
	DayLeave=0;
}
else
{
	DayLeave=parseInt(document.getElementById(ctrlDayLeave).value);
}

if(DayPresent=="")
{
DayPresent=0;
}
if(DayLeave=="")
{
	DayLeave=0;
}

var LOP=parseInt(DaysInMonth)-(DayPresent+DayLeave);
document.getElementById(ctrlLOP).value=LOP;

//var PerDayAmount=parseInt(document.getElementById(ctrlTotalSalary).value)/parseInt(DaysInMonth);
//var LOPAmount=LOP*PerDayAmount;


document.getElementById(ctrlPayband).value=(parseInt(document.getElementById(ctrlOPayband).value)/parseInt(DaysInMonth))*(DayPresent+DayLeave);
document.getElementById(ctrltdPayband).innerHTML =parseInt(document.getElementById(ctrlPayband).value);

document.getElementById(ctrlGradPay).value=(parseInt(document.getElementById(ctrlOGradPay).value)/parseInt(DaysInMonth))*(DayPresent+DayLeave);
document.getElementById(ctrltdGradPay).innerHTML =parseInt(document.getElementById(ctrlGradPay).value);

//document.getElementById(ctrltdGrossPay).innerHTML =parseInt(parseInt(document.getElementById(ctrlPayband).value) + parseInt(document.getElementById(ctrlGradPay).value));

document.getElementById(ctrlDA).value=(parseInt(document.getElementById(ctrlODA).value)/parseInt(DaysInMonth))*(DayPresent+DayLeave);
document.getElementById(crtltdDA).innerHTML =parseInt(document.getElementById(ctrlDA).value);

document.getElementById(ctrltdGrossPay).innerHTML =parseInt(parseInt(document.getElementById(ctrlPayband).value) + parseInt(document.getElementById(ctrlGradPay).value))+parseInt(document.getElementById(ctrlDA).value);

document.getElementById(ctrlESI).value=(parseInt(document.getElementById(ctrlOESI).value)/parseInt(DaysInMonth))*(DayPresent+DayLeave);
document.getElementById(ctrltdESI).innerHTML=parseInt(document.getElementById(ctrlESI).value);

var NetPayout=parseInt(parseInt(document.getElementById(ctrlPayband).value) + parseInt(document.getElementById(ctrlGradPay).value))+parseInt(document.getElementById(ctrlDA).value);
//alert(NetPayout);
if(parseInt(NetPayout)<=15000)
{
	if(parseInt(document.getElementById(ctrlOPF).value)>0)
	{
		//alert(NetPayout);
		var cPF=parseInt(NetPayout)*12/100;
		document.getElementById(ctrlPF).value=cPF;
		document.getElementById(ctrltdPF).innerHTML=parseInt(document.getElementById(ctrlPF).value);
	}
}
else
{
	document.getElementById(ctrlPF).value=document.getElementById(ctrlOPF).value;
	document.getElementById(ctrltdPF).innerHTML=document.getElementById(ctrlOPF).value;
}

document.getElementById(ctrlNetPayout).value=Math.round(parseInt(parseInt(document.getElementById(ctrlPayband).value) + parseInt(document.getElementById(ctrlGradPay).value))+parseInt(document.getElementById(ctrlDA).value)-parseInt(document.getElementById(ctrlPF).value)-parseInt(document.getElementById(ctrlESI).value));
var LOPAmount=parseInt(document.getElementById(ctrlTotalSalary).value)-parseInt(document.getElementById(ctrlNetPayout).value);
document.getElementById(ctrlLOPAmt).value=parseInt(LOPAmount);

//alert(DayLeave);
}
</script>

</head>
<style>
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

.style5 {
	background-color: #95C23D;
}

.style6 {
	border-collapse: collapse;
}

.style7 {
	text-align: center;
	font-family: Cambria;
	background-color: #8888FF;
}

.style8 {
	text-align: center;
	font-family: Cambria;
}
.style9 {
	color: #FFFFFF;
}

</style>
<body>
		<table style="width: 100%; border-collapse:collapse" class="style14" cellpadding="0">



			<tr>



				<td class="auto-style49" style="height: 10px; background-color:#FFFFFF">







				&nbsp;<p><strong><font face="Cambria">Employee Salary Slip Generation</font></strong></p>
				<hr>
				
				<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">

<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>
				<table style="width: 100%" cellpadding="0" class="style6">
		<form name="frmSalary" id="frmSalary" method="POST" action="EmployeeLeaveHistory.php">
				<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
					<tr>
						<td style="width: 226px"><font face="Cambria"><b>Select Month</b></font></td>
						<td style="width: 226px"><font face="Cambria">
				<select size="1" name="cboMonth" id="cboMonth">
				<option selected="" value="Select One">Select One</option>
				<option value="Jan" <?php if ($SelectedMonth=="Jan") {?>selected="selected"<?php }?> >Jan</option>
				<option value="Feb" <?php if ($SelectedMonth=="Feb") {?>selected="selected"<?php }?> >Feb</option>
				<option value="Mar" <?php if ($SelectedMonth=="Mar") {?>selected="selected"<?php }?> >Mar</option>
				<option value="Apr" <?php if ($SelectedMonth=="Apr") {?>selected="selected"<?php }?> >Apr</option>
				<option value="May" <?php if ($SelectedMonth=="May") {?>selected="selected"<?php }?> >May</option>
				<option value="Jun" <?php if ($SelectedMonth=="Jun") {?>selected="selected"<?php }?> >Jun</option>
				<option value="Jul" <?php if ($SelectedMonth=="Jul") {?>selected="selected"<?php }?> >Jul</option>
				<option value="Aug" <?php if ($SelectedMonth=="Aug") {?>selected="selected"<?php }?> >Aug</option>
				<option value="Sep" <?php if ($SelectedMonth=="Sep") {?>selected="selected"<?php }?> >Sep</option>
				<option value="Oct" <?php if ($SelectedMonth=="Oct") {?>selected="selected"<?php }?> >Oct</option>
				<option value="Nov" <?php if ($SelectedMonth=="Nov") {?>selected="selected"<?php }?> >Nov</option>
				<option value="Dec" <?php if ($SelectedMonth=="Dec") {?>selected="selected"<?php }?> >Dec</option>
				</select></font></td>
						<td style="width: 226px"><font face="Cambria"><b>
						Employee Type</b></font></td>
						<td style="width: 227px"><select name="cboEmployeeType" id="cboEmployeeType">
						<option selected="" value="Select One">Select One</option>
						<option value="All">All</option>
						<?php
						while($row = mysql_fetch_row($rsEmpType))
						{
							$EmployeeType=$row[0];
						?>
						<option value="<?php echo $EmployeeType;?>" <?php if ($SelectedEmpType==$EmployeeType) {?>selected="selected" <?php }?>><?php echo $EmployeeType;?></option>
						<?php
						}
						?>
						</select></td>
						<td style="width: 227px">
					<font face="Cambria">
					<input type="button" value="Submit" name="B1" style="font-weight: 700" onclick="Validate();"></font></td>
					</tr>
					<?php
					if ($SelectedEmpType != "")
					{
					?>
					<tr>
						<td colspan="5" class="style8">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="5" class="style7"><strong>
						<span class="style9">Payroll for : <?php echo $SelectedEmpType; ?></span></strong></td>
					</tr>
					<?php
					}
					?>
		</form>
				</table>
			</tr>
			
		</table>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>		
<table style="width: 100%" class="style1">
<form name="frmApproveRej" id="frmApproveRej" method="post" action="RegistrationApproveRej.php">

		<input type="hidden" name="txtTotalSalary<?php echo $cnt;?>" id="txtTotalSalary<?php echo $cnt;?>" value="<?php echo $TotalSalary;?>">				
		<input type="hidden" name="hDaysInMonth<?php echo $cnt;?>" id="hDaysInMonth<?php echo $cnt;?>" value="<?php echo $DaysInMonth;?>">

		<input type="hidden" name="hTDS<?php echo $cnt;?>" id="hTDS<?php echo $cnt;?>" value="<?php echo $TDS;?>">
		<input type="hidden" name="hESI<?php echo $cnt;?>" id="hESI<?php echo $cnt;?>" value="<?php echo $ESI;?>">
		
		<input type="hidden" name="hOESI<?php echo $cnt;?>" id="hOESI<?php echo $cnt;?>" value="<?php echo $ESI;?>">
		<input type="hidden" name="hPF<?php echo $cnt;?>" id="hPF<?php echo $cnt;?>" value="<?php echo $PF;?>">
		
		<input type="hidden" name="hOPF<?php echo $cnt;?>" id="hOPF<?php echo $cnt;?>" value="<?php echo $PF;?>">
		<input type="hidden" name="hDA<?php echo $cnt;?>" id="hDA<?php echo $cnt;?>" value="<?php echo $DA;?>">
		
		<input type="hidden" name="hODA<?php echo $cnt;?>" id="hODA<?php echo $cnt;?>" value="<?php echo $DA;?>">
		
		<input type="hidden" name="hGrossSalary" id="hGrossSalary" value="<?php echo ($Payband+$GradPay+$DA+$Increment);?>">
		
		<input type="hidden" name="hGradPay<?php echo $cnt;?>" id="hGradPay<?php echo $cnt;?>" value="<?php echo $GradPay;?>">
		
		<input type="hidden" name="hOGradPay<?php echo $cnt;?>" id="hOGradPay<?php echo $cnt;?>" value="<?php echo $GradPay;?>">
		<input type="hidden" name="hPayband<?php echo $cnt;?>" id="hPayband<?php echo $cnt;?>" value="<?php echo $Payband;?>">
		
		
		<input type="hidden" name="hOPayband<?php echo $cnt;?>" id="hOPayband<?php echo $cnt;?>" value="<?php echo $Payband;?>">
		<input type="hidden" name="hEmployeeType<?php echo $cnt;?>" id="hEmployeeType<?php echo $cnt;?>" value="<?php echo $EmpType;?>">
		
		
		<input type="hidden" name="hDesignation<?php echo $cnt;?>" id="hDesignation<?php echo $cnt;?>" value="<?php echo $Designation;?>">
		<input type="hidden" name="hDepartment<?php echo $cnt;?>" id="hDepartment<?php echo $cnt;?>" value="<?php echo $Department;?>">
		<input type="hidden" name="hEmployeeName<?php echo $cnt;?>" id="hEmployeeName<?php echo $cnt;?>" value="<?php echo $EmployeeName;?>">
		<input type="hidden" name="hEmployeeId<?php echo $cnt;?>" id="hEmployeeId<?php echo $cnt;?>" value="<?php echo $EmployeeId;?>">
<input type="hidden" name="txtSelectedMonth" id="txtSelectedMonth" value="<?php echo $SelectedMonth;?>">
<input type="hidden" name="DaysOfMonth" id="DaysOfMonth" value="<?php echo $DaysInMonth;?>">
	<tr>
		<td class="style3" style="width: 52px" bgcolor="#95C23D" height="24">
		<strong style="font-weight: 400">SNo.</strong></td>
		<td class="style3" style="width: 52px" bgcolor="#95C23D" height="24">
		<strong style="font-weight: 400">Emp. Id</strong></td>
		<td class="style3" style="width: 52px" bgcolor="#95C23D" height="24">
		<strong style="font-weight: 400">Name</strong></td>
		<td class="style3" style="width: 52px" bgcolor="#95C23D" height="24">
		<strong style="font-weight: 400">Deptt.</strong></td>
		<td class="style3" style="width: 52px" bgcolor="#95C23D" height="24">
		<strong style="font-weight: 400">Desg.</strong></td>
		<td class="style3" style="width: 182px" bgcolor="#95C23D" height="24">
		No. Of Leave</td>
		<td class="style3" style="width: 142px" bgcolor="#95C23D" height="24">
		Eligibility</td>
		<td class="style3" style="width: 52px" bgcolor="#95C23D" height="24">
		Carry Forward</td>
		<td class="style3" style="width: 53px" bgcolor="#95C23D" height="24">
		<strong style="font-weight: 400">Submit</strong></td>
	</tr>
	<?php
				$cnt=1;
				$Payband=0;
				$GradPay=0;
				
				while($row = mysql_fetch_row($rs))
				{
							$DA=0;
							$PF=0;
							$ESI=0;
							$TDS=0;
							
							$EmployeeId=$row[0];
							$EmployeeName=$row[1];
							$Department=$row[2];
							$Designation=$row[3];
							$EmpType=$row[4];
							//$ssql="SELECT * FROM `Employee_Salary_Calaculation` where `EmpId`='$EmployeeId' and `Month`='$SelectedMonth'";
							//$rsChk= mysql_query($ssql);
							//$ssql="select `ComponentValue` from `Employee_Salary_Earning` where `Component` in ('Pay band','Grade Pay') and `employee_id`='$EmployeeId'";
							$ssql="select `ComponentValue` from `Employee_Salary_Earning` where `Component` in ('Pay band') and `Status`='Active' and `employee_id`='$EmployeeId'";
							$rsPayband=mysql_query($ssql);
							
							while($rowB = mysql_fetch_row($rsPayband))
							{
								$Payband=$rowB[0];
								break;
							}
							$ssql="select `ComponentValue` from `Employee_Salary_Earning` where `Component` in ('Grade Pay') and `Status`='Active' and `employee_id`='$EmployeeId'";
							$rsGradPay=mysql_query($ssql);
							while($rowG = mysql_fetch_row($rsGradPay))
							{
								$GradPay=$rowG[0];
								break;
							}
							$ssql="select `ComponentValue` from `Employee_Salary_Earning` where `Component` in ('Increment') and `Status`='Active' and `employee_id`='$EmployeeId'";
							$rsIncrement=mysql_query($ssql);
							while($rowI = mysql_fetch_row($rsIncrement))
							{
								$Increment=$rowI[0];
								break;
							}
							//echo $Increment;
							
							$ssql="select `ComponentValue` from `Employee_Salary_Earning` where `Component` in ('DA') and `Status`='Active' and `employee_id`='$EmployeeId'";
							$rsDA=mysql_query($ssql);
							while($rowD = mysql_fetch_row($rsDA))
							{
								$DA=$rowD[0];
								break;
							}
							
							//PF
							$ssql="select `ComponentValue` from `Employee_Salary_Deductibles` where `Component` in ('PF') and `Status`='Active' and `employee_id`='$EmployeeId'";
							$rsPF=mysql_query($ssql);
							while($rowPF = mysql_fetch_row($rsPF))
							{
								$PF=$rowPF[0];
								break;
							}
							
							//ESI
							$ssql="select `ComponentValue` from `Employee_Salary_Deductibles` where `Component` in ('ESI') and `Status`='Active' and `employee_id`='$EmployeeId'";
							$rsESI=mysql_query($ssql);
							while($rowESI = mysql_fetch_row($rsESI))
							{
								$ESI=$rowESI[0];
								break;
							}
							$ESI=round($ESI);
							
							//TDS
							$ssql="select `ComponentValue` from `Employee_Salary_Deductibles` where `Component` in ('TDS') and `Status`='Active' and `employee_id`='$EmployeeId'";
							$rsTDS=mysql_query($ssql);
							while($rowTDS = mysql_fetch_row($rsTDS))
							{
								$TDS=$rowTDS[0];
								break;
							}
							$TDS=round($TDS);
							
							//$TotalSalary=$Payband+$GradPay+$DA-$PF-$ESI-$TDS;
							$TotalSalary=$Payband+$GradPay+$DA-$ESI-$TDS;
							
							if($EmpType=="JPS Confirm" || $EmpType=="JPS EPF")
							{
								$TotalSalary1=$Payband+$GradPay+$DA;
								if($TotalSalary1<=15000)
								{
									$PF=$TotalSalary1*12/100;
								}
							}
							$PF=round($PF);
							
							$TotalSalary=$TotalSalary-$PF;
							$TotalSalary=round($TotalSalary);
							
							$ssql="select * from `Employee_Salary_Calculation` where `EmpId`='$EmployeeId' and  `SalaryMonth`='$SelectedMonth' and `FinancialYear`='2015'";
							$rsChk=mysql_query($ssql);
							$disable="no";
							if (mysql_num_rows($rsChk) > 0)
							{
								$disable="yes";		
							}
							
				?>

	<tr>
		<td class="style4" style="width: 52px"><?php echo $cnt;?></td>
		<td class="style4" style="width: 52px"><?php echo $EmployeeId;?></td>
		<td class="style4" style="width: 52px"><?php echo $EmployeeName;?></td>
		<td class="style4" style="width: 52px"><?php echo $Department;?></td>
		<td class="style4" style="width: 52px"><?php echo $Designation;?></td>
		<td class="style4" style="width: 182px">		
		<input type="text" name="txtRemarks<?php echo $cnt;?>0" id="txtRemarks<?php echo $cnt;?>0" size="10" style="width: 64px"></td>
		<td class="style4" style="width: 142px">		
		<input type="text" name="txtRemarks<?php echo $cnt;?>" id="txtRemarks<?php echo $cnt;?>" size="10" style="width: 64px"></td>
		<td class="style4" style="width: 52px">		
		<input type="text" name="txtRemarks<?php echo $cnt;?>1" id="txtRemarks<?php echo $cnt;?>1" size="10" style="width: 64px"></td>
		<td class="style4" style="width: 53px">		
		<font face="Cambria">
		<input name="btnGenerate<?php echo $cnt;?>" id="btnGenerate<?php echo $cnt;?>" type="button" value="Submit" onclick="Javascript:fnlGenerate('<?php echo $SelectedMonth;?>','<?php echo $cnt;?>');" style="width: 61px" <?php if($disable=="yes") {?>disabled="disabled"<?php }?>>
		</font>
		
		</td>
	</tr>
	<?php
	$cnt=$cnt+1;
	}
	?>
	</form>
</table>
<?php
}
?>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>

</html>