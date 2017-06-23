<?php
session_start();
include '../connection.php';
include '../AppConf.php';
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
	$FeeAmtPaid=0;
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

		
		$rsFeeHeadAmt=mysql_query("SELECT distinct `feeshead`,sum(`amount`) FROM `fees_student` WHERE `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `FeesType` !='Hostel' and `FeesType` !='' and `feeshead` not in ('COMPUTERFEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES') group by `feeshead`");
		$rsAnnual=mysql_query("SELECT distinct `feeshead`,sum(`amount`) FROM `fees_student` WHERE `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `FeesType` !='Hostel' and `FeesType` !='' and `feeshead` in ('COMPUTERFEES','SMART CLASS','SCIENCE FEES','ANNUAL CHARGES') group by `feeshead`");
		$AnnualCharges=0;
		while($rowAnnual=mysql_fetch_row($rsAnnual))
		{
			$AnnualCharges=$AnnualCharges+$rowAnnual[1];
		}
		
		//$rsYearlyTotalFee=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `FeesType` !='Hostel' and `feeshead`='Total Bill Amount'");
		$rsYearlyTotalFee=mysql_query("SELECT sum(`amount`) FROM `fees_student` WHERE `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `FeesType` in ('Regular')");
		$rsYearlyTotalHostelFee=mysql_query("SELECT sum(`amount`) FROM `fees_student` WHERE `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear'  and `FeesType` ='Hostel'");
		$rsYearlyConcessionAmt=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `FeesType` !='Hostel' and `feeshead`='Total Concession Amount'");
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
		
		
		$rsAdvanceAmt=mysql_query("select sum(`amount`) from `fees_student` where `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead`='Advances'");
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
		//$YearlyTotalFeeAmount=$YearlyTotalFeeAmount-$TotalConcessionAmt-$YearlyTotalHostelAmount;
		$YearlyTotalFeeAmount=$YearlyTotalFeeAmount-$TotalConcessionAmt;
		//echo $YearlyTotalFeeAmount."/".$TotalConcessionAmt;
		//exit();

		$FeeAmtPaidQ1=0;
		$FeeAmtPaidQ2=0;
		$FeeAmtPaidQ3=0;
		$FeeAmtPaidQ4=0;
		$ActualReceivedAmtQ1=0;
		$ActualReceivedAmtQ2=0;
		$ActualReceivedAmtQ3=0;
				
		$rsCheckQ1=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead`='Fees First Installment'");
			if (mysql_num_rows($rsCheckQ1) == 0)
			{
				//$rsFeePaidQ1=mysql_query("SELECT `amount` FROM `fees_master` WHERE  `quarter`='Q1' and `financialyear`='$CurrentFinancialYear' and `StudentType`='$QStudentType' and `feeshead`='TUITION FEES'");
				if($FeeAmtPaid > 0)
				{
					$FeeAmtPaidQ1=0;
				}
				else
				{
					$rsFeePaidQ1=mysql_query("SELECT `amount` FROM `fees_master` WHERE  `quarter`='Q1' and `financialyear`='$CurrentFinancialYear' and `feeshead`='TUITION FEES'");
					while($rowFPQ1=mysql_fetch_row($rsFeePaidQ1))
					{
						$FeeAmtPaidQ1=$rowFPQ1[0];
						/*
						This is commented because we have not defined fees_student because we were very busy and we need to define fees_student and remove following comment. Thanks
						if($FeeAmtPaidQ1>($YearlyTotalFeeAmount-$TotalAmountPaid))
						{
							$FeeAmtPaidQ1=$YearlyTotalFeeAmount-$TotalAmountPaid;						
						}
						*/
						$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ1;
						break;
					}
				}
				
			}
			else
			{
				while($rowFPQ1=mysql_fetch_row($rsCheckQ1))
				{
					$rsRcptNo=mysql_query("select `receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date` from `fees` where `sadmission`='$sadmission' and `quarter`='Q1' and `FeesType`='Regular'");
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
		
			$rsCheckQ2=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead`='Fees Second Installment'");
			if (mysql_num_rows($rsCheckQ2) == 0)
			{
				$rsFeePaidQ2=mysql_query("SELECT `amount` FROM `fees_master` WHERE  `quarter`='Q2' and `financialyear`='$CurrentFinancialYear' and `feeshead`='TUITION FEES'");
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
					$rsRcptNo=mysql_query("select `receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`  from `fees` where `sadmission`='$sadmission' and `quarter`='Q2' and `FeesType`='Regular'");
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
		
			$rsCheckQ3=mysql_query("SELECT `amount` FROM `fees_student` WHERE `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `feeshead`='Fees Third Installment'");
			if (mysql_num_rows($rsCheckQ3) == 0)
			{
				$rsFeePaidQ3=mysql_query("SELECT `amount` FROM `fees_master` WHERE  `quarter`='Q3' and `financialyear`='$CurrentFinancialYear' and `feeshead`='TUITION FEES'");
					
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
					$rsRcptNo=mysql_query("select `receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,`AdjustedLateFee` from `fees` where `sadmission`='$sadmission' and `quarter`='Q3' and `FeesType`='Regular' and cheque_status !='Bounce'");
					while($rowRcpt=mysql_fetch_row($rsRcptNo))
					{
						$ReceiptNoQ3=$rowRcpt[0];
						$ReceiptDateQ3=$rowRcpt[1];
						$AdjustedLateFeeQ3=$rowRcpt[2];
						break;
					}
					//$ReceiptNoQ3=$rowFPQ3[0];
					//$ReceiptDateQ3=$rowFPQ3[1];
					$ActualReceivedAmtQ3=$rowFPQ3[0];
					//$FeeAmtPaidQ3=$rowFPQ3[0]-$AdjustedLateFeeQ3;
					$FeeAmtPaidQ3=$rowFPQ3[0];
					$TotalAmountPaid=$TotalAmountPaid+$FeeAmtPaidQ3;
					break;
				}	
			}
		
		
		//CHECK FEE SUBMISSION IN FEE TABLE FOR QUARTER Q4 IF FOUND THEN SHOW RECEIPT DETAIL OTHER WISE TO PAID AMOUNT WILL BE SHOWN//////////////////
		
		$rsTotalHostelAmt=mysql_query("SELECT sum(`amount`) FROM `fees_student` WHERE `sadmission`='$sadmission' and `financialyear`='$CurrentFinancialYear' and `FeesType`='Hostel'");
		while($rowFPQ4=mysql_fetch_row($rsTotalHostelAmt))
		{
			$ToalHostelAmtPayable=$rowFPQ4[0];
			break;
		}
		
			
			
			//echo "Yearly Total Fee:".$YearlyTotalFeeAmount."<br>Q1Amount:".$FeeAmtPaidQ1."<br>Q2Amount:".$FeeAmtPaidQ2."<br>Q3Amount:".$FeeAmtPaidQ3."<br>Total Hostel Amount:".$ToalHostelAmtPayable."<br>Advance Amount:".$FeeAmtPaid."<br>Total Concession:".$TotalConcessionAmt;
			//exit();
			$FeeAmtPaidQ4=($YearlyTotalFeeAmount-($FeeAmtPaidQ1+$FeeAmtPaidQ2+$FeeAmtPaidQ3+$FeeAmtPaid));	
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
//echo $FeeSubmissionQuarter."/".$AmountToBePaid;
//exit();
/////////////////	

		
//---------------------Late Fee Calculation----------------------------------------------------------



	$now = time(); // Current Date time
	if ($FeeSubmissionQuarter=="Q1")
	{
		$FeeSubmissionYear=$CurrentFinancialYear;
		$Dt1 = $CurrentFinancialYear. "-Apr-" . "18";
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
	$ssql = "SELECT `quarter`,`fees_amount`,`amountpaid`,`BalanceAmt`,`status`,`receipt`,date_format(`date`,'%d-%m-%Y') as `date`,`FinancialYear` FROM `fees` where `sadmission`='$AdmissionNo' and `FeesType`='Regular' order by `quarter`,`FinancialYear` desc";
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
		
	}
	
	document.getElementById("frmFees").action="FeesSubmitUser.php";
	
	
	
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
	if (isNaN(document.getElementById("txtPreviousBalance").value)==true || document.getElementById("txtPreviousBalance").value=="")
	{
		PreviousBalance=0;
	}
	else
	{
		PreviousBalance=document.getElementById("txtPreviousBalance").value;
	}
	
	
	TuitionFeeDiscount=0;
	
	HostelFees=0;
	HostelFeeDiscount=0;
	
	
	//SecurityCharges=document.getElementById("txtSecurityCharge").value;
	//LabCharges=document.getElementById("txtLabCharge").value;
	
		//TotalAmt1=parseInt(TutionFee)+parseInt(TransportFees)+parseInt(AdjustedLateFee)+parseInt(PreviousBalance)+parseInt(AnnualCharges)+parseInt(SecurityCharges)+parseInt(LabCharges)-parseInt(TuitionFeeDiscount);
		TotalAmt1=parseInt(TutionFee)+parseInt(AdjustedLateFee)+parseInt(PreviousBalance)+parseInt(HostelFees)-parseInt(TuitionFeeDiscount)-parseInt(HostelFeeDiscount);
		
	
	//TotalAmt=parseInt(TutionFee) + parseInt(TransportFees) + parseInt(AdjustedLateFee) + parseInt(PreviousBalance) +parseInt(AnnualCharges)+parseInt(SecurityCharges)+parseInt(LabCharges) - parseInt(TuitionFeeDiscount);
	TotalAmt=parseInt(TutionFee) + parseInt(AdjustedLateFee) + parseInt(PreviousBalance) +parseInt(HostelFees) - parseInt(TuitionFeeDiscount)-parseInt(HostelFeeDiscount);
	if (TotalAmt<0)
	{
		alert("Tution Fee discount can not be more then total fee payable!");
		//document.getElementById("txtTuitionFeeDiscount").value="";
		CalculatTotal();
		return;
		
	}
	document.getElementById("txtTotal").value=parseInt(TotalAmt);
	
}

function fnlPaymentMode()
{
	if (document.getElementById("cboPaymentMode").value!="Cash")
	{
		document.getElementById("txtChequeNo").readOnly=false;
		//document.getElementById("txtBank").readOnly=false;
		
		document.getElementById("txtChequeDate").disabled=false;
	}
	else
	{
		document.getElementById("txtChequeNo").value="";
		//document.getElementById("txtBank").value=""
		
		
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

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../mPortal/bootstrap.min.css">
  
  

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
.style23 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	text-align: left;
}
.style24 {
	text-align: center;
}
</style>

</head>



<body onload="Javascript:CalculatTotal();">

<p>&nbsp;</p>

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style20" style="height: 70px">

	

	
	<tr>
		<td class="auto-style14">
		<div class="style24">
		<span class="style6">Online Fees Payment</span></div>
		<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
</a></p>
				
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
	
	
		
	
	<tr>
	
	
	
		<td style="width: 658px; " class="style2">

		Admission No.</td>

	
	
		<td class="auto-style23" width="659">

		<input name="txtAdmissionNo1" id="txtAdmissionNo1" type="text" class="text-box" readonly="readonly" value="<?php echo $sadmission;?>"></td>

	
	
		<td style="" class="auto-style23" width="28">

		&nbsp;</td>
		</tr>
		
		
	<tr>
	
	
	
		<td style="width: 658px; " class="style2">

		<span class="style5">Student Name</span><span class="auto-style1">
		</span>

		</td>

	
	
		<td class="auto-style23" width="659">

		<input name="txtName" id="txtName" type="text" class="text-box" value="<?php echo $sname;?>" readonly="readonly" ></td>

	
	
		<td style="" class="auto-style23" width="28">

		&nbsp;</td>
		</tr>
		
		
	<tr>
	
	
	
		<td style="width: 658px; " class="style2">

		Class</td>

	
	
		<td class="auto-style23" width="659">

		<input name="txtClass" id="txtClass" type="text" class="text-box"value="<?php echo $class;?>" readonly="readonly"></td>

	
	
		<td style="" class="auto-style23" width="28">

		&nbsp;</td>
		</tr>
		
		
	<tr>
	
	
	
		<td style="width: 658px; " class="style2">

		<span style="font-weight: 700; " class="auto-style1">
		Roll No</span></td>

	
	
		<td class="auto-style23" width="659">

		<input name="txtRollNo" id="txtRollNo" type="text"  value="<?php echo $RollNo; ?>" readonly="readonly" class="text-box"><span class="auto-style1">&nbsp;</span></td>

	
	
		<td style="" class="auto-style23" width="28">

		&nbsp;</td>
		<br class="auto-style1">
		
		<br class="auto-style1">
		</tr>
		
		
		</table>
		<br class="auto-style37">


	
	
	
	<table width="100%" style="display: none;">
		
		
	<tr>
	
	
	
		<td style="width: 154px; " class="style2">

		Mode Of Payment</td>

		<td style="" class="auto-style22">
		<input type="text" name="cboPaymentMode" id="cboPaymentMode" value="Online" class="text-box" readonly="readonly">
		</td>

		
		
		
	
		<td style=" width: 167px" class="style20">

		&nbsp;</td>

		
	
		
	
		<td style=" width: 167px" class="style1">

		<input type="hidden"  name="txtChequeDate" id="txtChequeDate" class="tcal"></td>
	
		<td style=" width: 167px" class="style1">

		&nbsp;</td>

		
	
		<td style="width: 99px; " class="auto-style25">

		<strong>

		<input name="txtChequeNo" id="txtChequeNo" type="hidden" class="text-box" ></strong></td>
		
		

		<td style="width: 155px; " class="auto-style26">

		&nbsp;</td>
		
		<td style="" class="auto-style22">
		
		
		</td>

		</tr>
		
		
		</table>
		<br class="auto-style37">
	
		
	
<table class="style14" style="width: 100%">

<tr>			
		

		<td style="height: 29px;" class="style10" colspan="8">

		<strong>Fees Heads</strong></td>

			</tr>
		
<tr>			
		

		<td style="width: 163px; " class="style23">

		&nbsp;</td>


		<td class="auto-style14" style="">

		&nbsp;</td>


		<td class="style22" style="" colspan="2" align="center">

				<p align="left">&nbsp;</td>
		

		<td class="style22" style="" align="center">

		<p align="left">&nbsp;</td>
		

		<td class="style22" style="" align="center">

		<p align="left">&nbsp;</td>
		

		<td class="style22" style="" align="center">



		<p align="left"><!--Adjusted Delay Days--></td>
		

		<td class="style22" style="" align="center">

		<p align="left"><!--Late Fees Charges to be paid--></td>
		

			</tr>
		
<tr>			
		

		<td style="width: 163px; " class="style2" align="center">
		<p align="left">Financial Year
		</td>


		<td class="auto-style22" style="" align="center">

		<input name="cboFinancialYear" id="cboFinancialYear" value="<?php echo $CurrentFinancialYear;?>" readonly="readonly" class="text-box" style="float: left"></td>


		<td class="style22" style="" colspan="2" align="center">

		</td>
		

		<td class="style22" style="" align="center">

			</td>
		

		<td class="style22" style="" align="center">



		</td>
		

		<td class="style22" style="" align="center">

			<input type="hidden" name="txtAdjustedLateDays" id="txtAdjustedLateDays" onkeyup="Javascript:CalculateLateFee();" class="text-box" value="<?php echo $LateDays; ?>" style="float: left"></td>
		

		<td class="style22" style="" align="center">



		<input type="hidden" name="txtAdjustedLateFee" id="txtAdjustedLateFee" class="text-box" value="<?php echo $LateFee; ?>" style="float: left"></td>
		

			</tr>
		
<tr>			
		

		<td style="width: 163px; " class="style2">

	

		Fees Quarter</td>


		<td class="auto-style22" style="">

		<input name="cboQuarter" id="cboQuarter" class="text-box" value="<?php echo $FeeSubmissionQuarter; ?>" readonly="readonly" style="float: left"></td>


		<td class="style22" style="" colspan="6">
		&nbsp;</td>
		

			</tr>
		
<tr>			
		

		<td style="width: 163px; " class="style2">

	

		Fees Amount</td>


		<td class="auto-style22" style="">

		<input name="txtTuition" id="txtTuition" class="text-box" readonly="readonly" value="<?php echo $AmountToBePaid; ?>" style="float: left" ></td>


		<td class="style22" style="" colspan="6">
		&nbsp;</td>
		

			</tr>
		
<tr>			
		

		<td style="width: 163px; " class="style2">

	

		Actual Delay Days</td>


		<td class="auto-style22" style="">

			<input name="txtLateDays" id="txtLateDays" readonly="readonly" class="text-box" value="<?php echo $LateDays; ?>" style="float: left"></td>


		<td class="style22" style="" colspan="6">
		&nbsp;</td>
		

			</tr>
		
<tr>			
		

		<td style="width: 163px; " class="style2">

	

		Late Fees Charge</td>


		<td class="auto-style22" style="">



		<input name="txtLateFee" id="txtLateFee" class="text-box" readonly="readonly" value="<?php echo $LateFee; ?>" style="float: left" ></td>


		<td class="style22" style="" colspan="6">
		&nbsp;</td>
		

			</tr>
		
<tr>			
		

		<td style="width: 163px; " class="style2">

	

		Remarks
		</td>


		<td class="auto-style22" style="">

		<input type="hidden" name="txtFinancialYear" id="txtFinancialYear" value="<?php echo $FeeSubmissionFinancialYear; ?>">
		<p align="left">&nbsp;<span class="style9"></span><textarea name="txtRemarks" id="txtRemarks" rows="2" class="text-box-address" cols="17"></textarea></td>


		<td class="style22" style="" colspan="6">
		<?php 
		if ($StudentDiscountType != "")
		{
		echo "This student is eligible for discount!";
		}
		?>
		
		</td>
		

			</tr>
		
<tr>			
		

		<td style="width: 163px; " class="style2">

		

		Total Fees Payable
		</td>


		<td class="auto-style22" style="" colspan="2">
		


		<input name="txtTotal" id="txtTotal" type="text" class="text-box" readonly="readonly" value="<?php echo $TotalPayable;?>"></td>


		<td class="auto-style22" style="" colspan="3">


<!--
		<strong>Balance</strong>
-->		
</td>


		<td class="auto-style22" style="" colspan="2">


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

		

		<input name="txtTotalAmtPaying" id="txtTotalAmtPaying" type="text" class="text-box" value="<?php echo $TotalPayable;?>" readonly="readonly"></td>

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

		<!--<input name="BtnSubmit1" type="button" value="Preview" onclick="Javascript:Validate('Preview');" class="text-box">-->
		<input name="BtnSubmit" type="button" value="Submit" onclick="Javascript:Validate('Final');" class="text-box"></strong></td>

	</tr>
		


		

</table>
		<span class="auto-style37">
<!--
</form>
-->
		</span>

	
		<br class="auto-style1">
</table>	
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</form>


<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>
</body>



</html>