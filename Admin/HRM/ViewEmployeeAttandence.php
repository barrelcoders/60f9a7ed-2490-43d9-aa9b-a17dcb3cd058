<?php  include '../../connection.php'; ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



<script src="jquery.min.js"></script>



<head>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

<title>Untitled 1</title>

</head>



<body bgcolor="#999999">

<form action="" method="post" id="form">



<table style="border:2px solid #993300; width:100%; height:auto ;"   cellpadding="0" cellspacing="0" align="center">

	<tr>

		<td colspan="3" align="center" style="font-size:x-large" ><b>Teacher Attendance</b></td>

		<td>&nbsp;</td>

	</tr>

	<tr>

		<td>Month: <input type="month" name="month" id="month">  <input type="submit" value="click On" id="butt" name="butt" /></td>

		

       

	</tr>

</table>





<table style="border:2px solid #993300; width:100%; height:auto ;"   cellpadding="0" cellspacing="0" align="center"	>

	<tr>

		<td align="center"><a href="#">Upload Teacher Attendance</a></td>

		<td align="center"><a href="#">View previous Teacher Attendance</a> </td>

		

	</tr>

</table>



<table style="border:2px solid #993300; width:100%; height:auto;"   cellpadding="0" cellspacing="0" align="center" >





<?php



			$result=mysql_query("SELECT * FROM   employee_master");

			$i=1;

			echo "<tr bgcolor='yellow'>";

			echo "<td style='padding:0px 0px 0px 40px;' ><b>EMPID</b></td><td style='padding:0px 0px 0px 155px'; ><b>NAME</b><font color='yellow'>..............</font></td>";

			

			

			  $start_date=date("Y-m-d");

	  $end_date=date("Y-m-d");

	  

	  if(isset($_POST['butt']) && $_POST['month']!='') {

	  

			 $abc=explode('-',$_POST['month']);

			 $y= $abc[0];

			 $m= $abc[1];			  

			 $num = cal_days_in_month(CAL_GREGORIAN, $m, $y); 			 

			 $start_date=$y.'-'.$m.'-'.'1';

			 $end_date=$y.'-'.$m.'-'.($num==31)?'31':(($num==30)?'30':(($num==29)?'29':'28'));

			 

			 

				  

	  

	for($i = 0; $i <$num	; $i++){

	$date = strtotime(date("Y-m-d", strtotime($start_date)) . " +$i day");

		echo sprintf('<td style="padding:0px 0px 0px 10px";><input name="Text1" style="width: 25px;" type="text" value="'.date('d', $date).'" readonly/><input name="Text1" style="width: 25px;" type="text" value="'.date('l', $date).'" readonly/></td>

		

		

		 

			

			',

					$i,

					pow($i, 1)

					

				 );

		} }

		

 

		else {

			

		for($i = 0; $i <=31	; $i++){

	

		echo sprintf('<td style="padding:0px 0px 0px 40px";><input name="Text1" style="width: 25px;" type="text" readonly /><input name="Text1" style="width: 25px;" type="text" readonly /></td>

		

		 

			

			',

					$i,

					pow($i, 1)

					

				 );

		}		

		

		}

		echo "</tr>";

		?>

			

			</table>

			

			

			<table style="border:2px solid #993300; width:100%; height:auto;"   cellpadding="0" cellspacing="0" align="center" >

			

			<?php

			

			while($test = mysql_fetch_array($result))

			{

			

			    echo "<tr><td><input type='text'   name='EmpID'". $i."  value='".$test['EmpId']."'readonly style='background-color: #00579A; color: #FFFFFF; text-align:center;'/></td><td><input type='text'  name='Name'". $i." value='".$test['Name']."' readonly style='background-color: #00579A; color: #FFFFFF; text-align:center;'/>   </td>";

				

				for($i = 0; $i <$num; $i++){ 

				

				echo "<td style='padding:0px 0px 0px 10px';><input name='P' type='text' value='' style='width:25px;'  /></td>" ;

				}

				

				 echo "</tr>";

				 

			$i=$i+1;

				

			}

			

	

 



	

?>





</table>

<table style="border:2px solid #993300; width:100%; height:auto;"   cellpadding="0" cellspacing="0" align="center">

  <tr>

    <td align="center"><input name="Submit1" type="submit" value="Submit" /></td>

  </tr>

</table>





</form>

<?php 

		

			if(isset($_POST['Submit1'])) 

{

    

		$result1=mysql_query("SELECT * FROM   employee_master");

			$i=1;

	   while($test1 = mysql_fetch_array($result1))

			{	

	

		$query=mysql_query("INSERT INTO `employeeattendance` (`date`,`empID`, `name`, `attendance`, `timein`, `timeout`) VALUES ('".$_POST['bday']."','".$test1['EmpId']."', '".$test1['Name']."', '".$_POST['Attendance']."', '".$_POST['timein']."', '".$_POST['timeinout']."')");

			

			$i=$i+1;

			}

			

			mysql_close($conn);

}





?>

</body>

</html>

