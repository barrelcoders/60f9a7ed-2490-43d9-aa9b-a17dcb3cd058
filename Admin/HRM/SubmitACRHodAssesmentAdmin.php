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
          $txtIntelligence=$_REQUEST["txtIntelligence"];
          $txtInitiative=$_REQUEST["txtInitiative"];
          $txtDevotion=$_REQUEST["txtDevotion"];
          $txtSkillEmployed=$_REQUEST["txtSkillEmployed"];
          $txtDutyRecord=$_REQUEST["txtDutyRecord"];
          $txtDiscipline=$_REQUEST["txtDiscipline"];
          $txtRelation=$_REQUEST["txtRelation"];
          $txtPunctuality=$_REQUEST["txtPunctuality"];
          $txtOutstandingWork=$_REQUEST["txtOutstandingWork"];
          $txtSpecialWork=$_REQUEST["txtSpecialWork"];
          $txtQualities=$_REQUEST["txtQualities"];
          $txtConduct=$_REQUEST["txtConduct"];
          $txtRemarks=$_REQUEST["txtRemarks"];

			
						
$ssql="INSERT INTO `Employee_ACR_HODAssesment`(`EmpId`, `EmpName`, `Department`, `Designation`, `Intelligence`, `Initiative`, `Devotion`, `SkillEmployed`, `DutyRecord`, `Discipline`, `Relation`, `Punctuality`, `OutStandingWork`, `SpecialWork`, `Qualities`, `Conduct`, `Remarks`) VALUES ";
$ssql=$ssql."('$txtEmpNo','$txtEmpName','$txtEmpType','$txtDesig','$txtIntelligence','$txtInitiative','$txtDevotion','$txtSkillEmployed','$txtDutyRecord','$txtDiscipline','$txtRelation','$txtPunctuality','$txtOutstandingWork','$txtSpecialWork','$txtQualities','$txtConduct','$txtRemarks')";

//echo $ssql;
//exit();
	///**************
	
	//echo "Submitted Successfully!";
			//exit();
			
			mysql_query($ssql) or die(mysql_error());
					
			
			$Message1="<br><br><center><b>Employee HOD Assesment of : ".$txtEmpNo." Name ".$txtEmpName." successfully Submitted!<br><a href='http://dpsfsis.com/Admin/HRM/EmployeeACRHodAssesment.php'>Click here</a>";

			echo $Message1;
			exit();

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
	           </body>

</html>
