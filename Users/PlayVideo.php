<?php
//echo strpos("inder prakash","inderp");
//exit();

$URL=$_REQUEST["txtURL"];
$URL1=str_replace("https://www.youtube.com/watch?v=","",$URL);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
</head>

<body>
<iframe allowfullscreen="" frameborder="0" height="315" src="http://www.youtube.com/embed/<?php echo $URL1;?>?modestbranding=1;rel=0;showinfo=0;fs=0;disablekb=1;frameborder="0"" width="420"></iframe>
</body>

</html>
