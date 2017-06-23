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
  <div class="timetable">
   <div class="timetable_inner">
    <div class="timetable_head">Time Table for Class</div>
     <div class="timetable_table">
      <table class="table-responsive">
       <tr class="col">
        <td>Class</td><td>Subject</td><td>Date</td><td>Time</td>
       </tr>
       <tr>
        <td>III</td>
        <td>English</td>
        <td>2-January-2017</td>
        <td>FA1</td>
       </tr>
      </table>
     </div>
   </div>
  </div>
 </div>
 <div><?php include 'Footer.php'; ?></div>
</body>
</html>