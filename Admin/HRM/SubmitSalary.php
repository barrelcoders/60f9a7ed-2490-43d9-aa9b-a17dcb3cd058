<?php include '../../connection.php';?>
<?php
$EmpId=$_REQUEST["EmpId"];
$Month=$_REQUEST["Month"];

	$ssql="SELECT `Name`,`Designation`,`Department`,`role` FROM `employee_master` where `EmpId`='$EmpId'";
	$rsEmpDetail= mysql_query($ssql);
	while($row = mysql_fetch_row($rsEmpDetail))
	{
		$EmpName = $row[0];
		$EmpDesignation = $row[1];
		$EmpDepartment = $row[2];
		$EmpRole= $row[3];
	}

$ssql="SELECT max(`SalaryRcptNo`) FROM `Employee_Salary_Calaculation`";	
$rsReceipt= mysql_query($ssql);
if (mysql_num_rows($rsReceipt) == 0)
{
	$ReceiptNo=1;
}
else
{
	while($row = mysql_fetch_row($rsReceipt))
	{
		$ReceiptNo = $row[0]+1;
		break;
	}
}
	
$CountOfEarningComponent=$_REQUEST["CountOfEarningComponent"];
for($i=1;$i<=$CountOfEarningComponent;$i++)
{
	$ctrlControlName="txtComponentName".$i;
	$EarningComponentName=$_REQUEST[$ctrlControlName];
	$EarningComponentValue=$_REQUEST["txtComonentValue".$i];
	//echo $_REQUEST[$ctrlControlName].":".$_REQUEST["txtComonentValue".$i]."<BR>";
	$ssql="INSERT INTO `Employee_Salary_Calaculation` (`SalaryRcptNo`,`EID` ,`EmployeeName` ,`Department`,`Role`,`Designation`,`ComponentName`,`ComponentType`,`Amount`,`Month`,`financialyear`) VALUES('$ReceiptNo','$EmpId','$EmpName','$EmpDepartment','$EmpRole','$EmpDesignation','$EarningComponentName','Earning','$EarningComponentValue','$Month','$2014')";
	mysql_query($ssql) or die(mysql_error());
}

$CountOfDeductionComponent=$_REQUEST["CountOfDeductionComponent"];
for($i=1;$i<=$CountOfDeductionComponent;$i++)
{
	$ctrlControlName="txtDeductionComponentName".$i;
	$DeductionComponentName=$_REQUEST[$ctrlControlName];
	$DeductionComponentValue=$_REQUEST["txtDeductionComponentValue".$i];
	//echo $_REQUEST[$ctrlControlName].":".$_REQUEST["txtDeductionComponentValue".$i]."<BR>";
	$ssql="INSERT INTO `Employee_Salary_Calaculation` (`SalaryRcptNo`,`EID` ,`EmployeeName` ,`Department`,`Role`,`Designation`,`ComponentName`,`ComponentType`,`Amount`,`Month`,`financialyear`) VALUES('$ReceiptNo','$EmpId','$EmpName','$EmpDepartment','$EmpRole','$EmpDesignation','$DeductionComponentName','Deduction','$DeductionComponentValue','$Month','$2014')";
	mysql_query($ssql) or die(mysql_error());
}

?>
<script language="javascript">
function CalculatTotal()
{
	try
    {    
		// Firefox, Opera 8.0+, Safari    
		xmlHttp=new XMLHttpRequest();
	}
  	catch (e)
    {    // Internet Explorer    
		try
	    {      
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	    }
	    catch (e)
	    {      
		  	try
		    { 
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		    catch (e)
		    {        
				alert("Your browser does not support AJAX!");        
				return false;        
			}      
  		}    
	}
	var TotalEarningComponent=document.getElementById("CountOfEarningComponent").value;
	var TotalDeductionComponent=document.getElementById("CountOfDeductionComponent").value;
	//TotalEarning=number(0);
	var TotalEarning=0;
	for(var i=1;i<=TotalEarningComponent;i++)
	{
		EarningValue=document.getElementById('txtComonentValue'+i).value;
		TotalEarning = TotalEarning + parseInt(EarningValue);

		//alert(TotalEarning);
		//$TotalEarningValue=parsefloat($TotalEarningValue) + parsefloat(EarningValue);
		
		//alert($TotalEarningValue);	
	}
	document.getElementById("txtTotalEarning").value=TotalEarning;
	
	var TotalDeduction=0;
	for(var i=1;i<=TotalDeductionComponent;i++)
	{
		DeductionValue=document.getElementById('txtDeductionComponentValue'+i).value;
		TotalDeduction= TotalDeduction + parseInt(DeductionValue);

		//alert(TotalEarning);
		//$TotalEarningValue=parsefloat($TotalEarningValue) + parsefloat(EarningValue);
		
		//alert($TotalEarningValue);	
	}
	document.getElementById("txtTotalDeduction").value=TotalDeduction;
	
	document.getElementById("txtNetSalary").value = TotalEarning + TotalDeduction;
	
	///Retrieve Number to Word Value by calling AJAX
	xmlHttp.onreadystatechange=function()
      	{
		      if(xmlHttp.readyState==4)
		        {
					var rows="";
		        	rows=new String(xmlHttp.responseText);
		        	alert(rows);
		        	document.getElementById("tdNetSalary").innerHTML="<p align='right'><font face='Cambria'>Rupees: " + rows + "</font>";
		        	return;		        		
				}
		}
		var submiturl="GetNumberToWord.php?NetSalary=" + document.getElementById("txtNetSalary").value;
		xmlHttp.open("GET", submiturl,true);
		xmlHttp.send(null);
	
}
function CreatePDF() 
{
       //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        //document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
		//document.frmPDF.htmlcode.value = "<html><head><title></title></head><body>" + divElements + "</body>";
		document.frmPDF.htmlcode.value = divElements;
		//alert(document.frmPDF.htmlcode.value);
		//document.frmPDF.submit;
		document.getElementById("frmPDF").submit();
		//document.all("frmPDF").submit();
		return;
		//alert(document.getElementById("htmlcode").value);		 
        //Print Page
        //window.print();
        //var FileLocation="http://emeraldsis.com/Admin/Fees/CreatePDF.php?htmlcode=" + escape(document.body.innerHTML);
		//window.location.assign(FileLocation);
		//return;
}
</script>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Salary Slip - Month -</title>
</head>

<body onload="Javascript:CreatePDF();">
<div id="MasterDiv">
<style type="text/css">
.style1 {
	text-align: left;
	font-weight: bold;
	border: 1px solid #000000;
}
.style2 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style3 {
	border: 1px solid #000000;
}
.style4 {
	font-weight: bold;
	border: 1px solid #000000;
}
</style>
<table cellspacing="0" cellpadding="0" style="width: 100%;" class="style2">
	<tr>
		<td colspan="6" class="style4">
		<p align="center"><font face="Cambria">Salary Slip - Month - </font>
		</td>
	</tr>
	<tr>
		<td width="206" class="style3"><font face="Cambria">Employee Name</font></td>
		<td width="206" class="style3"><?php echo $EmpName; ?></td>
		<td width="207" class="style3"><font face="Cambria">Employee Code</font></td>
		<td colspan="3" style="width: 451px" class="style3"><?php echo $EmpId; ?></td>
	</tr>
	<tr>
		<td width="206" class="style3"><font face="Cambria">Designation</font></td>
		<td width="206" class="style3"><?php echo $EmpDesignation; ?></td>
		<td width="207" class="style3"><font face="Cambria">Month</font></td>
		<td colspan="3" style="width: 451px" class="style3"><?php echo $Month; ?></td>
	</tr>
	<tr>
		<td width="206" class="style3"><font face="Cambria">Department</font></td>
		<td width="206" class="style3"><?php echo $EmpDepartment; ?></td>
		<td width="207" class="style3"><font face="Cambria">PF No</font></td>
		<td colspan="3" style="width: 451px" class="style3">&nbsp;</td>
	</tr>
	<tr>
		<td width="206" class="style3"><font face="Cambria">No. of Days In Month</font></td>
		<td width="206" class="style3">&nbsp;</td>
		<td width="207" class="style3"><font face="Cambria">Paid Days</font></td>
		<td colspan="3" style="width: 451px" class="style3">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" style="width: 1240px" class="style4">
		<p align="center"><font face="Cambria">Earnings</font></td>
		<td width="620" style="width: 206px" class="style3">
		&nbsp;</td>
		<td colspan="3" style="width: 458px" class="style4">
		<p align="center"><font face="Cambria">Deductions</font></td>
	</tr>
	<tr>
		<td width="206" class="style1" rowspan="5" valign="top"><font face="Cambria">
		<!--Basic<br>HRA<br>DA (Dearness Allowance)<br>Medical Allowance<br>Travel Allowance-->
		<?php
		//echo $strComponentName;
		for($i=1;$i<=$CountOfEarningComponent;$i++)
		{
			$ctrlControlName="txtComponentName".$i;
			$EarningComponentName=$_REQUEST[$ctrlControlName];
			echo $_REQUEST[$ctrlControlName]."<BR>";
		}
		?>
		</font></td>
		<td width="206" align="center" class="style3" rowspan="5" valign="top">
		<?php
		$rowcount=0;
		$TotalEarning=0;
		$rowcount=0;
		for($i=1;$i<=$CountOfEarningComponent;$i++)
		{
			$ctrlControlName="txtComponentName".$i;
			$EarningComponentName=$_REQUEST[$ctrlControlName];
			$EarningComponentValue=$_REQUEST["txtComonentValue".$i];
			$rowcount=$rowcount+1;	
			$TotalEarning=$TotalEarning+$EarningComponentValue;
		?>
		<input type="hidden" name="txtComponentName<?php echo $i;?>" id="txtComponentName<?php echo $i;?>" value="<?php echo $EarningComponentName;?>">
		<input type="text" name="txtComonentValue<?php echo $i;?>" id="txtComonentValue<?php echo $i;?>" value="<?php echo (int)$EarningComponentValue;?>" onkeyup="Javascript:CalculatTotal();">
		<?php
		}
		?>
		<input type="hidden" name="CountOfEarningComponent" id="CountOfEarningComponent" value="<?php echo $rowcount;?>">
		</td>
		<td width="207" align="center" class="style3">&nbsp;</td>
		<td class="style1" style="width: 200px" rowspan="5" valign="top"><font face="Cambria">
		<?php 
		//echo $strDeductionComponentName;
		for($i=1;$i<=$CountOfDeductionComponent;$i++)
		{
			$ctrlControlName="txtDeductionComponentName".$i;
			$DeductionComponentName=$_REQUEST[$ctrlControlName];
			//$DeductionComponentValue=$_REQUEST["txtDeductionComponentValue".$i];
			echo $_REQUEST[$ctrlControlName]."<BR>";
		}
		?>
		
		</font></td>
		<td align="center" colspan="2" style="width: 284px" class="style3" rowspan="5" valign="top">
		<?php
		$rowcount=0;
		$TotalDeduction=0;
		for($i=1;$i<=$CountOfDeductionComponent;$i++)
		{
			$ctrlControlName="txtDeductionComponentName".$i;
			$DeductionComponentName=$_REQUEST[$ctrlControlName];
			$DeductionComponentValue=$_REQUEST["txtDeductionComponentValue".$i];
			//echo $_REQUEST[$ctrlControlName].":".$_REQUEST["txtDeductionComponentValue".$i]."<BR>";

			$TotalDeduction=$TotalDeduction+$DeductionComponentValue;
			$rowcount=$rowcount+1;
		?>
		<input type="hidden" name="txtDeductionComponentName<?php echo $rowcount;?>" id="txtDeductionComponentName<?php echo $rowcount;?>" value="<?php echo $DeductionComponentName;?>">
		<input type="text" name="txtDeductionComponentValue<?php echo $rowcount;?>" id="txtDeductionComponentValue<?php echo $rowcount;?>" value="<?php echo $DeductionComponentValue;?>"><br>
		<?php
		}
		?>
		<input type="hidden" name="CountOfDeductionComponent" id="CountOfDeductionComponent" value="<?php echo $rowcount;?>">
		</td>
	</tr>
	<tr>
		<td width="207" align="center" class="style3">&nbsp;</td>
	</tr>
	<tr>
		<td width="207" align="center" class="style3">&nbsp;</td>
	</tr>
	<tr>
		<td width="207" align="center" class="style3">&nbsp;</td>
	</tr>
	<tr>
		<td width="207" align="center" class="style3">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" colspan="6" style="width: 1088px" class="style3">
		<p align="center">&nbsp;</td>
	</tr>
	<tr>
		<td width="206" align="center" class="style3">&nbsp;</td>
		<td width="206" align="center" class="style3">&nbsp;</td>
		<td width="207" align="center" class="style3">&nbsp;</td>
		<td align="center" style="width: 200px" class="style3">&nbsp;</td>
		<td align="center" colspan="2" style="width: 284px" class="style3">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" colspan="6" height="22" style="width: 1088px" class="style3">
		&nbsp;</td>
	</tr>
	<tr>
		<td width="206" align="center" class="style4"><font face="Cambria">Total 
		Earnings</font></td>
		<td width="204" align="center" class="style3"><input type="text" name="txtTotalEarning" id="txtTotalEarning" value="<?php echo $TotalEarning;?>"></td>
		<td width="206" align="center" class="style4"><font face="Cambria">Total 
		Deductions</font></td>
		<td align="center" style="width: 200px" class="style3">
		<input type="text" name="txtTotalDeduction" id="txtTotalDeduction" value="<?php echo $TotalDeduction;?>">
		</td>
		<td width="146" align="center" style="width: 137px" class="style4"><font face="Cambria">
		Net Salary</font></td>
		<td width="86" align="center" style="width: 137px" class="style3">
		<input type="text" name="txtNetSalary" id="txtNetSalary" value="<?php echo ($TotalEarning- $TotalDeduction);?>">
		</td>
	</tr>
	<tr>
		<td align="center" colspan="6" style="width: 1072px" class="style3" id="tdNetSalary">
		<?php
		$NetSalary=($TotalEarning- $TotalDeduction);
		?>
		<p align="right"><font face="Cambria">Rupees: <?php echo number_to_word( $NetSalary );?></font></td>
	</tr>
</table>
<form name="frmPDF" id="frmPDF" method="post" action="StorePDF.php">
	<span style="font-size: 11pt">
	<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
	<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $ReceiptNo;?>">
	</span>
</form>
</div>
</body>

</html>

<?php
function number_to_word( $num = '' )
{
    $num    = ( string ) ( ( int ) $num );
   
    if( ( int ) ( $num ) && ctype_digit( $num ) )
    {
        $words  = array( );
       
        $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
       
        $list1  = array('','one','two','three','four','five','six','seven',
            'eight','nine','ten','eleven','twelve','thirteen','fourteen',
            'fifteen','sixteen','seventeen','eighteen','nineteen');
       
        $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
            'seventy','eighty','ninety','hundred');
       
        $list3  = array('','thousand','million','billion','trillion',
            'quadrillion','quintillion','sextillion','septillion',
            'octillion','nonillion','decillion','undecillion',
            'duodecillion','tredecillion','quattuordecillion',
            'quindecillion','sexdecillion','septendecillion',
            'octodecillion','novemdecillion','vigintillion');
       
        $num_length = strlen( $num );
        $levels = ( int ) ( ( $num_length + 2 ) / 3 );
        $max_length = $levels * 3;
        $num    = substr( '00'.$num , -$max_length );
        $num_levels = str_split( $num , 3 );
       
        foreach( $num_levels as $num_part )
        {
            $levels--;
            $hundreds   = ( int ) ( $num_part / 100 );
            $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
            $tens       = ( int ) ( $num_part % 100 );
            $singles    = '';
           
            if( $tens < 20 )
            {
                $tens   = ( $tens ? ' ' . $list1[$tens] . ' ' : '' );
            }
            else
            {
                $tens   = ( int ) ( $tens / 10 );
                $tens   = ' ' . $list2[$tens] . ' ';
                $singles    = ( int ) ( $num_part % 10 );
                $singles    = ' ' . $list1[$singles] . ' ';
            }
            $words[]    = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' );
        }
       
        $commas = count( $words );
       
        if( $commas > 1 )
        {
            $commas = $commas - 1;
        }
       
        $words  = implode( ', ' , $words );
       
        //Some Finishing Touch
        //Replacing multiples of spaces with one space
        $words  = trim( str_replace( ' ,' , ',' , trim_all( ucwords( $words ) ) ) , ', ' );
        if( $commas )
        {
            //$words  = str_replace_last( ',' , ' and' , $words );
            $words  = str_replace( ',' , '' , $words );
        }
       
        return $words;
    }
    else if( ! ( ( int ) $num ) )
    {
        return 'Zero';
    }
    return '';
}
function trim_all( $str , $what = NULL , $with = ' ' )
{
    if( $what === NULL )
    {
        //  Character      Decimal      Use
        //  "\0"            0           Null Character
        //  "\t"            9           Tab
        //  "\n"           10           New line
        //  "\x0B"         11           Vertical Tab
        //  "\r"           13           New Line in Mac
        //  " "            32           Space
       
        $what   = "\\x00-\\x20";    //all white-spaces and control chars
    }
   
    return trim( preg_replace( "/[".$what."]+/" , $with , $str ) , $what );
}
?>