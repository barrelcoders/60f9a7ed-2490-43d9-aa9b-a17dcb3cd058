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
   <li><a href="helpdeskNewquery.php"><button class="btnmanu">New Query</button></a></li>
   <li><a href="helpdeskMyquery.php"><button class="btnmanu">My Queries</button></a></li>
   <li class="active"><a href="helpdeskFAQs.php"><button class="btnmanu">FAQs</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <form action="#" method="post">
  <div class="hepldesk-topmanu">
   <!--------------->   
   <div class="hepldesk">FAQ Categories</div>
   <div class="hepldesk-table">
    <div class="row faqc">
     <div> Category:&nbsp;&nbsp;<select name="category" id="category" class="text-box tbs">
    								<option value="">Select Category</option>
                                    <option value=""></option>
                               </select>
     </div>
     <div><input type="text" name="search" id="search" class="text-box" placeholder="Search">
     		<button class="btn" type="btn"><span class="search"><img src="../../images/search.png" class="img-responsive"></span></button></div>
   </div>
  <!------------>
   <div class="hepldesk2">Frequently Asked Questions</div>
   <div class="faq-table">
    <table class="table table-striped table-class" id= "table-id">
     <tr><td>No Artical Found.</td><td></td></tr>
    </table>
    <div class="row faqbtn"> 	<!--		Show Numbers Of Rows 		-->
	 <div class="btnbtn">
     				<button class="btn" type="btn"><span class="step-backward"></span> </button>&nbsp;
                    <button class="btn" type="btn"><span class="backward"></span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn" type="btn"><span class="forward"></span></button>&nbsp;
                    <button class="btn" type="btn"><span class="step-forward"></span></button>&nbsp;&nbsp;&nbsp;</div>
      <div> 
                     <select name="state" id="maxRows" class="text-box" >
						 <option value="5">5</option>
						 <option value="10">10</option>
						 <option value="15">15</option>
						 <option value="20">20</option>
						 <option value="50">50</option>
						 <option value="70">70</option>
						 <option value="100">100</option>
						</select>
	 </div>		 		
	</div>
    <div style="margin:2% 1% 1% 0%;"><b>Query not listed?</b><a href="#">Click Here</a><b>to get in touch with us.</b></div>
            
   </div>
  </div>
 </div>
 </form>
</div>
</div>
</div></div>
</body>
</html>
<div><?php include 'footer.php'; ?></div>