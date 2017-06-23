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

    .outer .inner{border:4px double #097b4d; border-radius:7px; padding:3%; height:620px;}

    .outer{padding:2%;}

	 

    .outer .inner .logo{text-align:center; width:100%; margin-bottom:1%;}

    .outer .inner .logo img{width:40%; margin-left:30%}

    .outer .inner .address font{width:100%; font-size:16px; font-weight:bold;}

    .outer .inner .head{font-size:18px; text-align:center; text-decoration:underline; font-weight:600; margin-top:5%;}


    .outer .inner .link{text-align:center; margin-top:2%;}

    .outer .inner .link a .btnmanu{background:#097b4d; color:#fff; width:35%; height:45px; font-size:18px; font-weight:bold; border:1px solid transparent; border-radius:5px;}

    .outer .inner .link a .btnmanu:hover{background:#0b462d;}
    .newLink {color:#b462d; font-size:14px; font-weight:bold;}
    .newLink:hover {color:#bfff00;}

    @media only screen and (min-width:720px) and (max-width: 920px){ .outer .inner{height:auto;} body{overflow:auto; }

    .outer .inner .address font{font-size:14px;} .outer .inner .logo img{width:50%; margin-left:25%;} .outer .inner .notice1 a{margin-left:10%;}

    .outer .inner .link a .btnmanu{width:60%; font-size:15px;}  }

    @media only screen and (min-width:450px) and (max-width: 720px){.outer .inner{height:auto;} body{overflow:auto; }

    .outer .inner .address font{font-size:14px;} .outer .inner .logo img{width:50%; margin-left:25%;} .outer .inner .notice1 a{margin-left:10%;}

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

       <div class="head">ADMISSION FOR OTHER CLASS (SESSION 2017 - 2018)</div>
	   
		<div class="link"> <a href="admission_to_others.php"><button class="btnmanu">CLASS : III - VIII (CLICK HERE TO PROCEED) </button></a></div>
	   <div class="link"> <a href="AdmissionToIX.php"><button class="btnmanu">CLASS : IX  (CLICK HERE TO PROCEED) </button></a><br>  <div class="link newLink"><a href="IX_info.php"><img src="../Admin/images/new.gif">INFORMATION REGARDING CLASS IX ADMISSION</a></div></div>
	   <div class="link"><a href="AdmissionToXI.php"><button class="btnmanu"> CLASS : XI  (CLICK HERE TO PROCEED) </button></a></div>
	  
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