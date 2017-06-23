<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
//echo "<pre />";print_r($_SESSION['userid']);die;

?>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
	$SelectedDepartment=$_REQUEST["cboDepartment"];
      $DateTo = $_REQUEST["DateFrom"];
     
	 $DateFrom = $_REQUEST["DateTo"];

	
	$date1=date_create($DateTo);
	
	$date2=date_create($DateFrom);

	//echo date_format($date,"d")."-".date_format($date,"M")."-".date_format($date,"Y");
	//exit();
    //echo date_format($date,"Y/m/d H:i:s");
	
	$SelectedDayFROM=date_format($date1,"d");
	$SelectedMonthFROM=date_format($date1,"M");
	$SelectedYearFROM=date_format($date1,"Y");
	
	$SelectedDayTO=date_format($date2,"d");
	$SelectedMonthTO=date_format($date2,"M");
	$SelectedYearTO=date_format($date2,"Y");
//echo "select `EmpId`,(select `Name` from `employee_master` where `EmpId`=a.`EmpId`) as `EmpName`, `PunchDate`, `Month`, `Year`, `InTime`, `OutTime`,`Remarks`,`LOPValue`,`ReportingTime` from `Employee_Punching_Detail` as `a`"
//                 . " WHERE PunchDate >= '$DateTo' AND PunchDate <= '$DateFrom' order by CAST(replace(`EmpId`,'DPS','') AS UNSIGNED)";die;
//                
                // $query="select * from `Employee_Punching_Detail` as `a` WHERE PunchDate >= '$DateFrom' AND PunchDate <= '$DateTo'";
                 
	
            $EmpId=$_SESSION['userid'];
            
//            echo "select `EmpId`,(select `Name` from `employee_master` where `EmpId`=a.`EmpId`) as `EmpName`, `PunchDate`, `Month`, `Year`, `InTime`, `OutTime`,`Remarks`,`LOPValue`,`ReportingTime` from `Employee_Punching_Detail` as `a`"
//                 . " WHERE (PunchDate >= '$DateTo' AND PunchDate <= '$DateFrom') AND EmpId='$EmpId'";die;
	 $rs=mysql_query("select `EmpId`,(select `Name` from `employee_master` where `EmpId`=a.`EmpId`) as `EmpName`, `PunchDate`, `Month`, `Year`, `InTime`, `OutTime`,`Remarks`,`LOPValue`,`ReportingTime` from `Employee_Punching_Detail` as `a`"
                 . " WHERE (PunchDate >= '$DateTo' AND PunchDate <= '$DateFrom') AND EmpId='$EmpId'");
	
  
	//echo "select `EmpId`,(select `Name` from `employee_master` where `EmpId`=a.`EmpId`) as `EmpName`, `PunchDate`, `Month`, `Year`, `InTime`, `OutTime`,`Remarks`,`LOPValue`,`ReportingTime` from `Employee_Punching_Detail` as `a` where (`PunchDate`>='$SelectedDayFROM' and  `PunchDate`<='$SelectedDayTO') and (`Month`>='$SelectedMonthFROM' and  `Month`<='$SelectedMonthTO') and (`Year`>='$SelectedYearFROM' and `Year`<='$SelectedYearTO') order by CAST(replace(`EmpId`,'DPS','') AS UNSIGNED)";
    //exit();
}
?> 
<script language ="javascript">
function Validate()
{
	if((document.getElementById("DateTo").value=="")&&(document.getElementById("DateFrom").value==""))
	{
		alert("Please enter Date!");
		return;
	}
	document.getElementById("frmAtt").submit(); 
}
function fnlUpdate(srno,EmpId,Mnth,dd)
{
	Remarks=document.getElementById("txtRemarks"+srno).value;
	var myWindow = window.open("UpdateData.php?EmpId=" + EmpId + "&LOPValue=" +document.getElementById("cboLOPStatus"+srno).value + "&Month=" + Mnth + "&Year=" + document.getElementById("hYear").value + "&Day=" + dd + "&Remarks=" + escape(Remarks)  , "", "width=200,height=100");
}
</script>
<html>
<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>Employee Attendance Moderation</title>
</head>

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
        font-family: Cambria;
        font-weight:bold;

}

</style>

<body>

<p>&nbsp;</p>
<p><font face="Cambria"><b>Employee Attendance Moderation</b></font></p>
<hr>
<table border="0" width="100%" style="border-collapse: collapse">
<form name ="frmAtt" id="frmAtt" method ="post" action="">
<input type ="hidden" name ="isSubmit" id="isSubmit" value ="yes">
  <tr>
            <td colspan="8">&nbsp;</td>

</tr>
	<tr>
		<td width="332"><font face="Cambria"><b>Select Date From</b></font></td>
		<td width="83">
   	<font face="Cambria"> <input type="date" name="DateFrom" id="DateFrom" size="20" > </font> </td>
                <td width="83">&nbsp;</td>
                <td width="332px" colspan="3"><b><font face="Cambria">Select Date To</font></b></td>
		<td width="83">
   	<font face="Cambria"> <input type="date" name="DateTo" id="DateTo" size="20" ></font></td>
		<td width="83">&nbsp;</td>
                <td width="664" colspan="2" align="center">
		<input type="button" value="Submit" name="btnSubmit" onclick="Javascript:Validate();"></td>
               
                <td width="83">&nbsp;</td>
		
			



		
	</tr>
        <tr>
            <td colspan="8">&nbsp;</td>

</tr>
	</form>
</table>
<table border="1" width="100%" style="border-collapse: collapse" class="CSSTableGenerator">
	<tr>
		<td align="center" style="text-align: center" colspan="15"><b>Date:&nbsp;&nbsp; <?php echo $SelectedDate; ?> </b> </td>
	</tr>
	<tr>
		<td align="center" style="text-align: center"><b><font face="Cambria">SrNo</font></b></td>
		<td align="center" style="text-align: center"><b><font face="Cambria">Emp Id</font></b></td>
		<td align="center" style="text-align: center"><b><font face="Cambria">Emp Name</font></b></td>
		<td align="center" style="text-align: center"><b><font face="Cambria">Punch Date</font></b></td>

		<td align="center" style="text-align: center"><b><font face="Cambria">
		Weekday </font></b></td>

		<td align="center" style="text-align: center"><b><font face="Cambria">Reporting Time</font></b></td>
		<td align="center" style="text-align: center"><b><font face="Cambria">Punch In Time</font></b></td>
		<td align="center" style="text-align: center"><b><font face="Cambria">Punch Out Time</font></b></td>
		<td align="center" style="text-align: center"><b><font face="Cambria">Late By Minutes</font></b></td>

		
	</tr>
	<form name ="frmUpdate" id="frmUpdate" method="post" action="">
	<input type="hidden" name ="hMnth" id="hMnth" value ="<?php echo $Mnth;?>">

	<input type="hidden" name ="hDay" id="hDay" value ="<?php echo $SelectedDay;?>">
	<input type="hidden" name ="hMonth" id="hMonth" value ="<?php echo $SelectedMonth;?>">
	<input type="hidden" name ="hYear" id="hYear" value ="<?php echo $SelectedYearFROM;?>">
	<?php
	$srno=0;
	while($row=mysql_fetch_row($rs))
	{
		$EmpId=$row[0];
		$EmpName=$row[1];
		$PunchDate=$row[2];
		$Month=$row[3];
		$Year=$row[4];
		$InTime=$row[5];
		$OutTime=$row[6];
		$ExistingRemark=$row[7];
		$ExistingLOPValue=$row[8];
		$ReportingTime=$row[9];
        
		$LeaveType="";
		//echo $EmpId;
		//exit();
		
		if($Month=="Jan")
		{$Mnth="01";}
		elseif($Month=="Feb")
		{$Mnth="02";}
		elseif($Month=="Mar")
		{$Mnth="03";}
		elseif($Month=="Apr")
		{$Mnth="04";}
		elseif($Month=="May")
		{$Mnth="05";}
		elseif($Month=="Jun")
		{$Mnth="06";}
		elseif($Month=="Jul")
		{$Mnth="07";}
		elseif($Month=="Aug")
		{$Mnth="08";}
		elseif($Month=="Sep")
		{$Mnth="09";}
		elseif($Month=="Oct")
		{$Mnth="10";}
		elseif($Month=="Nov")
		{$Mnth="11";}
		elseif($Month=="Dec")
		{$Mnth="12";}
		
		$SelectedDate1=$Year."-".$Mnth."-".$PunchDate;
		$rsLeaveStaus=mysql_query("select `LeaveType` from `Employee_Leave_Transaction` where '$SelectedDate1'>=`LeaveFrom` and '$SelectedDate1'<=`LeaveTo` and `EmployeeId`='$EmpId'");
		
		$Weekday=strftime("%A",strtotime($SelectedDate1));
		
		if(mysql_num_rows($rsLeaveStaus)>0)
		{
			$rowLeaveType=mysql_fetch_row($rsLeaveStaus);
			$LeaveType=$rowLeaveType[0];
		}
	    $RptTime=strtotime($ReportingTime);
		$PunchTm=strtotime($InTime);
		$style="";
		$Minute=round(($PunchTm - $RptTime) / (60),2);
		if(round(($PunchTm - $RptTime) / (60),2)>0)
		{
			$style='style="background-color: #FF0000"';
		}
		if($Weekday=="Sunday")
		{
			$style='style="background-color: #79FFA5"';
		}
		
		$srno=$srno+1;
	?>
	<tr>
		<td>
		<p align="center"><font face="Cambria"><?php echo $srno;?></font></td>
		<td><font face="Cambria"><?php echo $EmpId;?></font></td>
		<td><font face="Cambria"><?php echo $EmpName;?></font></td>
		<td><font face="Cambria"><?php echo $PunchDate;?></font></td>
		<td><font face="Cambria"><?php echo $Weekday;?></font></td>
		<td><font face="Cambria"><?php echo $ReportingTime;?></font></td>
		<td <?php echo $style;?>><font face="Cambria"><?php echo $InTime;?></font></td>
		<td><font face="Cambria"><?php echo $OutTime;?></font></td>
		<td><font face="Cambria"><?php echo $Minute;?></font></td>

		
	</tr>
	<?php 
	}
	?>
	</form>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="3">Powered by OnlineSchoolPlanet LLP</font></div>
</div>
</body>

</html>