<?php include '../connection.php';?>
<?php
session_start();
	$StudentClass = $_SESSION['StudentClass'];
	if($StudentClass=="")
	{
		$StudentClass = $_REQUEST["cboClass"];
	}
	
	$StudentRollNo = $_SESSION['StudentRollNo'];
	$ssqlClass="SELECT distinct `class` FROM `class_master`";
	$rsClass= mysql_query($ssqlClass);
$ssql="select `subject`,`class`,`remark`,date_format(`assignmentdate`,'%d-%m-%Y') as `assignmentdate`,date_format(`assignmentcompletiondate`,'%d-%m-%Y') as `assignmentcompletiondate`,`assignmentURL` from  `assignment` where `class`='$StudentClass' order by `datetime` desc";
	if($StudentClass !="")
	$reslt = mysql_query($ssql , $Con);
?>
<script language="javascript">
function Validate()



{



	if(document.getElementById("txtStartDate").value == "Select Date")



	{



		alert("Assignment Start Date is mandatory!");



		return;



	}



	if(document.getElementById("txtFinishDate").value == "Select Date")



	{



		alert("Assignment End Date is mandatory!");



		return;



	}



	



	if(document.getElementById("txtStartDate").value != "Select Date" && document.getElementById("txtFinishDate").value != "Select Date")



	{



			if (Date.parse(document.getElementById("txtStartDate").value) > Date.parse(document.getElementById("txtFinishDate").value))



			{



				alert ("Assignment Start Date can not be after then Finish Date!");



				return;



			}



	}



	



	//document.getElementById("frmAssignment").action = "SubmitUploadAssignment.php";



	document.getElementById("SubmitType").value="SubmitAssignment";



	document.getElementById("frmAssignment").submit();



	



	



}















function removeAllOptions(selectbox)







	{







	







		var i;







		for(i=selectbox.options.length-1;i>=0;i--)







		{







			selectbox.remove(i);







		}







	}







	function removeOption(selectbox,indx)







	{







	







		var i;







		i=indx;







			selectbox.remove(i);







		







	}







	function addOption(selectbox,text,value )







	{







		var optn = document.createElement("OPTION");







		optn.text = text;







		optn.value = value;







		selectbox.options.add(optn);







	}







function ReloadWithSubject()



{



	if (document.getElementById("cboClass").value=="Select One")



	{



		alert ("Please select class!");



		return;



	}



	document.getElementById("txtSelectedClass").value = document.getElementById("cboClass").value;



	document.getElementById("SubmitType").value="ReloadWithSubject";



	document.getElementById("frmAssignment").submit();



}

function fnlSubmit()
{
	if(document.getElementById("cboClass").value=="")
	{
		alert("Please select class!");
		return;
	}
	document.getElementById('frmAssignment').submit();
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
	border-collapse: collapse;
}

.style10 {
	font-family: Cambria;
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

<!-- ####################################################################################################### -->

<table width="100%" style="border-width: 0px"> 

<tr>

<td style="border-style: none; border-width: medium">
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

<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><img src="../../Admin/images/logo.png" height="76" width="300" ></img></h1>
    
    </div>
    
    <div id="topnav">
      <ul>
        <li class="active"><a href="Notices.php">Home</a></li>
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

      <li><a href="Notices.php">Home</a></li>

      <li>»</li>

		<li class="current"><a href="#">Assignment</a></li>

    </ul>

  </div>

</div>





<!-- ######################################Div for News ################################################################# -->




<!--<div class="wrapper col6">
  <div id="breadcrumb">
   
    <font size="3" face="cambria"><b><marquee> Welcome to School Information System ! </b></marquee></font>
    
  </div>
</div>-->



</td>



</tr>



</table>



<table width="100%" border="0">

			<tr>

				<td>

				

	  <div id="column"><?php include 'SideMenu.php'; ?></div>

    </td>

    

    

<!-- #########################################Navigation TD Close ############################################################## -->    



<!-- #########################################Content TD Open ############################################################## -->    





				<td>

			

    

<div>

  <div>

    <div>

     







<?php 
if($StudentClass =="")
{
?>
<table style="width: 100%" class="style9">
<form name="frmAssignment" id="frmAssignment" method="post" action="">
	<tr>
		<td style="width: 220px" class="style10"><strong>Select Your Section 
		Only: </strong></td>
		<td style="width: 853px">
		<select name="cboClass" id="cboClass" onchange="javascript:fnlSubmit();">
		<option selected="" value="">Select One</option>
		<?php
		while($rowC=mysql_fetch_row($rsClass))
		{
			$Class=$rowC[0];
		?>
		<option value="<?php echo $Class;?>"><?php echo $Class;?></option>
		<?php
		}
		?>
		</select>&nbsp;</td>
	</tr>
	</form>
</table>
<?php
}
if(mysql_num_rows($reslt)>0)
{
?>

<table class="auto-style32">



	



	<tr>



		<td class="auto-style35" colspan="6" bgcolor="#A4C400">

	

		<p style="text-align: left"><font color="#FFFFFF">

	

		<span style="font-size: 14pt; font-weight: 700">Assignment Detail</span></font></td>



	</tr>



	



	<tr>



		<td class="auto-style35" style="width: 195px"><strong>Subject</strong></td>



		<td class="auto-style35" style="width: 195px"><strong>Class</strong></td>



		<td class="auto-style35" style="width: 195px"><strong>Remarks</strong></td>



		<td  class="auto-style35" style="width: 196px"><strong>Start Date</strong></td>



		<td  class="auto-style35" style="width: 196px"><strong>Finish Date</strong></td>



		<td class="auto-style35" style="width: 196px"><strong>Download Doc.</strong></td>		



	</tr>



	



	<?php



		while($rowa = mysql_fetch_assoc($reslt))



	   {



	   		$subject=$rowa['subject'];



	   		$class=$rowa['class'];



	   		$remark=$rowa['remark'];



	   		$assignmentdate=$rowa['assignmentdate'];



	   		$assignmentcompletiondate=$rowa['assignmentcompletiondate'];



	   		$assignmentURL=$rowa['assignmentURL'];   		



	?>



	<tr>



		<td class="style8" style="width: 195px"><?php echo $subject; ?></td>



		<td class="style8" style="width: 195px"><?php echo $class; ?></td>



		<td class="style8" style="width: 195px"><?php echo $remark; ?></td>



		<td  class="style8" style="width: 196px" align="center"><?php echo $assignmentdate; ?></td>



		<td  class="style8" style="width: 196px" align="center"><?php echo $assignmentcompletiondate; ?></td>



		<td class="style8" style="width: 196px" align="center">

		<a href="<?php echo $assignmentURL; ?>" target="_blank">Download</a></td>		



	</tr>



	<?php



	}



	?>	



	



	</table>
<?php
}
?>






		</td>



<!--####################################Content TD close ################################################### -->

    

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