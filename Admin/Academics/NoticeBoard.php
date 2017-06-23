<?php
include 'connection.php';
include 'AppConf.php';
?>
<?php
$rs=mysql_query("SELECT `news` FROM  `school_news` limit 2");
$sstr="";

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="60">
<title>button</title>
</head>

<body style="background-color: aqua;overflow: scroll;">
<?php
while($row=mysql_fetch_row($rs))
        {
        	$sstr=$row[0];
?>
<marquee behavior="scroll" direction="up" scrollamount="3" height="700" width="100%" scrolldelay="50">
<?php echo $sstr;?>
</marquee>
<?php
}
?>      
        	

</body>

</html>
