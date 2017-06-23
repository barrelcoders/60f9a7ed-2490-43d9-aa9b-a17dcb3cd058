<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>DPS</title><link rel="icon" href="../l.png" type="image/x-icon">
   
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" />
   <script src="../bootstrap/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>
<style>
body{font-family:Arial; cursor:default; }
.outer .inner div{margin:1% 0;} .outer .inner{border:5px groove #097d4d; border-radius:5px; padding:0 1%;}
.outer{padding:1% 2%; color:#000; line-height:1.8; }
.outer .inner .logo{text-align:center; width:100%; margin-bottom:1%;}
.outer .inner .logo img{width:35%; margin-left:30%}
.outer .inner .address font{width:100%; font-size:16px; font-weight:bold;}
.outer .inner .marque{font-size:18px; font-weight:bold; color:#F00; background:#FF0; padding:0.5%; text-align:center;}
.outer .inner .head{font-size:20px; text-align:center; text-decoration:underline; font-weight:600; color:#0b462d; margin:1% 0; }
.outer .inner .text1{font-size:15px; margin:1% 0; font-weight:bold; color:#000;}
.outer .inner .text2 h3{font-size:17px; font-weight:bold; color:#0b462d; text-decoration:underline;}
.outer .inner .text2 table{width:50%; margin-left:23%;} 
.outer .inner .text2 table tr td{font-size:16px; color:#000; padding:1% 1%; font-weight:600;}
.outer .inner .text2 table tr td:first-child{border-right:4px solid #fff;}
.outer .inner .text2 table tr:nth-child(odd){background:#097b4d;} .outer .inner .text2 table tr:nth-child(even){background:#ccc;}
.outer .inner .text3{font-size:14px; text-align:center; font-weight:600; margin:0.7%;}
.outer .inner .text4{font-size:17px; font-weight:600;}
.outer .inner .text5{font-size:17px; font-weight:600;} .outer .inner .text5 ul li{font-size:17px; font-weight:normal;}
.outer .inner .text6{font-size:17px; font-weight:600;}
.outer .inner .text7 table{width:70%; margin-left:15%;}
.outer .inner .text7 table tr td{font-size:17px; font-weight:bold; color:#000; padding:1%; border:1px solid #0b462d;}
.outer .inner .text7 table tr:nth-child(odd){background:#fff;} .outer .inner .text7 table tr:nth-child(even){background:#097b4d;}
.outer .inner .text8 h3{font-size:18px; font-weight:bold; color:#0b462d; text-decoration:underline;}
.outer .inner .text8 table{width:50%; margin-left:25%;}
.outer .inner .text8 table tr td{font-size:17px; font-weight:600; color:#000; padding:1%;} 
.outer .inner .text8 table tr td:first-child{border-right:4px solid #fff;}
.outer .inner .text8 table tr:nth-child(odd){background:#097b4d;} .outer .inner .text8 table tr:nth-child(even){background:#ccc; }
.outer .inner .text9 h3{font-size:18px; font-weight:bold; text-decoration:underline; color:#0b462d; }
.outer .inner .text9 font{font-size:16px;} .outer .inner .text9 font .f{margin-left:34.5%;}
.outer .inner .text10 h3{font-size:18px; font-weight:bold; color:#0b462d; text-decoration:underline;}
.outer .inner .text10 ul li{font-size:16px;}
.outer .inner .text11 h3{font-size:18px; font-weight:bold; color:#0b462d; text-decoration:underline;}
.outer .inner .text11 ol li{font-size:16px; list-style-type: lower-roman;}
.outer .inner .text11 ol li ul li{list-style-type:disc;}
.outer .inner .text12 h2{font-size:20px; font-weight:bold; text-decoration:underline; color:#0b462d; }
.outer .inner .text12 font{font-size:16px;}
.outer .inner .text13{ text-align:center; margin:1% 0;}  .outer .inner .text13 font{font-size:18px; font-weight:700; color:#fff; background:#097b4d; padding:0.3%;}
.outer .inner .text14{font-size:18px; font-weight:bold; margin:1% 0;}
.outer .inner .text15{text-align:center;} .outer .inner .text15 input[type=checkbox]{}
.outer .inner .text15 a .btnmanu{background:#097b4d; color:#fff; font-size:17px; font-weight:600; border:1px solid Transparent; border-radius:5px;}
.outer .inner .text15 a .btnmanu:hover{background:#0b462d;}
@media only screen and (min-width:720px) and (max-width: 920px){ .outer .inner{height:auto;}
.outer .inner .address font{font-size:14px;} .outer .inner .logo img{width:50%; margin-left:25%;}
.outer .inner .link a .btnmanu{width:60%; font-size:15px;}  }
@media only screen and (min-width:450px) and (max-width: 720px){.outer .inner{height:auto;}
.outer .inner .address font{font-size:14px;} .outer .inner .logo img{width:50%; margin-left:25%;} .outer .inner .text9 font .f{margin-left:74%;}
.outer .inner .text2 table, .outer .inner .text7 table, .outer .inner .text8 table{width:90%; margin-left:5%;}
.outer .inner .link a .btnmanu{width:70%; font-size:14px;} }
@media only screen and (min-width:250px) and (max-width: 450px){.outer .inner{height:auto;}
.outer .inner .address font{font-size:12px;} .outer .inner .logo img{width:80%; margin-left:10%;} .outer .inner .head{font-size:15px; margin:10% 0;} 
.outer .inner .link a .btnmanu{width:100%; font-size:12px;}
.outer .inner .text2 table, .outer .inner .text7 table, .outer .inner .text8 table{width:100%; margin-left:0%;}
}
</style>
<body>
<div id="container">
 <div class="outer">
  <div class="inner">
   <div class="logo"><img src="../Admin/images/logo.png" class="img-responsive"></div>
   <div class="address" align="center">
    <font>Sector­24, Phase III, Rohini New Delhi­110085</font><br>
    <font>Phone No: 011­27055942, 27055943</font><br>
    <font>Email Id: mail@dpsrohini.info,principal@dpsrohini.info</font>
   </div>
   <div class="marque"> 
    <marquee scrollamount="7">No change/resubmission will be entertained by the school in case of an incorrect entry.</marquee>
   </div>
   <div class="head">ADMISSSION TO CLASS XI [Session : 2017 - 2018]</div>
   <div class="text1">Delhi Public School, Rohini welcomes you to Class XI Admission process for the academic session 2017 - 2018.<br>
   				  	  The registration and admission details will be available on the school website. 
                      Kindly keep in touch with the school website regularly.
   </div>
   
   <h4><font><b>Instructions for Filling up the Online form:</b></font></h4>
   <ol>
    <li> This is an electronic Application Form for Delhi Public School, Rohini only. Please read the instructions 
           carefully before filling in the form to avoid rejection of your form. All you need to do is to fill in the boxes 
           with the required information. </li>
    <li> Do not press ENTER KEY to move from one field to another. Use `TAB KEY` or mouse control for the same. </li>
	<li>The Registration process consists of three steps :
     <ul>
	 <li><font><b>Step 1:</b>  Filling up the Academic Profile form (All fields are mandatory)</font></li>
	 <li><font><b>Step 2:</b>  Filling up the Application form (fields marked * are mandatory)</font></li>
     <li><font><b>Step 3:</b>Registration Fee Payment </font></li>
	 </ul>
</li>
    <li> Documents required (Scanned copy) :
     <ul>
      <li>Birth Certificate issued by Municipal Corporation / equivalent authority.</li>
	  <li>Photograph of Applicant</li>
	  <li>Photograph of Father</li>
	  <li>Photograph of Mother</li>
	  <li>Photograph of Guardian (If applicable)</li>
<li>Aadhar Card of Applicant</li>
<li>ST/SC/OBC Certificate (If applicable) </li>
<li>Proof of Any Other Category (If applicable)</li>
 	  <li>Registration card of Class IX</li>
	  <li>Report card of Class VIII (Final Term)</li>
	  <li>Report card of Class IX (Final Term)</li>
      <li>Report card of Class X (First Term)</li>
	  <li>Fitness Certificate from MBBS Doctor</li>
	  <li>Residence Proof (Ration Card issued in the name of parents (mother/father having name of the child), Domicile Certificate of child or his/her parents, Voter Identity Card / EPIC of any of the parents or child. Aadhar Card / Unique Identity Card of Mother / Father / Child issued by the Government of India.)</li>
	</ul>
    </li>
	<li> Please check all the details and spellings before submitting the page.</li>
	<li>Please note that submission of Application Form does not guarantee admission to the school.</li>
	<li> After completing the Application Form, click on the `I Agree` button and proceed for online submission of non-refundable Application fee</li>
    <li>The cost of Application Form is INR 25/­. The form shall be considered for further admission process, only after successful payment of Application Fee.</li>
	<li> Please keep your credit card, debit card and other banking detail handy while filling the application form. The payment on this website is
         secured and school does not store any banking related information. </li>
    <li> Please ensure that you have a stable internet connection while filling the application form.</li>
    <li> Immediately after payment, an application number will be generated and an acknowledgement mail with weightage details will reach your Email Id mentioned by you in the Application Form.</li>
	<li>The Application Number will generate only after successful submission of Application Form.</li>
	<li> Please note the application number details for  future reference. </li>
    <li> No change / resubmission will be entertained by the school in case of an incorrect entry.</li>
    <li> Incomplete forms will not be accepted by the system. </li>
    <li> In case of query, you can write an E-mail to admissions@dpsrohini.com.  Queries at any other E-mail ID will not be accepted.</li>
    <li> Queries mailed to the email id will be responded to within 2 working days.</li>
    <li> Helpline Nos. 011­27055942, 27055943.</li>
   </ol>
   <div>
  <form method="post" action="CriteriaForm_XI.php">
  <div class="text14"> <input type="checkbox" name="iagree" id="iagree" required>&nbsp;&nbsp;&nbsp;I have read and agree to the Terms. </div>
  <div class="text15" align="center"> <input type="submit" name="proceed" value="proceed" class="btnmanu"></div>
 </form>
  </div>
</div>
</body>
</html>