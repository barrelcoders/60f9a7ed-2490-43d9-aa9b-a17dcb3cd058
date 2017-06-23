<?php 
include '../../connection.php';
include '../Header/Header3.php';
//$ssql="select `ExamName`,`ExamFee`,`WorkBook`,`TextBook` from `fees_exam_master` where `sclass`='4'";
//$rs=mysql_query($ssql);
?>
<?php
$Admission=$_REQUEST["txtAdmissionNo"];
$sname=$_REQUEST["txtStudentName"];
$sclass=$_REQUEST["txtClass"];

$PaymetMode=$_REQUEST["cboPaymentMode"];
$ChequeNo=$_REQUEST["txtChequeNo"];
//$ChequeDate=$_REQUEST["txtChequeDate"];
$BankName=$_REQUEST["txtBankName"];
$ChequeAmount=$_REQUEST["txtTotalAmount"];

$ChequeDate=$_REQUEST["txtChequeDate"];
$arr=explode('/',$ChequeDate);
$ChequeDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];

$ShowChequeDate= $arr[1] . "-" . $arr[0] . "-" . $arr[2];


$TotalExam=$_REQUEST["TotalExam"];
$TotalExamFee=0;
$TotalWorkBookFee=0;
$TotalTextBookFee=0;
$GrandTotal=0;
$strExamSubscribed="";

$rsReceiptNo=mysql_query("SELECT MAX(CAST(REPLACE(`ReceiptNo`,'MR/2015-2016/','') as UNSIGNED))+1 FROM `fees_receipt_code` where `ReceiptNo` like 'MR%'");
	if (mysql_num_rows($rsReceiptNo) > 0)
	{
		while($rowRcpt = mysql_fetch_row($rsReceiptNo))
		{
			if($rowRcpt[0]=="")
			{
				$NewReciptNo='MR/2015-2016/1';
			}
			else
			{
				$NewSrNo=$rowRcpt[0]+1;
				$NewReciptNo='MR/2015-2016/'.$NewSrNo;
			}
			break;
		}
	}
	else
	{
		$NewReciptNo='MR/2015-2016/1';
	}
$currentdate=date('Y-m-d');
$showcurrentdate=date('d-m-Y');

for($i=1;$i<=$TotalExam;$i++)
{
	$ctrlExamFee="chkExamFee".$i;
	$ctrlWorkBookFee="chkWorkBook".$i;
	$ctrlTextBookFee="chkTextBook".$i;
	
	$RowWiseExamFees=0;
	$RowWiseWorkBookFees=0;
	$RowWiseTextBookFees=0;
	
	if($_REQUEST[$ctrlExamFee]=="Yes")
	{
		$ctrlExamName="hExamName".$i;
		$ctrlExamFeeAmount="hExamFees".$i;
		$ExamName=$_REQUEST[$ctrlExamName];
		$strExamSubscribed=$strExamSubscribed.$ExamName.",";
		
		$RowWiseExamFees=$_REQUEST[$ctrlExamFeeAmount];
		$TotalExamFee=$TotalExamFee + $_REQUEST[$ctrlExamFeeAmount];
		
		mysql_query("insert into `fees_exam_student` (`ExamName`,`FeesType`,`Amount`,`sadmission`,`sname`,`sclass`,`ReceiptNo`,`ReceiptDate`,`PaymetMode`,`ChequeNo`,`ChequeDate`,`BankName`,`ChequeAmount`) values ('$ExamName','ExamFee','$RowWiseExamFees','$Admission','$sname','$sclass','$NewReciptNo','$currentdate','$PaymetMode','$ChequeNo','$ChequeDate','$BankName','$ChequeAmount')") or die(mysql_error());
	
		if($_REQUEST[$ctrlWorkBookFee]=="Yes")
		{
			$ctrlWorkBookFeeAmount="hWorkBook".$i;
			$RowWiseWorkBookFees=$_REQUEST[$ctrlWorkBookFeeAmount];
			$TotalWorkBookFee=$TotalWorkBookFee + $_REQUEST[$ctrlWorkBookFeeAmount];
			mysql_query("insert into `fees_exam_student` (`ExamName`,`FeesType`,`Amount`,`sadmission`,`sname`,`sclass`,`ReceiptNo`,`ReceiptDate`,`PaymetMode`,`ChequeNo`,`ChequeDate`,`BankName`,`ChequeAmount`) values ('$ExamName','WorkBook','$RowWiseWorkBookFees','$Admission','$sname','$sclass','$NewReciptNo','$currentdate','$PaymetMode','$ChequeNo','$ChequeDate','$BankName','$ChequeAmount')") or die(mysql_error());
		}
		if($_REQUEST[$ctrlTextBookFee]=="Yes")
		{
			$ctrlTextBookFeeAmount="hTextBook".$i;
			$RowWiseTextBookFees=$_REQUEST[$ctrlTextBookFeeAmount];
			$TotalTextBookFee=$TotalTextBookFee + $_REQUEST[$ctrlTextBookFeeAmount];
			mysql_query("insert into `fees_exam_student` (`ExamName`,`FeesType`,`Amount`,`sadmission`,`sname`,`sclass`,`ReceiptNo`,`ReceiptDate`,`PaymetMode`,`ChequeNo`,`ChequeDate`,`BankName`,`ChequeAmount`) values ('$ExamName','TextBook','$RowWiseTextBookFees','$Admission','$sname','$sclass','$NewReciptNo','$currentdate','$PaymetMode','$ChequeNo','$ChequeDate','$BankName','$ChequeAmount')") or die(mysql_error());
		}
		//echo "Exam Name:".$ExamName.",Exam Fees:".$_REQUEST["hExamFees".$i].",WorkBookFees:".$RowWiseWorkBookFees.",TextBookFees:".$RowWiseTextBookFees."<br>";
		
	}
}
$GrandTotal=$TotalExamFee + $TotalWorkBookFee + $TotalTextBookFee;
$ExamSubscribed=substr($strExamSubscribed,0,strlen($strExamSubscribed)-1);

mysql_query("insert into `fees_receipt_code` (`sadmission`,`ReceiptNo`) values ('$Admission','$NewReciptNo')");

	
?>
<script language="javascript">
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
<title>Delhi Public School</title>
</head>

<body onload="Javascript:CreatePDF();">
<div id="MasterDiv">
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 0px;
}
.style2 {
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style3 {
	border-left-style: none;
	border-left-width: medium;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style4 {
	border-left-color: #C0C0C0;
	border-right: 1px solid #A0A0A0;
	border-top: 1px solid #C0C0C0;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
</style>
<table cellspacing="0" cellpadding="0" style="width: 100%;" class="style1">
	<tr>
		<td colspan="4" class="style4" style="border-style: solid; border-width: 1px">
		<p align="center"><font face="Cambria" style="font-size: 18pt">Delhi Public School</font></p>
		<p align="center"><b><font face="Cambria">Sector - 19 Faridabad</font></b></td>
	</tr>
	<tr>
		<td width="292" class="style2" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Date : <?php echo $showcurrentdate;?></font></b></td>
		<td width="152" colspan="3" class="style3" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<p align="right"><b><font face="Cambria">Receipt No : <?php echo $NewReciptNo;?></font></b></b>
		</font></td>
	</tr>
	<tr>
		<td colspan="4" style="border-left:1px solid #C0C0C0; border-right:1px solid #A0A0A0; border-bottom-style:solid; border-bottom-width:1px"><font face="Cambria">Received with thanks from <strong>Admission No :</strong> 
		<?php echo $_REQUEST["txtAdmissionNo"];?> , 
		<strong>Student's Name:</strong> <?php echo $_REQUEST["txtStudentName"];?>, 
		<strong>Class:</strong> <?php echo $_REQUEST["txtClass"];?> </font>
		<p><font face="Cambria"><strong>Exam subscribed:</strong> <?php echo $ExamSubscribed;?> </font></p>
		<p><font face="Cambria"><strong>Sum of Rupees:</strong> <?php echo $GrandTotal;?> </font></p>
		<p>&nbsp;</td>
	</tr>
	<tr>
		<td width="878" style="border-left:1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; " colspan="2"><font face="Cambria">Cheque No : 
		<?php echo $_REQUEST["txtChequeNo"];?></font></td>
		<td width="293" style="border-style:solid; border-width:1px; ">
		<font face="Cambria">Cheque Date: <?php echo $ShowChequeDate;?></font></td>
		<td width="293" style="border-right:1px solid #A0A0A0; border-left-style: solid; border-left-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px"><font face="Cambria">Bank Name: 
		<?php echo $_REQUEST["txtBankName"];?></font></td>
	</tr>
	<tr>
		<td colspan="4" style="border-left:1px solid #C0C0C0; border-right:1px solid #A0A0A0; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px"><font face="Cambria">On account of Fee Received</font></td>
	</tr>
	<tr>
		<td colspan="4" style="border-left-color: #C0C0C0; border-right-color: #A0A0A0; border-bottom-color: #A0A0A0; border-top-style:solid; border-top-width:1px">
		<p align="right"><b><font face="Cambria">For Principal</font></b></td>
	</tr>
</table>
<form name="frmPDF" id="frmPDF" method="post" action="StorePDFMiscFee.php">
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

	<a href="Javascript:printDiv();"><span >PRINT</span></a> || <a href="FetchStudentDetailForExamFees.php"><span >HOME</span></a>

	</font>

	</div>
</body>

</html>
