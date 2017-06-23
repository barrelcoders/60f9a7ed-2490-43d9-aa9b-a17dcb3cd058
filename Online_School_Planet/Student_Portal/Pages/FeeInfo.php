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
  <div class="feeinfo">
   <div class="feeinfo_inner">
    <div class="feeinfo_head">Fee Information</div>
     <div class="feeinfo_table">
      <table class="table-responsive">
       <tr class="col">
        <td>Sr. No.</td><td>Fee Type</td><td>Fee Submit Date</td><td>Amount</td>
       </tr>
       <tr>
        <td>1</td>
        <td>Tuition Fee</td>
        <td>2-January-2017</td>
        <td>500.00</td>
       </tr>
      </table>
     </div>
   </div>
  </div>
 </div>
 <div><?php include 'Footer.php'; ?></div>
</body>
</html>