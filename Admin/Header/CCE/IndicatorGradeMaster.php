<?php  
				$conn = mysql_connect('localhost', 'root', '');
				 if (!$conn)
				{
				 die('Could not connect: ' . mysql_error());
				}
				mysql_select_db("report_card", $conn);
			?>

<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />

<title> indicator grade master</title>

<style type="text/css">

.auto-style1 {
	font-size: 11pt;
	font-family: Calibri;
}
.auto-style2 {
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}

.auto-style99{
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
	padding-left:265px;
}

.auto-style5 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}

.auto-style12 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
	font-size: 11pt;
	color: #CC3300;
	text-decoration: underline;
	text-align: center;
}

.auto-style14 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style15 {
	font-size: 11pt;
	color: #822203;
	font-weight: bold;
	font-family: Calibri;
}
.auto-style17 {
	font-family: Calibri;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style18 {
	margin-left: 0px;
	font-family: Calibri;
	font-size: 11pt;
	color: #CC0033;
}

.auto-style20 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 0px;
	font-size: medium;
}

.auto-style22 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style23 {
	border-style: none;
	border-width: medium;
}
.auto-style24 {
	border-style: none;
	border-width: medium;
	text-align: left;
}
.auto-style25 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #CC3300;
}

.auto-style26 {
	border-style: none;
	border-width: medium;
	text-align: center;
}
.auto-style27 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Calibri;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style28 {
	font-size: 11pt;
	font-weight: normal;
	font-family: Calibri;
}
.auto-style30 {
	font-family: Calibri;
	font-weight: normal;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style33 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
	text-decoration: underline;
}

.auto-style34 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Calibri;
	font-weight: 700;
	color: #CC3300;
	font-size: 11pt;
}

.auto-style35 {
	font-size: 11pt;
	font-family: Calibri;
	color: #CC0033;
}

.auto-style3 {
	font-family: Cambria;
	color: #CD222B;
}
.auto-style6 {
	
	font-family: Calibri;
	color: #CD222B;
}

.auto-style36 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style37 {
	font-family: Calibri;
}
.auto-style38 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style39 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style40 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style41 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
}

.style1 {
	border-style: solid;
	border-width: 1px;
}

.auto-style121 {	border-style: none;
	border-width: medium;
}
.auto-style11 {	font-size: 11pt;
}
</style>
</head>



<body>
<form method="post">

	<table border="1px" width="100%">
		 <tr>
		
		        <td style="width: 179px; height: 52px;" class="auto-style38" bgcolor="#CC0033" colspan="2"> <h1><font color="#000000"> Indicator Grade Master</font></h1></td> 
		 </tr>
		
  </table>
		 		 


</body>

</html>

<?php

 echo'<br>	
   	
    <table table width="100%" bordercolor="#000000" id="table3" class="style2" border=1 style="width:800px;" align="center">
    
    	
   	<tr>
   <td height="35" bgcolor="#CC0033" align="center" style="width: 54px" class="style11">SERIAL No.</td>
   <td height="35" bgcolor="#CC0033" align="center" style="width: 54px" class="style11">CLASS</td>
   <td height="35" bgcolor="#CC0033" align="center" style="width: 54px" class="style11">RANGE FROM</td>
   <td height="35" bgcolor="#CC0033" align="center" style="width: 54px" class="style11">RANGE TO</td>
   		    
   			<td height="35" bgcolor="#CC0033" align="center" style="width: 54px" class="style12">GRADE</td>
   			<td height="35" bgcolor="#CC0033" align="center" style="width: 92px" class="style12">ENTRY DATE</td>
   			
   			  
   			  
   				
   				   
   		</tr>';
   		$result=mysql_query("select * from  indicator_grade_master");
   		
   		while($test= mysql_fetch_array($result))
   		{
   		
   		
   			echo"<tr>".
   			"<td>" .$test["SrNo"]."</td>".
   "<td>".$test["class"]."</td>".
   "<td>".$test["RangeFrom"]."</td>".
   "<td>".$test["RangeTo"]."</td>".
   			"<td>".$test["Grade"]."</td>".
   			"<td>".$test["entrydate"]."</td>".
   			
   			
   			
   			"</tr>";
   			
   		}
   	
   	
   
    echo"</table>";
   	
   
    echo"</table>";
   		
   

		

?>