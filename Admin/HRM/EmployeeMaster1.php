<?php include '../../connection.php'; ?>

<?php include '../../AppConf.php'; ?>

<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />

<title>Employee Master</title>

</head>



<body>
<form method="post">

				<div class="auto-style21">

					<strong><font face="Cambria">Employee Master</font></strong></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><font face="Cambria"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></body></html><?php

?><br>	
   	
    </font></p>	
   	
    <div align="center">
   	
    <table bordercolor="#000000" id="table3" class="style2" border=1 style="width:1188px; border-collapse:collapse" cellspacing="0" cellpadding="0">
    
    	
   	<tr>
		   <td   align="Left" width="53"   >
			<font face="Cambria">Sr No</font></td>
		   <td   align="Left" width="53"   >
			<font face="Cambria">Emp Id</font></td>
		   <td   align="Left" width="53"   >
			<font face="Cambria">Employee Name</font></td>
		   <td   align="Left" width="53"   >
			<font face="Cambria">Date of Birth</font><td width="53" > 
		   Gender<td   align="Left"   width="53" >
			<font face="Cambria">Category</font></td>
   		   <td   align="Left" width="53"  >
			<font face="Cambria">Nationality</font></td>
   		   <td   align="Left" width="54"  >
			<font face="Cambria">Date Of Joining</font></td>
   		   <td   align="Left" width="54"   >
			<font face="Cambria">Last School</font></td>
   		   <td   align="Left" width="54"  >
			<font face="Cambria">Employee Type</font></td>
		   <td   align="Left" width="54"  >
			<font face="Cambria">Class Teacher of Class</font></td>
		   <td   align="Left" width="54" >
			<font face="Cambria">Education Qualification</font></td>
		   <td   align="Left" width="54" >
			<font face="Cambria">Father's Name</font></td>
		   <td   align="Left" width="54" >
			<font face="Cambria">Salary</font></td>
		   <td   align="Left" width="54" >
			<font face="Cambria">Special Allowance</font></td>
		   <td   align="Left" width="54" >
			<font face="Cambria">Address</font></td>
		   <td   align="Left" width="54" >
			<font face="Cambria">Mobile No</font></td>
		   <td   align="Left" width="54" >
			<font face="Cambria">Email Id</font></td>
		   <td   align="Left" width="54" >
			<font face="Cambria">User ID </font></td>
		   <td   align="Left" width="54" >
			<font face="Cambria">Password</font></td>
		   <td   align="Left" width="38" >
			<font face="Cambria">Email Id</font></td>
		   <td   align="Left" width="31" >
			<font face="Cambria">Role</font></td>
		   <td   align="Left" width="42" >
			<font face="Cambria">Status</font></td>
   			  
   				
   				   
   		</tr>
   		</div>

   		<?php
   		$result=mysql_query("select * from  employee_master");
   		
   		while($cnt= mysql_fetch_array($result))
   		{
   		
   		
   			echo"<tr>".
   		   "<td>" .$cnt["srno"]."</td>".
		   "<td>".$cnt["EmpId"]."</td>".
		   "<td>".$cnt["Name"]."</td>".
		   "<td>".$cnt["DOB"]."</td>".
   		   "<td>".$cnt["Gender"]."</td>".
   		   "<td>".$cnt["Category"]."</td>".
   		   "<td>".$cnt["Nationality"]."</td>".
   		   "<td>".$cnt["DOJ"]."</td>".
   		   "<td>".$cnt["LastSchool"]."</td>".
		   "<td>".$cnt["employeetype"]."</td>".
		   "<td>".$cnt["ClassTeacher"]."</td>".
		   "<td>".$cnt["Education_Qualification"]."</td>".
		   "<td>".$cnt["FatherName"]."</td>".
		   "<td>".$cnt["Salary"]."</td>".
		   "<td>".$cnt["Allowances"]."</td>".
		   "<td>".$cnt["Address"]."</td>".
		   "<td>".$cnt["MobileNo"]."</td>".
		   "<td>".$cnt["Imei"]."</td>".
		   "<td>".$cnt["UserId"]."</td>".
		   "<td>".$cnt["Password"]."</td>".
		   "<td>".$cnt["email"]."</td>".
		   "<td>".$cnt["role"]."</td>".
		   "<td>".$cnt["status"]."</td>".
   			
   			"</tr>";
   			
   		}
   	
   	
   
    echo"</table>";
   		
   

		

?>