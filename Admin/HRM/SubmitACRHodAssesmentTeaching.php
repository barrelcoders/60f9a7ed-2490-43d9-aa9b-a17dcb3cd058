<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
?>
<?php
session_start();
$EmployeeId=$_SESSION['userid'];

if ($_REQUEST["txtEmpNo"] != "")
{
	      $txtEmpNo=$_REQUEST["txtEmpNo"];
          $txtEmpName=$_REQUEST["txtEmpName"];
          $txtEmpType=$_REQUEST["txtEmpType"];
          $txtDesig=$_REQUEST["txtDesig"];
          
	
		$TotalQuestion=$_REQUEST["hTotalRecno"];
		//echo $TotalQuestion;
		//exit();
		for($i=1;$i<$TotalQuestion;$i++)
		{
			$Rating=$_REQUEST["txtRating".$i];
			$Answer=$_REQUEST["txtAnswer".$i];
			$Question=$_REQUEST["hQuestion".$i];
		
			  //echo"INSERT INTO `Employee_ACR_HODAssesment`(`EmpId`, `EmpName`, `Department`, `Designation`, `Question`, `Answer`,`Rating`) VALUES ('$txtEmpNo','$txtEmpName','$txtEmpType','$txtDesig','$Question','$Answer','$Rating')"."<br>";;
			mysql_query("INSERT INTO `Employee_ACR_HODAssesment`(`EmpId`, `EmpName`, `Department`, `Designation`, `Question`, `Answer`,`Rating`) VALUES ('$txtEmpNo','$txtEmpName','$txtEmpType','$txtDesig','$Question','$Answer','$Rating')");
		
		}
		echo "<br><br><center><b>Submitted Successfully!";
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
	           </body>

</html>
