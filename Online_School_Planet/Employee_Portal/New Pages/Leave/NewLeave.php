<?php include 'header.php'; ?>
<?php 
session_start();

include '../../../connection.php'; 
$rsLeaveType=mysql_query("select * from `LeaveTypeMaster`");

if(isset($_POST['submit'])){
    $LeaveFrom=$_POST['LeaveFrom'];
    $Remarks=$_POST['Remarks'];
    $LeaveType=$_POST['LeaveType'];
    //$NoOfDays=$_POST['txtNoOfDaysLeave'];
    $LeaveTo=$_POST['LeaveTo'];
    $ContactNoDuringLeave=$_POST['ContactNoDuringLeave'];
    $EntryDate=  date("Y-m-d");
    $EmployeeId  =$_SESSION['userid'];
    $MedicalCertificate=$_FILES['image']['name'];
     $dest ='MedicalCertificates/';
     
     
$date1=strtotime($LeaveFrom);
$date2=strtotime($LeaveTo);
 $finalDate= $date2-$date1;
$NoOfDays= abs(floor($finalDate / (60 * 60 * 24)))+1;
     
    //echo "INSERT INTO Employee_Leave_Transaction(srno,EmployeeName,Remarks,LeaveType,ContactNoDuringLeave) value('','".$LeaveFrom."','".$Remarks."','".$LeaveType."','".$LeaveTo."','".$LeaveTo."','".$ContactNoDuringLeave."')";

    //echo "<pre />";print_r($_FILES);die;
    $result=mysql_query("INSERT INTO Employee_Leave_Transaction(srno,LeaveFrom,Remarks,LeaveType,NoOfDays,LeaveTo,ContactNoDuringLeave,EntryDate,EmployeeId,MedicalCertificate) value('','".$LeaveFrom."','".$Remarks."','".$LeaveType."','".$NoOfDays."','".$LeaveTo."','".$ContactNoDuringLeave."','".$EntryDate."','".$EmployeeId."','".$MedicalCertificate."')");
    if($result){
        
        try{

                         if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
                         {
                             $imageName = $_FILES['image']['name'];
                             
                             if (move_uploaded_file($_FILES['image']['tmp_name'], $dest.$imageName)) 
                             {
                                 chmod($dest . $imageName, 0755);

                             } 

                            

                             }}catch (Exception $e) {
                             echo 'Caught exception: ',  $e->getMessage(), "\n";
                             }
    }else{
        echo "data not inserted";die;
    }
}

?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Payroll</title><link rel="icon" href="l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../../css/payroll.css" />
   <script src="../../js/bootstrap.min.js"></script>
</head>
<style> .ddiframeshim{height:0%} </style>
<body>
<div id="container">
<!----Header--------->

<!---------containt---------->
<div class="cont">
<div class="row c leave">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li class="active"><a href="NewLeave.php">New Leave</a></li>
   <li><a href="MyLeave.php">My Leave</a></li>
   <li><a href="ViewHoliday.php">Holiday List</a></li>
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
		<?php
		while($row = mysql_fetch_row($rsLeaveType))
		{
			$srno=$row[0];					
			$LeaveType=$row[1];					
			$MaxLeaves=$row[2];
			$FinancialYear=$row[3];
		?>
		<option value="<?php echo $LeaveType;?>"><?php echo $LeaveType;?></option>
		<?php
		}
		?>
	                            <!--<option >Please Select</option>
                                    <option value="Privilege Leave">Privilege Leave</option>
                                    <option value="Casual Sick Leave">Casual Sick Leave</option>
                                    <option value="Resticted Holiday">Resticted Holiday</option>-->
	                           </select>
						   </td>
 </tr>
  <tr>
     <td>End Date:</td> <td><input type="date" name="LeaveTo" class="input-btn" style="width:60%"></td> 
 </tr>
 
 <tr>
  <td>Contact No. During Leave:</td> <td><input type="number" name="ContactNoDuringLeave" class="input-btn" style="width:60%" ></td>
 </tr>
<!-- <tr>
  <td>Number of Days:</td> <td><input type="number" name="txtNoOfDaysLeave" id="txtNoOfDaysLeave" class="input-btn" style="width:60%" readonly ></td>
 </tr>     -->
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
  
  <?php
   $EmployeeId  =$_SESSION['userid'];
		$rowDataSql = mysql_query("SELECT l1.`LeaveType`,l1.`MaxLeaves`, sum(l2.NoOfDays) as totalleave,SUM( l2.approvedLeave ) AS approvedLeave, l2.ApprovalStatus,l2.L2ApproverStatus
FROM LeaveTypeMaster as l1 LEFT JOIN Employee_Leave_Transaction as l2 ON l1.`LeaveType`=l2.LeaveType  where l2.EmployeeId='".$EmployeeId."'  group by  l1.`LeaveType`;

 ");
		
                while($rowData=mysql_fetch_array($rowDataSql)){
                    
                ?>
              
  <tr> <td><b><?php echo $rowData['LeaveType']; ?></b></td><td><?php echo $rowData['MaxLeaves']; ?></td> <td>0.00</td><td><?php echo $rowData['MaxLeaves']-$rowData['approvedLeave']; ?></td> <td><?php echo $rowData['totalleave']; ?></td> <td><?php echo $rowData['approvedLeave']; ?></td> </tr>
   <?php } ?>							
  </table>   
  </div>
  <br>
  
 </div>
</div></div></div>
<div><?php include '../footer.php'; ?></div>
</body>
</html>