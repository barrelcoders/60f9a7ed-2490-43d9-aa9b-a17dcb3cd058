<?php
include '../../connection.php';
include '../Header/Header3.php';
session_start();
?>
<?php
 if($_REQUEST["isSubmit"]=="yes")
 {
 $ssql="select `financialyear` from `FYmaster` where `Status`='Active'";
	$rsF= mysql_query($ssql);
	while($row2 = mysql_fetch_row($rsF))
	{
		$CurrentFY=$row2[0];
		break;
	}
	
 	$currentdate=date("Y-m-d");
 	$extension = end(explode(".", $_FILES["file"]["name"]));
 	 if($extension !="csv")
 	 {
 	 	$Msg="Only .csv file can be uploaded!"; 	 	
 	 }
 	 else
 	 {
     	move_uploaded_file($_FILES["file"]["tmp_name"],"Files/".$_FILES["file"]["name"]);
     }

	$file = fopen("Files/".$_FILES["file"]["name"],"r");
	$cnt=0;
	while(! feof($file))
	  {
	  //print_r(fgetcsv($file));
	  $arr=fgetcsv($file);
	  	/*
	  	foreach ($arr as $value)
	  	{
	  		echo $value."<br>";
	  	}
	  	*/
	  	$sadmission=$arr[1];
	  	$Name=$arr[2];
	  	$Class=$arr[3];
	  	$Quarter=$arr[4];
	  	$FinancialYear=$arr[5];
	  	$OrderAmount=$arr[6];
	  	
		
			$ssql="INSERT INTO `fees_online_payment` (`sadmission`,`sname`,`sclass`,`Quarter`,`FinancialYear`,`OrderAmount`) values ('$sadmission','$Name','$Class','$Quarter','$FinancialYear','$OrderAmount')";
			mysql_query($ssql) or die(mysql_error());
		
	  	
	  	//echo "-----------------";
	  	$cnt=$cnt+1;
	  }
	fclose($file);
	$Message="Total Records uploaded:".$cnt;
     //move_uploaded_file($_FILES["file"]["tmp_name"],"/"$_FILES["file"]["name"]);

 }
   
?>  
<script language="javascript">
function Validate()
{
	if (document.getElementById("file").value=="")
	{
		alert("Please select file!");
		return;
	}
	document.getElementById("frmChallan").submit();
}

</script> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Student Attendance Details</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="Project/jainsis.com/Admin/Academics/tcal.css" />
	<script type="text/javascript" src="Project/jainsis.com/Admin/Academics/tcal.js"></script>
<style type="text/css">
.footer {

    height:20px; 
    width: 100%; 
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    position: fixed;
    bottom: 2pt;
    left: 0pt;
}   
.footer_contents 
{
        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}
.style1 {
	border-color: #808080;
	border-width: 0px;
	border-collapse: collapse;
	font-family: Cambria;
	}
.style3 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
}
.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria;
}
.style6 {
	border-collapse: collapse;
	font-family: Cambria;
}
.auto-style21 {
	text-align: left;
}
.auto-style6 {
	color: #DAB9C1;
}
.auto-style22 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria;
}
.auto-style23 {
	color: #000000;
}
.auto-style24 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria;
	text-decoration: underline;
}
.auto-style3 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 15px;
	color: #000000;
}
.auto-style25 {
	text-align: right;
	font-family: Cambria;
	color: #000000;
}
.auto-style26 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
	color: #000000;
}
.style7 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
}
.style8 {
	text-align: center;
}

</style>

</head>



<body>



<p>&nbsp;</p>



<table style="border-width:1px; width: 100%" class="style1" cellspacing="0" cellpadding="0">

	<tr>

		<td class="style4" colspan="2" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">



				<div class="auto-style21">



					<u>



					<strong>Upload Cheque Collection</strong></u></div>

<hr class="auto-style3" style="height: -15px">

<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></p>

				

				</td>		

	</tr>

</table>

<table cellspacing="0" cellpadding="0" width="100%">	
	<form name="frmChallan" id="frmChallan" method="post" action="" enctype="multipart/form-data">	
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes" class="auto-style23">
	
	<tr>

		<td class="style3" style="border-bottom-style: none; border-bottom-width: medium">

		<table cellpadding="0" class="style6" style="width: 100%; border-top-width:0px" cellspacing="0" border="1">

			
			<tr>

				<td style="height: 21px; border-top-style:none; border-top-width:medium" class="style7" colspan="2">
				<?php echo $Message;?>
				</td>

			</tr>

			
			<tr>

				<td style="width: 441px; height: 24px" class="style7">
				<strong>Select Cheque Detail File</strong></td>

				<td style="height: 24px" class="style8">
				<p style="text-align: left">
				<input type="file" name="file" id="file" style="font-weight: 700; float: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" name="btnSubmit" value="Submit" onclick="Javascript:Validate();" style="font-weight: 700">
				</td>

			</tr>			

			
			<tr>

				<td style="height: 24px" class="style7" colspan="2">
				&nbsp;<p style="text-align: left"><u><b>Instructions : </b></u>
				</p>
				<p style="text-align: left">1. Please ensure that only relevant 
				details are captured in the file </p>
				<p style="text-align: left">2. Please note all the fields are 
				mandatory</p>
				<p style="text-align: left">3. Please do not add any special 
				character in the file e.g. &#39;&nbsp; / &quot; @ # $ % ^ &amp; * ( )</p>
				<p style="text-align: left">&nbsp;</td>

			</tr>			
			</table>

		</td>

	</tr>

	

	</form>

</table>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>





</body>



</html>