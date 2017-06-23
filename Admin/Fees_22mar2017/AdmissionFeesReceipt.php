<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>

<?php

$AdmissionNo=$_REQUEST["txtAdmissionNo"];

$Name=$_REQUEST["txtName"];

$Class=$_REQUEST["txtClass"];

$RollNo=$_REQUEST["txtRollNo"];



$PaymentMode=$_REQUEST["cboPaymentMode"];

$ChequeNo=$_REQUEST["txtChequeNo"];

$Bank=$_REQUEST["txtBank"];



$Quarter=$_REQUEST["cboQuarter"];

$TuitionFee=$_REQUEST["txtTuition"];

$TransportFees=$_REQUEST["txtTransportFees"];

$LateFee=$_REQUEST["txtLateFee"];

$LateDays=$_REQUEST["txtLateDays"];

$AdjustedLateFee=$_REQUEST["txtAdjustedLateFee"];

$AdjustedLateDays=$_REQUEST["txtAdjustedLateDays"];

//$PreviousBalance=$_REQUEST["txtPreviousBalance"];



$AdmissionFee=$_REQUEST["txtAdmissionFee"];



$Discount=$_REQUEST["txtDiscount"];

$DiscountReason=$_REQUEST["cboDiscountReason"];

$Remarks=$_REQUEST["txtRemarks"];

$ChequeNo= $_REQUEST["txtChequeNo"];
$BankName= $_REQUEST["txtBank"];

$Total=$_REQUEST["txtTotal"];


$Quarter1=$_REQUEST["txtQuarter1"];

$Quarter1Reciept=$_REQUEST["txtQuarter1Reciept"];

$Quarter1PaymentDate=$_REQUEST["txtQuarter1PaymentDate"];



$Quarter2=$_REQUEST["txtQuarter2"];

$Quarter2Reciept=$_REQUEST["txtQuarter2Reciept"];

$Quarter2PaymentDate=$_REQUEST["txtQuarter2PaymentDate"];



$Quarter3=$_REQUEST["txtQuarter3"];

$Quarter3Reciept=$_REQUEST["txtQuarter3Reciept"];

$Quarter3PaymentDate=$_REQUEST["txtQuarter3PaymentDate"];



$Quarter4=$_REQUEST["txtQuarter4"];

$Quarter4Reciept=$_REQUEST["txtQuarter4Reciept"];

$Quarter4PaymentDate=$_REQUEST["txtQuarter4PaymentDate"];



if ($_REQUEST["SubmitType"]=="Final")

{

	$sqlRcpt = "SELECT MAX(`srno`) +1 FROM  `fees`";

	

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

					$NewReciptNo="RCPT" . $newsrno;

				}

	

	//echo "Receipt No:" . $NewReciptNo;

	//exit();

		

	$ssql="INSERT INTO `fees` (`sadmission` ,`sname` ,`sclass`,`srollno`,`fees_amount`,`amountpaid`,`BalanceAmt`,`quarter`,`status`,`receipt`) VALUES('$AdmissionNo','$Name','$Class','$RollNo','$Total','$Total','0','$Quarter','Paid','$NewReciptNo')";

	mysql_query($ssql) or die(mysql_error());

	


	$ssql1="INSERT INTO `fees_transaction` (`ReceiptNo`,`TutionFee`,`TransportFee`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`Discount`,`DiscountReason`,`Remarks`,`chequeno`,`bankname`,`admissionfees`) VALUES ('$NewReciptNo','$TuitionFee','$TransportFees','$LateFee','$LateDays','$AdjustedLateFee','$AdjustedLateDays','$Discount','$DiscountReason','$Remarks','$ChequeNo','$BankName','$AdmissionFee')";

	mysql_query($ssql1) or die(mysql_error());

	

	$ssql2="INSERT INTO `AdmissionFees` (`sadmission`,`sname`,`sclass`,`srollno`,`amountpaid`,`quarter`,`receipt`) VALUES ('$AdmissionNo','$Name','$Class','$RollNo',$AdmissionFee,'$Quarter','$NewReciptNo')";

	mysql_query($ssql2) or die(mysql_error());

	

}









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

</script>



<html>







<head>



<meta http-equiv="Content-Language" content="en-us">



<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">



<title>Fees Reciept Generation</title>



<!-- link calendar resources -->



	<link rel="stylesheet" type="text/css" href="tcal.css" />



	<script type="text/javascript" src="tcal.js"></script>



	



<style type="text/css">



.auto-style1 {

	font-size: 11pt;

}

.auto-style2 {

	font-family: Cambria;

	font-weight: bold;

	font-size: 11pt;

	color: #000000;

}

.auto-style5 {

	border-style: none;

	border-width: medium;

	text-align: center;

	font-family: Cambria;

	font-weight: bold;

	font-size: 11pt;

	color: #000000;

}



.auto-style11 {

	border-style: solid;

	border-width: 1px;

	font-family: Cambria;

	font-size: 11pt;

	color: #FFFFFF;

	font-weight: bold;

	text-align: center;

}



.auto-style14 {

	border-style: none;

	border-width: medium;

	text-align: left;

	font-family: Cambria;

	font-weight: bold;

	font-size: 11pt;

	color: #000000;

}

.auto-style17 {

	font-family: Cambria;

	font-size: 11pt;

	color: #000000;

}

.auto-style18 {

	margin-left: 0px;

	font-family: Arial;

	font-size: 11pt;

	color: #CC0033;

}



.auto-style20 {

	border-collapse: collapse;

	border-style: solid;

	border-width: 0px;

	font-size: medium;

}



.auto-style22 {

	border-style: none;

	border-width: medium;

	font-family: Cambria;

	font-weight: bold;

	font-size: 11pt;

	color: #000000;

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

.auto-style25 {

	border-style: none;

	border-width: medium;

	font-family: Cambria;

	font-size: 11pt;

	color: #000000;

}



.auto-style26 {

	border-style: none;

	border-width: medium;

	text-align: center;

}

.auto-style27 {

	border-style: none;

	border-width: medium;

	text-align: center;

	font-family: Cambria;

	font-size: 11pt;

	color: #000000;

}

.auto-style28 {

	font-size: 11pt;

	font-weight: normal;

}

.auto-style30 {

	font-family: Cambria;

	font-weight: normal;

	font-size: 11pt;

	color: #000000;

}

.auto-style31 {

	border-style: none;

	border-width: medium;

	text-align: right;

}

.auto-style32 {

	border-style: none;

	border-width: medium;

	font-family: Cambria;

	font-weight: bold;

	font-size: 11pt;

	color: #000000;

	text-align: right;

}

.auto-style33 {

	border-style: none;

	border-width: medium;

	text-align: center;

	font-family: Cambria;

	font-weight: bold;

	font-size: 11pt;

	color: #000000;

	text-decoration: underline;

}



.auto-style34 {

	border-style: none;

	border-width: medium;

	text-align: left;

	font-family: Cambria;

	font-weight: 700;

	color: #000000;

	font-size: 11pt;

}



.auto-style35 {

	font-size: medium;

}

.auto-style36 {

	border-style: none;

	border-width: medium;

	text-align: right;

	font-family: Cambria;

	font-size: 11pt;

	color: #000000;

}

.auto-style37 {

	font-size: 11pt;

	font-family: Arial;

	color: #CC0033;

}

.auto-style38 {

	border-style: none;

	border-width: medium;

	font-family: Cambria;

	font-weight: bold;

	font-size: 11pt;

	color: #000000;

	text-decoration: underline;

}

.auto-style39 {

	font-family: Cambria;

	font-size: 15px;

	color: #000000;

}

.auto-style40 {

	border-style: none;

	border-width: medium;

	text-align: center;

	font-family: Cambria;

	font-size: 11pt;

	color: #000000;

	text-decoration: underline;

}



.style1 {

	border-style: none;

	border-width: medium;

	font-family: Cambria;

	font-weight: normal;

	font-size: 11pt;

	color: #000000;

}

.style3 {

	border-style: none;

	border-width: medium;

	text-align: left;

	font-family: Cambria;

	font-size: 11pt;

	color: #000000;

}

.style5 {

	font-weight: normal;

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

	color: #000000;

	text-align: center;

}



.style8 {

	text-align: center;

}



</style>



</head>







<body>

<div id="MasterDiv">

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style20" style="height: 67px">



	



	

	<tr>

		<td bgcolor="#FFFFFF" class="auto-style11">

		<div id="layer1" style="position: absolute; width: 100px; height: 53px; z-index: 1; left: 40px; top: 17px">

			<span class="auto-style35">

			<img alt="" height="64" src="../images/logo.png" width="73"></span></div>

		<span class="auto-style35"><?php echo $SchooName; ?><br></span><br>

</table>





	

	<form name="frmFees" id="frmFees" method="post" action="FeesPayment.php">

	<table border="1px" id="table_11">

	

	

		<tr>

	

	

	

		<td style="height: 13px;" class="auto-style40" colspan="9">



		<strong>Fees Reciept </strong>



		</td>



		</tr>

		

		

	<tr>

	

	

	

		<td style="width: 290px; height: 14px;" class="auto-style36">



		<strong>Date: </strong>



		</td>



		<td style="width: 157px; height: 14px;" class="auto-style23">



		</td>

	

		

		

		

	

		<td style="width: 157px; height: 14px;" class="auto-style23">



		</td>

	

		

		

		

	

		<td style="width: 179px; height: 14px;" class="auto-style32">



		</td>



		<td style="height: 14px; width: 196px;" class="auto-style23">



		</td>

		

		

	

		<td style="width: 191px; height: 14px;" class="auto-style31">



		</td>

		

		



		<td style="width: 155px; height: 14px;" class="auto-style25">



		<strong>Receipt No.</strong></td>

		

		<td style="height: 14px;" class="style1" colspan="2">



		<?php echo $NewReciptNo; ?></td>



		</tr>

		

		

	<tr>

	

	

	

		<td style="width: 290px; height: 26px;" class="auto-style23">



		<span class="auto-style2">Student Admission No. </span><span style="font-family: Cambria; font-weight: 700; color: #000000" class="auto-style1">:</span></td>



		<td style="width: 157px; height: 26px;" class="auto-style25">



		<?php echo $AdmissionNo; ?></td>

	

		

		

		

	

		<td style="width: 157px; height: 26px;" class="auto-style23">



		</td>

	

		

		

		

	

		<td style="width: 179px; height: 26px;" class="auto-style32">



		</td>



		<td style="height: 26px; width: 196px;" class="auto-style23">



		</td>

		

		

	

		<td style="width: 191px; height: 26px;" class="auto-style31">



		</td>

		

		



		<td style="width: 155px; height: 26px;" class="auto-style23">



		</td>

		

		<td style="width: 111px; height: 26px;" class="auto-style22">



		</td>



		<td style="width: 78px; height: 26px;" class="auto-style23">



		</td>

		</tr>

		

		

	<tr>

	

	

	

		<td style="width: 290px; height: 9px;" class="auto-style23">



		<span class="auto-style2">Student Name</span><span class="auto-style1">

		</span>



		</td>



		<td style="width: 157px; height: 9px;" class="auto-style25">



		<?php echo $Name; ?></td>

	

		

		

		

	

		<td style="width: 157px; height: 9px;" class="auto-style23">



		</td>

	

		

		

		

	

		<td style="width: 179px; height: 9px;" class="auto-style32">



		Class</td>



		<td style="height: 9px; width: 196px;" class="auto-style23">



		<span class="auto-style17"><?php echo $Class; ?></span></td>

		

		

	

		<td style="width: 191px; height: 9px;" class="auto-style31">



		<span style="font-family: Cambria; font-weight: 700; color: #000000" class="auto-style1">

		Roll No</span><span class="auto-style1">

		</span>



		</td>

		

		



		<td style="width: 155px; height: 9px;" class="auto-style25">



		<?php echo $RollNo; ?></td>

		<br class="auto-style1">

		

		<td style="width: 111px; height: 9px;" class="auto-style22">



		</td>



		<td style="width: 78px; height: 9px;" class="auto-style23">



		</td>

		<br class="auto-style1">

		</tr>

		

		

		</table>

		<br>





	

	

	

	<table border="1px" style="border-collapse:collapse" width="100%">

		

		

	<tr>

	

	

	

		<td style="width: 154px; " class="auto-style22">



		Mode Of Payment</td>



	

	

		<td class="auto-style25">



		<?php echo $PaymentMode; ?></td>



		

		

		

	

		<td style="width: 252px;" class="auto-style5">



		<strong>Cheque or Demand Draft no<br>(If applicable)</strong></td>



		

	

		<td style="width: 170px; " class="auto-style25">



		<?php echo $ChequeNo; ?></td>

		

		



		<td style="width: 155px; " class="auto-style26">



		<strong><span class="auto-style17">Bank Name on Cheque / DD</span></strong></td>

		

		<td class="auto-style25">



		<?php echo $Bank; ?></td>



		</tr>

		

		

		</table>

		<br>

		

	

<table border="1" width="100%">



<tr>			

		



		<td style="width: 291px; height: 4px;" class="auto-style38">



		<strong>Fees Heads</strong></td>





		<td class="auto-style38" style="height: 4px">



		Fees Amount</td>



			</tr>

		

<tr>			

		



		<td style="width: 291px; height: 6px;" class="auto-style22">



		Fees Payment for Quarter</td>





		<td class="auto-style25" style="height: 6px">



		<?php echo $Quarter; ?></td>



			</tr>

		

<tr>			

		



		<td style="width: 291px; height: 14px;" class="auto-style22">



		Tuition Fees + Annual Charges for Quarter</td>





		<td style="width: 215px; height: 14px;" class="auto-style25">



		<?php echo $TuitionFee; ?></td>



			</tr>

		

		<tr>



		<td style="width: 291px; height: 10px;" class="auto-style23">



		<span class="auto-style2">Transport Fees</span></td>



		<td style="width: 215px; height: 10px;" class="auto-style25">







		<?php echo $TransportFees; ?></td>



			



		



		

		</tr>

		

<tr>

		<td style="width: 291px; height: 18px;" class="auto-style24">



		<span style="font-family: Cambria; font-weight: 700; color: #000000" class="auto-style1">

		Late Fees Charge</span></td>



		<td style="height: 18px;