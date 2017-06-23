<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
$AdmissionNo=$_REQUEST["txtAdmissionNo"];
$InstallmentName=$_REQUEST["InstallmentName"];
		$sqlStudentDetail = "select `sfathername`,`sname`,`sclass`,`srollno`,`DiscontType` from  `student_master` where `sadmission`='$AdmissionNo'";
		$rsStudentDetail = mysql_query($sqlStudentDetail);

		while($rows = mysql_fetch_row($rsStudentDetail))
		{
			$FatherName=$rows[0];
			$Name=$rows[1];
			$Class=$rows[2];
			$RollNo=$rows[3];
			$DiscontType=$rows[4];
			break;
		}
		$rsSchoolDetail = mysql_query("select `PREFIX`,`SchoolName`,`SchoolAddress`,`PhoneNo`,`LogoURL`,`AccountNo`,`AffiliationNo`,`SchoolNo`,`website` from `SchoolConfig` where `SchoolId`='$SchoolId'");
		while($rows = mysql_fetch_row($rsSchoolDetail))
		{
			$PREFIX=$rows[0];
			$SchoolName=$rows[1];
			$SchoolAddress=$rows[2];
			$PhoneNo=$rows[3];
			$LogoURL=$rows[4];
			$AccountNo=$rows[5];
			$AffiliationNo=$rows[6];
			$SchoolNo=$rows[7];
			$website=$rows[8];
			break;
		}
		

$ChequeNo= $_REQUEST["InstChequeNo"];
$BankName= $_REQUEST["InstBankName"];
$ChequeDate= $_REQUEST["InstChequeDate"];

if ($ChequeNo!= "")
	$PaymentMode="Cheque";
else
	$PaymentMode="NA";

$DiscountType=$DiscontType;


$ssqlCFY="SELECT distinct `year`,`financialyear` FROM `FYmaster` where `Status`='Active'";
$rsCFY= mysql_query($ssqlCFY);
	while($row = mysql_fetch_row($rsCFY))
	{
		$CurrentFinancialYear = $row[0];
		$CurrentFinancialYearName=$row[1];					
	}
	

			$SelectedFinancialYear=$CurrentFinancialYearName;
	        $FinancialYear = $CurrentFinancialYear;
           	

$Quarter=$_REQUEST["cboQuarter"];
$LateDays="";

$AdjustedLateFee=$_REQUEST["txtInstLateFees"];

$AdjustedLateDays="";

$currentdate=date("Y-m-d");
$PreviousBalance="";


if ($_REQUEST["txtTuitionFeeDiscount"] == "")
{
	$Discount = 0;
}
else
{
	$Discount = $_REQUEST["txtTuitionFeeDiscount"];
}
if ($_REQUEST["txtHostelFeeDiscount"] == "")
{
	$HostelDiscount = 0;
}
else
{
	$HostelDiscount = $_REQUEST["txtHostelFeeDiscount"];
}
$Remarks="";

$InstallmentWithoutLateFee=$_REQUEST["InstallmentWithoutLateFee"];
$LateFee=$_REQUEST["txtInstLateFees"];
$BounceAmount=$_REQUEST["txtBounceAmount"];
$InstallmentAmountWithLateFee=$_REQUEST["InstallmentAmount"];
$AmountPaid=$_REQUEST["txtAmountPaid"];
$FinalInstAmountPaid=$_REQUEST["txtFinalInstAmountPaid"];


//if ($_REQUEST["SubmitType"]=="Final")
//{
	
	$rsReceiptNo=mysql_query("SELECT MAX(CAST(REPLACE(`receipt`,'HR/".$SelectedFinancialYear."/','') as UNSIGNED))+1 FROM `fees_hostel`");
	if (mysql_num_rows($rsReceiptNo) > 0)
	{
		while($rowRcpt = mysql_fetch_row($rsReceiptNo))
		{
			$NewReciptNo='HR/'.$SelectedFinancialYear.'/'.$rowRcpt[0];
			break;
		}
	}
	else
	{
		$NewReciptNo='HR/'.$SelectedFinancialYear.'/1';
	}

	
	$sstr="select * from `fees_hostel` where `sadmission`='$AdmissionNo' and `quarter`='$Quarter' and `FinancialYear`='$FinancialYear' and `FeesType`='Hostel' and `cheque_status` !='Bounce'";
	$rs = mysql_query($sstr);
		if (mysql_num_rows($rs) > 0)
		{
			echo "<br><br><center><b>Fee already submitted for Admission Id:" . $AdmissionNo . ",Quarter:" . $Quarter . ",Financial Year:" . $FinancialYear;
			exit();
		}
	
	
	
	$ssqlR="INSERT INTO `fees_receipt_code` (`sadmission` ,`ReceiptNo`) VALUES('$AdmissionNo','$NewReciptNo')";
	mysql_query($ssqlR) or die(mysql_error());
	
	$ssql="INSERT INTO `fees_hostel` (`sadmission` ,`sname` ,`sclass`,`srollno`,`fees_amount`,`InstallmentAmount`,`amountpaid`,`BalanceAmt`,`quarter`,`date`,`FinancialYear`,`status`,`receipt`,`finalamount`,`ReceiptFileName`,`PaymentMode`,`chequeno`,`bankname`,`cheque_date`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`Remarks`,`FeesType`,`InstallmentName`,`cheque_bounce_amt`) 
		VALUES('$AdmissionNo','$Name','$Class','$RollNo','$InstallmentWithoutLateFee','$FinalInstAmountPaid','$AmountPaid','$BalanceAmount','$Quarter','$currentdate','$FinancialYear','Paid','$NewReciptNo','$InstallmentAmountWithLateFee','$PDFFileName','$PaymentMode','$ChequeNo','$BankName','$ChequeDate','$LateFee','$LateDays','$AdjustedLateFee','$AdjustedLateDays','$Remarks','Regular','$InstallmentName','$BounceAmount')";
	mysql_query($ssql) or die(mysql_error());
	
	//$ssql1="INSERT INTO `fees_transaction` (`sadmission`,`ReceiptNo`,`ReceiptDate`,`TutionFee`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`PreviousBalance`,`CurrentBalance`,`Remarks`,`chequeno`,`bankname`,`FinancialYear`,`cheque_date`,`cheque_status`,`PaymentMode`) VALUES ('$AdmissionNo','$NewReciptNo','$currentdate','$TuitionFee','$LateFee','$LateDays','$AdjustedLateFee','$AdjustedLateDays','$PreviousBalance','$BalanceAmount','$Remarks','$ChequeNo','$BankName','$FinancialYear','$ChequeDate','$CheckStatus','$PaymentMode')";
	//mysql_query($ssql1) or die(mysql_error());
	$ssql2="INSERT INTO `fees_student_hostel` (`sadmission`,`class`,`Name`,`feeshead`,`amount`,`financialyear`,`FeesType`) VALUES ('$AdmissionNo','$Class','$Name','$InstallmentName','$FinalInstAmountPaid','$FinancialYear','')";
	mysql_query($ssql2) or die(mysql_error());
//}

//Previous Payment History***
$ssqlFeePaymentDetail="SELECT `srno`,`sadmission`, `sname`, `sclass`, `srollno`, `fees_amount`, `InstallmentAmount`, `ActualLateFee`, `AdjustedLateFee`, `cheque_bounce_amt`, `finalamount`, `amountpaid`, `BalanceAmt`, `quarter`, `FinancialYear`, `status`, `receipt`, `date`, `datetime`, `refundamount`, `refunddate`, `cancelamount`, `canceldate`, `ReceiptFileName`, `FeeReceiptCode`, `PaymentMode`, `chequeno`, `cheque_date`, `bankname`, `cheque_status`, `ActualDelayDays`, `AdjustedDelayDays`, `Remarks`, `FeesType`, `SendToBank`, `TxnAmount`, `TxnId`, `TxnStatus`, `PGTxnId` FROM `fees_hostel` WHERE   `sadmission`='$AdmissionNo' and `FinancialYear`='$CurrentFinancialYear' order by `datetime` desc";
$FeePaymentDetail=mysql_query($ssqlFeePaymentDetail);
	
?>



<script language="javascript">

function Validate1()

{

	//alert("Hello");

	if (document.getElementById("txtAdmissionNo").value=="")

	{

		alert("Please enter student addmission id");

		return;

	}

	document.getElementById("frmFees").submit();

	

}



function GetFeeDetail()

{

try

		    {    

				// Firefox, Opera 8.0+, Safari    

				xmlHttp=new XMLHttpRequest();

			}

		  catch (e)

		    {    // Internet Explorer    

				try

			      {      

					xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");

				  }

			    catch (e)

			      {      

					  try

				        { 

							xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");

						}

				      catch (e)

				        {        

							alert("Your browser does not support AJAX!");        

							return false;        

						}      

				  }    

			 } 

			 xmlHttp.onreadystatechange=function()

		      {

			      if(xmlHttp.readyState==4)

			        {

						var rows="";

			        	rows=new String(xmlHttp.responseText);

			        	//alert(rows);

			        	var arrStr=rows.split(",");

			        	var TutionFee=arrStr[0];

			        	var TransportFee=arrStr[1];

			        	var BalanceAmt=arrStr[2];

			        	var LateDays=arrStr[3];

			        	

			        	document.getElementById("txtTuition").value=TutionFee;

			        	document.getElementById("txtTransportFees").value=TransportFee;

			        	document.getElementById("txtPreviousBalance").value=BalanceAmt;

			        	document.getElementById("txtLateDays").value =LateDays;

			        	//alert("TutionFee:" + TutionFee + ",Transport Fee:" + TransportFee + ",Balance Amt:" + BalanceAmt);

			        	//document.getElementById("txtStudentName").value=rows;

			        	

			        	//ReloadWithSubject();

						//alert(rows);														

			        }

		      }

			

			var submiturl="GetFeeDetail.php?Quarter=" + document.getElementById("cboQuarter").value + "&Class=" + document.getElementById("txtClass").value + "&sadmission=" + document.getElementById("txtAdmissionNo").value;

			xmlHttp.open("GET", submiturl,true);

			xmlHttp.send(null);



}



function printDiv() 
{
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + 
          divElements + "</body>";
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



<meta http-equiv="Content-Language" content="en-us">



<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">



<title>Fees Reciept Generation</title>



<!-- link calendar resources -->



	<link rel="stylesheet" type="text/css" href="tcal.css" />



	<script type="text/javascript" src="tcal.js"></script>

</head>
<body onload="Javascript:CreatePDF();">
<div id="MasterDiv">
<style type="text/css">
.style1 {
	text-align: center;
}
.style2 {
	font-size: 12pt;
}
.style3 {
	text-align: right;
}
.style4 {
	border-collapse: collapse;
}
</style>
<form name="frmFees" id="frmFees" method="post" action="FeesPayment.php">
	<div style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
		<table id="table_11" cellspacing="0" cellpadding="0" width="100%" class="style4">
			<tr>
				<td style="border-style:none; border-width:medium; height: 13px"  colspan="10" class="style1" align="center">
				<font face="Cambria" class="style2"><strong><?php echo $SchoolName; ?><br><?php echo $SchoolAddress; ?></strong></font></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 100px; height: 25px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><strong>Fees Receipt No. </strong>
				</font></td>
				<td style="border-style:solid; border-width:1px; height: 25px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" colspan="3" >
				<font face="Cambria" size="2">
				<?php echo $NewReciptNo; ?></font></td>
				<td style="border-style:solid; border-width:1px; height: 25px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" colspan="2" >
				&nbsp;</td>
				<td style="border-style:solid; border-width:1px; height: 25px; width: 100px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px">
				<b>
				<font face="Cambria" size="2">Receipt Date</font></b></td>
				<td style="border-style:solid; border-width:1px; height: 25px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" colspan="3" >
				<font face="Cambria" size="2"><strong>&nbsp;<?php echo date("d-m-Y"); ?></strong></font></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 100px; height: 25px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria"><b><span ><font style="font-size: 10pt">Adm No.
				</font></span></b></font>
				</td>
				<td style="width: 138px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $AdmissionNo; ?></b></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b><span >Name 
				</span></b></font></td>
				<td style="width: 138px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $Name; ?></b></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b><span >Father's Name</span></b></font></td>
				<td style="width: 145px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b><span ><?php echo $FatherName; ?></span></b></font></td>
				<td style="height: 25px; width: 100px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px">
				<p ><font face="Cambria" style="font-size: 10pt"><strong>Class</strong></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $Class; ?></b></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<span style="font-family: Cambria; font-weight: 700; " >
				<font style="font-size: 10pt">Roll No</font></span></td>
				<td style="height: 25px; width: 100px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $RollNo; ?></b></font></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 100px; height: 25px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<b>
				<font face="Cambria" size="2">Mode Of Payment</font></b></td>
				<td style="width: 138px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" size="2">
				<b>
				<?php echo $PaymentMode; ?></b></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<p align="center"><b>
				<font face="Cambria" size="2">Cheque /DD #/ Txn Id</font></b></td>
				<td style="width: 138px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
						<font face="Cambria" size="2">
						<b>
						<?php echo $ChequeNo; ?></b></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<b>
				<font face="Cambria" size="2">Cheque Date</font></b></td>
				<td style="width: 145px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<b><font face="Cambria" size="2"><?php echo $ChequeDate;?></font></b></td>
				<td style="height: 25px; width: 100px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px">
				<b>
				<font face="Cambria" size="2">Bank name</font></b></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" size="2">
						<b>
						<?php echo $BankName; ?></b></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				&nbsp;</td>
				<td style="height: 25px; width: 100px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				&nbsp;</td>
			</tr>
		</table><font face="Cambria" style="font-size: 10pt">

	



	

	

	

	</span>





	

	

	

		</font>
		</div>
</form>

<table class="CSSTableGenerator" border="1" style="align:center; width: 100%; border-collapse:collapse">

		
<tr>			
		

		<td style="height: 29px;" class="style13" colspan="14">

		<p style="text-align: center"><b>
		<font face="Cambria" style="font-size: 10pt">Fees Receipt Details</font></b></td>

			</tr>
		
<tr>			
		

		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<strong>Adm #</strong></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Name</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Class</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<strong>Receipt #</strong></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Fees Amt</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Late Fees</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Bounce Amt</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Total Amount Paid</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Fees Inst Paid</b></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Payment Mode</b></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Txn Id / Chq No</b></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<strong>Chq Status</strong></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<strong>Payment Date</strong></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<strong>Financial Year</strong></font></td>


			</tr>
<?php
while($row = mysql_fetch_row($FeePaymentDetail))
	{
				
				$Admission=$row[1];
				$Name=$row[2];
				$Class=$row[3];
                $fees_amount=$row[5];
                $InstallmentAmount=$row[6];
                $late_fees=$row[7];
                $bounce_amount=$row[9];
                $final_amount=$row[10];
                $amountpaid=$row[11];
				$PaymentMode=$row[25];
				$chequeno=$row[26];
				$cheque_status=$row[29];
				$receipt=$row[16];
				$date=$row[17];
				$FinancialYear=$row[14];		
				$AdjustedLateFee=$row[9];		
				$chequestatus=$row[29];	
					
?>
<tr>			
		

		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria" size="2">

		<?php echo $Admission; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria" size="2">

		<?php echo $Name; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria" size="2">

		<?php echo $Class; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria" size="2">

		<?php echo $receipt; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<p style="text-align: center"><font face="Cambria" size="2"><?php echo $fees_amount; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<p style="text-align: center"><font face="Cambria" size="2"><?php echo $late_fees; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<p style="text-align: center"><font face="Cambria" size="2"><?php echo $bounce_amount; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12" align="center">

		<font face="Cambria" size="2">

		<?php echo $amountpaid; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12" align="center">

		<font face="Cambria" size="2">

		<?php echo $InstallmentAmount; ?></font></td>


	
		<td style="width: 100px; height: 20px;" class="style12" align="center">

		<p style="text-align: center"><font face="Cambria" size="2"><?php echo $PaymentMode; ?></font></td>


		


		<td style="width: 101px; height: 20px;" class="style17" align="center">

		<font face="Cambria" size="2">

		<?php echo $chequeno; ?></font></td>


		<td style="width: 101px; height: 20px;" class="style17" align="center">

		<font face="Cambria" size="2">

		<?php echo $chequestatus; ?></font></td>


		<td style="width: 101px; height: 20px;" class="style17" align="center">

		<font face="Cambria" size="2">

		<?php echo $date; ?></font></td>


		<td style="width: 101px; height: 20px;" class="style17" align="center">

		<font face="Cambria" size="2">

		<?php echo $FinancialYear; ?></font></td>


			</tr>
<?php
}
?>

</table>
<table width="100%" cellpadding="0" style="border-collapse: collapse" >
	
		
<?php
while($row = mysql_fetch_row($rs))
	{
					
					$quarter=$row[0];
					$fees_amount=$row[1];
					$amountpaid=$row[2];
					$BalanceAmt=$row[3];
					$status=$row[4];
					$receipt=$row[5];
					$date=$row[6];
					$FinancialYear=$row[7];				
?>
		
	<?php
	$sqlPB = "SELECT `PBalanceReceiptNo`,`PreviousBalance`,`PaidBalanceAmt`,`CurrentBalance`,date_format(`ReceiptDate`,'%d-%m-%y') FROM `fees_transaction` where  `ReceiptNo`='$receipt' and `PBalanceReceiptNo` !=''";
	$rsPB = mysql_query($sqlPB);
				if (mysql_num_rows($rsPB) > 0)
				{
					while($rowPB = mysql_fetch_row($rsPB))
					{						
						$BalanceReceiptNo=$rowPB[0];
						$PayableBalanceAmt=$rowPB[1];
						$PaidBalanceAmt=$rowPB[2];
						$OutstandingAmt=$rowPB[3];
						$ReceiptDate=$rowPB[4];
					
	?>
	<?php
		}
	}
	?>
<?php
}
?>
		

	



	<tr>
		<td>
		<p align="right"><font face="Cambria" style="font-size: 10pt"><em>
		For any queries, Kindly call at 

		: 

		</span>



		</em></font><em><font style="font-size: 10pt">
		<span style="font-family: Cambria; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none"><?php echo $SchoolPhoneNo; ?> or drop an email at

		</span></font>
		<span style="color: rgb(204, 51, 0); font-family: Cambria; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; font-style:normal">
		<span >
		<font style="font-size: 10pt"><?php echo $AccountsEmailId; ?></font></span></a></span></em><span style="font-family: Cambria; font-size: 10pt; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none">
		<br>(Fees Incharge)</span></td>
	</tr>
</table>
<form name="frmPDF" id="frmPDF" method="post" action="StorePDF.php">
	<span style="font-size: 11pt">
	<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
	<input type="hidden" name="txtpdffilename" id="txtpdffilename" value="<?php echo $PDFFileName; ?>">
	<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $NewReciptNo;?>">
	</span>
</form>	
</div>
<div id="divPrint">
	<p align="center">

	<font face="Cambria" style="font-size: 10pt">

	<a href="Javascript:printDiv();"><span >PRINT</span></a> || <a href="NewFetchStudentDetail.php"><span >HOME</span></a>

	</font>

	</div>
</body>
</html>