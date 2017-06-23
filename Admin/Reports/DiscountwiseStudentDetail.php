<?php 
include '../../connection.php'; 
include '../Header/Header3.php';
?>
<?php

	$ssql="select `financialyear`,`year` from `FYmaster` where `Status`='Active'";
		$rsF= mysql_query($ssql);
		while($row2 = mysql_fetch_row($rsF))
		{
			$CurrentFY=$row2[0];
			$CurrentY=$row2[1];
			break;
		}

	if($_REQUEST["isSubmit"]=="yes")
	{
		$ssql1="SELECT `DiscontType`,`sname`,`sfathername`,`sadmission`,`sclass`,`srollno`,`MasterClass` FROM `student_master` where 1=1";
		if ($_REQUEST["cboDiscountType"] !="")
		{
			$DiscountType=$_REQUEST["cboDiscountType"];
			//$ssql1="SELECT `DiscontType`,`sname`,`sfathername`,`sadmission`,`sclass`,`srollno`,`MasterClass` FROM `student_master` WHERE `DiscontType` !='' and `DiscontType` !='Select One' and `DiscontType`='$DiscountType'  order by `DiscontType`";
			$ssql1=$ssql1. " and `DiscontType` !='' and `DiscontType` !='Select One' and `DiscontType`='$DiscountType'";
			//$result=mysql_query($ssql1);
		}
		
		if($_REQUEST["cboSchoolName"] !="Select One")
		{
			$SchoolName=$_REQUEST["cboSchoolName"];
			$ssql1=$ssql1. " and `SchoolName`='$SchoolName'";
		}
		$result=mysql_query($ssql1);
	}
	
	$ssql="SELECT distinct `DiscontType` FROM `student_master` WHERE `DiscontType` !='' and `DiscontType` !='Select One'  order by `DiscontType`";
	$rsDiscountType=mysql_query($ssql);
?>
<script language="javascript">
	function Validate()
	{
		if(document.getElementById("cboDiscountType").value=="")
		{
			alert("Discount type is mandatory!");
			return;
		}
		document.getElementById("frmRpt").submit();
	}
</script>
<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />

<title>Student Discount Summary</title>


</head>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../tcal.css" />
	
	
<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="../tcal.js"></script>

<body>
<div>

					<strong><font face="Cambria" size="3"><br>Student Discount Summary</font></strong></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><font face="Cambria" size="3"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a>


</body></html>

<?php

?>


   	
    </font></p>	
    
    </table>
   	
<div align="center" id="MasterDiv">
<div class="style14">
	<table style="width: 600px" class="style15">
	<form name="frmRpt" id="frmRpt" method="post" action="">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
		<tr>
			<td style="width: 200px" class="style16">Discount Type</td>
			<td style="width: 200px">
			<select name="cboDiscountType" id="cboDiscountType" class="text-box">
			<option selected="" value="">Select One</option>
			<?php
			while($row= mysql_fetch_array($rsDiscountType))
 			{
	 			$DiscountType=$row[0];
	 		?>
	 		<option value="<?php echo $DiscountType;?>"><?php echo $DiscountType;?></option>
	 		<?php
	 		}
	 		?>
			</select></td>
			<td style="width: 200px">
			&nbsp;</td>
		</tr>	
		<tr>
			<td style="width: 200px" class="style16">School Name</td>
			<td style="width: 200px">
			<select name="cboSchoolName" id="cboSchoolName" class="text-box">
			<option selected="" value="Select One">Select One</option>
			<option value="JPS">JPS</option>
			<option value="ANKUR">ANKUR</option>
			</select></td>
			<td style="width: 200px">
			<input name="btnSubmit" type="button" value="Submit" onclick="Javascript:Validate();" class="text-box"></td>
		</tr>	
	</form>
	</table>
<style type="text/css">
.style6 {
	border: 1px solid #000000;
	font-face: Cambria;
		align: center;
		font-family: Cambria;
	font-weight: bold;
}
.style9 {
	border-color: #000000;
	border-width: 0px;
	border-collapse: collapse;
	}
.style11 {
	border: 1px solid #000000;
	font-face: Cambria;
	font-size: 12;
	align: center;
}
.style12 {
	border: 1px solid #000000;
	font-face: Cambria;
	font-size: 12;
	align: center;
	font-weight: bold;
}
.style13 {
	border: 1px solid #000000;
	font-face: Cambria;
	font-size: 12pt;
	align: center;
	text-align: right;
	font-family: Cambria;
}
.style14 {
	text-align: left;
}
.style15 {
	border-collapse: collapse;
}
.style16 {
	font-family: Cambria;
	font-size: 12pt;
}
</style>

   	</div>
   	<table class="CSSTableGenerator" cellpadding="0" >

<tr>
		   <td   align="center" class="style12" bgcolor="#95C23D" style="width: 42px"   >
			<font face="Cambria" size="3">Sr No</font></td>
		   
		  
			<td   align="center" class="style6" bgcolor="#95C23D" style="width: 115px" >
			Discount Type</td>
		   
		  
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 115px" >
			<font face="Cambria" size="3">Student Name</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 115px" >
			<font face="Cambria" size="3">Father&#39;s Name</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 115px" >
			<font face="Cambria" size="3">Admission Id</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 116px" >
			<font face="Cambria" size="3">Class</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 116px" >
			<font face="Cambria" size="3">Roll No</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 116px" >
			<font face="Cambria" size="3">Q1</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 116px" >
			<font face="Cambria" size="3">Q2</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 116px" >
			<font face="Cambria" size="3">Q3</font></td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 116px" >
			Q4</td>
   		  
   		 
   		   
	
		   

		   			   
			<td   align="center" class="style12" bgcolor="#95C23D" style="width: 85px" >
			Total Discount Amount</td>
   		  
   		 
   		   
	
		   

		   			   
   	</tr>
	<?php
		$RecCount=1;
		$Q1Total=0;
		$Q2Total=0;
		$Q3Total=0;
		$Q4Total=0;
		$TotalDiscountAmount=0;
		while($cnt= mysql_fetch_array($result))
 		{
	 		$DiscontType=$cnt[0];
	 		$sname=$cnt[1];
	 		$fname=$cnt[2];
	 		$sadmission=$cnt[3];
	 		$sclass=$cnt[4];
	 		$srollno=$cnt[5];
	 		$MasterClass=$cnt[6];
	 		
	 		$rsDis=mysql_query("select `percentage`,`FixAmount`,`head` from `discounttable` where `discounttype`='$DiscontType'");
	 		$Q1DiscountAmount=0;
	 		$Q2DiscountAmount=0;
	 		$Q3DiscountAmount=0;
	 		$Q4DiscountAmount=0;
	 		while($row= mysql_fetch_array($rsDis))
 			{
 				$percentage=$row[0];
 				$FixAmount=$row[1];
 				$head=$row[2];
 				
	 			$rsQ1=mysql_query("select `amount` from `fees_master` where `class`='$MasterClass' and `feeshead`='$head' and `quarter`='Q1' and `financialyear`='2015'");
		 		if (mysql_num_rows($rsQ1) > 0)
				{
					while($row= mysql_fetch_array($rsQ1))
		 			{
		 				if($percentage !="")
		 				{
		 					$Q1DiscountAmount=$Q1DiscountAmount+ (int)$row[0]*$percentage/100;
		 				}
		 				else
		 				{
		 					$Q1DiscountAmount=$Q1DiscountAmount+ (int)$FixAmount;
		 				}
		 				break;
		 			}
	 			}
	 			
	 			$rsQ2=mysql_query("select `amount` from `fees_master` where `class`='$MasterClass' and `feeshead`='$head' and `quarter`='Q2' and `financialyear`='2015'");
		 		if (mysql_num_rows($rsQ2) > 0)
				{
					while($row= mysql_fetch_array($rsQ2))
		 			{
		 				if($percentage !="" || $percentage>0)
		 				{
		 					$Q2DiscountAmount=$Q2DiscountAmount+ (int)$row[0]*$percentage/100;
		 				}
		 				else
		 				{
		 					$Q2DiscountAmount=$Q2DiscountAmount+ (int)$FixAmount;
		 				}
		 				break;
		 			}
	 			}
	 			$rsQ3=mysql_query("select `amount` from `fees_master` where `class`='$MasterClass' and `feeshead`='$head' and `quarter`='Q3' and `financialyear`='2015'");
		 		if (mysql_num_rows($rsQ3) > 0)
				{
					while($row= mysql_fetch_array($rsQ3))
		 			{
		 				if($percentage !="")
		 				{
		 					$Q3DiscountAmount=$Q3DiscountAmount+ (int)$row[0]*$percentage/100;
		 				}
		 				else
		 				{
		 					$Q3DiscountAmount=$Q3DiscountAmount+ (int)$FixAmount;
		 				}
		 				break;
		 			}
	 			}
	 			$rsQ4=mysql_query("select `amount` from `fees_master` where `class`='$MasterClass' and `feeshead`='$head' and `quarter`='Q4' and `financialyear`='2015'");
		 		if (mysql_num_rows($rsQ4) > 0)
				{
					while($row= mysql_fetch_array($rsQ4))
		 			{
		 				if($percentage !="")
		 				{
		 					$Q4DiscountAmount=$Q4DiscountAmount+ (int)$row[0]*$percentage/100;
		 				}
		 				else
		 				{
		 					$Q4DiscountAmount=$Q4DiscountAmount+ (int)$FixAmount;
		 				}
		 				break;
		 			}
	 			}
	 		}
	 	$Q1Total=$Q1Total+$Q1DiscountAmount;
		$Q2Total=$Q2Total+$Q2DiscountAmount;
		$Q3Total=$Q3Total+$Q3DiscountAmount;
		$Q4Total=$Q4Total+$Q4DiscountAmount;
		
		$rsTotalDiscountAmount=mysql_query("select Sum(discountamount) from `fees_student1` where `sadmission`='$sadmission' and `financialyear`='$CurrentY'");
		$row2 = mysql_fetch_row($rsTotalDiscountAmount);
		$TotalDiscountAmount=$row2[0];
		
		$FinalTotalDiscountAmount=$FinalTotalDiscountAmount+$TotalDiscountAmount;

		 		
	?>
   	<tr>
		    <td  align="center" class="style11" style="width: 42px"><font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
			<td   align="center" class="style11" style="width: 115px"><font face="Cambria" size="3"><?php echo $DiscontType;?></font></td>
		  	<td   align="center" class="style11" style="width: 115px"><font face="Cambria" size="3"><?php echo $sname;?></font></td>   		   
			<td   align="center" class="style11" style="width: 115px"><font face="Cambria" size="3"><?php echo $fname;?></font></td>
			<td   align="center" class="style11" style="width: 115px"><font face="Cambria" size="3"><?php echo $sadmission;?></font></td>
			<td   align="center" class="style11" style="width: 116px"><font face="Cambria" size="3"><?php echo $sclass;?></font></td>
			<td   align="center" class="style11" style="width: 116px"><font face="Cambria" size="3"><?php echo $srollno;?></font></td>
			<td   align="center" class="style11" style="width: 116px"><font face="Cambria" size="3"><?php echo $Q1DiscountAmount;?></font></td>
			<td   align="center" class="style11" style="width: 116px"><font face="Cambria" size="3"><?php echo $Q2DiscountAmount;?></font></td>
			<td   align="center" class="style11" style="width: 116px"><font face="Cambria" size="3"><?php echo $Q3DiscountAmount;?></font></td>
			<td   align="center" class="style11" style="width: 116px">&nbsp;</td>
			<td   align="center" class="style11" style="width: 85px"><?php echo $TotalDiscountAmount; ?></td>
   	</tr>
   	<?php
   		$RecCount=$RecCount+1;
   		}
   	?>
   		<tr>
		    <td class="style13" colspan="7"><strong>Total :</strong></td>
			<td   align="center" class="style11" style="width: 116px"><font face="Cambria" size="3">
			<strong><?php echo $Q1Total;?></strong></font></td>
			<td   align="center" class="style11" style="width: 116px"><font face="Cambria" size="3"><strong><?php echo $Q2Total;?>	</strong></font></td>
			<td   align="center" class="style11" style="width: 116px"><font face="Cambria" size="3">
			<strong><?php echo $Q3Total;?></strong></font></td>
			<td   align="center" class="style11" style="width: 116px">&nbsp;</td>
			<td   align="center" class="style11" style="width: 85px"><?php echo $FinalTotalDiscountAmount; ?></td>
   	</tr>

   	</table>
   		</div>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>
   		