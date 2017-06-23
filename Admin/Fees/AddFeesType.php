
<?php
session_start();
include '../../connection.php';


if(isset($_REQUEST['submit'])){
   //echo "<pre />";print_r($_REQUEST);die;
   $feesType=$_REQUEST['feesType'];
   $feesAmount=$_REQUEST['feesAmount'];
   $status=$_REQUEST['status'];
   $sqlInsert=  mysql_query("INSERT INTO tbl_fees_setup(id,feesType,charge,status) VALUES ('','".$feesType."', '".$feesAmount."','".$status."')");
  
   header('location: FeesManager.php');
}
?>
<script language="javascript">
function fnlMoveToAlumni(EmpId)
{
	document.getElementById("B3"+EmpId).disabled=true;
	var myWindow = window.open("EmpMoveToAlumni.php?EmpId=" + EmpId, "", "width=350, height=200");	
	return;

}
function ShowEdit(SrNo)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("EditEmployeeMaster1.php?srno=" + SrNo ,"","width=700,height=650");
}

</script>


<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<link rel="stylesheet" type="text/css" href="../css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



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

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Cambria;
        font-weight:bold;

}


</style>

</head>



<body>

<p>&nbsp;</p>
<p><font face="Cambria" size=3><b>Add Fess Type</b></font></p>

<hr>
<p><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></p>
<p>&nbsp;</p>

<table width="100%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<tr>
<td style="width: 278px" align="left">

						 
</td>
</tr>
<tr>
<td style="width: 278px" align="left"><p><font face="Cambria">Fees Type</font></td>
<td style="width: 278px"><font face="Cambria"><input type="text" name="feesType" class="text-box" required="true"></font></td>
<td style="width: 278px" align="left"><p><font face="Cambria">Fees Amount</font></td>
<td style="width: 278px"><font face="Cambria"><input type="text" name="feesAmount" class="text-box" required="true"></font></td>



</tr>
<tr>
<td style="width: 278px" align="left"><p><font face="Cambria">Status </font></td>
<td style="width: 278px"><font face="Cambria"><select name="status">
                <option value="">------------------Select Status----------------</option>
                <option value="1">Active</option>
            <option value="0" >Inactive</option>
            
        </select></font></td>
<td style="width: 278px" align="left"><p><font face="Cambria">&nbsp;</font></td>
<td style="width: 278px"><font face="Cambria">&nbsp;</td>

</tr>

<tr>
<td style="width: 278px" align="left">&nbsp;</td>
<td style="width: 278px" colspan=3>&nbsp;</td>

</tr>
    
<tr>


			</select></font></td>

</tr>
<td colspan=4 align=center class="style1"><font face="Cambria"><input name="submit" type="submit" value="submit" style="font-weight: 700" class="text-box"></font></td>
</tr>
</form>
</table>




<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>
</div>
</body>
</html>