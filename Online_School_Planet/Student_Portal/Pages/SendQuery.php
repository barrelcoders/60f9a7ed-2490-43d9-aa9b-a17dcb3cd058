<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Student Portal</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
</head>
<style>
</style>
<body>

<div id="container">
<!------Top Header-----> 
 <div class="top"> <?php include 'Header.php'; ?> </div>
 
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />   
   <script src="../js/jquery.dataTables.min.js"></script>
   <script src="../js/dataTables-data.js"></script>

<!------End Top Header ----->
 <!-------Container-------->
  <div class="communication">
   <div class="communication_inner">
    <form method="post" action="#">
     <div class="message">
      <div class="message_inner">
       <p>Dear Parent,<br>
          We always welcome feedback from you and are always eager to listen from you.<br>
          If you have any feedback / complaints, please share the same  and we will respond to your queries as soon as possible<br>
       </p>
       <div class="message_name">
        <div class="row">
         <div class="col-xs-4">Student Name: &nbsp;ABCD ERIOP</div>
         <div class="col-xs-4">Class: &nbsp;2C</div>
         <div class="col-xs-4">Roll No: &nbsp;123</div>
        </div>
        <div class="col-xs-6">Select Subject of Your Query (*)</div>
        <div class="col-xs-6"><select name="querytype" id="querytype" class="text-box">
       						 	<option value="">Select One</option>
                                <option value="Studies Related">Studies Related</option>
                                <option value="Transport">Transport</option>
                                <option value="Admission">Admission</option>
                                <option value="Fee">Fee</option>
                                <option value="Report Card">Report Card</option>
                                <option value="Sick Leave">Sick Leave</option>
                                <option value="General Feedback">General Feedback</option>
                                <option value="General Query">General Query</option>
                             </select>
        </div>
        <div class="col-xs-12"><textarea name="textmessage" id="textmessage" class="text-box tba" rows="10" placeholder="Type You Query Here....."></textarea></div> 
       </div>
      </div>
      <div class="col-xs-12" align="center"><input type="submit" name="submit" class="btn" value="Send"></div>
     </div>
    </form>
   </div>
  </div>
 <!----End Container------->
 </div>
<div><?php include 'Footer.php'; ?></div>
</body>
</html>