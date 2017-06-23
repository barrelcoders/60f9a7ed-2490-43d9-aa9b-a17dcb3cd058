<?php
session_start();
include '../connection.php';
	$StudentClass = $_SESSION['StudentClass'];
	$StudentRollNo = $_SESSION['StudentRollNo'];
	$sadmission=$_SESSION['userid'];
	if($sadmission == "")
	{
		echo "<br><br><center><b>Session Expired!<br>click <a href='http://dpsfbd.info/studentlogin.php'>here</a> to login again!";
		exit();
	}
//************
       $ssqlExamPayment="SELECT  `sadmission` FROM `fees_exam_student` where `sadmission`='$sadmission' and `ExamName`='NSEJS'";
            $rsExamPayment= mysql_query($ssqlExamPayment);
            $row11=mysql_fetch_row($rsExamPayment);
	        $ExamPayment=$row11[0];

   
	        $ssqlMaster="SELECT  `MasterClass` FROM `student_master` where `sadmission`='$sadmission'";
            $rsMaster= mysql_query($ssqlMaster);
            $row9=mysql_fetch_row($rsMaster);
	        $Master=$row9[0];

			$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster` where `Status`='Active'";
            $rsFY= mysql_query($ssqlFY);
            $row4=mysql_fetch_row($rsFY);
	        $CurrentFinancialYear=$row4[0];
        
    $rsStudent=mysql_query("select `FinancialYear`,`Hostel` from `student_master` where `sadmission`='$sadmission'");
    $rowStudent=mysql_fetch_row($rsStudent);
	$FinancialYear=$rowStudent[0]; 	
	$StudentHostel=$rowStudent[1]; 	
	if($FinancialYear==$CurrentFinancialYear)
	{
		$StudentType="new";
	}
	else
	{
		$StudentType="old";
	}
	
	if(($Master=="11COM")||($Master=="11MED")||($Master=="11NMED")||($Master=="11ART"))
	{
	$rsFeeHead=mysql_query("select distinct `feeshead`,sum(`amount`),sum(`actualamount`),sum(`discountamount`) from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` not in ('COMPUTER FEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES','PROVISIONAL AMOUNT') and `FeesType`='Regular' group by `feeshead`");

	}
	else
	{
		$rsFeeHead=mysql_query("select distinct `feeshead`,sum(`amount`),sum(`actualamount`),sum(`discountamount`) from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` not in ('COMPUTER FEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES') and `FeesType`='Regular' group by `feeshead`");

	}
	
	$rsAnnual=mysql_query("SELECT sum(`amount`) FROM `fees_student1` WHERE `sadmission`='$sadmission' and `FeesType` !='Hostel' and `FeesType` !='' and `feeshead` in ('COMPUTER FEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES')");
    $rsOpeningBalance=mysql_query("select `amount` from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead`='CLOSE AMOUNT CREDIT'");
	$rsAdvanceAmt=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `feeshead`='Advances'");
	$rsAlreadyReceived=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES FIRST INSTALLMENT','FEES SECOND INSTALLMENT','FEES THIRD INSTALLMENT','FEES FOURTH INSTALLMENT')");
	$rsCloseAmtCredit=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('CLOSE AMOUNT CREDIT')");
	$rsCloseAmtDebit=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('CLOSE AMOUNT DEBIT')");
	$rsProvisionalAmount=mysql_query("select sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('PROVISIONAL AMOUNT')");

	
	$rsFeeFirstInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' limit 1) from `fees_student1` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES FIRST INSTALLMENT')");
	$rsFeeSecondInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' limit 1) from `fees_student1` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES SECOND INSTALLMENT')");
	$rsFeeThirdInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' limit 1) from `fees_student1` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES THIRD INSTALLMENT')");
	$rsFeeFourthInstall=mysql_query("select `amount`,(select `receipt` from `fees` where `sadmission`='$sadmission' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' limit 1) from `fees_student1` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('FEES FOURTH INSTALLMENT')");
    
	$TotalAmount=0;
	while($rowF=mysql_fetch_row($rsFeeHead))
	{
		$FeeHead=$rowF[0];
		$FeeHeadAmount=$rowF[1];
		$TotalAmount=$TotalAmount+$FeeHeadAmount;
	}
	$rowAnnual=mysql_fetch_row($rsAnnual);
	$AnnualChargesAmount=$rowAnnual[0];
	$GrandTotal=$TotalAmount+$AnnualChargesAmount;
	
	$rowAdvance=mysql_fetch_row($rsAdvanceAmt);
	$FeeAmtAdvance=$rowAdvance[0];
	$rowAlreadyReceived=mysql_fetch_row($rsAlreadyReceived);
	$AlreadyReceivedAmount=$rowAlreadyReceived[0];
	
	$rowProvisionalAmount=mysql_fetch_row($rsProvisionalAmount);
	$ProvisionalAmount=$rowProvisionalAmount[0];

	
	$rowCloseAmtCredit=mysql_fetch_row($rsCloseAmtCredit);
	$CloseAmtCredit=$rowCloseAmtCredit[0];
	$rowCloseAmtDebit=mysql_fetch_row($rsCloseAmtDebit);
	$CloseAmtDebit=$rowCloseAmtDebit[0];
	//echo $GrandTotal."/".$FeeAmtAdvance."/".$AlreadyReceivedAmount."/".$CloseAmtCredit."/".$CloseAmtDebit."/".$ProvisionalAmount; ;
	//exit();
	$BalancePayable=$GrandTotal-$FeeAmtAdvance-$AlreadyReceivedAmount-$CloseAmtCredit+$CloseAmtDebit-$ProvisionalAmount; 
	
	
	$rowFeeFirstInstall=mysql_fetch_row($rsFeeFirstInstall);
	$FeeFirstInstallAmt=$rowFeeFirstInstall[0];
	$FeeFirstInstallRceipt=$rowFeeFirstInstall[1];
	
  if(($Master=='11COM')||($Master=='11ART')||($Master=='11NMED')||($Master=='11MED'))
     {
	$rsFeeHead=mysql_query("select distinct `feeshead`,sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` not in ('COMPUTER FEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES','PROVISIONAL AMOUNT') and `FeesType`='Regular' group by `feeshead`");
     }
  else
    {
	$rsFeeHead=mysql_query("select distinct `feeshead`,sum(`amount`) from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` not in ('COMPUTER FEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES') and `FeesType`='Regular' group by `feeshead`");
	}
	$rowFirstInstallment=mysql_fetch_row($rsFirstInstallment);
	$FirstInstallmentAmt=$rowFirstInstallment[0];
	
	//echo "select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='FEES FIRST INSTALLMENT' and `StudentType`='$StudentType'";
	//exit();
	$LateFeeQ1=0;
	$LateFeeQ2=0;
	$LateFeeQ3=0;
	$LateFeeQ4=0;
	if($FeeFirstInstallRceipt =="")
	{
		if($BalancePayable>0)
		{
			if($BalancePayable-$FirstInstallmentAmt>=0)
				$FeeFirstInstallAmt=$FirstInstallmentAmt;
			else
				$FeeFirstInstallAmt=$BalancePayable;
			
			$BalancePayable=$BalancePayable-$FeeFirstInstallAmt;
			if($FeeFirstInstallAmt>0)
				$LateFeeQ1=fnlLateFee("Q1",$Master);
		}	
	}
     
	$FirstInstallAmtPayable=$FeeFirstInstallAmt+$LateFeeQ1;
	
	$rowFeeSecondInstall=mysql_fetch_row($rsFeeSecondInstall);
	$FeeSecondInstallAmt=$rowFeeSecondInstall[0];
	$FeeSecondInstallRceipt=$rowFeeSecondInstall[1];
	
	  if(($Master=='11COM')||($Master=='11ART')||($Master=='11NMED')||($Master=='11MED'))
      {
      	$rsSecondInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='FEES SECOND INSTALLMENT' and `StudentType`='$StudentType' and `sclass`='$Master'");
	  }
	  else
	  {
	  	$rsSecondInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='FEES SECOND INSTALLMENT' and `StudentType`='$StudentType'");
	  }
	$rowSecondInstallment=mysql_fetch_row($rsSecondInstallment);
	$SecondInstallmentAmt=$rowSecondInstallment[0];
	if($FeeSecondInstallRceipt=="")
	{
		if($BalancePayable>0)
		{
			if($BalancePayable-$SecondInstallmentAmt>=0)
				$FeeSecondInstallAmt=$SecondInstallmentAmt;
			else
				$FeeSecondInstallAmt=$BalancePayable;
			
			$BalancePayable=$BalancePayable-$FeeSecondInstallAmt;
			if($FeeSecondInstallAmt>0)
				$LateFeeQ2=fnlLateFee("Q2",$Master);
		}	
	}
	
	$SecondInstallAmtPayable=$FeeSecondInstallAmt+$LateFeeQ2;
	
	
	$rowFeeThirdInstall=mysql_fetch_row($rsFeeThirdInstall);
	$FeeThirdInstallAmt=$rowFeeThirdInstall[0];
	$FeeThirdInstallRceipt=$rowFeeThirdInstall[1];
	
	  if(($Master=='11COM')||($Master=='11ART')||($Master=='11NMED')||($Master=='11MED'))
       {
         $rsThirdInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='FEES THIRD INSTALLMENT' and `StudentType`='$StudentType' and `sclass`='$Master'");
       }	
       else
       {
         $rsThirdInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='FEES THIRD INSTALLMENT' and `StudentType`='$StudentType'");

       }
	$rowThirdInstallment=mysql_fetch_row($rsThirdInstallment);
	$ThirdInstallmentAmt=$rowThirdInstallment[0];
	if($FeeThirdInstallRceipt=="")
	{
		if($BalancePayable>0)
		{
			if($BalancePayable-$ThirdInstallmentAmt>=0)
				$FeeThirdInstallAmt=$ThirdInstallmentAmt;
			else
				$FeeThirdInstallAmt=$BalancePayable;
			
			$BalancePayable=$BalancePayable-$FeeThirdInstallAmt;
			if($FeeThirdInstallAmt>0)
				$LateFeeQ3=fnlLateFee("Q3",$Master);
		}	
	}
	$ThirdInstallAmtPayable=$FeeThirdInstallAmt+$LateFeeQ3;
	
	
	$rowFeeFourthInstall=mysql_fetch_row($rsFeeFourthInstall);
	$FeeFourthInstallAmt=$rowFeeFourthInstall[0];
	$FeeFourthInstallRceipt=$rowFeeFourthInstall[1];
	if($FeeFourthInstallRceipt=="")
	{
		if($BalancePayable>0)
		{
			$FeeFourthInstallAmt=$BalancePayable;
			$BalancePayable=$BalancePayable-$FeeFourthInstallAmt;
		}
		if($FeeFourthInstallAmt>0)
			$LateFeeQ4=fnlLateFee("Q4",$Master);	
	}   
	$FourthInstallAmtPayable=$FeeFourthInstallAmt+$LateFeeQ4;


//************
$ssql="select `srno`,`HeadName`,`HeadAmount`,`sclass`,`LastDate`,`Remarks`,`Status`,`AnnouncementID` from `fees_misc_announce` where `sclass`='$StudentClass' and `sadmission`='$sadmission'";
//echo $ssql;
//exit();
$rs = mysql_query($ssql);
?>

<?php
//---------------------Late Fee Calculation----------------------------------------------------------


function fnlLateFee($FeeSubmissionQuarter,$Master)
{
	$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster` where `Status`='Active'";
            $rsFY= mysql_query($ssqlFY);
            $row4=mysql_fetch_row($rsFY);
	        $CurrentFinancialYear=$row4[0];
	        
	$now = time(); // Current Date time
	if ($FeeSubmissionQuarter=="Q1")
	{
		$FeeSubmissionYear=$CurrentFinancialYear;
		if(($Master=='11COM')||($Master=='11ART')||($Master=='11NMED')||($Master=='11MED'))
			$Dt1 = $CurrentFinancialYear. "-Apr-" . "18";
       	else
			$Dt1 = $CurrentFinancialYear. "-Apr-" . "18";
		$Dt1 = date('Y-m-d', strtotime($Dt1));
	}
	elseif ($FeeSubmissionQuarter=="Q2")
	{
		$FeeSubmissionYear=$CurrentFinancialYear;
		if(($Master=='11COM')||($Master=='11ART')||($Master=='11NMED')||($Master=='11MED'))
			$Dt1 = $CurrentFinancialYear. "-Aug-" . "17";
		else
			$Dt1 = $CurrentFinancialYear. "-Jul-" . "22";
		$Dt1 = date('Y-m-d', strtotime($Dt1));
	}
	elseif ($FeeSubmissionQuarter=="Q3")
	{
		$FeeSubmissionYear=$CurrentFinancialYear;
		if(($Master=='11COM')||($Master=='11ART')||($Master=='11NMED')||($Master=='11MED'))
			$Dt1 = $CurrentFinancialYear. "-Oct-" . "10";
		else
			$Dt1 = $CurrentFinancialYear. "-Oct-" . "15";
		$Dt1 = date('Y-m-d', strtotime($Dt1));
	}
	elseif ($FeeSubmissionQuarter=="Q4")
	{
		$FeeSubmissionYear=$CurrentFinancialYear+1;
		if(($Master=='11COM')||($Master=='11ART')||($Master=='11NMED')||($Master=='11MED'))
			$Dt1 = $FeeSubmissionYear. "-Jan-" . "10";
		else
			$Dt1 = $FeeSubmissionYear. "-Jan-" . "15";
		$Dt1 = date('Y-m-d', strtotime($Dt1));
	}
	$your_date = strtotime($Dt1);
	$datediff = $now - $your_date;
	if ($datediff > 0)
		$LateDays = floor($datediff/(60*60*24));
	else
		$LateDays = 0;
	
	$LateFee = 0;
	if($LateDays > 0 && $LateDays <=7)
	{
		$LateFee = 100;
	}
	if($LateDays >7)
	{
		$LateFee = 500;
	}
	return $LateFee;
}
?>

<script language="javascript">
function fnlShowReceipt(headname,admissionid)
{
	var myWindow = window.open("ShowMiscReceipt.php?headername=" + escape(headname) + "&sadmission=" + escape(admissionid),"MsgWindow","width=700,height=700");
	return;
}


function FeesBill(sadmission,sclass)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("../Admin/Fees/FeesBill.php?sadmission=" + sadmission + "&Class=" + sclass,"","width=700,height=650");
}
function FeesHostelBill(sadmission,sclass)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("../Admin/Fees/FeesBillHostel.php?sadmission=" + sadmission + "&Class=" + sclass,"","width=700,height=650");
}
function ExamFees(sadmission,sclass)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("ExaminationFees.php?sadmission=" + sadmission + "&Class=" + sclass,"","width=700,height=650");
}


</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Daily Classwork and Homework</title>



<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />



<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>

<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>

<style>

<!--

.auto-style32 {



	border-color: #000000;



	border-width: 0px;



	border-collapse: collapse;



	font-family: Cambria;



}



.auto-style35 {



	border-style: solid;



	border-width: 1px;



	font-family: Cambria;



	text-align: center;



}











.style8 {



	border-style: solid;



	border-width: 1px;



	font-family: Cambria;



}







.auto-style1 {

	border-width: 1px;

	color: #000000;

	font-family: Cambria;

	font-size: 15px;

}



.auto-style2 {

	border-width: 1px;

	font-family: Cambria;

	font-size: 15px;

	font-style: normal;

	text-decoration: none;

	color: #000000;

}



.auto-style3 {

	color: #000000;

}

.style9 {
	border-width: 0px;
}

.style10 {
	text-align: center;
	font-family: Cambria;
}

.style11 {
	text-align: left;
	font-family: Cambria;
}

-->

</style>

</head>

<body>
<!-- ####################################################################################################### -->
<table width="100%" style="border-width: 0px"> 

<tr>

<td style="border-style: none; border-width: medium">
<div class="wrapper col0">
  <div id="topbar">
    <div id="loginpanel">
      <ul>
        <li class="left">Welcome <?php echo $_SESSION['StudentName'];?></li>
        <li class="right" id="toggle"><a id="slideit" href="#slidepanel"></a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>

<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><img src="../../Admin/images/logo.png" height="76" width="300" ></img></h1>
    
    </div>
    
    <div id="topnav">
      <ul>
        <li class="active"><a href="Notices.php">Home</a></li>
        <li><a href="Notices.php">Events and Notices</a></li>
        <li><a href="News.php">News</a></li>
		<li><a href="logoff.php">Logout</li>
        <li class="last"></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
</div>




  
    

<!-- ####################################################################################################### -->



<div class="wrapper col2">

  <div id="breadcrumb">

    <ul>

      <li class="first">You Are Here</li>

      <li>»</li>

      <li><a href="Notices.php">Home</a></li>

      <li>»</li>

		<li class="current"><a href="#">Fees Details</a></li>

    </ul>

  </div>

</div>





<!-- ######################################Div for News ################################################################# -->




<!--<div class="wrapper col6">
  <div id="breadcrumb">
   
    <font size="3" face="cambria"><b><marquee> Welcome to School Information System ! </b></marquee></font>
    
  </div>
</div>-->



</td>



</tr>



</table>



<table width="100%" border="0">

			<tr>

				<td>

				

	 <div id="column"><?php include 'SideMenu.php'; ?></div>

    </td>

    

    

<!-- #########################################Navigation TD Close ############################################################## -->    



<!-- #########################################Content TD Open ############################################################## -->    
				<td>
<div>

  <div>
  
    <div style="overflow: scroll; width: 1050px;">



	<p><u><b><font face="Cambria" color="#009900">Student Fees Details and 
	Payment</font></b></u></p>
	<table border="1" width="1050" cellspacing="0" cellpadding="0">
		<tr>
			<td style="border-right-style: none; border-right-width: medium" width="524"><b><font face="Cambria" color="#009900">
			Tuition Fees Fees Payment</font></b></td>
			<td style="border-left-style: none; border-left-width: medium" width="524">
			&nbsp;</td>
			<td style="border-left-style: none; border-left-width: medium; border-right-style:none; border-right-width:medium" width="524">
			<p align="center"><b><font face="Cambria" color="#FF0000"><button ><a href="Javascript:FeesBill('<?php echo $sadmission?>','<?php echo $StudentClass;?>');" class="style3">Click here to View Fee Bill</a></button></font></td>
			<td style="border-left-style: none; border-left-width: medium" width="524">
			<b><font face="Cambria" color="#FF0000">
			<img src="images/blink.gif" width="26" height="23"></font></td>
		</tr>
	</table>
	<table border="1" width="100%" style="border-collapse: collapse">
		<tr>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Sr No</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Fees Head</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Amount</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Late Fee</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Quarter</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Status</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Last Date</font></b></td>
		</tr>
		<tr>
			<td height="32" class="style10">1.</td>
			<td height="32" class="style11">FEES FIRST INSTALLMENT</td>
			<td height="32" class="style10">
			<?php 
			if($FeeFirstInstallRceipt !="")
			{
				echo $FeeFirstInstallRceipt;
			}
			else
			{
			 	echo $FeeFirstInstallAmt;
			}
			?>
			</td>
			<td height="32" class="style10"><?php echo $LateFeeQ1;?></td>
			<td height="32" class="style10">Q1</td>
			<td height="32" class="style10">
			<?php
			if($FeeFirstInstallRceipt =="")
			{
				//echo "Pay $AmountToBePaid";
			?>
			<form align="center" method="post" action="FeesSubmitUser.php" target="_blank" onsubmit="javascript:document.getElementById('btn1').disabled=true;">
	             <input type="hidden" id="txtAdmissionNo" name="txtAdmissionNo" value="<?php echo $sadmission;?>">
	             <input type="hidden" id="cboQuarter" name="cboQuarter" value="Q1">
	             <input type ="hidden" id="InstallmentWithoutLateFee" name="InstallmentWithoutLateFee" value="<?php echo $FeeFirstInstallAmt;?>">
	             <input type ="hidden" id="LateFee" name="LateFee" value="<?php echo $LateFeeQ1;?>">
	             <input type="hidden" id="InstallmentAmount" name="InstallmentAmount" value="<?php echo $FirstInstallAmtPayable;?>">
	             <input type="Submit" value="Pay <?php echo $FirstInstallAmtPayable;?>" id="btn1" />
			</form>
			<?php
			}
			else
			{
			
				//echo "$ReceiptNoQ1";
				echo "<a href='ShowRegularFeeReceipt.php?receiptno=".$FeeFirstInstallRceipt."' target='_blank'>".$FeeFirstInstallRceipt."</a>";
			}
			?>
			</td>
			<td height="32" class="style10">&nbsp;</td>
		</tr>
		
		<tr>
			<td height="32" class="style10">
			2</td>
			<td height="32" class="style11">
						FEES SECOND INSTALLMENT</td>
			<td height="32" class="style10">
			<?php
			if($FeeSecondInstallRceipt !="")
			{
				//echo $AmountToBePaid;
				echo $FeeSecondInstallRceipt;
			}
			else
			{
				echo $FeeSecondInstallAmt;
			}
			?>
			</td>
			<td height="32" class="style10">
			<?php echo $LateFeeQ2;?></td>
			<td height="32" class="style10">
			Q2</td>
			<td height="32" class="style10">
			<?php
			if($FeeSecondInstallRceipt =="")
			{
				//echo "Pay $AmountToBePaid";
			?>
			<form align="center" method="post" action="FeesSubmitUser.php" target="_blank" onsubmit="javascript:document.getElementById('btn2').disabled=true;">
	             <input type="hidden" id="txtAdmissionNo" name="txtAdmissionNo" value="<?php echo $sadmission;?>">
	             <input type="hidden" id="cboQuarter" name="cboQuarter" value="Q2">
	             <input type ="hidden" id="InstallmentWithoutLateFee" name="InstallmentWithoutLateFee" value="<?php echo $FeeSecondInstallAmt;?>">
	             <input type ="hidden" id="LateFee" name="LateFee" value="<?php echo $LateFeeQ2;?>">
	             <input type="hidden" id="InstallmentAmount" name="InstallmentAmount" value="<?php echo $SecondInstallAmtPayable;?>">
	             <input type="Submit" value="Pay <?php echo $SecondInstallAmtPayable;?>" id="btn2" onkeypress="javascript:this.disabled=true;"/>
			</form>
			<?php
			}
			else
			{
				//echo "$ReceiptNoQ2";
				echo "<a href='ShowRegularFeeReceipt.php?receiptno=".$FeeSecondInstallRceipt."' target='_blank'>".$FeeSecondInstallRceipt."</a>";
			}
			?>
			</td>
			<td height="32" class="style10">
			<?php
			if(($Master=='11COM')||($Master=='11ART')||($Master=='11NMED')||($Master=='11MED'))
      			echo "17-Aug-2016";
      		else
      			echo "22-Jul-2016";
			?>
			
			</td>
		</tr>
		<tr>
			<td height="32" class="style10">
			3</td>
			<td height="32" class="style11">
						FEES THIRD INSTALLMENT</td>
			<td height="32" class="style10">
			<?php
			if($FeeThirdInstallRceipt !="")
			{
				//echo $AmountToBePaid;
				echo $FeeThirdInstallRceipt;
			}
			else
			{
				echo $FeeThirdInstallAmt;
			}
			?>
			</td>
			<td height="32" class="style10">
			<?php echo $LateFeeQ3;?></td>
			<td height="32" class="style10">
			Q3</td>
			<td height="32" class="style10">
			<?php
			if($FeeThirdInstallRceipt =="")
			{
				//echo "Pay $AmountToBePaid";
			?>
			<form align="center" method="post" action="FeesSubmitUser.php" target="_blank" onsubmit="javascript:document.getElementById('btn3').disabled=true;">
	             <input type="hidden" id="txtAdmissionNo" name="txtAdmissionNo" value="<?php echo $sadmission;?>">
	             <input type="hidden" id="cboQuarter" name="cboQuarter" value="Q3">
	             <input type ="hidden" id="InstallmentWithoutLateFee" name="InstallmentWithoutLateFee" value="<?php echo $FeeThirdInstallAmt;?>">
	             <input type ="hidden" id="LateFee" name="LateFee" value="<?php echo $LateFeeQ3;?>">
	             <input type="hidden" id="InstallmentAmount" name="InstallmentAmount" value="<?php echo $ThirdInstallAmtPayable;?>">
	             <input type="Submit" value="Pay <?php echo $ThirdInstallAmtPayable;?>" id="btn3" />
			</form>
			<?php
			}
			else
			{
				//echo "$ReceiptNoQ3";
				echo "<a href='ShowRegularFeeReceipt.php?receiptno=".$FeeThirdInstallRceipt."' target='_blank'>".$FeeThirdInstallRceipt."</a>";
			}
			?>
			</td>
			<td height="32" class="style10">
			10-Oct-2016</td>
		</tr>
		<tr>
			<td height="32" class="style10">
			4</td>
			<td height="32" class="style11">
						FEES FOURTH INSTALLMENT</td>
			<td height="32" class="style10">
			<?php
			if($FeeFourthInstallRceipt !="")
			{
				//echo $AmountToBePaid;
				echo $FeeFourthInstallRceipt;
			}
			else
			{
				echo $FeeFourthInstallAmt;
			}
			?>
			</td>
			<td height="32" class="style10">
			<?php echo $LateFeeQ4;?></td>
			<td height="32" class="style10">
			Q4</td>
			<td height="32" class="style10">
			<?php
			if($FeeFourthInstallRceipt =="")
			{
				//echo "Pay $AmountToBePaid";
			?>
			<form align="center" method="post" action="FeesSubmitUser.php" target="_blank" onsubmit="javascript:document.getElementById('btn4').disabled=true;">
	             <input type="hidden" id="txtAdmissionNo" name="txtAdmissionNo" value="<?php echo $sadmission;?>">
	             <input type="hidden" id="cboQuarter" name="cboQuarter" value="Q4">
	             <input type ="hidden" id="InstallmentWithoutLateFee" name="InstallmentWithoutLateFee" value="<?php echo $FeeFourthInstallAmt;?>">
	             <input type ="hidden" id="LateFee" name="LateFee" value="<?php echo $LateFeeQ4;?>">
	             <input type="hidden" id="InstallmentAmount" name="InstallmentAmount" value="<?php echo $FourthInstallAmtPayable;?>">
	             <input type="Submit" value="Pay <?php echo $FourthInstallAmtPayable;?>" id="btn4" onkeypress="javascript:this.disabled=true;"/>
			</form>
			<?php
			}
			else
			{
				//echo "$ReceiptNoQ4";
				echo "<a href='ShowRegularFeeReceipt.php?receiptno=".$FeeFourthInstallRceipt."' target='_blank'>".$FeeFourthInstallRceipt."</a>";
			}
			?>
			</td>
			<td height="32" class="style10">
			10-Jan-2017</td>
		</tr>
		
	</table>
	<?php
	$FeeFirstInstallRceipt="";
	if($StudentHostel=="Yes")
	{

				$rsFeeHead=mysql_query("select distinct `feeshead`,sum(`amount`) from `fees_student_hostel` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `FeesType`='Hostel' group by `feeshead`");
				
				//$rsOpeningBalance=mysql_query("select `amount` from `fees_student_hostel` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead`='HOSTEL AMOUNT CREDIT'");
				$rsAdvanceAmt=mysql_query("select sum(`amount`) from `fees_student_hostel` where `sadmission`='$sadmission' and `feeshead`='Advances'");
				$rsAlreadyReceived=mysql_query("select sum(`amount`) from `fees_student_hostel` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL FIRST INSTALLMENT','HOSTEL SECOND INSTALLMENT','HOSTEL THIRD INSTALLMENT','HOSTEL FOURTH INSTALLMENT')");
				$rsCloseAmtCredit=mysql_query("select sum(`amount`) from `fees_student_hostel` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL AMOUNT CREDIT')");
				$rsCloseAmtDebit=mysql_query("select sum(`amount`) from `fees_student_hostel` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL AMOUNT DEBIT')");

				
				
				$rsFeeFirstInstall=mysql_query("select `amount`,(select `receipt` from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' limit 1) from `fees_student_hostel` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL FIRST INSTALLMENT')");
				$rsFeeSecondInstall=mysql_query("select `amount`,(select `receipt` from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' limit 1) from `fees_student_hostel` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL SECOND INSTALLMENT')");
				$rsFeeThirdInstall=mysql_query("select `amount`,(select `receipt` from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' limit 1) from `fees_student_hostel` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL THIRD INSTALLMENT')");
				$rsFeeFourthInstall=mysql_query("select `amount`,(select `receipt` from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` !='Bounce' limit 1) from `fees_student_hostel` as `a` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead` IN ('HOSTEL FOURTH INSTALLMENT')");
				$TotalAmount=0;
				$LateFeeQ1=0;
				$LateFeeQ2=0;
				$LateFeeQ3=0;
				$LateFeeQ4=0;
				while($rowF=mysql_fetch_row($rsFeeHead))
				{
					$FeeHead=$rowF[0];
					$FeeHeadAmount=$rowF[1];
					$TotalAmount=$TotalAmount+$FeeHeadAmount;
				}
				$GrandTotal=$TotalAmount;
				
				$rowAdvance=mysql_fetch_row($rsAdvanceAmt);
				$FeeAmtAdvance=$rowAdvance[0];
				
				$rowAlreadyReceived=mysql_fetch_row($rsAlreadyReceived);
				$AlreadyReceivedAmount=$rowAlreadyReceived[0];
				
				$rowCloseAmtCredit=mysql_fetch_row($rsCloseAmtCredit);
				$CloseAmtCredit=$rowCloseAmtCredit[0];
				$rowCloseAmtDebit=mysql_fetch_row($rsCloseAmtDebit);
				$CloseAmtDebit=$rowCloseAmtDebit[0];
				
				$BalancePayable=$GrandTotal-$FeeAmtAdvance-$AlreadyReceivedAmount-$CloseAmtCredit+$CloseAmtDebit;
				
			$rowFeeFirstInstall=mysql_fetch_row($rsFeeFirstInstall);
			$FeeFirstInstallAmt=$rowFeeFirstInstall[0];
			$FeeFirstInstallRceipt=$rowFeeFirstInstall[1];
			
						
			$rsFirstInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='HOSTEL FIRST INSTALLMENT' and `StudentType`='$StudentType'");
			$rowFirstInstallment=mysql_fetch_row($rsFirstInstallment);
			$FirstInstallmentAmt=$rowFirstInstallment[0];
			
			if($FeeFirstInstallRceipt =="")
			{
				if($BalancePayable>0)
				{
					if($BalancePayable-$FirstInstallmentAmt>=0)
						$FeeFirstInstallAmt=$FirstInstallmentAmt;
					else
						$FeeFirstInstallAmt=$BalancePayable;
					
					$BalancePayable=$BalancePayable-$FeeFirstInstallAmt;
					if($FeeFirstInstallAmt>0)
							$LateFeeQ1=fnlLateFee("Q1",$Master);
				}	
			}
			$FirstInstallAmtPayable=$FeeFirstInstallAmt+$LateFeeQ1;
			
			$rowFeeSecondInstall=mysql_fetch_row($rsFeeSecondInstall);
			$FeeSecondInstallAmt=$rowFeeSecondInstall[0];
			$FeeSecondInstallRceipt=$rowFeeSecondInstall[1];
			
			$rsSecondInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='HOSTEL SECOND INSTALLMENT' and `StudentType`='$StudentType'");
			$rowSecondInstallment=mysql_fetch_row($rsSecondInstallment);
			$SecondInstallmentAmt=$rowSecondInstallment[0];
			if($FeeSecondInstallRceipt=="")
			{
				if($BalancePayable>0)
				{
					if($BalancePayable-$SecondInstallmentAmt>=0)
						$FeeSecondInstallAmt=$SecondInstallmentAmt;
					else
						$FeeSecondInstallAmt=$BalancePayable;
					
					$BalancePayable=$BalancePayable-$FeeSecondInstallAmt;
					if($FeeSecondInstallAmt>0)
							$LateFeeQ2=fnlLateFee("Q2",$Master);
				}	
			}
			$SecondInstallAmtPayable=$FeeSecondInstallAmt+$LateFeeQ2;
			
			
			$rowFeeThirdInstall=mysql_fetch_row($rsFeeThirdInstall);
			$FeeThirdInstallAmt=$rowFeeThirdInstall[0];
			$FeeThirdInstallRceipt=$rowFeeThirdInstall[1];
			$rsThirdInstallment=mysql_query("select `Amount` from `fees_installment_master` where `FinancialYear`='$CurrentFinancialYear' and `Installment`='HOSTEL THIRD INSTALLMENT' and `StudentType`='$StudentType'");
			$rowThirdInstallment=mysql_fetch_row($rsThirdInstallment);
			$ThirdInstallmentAmt=$rowThirdInstallment[0];
			if($FeeThirdInstallRceipt=="")
			{
				if($BalancePayable>0)
				{
					if($BalancePayable-$ThirdInstallmentAmt>=0)
						$FeeThirdInstallAmt=$ThirdInstallmentAmt;
					else
						$FeeThirdInstallAmt=$BalancePayable;
					
					$BalancePayable=$BalancePayable-$FeeThirdInstallAmt;
					if($FeeThirdInstallAmt>0)
							$LateFeeQ3=fnlLateFee("Q3",$Master);
				}	
			}
			$ThirdInstallAmtPayable=$FeeThirdInstallAmt+$LateFeeQ3;
			
			$rowFeeFourthInstall=mysql_fetch_row($rsFeeFourthInstall);
			$FeeTFourthInstallAmt=$rowFeeFourthInstall[0];
			$FeeFourthInstallRceipt=$rowFeeFourthInstall[1];
			if($FeeFourthInstallRceipt=="")
			{
				if($BalancePayable>0)
				{
					$FeeTFourthInstallAmt=$BalancePayable;
					$BalancePayable=$BalancePayable-$FeeTFourthInstallAmt;
				}	
				if($FeeFourthInstallAmt>0)
						$LateFeeQ4=fnlLateFee("Q4",$Master);	
			}
			$FourthInstallAmtPayable=$FeeTFourthInstallAmt+$LateFeeQ4;
			
			//Bounce History******
			$Q1Bounce="";
			$Q2Bounce="";
			$Q3Bounce="";
			$Q4Bounce="";
			$rsQ1Bounce=mysql_query("select * from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q1' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` ='Bounce'");
			$rsQ2Bounce=mysql_query("select * from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q2' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` ='Bounce'");
			$rsQ3Bounce=mysql_query("select * from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q3' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` ='Bounce'");
			$rsQ4Bounce=mysql_query("select * from `fees_hostel` where `sadmission`='$sadmission' and `quarter`='Q4' and `FinancialYear`='$CurrentFinancialYear' and `cheque_status` ='Bounce'");
			if(mysql_num_rows($rsQ1Bounce)>0)
				$Q1Bounce="yes";
			if(mysql_num_rows($rsQ2Bounce)>0)
				$Q2Bounce="yes";
			if(mysql_num_rows($rsQ3Bounce)>0)
				$Q3Bounce="yes";
			if(mysql_num_rows($rsQ4Bounce)>0)
				$Q4Bounce="yes";
		
	
	
	?>
	<p>&nbsp;</p>
	<p><b><font face="Cambria" color=#009900>Hostel Fees Payment</font></b></p>
	<table border="1" width="100%" style="border-collapse: collapse">
		<tr>
			<td bgcolor="#006400" align="center">&nbsp;</td>
			<td bgcolor="#006400" align="center">&nbsp;</td>
			<td bgcolor="#006400" align="center"><!---<p align="center"><b><font face="Cambria" color="#FF0000"><button ><a href="StudentHostelForm.php" target=_blank class="style3">
			Click here to Fill Hostel Form</a></button>---></font></td>
			<td bgcolor="#006400" align="center">&nbsp;</td>
			<td bgcolor="#006400" align="center">&nbsp;</td>
			<td bgcolor="#006400" align="center">	<p align="center"><b><font face="Cambria" color="#FF0000"><button ><a href="Javascript:FeesHostelBill('<?php echo $sadmission?>','<?php echo $StudentClass;?>');" class="style3">
			Click here to View Hostel Fee Bill</a></button></font></td>
			<td bgcolor="#006400" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Sr No</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Fees Head</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Amount</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Late Fee</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Quarter</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Status</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Last Date</font></b></td>
		</tr>
		<tr>
			<td height="32" class="style10">1.</td>
			<td height="32" class="style11">HOSTEL FIRST INSTALLMENT</td>
			<td height="32" class="style10">
			<?php 
			if($FeeFirstInstallRceipt !="")
				echo $FeeFirstInstallRceipt;
			else
				echo $FeeFirstInstallAmt;
			?>
			</td>
			<td height="32" class="style10"><?php echo $LateFeeQ1;?></td>
			<td height="32" class="style10">Q1</td>
			<td height="32" class="style10">
			<?php
			if($FeeFirstInstallRceipt=="")
			{
				//echo "Pay $AmountToBePaid";
			?>
			<form align="center" method="post" action="FeesHostelSubmitUser.php" target="_blank" onsubmit="javascript:document.getElementById('btn1').disabled=true;">
	             <input type="hidden" id="txtAdmissionNo" name="txtAdmissionNo" value="<?php echo $sadmission;?>">
	             <input type="hidden" id="cboQuarter" name="cboQuarter" value="Q1">
	             <input type ="hidden" id="InstallmentWithoutLateFee" name="InstallmentWithoutLateFee" value="<?php echo $FeeFirstInstallAmt;?>">
	             <input type ="hidden" id="LateFee" name="LateFee" value="<?php echo $LateFeeQ1;?>">
	             <input type="hidden" id="InstallmentAmount" name="InstallmentAmount" value="<?php echo $FirstInstallAmtPayable;?>">
	             <input type="Submit" value="Pay <?php echo $FirstInstallAmtPayable;?>" id="hbtn1"/>
			</form>
			<?php
			}
			else
			{
				echo "Print $HostelReceiptNoQ1";
			}
			?>
			</td>
			<td height="32" class="style10">&nbsp;</td>
		</tr>
		<tr>
			<td height="32" class="style10">
			2</td>
			<td height="32" class="style11">
						HOSTEL SECOND INSTALLMENT</td>
			<td height="32" class="style10">
			<?php 
			if($FeeSecondInstallRceipt !="")
				echo $FeeSecondInstallRceipt;
			else
				echo $FeeSecondInstallAmt;
			?>
			
			
			</td>
			<td height="32" class="style10">
			<?php echo $LateFeeQ2;?>
			</td>
			<td height="32" class="style10">
			Q2</td>
			<td height="32" class="style10">
			<?php
			if($HostelReceiptNoQ2=="")
			{
				//echo "Pay $AmountToBePaid";
			?>
			<form align="center" method="post" action="FeesHostelSubmitUser.php" target="_blank" onsubmit="javascript:document.getElementById('btn2').disabled=true;">
	             <input type="hidden" id="txtAdmissionNo" name="txtAdmissionNo" value="<?php echo $sadmission;?>">
	             <input type="hidden" id="cboQuarter" name="cboQuarter" value="Q2">
	             <input type ="hidden" id="InstallmentWithoutLateFee" name="InstallmentWithoutLateFee" value="<?php echo $FeeSecondInstallAmt;?>">
	             <input type ="hidden" id="LateFee" name="LateFee" value="<?php echo $LateFeeQ2;?>">
	             <input type="hidden" id="InstallmentAmount" name="InstallmentAmount" value="<?php echo $SecondInstallAmtPayable;?>">
	             <input type="Submit" value="Pay <?php echo $SecondInstallAmtPayable;?>" id="hbtn2"/>
			</form>
			<?php
			}
			else
			{
				echo "Print $HostelReceiptNoQ2";
			}
			?>
			</td>
			<td height="32" class="style10">
			<?php
			if(($Master=='11COM')||($Master=='11ART')||($Master=='11NMED')||($Master=='11MED'))
      			echo "17-Aug-2016";
      		else
      			echo "22-Jul-2016";
			?>
			</td>
		</tr>
		<tr>
			<td height="32" class="style10">
			3</td>
			<td height="32" class="style11">
						HOSTEL THIRD INSTALLMENT</td>
			<td height="32" class="style10">
			<?php 
			if($FeeThirdInstallRceipt!="")
				echo $FeeThirdInstallRceipt;
			else
				echo $FeeThirdInstallAmt;
			?>
			</td>
			<td height="32" class="style10">
			<?php echo $LateFeeQ3;?></td>
			<td height="32" class="style10">
			Q3</td>
			<td height="32" class="style10">
			<?php
			if($HostelReceiptNoQ3=="")
			{
				//echo "Pay $AmountToBePaid";
			?>
			<form align="center" method="post" action="FeesHostelSubmitUser.php" target="_blank" onsubmit="javascript:document.getElementById('btn2').disabled=true;">
	             <input type="hidden" id="txtAdmissionNo" name="txtAdmissionNo" value="<?php echo $sadmission;?>">
	             <input type="hidden" id="cboQuarter" name="cboQuarter" value="Q3">
	             <input type ="hidden" id="InstallmentWithoutLateFee" name="InstallmentWithoutLateFee" value="<?php echo $FeeThirdInstallAmt;?>">
	             <input type ="hidden" id="LateFee" name="LateFee" value="<?php echo $LateFeeQ3;?>">
	             <input type="hidden" id="InstallmentAmount" name="InstallmentAmount" value="<?php echo $ThirdInstallAmtPayable;?>">
	             <input type="Submit" value="Pay <?php echo $ThirdInstallAmtPayable;?>" id="hbtn3"/>
			</form>
			<?php
			}
			else
			{
				echo "Print $HostelReceiptNoQ3";
			}
			?>
			</td>
			<td height="32" class="style10">
			14-Oct-2016</td>
		</tr>
		<tr>
			<td height="32" class="style10">
			4</td>
			<td height="32" class="style11">
						HOSTEL FOURTH INSTALLMENT</td>
			<td height="32" class="style10">
			
			<?php 
			if($FeeFourthInstallRceipt!="")
				echo $FeeFourthInstallRceipt;
			else
				echo $FeeTFourthInstallAmt;
			?>
			</td>
			<td height="32" class="style10">
			<?php echo $LateFeeQ4;?></td>
			<td height="32" class="style10">
			Q4</td>
			<td height="32" class="style10">
			<?php
			if($HostelReceiptNoQ4=="")
			{
				//echo "Pay $AmountToBePaid";
			?>
			<form align="center" method="post" action="FeesHostelSubmitUser.php" target="_blank" onsubmit="javascript:document.getElementById('btn2').disabled=true;">
	             <input type="hidden" id="txtAdmissionNo" name="txtAdmissionNo" value="<?php echo $sadmission;?>">
	             <input type="hidden" id="cboQuarter" name="cboQuarter" value="Q4">
	             <input type ="hidden" id="InstallmentWithoutLateFee" name="InstallmentWithoutLateFee" value="<?php echo $FeeTFourthInstallAmt;?>">
	             <input type ="hidden" id="LateFee" name="LateFee" value="<?php echo $LateFeeQ4;?>">
	             <input type="hidden" id="InstallmentAmount" name="InstallmentAmount" value="<?php echo $FourthInstallAmtPayable;?>">
	             <input type="Submit" value="Pay <?php echo $FourthInstallAmtPayable;?>" id="hbtn4"/>
			</form>
			<?php
			}
			else
			{
				echo "Print $HostelReceiptNoQ4";
			}
			?>
			</td>
			<td height="32" class="style10">
			13-Jan-2016</td>
		</tr>
	</table>
	<?php
	}//End of If Condition for Student Hostel is Yes
	?>
	<p>&nbsp;</p>
	<p><b><font face="Cambria" color=#009900>Miscellaneous Fees Payment</font></b></p>
	
	<table class="style9" width="100%">
	<tr>
			<td class="style8" style="width: 196px" align="center" bgcolor="#006400">
			<b><font color="#FFFFFF">Sr.No</font></b></td>
			<td class="style8" style="width: 196px" align="center" bgcolor="#006400">
			<b><font color="#FFFFFF">Head Name</font></b></td>
			<td class="style8" style="width: 196px" align="center" bgcolor="#006400">
			<b><font color="#FFFFFF">Amount</font></b></td>
			<td class="style8" style="width: 196px" align="center" bgcolor="#006400">
			<b><font color="#FFFFFF">Last Date</font></b></td>
			<td class="style8" style="width: 196px" align="center" bgcolor="#006400">
			<b><font color="#FFFFFF">Remarks</font></b></td>
			<td class="style8" style="width: 325px" align="center" bgcolor="#006400">
			<b><font color="#FFFFFF">Payment</font></b></td>
	</tr>
	<?php
	$rowcount=1;
	while($row=mysql_fetch_row($rs))
	{
		$HeaderSrNo=$row[0];
		$HeadName=$row[1];
		$HeadAmount=$row[2];
		$sclass=$row[3];
		$LastDate=$row[4];
		$Remarks=$row[5];
		$Status=$row[6];
		$AnnouncementId=$row[7];
		$rsChk=mysql_query("select * from `fees_misc_collection` where `sadmissionno`='$sadmission' and `HeadName`='$HeadName' and `AnnouncementID`='$AnnouncementId'");
		
	?>
	<tr>
			<td class="style8" style="width: 196px" align="center"><?php echo $rowcount;?>.</td>
			<td class="style8" style="width: 196px" align="center"><?php echo $HeadName;?></td>
			<td class="style8" style="width: 196px" align="center"><?php echo $HeadAmount;?></td>
			<td class="style8" style="width: 196px" align="center"><?php echo $LastDate;?></td>
			<td class="style8" style="width: 196px" align="center"><?php echo $Remarks;?></td>
			<td class="style8" style="width: 325px" align="center">
			<?php
			if (mysql_num_rows($rsChk) == 0)
			{
				if($Status=="1")
				{
			?>
			<form align="center" method="post" action="FeesSubmit.php" target="_blank">
	             <input type="hidden" id="hHeaderSrNo" name="hHeaderSrNo" value="<?php echo $HeaderSrNo;?>">
	             <input type="Submit" value="Pay <?php echo $HeadAmount;?>"/>
			</form>
			<?php
				}
			}
			else
			{
			?>
			<input type="button" name="btnPrintReceipt" id="btnPrintReceipt" value="Print Receipt" onclick="javascript:fnlShowReceipt('<?php echo $HeadName;?>','<?php echo $sadmission;?>');">
			<?php
			}
			?>
			</td>
	</tr>
	<?php
	$rowcount=$rowcount+1;
	}
	?>
	
	

	<!--<tr>
			<td class="style8" style="width: 196px" align="center">&nbsp;</td>
			<td class="style8" style="width: 196px" align="center">MISC EXAM 
			FEE(NSEJS, NSEP, NSEC,NSEB,NSEA,)</td>
			<td class="style8" style="width: 196px" align="center">As per the 
			Choices Filled</td>
			<td class="style8" style="width: 196px" align="center">26th Aug 
			2016</td>
			<td class="style8" style="width: 196px" align="center">Kindly make 
			the choice as per the circular</td>
			
			<td class="style8" style="width: 325px" align="center">
			<?php
			if($ExamPayment=='')
			{
			?>
			<p align="center"><b><font face="Cambria" color="#FF0000"><button ><a href="Javascript:ExamFees('<?php echo $sadmission?>','<?php echo $StudentClass;?>');" class="style3">
			Click here to fill choices</a></button>
			<?php
			}
			else
			{
			$ExamHeadName='Misc. Exam Fee';
			?>
			<input type="button" name="btnPrintReceipt" id="btnPrintReceipt" value="Print Receipt" onclick="javascript:fnlShowReceipt('<?php echo $ExamHeadName;?>','<?php echo $sadmission;?>');"></td>
	        <?php
	        }
	        ?>
	</tr>-->
	
	
	</table>
	
	<p>&nbsp;</p>
	<p><u><b><font face="Cambria">Notes and Instructions:</font></b></u></p>
	<p><font face="Cambria"><i><b>- Total Fees Amount displayed does not include 
	the late fees charges (If applicable)</b></i></font></p>
<p><b><i><font face="Cambria">- Total Fees Amount displayed does not include 
previous Balance / Advances (if applicable)</font></i></b></p>
<p><b><i><font face="Cambria">- Please read online payment guide for any 
clarification --&gt; <a href="DPS fees payment guide.pptx">Click here to download 
Online Payment Guide</a></font></i></b><p><b><i><font face="Cambria">- Please 
write to us at <a href="mailto:support@eduworldtech.com">
support@onlineschoolplanet.com</a> for any clarifications or kindly call at School 
Reception for further details</font></i></b></div>

		</td>
</tr>



</table>



<div class="wrapper col5">

  <div id="copyright" style="width: 100%; height: 58px">

    

    <p align="center">Powered By Online School Planet |   <a target="_blank" href="http://www.eduworldindia.com" title="Online School Planet">

	Education ERP Platform</a></p>

    <br class="clear" />

  </div>

</div>

</body>

</html>

