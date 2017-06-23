<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Single student monthly Report</title>
<style type="text/css">
.style1 {
	text-align: center;
}
</style>
</head>

<body>
<table width="100%" style="border-collapse: collapse;" border="1">
<form name="frmRpt" method="post" action="StudentAttendanceReport.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">

		<tr>
			<td style="width: 278px">Class:<select name="cboClass">
							<option selected="" value="Select One">Select One</option>
							<?php
								while($row = mysql_fetch_row($rsClass))
								{
									$Class=$row[0];
							?>
							<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
							<?php
								}
							?>
							</select>
			</td>
			<td>Month: <input type="month" name="month" id="month" style="width:150px;"></td>
			<td style="width: 278px">Roll No:<input name="txtRollNo" id="txtRollNo" type="text"></td>
			<td style="width: 278px" class="style1"><input name="Submit1" type="submit" value="submit"></td>
		</tr>


</table><br>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
	
?>

<table width="100%" style="border-collapse: collapse;" border="1">
<?php
		
			$class=$_REQUEST["cboClass"];
			$roll_no=$_REQUEST["txtRollNo"];
			
			$query="select `srno`,`sname`,`sadmission`,`sclass`,`srollno`,`smobile` from `student_master` where 1=1";
			if($class !="Select One")
			{
				$query=$query." and `sclass`='".$class."'";        
			}
			if($roll_no !="")
			{
				$query=$query." and `srollno`='$roll_no'";
			}
			$result= mysql_query($query);			
			
			$i=1;
			echo "<tr bgcolor='yellow'>";
	   		echo "<td style='width:50px;'><b>Sr.No</b></td>
			      <td style='width:50px;'><b>class</b></td>
				  <td><b>StudentName&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
				  <td style='width:50px;'><b>Roll No.</b></td>";
			
			
			  $start_date=date("Y-m-d");
	          $end_date=date("Y-m-d");
	  
	        if(isset($_POST['Submit1']) && $_POST['month']!='') {
	  
			 $abc=explode('-',$_POST['month']);
			 $y= $abc[0];
			 $m= $abc[1];			  
			 $num = cal_days_in_month(CAL_GREGORIAN, $m, $y); 			 
			 $start_date=$y.'-'.$m.'-'.'1';
			 $end_date=$y.'-'.$m.'-'.($num==31)?'31':(($num==30)?'30':(($num==29)?'29':'28'));
			 
			 
	        for($i = 0; $i <$num	; $i++)
	        {
	        	
	        $date = strtotime(date("Y-m-d", strtotime($start_date)) . " +$i day");
		    echo sprintf('<td style="padding:0px 0px 0px 10px";><input name="Text1" style="width: 25px;" type="text" value="'.date('d', $date).'" readonly/><input name="Text1"                      style="width: 25px;" type="text" value="'.date('l', $date).'" readonly/></td>	',$i,pow($i, 1)	 );
		     } 
		 }
		
           else {
			
	      	for($i = 0; $i <=31	; $i++){
	
     		echo sprintf('<td style="padding:0px 0px 0px 40px";><input name="Text1" style="width: 25px;" type="text" readonly /><input name="Text1" style="width: 25px;" type="text"                           readonly /></td>',$i,pow($i, 1));
		    }		
		
		 }
		    echo "</tr>";
?>
			
			</table>
			
			
			<table style="border:2px solid #993300; width:100%; height:auto;"   cellpadding="0" cellspacing="0" align="center" >
			
			<?php
			
			while($test = mysql_fetch_array($result))
			{	
			    echo "<tr><td><input type='text'   name='srno'". $i."  value='".$test['srno']."'readonly style='background-color: #00579A; color: #FFFFFF; text-align:center;                                 width:50px;'/</td>
				<td><input type='text'  name='sclass'". $i." value='".$test['sclass']."' readonly style='background-color: #00579A; color: #FFFFFF;                     text-align:center;width:50px;''/></td>
				<td><input type='text'  name='sname'". $i." value='".$test['sname']."' readonly style='background-color: #00579A; color: #FFFFFF; text-align:center;'/></td>
				<td><input type='text'  name='srollno'". $i." value='".$test['srollno']."' readonly style='background-color: #00579A; color: #FFFFFF;                     text-align:center;width:50px;'/></td>";
				
				$abc=explode('-',$_POST['month']);
				 $y= $abc[0];
				 $m= $abc[1];			  
				 $num = cal_days_in_month(CAL_GREGORIAN, $m, $y); 			 
				 $start_date=$y.'-'.$m.'-'.'1';
				 $RecordRollNo=$test['srollno'];
			 
				for($i = 0; $i <$num; $i++)
				{ 
				$date = date("Y-m-d", strtotime("$start_date + $i day"));
				$qry="SELECT `attendance` FROM `attendance` WHERE `sclass`='$class' and `srollno`='$RecordRollNo' and `attendancedate`='$date'";
	        	
	        	$rslt= mysql_query($qry);	
	        	while($test = mysql_fetch_array($rslt))
				{
					$AttandanceValue=$test['attendance'];
					
				}
				
				echo "<td style='padding:0px 0px 0px 10px';><input name='P' type='text' value='".$AttandanceValue."' style='width:25px;'  /></td>" ;
				}
				
				 echo "</tr>";
				 
			$i=$i+1;
				
			}
		}	
	
 

	
?>



</table>
</form>
</body>

</html>