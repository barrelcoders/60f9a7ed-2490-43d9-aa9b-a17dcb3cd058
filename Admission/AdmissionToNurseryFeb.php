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



.outer .inner .text1{font-size:18px; margin:1% 0; font-weight:bold; color:#000;}



.outer .inner .text2 h3{font-size:17px; color:#0b462d; text-decoration:underline;}



.outer .inner .text2 table{width:50%; margin-left:23%;} 



.outer .inner .text2 table tr td{font-size:16px; color:#000; padding:1% 1%; border:1px solid #063;}







.outer .inner .text2 table tr:nth-child(odd){background:#e6ffcc;} .outer .inner .text2 table tr:nth-child(even){background:#fff;}



.outer .inner .text3 font{font-size:17px; font-weight:600; color:#0b462d;}



.outer .inner .text3{font-size:15px; }



.outer .inner .text4{font-size:17px; font-weight:600;}



.outer .inner .text5{font-size:17px; font-weight:600;} .outer .inner .text5 ul li{font-size:17px; font-weight:normal;}



.outer .inner .text6{font-size:17px; font-weight:600;}



.outer .inner .text7 table{width:75%; margin-left:15%;}



.outer .inner .text7 table tr td{width:70%;}



.outer .inner .text7 table tr td{font-size:17px; color:#000; padding:1%; border:1px solid #063;}



.outer .inner .text7 table tr:nth-child(odd){background:#e6ffcc;} .outer .inner .text7 table tr:nth-child(even){background:#fff;}



.outer .inner .text8 h3{font-size:18px; font-weight:bold; color:#0b462d; text-decoration:underline;}



.outer .inner .text8 table{width:50%; margin-left:25%;}



.outer .inner .text8 table tr td{font-size:17px; color:#000; padding:1%; border:1px solid #063;} 







.outer .inner .text8 table tr:nth-child(odd){background:#e6ffcc;} .outer .inner .text8 table tr:nth-child(even){background:#fff; }



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



.outer .inner .text15 .btnmanu{background:#097b4d; color:#fff; height:30px; font-size:17px; font-weight:600; border:1px solid Transparent; border-radius:5px;}



.outer .inner .text15 .btnmanu:hover{background:#0b462d;}



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



    <font>Sector­24, Phase III, Rohini, New Delhi - 110085</font><br>



    <font>Phone No: (011) 27055942, 27055943</font><br>



    <font>Email Id: mail@dpsrohini.com, principal@dpsrohini.com</font>



   </div>



   <div class="head"> IMPORTANT – FOR THOSE FALLING UNDER THE SINGLE PARENT OR FIRST BORN CATEGORY</div>



   <!--<div class="text2">



    <h3><strong>General Information:</strong></h3>



    <table>



     <tr> <td><strong>Total Number of Seats</strong></td> <td><strong>140</strong></td> </tr>



	 <tr> <td>50% Seats for General Category [Open Seats]</td> <td>70</td></tr>



	 <tr> <td>25% Seats for EWS Category</td> <td>35</td></tr>



	 <tr> <td>20% Seats for Management Quota</td> <td>28</td></tr>



     <tr> <td>5% Seats for Staff Children </td> <td>07</td></tr>



    </table>



   </div>



  <div class="text8">



   <h3>Admission Parameters:</h3>



   <table>



    <tr> <td>Neighbourhood</td> <td>40 Points (0-15 Kms)</td> </tr>



    <tr> <td>Sibling </td> <td>30 Points</td> </tr>



    <tr> <td>DPS Alumni</td> <td>20 points</td> </tr>



    <tr> <td>Girl Child / First Born</td>	<td>05 points</td></tr>



    <tr> <td>Single Parent</td> <td>00 points</td> </tr>



    <tr> <td>TOTAL</td> <td>100 points</td> </tr>



   </table>



  </div>-->



   



  <div class="text11">



  



   



   Applicants who have already registered their ward need to submit the relevant documents if they fall in any of the mentioned categories i.e. Single Parent and First Born. The documents should be sent to the email id nursery@dpsrohini.com only as attachments.<br>

Please follow the given instructions strictly while sending the email:<br>

<strong>Subject:</strong> Attachments for Application Number : 17XXXX<br>

<strong>Email Content :</strong> Please find the following attachments for my ward <strong>(Name of the Child)</strong> for the following categories in reference to Application Number 17XXXX

<ol>

<li>Single Parent (if applicable) : ChildName_single.pdf</li>

<li>First Born (if applicable)	  : ChildName_first.pdf</li>

</ol>



   Attachments: As Above.



  </div>



  <div class="text10">



   <h3>Note:</h3>



   <strong>Please note that it is the responsibility of the applicant to send the required mail by 12 Noon, 16 February 2017. </strong>.



  </div>



  <div class="text9">



   <h3>Explanation:</h3>



   <!--<div class="text3"><strong>•	Neighbourhood - </strong>Localities and areas based on aerial distance upto 15 kms as calculated by the link mentioned in the online application form will be considered.  </font>



    </div>



   <div class="text3"><strong> •	Sibling (Only real brother or sister of existing students of DPS Rohini will be considered) - </strong> Only real brother or sister of applicant studying in DPS Rohini in the academic session 2016-17 will be considered.



     </div>



	 <div class="text3"><strong>•	DPS Alumni</strong> – DPS Alumni of Core Schools of DPS Society –  Father -10 AND Mother - 10</div>



  <div class="text3"><strong>•	Children with special needs – </strong>Only children with low vision and locomotor disability, who can be mainstreamed within the existing facilities of the school may apply. Appropriate Medical Certificate from a registered specialist associated with a Government Hospital or a recognized established Private Hospital to be attached.</div>-->



  <div class="text3"><strong>•	Single Parent  - </strong>Only widow / widower parent will be considered for single parent.</div>



  <div class="text3"><strong>•	First Born –  </strong>Self Declaration of parents with regard to First Born child. <a href="First_Born_Child_Affidavit.pdf">[Click Here to Download the format]</a></div>



  </div>



</div>



</div>



</div>



</body>



</html>