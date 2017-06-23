<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["isSubmit"] !="")
{
	if($_REQUEST["txtFromDate"] !="")
	{
		$ssql="select distinct a.`EmpId`,a.`Name` from `employee_master` as `a` where a.`EmpId` not in (select CONCAT('JPS',b.`EmpId`) from `EmployeePunchingDetail` as `b` where ";
		if($_REQUEST["txtEmployeeId"] !="")
		{
			$EmpId=$_REQUEST["txtEmployeeId"];
			$ssql=$ssql." and `EmpId`='$EmpId'";
		}
		
		
		$Dt = $_REQUEST["txtFromDate"];
		$arr=explode('/',$Dt);
		$FromDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
		
		$date=date_create($FromDate);

		
		$Dt = $_REQUEST["txtToDate"];
		$arr=explode('/',$Dt);
		$ToDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];		
		$ssql=$ssql."  b.`PunchDate`>='$FromDate' and b.`PunchDate`<='$ToDate')";	
		$rs= mysql_query($ssql);
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
	if(document.getElementById("txtFromDate").value != document.getElementById("txtToDate").value)
	{
		alert("Please select dame date in from date and to date!");
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

.style1 {
	color: #FF0000;
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
		
		
		<span><b><font face="Cambria" size="3">Employee Attendance</font></b><hr class="auto-style3" style="height: -15px">
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
		<b><font face="Cambria">Date</font></b></td>
		<td height="34" bgcolor="#95C23D" align="center" style="width: 283px" class="style4">				
		<b><font face="Cambria">Attendance</font></b></td>				
				
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
												
							$day  = date('w', strtotime(date_format($date,"Y-m-d")));
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
				<span class="style1"><strong>Absent</strong></span></td>
			</tr>

			<?php
						//date_add($date,date_interval_create_from_date_string("1 days"));						
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