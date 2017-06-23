<?php
session_start();
include '../../connection.php'; 
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["txtFindCheque"]=="yes")
{
	$EnteredChequeNo=$_REQUEST["txtChequeNo"];
	$ssql="SELECT `receipt` as `ReceiptNo`, `amountpaid`,`chequeno`,`cheque_date`,`bankname`,`cheque_status` from `fees` where `cheque_status`='Clear' and `chequeno` like '%".$EnteredChequeNo."%'";
	//echo $ssql;
	//exit();
	$rs= mysql_query($ssql);
	
	$ssql="SELECT `receipt` as `ReceiptNo`, `amountpaid`,`chequeno`,`cheque_date`,`bankname`,`cheque_status` from `fees_hostel` where `cheque_status`='Clear' and `chequeno` like '%".$EnteredChequeNo."%'";
	$rsHostel= mysql_query($ssql);
	
		$ssqlMISCFEE="SELECT `FeeReceipt`, `Amount`,`ChequeNo`,`Chequedate`,`BankName`,`ChequeStatus` from `fees_misc_collection` where `ChequeStatus`!='Bounce' and `ChequeNo` like '%".$EnteredChequeNo."%'";
	$rsMISCFEE= mysql_query($ssqlMISCFEE);

	

	if((mysql_num_rows($rsHostel) == 0)&&(mysql_num_rows($rs) == 0)&&(mysql_num_rows($rsMISCFEE) == 0))
	{
		echo "<br><br><center><b>No Pending Cheque Found!";
		exit();
	}
}
?>

<script language="javascript">
function fnlClear(ChequeNo,BankName,sadmission,ChequeStatus)
{
//alert(ReciptNo);
//alert(ChequeStatus);
var myWindow = window.open("UpdateChequeStatus.php?ChequeNo=" + ChequeNo + "&BankName=" + BankName + "&sadmission=" + sadmission + "&ChequeStatus=" + ChequeStatus ,"","width=700,height=650");
}
function fnlClear1(ChequeNo,BankName,sadmission,ChequeStatus)
{
//alert(ReciptNo);
//alert(ChequeStatus);
var myWindow = window.open("UpdateChequeStatus.php?ChequeNo=" + ChequeNo + "&BankName=" + BankName + "&sadmission=" + sadmission + "&ChequeStatus=" + ChequeStatus + "&UpdateFor=Hostel" ,"","width=700,height=650");
}
function fnlClear2(ChequeNo,BankName,sadmission,ChequeStatus)
{
//alert(ReciptNo);
//alert(ChequeStatus);
var myWindow = window.open("UpdateChequeStatus.php?ChequeNo=" + ChequeNo + "&BankName=" + BankName + "&sadmission=" + sadmission + "&ChequeStatus=" + ChequeStatus + "&UpdateFor=Misc" ,"","width=700,height=650");
}

function Validate()
{
	if(document.getElementById("txtChequeNo").value=="")
	{
		alert("Please enter cheque no!");
		return;
	}
	document.getElementById("frmChq").submit();
}
</script>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>Sell Registration Form</title>

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

{

        height:20px; 

        width: 100%; 

        margin:auto;        

        background-color:Blue;

        font-family: Calibri;

        font-weight:bold;

.style1 {
	text-align: center;
}
.style2 {
	color: #000000;
}
.style3 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style5 {
	text-align: center;
	border: 1px solid #000000;
}
.style6 {
	text-decoration: none;
}
}
.style1 {
	text-align: center;
}
.style2 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style3 {
	border: 1px solid #000000;
}
.style4 {
	font-family: Cambria;
}
.style5 {
	border: 1px solid #000000;
	text-align: center;
}
</style>
</head>

<body>







		<p>&nbsp;</p>







		<table style="border-width:0px; width: 100%; border-collapse:collapse" class="style14" cellpadding="0" border="1">



			<tr>



				<td class="auto-style49" colspan="5" style="border-left:medium none #C0C0C0; border-right:medium none #808080; border-top:medium none #C0C0C0; height: 10px; background-color:#FFFFFF; border-bottom-style:none; border-bottom-width:medium">







				<strong><font face="Cambria">Cheque Clearance</font></strong><hr>
				
				<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">

<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>
				<table style="width: 626px" class="style2">
				<form name="frmChq" id="frmChq" method="post" action="ChequeClearance.php">
				<input type="hidden" name="txtFindCheque" id="txtFindCheque" value="yes">
					<tr>
						<td class="style3" style="width: 208px">
						<span class="style4">Enter Cheque No:</span>&nbsp;</td>
						<td class="style5" style="width: 208px">&nbsp;<input name="txtChequeNo" id="txtChequeNo" type="text"></td>
						<td class="style5" style="width: 208px">&nbsp;<input name="btnSubmit" type="button" value="Submit" onclick="javascript:Validate();"></td>
					</tr>
					</form>
				</table>
&nbsp;<table width="100%" class="CSSTableGenerator">
					<tr>
						<td width="75" align="center" height="23" >
						<b><font face="Cambria">Sr No.</font></b></td>
						<td width="89" align="center" height="23" >
						<b><font face="Cambria">Adm. No.</font></b></td>
						<td width="137" align="center" height="23" >
						<b><font face="Cambria">Student Name</font></b></td>
						<td width="97" align="center" height="23" >
						<b><font face="Cambria">Class</font></b></td>
						<td width="110" align="center" height="23" >
						<b><font face="Cambria">Roll No</font></b></td>
						<td width="185" align="center" height="23" >
						<b><font face="Cambria">Fees Receipt No.</font></b></td>
						<td width="158" align="center" height="23" >
						<b><font face="Cambria">Cheque Amount</font></b></td>
						<td width="158" align="center" height="23" >
						<b><font face="Cambria">Cheque No</font></b></td>
						<td width="119" align="center" height="23" >
						<b><font face="Cambria">Cheque Date</font></b></td>
						<td width="171" align="center" height="23" >
						<b><font face="Cambria">Bank Name</font></b></td>
						<td width="223" align="center" height="23" >
						<b><font face="Cambria">Cheque Status</font></b></td>
					</tr>
				
				
				<?php
				if (mysql_num_rows($rs) > 0)
				{
				$cnt=1;
				$sadmission="";
				$sname="";
				$sclass="";
				$srollno="";									
				$finalamount="";					
				while($row = mysql_fetch_row($rs))
				{
							$ReceiptNo=$row[0];
							$finalamount=$row[1];
							$chequeno=$row[2];
							$cheque_date=$row[3];
							$bankname=$row[4];
							$cheque_status=$row[5];
							$ssql="select `sadmission`,`sname`,`sclass`,`srollno`,`finalamount` from `fees` where `receipt`='$ReceiptNo'";
							$rsNameDetail= mysql_query($ssql);
							if (mysql_num_rows($rsNameDetail) > 0)
							{
								while($row = mysql_fetch_row($rsNameDetail))
								{
									$sadmission=$row[0];
									$sname=$row[1];
									$sclass=$row[2];
									$srollno=$row[3];									
									$finalamount=$row[4];
								}
							}
							$ssql="select `sadmission`,`sname`,`sclass`,`srollno`,`finalamount` from `fees_monthwise` where `receipt`='$ReceiptNo'";
							$rsNameDetail1= mysql_query($ssql);
							if (mysql_num_rows($rsNameDetail1) > 0)
							{
								while($row = mysql_fetch_row($rsNameDetail1))
								{
									$sadmission=$row[0];
									$sname=$row[1];
									$sclass=$row[2];
									$srollno=$row[3];
									$finalamount=$row[4];
								}
							}
				?>

				
				
					<tr>
						<td width="75" align="center" height="23" >
						<?php echo $cnt;?></td>
						<td width="89" align="center" height="23" >
						<?php echo $sadmission;?></td>
						<td width="137" align="center" height="23" >
						<?php echo $sname;?></td>
						<td width="97" align="center" height="23" >
						<?php echo $sclass;?></td>
						<td width="110" align="center" height="23" >
						<?php echo $srollno;?></td>
						<td width="158" align="center" height="23" >
						<?php echo $ReceiptNo;?></td>
						<td width="158" align="center" height="23" >
						<?php echo $finalamount;?></td>
						<td width="119" align="center" height="23" >
						<?php echo $chequeno;?></td>
						<td width="171" align="center" height="23" >
						<?php echo $cheque_date;?></td> 
						<td class="style1"><?php echo $bankname;?></td>
						<td width="223" align="center" height="23">
						<!--<input name="btnClear" id="btnClear" type="button" value="Clear" style="height: 26; width:61" onclick="Javascript:fnlClear('<?php echo $ReceiptNo;?>','Clear');"> 
						/-->
						<input name="btnBounce" id="btnBounce" type="button" value="Bounce" style="height: 26; width:59" onclick="Javascript:this.disabled=true;fnlClear('<?php echo $chequeno;?>','<?php echo $bankname;?>','<?php echo $sadmission;?>','Bounce');"></td>
					</tr>
				<?php
				$cnt=$cnt+1;
				}
				}
				?>
				<?php
				if (mysql_num_rows($rsHostel) > 0)
				{
				$cnt=1;
				$sadmission="";
				$sname="";
				$sclass="";
				$srollno="";									
				$finalamount="";					
				while($row = mysql_fetch_row($rsHostel))
				{
							$ReceiptNo=$row[0];
							$finalamount=$row[1];
							$chequeno=$row[2];
							$cheque_date=$row[3];
							$bankname=$row[4];
							$cheque_status=$row[5];
							$ssql="select `sadmission`,`sname`,`sclass`,`srollno`,`finalamount` from `fees_hostel` where `receipt`='$ReceiptNo'";
							$rsNameDetail= mysql_query($ssql);
							if (mysql_num_rows($rsNameDetail) > 0)
							{
								while($row = mysql_fetch_row($rsNameDetail))
								{
									$sadmission=$row[0];
									$sname=$row[1];
									$sclass=$row[2];
									$srollno=$row[3];									
									$finalamount=$row[4];
								}
							}
							$ssql="select `sadmission`,`sname`,`sclass`,`srollno`,`finalamount` from `fees_monthwise` where `receipt`='$ReceiptNo'";
							$rsNameDetail1= mysql_query($ssql);
							if (mysql_num_rows($rsNameDetail1) > 0)
							{
								while($row = mysql_fetch_row($rsNameDetail1))
								{
									$sadmission=$row[0];
									$sname=$row[1];
									$sclass=$row[2];
									$srollno=$row[3];
									$finalamount=$row[4];
								}
							}
				?>
				<tr>
						<td width="75" align="center" height="23" >
						<?php echo $cnt;?></td>
						<td width="89" align="center" height="23" >
						<?php echo $sadmission;?></td>
						<td width="137" align="center" height="23" >
						<?php echo $sname;?></td>
						<td width="97" align="center" height="23" >
						<?php echo $sclass;?></td>
						<td width="110" align="center" height="23" >
						<?php echo $srollno;?></td>
						<td width="158" align="center" height="23" >
						<?php echo $ReceiptNo;?></td>
						<td width="158" align="center" height="23" >
						<?php echo $finalamount;?></td>
						<td width="119" align="center" height="23" >
						<?php echo $chequeno;?></td>
						<td width="171" align="center" height="23" >
						<?php echo $cheque_date;?></td> 
						<td class="style1"><?php echo $bankname;?></td>
						<td width="223" align="center" height="23">
						<!--<input name="btnClear" id="btnClear" type="button" value="Clear" style="height: 26; width:61" onclick="Javascript:fnlClear('<?php echo $ReceiptNo;?>','Clear');"> 
						/-->
						<input name="btnBounce" id="btnBounce" type="button" value="Bounce" style="height: 26; width:59" onclick="Javascript:this.disabled=true;fnlClear1('<?php echo $chequeno;?>','<?php echo $bankname;?>','<?php echo $sadmission;?>','Bounce');"></td>
					</tr>	
					<?php
				$cnt=$cnt+1;
				}
				}
				?>
				
				<?php
				if (mysql_num_rows($rsMISCFEE) > 0)
				{
				$cnt=1;
				$sadmission="";
				$sname="";
				$sclass="";
				$srollno="";									
				$finalamount="";					
				while($row = mysql_fetch_row($rsMISCFEE))
				{
							$ReceiptNo=$row[0];
							$finalamount=$row[1];
							$chequeno=$row[2];
							$cheque_date=$row[3];
							$bankname=$row[4];
							$cheque_status=$row[5];
							$ssql="select `sadmissionno`,`sname`,`sclass`,`srollno`,`Amount` from `fees_misc_collection` where `FeeReceipt`='$ReceiptNo'";
							$rsNameDetail= mysql_query($ssql);
							if (mysql_num_rows($rsNameDetail) > 0)
							{
								while($row = mysql_fetch_row($rsNameDetail))
								{
									$sadmission=$row[0];
									$sname=$row[1];
									$sclass=$row[2];
									$srollno=$row[3];									
									$finalamount=$row[4];
								}
							}
							
				?>
				<tr>
						<td width="75" align="center" height="23" >
						<?php echo $cnt;?></td>
						<td width="89" align="center" height="23" >
						<?php echo $sadmission;?></td>
						<td width="137" align="center" height="23" >
						<?php echo $sname;?></td>
						<td width="97" align="center" height="23" >
						<?php echo $sclass;?></td>
						<td width="110" align="center" height="23" >
						<?php echo $srollno;?></td>
						<td width="158" align="center" height="23" >
						<?php echo $ReceiptNo;?></td>
						<td width="158" align="center" height="23" >
						<?php echo $finalamount;?></td>
						<td width="119" align="center" height="23" >
						<?php echo $chequeno;?></td>
						<td width="171" align="center" height="23" >
						<?php echo $cheque_date;?></td> 
						<td class="style1"><?php echo $bankname;?></td>
						<td width="223" align="center" height="23">
						<!--<input name="btnClear" id="btnClear" type="button" value="Clear" style="height: 26; width:61" onclick="Javascript:fnlClear('<?php echo $ReceiptNo;?>','Clear');"> 
						/-->
						<input name="btnBounce" id="btnBounce" type="button" value="Bounce" style="height: 26; width:59" onclick="Javascript:this.disabled=true;fnlClear2('<?php echo $chequeno;?>','<?php echo $bankname;?>','<?php echo $sadmission;?>','Bounce');"></td>
					</tr>	
					<?php
				$cnt=$cnt+1;
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