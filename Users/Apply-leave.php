<?php include '../connection.php';?>
<?php
session_start();

   $EmployeeId  =$_SESSION['userid'];
$rsLeaveType=mysql_query("select * from `student_leave_type` where status=1");

if(isset($_POST['submit'])){
    $LeaveFrom=$_POST['LeaveFrom'];
    $Remarks=$_POST['Remarks'];
    $LeaveType=$_POST['LeaveType'];
    $LeaveTo=$_POST['LeaveTo'];
    $ContactNoDuringLeave=$_POST['ContactNoDuringLeave'];
    $EntryDate=  date("Y-m-d");
    $EmployeeId  =$_SESSION['userid'];
   
     
$date1=strtotime($LeaveFrom);
$date2=strtotime($LeaveTo);
 $finalDate= $date2-$date1;
$NoOfDays= abs(floor($finalDate / (60 * 60 * 24)))+1;
     
   
    $result=mysql_query("INSERT INTO student_leave_transaction(srno,LeaveFrom,Reason,LeaveType,NoOfDays,LeaveTo,EntryDate,sadmission) value('','".$LeaveFrom."','".$Remarks."','".$LeaveType."','".$NoOfDays."','".$LeaveTo."','".$EntryDate."','".$EmployeeId."')");
     if($result){
        
         
        if($NoOfDays>0 ||  $NoOfDays<3){ 
         $to = "roymanish28@gmail.com";
        }else if($NoOfDays>2 || $NoOfDays<11){
           $to = "roymanish28@gmail.com";  
        }else if($NoOfDays>10){
         $to = "roymanish28@gmail.com";  
        }
$subject = "Student Leave";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>Dear Sir</p>
<table>
<tr>
<th>Leave</th>
<th>Apply</th>
</tr>

</table>
</body>
</html>
";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <manish@gmail.com>' . "\r\n";
$headers .= 'Cc: mohit@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);
        
    }else{
        echo "data not inserted";die;
    }
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: School Education
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Daily Classwork and Homework</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />

<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<style>
<!--
.auto-style32 {

	border-color: #000000;

	border-width: 0px;

	border-collapse: collapse;

	font-family: Cambria;

}

.auto-style35 {

	border-style: solid;

	border-width: 1px;

	font-family: Cambria;

	text-align: center;

}





.style8 {

	border-style: solid;

	border-width: 1px;

	font-family: Cambria;

}



.auto-style1 {
	border-width: 1px;
	color: #000000;
	font-family: Cambria;
	font-size: 15px;
}

.auto-style2 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 15px;
	font-style: normal;
	text-decoration: none;
	color: #000000;
}

.style1 {

	text-align: center;

	color: #0000FF;

}

.auto-style3 {
	color: #000000;
}
-->
</style>
</head>
<body>

<!-- ####################################################################################################### -->
 <table width="100%" style="border-width: 0px"> 

<tr>

<td style="border-style: none; border-width: medium">
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><img src="../../Admin/images/logo.png" height="76" width="300" ></img></h1>
    
    </div>
    
    <div id="topnav">
      <ul>
        <li class="active"><a href="#">Home</a></li>
        <li><a href="Notices.php">Events and Notices</a></li>
        <li><a href="News.php">News</a></li>
		<li><a href="logoff.php">Logout</li>
        <li class="last"></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
</div>


    
<!-- ####################################################################################################### -->

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>�</li>
      <li><a href="index.php">Home</a></li>
      <li>�</li>
		<li class="current"><a href="#">School News</a></li>
    </ul>
  </div>
</div>


<!-- ######################################Div for News ################################################################# -->

<div class="wrapper col6">
  <div id="breadcrumb">
   
    <font size="3" face="cambria"><b><marquee> Welcome to School Information System ! </b></marquee></font>
    
  </div>
</div>

</td>

</tr>

</table>

<table width="100%" border="0">
			<tr>
				<td>
				
	 <div id="column">
     <?php  include 'SideMenu.php'; ?>
    </div>
    </td>
    
    
<!-- #########################################Navigation TD Close ############################################################## -->    

<!-- #########################################Content TD Open ############################################################## -->    


				<td>
			
    
<div>
  <div>
    <div>
      <table border="1" width="100%" cellspacing="1" style="border-width:0px; border-collapse: collapse" height="80" bordercolor="#000000" id="table4">

	<tr>

		<td bgcolor="#5B3AB6" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">

		<p style="margin-left: 10px">

		<font color="#FFFFFF">

		<span style="font-family:Cambria;font-size:18px;font-weight:bold;font-style:normal;text-decoration:none;">

		LEAVE REQUEST</span></font></td>

	</tr>

	<tr>

		<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium">

		<table width="100%" id="table2" style="border-collapse: collapse; border-right-width:0px; border-top-width:0px; border-bottom-width:0px" bordercolor="#000000">

			

		</table>
                    
     <form action="#" method="POST" enctype="multipart/form-data">
<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000" id="table5">

			<table class="table-condensed" >
     <tr> <td>Application Date:</td> <td><?php echo date("F j, Y"); ?></td> </tr>
  <tr>
     <td>Start Date:</td> <td><input type="date" name="LeaveFrom" class="input-btn"></td> 
 </tr>
     <tr>
     <td>End Date:</td> <td><input type="date" name="LeaveTo" class="input-btn"></td> 
 </tr>
 
 <tr>
     <td>Leave Reason:</td> <td><input type="text" name="Remarks" class="input-btn">  </td>
						 
 </tr>
 
     <tr>
      <td>Leave Type:</td> <td><select class="input-btn"  name="LeaveType">
      			<option value="Select One" selected="selected">------Select One------</option>
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
	                           </select>
						   </td>
 </tr>
     <tr><td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="submit" class="btn-success"></td></tr>
 
 </table>
    

</table></form>
		<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000" id="table5">

			<tr>

				<td width="278" bgcolor="#FFFFFF" align="center">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">

				Sr. No.</span></td>

				<td width="278" bgcolor="#FFFFFF" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">

				Leave From</span></td>

				<td width="279" bgcolor="#FFFFFF" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">

				Leave To</span></td>

				<td bgcolor="#FFFFFF" align="center" width="279">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">

				Total No of days</span></td>

				<td bgcolor="#FFFFFF" align="center" width="279">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">

				Leave Type</span></td>

				<td bgcolor="#FFFFFF" align="center" width="279">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">

				Reason</span></td>
                            <td bgcolor="#FFFFFF" align="center" width="279">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #000000">

				Leave Status</span></td>

			</tr>

			<?php
                        $leaveRecord=mysql_query("SELECT * FROM student_leave_transaction WHERE sadmission='".$EmployeeId."'");
                        $count=  mysql_num_rows($leaveRecord);
                        if($count>0){
                       
                        $i=1;
				while($row = mysql_fetch_assoc($leaveRecord))
                                {

					$sadmission=$row['sadmission'];
                                        $leaveFrom=$row['LeaveFrom'];
                                        $leaveTo=$row['LeaveTo'];
					$leaveType=$row['LeaveType'];
                                        $NoOfDays=$row['NoOfDays'];
					$Reason=$row['Reason'];
                                        $leaveTo=$row['EntryDate'];
					$approvalStatus=$row['ApprovalStatus'];
                                ?>

			<tr>

				<td width="278" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $i; ?></span></td>

				<td width="278" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $leaveFrom; ?></span></td>

				<td width="279" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $leaveTo; ?></span></td>

				<td width="279" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $NoOfDays; ?></span></td>

				<td width="279" align="center">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
                                 <?php echo $leaveType; ?></span></td>

				
				
				</td>

				<td width="279" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $approvalStatus; ?></span></td>
                             <td width="279" align="center">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $approvalStatus; ?></span></td>

			</tr>

			<?php
             $i++;
			}
                       

			?>

		<tr>

				<td width="278" align="center">&nbsp;</td>

				<td width="278" align="center">&nbsp;</td>

				<td width="279" align="center">&nbsp;</td>

				<td width="279" align="center">&nbsp;</td>

				<td width="279" align="center">&nbsp;</td>

				<td width="279" align="center">&nbsp;</td>
                                <td width="279" align="center">&nbsp;</td>

			</tr>	
                      
                        <?php }else{ ?>
                            <tr>

                                <td width="100%" align="center" style="color:red;" colspan="8">Record not fond.</td>


			</tr><?php } ?>
		</table>

		</td>

	</tr>

</table>



</td>

<!--####################################Content TD close ################################################### -->
    
</tr>

</table>

<div class="wrapper col5">
  <div id="copyright" style="width: 100%; height: 58px">
    
    <p align="center">Powered By Eduworld Technologies LLP |   <a target="_blank" href="http://www.eduworldtech.com" title="Eduworld Technologies LLP">
	Education ERP Platform</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>