<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Payroll</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="Style.css" />
   <link rel="stylesheet" href="nexus.css" />
        <link rel="stylesheet" type="text/css" href="gallery/style.css">
   <script src="../js/bootstrap.min.js"></script>
   <script src="gallery/script.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script type="text/javascript" src="cycle-plugin.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
<div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <ul>
   <li ><a href="PhotoGallary.php"><button class="btnmanu"> Photo Gallery</button> </a></li>
   <li class="active"><a href="AddPhotoSelect.php"><button class="btnmanu"> Add Photos</button> </a></li>
   <li><a href="AddAlbumSelect.php"><button class="btnmanu"> Add Album</button> </a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="photogallery">
   <div class="photogallery_outer">
    <div class="photogallery_head">Add Album To Gallery</div>
    <div class="addphotogallery_inner">
     <div id="maindiv" class="addphoto_gallary">
      <div id="formdiv" class="addphoto_add">
       <form enctype="multipart/form-data" action="" method="post">
        <div style="height: 200px; width: 300px;"><input type="text" name="galleryName" placeholder="enter gallery name" ></div>
        <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
        <input type="button" id="add_more" class="upload" value="Add More Files"/>
        <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
       </form>           <br/>
  <!------Including PHP Script here------>
         <?php include "gallery/upload.php"; ?>
      </div>
     <!-- Right side div -->
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
<!------------>
</div>
<!------------->
</div>
<?php include 'footer.php'; ?>
</body>
</html>