<?php session_start();
include '../connection.php';
include '../AppConf.php';
?>
<?php
$sql = "SELECT `EmpId` , `Name` , `Department` ,`Designation`, `DOJ`,`UserId`,`MobileNo`,`email` FROM `employee_master` where 1=1"  ;
$result = $conn->query($sql);

?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Employee Management</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
   <script src="../js/dataTables-data.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
 <div><?php include '../header.php'; ?> </div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="DeactivateEmployee.php"><button class="btnmanu">De-Activate An Employee </button></a></li>
   <li><a href="ReactivateEmployee.php"><button class="btnmanu">Re-Activate An Employee  </button></a></li>
   <li class="active"><a href="IssueExperienceCertificate.php"><button class="btnmanu">Issue Experience Certificate  </button></a></li>
   <li><a href="#Employeemgt4_Employeeexit4.php"><button class="btnmanu">Employee Full and Final  </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <form action="#" method="post">
 <div class="employee_mgt">
  <div class="empmgt_top">Issue Experience Certificate</div>
  <div class="emp_search1 es1">
   <div class="row">
    <div class="col-xs-3"><b>Employee ID :</b></div>
    <div class="col-xs-3"><input type="text" name="employeeid" name="employeeid" class="text-box" ></div>
    <div class="col-xs-3"><input type="submit" name="submit" id="submit" class="btn"></div>
    <div class="col-xs-3">&nbsp;</div>
   </div>
  </div>
  <div class="empmgt_cer" id="empmgt_cer" >
   <div class="head">
    <div align="center"><img src="../images/dpslogo.png" class="img-responsive" width="35%" ></div>
    <div align="center" style="font-size:16px;">(Affiliated to C.B.S.E. New Delhi)</div>
    <div align="center" style="font-size:16px;">Sector-24, Phase III, Rohini New Delhi-110085</div>
   </div>
   <div class="head1" align="center" style="font-size:16px; margin:1% auto;">
   		<font style="font-size:18px;">Experience Certificate</font><br><font>To Whom So Ever It May Concern</font>
   </div>
   <div class="head2" style="width:100%; margin-bottom:2%;"> 
   	<div style="width:49%; float:left;"><b>Date :</b>&nbsp;</div> 
   	<div align="right" style="width:49%; float:left;"><b>Certificate No:</b>&nbsp;</div>
   </div>
   <div class="head3" style="margin-top:5%"><p>&nbsp;&nbsp;&nbsp;This is to certify that   S/D/O Mr. / Mrs.   resident of is / has been working / worked from to as .. on a pay scale of Payband : Gradepay : .<br>
During his / her stay in school, his / her work and conduct has been found satisfactory.<br>
We wish him / her all the success in life. </p>
  </div>
  <div class="head4" style="margin-top:3%;"><b>Principal</b><br>________________________</div>
  <p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("empmgt_cer").innerHTML;
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
  </div>
 </form>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
