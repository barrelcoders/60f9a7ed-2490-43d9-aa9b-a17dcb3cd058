_<?php
	session_start();
	include '../../connection.php';
	include '../Header/Header3.php';
	
	
?>
<?php

if (isset($_POST['submit']))
{
   
	$ssql="SELECT `srno` , `sname`, `email`,`smobile`,`sadmission` ,`sclass`,`srollno`FROM `student_master` where 1=1";
	
		
	if(!empty($_POST["txtname"]))
	{
		$SchoolId=$_POST["txtname"];
		$ssql = $ssql . " and `sname`='$SchoolId'";
	}
	if ($_POST["txtadmissionno"] !="")
	{
		$AddmissionId=$_POST["txtadmissionno"];
		$ssql = $ssql . " and `sadmission`='$AddmissionId'";
	}
        if ($_REQUEST["txtRollNo"] != "")
			{	
				$EnteredRollNo=$_POST["txtRollNo"];
				$ssql = $ssql . " and `srollno`='$EnteredRollNo'";
			}
	else
	{
		if ($_POST["cboClass"] != "All")
		{
			$SelectedClass=$_POST["cboClass"];
			$ssql = $ssql . " and `sclass`='$SelectedClass'";
			
			
			
		}
		
			if ($_POST["txtStudentName"] != "")
				{
					$StudentName=$_POST["txtStudentName"];
					$ssql = $ssql . " and `sname` like '%" . $StudentName . "%'";
				}
		
		
	}

	$rs= mysql_query($ssql);
       
        
}


$num_rows=0;
$currentdate=date("d-m-Y");
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
?>
<?php
if(isset($_POST['latecomer']))
{
    
	//$srno=$_POST['srno'];
        $Date=$_POST['date'];
	$Admissionno=$_POST['txtsadmn'];
        $email=$_POST['email'];
	$Name=$_POST['txtsnm'];
	$Class=$_POST['txtscls'];
	$Rollno=$_POST['txtsrln'];
	$Reason=$_POST['txtreason'];
	$Time=$_POST['cbotime'];
        $smobile=$_POST['smobile'];
        $message=urlencode("Dear $Name, Your are late today");
	
	//echo "UPDATE  attendance SET  `attendance` =  'Late' WHERE  `sadmission` ='.$Admissionno.'";die;
	
	$result=mysql_query("INSERT INTO `late_comers`( `Date`, `Admissionno`, `Name`, `Class`, `Rollno`, `Reason`, `Time`) VALUES ('$Date','$Admissionno','$Name','$Class','$Rollno','$Reason','$Time')");
        $updateAttendence=mysql_query("UPDATE  attendance SET  `attendance` =  'Late' WHERE  `sadmission` ='$Admissionno'");
       // UPDATE  attendance SET  `attendance` =  'Late' WHERE  `sadmission` ='W-15157' and `attendancedate`='2016-11-24'
        if($result){ 
            
  $SendSMSurl= "http://prioritysms.tulsitainfotech.com/api/mt/SendSMS?user=user10&password=sms@123&senderid=DPSROH&channel=trans&DCS=0&flashsms=0&number=$smobile&text=$message&route=15";         

//------------------curl request for send api--------------------------------------
 $cSession = curl_init(); 
//step2
curl_setopt($cSession,CURLOPT_URL,$SendSMSurl);
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 
//step3
$result=curl_exec($cSession);
//step4
curl_close($cSession);
//step5

//$to = "roymanish28@gmail.com";
$to=$email;
$subject = "Late Comers";

$message = "
<html>
<head>
<title>Dear $Name</title>
</head>
<body>
<p><h2>Dear $Name</h2></p>
<p>You are Late Today</p>
<table>
<tr>
<th>Thanks & Regards</th>
<th> <th>
</tr>

<tr>
<th>DPS Admin</th>
<th> <th>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@webplanet.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
        }
        
}	
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration</title>
<link rel="stylesheet" href="../../Bootstrap/bootstrap.min.css" />
    <script src="../../Bootstrap/bootstrap.min.js"></script>
	
	
	
		<style>
		 body{font-family:Arial, Helvetica, sans-serif!important; cursor:default;}
		 .text-box{ width:90%; padding:2% 2%; border-radius:5px; border:1px solid #c8c8c8; } .row{padding:0% 5%; margin:0;}  .hr1{width:99%; border:1px solid #CCCCCC; padding:0;} .col-xs-3{margin-top:2%; } form{padding:0 0 0 0;} .col-xs-12{padding-top:4%;} .col-xs-12 .btn{border:2px solid #0b462d; border-radius:4px; background:#0b462d; color:#FFF;}  .table1 table .col td{ background:#0b462d; font-weight:600; padding:0.5%; color:#FFF;  border:1px solid #CCC;  } .table1 table{width:100%;} .table1{padding:0 5%; margin-bottom:2%;} .col-xs-6{font-size:18px;} .table1 table td{padding:0.2%; border:1px solid #0b462d; } .tbs{padding:3% 2%} .txt{border:none}
		 .table1 table td a{text-decoration:none;} table .col1{width:8%;} table .col2{width:15%;} .btn1{width:100%; font-size:15px; background:rgba(11,70,45,0.8); border:none; color:#CCC;border:1px solid #0b462d; border-radius:3px;} button:focus{outline: none !important; border-bottom-color: #719ECE; }
		 @media only screen and (min-width:1235px) and (max-width: 1935px){ }
		 @media only screen and (min-width:870px) and (max-width: 1235px){		 }
		 @media only screen and (min-width:1051px) and (max-width: 1235px){}
		 @media only screen and (min-width:870px) and (max-width: 1051px){ }
		 @media only screen and (min-width:928px) and (max-width: 1080px){  }
		 @media only screen and (min-width:720px) and (max-width: 940px){ body{font-size:12px;}	}		 
		 @media only screen and (min-width:640px) and (max-width: 720px){ body{font-size:14px} .col-xs-3{ width:50%; margin-top:3%; } .col-xs-6{ width:100%;} .table1 table{width:100%;} .xs{ width:51%;} .xs1{ width:50%; margin-left:-1%; } } 
		 @media only screen and (min-width:580px) and (max-width:640px){.table1 table{width:100%;} .table1{padding:0 2%; } .table1 table td{font-size:12px;}}
		 @media only screen and (min-width:480px) and (max-width: 580px){.col-xs-3{ width:100%; margin-top:3%; } .col-xs-6{ width:100%;} .table1 table{width:95%;} .table1{padding:0; } .table1 table td{font-size:12px;}} 
		 @media only screen and (min-width:334px) and (max-width: 480px){ .col-xs-3{ width:100%; margin-top:3%; } .col-xs-6{ width:100%;} .table1 table{width:95%;} .table1{padding:0; } .table1 table td{font-size:10px;}	}
		  @media only screen and (min-width:240px) and (max-width: 334px){ .col-xs-3{ width:100%; margin-top:3%; } .col-xs-6{ width:100%;} .table1 table{width:95%;} .table1{padding:0; } .table1 table td{font-size:10px;}}
		
		</style>
	</head>
<body>
<form action="" method="post">
<div id="container">

 <div class="row">
  <div class="col-xs-12"><strong>LATE COMERS:-</u></strong> <hr class="hr1"></div>
 
 <div class="row">
  <div class="col-xs-3"><strong>Search By Admission No.:</strong></div>
  <div class="col-xs-3"><input type="text" id="" class="text-box" name="txtadmissionno" id="txtadmissionno" /></div>
  <div class="col-xs-3 xs"><strong>Search By Name:</strong></div>
  <div class="col-xs-3 xs1"><input type="text" id="" class="text-box" name="txtname" id="txtname" /> </div> 
  
 </div>
 <div class="row">
  <div class="col-xs-3"><strong>Search By Class:</strong></div>
  <div class="col-xs-3">
  	<select name="cboClass" id="cboClass" class="text-box" onchange="FillRollNo();">

		<option selected="" value="All">All</option>

		<?php
		while($row1 = mysql_fetch_row($rsClass))
		{
					$Class=$row1[0];
		?>
		<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
		<?php
		}
		?>
		</select>
  </div>
   <div class="col-xs-3"><strong>Date:</strong></div>
  <div class="col-xs-3"><input type="text" id="latecomerdate" class="text-box tb" name="date" value="<?php echo $currentdate;?>" readonly="readonly"></div>
 </div>
 </div>
    <div class="col-xs-12" align="center"> <input  type="submit" name="submit" value="submit" class="btn" ></div>
<hr class="hr1">

<div class="table1">
 <table class="table-responsive">
  <tr class="col">
   <td class="col1">Sr. No.</td>
   
   <td class="col1" style="font-size:14px">Admsn No.</td>
   <td class="col2">Name</td>
   <td class="col2">Class</td>
   <td class="col2">Roll No.</td>
   <td class="col3">Reason</td>
   <td class="col3">Time </td>
   <td class="col1">Late Comer</td>
  </tr>
 
  <?php

				while($row = mysql_fetch_array($rs))
				{ ?>
				
  <tr>
   <td class="col1"><?php echo $row['srno']; ?></td>
  <input type="hidden" name="email" value="<?php echo $row['email']; ?>" >
  <input type="hidden" name="smobile" value="<?php echo $row['smobile']; ?>" >
   <td class="col1"><input type="text" name="txtsadmn" value="<?php echo $row['sadmission']; ?>" readonly class="txt"/></td>
   <td class="col2"><input type="text" name="txtsnm" value="<?php echo $row['sname']; ?>" readonly class="txt" /></td>
   <td class="col2"><input type="text" name="txtscls" value="<?php echo $row['sclass']; ?>" readonly class="txt" /></td>
   <td class="col2"><input type="text" name="txtsrln" value="<?php echo $row['srollno']; ?>" readonly class="txt" /></td>
   <td class="col3"><input type="text" name="txtreason" id="txtreason" /></td>
   <td class="col3"><input type="time" name="cbotime" id="cbotime" /></td>
   <td class="col1"><input type="submit" name="latecomer" value="Late Comer" class="btn1" /></td>
  </tr>	
                         <?php        }

			?>
 </table>
</div>
</div>
</form>
</body>
</html>
<?php include 'ad_D/footer.php'; ?>