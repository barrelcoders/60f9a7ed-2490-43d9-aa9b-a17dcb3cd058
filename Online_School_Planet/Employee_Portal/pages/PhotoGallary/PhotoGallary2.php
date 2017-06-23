<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Payroll</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="ImageSlider.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>
<style>
.jssora05l,.jssora05r{display:block;position:absolute;width:40px;height:40px;cursor:pointer;background:url('photos/a17.png') no-repeat;overflow:hidden}
.jssora05l{background-position:-10px -40px}.jssora05r{background-position:-70px -40px}.jssora05l:hover{background-position:-130px -40px}
.jssora05r:hover{background-position:-190px -40px}.jssora05l.jssora05ldn{background-position:-250px -40px}
.jssora05r.jssora05rdn{background-position:-310px -40px}.jssora05l.jssora05lds{background-position:-10px -40px;opacity:.3;pointer-events:none}
.jssora05r.jssora05rds{background-position:-70px -40px;opacity:.3;pointer-events:none}.jssort01 .p{position:absolute;top:0;left:0;width:72px;height:72px}
.jssort01 .t{position:absolute;top:0;left:0;width:100%;height:100%;border:none}.jssort01 .w{position:absolute;top:0;left:0;width:100%;height:100%}
.jssort01 .c{position:absolute;top:0;left:0;width:97px;height:68px;border:#000 2px solid;box-sizing:content-box;background:url('photos/t01.png') -800px -800px no-repeat;_background:none}
.jssort01 .pav .c{top:2px;_top:0;left:2px;_left:0;width:97px;height:68px;border:#000 0 solid;_border:#fff 2px solid;background-position:50% 50%}
.jssort01 .p:hover .c{top:0;left:0;width:97px;height:70px;border:#fff 1px solid;background-position:50% 50%}
.jssort01 .p.pdn .c{background-position:50% 50%;width:97px;height:68px;border:#000 2px solid}
* html .jssort01 .c,* html .jssort01 .pdn .c,* html .jssort01 .pav .c{width:97px;height:72px}
</style>
<body>
<div id="container">
<!----Header--------->
<div><?php include '../header2.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <ul>
   <li class="active"><a href="PhotoGallary.php"><button class="btnmanu"> Photo Gallery</button> </a></li>
   <li><a href="#Employee_RowAttendanceLog.php"><button class="btnmanu"> Add Photos</button> </a></li>
   <li><a href="#Employee_RowAttendanceLog.php"><button class="btnmanu"> Add Album</button> </a></li>
   <li><a href="#Employee_RowAttendanceLog.php"><button class="btnmanu"> Settings</button> </a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="photogallery">
   <div class="photogallery_outer">
    <div class="photogallery_head">Gallery</div>
    <div class="photogallery_inner" style="width:100%;">
     <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1089px; height: 456px; overflow: hidden; visibility: hidden; background-color: #24262e;">
      <!-- Loading Screen -->
      <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
       <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
       <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;">
       </div>
      </div>
      <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1089px; height: 356px; overflow: hidden;">
       <div data-p="144.50">
        <img data-u="image" src="photos/1.jpg" />
        <img data-u="thumb" src="photos/1.jpg" />
       </div>
       <div data-p="144.50" style="display:none;">
        <img data-u="image" src="photos/2.jpg" />
        <img data-u="thumb" src="photos/2.jpg" />
       </div>
       <div data-p="144.50" style="display:none;">
        <img data-u="image" src="photos/3.jpg" />
        <img data-u="thumb" src="photos/3.jpg" />
       </div>
       <div data-p="144.50" style="display:none;">
        <img data-u="image" src="photos/4.jpg" />
        <img data-u="thumb" src="photos/4.jpg" />
       </div>
       <div data-p="144.50" style="display:none;">
        <img data-u="image" src="photos/5.jpg" />
        <img data-u="thumb" src="photos/5.jpg" />
       </div>
       <div data-p="144.50" style="display:none;">
        <img data-u="image" src="photos/6.jpg" />
        <img data-u="thumb" src="photos/6.jpg" />
       </div>
       <div data-p="144.50" style="display:none;">
        <img data-u="image" src="photos/7.jpg" />
        <img data-u="thumb" src="photos/7.jpg" />
       </div>
       <div data-p="244.50" style="display:none;">
        <img data-u="image" src="photos/8.jpg" />
        <img data-u="thumb" src="photos/8.jpg" />
       </div>
       <div data-p="144.50" style="display:none;">
        <img data-u="image" src="photos/9.jpg" />
        <img data-u="thumb" src="photos/9.jpg" />
       </div>
       <div data-p="144.50" style="display:none;">
        <img data-u="image" src="photos/10.jpg" />
        <img data-u="thumb" src="photos/10.jpg" />
       </div>
       <div data-p="144.50" style="display:none;">
        <img data-u="image" src="photos/11.jpg" />
        <img data-u="thumb" src="photos/11.jpg" />
       </div>
       <div data-p="144.50" style="display:none;">
        <img data-u="image" src="photos/12.jpg" />
        <img data-u="thumb" src="photos/12.jpg" />
       </div>
      </div>
      <!-- Thumbnail Navigator -->
      <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:1089px; height:100px;" data-autocenter="1">
      <!-- Thumbnail Item Skin Begin -->
       <div data-u="slides" style="cursor: default; width:1089px; margin:0;">
        <div data-u="prototype" class="p" style="width:100px;">
         <div class="w">
          <div data-u="thumbnailtemplate" class="t"></div>
         </div>
         <div class="c"></div>
        </div>
       </div>
      <!-- Thumbnail Item Skin End -->
      </div>
      <!-- Arrow Navigator -->
      <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
      <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
     </div>
     <script type="text/javascript">jssor_1_slider_init();</script>
    </div>
   </div>
  </div>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
