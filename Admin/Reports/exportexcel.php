<?php
		$file="demo.csv";
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$file");
$Con = mysql_connect("localhost","jainadmin","jps@54321");
if (!$Con)
  {
  die('Could not connect: ' . mysql_error());
  }
$currentdate=date("d-m-Y");
$currentdate1=date("Y-m-d");
	
	if($_REQUEST["isSubmit"]=="yes")
	{
		$Dt=$_REQUEST["txtStartDate"];
		$arr=explode('/',$Dt);
		$StartDt = $arr[2] . "-" . $arr[1] . "-" . $arr[0];
		
		$Dt=$_REQUEST["txtEndDate"];
		$arr=explode('/',$Dt);
		$EndDate = $arr[2] . "-" . $arr[1] . "-" . $arr[0];
	
		$ssql="SELECT `sadmission`,`sname`,`class`,`rollno`,`challanno`,`quarter`,`bankamount`,`challanamount`,`latefees`,`ChequeNo`,`dateofupload`,`Reco`,DATE_FORMAT(`BankChallanDate`,'%d-%m-%Y') as `BankChallanDate` FROM `fees_challan_bank` as `a` WHERE `BankChallanDate`>='$StartDt' and `BankChallanDate`<='$EndDate' and `Reco`='Completed'";
		
		$rs= mysql_query($ssql);
		
	}
?>
<table style="width: 100%" class="style6">
	<tr>
		<td class="style5">Student Details <?php echo $BankChallanDate; ?></td>
	</tr>
	</table>
	
	<table style="width: 100%" class="style6">
	<tr>
		<td class="style5" style="width: 73px" bgcolor="#95C23D"><b>SrNo</b></td>
		<td class="style5" style="width: 73px" bgcolor="#95C23D"><b>Adm Id</b></td>
		<td class="style5" style="width: 127px" bgcolor="#95C23D" colspan="2"><b>Name</b></td>
		<td class="style5" style="width: 73px" bgcolor="#95C23D"><b>Class</b></td>
		<td class="style5" style="width: 74px" bgcolor="#95C23D"><b>Roll No</b></td>
		<td class="style5" style="width: 125px" bgcolor="#95C23D" colspan="2"><b>Challan No</b></td>
		<td class="style5" style="width: 74px" bgcolor="#95C23D"><b>Quarter</b></td>
		<td class="style5" style="width: 74px" bgcolor="#95C23D"><b>Bank Amt.</b></td>
		<td class="style5" style="width: 125px" bgcolor="#95C23D" colspan="2"><b>Challan Amt.</b></td>
		<td class="style5" style="width: 74px" bgcolor="#95C23D"><b>Late Fee</b></td>
		<td class="style5" style="width: 74px" bgcolor="#95C23D"><b>Cheque No</b></td>
		<td class="style5" style="width: 74px" bgcolor="#95C23D"><b>Reco</b></td>
		<td class="style5" style="width: 74px" bgcolor="#95C23D"><b>Bank Date</b></td>
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
		<td class="style5" style="width: 73px"><?php echo $srno;?></td>
		<td class="style5" style="width: 73px"><?php echo $sadmission;?></td>
		<td class="style5" style="width: 127px" colspan="2"><?php echo $sname;?></td>
		<td class="style5" style="width: 73px"><?php echo $class;?></td>
		<td class="style5" style="width: 74px"><?php echo $rollno;?></td>
		<td class="style5" style="width: 125px" colspan="2"><?php echo $challanno;?></td>
		<td class="style5" style="width: 74px"><?php echo $quarter;?></td>
		<td class="style5" style="width: 74px"><?php echo $bankamount;?></td>
		<td class="style5" style="width: 125px" colspan="2"><?php echo $challanamount;?></td>
		<td class="style5" style="width: 74px"><?php echo $latefees;?></td>
		<td class="style5" style="width: 74px"><?php echo $ChequeNo;?></td>
		<td class="style5" style="width: 74px"><?php echo $Reco;?></td>
		<td class="style5" style="width: 74px"><?php echo $BankChallanDate;?></td>
	</tr>
	<?php
	$srno=$srno+1;
	}
	?>
</table>