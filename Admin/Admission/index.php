<?php 
      session_start();
     
      if(empty($_SESSION['userid'])){
      header('location: http://dpsrohini.info/Admin/Login.php'); 
      }
      ?>