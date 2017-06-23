<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php
$AdmissionNo = $_REQUEST["txtAdmissionNo"];
	$sqlStudentDetail = "select `sfathername` from  `student_master` where `sadmission`='$AdmissionNo'";
		$rsStudentDetail = mysql_query($sqlStudentDetail);

		while($rows = mysql_fetch_row($rsStudentDetail))
		{
			$FatherName=$rows[0];
			break;
		}

$Name=$_REQUEST["txtName"];

$Class=$_REQUEST["txtClass"];

$RollNo=$_REQUEST["txtRollNo"];

$PaymentMode=$_REQUEST["cboPaymentMode"];

if ($PaymentMode != "Cash")
{
	$ChequeNo= $_REQUEST["txtChequeNo"];
	//$BankName= $_REQUEST["txtBank"];
	$BankName= $_REQUEST["cboBank"];
	$ChequeDate=$_REQUEST["txtChequeDate"];
	$arr=explode('/',$ChequeDate);
	$ChequeDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	$CheckStatus="Pending Clearance";
}


//$FinancialYear = $_REQUEST["txtFinancialYear"];
$FinancialYear = $_REQUEST["cboFinancialYear"];

$FeePaymentMonth = $_REQUEST["txtMonth"];

$FeePaymentYear = $_REQUEST["txtYear"];

$TuitionFee=$_REQUEST["txtTuition"];

$AnnualFee=$_REQUEST["txtAnnualFee"];

$TransportFees=$_REQUEST["txtTransportFees"];

$LateFee=$_REQUEST["txtLateFee"];

$LateDays=$_REQUEST["txtLateDays"];

$AdjustedLateFee=$_REQUEST["txtAdjustedLateFee"];

$AdjustedLateDays=$_REQUEST["txtAdjustedLateDays"];

$PreviousBalance=$_REQUEST["txtPreviousBalance"];

$currentdate=date("Y-m-d");

if ($_REQUEST["txtTuitionFeeDiscount"] == "")
{
	$Discount=0;
}
else
{
	$Discount=$_REQUEST["txtTuitionFeeDiscount"];
}

$DiscountReason=$_REQUEST["cboDiscountReason"];

$Remarks=$_REQUEST["txtRemarks"];

$Total=$_REQUEST["txtTotal"];

$PayingAmount = $_REQUEST["txtTotalAmtPaying"];

$BalanceAmount = $Total - $PayingAmount;
$currentdate=date("Y-m-d");




if ($_REQUEST["SubmitType"]=="Final")
{
				$sqlChk = "SELECT * FROM `fees_monthwise` where  `sadmission`='$AdmissionNo' and `FeeMonth`='$FeePaymentMonth' and `FeeYear`='$FeePaymentYear'";
				$rsChk = mysql_query($sqlChk);
				if (mysql_num_rows($rsChk) > 0)
				{
					echo "<br><br><center><b>Fee already submitted!";
					exit();
				}
	
	//$sqlRcpt = "SELECT MAX(`srno`) +1 FROM  `fees`";
	//$sqlRcpt = "select max(x.`srno`) +1 from (SELECT max(CONVERT(replace(`receipt`,'RCPT',''),UNSIGNED INTEGER)) as `srno` FROM `fees_monthwise` UNION SELECT max(CONVERT(replace(`receipt`,'RCPT',''),UNSIGNED INTEGER)) as `srno` FROM `fees`) as `x`";
	$sqlRcpt = "select max(x.`srno`) +1 from (SELECT max(CONVERT(replace(`receipt`,'TF',''),UNSIGNED INTEGER)) as `srno` FROM `fees_monthwise` UNION SELECT max(CONVERT(replace(`receipt`,'TF',''),UNSIGNED INTEGER)) as `srno` FROM `fees`) as `x`";
	
		$rsRcpt = mysql_query($sqlRcpt);

		while($row = mysql_fetch_row($rsRcpt))
				{
					$newsrno=$row[0];

					/*

					if (strlen($newsrno))==1)
					{

						$newsrno="000" . $newsrno;

					}

					if (strlen($newsrno))==2)

					{

						$newsrno="00" . $newsrno;

					}

					if (strlen($newsrno))==3)

					{

						$newsrno="0" . $newsrno;

					}

					*/

					$NewReciptNo="TF" . $newsrno;

				}

	$sstr="select * from `fees_monthwise` where `sadmission`='$AdmissionNo' and `FeeMonth`='$FeePaymentMonth' and `FeeYear`='$FeePaymentYear' and `FinancialYear`='$FinancialYear'";
	$rs = mysql_query($sstr);
		if (mysql_num_rows($rs) > 0)
		{
			echo "<br><br><center><b>Fee already submitted for Admission Id:" . $AdmissionNo . ",Month:" . $FeePaymentMonth . ",Year:" . $FeePaymentYear . ",Financial Year:" . $FinancialYear;
			exit();
		}

	$ssql="INSERT INTO `fees_monthwise` (`sadmission` ,`sname` ,`sclass`,`srollno`,`fees_amount`,`amountpaid`,`BalanceAmt`,`quarter`,`FeeMonth`,`FeeYear`,`FinancialYear`,`status`,`receipt`,`date`,`finalamount`) VALUES('$AdmissionNo','$Name','$Class','$RollNo','$Total','$PayingAmount','$BalanceAmount','$Quarter','$FeePaymentMonth','$FeePaymentYear','$FinancialYear','Paid','$NewReciptNo','$currentdate','$PayingAmount')";

	mysql_query($ssql) or die(mysql_error());

	

	$ssql1="INSERT INTO `fees_transaction` (`ReceiptNo`,`ReceiptDate`,`TutionFee`,`TransportFee`,`AnnualCharges`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`PreviousBalance`,`Discount`,`DiscountReason`,`Remarks`,`chequeno`,`bankname`,`FinancialYear`,`cheque_date`,`cheque_status`) VALUES ('$NewReciptNo','$currentdate','$TuitionFee','$TransportFees','$AnnualFee','$LateFee','$LateDays','$AdjustedLateFee','$AdjustedLateDays','$PreviousBalance','$Discount','$DiscountReason','$Remarks','$ChequeNo','$BankName','$FinancialYear','$ChequeDate','$CheckStatus')";

	mysql_query($ssql1) or die(mysql_error());

	

}

//-------------------- Previous Payment history----------------------------------------------------------
	$ssql = "SELECT `FeeMonth`,`FeeYear`,`fees_amount`,`amountpaid`,`BalanceAmt`,`status`,`receipt`,DATE_FORMAT(`datetime`,'%d-%m-%Y') as `datetime`,(SELECT `financialyear` FROM `FYmaster` where `year`=a.`FinancialYear`) as `FinancialYear` FROM `fees_monthwise` a where `sadmission`='$AdmissionNo' order by `datetime` desc limit 3";
	$rs = mysql_query($ssql);

//--------------------End of Previous payment history

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
.auto-style1 {
	font-size: 11pt;
}
.auto-style23 {
	border-style: none;
	border-width: medium;
}

.auto-style24 {
	border-style: none;
	border-width: medium;
	text-align: left;
}

.auto-style31 {
	border-style: none;
	border-width: medium;
	text-align: right;
}

.auto-style39 {

	font-family: Cambria;

	font-size: 15px;

	color: #CC3300;

}



.style3 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-size: 11pt;
}



.style6 {

	border-style: solid;

	border-width: 1px;

}

.style7 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: normal;
	font-size: 11pt;
	text-align: center;
}



.style8 {

	text-align: center;

}



.style9 {
	color: #000000;
}
.style10 {
	font-family: Cambria;
	font-size: 15px;
}
.style11 {
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.style12 {
	font-family: Cambria;
	font-size: 11pt;
}
.style15 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
}
.style16 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-size: 10pt;
	color: #000000;
}
.style17 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	text-decoration: underline;
}
.style19 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
}
.style20 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: 700;
	font-size: 11pt;
}
.style21 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
}
.style22 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
}
.style23 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	text-decoration: underline;
}
.style24 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
	text-decoration: underline;
}
.style25 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.style29 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: normal;
	font-size: 11pt;
	color: #000000;
}



.style33 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	text-align: center;
}



.style34 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	text-align: center;
}



.auto-style40 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
	text-decoration: underline;
}



.auto-style41 {
	border-style: none;
	border-width: medium;
	text-align: right;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
	text-decoration: underline;
}
.auto-style42 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
	text-decoration: underline;
}



.style2 {
	font-size: 12pt;
}



</style>

	<form name="frmFees" id="frmFees" method="post" action="FeesPayment.php">
	<table width="100%" id="table_11" class="style6">
		<tr>
		<td style="height: 13px;" class="style25" colspan="10" align="center">
		<font face="Cambria" class="style2"><strong><?php echo $SchoolName; ?><br><?php echo $SchoolAddress; ?></strong></font></td>


		</tr>

		

		

		<tr>

	

	

	

		<td style="height: 13px;" class="auto-style40" colspan="3">



		<strong>Fees Receipt No. </strong>

<?php echo $NewReciptNo; ?>

		</td>



	

	

		<td style="height: 13px;" class="auto-style41" colspan="7">



		<strong>Date &nbsp;</strong><?php echo date("d-m-Y"); ?></td>



	

	

		</tr>

		

		

	<tr>

	

	

	

		<td class="auto-style23" style="width: 110px">



		<span class="style21">Admission No. </span>
		<span style="font-family: Cambria; font-weight: 700; " class="auto-style1">:</span></td>



		<td style="width: 110px; height: 26px;" class="style3">



		<?php echo $AdmissionNo; ?></td>
		<td style="width: 110px" class="auto-style23"><strong>Student Name</strong></strong></td>

	

		

		

		

	

		<td style="width: 111px; height: 26px;" class="auto-style24">



		<?php echo $Name; ?></td>

	

		

		

		

	

		<td style="width: 111px; height: 26px;" class="auto-style24">



		<strong>Father's Name</strong></td>

	

		

		

		

	

		<td style="width: 111px; height: 26px;" class="auto-style24">



		<?php echo $FatherName; ?></td>

	

		

		

		

	

		<td class="auto-style23" style="width: 111px">



		<strong>Class</strong></td>



		<td style="height: 26px; width: 111px;" class="auto-style24">



		<?php echo $Class; ?></td>

		

		

	

		<td class="auto-style23" style="width: 111px">



		<span style="font-family: Cambria; font-weight: 700; " class="auto-style1">

		Roll No</span></td>

		

		



		<td style="width: 111px; height: 26px;" class="auto-style24">



		<?php echo $RollNo; ?></td>

		

		</tr>

		

		

		</table>





	

	

	

	<table style="width: 100%;" class="style6">

		

		

	<tr>

	

	

	

		<td style="width: 154px; " class="style22">



		Mode Of Payment</td>



	

	

		<td class="style15">



		<?php echo $PaymentMode; ?></td>



		

		

		

	

		<td style="width: 252px;" class="style25">



		<strong>Cheque or D.D. no</strong></td>



		

	

		<td style="width: 170px; " class="style15">



		<?php echo $ChequeNo; ?></td>

		

		



		<td style="width: 155px; " class="auto-style31">



		<strong><span class="style11">Bank Name</span></strong></td>

		

		<td class="style15">



		<?php echo $BankName; ?></td>



		</tr>

		

		

		</table>

		

	

<table width="100%" style="background-image: url('../images/logo.png'); background-position: center; background-repeat:no-repeat;">



<tr>			

		



		<td style="height: 4px; width: 594px;" class="style24">



		<strong>Fees Heads</strong></td>





		<td class="style23" style="height: 4px; width: 595px;">



		Fees Amount</td>



			</tr>
<tr>			

		



		<td style="height: 6px; width: 594px;" class="style22">



		Fees Payment for Month</td>





		<td class="style15" style="height: 6px; width: 595px;">



		<?php echo $FeePaymentMonth; ?></td>



			</tr>

		

<tr>			

		



		<td style="height: 14px; width: 594px;" class="style22">



		Tuition Fees</td>





		<td style="height: 14px; width: 595px;" class="style15">



		<?php echo $TuitionFee; ?></td>



			</tr>

		
		<?php 
		if ($_REQUEST["isAnnualChargApply"] == "yes")
		{
		?>
		<tr>			
		<td style="height: 14px; width: 594px;" class="style22">
		Annual Charges</td>
		<td style="height: 14px; width: 595px;" class="style15">
		<?php echo $AnnualFee;?></td>
			</tr>
		<tr>
		<?php
		}
		?>


		<td style="height: 10px; width: 594px;" class="style22">



		Transport Fees</td>



		<td style="height: 10px; width: 595px;" class="style15">







		<?php echo $TransportFees; ?></td>



			



		



		

		</tr>

		

<tr>

		<td style="height: 18px; width: 594px;" class="auto-style24">



		<span style="font-family: Cambria; font-weight: 700; " class="auto-style1">

		Late Fees Charge</span></td>



		<td style="height: 18px; width: 595px;" class="style3">







		<?php echo $AdjustedLateFee; ?></td>



	</tr>

	



	<?php 



	if ($Message1 !="")



	{



	?>



	<?php 



	}



	?>



	



<tr>

		<td style="height: 6px; width: 594px;" class="style20">



		Previous Balance</td>



		<td style="height: 6px; width: 595px;" class="style3">







		<?php echo $PreviousBalance; ?></td>



	</tr>



	



	<tr>



		<td style="width: 594px;" class="style19">



		Waiver</td>



		<td style="width: 595px;" class="style3">
		<?php
		if ($_REQUEST["txtTuitionFeeDiscount"] != "")
		{
			$DiscountWithReason = $Discount . ", Reason:". $DiscountReason;
		}
		else
		{$DiscountWithReason=$Discount;} 
		?>
		<?php echo $DiscountWithReason; ?>
		</td>



	</tr>



	



	<tr>



		<td style="width: 594px;" class="style33">



		Total Fees Payable</td>



		<td style="width: 595px;" class="style29">







		<?php echo $Total; ?></td>



	</tr>



			



	<tr>



		<td style="width: 594px;" class="style33">



		Total Fees Paid</td>



		<td style="width: 595px;" class="style29">







		<?php echo $PayingAmount; ?></td>



	</tr>



			



	<tr>



		<td style="width: 594px;" class="style33">



		Balance Forward</td>



		<td style="width: 595px;" class="style29">







		&nbsp;</td>



	</tr>
</table>
<table width="100%" class="style6">
<tr>			
		<td style="height: 1px;" class="style17" colspan="9">
		Payment History</td>
			</tr>
<tr>			
		<td style="height: 16px; width: 131px;" class="style16">
		<strong>Fees Payment Month</strong></td>
		<td style="height: 16px; width: 131px;" class="style16">
		<strong>Fees Payment Year</strong></td>
		<td style="height: 16px; width: 131px;" class="style16">
		<strong>Fee Payable</strong></td>
		<td style="height: 16px; width: 131px;" class="style16">
		<strong>Fee Paid</strong></td>
		<td style="height: 16px; width: 132px;" class="style16">
		<strong>Balance</strong></td>
		<td style="height: 16px; width: 132px;" class="style16">
		<strong>Payment Status</strong></td>
		<td style="height: 16px; width: 132px;" class="style16">
		<strong>Receipt #</strong></td>
		<td style="height: 16px; width: 132px;" class="style16">
		<strong>Fees Payment Date</strong></td>
		<td style="height: 16px; width: 132px;" class="style16">
		<strong>Financial Year</strong></td>
			</tr>
		
<?php
while($row = mysql_fetch_row($rs))
				{
					$FeeMonth=$row[0];	
					$FeeYear=$row[1];
					$FeePayable=$row[2];
					$FeePaid=$row[3];
					$Balance=$row[4];
					$status=$row[5];	
					$receipt=$row[6];	
					$datetime=$row[7];	
					$FinancialYear=$row[8];	
				
?>
<tr>			
		<td style="height: 20px; width: 131px;" class="style34"><?php echo $FeeMonth; ?></td>
		<td style="height: 20px; width: 131px;" class="style34"><?php echo $FeeYear; ?></td>
		<td style="height: 20px; width: 131px;" class="style34"><?php echo $FeePayable; ?></td>
		<td style="height: 20px; width: 131px;" class="style34"><?php echo $FeePaid; ?></td>
		<td style="height: 20px; width: 132px;" class="style34"><?php echo $Balance; ?></td>
		<td style="height: 20px; width: 132px;" class="style34"><?php echo $status; ?></td>
		<td style="height: 20px; width: 132px;" class="style7"><?php echo $receipt; ?></td>
		<td style="height: 20px; width: 132px;" class="style7"><?php echo $datetime; ?></td>
		<td style="height: 20px; width: 132px;" class="style7"><?php echo $FinancialYear; ?></td>
</tr>
<?php
}
?>
<tr>

		<td class="auto-style31" colspan="9">



		<em>



		<span class="style10"><span class="style12"><strong>Note:</strong>Late fees fine of Rs 10/- per day will charged and will be applicable from the 10th Day of First Month of every 

		quarter</span><span class="auto-style39"><br class="style12">

		</span>For any queries, Kindly call at 

		: 

		</span>

		</em>

		<span style="font-family: Cambria; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">

		<em><?php echo $SchoolPhoneNo; ?> or drop an email at </em>

		</span>

		<span style="color: rgb(204, 51, 0); font-family: Cambria; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">

		<em>

		<span class="style9"><?php echo $AccountsEmailId; ?></span></a></em></span><span style="font-family: Cambria; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><br>
		<br>
		(Fees Incharge)</span></td>
	</tr>
</table>
</form>
<form name="frmPDF" id="frmPDF" method="post" action="StoreHTML.php">
	<span style="font-size: 11pt">
	<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
	<input type="hidden" name="txtpdffilename" id="txtpdffilename" value="<?php echo $PDFFileName; ?>">
	<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $NewReciptNo;?>">
	</span>
</form>
</div>	

<div class="style8">

	<a href="Javascript:printDiv();"><span class="style9">PRINT</span></a> || <a href="FeesMenu.php"><span class="style9">HOME</span></a>

	</div>

</body>







</html>