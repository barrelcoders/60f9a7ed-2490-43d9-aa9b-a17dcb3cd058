<?php include '../../connection.php';?>

<?php
// just insert html code into table
$varhtml = str_replace("'","''",$_REQUEST["htmlcode"]);

//echo $varhtml . $varprintdiv;
$sadmission= $_REQUEST["sadmission"];
$currentdate=date("Y-m-d");

$ssql="select `financialyear` from `FYmaster` where `Status`='Active'";
$rs= mysql_query($ssql);
	while($row2 = mysql_fetch_row($rs))
	{
		$CurrentFY=$row2[0];
		break;
	}
	
$ssql="select `sadmission`,`sname`,`sfathername`,`Address`,`DateOfAdmission`,`DOB`,`sclass` from `Almuni` where `sadmission`='$sadmission'";
$rs= mysql_query($ssql);
	while($row1 = mysql_fetch_row($rs))
		{
			$sadmission=$row1[0];
			$sname=$row1[1];
			$sclass=$row1[2];
			$srollno=$row1[3];
			break;
		}

		$ssql="insert into `student_certificate` (`sadmission`,`sname`,`sclass`,`srollno`,`certificate_type`,`generation_date`,`financial_year`,`html_code`) values ('$sadmission','$sname','$sclass','$srollno','Character','$currentdate','$CurrentFY','$varhtml')";
		//echo $ssql;
		//exit();
		mysql_query($ssql) or die(mysql_error());
		//echo $varhtml;
		//exit();
?>

<script language="javascript">
	function printDiv() 
	{

        //Get the HTML of div

        var divElements = document.getElementById("MasterDiv").innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;



        //Reset the page's HTML with div's HTML only

        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";



        //Print Page

        window.print();



        //Restore orignal HTML

        document.body.innerHTML = oldPage;

 	}
</script>

<html>
<head>

<!--<body onload="Javascript:fnRedirect();">-->
<body>
<input type="hidden" name="FileName" id="FileName" value="<?php echo $filename; ?>">
<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" >
<?php
//echo $varhtml . "<br><hr>" . $varhtml;
echo $varhtml;
?>
</div>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 	
	|&nbsp; <a href="../LandingPage.php">HOME</font></a><br><br></div>
</body>
</head>
</html>