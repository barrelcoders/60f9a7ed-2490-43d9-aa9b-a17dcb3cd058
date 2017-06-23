<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Employee Portal</title><link rel="icon" href="../images/l1.png" type="image/x-icon">


</head>
<style>

</style>
<body>
<div><?php include 'header.php'; ?></div>
<div id="container">
 <div class="container1">
 <div class="table_top">
  <table>
   <tr> 
    <td> <u><b class="heading">Previous Uploaded Classwork Details</b></u> </td>
    <td> <!---<a href="javascript:history.back(1)"> <img height="30" src="../images/BackButtonGreen.png" style="float: right"> </a>--> </td>
   </tr>
  </table>
 </div>
 <div class="row new_row">  
  <div class="col-md-1">&nbsp;</div>
  <div class="col-md-3"><a href="dailyuploadclasswork.php">Upload Class Work and Home Work</a> </div>
  <div class="col-md-3 active"><a href="viewuploadclasswork.php">View Previous Uploaded Class Work</a> </div>
  <div class="col-md-3"><a href="viewuploadhomework.php">View Previous Uploaded Home Work</a> </div>
  <div class="col-md-2">&nbsp;</div>
 </div>
 <form name="frmClassWork" id="frmClassWork" method="post" action="frmClassWork.php">
  <input type="hidden" name="SubmitType" id="SubmitType" value="" class="text-box">
  <input type="hidden" name="txtSelectedClass" id="txtSelectedClass" value="<?php echo $SelectedClasses; ?>" class="text-box">
	

	
 <div class="row input_row">
  <div class="col-md-2" align="center">Class:</div>
  <div class="col-md-4">
              <select name="cboClass" id="cboClass"  onclick="Javascript:GetSelectedValue();" class="text-box ">
     			<option selected="" value="Select One">Select One</option>
 	          </select>
	
  </div>
  <div class="col-md-2">Select Date:</div>
  <div class="col-md-2 tba1"> <input type="date" name="formdate" id="txtDate" value="Classwork Date" class="text-box tba"> <br> From Date</div>
  <div class="col-md-2 tba1"> <input type="date" name="todate" id="txtDate" value="Classwork Date" class="text-box tba"> <br> To Date</div>
 
  <div class="col-md-12"><input name="btnShowSubject" type="button" value="Show Subject" onClick="ReloadWithSubject();" class="btn" ></div></div>
 </form>
 <div class="class-table">
  <table class="table-responsive">
   <tr class="col"> 
    <td>Sr. No.</td>
    <td>Class</td>
    <td>Subject</td>
    <td>Class Work Date</td>
    <td>Class Work</td>
    <td>Date & Time</td>
   </tr> 
   <tr>
    <td>1.</td>
    <td>1A</td>
    <td>English</td>
    <td>Now 25, 2016</td>
    <td>Reading</td>
    <td>Now 26, 2016, 09:35 AM</td>
   </tr>
  </table>
 </div>
 </div>
</div>
</body>
</html>
<?php include 'footer.php'; ?>
    

 
