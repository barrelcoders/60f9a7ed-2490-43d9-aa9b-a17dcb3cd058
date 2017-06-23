<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Employee Portal</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
   <script src="../js/sorttable.js"></script>
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
   <li><a href="helpdeskNewquery.php"><button class="btnmanu">New Query</button></a></li>
   <li class="active"><a href="helpdeskMyquery.php"><button class="btnmanu">My Queries</button></a></li>
   <li><a href="helpdeskFAQs.php"><button class="btnmanu">FAQs</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <form action="#" method="post">
  
   <div class="hepldesk1">New Query List</div>
  <div class="hepldesk-topmanu">
   <!--------------->   
   <div class="hepldesk-table">
    <table class="sortable">
     <thead> <td>Query No.<br><input type="number" name="queryno" id="queryno" class="text-box tbt" min="0"></td>
     		 <td>Subject</td>
             <td>Status<br><input type="text" name="status" id="status" class="text-box tbt"></td>
             <td>Category</td>
             <td>Closure Time</td>
             <td>Create Time</td>
             <td>Action</td>
     </thead>
     <tbody>
      <tr>
       <td>2016101210003578</td>
       <td>L1 Manager</td>
       <td>Closed</td>
       <td>Salary::Name/DOB/Designation/Location change in salary slip</td>
       <td>2016-10-12<br> 14:52:36:0</td>
       <td>2016-10-12<br> 08:35:10:0</td>
       <td></td>
      </tr>
      <tr>
       <td>2016101210013578</td>
       <td>L1 Manager</td>
       <td>Closed</td>
       <td>Salary::Name/DOB/Designation/Location change in salary slip</td>
       <td>2016-10-12<br> 14:52:36:0</td>
       <td>2016-10-12<br> 08:35:10:0</td>
       <td></td>
      </tr>
      <tr>
       <td>2016101210103578</td>
       <td>L1 Manager</td>
       <td>Closed</td>
       <td>Salary::Name/DOB/Designation/Location change in salary slip</td>
       <td>2016-10-12<br> 14:52:36:0</td>
       <td>2016-10-12<br> 08:35:10:0</td>
       <td></td>
      </tr>
     </tbody>
    </table>
   </div>
  </div>
  <div class="payroll-btn"> <input type="submit" name="submit" id="submit" value="SEND" class="btn">
  </div>
 </form>
 </div>
</div>
</div>
</div>
<div><?php include 'footer.php'; ?></div>
</body>
</html>