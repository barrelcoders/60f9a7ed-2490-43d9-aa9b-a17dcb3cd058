<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
?>
<?php
session_start();
$EmployeeId=$_SESSION['userid'];

if ($_REQUEST["txtEmpName"] != "")
{
	    
          $txtEmpName=$_REQUEST["txtEmpName"];
          $txtFatherName=$_REQUEST["txtFatherName"];
          $txtDOB=$_REQUEST["txtDOB"];
          $txtDesignation=$_REQUEST["txtDesignation"];
          $txtMobile=$_REQUEST["txtMobile"];
          $txtEmail=$_REQUEST["txtEmail"];
          $txtAddress=$_REQUEST["txtAddress"];
          $txtPayScale=$_REQUEST["txtPayScale"];
          $txtUpgradation=$_REQUEST["txtUpgradation"];
          
          $txtClass1=$_REQUEST["txtClass1"];
          $txtStudent1=$_REQUEST["txtStudent1"];
          $txtSubject1=$_REQUEST["txtSubject1"];
          $txtDistinction1=$_REQUEST["txtDistinction1"];
          $txt1Division1=$_REQUEST["txt1Division1"];
          $txt2Division1=$_REQUEST["txt2Division1"];
          $txt3Division1=$_REQUEST["txt3Division1"];
          
          
           $txtClass2=$_REQUEST["txtClass2"];
          $txtStudent2=$_REQUEST["txtStudent2"];
          $txtSubject2=$_REQUEST["txtSubject2"];
          $txtDistinction2=$_REQUEST["txtDistinction2"];
          $txt1Division2=$_REQUEST["txt1Division2"];
          $txt2Division2=$_REQUEST["txt2Division2"];
          $txt3Division2=$_REQUEST["txt3Division2"];
          
           $txtClass3=$_REQUEST["txtClass3"];
          $txtStudent3=$_REQUEST["txtStudent3"];
          $txtSubject3=$_REQUEST["txtSubject3"];
          $txtDistinction3=$_REQUEST["txtDistinction3"];
          $txt1Division3=$_REQUEST["txt1Division3"];
          $txt2Division3=$_REQUEST["txt2Division3"];
          $txt3Division3=$_REQUEST["txt3Division3"];
          
           $txtClass4=$_REQUEST["txtClass4"];
          $txtStudent4=$_REQUEST["txtStudent4"];
          $txtSubject4=$_REQUEST["txtSubject4"];
          $txtDistinction4=$_REQUEST["txtDistinction4"];
          $txt1Division4=$_REQUEST["txt1Division4"];
          $txt2Division4=$_REQUEST["txt2Division4"];
          $txt3Division4=$_REQUEST["txt3Division4"];
          
           $txtPublication=$_REQUEST["txtPublication"];
          $txtSeminar=$_REQUEST["txtSeminar"];
          $txtComputerKnowledge=$_REQUEST["txtComputerKnowledge"];
          $txtInovativeExperience=$_REQUEST["txtInovativeExperience"];
          $txtCompetiition=$_REQUEST["txtCompetiition"];
          $txtSport=$_REQUEST["txtSport"];
          $txtCulturaActivity=$_REQUEST["txtCulturaActivity"];
          $txtLiteraryActivity=$_REQUEST["txtLiteraryActivity"];
          $txtAdventure=$_REQUEST["txtAdventure"];
          
          $txtSpecialResponsibility=$_REQUEST["txtSpecialResponsibility"];
          $txtExhibition=$_REQUEST["txtExhibition"];
          $txtAssociation=$_REQUEST["txtAssociation"];
          $txtInovativeExperience=$_REQUEST["txtInovativeExperience"];
          $txtAward=$_REQUEST["txtAward"];
          $txtAccount=$_REQUEST["txtAccount"];
          $txtEstate=$_REQUEST["txtEstate"];
          $txtHostel=$_REQUEST["txtHostel"];
          $txtTransport=$_REQUEST["txtTransport"];
          $txtAnyOther=$_REQUEST["txtAnyOther"];
          $txtBookRead=$_REQUEST["txtBookRead"];
          $txtLibrarySuggestion=$_REQUEST["txtLibrarySuggestion"];

        
        
$ssql="INSERT INTO `Employee_ACR_SelfAppraisal`(`EmpId`, `EmpName`, `EmpFatherName`, `DOB`, `Designation`, `smobile`, `semail`, `Address`, `PayScale`, `Upgradation`, `Class1`, `Student1`, `Subject1`, `Distinction1`, `1Division1`, `2Division1`, `3Division1`, `Class2`, `Student2`, `Subject2`, `Distinction2`, `1Division2`, `2Division2`, `3Division2`, `Class3`, `Student3`, `Subject3`, `Distinction3`, `1Division3`, `2Division3`, `3Division3`, `Class4`, `Student4`, `Subject4`, `Distinction4`, `1Division4`, `2Division4`, `3Division4`, `Publication`, `Seminar`, `ComputerKnowledge`, `Innovative`, `Competition`, `Sport`, `CulturalActivity`, `LiteraryActivity`, `Adventure`, `SpecialResponsibility`, `Exhibition`, `Association`, `Award`, `Account`, `Estate`, `Hostel`, `Transport`, `AnyOther`, `BookRead`,`LibrarySuggestion`) VALUES ";
$ssql=$ssql."('$EmployeeId','$txtEmpName','$txtFatherName','$txtDOB','$txtDesignation','$txtMobile','$txtEmail','$txtAddress','$txtPayScale','$txtUpgradation','$txtClass1','$txtStudent1','$txtSubject1','$txtDistinction1','$txt1Division1','$txt2Division1','$txt3Division1','$txtClass2','$txtStudent2','$txtSubject2','$txtDistinction2','$txt1Division2','$txt2Division2','$txt3Division2','$txtClass3','$txtStudent3','$txtSubject3','$txtDistinction3','$txt1Division3','$txt2Division3','$txt3Division3','$txtClass4','$txtStudent4','$txtSubject4','$txtDistinction4','$txt1Division4','$txt2Division4','$txt3Division4','$txtPublication','$txtSeminar','$txtComputerKnowledge','$txtInovativeExperience','$txtCompetiition','$txtSport','$txtCulturaActivity','$txtLiteraryActivity','$txtAdventure','$txtSpecialResponsibility','$txtExhibition','$txtAssociation','$txtAward','$txtAccount','$txtEstate','$txtHostel','$txtTransport','$txtAnyOther','$txtBookRead','$txtLibrarySuggestion')";


//echo $ssql;
//exit();
	///**************
	
	//echo "Submitted Successfully!";
			//exit();
			
			mysql_query($ssql) or die(mysql_error());
					
			
			$Message1="<br><br><center><b>Employee HOD Assesment of : ".$EmployeeId." Name ".$txtEmpName." successfully Submitted!<br><a href='http://dpsfsis.com/Admin/HRM/EmployeeACRHodAssesment.php'>Click here</a>";

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
