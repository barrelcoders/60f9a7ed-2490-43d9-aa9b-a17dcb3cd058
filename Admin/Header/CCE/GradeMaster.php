<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>


<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />

<title>Grade Master</title>


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

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;

}

</style>

<body>
<p>&nbsp;</p>
<p><b><font face="Cambria">Define Grade Master</font></b></p>
<hr>
		 		 


<p><a href="javascript:history.back(1)">
<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></p>
		 		 

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>

</div>
</body>

</html>

<?php







 echo'<br>	
   	
    <table table width="100%" bordercolor="#000000" id="table3"  border=1 style="width:100%;" align="center" style="border-collapse: collapse">
    
    	
   	<tr>
		   <td  align="center" bgcolor="#95C23D" style="width: 54px" >Sr No.</td>
		   <td  align="center" bgcolor="#95C23D" style="width: 54px" >Max Marks</td>
		   <td  align="center" bgcolor="#95C23D" style="width: 54px" >Range FROM</td>
		   <td  align="center" bgcolor="#95C23D" style="width: 54px" >Range TO</td>
   		    
   			<td  align="center" bgcolor="#95C23D" style="width: 54px" >Grade</td>
   			<td  align="center" bgcolor="#95C23D" style="width: 92px" >Grade Points</td>
   			<td  align="center" bgcolor="#95C23D" style="width: 92px" >Edit</td>
   			
   			  
   			  
   				
   				   
   		</tr>';
   		$result=mysql_query("select * from grade_master");
   		
   		while($rs= mysql_fetch_array($result))
   		{
   		
   		
   			echo"<tr>".
   			"<td align='center'>" .$rs["SrNo"]."</td>".
   			"<td align='center'>".$rs["MaxMarks"]."</td>".
  			 "<td align='center'>".$rs["RangeFrom"]."</td>".
  			 "<td align='center'>".$rs["RangeTo"]."</td>".
   			"<td align='center'>".$rs["Grade"]."</td>".
   			"<td align='center'>".$rs["GradePoints"]."</td>".
   			"<td align='center'>Edit</td>".
   			
   			
   			
   			"</tr>";
   			
   		}
   	
   	
   
    echo"</table>";
   		
   

		

?>