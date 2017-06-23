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
  <div class="datesheet">
   <div class="datesheet_inner">
    <div class="datesheet_head">Exams Datesheet</div>
    <form action="#" method="post" >
     <div class="selectbox">
      <select name="examterm" id="examterm" class="text-box">
        <option value="">---Select Term---</option>
      </select>
     </div>
     <div class="datesheet_table">
      <table class="table-responsive">
       <tr class="col">
        <td>Class</td><td>Subject</td><td>Date</td><td>Test Type</td>
       </tr>
       <tr>
        <td>III</td>
        <td>English</td>
        <td>2-January-2017</td>
        <td>FA1</td>
       </tr>
      </table>
     </div>
    </form>
   </div>
  </div>
 </div>
 <div><?php include 'Footer.php'; ?></div>
</body>
</html>