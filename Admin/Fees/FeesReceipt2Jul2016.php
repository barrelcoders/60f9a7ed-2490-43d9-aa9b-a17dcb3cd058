<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
$AdmissionNo=$_REQUEST["txtAdmissionNo"];
$InstallmentName=$_REQUEST["InstallmentName"];
		$sqlStudentDetail = "select `sfathername` from  `student_master` where `sadmission`='$AdmissionNo'";
		$rsStudentDetail = mysql_query($sqlStudentDetail);

		while($rows = mysql_fetch_row($rsStudentDetail))
		{
			$FatherName=$rows[0];
			//$SchoolId=$rows[1];
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
		
$Name=$_REQUEST["txtName"];

$Class=$_REQUEST["txtClass"];

$RollNo=$_REQUEST["txtRollNo"];

$PaymentMode=$_REQUEST["cboPaymentMode"];

$DiscountType=$_REQUEST["cboTuitionFeeDiscountType"];

if ($PaymentMode != "Cash")
{
	$ChequeNo= $_REQUEST["txtChequeNo"];
	//$BankName= $_REQUEST["txtBank"];
	$BankName= $_REQUEST["cboBank"];
	$ChequeDate=$_REQUEST["txtChequeDate"];
	
	$arr=explode('/',$ChequeDate);
	$ChequeDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	$CheckStatus="Clear";
}

			


$FinancialYear = $_REQUEST["cboFinancialYear"];
			$ssqlFY="SELECT distinct `financialyear`,`Status` FROM `FYmaster` where `year`='$FinancialYear'";
            $rsFY= mysql_query($ssqlFY);
            $row4=mysql_fetch_row($rsFY);
	        $SelectedFinancialYear=$row4[0];
           	

$Quarter=$_REQUEST["cboQuarter"];

$TuitionFee=$_REQUEST["txtTuition"];

$HostelFee=$_REQUEST["txtHostel"];

$AnnualFee=$_REQUEST["txtAnnualFee"];

$TransportFees=$_REQUEST["txtTransportFees"];

$LateFee=$_REQUEST["txtLateFee"];

$LateDays=$_REQUEST["txtLateDays"];

$AdjustedLateFee=$_REQUEST["txtAdjustedLateFee"];

$AdjustedLateDays=$_REQUEST["txtAdjustedLateDays"];

$currentdate=date("Y-m-d");

if ($_REQUEST["txtPreviousBalance"] == "")
{
	$PreviousBalance=0;
}
else
{
	$PreviousBalance=$_REQUEST["txtPreviousBalance"];
}

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
$Discount=$Discount+$HostelDiscount;

$DiscountReason = $_REQUEST["cboDiscountReason"];

$Remarks=$_REQUEST["txtRemarks"];

$Total=$_REQUEST["txtTotal"];

$PayingAmount = $_REQUEST["txtTotalAmtPaying"];

$BalanceAmount = $Total - $PayingAmount;

$feestuednAmount=$PayingAmount-$AdjustedLateFee;


if ($_REQUEST["SubmitType"]=="Final")
{
	
	$rsReceiptNo=mysql_query("SELECT MAX(CAST(REPLACE(`receipt`,'FR/".$SelectedFinancialYear."/','') as UNSIGNED))+1 FROM `fees`");
	if (mysql_num_rows($rsReceiptNo) > 0)
	{
		while($rowRcpt = mysql_fetch_row($rsReceiptNo))
		{
			$NewReciptNo='FR/'.$SelectedFinancialYear.'/'.$rowRcpt[0];
			break;
		}
	}
	else
	{
		$NewReciptNo='FR/'.$SelectedFinancialYear.'/1';
	}

	
	$sstr="select * from `fees` where `sadmission`='$AdmissionNo' and `quarter`='$Quarter' and `FinancialYear`='$FinancialYear' and `FeesType`='Regular'";
	$rs = mysql_query($sstr);
		if (mysql_num_rows($rs) > 0)
		{
			echo "<br><br><center><b>Fee already submitted for Admission Id:" . $AdmissionNo . ",Quarter:" . $Quarter . ",Financial Year:" . $FinancialYear;
			exit();
		}
	
	
	
	$ssqlR="INSERT INTO `fees_receipt_code` (`sadmission` ,`ReceiptNo`) VALUES('$AdmissionNo','$NewReciptNo')";
	mysql_query($ssqlR) or die(mysql_error());
	
	$ssql="INSERT INTO `fees` (`sadmission` ,`sname` ,`sclass`,`srollno`,`fees_amount`,`amountpaid`,`BalanceAmt`,`quarter`,`date`,`FinancialYear`,`status`,`receipt`,`finalamount`,`ReceiptFileName`,`PaymentMode`,`chequeno`,`bankname`,`cheque_date`,`cheque_status`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`Remarks`,`FeesType`) VALUES('$AdmissionNo','$Name','$Class','$RollNo','$Total','$PayingAmount','$BalanceAmount','$Quarter','$currentdate','$FinancialYear','Paid','$NewReciptNo','$PayingAmount','$PDFFileName','$PaymentMode','$ChequeNo','$BankName','$ChequeDate','$CheckStatus','$LateFee','$LateDays','$AdjustedLateFee','$AdjustedLateDays','$Remarks','Regular')";
	
	mysql_query($ssql) or die(mysql_error());
	
	$ssql1="INSERT INTO `fees_transaction` (`sadmission`,`ReceiptNo`,`ReceiptDate`,`TutionFee`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`PreviousBalance`,`CurrentBalance`,`Remarks`,`chequeno`,`bankname`,`FinancialYear`,`cheque_date`,`cheque_status`,`PaymentMode`) VALUES ('$AdmissionNo','$NewReciptNo','$currentdate','$TuitionFee','$LateFee','$LateDays','$AdjustedLateFee','$AdjustedLateDays','$PreviousBalance','$BalanceAmount','$Remarks','$ChequeNo','$BankName','$FinancialYear','$ChequeDate','$CheckStatus','$PaymentMode')";
	mysql_query($ssql1) or die(mysql_error());
	$ssql2="INSERT INTO `fees_student` (`sadmission`,`class`,`Name`,`feeshead`,`amount`,`financialyear`,`FeesType`) VALUES ('$AdmissionNo','$Class','$Name','$InstallmentName','$feestuednAmount','$FinancialYear','')";
	mysql_query($ssql2) or die(mysql_error());
}

//-------------------- Previous Payment history----------------------------------------------------------
	$ssql = "SELECT `quarter`,`fees_amount`,`amountpaid`,`BalanceAmt`,`status`,`receipt`,date_format(`date`,'%d-%m-%Y') as `date`,`FinancialYear` FROM `fees` where `sadmission`='$AdmissionNo' and `FeesType`='Regular' order by `quarter`,`FinancialYear` desc limit 4";
	$rs = mysql_query($ssql);
	
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
<body <?php if ($_REQUEST["SubmitType"]=="Final") { ?> onload="Javascript:CreatePDF();" <?php } ?>>
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
				<td style="border-style:none; border-width:medium; height: 13px"  colspan="11" class="style1" align="center">
				<font face="Cambria" class="style2"><strong><?php echo $SchoolName; ?><br><?php echo $SchoolAddress; ?></strong></font></td>
			</tr>
			<tr>
				<td style="border-style:none; border-width:medium; height: 13px"  colspan="7">
				<font face="Cambria" style="font-size: 10pt"><strong>Fees Receipt No. <?php echo $NewReciptNo; ?></strong>
				</font></td>
				<td style="border-style:none; border-width:medium; height: 13px"  colspan="4">
				<p class="style3"><font face="Cambria" style="font-size: 10pt">
				<strong>Date: <?php echo date("d-m-Y"); ?></strong>&nbsp; </font>
				</td>
			</tr>
			<tr>
				<td style="padding: 1px 4px; width: 100px; height: 25px; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium; border-top-style:none; border-top-width:medium" >
				<font face="Cambria"><b><span ><font style="font-size: 10pt">Adm No.
				</font></span></b></font>
				<span style="font-family: Cambria; font-weight: 700; " >
				<font style="font-size: 10pt">:</font></span></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 138px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $AdmissionNo; ?></b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b><span >Name 
				</span></b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 138px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $Name; ?></b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b><span >Father's Name</span></b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 145px; height: 25px; " >
				<?php echo $FatherName; ?></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; height: 25px; width: 100px; "  colspan="2">
				<p ><font face="Cambria" style="font-size: 10pt"><strong>Class</strong></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $Class; ?></b></font></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " >
				<span style="font-family: Cambria; font-weight: 700; " >
				<font style="font-size: 10pt">Roll No</font></span></td>
				<td style="padding: 1px 4px; border-style: none; border-width: medium; height: 25px; width: 100px;" >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $RollNo; ?></b></font></td>
			</tr>
		</table><font face="Cambria" style="font-size: 10pt">

	



	

	

	

	</span>





	

	

	

		</font>
		<table style="border-width:0px; width: 100%" cellpadding="0"  >
			<tr>
				<td style="width: 206px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b>Mode Of Payment</b></font></td>
				<td style="padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" width="207"  >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $PaymentMode; ?></b></font></td>
				<td style="width: 207px;padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><strong>Cheque / D.D. No.</strong></font></td>
				<td style="width: 207px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px"  >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $ChequeNo; ?></b></font></td>
				<td style="width: 207px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px"  >
				<font face="Cambria" style="font-size: 10pt"><strong><span >Bank Name</span></strong></font></td>
				<td width="207" style="padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px"  >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $BankName; ?></b></font></td>
			</tr>
		</table></div>
	<table width="100%" style="border-style:dotted; border-width:1px; background-image: url('../images/emerald_logo.png'); background-position: center; background-repeat:no-repeat; border-collapse:collapse; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" cellpadding="0" border="1" cellspacing="0">
		<!--
		<tr>
			<td style="border-style:dotted; border-width:1px; height: 4px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<p align="center"><font face="Cambria" style="font-size: 10pt">
			<strong>Fees Heads</strong></font></td>
			<td  style="border-style:dotted; border-width:1px; height: 4px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px">
			<p align="center"><font face="Cambria" style="font-size: 10pt"><b>Fees Amount</b></font></td>
		</tr>
		-->
		<tr>
			<td style="border-style:dotted; border-width:1px; height: 6px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">Fees Payment for Quarter</font></td>
			<td  style="border-style:dotted; border-width:1px; height: 6px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px">
			<strong><font face="Cambria" style="font-size: 10pt">



		<?php echo $Quarter; ?></font></strong></td>
		</tr>
		<!--
		<tr>
			<td style="border-style:dotted; border-width:1px; height: 14px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">Tuition Fees</font></td>
			<td style="border-style:dotted; border-width:1px; height: 14px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<?php 
			//echo ($TuitionFee-$Discount); 
			echo $TuitionFee; 
			?></td>
		</tr>
		-->

		

<?php 
	if ($_REQUEST["isAnnualChargApply"] =="yes")
	{
?>
		<!--
		<tr>
			<td style="border-style:dotted; border-width:1px; height: 14px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">Annual Charges</font></td>
			<td style="border-style:dotted; border-width:1px; height: 14px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<strong><font face="Cambria" style="font-size: 10pt">



		<?php 
		if ($DiscountType=="Others")
		{
			echo ($AnnualFee-$Discount);
		}
		else
		{
			echo $AnnualFee;
		}
		?></font></strong></td>
		</tr>
		-->
<?php
}
?>
		
<!--
		<tr>
			<td style="border-style:dotted; border-width:1px; height: 10px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">Transport Fees</font></td>
			<td style="border-style:dotted; border-width:1px; height: 10px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<strong><font face="Cambria" style="font-size: 10pt">







		<?php echo $TransportFees; ?></font></strong></td>
		</tr>
		
		<tr>
			<td style="border-style:dotted; border-width:1px; height: 5px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">Hostel Fees</font></td>
			<td style="border-style:dotted; border-width:1px; height: 5px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<?php echo $HostelFee;?></td>
		</tr>

	-->


		<!--
		<tr>
			<td style="border-style:dotted; border-width:1px; height: 5px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">Discount</font></td>
			<td style="border-style:dotted; border-width:1px; height: 5px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<?php echo $Discount;?></td>
		</tr>
		
		<tr>
			<td style="border-style:dotted; border-width:1px; height: 5px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">Late Fees Charge Paid</font></td>
			<td style="border-style:dotted; border-width:1px; height: 5px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<strong><font face="Cambria" style="font-size: 10pt">
		<?php echo $AdjustedLateFee; ?></font></strong></td>
		</tr>
		-->
	



	<?php 



	if ($Message1 !="")



	{



	?>



	<?php 



	}



	?>



	


<!--
		<tr>
			<td style="border-style:dotted; border-width:1px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">Previous Balance</font></td>
			<td style="border-style:dotted; border-width:1px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<strong><font face="Cambria" style="font-size: 10pt">
			<?php echo $PreviousBalance; ?></font></strong></td>
		</tr>
		-->
		<tr>
			<td style="border-style:dotted; border-width:1px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" align="center" >
			<font face="Cambria" style="font-size: 10pt"><b>Total Fees Payable</b></font></td>
			<td style="border-style:dotted; border-width:1px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">







			<?php echo $Total; ?></font></td>
		</tr>
		<tr>
			<td style="border-style:dotted; border-width:1px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" align="center" >
			<font face="Cambria" style="font-size: 10pt"><b>Total Fees Paid</b></font></td>
			<td style="border-style:dotted; border-width:1px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">







		<?php echo $PayingAmount; ?></font></td>
		</tr>
		<tr>
			<td style="border-style:dotted; border-width:1px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" align="center" >
			<font face="Cambria" style="font-size: 10pt"><b>Balance Forward</b></font></td>
			<td style="border-style:dotted; border-width:1px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
			<font face="Cambria" style="font-size: 10pt">
		<?php echo $BalanceAmount; ?></font></td>
		</tr>
	</table>
</form>
<table width="100%" cellpadding="0" style="border-collapse: collapse" >
	<tr>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 122px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Fee Quarter</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" class="style1" >
		<font face="Cambria" style="font-size: 10pt"><strong>Receipt #</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Fee Payable</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Fee Paid</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Balance</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Status</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Payment Date</strong></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt"><strong>Financial Year</strong></font></td>
	</tr>

		
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
	<tr>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 122px" >
		<font face="Cambria" style="font-size: 10pt">
		<?php echo $quarter;?>
		</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">
<?php echo $receipt; ?>
		</font>
		</td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">
		<?php echo $fees_amount; ?>
		</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">
<?php echo $amountpaid; ?>
	</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">



		<?php echo $BalanceAmt; ?></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">

		<?php echo $status; ?>

		</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px">
		<font face="Cambria" style="font-size: 10pt">







		<?php echo $date; ?></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px">
		<font face="Cambria" style="font-size: 10pt">







		<?php echo $FinancialYear; ?></font></td>
	</tr>
	
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
	<tr>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 122px" >
		<font face="Cambria" style="font-size: 10pt">
		
		</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">
<?php echo $BalanceReceiptNo; ?>
		</font>
		</td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">
		<?php echo $PayableBalanceAmt; ?>
		</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">
<?php echo $PaidBalanceAmt; ?>
	</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">



		<?php echo $OutstandingAmt; ?></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
		<font face="Cambria" style="font-size: 10pt">

		

		</font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px">
		<font face="Cambria" style="font-size: 10pt">

		<?php echo $ReceiptDate; ?></font></td>
		<td style="border-style:solid; border-width:1px; height: 16px; width: 123px">
		<font face="Cambria" style="font-size: 10pt">

		<?php echo $FinancialYear; ?></font></td>
	</tr>
	<?php
		}
	}
	?>
<?php
}
?>
		

	



	<tr>
		<td  colspan="8">
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

	<a href="Javascript:printDiv();"><span >PRINT</span></a> || <a href="FeesMenu.php"><span >HOME</span></a>

	</font>

	</div>
</body>
</html>