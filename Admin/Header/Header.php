<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
       <a href="#" target="_blank">Application ToolBox »</a><select size="1" name="D1">
		<option selected>Student Management</option>
		<option>Academics Management</option>
		<option>Finance & Fees Management</option>
		<option>Human Resource Management</option>
		<option>CCE Management</option>
		<option>Communication Management</option>
		<option>Query Management</option>
		<option>Asset & Inventory Management</option>
		<option>Incident Report</option>
		<option>Visitor Management</option>
		<option>MIS Reporting</option>
		<option>Masters Management</option>
		</select> 
		
		<a href="../logoff.php">LogOut</a> </div>
      </div>
    <!--Navigation -->
    
     <div class="m_nav">
            <div class="floatL"><img src="images/nav_left.png"/></div>
            <div class="nav_mid">
              <div id="ddtopmenubar" class="mattblackmenu">
                <ul>
                  <li style="background:none;"><a href="index.asp">Home</a></li>
                  <li><a href="#" rel="ddsubmenu2">New Admission Tasks</a></li>
                  <li><a href="#" rel="ddsubmenu3">Existing Student Tasks</a></li>
                  <li><a href="#" rel="ddsubmenu4">Student Exit Formalities</a></li>
                </ul>
              </div>
              <script type="text/javascript">
ddlevelsmenu.setup("ddtopmenubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")
    </script>
              <!--HTML for the Drop Down Menus associated with Top Menu Bar-->
              <!--They should be inserted OUTSIDE any element other than the BODY tag itself-->
              <!--A good location would be the end of the page (right above "</BODY>")-->
              <!--Top Drop Down Menu 1 HTML-->
                           <ul id="ddsubmenu2" class="ddsubmenustyle">
               <li><a href="aboutus.html">Enquiry Form »</a>
               	<ul>
               		 <li><a href="value_straem2.html">FollowUp Enquiries</a></li>
                </ul>
               </li>
               
               
                <li><a href="Infratel_process_model.html">New Student Registration Form</a></li>
                
                <li><a href="#">New Student Admission »</a> 
                	<ul>
               		 	<li><a href="#">Approve / Reject Registration</a></li>   
               			 <li><a href="#">New Student Admission Form</a></li> 
               		</ul>
               			<li><a href="#">Allot Section / RollNo to New Admission</a></li>  
                		<li><a href="activity_charts.html">New Admission Reports</a></li>
                   </ul>                
                </li>
                
              </ul>
              <!--Top Drop Down Menu 2 HTML-->
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
              
              <!--Top Drop Down Menu 3 HTML-->
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
              </ul>
              
              
             </div>
            <!--nav_mid ends-->
            <div class="floatR"><img src="images/nav_right.png" /></div>
          </div>
  
  </div>
  <!--end_head_part --> 
 
  
    
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
</div>

</body>
</html>
