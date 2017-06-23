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
</head>
<style>
.photogallery .photogallery_outer .addphotogallery_inner .table{width:100%; margin:3% 0;}
.photogallery .photogallery_outer .addphotogallery_inner .table table{width:100%;}
.photogallery .photogallery_outer .addphotogallery_inner .table table .col td{font-size:15px; font-weight:bold; color:#fff; background:#097b4d; }
.photogallery .photogallery_outer .addphotogallery_inner .table table td{font-size:14px; padding:0.7% 0.5%; border:1px solid #0b462d;}
.photogallery .photogallery_outer .addphotogallery_inner .table table td:first-child{width:10px;}
</style>
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
   <li><a href="AddPhotoSelect.php"><button class="btnmanu"> Add Photos</button> </a></li>
   <li><a href="AddAlbumSelect.php"><button class="btnmanu"> Add Album</button> </a></li>
   <li class="active"><a href="AddAlbumSelect.php"><button class="btnmanu"> All Album Details</button> </a></li>
  </ul>
 </div>
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
        <td>Album Image</td>
        <td>Status</td>
        <td>Action</td>
        <td>Delete</td>
       </tr>
       <tr>
        <td>1.</td>
        <td>XYZ</td>
        <td><img src="" width="50px" height="45px"></td>
        <td>Active</td>
        <td><a href="#">Edit</a></td>
        <td><a href="#">Delete</a></td>
       </tr>
       <tr>
        <td>1.</td>
        <td>XYZ</td>
        <td><img src="" width="50px" height="45px"></td>
        <td>Active</td>
        <td><a href="#">Edit</a></td>
        <td><a href="#">Delete</a></td>
       </tr>
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