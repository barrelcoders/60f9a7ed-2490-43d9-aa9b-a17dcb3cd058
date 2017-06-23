<?php  
			include '../../connection.php';
			?>

<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />

<title>Report Card Health Physical</title>


</head>



<body>
<form method="post">

	<table border="1px" width="100%">
		 <tr>
		
		        <td style="width: 179px; height: 52px;" class="auto-style38" bgcolor="#CC0033" colspan="2"> <h1><font color="#000000">  Report Card Health Physical</font></h1></td> 
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
		   <td height="35" bgcolor="#CC0033" align="center" style="width: 54px" class="style11">INDICATOR TYPE</td>
		   <td height="35" bgcolor="#CC0033" align="center" style="width: 54px" class="style11">DESCRIPTIVE INDICATOR</td>
   		    
   			<td height="35" bgcolor="#CC0033" align="center" style="width: 54px" class="style12">STATUS</td>
   			<td height="35" bgcolor="#CC0033" align="center" style="width: 92px" class="style12">ENTRY DATE</td>
   			
   			  
   			  
   				
   				   
   		</tr>';
   		$result=mysql_query("select * from   reportcard_healthphysical");
   		
   		while($test= mysql_fetch_array($result))
   		{
   		
   		
   			echo"<tr>".
					"<td>" .$test["SrNo"]."</td>".
					"<td>".$test["class"]."</td>".
					"<td>".$test["indicatortype"]."</td>".
					"<td>".$test["DescriptiveIndicator"]."</td>".
					
					"<td>".$test["status"]."</td>".
					"<td>".$test["entrydate"]."</td>".
					
   			"</tr>";
   			
   		}
   	
   	
   
    echo"</table>";
   	
   
    echo"</table>";
   		
   

		

?>