<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />

<title> Report Card Atitude Values</title>
</head>

<style>
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

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}
</style>

<body>
<form method="post">

	<table width="100%">
		 <tr border=1px>
		
		        <td style="width:100%;"   colspan="2"> 

				<font face="Cambria"> 

				<font color="#000000"> Report Card Attitude Values</font>
				
				
				</font><hr>
				<p>&nbsp;</td> 
		 </tr>
		
  </table>
		 		 



<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria">Powered by iSchool Technologies LLP</font></div>
</div>
</body>

</html>

<?php

 echo'<br>	
   	
    <table width=100% border=1 id="table3" align="center">
    
    	
   	<tr>
		   <td >SERIAL No.</td>
		   <td >Class</td>
		   <td >Indicator Type</td>
		   <td >Descriptive Indicator</td>
   		    
   			<td height="35"  align="center" style="width: 54px" class="style12">Status</td>
   			
   			
   			     				   
   		</tr>';
   		$result=mysql_query("select * from  reportcard_attitudevalues");
   		
   		while($rs= mysql_fetch_array($result))
   		{
   		
   		
   			echo"<tr>".
   			"<td>" .$rs["SrNo"]."</td>".
            "<td>".$rs["class"]."</td>".
            "<td>".$rs["indicatortype"]."</td>".
            "<td>".$rs["DescriptiveIndicator"]."</td>".
   			"<td>".$rs["status"]."</td>".
   		  			
   			"</tr>";
   			
   		}
   	
   	
   
    echo"</table>";
   	
   
    echo"</table>";
    <div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by iSchool Technologies LLP</font></div>

</div>



   		
   

		

?>