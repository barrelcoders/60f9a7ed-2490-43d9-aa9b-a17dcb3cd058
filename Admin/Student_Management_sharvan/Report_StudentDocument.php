<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Student Management</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
   
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
<div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="Report_DiscountWise.php"><button class="btnmanu">Discount wise Student Report</button></a></li>
   <li><a href="Report_RouteWise.php"><button class="btnmanu">Route wise Student Report</button></a></li>
   <li><a href="Report_MaleFemaleR.php"><button class="btnmanu">Male Female Ratio Report</button></a></li>
   <li class="active"><a href="Report_StudentDocument.php"><button class="btnmanu">Student Document Report</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="studentwithdrawal">
    	<div class="studentwithdrawal_head">Student Discount Summary</div>
        <div class="studentroll">
        	<form action="" method="post">
	        	<div class="row">
    	        	<div class="col-md-9">
			        	<div class="row">
                			<div class="col-xs-6">Select Class</div>
                			<div class="col-xs-6">	<select name="class" id="class" class="text-box">
                										<option value="">Select One</option>
                									</select>
			                </div>                        
        	    		</div>
		    	    	<div class="row">
                			<div class="col-xs-6">Roll No</div>
		                	<div class="col-xs-6">	<input type="text" name="rollno" id="rollno" class="text-box"> </div>                        </div>
        	    	</div>       
            	    <div class="col-md-3">
                	<input type="submit" name="submit" id="submit" class="btn">
                	</div>
	            </div>
            </form>                
        </div>
        <div class="studentwithdrawal_table12">
  			<table>
            	<tr class="col">
                	<td>Sr.No</td>
                	<td>Class</td>
                	<td>Student Name</td>
                	<td>Roll No</td>
                	<td>Document Type</td>
                	<td>Preview</td>
                </tr>
                <tr>
                	<td>1</td>
                    <td>I</td>
                    <td>Sharvan</td>
                    <td>S101</td>
                    <td>Student Photo</td>
                    <td><a href="#">Preview</a>
                </tr>
            </table>
        </div>
    </div>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
 

 
 
 
 




