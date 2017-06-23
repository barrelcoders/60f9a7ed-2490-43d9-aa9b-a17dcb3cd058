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
   <script src="../js/bootstrap.min.js"></script>
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
   <li class="active"><a href="PhotoGallary.php"><button class="btnmanu"> Photo Gallery</button> </a></li>
   <li><a href="AddPhotoSelect.php"><button class="btnmanu"> Add Photos</button> </a></li>
   <li><a href="AddAlbumSelect.php"><button class="btnmanu"> Add Album</button> </a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="photogallery">
   <div class="photogallery_outer">
    <div class="photogallery_head">Gallery</div>
    <div class="photogallery_inner">
     <div class="photo_gallary">  
		   <div class="row1">
 			 <div class="column">    
              <img src="photos/1.jpg" onClick="openModal();currentSlide(1)" class="hover-shadow cursor"> <br>
              <font class="album_name">VC Img001</font>
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
 			 <div class="column">    
              <img src="photos/2.jpg" onClick="openModal();currentSlide(2)" class="hover-shadow cursor">  <br>
              <font class="album_name">VC Img002</font>
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
			 <div class="column">    
              <img src="photos/3.jpg" onClick="openModal();currentSlide(3)" class="hover-shadow cursor">  <br>
              <font class="album_name">VC Img003</font>
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
			 <div class="column">    
              <img src="photos/4.jpg" onClick="openModal();currentSlide(4)" class="hover-shadow cursor">  <br>
              <font class="album_name">VC Img004</font>
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
			 <div class="column">   
              <img src="photos/5.jpg" onClick="openModal();currentSlide(5)" class="hover-shadow cursor">  <br>
              <font class="album_name">VC Img005</font>
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
 			 <div class="column">   
              <img src="photos/6.jpg" onClick="openModal();currentSlide(6)" class="hover-shadow cursor">  <br>
              <font class="album_name">VC Img006</font>
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
			 <div class="column">   
              <img src="photos/7.jpg" onClick="openModal();currentSlide(7)" class="hover-shadow cursor">  <br>
              <font class="album_name">VC Img007</font>
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
			 <div class="column">   
              <img src="photos/8.jpg" onClick="openModal();currentSlide(8)" class="hover-shadow cursor">  <br>
              <font class="album_name">VC Img008</font>
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
			 <div class="column">  
              <img src="photos/9.jpg" onClick="openModal();currentSlide(9)" class="hover-shadow cursor">  <br>
              <font class="album_name">VC Img009</font>
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
 			 <div class="column">   
              <img src="photos/10.jpg" onClick="openModal();currentSlide(10)" class="hover-shadow cursor">  <br>
              <font class="album_name">VC Img010</font>
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
			 <div class="column">   
              <img src="photos/11.jpg" onClick="openModal();currentSlide(11)" class="hover-shadow cursor">  <br>
              <font class="album_name">VC Img011</font>
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
			 <div class="column">  
              <img src="photos/12.jpg" onClick="openModal();currentSlide(12)" class="hover-shadow cursor"> <br>
              <font class="album_name">VC Img012</font>
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
		  </div>

		  <div id="myModal" class="modal">
			  <span class="close cursor" onClick="closeModal()">&times;</span>
		   <div class="modal-content">

		    <div class="mySlides">  <div class="numbertext">1 / 12</div>   <img src="photos/1.jpg" style="width:100%">    </div>
	 	    <div class="mySlides">  <div class="numbertext">2 / 12</div>   <img src="photos/2.jpg" style="width:100%">    </div>
		    <div class="mySlides">  <div class="numbertext">3 / 12</div>   <img src="photos/3.jpg" style="width:100%">    </div>
     	    <div class="mySlides">  <div class="numbertext">4 / 12</div>   <img src="photos/4.jpg" style="width:100%">    </div>
			<div class="mySlides">  <div class="numbertext">5 / 12</div>   <img src="photos/5.jpg" style="width:100%">    </div>
	 	    <div class="mySlides">  <div class="numbertext">6 / 12</div>   <img src="photos/6.jpg" style="width:100%">    </div>
		    <div class="mySlides">  <div class="numbertext">7 / 12</div>   <img src="photos/7.jpg" style="width:100%">    </div>
     	    <div class="mySlides">  <div class="numbertext">8 / 12</div>   <img src="photos/8.jpg" style="width:100%">    </div>
			<div class="mySlides">  <div class="numbertext">9 / 12</div>   <img src="photos/9.jpg" style="width:100%">    </div>
	 	    <div class="mySlides">  <div class="numbertext">10 / 12</div>   <img src="photos/10.jpg" style="width:100%">    </div>
		    <div class="mySlides">  <div class="numbertext">11 / 12</div>   <img src="photos/11.jpg" style="width:100%">    </div>
     	    <div class="mySlides">  <div class="numbertext">12 / 12</div>   <img src="photos/12.jpg" style="width:100%">    </div>
    
		    <a class="prev" onClick="plusSlides(-1)" id="left">&#10094;</a>
		    <a class="next" onClick="plusSlides(1)" id="right">&#10095;</a>
		
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
		  function handleKeyboardNav(e) {
        if (!e) e = window.event;
        var kc = e.keyCode;
        if (kc == 37) nslider.prev();
        if (kc == 39) nslider.next();
    }
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
<script>

</script>
</body>
</html>
