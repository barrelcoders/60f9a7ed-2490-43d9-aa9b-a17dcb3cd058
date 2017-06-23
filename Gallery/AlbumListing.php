<!----Header--------->
<?php 
   error_reporting(0);
include 'header.php'; ?>
<style type="text/css">
.photogallery .photogallery_outer .addphotogallery_inner .table{width:100%; margin:3% 0;}
.photogallery .photogallery_outer .addphotogallery_inner .table table{width:100%;}
.photogallery .photogallery_outer .addphotogallery_inner .table table .col td{font-size:15px; font-weight:bold; color:#fff; background:#097b4d; }
.photogallery .photogallery_outer .addphotogallery_inner .table table td{font-size:14px; padding:0.7% 0.5%; border:1px solid #0b462d;}
.photogallery .photogallery_outer .addphotogallery_inner .table table td:first-child{width:10px;}
</style>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <?php 
 session_start();
 include 'GallerySideMenu.php'; ?>
<!--------------Details------------------>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="photogallery">
   <div class="photogallery_outer">
    <div class="photogallery_head">All Album Detail and Edit</div>
    <div class="addphotogallery_inner">
     <div class="table"> 
      <table class="table-responsive">
       <tr class="col">
        <td>Sr.No.</td>
        <td>Album Name</td>
        <td>Album Description</td>
        <td>Album Image</td>
        <td>Status</td>
        <td>Action</td>
        
       </tr>
       <?php include '../connection.php';
        $albumSQL=mysql_query("SELECT * FROM dps_album");
        $i=1;
       while($data=  mysql_fetch_array($albumSQL)) { ?>
       
       <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data['albumName'] ?></td>
        <td><?php echo $data['albumDescription'] ?></td>
        <td><img src="album_icons/<?php echo $data['albumIcon'] ?>" width="100px" height="100px"></td>
        <td><?php if($data['albumStatus']==1){echo "Active";}else{echo "Inactive"; } ?></td>
        <td><a href="EditAlbum.php?id=<?php echo $data['id'] ?>"><img src="photos/edit.png" width="58px;" height="58px" ></a> <a href="DeleteAlbum.php?id=<?php echo $data['id'] ?>"><img src="photos/remove-icon-png-26.png" width="58px;" height="58px"></a></td>
       
       </tr>
       <?php $i++; }  ?>
      </table>
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