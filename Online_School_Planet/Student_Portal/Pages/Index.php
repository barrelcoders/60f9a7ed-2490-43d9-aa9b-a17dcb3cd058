<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Student Portal</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
   
<style>
  		 

</style>
</head>
<body>

<div id="container">
<!------Top Header-----> 
 <div class="top"> <?php include 'Header.php'; ?> </div>
<!------End Top Header ----->
<form method="post" action="#">
<!-------Container-------->
 <div class="container">
 <!--------------First(Today&)-------------------->
  <div class="row">
  <!-------Today--------->
   <div class="col-md-6">
    <div class="taday_top"><span>Today</span></div>
    <div class="taday_bottom">
     <div class="row">
      <div class="col-md-4"> <!----Attendence-------->
       <div class="taday_bottom1">
        <div class="today_bottom_top">Attendance</div> 
        <div class="today_bottom_bottom">
         <ul class="detail">
          <li><input type="date" id="theDate" class="text-box" readonly></li><li>&nbsp;</li>
          <li><!--<span class="t_name">Morning</span>-->
          	<span class="t_img">P</span><!--<span class="t_img">A</span><span class="t_img">L</span></li>--></li> <li>&nbsp;</li> 
         </ul>
         <ul class="more"><li><a href="Attendence.php">View More</a></li></ul>
         <script>
		  var date = new Date();
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();
          if (month < 10) month = "0" + month;
          if (day < 10) day = "0" + day;
          var today = year + "-" + month + "-" + day;
          document.getElementById('theDate').value = today;
		 </script>
        </div>
       </div>
      </div>
      <div class="col-md-4"> <!----Home Work-------->
       <div class="taday_bottom1">
        <div class="today_bottom_top">Home Work</div>
        <div class="today_bottom_bottom">
         <ul class="detail1">
          <li>Holiday</li>
          <li>(Summer/Winter)</li>
         </ul>
         <ul class="more"><li><a href="#">View all home work</a></li></ul>
        </div>
       </div>
      </div>
      <div class="col-md-4"> <!----Message-------->
       <div class="taday_bottom1">
        <div class="today_bottom_top">Notices</div>
        <div class="today_bottom_bottom">
         <ul class="detail1">
          <li class="t_name2"><span class="t_name1">Inbox</span><span class="t_img1">[0]</span></li>
          <li style="color:#000">You have</li>
          <li class="t_message1"><span class="t_message"><span>10</span></span></li>
          <li style="color:#000">unread messages</li>
         </ul>
         <ul class="more mare1"><li><a href="Communication.php">Go to MessageBox</a></li></ul>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  <!-------Second Today--------->
   <div class="col-md-6">
    <div class="quotes_top">
     <div class="quotes_top1"><span>Quotes</span></div>
     <div class="quotes_bottom">
      <div class="col-xs-2"><span class="left"></span></div>
      <div class="col-xs-8">Success is not the key to happiness. Happiness is the key to success. If you love what you are doing, you will be successful.<br> – Herman Cain </div>
      <div class="col-xs-2"><span class="right"></span></div>
     </div>
    </div>
   </div>
    <!--<div class="latecoming_top">
     <div class="latecoming_top1"><span>Late Coming</span></div>
     <div class="latecoming_bottom">
      <div class="table1">
       <table class="table-responsive">
        <tr class="col"> <td>Date</td> <td>Reason</td> <td>Time</td> </tr>
       </table> 
      </div>      
      <div class="table">
       <table class="table-responsive">
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
        <tr>
         <td>10-01-2017</td>
         <td>due to Metro Speed</td>
         <td>10:05AM</td>
        </tr>
       </table>
      </div>
     </div>
    </div>
   </div>-->
 <!------------End First/second(Today&)------------------>
  </div>
 <!--------------Happening()-------------------->
  <div class="row">
  <!-------Happening--------->
   <div class="col-md-6">
    <div class="happening_top">
     <div class="happening_top1"><span>Important News</span></div>
     <div class="happening_top2"><a href="ImportantNews.php"><img src="../images/le.png" width="8%;">&nbsp;&nbsp;View All...</a></div>
    </div>
    <div class="happening_bottom">
     <ul class="heppaning_bottom_detail">
      <li><a href="#">Assembly (I-V), Mental MathQuiz(School Level), Hindi list skills (VII), English list skills(VI), C2 Prac(XII)</a><span class="date">Dec 20, 2016</span><br>
       <hr class="hr">
       Assembly (I-V), Mental MathQuiz(School Level)<br>
       <a href="#" class="read">Read More..</a>      
      </li>
      <li><a href="#">Assembly (I-V), Mental MathQuiz(School Level), Hindi list skills (VII), English list skills(VI), C2 Prac(XII)</a><span class="date">Dec 20, 2016</span><br>
       <hr class="hr">
       Assembly (I-V), Mental MathQuiz(School Level)<br>
       <a href="#" class="read">Read More..</a>      
      </li>
     </ul>
    </div>
   </div>
   <!-------Second Happenings--------->
   <div class="col-md-6">
    <div class="happening_top">
     <div class="happening_top1"><span>Upcoming Events</span></div>
     <div class="happening_top2"><a href="UpcomingEvent.php"><img src="../images/le.png" width="8%;">&nbsp;&nbsp;View All...</a></div>
    </div>
    <div class="happening_bottom">
     <div class="upcoming_table">
     <div class="row">
      <div class="col-xs-3"><span class="upcoming_img">Today<br>Dec 20</span></div>
      <div class="col-xs-9">
       <p><a href="#">UT-4(V), Eval-5(IV), Carol Singing Activity (I-III), Mental Math Quiz (School Level)</a>
       <span class="date">Dec 20, 2016</span><br>
       <hr class="hr">
       UT-4(V), Eval-5(IV), Carol Singing Activity (I-III), Mental Math Quiz (School Level)<br>
       <a href="#" class="read">Read More..</a> </p>
      </div>
     </div>
     <div class="row">
      <div class="col-xs-3"><span class="upcoming_img">Today<br>Dec 20</span></div>
      <div class="col-xs-9">
       <p><a href="#">UT-4(V), Eval-5(IV), Carol Singing Activity (I-III), Mental Math Quiz (School Level)</a>
       <span class="date">Dec 20, 2016</span><br>
       <hr class="hr">
       UT-4(V), Eval-5(IV), Carol Singing Activity (I-III), Mental Math Quiz (School Level)<br>
       <a href="#" class="read">Read More..</a> </p>
      </div>
     </div>
    </div>
    </div>
   </div>
  </div>
  <!--------------End Happening()------------------------->
 </div>
<!----End Container------->
</form>
</div>
<div><?php include 'Footer.php'; ?></div>
</body>
</html>