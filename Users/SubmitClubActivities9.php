<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
?>
<?php
session_start();
$class=$_SESSION['StudentClass'];
$sadmission=$_SESSION['userid'];

if ($_REQUEST["txtName"] != "")
{
	      $Name=$_REQUEST["txtName"];
        $CLass=$_REQUEST["txtClass"];
            $txtPreference1=$_REQUEST["txtPreference1"];
			$txtPreference2=$_REQUEST["txtPreference2"];
			$txtPreference3=$_REQUEST["txtPreference3"];
			
			$txtPreference4=$_REQUEST["txtPreference4"];
			
						
$ssql="INSERT INTO `Student_Club_Activities9`(`sadmission`, `sname`, `sclass`, `Scientific`, `Organizational`, `Literary`, `Information`) VALUES ";
$ssql=$ssql."('$sadmission','$Name','$CLass','$txtPreference1','$txtPreference2','$txtPreference3','$txtPreference4')";

//echo $ssql;
//exit();
	///**************
	
	//echo "Submitted Successfully!";
			//exit();
			
			mysql_query($ssql) or die(mysql_error());
					
			
			$Message1="<br><br><center><b>Student Choices of : ".$sadmission." successfully Submitted!<br><a href='http://dpsfsis.com/'>here</a>";

			//echo $Message1;
			//exit();

}
else
{
	exit();
}

?>

<script language="javascript">
	function fnlsubmitform()
	{
		if(document.getElementById("SubmitStatus").value=="successfull")
		{
			document.getElementById("frmPayment").submit();
		}
	}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title><?php echo $SchoolName ?> </title>

<style type="text/css">
.style1 {
	text-align: center;
	font-family: Cambria;
}
</style>

</head>

<!--<body onload="Javascript:fnlsubmitform();">-->
<body>
			 
	        <div class="style1"><font size="3"><strong>
	             <br>
	             <br>
	             <br>
	             <br>
	             Student Choices has been Successfully Submitted !
	             
	             Click <b><a href="Notices.php">here</a></b> to go back </strong></font></div>
			
</body>

</html>
