<?php
session_start();
include '../../connection.php'; 
include '../Header/Header3.php';
?>
<?php
$ssql="SELECT `receipt`, `amountpaid`,`chequeno`,`cheque_date`,`bankname`,`cheque_status`,`sadmission`,`sname`,`sclass`,`srollno`,`bankname`,`srno` from `fees` where `cheque_status`='Bounce'";
$rs= mysql_query($ssql);
?>
<script language="javascript">
function sendreminder(srno)
{
	var myWindow = window.open("SendReminderCheque.php?srno=" + srno ,"","width=400,height=400");
}
</script>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Bounce Cheque Reminder</title>

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
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
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
				<table cellspacing="0" cellpadding="0" style="width: 100%;" height="23" class="style1">
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
						<b><font face="Cambria">Cheque Reminder</font></b></td>
					</tr>
				
				
				<?php
				$cnt=1;
				while($row = mysql_fetch_row($rs))
				{
							$ReceiptNo=$row[0];
							$finalamount=$row[1];
							$chequeno=$row[2];
							$cheque_date=$row[3];
							$bankname=$row[4];
							$cheque_status=$row[5];
							$sadmission=$row[6];
							$sname=$row[7];
							$sclass=$row[8];
							$srollno=$row[9];
							$bankname=$row[10];
							$srno=$row[11];
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
						<?php echo $cheque_date;?><td>
						<?php echo $bankname;?><td width="223" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $cheque_status;?></td>
						<td width="223" align="center" height="23" style="border-style: solid; border-width: 1px">
						<input name="Clear" id="Clear" type="button" value="Send Reminder" style="height: 26; width:105" onclick="javascript:sendreminder('<?php echo $srno;?>');"></td>
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