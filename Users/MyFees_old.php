<?php 
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
{
	header('Location: http://dpsfsis.com/mPortal/FeesPaymentmPortal.php');
	exit();
}
?>
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

<title>Fee Collection</title>

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

            	</font>

            	</h3></li>

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
	<p><b><font face="Cambria" color="#009900">Tuition Fees Payment</font></b></p>
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
			<p align="center"><b><font face="Cambria" color="#0000FF">Links for 
			Fees Payment will be activated on 5th Oct 2015</font></b></td>
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

    

    <p align="center">Powered By Online School Planet |   <a target="_blank" href="http://www.eduworldtech.com" title="Online School Planet">

	Education ERP Platform</a></p>

    <br class="clear" />

  </div>

</div>

</body>

</html>

