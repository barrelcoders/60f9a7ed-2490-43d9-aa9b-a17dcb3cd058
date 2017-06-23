<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!---<meta name="viewport" content="width=device-width, initial-scale=1">--->
   <title>Employee Portal</title><link rel="icon" href="../images/l1.png" type="image/x-icon">


</head>
<style>
 .tba{width:72%;}
</style>
<body>
<div><?php include 'header.php'; ?></div>
<div id="container">
 <div class="container1">
 <div class="table_top">
  <table>
   <tr> 
    <td> <u><b class="heading">Upload Student Attendance</b></u> </td>
    <td> <!---<a href="javascript:history.back(1)"> <img height="30" src="../images/BackButtonGreen.png" style="float: right"> </a>---> </td>
   </tr>
  </table>
 </div>
 <div class="row new_row new_row1">  
  <div class="col-md-1">&nbsp;</div>
  <div class="col-md-3 active"><a href="studentattendance.php">Upload Student Attendance</a> </div>
  <div class="col-md-3"><a href="studentattendancereport.php">Previous Uploaded Attendance Report</a> </div>
  <div class="col-md-2">&nbsp;</div> <div class="col-md-2">&nbsp;</div> <div class="col-md-1">&nbsp;</div>
 </div>
 <form name="frmClassWork" id="frmClassWork" method="post" action="frmClassWork.php">
  <input type="hidden" name="SubmitType" id="SubmitType" value="" class="text-box">
  <input type="hidden" name="txtSelectedClass" id="txtSelectedClass" value="<?php echo $SelectedClasses; ?>" class="text-box">
 
 <div class="row input_row">
  <div class="col-md-2" align="center">Class:</div>
  <div class="col-md-4">
              <select name="cboClass" id="cboClass" onclick="Javascript:GetSelectedValue();" class="text-box tba">
     			<option selected="" value="Select One">Select One</option>
              </select>
	
  </div>
  <div class="col-md-2">Attendance Date:</div>
  <div class="col-md-4"> <input type="date" name="txtDate" id="txtDate" value="Classwork Date" class="text-box"></div>
 
  <div class="col-md-12"><input name="btnShowSubject" type="button" value="Show Subject" onClick="ReloadWithSubject();" class="btn" ></div></div>
 </form>
 </div>
</div>
</body>
</html>
<?php include 'footer.php'; ?>
    
      
