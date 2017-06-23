    <?php 
    include '../connection.php';
    $albumSQL= mysql_query("SELECT * FROM  dps_album WHERE albumStatus=1");
    $count=  mysql_num_rows($albumSQL);
    
    
    ?>

<div class="col-md-2 hris1"> 
  <ul>
   <li ><a href="index.php"><button class="btnmanu"> Photo Gallery</button> </a></li>
   <?php if($_SESSION['userid']=="Admin"){ ?>
   <li><a href="AddPhotoSelect.php"><button class="btnmanu"> Add Photos</button> </a></li>
   <li class="active"><a href="AddAlbumSelect.php"><button class="btnmanu"> Add Album </button> </a></li>
   <li><a href="AlbumListing.php"><button class="btnmanu"> Album Listing &nbsp; &nbsp;(<?php echo $count; ?>) </button> </a></li>
   <?php } ?>
  </ul>
 </div>