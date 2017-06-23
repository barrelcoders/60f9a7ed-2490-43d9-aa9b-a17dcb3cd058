<!---top---->
<?php
	session_start();
	include 'connection.php';
	include 'AppConf.php';
?>
<?php
session_start();
$class=$_SESSION['StudentClass'];
$ssqlClass="SELECT distinct `MasterClass` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster`";
$rsFY= mysql_query($ssqlFY);
$rsEducation=mysql_query("select distinct `Qualification` from `NewStudentRegistrationQualificationMaster` order by `Qualification`");
$rsEducation1=mysql_query("select distinct `Qualification` from `NewStudentRegistrationQualificationMaster` order by `Qualification`");

$rsSchooListFather=mysql_query("select distinct `SchoolName` from `NewStudentRegistrationSchoolList` order by `SchoolName`");
$rsSchooListMother=mysql_query("select distinct `SchoolName` from `NewStudentRegistrationSchoolList` order by `SchoolName`");

$rsLocation=mysql_query("select distinct `Sector` from `NewStudentRegistrationDistanceMaster` order by `Sector`");

$currentdate=date("d-m-Y");

	$ssqlRoute="SELECT distinct `routeno` FROM `RouteMaster`";

	$rsRoute= mysql_query($ssqlRoute);
	
	/*
	$ssqlRegi="SELECT max(CAST(`RegistrationNo` AS SIGNED INTEGER)) FROM `NewStudentRegistration`";	
	$rsRegiNo= mysql_query($ssqlRegi);

	if (mysql_num_rows($rsRegiNo) > 0)
	{
		while($row2 = mysql_fetch_row($rsRegiNo))
		{

					$NewRistrationNo=$row2[0]+1;

		}
	}
	else
	{
		$ssqlRegi="SELECT max(CAST(`sadmission` AS SIGNED INTEGER))+1 FROM `student_master`";	
		$rsRegiNo= mysql_query($ssqlRegi);
		if (mysql_num_rows($rsRegiNo) > 0)
		{
			while($row2 = mysql_fetch_row($rsRegiNo))
			{	
						$NewRistrationNo=$row2[0];	
			}
		}
	}
	*/

$ssqlDiscount="SELECT distinct `head` FROM `discounttable` where `discounttype`='tuitionfees'";
$rsDiscount= mysql_query($ssqlDiscount);

$sstr="SELECT distinct `head` FROM `discounttable` where `discounttype`='admissionfees'";
$rsAdmissionFeeDiscount= mysql_query($sstr);

$sstr="SELECT distinct `head` FROM `discounttable` where `discounttype`='annualcharges'";
$rsAnnualFeeDiscount= mysql_query($sstr);

$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);

?>
<!---->
<!---select location--->
<?php
		while($rowL=mysql_fetch_row($rsLocation))
		{
			$Sector=$rowL[0];
		?>
		<option value="<?php echo $Sector;?>"><?php echo $Sector;?></option>
		<?php
		}
		?>
<!-------->
<!--father qualification--->
<?php
			while($rowEdu = mysql_fetch_row($rsEducation))
			{
				$Qualification=$rowEdu[0];
		?>
		<option value="<?php echo $Qualification;?>"><?php echo $Qualification;?></option>
		<?php
			}
		?>
<!------->
<!----mother Qualification---->
<?php
			while($rowEdu1 = mysql_fetch_row($rsEducation1))
			{
				$Qualification1=$rowEdu1[0];
		?>
		<option value="<?php echo $Qualification1;?>"><?php echo $Qualification1;?></option>
		<?php
			}
		?>
<!---------->
<!---father alumini/name of dps branch---->
<?php
			while($rowSchoolList = mysql_fetch_row($rsSchooListFather))
			{
				$SchoolList=$rowSchoolList [0];
		?>
		<option value="<?php echo $SchoolList;?>"><?php echo $SchoolList;?></option>
		<?php
			}
		?>
<!------->                        		
<!---mother alumini/name of dps branch---->
<?php
			while($rowSchoolList = mysql_fetch_row($rsSchooListMother))
			{
				$SchoolList=$rowSchoolList[0];
		?>
		<option value="<?php echo $SchoolList;?>"><?php echo $SchoolList;?></option>
		<?php
			}
		?>
<!----------->	
<!---gardian alumini/name of dps branch---->	