<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Student Management</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
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
   <li><a href="StudentWithdrawal_Deactivate.php"><button class="btnmanu">Deactivate A Student</button></a></li>
   <li><a href="Reactivate_Student.php"><button class="btnmanu">Reactivate A Student</button></a></li>
   <li class="active"><a href="FullandFinalCompl.php"><button class="btnmanu">Full and Final Completion</button></a></li>
   <li><a href="WithDrawal_Register.php"><button class="btnmanu">Withdrawal Register</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="studentwithdrawal">
    	<div class="studentwithdrawal_head">Full and Final Clearance</div>
        <div class="studentwithdrawal_input row" id="ad1">
        	<form action="" method="post" >
	        	<div class="col-xs-3"><b>Student Admission No. :</b></div>
    	        <div class="col-xs-3"><input type="text" name="sadmissionno" id="sadmissionno" class="text-box" value=""></div>
        	    <div class="col-xs-3"><input type="submit" name="submit" id="submit" class="btn"></div>
            	<div class="col-xs-3">&nbsp;</div>
            </form>
        </div>
        <div class="studentwithdrawal_table1" id="print">
        	<form action="" method="post" >
	        	<table class="table-responsive" width="100%" style="border:1px solid #0b462d;">
                	<tr id="ad" style="display:none">
	        			<td style="padding:1% 1%;">Student Admission No. :</td>
    	        		<td style="padding:1% 1%;"><input type="text" name="sadmissionno" id="sadmissionno" class="text-box" value=""></td>
                	</tr>
    	        	<tr>
        	        	<td style="padding:1% 1%;">Student Name :</td>
            			<td style="padding:1% 1%;"><input type="text" name="sname" id="sname" class="text-box" value=""></td>
                	</tr>
	                <tr>
		            	<td style="padding:1% 1%;">Student Class :</td>
        	    		<td style="padding:1% 1%;"><input type="text" name="sclass" id="sclass" class="text-box" value=""></td>
            	    </tr>
                	<tr>
	            		<td style="padding:1% 1%;">Student Roll No :</td>
    	        		<td style="padding:1% 1%;"><input type="text" name="srollno" id="srollno" class="text-box" value=""></td>
        	        </tr>
            	    <tr>  <td colspan="2" style="border-bottom:1px solid #0b462d; font-weight:bold;">Clearance Heads</td> </tr>
                	<tr>
                		<td style="padding:1% 1%;">Library Clearance</td>
	                    <td style="padding:1% 1%;"><input type="checkbox" name="libraryclearance" id="libraryclearance" value=""></td>
    	            </tr>
        	        <tr>
            	        <td style="padding:1% 1%;">Account Clearance</td>
                	    <td style="padding:1% 1%;"><input type="checkbox" name="accountclearance" id="accountclearance" value=""></td>
	                </tr>
    	            <tr>
        	            <td style="padding:1% 1%;">Academic Clearance	 </td>
            	        <td style="padding:1% 1%;"><input type="checkbox" name="academicclearance" id="academicclearance" value=""></td>
                	</tr>
	                <tr>
    	                <td style="padding:1% 1%;">Transport Clearance</td>
        	            <td style="padding:1% 1%;"><input type="checkbox" name="transportclearance" id="transportclearance" value=""></td>
            	    </tr>
                	<tr>
                    	<td style="padding:1% 1%;">Other Clearance</td>
	                    <td style="padding:1% 1%;"><input type="text" name="otherclearance" id="otherclearance" class="text-box" value=""></td>
    	            </tr>
        	        <tr> <td colspan="2" align="center"><input type="submit" name="submit1" id="submit1" class="btn" > </td> </tr>                
            	</table>
        	</form>
        </div>
   <div align="center"> <a href="Javascript:printDiv();" >PRINT</a></div>
  </div>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
<!----end printer--->
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("print").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
		document.getElementById('ad').style.display = "block";
		document.getElementById("submit1").style.display ="none";
		
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>	
 
 
 
 
 




