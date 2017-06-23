<?php include '../connection.php';?>

<?php include '../AppConf.php';?>



<?php

session_start();



$StudentName = $_SESSION['StudentName'];



$class=$_SESSION['StudentClass'];

//$ssql="SELECT b.`sclass` , b.`subject` , b.`classwork`, b.`classworkdate` FROM `classwork_master` b where b.classworkdate=curdate() and b.`sclass`='$class'";
$ssql="SELECT b.`sclass` , b.`subject` , b.`classwork`, b.`classworkdate`,(select `homework` from `homework_master` where `subject`=b.`subject` and homeworkdate=curdate() and `sclass`='$class') as `homework` FROM `classwork_master` b where b.classworkdate=curdate() and b.`sclass`='$class'";


//echo $ssql;

//exit();



$rs= mysql_query($ssql);



$num_rows=0;

?>

<?php include '../connection.php';?>

<?php include '../AppConf.php';?>



<?php

session_start();



$StudentName = $_SESSION['StudentName'];

$Class= $_SESSION['StudentClass'];



$Subject=$_REQUEST["cboSearchSubject"];

$Dt1=$_REQUEST["txtFromDate"];

$arr=explode('/',$Dt1);

$Dt1= $arr[2] . "-" . $arr[0] . "-" . $arr[1];



$Dt2=$_REQUEST["txtToDate"];

$arr=explode('/',$Dt2);

$Dt2= $arr[2] . "-" . $arr[0] . "-" . $arr[1];



if ($Subject!="")

{

	if ($Subject=="All")

	{

		//$ssql="SELECT b.`sclass` , b.`subject` , b.`classwork`, b.`classworkdate` FROM `classwork_master` b where `sclass`='$Class' and 1=1";
		$ssql="SELECT distinct b.`sclass` , b.`subject` , b.`classwork`, b.`classworkdate`,(select `homework` from `homework_master` where `sclass`='$Class' and `homeworkdate`=b.`classworkdate` and `subject`=b.`subject`) as `homework` FROM `classwork_master` b where b.`sclass`='$Class'";

	}

	else

	{

		//$ssql="SELECT b.`sclass` , b.`subject` , b.`classwork`, b.`classworkdate` FROM `classwork_master` b where b.`subject`='$Subject' and `sclass`='$Class'";
		$ssql="SELECT b.`sclass` , b.`subject` , b.`classwork`, b.`classworkdate`,(select `homework` from `homework_master` where `subject`=b.`subject` and homeworkdate=b.`classworkdate` and `sclass`='$Class') as `homework` FROM `classwork_master` b where b.`sclass`='$Class' and b.`subject`='$Subject'";

	}

	if ($Dt1 !="From Date" && $Dt2 !="To Date")
	{
	
		$ssql=$ssql . " and b.classworkdate between '$Dt1' and '$Dt2'";		
		//$ssql="SELECT b.`sclass` , b.`subject` , b.`classwork`, b.`classworkdate`,(select `homework` from `homework_master` where `subject`=b.`subject` and homeworkdate=curdate() and `sclass`='$Class') as `homework` FROM `classwork_master` b where b.classworkdate=curdate() and b.`sclass`='$Class'";
	
	}
}
else

{

	if ($Dt1 !="From Date" && $Dt2 !="To Date")
	{
	
		//$ssql=$ssql . " and `classworkdate` between '$Dt1' and '$Dt2'";
	
		//$ssql=$ssql . " and `classworkdate` between '$Dt1' and '$Dt2'";		
	
		$ssql="SELECT b.`sclass` , b.`subject` , b.`classwork`, b.`classworkdate` FROM `classwork_master` b where `classworkdate` between '$Dt1' and '$Dt2' and `sclass`='$Class'";
		$ssql="SELECT b.`sclass` , b.`subject` , b.`classwork`, b.`classworkdate`,(select `homework` from `homework_master` where `subject`=b.`subject` and homeworkdate=b.`classworkdate` and `sclass`='$Class') as `homework` FROM `classwork_master` b where b.`classworkdate` between '$Dt1' and '$Dt2' and b.`sclass`='$Class'";
	
	
	}
}

//echo $ssql;
//exit();

$rs= mysql_query($ssql);



$num_rows=0;

?>



<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Daily Classwork and Homework</title>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />



<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>

<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>

<style>

<!--

.auto-style2 {

	color: #000000;

	font-weight: bold;

}



.auto-style1 {

	color: #000000;

}

-->

</style>

</head>

<body>

<!--

<div class="wrapper col0">

  <div id="topbar">

    <div id="slidepanel">

      <div class="topbox">

        <h2>Nullamlacus dui ipsum</h2>

        <p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna. Urnaultrices quis curabitur phasellentesque congue magnis vestibulum quismodo nulla et feugiat. Adipisciniapellentum leo ut consequam ris felit elit id nibh sociis malesuada.</p>

        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>

      </div>

      <div class="topbox">

        <h2>Teachers Login Here</h2>

        <form action="#" method="post">

          <fieldset>

            <legend>Teachers Login Form</legend>

            <label for="teachername">Username:

              <input type="text" name="teachername" id="teachername" value="" />

            </label>

            <label for="teacherpass">Password:

              <input type="password" name="teacherpass" id="teacherpass" value="" />

            </label>

            <label for="teacherremember">

              <input class="checkbox" type="checkbox" name="teacherremember" id="teacherremember" checked="checked" />

              Remember me</label>

            <p>

              <input type="submit" name="teacherlogin" id="teacherlogin" value="Login" />

              &nbsp;

              <input type="reset" name="teacherreset" id="teacherreset" value="Reset" />

            </p>

          </fieldset>

        </form>

      </div>

      <div class="topbox last">

        <h2>Pupils Login Here</h2>

        <form action="#" method="post">

          <fieldset>

            <legend>Pupils Login Form</legend>

            <label for="pupilname">Username:

              <input type="text" name="pupilname" id="pupilname" value="" />

            </label>

            <label for="pupilpass">Password:

              <input type="password" name="pupilpass" id="pupilpass" value="" />

            </label>

            <label for="pupilremember">

              <input class="checkbox" type="checkbox" name="pupilremember" id="pupilremember" checked="checked" />

              Remember me</label>

            <p>

              <input type="submit" name="pupillogin" id="pupillogin" value="Login" />

              &nbsp;

              <input type="reset" name="pupilreset" id="pupilreset" value="Reset" />

            </p>

          </fieldset>

        </form>

      </div>

      <br class="clear" />

    </div>

    <div id="loginpanel">

      <ul>

        <li class="left">Log In Here &raquo;</li>

        <li class="right" id="toggle"><a id="slideit" href="#slidepanel">Administration</a><a id="closeit" style="display:none;" href="#slidepanel">Close Panel</a></li>

      </ul>

    </div>

    <br class="clear" />

  </div>

</div>

-->
<div class="wrapper col0">
  <div id="topbar">
    <div id="loginpanel">
      <ul>
        <li class="left">Welcome <?php echo $_SESSION['StudentName'];?></li>
        <li class="right" id="toggle"><a id="slideit" href="#slidepanel"></a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>


<!-- ####################################################################################################### -->

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

        <li><a href="#">Meet Our Teachers</a></li>

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

      <li>Classwork and Homework</li>

    </ul>

  </div>

</div>

<!-- ####################################################################################################### -->

<!-- Div  for News ####################################################################################################### -->

<div class="wrapper col6">

  <div id="breadcrumb">

   

    <font size="3" face="cambria"><b><marquee> Here comes the News </b></marquee></font>

    

  </div>

</div>

<!-- ####################################################################################################### -->









 <div id="column">

      <div class="subnav">

        <h2><span lang="en-us">Navigation Section</span></h2>

        <ul>

          <h4><li><a href="Classwork.php">Classwork and Homework</a></li>

          <li><a href="Attendance.php">Attendance</a></li>

             <li><a href="Holiday.php">Holidays</a>

          </li>

          <li><a href="Notices.php">Notices</a></li>

           <li><a href="ReportCard.php">Report Card</a></li>

            <li><a href="DateSheet.php">Datesheet</a></li>

           <li><a href="Timetable.php">Timetable</a></li>

			  <li><a href="SessionPlan.php">Session Plan</a></li>



             <li><a href="Assignment.php">Assignment</a></li>

              <li><a href="Directory.php">School Directory</a></li>

               <li><a href="Transport.php">Transport Details</a></li>

                <li><a href="SendQuery.php">Send A Query</a></li>

                <li><a href="">Photo Gallery</a></li>

            </h3>

          </li>

        </ul>

      </div>

    </div>

    

    

    

<div class="wrapper col3">

  <div id="container">

    <div id="content" style="width: 750px;">

      <h1>Daily Classwork &amp; Homework Details</h1>&nbsp;<div id="respond">







<table border="1" width="100%" cellspacing="1" style="border-collapse: collapse" height="80" bordercolor="#000000" id="table1">



	<tr>



		<td bgcolor="#0093A8">



		<p style="margin-left: 10px">



		<span style="font-family:Cambria;font-size:18px;font-weight:bold;font-style:normal;text-decoration:none;color:#FFFFFF;">



		Classwork</span></td>



	</tr>



	<tr>



		<td>



		<table border="1" width="736" id="table2" style="border-width:0px; border-collapse: collapse; " bordercolor="#000000">



			<tr>



				<td width="245" height="35" align="center" bgcolor="#FFFFFF">



			

				<a href="ClassWork.php">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; ">



				Today</span></a></font></td>



				<td width="245" height="35" align="center" bgcolor="#FFFFFF">



			

				<a href="YesterdayClassWork.php">

				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; ">



				Yesterday</span></a></font></td>



				<td width="246" height="35" align="center" bgcolor="#FFFFFF">



		



				

				<a href="SearchClassWork.php">

								<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; ">

<strong>Search Previous</strong></span></a></font></td>



			</tr>



		</table>



		<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000" id="table3">



			<tr>



				<td height="35" width="129" bgcolor="#FFFFFF" align="center">



				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; ">



				Subject</span></td>



				<td height="35" width="129" bgcolor="#FFFFFF" align="center">



				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; ">



				Date</span></td>



				<!--<td height="35" width="129" bgcolor="#FFFFFF" align="center">



				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; color: #FFFFFF">



				Teacher Name</span></td>-->



				<td height="35" bgcolor="#FFFFFF" align="center" width="498">



				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; ">



				Classwork</span></td>



				<td height="35" bgcolor="#FFFFFF" align="center" width="498">



				<span style="font-family: Cambria; font-size: 15px; font-weight: bold; font-style: normal; text-decoration: none; ">



				Homework</span></td>



			</tr>



			<?php



				while($row = mysql_fetch_row($rs))



				{



					$sclass=$row[0];



					$subject=$row[1];



					$classwork=$row[2];



					$classworkdate=$row[3];
					$homework=$row[4];



					$num_rows=$num_rows+1;



			?>



			<tr>



				<td height="35" width="129" align="center">



				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">



				<?php echo $subject; ?></span></td>



				<td height="35" width="129" align="center">



				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">



				<?php echo $classworkdate; ?></span></td>

<!--

				<td height="35" width="129" align="center">



				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">



				Asha Mathur</span></td>-->



				<td height="35" width="498" align="center">



				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">



				<?php echo $classwork; ?></span></td>



				<td height="35" width="498" align="center">


				<?php echo $homework;?>
				</td>



			</tr>



			<?php



			}



			?>



			<tr>



				<td height="35" width="129" align="center">&nbsp;</td>



				<td height="35" width="129" align="center">&nbsp;</td>



				<td height="35" width="129" align="center">&nbsp;</td>



				

				<td height="35" width="129" align="center">&nbsp;</td>



				

			</tr>



		</table>



		</td>



	</tr>



</table>







		</div>

    </div>

	<div class="clear"></div>

  </div>

</div>

<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->

<div class="wrapper col5">

  <div id="copyright" style="width: 1197px; height: 58px">

    

    <p align="center">Powered By Online School Planet |   <a target="_blank" href="http://www.eduworldtech.com" title="Online School Planet">

	Education ERP Platform</a></p>

    <br class="clear" />

  </div>

</div>

</body>

</html>