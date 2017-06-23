   
   
   
   <html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Manage Gallery</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="Style.css" />
   <link rel="stylesheet" href="nexus.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script type="text/javascript" src="cycle-plugin.js"></script>
</head>
<style>
.photogallery .photogallery_outer .addphotogallery_inner .addphoto_gallary .addphoto_add .apa1{border: 1px solid #0b462d; border-radius:5px; padding:0.5% 0.5% 2% 0.5%!important; margin-bottom:4%;}
.photogallery .photogallery_outer .alert{margin-top:1%;}
.photogallery .photogallery_outer .alert .close{font-size:29px !important;}
</style>
<body>
<div id="container">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="Style.css" />
   <script src="../js/bootstrap.min.js"></script>
<style>
nav a li a button{font-family:Arial !important;}
</style>
<!----Header--------->
 <div class="row t">
  <div class="col-md-5"><img src="../Admin/images/logo.png" class="img-responsive"></div>
  <div class="col-md-5 o"><!--<img src="OSP.png" class="img-responsive">--></div>
  <div class="col-md-1" align="right"><span class="name">Admin</span></div>
  <div class="col-md-1">
  		<span class="imghover"><img src="../Admin/images/DPS.jpg" class="img-circle" width="50px" height="50px">
             <ul class="submanu">
               <li class="te"></li>
               <li><a href="#"><button class="btnmanu">Change Password</button></a></li>
               <li><a href="../Login.php"><button class="btnmanu">Logout</button></a></li>
             </ul>
        </span>
  </div>
 </div> 
 <!-----manu---->
 <div class="empmgt">
   <nav id="nav" role="navigation">
    <a href="#nav" title="Show navigation">Show Manu
	 
	</a>
    <a href="#" title="Hide navigation">Hide Manu</a>
    <ul>
        <li class="m active"><a href="../Admin/Academics/AcademicsLandingPage.php" active><button class="btnmanu">HOME</button></a></li>
      <li style="margin-left:78%;">
      
													
          <select name="" id="my_selection" class="text-box tbs" style="width:131%; height:30px;" >
            <option value="">Select One</option>
           
          </select>
          <script>
document.getElementById('my_selection').onchange = function() {
    window.location.href = this.children[this.selectedIndex].getAttribute('href');
}
</script>
        </li>
     </ul>
</nav>
  
 </div>