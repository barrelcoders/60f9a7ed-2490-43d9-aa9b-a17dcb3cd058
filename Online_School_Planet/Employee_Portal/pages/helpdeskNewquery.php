<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Employee Portal</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
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
   <li class="active"><a href="helpdeskNewquery.php"><button class="btnmanu">New Query</button></a></li>
   <li><a href="helpdeskMyquery.php"><button class="btnmanu">My Queries</button></a></li>
   <li><a href="helpdeskFAQs.php"><button class="btnmanu">FAQs</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <form action="#" method="post">
  <div class="hepldesk-topmanu">
   <!--------------->   
   <div class="hepldesk">New Query</div>
   <div class="hepldesk-table">
    <div class="row nq">
      <div> Category:&nbsp;&nbsp;<select name="category" id="category" class="text-box tbs">
    								<option value="">Select Category</option>
                                    <option value=""></option>
                               </select>
     </div>
     <div>Subject:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="subject" id="subject" class="text-box"></div>	
    </div>
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