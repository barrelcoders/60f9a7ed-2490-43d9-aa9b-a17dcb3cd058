<?php

session_start();

include '../../connection.php'; 

include '../Header/Header3.php';

?>
<?php
//$ssql="SELECT `ReceiptNo`, `finalamount`,`chequeno`,`cheque_date`,`bankname`,`cheque_status` from fees_transaction where `cheque_status`='Bounce'";
$ssql="SELECT `receipt`, `amountpaid`,`chequeno`,`cheque_date`,`bankname`,`cheque_status` from fees where `cheque_status`='Bounce' and `chequeno` not in (Select distinct `chequeno` from fees_cheque_history)" ;
$rs= mysql_query($ssql);
?>

<script language="javascript">
function fnlUpdate(ReciptNo)
{
	//alert(ReciptNo);
	//alert(ChequeStatus);
	var myWindow = window.open("UpdateRejectedChequePopup.php?ReciptNo=" + ReciptNo ,"","width=700,height=650");
}
</script>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Cheque Clearance</title>

<link rel="stylesheet" type="text/css" href="../css/style.css" />

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
				<table border="1"  cellspacing="0" cellpadding="0" class="CSSTableGenerator">
					<tr>
						<td bgcolor="#95C23D" width="75" align="center" height="23" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Sr No.</font></b></td>
						<td bgcolor="#95C23D" width="89" align="center" height="23" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Adm. No.</font></b></td>
						<td bgcolor="#95C23D" width="137" align="center" height="23" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Student Name</font></b></td>
						<td bgcolor="#95C23D" width="97" align="center" height="23" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Class</font></b></td>
						<td bgcolor="#95C23D" width="110" align="center" height="23" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Roll No</font></b></td>
						<td bgcolor="#95C23D" width="185" align="center" height="23" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Fees Receipt No.</font></b></td>
						<td bgcolor="#95C23D" width="158" align="center" height="23" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Cheque Amount</font></b></td>
						<td bgcolor="#95C23D" width="158" align="center" height="23" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Cheque No</font></b></td>
						<td bgcolor="#95C23D" width="119" align="center" height="23" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Cheque Date</font></b></td>
						<td bgcolor="#95C23D" width="171" align="center" height="23" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Bank Name</font></b></td>
						<td bgcolor="#95C23D" width="223" align="center" height="23" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Cheque Status</font></b></td>
						<td bgcolor="#95C23D" width="223" align="center" height="23" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Action</font></b></td>
					</tr>
				
				
				<?php
				$cnt=0;
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
							$cnt=$cnt+1;
							
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
						<td width="75" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $cnt;?></td>
						<td width="89" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $sadmission;?></td>
						<td width="137" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $sname;?></td>
						<td width="97" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $sclass;?></td>
						<td width="110" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $srollno;?></td>
						<td width="158" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $ReceiptNo;?></td>
						<td width="158" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $finalamount;?></td>
						<td width="119" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $chequeno;?></td>
						<td width="171" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $cheque_date;?>
						</td>
						<td width="223" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $bankname;?></td>
						<td width="223" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $cheque_status;?></td>
						<td class="style1">
						<input name="Clear" id="Clear" type="button" value="Update Cheque Status" style="height: 26; width:140" onclick="Javascript:fnlUpdate('<?php echo $ReceiptNo;?>');"></td>
					</tr>
				<?php
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