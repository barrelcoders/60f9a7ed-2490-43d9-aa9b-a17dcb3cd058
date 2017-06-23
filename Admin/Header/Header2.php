<?php include '../../connection.php'; ?>
<?php
	$ssql="SELECT distinct `ApplicationName` FROM `menu_master`";
	$rsApp= mysql_query($ssql);

if($_REQUEST["isSubmit"]=="yes")
{
	$SelectedAppName=$_REQUEST["cboApp"];
	
	$ssql="SELECT distinct `Menu` FROM `menu_master` WHERE `ApplicationName`='$SelectedAppName' and `Menu`=`MasterMenu`";
	$rsMainMenu= mysql_query($ssql);
	
}		
?>
<script language="javascript">
function Validate()
{
	if(document.getElementById("cboApp").value != "Select One")
	{
		alert(document.getElementById("cboApp").value);
		document.getElementById("frmApp").submit();
	}
}
</script>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mObilise School Management System</title>
<link href="css/reset.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/default.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/ddlevelsmenu-base.css" />
<link rel="stylesheet" type="text/css" href="css/ddlevelsmenu-topbar.css" />
<script type="text/javascript" src="js/ddlevelsmenu.js"></script>
    

<!--[if lt IE 7]>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dropdown.js"></script>
<![endif]-->
<script type="text/javascript" src="js/ddlevelsmenu.js"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>

<body>
<!--wrapper-->
<div id="wrapper"> 
  
  <!--head_part -->
  <div class="top_main_holder">
    <div class="logoPart"><a href="index.asp"><img src="../images/logo.png" /></a></div>
    <div class="right_login_part">
      <div style="width: 363px; height: 25px">
        <p align="left">
       <a href="#" target="_blank">Application ToolBox »</a>
       <form name="frmApp" id="frmApp" method="post" action="Header2.php">
       <input type="hidden" name="isSubmit" id="isSubmit" value="yes">
       <select size="1" name="cboApp" id="cboApp" onchange="Javascript:Validate();">
		<option value="Select One" selected="selected">Select One</option>
		<?php
			while($row = mysql_fetch_row($rsApp))
			{
				$AppName=$row[0];
		?>
		<option value="<?php echo $AppName;?>"><?php echo $AppName;?></option>
		<?php
			}
		?>
		</select> 
		</form>
		<a href="../logoff.php">LogOut</a> </div>
      </div>
    <!--Navigation -->
    
     <div class="m_nav">
            <div class="floatL"><img src="images/nav_left.png"/></div>
            <div class="nav_mid">
              <div id="ddtopmenubar" class="mattblackmenu">
                <ul>
                  <li style="background:none;"><a href="index.asp">Home</a></li>
                  <?php
                  if($_REQUEST["isSubmit"]=="yes")
				  {
	                  $rowcount=0;
	                  while($row1 = mysql_fetch_row($rsMainMenu))
						{
							$Header=$row1[0];
							$rowcount=$rowcount + 1;
							$ssql="SELECT distinct `Menu`,`PageURL` FROM `menu_master` WHERE `ApplicationName`='$SelectedAppName' and `MasterMenu`='$Header' and `Menu` !=`MasterMenu`";
							//echo $ssql;
							//exit();
							$rsMenuItem= mysql_query($ssql);
							
                  ?>
                  <li>
                  	<a rel="ddsubmenu<?php echo $rowcount;?>"><?php echo $Header;?></a>
                  	<ul id="ddsubmenu<?php echo $rowcount;?>" class="ddsubmenustyle">
	                  	<?php
	                  	if(mysql_num_rows($rsMenuItem) > 0)
	                  	{
	                  		while($row2=mysql_fetch_row($rsMenuItem))
	                  		{
	                  			$MenuItem=$row2[0];
	                  			$MenuPageURL=$row2[1];
	                  			$ssql="SELECT distinct `Menu`,`PageURL` FROM `menu_master` WHERE `ApplicationName`='$SelectedAppName' and `MasterMenu`='$MenuItem' and `Menu` !=`MasterMenu`";
								$rsSubMenuItem= mysql_query($ssql);
	                  	?>
			                  	
					               <li>
						               	<a href="<?php echo $MenuPageURL;?>"><?php echo $MenuItem;?> <?php if(mysql_num_rows($rsSubMenuItem) > 0) {?>»<?php }?></a>
						               	<ul>
						               	<?php
						               	while($row3=mysql_fetch_row($rsSubMenuItem))
	                  					{
	                  						$SubMenuItem=$row3[0];
	                  						$SubMenuPageURL=$row3[1];
	                  					?>	                  			
						               	
						               		 <li><a href="<?php echo $SubMenuPageURL;?>"><?php echo $SubMenuItem;?></a></li>
						                
						                <?php
						                }
						                ?>
						                </ul>
					               </li>	               
			                	
	                	<?php
	                		}
	                	}
	                	?>
	                	</ul>
                  </li>
                  <?php
                  		}
                  	}
                  ?>
                  <!--
                  <li><a href="#" rel="ddsubmenu3">Existing Student Tasks</a></li>
                  <li><a href="#" rel="ddsubmenu4">Student Exit Formalities</a></li>
                  -->
                </ul>
              </div>
              <script type="text/javascript">
ddlevelsmenu.setup("ddtopmenubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")
    </script>
              <!--HTML for the Drop Down Menus associated with Top Menu Bar-->
              <!--They should be inserted OUTSIDE any element other than the BODY tag itself-->
              <!--A good location would be the end of the page (right above "</BODY>")-->
              <!--Top Drop Down Menu 1 HTML-->
                
              <!--Top Drop Down Menu 2 HTML-->
              <!--
              <ul id="ddsubmenu3" class="ddsubmenustyle">
                <li ><a href="process_change_management.html">Search A Student</a> </li>
                <li ><a href="change_request.asp">Student Optional Subject Mapping </a></li>
                <li class="dir"><a href="#">Issue Certificates »</a>
                  <ul>
                    <li><a href="#">Issue Character Certificate</a></li>
                    <li><a href="#">Date Of Birth Certificate</a></li>
                    <li><a href="#">Fees submission Certificate</a></li>
                    <li><a href="#">Other Certificates</a></li>
                 </ul>
                </li>
              </ul>
              -->
              <!--Top Drop Down Menu 3 HTML-->
              <!--
              <ul id="ddsubmenu4" class="ddsubmenustyle">
                <li ><a href="#">De-register / Withdraw Student»</a>
                <ul>
               		 <li><a href="#">De-Activate A Student</a></li>   
               		 <li><a href="#">Re-Activate A Student</a></li> 
               	</ul>
                </li>
                <li ><a href="#">Full & Final Completion of Studnet </a></li>
                <li><a href="#">Issue Transfer Certificate</a></li>
                <li><a href="#">Search Alumni Student</a></li>
              </ul>
              -->
              
              
             </div>
            <!--nav_mid ends-->
            <div class="floatR"><img src="images/nav_right.png" /></div>
          </div>
  
  </div>
  <!--end_head_part -->
 <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br>
  <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br>
  
    
    <!--footer -->
    <div class="footer_wrap">
      <div class="footer_container">
        <ul>
          <li><a href="index.asp">Home</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li class="NoBG"><a href="#">Disclaimer</a></li>
        </ul>
        <br />
        <h6>© 2011 mObilise App Lab LLP - All rights Reserved</h6>
      </div>
    </div>
    <!--end --> 
    
  </div>
  
  <!--end--> 


</body>
</html>
