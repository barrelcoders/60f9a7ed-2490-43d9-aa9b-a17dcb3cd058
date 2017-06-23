<?php include '../connection.php';?>
<?php
session_start();
	$StudentClass = $_SESSION['StudentClass'];
	$StudentRollNo = $_SESSION['StudentRollNo'];
	$sadmission=$_SESSION['userid'];
	
	
//$ssql="select `srno`,`HeadName`,`HeadAmount`,`sclass`,`LastDate`,`Remarks` from `fees_misc_announce` where `sclass`='$StudentClass'";
$ssql="select `srno`,`HeadName`,`HeadAmount`,`sclass`,`LastDate`,`Remarks` from `fees_misc_announce` where `sclass`='$StudentClass' and `sadmission`='$sadmission'";
$rs = mysql_query($ssql);
?>
<script language="javascript">
function fnlShowReceipt(headname,admissionid)
{
	var myWindow = window.open("ShowMiscReceipt.php?headername=" + escape(headname) + "&sadmission=" + escape(admissionid),"MsgWindow","width=700,height=700");
	return;
}
</script>
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



.auto-style3 {

	color: #000000;

}

.style9 {
	border-width: 0px;
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

      <li>»</li>

      <li><a href="index.php">Home</a></li>

      <li>»</li>

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

      <div class="subnav">

        <h2><b><font face="Cambria" style="font-size: 14pt" color="#2A2B2F"><span lang="en-us">Navigation Section</span></font></b></h2>

        <ul>

          <h4><li><font face="Cambria" style="font-size: 12pt"><a href="Classwork.php">Classwork and Homework</a></font></li>
          
                   <li><font face="Cambria" style="font-size: 12pt"><a href="Attendance.php">Attendance</a></font></li>
                     <li><font face="Cambria" style="font-size: 12pt"><a href="MyFees.php">My Fees</a></li>

             <li><font face="Cambria" style="font-size: 12pt"><a href="Holiday.php">Holidays</a>

          </font>

          </li>

          <li><font face="Cambria" style="font-size: 12pt"><a href="Notices.php">Notices</a></font></li>

           <li><font face="Cambria" style="font-size: 12pt"><a href="ReportCard.php">Report Card</a></font></li>

            <li><font face="Cambria" style="font-size: 12pt"><a href="DateSheet.php">Datesheet</a></font></li>

           <li><font face="Cambria" style="font-size: 12pt"><a href="Timetable.php">Timetable</a></font></li>

			  <li><font face="Cambria" style="font-size: 12pt"><a href="SessionPlan.php">Session Plan</a></font></li>



             <li><font face="Cambria" style="font-size: 12pt"><a href="Assignment.php">Assignment</a></font></li>

              <li><font face="Cambria" style="font-size: 12pt"><a href="Directory.php">School Directory</a></font></li>

               <li><font face="Cambria" style="font-size: 12pt"><a href="Transport.php">Transport Details</a></font></li>

                <li><font face="Cambria" style="font-size: 12pt"><a href="SendQuery.php">Send A Query</a></font></li>

                <li><font face="Cambria" style="font-size: 12pt"><a href="../Gallery/index.php">Photo Gallery</a></li>

                <li><font face="Cambria" style="font-size: 12pt"><a href="MyProfile.php">My Profile</a></font></li>
                <li><font face="Cambria" style="font-size: 12pt"><a href="MyFees.php">My Fees</a></font></li>

            	</font>

            </h3>

          </li>

        </ul>

      </div>

    </div>

    </td>

    

    

<!-- #########################################Navigation TD Close ############################################################## -->    



<!-- #########################################Content TD Open ############################################################## -->    
				<td>
<div>

  <div>
    <div style="overflow: scroll; width: 1050px;">



	<p><u><b><font face="Cambria" color="#009900">Student Fees Details and 
	Payment</font></b></u></p>
	<p><b><font face="Cambria" color="#009900">Tuition Fees and Hostel Fees 
	Payment</font></b></p>
	<table border="1" width="100%" style="border-collapse: collapse">
		<tr>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Sr No</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Fees Head</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Amount</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Quarter</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Status</font></b></td>
			<td bgcolor="#006400" align="center"><b>
			<font face="Cambria" color="#FFFFFF">Last Date</font></b></td>
		</tr>
		<tr>
			<td height="32" colspan="6">
			<p align="center"><font color="#0000FF" face="Cambria"><b>Coming 
			Soon</b></font></td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<p><b><font face="Cambria" color=#009900>Miscellaneous Fees Payment</font></b></p>
	
	<table class="style9">
	<tr>
			<td class="style8" style="width: 196px" align="center" bgcolor="#006400">
			<b><font color="#FFFFFF">Sr.No</font></b></td>
			<td class="style8" style="width: 196px" align="center" bgcolor="#006400">
			<b><font color="#FFFFFF">Head Name</font></b></td>
			<td class="style8" style="width: 196px" align="center" bgcolor="#006400">
			<b><font color="#FFFFFF">Amount</font></b></td>
			<td class="style8" style="width: 196px" align="center" bgcolor="#006400">
			<b><font color="#FFFFFF">Last Date</font></b></td>
			<td class="style8" style="width: 196px" align="center" bgcolor="#006400">
			<b><font color="#FFFFFF">Remarks</font></b></td>
			<td class="style8" style="width: 196px" align="center" bgcolor="#006400">
			<b><font color="#FFFFFF">Payment</font></b></td>
	</tr>
	<?php
	$rowcount=1;
	while($row=mysql_fetch_row($rs))
	{
		$HeaderSrNo=$row[0];
		$HeadName=$row[1];
		$HeadAmount=$row[2];
		$sclass=$row[3];
		$LastDate=$row[4];
		$Remarks=$row[5];
		$rsChk=mysql_query("select * from `fees_misc_collection` where `sadmissionno`='$sadmission' and `HeadName`='$HeadName'");
		
	?>
	<tr>
			<td class="style8" style="width: 196px" align="center"><?php echo $rowcount;?>.</td>
			<td class="style8" style="width: 196px" align="center"><?php echo $HeadName;?></td>
			<td class="style8" style="width: 196px" align="center"><?php echo $HeadAmount;?></td>
			<td class="style8" style="width: 196px" align="center"><?php echo $LastDate;?></td>
			<td class="style8" style="width: 196px" align="center"><?php echo $Remarks;?></td>
			<td class="style8" style="width: 196px" align="center">
			<?php
			if (mysql_num_rows($rsChk) == 0)
			{
			?>
			<form align="center" method="post" action="FeesSubmit.php" target="_blank">
	             <input type="hidden" id="hHeaderSrNo" name="hHeaderSrNo" value="<?php echo $HeaderSrNo;?>">
	             <input type="Submit" value="Pay <?php echo $HeadAmount;?>"/>
			</form>
			<?php
			}
			else
			{
			?>
			<input type="button" name="btnPrintReceipt" id="btnPrintReceipt" value="Print Receipt" onclick="javascript:fnlShowReceipt('<?php echo $HeadName;?>','<?php echo $sadmission;?>');">
			<?php
			}
			?>
			</td>
	</tr>
	<?php
	}
	?>
	</table>
	
	<p><font face="Cambria"><i><b>- Total Fees Amount displayed does not include 
	the late fees charges (If applicable)</b></i></font></p>
<p><b><i><font face="Cambria">- Total Fees Amount displayed does not include 
previous Balance / Advances (if applicable)</font></i></b></p>
<p><b><i><font face="Cambria">- Please read online payment guide for any 
clarification --&gt; <a href="DPS fees payment guide.pptx">Click here to download 
Online Payment Guide</a></font></i></b><p><b><i><font face="Cambria">- Please 
write to us at <a href="mailto:support@eduworldtech.com">
support@eduworldtech.com</a> for any clarifications or kindly call at School 
Reception for further details</font></i></b></div>
		</td>
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

