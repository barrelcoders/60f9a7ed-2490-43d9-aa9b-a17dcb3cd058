<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>


<?php

session_start();



	

	if ($_REQUEST["txtReciptNo"] != "")

	{

		$ReceiptNo = $_REQUEST["txtReciptNo"];

		$ssql = "SELECT `amountpaid`,`SecurityAmtPaid`,`Discount`,`TotalAmtPaid` FROM `AdmissionFees` where `receipt`='$ReceiptNo'";

		$rs = mysql_query($ssql);

		while($row = mysql_fetch_row($rs))

		{

					$amountpaid= $row[0];

					$SecurityAmtPaid= $row[1];

					$Discount= $row[2];

					$TotalAmtPaid= $row[3];

		}	

	}



	





?>







<script language="javascript">



function ShowReceiptDetail()

{

	if (document.getElementById("txtReciptNo").value=="")

	{

		alert("Please enter receipt no!");

		return;

	}

	document.getElementById("frmFindReceipt").submit();

}



function Validate()

{

	if (document.getElementById("txtRefundAmount").value=="")

	{

		alert("Refund value is mandatory!");

		return;

	}



	document.getElementById("frmNewStudent").submit();

}







function ShowEdit(SrNo)







{







	//window.open "EditHoliday.php?srno" . SrNo;







	var myWindow = window.open("EditStudentMaster.php?srno=" + SrNo ,"","width=300,height=400");







}







function ShowDelete(SrNo)

{

	var r = confirm("Do you really want to delete the entry?");

	if (r == true)

 	 {

  		var myWindow = window.open("DeleteStudentMaster.php?srno=" + SrNo ,"","width=300,height=400");

  	 }

	else

  	{

	  	return;

  	}

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

			        	//return;

			        	

			        	arr_row=rows.split(",");

			        	document.getElementById("txtAdmissionFees").value=arr_row[4];

			        	document.getElementById("txtSecurityFeesAmount").value=arr_row[5];

						//alert(rows);														

			        }

		      }



			var submiturl="Fees/GetAdmissionFeeDetail.php?Class=" + document.getElementById("cboClass").value + "";

			xmlHttp.open("GET", submiturl,true);

			xmlHttp.send(null);

}

</script>







<html>















<head>







<meta http-equiv="Content-Language" content="en-us">







<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">







<title>Student Registration</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>



<style type="text/css">







.style7 {







	border-left-style: none;







	border-left-width: medium;







	text-align: center;







}







.style12 {



	border-left-width: 0px;



}







.auto-style1 {

	border-collapse: collapse;

	border: 0px solid #000000;

}

.auto-style6 {

	font-size: small;

}







.auto-style7 {

	border-collapse: collapse;

	border-width: 0px;

}

.auto-style11 {

	border-style: none;

	border-width: medium;

}

.auto-style19 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style23 {

	font-size: 12pt;

}







.auto-style30 {

	border: medium solid #FFFFFF;

	color: #000000;

}

.auto-style5 {

	text-align: left;

	font-family: Calibri;

	color: #000000;
	text-decoration: underline;

	font-size: medium;

}

.auto-style3 {

	color: #000000;

}

.auto-style31 {

	font-family: Calibri;

}

.auto-style32 {

	font-size: small;

	font-family: Calibri;

	color: #000000;

}

.auto-style33 {

	font-size: 12pt;

	font-family: Calibri;

}

.auto-style35 {

	text-align: center;

	border-top-style: solid;

	border-top-width: 1px;

	font-family: Calibri;

	font-weight: bold;

	font-size: 18px;

	color: #000000;

}







.auto-style36 {

	border-style: none;

	border-width: medium;

	text-align: right;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style48 {

	border-style: none;

	border-width: medium;

	color: #FFFFFF;

	background-color: #FFFFFF;

}

.auto-style49 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

	text-decoration: underline;

	background-color: #FFFFFF;

}







.style13 {

	border-style: none;

	border-width: medium;

	text-align: center;

}

.style14 {

	font-family: Calibri;

	font-size: medium;

	color: #000000;

}







.style15 {

	font-family: Calibri;

	font-size: 12pt;

	color: #FFFFFF;

	background-color: #FFFFFF;

}







.style16 {

	font-family: Calibri;

	font-size: 12pt;

	color: #FFFFFF;

	background-color: #000000;

	text-align: center;

}







.auto-style50 {

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

	background-color: #FFFFFF;

}







</style>







</head>















<body>







<p>&nbsp;</p>







<table cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style7" style="width: 100%">







	







	



	<tr>



		<td class="auto-style30">



<p class="auto-style5" style="height: 12px"><font face="Cambria" size="3"><strong>Student Admission Fee 

Cancellation</strong></font></p>

<hr class="auto-style3" style="height: -15px">

<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">

<img height="30" src="images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>



		</table>





	

<table style="width: 100%" class="auto-style1">

			<form name="frmFindReceipt" id="frmFindReceipt" method="post" action="CancelAdmissionFee.php" method="post">

			<tr>

			<td class="auto-style50" style="width: 130px"><font face="Cambria"><strong>Enter Receipt No:</strong></font></td>

			<td class="style15" style="width: 786px">

			

				<font face="Cambria">

			

				<input name="txtReciptNo" id="txtReciptNo" type="text"></font></td>

						</tr>

			<tr>

			<td class="auto-style50" style="width: 130px">

			<font face="Cambria">

			<input name="Submit" type="button" value="submit" onclick="Javascript:ShowReceiptDetail();"></font></td>

			<td class="style15" style="width: 786px">

			

				&nbsp;</td>

						</tr>

			</form>

</table>



<font face="Cambria">



<?php

if ($_REQUEST["txtReciptNo"] != "")

	{

?>

</font>

<table cellspacing="0" cellpadding="0" class="style12" style="width: 100%">

	<form name="frmNewStudent" id="frmNewStudent" method="post" action="CancelFeeReceipt.php">

	<font face="Cambria">

	<input type="hidden" name="RecReceiptNo" id="RecReceiptNo" value="<?php echo $ReceiptNo; ?>">

	</font>

	<tr>







		<td style="height: 11px;" class="auto-style35">

		<font face="Cambria">

		<?php echo $Message1; ?></font></td>



	</tr>



	



		



		<tr>







		<td style="height: 29px;" class="auto-style23">







		<table style="width: 100%" class="auto-style1">



			<tr>



				<td class="auto-style49" colspan="2" style="height: 10px">







				<font face="Cambria">







				<strong>Admission Fee Refund:</strong></font></td>



				<td style="width: 134px; height: 10px;" class="auto-style48">







				</td>



				<td style="width: 157px; height: 10px;" class="auto-style48">







				</td>



				<td style="width: 29px; height: 10px;" class="auto-style48">







				</td>



				<td style="width: 158px; height: 10px;" class="auto-style48">







				</td>



			</tr>



			<tr>



				<td class="style13" colspan="2">







				<strong><span class="style14"><font face="Cambria">Fee Details</font></span></strong></td>



				<td style="width: 134px" class="auto-style11">







				<strong><span class="style14"><font face="Cambria">Refund Amt.</font></span></strong></td>



				<td style="width: 157px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 29px" class="auto-style11">







				&nbsp;</td>



				<td style="width: 158px" class="auto-style11">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				<font face="Cambria">Admission fees Amount:</font></td>



				<td class="auto-style19">















		<font face="Cambria">















		<input name="txtAdmissionFees" id="txtAdmissionFees" type="text" class="auto-style33" style="width: 138px" value="<?php echo $amountpaid; ?>" readonly="readonly"></font></td>



				<td style="width: 134px" class="auto-style11">















				<font face="Cambria">















				<input name="txtRefundAmount" id="txtRefundAmount" type="text" readonly="readonly" value="<?php echo $amountpaid; ?>"></font></td>



				<td style="width: 157px" class="auto-style36">







				&nbsp;</td>



				<td class="auto-style11" colspan="2">







		&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				<font face="Cambria">Security Fees Amount:</font></td>



				<td class="auto-style19">















		<font face="Cambria">















		<input name="txtSecurityFeesAmount" id="txtSecurityFeesAmount" type="text" class="auto-style33" style="width: 93px" readonly="readonly" value="<?php echo $SecurityAmtPaid; ?>"></font></td>



				<td style="width: 134px" class="auto-style11">















				<font face="Cambria">















				<input name="txtRefundSecurityFee" id="txtRefundSecurityFee" type="text" readonly="readonly" value="<?php echo $SecurityAmtPaid; ?>"></font></td>



				<td style="width: 157px" class="auto-style36">







				&nbsp;</td>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				<font face="Cambria">Discount</font></td>



				<td class="auto-style19">















		<font face="Cambria">















		<input name="txtAdmissionFeesDiscount" id="txtAdmissionFeesDiscount" type="text" class="auto-style33" style="width: 138px" readonly="readonly" value="<?php echo $Discount; ?>"></font></td>



				<td style="width: 134px" class="auto-style11">















				<font face="Cambria">















				<input name="txtRefundDiscount" id="txtRefundDiscount" type="text" readonly="readonly" value="<?php echo $Discount; ?>"></font></td>



				<td style="width: 157px" class="auto-style36">







				&nbsp;</td>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



			</tr>



			<tr>



				<td class="auto-style19">







				<font face="Cambria">Total Amt.</font></td>



				<td style="width: 63px" class="auto-style11">







				<font face="Cambria">







				<input name="txtTotalAmt" id="txtTotalAmt" type="text" readonly="readonly" value="<?php echo $TotalAmtPaid; ?>"></font></td>



				<td style="width: 134px" class="auto-style11">







				<font face="Cambria">







				<input name="txtTotalRefundAmt" id="txtTotalRefundAmt" type="text" readonly="readonly" style="height: 22px" value="<?php echo $TotalAmtPaid; ?>"></font></td>



				<td style="width: 157px" class="auto-style36">







				&nbsp;</td>



				<td class="auto-style11" colspan="2">







				&nbsp;</td>



			</tr>



			</table>



		</td>



		



		</tr>



		



		<tr>



		



		



		<td><font face="Cambria"><br class="auto-style31">



		</font>



</td>







</tr>



<tr>



		<td style="width: 158px; height: 29px;" class="style7">







		<font face="Cambria">







		<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" class="auto-style32" style="width: 73px"></font></td>







	</tr>







	</form>







</table>

<font face="Cambria">

<?php

}

?>





</font>





</body>















</html>