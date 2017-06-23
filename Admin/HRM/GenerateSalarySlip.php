<?php  
				include '../../connection.php';
			?>

<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>salary slip</title>



	

<style type="text/css">

.auto-style1 {
	font-size: 11pt;
	font-family: Calibri;
}
.auto-style2 {
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}

.auto-style99{
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
	padding-left:295px;
}

.auto-style5 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}

.auto-style12 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
	font-size: 11pt;
	color: #000000;
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
	color: #000000;
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
	color: #000000;
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
	color: #000000;
}
.auto-style23 {
	border-style: none;
	border-width: medium;
	
}
.auto-style100 
{
	border-style: none;
	border-width: medium;
	padding-left:px;
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
	color: #000000;
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
	color: #000000;
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
	color: #000000;
}
.auto-style33 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
	text-decoration: underline;
}

.auto-style34 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Calibri;
	font-weight: 700;
	color: #000000;
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
	color: #000000;
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
	color: #000000;
}
.auto-style39 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style40 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
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

</style>

</head>



<body>
<form method="post">

	<table border="1px" width="100%">
	
	
		<tr>
		
		<td style="width: 281px; height: 29px;" class="auto-style23">

		<span class="auto-style2">Employee ID No. </span>
		<span style="font-weight: 700; color: #000000" class="auto-style1">:</span></td>

		<td style="width: 157px; height: 29px;" class="auto-style23">

		<input type="text" name="txtEmpID" size="15" style="color: #CC0033; width: 151px;" class="auto-style1" required /></td>

		<td style="width: 157px; height: 29px;" class="auto-style26">

           <input type="submit" name="FillDetail" value="Fill Detail" class="auto-style35" style="width:82px"; /></td>
	</tr>
	
		

			 
			 <?php 
		
			if(isset($_POST['FillDetail'])) 
			{
			 $ID=$_POST['txtEmpID'];
    
				$result1=mysql_query("SELECT * FROM   employee_master where EmpId=$ID");
									 
			 
			  $test1 = mysql_fetch_array($result1);
			 }
			 ?>
	
	<tr>
	
	    <td style="width: 281px; height: 52px;" class="auto-style23">

		 <span class="auto-style2">Employee Name</span><span class="auto-style1">
		 </span>

		</td>

		<td style="width: 157px; height: 52px;" class="auto-style23">

   <input type="text" name="txtName"  class="auto-style35" style="height: 22px"; value="<?php if(isset($_POST['FillDetail'])) {   echo $test1['Name']; } ?>" readonly/>       </td>
	
		
		
		
	
		<td style="width: 157px; height: 52px;" class="auto-style41">&nbsp;

		</td>
	
		
		
		
	
		<td style="width: 179px; height: 52px;" class="auto-style38">

		Department</td>

		<td style="height: 52px;" class="auto-style23">

		<input name="txtDepartment" id="txtClass" type="text" class="auto-style18" style="width: 95px"; value="<?php if(isset($_POST['FillDetail'])) {   echo $test1['Department']; } ?>" readonly/></td>
		
		
	
		<td style="width: 191px; height: 52px;" class="auto-style26">

		<span style="font-weight: 700; color: #000000" class="auto-style1">
		Cader</span><span class="auto-style1">
		</span>

		</td>
		
		<td style="height: 52px;" class="auto-style23">

		<input name="txtCader" id="txtCader" type="text" style="width: 100px"; value="<?php if(isset($_POST['FillDetail'])) {   echo $test1['Cadre']; } ?>"  class="auto-style35" readonly/></td>
		<br class="auto-style1">
		</tr>
		
		
		</table>
		
		<table border="1px" width="100%">
		<tr>
		
		        <td style="width: 179px; height: 52px;" class="auto-style38"> Financial Year:</td>

		<td style="height: 52px;" class="auto-style23">

		                   <select  name="txtnationality" id="txtnationalityl0" class="auto-style18" style="width: 95px" required>
								<option value="-1" selected>Select..</option>
								<option value="">2014-2015</option>
                                <option value="">2015-2016</option>
								<option value="">2016-2017</option>
								<option value="">2017-2018</option>
                            </select></td>
							
			<td style="width: 179px; height: 52px;" class="auto-style38">Date:</td>

		<td style="height: 52px;" class="auto-style23">

		<input type="date" name="bday" class="auto-style18" style="width: 135px"; ></td>
		
		
		<td style="width: 179px; height: 52px;" class="auto-style38">Receipt No:</td>

		<td style="height: 52px;" class="auto-style23">

		<input type="text" name="TecNo" class="auto-style18" style="width: 135px"; ></td>
		</tr>
		
		</table>
		
		 <table border="1px" width="100%">
		 
		 <tr>
		
		        <td style="width: 179px; height: 52px;" class="auto-style38"> Salary Heads</td> <td style="width: 179px; height: 52px;" class="auto-style38"> Amount</td>
		 </tr>
		
		 </table>
		 		 
				 <table border="1px" width="100%">
				
			 <tr>
			  <td style="width: 281px; height: 52px;" class="auto-style23">

		 <span class="auto-style99">Basic Salary:</span><span class="auto-style1">
		 </span>

		</td>

		<td style="width: 157px; height: 52px;" class="auto-style23">

   <input type="text" name="txtSalary"  class="auto-style35" style="height: 22px"; value="<?php if(isset($_POST['FillDetail'])) {   echo $test1['Salary']; } ?>" readonly/>       </td>
			 </tr>
			 
			 	 <tr>
			  <td style="width: 281px; height: 52px;" class="auto-style23">

		 <span class="auto-style99">Allowances:</span><span class="auto-style1">
		 </span>

		</td>

		<td style="width: 157px; height: 52px;" class="auto-style23">

   <input type="text" name="txtSalary"  class="auto-style35" style="height: 22px"; value="<?php if(isset($_POST['FillDetail'])) {   echo $test1['Allowances']; } ?>" readonly/>       </td>
			 </tr>
			 
			  	 <tr>
			  <td style="width: 281px; height: 52px;" class="auto-style23">

		 <span class="auto-style99">Texes:</span><span class="auto-style1">
		 </span>

		</td>

		<td style="width: 157px; height: 52px;" class="auto-style23">

   <input type="text" name="txtSalary"  class="auto-style35" style="height: 22px"; value=" " />       </td>
			 </tr>
			 
			  	 <tr>
			  <td style="width: 281px; height: 52px;" class="auto-style23">

		 <span class="auto-style99">Salary Advance:</span><span class="auto-style1">
		 </span>

		</td>

		<td style="width: 157px; height: 52px;" class="auto-style23">

   <input type="text" name="txtSalary"  class="auto-style35" style="height: 22px"; value=""/>       </td>
			 </tr>
		 
		 </table>
		 
		 <table border="1px" width="100%">
		 
		   	 <tr>
			  <td style="width: 281px; height: 52px;" class="auto-style23">

		 <span class="auto-style99">Total Salary:</span><span class="auto-style1">
		 </span>

		</td>

		<td style="width: 157px; height: 52px;" class="auto-style100" >

   <input type="text" name="txtSalary"  class="auto-style35" style="height: 22px"; value=""/>       </td>
			 </tr>
		 
		 </table>
		
		
        <table border="1px" width="100%">
	<tr>

		<td colspan="2" class="auto-style5">

		<strong>

		<input name="" type="button" value="Submit"  class="auto-style15">&nbsp;&nbsp;<input name="" type="button" value="Ganerate Salary slip"  class="auto-style15">
		</span>
		</strong></td>

	</tr>

		

</table>

</form>

</body>



</html>