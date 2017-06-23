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
     $i=1;
       $albumImageSQL=mysql_query("SELECT * FROM dps_gallery_images WHERE albumID='$id' and status=1");
        while($imageData = mysql_fetch_array($albumImageSQL)){
             
            ?>
   <div class="row1">
      <div class="column">    
             <img src="PhotoGallary/<?php echo $imageData['galleryImage']; ?>" onClick="openModal();currentSlide(<?php echo $i; ?>)" class="hover-shadow cursor"> <br>
            
              
             </div>
 <?php $i++; }   } ?> 
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



<!----------------->
</div>
<?php include 'footer.php'; ?>
</body>
</html>
