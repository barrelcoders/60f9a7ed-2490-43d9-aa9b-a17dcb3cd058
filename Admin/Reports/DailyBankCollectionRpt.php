<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$currentdate=date("d-m-Y");
$currentdate1=date("Y-m-d");
if ($_REQUEST["isSubmit"]=="yes")
{
	$Dt=$_REQUEST["txtDate1"];
	$arr=explode('/',$Dt);
	$StartDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	$ShowDate1=$arr[1]."-".$arr[0]."-".$arr[2];
	$Dt=$_REQUEST["txtDate2"];
	$arr=explode('/',$Dt);
	$EndDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	$ShowDate2=$arr[1]."-".$arr[0]."-".$arr[2];
	
	$ssql="SELECT distinct DATE_FORMAT(`BankChallanDate`,'%d-%m-%Y') as `BankChallanDate`,sum(`bankamount`), sum(`challanamount`),sum(`latefees`) FROM `fees_challan_bank` as `a` WHERE `BankChallanDate`>='$StartDt' and `BankChallanDate`<='$EndDt' and `Reco`='Completed' group by DATE_FORMAT(`BankChallanDate`,'%d-%m-%Y')";
	$rs= mysql_query($ssql);
}	
?>

<head>
<style type="text/css">
.style1 {
	border-color: #FFFFFF;
	border-width: 0px;
	border-collapse: collapse;
	}
.style4 {
	font-family: Cambria;
	border-style: solid;
	border-width: 1px;
}
.style2 {
	border-style: solid;
	border-width: 1px;
}
.style5 {
	font-family: Cambria;
	border-style: solid;
	border-width: 1px;
	text-align: center;
}
.style6 {
	border-collapse: collapse;
	border-color: #000000;
	border-width: 0px;
}
</style>
</head>

<script language="javascript">
function Validate()
{
	if(document.getElementById("txtDate1").value =="")
	{
		alert ("Please select date!");
		return;
	}
	document.getElementById("frmReport").submit();
}
</script>
<!-- link calendar resources -->

	<head>
	<meta http-equiv="Content-Language" content="en-us">
	<title>Daywise Fees Collection Report</title>

	<link rel="stylesheet" type="text/css" href="../tcal.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="../tcal.js"></script>
<table style="width: 100%" class="style1">
<form name="frmReport" id="frmReport" method="post" action="DailyBankCollectionRpt.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<tr>
		<td class="style4" colspan="4">&nbsp;</td>
	</tr>	
	<tr>
		<td class="style4" colspan="4"><u><b>Daywise Fees Collection Report</b></u></td>
	</tr>	
	<tr>
		<td class="style4" colspan="4">&nbsp;</td>
	</tr>	
	<tr>
		<td class="style4" style="width: 265px"><b>Start Date:</b></td>
		<td class="style2" style="width: 265px"><input name="txtDate1" id="txtDate1" class="tcal" style="width: 108px" type="text"></td>
		<td class="style4" style="width: 266px">
		<b>End Date:</b></td>
		<td class="style2" style="width: 266px"><input name="txtDate2" id="txtDate2" class="tcal" style="width: 108px" type="text"></td>
	</tr>	
	<tr>
		<td class="style5" colspan="4">
		<input name="btnSubmit" type="button" value="Submit" onclick="Validate();" class="text-box"></td>
	</tr>	
</form>
</table>
<p align="center">
<br>
<font size="4" face="cambria"><b><?php echo $SchoolName; ?></b></font>
<p align="center"> <font face="Cambria"><b>Day Wise Fees Collection Report</b></font></p>
<p align="center"> &nbsp;</p>
<?php
if ($_REQUEST["isSubmit"]=="yes")
{
?>
</p>
<table class="CSSTableGenerator">
	<tr>
		<td class="style5" style="width: 87px" bgcolor="#95C23D"><b>SrNo</b></td>
		<td class="style5" style="width: 260px" bgcolor="#95C23D"><b>Date</b></td>
		<td class="style5" style="width: 260px" bgcolor="#95C23D"><b>Bank Amount</b></td>
		<td class="style5" style="width: 260px" bgcolor="#95C23D"><b>Challan Amount</b></td>
		<td class="style5" style="width: 260px" bgcolor="#95C23D"><b>Late Fee</b></td>
	</tr>
	<?php
	$srno=1;
	while($row = mysql_fetch_row($rs))
	{
		$BankDate=$row[0];
		$BankAmount=$row[1];
		$ChallanAmount=$row[2];
		$LateFee=$row[3];
		
	?>
	<tr>
		<td class="style5" style="width: 87px"><?php echo $srno;?></td>
		<td class="style5" style="width: 260px"><a href="ShowBankDetailOnDate.php?BankDate=<?php echo $BankDate;?>" target="_blank"><?php echo $BankDate;?></a></td>
		<td class="style5" style="width: 260px"><?php echo $BankAmount;?></td>
		<td class="style5" style="width: 260px"><?php echo $ChallanAmount;?></td>
		<td class="style5" style="width: 260px"><?php echo $LateFee;?></td>
	</tr>
	<?php
	$srno=$srno+1;
	}
	?>
</table>
<?php
}//if Condition for submission
?>