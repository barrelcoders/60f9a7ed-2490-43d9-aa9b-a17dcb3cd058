<?php session_start();
 include '../connection.php';
 
 if(isset($_GET['id'])){
     $id=$_GET['id'];
     
        $result=mysql_query("DELETE  FROM dps_album WHERE id='$id'");
        if($result){ 
         $message= "album has been Deleted";
          $_SESSION['message']=$message;?>
        
        ?>
          <script type="text/javascript">
          window.location.href = 'http://dpsrohini.info/Gallery/AlbumListing.php';
          </script>
        
     <?php    }
       
      
    }
 

 ?>