<?php
include '../../connection.php';
include '../../AppConf.php';
session_start();
ini_set('max_execution_time', 300);
$rsFy = mysql_query("select `year`,`financialyear` from `FYmaster` where `Status`='Active'", $Con);
while($row = mysql_fetch_row($rsFy))
{
	$CurrentFinancialYear=$row[0];
	$CurrentFinancialYr=$row[1];
	break;
}

$rsSchoolDetail=mysql_query("SELECT distinct `SchoolId` FROM  `SchoolConfig`");
while($rowS=mysql_fetch_row($rsSchoolDetail))
{
	$SchoolID=$rowS[0];
	break;
}
	
	$SelectClass=$_REQUEST["Class"];
	$sadmission=$_REQUEST["sadmission"];
	//$sadmission="10563";
	//$sql = "SELECT distinct `sadmission`,`sname`,`sclass`,`srollno`,`sfathername`,`DiscontType`,(SELECT `MasterClass` FROM `class_master` WHERE `class`=a.`sclass`) as `MasterClass`,`DiscontType`,`MotherName`,`Address`,`smobile`,`routeno` FROM `student_master` as `a` where `sclass`='$SelectClass' and `Hostel`='Yes' and `sadmission`='$sadmission' and `sadmission` not in (select distinct `sadmission` from `fees_challan_hostel`) and `sadmission` not in (select distinct `sadmission` from `student_master` where `DiscontType`='Staff Child' and `routecode`='')";
	$sql = "SELECT distinct `sadmission`,`sname`,`sclass`,`srollno`,`sfathername`,`DiscontType`,(SELECT `MasterClass` FROM `class_master` WHERE `class`=a.`sclass`) as `MasterClass`,`DiscontType`,`MotherName`,`Address`,`smobile`,`routeno` FROM `student_master` as `a` where `sclass`='$SelectClass' and `Hostel`='Yes' and `sadmission` not in (select distinct `sadmission` from `fees_challan_hostel`) and `sadmission` not in (select distinct `sadmission` from `student_master` where `DiscontType`='Staff Child' and `routecode`='')";
   	
   	$rs = mysql_query($sql, $Con);
   	$currentdate=date("Y-m-d");
   	//$currentdate1=date("d-m-Y");
   	$currentdate1="08-07-2015";
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>FeeNoticeForTheYear</title>
<style type="text/css">
.style1 {
	border-collapse: collapse;
}
</style>
</head>

<body>
<?php
while($row1 = mysql_fetch_row($rs))
{
	$sadmission=$row1[0];
	$sname=$row1[1];
	$sclass=$row1[2];
	$srollno=$row1[3];
	$sfathername=$row1[4];
	$DiscontType=$row1[5];
	//$Caste=$row1[6];
	$MasterClass=$row1[6];
			
			$SchoolNM=$SchoolName ;
			$SchoolAC=$Account1;
				
	$StudentDiscountType=$row1[7];
	$MotherName=$row1[8];
	$Address=$row1[9];
	$Mobile=$row1[10];
	$RouteNo=$row1[11];
	$FinancialYear=$row1[12];
	$TotalAmountPaid=0;
	$ReceiptNoQ1="";
	$ReceiptNoQ2="";
	$ReceiptNoQ3="";
	$ReceiptNoQ4="";
		if($FinancialYear<$CurrentFinancialYear)
		{
			$StudentType="OldStudent";
			$QStudentType="old";
		}
		else
		{
			$StudentType="NewStudent";
			$QStudentType="new";
		}

		
		$rsFeeHeadAmt=mysql_query("SELECT distinct `feeshead`,sum(`amount`) FROM `fees_student` WHERE `sadmission`='$sadmission' and `FeesType` ='Hostel' and `FeesType` !='' and `feeshead` not in ('computerfees','Smart Class','Science Fees','Annual Charges') group by `feeshead`");
		$rsAnnual=mysql_query("SELECT distinct `feeshead`,sum(`amount`) FROM `fees_student` WHERE `sadmission`='$sadmission' and `FeesType` ='Hostel' and `FeesType` !='' and `feeshead` in ('computerfees','Smart Class','Science Fees','Annual Charges') group by `feeshead`");
		$AnnualCharges=0;
		while($rowAnnual=mysql_fetch_row($rsAnnual))
		{
			$AnnualCharges=$AnnualCharges+$rowAnnual[1];
		}
		
		//$rsYearlyTotalFee=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `FeesType` ='Hostel' and `feeshead`='Total Bill Amount'");
		$rsYearlyTotalFee=mysql_query("SELECT sum(`amount`) as `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `FeesType` ='Hostel'");
		$rsYearlyConcessionAmt=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `FeesType` ='Hostel' and `feeshead`='Total Concession Amount'");
		while($rowConcession=mysql_fetch_row($rsYearlyConcessionAmt))
		{
			$TotalConcessionAmt=$rowConcession[0];
		}
		
		$rsAdvanceAmt=mysql_query("select sum(`amount`) from `fees_student` where `sadmission`='$sadmission' and `FeesType` ='Hostel'  and `feeshead`='Advances'");
		while($rowAdvance=mysql_fetch_row($rsAdvanceAmt))
		{
			$FeeAmtPaid=$rowAdvance[0];
			break;
		}
		$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaid;

		
		while($rowTotalFee=mysql_fetch_row($rsYearlyTotalFee))
		{
			$YearlyTotalFeeAmount=$rowTotalFee[0];
			break;
		}
		
		$YearlyTotalFeeAmount=$YearlyTotalFeeAmount-$TotalConcessionAmt;

		$FeeAmtPaidQ1=0;
		$FeeAmtPaidQ2=0;
		$FeeAmtPaidQ3=0;
		$FeeAmtPaidQ4=0;
		$ActualReceivedAmtQ1=0;
		$ActualReceivedAmtQ2=0;
		$ActualReceivedAmtQ3=0;

		$rsCheckQ1=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `feeshead`='Hostel First Installment'");
			if (mysql_num_rows($rsCheckQ1) == 0)
			{
				//$rsFeePaidQ1=mysql_query("SELECT `amount` FROM `fees_master` WHERE `class`='$MasterClass' and `quarter`='Q1' and `StudentType`='$QStudentType' and `feeshead`='TUITION FEES'");
				if($FeeAmtPaid > 0)
				{
					$FeeAmtPaidQ1=0;
				}
				else
				{
					$rsFeePaidQ1=mysql_query("SELECT `amount` FROM `fees_master` WHERE `quarter`='Q1' and `feeshead`='hostelfees'");
					while($rowFPQ1=mysql_fetch_row($rsFeePaidQ1))
					{
						$FeeAmtPaidQ1=$rowFPQ1[0];
						if($FeeAmtPaidQ1>($YearlyTotalFeeAmount-$TotalAmountPaid))
						{
							$FeeAmtPaidQ1=$YearlyTotalFeeAmount-$TotalAmountPaid;						
						}
						$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ1;
						break;
					}
				}
				
			}
			else
			{
				while($rowFPQ1=mysql_fetch_row($rsCheckQ1))
				{
					$rsRcptNo=mysql_query("select `receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date` from `fees` where `sadmission`='$sadmission' and `quarter`='Q1' and `FeesType`='Hostel'");
					while($rowRcpt=mysql_fetch_row($rsRcptNo))
					{
						$ReceiptNoQ1=$rowRcpt[0];
						$ReceiptDateQ1=$rowRcpt[1];
						break;
					}
					
					//$ReceiptDateQ1=$rowFPQ1[1];
					$FeeAmtPaidQ1=$rowFPQ1[0];
					$ActualReceivedAmtQ1=$rowFPQ1[0];
					$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ1;
					
					break;
				}
			}
			
		
		//CHECK FEE SUBMISSION IN FEE TABLE FOR QUARTER Q2 IF FOUND THEN SHOW RECEIPT DETAIL OTHER WISE TO PAID AMOUNT WILL BE SHOWN//////////////////
		
			
			$rsCheckQ2=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `feeshead`='Hostel Second Installment'");
			if (mysql_num_rows($rsCheckQ2) == 0)
			{
				$rsFeePaidQ2=mysql_query("SELECT `amount` FROM `fees_master` WHERE `quarter`='Q2' and `feeshead`='hostelfees'");
				while($rowFPQ2=mysql_fetch_row($rsFeePaidQ2))
				{
					$FeeAmtPaidQ2=$rowFPQ2[0];
					if($FeeAmtPaidQ2>($YearlyTotalFeeAmount-$TotalAmountPaid))
					{
						$FeeAmtPaidQ2=$YearlyTotalFeeAmount-$TotalAmountPaid;																		
					}
					$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ2;
					
					break;
				}
			}
			else
			{
				while($rowFPQ2=mysql_fetch_row($rsCheckQ2))
				{
					$rsRcptNo=mysql_query("select `receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`  from `fees` where `sadmission`='$sadmission' and `quarter`='Q2' and `FeesType`='Hostel'");
					while($rowRcpt=mysql_fetch_row($rsRcptNo))
					{
						$ReceiptNoQ2=$rowRcpt[0];
						$ReceiptDateQ2=$rowRcpt[1];
						break;
					}
					//$ReceiptNoQ2=$rowFPQ2[0];
					//$ReceiptDateQ2=$rowFPQ2[1];
					$ActualReceivedAmtQ2=$rowFPQ2[0];
					$FeeAmtPaidQ2=$rowFPQ2[0];
					$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ2;
					break;
				}	
			}
		//CHECK FEE SUBMISSION IN FEE TABLE FOR QUARTER Q3 IF FOUND THEN SHOW RECEIPT DETAIL OTHER WISE TO PAID AMOUNT WILL BE SHOWN//////////////////
		
			$rsCheckQ3=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `feeshead`='Hostel Third Installment'");
			if (mysql_num_rows($rsCheckQ3) == 0)
			{
				$rsFeePaidQ3=mysql_query("SELECT `amount` FROM `fees_master` WHERE `quarter`='Q3' and `feeshead`='hostelfees'");
					
				while($rowFPQ3=mysql_fetch_row($rsFeePaidQ3))
				{
					$FeeAmtPaidQ3=$rowFPQ3[0];
					if($FeeAmtPaidQ3>($YearlyTotalFeeAmount-$TotalAmountPaid))
					{
						$FeeAmtPaidQ3=$YearlyTotalFeeAmount-$TotalAmountPaid;																		
					}
					$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ3;
					break;
				}
			}
			else
			{
				while($rowFPQ3=mysql_fetch_row($rsCheckQ3))
				{
					$rsRcptNo=mysql_query("select `receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date` from `fees` where `sadmission`='$sadmission' and `quarter`='Q3' and `FeesType`='Hostel'");
					while($rowRcpt=mysql_fetch_row($rsRcptNo))
					{
						$ReceiptNoQ3=$rowRcpt[0];
						$ReceiptDateQ3=$rowRcpt[1];
						break;
					}
					//$ReceiptNoQ3=$rowFPQ3[0];
					//$ReceiptDateQ3=$rowFPQ3[1];
					$ActualReceivedAmtQ3=$rowFPQ3[0];
					$FeeAmtPaidQ3=$rowFPQ3[0];
					$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ3;
					break;
				}	
			}
		
		//CHECK FEE SUBMISSION IN FEE TABLE FOR QUARTER Q4 IF FOUND THEN SHOW RECEIPT DETAIL OTHER WISE TO PAID AMOUNT WILL BE SHOWN//////////////////
		
		$rsTotalHostelAmt=mysql_query("SELECT sum(`amount`) FROM `fees_student` WHERE `sadmission`='$sadmission' and `FeesType`='Hostel'");
		while($rowFPQ4=mysql_fetch_row($rsTotalHostelAmt))
		{
			$ToalHostelAmtPayable=$rowFPQ4[0];
			break;
		}
		
			$rsCheckQ4=mysql_query("SELECT sum(`amount`) FROM `fees_student` WHERE `sadmission`='$sadmission' and `FeesType`='Hostel'");
				while($rowFPQ4=mysql_fetch_row($rsCheckQ4))
				{
					$YearlyTotalFee=$rowFPQ4[0];
					break;
				}
			$FeeAmtPaidQ4=($YearlyTotalFee-($FeeAmtPaidQ1+$FeeAmtPaidQ2+$FeeAmtPaidQ3+$FeeAmtPaid+$TotalConcessionAmt));	
			
			/*
			if($FeeAmtPaidQ1 < 0)
			{$FeeAmtPaidQ1="";}
			if($FeeAmtPaidQ2 < 0)
			{$FeeAmtPaidQ2="";}
			if($FeeAmtPaidQ3 < 0)
			{$FeeAmtPaidQ3="";}
			if($FeeAmtPaidQ4 < 0)
			{$FeeAmtPaidQ4="";}
			*/
			$ShowStaffChild="";
			if($DiscontType=="Staff Child")
			{
				$ShowStaffChild=" (".$DiscontType.")";
			}
	
?>
<?php
$strTable='<table width="100%" border=0 class="style1">
		<tr>
		<td align="center" colspan=4 style="border-style: solid; border-width: 1px">
		<div style="position: absolute; width: 70px; height: 70px; z-index: 1" id="layer1"><img src="logo.jpg" height="62px" width="70px"></div>
		<p align="center"><b><font face="Cambria" style="font-size: 11pt">'.$SchoolName.'<br>'.$SchoolAddress.'</font></b></p>
		<p align="center"><font face="Cambria" style="font-size: 10pt"><u><b>HOSTEL FEE BILL FOR THE YEAR (2015-16)</b></u></font></td>
		</tr>
		<tr>
		<td style="border-left-style: solid; border-left-width: 1px" align="center"><p align="left"><b><font face="Cambria" style="font-size: 10pt">ADMISSION NO.: '."F-".$sadmission.$ShowStaffChild.' </font></b> </td>
		<td align="center"><p align="left"><b><font face="Cambria" style="font-size: 10pt">NAME:&nbsp; '.$sname.'</font></b></td>
		<td align="left"><b><font face="Cambria" style="font-size: 10pt">CLASS: '.$sclass.'</font></b></td>
		<td style="border-right-style: solid; border-right-width: 1px" align="center"><p align="left"><b><font face="Cambria" style="font-size: 10pt">DATE: '.$currentdate1.'</font></b></td>
		</tr>
		<tr>
		<td style="border-style: solid; border-width: 1px" height="24" colspan="4">&nbsp;</td>
		</tr>
		<table style="width: 100%" cellspacing="0" cellpadding="0">';
		
		$GrandTotal=0;
		$strTable1='';
		$strTable1=$strTable1.'<tr>
		<td align="left" style="border-left-style: solid; border-left-width: 1px;border-bottom-style: solid;border-bottom-width: 1px;" width="585"><b><font face="Cambria" style="font-size: 10pt">DESCRIPTION</font></b></td>
		<td align="right" style="border-right-style: solid; border-right-width: 1px;border-bottom-style: solid;border-bottom-width: 1px;" width="1172" colspan="2"><b><font face="Cambria" style="font-size: 10pt"></font></b></td>
		
		<td align="right" style="border-right-style: solid; border-right-width: 1px;border-bottom-style: solid;border-bottom-width: 1px;" width="586"><b><font face="Cambria" style="font-size: 10pt">AMOUNT(RS)</font></b></td>
		</tr>';
		
		if($AnnualCharges>0)
		{
		$GrandTotal=$GrandTotal+$AnnualCharges;
		$strTable1=$strTable1.'<tr>		
		<td align="left" style="border-left-style: solid; border-left-width: 1px" width="585"><font face="Cambria" style="font-size: 9pt">ANNUAL CHARGES</font></td>
		<td align="right" style="border-right-style: solid; border-right-width: 1px" width="1172" colspan="2"><font face="Cambria" style="font-size: 9pt">'.$ActualFeeheadAmt.'</font></td>

		<td align="right" style="border-right-style: solid; border-right-width: 1px" width="586"><font face="Cambria" style="font-size: 9pt">'.$AnnualCharges.'</font></td>
		</tr>';
		}
		
		while($rowF=mysql_fetch_row($rsFeeHeadAmt))
		{
			$FeeHead=$rowF[0];
			//$ActualFeeheadAmt=$rowF[1];
			//$DiscountAmt=$rowF[2];
			$FeeHeadAmt=$rowF[1];
			$GrandTotal=$GrandTotal+$FeeHeadAmt;
		
	$strTable1=$strTable1.'<tr>
		
		<td align="left" style="border-left-style: solid; border-left-width: 1px" width="585"><font face="Cambria" style="font-size: 9pt">'.$FeeHead.'</font></td>
		<td align="right" style="border-right-style: solid; border-right-width: 1px" width="1172" colspan="2"><font face="Cambria" style="font-size: 9pt">'.$ActualFeeheadAmt.'</font></td>
		<td align="right" style="border-right-style: solid; border-right-width: 1px" width="586"><font face="Cambria" style="font-size: 9pt">'.$FeeHeadAmt.'</font></td>
		
		</tr>';
		}
		$strTable=$strTable.$strTable1;
	$strTable=$strTable.'<tr>
		<td align="left" style="border-left-style: solid; border-left-width: 1px;border-top-style: solid;border-top-width: 1px;" width="585"><b><font face="Cambria" style="font-size: 10pt">GRAND TOTAL</font></td>
		<td align="right" style="border-right-style: solid; border-right-width: 1px;border-top-style: solid;border-top-width: 1px;" colspan="3" width="1172px"><font face="Cambria" style="font-size: 10pt"><b>'.$GrandTotal.'</b></font></td>
		</tr>
		<tr>
		<td align="left" style="border-left-style: solid; border-left-width: 1px" width="585"><b><font face="Cambria" style="font-size: 10pt">LESS: OPENING BALANCE</font></td>
		<td align="right" style="border-right-style: solid; border-right-width: 1px" colspan="3" width="1172px" width="586"><font face="Cambria" style="font-size: 10pt"><b>'.$FeeAmtPaid.'</b></font></td>
		</tr>
		<tr>
		<td align="left" style="border-left-style: solid; border-left-width: 1px" width="585"><b><font face="Cambria" style="font-size: 10pt">LESS: ALREADY RECEIVED</font></td>
		<td align="right" style="border-right-style: solid; border-right-width: 1px" colspan="3" width="1172px"><font face="Cambria" style="font-size: 10pt"><b>'.($ActualReceivedAmtQ1+$ActualReceivedAmtQ2+$ActualReceivedAmtQ3).'</b></font></td>
		</tr>';
		if($TotalConcessionAmt>0)
		{
	$strTable=$strTable.'<tr>
		<td align="left" style="border-left-style: solid; border-left-width: 1px" width="585"><b><font face="Cambria" style="font-size: 10pt">TOTAL CONCESSION (INCLUDING OTHER CONCESSIONS</font></td>
		<td align="right" style="border-right-style: solid; border-right-width: 1px" colspan="3" width="1172px"><font face="Cambria" style="font-size: 10pt"><b>'.$TotalConcessionAmt.'</b></font></td>
		</tr>';
		}
		
	$strTable=$strTable.'<tr>
		<td align="left" style="border-left-style: solid; border-left-width: 1px;border-bottom-style: solid;border-bottom-width: 1px;" width="585"><b><font face="Cambria" style="font-size: 10pt">(BALANCE PAYABLE)</font></td>
		<td align="right" style="border-right-style: solid; border-right-width: 1px;border-bottom-style: solid;border-bottom-width: 1px;" colspan="3" width="1172px" width="586"><font face="Cambria" style="font-size: 10pt"><b>'.($GrandTotal-$TotalConcessionAmt-$FeeAmtPaid-($ActualReceivedAmtQ1+$ActualReceivedAmtQ2+$ActualReceivedAmtQ3)).'</b></font></td>
		</tr>
		</table>
		<table width=100% border=0 style="border-collapse: collapse">
		<tr>
		<td><font face="Cambria" style="font-size: 9pt">The amount payable is divided into 4 installments which will be received as per schedule below .The DD/Cheque/Pay order shall be drawn in favour of DELHI PUBLIC 
		SCHOOL (HOSTEL), Faridabad. Admission no., class,mobile no and name of the student shall be written on the  reverse of each DD/Cheque/Pay order. Please return Pay-in-slip (printed below) along with the DD/Cheque/Pay order for all installments. No further reminder for the last installments 
		will be issued, Please pay installments as specified</font></td>
		</tr>
		</table>
		<table width=100% style="border-collapse: collapse" border="1">
		<tr>
		<td></td>
		<td align="center"><b><font face="Cambria" style="font-size: 9pt">Receipt Details With Date
		</font> </td>
		<td align=right><b><font face="Cambria" style="font-size: 10pt">AMOUNTS (Rs)</font></td>
		</tr>
		<tr>
		<td><font face="Cambria" style="font-size: 10pt">Ist Inst:</font></td>
		<td align="center"><font face="Cambria" style="font-size: 10pt">';
		if($ReceiptNoQ1 !="") 
		{ 
			//echo $ReceiptNoQ1." (".$ReceiptDateQ1.")";
			$strTable=$strTable.$ReceiptNoQ1." (".$ReceiptDateQ1.")";
		} 
		else 
		{
			//echo "April 13 2015 To April 22 2015";
			$strTable=$strTable.'April 13 2015 To April 22 2015';
		}
	$strTable=$strTable.'</font></td>
		<td align=right><font face="Cambria" style="font-size: 10pt">'.$FeeAmtPaidQ1.'</font></td>
		</tr>
		<tr>
		<td><font face="Cambria" style="font-size: 10pt">IInd Inst:</font></td>
		<td align="center"><font face="Cambria" style="font-size: 10pt">';
		if($ReceiptNoQ2!="") 
		{ 
			$strTable=$strTable.$ReceiptNoQ2." (".$ReceiptDateQ2.")";
		} 
		else 
		{
		$strTable=$strTable.'July 13 2015 To July 22 2015'; 
		} 
	$strTable=$strTable.'</font></td>
		<td align=right><font face="Cambria" style="font-size: 10pt">'.$FeeAmtPaidQ2.'</font></td>
		</tr>
		<tr>
		<td><font face="Cambria" style="font-size: 10pt">IIIrd Inst:</font></td>
		<td align="center"><font face="Cambria" style="font-size: 10pt">';
		if($ReceiptNoQ3!="") 
		{ 
			$strTable=$strTable.$ReceiptNoQ3." (".$ReceiptDateQ3.")";
		} 
		else 
		{
			$strTable=$strTable.'October 05 2015 to October 14 2015';
		} 
	$strTable=$strTable.'</font></td>
		<td align=right><font face="Cambria" style="font-size: 10pt">'.$FeeAmtPaidQ3.'</font></td>
		</tr>
		<tr>
		<td><font face="Cambria" style="font-size: 10pt">IVth Inst:</font></td>
		<td align="center"><font face="Cambria" style="font-size: 10pt">January 04 2016 To January 13 2016</font></td>
		<td align=right><font face="Cambria" style="font-size: 10pt">'.$FeeAmtPaidQ4.'</font></td>
		</tr>
		</table>
		<table width=100% >
		<tr>
		<td><font face="Cambria" style="font-size: 9pt">Fee after last due date will be accepted with late fees of Rs.100 for 10 working days after this Rs.500 will be charged for another 10 working days, after 
		which student name will be struck off from the school rolls.For all future correspondence please quote Admission No. <b>'."F-".$sadmission.'.</b> Please preserve all the receipts, circulars and correspondence for any future 
		references. No DD/CHEQUE/PAY order will be accepted without the Pay-in-slip. <b>No cash will be accepted.</b>
		</font>
		</td>
		<table width=100%>
		<tr>
		<td align="left"><b><font face="Cambria" style="font-size: 9pt">Duplicate bill will not be issued</font></td>
		<td align="right"><b><font face="Cambria" style="font-size: 10pt">ACCOUNTANT/CASHIER/CLASS TEACHER</font></td>
		</tr>
		</table>
		<p align="center"><font face="Cambria" style="font-size: 10pt">........................CUT FROM HERE AND RETURN WITH DD/CHEQUE/PAY ORDER........................</font></p>
		<table width=100%>
		<tr>
		<td colspan=3 align=left>
		<p align="center"><b><font face="Cambria" style="font-size: 9pt">Pay-In-Slip (Quarter 
		- Q4)</font></b></td>
		</tr>
		<tr>
		<td><font face="Cambria" style="font-size: 9pt">ADMISSION No.:'."F-".$sadmission.'</font></td>
		<td><font face="Cambria" style="font-size: 9pt">NAME : '.$sname.'</font></td>
		<td><font face="Cambria" style="font-size: 9pt">CLASS : '.$sclass.'</font></td>
		</tr>
		<tr>
		<td><font face="Cambria" style="font-size: 9pt">Date of Receipt: January 04 2016</font></td>
		<td><font face="Cambria" style="font-size: 9pt">To January 13 2016</font></td>
		<td><font face="Cambria" style="font-size: 9pt">AMOUNT:  '.$FeeAmtPaidQ4.'</font></td>
		</tr>
		<tr>
		<td colspan=3 align=right><font face="Cambria" style="font-size: 9pt">SIGNATURE OF FATHER/GUARDIAN</font></td>
		</tr>
		</table>
		<p align="center"><font face="Cambria" style="font-size: 10pt">........................CUT FROM HERE AND RETURN WITH DD/CHEQUE/PAY ORDER........................</font></p>
		<table width=100%>
		<tr>
		<td colspan=3 align=left>
		<p align="center"><b><font face="Cambria" style="font-size: 9pt">Pay-In-Slip (Quarter 
		- Q3)</font></b></td>
		</tr>
		<tr>
		<td><font face="Cambria" style="font-size: 9pt">ADMISSION No.:'."F-".$sadmission.'</font></td>
		<td><font face="Cambria" style="font-size: 9pt">NAME : '.$sname.'</font></td>
		<td><font face="Cambria" style="font-size: 9pt">CLASS : '.$sclass.'</font></td>
		</tr>
		<tr>
		<td><font face="Cambria" style="font-size: 9pt">Date of Receipt: October 05 2015</font></td>
		<td><font face="Cambria" style="font-size: 9pt">To October 14 2015</font></td>
		<td><font face="Cambria" style="font-size: 9pt">AMOUNT:  '.$FeeAmtPaidQ3.'</font></td>
		</tr>
		<tr>
		<td colspan=3 align=right><font face="Cambria" style="font-size: 10pt">SIGNATURE OF FATHER/GUARDIAN</font></td>
		</tr>
		</table>
		<table width=100%>
		<tr>
		<td>
		<p align="center"><font face="Cambria" style="font-size: 10pt">........................CUT FROM HERE AND RETURN WITH DD/CHEQUE/PAY ORDER........................</font></p>
		</td>
		</tr>
		</table>		
		<table width=100%>
		<tr>
		<td colspan=3 align=left>
		<p align="center"><b><font face="Cambria" style="font-size: 9pt">Pay-In-Slip (Quarter 
		- Q2)</font></b></td>
		</tr>
		<tr>
		<td><font face="Cambria" style="font-size: 9pt">ADMISSION No.: '."F-".$sadmission.'</font></td>
		<td><font face="Cambria" style="font-size: 9pt">NAME : '.$sname.'</font></td>
		<td><font face="Cambria" style="font-size: 9pt">CLASS : '.$sclass.'</font></td>
		</tr>
		<tr>
		<td><font face="Cambria" style="font-size: 9pt">Date of Receipt: July 13 2015</font></td>
		<td><font face="Cambria" style="font-size: 9pt">To July 22 2015</font></td>
		<td><font face="Cambria" style="font-size: 9pt">AMOUNT:  '.$FeeAmtPaidQ2.'</font></td>
		</tr>
		<tr>
		<td colspan=3 align=right><font face="Cambria" style="font-size: 9pt">SIGNATURE OF FATHER/GUARDIAN</font></td>
		</tr>
		</table>
		</tr>
		</table>
		</table><p style="page-break-before: always">';
		echo $strTable;
		$ssql="INSERT INTO `fees_challan_hostel` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`financialyear`,`challandate`,`challanhtmlcode`,`EntryDate`) VALUES ('$sadmission','$sname','$sclass','$srollno','sfathername','$CurrentFinancialYear','$currentdate','$strTable','$currentdate')";
		mysql_query($ssql) or die(mysql_error());
	
}//END OF LOOP FOR STUDENT MASTER
?>		
</body>

</html>