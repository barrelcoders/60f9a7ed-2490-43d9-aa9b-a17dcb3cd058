<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if (isset($_POST['submit']))
{
  
	$ssql="SELECT `srno` ,`Date` , `Name`,`Admissionno` ,`Class`,`Rollno`,`Reason`,`Time`FROM `late_comers` where 1=1";
	
		
	
	
	if ($_POST["txtadmissionno"] !="")
	{
		$AddmissionId=$_POST["txtadmissionno"];
		$ssql = $ssql . " and `Admissionno`='$AddmissionId'";
	}
        if ($_POST["cboClass"])
			{	
				$SelectedClass=$_POST["cboClass"];
			$ssql = $ssql . " and `Class`='$SelectedClass'";
			}
			

	$rs= mysql_query($ssql);
}else{
    $ssql="SELECT `srno` ,`Date` , `Name`,`Admissionno` ,`Class`,`Rollno`,`Reason`,`Time`FROM `late_comers` where 1=1";
  $rs= mysql_query($ssql);  
}





/*$ssql="SELECT `srno`,`Date` ,`Admissionno`, `Name` ,`Class`,`Rollno`,`Reason`,`Time` FROM `late_comers` order by `srno`";
$rs= mysql_query($ssql);*/
$num_rows=0;
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);

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
		 body{font-family:Arial, Helvetica, sans-serif!important; cursor:default;} .head{font-size:16px; margin-top:1%; padding:0 5%;}
		.text-box{ width:90%; padding:2% 2%; border-radius:5px; border:1px solid #c8c8c8; } .hr1{width:99%; border:1px solid #CCCCCC; padding:0; margin-top: 0%;}   .table1 table .col td{ background:#0b462d; font-weight:600; padding:0.4%; color:#FFF;  border:1px solid #CCC;  } .table1 table{width:100%;} .table1{padding:0 5%; margin-bottom:2%;} .table1 table td{padding:0.2%; border:1px solid #0b462d; } .table1 table td a{text-decoration:none;} table .col1{width:8%;} table .col2{width:15%;} .text-box{width:100%; height:30px;} .row{padding:0% 5%; margin:0;} .col-xs-12{padding-top:4%;} .col-xs-12 .btn{border:2px solid #0b462d; border-radius:4px; background:#0b462d; color:#FFF;} .hr1{width:99%; border:1px solid #CCCCCC; padding:0;}
		 @media only screen and (min-width:1235px) and (max-width: 1935px){ }
		 @media only screen and (min-width:870px) and (max-width: 1235px){		 }
		 @media only screen and (min-width:1051px) and (max-width: 1235px){}
		 @media only screen and (min-width:870px) and (max-width: 1051px){ }
		 @media only screen and (min-width:928px) and (max-width: 1080px){  }
		 @media only screen and (min-width:720px) and (max-width: 940px){ body{font-size:12px;}	}		 
		 @media only screen and (min-width:640px) and (max-width: 720px){ body{font-size:14px}  .table1 table{width:100%;} } 
		 @media only screen and (min-width:580px) and (max-width:640px){.table1 table{width:100%;}.table1{padding:0 2%;}.table1 table td{font-size:12px;}}
		 @media only screen and (min-width:480px) and (max-width: 580px){.table1 table{width:100%;} .table1{padding:0 1%;} .table1 table td{font-size:12px;}} 
		 @media only screen and (min-width:334px) and (max-width: 480px){.table1 table{width:100%;} .table1{padding:0 1%;} .table1 table td{font-size:10px;}}
		 @media only screen and (min-width:240px) and (max-width: 334px){.table1 table{width:95%;} .table1{padding:0; } .table1 table td{font-size:10px;}}
		
		</style>
	</head>
<body>
<form action="" method="post">

<div id="container">
<div class="head"><strong>Filter By:-</u></strong> </div><hr class="hr1">

<div class="row">
  <div class="col-xs-3"><strong>Search By Admission No.:</strong></div>
  <div class="col-xs-3"><input type="text" id="" class="text-box" name="txtadmissionno" id="txtadmissionno" /></div>
  <div class="col-xs-3"><strong>Search By Class:</strong></div>
  <div class="col-xs-3">
  	<select name="cboClass" id="cboClass" class="text-box">

		<option selected="" value="">All</option>

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
   <div class="col-xs-12" align="center"> <input  type="submit" name="submit" value="submit" class="btn" ></div>
  </div>
  </form>
  <div class="head"><strong>List of Late Comers:-</u></strong> </div>
  <hr class="hr1">
<div class="table1">
 <table class="table-responsive">
  <tr class="col">
   <td class="col1">Sr. No.</td>
   <td class="col1">Date</td>
   <td class="col1">Admsn No.</td>
   <td class="col2">Name</td>
   <td class="col2">Class</td>
   <td class="col2">Roll No.</td>
   <td class="col3">Reason</td>
   <td class="col3">Time </td>
  </tr>
  <?php
				while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$Date=$row[1];
					$Admissionno=$row[2];
					$Name=$row[3];
					$Class=$row[4];
					$Rollno=$row[5];
					$Reason=$row[6];
					$Time=$row[7];
					$num_rows=$num_rows+1;
			?>
  <tr>
   <td class="col1"><?php echo $srno; ?></td>
   <td class="col1"><?php echo $Date; ?></td>
    <td class="col2"><?php echo $Name; ?></td>
   <td class="col1"><?php echo $Admissionno; ?></td>
  
   <td class="col2"><?php echo $Class; ?></td>
   <td class="col2"><?php echo $Rollno; ?></td>
   <td class="col3"><?php echo $Reason; ?></td>
   <td class="col3"><?php echo $Time; ?></td>
  </tr>
  <?php
			}
			?>
 </table>
</div>
</div>
</body>
</html>
<?php include 'ad_D/footer.php'; ?>