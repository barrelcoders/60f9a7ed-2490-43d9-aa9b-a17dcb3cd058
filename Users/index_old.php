<?php 
include '../connection.php';
include '../AppConf.php';
session_start(); 

$ssql="select `news`,`imageurl`,`newstitle`,`srno` from `school_news` order by `date` desc limit 3";
$rs= mysql_query($ssql);
$i=1;
while($row1 = mysql_fetch_row($rs))
	{
		$news[$i]=$row1[0];
		$imageurl[$i]=$row1[1];
		$newtitle[$i]=$row1[2];
		$srno[$i]=$row1[3];
		//echo $newtitle[$i]."<br>";
		$i=$i+1;
	}
	

$Con1 = mysql_connect("", "dpsfsis", "DpsSec19",true);
mysql_select_db('dpsfsis_giid1', $Con1);
$ssql="select `relative_path_cache` from `giid_items` where `mime_type`='image/jpeg' limit 5";
$rsImg= mysql_query($ssql,$Con1);
$i=1;
while($row = mysql_fetch_row($rsImg))
{
	$ImgName=$row[0];
	$Img[$i]="http://dpsfsis.com/Gallery/var/albums/".$ImgName;
	$i=$i+1;
	//echo $ImgName."<br>";
}

?>
<script language="javascript">

String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ''); };
function Validate()
{

	if(document.getElementById("txtUserId").value.trim()=="")
	{
		alert("Please Enter User Id");
		return;
	}
	if(document.getElementById("txtPassword").value.trim()=="")
	{
		alert("Please Enter Password");
		return;
	}

	document.getElementById("frmLogin").submit();
}

function ShowNews(SrNo)

	{

  		//var myWindow = window.open("ShowNotice.php?srno=" + SrNo ,"","width=600,height=700");

  		var myWindow = window.open("ShowNews.php?srno=" + SrNo ,"","fullscreen=yes,location=no");

	}

</script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: School Education
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>School Education</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<link href="layout/styles/toastr.css" rel="stylesheet"/>
<script src="layout/styles/toastr.js"></script>

<link rel="stylesheet" href="layout/styles/bootstrap.min.css" type="text/css" />


<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<!-- Homepage Only Scripts -->
<script type="text/javascript" src="layout/scripts/jquery.cycle.min.js"></script>
<script type="text/javascript">
$(function() {
    $('#featured_slide').after('<div id="fsn"><ul id="fs_pagination">').cycle({
        timeout: 5000,
        fx: 'fade',
        pager: '#fs_pagination',
        pause: 1,
        pauseOnPagerHover: 0
    });
});



</script>
<!-- End Homepage Only Scripts -->
</head>


<body>

<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
      <div class="topbox">
        <h2>Portal Login</h2>
        <p>Please use valid credentials to login in to Portal.</p>
		<p>All the activities are logged to track the correct usage of this 
		portal !</p>
      </div>
      <div class="topbox">
        <h2><b>Teachers Login Here</b></h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Teachers Login Form</legend>
            <label for="teachername">Username:
              <input type="text" name="teachername" id="teachername" value="" />
            </label>
            <label for="teacherpass">Password:
              <input type="password" name="teacherpass" id="teacherpass" value="" />
            </label>
            <label for="teacherremember">
              <input class="checkbox" type="checkbox" name="teacherremember" id="teacherremember" checked="checked" />
              Remember me</label>
            <p>
              <input type="submit" name="teacherlogin" id="teacherlogin" value="Login" />
              &nbsp;
              <input type="reset" name="teacherreset" id="teacherreset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
      <div class="topbox last">
        <h2><b>Student Login Here</b></h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Student Login Form</legend>
            <label for="pupilname">Username:
              <input type="text" name="pupilname" id="txtUserId" value="" />
            </label>
            <label for="pupilpass">Password:
              <input type="password" name="pupilpass" id="txtPassword" value="" />
            </label>
            <label for="pupilremember">
              <input class="checkbox" type="checkbox" name="pupilremember" id="pupilremember" checked="checked" />
              Remember me</label>
            <p>
              <input type="submit" name="pupillogin" id="pupillogin" value="Login" onclick="Javascript:Validate();"/>
              &nbsp;
              <input type="reset" name="pupilreset" id="pupilreset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
      <br class="clear" />
    </div>
    <div id="loginpanel">
      <ul>
        <li class="left">Click Here</li>
		<li class="right" id="toggle">
		<!--<a id="slideit" href="#slidepanel">Login To Portal</a>-->
		Welcome 
		<a id="closeit" style="display: none;" href="#slidepanel">Close Panel</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>

<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><img src="../Admin/images/logo.png" height="76" width="300" ></img></h1>
    
    </div>
    
    <div id="topnav">
      <ul>
        <li class="active"><a href="index.phpl">Home</a></li>
        <li><a href="Notices.php">Events and Notices</a></li>
        <li><a href="News.php">News</a></li>
        <li><a href="Teachers.php">Meet Our Teachers</a></li>
        <li class="last"></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
</div>


<div class="wrapper col2">
  <div id="featured_slide">
    <div class="featured_box"><a href="#">
    <!--<img src="../Admin/images/kids5.jpg" alt="" />-->
    <img src="<?php echo $Img[1];?>" alt="" />
    </a>
      <div class="floater">
        <h2>1. School Function</h2>
        <p>Here Comes the text for School Function !</p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>
    </div>
    <div class="featured_box"><a href="#">
		<!--<img src="../Admin/images/kids3.jpg" alt="" />-->
		<img src="<?php echo $Img[2];?>" alt="" />
		</a>
      	<div class="floater">
			<h2>2. School Trip</h2>
			<p>Here Comes the School Trip </p>
			<p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
		</div>
    </div>
    <div class="featured_box"><a href="#">
    <!--<img src="../Admin/images/kids4.jpg" alt="" />-->
    <img src="<?php echo $Img[3];?>" alt="" />
    </a>
      <div class="floater">
        <h2>3. School Competition</h2>
        <p>About School Competition</p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>
    </div>
    <div class="featured_box"><a href="#">
    <!--<img src="../Admin/images/kids8.jpg" alt="" />-->
    <img src="<?php echo $Img[4];?>" alt="" />
    </a>
      <div class="floater">
        <h2>4. Guest of honor</h2>
        <p>Something about guest of honor</p>
        <p class="readmore"><a href="#">Continue Reading »</a></p>
      </div>
    </div>
 
      
 
      
   
    </div>
    
     
</div>



<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="homecontent">
    <div class="fl_left">
      <div class="column2" style="width: 530px; height: 397px">
        <ul>
          <li>
            <h2>Principal's Message</h2>
			<div class="imgholder">
			<!--<img src="images/demo/240x130.gif" alt="" />-->
			<img src="images/kasp2164.jpg" alt="" width="240" height="130" />
			</div>
			<div id="divmsg" style="overflow:scroll; width:530px;height:270px;">
			<p><span class="style1"><em>With wings to fly, and my feet planted 
			firmly on the ground, I move ahead to actualize my dreams &amp; 
			aspirations&#8230;.&#8221;</em></span><br>
			<span class="style1">It is this confident freedom to soar and yet 
			not lose touch with terra firma, is what I wish for my students. My 
			wish is in sync with the vision of the school for the students: to 
			nurture healthy, competent, happy children who blossom into 
			sensitive, compassionate &amp; successful adults who can transcend petty 
			personal concerns in the interest of the human race. The school 
			provides holistic education to the students with the aim that the 
			children develop a holistic comprehension of the world in which they 
			live. The aim of education is to liberate the mind of narrow 
			orthodox shackles and allow independent, thinking individuals who 
			contribute substantially to the fabric of the world.<br>
			I understand that despite all our efforts, not every child will 
			become an Aryabhatta or Einstein or Chandragupt but when he reaches 
			the end of the road, he should be able to say with pride, &#8220;Yes, it 
			was worth it.&#8221;<br>
			With all my blessings.</span></p>
			</div>
			<p class="readmore">
			<!--<a href="#">Continue Reading &raquo;</a>-->
			</p>
          </li>
			<!--
			<li class="last">
			<h2>Director's desk</h2>
			<div class="imgholder">

			<img src="images/frunt1.gif" alt="" width="240" height="130"/>
			</div>

			<div id="divmsg1" style="overflow:scroll; width:240px;height:270px;">
			<p><span class="style1"><em>With wings to fly, and my feet planted 
			firmly on the ground, I move ahead to actualize my dreams &amp; 
			aspirations&#8230;.&#8221;</em></span><br>
			<span class="style1">The DPS Society is a non-profit, 
			non-proprietary, private, educational organization. This Global 
			Network of over 200 English medium, co-educational, secular schools 
			provides education from Pre-Nursery/Nursery to Class XII. The DPS 
			Family &#8211; with its transcontinental identity, is not merely a list of 
			institutions, persons or facts; it is a network of values, systems 
			and relationships.</span></p>
			</div>
			<p class="readmore">

			</p>
			</li>
			-->
        </ul><br class="clear" />
      </div>
		<div class="column2">
			<h2>&nbsp;</h2>
			&nbsp;</div>
    </div>
	<div class="fl_right">
		<h2>Latest From The School News</h2>
		<ul>
			<li style="height: 100">
			<div class="imgholder"><a href="#">
				<!--<img src="images/demo/80x80.gif" alt="" />-->
				<img src="<?php echo $imageurl[1];?>" alt="" width="80" height="80" />
				
				</a></div>
			<p><strong><a href="#"><?php echo $newtitle[1];?></a></strong></p>
			<p><a href="Javascript:ShowNews(<?php echo $srno[1] ?>);" target="_blank">Read more...</a></p>
			</li>
			
			<li style="height: 100">
			<div class="imgholder"><a href="#">
				<!--<img src="images/demo/80x80.gif" alt="" />-->
				<img src="<?php echo $imageurl[2];?>" alt="" width="80" height="80" />
				</a></div>
			<p><strong><a href="#"><?php echo $newtitle[2];?></a></strong></p>
			<p><a href="Javascript:ShowNews(<?php echo $srno[2] ?>);"  target="_blank">Read more...</a></p>
			</li>
			<li style="height: 100">
			<div class="imgholder"><a href="#">
				<!--<img src="images/demo/80x80.gif" alt="" />-->
				<img src="<?php echo $imageurl[3];?>" alt="" width="80" height="80" />
				</a></div>
			<p><strong><a href="#"><?php echo $newtitle[3];?></a></strong></p>
			<p><a href="Javascript:ShowNews(<?php echo $srno[3] ?>);"  target="_blank">Read more...</a></p>
			</li>
			
			
		</ul>
	</div>
		<br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<!--<div class="wrapper col4">
  <div id="footer">
    <div class="footbox">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <div class="footbox last">
      <h2>Lacus interdum</h2>
      <ul>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li><a href="#">Praesent et eros</a></li>
        <li><a href="#">Lorem ipsum dolor</a></li>
        <li><a href="#">Suspendisse in neque</a></li>
        <li class="last"><a href="#">Praesent et eros</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
 ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    
    <p align="center">Powered By Online School Planet<br><a target="_blank" href="http://www.eduworldtech.com" title="Online School Planet">Education ERP Platform</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>