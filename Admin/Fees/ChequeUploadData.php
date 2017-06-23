<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$ssql="SELECT a.`srno`,a.`sadmission`,a.`sname`,a.`class`,a.`rollno`,a.`challanno`,a.`quarter`,a.`bankamount`,a.`challanamount`,a.`latefees`,DATE_FORMAT(a.`BankChallanDate`,'%d-%m-%Y'),(select `sname` from `student_master` where `sadmission`=a.`sadmission` limit 1) as `studentmaster_sname`,`ChequeNo` FROM `fees_challan_bank` as `a` where `Reco`='Pending'  order by `srno`";
$rs= mysql_query($ssql);
$num_rows=0;
?>
<script language="javascript">

function ShowEdit(SrNo)
{	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("EditStudentMaster.php?srno=" + SrNo ,"","width=300,height=400");
}
function fnlEdit(srno)
{
	var ctrlButton="btnEdit" + srno;
	var r = confirm("Are you sure, you want to delete this entry?");
	if(r==true)
	{
		document.getElementById(ctrlButton).disabled=true;
		var myWindow = window.open("BankDataEdit.php?srno=" + srno ,"","width=300,height=400");
	}
}
function Validate(srno,bankamount,challanamount)
{
//alert(srno);
var ctrlButton="B1" + srno;
document.getElementById(ctrlButton).disabled=true;
if(bankamount !=challanamount)
{
	//alert("Not Eual!");
	var r = confirm("Pls note bank data is not equal to challan data! Are you sure?");
	
	if(r==true)
	{
		var myWindow = window.open("BankRecoaction.php?srno=" + srno ,"","width=300,height=400");
		document.getElementById(ctrlButton).disabled=true;
	}
	reuturn;
}
var r = confirm("Are you sure?");
	if(r==true)
	{
		var myWindow = window.open("BankRecoaction.php?srno=" + srno ,"","width=300,height=400");		
		document.getElementById(ctrlButton).disabled=true;
	}

return;
}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Fees Master</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

	

<style type="text/css">

.style2 {

	border-collapse: collapse;

	border-style: solid;

	border-width: 0px;

}

.style4 {

	font-family: Cambria;

	font-size: 15px;

	color: #FFFFFF;

	font-weight: bold;

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


.auto-style20 {
	border-collapse: collapse;
	border-width: 0px;
	font-size: medium;
}

.auto-style22 {
	color: #000000;
}
.auto-style23 {
	border: medium none #FFFFFF;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
	text-align: left;
	background-color: #FFFFFF;
}

.auto-style6 {
	color: #DAB9C1;
}

.auto-style24 {
	border-style: none;
	border-width: medium;
}
.auto-style25 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 0px;
}

.auto-style3 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 15px;
	color: #CEAA9E;
}

.style5 {
	font-family: Cambria;
	font-size: 15px;
}

</style>

</head>



<body>

<p>&nbsp;</p>

<table width="100%" cellspacing="0" id="table_10">
	<tr>
		<td>		
		<span><b><font face="Cambria">Cheques Received</font></b><hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 30px"><a href="javascript:history.back(1)">
<img height="27" src="../images/BackButton.png" width="60" style="float: right"></a></p>
				
				</span></a></table>

<p>&nbsp;</p>


	
<table width="100%" cellspacing="1" style="border-collapse: collapse" height="80" id="table1">

		<tr>

		<td>

		<table width="100%" bordercolor="#000000" id="table3" class="style2" border="1">			
		<tr>				
		
		<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style5">				
		<strong>Sr. No.</strong></td>				
		<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style4">				
		<font color="#000000">Adm&nbsp; No</font></td>				
		<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style4">				
		<font color="#000000">Name on Cheque</font></td>
		<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style4">				
		<font color="#000000">Name as per School</font></td>				
				
		<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style4">				
		<font color="#000000">Class As per School </font></td>				
				
<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style4">				
		<font color="#000000">Cheque No</font></td>		
		
<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style4">				
		<font color="#000000">Bank Name</font></td>		
		
<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style4">				
		<font color="#000000">Cheque Date</font></td>		
		
<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style4">				
		<font color="#000000">Quarter</font></td>		
		
<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style4">				
		<font color="#000000">Cheque Amount</font></td>		
		
<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style4">				
		<font color="#000000">Amount as Due as per School</font></td>		
		
<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style4">				
		<font color="#000000">Excess Amount</font></td>		
		
<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style4">				
		<font color="#000000">Upload Date</font></td>		
		
		

		
			
		

		<td height="35" bgcolor="#95C23D" align="center" style="width: 102px" class="style4">				
		<font color="#000000">Delete</font></td>		
		
		

		
			
		

			</tr>

			<?php

				while($row = mysql_fetch_row($rs))
				{

					$srno=$row[0];					
					$sadmission=$row[1];		
					$sname=$row[2];
					$class=$row[3];
					$rollno=$row[4];
					$challanno=$row[5];
					$quarter=$row[6];
					$bankamount=$row[7];
					$challanamount=$row[8];
					$latefees=$row[9];
					$dateofupload=$row[10];
					$namefromschool=$row[11];
					$ChequeNo=$row[12];
					
					$num_rows=$num_rows+1;

			?>

			<tr>
				<td height="35" align="center" style="width: 102px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $srno; ?></span>				</td>				
				
				<td height="35" align="center" style="width: 102px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $sadmission; ?></span>				</td>		
				
				
				<td height="35" align="center" style="width: 102px"><span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $sname; ?></span></td>			
				
				
				
				
				
				<td height="35" align="center" style="width: 102px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<?php echo $namefromschool;?></span>
				</td>
				
				
				
				
				
				<td height="35" align="center" style="width: 102px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $class; ?></span>				</td>
				
				<td height="35" align="center" style="width: 102px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<a href="DisplayChallanNoWiseChallan.php?challanNo=<?php echo $challanno;?>" target="_blank"><?php echo $challanno; ?></a></span></td>
				
				<td height="35" align="center" style="width: 102px">				&nbsp;</td>
				
				<td height="35" align="center" style="width: 102px">				&nbsp;</td>
				
				<td height="35" align="center" style="width: 102px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $quarter; ?></span>				</td>
				
				<td height="35" align="center" style="width: 102px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $bankamount; ?></span>				</td>
				
				<td height="35" align="center" style="width: 102px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $challanamount; ?></span>				</td>
				
				<td height="35" align="center" style="width: 102px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $latefees; ?></span>				</td>
				
				
				<td height="35" align="center" style="width: 102px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $dateofupload; ?></span>				</td>
				
				
				<td height="35" align="center" style="width: 102px">				
					<?php 
					if ($latefees<0)
					{
					}
					?>
					<input name="btnEdit<?php echo $srno;?>" id="btnEdit<?php echo $srno;?>" type="button" value="Delete" onclick="Javascript:fnlEdit('<?php echo $srno;?>');">
					
				</td>
				

			</tr>

			<?php

			}

			?>

			</table>

		</td>

		

	</tr>

</table>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>
</div>
</body>



</html>