<?php
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
session_start();
?>
<?php

$Month[1] = "Jan";
$Month[2] = "Feb";
$Month[3] = "Mar";
$Month[4] = "Apr";
$Month[5] = "May";
$Month[6] = "Jun";
$Month[7] = "Jul";
$Month[8] = "Aug";
$Month[9] = "Sep";
$Month[10] = "Oct";
$Month[11] = "Nov";
$Month[12] = "Dec";



$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);

$ssqlFY="SELECT distinct `year`,`financialyear` FROM `FYmaster`";
$rsFY= mysql_query($ssqlFY);

$ssql="select distinct `bank_name` from `bank_master` where status='1'";
$rsBank	= mysql_query($ssql);

$ssqlCFY="SELECT distinct `year`,`financialyear` FROM `FYmaster` where `Status`='Active'";
$rsCFY= mysql_query($ssqlCFY);

	while($row = mysql_fetch_row($rsCFY))
	{
		$CurrentFinancialYear = $row[0];
		$SystemFinancialYear= $row[0];
		$CurrentFinancialYearName=$row[1];					
	}

$sstr="SELECT distinct `head` FROM `discounttable` where `discounttype`='tuitionfees'";
$rsDiscount= mysql_query($sstr);


if ($_REQUEST["txtAdmissionNo"] != "")
{
		$AdmissionNo=$_REQUEST["txtAdmissionNo"];
		$sqlStudentDetail = "SELECT `sname` , `sclass` , `srollno`,`FinancialYear`,`previous_sclass` FROM `student_master` where  `sadmission`='$AdmissionNo'";
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
		$StudentAdmissionFinancialYear=$FinancialYear;
		
		$sqlFy = "SELECT `financialyear` FROM `FYmaster` where  `year`='$FinancialYear'";
		
		$rs1 = mysql_query($sqlFy);
		if (mysql_num_rows($rs1) > 0)
		{
			while($row = mysql_fetch_row($rs1))
					{
						$FinancialYearName=$row[0];
					}
		}
		
		
		//**FREE TRANSACTION HISTORY FOR CURRENT FINANCIAL YEAR*****
				
			If ($StudentAdmissionFinancialYear < $CurrentFinancialYear)
			{
				$StudentType="Old Student";
			}
			else
			{
				$StudentType="New Student";
			}
			
			$sql= "select x.* from (";
			$sql = $sql."SELECT `fees_amount` , `amountpaid` , `quarter`,`status`,`receipt`,`datetime`,`FeeMonth`,`FinancialYear`,`BalanceAmt`,`FeeYear` FROM `fees_monthwise` where  `sadmission`='$AdmissionNo' and `FinancialYear`='$CurrentFinancialYear' and `FeeYear`=(select max(CAST(`FeeYear` AS UNSIGNED)) FROM `fees_monthwise` where `sadmission`='$AdmissionNo' and `FinancialYear`='$CurrentFinancialYear')";
			$sql = $sql . ") as `x` order by STR_TO_DATE(`FeeMonth`,'%b') desc";
			
			$rs1 = mysql_query($sql);
			//echo mysql_num_rows($rs1)."/".$StudentType;
			//exit();
			
			
		//If Student is Regular ant not paid in current financial year********
			$SearchFeeInLastYear="no";
			if (mysql_num_rows($rs1) == 0 && $StudentType == "Old Student")
			{
				$SearchFeeInLastYear="yes";
				$CurrentFinancialYear = $CurrentFinancialYear - 1;	
				//$sql = "select x.* from (SELECT `fees_amount` , `amountpaid` , `quarter`,`status`,`receipt`,`datetime`,`FeeMonth`,`FinancialYear`,`BalanceAmt`,`FeeYear` FROM `fees_monthwise` where  `sadmission`='$AdmissionNo' and `FinancialYear`='$CurrentFinancialYear' order by STR_TO_DATE(`FeeMonth`,'%b') desc) as `x` order by CAST(`FeeYear` AS UNSIGNED) desc";
				$sql = "select x.* from (";
				$sql=$sql."SELECT `fees_amount` , `amountpaid` , `quarter`,`status`,`receipt`,`datetime`,`FeeMonth`,`FinancialYear`,`BalanceAmt`,`FeeYear` FROM `fees_monthwise` where  `sadmission`='$AdmissionNo' and `FinancialYear`='$CurrentFinancialYear' and `FeeYear`=(select max(CAST(`FeeYear` AS UNSIGNED)) FROM `fees_monthwise` where `sadmission`='$AdmissionNo' and `FinancialYear`='$CurrentFinancialYear')";
				$sql = $sql . ") as `x` order by STR_TO_DATE(`FeeMonth`,'%b') desc";
				$rs = mysql_query($sql);
				if (mysql_num_rows($rs) > 0)
				{
					while($row = mysql_fetch_row($rs))
					{
						$LastPaymentReceiptNo = $row[4];
						$LastFeeSubmissionMonth = $row[6];
						$LastFeeSubmissionYear = $row[7];
						$LastBalanceAmount = $row[8];
						$FeeSubmissionYear = $row[9];
						if($LastFeeSubmissionMonth=="Mar")
						{
							$SearchFeeInLastYear="no";
						}
							
						break;
					}
				}
			}
			elseif (mysql_num_rows($rs1) > 0 && $StudentType == "Old Student")
			{
				//Student is Regular and paid in current financialyear ******
				while($row = mysql_fetch_row($rs1))
					{
						$LastPaymentReceiptNo = $row[4];
						$LastFeeSubmissionMonth = $row[6];
						$LastFeeSubmissionYear = $row[7];
						$LastBalanceAmount = $row[8];
						$FeeSubmissionYear = $row[9];
						break;
					}
					
					//  ADDED ON 10-OCT-2014
						if ($LastFeeSubmissionMonth=="Mar")
						{
							$CurrentFinancialYear = $CurrentFinancialYear + 1;	
							$sql= "select x.* from (";
							
							$sql = $sql . "SELECT `fees_amount` , `amountpaid` , `quarter`,`status`,`receipt`,`datetime`,`FeeMonth`,`FinancialYear`,`BalanceAmt`,`FeeYear` FROM `fees_monthwise` where  `sadmission`='$AdmissionNo' and `FinancialYear`='$CurrentFinancialYear' order by CAST(`FeeYear` AS UNSIGNED) desc";
							$sql = $sql . ") as `x` order by STR_TO_DATE(`FeeMonth`,'%b') desc";							
							
							
							$rs = mysql_query($sql);
							while($row = mysql_fetch_row($rs))
							{
								$LastPaymentReceiptNo = $row[4];
								$LastFeeSubmissionMonth = $row[6];
								$LastFeeSubmissionYear = $row[7];
								$LastBalanceAmount = $row[8];
								$FeeSubmissionYear = $row[9];
								break;
							}
						}

					//					

								
			}
			elseif (mysql_num_rows($rs1) > 0 && $StudentType == "New Student")
			{
				//Student is New Admission and paid in current financialyear ******
					while($row = mysql_fetch_row($rs1))
					{
						$LastPaymentReceiptNo = $row[0];
						$LastFeeSubmissionMonth = $row[6];
						$LastFeeSubmissionYear = $row[7];
						$LastBalanceAmount = $row[8];
						$FeeSubmissionYear = $row[9];
						
						break;
					}
					
						if ($LastFeeSubmissionMonth=="Mar")
						{
							$CurrentFinancialYear = $CurrentFinancialYear + 1;	
							$sql= "select x.* from (";							
							$sql = $sql . "SELECT `fees_amount` , `amountpaid` , `quarter`,`status`,`receipt`,`datetime`,`FeeMonth`,`FinancialYear`,`BalanceAmt`,`FeeYear` FROM `fees_monthwise` where  `sadmission`='$AdmissionNo' and `FinancialYear`='$CurrentFinancialYear' order by CAST(`FeeYear` AS UNSIGNED) desc";
							$sql = $sql . ") as `x` order by date_format(`FeeMonth`,'%b') desc";							
													
							$rs = mysql_query($sql);
							while($row = mysql_fetch_row($rs))
							{
								$LastPaymentReceiptNo = $row[4];
								$LastFeeSubmissionMonth = $row[6];
								$LastFeeSubmissionYear = $row[7];
								$LastBalanceAmount = $row[8];
								$FeeSubmissionYear = $row[9];
								break;
							}
						}												
			}	
			elseif (mysql_num_rows($rs1) == 0 && $StudentType == "New Student")
			{
				//Student is New Admission and not paid in current financialyear ******
				
						$LastFeeSubmissionMonth = "Mar";
						$LastFeeSubmissionYear = $CurrentFinancialYear-1;
						$FeeSubmissionYear = $CurrentFinancialYear;
						$LastBalanceAmount = 0;
							
							//Check Balance in Admission Fees********
							$sql = "SELECT `BalanceAmt` FROM `AdmissionFees` where  `sadmission`='$AdmissionNo'";				
							$rsBalance = mysql_query($sql);
							if (mysql_num_rows($rsBalance) > 0)
							{
								while($row = mysql_fetch_row($rsBalance))
								{
									$LastBalanceAmount=$row[0];
									break;
								}
							}
				
			}
			
			//echo $LastFeeSubmissionMonth."/".$LastFeeSubmissionYear."/".$CurrentFinancialYear;
			//exit();
			
//------------------------Retrieve Paid Balance amount and calculate current balance amount------------			
			$TotalPreviousBalancePaid=0;
			if ($LastPaymentReceiptNo != "")
			{
				$sql = "SELECT sum(`PaidBalanceAmt`) FROM `fees_transaction` where  `ReceiptNo`='$LastPaymentReceiptNo'";
				$rs = mysql_query($sql);
				if (mysql_num_rows($rs) > 0)
				{
					while($row = mysql_fetch_row($rs))
					{
						$TotalPreviousBalancePaid=$row[0];
					}
				}					
			}
			$CurrentBalanceAmt = ($LastBalanceAmount - $TotalPreviousBalancePaid);
//-------------------------End of Last Balance Amount -------------------------------------------------			
			//GET NEXT MONTH AND YEAR FOR FEE SUBMISSION

			//echo $LastFeeSubmissionYear ." / ".$SystemFinancialYear;
			
			
			for($i=1;$i<=12;$i++)
			{
			  //echo "Value is $value <br />";
			  if ($Month[$i] == $LastFeeSubmissionMonth)
			  {
			  	if ($i == 12)
			  	{
			  		$FeeSubmissionMonth = $Month[1];
			  		$FeeSubmissionYear=$FeeSubmissionYear+1;
			  		//$LastFeeSubmissionYear = $LastFeeSubmissionYear + 1;
			  	}
			  	elseif ($i == 3)
			  	{
			  		$FeeSubmissionMonth = $Month[$i+1];
			  		$LastFeeSubmissionYear = $LastFeeSubmissionYear + 1;
			  		
			  		if ($LastFeeSubmissionYear !=$SystemFinancialYear)
			  		{
			  			echo "<br><br><center><b>Current Financial Year is :".$LastFeeSubmissionYear." whereas the financial year is activated in system is ".$SystemFinancialYear." <br>Please activate the new financial to proceed further!";
			  			exit();
			  		}
			  		
			  	}
			  	else
			  	{$FeeSubmissionMonth = $Month[$i+1];}
			  }
			}
			
			//echo $LastFeeSubmissionYear. "-" . $SystemFinancialYear ;
			//exit();
//--------------------------------------------------End of Month and Year for Fee Payment--------------------------------

//------------------------Tution Fee,Transport Fee,Annual Charges--------------------------------------------------------
		if($SearchFeeInLastYear=="yes" && $previous_sclass=="")
		{
			echo "<br><center>Please note that New financial year has started but the student has not been promoted / detained<br> Please contact academic coordinator to promote or detain the student";
			exit();
		}
		if($SearchFeeInLastYear=="yes")
		{
			$ssql = "SELECT distinct `amount` FROM `fees_master` where `class`='$previous_sclass' and `quarter`='Q1' and `feeshead`='tuitionfees' and `financialyear`='$LastFeeSubmissionYear'";
		}
		else
		{
			$ssql = "SELECT distinct `amount` FROM `fees_master` where `class`='$class' and `quarter`='Q1' and `feeshead`='tuitionfees' and `financialyear`='$LastFeeSubmissionYear'";
		}			
		
		$rstution = mysql_query($ssql);

		while($row = mysql_fetch_row($rstution))
				{
					$TutionFee=$row[0];					
					$TutionFee = floor($TutionFee/3);
				}
		

		if($SearchFeeInLastYear=="yes")
		{
			$ssql = "SELECT distinct `amount` FROM `fees_master` where `class`='$previous_sclass' and `feeshead`='annualcharges'  and `financialyear`='$LastFeeSubmissionYear'";
		}
		else
		{
			$ssql = "SELECT distinct `amount` FROM `fees_master` where `class`='$class' and `feeshead`='annualcharges'  and `financialyear`='$LastFeeSubmissionYear'";
		}			

		$rsAnnual = mysql_query($ssql);

		while($row1 = mysql_fetch_row($rsAnnual))
				{
					$AnnualFee = $row1[0];										
				}


		
		
		$ssql = "SELECT distinct `routecharges`,`routeno` FROM `RouteMaster` where `financialyear`='$LastFeeSubmissionYear' and `routeno`=(SELECT `routeno` FROM `student_master` WHERE `sadmission`='$AdmissionNo')";
		
		
		//$ssql = "SELECT distinct `routecharges`,`routeno` FROM `RouteMaster` where `financialyear`='$CurrentFinancialYear' and `routeno`=(SELECT `routeno` FROM `student_master` WHERE `sadmission`='$AdmissionNo')";

		$rsTransport = mysql_query($ssql);

		if (mysql_num_rows($rsTransport) > 0)
		{
			while($row1 = mysql_fetch_row($rsTransport))
				{
					$TransportFee=$row1[0];	
					$TransportFee = floor($TransportFee/3);
					$RoutNo=$row1[1];				
				}
		}
		else
		{

			$ssql = "SELECT distinct `routecharges`,`routeno` FROM `RouteMaster` where `routeno`=(SELECT `routeno` FROM `NewStudentAdmission` WHERE `sadmission`='$AdmissionNo') and `financialyear`='$LastFeeSubmissionYear'";

			$rsTransport1 = mysql_query($ssql);

			while($row2 = mysql_fetch_row($rsTransport1))
				{

					$TransportFee=$row2[0];	
					$TransportFee=floor($TransportFee/3);
					$RoutNo=$row2[1];				

				}
		}

//-----------------------End of Tuetion Fee,Annual Fee,Transport Fee-----------------------------------------------------			
//---------------------Late Fee Calculation----------------------------------------------------------

	$now = time(); // Current Date time
	//$Dt1 = $LastFeeSubmissionYear . "-" . $FeeSubmissionMonth . "-" . "10";
	$Dt1 = $FeeSubmissionYear . "-" . $FeeSubmissionMonth . "-" . "10";
	
	$Dt1 = date('Y-m-d', strtotime($Dt1));
	
	$your_date = strtotime($Dt1);
	$datediff = $now - $your_date;
	if ($datediff > 0)
		$LateDays = floor($datediff/(60*60*24));
	else
		$LateDays = 0;
	
	$LateFee = $LateDays*10;
	
//---------------------End of Late Fee Calculation-------------------------------------------------------			
//-------------------- Previous Payment history----------------------------------------------------------
	//$ssql = "SELECT `FeeMonth`,`FeeYear`,`fees_amount`,`amountpaid`,`BalanceAmt`,`status`,`receipt`,DATE_FORMAT(`datetime`,'%d-%m-%Y') as `datetime`,`FinancialYear` FROM `fees_monthwise` where `sadmission`='$AdmissionNo' order by `FeeYear`,STR_TO_DATE(`FeeMonth`,'%b')";
	$ssql = "SELECT `FeeMonth`,`FeeYear`,`fees_amount`,`amountpaid`,`BalanceAmt`,`status`,`receipt`,DATE_FORMAT(`datetime`,'%d-%m-%Y') as `datetime`,`FinancialYear`,`date` FROM `fees_monthwise` where `sadmission`='$AdmissionNo' order by `date` desc limit 4";
	$rs = mysql_query($ssql);

			
//--------------------End of Previous payment history---------------------------------------------------

//------------------Check th Student is submitted fee for first time-------------------
	$ssql="select * from `fees` where `sadmission`='$AdmissionNo'";
	$rsChk = mysql_query($ssql);
	if (mysql_num_rows($rsChk) == 0)
	{
		$FirstTimeFeePaying = "yes";
	}
	else
	{$FirstTimeFeePaying = "no";}
//-------------------
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
	if (document.getElementById("txtTotalAmtPaying").value == "")
	{
		alert ("Please enter paying amount!");
		return;
	}
	if(isNaN(document.getElementById("txtTotalAmtPaying").value) == true)
	{
		alert ("Fee paying amount should be numeric only!");
		return;
	}
	if (parseInt(document.getElementById("txtTotalAmtPaying").value) > parseInt(document.getElementById("txtTotal").value))
	{
		alert ("Total paying amount can not be greater then payable amount!");
		return;
	}
	
	
	document.getElementById("frmFees").action="FeesReceiptMontwise.php";
	
	
	
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
			        	document.getElementById("txtPreviousBalance").value=BalanceAmt;
			        	document.getElementById("txtLateDays").value =LateDays;
			        	document.getElementById("currentrouteno").value=RoutNo;
			        	document.getElementById("tdRouteNo").innerHTML ="<strong>Current Route: " + RoutNo + "</strong>";
			        	document.getElementById("tdChangeRoute").innerHTML ="<strong><a href='Javascript:ChangeRoute();'>Change Route</a></strong>";
			        	
			        	if (LateDays !="")
			        	{
			        		document.getElementById("txtLateFee").value=50*LateDays;
			        		document.getElementById("txtAdjustedLateFee").value=50*LateDays;
			        		
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

	if (isNaN(document.getElementById("txtTuition").value)==true || document.getElementById("txtTuition").value=="")
	{
		TutionFee=0;
	}
	else
	{
		TutionFee=document.getElementById("txtTuition").value;
	}
	
	if (isNaN(document.getElementById("txtTransportFees").value)==true || document.getElementById("txtTransportFees").value=="")
	{
		TransportFees=0;
	}
	else
	{
		TransportFees=document.getElementById("txtTransportFees").value;
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
	
	if (document.getElementById("isAnnualChargApply").value == "yes")
	{
		if(isNaN(document.getElementById("txtAnnualFee").value)==true || document.getElementById("txtAnnualFee").value=="")
		{
			AnnualCharges=0;
		}
		else
		{
			AnnualCharges=parseInt(document.getElementById("txtAnnualFee").value);
		}
	}
	else
	{AnnualCharges=0;}
	//alert(AnnualCharges);
	//return;
	
	if (isNaN(document.getElementById("txtTuitionFeeDiscount").value)==true || document.getElementById("txtTuitionFeeDiscount").value =="")
	{
		TuitionFeeDiscount=0;
	}
	else
	{
		TuitionFeeDiscount=parseInt(document.getElementById("txtTuitionFeeDiscount").value);
	}
	
	
		TotalAmt1=parseInt(TutionFee)+parseInt(TransportFees)+parseInt(AdjustedLateFee)+parseInt(PreviousBalance)+parseInt(AnnualCharges)-parseInt(TuitionFeeDiscount);
		
	
	TotalAmt=parseInt(TutionFee) + parseInt(TransportFees) + parseInt(AdjustedLateFee) + parseInt(PreviousBalance) +parseInt(AnnualCharges) - parseInt(TuitionFeeDiscount);
	
	if (TotalAmt<0)
	{
		alert("Tution Fee discount can not be more then total fee payable!");
		document.getElementById("txtTuitionFeeDiscount").value="";
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

function CheckFinancialYear()
{
	if(parseInt(document.getElementById("txtFinancialYear").value) != parseInt(document.getElementById("cboFinancialYear").value))
	{
		//alert("Student admission year is " + document.getElementById("txtFinancialYear").value + " \n Fees for financial year " + document.getElementById("cboFinancialYear").value + " can not be selected!");
		document.getElementById("cboFinancialYear").value = document.getElementById("txtFinancialYear").value;
		return;
	}
}

function fnlTuitionFeeDiscount()
{
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
			        	
						CalculatTotal();
						//alert(rows);														
			        }
		      }
			var submiturl="GetFeeDiscount.php?discounttype=" + document.getElementById("cboTuitionFeeDiscountType").value + "&financialyear=" + document.getElementById("cboFinancialYear").value + "&discountreason=tuitionfees";
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
			return;
		}
		AmountPaying = document.getElementById("txtTotalAmtPaying").value;
	}
	
	document.getElementById("txtBalance").value = Total - AmountPaying;
}
function ShowReceipt(receiptno)
{
	var myWindow = window.open("ShowReceiptMonthWise.php?Receipt=" + receiptno ,"","width=700,height=650");	
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
	color: #000000;
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
	color: #000000;
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
.style3 {
	margin-left: 0px;
	font-family: Cambria;
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
.style7 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
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

.style15 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
}

.style16 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-size: 11pt;
}

.style17 {
	text-align: center;
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

.style18 {
	border-style: none;
	border-width: medium;
	text-align: right;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}

</style>

</head>



<body onload="Javascript:CalculatTotal();">

<p>&nbsp;</p>

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style20" style="height: 33px">

	

	
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
	
	<table border="1px" width="100%" height="42">
	
	
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
	
	
	
		<td style="width: 281px; height: 36px;" class="auto-style23">

		<span class="style5">Student Name</span><span class="auto-style1">
		</span>

		</td>

		<td style="width: 157px; height: 36px;" class="auto-style23">

		<input name="txtName" id="txtName" type="text" class="auto-style1" style="height: 22px" value="<?php echo $sname;?>" readonly="readonly" ></td>
	
		
		
		
	
		<td style="width: 157px; height: 36px;" class="auto-style41">

		&nbsp;</td>
	
		
		
		
	
		<td style="width: 179px; height: 36px;" class="style4">

		Class</td>

		<td style="height: 36px;" class="auto-style23">

		<input name="txtClass" id="txtClass" type="text" class="style3" style="width: 95px" value="<?php echo $class;?>" readonly="readonly"></td>
		
		
	
		<td style="width: 191px; height: 36px;" class="auto-style26">

		<span style="font-weight: 700; " class="auto-style1">
		Roll No</span><span class="auto-style1">
		</span>

		</td>
		
		

		<td style="height: 36px;" class="auto-style23">

		<input name="txtRollNo" id="txtRollNo" type="text" style="width: 83px" value="<?php echo $RollNo; ?>" readonly="readonly" class="auto-style1"></td>
		<br class="auto-style1">
		
		<br class="auto-style1">
		</tr>
		
		
		</table>
		<br class="auto-style37">


	
	
	
	<table border="1px" style="height: 40px" width="100%">
		
		
	<tr>
	
	
	
		<td style="width: 154px; height: 34px;" class="style2">

		Mode Of Payment</td>

	
	
		<td style="height: 34px;" class="auto-style22">

		<select name="cboPaymentMode" id="cboPaymentMode" style="width: 127px" onchange="Javascript:fnlPaymentMode();" class="auto-style1">
		<option selected="" value="Cash">Cash</option>
		<option value="Cheque">Cheque</option>
		<option value="Demand Draft">Demand Draft</option>
		</select></td>

		
		
		
	
		<td style="height: 34px; width: 167px" class="style18">

		Cheque Date:</td>

		
	
		
	
		<td style="height: 34px; width: 167px" class="style1">

		<input name="txtChequeDate" id="txtChequeDate" class="tcal" type="text" disabled="disabled"></td>

		
	
		
	
		<td style="height: 34px; width: 167px" class="style1">

		<strong>Cheque or DD#</strong></td>

		
	
		<td style="width: 99px; height: 34px;" class="auto-style25">

		<strong>

		<input name="txtChequeNo" id="txtChequeNo" type="text" class="auto-style1" style="width: 106px" readonly="readonly" ></strong></td>
		
		

		<td style="width: 155px; height: 34px;" class="auto-style26">

		<strong><span class="auto-style1">Bank Name</span></strong></td>
		
		<td style="height: 34px;" class="auto-style22">

		<!--
		<input name="txtBank" id="txtBank" type="text" style="width: 97px" readonly="readonly" class="auto-style37">
		-->
		<select name="cboBank" id="cboBank" disabled="true">
		<option value="" selected="selected" >Select One</option>
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
		
	
<table border="1" width="100%">

<tr>			
		

		<td style="height: 29px;" class="style10" colspan="4">

		<strong>Fees Heads</strong></td>

			</tr>
		
<tr>			
		

		<td style="width: 1883px; height: 38px;" class="style2">

		Financial Year</td>


		<td class="auto-style22" style="height: 38px" colspan="3">

		<input type="hidden" name="txtFinancialYear" id="txtFinancialYear" value="<?php echo $LastFeeSubmissionYear; ?>">
		
		<select name="cboFinancialYear" id="cboFinancialYear" onchange="javascript:CheckFinancialYear();" style="height: 22px">
				<option selected="" value="Select One">Select One</option>
				<?php
				while($rowFY = mysql_fetch_row($rsFY))
				{
							$Year=$rowFY[0];
							$FYear=$rowFY[1];
				?>
				<option value="<?php echo $Year; ?>" <?php if($LastFeeSubmissionYear==$Year) { echo "selected"; } ?>><?php echo $FYear; ?></option>
				<?php 
				}
				?>
				</select>
		<span class="style9">
		</span>
		</td>

			</tr>
		
<tr>			
		

		<td style="width: 1883px; height: 38px;" class="style2">

		Fees Payment for Month</td>


		<td class="auto-style22" style="height: 38px" colspan="3">
		<input name="txtMonth" id="txtMonth" type="text" value="<?php echo $FeeSubmissionMonth; ?>" readonly="readonly"></td>

			</tr>
		
<tr>			
		

		<td style="width: 1883px; height: 37px;" class="style2">

		Fees Payment for Year</td>


		<td style="width: 215px; height: 37px;" class="auto-style22" colspan="3">

		<input name="txtYear" id="txtYear" type="text" value="<?php echo $FeeSubmissionYear; ?>" readonly="readonly"></td>

			</tr>
		
<tr>			
		

		<td style="width: 1883px; height: 37px;" class="style2">

		Tuition Fees</td>


		<td style="width: 215px; height: 37px;" class="auto-style22" colspan="3">

		<input name="txtTuition" id="txtTuition" type="text" class="auto-style1" readonly="readonly" value="<?php echo $TutionFee; ?>" ></td>

			</tr>
		
<tr>			
		

		<td style="width: 1883px; height: 37px;" class="style2">

		Tuition Fees Discount Type</td>


		<td style="width: 215px; height: 37px;" class="auto-style22">



				<select name="cboTuitionFeeDiscountType" id="cboTuitionFeeDiscountType" onchange="Javascript:fnlTuitionFeeDiscount();">
				<option selected="" value="Select One">Select One</option>
				<?php
				while($row = mysql_fetch_row($rsDiscount))
				{
				?>
				<option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
				<?php
				}
				?>
				<!--
				<option value="Sibling - Second Girl Child">Sibling - Second Girl Child</option>
				<option value="Third Child">Third Child</option>
				<option value="Sibling - Third Girl Child">Sibling - Third Girl Child</option>
				<option value="Staff ward">Staff ward</option>
					
				<option value="Other">Other</option>	
				-->			
				</select></td>


		<td style="width: 215px; height: 37px;" class="style15">

		<strong>Tuition Fees Discount</strong></td>


		<td style="width: 215px; height: 37px;" class="auto-style22">

		<input name="txtTuitionFeeDiscount" id="txtTuitionFeeDiscount" type="text" readonly="readonly" onkeyup="Javascript:CalculatTotal();"></td>

			</tr>
		
		<?php
			if ($FeeSubmissionMonth == "Apr" && $StudentType = "Old Student")
			{
				$AnnualChargApply="yes";
		?>
		<tr id="trAnnualFee">

		<td style="width: 1883px; height: 36px;" class="style2">

		Annual Charges</td>

		<td style="width: 215px; height: 36px;" class="auto-style23">

		<input name="txtAnnualFee" id="txtAnnualFee" type="text" value="<?php echo $AnnualFee; ?>"></td>
		
		<td style="width: 215px; height: 36px;" class="auto-style23">
		 
		 </td>
		<td style="width: 215px; height: 36px;" class="auto-style36">
		
		</td>
		</tr>
		<?php
		}
		else
		{
			$AnnualChargApply="no";
		}
		?>
		<input type="hidden" name="isAnnualChargApply" id="isAnnualChargApply" value="<?php echo $AnnualChargApply; ?>">
		<tr>

		<td style="width: 1883px; height: 36px;" class="style2">

		Transport Fees</td>

		<td style="width: 215px; height: 36px;" class="auto-style23">



		<input name="txtTransportFees" id="txtTransportFees" type="text" class="auto-style1" readonly="readonly" value="<?php echo $TransportFee; ?>"></td>

			

		

		
		<td style="width: 215px; height: 36px;" class="auto-style23" id="tdRouteNo">
		 
		 <strong>Current Route: <?php echo $RoutNo; ?></strong>
		 
		 </td>

			

		

		
		<td style="width: 215px; height: 36px;" class="auto-style36" id="tdChangeRoute">
		
		<strong><a href='Javascript:ChangeRoute();'>Change Route</a></strong>
		
		
		</td>

			

		

		
		</tr>
		
<tr>
		<td style="width: 1883px; height: 37px;" class="style8">

		Actual
		Late Fees Charge</td>

		<td style="width: 300px; height: 37px;" class="auto-style24">



		<input name="txtLateFee" id="txtLateFee" type="text" class="auto-style1" readonly="readonly" value="<?php echo $LateFee; ?>" ></td>

		<td style="width: 215px; height: 37px;" class="style8">



		Actual Delay
		Days:</td>

		<td style="width: 215px; height: 37px;" class="auto-style24">

			<input name="txtLateDays" id="txtLateDays" type="text" readonly="readonly" style="width: 120px" value="<?php echo $LateDays; ?>"><span class="auto-style37">
			</span>
		</td>

	</tr>
		
<tr>
		<td style="width: 1883px; height: 37px;" class="style8">

		&nbsp;Late Fees Charge to be paid</td>

		<td style="width: 300px; height: 37px;" class="auto-style24">



		<input name="txtAdjustedLateFee" id="txtAdjustedLateFee" type="text" class="auto-style1" value="<?php echo $LateFee; ?>"></td>

		<td style="width: 215px; height: 37px;" class="style8">



		Adjusted Delay
		Days:</td>

		<td style="width: 215px; height: 37px;" class="auto-style24">

			<input name="txtAdjustedLateDays" id="txtAdjustedLateDays" type="text" onkeyup="Javascript:CalculateLateFee();" style="width: 119px" value="<?php echo $LateDays; ?>"><span class="auto-style37">
			</span>
		</td>

	</tr>
	

	<?php 

	if ($Message1 !="")

	{

	?>

	<?php 

	}

	?>

	

<tr>
		<td style="width: 1883px; height: 33px;" class="style8">

		Previous Balance</td>

		<td style="width: 215px; height: 33px;" class="auto-style24" colspan="3">



		<input name="txtPreviousBalance" id="txtPreviousBalance" type="text" class="auto-style1" <?php if($FirstTimeFeePaying == "no") { ?> readonly="readonly" <?php } ?> value="<?php echo $CurrentBalanceAmt; ?>" onkeyup="Javascript:CalculatTotal();"></td>

	</tr>

	

	<tr>

		<td style="height: 29px; width: 1883px;" class="style7">

		Remarks</td>

		<td style="height: 29px;" class="auto-style14" colspan="3">



		<textarea name="txtRemarks" id="txtRemarks" rows="2" style="width: 525px" class="auto-style1"></textarea></td>

	</tr>

	

	<tr>

		<td style="height: 29px; width: 1883px;" class="style4">

		Total Fees Payable</td>

		<td style="height: 29px;" class="auto-style14" colspan="3">



		<input name="txtTotal" id="txtTotal" type="text" class="auto-style1" readonly="readonly"></td>

	</tr>

	

	<tr>

		<td style="height: 29px; width: 1883px;" class="style4">

		Total Fees Paid</td>

		<td style="height: 29px;" class="auto-style14">



		<input name="txtTotalAmtPaying" id="txtTotalAmtPaying" type="text" onkeyup="Javascript:CalculateBalance();"></td>

		<td style="height: 29px;" class="style16">



		<strong>Balance</strong></td>

		<td style="height: 29px;" class="auto-style14">



		<input name="txtBalance" id="txtBalance" type="text"></td>

	</tr>

	<tr>

		<td style="height: 29px;" colspan="4" class="auto-style5">

		<strong>

		<input name="BtnSubmit" type="button" value="Preview" onclick="Javascript:Validate('Preview');" class="auto-style15">
		<input name="BtnSubmit" type="button" value="Submit" onclick="Javascript:Validate('Final');" class="auto-style15"><span class="auto-style37">
		</span>
		</strong></td>

	</tr>

		

</table>
		<span class="auto-style37">
<!--
</form>
-->
		</span>
<br class="auto-style37">


	
	
	
		<br class="auto-style37"><br class="auto-style1">

<table width="100%" class="style14">

<tr>			
		

		<td style="height: 5px;" class="style13" colspan="9">

		Payment History</td>

			</tr>
		
<tr>			
		

		<td style="height: 16px; width: 138px;" class="style12">

		<strong>Fees Payment Month</strong></td>


		<td style="height: 16px; width: 138px;" class="style12">

		<strong>Fees Payment Year</strong></td>


		<td style="height: 16px; width: 138px;" class="style12">

		<strong>Fee Payable</strong></td>


		<td style="height: 16px; width: 138px;" class="style12">

		<strong>Fee Paid</strong></td>


		<td style="height: 16px; width: 138px;" class="style12">

		<strong>Balance</strong></td>


		<td style="height: 16px; width: 138px;" class="style12">

		<strong>Payment Status</strong></td>


		<td style="height: 16px; width: 138px;" class="style12">

		<strong>Receipt #</strong></td>


		<td style="height: 16px; width: 138px;" class="style12">

		<strong>Fees Payment Date</strong></td>


		<td style="height: 16px; width: 139px;" class="style12">

		<strong>Financial Year</strong></td>


		<td style="height: 16px; width: 139px;" class="style12">

		<strong>Print Receipt</strong></td>

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
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $FeeMonth; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $FeeYear; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $FeePayable; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $FeePaid; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $Balance; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $status; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $receipt; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $datetime; ?></td>
		<td style="width: 139px; height: 20px;" class="style17"><?php echo $FinancialYear; ?></td>
		<td style="width: 139px; height: 20px;">
			<input name="PrintQ1Receipt" style="height: 29px; width: 99px;" type="button" value="Print Reciept" class="auto-style1" onclick="Javascript:ShowReceipt('<?php echo $receipt; ?>');"><span class="style6">
			</span>
		</td>

</tr>
<?php
					
					
			$sqlPB = "SELECT `FeeMonth`,`FeeYear`,`PreviousBalance` as `fees_amount`,`PaidBalanceAmt` as `amountpaid`,`CurrentBalance` as `BalanceAmt`,`PBalanceReceiptNo`,DATE_FORMAT(`datetime`,'%d-%M-%Y') as `datetime`,(SELECT `financialyear` FROM `FYmaster` where `year`=a.`FinancialYear`) as `FinancialYear` FROM `fees_transaction` a where `PBalanceReceiptNo` !='' and `ReceiptNo`='$receipt' order by `datetime` desc";
			$rsPB = mysql_query($sqlPB);
				if (mysql_num_rows($rsPB) > 0)
				{
					while($rowPB = mysql_fetch_row($rsPB))
					{
					$BalanceFeeMonth="";	
					$BalanceFeeYear="";
					$BalanceFeePayable="";
					$BalanceFeePaid="";
					$BalanceBalance="";
					$Balancestatus="";	
					$Balancereceipt="";	
					$Balancedatetime="";	
					$BalanceFinancialYear="";	
											
					$BalanceFeeMonth=$rowPB[0];	
					$BalanceFeeYear=$rowPB[1];
					$BalanceFeePayable=$rowPB[2];
					$BalanceFeePaid=$rowPB[3];
					$BalanceBalance=$rowPB[4];
					$Balancestatus1="";	
					$BalancereceiptNo=$rowPB[5];	
					$Balancedatetime=$rowPB[6];	
					$BalanceFinancialYear=$rowPB[7];	
					
	?>
<tr>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $BalanceFeeMonth; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $BalanceFeeYear; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $BalanceFeePayable; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $BalanceFeePaid; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $BalanceBalance; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $Balancestatus1; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $BalancereceiptNo; ?></td>
		<td style="width: 138px; height: 20px;" class="style17"><?php echo $Balancedatetime; ?></td>
		<td style="width: 139px; height: 20px;" class="style17"><?php echo $BalanceFinancialYear; ?></td>
		<td style="width: 139px; height: 20px;">
			<input name="PrintQ1Receipt" style="height: 29px; width: 99px;" type="button" value="Print Reciept" class="auto-style1" onclick="Javascript:ShowReceipt('<?php echo $receipt; ?>');"><span class="style6">
			</span>
		</td>

</tr>
			<?php
				}//close of while loop
			}//Close of If Statement
			?>
<?php
}
?>		
			

</table>	
</form>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>



</body>



</html>