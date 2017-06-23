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
    <td> <u><b class="heading">Upload Student Report Card</b></u> </td>
    <td><a href="javascript:history.back(1)"> <img height="30" src="../images/BackButtonGreen.png" style="float: right"> </a> </td>
   </tr>
  </table>
 </div>

 <form name="frmClassWork" id="frmClassWork" method="post" action="">
  <input type="hidden" name="SubmitType" id="SubmitType" value="" class="text-box">
  <input type="hidden" name="txtSelectedClass" id="txtSelectedClass" value="<?php echo $SelectedClasses; ?>" class="text-box">
 
 <div class="row cce_row">
  <div class="col-md-3">&nbsp;</div>
  <div class="col-md-2" align="center">Class:</div>
  <div class="col-md-4">
              <select name="cboClass" id="my_selection" onclick="Javascript:GetSelectedValue();" class="text-box tba">
     			<option selected="" value="Select One">Select One</option>
                <option value="NURSERY" href="nursery-5-reportcard.php">NURSERY</option>
				<option value="K.G." href="nursery-5-reportcard.php">K.G.</option>
                <option value="1" href="nursery-5-reportcard.php">1</option>
                <option value="2" href="nursery-5-reportcard.php">2</option>
                <option value="3" href="nursery-5-reportcard.php">3</option>
                <option value="4" href="nursery-5-reportcard.php">4</option>
                <option value="5" href="nursery-5-reportcard.php">5</option>
                <option value="6" href="6-12-reportcard.php">6</option>
                <option value="7" href="6-12-reportcard.php">7</option>
                <option value="8" href="6-12-reportcard.php">8</option>
                <option value="9" href="6-12-reportcard.php">9</option>
                <option value="10" href="6-12-reportcard.php">10</option>
                <option value="11" href="6-12-reportcard.php">11</option>
                <option value="12" href="6-12-reportcard.php">12</option>
              </select>
	
<script>
document.getElementById('my_selection').onchange = function() {
    window.location.href = this.children[this.selectedIndex].getAttribute('href');
}
</script>
  </div>
  <div class="col-md-3">&nbsp;</div>
 </div>
 <div class="row cce_row1">
  <div class="col-xs-3"> Select Class: </div>
  <div class="col-xs-3">
   <select name="cboclass" onclick="Javascript:GetSelectedValue();" class="text-box tba">
     			<option selected="" value="Select One">Select Class</option>
                <option value="NURSERY">NURSERY</option>
                <option value="K.G.">K.G.</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
   </select>
  </div>
  <div class="col-xs-3"> Select Section: </div>
  <div class="col-xs-3">
   <select name="cboclass" onclick="Javascript:GetSelectedValue();" class="text-box tba">
     			<option selected="" value="Select One">Select Section</option>
                <option value="1">1A</option>
                <option value="2">2B</option>
                <option value="3">3C</option>
                <option value="4">4D</option>
                <option value="5">5E</option>
   </select>
  </div>
  <div class="col-xs-3"> Select Subject: </div>
  <div class="col-xs-3">
   <select name="cboclass" onclick="Javascript:GetSelectedValue();" class="text-box tba">
     			<option selected="" value="Select One">Select Subject</option>
                <option value="1">Hindi</option>
                <option value="2">English</option>
                <option value="3">Science</option>
                <option value="4">Math</option>
                <option value="5">Social Science</option>
   </select>
  </div>
  <div class="col-xs-3"> Select Exam Type: </div>
  <div class="col-xs-3">
   <select name="cboclass" onclick="Javascript:GetSelectedValue();" class="text-box tba">
     			<option selected="" value="Select One">Select Exam Type</option>
                <option value="FA1">FA1</option>
                <option value="FA2">FA2</option>
                <option value="FA3">FA3</option>
                <option value="FA4">FA4</option>
                <option value="SA1">SA1</option>
                <option value="SA2">SA2</option>
   </select>
  </div>
  <div class="col-md-12"><input name="btnShowSubject" type="button" value="Show Subject"  class="btn" ></div>
 </div>
</form>
<!---<div class="cce-table1">
 <p>(To be assessed on a 5 point scale once in a session)</p>
 <table class="table-hover">
  <tr class="col">
   <td>Sr. No.</td>
   <td>Descriptive Indicators</td>
   <td>Sharvan Kumar</td>
   <td>Sharvan Kumar</td>
  </tr>
 </table>
</div>--->
</div>
</div>
</body>
</html>
<?php include 'footer.php'; ?>
    
      
