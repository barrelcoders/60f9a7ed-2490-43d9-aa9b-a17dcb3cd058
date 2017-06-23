<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>DPS</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery.min.js"></script>
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
.outer .inner .text2 h3{font-size:17px; font-weight:bold; color:#0b462d; text-decoration:underline;}
.outer .inner .text2 table{width:50%; margin-left:23%;} 
.outer .inner .text2 table tr td{font-size:16px; color:#000; padding:1% 1%; font-weight:600;}
.outer .inner .text2 table tr td:first-child{border-right:4px solid #fff;}
.outer .inner .text2 table tr:nth-child(odd){background:#097b4d;} .outer .inner .text2 table tr:nth-child(even){background:#ccc;}
.outer .inner .text2 table tr:nth-child(odd) td:nth-child(odd), 
.outer .inner .text7 table tr:nth-child(even) td:nth-child(odd),
.outer .inner .text8 table tr:nth-child(odd) td:nth-child(odd){color:#fff;}
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
   <div class="logo"><img src="images/logo.png" class="img-responsive"></div>
   <div class="address" align="center">
    <font>Sector­24, Phase III, Rohini, New Delhi(110085)</font><br>
    <font>Phone No: 011­27055942, 27055943</font><br>
    <font>Email Id: mail@dpsrohini.info,principal@dpsrohini.info</font>
   </div>
   <div class="marque"> 
    <marquee scrollamount="10">No change/resubmission will be entertained by the school in case of an incorrect entry.</marquee>
   </div>
   <div class="head">Admission to Nursery (Pre School)- Session 2017 - 2018</div>
   <div class="text1">Delhi Public School, Rohini welcomes you to the Pre-School Admission process for the academic session 2017 - 2018.<br>
   				  	  The registration and admission details will be available on the school website. 
                      Kindly keep in touch with the school website regularly.
   </div>
   <div class="head">Application Form and guidelines for filling the Application Form for General Category [ Open Seats]</div>
   <div class="text2">
    <h3>General Information:</h3>
    <table>
     <tr> <td>Total Number of Seats</td> <td>140</td> </tr>
     <tr> <td>20% Seats for Management Quota</td> <td>28</td> </tr>
	 <tr> <td>25% Seats for EWS Category</td> <td>35</td>
     <tr> <td>5% Seats for Staff Children</td> <td>07</td> </tr>
     <tr> <td>50% Seats for General Category [Open Seats]</td> <td>70</td>
    </table>
   </div>
   <div class="text3">*2 Seats are reserved for Children with Special Needs</div>
   <div class="text4">1.  Age : 3+ as on 31<sup>st</sup> March 2017 (Children born between 1<sup>nd</sup> April 2013 and 31<sup>st</sup> March 2014 will be considered)</div>
   <div class="text5">2.   For General Category Candidates
    <ul>
     <li>Application forms will be available online between Monday, 2 January 2017 and Monday, 23 January 2017 at http://www.dpsrohini.com.</li>
	 <li>The Application Form along with scanned copies of relevant documents and a non-refundable admission registration fee of INR 25 should be submitted online latest by Monday, 23 January 2017(mid-night).</li>   
     <li>Please keep the Application Number received after filling the Application Form for future reference. </li>
	 <li>Please go through the instructions and FAQs given carefully before filling the Application Form. </li>
    </ul>
   </div>
   <div class="text6">The following schedule will be observed for Nursery (Pre School Admissions 2017-2018) for Delhi Public School Rohini.</div>
   <div class="text7">
    <table>
     <tr> <td>Commencement of On-line Registration</td>	<td>Monday, 2 January 2017</td></tr>
     <tr> <td>On-line Registration closes</td>	<td>Monday, 23 January 2017</td></tr>
     <tr> <td>Uploading details of children who apply for admission under open seats</td> <td>Tuesday, 31 January 2017 </td></tr>
     <tr> <td>Uploading marks (as per point system) given to each of the children who applied for admission under open seats</td> <td>Monday, 6 February 2017</td></tr>
     <tr> <td>The date for displaying  the first list of selected Candidates (including waiting list) (along with marks allotted under point system)</td> <td>Wednesday, 15 February 2017</td></tr>
     <tr> <td>The date for displaying  the second list of selected Candidates (If any)(including waiting list) (along with marks allotted under point system)</td> <td>Tuesday, 28 February 2017</td></tr>
     <tr> <td>Closure of admission process</td> <td>Friday, 31 March 2017</td></tr>
    </table>
  </div>
  <div class="text8">
   <h3>Admission Parameters:</h3>
   <table>
    <tr> <td>Neighbourhood</td> <td>40 Points</td> </tr>
    <tr> <td>Sibling</td> <td>30 Points</td> </tr>
    <tr> <td>DPS Alumni</td> <td>20 Points</td> </tr>
    <tr> <td>Girl Child / First Born</td> <td>05 points</td> </tr>
    <tr> <td>Single Parent</td>	<td>05 points</td></tr>
    <tr> <td>TOTAL</td> <td>100 points</td> </tr>
   </table>
  </div>
  <div class="text9">
   <h3>Explanation:</h3>
   <font> <b>Neighbourhood </b> – Localities and areas based on aerial distance upto 15 Kms will be considered. Kindly check the link mentioned in the online Application Form. </font><br> 
   <font> <b>Sibling </b> – Only real brother or sister of existing students of DPS Rohini will be considered.</font><br>
   <font> <b>DPS Alumni </b> – DPS Alumni of core schools of DPS Society –  <b>Father -10 </b><br><b class="f">Mother - 10</b> </font><br>
   <font> <b>Child with special needs </b> – Only children with low vision and marginal locomotor disability, who can be mainstreamed within the existing facilities of the school may apply. Appropriate Medical Certificate from a registered specialist associated with a Government Hospital or a recognized established Private Hospital to be attached. </font> <br>
   <font> <b>Single Parent </b> - Only widow / widower will be considered for single parent.</font>
  </div>
  <div class="text10">
   <h3>Kindly Note:</h3>
   <ul>
    <li>Due to a limited number of seats, it will not be possible to admit all those who apply. The application made here does not, in any way, entitle the candidate to be admitted to the school.</li>
    <li>Transport will be provided on existing routes only. Since limited transport facilities are available on specific routes, admission will not automatically ensure a seat in the school bus.</li>
    <li>All relevant documents will be verified before the display of lists. The applicants shall produce the relevant documents in original at the time of verification along with a set of SELF ATTESTED photocopies.</li>
	<li>List of short listed candidates will be put up online. Kindly keep in touch with the school website. </li>
   </ul>
  </div>
  <div class="text11">
   <h3>Instructions for Filling up the Online form:</h3>
   <ol>
    <li> This is an electronic Application Form for Delhi Public School, Rohini only. Please read the instructions 
           carefully before filling in the form to avoid rejection of your form. All you need to do is to fill in the boxes 
           with the required information. </li>
    <li> Please fill in each entry of the form and write N.A for those entries, which are not applicable to you. Do not leave any entry blank. </li>
    <li> Do not press ENTER KEY to move from one field to another. Use `TAB KEY` or mouse control for the same. </li>
    <li> Please check all the details and spellings before submitting the page.</li>
    <li> Documents required (Scanned copy) :
     <ul>
      <li>Birth Certificate issued by Municipal Corporation / equivalent authority.</li>
	  <li>Photograph of Applicant</li>
	  <li>Photograph of Father</li>
	  <li>Photograph of Mother</li>
	  <li>Photograph of Guardian (If applicable)</li>
 	  <li>Proof of Parent being DPS Staff (If applicable)</li>
	  <li>Proof of Parent being DPS Core Alumni (If applicable)</li>
	  <li>ST/SC/OBC Certificate (If applicable)</li>
      <li>Medical Document/Certificate (if belongs to Special Need)</li>
	  <li>Residence Proof (Ration Card issued in the name of parents (mother/father having name of the child), Domicile Certificate of child or his/her parents, Voter Identity Card / EPIC of any of the parents or child. Aadhar Card / Unique Identity Card of Mother / Father / Child issued by the Government of India.)</li>
	  <li>Proof of Sibling (Copy of last paid fee slip / ID Card of Sibling [2016-17])</li>
	  <li>Girl Child/ First Born (Format in the given link to be filled, scanned and uploaded)</li>
	  <li>Single Parent (Format in the given link to be filled, scanned and uploaded)</li>
     </ul>
    </li>
    <li> After completing the Application Form, click on the `I Agree` button for online submission of non-refundable admission registration fee. 
         The application shall be considered only after successful payment of non-refundable admission fee.</li>
    <li> Immediately an application number will be generated and an acknowledgement mail with weightage details will reach your Email Id mentioned by 
         you in the Application Form.</li>
    <li> In case of any discrepancy any form, kindly write an E-mail to nursery@dpsrohini.com. Mails regarding 
         this will not be accepted after Saturday, 18 February 2017.</li>
    <li> No change / resubmission will be entertained by the school in case of an incorrect entry.</li>
    <li> Incomplete forms will not be accepted by the system. </li>
    <li> Please note the application number details after successful completion of registration process for  future communication. </li>
    <li> Please keep your credit card, debit card and other banking detail handy while filling the application form. The payment on this website is
         secured and school does not store any banking related information. </li>
    <li> Please ensure that you have a stable internet connection while filling the application form.</li>
    <li> In case of query, you can write an E-mail to nursery@dpsrohini.com.  Queries at any other E-mail ID will not be accepted.</li>
    <li> Queries mailed to the email id will be responded to within 2 working days.</li>
    <li> Please note that submission to Application Form does not guarantee admission to the school.</li>
   </ol>
  </div>
  <div class="text12">
   <h2>Application Procedure At A Glance</h2>
   <font><b>Step 1:</b> Fill in the application form.</font><br>
   <font><b>Step 2:</b> Upload scanned copies of relevant documents.</font><br>
   <font><b>Step 3:</b> Click on ‘I Agree’ for Online payment of Application Fee.</font><br>
     <div style="margin:0 0 0 5%;"><font><b>[Note:   Kindly ensure to enter correct email id and contact number during payment procedure so as to save payment details for futurereference.]</b></font></div>
   <font><b>Step 4:</b> After successful payment generation of ‘Application Number’.</font><br>
   <font><b>Step 5:</b> Note the Application Number for future reference.</font><br>
  </div>
  <div class="text13"> <font>Online Registration will begin on Monday, 02 January 2017</font> </div>
  <div class="text14"> <input type="checkbox" name="iagree" id="iagree">&nbsp;&nbsp;&nbsp;I Agree. </div>
  <div class="text15"> <a href="#"><button class="btnmanu">Proceed</button></a></div>
 </div>
</div>
</body>
</html>