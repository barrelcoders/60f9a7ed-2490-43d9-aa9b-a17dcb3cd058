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
<title>Student Documents Reports</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">
.style1 {
	text-align: center;
}
</style>
</head>

<body>
<table width="100%" style="border-collapse: collapse;" border="1">
<form name="frmRpt" method="post" action="StudentDocumentReport.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
   <tr>
			<td style="width: 278px">Class:<select name="cboClass" class="text-box">
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
		    <td style="width: 278px">Roll No:<input name="txtRollNo" id="txtRollNo" type="text" class="text-box"></td>
			<td style="width: 278px" class="style1"><input name="Submit1" type="submit" value="submit" class="text-box"></td>
  </tr>
</table><br>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>
<table class="CSSTableGenerator">
<?php
		
			$class=$_REQUEST["cboClass"];
			$roll_no=$_REQUEST["txtRollNo"];
			
			$query="select srno,sname,sadmission,sclass,srollno,smobile from student_master where 1=1";
			if($class !="Select One")
			{
				$query=$query." and `sclass`='".$class."'";        
			}
			if($roll_no !="")
			{
				$query=$query." and `srollno`='$roll_no'";
			}
			
			$result123= mysql_query($query);			
			$i=1;
			echo "<tr bgcolor='yellow'>";
	   		echo "<td style='width:50px;'><b>Sr.No</b></td>
			      <td style='width:50px;'><b>class</b></td>
				  <td><b>StudentName&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
				  <td style='width:50px;'><b>Roll No.</b></td>";
			
			$result=mysql_query("select * from studentdocument_type");
   		
            while($rs= mysql_fetch_array($result))
           {
?>
           <td><font face="Cambria"><?php echo $rs["DocumentType"]; ?></font></td>
<?php   	 
}
            echo "</tr>";
?>
</table>
<table   class="CSSTableGenerator" cellpadding="0" cellspacing="0" align="center" >
<?php
		    if(isset($_POST['Submit1'])) 
	        {
		    echo "</tr>";
			while($test = mysql_fetch_array($result123))
			{	
echo "<tr><td><input type='text'   name='srno'". $i."  value='".$test['srno']."'readonly style='background-color: #00579A; color: #FFFFFF; text-align:center;width:50px;'/</td>
		  <td><input type='text'  name='sclass'". $i." value='".$test['sclass']."' readonly style='background-color: #00579A; color: #FFFFFF;text-align:center;width:50px;''/></td>
		 <td><input type='text'  name='sname'". $i." value='".$test['sname']."' readonly style='background-color: #00579A; color: #FFFFFF; text-align:center;'/></td>
		 <td><input type='text'  name='srollno'". $i." value='".$test['srollno']."' readonly style='background-color: #00579A; color: #FFFFFF;text-align:center;width:50px;'/></td>";
			
		   $result=mysql_query("select * from studentdocument_type");
		   while($rs= mysql_fetch_array($result))
		   { 
		echo "<td style='padding:0px 0px 0px 10px';><input name='doc' type='text' value='' style='width:100px;'  /></td>" ;
		   }
		echo "</tr>";
		$i=$i+1;
		   }
		
	 }
}
?>
</table>

</form>

</body>


</html>
