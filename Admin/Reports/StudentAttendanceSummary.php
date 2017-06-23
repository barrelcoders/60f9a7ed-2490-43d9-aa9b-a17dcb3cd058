<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php
$ssqlClass="SELECT distinct `sclass` FROM `student_master`";
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
</head>

<body>
<p>&nbsp;</p>
<p><font face="Cambria"><b>Student Attendance Summary Report</b></font></p>
<hr>
<p>&nbsp;</p>
<table width="100%" style="border-collapse: collapse;" border="1">
<form name="frmRpt" method="post" action="StudentAttendanceSummary.php">
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

<?php
		
			$class=$_REQUEST["cboClass"];
			$roll_no=$_REQUEST["txtRollNo"];
			$SelectedMonth=$_REQUEST["month"];
			$ArraySelectedMonth=explode("-",$SelectedMonth);
			$SelectedMonth=$ArraySelectedMonth[1];
			//SELECT * FROM `attendance` WHERE DATE_FORMAT(`attendancedate`,'%c')='12'
?>
			
			<table style="border:2px solid #993300; width:100%; height:auto;"   cellpadding="0" cellspacing="0" align="center" >
			
			<?php
						$query="select distinct `srno`,`sname`,`sadmission`,`sclass`,`srollno`,`smobile` from `student_master` where 1=1";
			if($class !="Select One")
			{
				$query=$query." and `sclass`='".$class."'"  ;        
			}
			if($roll_no !="")
			{
				$query=$query." and `srollno`='$roll_no'";
			}
			$result= mysql_query($query);			
			
			$i=1;
			
			$dat1="select distinct `attendancedate` FROM `attendance` where 1=1 ";
             $dat= mysql_query($dat1);
              if($class !="Select One")
			{
				$dat1=$dat1." and `sclass`='".$class."'";        
			}
            if($roll_no !="")
			{
				$dat1=$dat1." and `srollno`='$roll_no'";
			}
			if ($SelectedMonth !="")
			{
				$dat1=$dat1." and DATE_FORMAT(`attendancedate`,'%c')='$SelectedMonth'";
			}
			$result1= mysql_query($dat1);
            
			$r=mysql_num_rows($result1);
			
			
			
			
			
			echo "<tr bgcolor='FFFFFF'><td><b>Sr.No</b></td>
			                           <td><b>Class </b></td>
			                           <td><b>Student Name</b></td>
			                           <td><b>Roll No</b></td>
									    <td><b></b></td>
			                           <td><b>Total Working Days</b></td>
			                           <td><b>Total Presents</b></td>
									   <td><b>Total Absents</b></td>
									   <td><b>Total leaves</b></td>
									   <td><b>% Of attendance</b></td></tr>";
			
			 
		    echo "</tr>";
			
			while($test = mysql_fetch_array($result))
			{	
			    echo "<tr>
				     <td><input type='text'   name='srno'". $i."  value='".$test['srno']."'readonly ; color: #FFFFFF; text-align:center;;'/</td>
				<td>
				<input type='text'  name='sclass'". $i." value='".$test['sclass']."' readonly ; color: #FFFFFF;text-align:center;;''/></td>
				<td>
				<input type='text'  name='sname'". $i." value='".$test['sname']."' readonly ; color: #FFFFFF; text-align:center;'/></td>
				<td>
				<input type='text'  name='srollno'". $i." value='".$test['srollno']."' readonly ; color: #FFFFFF;text-align:center;;'/></td>
				<td></td>
				 <td>
				 <input type='text' name='TotalWorkingDays $i;'. $i.' ;color: #FFFFFF; text-align:center;;'  value='".$r."' readonly/> 
	            </td>";
				
				
				$tp="select `attendance` FROM `attendance` where  `srollno`='$test[srollno]' and `attendance`='P'  and `sclass`='$class' and DATE_FORMAT(`attendancedate`,'%c')='$SelectedMonth'" ;
                $tp1= mysql_query($tp);

		           	
	          	$r1=mysql_num_rows($tp1);

				echo"<td>
				 <input type='text' name='TotalPresents<?php echo $i;?>'. $i.' ;color:                  #FFFFFF; text-align:center;;'  value='".$r1."' readonly/> 
	            </td>";
				$tp11="select `attendance` FROM `attendance` where  `srollno`='$test[srollno]' and `attendance`='A' and `sclass`='$class' and DATE_FORMAT(`attendancedate`,'%c')='$SelectedMonth'" ;
                
				$tp111= mysql_query($tp11);

			
		        $r12=mysql_num_rows($tp111);
				
				echo"<td>
				     <input type='text' name='TotalAbsents<?php echo $i;?>'. $i.' ;color:                       #000000; text-align:center;;' value='".$r12."' readonly/> 
	                  </td>";
				
				$tp21="select `attendance` FROM `attendance` where  `srollno`='$test[srollno]' and `attendance`='L'  and `sclass`='$class' and DATE_FORMAT(`attendancedate`,'%c')='$SelectedMonth'" ;
                $tp211= mysql_query($tp21);

			
	         	$r212=mysql_num_rows($tp211);
				
				
				echo"<td>
				 <input type='text' name='Totalleaves<?php echo $i;?>'. $i.' ;color: #FFFFFF;                      text-align:center;;' value='".$r212."' readonly/> 
	            </td>";
				
				$per=($r1*100)/$r;
				$fr = sprintf ("%.2f", $per);
				
				echo"<td>
				 <input type='text' name='%ofattendance<?php echo $i;?>'. $i.' ;color:                  #FFFFFF; text-align:center;;' value='".$fr."' readonly/> 
	            </td>";
				
				
				 echo "</tr>";
				 
			$i=$i+1;
				
			}
		}	
	
 

	
?>


</table>
</form>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>


</html>