<?php
include '../../connection.php';
session_start();
?>
<?php
$Class=$_REQUEST["Class"];

   //$sql = "SELECT distinct `MasterClass` FROM `class_master`";
   $sql = "SELECT distinct `MasterClass` FROM `class_master` where `class`='$Class'";
   $rsClass = mysql_query($sql, $Con);
   while($row = mysql_fetch_row($rsClass))
	{
		$MasterClass=$row[0];
		break;
	}
	
   
   $sql = "SELECT distinct `year`,`financialyear` FROM `FYmaster` where `Status`='Active'";
   $rsFy = mysql_query($sql, $Con);
   while($row = mysql_fetch_row($rsFy))
		{
			$CurrentFinancialYr=$row[0];
			break;
		}
		
   //echo "select `sadmission`,`sclass`,`srollno`,`sname`,`FinancialYear`,`routeno`,`Hostel`,`DiscontType`,`MasterClass`,`HostelFY`,`Computer` From `student_master` where `sclass`='$Class' and `sadmission` not in (select distinct `sadmission` from `fees_student1`)";
   //exit();

 	$rsStudent=mysql_query("select `sadmission`,`sclass`,`srollno`,`sname`,`FinancialYear`,`routeno`,`Hostel`,`DiscontType`,`MasterClass`,`HostelFY`,`Computer` From `student_master` where `sclass`='$Class' and `sadmission` not in (select distinct `sadmission` from `fees_student1` where `financialyear`='$CurrentFinancialYr')");
   //$rsStudent=mysql_query("select `sadmission`,`sclass`,`srollno`,`sname`,`FinancialYear`,`routeno`,`Hostel`,`DiscontType`,`MasterClass`,`HostelFY`,`Computer` From `student_master` where `sadmission` not in (select distinct `sadmission` from `fees_student1`)");
   while($row = mysql_fetch_row($rsStudent))
		{
					$sadmission=$row[0];
					$sclass=$row[1];
					//$Class=$row[1];
					$srollno=$row[2];
					$sname=$row[3];
					$FinancialYear=$row[4];
					$routeno=$row[5];
					$Hostel=$row[6];
					$DiscountType=$row[7];
					$MasterClass=$row[8];
					$HostelFY=$row[9];
					$Computer=$row[10];
					
					if($FinancialYear==$CurrentFinancialYr)
					{
						$StudentType="new";
					}
					else
					{
						$StudentType="old";
					}
						
					
					
					if ($StudentType=="new")
					{
						$ssql="select `feeshead`,`amount`,`financialyear` from `fees_master` where `StudentType` in ('old','new') and `class`='$MasterClass'";
					}
					else
					{
						$ssql="select `feeshead`,`amount`,`financialyear` from `fees_master` where `StudentType`= '$StudentType' and `class`='$MasterClass'";	
					} 
					 //echo $ssql;
					 //exit();
					
					if($HostelFY==$CurrentFinancialYr)
					{
						//$StudentType="new";
						$ssqlHostel="select `feeshead`,`amount`,`financialyear` from `fees_hostelmaster` where `StudentType`='new'";
					}
					else
					{
						$ssqlHostel="select `feeshead`,`amount`,`financialyear` from `fees_hostelmaster` where `StudentType`='old'";
					}
					
					
				$DiscountAmount=0;
				$ActualFeeHeadAmount=0;
				$rsFeeComponent=mysql_query($ssql);
				while($row1 = mysql_fetch_row($rsFeeComponent))
					{
						$feeshead=$row1[0];
						
							$DiscountPercent=0;
							if($DiscountType !="")
							{
								$rsDiscount=mysql_query("select `percentage` from `discounttable` where `discounttype`='$feeshead' and `head`='$DiscountType' and `StudentType`= '$StudentType' and `financialyear`='$CurrentFinancialYr'");
								if (mysql_num_rows($rsDiscount) > 0)
								{
									while($row2 = mysql_fetch_row($rsDiscount))
									{
										$DiscountPercent=$row2[0];
										break;
									}
								}
							}
						
						$ActualFeeHeadAmount=$row1[1];
						$DiscountAmount=$row1[1] * ($DiscountPercent/100);
						$amount=$row1[1]-$row1[1] * ($DiscountPercent/100);
						
						$financialyear=$row1[2];
						
						if($feeshead=="computerfees" || $feeshead=="COMPUTER FEES (OPTIONAL)")
						{
							if($Computer=="Yes")
							{
								mysql_query("INSERT INTO `fees_student1` (`sadmission`,`class`,`Name`,`feeshead`,`actualamount`,`discountamount`,`amount`,`financialyear`,`StudentType`,`FeesType`,`DiscountType`,`AdmissionFY`) VALUES ('$sadmission','$Class','$sname','$feeshead','$ActualFeeHeadAmount','$DiscountAmount','$amount','$financialyear','$StudentType','Regular','$DiscountType','$FinancialYear')");
							}
						}
						else
						{
							mysql_query("INSERT INTO `fees_student1` (`sadmission`,`class`,`Name`,`feeshead`,`actualamount`,`discountamount`,`amount`,`financialyear`,`StudentType`,`FeesType`,`DiscountType`,`AdmissionFY`) VALUES ('$sadmission','$Class','$sname','$feeshead','$ActualFeeHeadAmount','$DiscountAmount','$amount','$financialyear','$StudentType','Regular','$DiscountType','$FinancialYear')");
						}							
					}
				
				if($StudentType=="new")
				{
					$rsA=mysql_query("select `TxnAmount`,`sclass`,`AdmissionDate` from `NewStudentAdmission` where `sadmission`='$sadmission'");
					$rowA=mysql_fetch_row($rsA);
					$AdvanceHeadAmt=$rowA[0];
					$AdmissionClass=$rowA[1];
					$AdmissionDate=$rowA[2];
					$CompareDate=$CurrentFinancialYr."-03-31";
					if($AdvanceHeadAmt !="")
						{
							if($AdmissionClass=="11th")
							{
								//mysql_query("INSERT INTO `fees_student1` (`sadmission`,`class`,`Name`,`feeshead`,`actualamount`,`discountamount`,`amount`,`financialyear`,`StudentType`,`FeesType`,`DiscountType`,`AdmissionFY`) VALUES ('$sadmission','$Class','$sname','PROVISIONAL AMOUNT','25000','','25000','$financialyear','$StudentType','','$DiscountType','$FinancialYear')");
								//mysql_query("INSERT INTO `fees_student1` (`sadmission`,`class`,`Name`,`feeshead`,`actualamount`,`discountamount`,`amount`,`financialyear`,`StudentType`,`FeesType`,`DiscountType`,`AdmissionFY`) VALUES ('$sadmission','$Class','$sname','Advances','41000','','41000','$financialyear','$StudentType','','$DiscountType','$FinancialYear')");
							}
							else
							{
								if($AdmissionDate>=$CompareDate)
									mysql_query("INSERT INTO `fees_student1` (`sadmission`,`class`,`Name`,`feeshead`,`actualamount`,`discountamount`,`amount`,`financialyear`,`StudentType`,`FeesType`,`DiscountType`,`AdmissionFY`) VALUES ('$sadmission','$Class','$sname','FEES FIRST INSTALLMENT','$AdvanceHeadAmt','','$AdvanceHeadAmt','$financialyear','$StudentType','','$DiscountType','$FinancialYear')");
								else
									mysql_query("INSERT INTO `fees_student1` (`sadmission`,`class`,`Name`,`feeshead`,`actualamount`,`discountamount`,`amount`,`financialyear`,`StudentType`,`FeesType`,`DiscountType`,`AdmissionFY`) VALUES ('$sadmission','$Class','$sname','Advances','$AdvanceHeadAmt','','$AdvanceHeadAmt','$financialyear','$StudentType','','$DiscountType','$FinancialYear')");
							}
						}
				}
				/*
				if($Hostel=="Yes")
				{
					$rsHostel=mysql_query($ssqlHostel);
					while($row2 = mysql_fetch_row($rsHostel))
					{
							$feeshead=$row2[0];
							$amount=$row2[1];
							$financialyear=$row2[2];
							mysql_query("INSERT INTO `fees_student1` (`sadmission`,`class`,`Name`,`feeshead`,`actualamount`,`amount`,`financialyear`,`StudentType`,`FeesType`,`DiscountType`,`AdmissionFY`) VALUES ('$sadmission','$Class','$sname','$feeshead','$amount','$amount','$financialyear','$StudentType','Hostel','$DiscountType','$FinancialYear')");
					}
				}
				*/
				if($routeno !="")					
				{
					$rsTransport=mysql_query("select distinct `feeshead`,sum(`Amount`) from `fees_transportmaster` where `sadmission`='$sadmission' and `financialyear`='$financialyear' group by `feeshead`");
					//$rsTransport=mysql_query("select `Route`,`Amount`,`financialyear`,`feeshead` from `fees_transportmaster` where `Route`='$routeno' limit 1");
					while($row2 = mysql_fetch_row($rsTransport))
					{
						//$Route=$row2[0];
						//$BusStop=$row2[1];
						$amount=$row2[1];
						
						//$financialyear=$row2[2];
						$feeshead=$row2[0];
						mysql_query("INSERT INTO `fees_student1` (`sadmission`,`class`,`Name`,`feeshead`,`actualamount`,`amount`,`financialyear`,`StudentType`,`FeesType`,`DiscountType`,`AdmissionFY`) VALUES ('$sadmission','$Class','$sname','$feeshead','$amount','$amount','$financialyear','$StudentType','Regular','$DiscountType','$FinancialYear')");
					}

				}
				
				$rsCloseAmtCreditDebit=mysql_query("select `FeesType`,`amount` from `student_cr_dr_amount` where `sadmission`='$sadmission' and `FeesType` in ('CLOSE AMOUNT CREDIT','CLOSE AMOUNT DEBIT')");
				while($rowC=mysql_fetch_row($rsCloseAmtCreditDebit))
				{
					$feeshead=$rowC[0];
					$amount=$rowC[1];
					mysql_query("INSERT INTO `fees_student1` (`sadmission`,`class`,`Name`,`feeshead`,`actualamount`,`amount`,`financialyear`,`StudentType`,`FeesType`,`DiscountType`,`AdmissionFY`) VALUES ('$sadmission','$Class','$sname','$feeshead','$amount','$amount','$financialyear','$StudentType','','$DiscountType','$FinancialYear')");
				}
				
				
		}
echo "<br><br><center><b> Fee has been defined successfully!,<br>Click <a href='javascript:window.close();'>here</a> to close window!";			
?> 