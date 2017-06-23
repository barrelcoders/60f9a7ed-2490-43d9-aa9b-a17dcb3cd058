<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Payroll</title><link rel="icon" href="../Hris/l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../../css/Style.css" />
   <script src="../../js/bootstrap.min.js"></script>
   <script src="../../js/jquery.min.js"></script>
</head>
<style>
.inv{z-index:auto!important;} .inv div{z-index:auto!important;}
#container{font-family:Arial!important;}
.inv_form .hr{border:1px solid #eaeaea; padding:0; width:100%;}
.inv_form{padding:0%; width:100%; margin-top:2%;}
.inv_form .inv_table1, .inv_form .table2{width:100%;} .inv_form .inv_table1 table, .inv_form .table2 table{width:100%;}
.inv_form .text-box{border:1px solid rgba(11,70,45,0.4); border-radius:3px; width:80%; padding:1% 1%; font-size:13px!important; height:30px;}
input:focus, button:focus, textarea:focus{box-shadow:none; outline:none;} .inv_form .col-xs-3{} .inv_form .row div{float:left;}
.inv_form .col-xs-3, .inv_form .col-xs-6{margin:0.5% 0;} 
.inv_form .col-xs-2, .inv_form .col-xs-7, .inv_form .col-xs-5{margin:1% 0; font-size:13px; text-align:justify;}
.inv_form table td{padding:0.5% 1%;} .inv_form b{color:#060;}
.inv_form .head{color:#060; font-size:15px; font-weight:600;} .inv_form .head1{color:#090; font-size:14px; font-weight:600;}
.inv_form .inv_table12 table td{width:25%; text-align:justify; font-size:13px; padding:0.5% 1.2%;} 
.inv_form .inv_table12 table td .text-box{font-size:14px!important; padding:2% 2%; height:30px; width:100%;}
.inv_form .inv_table1 table tr, .inv_form .inv_table12 table tr, .inv_form .inv_table3 table tr{border:none;}
.inv_form .inv_table1 table td{text-align:justify; font-size:13px; padding:1% 1.5%;} .inv_form .inv_table1 table td:first-child{width:10%;} 
.inv_form .inv_table1 table td .text-box{font-size:14px!important; padding:2% 2%; height:30px; width:100%;} 
.inv_form .inv_table1 table td:nth-child(3n+3){width:25%;}
.inv_form .col-xs-5 .tb23{padding:2%; height:30px; font-size:14px;} .inv_form .col-xs-6 .tbta{height:35px; min-width:80%; padding:2%;}
.inv_form .inv_table3 table td:first-child{width:8%;}  .inv_form .col-xs-5 .text-box{height:30px;}
.inv_form .inv_table3 table td{width:33%; padding:1% 1%; font-size:13px;} .inv_form .inv_table3 table td .text-box{width:80%; padding:2%; height:30px;}
.inv_form .inv_table4 table{width:100%;} .inv_form .inv_table4 table td{font-size:13px; padding:0.7% 0.5%;} 
.inv_form .inv_table4 table .col td{  background:#6aec6a; } 
.inv_form .inv_table4 table td .text-box{width:100%; padding:2%; height:30px;} .inv_form .inv_table4 table tr{border-bottom:1px solid #ccc;}
.inv_form .btns{text-align:center;} .inv_form .tba3{height:30px;}
.inv_form .btns .submit-btn{border:1px solid #4cae4c; background:#5cb85c; color:#fff; padding:0.5% 1.5%; border-radius:3px;} 
.inv_form .btns .submit-btn:hover{background:#690;} .inv_form .btns .clear-btn:hover{background:#690;}
.inv_form .btns .clear-btn{border:1px solid #eea236; background:#f0ad4e; color:#fff; padding:0.5% 1.5%; border-radius:3px;} 
.inv_form .last p{font-size:13px; line-height:3;} .inv_form .last p b{margin-right:1.5%;}
.inv_form #scroll {position:fixed; right:10px; bottom:10px; cursor:pointer; width:50px; height:50px; background-color:#0b462d; text-indent:-9999px; display:none;    -webkit-border-radius:60px;  -moz-border-radius:60px;  border-radius:60px }
#scroll span{position:absolute; top:50%; left:50%; margin-left:-8px; margin-top:-12px; height:0; width:0; border:8px solid transparent;    border-bottom-color:#ffffff }
.inv_form #scroll:hover {  background-color:#5cb85c;  opacity:1;filter:"alpha(opacity=100)";  -ms-filter:"alpha(opacity=100)"; }
.inv_form input[type=radio]{margin-right:3%; zoom: 1.3;} .inv_form input[type=checkbox] {zoom: 1.5;}  
</style>
<body>
<div id="container">
<!----Header--------->
 <div><?php include '../header2.php'; ?></div>
<!---------containt---------->
<div class="cont">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="payroll.php"><button class="btnmanu">View Payslip</button></a></li>
   <li><a href="#payrollfbp.php"><button class="btnmanu">FBP Planner</button></a></li>
   <li class="active"><a href="investment_declaration.php"><button class="btnmanu">Investment Declaration</button></a></li>
   <li><a href="#payrollnewfbp.php"><button class="btnmanu">NEW FBP CLAIM</button></a></li>
   <li><a href="#payrollmyfbp.php"><button class="btnmanu">MY FBP CLAIMS</button></a></li>
   <li><a href="payrollproofsubmission.php"><button class="btnmanu">Proof Submission</button></a></li>
   <li><a href="payrollform16.php"><button class="btnmanu">Form16</button></a></li>
   <li><a href="#payrollnpsdecl.php"><button class="btnmanu">NPS Declaration</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10 inv">
  <!----form---->
 <div class="inv_form">
 <form action="#" method="post">
 <div class="row">
  <div class="col-xs-3">Employee No</div>
  <div class="col-xs-3"><input type="text" name="employeeno" id="imployeeno" class="text-box" placeholder="Employee No." required></div>
  <div class="col-xs-3">Name</div>
  <div class="col-xs-3"><input type="text" name="name" id="name" class="text-box" placeholder="Name" required></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Gender</div>
  <div class="col-xs-3"><input type="radio" value="male" name="gender">Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  						<input type="radio" value="male" name="gender">Female
  </div>
  <div class="col-xs-3">PAN No.</div>
  <div class="col-xs-3"><input type="text" name="panno" id="panno" class="text-box" placeholder="PAN No." required></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Date Of Birth</div>
  <div class="col-xs-3"><input type="date" name="dob" id="dob" class="text-box tba"></div>
  <div class="col-xs-3">Date Of Joining</div>
  <div class="col-xs-3"><input type="date" name="doj" id="doj" class="text-box tba"></div>
 </div>
 <hr class="hr">
 <div align="center" class="head"><b>1.</b>Please enter your Monthly Rent details as per the Rent Receipt / Lease Deed.</div>
 <div align="center" class="head1"><b>Note :</b>   If the Employee is paying the rent below Rs.3000/- per month, he/she need not furnish the Rent Receipts (Circular No:8/2007 Dt: 05.Dec.2007).</div>
 <div>&nbsp;</div>
 <div class="inv_table1">
  <table>
   <tr> <td>1.</td> <td>April 2016</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td><input type="radio" name="metro" value="metro">Metro</td>
        <td><input type="radio" name="metro" value="nonmetro">Non-Metro</td>
   </tr>
   <tr> <td>2.</td> <td>May 2016</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td><input type="radio" name="metro" value="metro">Metro</td>
        <td><input type="radio" name="metro" value="nonmetro">Non-Metro</td>
   </tr>
   <tr> <td>3.</td> <td>May 2016</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td><input type="radio" name="metro" value="metro">Metro</td>
        <td><input type="radio" name="metro" value="nonmetro">Non-Metro</td>
   </tr>
   <tr> <td>4.</td> <td>July 2016</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td><input type="radio" name="metro" value="metro">Metro</td>
        <td><input type="radio" name="metro" value="nonmetro">Non-Metro</td>
   </tr>
   <tr> <td>5.</td> <td>August 2016</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td><input type="radio" name="metro" value="metro">Metro</td>
        <td><input type="radio" name="metro" value="nonmetro">Non-Metro</td>
   </tr>
   <tr> <td>6.</td> <td>September 2016</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td><input type="radio" name="metro" value="metro">Metro</td>
        <td><input type="radio" name="metro" value="nonmetro">Non-Metro</td>
   </tr>
   <tr> <td>7.</td> <td>October 2016</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td><input type="radio" name="metro" value="metro">Metro</td>
        <td><input type="radio" name="metro" value="nonmetro">Non-Metro</td>
   </tr>
    <tr> <td>8.</td> <td>November 2016</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td><input type="radio" name="metro" value="metro">Metro</td>
        <td><input type="radio" name="metro" value="nonmetro">Non-Metro</td>
   </tr>
    <tr> <td>9.</td> <td>December 2016</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td><input type="radio" name="metro" value="metro">Metro</td>
        <td><input type="radio" name="metro" value="nonmetro">Non-Metro</td>
   </tr>
   <tr> <td>10.</td> <td>January 2017</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td><input type="radio" name="metro" value="metro">Metro</td>
        <td><input type="radio" name="metro" value="nonmetro">Non-Metro</td>
   </tr>
   <tr> <td>11.</td> <td>February 2017</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td><input type="radio" name="metro" value="metro">Metro</td>
        <td><input type="radio" name="metro" value="nonmetro">Non-Metro</td>
   </tr>
   <tr> <td>12.</td> <td>March 2017</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td><input type="radio" name="metro" value="metro">Metro</td>
        <td><input type="radio" name="metro" value="nonmetro">Non-Metro</td>
   </tr>
  </table>
 </div>
 <hr class="hr">
 <div><b>2.</b></div>
 <div class="inv_table12">
  <table>
   <tr>
    <td>Interest on Housing Loan u/s 24 (If the house is self occupied and the loan was taken before April 1999).Bankers Certificate to be submitted</td>
    <td>Upto Rs. 30000/-(If Self Occupied)</td>
    <td><input type="text" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
    <td>Provisional Certificate issued by the Banker showing the Interest Part</td>
   </tr>
   <tr>
    <td>Interest on Housing Loan u/s 24(If the house is self occupied and the loan was taken on or after April 1999).Bankers Certificate to be submitted</td>
    <td>Max Limit - Rs. 1,50,000/- (If Self Occupied)</td>
    <td><input type="text" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
    <td>Provisional Certificate issued by the Banker showing the Interest Part</td>
   </tr>
   <tr>
    <td>Interest on Housing Loan u/s 24(Let out/ Deemed to be let out)Bankers Certificate to be submitted[if the property is LET OUT - Rental Income need to be specified]</td>
    <td>- No Limit -(If Let Out)</td>
    <td><input type="text" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
    <td>Municipal Taxes PAID by the owner (employee) during the financial year</td>
   </tr>
   
  </table>
 </div>
 <hr class="hr">
 <div class="row">
  <div class="col-xs-2"><b>3.</b>  Medical Allowance</div>
   <div class="col-xs-2">Rs.15,000/- per annum</div>
   <div class="col-xs-3"><input type="text" name="amount" id="amount" class="text-box tba3" placeholder="Amount"></div>
   <div class="col-xs-5">Medical expenses incurred for family: (Family includes spouse, children and dependent parents, brothers and sisters )</div>
 </div>
 <div class="row">
  <div class="col-xs-2"><b>4.</b>  Sec 80D (Medi Claim Policy & Preventive health check up)</div>
   <div class="col-xs-2">Rs. 25,000/</div>
   <div class="col-xs-3"><input type="text" name="amount" id="amount" class="text-box tba3" placeholder="Amount"></div>
   <div class="col-xs-5">Medical Insurance Premium PAID by Employee: - on the health of employee, spouse, and dependent children.[Rs.20,000/- In case employee is a Senior Citizen] (i.e., 60 years or more). <br>
Payment made by an employee for preventive health check-up of self, spouse, dependent children during the financial year is eligible for maximum deduction of Rs 5000. <br>
Note:The amount paid is within the overall limits ( Rs. 15000/Rs. 20000).</div>
 </div>
 <div class="row">
  <div class="col-xs-2">&nbsp;</div>
   <div class="col-xs-2">Rs. 15,000/- (or) Rs.20,000/-</div>
   <div class="col-xs-3"><input type="text" name="amount" id="amount" class="text-box tba3" placeholder="Amount"></div>
   <div class="col-xs-5">Additional Amount of Rs.15,000/- Medical Insurance Premium PAID by Employee on the health of parents (even not dependent on employee) . [Rs.20,000/- In the case parents are Senior Citizen]i.e., 60 years or more payment made by an employee for preventive health check-up of parents during the financial year is eligible for maximum deduction of Rs 5000. Note: The amount paid is within the overall limits ( Rs. 15000/Rs. 20000).</div>
 </div>
 <div class="row">
  <div class="col-xs-2"><b>5.</b> Sec 80DD (Maintenance including Medical treatment of dependant person with disability)</div>
   <div class="col-xs-2">Rs. 50,000/- (Rs.1,00,000/- for Severe disability)</div>
   <div class="col-xs-3"><input type="text" name="amount" id="amount" class="text-box tba3" placeholder="Amount"></div>
   <div class="col-xs-5">Here Employee gets fixed amount of deduction.If employee has incurred any expenditure / deposited in specified policy. (Form 10-IA obtained from Medical Authority has to be submitted)</div>
 </div>
 <div class="row">
  <div class="col-xs-2"><b>6.</b> Sec 80DDB (Medical treatment for specified diseases or ailments) - Self / Dependents</div>
   <div class="col-xs-2">Rs. 40,000/- (Rs. 60,000/- for Senior Citizen )</div>
   <div class="col-xs-3"><input type="text" name="amount" id="amount" class="text-box tba3" placeholder="Amount"></div>
   <div class="col-xs-5">Here Employee gets deduction: Lower of the following: i). Amount incurred orii). Rs.40,000/- (or Rs.60,000/- if expenses incurred for senior citizen i.e,60 years or more )(Form 10-I obtained from Medical Authority has to be submitted)</div>
 </div>
 <div class="row">
  <div class="col-xs-2"><b>7.</b> Sec 80E (Education Loan)</div>
   <div class="col-xs-2">No limit(only Interest Portion)</div>
   <div class="col-xs-3"><input type="text" name="amount" id="amount" class="text-box tba3" placeholder="Amount"></div>
   <div class="col-xs-5">Interest on Loan taken for Higher Education:Amount paid by employee during the financial year on loan taken for higher education of - Employee, spouse or children of employee or students for whom employee is a legal guardianBenefit Period:Current Period + Next 7 years</div>
 </div>
 <div class="row">
  <div class="col-xs-2"><b>8.</b> Sec 80U (For person with a disability)</div>
   <div class="col-xs-2">Rs.50,000/- (Rs.1,00,000/- for Severe disability)</div>
   <div class="col-xs-3"><input type="text" name="amount" id="amount" class="text-box tba3" placeholder="Amount"></div>
   <div class="col-xs-5">Here Employee gets fixed amount of deduction.(Form 10-IA obtained from Medical Authority has to be submitted)</div>
 </div>
 <hr class="hr">
 <div align="center" class="head1">Maximum amount eligible for Deduction under section 80C & 80CCC Categories is Rs.1,50,000/-</div>
 <div>&nbsp;</div>
 <div class="inv_table1">
  <table>
   <tr> <td>9.</td> <td>Life Insurance Premium</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>Self , Spouse & Children only</td>
   </tr>
   <tr> <td>10.</td> <td>Public Provident Fund (PPF)</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>Self , Spouse & Children only</td>
   </tr>
   <tr> <td>11.</td> <td>Voluntary Provident Fund (VPF)</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>will be additionally deducted from salary</td>
   </tr>
   <tr> <td>12.</td> <td>Pension Fund Contribution</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>Self only</td>
   </tr>
   <tr> <td>13.</td> <td>National Savings Certificate (NSC)</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>Self only</td>
   </tr>
   <tr> <td>14.</td> <td>Interest Accrued on NSC (Reinvested)</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>Self only</td>
   </tr>
   <tr> <td>15.</td> <td>Unit Linked Insurance Policy (ULIP)</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>Self , Spouse & Children only</td>
   </tr>
   <tr> <td>16.</td> <td>Equity Linked Savings Schemes (ELSS) - Mutual Funds</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>Self only</td>
   </tr>
   <tr> <td>17.</td> <td>Payment of Tuition fees for Children (Max 2 Children)</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>Two children only</td>
   </tr>
   <tr> <td>18.</td> <td>Principal repayment of Housing Loan</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>Self & Joint a/c holder</td>
   </tr>
   <tr> <td>19.</td> <td>Registration charges incurred for Buying House (I year Only)</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>Self only</td>
   </tr>
   <tr> <td>20.</td> <td>Infrastructure Bonds</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>Self only</td>
   </tr>
   <tr> <td>21.</td> <td>Bank Fixed Deposit for 5 Years & above</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>Self only</td>
   </tr>
   <tr> <td>22.</td> <td>Post office Term Deposit for 5years & above</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td>Self only</td>
   </tr>
   
  </table>
 </div>
 <hr class="hr">
 <div class="row">
  <div class="col-xs-1"><b>23.</b></div>
  <div class="col-xs-6">a) Interest Income from Savings A.c (Banks & Post office only)</div>
  <div class="col-xs-5"><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"> </div>
 </div>
 <div class="row">
  <div class="col-xs-1">&nbsp;</div>
  <div class="col-xs-6">b)Any Other<br><textarea name="textarea" id="textarea" class="text-box tbta" ></textarea> </div>
  <div class="col-xs-5"><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"> </div>
 </div>
 <div class="row">
  <div class="col-xs-1">&nbsp;</div>
  <div class="col-xs-6">c)Any Other<br><textarea name="textarea" id="textarea" class="text-box tbta"></textarea> </div>
  <div class="col-xs-5"><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"> </div>
 </div>
 <div class="row">
  <div class="col-xs-1">&nbsp;</div>
  <div class="col-xs-6">d)Any Other<br><textarea name="textarea" id="textarea" class="text-box tbta"></textarea> </div>
  <div class="col-xs-5"><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"> </div>
 </div>
 <hr class="hr">
 <div class="inv_table3">
  <table>
   <tr> <td><b>24.</b></td> <td>Income From Previous Employer (Joined after 01/04/2016)</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
        <td rowspan="5" style="width:45% !important">Form 16 or Tax computation from previous employer should be furnished</td>
   </tr>
   <tr> <td>(a)</td> <td>Income after exemptions</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
   </tr>
   <tr> <td>(b)</td> <td>Provident Fund (PF)</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
   </tr>
   <tr> <td>(c)</td> <td>Professional Tax (PT)</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
   </tr>
   <tr> <td>(d)</td> <td>Tax deducted at source (TDS)</td>
   		<td><input type="tel" name="amount" id="amount" class="text-box" placeholder="Amount"></td>
   </tr>
  </table>
 </div>
 <hr class="hr">
 <div><b>25.</b></div>
 <div class="row">
  <div class="col-xs-7">a) Date of actual possession of property<br>[which can be validated by 'Possession Certificate' issued by builder/municipal authorities etc.]</div>
  <div class="col-xs-5"><input type="date" class="text-box tba" name="date" id="date"></div>
 </div>
 <div class="row">
  <div class="col-xs-7">b) Amortisation of pre-construction period interest (if any) incurred <br>
[which needs to be considered during Current FY 2016 - 17]</div>
  <div class="col-xs-5"><input type="text" class="text-box" name="" id=""></div>
 </div>
 <div class="row">
  <div class="col-xs-7">c) Information towards the House Property (LET OUT ) - In case of more than 1 Let out House Property</div>
  <div class="col-xs-5">&nbsp;</div>
 </div>
 <div class="inv_table4">
  <table>
   <tr class="col"> 
    <td>% of Owner Ship</td>
    <td>House Property</td>
    <td>Rental Income Per Annum</td>
    <td>Muncipal Taxes Per Annum</td>
    <td>Principal portion paid in the Financial Year</td>
   </tr>
   <tr>
    <td><input type="text" name="" id="" class="text-box"></td>
    <td>i) House Property 1</td>
    <td><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"></td>
    <td><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"></td>
    <td><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"></td>
   </tr>
   <tr>
    <td><input type="text" name="" id="" class="text-box"></td>
    <td>ii) House Property 2</td>
    <td><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"></td>
    <td><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"></td>
    <td><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"></td>
   </tr>
   <tr>
    <td><input type="text" name="" id="" class="text-box"></td>
    <td>iii) House Property 3</td>
    <td><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"></td>
    <td><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"></td>
    <td><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"></td>
   </tr>
   <tr>
    <td><input type="text" name="" id="" class="text-box"></td>
    <td>iv) House Property 4</td>
    <td><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"></td>
    <td><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"></td>
    <td><input type="tel" name="amount" id="amount" class="text-box tb23" placeholder="Amount"></td>
   </tr>
  </table>
 </div>
 <div><b>26.</b></div>
 <div><input type="checkbox" name="" id=""><br>
       <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I here by declare that Information as stated above is true and correct. I also authorize the company to recover tax (TDS) from my salary based on the PROOFS Submitted by me. I am personally liable to Income Tax proceedings for any misstatements in the declaration or proofs submitted herewith if they are inconsistent with the requirement of Income Tax Act, 1961.</p>
       </div>
  <div class="btns">
   <button type="submit" id="submit" name="submit" class="submit-btn">Submit</button>
   <button type="reset" id="clear" name="clear" class="clear-btn">Clear</button>
  </div>
  <div class="last">
   <h5>GuideLines To Fill</h5>
   <p><b>1.</b>Metro City : Mumbai / Delhi / Calcutta / Chennai<br>
   	  <b>2.</b>Non Metro City : All Other Cities<br>
      <b>3.</b>Please fill in and submit the same along with the Supporting documents<br>
      <b>4.</b>All the HRA Bills / Medical Bills / LTA Bills / Provisional Loan Certificate for House from Banker - should be ORIGINAL<br>
      <b>5.</b>Provisional Loan Certificate for House from Banker - should be submitted in respect All the properties declared by employee in the above table<br>
      <b>6.</b>As per the provisions of the Income Tax Act 1961 - HRA Exemption will not be provided, if the Employee is staying at his SELF OCCUPIED House Property <br>
      <b>7.</b>[if the Employee has claimed BOTH HRA & Interest on Self Occupied HP - For Tax Declaration ONLY one among them will be considered]<br>
      <b>1.</b>In case of Self Occupied / Let Out House Property the Employee has to mention the "Interest on Housing Loan" / "Principal repaid Amount" 
Please mention - Full amount of "Interest" / "Principal" along with the % of Owner ship<br></p>
  </div>
 </form>
 </div>
<!--end form-->
</div>
<a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
<script type='text/javascript'>
$(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});
</script>
 </div>
</div>
</div>
<div><?php include '../footer.php'; ?></div>
</body>
</html>