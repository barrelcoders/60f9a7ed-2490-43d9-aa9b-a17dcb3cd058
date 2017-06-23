<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
	include '../Header/Header3.php';

?>
<?php 
$EmpId=$_REQUEST["txtEmpId"];

$ssql="SELECT `EmpId`,`EmpName`,`Department`,`Designation`,`Answer`,`Rating`,`Question`,`PrincipalRemark`,`PrincipalRemark1`,`PrincipalComment` from `Employee_ACR_HODAssesment`  where `EmpId`='$EmpId'";
//echo $ssql;
//exit();
$rsQuestion=mysql_query($ssql);
$rsEmpDetail=mysql_query("SELECT `Name`,`Department`,`Designation` from `employee_master` where `EmpId`='$EmpId'");
$rowEmpDetail=mysql_fetch_row($rsEmpDetail);
{
    $EmpName=$rowEmpDetail[0];
    $Department=$rowEmpDetail[1];
    $Designation=$rowEmpDetail[2];

}


?>

<script language="javascript">

function GetRating(cnt)

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

			 xmlHttp.onreadystatechange=function()

		      {

			      if(xmlHttp.readyState==4)

			        {

						var rows="";

						var Rating="";

			        	rows=new String(xmlHttp.responseText);
						//alert(rows);
			        	//removeAllOptions(document.frmGroupSMS.lstSelectedGroupMember);
						document.getElementById("txtRating"+cnt).value=rows;
			        													

			        }

		      }

			var submiturl="GetRating.php?Answer="+ document.getElementById("txtAnswer"+cnt).value + "";

			xmlHttp.open("GET", submiturl,true);

			xmlHttp.send(null);			

}

function removeAllOptions(selectbox)

	{

		var i;

		for(i=selectbox.options.length-1;i>=0;i--)

		{

			selectbox.remove(i);

		}

	}

	function removeOption(selectbox,indx)

	{

		var i;

		i=indx;

			selectbox.remove(i);

	}

	function addOption(selectbox,text,value )

	{

		var optn = document.createElement("OPTION");

		optn.text = text;

		optn.value = value;

		selectbox.options.add(optn);

	}


function Validate()
{
    if(document.getElementById("txtEmpNo").value.trim()=="")
	{
		alert ("Please Select and Employee !");
		return;
	}
	

	document.getElementById("frmEmployeeACR").submit();
}


function fnlProceed(EmpId)
{
	var txt;
	if(document.getElementById("txtFilledRemark").value !="")
	{
		var r = confirm("Are you sure, You want to edit remarks?");
		if (r == true) 
		{
		    //txt = "You pressed OK!";
		    var URL="FillPrincipalAssesment.php?txtEmpId=" + EmpId;
			var myWindow = window.open(URL, "", "width=200,height=100");
		} 
		else 
		{
		    //txt = "You pressed Cancel!";
		    return;
		}
		
		
	}
	else
	{
	  var URL="FillPrincipalAssesment.php?txtEmpId=" + EmpId;
			var myWindow = window.open(URL, "", "width=200,height=100");

	}
}

</script>



<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>ACR</title>
	<link rel="stylesheet" type="text/css" href="../tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="../tcal.js"></script>

</head>

<body>
<div id="MasterDiv">
<div align="center">
<table width="100%">
<tr>
<td>
<h1 align="center"><b><font face="Cambria">
<img src="<?php echo $SchoolLogo; ?>" height="100px" width="400px"></font></b></h1>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b><?php echo $SchoolAddress; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
&nbsp;</td>
</tr>
</table>
<table id="table_10" style="width: 100%" cellspacing="0" cellpadding="0" class="style15">
	<tr>
		<td class="style16">
<p  style="height: 12px" align="center">
<strong><font face="Cambria" style="font-size: 14pt">Annual Confidential Report</font></strong></p>
<p  style="height: 12px" align="left" class="style25">&nbsp;</p>
</td>
</tr>
<tr>
		<td class="style16">
<p  style="height: 12px" align="center" class="style25"><font face="Cambria"><b>HOD/ HM/ VICE- 
PRINCIPAL ASSESSMENT&nbsp;&nbsp;-&nbsp;&nbsp;<?php echo $EmpId; ?>&nbsp;&nbsp; -&nbsp;&nbsp;<?php echo $EmpName; ?></b></font></p>
</td>
</tr>
		</table>
		<font face="Cambria">
		<br>
		<br>
		</font>
		<form name="frmEmployeeACR" id="frmEmployeeACR" method="post" action="SubmitACRHodAssesmentTeaching.php" enctype="multipart/form-data">
		
        

		<font face="Cambria">
 <br>
 <br>
	</font>
	<table class="name" width="100%" cellpadding="0" style="border-collapse: collapse" border="1">
 <tr>
  <td>
 
 <b>
 
 <font face="Cambria">Srno</font></b></td>
  <td>
 
 <b>
 
 <font face="Cambria">Question</font></b></td>
 <!--- <td>
 
 <b>
 
 <font face="Cambria">Rating</font></b></td>--->

  <td>
 
 <b>
 
 <font face="Cambria">Answer</font></b></td>

  <td>
 
 <font face="Cambria"><b>Rating</b></font></td>
 </tr>
 <?php 
 
 $recno=1;
 while($row=mysql_fetch_row($rsQuestion))
 
 {
 
      $Question=$row[6];
      $Answer=$row[4];
      $Rating=$row[5];
      $Remark1=$row[7];
      $Remark2=$row[8];
      $Comment=$row[9];

      
      $TotalRating=$TotalRating+$Rating;
?>
 <tr>
  <td>
 <font face="Cambria">
 <?php echo $recno; ?>
 </font>
 </td>
  <td>
 
 <font face="Cambria">
 
 <?php echo $Question; ?></font></td>
 <!--<td>
			<font face="Cambria">
			<input name="txtRating" id="txtRating" style="float: left"  class="text-box"></font></td>--->
 <td>
 <font face="Cambria">
 <?php echo $Answer; ?></font></td>
 <td>
 <font face="Cambria">
 </font>
 &nbsp;
 <?php echo $Rating; ?></font></td>
 </tr>
 <tr>
 
 

 <?php 
 $recno=$recno+1;
 }
 ?>
 <tr>
 
 <td colspan="3">
 
 <p align="right"><b><font face="Cambria">Total</font></b></td>
 
 <td>
 
 <b><font face="Cambria">
 
 <?php echo $TotalRating; ?></font></b></td>
 </tr>
 
 <tr>
 
 <td colspan="4">
 
 <p align="center">
			<font face="Cambria">
			&nbsp;<input type="hidden" name="hTotalRecno" id="hTotalRecno" value="<?php echo $recno;?>">
			<input type ="hidden" name ="txtFilledRemark" id="txtFilledRemark" value ="<?php echo $Comment;?>">
			</font></td>
 </tr>
 
 </form>
</table>
	<p align=center>
	<table border="1" width="100%" style="border-collapse: collapse">
		<tr>
			<td><b><font face="Cambria">Principal's Remark</font></b></td>
			<td><b><font face="Cambria">Special Mention</font></b></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><b><font face="Cambria"><?php echo $Remark1; ?></font></b></td>
			<td><b><font face="Cambria"><?php echo $Comment; ?></font></b></td>
			<td>&nbsp;</td>
		</tr>
	</table>
	</p>
</div>

</div>
	<p align="center">
<font face="Cambria"><font face="Cambria">
<!--
<a href='FillPrincipalAssesment.php?txtEmpId=<?php echo $EmpId;?>' target='_blank'>
<strong><input name="BtnSubmit" size="500" type=button value="Proceed to Fill Principal's Assessment "  style="font-weight: 700"></strong></a>
-->
<strong><input name="BtnSubmit" size="500" type=button value="Proceed to Fill Principal's Assessment "  style="font-weight: 700" onclick ="javascript:fnlProceed('<?php echo $EmpId;?>');"></strong>
</font><br>

		&nbsp;</font></div>
		

<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a>
<br>
<br>
<br>

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


</font>


</body>

</html>