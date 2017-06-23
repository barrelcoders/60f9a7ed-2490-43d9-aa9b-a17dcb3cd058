<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php
if($_REQUEST["isSubmit"]=="yes")
{
	$CurrentDate=Date("Y-m-d");
   $date1=$_POST['date'];
   if($CurrentDate !=$date1)
   {
	   echo "<br><br><center><b>Misc. Fee can be submitted only for today!";
	   exit();
   }
   		/*
   		$Dt = $_REQUEST["date"];
		$arr=explode('-',$Dt);
		$date= $arr[2] . "-" . $arr[1] . "-" . $arr[0];
		*/
		
			$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster` where `Status`='Active'";
            $rsFY= mysql_query($ssqlFY);
            $row4=mysql_fetch_row($rsFY);
	        $CurrentFinancialYear=$row4[1];
           	$Year=$row4[0];	
	
		
   $headname=$_POST['headname'];
   $rsHead=mysql_query("SELECT `HeadType` FROM  `fees_misc_head` where `HeadName`='$headname'");
   while($rowH=mysql_fetch_row($rsHead))
   {
   		$headtype=$rowH[0];
   		break;
   }
   
   $subhead=$_POST['cboSubHead'];
   $source=$_POST['cboSource'];
   $AdmissionNo=$_POST['txtAdmnissionNo'];
   if($AdmissionNo !="")
   {
   	$ID=$AdmissionNo;
   }
   
   $StudentName=$_POST['txtStudentName'];
   $Class=$_POST['txtClass'];
   $RollNo=$_POST['txtRollNo'];
   $VendorName=$_POST['txtVendorName'];
   if($VendorName !="")
   {
   	$ID=$VendorName;
   }
   $VendorCompanyName=$_POST['txtVendorCompanyName'];
   $VendorAddress=$_POST['txtVendorAddress'];
   $VendorPhNo=$_POST['txtVendorPhNo'];
   $ChequeNo=$_POST['txtChequeNo'];
   $Chequedate1=$_POST['txtChequedate'];
   		$Dt = $_REQUEST["txtChequedate"];
		$arr=explode('-',$Dt);
		$Chequedate= $arr[2] . "-" . $arr[1] . "-" . $arr[0];
   
   $bankname=$_POST['txtbankname'];
   $Chequeamount=$_POST['txtchequeamount'];
    $BounceAmount=$_POST['txtBounceAmount'];

   
   $currentdate=Date("d-m-Y");

			  
			if($headtype=="Hostel")
			{
				$rsCnt=mysql_query("SELECT max(CONVERT(replace(`FeeReceipt`,'PR/".$CurrentFinancialYear."/',''),UNSIGNED INTEGER)) as `cnt` FROM `fees_misc_collection`");
			}
			else
			{
				$rsCnt=mysql_query("SELECT max(CONVERT(replace(`FeeReceipt`,'MR/".$CurrentFinancialYear."/',''),UNSIGNED INTEGER)) as `cnt` FROM `fees_misc_collection`");
			}
			if (mysql_num_rows($rsCnt) > 0)
			{
				while($rowCnt = mysql_fetch_row($rsCnt))
				{
					if($rowCnt[0]=="")
					{
						$NewSrNo="1";
					}
					else
					{
						$NewSrNo=$rowCnt[0]+1;
					}
					break;
				}
			}
			else
			{

				$NewSrNo=1;
			}
			
			if($headtype=="Hostel")
			{
				$ReceiptNo="PR/".$CurrentFinancialYear."/".$NewSrNo;
			}
			else
			{
			  $ReceiptNo="MR/".$CurrentFinancialYear."/".$NewSrNo;
			}			  
			
			//echo $ReceiptNo;
			//exit();
			
//echo "INSERT INTO fees_misc_collection (`date`,`HeadName`,`SubHead`,`Source`,`sadmissionno`,`sname`,`sclass`,`srollno`,`VendorName`,`VendorCompanyName`,`VendorAddress`,`VendorPhNo`,`ChequeNo`,`Chequedate`,`BankName`,`Amount`,`FeeReceipt`,`PaymentMode`,`HeadType`,`financialyear`)VALUES('$date1','$headname','$subhead','$source','$AdmissionNo','$StudentName','$Class','$RollNo','$VendorName','$VendorCompanyName','$VendorAddress','$VendorPhNo','$ChequeNo','$Chequedate1','$bankname','$Chequeamount','$ReceiptNo','Regular','$headtype','$Year')";
//exit();

	mysql_query("insert into `fees_receipt_code` (`sadmission`,`ReceiptNo`) values ('$AdmissionNo','$ReceiptNo')");
   
    mysql_query("INSERT INTO fees_misc_collection (`date`,`HeadName`,`SubHead`,`Source`,`sadmissionno`,`sname`,`sclass`,`srollno`,`VendorName`,`VendorCompanyName`,`VendorAddress`,`VendorPhNo`,`ChequeNo`,`Chequedate`,`BankName`,`Amount`,`FeeReceipt`,`PaymentMode`,`HeadType`,`financialyear`)VALUES('$date1','$headname','$subhead','$source','$AdmissionNo','$StudentName','$Class','$RollNo','$VendorName','$VendorCompanyName','$VendorAddress','$VendorPhNo','$ChequeNo','$Chequedate1','$bankname','$Chequeamount','$ReceiptNo','Regular','$headtype','$Year')");
}
?>
<script language="javascript">
	function printDiv() 
	{

        //Get the HTML of div

        var divElements = document.getElementById("MasterDiv").innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;



        //Reset the page's HTML with div's HTML only

        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";



        //Print Page

        window.print();



        //Restore orignal HTML

        document.body.innerHTML = oldPage;

 	}
 function CreatePDF() 
{
       //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        //document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
		//document.frmPDF.htmlcode.value = "<html><head><title></title></head><body>" + divElements + "</body>";
		document.frmPDF.htmlcode.value = divElements;
		//alert(document.frmPDF.htmlcode.value);
		//document.frmPDF.submit;
		document.getElementById("frmPDF").submit();
		//document.all("frmPDF").submit();
		return;
		//alert(document.getElementById("htmlcode").value);		 
        //Print Page
        //window.print();
        //var FileLocation="http://emeraldsis.com/Admin/Fees/CreatePDF.php?htmlcode=" + escape(document.body.innerHTML);
		//window.location.assign(FileLocation);
		//return;
}

</script>
<html>

<head>
<style type="text/css">
.style5 {
	font-size: 13pt;
	font-weight: bold;
}
.style4 {
	text-align: left;
}
</style>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Delhi Public School</title>

</head>

<body onload="Javascript:CreatePDF();">

<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" >
<style type="text/css">
.style4 {
	text-align: left;
}
.style5 {
	font-size: 13pt;
	font-weight: bold;
}
</style>

	<p align="center">

	<font face="Cambria">

	<img border="0" src="../images/logo.png"  height="81" width="288"></font></p>
	<p align="center" ><font face="Cambria"><span class="style5"><?php echo $SchoolAddress; ?></span></font><br><b><font face="Cambria">
	(MISC. Fees Receipt)</font></b></p>
	
	
	<p align="center"><b>Receipt No.<?php echo $ReceiptNo; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Date:<?php echo date1; ?></b></p>
	
										

	<div align="center">

		<table cellpadding="0" style="padding: 1px 4px; border-style: dotted; border-width: 1px; width: 672px; border-collapse:collapse; " >

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" colspan="2">

				<font face="Cambria">Name</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4" colspan="2">

				<font face="Cambria">

				<?php echo $StudentName; ?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" colspan="2" >

				<font face="Cambria">ID</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4" colspan="2">

				<font face="Cambria">

				<?php echo $ID; ?>

				</font></td>

			</tr>
			<?php
			if($Class !="")
			{
			?>
			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" colspan="2" >

				<font face="Cambria">Student Class</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4" colspan="2">

				<font face="Cambria">

				<?php echo $Class; ?>

				</font></td>

			</tr>
			<?php
			}
			?>
			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" colspan="2" >

				<font face="Cambria"> Fees Type</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4" colspan="2">

				<font face="Cambria">

				Misc.

				- <?php echo $headname;?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" colspan="2" >

								<font face="Cambria"> Payment Mode</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4" colspan="2">
				<font face="Cambria">
				Cheque
				</font>
				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; " colspan="4" >

								<table style="width: 100%">
									<tr>
										<td style="width: 220px">
										<font face="Cambria"> Cheque No: <?php echo $ChequeNo;?></font></td>
										<td style="width: 220px">
										<font face="Cambria"> Cheque Date: <?php echo $Chequedate;?></font></td>
										<td style="width: 220px">
										<font face="Cambria"> Bank: <?php echo $bankname;?></font></td>
									</tr>
								</table>
				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

								Fees Paid</td>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

								<?php echo $Chequeamount; ?></td>
                <?php 
                if($BounceAmount>0)
                {
                   
                ?>
				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				

				Bounce Amount</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<?php echo $BounceAmount; ?></td>
				<?php
				
				}
				?>

			</tr>

			</table>
</div>
	

	<p align="center"><font face="Cambria">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp;Fees 
	In-charge</strong></font></p>
	<p align="center"><font face="Cambria">This is an electronically generated receipt and does not require any signature.</font></p>
	
<form name="frmPDF" id="frmPDF" method="post" action="../../Users/StorePDFMiscFee.php">
		<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
		<input type="hidden" name="txtpdffilename" id="txtpdffilename" value="<?php echo $PDFFileName; ?>">
		<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $ReceiptNo;?>">
		<input type="hidden" name="txtprintdiv" id="txtprintdiv" value="">
</form>	
</div>
	
</body>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 	|| <a href="FetchStudentDetail.php">HOME</a>
</font> 
	
</div>

</html>
