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
   <li class="active"><a href="exit.php"><button class="btnmanu">Resignation</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <form action="#" method="post">
  <div class="exit-topmanu">
   <!--------------->   
   <div class="exit">Employee Information</div>
   <div class="exit-table1">
    <table>
     <tr> <td>Employee Code</td><td><strong>:</strong></td><td>10532</td> </tr>
     <tr> <td>Date Of Joining</td><td><strong>:</strong></td><td>Sep 05, 2011</td> </tr>
     <tr> <td>Notice Period</td><td><strong>:</strong></td><td>60</td> </tr>
     <tr> <td>L1 Manager</td><td><strong>:</strong></td><td>Rahul Kumar Sahu</td> </tr>
     <tr> <td>Hr Manager</td><td><strong>:</strong></td><td>Ayan Majumdar</td> </tr>
     <tr> <td>Personal Email</td><td><strong>:</strong></td><td></td> </tr>
     <tr> <td>Relieving Date as Per Policy</td><td><strong>:</strong></td><td>Jan 29, 2017</td> </tr>
    </table>
    <table>
     <tr> <td>Employee Name</td><td><strong>:</strong></td><td>Mohit Aggrawal</td> </tr>
     <tr> <td>Designation</td><td><strong>:</strong></td><td>Senior Territory Manager - Sales</td> </tr>
     <tr> <td>Location</td><td><strong>:</strong></td><td>India->Haryana->Faridabad</td> </tr>
     <tr> <td>L2 Manager</td><td><strong>:</strong></td><td>Ketaki Chaudhary</td> </tr>
     <tr> <td>Official Email</td><td><strong>:</strong></td><td>mohitaggarwal@pearson.com</td> </tr>
     <tr> <td>Confirmation Status</td><td><strong>:</strong></td><td>Confirmed</td> </tr>
    </table>
   </div>
  </div>
  <div class="exit-topmanu">
   <!--------------->   
   <div class="exit">Correspondence Details</div>
   <div class="exit-table2">
    <table>
     <tr> <td>Correspondence Email</td><td><strong>:</strong></td>
     	  <td><input type="email" name="cemail" id="cemail" class="text-box" ></td> </tr>
     <tr> <td>Correspondence Address</td><td><strong>:</strong></td><td><textarea name="caddress" id="caddress" class="text-box tbs"></textarea></td> </tr>
    </table>
    <table>
     <tr> <td>Correspondence Number</td><td><strong>:</strong></td><td><input type="number" name="cnumber" id="cnumber" class="text-box tba" min="0" ></td> </tr>
    </table>
   </div>
  </div>
  <div class="exit-topmanu">
   <!--------------->   
   <div class="exit">Relieving Information</div>
   <div class="exit-table3">
    <table>
     <tr> <td>Date Of Resignation</td><td><strong>:</strong></td>
     	  <td><input type="date" name="dor" id="dor" class="text-box tba" ></td> </tr>
     <tr> <td>Resignee Comments</td><td><strong>:</strong></td><td><textarea name="rcomment" id="rcomment" class="text-box tba"></textarea></td> </tr>
     <tr> <td>Document</td><td><strong>:</strong></td>
     	  <td><input type="file" name="document" id="document"  ></td> </tr>
    </table>
    <table>
     <tr> <td>Reason For Leaving</td><td><strong>:</strong></td>
     	  <td><select name="reason" id="reason" class="text-box tbs">
                <option value="">Please Select</option>
                <option value=""></option>
          	  </select>
     </td> </tr>
     <tr> <td>Expected Relieving Date</td><td><strong>:</strong></td>
     	  <td><input type="date" name="erd" id="erd" class="text-box tba" ></td> </tr>
    </table>
   </div>
  </div>
  <div class="payroll-btn"><!--<input type="submit" name="submit" id="submit" value="VIEW" onClick="show('payslip');" class="btn">-->
                            <input type="submit" name="submit" id="submit" value="SAVE" class="btn">&nbsp;&nbsp;
    						<input type="submit" name="submit" id="submit" value="SUBMIT" class="btn">
  </div>
 </form>
 
 </div>
</div>
</div>
</div>
<div><?php include '../footer.php'; ?></div>
</body>
</html>