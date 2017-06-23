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
table td{font-size:14px;}
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
   <li class="active"><a href="payroll.php"><button class="btnmanu">View Payslip</button></a></li>
   <li><a href="payrollfbp.php"><button class="btnmanu">FBP Planner</button></a></li>
   <li><a href="investment_declaration.php"><button class="btnmanu">Investment Declaration</button></a></li>
   <li><a href="#payrollnewfbp.php"><button class="btnmanu">NEW FBP CLAIM</button></a></li>
   <li><a href="#payrollmyfbp.php"><button class="btnmanu">MY FBP CLAIMS</button></a></li>
   <li><a href="payrollproofsubmission.php"><button class="btnmanu">Proof Submission</button></a></li>
   <li><a href="payrollform16.php"><button class="btnmanu">Form16</button></a></li>
   <li><a href="#payrollnpsdecl.php"><button class="btnmanu">NPS Declaration</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <!---printer---->
<div id="print">
 <!-----outer--->
 <div style="border:2px solid #0b462d; border-radius:5px; padding:1% 0; box-shadow:#666;">
  <!---containt--->
<!--top-->
   <div align="center" style="width:100%;">
    <font size="+3"><strong>DELHI PUBLIC SCHOOL FARIDABAD</strong></font><br>
	<div align="center" style="width:100%;">MATHURA ROAD ,SECTOR-19 , FARIDABAD ,<br> FARIDABAD (HARYANA) - 121002</div>
    <div style="font-size:18px; font-weight:700; margin:0.8% 0; padding:0.2%; border:2px solid #0b462d; border-left:none; border-right:none; width:100%">Pay Slip for the month of September 2016</div>
   </div>
<!---Name--->
   <div style="width:100%">
    <table style="width:100%;">
     <tr>
      <td style="width:27%; padding:3px 1%;"><strong>Employee Id</strong></td><td style="width:2%"><strong>:</strong></td> 
      <td style="width:21%">A015</td>
      <td style="width:27%; padding:3px 1%;"><strong>Name</strong></td><td style="width:2%"><strong>:</strong></td>
      <td style="width:21%">ABC</td>     
     </tr>
     <tr>
      <td style="width:27%; padding:3px 1%;"><strong>Department</strong></td><td style="width:2%"><strong>:</strong></td> 
      <td style="width:21%">IT</td>
      <td style="width:27%; padding:3px 1%;"><strong>Designation</strong></td><td style="width:2%"><strong>:</strong></td> 
      <td style="width:21%"></td> 
     </tr>
     <tr>
      <td style="width:27%; padding:3px 1%;"><strong>Date Of Joining</strong></td><td style="width:2%"><strong>:</strong></td> 
      <td style="width:21%">05/07/2012</td>
      <td style="width:27%; padding:3px 1%;"><strong>PF Account No.</strong></td><td style="width:2%"><strong>:</strong></td> 
      <td style="width:21%"></td> 
     </tr>
     <tr>
      <td style="width:27%; padding:3px 1%;"><strong>Days Payable</strong></td><td style="width:2%"><strong>:</strong></td> 
      <td style="width:21%">30</td>
      <td style="width:27%; padding:3px 1%;"><strong>ESI Account No.</strong></td><td style="width:2%"><strong>:</strong></td> 
      <td style="width:21%"></td> 
     </tr>
     <tr>
      <td style="width:27%; padding:3px 1%;"><strong>Bank A/C No.</strong></td><td style="width:2%"><strong>:</strong></td> 
      <td style="width:21%">00054420</td>
      <td style="width:27%; padding:3px 1%;"><strong>PAN No.</strong></td><td style="width:2%"><strong>:</strong></td> 
      <td style="width:21%">BC494865S51</td> 
     </tr>
     <tr>
      <td style="width:27%; padding:3px 1%;"><strong>UAN NO.</strong></td><td style="width:2%"><strong>:</strong></td> 
      <td style="width:21%">N/A</td>
      <td style="width:27%; padding:3px 1%;"><strong>Location</strong></td><td style="width:2%"><strong>:</strong></td> 
      <td style="width:21%">Faridabad</td> 
     </tr>
    </table>
   </div> 
<!-----Earning Detail--> 
   <div style="width:100%">
    <table style="width:100%; border:2px solid #0b462d; padding:0; border-left:none; border-right:none;"cellspacing="0" cellpadding="0">
     <tr>   <td style="width:35%; border-bottom:2px solid #0b462d; padding:0.2% 0 0.2% 1%;"><strong>Earnings</strong></td>
     		<td style="width:15%; border-bottom:2px solid #0b462d; border-right:2px solid #0b462d; text-align:right; padding-right:1%;"><b>Amount</b></td>
            <td style="width:35%; border-bottom:2px solid #0b462d; padding:0.3% 0 0.3% 1%;;"><strong>Deductions</strong></td>
     		<td style="width:15%; border-bottom:2px solid #0b462d; text-align:right; padding-right:1%;"><b>Amount</b></td>    
     </tr>
     <tr>   <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong>Basic Salary</strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%; border-right:2px solid #0b462d;">15,238.65</td>
            <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong>TDS</strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%;">0.00</td>
     </tr>
     <tr>   <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong>Grade Pay</strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%; border-right:2px solid #0b462d;">1,365.33</td>
            <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong>Provident Fund</strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%;">780.00</td>
     </tr>
     <tr>   <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong>Additional Grade Pay</strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%; border-right:2px solid #0b462d;">2,285.33</td>
            <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong>Other Recovery</strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%;">200.00</td>
     </tr>
     <tr>   <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong>Dearness Allowance</strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%; border-right:2px solid #0b462d;">7,619.33</td>
            <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong></strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%;"></td>
     </tr>
     <tr>   <td style="width:35%;  padding:0.3% 0 0.3% 1%;;"><strong>House Rent Allowance</strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%; border-right:2px solid #0b462d;">6,095.33</td>
            <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong></strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%;"></td>
     </tr>
     <tr>   <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong>Travelling Allowance</strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%; border-right:2px solid #0b462d;">3,809.33</td>
            <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong></strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%;"></td>
     </tr>
     <tr>   <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong>T.A.D.A.</strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%; border-right:2px solid #0b462d;">3,809.33</td>
            <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong></strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%;"></td>
     </tr>
     <tr>   <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong>Others</strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%; border-right:2px solid #0b462d;">3,809.33</td>
            <td style="width:35%; padding:0.3% 0 0.3% 1%;;"><strong></strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%;"></td>
     </tr>
     <tr> 
       <td style="width:35%;border-bottom:2px solid #0b462d;border-top:2px solid #0b462d;padding:0.2% 0 0.2% 1%;"><strong>Total Earnings (A)</strong></td>
     	<td style="width:15%; border-bottom:2px solid #0b462d; border-top:2px solid #0b462d; border-right:2px solid #0b462d; text-align:right; padding-right:1%;"><b>36,413.07</b></td>
        <td style="width:35%;border-bottom:2px solid #0b462d;border-top:2px solid #0b462d;padding:0.3% 0 0.3% 1%;;"><strong>Total Deductions (B)</strong></td>
     		<td style="width:15%; border-bottom:2px solid #0b462d;border-top:2px solid #0b462d; text-align:right; padding-right:1%;"><b>980.00</b></td>    
     </tr>
     <tr>   <td style="width:35%; padding:0.5% 0 0.5% 1%;;"><strong>Net Pay (A-B)<br>(After Roundoff)</strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%;"><b>35,436,00</b></td>
            <td style="width:35%; padding:0.5% 0 0.5% 1%;;"><strong>(in words)</strong></td>
     		<td style="width:15%; text-align:right; padding-right:1%; "><b></b></td>
     </tr>
    </table> 
   </div>
<!---Signature-->   
   <div  style="width:100%;">
    <table style="width:100%; padding:6% 0 2% 0; margin:6% 0 3% 0;">
    <tr>
     <td style="padding-left:1%; width:70%;">
      <hr style="border:1px solid #0b462d; width:250px;"><br>
		<b>Employer's Signature</b>
     </td>	
     <td style="padding-Right:5%; float:right;">
      <hr style="border:1px solid #0b462d; width:250px; text-align:right;"><br>
		<b style="float:right;">Employee's Signature</b>
     </td>
    </tr>
    </table>
    <!----end containt--->
 </div>
 <!---End outer---->
  </div><div align="center" style="width:100%; margin-top:1%;">&nbsp;<a href="Javascript:printDiv();" >PRINT</a></div>
</div>
<!----end printer--->
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("print").innerHTML;
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
 </div>
</div>
</div>
</div>
<div><?php include 'footer.php'; ?></div>
</body>
</html>