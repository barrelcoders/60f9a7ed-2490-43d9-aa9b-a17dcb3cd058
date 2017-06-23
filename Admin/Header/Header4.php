<?php require '../connection.php'; ?>
<?php
session_start();
if (!ini_get('register_globals')) {
    $superglobals = array($_SERVER, $_ENV,
        $_FILES, $_COOKIE, $_POST, $_GET);
    if (isset($_SESSION)) {
        array_unshift($superglobals, $_SESSION);
    }
    foreach ($superglobals as $superglobal) {
        extract($superglobal, EXTR_SKIP);
    }
}


if ($_REQUEST["txtUserId"] =="")
{
	$LoggedInUser=$_SESSION['userid'];
}
else
{
	$LoggedInUser=$_REQUEST["txtUserId"];
}

if($LoggedInUser == "")
{
	echo ("<br><br><center><b>Due to security reason or network issues your session has expired!<br>Click <a href='http://www.dpsfbd.info/Admin/logoff.php'>here</a> to login again");
	exit();
}
	//$ssql="SELECT distinct `ApplicationName` FROM `menu_master`";
	$ssql="SELECT distinct `ApplicationName` FROM `user_menu_master` where `EmpId`='$LoggedInUser'";
	$rsApp= mysql_query($ssql);
if($_REQUEST["isHeaderSubmit"]=="yes")
{
////////////////////////////
	$SelectedAppName=$_REQUEST["cboApp"];
	$_SESSION['SelectedAppName']=$SelectedAppName;
	$ssql="SELECT distinct `BaseURL` FROM `user_menu_master` where `ApplicationName`='$SelectedAppName'";
	$rsBaseUrl= mysql_query($ssql);
	while($row = mysql_fetch_row($rsBaseUrl))
	{
		$BaseURL=$row[0];
		//header("Location: $BaseURL");
		break;
	}
	//echo $BaseURL;
	
	$_SESSION['userid']=$_REQUEST["txtLoggedInUser"];
	
	/*
	$_SESSION['BaseUrl']=$BaseURL;
	ob_start();
   		echo '<meta http-equiv="refresh" content="1;'.$BaseURL.'" />';
   ob_flush();
   die();
   */
	session_write_close();
	session_regenerate_id(true);
				header("Location: $BaseURL");
				exit(0);
}
else
{
	if ($_SESSION['SelectedAppName'] !="")
	{
		$SelectedAppName=$_SESSION['SelectedAppName'];
		//$ssql="SELECT distinct `Menu` FROM `menu_master` WHERE `ApplicationName`='$SelectedAppName' and `Menu`=`MasterMenu`";
		  $ssql="SELECT distinct `Menu` FROM `user_menu_master` WHERE `ApplicationName`='$SelectedAppName' and `Menu`=`MasterMenu` and `EmpId`='$LoggedInUser'";
		$rsMainMenu= mysql_query($ssql);
	}
}		

?>
<script language="javascript">
function Validate()
{
	if(document.getElementById("cboApp").value != "Select One")
	{
		//alert(document.getElementById("cboApp").value);
		document.getElementById("frmApp").submit();
	}
}
</script>
<head>
<link href="Header/css/reset.css" type="text/css" rel="stylesheet" />
<link href="Header/css/style.css" type="text/css" rel="stylesheet" />
<link href="Header/css/default.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="Header/css/ddlevelsmenu-base.css" />
<link rel="stylesheet" type="text/css" href="Header/css/ddlevelsmenu-topbar.css" />
<script type="text/javascript" src="Header/js/ddlevelsmenu.js"></script>
<!--[if lt IE 7]>
<script type="text/javascript" src="Header/js/jquery.js"></script>
<script type="text/javascript" src="Header/js/jquery.dropdown.js"></script>
<![endif]-->
<script type="text/javascript" src="Header/js/ddlevelsmenu.js"></script>
<script src="Header/Scripts/swfobject_modified.js" type="text/javascript"></script>
<!--wrapper-->
</head>
<div id="wrapper"> 
  
  <!--head_part -->
  <div class="top_main_holder">
    <div class="logoPart">
		<img src="../Admin/images/logo.png" height="40" width="214"/></div>
    <div class="right_login_part">
	

	<form name="frmApp" id="frmApp" method="post" action="Header/SubmitfrmApp.php">
	<!--
	<form name="frmApp" id="frmApp" method="post" action="">
	-->

       <input type="hidden" name="isHeaderSubmit" id="isHeaderSubmit" value="yes">

       <input type="hidden" name="txtSelectedAppName" id="txtSelectedAppName" value="">
	   <input type="hidden" name="txtLoggedInUser" id="txtLoggedInUser" value="<?php echo $LoggedInUser;?>">

      <div style="width: 563px; height: 25px">

        <p align="left">

       <a href="#" target="_blank">(<?php echo $_SESSION['userid']; ?>)Application ToolBox »</a>

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

		

		<a href="logoff.php">LogOut</a> </div>

		</form>

      </div>      

    <!--Navigation -->

     <div class="m_nav">

            <div class="floatL"><img src="Header/images/nav_left.png"/></div>

            <div class="nav_mid">

              <div id="ddtopmenubar" class="mattblackmenu">

                <ul>

                  <!--<li style="background:none;"><a href="<?php echo $_SESSION['BaseUrl'];?>">Home</a></li>-->
                  <li style="background:none;"><a href="<?php echo $HeaderBaseURL; ?>">Home</a></li>
                  <?php

                  if($_REQUEST["isHeaderSubmit"]=="yes" || $_SESSION['SelectedAppName'] != "")

				  {

	                  $rowcount=0;

	                  while($row1 = mysql_fetch_row($rsMainMenu))

						{

							$Header=$row1[0];

							$rowcount=$rowcount + 1;

							  $ssql="SELECT distinct `Menu`,`PageURL` FROM `user_menu_master` WHERE `ApplicationName`='$SelectedAppName' and `MasterMenu`='$Header' and `Menu` !=`MasterMenu` and `EmpId`='$LoggedInUser'";

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
								$MAINURL=$MenuPageURL."?txtUserId=".$LoggedInUser;

								$ssql="SELECT distinct `Menu`,`PageURL` FROM `user_menu_master` WHERE `ApplicationName`='$SelectedAppName' and `MasterMenu`='$MenuItem' and `Menu` !=`MasterMenu`  and `EmpId`='$LoggedInUser'";

								$rsSubMenuItem= mysql_query($ssql);

	                  	?>
					               <li>
						               	<a href="<?php echo $MAINURL;?>"><?php echo $MenuItem;?> <?php if(mysql_num_rows($rsSubMenuItem) > 0) {?>Ã‚Â»<?php }?></a>
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
                <li class="dir"><a href="#">Issue Certificates Ã‚Â»</a>
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
                <li ><a href="#">De-register / Withdraw StudentÃ‚Â»</a>
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
            <div class="floatR"><img src="Header/images/nav_right.png" /></div>
          </div>



</div>



 <!--end_head_part -->



</div>