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
.outer .inner .text2 h3{font-size:17px; font-weight:bold; color:#0b462d; text-decoration:underline;}
.outer .inner .text2 table{width:50%; margin-left:23%;} 
.outer .inner .text2 table tr td{font-size:16px; color:#000; padding:1% 1%; font-weight:600; border:1px solid #b6fcb6}
.outer .inner .text2 table tr td:first-child{border-right:4px solid #fff;}
.outer .inner .text2 table tr:nth-child(odd){background:#b6fcb6;} .outer .inner .text2 table tr:nth-child(even){background:#fff;}
.outer .inner .text3 font{font-size:17px; font-weight:600; color:#0b462d;}
.outer .inner .text3{font-size:17px; }
.outer .inner .text4{font-size:17px; font-weight:600;}
.outer .inner .text5{font-size:17px; font-weight:600;} .outer .inner .text5 ul li{font-size:17px; font-weight:normal;}
.outer .inner .text6{font-size:17px; font-weight:600;}
.outer .inner .text7 table{width:70%; margin-left:15%;}
.outer .inner .text7 table tr td{font-size:17px; font-weight:bold; color:#000; padding:1%; border:1px solid #b6fcb6;}
.outer .inner .text7 table tr:nth-child(odd){background:#b6fcb6;} .outer .inner .text7 table tr:nth-child(even){background:#fff;}
.outer .inner .text8 h3{font-size:18px; font-weight:bold; color:#0b462d; text-decoration:underline;}
.outer .inner .text8 table{width:50%; margin-left:25%;}
.outer .inner .text8 table tr td{font-size:17px; font-weight:600; color:#000; padding:1%; border:1px solid #b6fcb6;} 
.outer .inner .text8 table tr td:first-child{border-right:4px solid #fff;}
.outer .inner .text8 table tr:nth-child(odd){background:#b6fcb6;} .outer .inner .text8 table tr:nth-child(even){background:#fff; }
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
   <div class="marque"> 
    <marquee scrollamount="7">No change/resubmission will be entertained by the school in case of an incorrect entry.</marquee>
   </div>
   <div class="head">Admission to Nursery (Pre School)- Session 2017 - 2018</div>
   <div class="text1">
     <p>Delhi Public School, Rohini welcomes you to the Pre-School Admission process for the academic session 2017 - 2018.<br>
   				  	  The registration and admission details will be available on the school website. <br>
                      Kindly visit the school website regularly. </p>
   </div>
   <div class="head">Application Form and guidelines for filling the Application Form for General Category [ Open Seats]</div>
   <div class="text2">
    <h3>General Information:</h3>
    <table>
     <tr> <td>Total Number of Seats</td> <td>140</td> </tr>
	 <tr> <td>25% Seats for EWS Category</td> <td>35</td>
     <tr> <td>75% Seats for General Category [Open Seats]</td> <td>105</td>
    </table>
   </div>
    <div class="text4">1.  Age : 3+ as on 31 March 2017 (Children born between 01 April 2013 and 31 March 2014 will be considered)</div>
   <div class="text5">2.   For General Category Candidates
    <ul>
     <li>Application forms will be available online between Tuesday, 10 January 2017 and Tuesday, 31 January 2017 at http://www.dpsrohini.com.</li>
	 <li>The Application Form along with scanned copies of relevant documents and a non-refundable admission registration fee of INR 25 should be submitted online latest by Tuesday, 31 January 2017(mid-night).</li>   
     <li>Please keep the Application Number received after filling the Application Form for future reference. </li>
	 <li>Please go through the instructions and FAQs given carefully before filling the Application Form. </li>
    </ul>
   </div>
   <div class="text5">3.  For EWS/ DG Category Applicants
   <ul>
     <li>
   All the EWS (annual income less than one lakh rupees)/ DG category (SC/ST/OBC Non-creamy layer/ Physically Challenged/Orphan and Transgender) Applicants should visit Directorate of Education website www.edudel.nic.in and click the button EWS/DG ADMISSIONS 2017 – 18 for detailed information and instructions.
   </li>
  </ul>
 </div>
   <div class="text6">The following schedule will be observed for Nursery (Pre School Admissions 2017-2018) for Delhi Public School Rohini.</div>
   <div class="text7">
    <table>
     <tr> <td>Commencement of On-line Registration</td>	<td>Tuesday,  10 January 2017</td></tr>
     <tr> <td>On-line Registration closes</td>	<td>Tuesday, 31 January 2017</td></tr>
     <tr> <td>Uploading details of children who apply for admission under open seats</td> <td>Tuesday, 31 January 2017 </td></tr>
     <tr> <td>Uploading marks (as per point system) given to each of the children who applied for admission under open seats along  with distance range and sibling status</td> <td>Friday, 10 February   2017</td></tr>
     <tr> <td>Draw of lots</td> <td>11 February  2017 – 27 February  2017</td></tr>
     <tr> <td>Displaying the first list of selected Candidates (including waiting list) (along with distance range and sibling status)</td> <td>Tuesday, 28 February 2017</td></tr>
     <tr> <td>Resolution of queries of parents, if any, regarding the first list</td> <td>01 March 2017 - 04 March 2017</td></tr>
     <tr> <td>Displaying the second list of selected candidates, if any, (including waiting list) (along with distance range and sibling status)</td> <td>Wednesday, 15 March 2017	</td></tr>
     <tr> <td>Closure of admission process</td> <td>Friday, 31 March 2017</td></tr>
    </table>
  </div>
  <div class="text8">
   <h3>Admission Parameters:</h3>
   <table>
    <tr> <td>Distance & Sibling Criteria</td> <td>Points</td> </tr>
    <tr> <td>0-1 Km & Sibling</td> <td>100 Points</td> </tr>
    <tr> <td>0-1 Km & not Sibling</td> <td>90 Points</td> </tr>
    <tr> <td>1-3 Kms & Sibling</td> <td>80 points</td> </tr>
    <tr> <td>1-3 Kms & not Sibling</td>	<td>70 points</td></tr>
    <tr> <td>3-6 Kms & Sibling</td> <td>60 points</td> </tr>
    <tr> <td>3-6 Kms & not Sibling</td>	<td>50 points</td></tr>
    <tr> <td>Beyond 6 Kms & Sibling</td> <td>40 points</td> </tr>
    <tr> <td>Beyond 6 Kms & not Sibling</td> <td>30 points</td> </tr>
   </table>
  </div>
  <div class="text9">
   <h3>Explanation:</h3>
   <div class="text3"> <font> <b>NEIGHBOURHOOD </b> </font>
   <ul>
     <li>Admission shall first be offered to students residing within 1 km of the school.
    </li>
    <li>In case the vacancy remains unfilled, students residing within 1 to 3 kms. of the school shall be admitted.
    </li>
    <li>If there are still vacancies, then the admission shall be offered to other students residing within 3 to 6 kms. of the school.
    </li>
    <li>Students residing beyond 6 kms shall be admitted only in case vacancies remain unfilled even after considering all the students within 6 kms area.
    </li>
  </ul>
  </div>
   <div class="text3"> <font> <b>SIBLING (Only real brother or sister of existing students of DPS Rohini will be considered)</b> </font>
   <ul>
     <li>Out of the total applications from the first neighbourhood range of 0-1 km, the school shall first give admission to all siblings.
    </li>
    <li>If the applications of sibling category in neighbourhood range of 0-1 km are in excess of the seats of General Category the draw of lots of all sibling applications(which have residence within 1 km), shall be conducted to admit the students against the number of available seats.
    </li>
    <li>If the applications of sibling category within 0-1 km are less than the seats of General Category and if seats still remain vacant after exhausting sibling applications the school shall admit the students on the basis of draw of lots from the remaining applications received under the neighbourhood range of 0-1 km.
    </li>
    <li>In case the total applications of 0-1 km is less than the seats of General Category, and vacancy still remain unfilled after exhausting applications from the distance range of 0-1 km, the applications from the second distance range of neighbourhood of 1-3 kms shall be considered in the above manner.
    </li>
    <li>If vacancies still remain unfilled after exhausting the applications from the distance range of 1-3 kms, the applications from the third distance range of neighbourhood of 3-6 kms shall be considered in the above manner.
    </li>
    <li>Students residing beyond 6 kms shall be admitted only in case vacancies remain unfilled even after considering all the students within 6 kms after following the procedure as mentioned above.
    </li>
  </ul>
  </div>
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
    <li> Please fill in each entry of the form and leave those entries blank, which are not applicable to you. </li>
    <li> Do not press ENTER KEY to move from one field to another. Use `TAB KEY` or mouse control for the same. </li>
    <li> Please check all the details and spellings before submitting the page.</li>
    <li> Documents required (Scanned copy) :
     <ul>
      <li>Birth Certificate issued by Municipal Corporation / equivalent authority.</li>
	  <li>Photograph of Applicant</li>
	  <li>Photograph of Father</li>
	  <li>Photograph of Mother</li>
	  <li>Photograph of Guardian (If applicable)</li>
	  <li>ST/SC/OBC Certificate (If applicable)</li>
      <li>Medical Document/Certificate (if belongs to Special Need)</li>
	  <li>Residence Proof (Ration Card issued in the name of parents (mother/father having name of the child), Domicile Certificate of child or his/her parents, Voter Identity Card / EPIC of any of the parents or child. Aadhar Card / Unique Identity Card of Mother / Father / Child issued by the Government of India.)</li>
	  <li>Proof of Sibling(s) (Copy of last paid fee slip / ID Card of Sibling [2016-17])</li>
     </ul>
    </li>
    <li> After completing the Application Form, click on the `I Agree` button for online submission of non-refundable admission registration fee. 
         The application shall be considered only after successful payment of non-refundable admission fee.</li>
    <li> Immediately an application number will be generated and an acknowledgement mail with weightage details will reach your Email Id mentioned by 
         you in the Application Form.</li>
    <li> In case of any discrepancy any form, kindly write an E-mail to nursery@dpsrohini.com. Mails regarding 
         this will not be accepted after Saturday, 04 March 2017.</li>
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
     <div style="margin:0 0 0 5%;"><font><b>[Note:   Kindly ensure to enter correct email id and contact number during payment procedure so as to save payment details for future reference.]</b></font></div>
   <font><b>Step 4:</b> After successful payment generation of ‘Application Number’.</font><br>
   <font><b>Step 5:</b> Note the Application Number for future reference.</font><br>
   <form method="post" action="StudentRegistration_Nursery.php">
  </div>
    <div class="text14"> <input type="checkbox" name="iagree" id="iagree" required>&nbsp;&nbsp;&nbsp;I have read and agree to the Terms. </div>
  <div class="text15"> <input type="submit" name="proceed" value="Proceed" class="btnmanu"></div>
 </div>
 </form>
</div>
</body>
</html>