<?php
include '../../connection.php'; 
?>
<?php
$ChequeNo=$_REQUEST["ChequeNo"];
$BankName=$_REQUEST["BankName"];
$sadmission=$_REQUEST["sadmission"];
$ChequeStatus=$_REQUEST["ChequeStatus"];
$UpdateFor=$_REQUEST["UpdateFor"];

if($UpdateFor =="Hostel")
{
	$ssql="UPDATE `fees_hostel` SET `cheque_status`='$ChequeStatus' WHERE `sadmission`='$sadmission' and `chequeno`='$ChequeNo' and `bankname`='$BankName'";
	//echo $ssql."<br>";
	mysql_query($ssql) or die(mysql_error());
	
	mysql_query("delete from `fees_student_hostel` where `sadmission`='$sadmission' and `feeshead` in (select distinct `InstallmentName` from `fees_hostel` where `sadmission`='$sadmission' and `chequeno`='$ChequeNo' and `bankname`='$BankName')") or die(mysql_error());
}
elseif($UpdateFor =="Misc")
{
     $ssql="UPDATE `fees_misc_collection` SET `ChequeStatus`='$ChequeStatus' WHERE `sadmissionno`='$sadmission' and `ChequeNo`='$ChequeNo' and `BankName`='$BankName'";
	//echo $ssql."<br>";
	mysql_query($ssql) or die(mysql_error());
	}
else
{
	
	$ssql="UPDATE `fees` SET `cheque_status`='$ChequeStatus' WHERE `sadmission`='$sadmission' and `chequeno`='$ChequeNo' and `bankname`='$BankName'";
	//echo $ssql."<br>";
	mysql_query($ssql) or die(mysql_error());
	
	//echo "delete from `fees_student1` where `sadmission`='$sadmission' and `feeshead` in (select distinct `InstallmentName` from `fees` where `sadmission`='$sadmission' and `chequeno`='$ChequeNo' and `bankname`='$BankName')";
	mysql_query("delete from `fees_student1` where `sadmission`='$sadmission' and `feeshead` in (select distinct `InstallmentName` from `fees` where `sadmission`='$sadmission' and `chequeno`='$ChequeNo' and `bankname`='$BankName')") or die(mysql_error());

	
}

	echo "Cheque status updated successfully!<br>Click <a href='Javascript:window.close();'>here</a> to close the window";
?>