<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
//$ssql="SELECT distinct `EmpId`,Date(`PunchDate`),DATE_FORMAT(min(`PunchDate`),'%H:%i:%s'),DATE_FORMAT(max(`PunchDate`),'%H:%i:%s'),TIMESTAMPDIFF(SECOND,min(`PunchDate`),max(`PunchDate`))/(60*60) as `Hrs`,(select `Name` from `employee_master` where `EmpId`=CONCAT('JPS', a.`EmpId`)) as `EmpName` FROM `EmployeePunchingDetail` as `a` group by `EmpId`,Date(`PunchDate`) order by `EmpId`,`PunchDate`";
/*
$ssql="select x.* from
(
SELECT distinct a.`EmpId`,a.`Name`,Date(b.`PunchDate`) as `PunchDate`,
DATE_FORMAT(min(b.`PunchDate`),'%H:%i:%s'),DATE_FORMAT(max(b.`PunchDate`),'%H:%i:%s'),
TIMESTAMPDIFF(SECOND,min(b.`PunchDate`),max(b.`PunchDate`))/(60*60) as `Hrs`
from `employee_master` as `a` LEFT OUTER JOIN `EmployeePunchingDetail` as `b` ON  a.`EmpId`=CONCAT('JPS',b.`EmpId`) GROUP BY a.`EmpId`,a.`Name`,Date(b.`PunchDate`)
) as `x` where x.Hrs>.50";
*/

/*
$ssql="SELECT distinct a.`EmpId`,a.`Name`,Date(b.`PunchDate`) as `PunchDate`,
DATE_FORMAT(min(b.`PunchDate`),'%H:%i:%s'),DATE_FORMAT(max(b.`PunchDate`),'%H:%i:%s'),
TIMESTAMPDIFF(SECOND,min(b.`PunchDate`),max(b.`PunchDate`))/(60*60) as `Hrs`
from `employee_master` as `a` LEFT OUTER JOIN `EmployeePunchingDetail` as `b` ON  a.`EmpId`=CONCAT('JPS',b.`EmpId`) GROUP BY a.`EmpId`,a.`Name`,Date(b.`PunchDate`)";
*/



if($_REQUEST["isSubmit"] !="")
{
if($_REQUEST["txtFromDate"] !="")
{
	$ssql="select distinct `EmpId`,`Name` from `employee_master` where 1=1";
	if($_REQUEST["txtEmployeeId"] !="")
	{
		$EmpId=$_REQUEST["txtEmployeeId"];
		$ssql=$ssql." and `EmpId`='$EmpId'";
	}
	
	$rs= mysql_query($ssql);

	$Dt = $_REQUEST["txtFromDate"];
	$arr=explode('/',$Dt);
	$FromDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	$Dt = $_REQUEST["txtToDate"];
	$arr=explode('/',$Dt);
	$ToDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	$date1=date_create($ToDate);
	
	
		/*
		$i=1;
		$date=date_create($FromDate);
		while(date_format($date,"Y-m-d") != date_format($date1,"Y-m-d"))
		{
		date_add($date,date_interval_create_from_date_string("1 days"));
		$i=$i+1;
		echo date_format($date,"Y-m-d");	
		
			if($i>700)
			{
			exit();
			}
		}
		exit();
		*/

}

	//$ssql=$ssql." GROUP BY a.`EmpId`,a.`Name`,Date(b.`PunchDate`)";
	
}
$num_rows=0;

?>
<script language="javascript">
function ShowEdit(SrNo)
{	
	var myWindow = window.open("EditStudentMaster.php?srno=" + SrNo ,"","width=300,height=400");
}
function ShowDelete(SrNo)
{
	var r = confirm("Do you really want to delete the entry?");
	if (r == true)
 	 {
  		var myWindow = window.open("DeleteStudentMaster.php?srno=" + SrNo ,"","width=300,height=400");
  	 }
	else
  	{
	  	return;
  	}
}
function Validate()
{
	if(document.getElementById("txtFromDate").value !="" && document.getElementById("txtToDate").value =="")
	{
		alert("Please select to date!");
		return;
	}
	if(document.getElementById("txtFromDate").value =="" && document.getElementById("txtToDate").value !="")
	{
		alert("Please select from date!");
		return;
	}
	document.getElementById("frmReport").submit();
}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Fees Master</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../tcal.css" />

	<script type="text/javascript" src="../tcal.js"></script>

	

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


.auto-style20 {
	border-collapse: collapse;
	border-width: 0px;
	font-size: medium;
}

.auto-style22 {
	color: #000000;
}
.auto-style23 {
	border: medium none #FFFFFF;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
	text-align: left;
	background-color: #FFFFFF;
}

.auto-style6 {
	color: #DAB9C1;
}

.auto-style24 {
	border-style: none;
	border-width: medium;
}
.auto-style25 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 0px;
}

.auto-style3 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 15px;
	color: #CEAA9E;
}

</style>

</head>



<body>

<p>&nbsp;</p>

<table width="100%" cellspacing="0" id="table_10">
	<tr>
		<td>

<table width="100%" cellspacing="0" id="table_11" class="auto-style20">

	

	
	<tr>
		<td>
		
		
		<span><b><font face="Cambria" size="3">Compiled Employee Attendance 
		Report</font></b><hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 30px"><a href="javascript:history.back(1)">
<img height="27" src="../images/BackButton.png" width="60" style="float: right"></a></p>
				
				</span></a></table>

		<form name="frmReport" id="frmReport" method="POST" action="">
		<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
			<p><b><font face="Cambria">Select Date From :&nbsp;&nbsp; </font>
			</b>
			<input type="text" name="txtFromDate" id="txtFromDate" size="20" class="tcal">&nbsp; <b>
			<font face="Cambria">Date To :</font></b>
			<input type="text" name="txtToDate" id="txtToDate" size="20" class="tcal"></p>
<p><b><font face="Cambria">Enter Employee ID : </font></b>
			<input type="txtEmployeeId" name="txtEmployeeId" size="20">			
	<p><input type="button" value="Submit" name="btnSubmit" onclick="Javascript:Validate();"></p>
</form>
		</td>
		
</table>


	
<table width="100%" cellspacing="1" style="border-collapse: collapse" height="80" id="table1">

		<tr>

		<td>

		<table width="100%" bordercolor="#000000" id="table3" class="style2" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse">			
		<tr>				
		
		<td height="34" bgcolor="#95C23D" align="center" style="width: 283px">				
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">				
		Sr. No.</span></td>				
		<td height="34" bgcolor="#95C23D" align="center" style="width: 283px" class="style4">				
		<b>				
		<font color="#000000" face="Cambria">Employee Id</font></b></td>				
		<td height="34" bgcolor="#95C23D" align="center" style="width: 283px" class="style4">				
		<b>				
		<font color="#000000" face="Cambria">Employee Name</font></b></td>
		<td height="34" bgcolor="#95C23D" align="center" style="width: 283px" class="style4">				
		<b><font face="Cambria">Total Working Days</font></b></td>
		<td height="34" bgcolor="#95C23D" align="center" style="width: 283px" class="style4">				
		<b><font face="Cambria">Days Present</font></b></td>				
				
		<td height="34" bgcolor="#95C23D" align="center" style="width: 283px" class="style4">				
		<b><font face="Cambria">Days Absent</font></b></td>				
				
		<td height="34" bgcolor="#95C23D" align="center" style="width: 283px" class="style4">				
		<b><font face="Cambria">Days On Leave</font></b></td>				
				
		<td height="34" bgcolor="#95C23D" align="center" style="width: 283px" class="style4">				
		<b><font face="Cambria">Days Entry After 7:50 AM</font></b></td>				
				
		<td height="34" bgcolor="#95C23D" align="center" style="width: 283px" class="style4">				
		<b><font face="Cambria">Departure Before 02:30 PM</font></b></td>				
				
					</tr>

			<?php
				$srno=0;
				if($_REQUEST["isSubmit"] !="")
				{
					while($row = mysql_fetch_row($rs))
					{
						//$srno=$srno+1;
						$EmpId=$row[0];					
						$EmpName=$row[1];
						
						//$PunchDate=$row[2];
						//$PunchInTime=$row[3];
						//$PunchOutTime=$row[4];
						//$PunchHrs=$row[5];
						$date=date_create($FromDate);
						$i=1;
						
						//while(date_format($date,"Y-m-d") <= date_format($date1,"Y-m-d"))
						//while(date_format($date,"Y-m-d") != date_format($date1,"Y-m-d"))
						while(date_format($date,"Y-m-d") <= date_format($date1,"Y-m-d"))
						{
							$srno=$srno+1;
							//date_add($date,date_interval_create_from_date_string("1 days"));
							$i=$i+1;
							//echo date_format($date,"Y-m-d");	
							$ssql="select DATE_FORMAT(min(`PunchDate`),'%H:%i:%s'),DATE_FORMAT(max(`PunchDate`),'%H:%i:%s'),TIMESTAMPDIFF(SECOND,min(`PunchDate`),max(`PunchDate`))/(60*60) as `Hrs` from `EmployeePunchingDetail` as `a` where CONCAT('JPS', a.`EmpId`)='$EmpId' and Date(`PunchDate`)='". date_format($date,"Y-m-d")."'";
							//echo $ssql;
							//exit();
							$rsDetail= mysql_query($ssql);
							while($row1 = mysql_fetch_row($rsDetail))
							{
								$MinPunchDate=$row1[0];
								$MaxPunchDate=$row1[1];
								$PunchHrs=$row1[2];
								break;
							}
							
							$day  = date('w', strtotime(date_format($date,"Y-m-d")));;
							$days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday');
							//$dayofweek= date('Y-m-d', strtotime($days[$day], strtotime($date)));
							$dayofweek= $days[$day];

							
						
			?>

			<tr>
				<td height="35" align="center" style="width: 283px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #CC3300">				
				<?php echo $srno; ?></span><font face="Cambria"> </font>				</td>				
				
				<td height="35" align="center" style="width: 283px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #CC3300">				
				<?php echo $EmpId; ?></span><font face="Cambria"> </font>				</td>		
				
				
				<td height="35" align="center" style="width: 283px">				
				<?php echo $EmpName;?></td>			
				
				
				
				
				
				<td height="35" align="center" style="width: 283px"><span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #CC3300">				
				<?php echo date_format($date,"d-m-Y"); ?></span></td>			
				
				
				
				
				
				<td height="35" align="center" style="width: 283px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #CC3300">				
				<?php echo $dayofweek; ?></span>
				</td>
				
			

				
				
				<td height="35" align="center" style="width: 283px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #CC3300">				
				</span><font face="Cambria"> <?php if ($MinPunchDate=="") {echo '<span style="color: #FF0000;">Not Puched</span>';} else {echo $MinPunchDate;} ?></font></td>
				
			

				
				
				<td height="35" align="center" style="width: 283px">				
				<?php if($PunchHrs < 0.1) {echo '<span style="color: #FF0000;">Not Puched</span>';} else {echo $MaxPunchDate;} ?></td>
				<td height="35" align="center" style="width: 283px">				
				<?php echo $PunchHrs;?></td>
				
			

				<td height="35" align="center" style="width: 283px">				
				&nbsp;</td>
				
			

			</tr>

			<?php
						date_add($date,date_interval_create_from_date_string("1 days"));
						if($i>70)
						{
						exit();
						}
					}
				}
			}

			?>

			</table>

		</td>

		

	</tr>

</table>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>



</html>