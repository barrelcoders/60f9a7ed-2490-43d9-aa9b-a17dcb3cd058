<?php

	
	session_start();
	include '../connection.php';
	include '../AppConf.php';
	include 'header.php';
	
?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Photo Gallery</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->

<!---------containt---------->
<div class="c1">
<div class="row c">

 <?php include 'GallerySideMenu.php'; ?>

<!--------------Details------------------>
 <div class="col-md-10">
  <div class="photogallery">
   <div class="photogallery_outer">
    <div class="photogallery_head">Gallery</div>
    <div class="photogallery_inner">
     <div class="row">
         
         <?php include '../connection.php';
        $albumSQL=mysql_query("SELECT * FROM dps_album");
        $i=1;
       while($data=  mysql_fetch_array($albumSQL)) { ?>
      <div class="col-xs-4">
       <div class="photo_inner">
           <div class="photo"><a href="GalleryImages.php?albumId=<?php echo $data['id'] ?>">
         <img src="album_icons/<?php echo $data['albumIcon'] ?>" class="img-responsive"><br><font class="album_name"><?php echo $data['albumName'] ?></font></a>
        </div>
        
       </div>
      </div>
       <?php } ?>  
     </div>
     
        
     
    </div>
   </div>
  </div>
 </div>
</div>
<!----------------->
</div>
<!------Edit Photo------------->
 

<!----------------->
</div>
   <link rel="stylesheet" href="nexus.css" />
<?php include 'footer.php'; ?>
</body>
</html>




