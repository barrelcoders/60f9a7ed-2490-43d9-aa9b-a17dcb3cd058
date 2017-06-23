<?php session_start();?>
<html lang=''><head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Student Management</title>
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>
<body>
<div id="container">
<!----Header--------->
<div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="ExistingStudent_StudentMaster.php"><button class="btnmanu">Student Master</button></a></li>
   <li><a href="Allot_Transpoart.php"><button class="btnmanu">Allot Transport</button></a></li>
   <li><a href="Student_Strength.php"><button class="btnmanu">Student Strength</button></a></li>
   <li class="active"><a href="Student_Promotion.php"><button class="btnmanu">Student Promotion</button></a></li>
   <li><a href="Student_DossierL1.php"><button class="btnmanu">Student Dossier Approval Level </button></a></li>
   <li><a href="Student_ICard.php"><button class="btnmanu">Student I-card data</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="studentpromote">
   <div class="studentpromote_head">Promote Students</div>
   <div class="studentpromote_link">
    <div class="row">
     <div class="col-xs-6">
      <a href="Student_Promotion.php" class="active"><button class="btnmanu">Student Promotion &nbsp;<font size="+2">&dArr;</font></button></a>
     </div>
     <div class="col-xs-6"><a href="Student_Bulk_Promotion.php"><button class="btnmanu">Bulk Student Promotion</button></a></div>
    </div>
   </div>
   <div class="studentpromote_inner">
    <form action="#" method="post">
     <div class="row">
      <div class="col-xs-3">Select Class For Promotion</div>
      <div class="col-xs-3"> <select name="classForPromotion" id="classForPromotion" class="text-box">
     							<option value="">Selct one</option>
                            </select>
      </div>
      <div class="col-xs-3"><input type="submit" name="submit" id="submit" class="btn"></div>
      <div class="col-xs-3">&nbsp;</div>
     </div>
    </form>
   </div>
   <div class="studentpromote_table">
    <form action="#" method="post">
     <table class="table-responsive">
      <tr class="col">
       <td>Sr. No.</td><td>Admission Id</td><td>Student Name</td><td>Current Class</td><td>Master Class</td><td>Promote To Class</td><td>Action</td>
      </tr>
      <tr>
       <td>1</td>
       <td>W-100</td>
       <td>ASDFGHJ SDFGH</td>
       <td>XII-E (ART)</td>
       <td><select name="masterClass" id="masterClass" class="text-box">
       	      <option value="">Select One</option>
           </select>
       </td>
       <td><select name="promoteClass" id="promoteClass" class="text-box">
       	      <option value="">Select One</option>
           </select>
       </td>
       <td><input type="submit" name="submit" value="Promote" class="btn"></td>
      </tr>
     </table>
    </form>
   </div>
  </div>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>									
						

 
 
 
 




