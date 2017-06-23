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
   <li><a href="Student_DossierL1.php"><button class="btnmanu">Student Dossier Approval Level </button></a></li>
   <li class="active"><a href="Student_ICard.php"><button class="btnmanu">Student I-card data</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="studenticard">
   <div class="studenticard_head">Students I-Card</div>
   <div class="studenticard_inner">
    <form action="#" method="post">
     <div class="row">
      <div class="col-xs-3">Select Class</div>
      <div class="col-xs-3"> <select name="class" id="class" class="text-box">
     							<option value="">Selct one</option>
                            </select>
      </div>
      <div class="col-xs-3"><input type="submit" name="submit" id="submit" class="btn"></div>
      <div class="col-xs-3">&nbsp;</div>
     </div>
    </form>
   </div>
   <div class="studenticard_table" id="print">
    <form action="#" method="post">
     <table class="table-responsive">
      <tr class="col">
       <td style="border:1px solid #097b4d;">Sr. No.</td>
       <td style="border:1px solid #097b4d;">Admission Id</td>
       <td style="border:1px solid #097b4d;">Name</td>
       <td style="border:1px solid #097b4d;">Class</td>
       <td style="border:1px solid #097b4d;">Roll No</td>
       <td style="border:1px solid #097b4d;">Father Name</td>
       <td style="border:1px solid #097b4d;">Mother Name</td>
       <td style="border:1px solid #097b4d;">Mobile No</td>
       <td style="border:1px solid #097b4d;">Address</td>
       <td style="border:1px solid #097b4d;">Father Photo</td>
       <td style="border:1px solid #097b4d;">Mother Photo</td>
       <td style="border:1px solid #097b4d;">Guardian Photo</td>
      </tr>
      <tr>								
       <td style="border:1px solid #097b4d;">1</td>
       <td style="border:1px solid #097b4d;">W-100</td>
       <td style="border:1px solid #097b4d;">ASDFGHJ SDFGH</td>
       <td style="border:1px solid #097b4d;">XII-E (ART)</td>
       <td style="border:1px solid #097b4d;">I-A</td>
       <td style="border:1px solid #097b4d;">ZXCVB ASDFG</td>
       <td style="border:1px solid #097b4d;">QWERTY DFGHJK</td>
       <td style="border:1px solid #097b4d;">9999999999</td>
       <td style="border:1px solid #097b4d;">ASDFGH ASDFGH, QWERT, ERTYUI, ASFGHJ, 1000000</td>
       <td style="border:1px solid #097b4d;"><img src="../images/DPS Logo.png" height="80px" width="70px" ></td>
       <td style="border:1px solid #097b4d;"><img src="../images/DPS Logo.png" height="80px" width="70px" ></td>
       <td style="border:1px solid #097b4d;"><img src="../images/DPS Logo.png" height="80px" width="70px" ></td>
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
						

 
 
 
 




