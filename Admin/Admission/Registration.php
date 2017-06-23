<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
?>
<script type="text/javascript">
    function clickIE4(){
    if (event.button==2){
    return false;
    }
    }
    function clickNS4(e){
    if (document.layers||document.getElementById&&!document.all){
    if (e.which==2||e.which==3){
    return false;
    }
    }
    }
    if (document.layers){
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown=clickNS4;
    }
    else if (document.all&&!document.getElementById){
    document.onmousedown=clickIE4;
    }
    document.oncontextmenu=new Function("return false")
    function disableselect(e){
    return false
    }
    function reEnable(){
    return true
    }
    //if IE4+
    document.onselectstart=new Function ("return false")
    //if NS6
    if (window.sidebar){
    document.onmousedown=disableselect
    document.onclick=reEnable
    }
    document.onkeydown = function(e) {
        if (e.ctrlKey &&
            (e.keyCode === 67 ||
             e.keyCode === 86 ||
             e.keyCode === 85 ||
             e.keyCode === 117)) {
            alert('not allowed');
            return false;
        } else {
            return true;
        }
};
</script>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Language" content="en-us">

<title>Registration Form</title>
<link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />
    <script src="../../bootstrap/bootstrap.min.js"></script>
 <style>
 #container{padding:0 1%; font-family:Arial !important; cursor:default;} .row{padding:0; margin:0;}
 .top div{margin:0.5% 0; font-size:15px; font-weight:600;} .top .img-responsive{width:30%;}
 .head{text-align:center; font-size:20px; text-decoration:underline; font-weight:700; margin:1% 0 2% 0;}
 .manu .col-xs-4{padding:0; margin:0; border:1px solid #000;} .manu .col-xs-4 .btnmanu:hover{background:#097b4b;}
 .manu .col-xs-4 .btnmanu{width:100%; height:auto; border:none; background:#0b462d; color:#fff; font-size:15px;} 
 .document{margin-top:2%; padding:0 0 0 1%; line-height:1.4; font-size:14px;} document p{line-height:1.4;}
 .last{text-align:center; font-size:15px; font-weight:600; margin:1% 0 3% 0;}
  @media only screen and (min-width:720px) and (max-width: 1120px){.manu .col-xs-4 .btnmanu{height:43px;}}
  @media only screen and (min-width:580px) and (max-width: 720px){.manu .col-xs-4 .btnmanu{height:46px;} .top .img-responsive{width:70%;}}
  @media only screen and (min-width:200px) and (max-width: 580px){.manu .col-xs-4{width:100%;} .manu .col-xs-4 .btnmanu{height:46px;} .head{font-size:18px;} .top .img-responsive{width:90%;}}
 </style>
</head>
<body>
<div id="container">
 <div class="top">
  <div align="center"><img src="../images/logo.png" class="img-responsive" ></div>
  <div align="center">Sector-24, Phase III, Rohini New Delhi-110085</div>
  <div align="center">Phone No: 011-27055942,27055943</div>
  <div align="center">Email Id: mail@dpsrohini.info,principal@dpsrohini.info</div>
 </div>
 <div class="head">REGISTRATION FORM ( SESSION 2017 - 18 )</div>
 <div class="manu">
  <div class="row">
   <div class="col-xs-4" ><a href="StudentRegistration_Nursery.php"><button class="btnmanu">CLASS : NURSERY (OPEN) - Click Here To Proceed</button></a></div>
   <div class="col-xs-4"><a href="CriteriaForm_9th.php"><button class="btnmanu">CLASS : IX (OPEN) - Click Here To Proceed</button></a></div>
   <div class="col-xs-4"><a href="CriteriaForm_XI.php"><button class="btnmanu">CLASS : XI (OPEN) - Click Here To Proceed</button></a></div>
  </div>
 </div>
 <div class="document">
  <p><b>1.</b> &nbsp; The registration process consists of two steps :<br>&nbsp;&nbsp;&nbsp;&nbsp;
 			<b>Step 1:</b> &nbsp;Filling up the form (fields marked * are mandatory)<br>&nbsp;&nbsp;&nbsp;&nbsp;
            <b>Step 1:</b> &nbsp;Registration Fees Payment
  </p>
  <p><b>2. &nbsp; Documents required (Scanned copy) :<br>&nbsp;&nbsp;&nbsp;&nbsp    
   1: &nbsp;Passport Size Photograph (80% Face Coverage) <br>&nbsp;&nbsp;&nbsp;&nbsp
   2. &nbsp;Scanned Copy of Birth Certificate</b>
  </p> 
  <p><b>3.</b> &nbsp; Please check all the details and spellings before submitting the page. </p>
  <p><b>4.</b> &nbsp; Please note that submission of Registration Form does not guarantee admission to the school.</p>
  <p><b>5.</b> &nbsp; The cost of Registration Form is <b>INR 25/- .</b>  The form shall be considered for admission, only after successful payment of registration fee.</p>
  <p><b>6. &nbsp; Please note the registration no. details after successful completion of registration process for future communication.</b></p>
  <p><b>7.</b> &nbsp; Please keep your credit card, debit card and other banking detail handy while filling the application form. The payment on this website is secured and school does not store any banking related information.</p>
  <p><b>8.</b> &nbsp; Please ensure that you have a stable internet connection while filling the application form.</p>
  <p><b>9.</b> &nbsp; Helpline Nos. 011-27055942,27055943</p>
 </div>
 <div class="last">This Web Portal is designed to work best on GOOGLE CHROME ! (Resolution 1280 x 1024)</div>
 
</div>
</body>
</html> 