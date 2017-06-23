

<script language="javascript">



	function fnlAck(SrNo)

	{

		//alert(SrNo);

		var myWindow = window.open("Ack.php?SrNo="+SrNo,"MsgWindow","width=300,height=200");

		return;

	}

	function ShowPreviewNotice(SrNo)

	{

  		//var myWindow = window.open("ShowNotice.php?srno=" + SrNo ,"","width=600,height=700");

  		var myWindow = window.open("ShowNotice.php?srno=" + SrNo ,"","fullscreen=yes,location=no");

	}

</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: School Education
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Daily Classwork and Homework</title>

<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />

<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<style>
 .notice-table{padding:0; margin:0;} .notice-table table{width:49%; margin-left:1%; float:left;}
 .notice-table table tr:first-child{background:#0b462d; color:fff; } .notice-table table tr:first-child td{font-size:15px; padding:1%;}
 .notice-table table .col td{padding:0.5% 1%; font-size:14px; text-align:center;}
 .notice-table table td{font-size:12px; padding:0.5% 1%;}
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
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="Notices.php">Events and Notices</a></li>
        <li><a href="News.php">News</a></li>
		<li><a href="logoff.php">Logout</a></li>
        <li class="last"></li>
      </ul>
    </div>
    <br class="clear" />
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
   
    <font size="3" face="cambria"><marquee><b> Welcome to School Information System ! </b></marquee></font>
    
  </div>
</div>

</td>

</tr>

</table>

<table width="100%" border="0">
			<tr>
				<td>
				
	  <div id="column">

      <?php include 'SideMenu.php';  ?>


    </div>

    </td>
  <td>
 
<!-- #########################################Navigation TD Close ############################################################## -->    

<!-- #########################################Content TD Open ############################################################## -->    
<div class="Notice-table">
 <table border="1" width="50%" cellspacing="1" id="table1">
  <tr> <td colspan="3"><strong>Important Notice For Students</strong></td></tr>
  <tr class="col">
   <td><strong>Date</strong></td>
   <td><strong>Notice Title</strong></td>
   <td><strong>View</strong></td>
  </tr> 
  <tr>
   <td><strong>Date</strong></td>
   <td><strong>Notice Title</strong></td>
   <td><strong>View</strong></td>
  </tr>
 </table>
 
 <table border="1" width="50%" cellspacing="1" id="table1">
  <tr> <td colspan="3"><strong>Late comming information</strong></td></tr>
  <tr class="col">
   <td><strong>Date</strong></td>
   <td><strong>Reason</strong></td>
   <td><strong>Time</strong></td>
  </tr> 
  <tr>
   <td><strong>Date</strong></td>
   <td><strong>Reason</strong></td>
   <td><strong>Time</strong></td>
  </tr>
 </table>

</div>


	

<!--####################################Content TD close ################################################### -->
    
</tr>

</table>

<div class="wrapper col5">
  <div id="copyright" style="width: 100%; height: 58px">
    
    <p align="center">Powered By Online School Planet |   <a target="_blank" href="http://www.onlineschoolplanet.com" title="Online School Planet">
	Education ERP Platform</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>