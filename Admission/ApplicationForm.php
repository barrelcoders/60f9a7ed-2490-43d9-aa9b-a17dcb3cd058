<?php session_start();?>







<html lang=''>







<head>







 <meta charset='utf-8'>







   <meta http-equiv="X-UA-Compatible" content="IE=edge">







   <meta name="viewport" content="width=device-width, initial-scale=1">







   <title>DPS</title>















       <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" />







       <link rel="stylesheet" href="../bootstrap/nexus.css" />







       <script src="../bootstrap/bootstrap.min.js"></script>







       <script src="../bootstrap/jquery.min.js"></script>







    </head>







    <style>







    body{font-family:Arial; cursor:default; overflow:hidden;}

    .outer .inner{border:4px double #097b4d; border-radius:7px; padding:0.5%; height:620px;}

    .outer{padding:1%;}

    .outer .inner .logo{text-align:center; width:100%; margin-bottom:1%;}

    .outer .inner .logo img{width:35%; margin-left:30%}

    .outer .inner .address font{width:100%; font-size:14px; font-weight:bold;}

    .outer .inner .head{font-size:15px; text-align:center; text-decoration:underline; font-weight:600; margin-top:1.5%;}

	.outer .inner .row table{width:90%; margin-left:5%; margin-top:1%;} 

.outer .inner .row table tr td{font-size:12.5px; font-weight:700; color:#000; padding:0.5% 0.5%; border:1px solid #063;}



		.outer .inner .row a:hover{color:#0b462d;} .outer .inner .row a{color: rgba(11, 70, 45, 0.75);}

        

	.outer .inner .row table td{width:50%;}

	    .outer .inner .link{text-align:center; margin-top:0.8%;}

    .outer .inner .link a .btnmanu{background:#097b4d; color:#fff; width:40%; height:42px; font-size:14px; font-weight:bold; border:1px solid transparent; border-radius:5px;}

    .outer .inner .link a .btnmanu:hover{background:#0b462d;}

    @media only screen and (min-width:720px) and (max-width: 920px){ .outer .inner{height:auto;} body{overflow:auto; }

    .outer .inner .address font{font-size:14px;} .outer .inner .logo img{width:50%; margin-left:25%;} .outer .inner .notice1 a{margin-left:10%;} .outer .inner .notice a{margin-left:10%;}

    .outer .inner .link a .btnmanu{width:60%; font-size:15px;}  }

    @media only screen and (min-width:450px) and (max-width: 720px){.outer .inner{height:auto;} body{overflow:auto; }

    .outer .inner .address font{font-size:14px;} .outer .inner .logo img{width:50%; margin-left:25%;} .outer .inner .notice1 a{margin-left:10%;} .outer .inner .notice a{margin-left:10%;}

    .outer .inner .link a .btnmanu{width:70%; font-size:14px;} }

    @media only screen and (min-width:250px) and (max-width: 450px){.outer .inner{height:auto;} body{overflow:auto; }

    .outer .inner .address font{font-size:12px;} .outer .inner .logo img{width:80%; margin-left:10%;} .outer .inner .head{font-size:15px; margin:10% 0;} 

    .outer .inner .link a .btnmanu{width:100%; font-size:12px;}}







    </style>







    <body>







    <div id="container">







     <div class="outer">

      <div class="inner">

      <div class="logo"><img src="../Admin/images/logo.png" class="img-responsive"></div>

       <div class="address" align="center">

        <font>Sector-24, Phase III, Rohini, New Delhi-110085</font><br>

        <font>Phone No: (011)27055942, 27055943</font><br>

        <font>Email Id: mail@dpsrohini.com, principal@dpsrohini.com</font>

       </div>

      <div class="head">NURSERY / PRE-SCHOOL ADMISSIONS (SESSION 2017 - 2018)</div>

<!--

	   <div class="col-xs-6 notice1" align="center"><a class="button" href="#popup1"><img src="../Admin/images/new.gif"><strong>REVISED ADMISSION SCHEDULE FOR NURSERY / PRE-SCHOOL</strong></a></div>

	   <div class="col-xs-6 notice" align="center"><a href="AdmissionToNurseryFeb.php"><img src="../Admin/images/new.gif"><strong>IMPORTANT - 15 FEBRUARY 2017</strong></a></div>

 	   <div class="col-xs-6 notice11" align="center"><a href="AdmissionToNurseryFeb1.php"><img src="../Admin/images/new.gif"><strong>REVISED POINT SYSTEM FOR NURSERY / PRE-SCHOOL ADMISSION </strong></a></div>

       <div class="col-xs-6 noticeNew" align="center"><img src="../Admin/images/new.gif"><strong>The last date for accepting Affidavit for Single Parent /<br> First Born has been extended till 12 Noon, 20 February 2017 (Monday).</strong></div>

       <div class="noticeVERIFICATION"><a href="Instruction_for_verification.php"><img src="../Admin/images/new.gif"><strong>INSTRUCTIONS FOR VERIFICATION - 20 FEBRUARY 2017  </strong></a></div>-->

<div class="row">

<table>

     <tr> <td><div class="notice1"><a class="button" href="#popup1"><img src="../Admin/images/new.gif"><strong>REVISED ADMISSION SCHEDULE FOR NURSERY / PRE-SCHOOL - 23 JANUARY 2017 </strong></a></div></td> <td style="color:rgba(11, 70, 45, 0.75); text-transform:uppercase;"><img src="../Admin/images/new.gif"><strong>The last date for accepting Affidavit for Single Parent / First Born has been extended till 12 Noon, 20 February 2017 (Monday).</strong></td> </tr>

	 <tr> <td><a href="AdmissionToNurseryFeb.php"><img src="../Admin/images/new.gif"><strong>IMPORTANT - 15 FEBRUARY 2017</strong></a></td> <td><a href="Instruction_for_verification.php"><img src="../Admin/images/new.gif"><strong>INSTRUCTIONS FOR VERIFICATION - 20 FEBRUARY 2017  </strong></a></td></tr>

	 

     <tr> <td><a href="AdmissionToNurseryFeb1.php"><img src="../Admin/images/new.gif"><strong>REVISED POINT SYSTEM FOR NURSERY / PRE-SCHOOL ADMISSION - 15 FEBRUARY 2017</strong></a></td> <td><a href="List_of_Candidates.pdf"><img src="../Admin/images/new.gif"><strong>LIST OF CANDIDATES [GENERAL CATEGORY] REGISTERED FOR ADMISSION TO NURSERY (PRE SCHOOL) 2017-2018 - 21 FEBRUARY 2017  </strong></a></td></tr>

     

    <tr> <td><a href="nurserylist_points_2017-18.pdf"><img src="../Admin/images/new.gif"><strong>MARKS ( AS PER POINT SYSTEM ) GIVEN TO EACH OF THE CHILDREN WHO APPLIED FOR ADMISSION TO ( NURSERY / PRE SCHOOL ) UNDER OPEN SEATS 2017-18 - 28 FEBRUARY 2017.</strong></a></td> <td><a href="Instruction_for_draw.php"><img src="../Admin/images/new.gif"><strong>DRAW OF LOTS FOR GENERAL CATEGORY (OPEN SEATS) - 01 MARCH 2017.</strong></a></td></tr>
    
    <tr> <td><a href="After_Draw_50_points.pdf"><img src="../Admin/images/new.gif"><strong>LIST OF CANDIDATES [GENERAL CATEGORY] AT 50 POINTS AFTER DRAW OF LOTS - SATURDAY , 04 MARCH 2017 AT 11 A.M.</strong></a></td> <td><a href="After_Draw_45_points.pdf"><img src="../Admin/images/new.gif"><strong>LIST OF CANDIDATES [GENERAL CATEGORY] AT 45 POINTS AFTER DRAW OF LOTS - SATURDAY , 04 MARCH 2017 AT 11:45 A.M.</strong></a></td> </tr>

     <tr> <td><a href="PROVISIONALLY_SELECTED_CANDIDATES.pdf"><img src="../Admin/images/new.gif"><strong>FIRST LIST OF PROVISIONALLY SELECTED CANDIDATES - 07 MARCH 2017</strong></a></td> <td><a href="Waiting_CANDIDATES.pdf"><img src="../Admin/images/new.gif"><strong>FIRST WAIT LIST (PROVISIONAL) - 07 MARCH 2017</strong></a></td> </tr> 

      <tr> <td><a href="SCHEDULE_FOR_ADMISSION_PROCEDURE.pdf"><img src="../Admin/images/new.gif"><strong>SCHEDULE FOR ADMISSION PROCEDURE FOR FIRST LIST OF PROVISIONALLY SELECTED CANDIDATES - 10 MARCH 2017</strong></a></td> <td><a href="INSTRUCTIONS_FOR_ADMISSION_PROCEDURE.pdf"><img src="../Admin/images/new.gif"><strong>INSTRUCTIONS FOR ADMISSION PROCEDURE - 10 MARCH 2017</strong></a></td> </tr> 
 
<tr> <td><a href="secondlist.pdf"><img src="../Admin/images/new.gif"><strong>SECOND LIST OF PROVISIONALLY SELECTED CANDIDATES - 17 MARCH 2017</strong></a></td> <td><a href="secondwaitlist.pdf"><img src="../Admin/images/new.gif"><strong>SECOND WAIT LIST (PROVISIONAL) - 17 MARCH 2017</strong></a></td> </tr> 

    </table>

</div>

	   

	   <div class="link"> <a href="ApplicationForm.php"><button class="btnmanu">CLASS : NURSERY/ PRE SCHOOL ADMISSIONS <br /> REGISTRATION CLOSED </button></a><br><br><strong>Registrations for Nursery / Pre-School Admission in General Category are closed.



Please check this website regularly for further updates. </strong>



</div>







      </div>







     </div>







    </div>







    </body>







    </html>







	<div id="popup1" class="overlay">







    <div class="popup">







        <a class="close" href="ApplicationForm.php">&times;</a>







        <div class="content">







       







		<?php include 'RevisedSchedule.php'; ?>







                </div>







    </div>







   </div>