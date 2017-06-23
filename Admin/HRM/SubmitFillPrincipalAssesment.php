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
          $PrincipalRemark=$_REQUEST["txtPrincipalRemark"];
          $txtPrincipalRemark2=$_REQUEST["txtPrincipalRemark2"];
          $txtComment=$_REQUEST["txtComment"];
	
		
     		//echo "Update `Employee_ACR_HODAssesment` set `PrincipalRemark`='$PrincipalRemark' where `EmpId`='$txtEmpNo'";
			mysql_query("Update `Employee_ACR_HODAssesment` set `PrincipalRemark`='$PrincipalRemark',`PrincipalRemark1`='$txtPrincipalRemark2',`PrincipalComment`='$txtComment' where `EmpId`='$txtEmpNo'");
		
		
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
