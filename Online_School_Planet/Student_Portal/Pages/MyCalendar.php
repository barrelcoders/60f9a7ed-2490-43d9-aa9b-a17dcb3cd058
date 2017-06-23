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
  <div class="mycalender">
   <div class="mycalender_inner">
    <div class="mycalender_head">School Holiday</div>
    <div class="mycalender_table">
     <table class="table-responsive">
      <tr class="col">
       <td>Month</td><td>Total Work Day</td><td>Days Present</td><td>Days Leave</td><td>Days Absent</td><td>Percentage %</td>
      </tr>
      <tr>
       <td>January, 2017</td>
       <td>31</td>
       <td>20</td>
       <td>3</td>
       <td>2</td>
       <td>80%</td>
      </tr>
     </table>
    </div>
   </div>
  </div>
 </div>
<div><?php include 'Footer.php'; ?></div>
</body>
</html>