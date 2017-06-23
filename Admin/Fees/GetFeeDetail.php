<?php include '../../connection.php';?>

<?php
$Class=$_REQUEST["Class"];

$Quarter=$_REQUEST["Quarter"];

$sAdmission=$_REQUEST["sadmission"];



if ($_REQUEST["FinancialYear"]=="")

{

	$FinancialYear ="2014";

}

else

{

	$FinancialYear = $_REQUEST["FinancialYear"];

}



		$ssql = "SELECT distinct `amount` FROM `fees_master` where `class`='$Class' and `quarter`='$Quarter' and `feeshead`='tuitionfees' and `financialyear`='$FinancialYear'";

		$rstution = mysql_query($ssql );

		while($row = mysql_fetch_row($rstution))

				{

					$TutionFee=$row[0];					

				}

		

		$ssql = "SELECT distinct `amount` FROM `fees_master` where `class`='$Class' and `feeshead`='annualcharges'  and `financialyear`='$FinancialYear'";

		

		$rsAnnual = mysql_query($ssql);

		while($row1 = mysql_fetch_row($rsAnnual))

				{

					$AnnualFee = $row1[0];					

				}

						

		

		$ssql = "SELECT distinct `routecharges`,`routeno` FROM `RouteMaster` where `routeno`=(SELECT `routeno` FROM `student_master` WHERE `sadmission`='$sAdmission')";

		$rsTransport = mysql_query($ssql);

		if (mysql_num_rows($rsTransport) > 0)

		{

			while($row1 = mysql_fetch_row($rsTransport))

				{

					$TransportFee=$row1[0];	

					$RoutNo=$row1[1];				

				}

		}

		else

		{

			$ssql = "SELECT distinct `routecharges`,`routeno` FROM `RouteMaster` where `routeno`=(SELECT `routeno` FROM `NewStudentAdmission` WHERE `sadmission`='$sAdmission') and `financialyear`='$FinancialYear'";

			$rsTransport1 = mysql_query($ssql);

			while($row2 = mysql_fetch_row($rsTransport1))

				{

					$TransportFee=$row2[0];	

					$RoutNo=$row2[1];				

				}

		

		}

				

		

		if ($Quarter=="Q1")
		{

			 $now = time(); // or your date as well

		     //$now = date("Y-m-d");

		     

		     //COMMENTED ON 7-SEP-2014

		     //$your_date = strtotime("2014-04-10");

		     $your_date = strtotime($FinancialYear . "-04-10");

		     

		     

		     $datediff = $now - $your_date;

		     $days = floor($datediff/(60*60*24));

			 if ($days<0) {$days=0;}

			 $LateDaysFinal=$days;

		}

		

		if ($Quarter=="Q2")

		{

			$now = time(); // or your date as well

		     //$now = date("Y-m-d");

		     

		     //COMMENTED ON 7-SEP-2014

		     //$your_date = strtotime("2014-07-10");

		     $your_date = strtotime($FinancialYear . "-07-10");

		     

		     $datediff = $now - $your_date;

		     $days = floor($datediff/(60*60*24));

		     if ($days<0) {$days=0;}

			 $LateDaysFinal=$days;

			

			$ssql = "SELECT `BalanceAmt` FROM `fees` where `sadmission`='$sAdmission' and `quarter`='Q1' and `FinancialYear`='$FinancialYear'";

			//$rsBalance = mysql_query($ssql);

			

			if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

			if(mysql_num_rows($rsBalance)>0)
			{
				while($row = mysql_fetch_row($rsBalance))
					{
						$BalanceAmt=$row[0];
						break;
					}
				//$BalanceAmt=0;

			}
			else
			{

				$ssql = "SELECT `amount` FROM `fees_master` where `class`=(select `sclass` from `student_master` where `sadmission`='$sAdmission') and `feeshead`='tuitionfees' and `quarter`='Q1' and `financialyear`='$FinancialYear'";

				if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

				$BalanceAmt=0;

				if(mysql_num_rows($rsBalance)>0)
				{

					while($row1 = mysql_fetch_row($rsBalance))
					{
						$BalanceAmt=$row1[0];					

					}

				}

				$ssql = "SELECT `routecharges` FROM `RouteMaster` where `routeno`=(select `routeno` from `student_master` where `sadmission`='$sAdmission')";

				if (!$rsRoute = mysql_query($ssql))     die("Record Not Found");

				if(mysql_num_rows($rsRoute)>0)
				{
					while($row1 = mysql_fetch_row($rsRoute))
					{
						$BalanceAmt=$BalanceAmt + $row1[0];					
					}
				}
			 

				 $now = time(); // or your date as well

			     //$now = date("Y-m-d");

			     

			     //COMMENTED ON 7-SEP-2014

		     	//$your_date = strtotime("2014-04-10");

		     	$your_date = strtotime($FinancialYear . "-04-10");			     

			     $datediff = $now - $your_date;

			     $days = floor($datediff/(60*60*24));

				 $LateDays=$days;			

				 $LateFee=$LateDays*50;

				 $BalanceAmt=$BalanceAmt + LateFee;
			}

		}

		if ($Quarter=="Q3")
		{

			 //COMMENTED ON 7-SEP-2014

		     //$your_date = strtotime("2014-10-10");

		     $your_date = strtotime($FinancialYear . "-10-10");

			 

		     $datediff = $now - $your_date;

		     $days = floor($datediff/(60*60*24));

		     if ($days<0) {$days=0;}

			 $LateDaysFinal=$days;

		

			$ssql = "SELECT `BalanceAmt` FROM `fees` where `sadmission`='$sAdmission' and `quarter`='Q2' and `FinancialYear`='$FinancialYear'";

			if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

			//FEE SUBMITED FOR Q2

			$BalanceAmt=0;
			if(mysql_num_rows($rsBalance)>0)
			{
				
				while($row1 = mysql_fetch_row($rsBalance))
				{
					$BalanceAmt=$row1[0];
				}
			}
			else
			{
				//Not Submitted in Q2 then check for Q1
				
				$ssql = "SELECT `BalanceAmt` FROM `fees` where `sadmission`='$sAdmission' and `quarter`='Q1' and `FinancialYear`='$FinancialYear'";

				if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

				if(mysql_num_rows($rsBalance)>0)
				{
					//FEE NOT SUBMITED FOR Q2 but submitted in Q1
					while($row1 = mysql_fetch_row($rsBalance))
					{
						$BalanceAmt=$row1[0];
					}
						$ssql = "SELECT `amount` FROM `fees_master` where `class`=(select `sclass` from `student_master` where `sadmission`='$sAdmission') and `feeshead`='tuitionfees' and `quarter`='Q2' and `financialyear`='$FinancialYear'";

						if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

						if(mysql_num_rows($rsBalance)>0)
						{

							while($row1 = mysql_fetch_row($rsBalance))
							{

								$BalanceAmt=$BalanceAmt + $row1[0];					

							}

						}

						$ssql = "SELECT `routecharges` FROM `RouteMaster` where `routeno`=(select `routeno` from `student_master` where `sadmission`='$sAdmission')";

						if (!$rsRoute = mysql_query($ssql))     die("Record Not Found");

						if(mysql_num_rows($rsRoute)>0)
						{

							while($row1 = mysql_fetch_row($rsRoute))

							{

								$BalanceAmt=$BalanceAmt + $row1[0];					

							}

						}

						 

						 $now = time(); // or your date as well

					     //$now = date("Y-m-d");

					     

					     //COMMENTED ON 7-SEP-2014

		     			//$your_date = strtotime("2014-07-10");

		     			$your_date = strtotime($FinancialYear . "-07-10");
				     

					     $datediff = $now - $your_date;

					     $days = floor($datediff/(60*60*24));

					     if ($days<0) {$days=0;}

						 $LateDays=$days;			

						 $LateFee1=$LateDays*10;

						 $BalanceAmt=$BalanceAmt + $LateFee1;	
					
				}
			}
		}

		if ($Quarter=="Q4")

		{

			 $your_date = strtotime("2015-1-10");

		     $datediff = $now - $your_date;

		     $days = floor($datediff/(60*60*24));

			 if ($days<0) {$days=0;}

			 $LateDaysFinal=$days;

			 

			 		////////////////

			 		$ssql = "SELECT * FROM `fees` where `sadmission`='$sAdmission' and `quarter`='Q1'";



					if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

					//FEE SUBMITED FOR Q1

					if(mysql_num_rows($rsBalance)>0)

					{

						

						$BalanceAmt=0;

						$ssql = "SELECT * FROM `fees` where `sadmission`='$sAdmission' and `quarter`='Q2'";

						if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

						if(mysql_num_rows($rsBalance)>0)

						{

							//FEE SUBMITED FOR Q1 AND Q2 BOTH

							$BalanceAmt=0;

							$ssql = "SELECT * FROM `fees` where `sadmission`='$sAdmission' and `quarter`='Q3'";

							if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

							if(mysql_num_rows($rsBalance)<=0)

							{

								//FEE SUBMITE FOR Q1,Q2 BUT NOT FOR Q3

								$ssql = "SELECT `amount` FROM `fees_master` where `class`=(select `sclass` from `student_master` where `sadmission`='$sAdmission') and `feeshead`='tuitionfees' and `quarter`='Q3' and `financialyear`='$FinancialYear'";

								if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

								$BalanceAmt=0;

								if(mysql_num_rows($rsBalance)>0)

								{

									while($row1 = mysql_fetch_row($rsBalance))

									{

										$BalanceAmt=$row1[0];					

									}

								}

								$ssql = "SELECT `routecharges` FROM `RouteMaster` where `routeno`=(select `routeno` from `student_master` where `sadmission`='$sAdmission')";

								if (!$rsRoute = mysql_query($ssql))     die("Record Not Found");

								if(mysql_num_rows($rsRoute)>0)

								{

									while($row1 = mysql_fetch_row($rsRoute))

									{

										$BalanceAmt=$BalanceAmt + $row1[0];					

									}

								}

								 

								 $now = time(); // or your date as well

							     //$now = date("Y-m-d");

							     

							     //COMMENTED ON 7-SEP-2014

						     	//$your_date = strtotime("2014-10-10");

						     	$your_date = strtotime($FinancialYear . "-10-10");

							     

							     

							     $datediff = $now - $your_date;

							     $days = floor($datediff/(60*60*24));

							     if ($days<0) {$days=0;}

								 $LateDays=$days;			

								 $LateFee1=$LateDays*50;

								 $BalanceAmt=$BalanceAmt + $LateFee1;							

							 }

							

						}

						else

						{

								//FEE SUBMITE FOR Q1 BUT NOT FOR Q2

								$ssql = "SELECT `amount` FROM `fees_master` where `class`=(select `sclass` from `student_master` where `sadmission`='$sAdmission') and `feeshead`='tuitionfees' and `quarter`='Q2' and `financialyear`='$FinancialYear'";

								if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

								$BalanceAmt=0;

								if(mysql_num_rows($rsBalance)>0)

								{

									while($row1 = mysql_fetch_row($rsBalance))

									{

										$BalanceAmt=$row1[0];					

									}

								}

								$ssql = "SELECT `routecharges` FROM `RouteMaster` where `routeno`=(select `routeno` from `student_master` where `sadmission`='$sAdmission')";

								if (!$rsRoute = mysql_query($ssql))     die("Record Not Found");

								if(mysql_num_rows($rsRoute)>0)

								{

									while($row1 = mysql_fetch_row($rsRoute))

									{

										$BalanceAmt=$BalanceAmt + $row1[0];					

									}

								}

								 

								 $now = time(); // or your date as well

							     //$now = date("Y-m-d");

							     //COMMENTED ON 7-SEP-2014

						     	//$your_date = strtotime("2014-07-10");

						     	$your_date = strtotime($FinancialYear . "-07-10");

							     

							     

							     $datediff = $now - $your_date;

							     $days = floor($datediff/(60*60*24));

							     if ($days<0) {$days=0;}

								 $LateDays=$days;			

								 $LateFee1=$LateDays*50;

								 $BalanceAmt=$BalanceAmt + $LateFee1;	

								 

								 ////FEE SUBMITE FOR Q1 BUT NOT FOR Q2 AND Q3 ALSO

								 		$ssql = "SELECT * FROM `fees` where `sadmission`='$sAdmission' and `quarter`='Q3'";

										if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

										if(mysql_num_rows($rsBalance)<=0)

										{

											//FEE SUBMITE NOT FOR Q3

											$ssql = "SELECT `amount` FROM `fees_master` where `class`=(select `sclass` from `student_master` where `sadmission`='$sAdmission') and `feeshead`='tuitionfees' and `quarter`='Q3' and `financialyear`='$FinancialYear'";

											if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

											if(mysql_num_rows($rsBalance)>0)

											{

												while($row1 = mysql_fetch_row($rsBalance))

												{

													$BalanceAmt= $BalanceAmt + $row1[0];					

												}

											}

											$ssql = "SELECT `routecharges` FROM `RouteMaster` where `routeno`=(select `routeno` from `student_master` where `sadmission`='$sAdmission')";

											if (!$rsRoute = mysql_query($ssql))     die("Record Not Found");

											if(mysql_num_rows($rsRoute)>0)

											{

												while($row1 = mysql_fetch_row($rsRoute))

												{

													$BalanceAmt=$BalanceAmt + $row1[0];					

												}

											}

											 

											 $now = time(); // or your date as well

										     //$now = date("Y-m-d");

										     //COMMENTED ON 7-SEP-2014

						     				//$your_date = strtotime("2014-10-10");

						     				$your_date = strtotime($FinancialYear . "-10-10");

										     

										     

										     $datediff = $now - $your_date;

										     $days = floor($datediff/(60*60*24));

										     if ($days<0) {$days=0;}

											 $LateDays=$days;			

											 $LateFee1=$LateDays*50;

											 $BalanceAmt=$BalanceAmt + $LateFee1;							

										 }

								 

								 

								 /////

								 

								 

						}	

						

					}

					else

					{

						////// IF FEE DOES NOT SUBMITED FOR Q1				

							$ssql = "SELECT `amount` FROM `fees_master` where `class`=(select `sclass` from `student_master` where `sadmission`='$sAdmission') and `feeshead`='tuitionfees' and `quarter`='Q1' and `financialyear`='$FinancialYear'";

							if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

							$BalanceAmt=0;

							if(mysql_num_rows($rsBalance)>0)

							{

								while($row1 = mysql_fetch_row($rsBalance))

								{

									$BalanceAmt=$row1[0];					

								}

							}

							$ssql = "SELECT `routecharges` FROM `RouteMaster` where `routeno`=(select `routeno` from `student_master` where `sadmission`='$sAdmission')";

							if (!$rsRoute = mysql_query($ssql))     die("Record Not Found");

							if(mysql_num_rows($rsRoute)>0)

							{

								while($row1 = mysql_fetch_row($rsRoute))

								{

									$BalanceAmt=$BalanceAmt + $row1[0];					

								}

							}

							 

							 $now = time(); // or your date as well

						     //$now = date("Y-m-d");

						     

						     //COMMENTED ON 7-SEP-2014

						     //$your_date = strtotime("2014-04-10");

						     $your_date = strtotime($FinancialYear . "-04-10");

						     				

						     

						     $datediff = $now - $your_date;

						     $days = floor($datediff/(60*60*24));

						     if ($days<0) {$days=0;}

							 $LateDays=$days;			

							 $LateFee1=$LateDays*50;

							 $BalanceAmt=$BalanceAmt + $LateFee1;

							 

						 ////// IF FEE DOES NOT SUBMITED FOR Q1 AND Q2 ALSO SO CALCULATE HERE FOR Q2

						 	$ssql = "SELECT * FROM `fees` where `sadmission`='$sAdmission' and `quarter`='Q2'";

								if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

								if(mysql_num_rows($rsBalance)<=0)

								{

										$ssql = "SELECT `amount` FROM `fees_master` where `class`=(select `sclass` from `student_master` where `sadmission`='$sAdmission') and `feeshead`='tuitionfees' and `quarter`='Q2' and `financialyear`='$FinancialYear'";

										if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

										

										if(mysql_num_rows($rsBalance)>0)

										{

											while($row1 = mysql_fetch_row($rsBalance))

											{

												$BalanceAmt=$BalanceAmt + $row1[0];					

											}

										}

										$ssql = "SELECT `routecharges` FROM `RouteMaster` where `routeno`=(select `routeno` from `student_master` where `sadmission`='$sAdmission')";

										if (!$rsRoute = mysql_query($ssql))     die("Record Not Found");

										if(mysql_num_rows($rsRoute)>0)

										{

											while($row1 = mysql_fetch_row($rsRoute))

											{

												$BalanceAmt=$BalanceAmt + $row1[0];					

											}

										}

										 

										 $now = time(); // or your date as well

									     //$now = date("Y-m-d");

									     //COMMENTED ON 7-SEP-2014

						     			//$your_date = strtotime("2014-07-10");

						     			$your_date = strtotime($FinancialYear . "-07-10");

									     

									     

									     $datediff = $now - $your_date;

									     $days = floor($datediff/(60*60*24));

									     if ($days<0) {$days=0;}

										 $LateDays=$days;			

										 $LateFee1=$LateFee1 + ($LateDays*50);

										 $BalanceAmt=$BalanceAmt + $LateFee1;	

								}

						 

						 //////

						 	////FEE DOES NOT SUBMITED FOR Q1,Q2 AND FOR Q3 ALSO

								 		$ssql = "SELECT * FROM `fees` where `sadmission`='$sAdmission' and `quarter`='Q3'";

										if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

										if(mysql_num_rows($rsBalance)<=0)

										{

											//FEE SUBMITE NOT FOR Q3

											$ssql = "SELECT `amount` FROM `fees_master` where `class`=(select `sclass` from `student_master` where `sadmission`='$sAdmission') and `feeshead`='tuitionfees' and `quarter`='Q3' and `financialyear`='$FinancialYear'";

											if (!$rsBalance = mysql_query($ssql))     die("Record Not Found");

											if(mysql_num_rows($rsBalance)>0)

											{

												while($row1 = mysql_fetch_row($rsBalance))

												{

													$BalanceAmt= $BalanceAmt + $row1[0];					

												}

											}

											$ssql = "SELECT `routecharges` FROM `RouteMaster` where `routeno`=(select `routeno` from `student_master` where `sadmission`='$sAdmission')";

											if (!$rsRoute = mysql_query($ssql))     die("Record Not Found");

											if(mysql_num_rows($rsRoute)>0)

											{

												while($row1 = mysql_fetch_row($rsRoute))

												{

													$BalanceAmt=$BalanceAmt + $row1[0];					

												}

											}

											 

											 $now = time(); // or your date as well

										     //$now = date("Y-m-d");

										     //COMMENTED ON 7-SEP-2014

						     				//$your_date = strtotime("2014-10-10");

						     				$your_date = strtotime($FinancialYear . "-10-10");

										     

										     

										     $datediff = $now - $your_date;

										     $days = floor($datediff/(60*60*24));

										     if ($days<0) {$days=0;}

											 $LateDays=$days;			

											 $LateFee1=$LateDays*50;

											 $BalanceAmt=$BalanceAmt + $LateFee1;							

										 }

						 	

						 /////

					}

			 

			 

			 

			

		}//END OF MAIN IF QUARTER Q4



		echo $TutionFee . "," . $TransportFee . "," . $BalanceAmt . "," . $LateDaysFinal . "," . $RoutNo . "," . $AnnualFee;

		exit();

?>