<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style type="text/css">
.auto-style1 {
	color: #CC3300;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: 12pt;
}
.auto-style2 {
	color: #CC3300;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: 12pt;
	text-decoration: underline;
	text-align: left;
	border-right-style: none;
	border-right-width: medium;
}

.auto-style21 {
	text-align: left;
	font-family: Cambria;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style6 {
	color: #DAB9C1;
}

.auto-style22 {
	text-align: left;
	border-style: none;
	border-width: medium;
}
.auto-style23 {
	border: 0px solid #993300;
}
.auto-style24 {
	color: #CC3300;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: 12pt;
	border-left-style: none;
	border-left-width: medium;
}
.auto-style25 {
	border: 0px solid #993300;
}

.auto-style26 {
	font-family: serif;
	font-weight: normal;
	border-collapse: collapse;
	color: #CC3300;
	border-width: medium;
}

</style>
</head>

<body>
<form action="" method="post" id="form">

<table style="width:1200px; height:auto;"   cellpadding="0" cellspacing="0" align="center" class="auto-style25">
	<tr>
		<td colspan="3" class="auto-style2" >

				<div class="auto-style21">

					<strong>Employee Attendance<br />
					</strong><hr style="height: -15px" /></div>
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
				
				</td>
		<td class="auto-style24">&nbsp;</td>
	</tr>
	<tr>
		<td><span class="auto-style1"><strong>Employee</strong> <strong>ID</strong></span><input name="Text1" type="text" class="auto-style1" /></td>
		<td><span class="auto-style1"><strong>Select Month:</strong> </span> 
		<input type="month" name="month" id="month" class="auto-style1">  
		<input type="submit" value="click On" id="butt" name="butt" class="auto-style1" /><span class="auto-style1">
		</span>     </td>
       <td><span class="auto-style1">Reason:</span><textarea name="TextArea1" cols="20" rows="2" class="auto-style1"></textarea></td>
	</tr>
</table>


&nbsp;<table style="border:1px solid #993300; width:1200px; height:auto;"   cellpadding="0" cellspacing="0" align="center" >
<?php 

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
		echo sprintf('<tr><td>Date:<input name="Text1" type="text" value="'.date('d', $date).'"/></td>
		<td>Day:<input name="Text1" type="text" value="'.date('l', $date).'"/></td>
		<td>Attendance: <select name="Attendance" required>
							 <option> P </option>
							 <option value="P"> P </option>
							 <option value="A"> A </option>
							 <option value="L" >L </option>
						 
				 </select>
		</td>
			<td>Time In:<input type="time" value="12:01:00;">
		</td>
			<td>Time Out:<input type="time" value="12:01:00;">
		</td>
			</tr>',
					$i,
					pow($i, 1)
					
				 );
		} } else {
			
		for($i = 0; $i <=31	; $i++){
	
		echo sprintf('<tr><td>Date:<input name="Text1" type="text" /></td>
		<td>Day:<input name="Text1" type="text" /></td>
		<td>Attendance: <select name="Attendance" required>
							 <option> P </option>
							 <option value="P"> P </option>
							 <option value="A"> A </option>
							 <option value="L" >L </option>
						 
				 </select>
		</td>
			<td>Time In:<input type="time" value="12:01:00;">
		</td>
			<td>Time Out:<input type="time" value="12:01:00;">
		</td>
			</tr>',
					$i,
					pow($i, 1)
					
				 );
		}		
		
		}
?>
</table>
<table style="width:1200px; height:auto;"   cellpadding="0" cellspacing="0" align="center" class="auto-style23">
  <tr>
    <td class="auto-style22">
	<input name="Submit" type="submit" value="Submit" class="auto-style1" /></td>
  </tr>
</table>


</form>

</body>

</html>
