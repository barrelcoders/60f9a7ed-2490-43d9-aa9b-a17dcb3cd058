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
   <li><a href="Student_Promotion.php"><button class="btnmanu">Student Promotion</button></a></li>
   <li class="active"><a href="Student_DossierL1.php"><button class="btnmanu">Student Dossier Approval Level </button></a></li>
   <li><a href="Student_ICard.php"><button class="btnmanu">Student I-card data</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="studentDA">
   <div class="studentDA_head">Dossier Approve</div>
   <div class="studentDA_link">
    <div class="row">
     <div class="col-xs-6">
      <a href="Student_DossierL1.php">
       <button class="btnmanu">Student Dossier Approval Level 1</button></a>
     </div>
     <div class="col-xs-6">
      <a href="Student_DossierL2.php" class="active"><button class="btnmanu">Student Dossier Approval Level 2 &nbsp;<font size="+2">&dArr;</font></button></a>
     </div>
    </div>
   </div>
   <div class="studentDA_table" id="print">
    <form action="#" method="post">
     <table class="table-responsive">
      <tr class="col">
       <td style="border:1px solid #097b4d">Sr. No.</td>
       <td style="border:1px solid #097b4d">Admission No</td>
       <td style="border:1px solid #097b4d">Name</td>
       <td style="border:1px solid #097b4d">Class</td>
       <td style="border:1px solid #097b4d">Roll No</td>
       <td style="border:1px solid #097b4d">CGPA Sem-1</td>
       <td style="border:1px solid #097b4d">CGPA Sem-2</td>
       <td style="border:1px solid #097b4d">Overall CGPA</td>
       <td style="border:1px solid #097b4d">Concepts/ Work Habits</td>
       <td style="border:1px solid #097b4d">Attitude/ Behavior</td>
       <td style="border:1px solid #097b4d">Extra Curricular Activities</td>
       <td style="border:1px solid #097b4d">Special Talent</td>
       <td style="border:1px solid #097b4d">Record for long leave and reason</td>
       <td style="border:1px solid #097b4d">Any special incident and measures takes</td>
       <td style="border:1px solid #097b4d">Level 1 Approval Status</td>
       <td style="border:1px solid #097b4d">Approve</td>
       <td style="border:1px solid #097b4d">Edit</td>
      </tr>										
      <tr>
       <td style="border:1px solid #097b4d">1</td>
       <td style="border:1px solid #097b4d">I-D</td>
       <td style="border:1px solid #097b4d">I</td>
       <td style="border:1px solid #097b4d">1</td>
       <td style="border:1px solid #097b4d">I-D</td>
       <td style="border:1px solid #097b4d">I</td>
       <td style="border:1px solid #097b4d">1</td>
       <td style="border:1px solid #097b4d">I-D</td>
       <td style="border:1px solid #097b4d">I</td>
       <td style="border:1px solid #097b4d">1</td>
       <td style="border:1px solid #097b4d">I-D</td>
       <td style="border:1px solid #097b4d">I</td>
       <td style="border:1px solid #097b4d">1</td>
       <td style="border:1px solid #097b4d">I-D</td>
       <td style="border:1px solid #097b4d">I-D</td>
       <td style="border:1px solid #097b4d"><a href="#">Approve</a></td>
       <td style="border:1px solid #097b4d"><a href="#">Edit</a></td>
      </tr>
     </table>
    </form>
   </div>
   <div align="center"> <a href="Javascript:printDiv();" >PRINT</a></div>
  </div>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>		
<!----end printer--->
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("print").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
		
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>
 
 
 




