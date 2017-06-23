<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>

<?php
		$ssqlClass="SELECT distinct `class` FROM `class_master`";
		$rsClass= mysql_query($ssqlClass);
		if($_REQUEST["isSubmit"]=="yes")
		{
			$SelectedClass=$_REQUEST["cboClass"];
			$SelectedRollNo=$_REQUEST["txtRollNo"];
			
			$ssql="select `srno`,`sname`,`sadmission`,`sclass`,`srollno`,`smobile` from `student_master` where 1=1";
			if($SelectedClass !="Select One")
			{
				$ssql=$ssql." and `sclass`='".$SelectedClass."'";        
			}
			if($SelectedRollNo !="")
			{
				$ssql=$ssql." and `srollno`='$SelectedRollNo'";
			}
			$rs= mysql_query($ssql);
		}
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Class Student Monthly Report</title>
<style type="text/css">
.style1 
	{
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
<table width="100%" style="border-collapse:collapse;" >
   <form name="frmRpt" method="post" action="stdattendancereportmonthly.php">
      <font face="Cambria">
      <input type="hidden" name="isSubmit" id="isSubmit" value="yes">
          </font>
          <tr>
             <td><p><font face="Cambria">Class:
                 <select name="cboClass">
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
             </font>
             </p>
             <p><font face="Cambria">&nbsp; </font> </p></td>
		  </tr>
		  <tr>
            <td><p><font face="Cambria">Month: 
              <input type="month" name="month" id="month" style="width:150px;">  
              <!--<input type="submit" value="click On" id="butt" name="butt" />-->
            </font>
            </p>
            <p><font face="Cambria">&nbsp; </font> </p></td>
		  </tr>
		  <tr>	
			<td><font face="Cambria">Roll No:<input name="txtRollNo" id="txtRollNo" type="text" style="width:100px;"></font></td>
		  </tr>
		  <tr>	
			<td style="text-align:center;">
			<font face="Cambria">
			<input name="Submit1" type="submit" value="Submit" style="font-weight: 700"></font></td>
         </tr>
</table>
<font face="Cambria">
<br>
				<?php
				if($_REQUEST["isSubmit"]=="yes")
				{
					
				?>

</font>

<table width="100%" style="border-collapse: collapse;" border="1">
			<?php
			
						$result=mysql_query("SELECT * FROM  student_master");
						$i=1;
						echo "<tr bgcolor='yellow'>";
						echo "<td style='width:80px; text-align:center;'><b>Sr.No</b></td>
							  <td style='width:50px; text-align:center;'><b>Class</b></td>
							  <td ><b>StudentName......................</b></td>
							  <td><b>RollNo.</b></td>";
						
						
						     $start_date=date("Y-m-d");
				             $end_date=date("Y-m-d");
				   
				             if(isset($_POST['Submit1']) && $_POST['month']!='') {
				  
							 $abc=explode('-',$_POST['month']);
							 $y= $abc[0];
							 $m= $abc[1];			  
							 $num = cal_days_in_month(CAL_GREGORIAN, $m, $y); 			 
							 $start_date=$y.'-'.$m.'-'.'1';
							 $end_date=$y.'-'.$m.'-'.($num==31)?'31':(($num==30)?'30':(($num==29)?'29':'28'));
						 
						     for($i = 0; $i <$num; $i++)
							 {
				                 $date = strtotime(date("Y-m-d", strtotime($start_date)) . " +$i day");
					             echo sprintf('<td style="padding:0px 0px 0px 10px";><input name="Text1" style="width: 25px;" type="text" value="'.date('d', $date).'" readonly/>                                                 <input name="Text1" style="width: 25px;" type="text" value="'.date('l', $date).'" readonly/></td>',$i,pow($i, 1) );
					         }
				    }
					
					else 
						{
						
					        for($i = 0; $i <=31	; $i++)
							{
				                echo sprintf('<td style="padding:0px 0px 0px 40px";><input name="Text1" style="width: 25px;" type="text" readonly />
								<input name="Text1"style="width:25px;" type="text" readonly /></td>',$i,pow($i, 1));
					         }		
					
					    }
					            echo "</tr>";
		    ?>
						
</table>
			
<table style="border:2px solid #993300; width:100%; height:auto;"   cellpadding="0" cellspacing="0" align="center" >
			
			<?php
			
			   while($test = mysql_fetch_array($result))
			      {
				     echo "<tr><td><input type='text'   name='srno'". $i."  value='".$test['srno']."'readonly style='width:50px; background-color: #00579A; color: #FFFFFF;                                    text-align:center;'/
					           </td>
				               <td><input type='text'  name='sclass'". $i." value='".$test['sclass']."' readonly style='width: 50px; background-color: #00579A; color: #FFFFFF;                                    text-align:center;'/>
							   </td>
				               <td><input type='text'  name='sname'". $i." value='".$test['sname']."' readonly style='background-color: #00579A; color: #FFFFFF;                                    text-align:center;'/>
							   </td>
				               <td><input type='text'  name='srollno'". $i." value='".$test['srollno']."' readonly style='width:50px; background-color: #00579A; color: #FFFFFF;                                    text-align:center;'/>
							   </td>";
				
			  for($i = 0; $i <$num; $i++)
			    { 
				     echo "<td style='padding:0px 0px 0px 10px';><input name='P' type='text' value='' style='width:25px;'  /></td>" ;
			    }
				     echo "</tr>";
				     $i=$i+1;
			    }
		     }	
	     ?>
</table>
<font face="Cambria">
</form>
</font>
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>