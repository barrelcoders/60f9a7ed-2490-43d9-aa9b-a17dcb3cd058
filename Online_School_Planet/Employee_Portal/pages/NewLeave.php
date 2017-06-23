
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Employee Portal</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
</head>
<style> .ddiframeshim{height:0%} </style>
<body>
<div><?php include 'header.php'; ?></div>
<div id="container">
<!----Header--------->

<!---------containt---------->
<div class="cont">
<div class="row c leave">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li class="active"><a href="NewLeave.php"><button class="btnmanu">New Leave</button></a></li>
   <li><a href="MyLeave.php"><button class="btnmanu">My Leave</button></a></li>
   <li><a href="ViewHoliday.php"><button class="btnmanu">Holiday List</button></a></li>
  </ul> 
 </div>
 
 <!------------------------->
 
 <div class="col-md-10">
 
 
 
  

     <form action="#" method="POST" enctype="multipart/form-data">
 <div class="form1">
  <div class="he">LEAVE REQUEST</div>
 <table class="table-condensed" >
     <tr> <td>Application Date:</td> <td><?php echo date("F j, Y"); ?></td> </tr>
  <tr>
     <td>Start Date:</td> <td><input type="date" name="LeaveFrom" class="input-btn"></td> 
 </tr>
 <tr>
     <td>Leave Reason:</td> <td><input type="text" name="Remarks" class="input-btn">  </td>
						 
 </tr>
 <tr>
  <td>Attach File:</td> <td><input type="file" name="image" class="input-btn" style="width:80%; border:none;"></td>
 </tr>
     
 </table>
 
 <table class="table-condensed" >
  <tr>
      <td>Leave Type:</td> <td><select class="input-btn" style="width:60%" name="LeaveType">
      			<option value="Select One" selected="selected">Select One</option>
		<option >Please Select</option>
                                    <option value="Privilege Leave">Privilege Leave</option>
                                    <option value="Casual Sick Leave">Casual Sick Leave</option>
                                    <option value="Resticted Holiday">Resticted Holiday</option>
	                           </select>
						   </td>
 </tr>
  <tr>
     <td>End Date:</td> <td><input type="date" name="LeaveTo" class="input-btn" style="width:60%"></td> 
 </tr>
 
 <tr>
  <td>Contact No. During Leave:</td> <td><input type="number" name="ContactNoDuringLeave" class="input-btn" style="width:60%" ></td>
 </tr>
 <tr>
  <td>Number of Days:</td> <td><input type="number" name="txtNoOfDaysLeave" id="txtNoOfDaysLeave" class="input-btn" style="width:60%" readonly ></td>
 </tr>     
 </table>
</div>
<br>
  <h4>LEAVE DURATION</h4>
  <div class="form2">
  
  <table class="table-responsive">
   <thead> <td>Date</td> <td>Select Duration</td> </thead>
   <tr> <td><?php echo date("F j, Y"); ?></td> <td><select class="input-btn" style="height:20px; border-radius:3px;">
                                             <option>Full Day</option>
											 <option>Befor Noon</option>
											 <option>After Noon</option>
                                           </select>
									    </td>
   </tr>										
  </table>
  </div><br>
  
  
  <div>
      <input type="submit" name="submit" value="submit" class="btn-success">
<!--      <button type="submit" name="submit"  value="submit"class="btn-success">submit</button>-->
   <button type="reset" name="reset" class="btn-default">CANCEL</button>
  </div><br>
 </form>
  <h4>LEAVE BALANCE</h4>
  <div class="form3" style="width:100%;">
  <table class="table-responsive">
   <thead> <td>Leave Type</td> <td>Annual Quota</td> <td>Current Forward</td> <td>Current Balance</td> <td>Enrollment Till Date</td> <td>Availed Till Date</td> </thead>
   <tr> <td>Privilege Leave</td> <td>21.0</td> <td>42.0</td> <td>63.0</td> <td>17.5</td> <td>0.0</td> </tr>									
   <tr> <td>Privilege Leave</td> <td>21.0</td> <td>42.0</td> <td>63.0</td> <td>17.5</td> <td>0.0</td> </tr>									
  </table>   
  </div>
  <br>
  
 </div>
</div></div></div>
<div><?php include 'footer.php'; ?></div>
</body>
</html>