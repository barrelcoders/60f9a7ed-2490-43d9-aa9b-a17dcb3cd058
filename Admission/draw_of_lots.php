<?php
include '../connection.php';
include '../AppConf.php';
//include '../Header/Header3.php';


?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Language" content="en-us">
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		<title>Total List</title>
		<link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />
		<script src="js/student_custom.js"></script>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div id="container">
			 <div class="row ">
			 	<div class="Header" align="center"><img src="../images/NewLogo.jpg" class="img-responsive"><br /></div>
			 </div>
			 
			  <div align="center" class="h h11" style="font-size:25px;"><b><font >Nursery / Pre School Admission 2017 - 2018 <br> LIST OF APPLICANTS FOR DRAW OF LOTS</font></b></div>
			  <div>&nbsp;</div>
			  <table class="table table-striped table-bordered bootstrap-datatable datatable">
			  	<thead>
					<tr>
						<!--<th>S.No.</th>-->
						<th style="background:#0c462e; color:#fff; font-size:15px;">Application No.</th>
						<th style="background:#0c462e; color:#fff; font-size:15px;">Name of Applicant</th>
						<!--<th style="background:#0c462e; color:#fff; font-size:15px;">Gender</th>-->
						<th style="background:#0c462e; color:#fff; font-size:15px;">Father's Name</th>
						
						<th style="background:#0c462e; color:#fff; font-size:15px;">Mother's Name</th>
						<!--<th style="background:#0c462e; color:#fff; font-size:15px;">Date Of Birth</th>-->
						
						
					</tr>
				</thead>
				<tbody>
					<?php
						  
              			  $list = "select * from total_drawoflots order by `id` desc";
						  $listQuery = mysql_query($list);
						  while($listFetch = mysql_fetch_assoc($listQuery))
						  {
             		?>
             		
					<tr>
						
						<!--<td><?php echo $listFetch['id'] ;?></td>-->
						<td style="font-size:25px;"><b><?php echo $listFetch['Admission_no'] ;?></b></td>
						<td style="font-size:25px;"><b><?php echo $listFetch['Applicant_name'] ;?></b></td>
						<!--<td style="font-size:25px;"><b><?php echo $listFetch['Gender'] ;?></b></td>-->
						<td style="font-size:25px;"><b><?php echo $listFetch['Father_name'] ;?></b></td>
						<td style="font-size:25px;"><b><?php echo $listFetch['Mother_name'] ;?></b></td>
						<!--<td style="font-size:25px;"><b><?php echo $listFetch['DOB'] ;?></b></td>
						<td><?php echo $listFetch['Email_id'] ;?></b></td>
						<td style="font-size:25px;"><b><?php echo $listFetch['Phone_no'] ;?></b></td>-->
						
					
					</tr>
					<?php } ?>
				</tbody>
			  </table>
		
		</div>
		
	</body>
</html>
<script>
function update()
{
if("{!showalert}")
    alert("$listFetch['Admission_no']");
}
</script>
