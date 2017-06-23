<?php session_start();
 include '../connection.php';
 
 

 ?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Photo Gallery</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="Style.css" />
   <link rel="stylesheet" href="nexus.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
<?php include 'header.php'; ?>
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
     <div class="photo_gallary">  
  <div class="row1">
      <?php  
 if(isset($_GET['albumId'])){
       $id=$_GET['albumId'];
     
       $albumImageSQL=mysql_query("SELECT * FROM dps_gallery_images WHERE albumID='$id' and status=1");
        while($imageData = mysql_fetch_array($albumImageSQL)){ ?>
   <div class="row1">
      <div class="column">    
             <img src="PhotoGallary/<?php echo $imageData['galleryImage']; ?>" onClick="openModal();currentSlide(1)" class="hover-shadow cursor"> <br>
            
              <div class="photo_manu">
               <a href="#"><span class="edit"></span><p class="name">Option</p></a>
               <div class="photo_submanu">
                <a class="button" href="#popup1"><span class="editalbum"></span><p class="name">Edit Photo</p></a>
                <a class="button" href="#popup2"><span class="addphoto"></span><p class="name">Add Photo</p></a> 
                <a class="button" href="#popup3"><span class="organizealbum"></span><p class="name n1">Organize Photo</p></a>
                <a class="button" href="#popup4"><span class="deletealbum"></span><p class="name n2">Delete Photo</p></a>
               </div>
              </div>
             </div>
 <?php  }} ?> 
	 </div>

		  <div id="myModal" class="modal">
			  <span class="close cursor" onClick="closeModal()">&times;</span>
		   <div class="modal-content">
        <?php $albumImageSQL=mysql_query("SELECT * FROM dps_gallery_images WHERE albumID='$id' and status=1");
        while($imageData = mysql_fetch_array($albumImageSQL)){ ?>
		    <div class="mySlides">  <div class="numbertext"></div>  <img src="PhotoGallary/<?php echo $imageData['galleryImage']; ?>" style="width:100%">    </div>
        <?php } ?>
	 	    
    
		    <a class="prev" onClick="plusSlides(-1)">&#10094;</a>
		    <a class="next" onClick="plusSlides(1)">&#10095;</a>
		
		    <div class="caption-container">    <p id="caption"></p>   </div>
   
		</div>
	   </div>
	  <script>
		function openModal() {
		  document.getElementById('myModal').style.display = "block";
		}

		function closeModal() {
		  document.getElementById('myModal').style.display = "none";
		}

		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}

		function showSlides(n) {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("demo1");
		  var captionText = document.getElementById("caption");
		  if (n > slides.length) {slideIndex = 1}
		  if (n < 1) {slideIndex = slides.length}
		  for (i = 0; i < slides.length; i++) {
	      slides[i].style.display = "none";
		  }
		  for (i = 0; i < dots.length; i++) {
	      dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";
		  dots[slideIndex-1].className += " active";
		  captionText.innerHTML = dots[slideIndex-1].alt;
		}
	  </script>
     </div>
    </div>
   </div>
  </div>
  </div>
 </div>
</div>
<!----------------->
</div>
<!------Edit Photo------------->
  <div id="popup1" class="overlay">
	<div class="popup">
		<a class="close" href="#">&times;</a>
		<div class="content"> <?php include 'EditPhoto.php'; ?> </div>
	</div>
   </div>
<!------Add Photo------------->   
   <div id="popup2" class="overlay">
	<div class="popup">
		<a class="close" href="#">&times;</a>
		<div class="content"><?php include 'Addphoto.php'; ?> </div>
	</div>
   </div>
<!------Add Album------------->   
   <div id="popup3" class="overlay">
	<div class="popup">
		<a class="close" href="#">&times;</a>
		<div class="content"><?php include 'OrganizePhoto.php'; ?> </div>
	</div>
   </div>
<!------Organize Photo------------->   
   <div id="popup4" class="overlay">
	<div class="popup">
		<a class="close" href="#">&times;</a>
		<div class="content"><?php include 'DeletePhoto.php'; ?> </div>
	</div>
   </div>
<!----------------->
</div>
<?php include 'footer.php'; ?>
</body>
</html>
