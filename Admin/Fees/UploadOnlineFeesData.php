<?php
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
session_start();
?>
<?php
 if($_REQUEST["isSubmit"]=="yes")
 {
 $ssql="select `financialyear` from `FYmaster` where `Status`='Active'";
	$rsF= mysql_query($ssql);
	while($row2 = mysql_fetch_row($rsF))
	{
		$CurrentFY=$row2[0];
		break;
	}
	$ssqlCFY="SELECT distinct `year`,`financialyear` FROM `FYmaster` where `Status`='Active'";
	$rsCFY= mysql_query($ssqlCFY);

	while($row = mysql_fetch_row($rsCFY))
	{
		$CurrentFinancialYear = $row[0];
		$CurrentFinancialYearName=$row[1];					
	}

	
 	$currentdate=date("Y-m-d");
 	$extension = end(explode(".", $_FILES["file"]["name"]));
 	 if($extension !="csv")
 	 {
 	 	$Msg="Only .csv file can be uploaded!"; 	 	
 	 }
 	 else
 	 {
     	move_uploaded_file($_FILES["file"]["tmp_name"],"Files/".$_FILES["file"]["name"]);
     }

	$file = fopen("Files/".$_FILES["file"]["name"],"r");
	$cnt=0;
	while(! feof($file))
	  {
		  //print_r(fgetcsv($file));
		  $arr=fgetcsv($file);
	  	  	if($cnt>0)
	  	  	{
			  	$rsReceiptNo=mysql_query("SELECT MAX(CAST(REPLACE(`receipt`,'FR/2015-2016/','') as UNSIGNED))+1 FROM `fees`");
				if (mysql_num_rows($rsReceiptNo) > 0)
				{
					while($rowRcpt = mysql_fetch_row($rsReceiptNo))
					{
						$NewReciptNo='FR/2015-2016/'.$rowRcpt[0];
						break;
					}
				}
				else
				{
					$NewReciptNo='FR/2015-2016/1';
				}
				
			  	$sadmission=$arr[1];
			  	if ($sadmission=="")
			  	{
			  		break;
			  	}
			  	$rsStudentDetail=mysql_query("select `sclass`,`sname`,`sfathername`,`srollno` from `student_master` where `sadmission`='$sadmission'");
			  	while($rowSt = mysql_fetch_row($rsStudentDetail))
				{
					$sclass=$rowSt[0];
					$sname=$rowSt[1];
					$sfathername=$rowSt[2];
					$srollno=$rowSt[3];
					break;
			  	}
			  	$Name=$arr[2];
			  	$ChequeDD=$arr[3];
			  	$BankName=$arr[4];
			  	$ChequeNo=$arr[5];
			  	
			  	$ChequeDate=$arr[6];
			  	$ChequeDate= date("Y-m-d", strtotime($ChequeDate));
			  	
			  	$Amount=$arr[7];
			  	$Quarter=$arr[8];
			  	echo $sadmission.",".$Name.",".$ChequeDD.",".$BankName.",".$ChequeNo.",".$ChequeDate.",".$Amount.",".$Quarter."<br>";
			  	if($Quarter=="Q1")
				{
					$InstallmentName="FEES FIRST INSTALLMENT";
				}
				if($Quarter=="Q2")
				{
					$InstallmentName="FEES SECOND INSTALLMENT";
				}
				if($Quarter=="Q3")
				{
					$InstallmentName="FEES THIRD INSTALLMENT";
				}
				if($Quarter=="Q4")
				{
					$InstallmentName="FEES FOURTH INSTALLMENT";
				}
				
				$rsChk=mysql_query("select * from `fees_student` where `sadmission`='$sadmission' and `feeshead`='$InstallmentName'");
				
				$SubmitReceipt="no";
				if (mysql_num_rows($rsChk) == 0)
				{
					$ssql2="INSERT INTO `fees_student` (`sadmission`,`class`,`Name`,`feeshead`,`amount`,`financialyear`,`FeesType`) VALUES ('$sadmission','$sclass','$Name','$InstallmentName','$Amount','$CurrentFinancialYear','Regular')";
					mysql_query($ssql2) or die(mysql_error());
					
				  	$ssql="INSERT INTO `fees` (`sadmission` ,`sname` ,`sclass`,`srollno`,`fees_amount`,`amountpaid`,`quarter`,`date`,`FinancialYear`,`status`,`receipt`,`finalamount`,`PaymentMode`,`chequeno`,`bankname`,`cheque_date`,`FeesType`) VALUES('$sadmission','$Name','$sclass','$RollNo','$Amount','$Amount','$Quarter','$currentdate','$CurrentFinancialYear','Paid','$NewReciptNo','$Amount','Cheque','$ChequeNo','$BankName','$ChequeDate','Regular')";	
					//echo $ssql."<br>";
					mysql_query($ssql) or die(mysql_error());
					$SubmitReceipt="yes";
				}
				
				
			  	
			  	//echo "-----------------"
			  	
			  	////////RECEIPT CODE GENERATION............
			  		//-------------------- Previous Payment history----------------------------------------------------------
			  		$ssql = "SELECT `quarter`,`fees_amount`,`amountpaid`,`BalanceAmt`,`status`,`receipt`,date_format(`date`,'%d-%m-%Y') as `date`,`FinancialYear` FROM `fees` where `sadmission`='$sadmission' order by `quarter`,`FinancialYear` desc limit 4";
					$rsH = mysql_query($ssql);
					
			  		$strReceipt='';
			  		$strReceipt=$strReceipt.'<div id="MasterDiv">
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
												
													<div style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
														<table id="table_11" cellspacing="0" cellpadding="0" width="100%" class="style4">
															<tr>
																<td style="border-style:none; border-width:medium; height: 13px"  colspan="11" class="style1" align="center">
																<img src="logo.jpg" width="100px" height="100px"></td>
															</tr>
															<tr>
																<td style="border-style:none; border-width:medium; height: 13px"  colspan="11" class="style1" align="center">
																<font face="Cambria" class="style2"><strong>'.$SchoolName.'<br>'.$SchoolAddress.'</strong></font></td>
															</tr>
															<tr>
																<td style="border-style:none; border-width:medium; height: 13px"  colspan="7">
																<font face="Cambria" style="font-size: 10pt"><strong>Fees Receipt No. '.$NewReciptNo.'</strong>
																</font></td>
																
																<td style="border-style:none; border-width:medium; height: 13px"  colspan="4" align="right">
																<font face="Cambria" style="font-size: 10pt"><strong>Date: '.date("d-m-Y").'</strong>
																</font></td>
		
																
															</tr>
															<tr>
																<td style="padding: 1px 4px; width: 100px; height: 25px; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium; border-top-style:none; border-top-width:medium" >
																<font face="Cambria"><b><span ><font style="font-size: 10pt">Adm No.</font></span></b></font>
																<span style="font-family: Cambria; font-weight: 700; " ><font style="font-size: 10pt">:</font></span></td>
																<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 138px; height: 25px; " align="left">
																<font face="Cambria" style="font-size: 10pt"><b>'.$sadmission.'</b></font></td>
																<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " align="right">
																<font face="Cambria" style="font-size: 10pt"><b><span >Name: 
																</span></b></font></td>
																<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 138px; height: 25px; " align="left">
																<font face="Cambria" style="font-size: 10pt"><b>'.$sname.'</b></font></td>
																
																<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " >
																<font face="Cambria" style="font-size: 10pt"><b><span >Fathers Name:</span></b></font></td>
																
																<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 145px; height: 25px; " align="left"><font face="Cambria" style="font-size: 10pt"><b>'.$sfathername.'</b></font></td>
																<td style="padding: 1px 4px; border-style: none; border-width: medium; height: 25px; width: 100px; " colspan="2" align="right">
																<p ><font face="Cambria" style="font-size: 10pt"><strong>Class:</strong></font></td>
																<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " align="left">
																<font face="Cambria" style="font-size: 10pt"><b>'.$sclass.'</b></font></td>
																<td style="padding: 1px 4px; border-style: none; border-width: medium; width: 100px; height: 25px; " align="right">
																<span style="font-family: Cambria; font-weight: 700; " >
																<font style="font-size: 10pt">Roll No:</font></span></td>
																<td style="padding: 1px 4px; border-style: none; border-width: medium; height: 25px; width: 100px;" align="left">
																<font face="Cambria" style="font-size: 10pt"><b>'.$srollno.'</b></font></td>
															</tr>
														</table><font face="Cambria" style="font-size: 10pt">
													</span>
														</font>
														<table style="border-width:0px; width: 100%" cellpadding="0"  >
															<tr>
																<td style="width: 206px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
																<font face="Cambria" style="font-size: 10pt"><b>Mode Of Payment:</b></font></td>
																<td style="padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" width="207"  align="left">
																<font face="Cambria" style="font-size: 10pt"><b>'.$ChequeDD.'</b></font></td>
																<td style="width: 207px;padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" align="right">
																<font face="Cambria" style="font-size: 10pt"><strong>Cheque / D.D. No.:</strong></font></td>
																<td style="width: 207px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px"  align="left">
																<font face="Cambria" style="font-size: 10pt"><b>'.$ChequeNo.'</b></font></td>
																<td style="width: 207px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px"  >
																<font face="Cambria" style="font-size: 10pt"><strong><span >Bank Name:</span></strong></font></td>
																<td width="207" style="padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px"  align="left">
																<font face="Cambria" style="font-size: 10pt"><b>'.$BankName.'</b></font></td>
															</tr>
														</table></div>
													<table width="100%" style="border-style:dotted; border-width:1px; background-image: url("../images/emerald_logo.png"); background-position: center; background-repeat:no-repeat; border-collapse:collapse; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" cellpadding="0" border="1" cellspacing="0">
														<tr>
															<td style="border-style:dotted; border-width:1px; height: 6px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" align="center">
															<font face="Cambria" style="font-size: 10pt"><b>Fees Payment for Quarter</b></font></td>
															<td  style="border-style:dotted; border-width:1px; height: 6px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px">
															<strong><font face="Cambria" style="font-size: 10pt">'.$Quarter.'</font></strong></td>
														</tr>
														<tr>
															<td style="border-style:dotted; border-width:1px; width: 499px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" align="center" >
															<font face="Cambria" style="font-size: 10pt"><b>Total Fees Paid</b></font></td>
															<td style="border-style:dotted; border-width:1px; width: 595px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
															<font face="Cambria" style="font-size: 10pt">'.$Amount.'</font></td>
														</tr>												
													</table>
												<table width="100%" cellpadding="0" style="border-collapse: collapse" >
													<tr>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 122px" colspan="6" align="center">
														<font face="Cambria" style="font-size: 10pt"><strong>Payment History</strong></font></td>														
													</tr>
													<tr>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 122px" >
														<font face="Cambria" style="font-size: 10pt"><strong>Fee Quarter</strong></font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
														<font face="Cambria" style="font-size: 10pt"><strong>Receipt #</strong></font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
														<font face="Cambria" style="font-size: 10pt"><strong>Fee Paid</strong></font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
														<font face="Cambria" style="font-size: 10pt"><strong>Status</strong></font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
														<font face="Cambria" style="font-size: 10pt"><strong>Payment Date</strong></font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
														<font face="Cambria" style="font-size: 10pt"><strong>Financial Year</strong></font></td>
													</tr>';
												while($row = mysql_fetch_row($rsH))
													{
																	
																	$quarter1=$row[0];
																	$fees_amount=$row[1];
																	$amountpaid1=$row[2];
																	$BalanceAmt=$row[3];
																	$status=$row[4];
																	$receipt1=$row[5];
																	$date=$row[6];
																	$FinancialYear1=$row[7];				
								
							$strReceipt=$strReceipt.'<tr>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 122px" >
														<font face="Cambria" style="font-size: 10pt">'.$quarter1.'</font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
														<font face="Cambria" style="font-size: 10pt">'.$receipt1.'</font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
														<font face="Cambria" style="font-size: 10pt">'.$amountpaid1.'</font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
														<font face="Cambria" style="font-size: 10pt">'.$status.'</font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px">
														<font face="Cambria" style="font-size: 10pt">'.$date.'</font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px">
														<font face="Cambria" style="font-size: 10pt">'.$FinancialYear1.'</font></td>
													</tr>';
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
								$strReceipt=$strReceipt.'<tr>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 122px" >
														<font face="Cambria" style="font-size: 10pt">
														
														</font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
														<font face="Cambria" style="font-size: 10pt">'.$BalanceReceiptNo.'
														</font>
														</td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
														<font face="Cambria" style="font-size: 10pt">'.$PayableBalanceAmt.'</font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
														<font face="Cambria" style="font-size: 10pt">'.$PaidBalanceAmt.'</font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
														<font face="Cambria" style="font-size: 10pt">'.$OutstandingAmt.'</font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px" >
														<font face="Cambria" style="font-size: 10pt">
														</font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px">
														<font face="Cambria" style="font-size: 10pt">'.$ReceiptDate.'</font></td>
														<td style="border-style:solid; border-width:1px; height: 16px; width: 123px">
														<font face="Cambria" style="font-size: 10pt">'.$FinancialYear.'</font></td>
													</tr>';
														}
													}											
												}
												
									$strReceipt=$strReceipt.'<tr>
														<td  colspan="8">
														<p align="right"><font face="Cambria" style="font-size: 10pt"><em>
														<span >This is a computer generated receipt and does not required any signature. </span> 
														</span>
														</em></font>
														<span style="font-family: Cambria; font-size: 10pt; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none">
														<br>(For Principal)</span></td>
													</tr>
												</table>
												</div>';
									echo $strReceipt."<br>";
									if($SubmitReceipt=="yes")
									{
									$ssql="INSERT INTO `fees_receipt_code` (`sadmission`,`ReceiptNo`,`ReceiptCode`) values ('$sadmission','$NewReciptNo','$strReceipt')";
									mysql_query($ssql) or die(mysql_error());									
									}
			  		
			  		
			  	
			  	///////END OF RECEIPT CODE GENERATION...............
			  }
			  	$cnt=$cnt+1;
	  }//END OF WHILE LOOP
	fclose($file);
	$Message="<br><center><b>Total Records uploaded:".$cnt;
     //move_uploaded_file($_FILES["file"]["tmp_name"],"/"$_FILES["file"]["name"]);
	exit();
 }
   
?>  
<script language="javascript">
function Validate()
{
	if (document.getElementById("file").value=="")
	{
		alert("Please select file!");
		return;
	}
	document.getElementById("frmChallan").submit();
}

</script> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Student Attendance Details</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="Project/jainsis.com/Admin/Academics/tcal.css" />
	<script type="text/javascript" src="Project/jainsis.com/Admin/Academics/tcal.js"></script>
<style type="text/css">
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
}
.style1 {
	border-color: #808080;
	border-width: 0px;
	border-collapse: collapse;
	font-family: Cambria;
	}
.style3 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
}
.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria;
}
.style6 {
	border-collapse: collapse;
	font-family: Cambria;
}
.auto-style21 {
	text-align: left;
}
.auto-style6 {
	color: #DAB9C1;
}
.auto-style22 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria;
}
.auto-style23 {
	color: #000000;
}
.auto-style24 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria;
	text-decoration: underline;
}
.auto-style3 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 15px;
	color: #000000;
}
.auto-style25 {
	text-align: right;
	font-family: Cambria;
	color: #000000;
}
.auto-style26 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
	color: #000000;
}
.style7 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
}
.style8 {
	text-align: center;
}

</style>

</head>



<body>



<p>&nbsp;</p>



<table style="border-width:1px; width: 100%" class="style1" cellspacing="0" cellpadding="0">

	<tr>

		<td class="style4" colspan="2" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">



				<div class="auto-style21">



					<u>



					<strong>Upload Bank Fee Detail</strong></u></div>

<hr class="auto-style3" style="height: -15px">

<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></p>

				

				</td>		

	</tr>

</table>

<table cellspacing="0" cellpadding="0" width="100%">	
	<form name="frmChallan" id="frmChallan" method="post" action="" enctype="multipart/form-data">	
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes" class="auto-style23">
	
	<tr>

		<td class="style3" style="border-bottom-style: none; border-bottom-width: medium">

		<table cellpadding="0" class="style6" style="width: 100%; border-top-width:0px" cellspacing="0" border="1">

			
			<tr>

				<td style="height: 21px; border-top-style:none; border-top-width:medium" class="style7" colspan="2">
				<?php echo $Message;?>
				</td>

			</tr>

			
			<tr>

				<td style="width: 441px; height: 24px" class="style7">
				<strong>Select Challan Detail File</strong></td>

				<td style="height: 24px" class="style8">
				<p style="text-align: left">
				<input type="file" name="file" id="file" style="font-weight: 700; float: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" name="btnSubmit" value="Submit" onclick="Javascript:Validate();" style="font-weight: 700">
				</td>

			</tr>			

			
			<tr>

				<td style="height: 24px" class="style7" colspan="2">
				&nbsp;<p style="text-align: left"><u><b>Instructions : </b></u>
				</p>
				<p style="text-align: left">1. Please ensure that only relevant 
				details are captured in the file </p>
				<p style="text-align: left">2. Please note all the fields are 
				mandatory</p>
				<p style="text-align: left">3. Please do not add any special 
				character in the file e.g. &#39;&nbsp; / &quot; @ # $ % ^ &amp; * ( )</p>
				<p style="text-align: left">&nbsp;</td>

			</tr>			
			</table>

		</td>

	</tr>

	

	</form>

</table>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>

</div>





</body>



</html>