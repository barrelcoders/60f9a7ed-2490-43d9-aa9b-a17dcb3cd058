<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Payroll</title><link rel="icon" href="../Hris/l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../../css/payroll.css" />
   <script src="../../js/bootstrap.min.js"></script>
   <script src="../../js/jquery.min.js"></script>
</head>
<style>
</style>
<body>
<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="cont">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="payroll.php"><button class="btnmanu">View Payslip</button></a></li>
   <li><a href="payrollfbp.php"><button class="btnmanu">FBP Planner</button></a></li>
   <li class="active"><a href="investment_declaration.php"><button class="btnmanu">Investment Declaration</button></a></li>
   <li><a href="#payrollnewfbp.php"><button class="btnmanu">NEW FBP CLAIM</button></a></li>
   <li><a href="#payrollmyfbp.php"><button class="btnmanu">MY FBP CLAIMS</button></a></li>
   <li><a href="payrollproofsubmission.php"><button class="btnmanu">Proof Submission</button></a></li>
   <li><a href="payrollform16.php"><button class="btnmanu">Form16</button></a></li>
   <li><a href="#payrollnpsdecl.php"><button class="btnmanu">NPS Declaration</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <form action="#" method="post">
  <div class="row investment">
   <div class="col-md-6">INVESTMENT DECLARATION FOR THE YEAR 2016-2017</div>
   <div class="col-md-6" align="right">Form 12B &nbsp;&nbsp;Tax Guidelines</div>
  </div>
  <div class="payroll-topmanu">
   <!--------------->   
   <div class="investment_d">Employee Information</div>
  <!-----table1-------->
   <div class="investment-table">
    <table>
     <tr> <td>Employee Code:</td> <td>105421</td> <td>Employee Name:</td><td>ABC</td> </tr>
     <tr> <td>Date Of Joining:</td> <td>Sep 04, 2010</td> <td>Gender:</td><td>Male</td> </tr>
     <tr> <td>Date Of Birth:</td> <td>Sep 04, 2000</td> <td>Pan Number:</td><td>AGE567G589G</td> </tr>
  </table>
  </div>
 </div>
 <div class="investment-tables">
 <!----------table1------------->
  <div class="investment1">Chapter Via - Section 80D To 80U</div>
  <div class="investment-table1">
   <table>
    <tr class="col"> <td>Section Name</td><td>Maximum Amount</td><td>Declared Amount</td> </tr>
    <tr>
     <td>Medical for Self, Spouse, Chilld (80D)</td>
     <td>25000</td>
     <td><input type="number" name="80damount1" id="80damount1" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Medical for Self, Spouse, Chilld if Employee&gt;&=60yrs (80D)</td>
     <td>30000</td>
     <td><input type="number" name="80damount2" id="80damount2" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>For Dependent Parent&lt;60yrs (80D)</td>
     <td>25000</td>
     <td><input type="number" name="80damount3" id="80damount3" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>For Dependent Parent&gt;=60yrs (80D)</td>
     <td>30000</td>
     <td><input type="number" name="80damount4" id="80damount4" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Medical treatment of specified Deseases of Self &amp; Dependents&lt;=60yrs (80DDB)</td>
     <td>40000</td>
     <td><input type="number" name="80damount5" id="80damount5" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Medical treatment of specified Deseases of Self &amp; Dependents&gt;=60yrs (80DDB)</td>
     <td>60000</td>
     <td><input type="number" name="80damount6" id="80damount6" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Interest of Education Loan (80E)</td>
     <td>No Limit</td>
     <td><input type="number" name="80damount7" id="80damount7" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>80CCD (1B)-NPS - Additional Deduction of Rs. 50000/- Employee Contribution</td>
     <td>50000</td>
     <td><input type="number" name="80damount8" id="80damount8" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Medical treatment of handicapped self&lt;80% (80U)</td>
     <td>75000</td>
     <td><input type="number" name="80damount9" id="80damount9" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Medical treatment of handicapped self&gt;80% (80U)</td>
     <td>125000</td>
     <td><input type="number" name="80damount10" id="80damount10" class="text-box" value="0.0"></td>
    </tr>
    <tr>
    <td>80CCG</td>
     <td>50000</td>
     <td><input type="number" name="80damount11" id="80damount11" class="text-box" value="0.0"></td>
    </tr>
    <tr>
    <td>80TTA (Interest of Saving Account)</td>
     <td>10000</td>
     <td><input type="number" name="80damount12" id="80damount12" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Medical treatment of handicapped Dependent&lt;80% (80DD)</td>
     <td>75000</td>
     <td><input type="number" name="80damount13" id="80damount13" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Medical treatment of handicapped Dependent&gt;80% (80DD)</td>
     <td>125000</td>
     <td><input type="number" name="80damount14" id="80damount14" class="text-box" value="0.0"></td>
    </tr>
   </table>
  </div>
  <!--------------table2------------------->
  <div class="investment1">Chapter Via - Section 80C (Maximum Of Rs. 1,50,000)</div>
  <div class="investment-table2">
   <table>
    <tr class="col"> <td>Section Name</td><td>Maximum Amount</td><td>Declared Amount</td> </tr>
    <tr>
     <td>Contribution to (80CCC)</td>
     <td>150000.00</td>
     <td><input type="number" name="80camount1" id="80camount1" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Infrastructure Bond &lt; 10yrs</td>
     <td>150000.00</td>
     <td><input type="number" name="80camount2" id="80camount2" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Children-Tuition Fee (EDU)</td>
     <td>150000.00</td>
     <td><input type="number" name="80camount3" id="80camount3" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Fixed Deposit (5years &amp; Above) (FD)</td>
     <td>150000.00</td>
     <td><input type="number" name="80camount4" id="80camount4" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Life Insurance Premium</td>
     <td>150000.00</td>
     <td><input type="number" name="80camount5" id="80camount5" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Mutual Fund</td>
     <td>150000.00</td>
     <td><input type="number" name="80camount6" id="80camount6" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Deposit in NSC</td>
     <td>150000.00</td>
     <td><input type="number" name="80camount7" id="80camount7" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Accrued NSC Interest</td>
     <td>150000.00</td>
     <td><input type="number" name="80camount8" id="80camount8" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Public Provident Fund</td>
     <td>150000.00</td>
     <td><input type="number" name="80camount9" id="80camount9" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Repayment of Housing Loan - 100000</td>
     <td>150000.00</td>
     <td><input type="number" name="80camount10" id="80camount10" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>ULIP / ELSS</td>
     <td>150000.00</td>
     <td><input type="number" name="80camount11" id="80camount11" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Senior Citizen Saving Scheme</td>
     <td>150000.00</td>
     <td><input type="number" name="80camount12" id="80camount12" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Post of Deposit</td>
     <td>150000.00</td>
     <td><input type="number" name="80camount13" id="80camount13" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Long Term Infrastructure Bond &gt; 10yrs (80CCF)</td>
     <td>20000.00</td>
     <td><input type="number" name="80camount14" id="80camount14" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Sukanya Samriddhi Yojana</td>
     <td>20000.00</td>
     <td><input type="number" name="80camount15" id="80camount15" class="text-box" value="0.0"></td>
    </tr>
   </table>
  </div>
 <!--------------table3------------------->
  <div class="investment1">House Rent Details</div>
  <div class="investment-table3">
   <table>
    <tr class="col"> <td>SNO</td><td>From Date</td><td>To Date</td><td>City</td><td>Landloard Name</td><td>Address</td><td>Landlord PAN No</td><td>Declared Amount</td> </tr>
    <tr>
     <td>1</td>
     <td><input type="date" name="fromdate1" id="fromdate1" class="text-box"></td>
     <td><input type="date" name="todate1" id="todate1" class="text-box"></td>
     <td> <select name="city1" id="city1" class="text-box tbs">
     		<option value="">--Select--</option>
            <option value=""></option>
          </select>
     </td>
     <td><input type="text" name="landlordname1" id="landlordname1" class="text-box"></td>
     <td><input type="text" name="landlordaddress1" id="landlordaddress1" class="text-box" ></td>
     <td><input type="text" name="landlordpanno1" id="landlordpanno1" class="text-box"></td>
     <td><input type="number" name="houserentamount1" id="houserentamount1" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>2</td>
     <td><input type="date" name="fromdate2" id="fromdate2" class="text-box"></td>
     <td><input type="date" name="todate2" id="todate2" class="text-box"></td>
     <td> <select name="city2" id="city2" class="text-box tbs">
     		<option value="">--Select--</option>
            <option value=""></option>
          </select>
     </td>
     <td><input type="text" name="landlordname2" id="landlordname2" class="text-box"></td>
     <td><input type="text" name="landlordaddress2" id="landlordaddress2" class="text-box" ></td>
     <td><input type="text" name="landlordpanno2" id="landlordpanno2" class="text-box"></td>
     <td><input type="number" name="houserentamount2" id="houserentamount2" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>3</td>
     <td><input type="date" name="fromdate3" id="fromdate3" class="text-box"></td>
     <td><input type="date" name="todate3" id="todate3" class="text-box"></td>
     <td> <select name="city3" id="city3" class="text-box tbs">
     		<option value="">--Select--</option>
            <option value=""></option>
          </select>
     </td>
     <td><input type="text" name="landlordname3" id="landlordname3" class="text-box"></td>
     <td><input type="text" name="landlordaddress3" id="landlordaddress3" class="text-box" ></td>
     <td><input type="text" name="landlordpanno3" id="landlordpanno3" class="text-box"></td>
     <td><input type="number" name="houserentamount3" id="houserentamount3" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>4</td>
     <td><input type="date" name="fromdate4" id="fromdate4" class="text-box"></td>
     <td><input type="date" name="todate4" id="todate4" class="text-box"></td>
     <td> <select name="city4" id="city4" class="text-box tbs">
     		<option value="">--Select--</option>
            <option value=""></option>
          </select>
     </td>
     <td><input type="text" name="landlordname4" id="landlordname4" class="text-box"></td>
     <td><input type="text" name="landlordaddress4" id="landlordaddress4" class="text-box" ></td>
     <td><input type="text" name="landlordpanno4" id="landlordpanno4" class="text-box"></td>
     <td><input type="number" name="houserentamount4" id="houserentamount4" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>5</td>
     <td><input type="date" name="fromdate5" id="fromdate5" class="text-box"></td>
     <td><input type="date" name="todate5" id="todate5" class="text-box"></td>
     <td> <select name="city5" id="city5" class="text-box tbs">
     		<option value="">--Select--</option>
            <option value=""></option>
          </select>
     </td>
     <td><input type="text" name="landlordname5" id="landlordname5" class="text-box"></td>
     <td><input type="text" name="landlordaddress5" id="landlordaddress5" class="text-box" ></td>
     <td><input type="text" name="landlordpanno5" id="landlordpanno5" class="text-box"></td>
     <td><input type="number" name="houserentamount5" id="houserentamount5" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>6</td>
     <td><input type="date" name="fromdate6" id="fromdate6" class="text-box"></td>
     <td><input type="date" name="todate6" id="todate6" class="text-box"></td>
     <td> <select name="city6" id="city6" class="text-box tbs">
     		<option value="">--Select--</option>
            <option value=""></option>
          </select>
     </td>
     <td><input type="text" name="landlordname6" id="landlordname6" class="text-box"></td>
     <td><input type="text" name="landlordaddress6" id="landlordaddress6" class="text-box" ></td>
     <td><input type="text" name="landlordpanno6" id="landlordpanno6" class="text-box"></td>
     <td><input type="number" name="houserentamount6" id="houserentamount6" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>7</td>
     <td><input type="date" name="fromdate7" id="fromdate7" class="text-box"></td>
     <td><input type="date" name="todate7" id="todate7" class="text-box"></td>
     <td> <select name="city7" id="city7" class="text-box tbs">
     		<option value="">--Select--</option>
            <option value=""></option>
          </select>
     </td>
     <td><input type="text" name="landlordname7" id="landlordname7" class="text-box"></td>
     <td><input type="text" name="landlordaddress7" id="landlordaddress7" class="text-box" ></td>
     <td><input type="text" name="landlordpanno7" id="landlordpanno7" class="text-box"></td>
     <td><input type="number" name="houserentamount7" id="houserentamount7" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>8</td>
     <td><input type="date" name="fromdate8" id="fromdate8" class="text-box"></td>
     <td><input type="date" name="todate8" id="todate8" class="text-box"></td>
     <td> <select name="city8" id="city8" class="text-box tbs">
     		<option value="">--Select--</option>
            <option value=""></option>
          </select>
     </td>
     <td><input type="text" name="landlordname8" id="landlordname8" class="text-box"></td>
     <td><input type="text" name="landlordaddress8" id="landlordaddress8" class="text-box" ></td>
     <td><input type="text" name="landlordpanno8" id="landlordpanno8" class="text-box"></td>
     <td><input type="number" name="houserentamount8" id="houserentamount8" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>9</td>
     <td><input type="date" name="fromdate9" id="fromdate9" class="text-box"></td>
     <td><input type="date" name="todate9" id="todate9" class="text-box"></td>
     <td> <select name="city9" id="city9" class="text-box tbs">
     		<option value="">--Select--</option>
            <option value=""></option>
          </select>
     </td>
     <td><input type="text" name="landlordname9" id="landlordname9" class="text-box"></td>
     <td><input type="text" name="landlordaddress9" id="landlordaddress9" class="text-box" ></td>
     <td><input type="text" name="landlordpanno9" id="landlordpanno9" class="text-box"></td>
     <td><input type="number" name="houserentamount9" id="houserentamount9" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>10</td>
     <td><input type="date" name="fromdate10" id="fromdate10" class="text-box"></td>
     <td><input type="date" name="todate10" id="todate10" class="text-box"></td>
     <td> <select name="city10" id="city10" class="text-box tbs">
     		<option value="">--Select--</option>
            <option value=""></option>
          </select>
     </td>
     <td><input type="text" name="landlordname10" id="landlordname10" class="text-box"></td>
     <td><input type="text" name="landlordaddress10" id="landlordaddress10" class="text-box" ></td>
     <td><input type="text" name="landlordpanno10" id="landlordpanno10" class="text-box"></td>
     <td><input type="number" name="houserentamount10" id="houserentamount10" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>11</td>
     <td><input type="date" name="fromdate11" id="fromdate11" class="text-box"></td>
     <td><input type="date" name="todate11" id="todate11" class="text-box"></td>
     <td> <select name="city11" id="city11" class="text-box tbs">
     		<option value="">--Select--</option>
            <option value=""></option>
          </select>
     </td>
     <td><input type="text" name="landlordname11" id="landlordname11" class="text-box"></td>
     <td><input type="text" name="landlordaddress11" id="landlordaddress11" class="text-box" ></td>
     <td><input type="text" name="landlordpanno11" id="landlordpanno11" class="text-box"></td>
     <td><input type="number" name="houserentamount11" id="houserentamount11" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>12</td>
     <td><input type="date" name="fromdate12" id="fromdate12" class="text-box"></td>
     <td><input type="date" name="todate12" id="todate12" class="text-box"></td>
     <td> <select name="city12" id="city12" class="text-box tbs">
     		<option value="">--Select--</option>
            <option value=""></option>
          </select>
     </td>
     <td><input type="text" name="landlordname12" id="landlordname12" class="text-box"></td>
     <td><input type="text" name="landlordaddress12" id="landlordaddress12" class="text-box" ></td>
     <td><input type="text" name="landlordpanno12" id="landlordpanno12" class="text-box"></td>
     <td><input type="number" name="houserentamount12" id="houserentamount12" class="text-box" value="0.0"></td>
    </tr>
   </table>
  </div>
  <!--------------table2------------------->
  <div class="investment1">Income From Other Sources</div>
  <div class="investment-table4">
   <table>
    <tr class="col"> <td>Section Name</td><td>Maximum Amount</td><td>Declared Amount</td> </tr>
    <tr>
     <td>Income from other than Salary</td>
     <td>No Limit</td>
     <td><input type="number" name="otherincomeamount1" id="otherincomeamount1" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Income on Housing Loan (Letout)</td>
     <td>No Limit</td>
     <td><input type="number" name="otherincomeamount2" id="otherincomeamount2" class="text-box" value="0.0"></td>
    </tr>
    <tr>
     <td>Income on Housing Loan (Self)</td>
     <td>No Limit</td>
     <td><input type="number" name="otherincomeamount3" id="otherincomeamount3" class="text-box" value="0.0"></td>
    </tr>
   </table>
  </div>
  <!--------------table2------------------->
  <div class="investment1">Declaration</div>
  <div class="investment-table5">
   <div><input type="checkbox" name="de" id="de"></div>
   <div>
    <p align="justify"> &nbsp;&nbsp;&nbsp;&nbsp;I hereby confirm that I will be investing / contributing the following amounts for the purpose of rebate / deduction to be considered in calculating my income tax for the current Financial Year. I further undertake that wherever eligible investments are made in the name of spouse / children / dependent parents, the same have been / will be made out of my income and claim thereof has / shall not be made by anybody else.</p>
   </div>
  </div>
  <div class="btns">
  	<button type="submit" name="submit" id="submit" class="btn-submit">SUBMIT</button>&nbsp;&nbsp; 
    <button type="reset" name="reset" id="reset" class="btn-cancel">CANCEL</button>
  </div>
 </div>
 </form>
 </div>
</div>
</div>
</div>
<div><?php include 'footer.php'; ?></div>
</body>
</html>