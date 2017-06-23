<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title> </title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="Employeepayroll_Incometax1.php"><button class="btnmanu">Investment Declaration</button></a></li>
   <li><a href="Employeepayroll_Incometax2.php"><button class="btnmanu">Submit Investment Proof</button></a></li>
   <li class="active"><a href="Employeepayroll_Incometax3.php"><button class="btnmanu">Declared Investment Report</button></a></li>
   <li><a href="Employeepayroll_Incometax4.php"><button class="btnmanu">Prepare Form 16</button></a></li>
   <li><a href="Employeepayroll_Incometax5.php"><button class="btnmanu">Tax Computation Sheet</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="emptax-top">Submitted Declaration</div>
  <div class="employeetax1-main">
  <form action="" method="post" id="form" >
  <div class="declaration1">
   <div class="h">House Rent Details</div>
   <div class="row incometax-table" style="margin-bottom:1%; border-bottom:1px solid #ccc; padding-bottom:1%">
    <div class="col-xs-6"><b>Select City Status</b></div>
    <div class="col-xs-6"><select name="empcitystatus" id="empcitystatus" class="text-box tbs">
      	  	<option value="Metro">Metro</option>
            <option value="Non-Metro">Non-Metro</option>
          </select></div>    
   </div>
   <div class="income-table">
    <table>
     <tr class="col"> <td>Month</td><td>Monthly House Rent</td> </tr>
     <tr> <td>April</td> <td></td> </tr>
     <tr> <td>May</td> <td></td> </tr>
     <tr> <td>June</td> <td></td> </tr>
     <tr> <td>July</td> <td></td> </tr>
     <tr> <td>August</td> <td></td> </tr>
     <tr> <td>September</td> <td></td> </tr>
     <tr> <td>October</td> <td></td> </tr>
     <tr> <td>November</td> <td></td> </tr>
     <tr> <td>December</td> <td></td> </tr>
     <tr> <td>January</td> <td></td> </tr>
     <tr> <td>February</td> <td></td> </tr>
     <tr> <td>March</td> <td></td> </tr>
     <tr> <td>Higher Education Loan Interest Repayment (80E)</td><td></td> </tr>
     <tr> <td>Donation for Research (80GGA)</td><td></td> </tr>
     <tr> <td>Claim Exemption under Section 80GG</td><td></td> </tr>
    </table>
   </div>
  </div>
  <div class="declaration2">
   <div class="h" style="font-size:15px; border-bottom:1px solid #999;">Deductions Under Chapter VI A :</div>
   <div class="h">Investments under Section 80CCE</div>
   <div class="row">
    <div class="col-xs-3">Investment Type</div>
    <div class="col-xs-3"><select name="investmenttype1" id="investmenttype1" class="text-box tbs">
    					  	<option value="">Select One</option>
                            <option value="ULIP">United Link Insurance Policy (ULIP)</option>
							<option value="Public Provident Fund">Public Provident Fund (PPF)</option>
							<option value="Provident Fund Contribution">Provident Fund Contribution</option>
							<option value="Life Insurance Premium">Life Insurance Premium</option>
							<option value="Voluntary Profident Fund (VPF)">Voluntary Profident Fund (VPF)</option>
							<option value="Pension Contribution Fund">Pension Contribution Fund</option>
                          </select>
    </div>
    <div class="col-xs-3">Maximum Amount</div>
    <div class="col-xs-3"><input type="number" name="maxamount1" id="maxamount1" class="text-box"></div>
   </div>
   <div class="row">
    <div class="col-xs-3">Declared Amount</div>
    <div class="col-xs-3"><input type="number" name="declaredamount1" id="declaredamount1" class="text-box"></div>
    <div class="col-xs-3">Actual Amount</div>
    <div class="col-xs-3"><input type="number" name="actualamount1" id="actualamount1" class="text-box"></div>
   </div>
   <div class="row">
    <div class="col-xs-3">Approved Amount</div>
    <div class="col-xs-3"><input type="number" name="approvedamount1" id="approvedamount1" class="text-box"></div>
    <div class="col-xs-3">Attach Document</div>
    <div class="col-xs-3"><input type="number" name="attachdocument1" id="attachdocument1" class="text-box"></div>
   </div>
  </div>
  <div class="declaration3">
   <div class="h">Life Insurance Premium</div>
   <div class="row">
    <div class="col-xs-3">Premium Paid</div>
    <div class="col-xs-3"><input type="text" name="premiumpaid" id="premiumpaid" class="text-box"></div>
    <div class="col-xs-3">Sum Assured</div>
    <div class="col-xs-3"><input type="text" name="sumassured" id="sumassured" class="text-box"></div>
   </div>
   <div class="row">
    <div class="col-xs-3">Attach Document</div>
    <div class="col-xs-3"><input type="text" name="attachdocument2" id="attachdocument2" class="text-box"></div>
    <div class="col-xs-6">&nbsp;</div>
   </div>
  </div>
  <div class="declaration4">
   <div class="h">Medical Insurance Premium (80D)</div>
   <div class="row">
    <div class="col-xs-3">Premium Amount</div>
    <div class="col-xs-3"><input type="text" name="premiumamount1" id="premiumamount1" class="text-box"></div>
    <div class="col-xs-3">Premium Covers Senior Citizens</div>
    <div class="col-xs-3"><select name="premiumseniorcitizen" id="premiumseniorcitizen" class="text-box tbs">
    					  	<option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
    </div>
   </div>
   <div class="row">
    <div class="col-xs-3">Premium for Parents</div>
    <div class="col-xs-3"><input type="text" name="premiumforparent" id="premiumforparent" class="text-box"></div>
    <div class="col-xs-3">Parent Senior Citizen</div>
    <div class="col-xs-3"><select name="parentseniorcitizen" id="parentseniorcitizen" class="text-box tbs">
    					  	<option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
    </div>
   </div>
  </div>
  <div class="declaration5">
   <div class="h">Investments under Section 80D to 80U</div>
   <div class="row">
    <div class="col-xs-3">Investment Type</div>
    <div class="col-xs-3"><select name="investmenttype2" id="investmenttype2" class="text-box tbs">
    					  	<option value="">Select One</option>
                            <option value="ULIP">United Link Insurance Policy (ULIP)</option>
							<option value="Public Provident Fund">Public Provident Fund (PPF)</option>
							<option value="Provident Fund Contribution">Provident Fund Contribution</option>
							<option value="Life Insurance Premium">Life Insurance Premium</option>
							<option value="Voluntary Profident Fund (VPF)">Voluntary Profident Fund (VPF)</option>
							<option value="Pension Contribution Fund">Pension Contribution Fund</option>
                          </select>
    </div>
    <div class="col-xs-3">Maximum Amount</div>
    <div class="col-xs-3"><input type="number" name="maxamount2" id="maxamount2" class="text-box"></div>
   </div>
   <div class="row">
    <div class="col-xs-3">Declared Amount</div>
    <div class="col-xs-3"><input type="number" name="declaredamount2" id="declaredamount2" class="text-box"></div>
    <div class="col-xs-3">Actual Amount</div>
    <div class="col-xs-3"><input type="number" name="actualamount2" id="actualamount2" class="text-box"></div>
   </div>
   <div class="row">
    <div class="col-xs-3">Approved Amount</div>
    <div class="col-xs-3"><input type="number" name="approvedamount2" id="approvedamount2" class="text-box"></div>
    <div class="col-xs-3">Attach Document</div>
    <div class="col-xs-3"><input type="number" name="attachdocument3" id="attachdocument3" class="text-box"></div>
   </div>
  </div>
  <div class="declaration6">
   <div class="h">Specified Diseases Treatment (80DDB)</div>
   <div class="row">
    <div class="col-xs-3">Treatment Amount</div>
    <div class="col-xs-3"><input type="number" name="treatmentamount1" id="treatmentamount1" class="text-box"></div>
    <div class="col-xs-3">Treatment Covers Senior Citizens</div>
    <div class="col-xs-3"><select name="treatmentseniorcitizen" id="treatmentseniorcitizen" class="text-box tbs">
    					  	<option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
    </div>
   </div>
  </div>
  <div class="declaration6">
   <div class="h">Medical Treatment for Disabled Dependants (80DD)</div>
   <div class="row">
    <div class="col-xs-3">Disability Type</div>
    <div class="col-xs-3"><input type="text" name="disabilitytype" id="disabilitytype" class="text-box"></div>
    <div class="col-xs-3">Disability Percentage</div>
    <div class="col-xs-3"><input type="number" name="disabilitypercentage" id="disabilitypercentage" class="text-box"></div>
   </div>
   <div class="row">
    <div class="col-xs-3">Treatment Amount</div>
    <div class="col-xs-3"><input type="text" name="treatmentamount2" id="treatmentamount2" class="text-box"></div>
    <div class="col-xs-3">Attach Documents</div>
    <div class="col-xs-3"><input type="number" name="attachdocument4" id="attachdocument4" class="text-box"></div>
   </div>
  </div>
  <div class="declaration7">
   <div class="h">Other Income</div>
   <div class="row">
    <div class="col-xs-3">Section Name</div>
    <div class="col-xs-3"><input type="text" name="sectionname2" id="sectionname2" class="text-box"></div>
    <div class="col-xs-3">Maximum Amount</div>
    <div class="col-xs-3"><input type="number" name="maxamount3" id="maxamount3" class="text-box"></div>
   </div>
   <div class="row">
    <div class="col-xs-3">Declared Amount</div>
    <div class="col-xs-3"><input type="number" name="declaredamount3" id="declaredamount3" class="text-box"></div>
    <div class="col-xs-3">Actual Amount</div>
    <div class="col-xs-3"><input type="number" name="actualamount3" id="actualamount3" class="text-box"></div>
   </div>
   <div class="row" style="border-bottom:1px solid #999; padding-bottom:1%;">
    <div class="col-xs-3">Approved Amount</div>
    <div class="col-xs-3"><input type="number" name="approvedamount3" id="approvedamount3" class="text-box"></div>
    <div class="col-xs-3">Attach Document</div>
    <div class="col-xs-3"><input type="number" name="attachdocument4" id="attachdocument4" class="text-box"></div>
   </div>
  </div>
  <div class="col-xs-12" align="center" style="margin:1% auto;"><input type="submit" name="submit" id="submit" class="btn" value="Submit"></div>
  </form>
  </div>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
