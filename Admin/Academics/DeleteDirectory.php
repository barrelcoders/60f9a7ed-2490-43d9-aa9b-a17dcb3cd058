<?php

session_start();

include '../../connection.php';

include '../../AppConf.php'

?>


<?php

$SrNo=$_REQUEST["srno"];

if ($SrNo !="")
{
		$ssql="delete from `school_directory` WHERE `srno` = '$SrNo'";
			mysql_query($ssql) or die(mysql_error());
			echo "<br><center> <b>Deleted Successfully <br> Click <a href='Javascript: window.opener.location.reload(); window.close();'>here</a> to close window";
			exit();}

?>
<script language="javascript">
function Validate()
{
	//alert("Hi");
	
	
	if (document.getElementById("txtHolidayName").value=="")
	{
		alert("Please enter holiday name");
		return;
	}

	if (document.getElementById("txtDate").value=="")
	{
		alert("Please enter holiday date");
		return;
	}
	document.getElementById("frmEditHoliday").submit();

	
}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Holiday</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">
.style1 {
	border-collapse: collapse;
	border: 1px solid #808080;
}
.style2 {
	text-align: center;
}
.style3 {
	color: #FFFFFF;
	font-family: Cambria;
	font-size: 12pt;
	background-color: #FFFFFF;
}
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
</style>
</head>

<body onbeforeunload="window.opener.location.reload();" >
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>
</body>

</html>
