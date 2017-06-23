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
  <div class="emecontact">
   <div class="emecontact_inner">
    <div class="emecontact_inner_head">School Directory</div>
    <form method="post" action="#">
     <div class="table">
      <table class="table-responsive">
       <tr class="col"> <td>Sr.No</td><td>Section</td><td>Phone</td><td>E-mail</td> </tr>
       <tr>
        <td>1</td>
        <td>Reception</td>
        <td>0000000000</td>
        <td>asb@dk.com</td>
       </tr>
       <tr>
        <td>2</td>
        <td>Accounts</td>
        <td>0000000000</td>
        <td>asb@dk.com</td>
       </tr>
       <tr>
        <td>3</td>
        <td>Transport</td>
        <td>0000000000</td>
        <td>asb@dk.com</td>
       </tr>
      </table>
     </div>
    </form>
   </div>
  </div>
 <!----End Container------->
</div>
<div><?php include 'Footer.php'; ?></div>
</body>
</html>