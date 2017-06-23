<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>DPS</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" />
   <script src="../bootstrap/bootstrap.min.js"></script>
   <script src="j../s/jquery.min.js"></script>
</head>
<style>
body{font-family:Arial; cursor:default; overflow:hidden;}
.outer .inner{border:4px double #097b4d; border-radius:7px; padding:3%; height:620px;}
.outer{padding:2%;}
.outer .inner .logo{text-align:center; width:100%; margin-bottom:1%;}
.outer .inner .logo img{width:35%; margin-left:30%}
.outer .inner .address font{width:100%; font-size:16px; font-weight:bold;}
.outer .inner .head{font-size:18px; text-align:center; text-decoration:underline; font-weight:600; margin-top:5%;}
.outer .inner .link{text-align:center; margin-top:5%;}
.outer .inner .link a .btnmanu{background:#097b4d; color:#fff; width:40%; height:35px; font-size:18px; font-weight:bold; border:1px solid transparent; border-radius:5px;}
.outer .inner .link a .btnmanu:hover{background:#0b462d;}
@media only screen and (min-width:720px) and (max-width: 920px){ .outer .inner{height:380px;}
.outer .inner .address font{font-size:14px;} .outer .inner .logo img{width:50%; margin-left:25%;}
.outer .inner .link a .btnmanu{width:60%; font-size:15px;}  }
@media only screen and (min-width:450px) and (max-width: 720px){.outer .inner{height:330px;}
.outer .inner .address font{font-size:14px;} .outer .inner .logo img{width:50%; margin-left:25%;}
.outer .inner .link a .btnmanu{width:70%; font-size:14px;} }
@media only screen and (min-width:250px) and (max-width: 450px){.outer .inner{height:530px;}
.outer .inner .address font{font-size:12px;} .outer .inner .logo img{width:80%; margin-left:10%;} .outer .inner .head{font-size:15px; margin:10% 0;} 
.outer .inner .link a .btnmanu{width:100%; font-size:12px;}}
</style>
<body>
<div id="container">
 <div class="outer">
  <div class="inner">
   <div class="logo"><img src="../Admin/images/logo.png" class="img-responsive"></div>
   <div class="address" align="center">
    <font>Sector­24, Phase III, Rohini, New Delhi­(110085)</font><br>
    <font>Phone No: 011­-27055942, 27055943</font><br>
    <font>Email Id: mail@dpsrohini.com, principal@dpsrohini.com</font>
   </div>
   <div class="head">APPLICATION FORM (SESSION 2017 ­ 2018)</div>
   <div class="link"> <a href="AdmissionToIX.php"><button class="btnmanu">CLASS : IX (OPEN) ­ Click Here To Proceed</button></a></div>
   <br>
<div class="link"> <a href="AdmissionToXI.php"><button class="btnmanu">CLASS : XI (OPEN) ­ Click Here To Proceed</button></a></div>
  </div>
 </div>
</div>
</body>
</html>