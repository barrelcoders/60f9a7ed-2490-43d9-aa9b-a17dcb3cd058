<?php
session_start();
include '../../connection.php';

?>
<?php
$currentdate=date("d-m-Y");
$currentdate1=date("Y-m-d");
	$Dt=$_REQUEST["BankDate"];
	$arr=explode('-',$Dt);
	//$StartDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	$StartDt = $arr[2] . "-" . $arr[1] . "-" . $arr[0];
	
	
	$ssql="SELECT `sadmission`,`sname`,`class`,`rollno`,`challanno`,`quarter`,`bankamount`,`challanamount`,`latefees`,`ChequeNo`,`dateofupload`,`Reco`,DATE_FORMAT(`BankChallanDate`,'%d-%m-%Y') as `BankChallanDate` FROM `fees_challan_bank` as `a` WHERE `BankChallanDate`='$StartDt' and `Reco`='Completed'";
	$rs= mysql_query($ssql);
?>

<head>
<style type="text/css">
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

	<link rel="stylesheet" type="text/css" href="../tcal.css" />

	<script type="text/javascript" src="../tcal.js"></script>
<table style="width: 1327px" class="style6">
	<tr>
		<td class="style5" colspan="14"><font size="4"><?php echo $SchoolName; ?></font></td>
	</tr>
	<tr>
		<td class="style5" colspan="14">Student Details <?php echo $BankChallanDate; ?></td>
	</tr>
	<tr>
		<td class="style5" style="width: 94px" bgcolor="#95C23D"><b>SrNo</b></td>
		<td class="style5" style="width: 94px" bgcolor="#95C23D"><b>Adm Id</b></td>
		<td class="style5" style="width: 94px" bgcolor="#95C23D"><b>Name</b></td>
		<td class="style5" style="width: 95px" bgcolor="#95C23D"><b>Class</b></td>
		<td class="style5" style="width: 95px" bgcolor="#95C23D"><b>Roll No</b></td>
		<td class="style5" style="width: 95px" bgcolor="#95C23D"><b>Challan No</b></td>
		<td class="style5" style="width: 95px" bgcolor="#95C23D"><b>Quarter</b></td>
		<td class="style5" style="width: 95px" bgcolor="#95C23D"><b>Bank Amt.</b></td>
		<td class="style5" style="width: 95px" bgcolor="#95C23D"><b>Challan Amt.</b></td>
		<td class="style5" style="width: 95px" bgcolor="#95C23D"><b>Late Fee</b></td>
		<td class="style5" style="width: 95px" bgcolor="#95C23D"><b>Cheque No</b></td>
		<td class="style5" style="width: 95px" bgcolor="#95C23D"><b>Upload Date</b></td>
		<td class="style5" style="width: 95px" bgcolor="#95C23D"><b>Reco</b></td>
		<td class="style5" style="width: 95px" bgcolor="#95C23D"><b>Bank Date</b></td>
	</tr>
	<?php
	$srno=1;
	while($row = mysql_fetch_row($rs))
	{
		$sadmission=$row[0];
		$sname=$row[1];
		$class=$row[2];
		$rollno=$row[3];
		$challanno=$row[4];
		$quarter=$row[5];
		$bankamount=$row[6];
		$challanamount=$row[7];
		$latefees=$row[8];
		$ChequeNo=$row[9];
		$dateofupload=$row[10];
		$Reco=$row[11];
		$BankChallanDate=$row[12];
		
	?>
	<tr>
		<td class="style5" style="width: 94px"><?php echo $srno;?></td>
		<td class="style5" style="width: 94px"><?php echo $sadmission;?></td>
		<td class="style5" style="width: 94px"><?php echo $sname;?></td>
		<td class="style5" style="width: 95px"><?php echo $class;?></td>
		<td class="style5" style="width: 95px"><?php echo $rollno;?></td>
		<td class="style5" style="width: 95px"><?php echo $challanno;?></td>
		<td class="style5" style="width: 95px"><?php echo $quarter;?></td>
		<td class="style5" style="width: 95px"><?php echo $bankamount;?></td>
		<td class="style5" style="width: 95px"><?php echo $challanamount;?></td>
		<td class="style5" style="width: 95px"><?php echo $latefees;?></td>
		<td class="style5" style="width: 95px"><?php echo $ChequeNo;?></td>
		<td class="style5" style="width: 95px"><?php echo $dateofupload;?></td>
		<td class="style5" style="width: 95px"><?php echo $Reco;?></td>
		<td class="style5" style="width: 95px"><?php echo $BankChallanDate;?></td>
	</tr>
	<?php
	$srno=$srno+1;
	}
	?>
</table>