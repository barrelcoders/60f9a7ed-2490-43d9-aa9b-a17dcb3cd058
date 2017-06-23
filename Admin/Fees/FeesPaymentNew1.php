<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);

$ssqlFY="SELECT distinct `year`,`financialyear` FROM `FYmaster`";
$rsFY= mysql_query($ssqlFY);

$ssqlCFY="SELECT distinct `year`,`financialyear` FROM `FYmaster` where `Status`='Active'";
$rsCFY= mysql_query($ssqlCFY);

	while($row = mysql_fetch_row($rsCFY))
	{
		$CurrentFinancialYear = $row[0];
		$CurrentFinancialYearName=$row[1];					
	}

$ssql="select distinct `bank_name` from `bank_master` where status='1'";
$rsBank	= mysql_query($ssql);

if ($_REQUEST["txtAdmissionNo"] != "")
{

		$AdmissionNo=$_REQUEST["txtAdmissionNo"];
		$sqlStudentDetail = "SELECT `sname` , `sclass` , `srollno`,`FinancialYear`,`previous_sclass`,`Hostel`,`DiscontType` FROM `student_master` where  `sadmission`='$AdmissionNo'";
		
		
		$rs = mysql_query($sqlStudentDetail);
		if (mysql_num_rows($rs) > 0)
		{
			while($row = mysql_fetch_row($rs))
					{
						$sname=$row[0];
						$class=$row[1];					
						$RollNo=$row[2];
						$FinancialYear=$row[3];
						$previous_sclass=$row[4];
						$Hostel=$row[5];
						$StudentDiscountType=$row[6];
					}
			if ($FinancialYear == "")
			{$FinancialYear="2014";}
		}
		else
		{
		
			$sqlStudentDtl = "SELECT `sname` , `sclass` , `srollno`,`FinancialYear` FROM `NewStudentAdmission` where  `sadmission`='$AdmissionNo'";
			$rs1 = mysql_query($sqlStudentDtl);
			if (mysql_num_rows($rs1) > 0)
			{
				while($row = mysql_fetch_row($rs1))
						{
							$sname=$row[0];
							$class=$row[1];					
							$RollNo=$row[2];
							$FinancialYear=$row[3];					
						}	
			}
		}
		
	$ssqlClass="SELECT distinct `MasterClass` FROM `class_master` where `class`='$class'";
	
	$rsMClass= mysql_query($ssqlClass);
	while($rowM=mysql_fetch_row($rsMClass))
	{
		$MasterClass=$rowM[0];
		break;
	}

///Fee Challan Logic

	$sql = "SELECT distinct `sadmission`,`sname`,`sclass`,`srollno`,`sfathername`,`DiscontType`,(SELECT distinct `MasterClass` FROM `class_master` WHERE `class`=a.`sclass`) as `MasterClass`,`DiscontType`,`MotherName`,`Address`,`smobile`,`routeno` FROM `student_master` as `a` where `sadmission`='$AdmissionNo'"; 
 
   	$rs = mysql_query($sql, $Con);
   	$currentdate=date("Y-m-d");
   	//$currentdate1=date("d-m-Y");
   	$currentdate1="08-07-2015";
while($row1 = mysql_fetch_row($rs))
{
	$sadmission=$row1[0];
	$sname=$row1[1];
	$sclass=$row1[2];
	$displaysclass=str_replace("PREP","PREP-",str_replace("NURSERY","NURSERY-",$sclass));
	
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
	
	$YearlyTotalFee=0;
	$FeeAmtPaidQ1=0;
	$FeeAmtPaidQ2=0;
	$FeeAmtPaidQ3=0;
	$ToalHostelAmtPayable=0;
	$AdvanceFeeAmtPaid=0;
	$TotalConcessionAmt=0;
	
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
		
		if($CurrentFinancialYear>$FinancialYear)
		{
			$FeeCheckFinancialYear=$CurrentFinancialYear+1;
		}
		else
		{
			$FeeCheckFinancialYear=$CurrentFinancialYear;
		}
		
		$rsFeeHeadAmt=mysql_query("SELECT distinct `feeshead`,sum(`amount`) FROM `fees_student_17March2016` WHERE `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `FeesType` !='Hostel' and `FeesType` !='' and `feeshead` not in ('COMPUTERFEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES') group by `feeshead`");
		$rsAnnual=mysql_query("SELECT distinct `feeshead`,sum(`amount`) FROM `fees_student_17March2016` WHERE `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `FeesType` !='Hostel' and `FeesType` !='' and `feeshead` in ('COMPUTERFEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES') group by `feeshead`");
		$AnnualCharges=0;
		while($rowAnnual=mysql_fetch_row($rsAnnual))
		{
			$AnnualCharges=$AnnualCharges+$rowAnnual[1];
		}
		
		$rsYearlyTotalFee=mysql_query("SELECT sum(`amount`) FROM `fees_student_17March2016` WHERE `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `FeesType` in ('Regular')");
		$rsYearlyTotalHostelFee=mysql_query("SELECT sum(`amount`) FROM `fees_student_17March2016`  WHERE `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `FeesType` ='Hostel'");
		$rsYearlyConcessionAmt=mysql_query("SELECT `amount` FROM `fees_student_17March2016` WHERE `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `FeesType` !='Hostel' and `feeshead`='Total Concession Amount'");
		while($rowConcession=mysql_fetch_row($rsYearlyConcessionAmt))
		{
			$TotalConcessionAmt=$rowConcession[0];
		}
		
		$YearlyTotalHostelAmount=0;
		while($rowTotalHostel=mysql_fetch_row($rsYearlyTotalHostelFee))
		{
			$YearlyTotalHostelAmount=$rowTotalHostel[0];
			break;
		}
		
		
		$rsAdvanceAmt=mysql_query("select sum(`amount`) from `fees_student_17March2016` where `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `feeshead`='Advances'");
		while($rowAdvance=mysql_fetch_row($rsAdvanceAmt))
		{
			$AdvanceFeeAmtPaid=$rowAdvance[0];
			break;
		}
		$TotalAmountPaid=$TotalAmountPaid+$AdvanceFeeAmtPaid;

		
		while($rowTotalFee=mysql_fetch_row($rsYearlyTotalFee))
		{
			$YearlyTotalFeeAmount=$rowTotalFee[0];
			break;
		}
		//$YearlyTotalFeeAmount=$YearlyTotalFeeAmount-$TotalConcessionAmt-$YearlyTotalHostelAmount;
		$YearlyTotalFeeAmount=$YearlyTotalFeeAmount-$TotalConcessionAmt;

		$FeeAmtPaidQ1=0;
		$FeeAmtPaidQ2=0;
		$FeeAmtPaidQ3=0;
		$FeeAmtPaidQ4=0;
		$ActualReceivedAmtQ1=0;
		$ActualReceivedAmtQ2=0;
		$ActualReceivedAmtQ3=0;

		$rsCheckQ1=mysql_query("SELECT `amount` FROM `fees_student_17March2016` WHERE `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `feeshead`='Fees First Installment'");
			if (mysql_num_rows($rsCheckQ1) == 0)
			{
				//$rsFeePaidQ1=mysql_query("SELECT `amount` FROM `fees_master` WHERE `class`='$MasterClass' and `quarter`='Q1' and `StudentType`='$QStudentType' and `feeshead`='TUITION FEES'");
				if($AdvanceFeeAmtPaid > 0)
				{
					$FeeAmtPaidQ1=0;
				}
				else
				{
					$rsFeePaidQ1=mysql_query("SELECT `amount` FROM `fees_master` WHERE `financialyear`='$FeeCheckFinancialYear' and `quarter`='Q1' and `feeshead`='TUITION FEES'");
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
					$rsRcptNo=mysql_query("select `receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date` from `fees` where `FinancialYear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `quarter`='Q1' and `FeesType`='Regular' and cheque_status !='Bounce'");
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
		
			$rsCheckQ2=mysql_query("SELECT `amount` FROM `fees_student_17March2016` WHERE `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `feeshead`='Fees Second Installment'");
			if (mysql_num_rows($rsCheckQ2) == 0)
			{
				$rsFeePaidQ2=mysql_query("SELECT `amount` FROM `fees_master` WHERE `financialyear`='$FeeCheckFinancialYear' and `quarter`='Q2' and `feeshead`='TUITION FEES'");
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
					$rsRcptNo=mysql_query("select `receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`  from `fees` where `FinancialYear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `quarter`='Q2' and `FeesType`='Regular' and cheque_status !='Bounce'");
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
		
			$rsCheckQ3=mysql_query("SELECT `amount` FROM `fees_student_17March2016` WHERE `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `feeshead`='Fees Third Installment'");
			if (mysql_num_rows($rsCheckQ3) == 0)
			{
				$rsFeePaidQ3=mysql_query("SELECT `amount` FROM `fees_master` WHERE `financialyear`='$FeeCheckFinancialYear' and `quarter`='Q3' and `feeshead`='TUITION FEES'");
					
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
					$rsRcptNo=mysql_query("select `receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,`AdjustedLateFee` from `fees` where `FinancialYear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `quarter`='Q3' and `FeesType`='Regular' and cheque_status !='Bounce'");
					while($rowRcpt=mysql_fetch_row($rsRcptNo))
					{
						$ReceiptNoQ3=$rowRcpt[0];
						$ReceiptDateQ3=$rowRcpt[1];
						$AdjustedLateFeeQ3=$rowRcpt[2];
						break;
					}
					$ActualReceivedAmtQ3=$rowFPQ3[0];
					//$FeeAmtPaidQ3=$rowFPQ3[0]-$AdjustedLateFeeQ3;
					$FeeAmtPaidQ3=$rowFPQ3[0];
					$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ3;
					break;
				}
			}
		
		//CHECK FEE SUBMISSION IN FEE TABLE FOR QUARTER Q4 IF FOUND THEN SHOW RECEIPT DETAIL OTHER WISE TO PAID AMOUNT WILL BE SHOWN//////////////////
		
		$rsTotalHostelAmt=mysql_query("SELECT sum(`amount`) FROM `fees_student_17March2016` WHERE `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `FeesType`='Hostel'");
		while($rowFPQ4=mysql_fetch_row($rsTotalHostelAmt))
		{
			$ToalHostelAmtPayable=$rowFPQ4[0];
			break;
		}
		
			$rsCheckQ4=mysql_query("SELECT sum(`amount`) FROM `fees_student_17March2016` WHERE `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `feeshead`='Total Bill Amount'");
				while($rowFPQ4=mysql_fetch_row($rsCheckQ4))
				{
					$YearlyTotalFee=$rowFPQ4[0];
					break;
				}
			
			$rsCheckQ4=mysql_query("SELECT `amount` FROM `fees_student_17March2016` WHERE `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$sadmission' and `feeshead`='FEES FOURTH INSTALLMENT'");
			if (mysql_num_rows($rsCheckQ4) > 0)
			{
					echo "<br><br><center><b>Fee Fourch Installment has been paid!";
					exit();
			}
			
			//echo "Yearly Total Fee:".$YearlyTotalFee."<br>Q1Amount:".$FeeAmtPaidQ1."<br>Q2Amount:".$FeeAmtPaidQ2."<br>Q3Amount:".$FeeAmtPaidQ3."<br>Total Hostel Amount:".$ToalHostelAmtPayable."<br>Advance Amount:".$AdvanceFeeAmtPaid."<br>Total Concession:".$TotalConcessionAmt;
			//echo "Yearly Total Fee:".$YearlyTotalFeeAmount."<br>Q1Paid:".$FeeAmtPaidQ1."<br>Q2Paid:".$FeeAmtPaidQ2."<br>Q3Paid:".$FeeAmtPaidQ3."<br>Advance:".$AdvanceFeeAmtPaid."<br>Concession:".$TotalConcessionAmt;
			//exit();			
			$FeeAmtPaidQ4=($YearlyTotalFeeAmount-($FeeAmtPaidQ1+$FeeAmtPaidQ2+$FeeAmtPaidQ3+$AdvanceFeeAmtPaid));	
			//echo $FeeAmtPaidQ4;
			//exit();
			
			$ShowStaffChild="";
			if($DiscontType=="Staff Child")
			{
				$ShowStaffChild=" (".$DiscontType.")";
			}
						
}///////END OF WHILE LOOP WHICH IS FOR FEE CHALLAN

$FeeSubmissionQuarter="Q1";
$AmountToBePaid=0;
$FeeHeadName="";
if($ReceiptNoQ1 =="")
{
	$FeeSubmissionQuarter="Q1";
	$AmountToBePaid=$FeeAmtPaidQ1;
	$FeeHeadName="FEES FIRST INSTALLMENT";
}
else
{
	if($ReceiptNoQ2 =="")
	{
		$FeeSubmissionQuarter="Q2";	
		$AmountToBePaid=$FeeAmtPaidQ2;
		$FeeHeadName="FEES SECOND INSTALLMENT";
	}
	else
	{
		if($ReceiptNoQ3 =="")
		{
			$FeeSubmissionQuarter="Q3";	
			$AmountToBePaid=$FeeAmtPaidQ3;
			$FeeHeadName="FEES THIRD INSTALLMENT";
		}
		else
		{
			$FeeSubmissionQuarter="Q4";	
			$AmountToBePaid=$FeeAmtPaidQ4;
			$FeeHeadName="FEES FOURTH INSTALLMENT";
		}		
	}		
}
/////////////////	

		
//---------------------Late Fee Calculation----------------------------------------------------------



	$now = time(); // Current Date time
	if ($FeeSubmissionQuarter=="Q1")
	{
		$FeeSubmissionYear=$CurrentFinancialYear;
		$Dt1 = $CurrentFinancialYear. "-Apr-" . "10";
		$Dt1 = date('Y-m-d', strtotime($Dt1));
	}
	elseif ($FeeSubmissionQuarter=="Q2")
	{
		$FeeSubmissionYear=$CurrentFinancialYear;
		$Dt1 = $CurrentFinancialYear. "-Jul-" . "22";
		$Dt1 = date('Y-m-d', strtotime($Dt1));
	}
	elseif ($FeeSubmissionQuarter=="Q3")
	{
		$FeeSubmissionYear=$CurrentFinancialYear;
		$Dt1 = $CurrentFinancialYear. "-Oct-" . "14";
		$Dt1 = date('Y-m-d', strtotime($Dt1));
	}
	elseif ($FeeSubmissionQuarter=="Q4")
	{
		$FeeSubmissionYear=$CurrentFinancialYear+1;
		$Dt1 = $FeeSubmissionYear. "-Jan-" . "13";
		$Dt1 = date('Y-m-d', strtotime($Dt1));
	}
	
	
	
	$your_date = strtotime($Dt1);
	$datediff = $now - $your_date;
	if ($datediff > 0)
		$LateDays = floor($datediff/(60*60*24));
	else
		$LateDays = 0;
	
	$LateFee = 0;
	if($LateDays > 0 && $LateDays <=10)
	{
		$LateFee = 100;
	}
	if($LateDays >10)
	{
		$LateFee = 500;
	}
	$TotalPayable=$AmountToBePaid+$LateFee;
	
//---------------------End of Late Fee Calculation-------------------------------------------------------	
	

//-------------------- Previous Payment history----------------------------------------------------------
	$ssql = "SELECT `quarter`,`fees_amount`,(`amountpaid`-`AdjustedLateFee`) as `amountpaid`,`BalanceAmt`,`chequeno`,`cheque_status`,`receipt`,date_format(`date`,'%d-%m-%Y') as `date`,`FinancialYear`,`AdjustedLateFee`,`cheque_bounce_amt` FROM `fees` where `FinancialYear`='$FeeCheckFinancialYear' and `sadmission`='$AdmissionNo' and `FeesType`='Regular' order by `quarter`,`FinancialYear` desc";
	$rsHistory = mysql_query($ssql);
				
}
?>

<script language="javascript">
function Validate(SubmitType)
{
	
	if (document.getElementById("txtTotal").value =="")
	{
		alert("Toatal payable amount is blank !");
		return;
	}
	if (document.getElementById("txtTotalAmtPaying").value=="")
	{
		alert("Total Fee paid is mandatory!");
		return;
	}
	
	if(document.getElementById("cboPaymentMode").value=="Cheque")
	{
		if(document.getElementById("txtChequeDate").value=="")
		{
			alert("Cheque date is mandatory!");
			return;
		}
		if(document.getElementById("txtChequeNo").value=="")
		{
			alert("Cheque No is mandatory!");
			return;
		}
		if(document.getElementById("cboBank").value=="Select One")
		{
			alert("Bank Name is mandatory!");
			return;
		}
	}
	
	document.getElementById("frmFees").action="FeesReceipt.php";
	
	
	
	if (SubmitType=="Preview")
	{
		document.getElementById("frmFees").target = "_blank";
		document.getElementById("SubmitType").value="Preview";	
	}
	if (SubmitType=="Final")
	{
		//alert("Okey");
		document.getElementById("frmFees").target = "_self";
		document.getElementById("SubmitType").value="Final";
	}
	
	/*
	if(parseInt(document.getElementById("txtTotalAmtPaying").value) > parseInt(document.getElementById("txtTotal").value))
	{
		alert("Paid amount can not be more then payable amount! Plase check");
		return;
	}
	*/
	
	document.getElementById("frmFees").submit();
	
}

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
	if (document.getElementById("cboFinancialYear").value == "Select One")
	{
		alert ("Plese select financial year!");
		document.getElementById("cboQuarter").value = "Select One";
		return;
	}
	//alert (document.getElementById("StudentAdmissionfinancialyear").value);
	//return;
	//document.getElementById("FeeSubmissionFinancialYear").value = document.getElementById("cboFinancialYear").vlaue;
	
	if (document.getElementById("cboQuarter").value =="Q1")
	{		
		if (document.getElementById("Q1Fee").value !="")
		{
			alert ("Fee for Quarter Q1 is already paid !");
			document.getElementById("cboQuarter").value="Select One";
			return;
		}
		//alert (document.getElementById("StudentAdmissionfinancialyear").value);
		//alert(document.getElementById("CurrentFinancialYear").value);
		//return;
		if (parseInt(document.getElementById("StudentAdmissionfinancialyear").value) <= parseInt(document.getElementById("CurrentFinancialYear").value))
		{
			//alert("Okey");
			document.getElementById("trAnnualFee").style.display = "";
		}
		
		
	}
	if (document.getElementById("cboQuarter").value =="Q2")
	{
		document.getElementById("txtAnnualFee").value="";
		document.getElementById("trAnnualFee").style.display = "none";
		
		if (document.getElementById("Q2Fee").value !="")
		{
			alert ("Fee for Quarter Q2 is already paid !");
			document.getElementById("cboQuarter").value="Select One";
			return;
		}
	}
	if (document.getElementById("cboQuarter").value =="Q3")
	{
		document.getElementById("txtAnnualFee").value="";
		document.getElementById("trAnnualFee").style.display = "none";
		
		if (document.getElementById("Q3Fee").value !="")
		{
			alert ("Fee for Quarter Q3 is already paid !");
			document.getElementById("cboQuarter").value="Select One";
			return;
		}
	}
	if (document.getElementById("cboQuarter").value =="Q4")
	{
		document.getElementById("txtAnnualFee").value="";
		document.getElementById("trAnnualFee").style.display = "none";
		
		if (document.getElementById("Q4Fee").value !="")
		{
			alert ("Fee for Quarter Q4 is already paid !");
			document.getElementById("cboQuarter").value="Select One";
			return;
		}
	}
	
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
			        	var RoutNo=arrStr[4];
			        	
			        	
			        	if (parseInt(document.getElementById("StudentAdmissionfinancialyear").value) <= parseInt(document.getElementById("CurrentFinancialYear").value))
						{document.getElementById("txtAnnualFee").value = arrStr[5];}
						else
						{document.getElementById("txtAnnualFee").value="";}
			        	
			        	document.getElementById("txtTuition").value=TutionFee;
			        	document.getElementById("txtTransportFees").value=TransportFee;
			        	//document.getElementById("txtPreviousBalance").value=BalanceAmt;
			        	document.getElementById("txtLateDays").value =LateDays;
			        	document.getElementById("currentrouteno").value=RoutNo;
			        	document.getElementById("tdRouteNo").innerHTML ="<strong>Current Route: " + RoutNo + "</strong>";
			        	document.getElementById("tdChangeRoute").innerHTML ="<strong><a href='Javascript:ChangeRoute();'>Change Route</a></strong>";
			        	
			        	if (LateDays !="")
			        	{
			        		document.getElementById("txtLateFee").value=10*LateDays;
			        		document.getElementById("txtAdjustedLateFee").value=10*LateDays;
			        		
			        	}
			        	document.getElementById("txtAdjustedLateDays").value =LateDays;
			        	CalculatTotal();
			        	//alert("TutionFee:" + TutionFee + ",Transport Fee:" + TransportFee + ",Balance Amt:" + BalanceAmt);
			        	//document.getElementById("txtStudentName").value=rows;
			        	
			        	//ReloadWithSubject();
						//alert(rows);														
			        }
		      }
			
			var submiturl="GetFeeDetail.php?Quarter=" + document.getElementById("cboQuarter").value + "&Class=" + document.getElementById("txtClass").value + "&sadmission=" + document.getElementById("txtAdmissionNo").value + "&FinancialYear=" + document.getElementById("cboFinancialYear").value;

			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);

}

function CalculateLateFee()
{
	if(isNaN(document.getElementById("txtAdjustedLateDays").value)==true)
	{
		document.getElementById("txtAdjustedLateFee").value=0;
	}
	else
	{
		document.getElementById("txtAdjustedLateFee").value=10*document.getElementById("txtAdjustedLateDays").value;
	}
	CalculatTotal();
}

function CalculatTotal()
{
	if (isNaN(document.getElementById("txtTuition").value)== "true" || document.getElementById("txtTuition").value=="")
	{
		TutionFee=0;
	}
	else
	{
		TutionFee=document.getElementById("txtTuition").value;
	}
	
	
	if (isNaN(document.getElementById("txtAdjustedLateFee").value)==true || document.getElementById("txtAdjustedLateFee").value=="")
	{
		AdjustedLateFee=0;
	}
	else
	{
		AdjustedLateFee=document.getElementById("txtAdjustedLateFee").value;
	}
	
	
	/*
	if (isNaN(document.getElementById("txtPreviousBalance").value)==true || document.getElementById("txtPreviousBalance").value=="")
	{
		PreviousBalance=0;
	}
	else
	{
		PreviousBalance=document.getElementById("txtPreviousBalance").value;
	}
	*/
	
	TuitionFeeDiscount=0;
	HostelFees=0;
	HostelFeeDiscount=0;	
		TotalAmt1=parseInt(TutionFee)+parseInt(AdjustedLateFee)+parseInt(HostelFees)-parseInt(TuitionFeeDiscount)-parseInt(HostelFeeDiscount);

	TotalAmt=parseInt(TutionFee) + parseInt(AdjustedLateFee) + parseInt(HostelFees) - parseInt(TuitionFeeDiscount)-parseInt(HostelFeeDiscount);
	
	if (TotalAmt<0)
	{
		alert("Tution Fee discount can not be more then total fee payable!");
		//document.getElementById("txtTuitionFeeDiscount").value="";
		CalculatTotal();
		return;	
	}
	document.getElementById("txtTotal").value=parseInt(TotalAmt);
	document.getElementById("txtTotalAmtPaying").value=parseInt(TotalAmt);
	
	
}

function fnlPaymentMode()
{
	if (document.getElementById("cboPaymentMode").value!="Cash")
	{
		document.getElementById("txtChequeNo").readOnly=false;
		//document.getElementById("txtBank").readOnly=false;
		document.getElementById("cboBank").disabled=false;
		document.getElementById("txtChequeDate").disabled=false;
	}
	else
	{
		document.getElementById("txtChequeNo").value="";
		//document.getElementById("txtBank").value=""
		document.getElementById("cboBank").value="Select One";
		document.getElementById("cboBank").disabled=true;
		document.getElementById("txtChequeDate").value="";
		document.getElementById("txtChequeDate").disabled=true;
		
		document.getElementById("txtChequeNo").readOnly=true;
		//document.getElementById("txtBank").readOnly=true;
	}
}
function ChangeRoute()
{
	var myWindow = window.open("EditRouteNo.php?sadmission=" + document.getElementById("txtAdmissionNo").value + "&currentroute=" + document.getElementById("currentrouteno").value ,"","width=700,height=650");
}

function ShowReceipt(receiptno)
{
	var myWindow = window.open("ShowReceipt.php?Receipt=" + receiptno ,"","width=700,height=650");	
}

function CheckFinancialYear()
{
	if(parseInt(document.getElementById("txtFinancialYear").value) > parseInt(document.getElementById("cboFinancialYear").value))
	{
		//alert("Student admission year is " + document.getElementById("txtFinancialYear").value + " \n Fees for financial year " + document.getElementById("cboFinancialYear").value + " can not be selected!");
		//document.getElementById("cboFinancialYear").value = "Select One";
		document.getElementById("cboFinancialYear").value = document.getElementById("txtFinancialYear").value;
		return;
	}
}


function fnlTuitionFeeDiscount()
{
		if(document.getElementById("hStudentDiscountType").value == "")
		{
			alert("This student is not eligible for fees discount! \r To apply any discount please edit discount type in student master");
			document.getElementById("cboTuitionFeeDiscountType").value="Select One";
			return;
		}
		if (document.getElementById("cboTuitionFeeDiscountType").value == "Others")
		{
			document.getElementById("txtTuitionFeeDiscount").readOnly=false;
			document.getElementById("txtTuitionFeeDiscount").value="";
			return;
		}
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
			        	
			        	if (document.getElementById("txtTuition").value=="")
			        	{
			        		document.getElementById("txtTuitionFeeDiscount").value ="";
			        	}
			        	else
			        	{
			        		document.getElementById("txtTuitionFeeDiscount").value = (parseInt(document.getElementById("txtTuition").value) * rows)/100;
			        	}
			        	fnlHostelFeeDiscount();
						//CalculatTotal();
						//alert(rows);														
			        }
		      }
		      

			var submiturl="GetFeeDiscount.php?discounttype=" + document.getElementById("cboTuitionFeeDiscountType").value + "&financialyear=" + document.getElementById("cboFinancialYear").value + "&discountreason=tuitionfees";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
}

function fnlHostelFeeDiscount()
{
		if(document.getElementById("hStudentDiscountType").value == "")
		{
			alert("This student is not eligible for fees discount!");
			document.getElementById("cboTuitionFeeDiscountType").value="Select One";
			return;
		}
		
		if (document.getElementById("cboTuitionFeeDiscountType").value == "Others")
		{
			document.getElementById("txtHostelFeeDiscount").readOnly=false;
			document.getElementById("txtHostelFeeDiscount").value="";
			return;
		}
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
			        	
			        	if (document.getElementById("txtHostel").value=="")
			        	{
			        		document.getElementById("txtHostelFeeDiscount").value ="";
			        	}
			        	else
			        	{
			        		document.getElementById("txtHostelFeeDiscount").value = (parseInt(document.getElementById("txtHostel").value) * rows)/100;
			        	}
			        	
						CalculatTotal();
						//alert(rows);														
			        }
		      }
		      

			var submiturl="GetFeeDiscount.php?discounttype=" + document.getElementById("cboTuitionFeeDiscountType").value + "&financialyear=" + document.getElementById("cboFinancialYear").value + "&discountreason=hostelfees";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
}

function CalculateBalance()
{
	Balance=0;
	
	if (document.getElementById("txtTotal").value != "")
	{
		Total=document.getElementById("txtTotal").value;
	}
	
	if (isNaN(document.getElementById("txtTotalAmtPaying").value)==true || document.getElementById("txtTotalAmtPaying").value=="")
	{AmountPaying=0;}
	else
	{
		if (parseInt(document.getElementById("txtTotalAmtPaying").value) > parseInt(document.getElementById("txtTotal").value))
		{
			alert ("Total Amount paid cant not be greater then Payable Amount!");
			document.getElementById("txtTotalAmtPaying").value="";
			//document.getElementById("txtBalance").value="";
			return;
		}
		AmountPaying = document.getElementById("txtTotalAmtPaying").value;
	}
	
	//document.getElementById("txtBalance").value = Total - AmountPaying;
}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<link rel="stylesheet" type="text/css" href="../css/style.css" />

<title>Fees Collection</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

	

<style type="text/css">

.auto-style1 {
	font-size: 11pt;
	font-family: Cambria;
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

.auto-style12 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
	text-decoration: underline;
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
.auto-style15 {
	font-size: 11pt;
	color: #822203;
	font-weight: bold;
	font-family: Cambria;
}
.auto-style17 {
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.auto-style18 {
	margin-left: 0px;
	font-family: Cambria;
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
	font-family: Cambria;
}
.auto-style30 {
	font-family: Cambria;
	font-weight: normal;
	font-size: 11pt;
	color: #000000;
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
	font-size: 11pt;
	font-family: Cambria;
	color: #CC0033;
}

.auto-style3 {
	font-family: Cambria;
	color: #CD222B;
}
.auto-style6 {
	
	font-family: Cambria;
	color: #CD222B;
}

.auto-style36 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.auto-style37 {
	font-family: Cambria;
}
.auto-style38 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style39 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style40 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style41 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
}

.style1 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.style2 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
}
.style4 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
}
.style5 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
}
.style6 {
	font-family: Cambria;
	color: #000000;
}
.style8 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: 700;
	font-size: 11pt;
}
.style9 {
	color: #000000;
}
.style10 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
	text-decoration: underline;
	text-align: center;
}
.style12 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.style13 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	text-decoration: underline;
}

.style14 {
	border-style: solid;
	border-width: 1px;
}

.style17 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-size: 11pt;
}


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
        font-family: Cambria;
        font-weight:bold;

}
.style20 {
	border-style: none;
	border-width: medium;
	text-align: right;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.style22 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #FF0000;
}
</style>

</head>



<body onload="Javascript:CalculatTotal();">

<p>&nbsp;</p>

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style20" style="height: 70px">
	<tr>
		<td class="auto-style14">
		<span class="style6">Fees Collection</span><hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
				
				</table>


	
	<form name="frmFees" id="frmFees" method="post" action="FeesPayment.php" target="_self">
	<input type="hidden" name="Q1Fee" id="Q1Fee" value="<?php echo $Q1fees_amount; ?>" class="auto-style37">
	<input type="hidden" name="Q2Fee" id="Q2Fee" value="<?php echo $Q2fees_amount; ?>" class="auto-style37">
	<input type="hidden" name="Q3Fee" id="Q3Fee" value="<?php echo $Q3fees_amount; ?>" class="auto-style37">
	<input type="hidden" name="Q4Fee" id="Q4Fee" value="<?php echo $Q4fees_amount; ?>" class="auto-style37">
	<input type="hidden" name="SubmitType" id="SubmitType" value="" class="auto-style37">
	<input type="hidden" name="currentrouteno" id="currentrouteno" value="<?php echo $RoutNo; ?>">
	<input type="hidden" name="CurrentFinancialYear" id="CurrentFinancialYear" value="<?php echo $CurrentFinancialYear; ?>">
	<input type="hidden" name="StudentAdmissionfinancialyear" id="StudentAdmissionfinancialyear" value="<?php echo $FinancialYear; ?>">
	<input type="hidden" name="FeeSubmissionFinancialYear" id="FeeSubmissionFinancialYear" value="">
	<input type="hidden" name="txtAdmissionNo" id="txtAdmissionNo" value="<?php echo $_REQUEST["txtAdmissionNo"]; ?>">
	<input type="hidden" name="hStudentDiscountType" id="hStudentDiscountType" value="<?php echo $StudentDiscountType;?>">
	<input type="hidden" name="InstallmentName" id="InstallmentName" value="<?php echo $FeeHeadName;?>">
	
	<table border="1px" width="100%">
	
	
		<!--
		<tr>
		
		<td style="width: 281px; height: 29px;" class="auto-style23">

		<span class="style5">Student Admission No. </span>
		<span style="font-weight: 700; " class="auto-style1">:</span></td>

		<td style="width: 157px; height: 29px;" class="auto-style23">

		<input type="text" name="txtAdmissionNo" id="txtAdmissionNo" size="15" style="width: 151px;" class="auto-style1" value="<?php echo $_REQUEST["txtAdmissionNo"]; ?>"></td>

		<td style="width: 157px; height: 29px;" class="auto-style26">



		<input name="btnGo" type="button" value="Fill Detail" onclick="Javascript:Validate1();" class="auto-style1" style="width: 82px"></td>
	</tr>
	-->
	
	<tr>
	
	
	
		<td style="width: 281px; height: 52px;" class="auto-style23">

		<span class="style5">Student Name</span><span class="auto-style1">
		</span>

		</td>

		<td style="width: 157px; height: 52px;" class="auto-style23">

		<input name="txtName" id="txtName" type="text" class="text-box" value="<?php echo $sname;?>" readonly="readonly" ></td>
	
		
		
		
	
		<td style="width: 157px; height: 52px;" class="auto-style41">

		&nbsp;</td>
	
		
		
		
	
		<td style="width: 179px; height: 52px;" class="style4">

		Class</td>

		<td style="height: 52px;" class="auto-style23">

		<input name="txtClass" id="txtClass" type="text" class="text-box"value="<?php echo $class;?>" readonly="readonly"></td>
		
		
	
		<td style="width: 191px; height: 52px;" class="auto-style26">

		<span style="font-weight: 700; " class="auto-style1">
		Roll No</span><span class="auto-style1">
		</span>

		</td>
		
		

		<td style="height: 52px;" class="auto-style23">

		<input name="txtRollNo" id="txtRollNo" type="text"  value="<?php echo $RollNo; ?>" readonly="readonly" class="text-box"></td>
		<br class="auto-style1">
		
		<br class="auto-style1">
		</tr>
		
		
		</table>
		<br class="auto-style37">


	
	
	
	<table style="height: 45px" width="100%" class="style14">
		
		
	<tr>
	
	
	
		<td style="width: 154px; height: 39px;" class="style2">

		Mode Of Payment</td>

		<td style="height: 39px;" class="auto-style22">

		<select name="cboPaymentMode" id="cboPaymentMode" class="text-box" onchange="Javascript:fnlPaymentMode();" >
		<option selected="" value="Cheque">Cheque</option>
		<option value="Cash">Cash</option>
		<option value="Demand Draft">Demand Draft</option>
		</select></td>

		
		
		
	
		<td style="height: 39px; width: 167px" class="style20">

		Cheque Date:</td>

		
	
		
	
		<td style="height: 39px; width: 167px" class="style1">

		<input name="txtChequeDate" id="txtChequeDate" class="tcal" type="text"></td>
	
		<td style="height: 39px; width: 167px" class="style1">

		<strong>Cheque or DD#</strong></td>

		
	
		<td style="width: 99px; height: 39px;" class="auto-style25">

		<strong>

		<input name="txtChequeNo" id="txtChequeNo" type="text" class="text-box" ></strong></td>
		
		

		<td style="width: 155px; height: 39px;" class="auto-style26">

		<strong><span class="auto-style1">Bank Name</span></strong></td>
		
		<td style="height: 39px;" class="auto-style22">
		
		<select name="cboBank" id="cboBank" class="text-box">
		<option value="Select One" selected="selected" >Select One</option>
		<?php
		while($row = mysql_fetch_row($rsBank))
		{
			$Bankname=$row[0];
		?>						
		<option value="<?php echo $Bankname;?>"><?php echo $Bankname;?></option>
		<?php
		}
		?>
		</select>
		</td>

		</tr>
		
		
		</table>
		<br class="auto-style37">
	
		
	
<table width="1327" class="style14">

<tr>			
		

		<td style="height: 29px;" class="style10" colspan="8">

		<strong>Fees Heads</strong></td>

			</tr>
		
<tr>			
		

		<td style="width: 163px; height: 38px" class="style2" align="center">

		Financial Year</td>


		<td class="auto-style22" style="height: 38px" align="center">

		Fees Quarter</td>


		<td class="style22" style="height: 38px" colspan="2" align="center">

				<p align="left">Fees Amount</td>
		

		<td class="style22" style="height: 38px" align="center">

		<p align="left">Actual Delay Days</td>
		

		<td class="style22" style="height: 38px" align="center">

		<p align="left">Late Fees Charge</td>
		

		<td class="style22" style="height: 38px" align="center">



		<p align="left">Adjusted Delay Days</td>
		

		<td class="style22" style="height: 38px" align="center">

		<p align="left">Late Fees Charges to be paid</td>
		

			</tr>
		
<tr>			
		

		<td style="width: 163px; height: 38px" class="style2" align="center">

		<select name="cboFinancialYear" id="cboFinancialYear" onchange="javascript:CheckFinancialYear();" style="height: 22px">
				<option selected="" value="Select One">Select One</option>
				<?php
				while($rowFY = mysql_fetch_row($rsFY))
				{
							$Year=$rowFY[0];
							$FYear=$rowFY[1];
				?>
				<option value="<?php echo $Year; ?>" <?php if($FeeCheckFinancialYear==$Year) { echo "selected"; } ?>><?php echo $FYear; ?></option>
				<?php 
				}
				?>
		</select></td>


		<td class="auto-style22" style="height: 38px" align="center">

		<input name="cboQuarter" id="cboQuarter" class="text-box" value="<?php echo $FeeSubmissionQuarter; ?>" readonly="readonly" style="float: left"></td>


		<td class="style22" style="height: 38px" colspan="2" align="center">

		<input name="txtTuition" id="txtTuition" class="text-box" readonly="readonly" value="<?php echo $AmountToBePaid; ?>" style="float: left" ></td>
		

		<td class="style22" style="height: 38px" align="center">

			<input name="txtLateDays" id="txtLateDays" readonly="readonly" class="text-box" value="<?php echo $LateDays; ?>" style="float: left"></td>
		

		<td class="style22" style="height: 38px" align="center">



		<input name="txtLateFee" id="txtLateFee" class="text-box" readonly="readonly" value="<?php echo $LateFee; ?>" style="float: left" ></td>
		

		<td class="style22" style="height: 38px" align="center">

			<input name="txtAdjustedLateDays" id="txtAdjustedLateDays" onkeyup="Javascript:CalculateLateFee();" class="text-box" value="<?php echo $LateDays; ?>" style="float: left"></td>
		

		<td class="style22" style="height: 38px" align="center">



		<input name="txtAdjustedLateFee" id="txtAdjustedLateFee" class="text-box" value="<?php echo $LateFee; ?>" style="float: left"></td>
		

			</tr>
		
<tr>			
		

		<td style="width: 163px; height: 38px" class="style2">

	

		Remarks
		</td>


		<td class="auto-style22" style="height: 38px">

		<input type="hidden" name="txtFinancialYear" id="txtFinancialYear" value="<?php echo $FeeSubmissionFinancialYear; ?>">
		<p align="left">&nbsp;<span class="style9"></span><textarea name="txtRemarks" id="txtRemarks" rows="2" class="text-box-address" cols="17"></textarea></td>


		<td class="style22" style="height: 38px" colspan="6">
		<?php 
		if ($StudentDiscountType != "")
		{
		echo "This student is eligible for discount!";
		}
		?>
		
		</td>
		

			</tr>
		
<tr>			
		

		<td style="width: 163px; height: 38px" class="style2">

		

		Total Fees Payable
		</td>


		<td class="auto-style22" style="height: 38px" colspan="2">
		


		<input name="txtTotal" id="txtTotal" type="text" class="text-box" readonly="readonly" value="<?php echo $TotalPayable;?>"></td>


		<td class="auto-style22" style="height: 38px" colspan="3">


<!--
		<strong>Balance</strong>
-->		
</td>


		<td class="auto-style22" style="height: 38px" colspan="2">


<!--
		<input name="txtBalance" id="txtBalance" type="text" class="text-box">
-->		
</td>

			</tr>
		
<tr>			
		

		<td style="width: 163px; " class="style2">

	

				Total Fees Paid
		</td>


		<td style="width: 70px; " class="auto-style22" colspan="7">

		

		<input name="txtTotalAmtPaying" id="txtTotalAmtPaying" type="text" class="text-box" value="<?php echo $TotalPayable;?>"></td>

			</tr>		
		<?php
			if ($FeeSubmissionQuarter == "Q1" && $StudentType = "Old Student")
			{
				$AnnualChargApply="yes";
		?>

		<?php
		}
		else
		{
			$AnnualChargApply="no";
		}
		?>
		<input type="hidden" name="isAnnualChargApply" id="isAnnualChargApply" value="<?php echo $AnnualChargApply; ?>">		

<tr>
		<td style="height: 37px" class="style8" colspan="8">

		<p style="text-align: center">

		<strong>

		<input name="BtnSubmit1" type="button" value="Preview" onclick="Javascript:Validate('Preview');" class="text-box">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="BtnSubmit" type="button" value="Submit" onclick="Javascript:Validate('Final');" class="text-box"></strong></td>

	</tr>
		

	<?php 

	if ($Message1 !="")

	{

	?>

	<?php 

	}

	?>

		

</table>
		<span class="auto-style37">
<!--
</form>
-->
		</span>
<br>
<br>
	<div id="MasterDiv">
	<table class="CSSTableGenerator" border="1" style="align:center; width: 100%;">
	
	<tr>
   		<td height="22" style="width: 641px" ><b><font face="Cambria">
		Admission No.</font></b><font face="Cambria"><?php echo $AdmissionNo;?></font></td>
   		<td height="22" style="width: 642px" ><b>
		<font face="Cambria">
		Name.</font></b><font face="Cambria"><?php echo $sname;?></font></td>
   		<td height="22" style="width: 642px" ><b>
		<font face="Cambria">
		Class.</font></b><font face="Cambria"><?php echo $class;?></font></td>
		<td height="22" style="width: 642px" ><b>
		<font face="Cambria">
		Roll No.</font></b><font face="Cambria"><?php echo $srollno;?></font></td>

		<td height="22" style="width: 642px" ><b>
		<font face="Cambria">
		Father Name.</font></b><font face="Cambria"><?php echo $sfathername;?></font></td>

	</tr>
	
	
	
	</table>
	<table class="CSSTableGenerator"  border="1"style="align:center; width: 100%;">
	
	
		<br class="auto-style1">

<table class="CSSTableGenerator" border="1" style="align:center; width: 100%;">

		
<tr>			
		

		<td style="height: 29px;" class="style13" colspan="12">

		<p style="text-align: center"><b>Payment History</b></td>

			</tr>
		
<tr>			
		

		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Fee Payment Quarter</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Receipt #</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Fee Payable</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Fee Paid</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Late Fee</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Cheque Bounce Charges</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Balance</strong></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<b>Cheque No</b></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Cheque Payment Status</strong></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Fees Payment Date</strong></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Financial Year</strong></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Print Reciept</strong></td>

			</tr>
<?php
$rsTotalBill=mysql_query("select `amount` from `fees_student_17March2016` where `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$AdmissionNo' and `feeshead`='TOTAL BILL AMOUNT'");
$row1=mysql_fetch_row($rsTotalBill);
$BillAmount=$row1[0];
$rsAdvance=mysql_query("select sum(amount) from `fees_student_17March2016` where `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$AdmissionNo' and `feeshead`='Advances'");
$row=mysql_fetch_row($rsAdvance);
$AdvanceAmt=$row[0];
?>
<tr>			
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 100px; height: 20px;" class="style12">&nbsp;</td>
		<td style="width: 101px; height: 20px;" class="style17">&nbsp;</td>
		<td style="width: 101px; height: 20px;" class="style17">&nbsp;</td>
		<td style="width: 101px; height: 20px;" class="style17">&nbsp;</td>
		<td style="width: 101px; height: 20px;" class="style17">&nbsp;</td>
		<td style="width: 101px; height: 20px;" class="auto-style5"><b>Total Bill Amount:-</b> <?php echo $BillAmount;?></td>
</tr>		
<tr>			
		<td style="width: 100px; height: 20px;" class="style12"></td>
		<td style="width: 100px; height: 20px;" class="style12"></td>
		<td style="width: 100px; height: 20px;" class="style12"></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $AdvanceAmt;?></td>
		<td style="width: 100px; height: 20px;" class="style12"></td>
		<td style="width: 100px; height: 20px;" class="style12"></td>
		<td style="width: 100px; height: 20px;" class="style12"></td>
		<td style="width: 101px; height: 20px;" class="style17"></td>
		<td style="width: 101px; height: 20px;" class="style17"></td>
		<td style="width: 101px; height: 20px;" class="style17"></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $CurrentFinancialYear;?></td>
		<td style="width: 101px; height: 20px;" class="auto-style5">Advance 
		Amount</td>
</tr>		
<?php
while($row = mysql_fetch_row($rsHistory))
	{
					
					//`quarter`,`fees_amount`,`amountpaid`,`BalanceAmt`,`chequeno`,`cheque_status`,`receipt`,date_format(`date`,'%d-%m-%Y') as `date`,`FinancialYear`
					$quarter=$row[0];
					$fees_amount=$row[1];
					$amountpaid=$row[2];
					$BalanceAmt=$row[3];
					$chequeno=$row[4];
					$cheque_status=$row[5];
					$receipt=$row[6];
					$date=$row[7];
					$FinancialYear=$row[8];		
					$AdjustedLateFee=$row[9];		
					$cheque_bounce_amt=$row[10];		
?>
<tr>			
		

		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $quarter; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $receipt; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $fees_amount; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $amountpaid; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">
		<?php echo $AdjustedLateFee;?>
					
		</td>


		<td style="width: 100px; height: 20px;" class="style12">
<?php echo $cheque_bounce_amt;?>
		</td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $BalanceAmt; ?></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<?php echo $chequeno; ?></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<?php echo $cheque_status; ?></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<?php echo $date; ?></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<?php echo $FinancialYear; ?></td>


		<td style="width: 101px; height: 20px;" class="auto-style5">


			<input name="PrintQ1Receipt" type="button" value="Print Reciept" class="text-box" onclick="Javascript:ShowReceipt('<?php echo $receipt; ?>');"><span class="style6">
			</span>
		</td>

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
		<td style="width: 100px; height: 20px;" class="style12">
		</td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $BalanceReceiptNo; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">
		<?php echo $PayableBalanceAmt; ?>
		</td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $PaidBalanceAmt; ?></td>


		<td style="width: 100px; height: 20px;" class="style12">

		&nbsp;</td>


		<td style="width: 100px; height: 20px;" class="style12">

		&nbsp;</td>


		<td style="width: 100px; height: 20px;" class="style12">

		<?php echo $OutstandingAmt; ?></td>


		<td style="width: 101px; height: 20px;" class="style17">

		&nbsp;</td>


		<td style="width: 101px; height: 20px;" class="style17">

		</td>


		<td style="width: 101px; height: 20px;" class="style17">

		<?php echo $ReceiptDate; ?></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<?php echo $FinancialYear; ?></td>


		<td style="width: 101px; height: 20px;" class="auto-style5">


			<input name="PrintQ1Receipt"  type="button" value="Print Reciept" class="text-box" onclick="Javascript:ShowReceipt('<?php echo $BalanceReceiptNo; ?>');"><span class="style6">
			</span>
		</td>

			</tr>			
	<?php 
			}
		}
	?>		
<?php
}
?>		
			

</table>	

	
	<?php
	$ssql="select distinct `feeshead`,`amount`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,`FeesType` from `fees_student_17March2016` as `a` where `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$txtAdmissionNo' and `feeshead`!='TOTAL BILL AMOUNT'  and `feeshead` not like '%INSTAL%'";
	
	$rs= mysql_query($ssql);
	
	$ssql1="select `amount`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,`class` from `fees_student_17March2016` as `a` where `financialyear`='$FeeCheckFinancialYear' and `sadmission`='$txtAdmissionNo' and `feeshead`='TOTAL BILL AMOUNT'";
	
	$rs1= mysql_query($ssql1);
	while($row1=mysql_fetch_row($rs1))
	{
		$TotalExistingBillAmount=$row1[0];
		$sname=$row1[1];
		$discounttype=$row1[2];
		$Class=$row1[3];
		break;
	}

?>
	<br>
	<br>
	
	<br>
	<table class="name" width="100%">


<table class="CSSTableGenerator" cellspacing="0" cellpadding="0" style="width: 100%">
<form name="frmFeeHead" id="frmFeeHead" method="post" action="">
<input type="hidden" name="hsadmission" id="hsadmission" value="<?php echo $txtAdmissionNo;?>">
<input type="hidden" name="hclass" id="hclass" value="<?php echo $Class;?>">
<input type="hidden" name="hName" id="hName" value="<?php echo $sname;?>">

  
   		<table class="CSSTableGenerator" cellspacing="0" cellpadding="0" border="1" style="width: 100%">
   		<tr><td colspan="2">
			<p style="text-align: center"><b><u>Fee Head Details</u></b></td></tr>
<tr>

<td height="22" style="width: 641px" class="style2" >
		<font face="Cambria">
		Fees Head Name</font></td>
		<td height="22" style="width: 642px" class="style2" >
		<font face="Cambria">Amount</font></td>
	</tr>
	<?php 
	$ssql="select distinct `feeshead`,`amount`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,`FeesType` from `fees_student_17March2016` as `a` where `sadmission`='$txtAdmissionNo' and `feeshead`!='TOTAL BILL AMOUNT' and `FeesType` in ('Regular') and `feeshead`  like '%INSTAL%'";

	
	$cnt=1;
	while($row=mysql_fetch_row($rs))
	{
		$feeshead=$row[0];
		$amount=$row[1];
		$name=$row[2];
		$discounttype=$row[3];
		$FeeType=$row[4];
	?>
		<tr>
		<td height="22" style="width: 641px" ><?php echo $feeshead;?></td>
		<td height="22" style="width: 642px" class="style3" >
		<input type="hidden" name="txtfeeheadname<?php echo $cnt;?>" id="txtfeeheadname<?php echo $cnt;?>" value="<?php echo $feeshead;?>">
		<input type="hidden" name="txtFeeType<?php echo $cnt;?>" id="txtFeeType<?php echo $cnt;?>" value="<?php echo $FeeType;?>"><?php echo $amount;?></td>
	</tr>
	<?php
		$cnt=$cnt+1;
	}
	?>

	<input type="hidden" name="txtTotalHead" id="txtTotalHead" value="<?php echo ($cnt-1);?>">
	<tr>

		<td height="22" style="width: 641px" >TOTAL BILL AMOUNT</td>	
		<td height="22" style="width: 642px" class="style3" ><?php echo $TotalExistingBillAmount;?></td>
		
   	</tr>
	


</table>
</form>
</table>

	
	<?php
	$ssql="select distinct `feeshead`,`amount`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,`FeesType` from `fees_student_17March2016` as `a` where `sadmission`='$txtAdmissionNo' and `feeshead`!='TOTAL BILL AMOUNT'  and `feeshead`  like '%INSTAL%'";
	
	$rs= mysql_query($ssql);
	
	$ssql1="select `amount`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,`class` from `fees_student_17March2016` as `a` where `sadmission`='$txtAdmissionNo' and `feeshead`='TOTAL BILL AMOUNT'";
	
	$rs1= mysql_query($ssql1);
	while($row1=mysql_fetch_row($rs1))
	{
		$TotalExistingBillAmount=$row1[0];
		$sname=$row1[1];
		$discounttype=$row1[2];
		$Class=$row1[3];
		break;
	}

?>
<br>
<br>
<p align="center"><font face="Cambria"><b></b></font></p>
	<br>
	<table class="name" width="100%">


<table class="CSSTableGenerator" cellspacing="0" cellpadding="0" style="width: 100%">
<form name="frmFeeInstallment" id="frmFeeInstallment" method="post" action="">
<input type="hidden" name="hsadmission" id="hsadmission" value="<?php echo $txtAdmissionNo;?>">
<input type="hidden" name="hclass" id="hclass" value="<?php echo $Class;?>">
<input type="hidden" name="hName" id="hName" value="<?php echo $sname;?>">

  
   		<table class="CSSTableGenerator" cellspacing="0" cellpadding="0" border="1" style="width: 100%">
   		<tr><td colspan="2">
			<p style="text-align: center"><b><u>Fee Installment  Details</u></b></td></tr>
<tr>

<td height="22" style="width: 641px" class="style2" >
		<font face="Cambria">
		Fees Head Name</font></td>
		<td height="22" style="width: 642px" class="style2" >
		<font face="Cambria">Amount</font></td>
	</tr>
	<?php 
	$ssql="select distinct `feeshead`,`amount`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,`FeesType` from `fees_student_17March2016` as `a` where `sadmission`='$txtAdmissionNo' and `feeshead`!='TOTAL BILL AMOUNT' and  `feeshead`  like '%INSTAL%'";

	
	$cnt=1;
	while($row=mysql_fetch_row($rs))
	{
		$feeshead=$row[0];
		$amount=$row[1];
		$name=$row[2];
		$discounttype=$row[3];
		$FeeType=$row[4];
	?>
		<tr>
		<td height="22" style="width: 641px" ><?php echo $feeshead;?></td>
		<td height="22" style="width: 642px" class="style3" >
		<input type="hidden" name="txtfeeheadname<?php echo $cnt;?>" id="txtfeeheadname<?php echo $cnt;?>" value="<?php echo $feeshead;?>">
		<input type="hidden" name="txtFeeType<?php echo $cnt;?>" id="txtFeeType<?php echo $cnt;?>" value="<?php echo $FeeType;?>"><?php echo $amount;?></td>
	</tr>
	<?php
		$cnt=$cnt+1;
	}
	?>

	<input type="hidden" name="txtTotalHead" id="txtTotalHead" value="<?php echo ($cnt-1);?>">
	<tr>

		<td height="22" style="width: 641px" >TOTAL BILL AMOUNT</td>	
		<td height="22" style="width: 642px" class="style3" ><?php echo $TotalExistingBillAmount;?></td>
		
   	</tr>
	


</table>
</form>
</table>
<br>
<br>

<table class="CSSTableGenerator"  border="1" style="align:center; width: 100%;">

		
<tr>			
		

		<td style="height: 29px;" class="style13" colspan="9">

		<p style="text-align: center"><b>Miscellaneous Payment History</b></td>

			</tr>
		
<tr>			
		

		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Fee Payment Head</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Receipt </strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Amount</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Txn Id</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<b>Cheque No</b></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<b>Bank Name</b></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Fees Payment Date</strong></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Payment Mode</strong></td>


		

			</tr>
<?php
$ssql="SELECT `srno`, `date`, `HeadName`, `SubHead`, `Source`, `sadmissionno`, `sname`, `sclass`, `srollno`, `VendorName`, `VendorCompanyName`, `VendorAddress`, `VendorPhNo`, `ChequeNo`, `Chequedate`, `BankName`, `Amount`, `PaymentMode`, `TxnId`, `TxnStatus`, `PGTxnId`, `Status`, `FeeReceipt`, `ReceiptCode`, `SendToBank`, `HeadType` FROM `fees_misc_collection` where `sadmissionno`='$AdmissionNo'";


	$rs= mysql_query($ssql);
	$cnt=1;
	while($row=mysql_fetch_row($rs))
	{
		$paymentdate=$row[1];
		$headname=$row[2];
		$Amount=$row[16];
		$Receipt=$row[22];
		$TxnId=$row[18];
         $chequeno=$row[13];
         $BankName=$row[15];
         $PaymentMode=$row[17];


?>
<tr>			
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $headname;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $Receipt;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $Amount;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $TxnId;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $chequeno;?></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $BankName;?></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $paymentdate;?></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $PaymentMode;?></td>
		
</tr>		
<?php
$cnt=$cnt+1;

}
?>

</table>
<br>
<br>
<table class="CSSTableGenerator"  border="1" style="align:center; width: 100%;">

		
<tr>			
		

		<td style="height: 29px;" class="style13" colspan="7">

		<p style="text-align: center"><b>Refund Payment History</b></td>

			</tr>
		
<tr>			
		

		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Admission No</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Name </strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<strong>Refund Date</strong></td>


		<td style="height: 16px; width: 100px;" class="style12">

		<b>Cheque No</b></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<b>Bank Name</b></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Cheque Date</strong></td>


		<td style="height: 16px; width: 101px;" class="style12">

		<strong>Refund Amount</strong></td>


		

			</tr>
<?php
$ssql="SELECT `srno`, date_format(`Entrydate`,'%d-%m-%y'), `Source`, `sadmissionno`, `sname`, `sclass`, `srollno`, `VendorName`, `VendorCompanyName`, `VendorAddress`, `VendorPhNo`, `ChequeNo`,  date_format(`Chequedate`,'%d-%m-%y'), `BankName`, `Amount`, `PaymentMode`, `Status`, `RefundAmount`, `Remarks`, `FeeReceipt`, `ReceiptCode`, `SendToBank`, `HeadType` FROM `fees_refund_payment` WHERE  `sadmissionno`='$AdmissionNo'";


	$rs= mysql_query($ssql);
	$cnt=1;
	while($row=mysql_fetch_row($rs))
	{
	
		$Admission=$row[3];
		$Name=$row[4];
		$RefundDate=$row[1];
		$ChequeNo=$row[11];
		$BankName=$row[13];
         $ChequeDate=$row[12];
         $Amount=$row[14];
        


?>
<tr>			
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $Admission;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $Name;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $RefundDate;?></td>
		<td style="width: 100px; height: 20px;" class="style12"><?php echo $ChequeNo;?></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $BankName;?></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $ChequeDate;?></td>
		<td style="width: 101px; height: 20px;" class="style17"><?php echo $Amount;?></td>
		
</tr>		
<?php
$cnt=$cnt+1;

}
?>

</table>

</div>
<br>
<br>
</p>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
<br>
<br>
<SCRIPT language="javascript">
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
</script>


<!--
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld Technologies LLP</font></div>

</div>
-->
</body>



</html>