<?php session_start();
 include '../connection.php';
 
 
 
 if(isset($_GET['id'])){
     $id=$_GET['id'];
     
        $albumSQL=mysql_query("SELECT * FROM dps_album WHERE id='$id'");
       $data= mysql_fetch_assoc($albumSQL);
      
    }
 
 
if(isset($_POST['submit'])){
    
   $albumName=$_POST['albumName'];
   $id=$_POST['id'];
   $albumDescription=$_POST['albumDescription'];
   $albumIcon=$_FILES['albumIcon']['name'];
   $albumStatus=$_POST['albumStatus'];
  if(isset($albumIcon)){
   $albumSQL="Update dps_album SET albumName='$albumName',albumDescription='$albumDescription',albumIcon='$albumIcon',albumStatus='$albumStatus' WHERE id='$id'";
   $resut=  mysql_query($albumSQL);
  if($resut){
      
      $targetDirectory="album_icons/";
      $target_file = $targetDirectory.basename($_FILES["albumIcon"]["name"]);
      $upload= move_uploaded_file($_FILES["albumIcon"]["tmp_name"], $target_file);
      if($upload){
         
          $message= "album has been Updated";
          $_SESSION['message']=$message;?>
       
       //   header('Location: http://dpsrohini.info/Gallery/AlbumListing.php');
          <script type="text/javascript">
          window.location.href = 'http://dpsrohini.info/Gallery/AlbumListing.php';
          </script>
          
          
  <?php     }
          
     
  }
   
  }else{
  $albumSQL="Update dps_album SET albumName='$albumName',albumDescription='$albumDescription' albumStatus='$albumStatus' WHERE id='$id'";
      
  $resut=  mysql_query($albumSQL);
  if($resut){
      
     
         
          $message= "album has been Updated";
          $_SESSION['message']=$message;  ?>
          <script type="text/javascript">
          window.location.href = 'http://dpsrohini.info/Gallery/AlbumListing.php';
          </script>
          
  
     
  <?php }
  }  ?>
  <script type="text/javascript">
          window.location.href = 'http://dpsrohini.info/Gallery/AlbumListing.php';
          </script>
<?php }
?>

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
    <div class="photogallery_head">Update Album </div>
    <?php if(isset($_SESSION['message']) && !empty($_SESSION['message'])){ ?>
  <div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success!</strong> <?php echo $_SESSION['message']; ?>
  </div>
    <?php } unset($_SESSION['message']);  ?>
    <div class="addphotogallery_inner">
     <div class="addphoto_gallary">
       <div class="addphoto_add">
           <form action="" method="post" enctype="multipart/form-data" >
         <div class=" apa1">
          <div class="row">
          <div class="col-xs-3">Album Name</div>
          <div class="col-xs-6"><input type="text" name="albumName" id="albumName" class="text-box" value="<?php echo $data['albumName']; ?>"></div>
          <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
          <div class="col-xs-3">&nbsp;</div>
         </div>
           <div class="row">
          <div class="col-xs-3">Album Description</div>
          <div class="col-xs-6"><textarea type="text" name="albumDescription" id="albumDescription" class="text-box" rows="3"><?php echo $data['albumDescription']; ?></textarea></div>
          <div class="col-xs-3">&nbsp;</div>
         </div>
             <div class="row">
          <div class="col-xs-3"> Album Icon</div>
          <div class="col-xs-6"><img src="album_icons/<?php echo $data['albumIcon']; ?>" width="100px" height="100px"></div>
          <div class="col-xs-3">&nbsp;</div>
         </div>
        <div class="row">
          <div class="col-xs-3">Update Album Icon</div>
          <div class="col-xs-6"><input type="file" name="albumIcon" id="albumIcon" class="text-box"></div>
          <div class="col-xs-3">&nbsp;</div>
         </div> 
        <div class="row">
          <div class="col-xs-3">Album Status</div>
          <div class="col-xs-6"><select name="albumStatus" id="albumStatus" class="text-box">
         					   		<option value="">--------Select album status---------</option>
                                                                <option value="1" <?php if($data['albumStatus']==1){ echo "selected"; } ?>>Active</option>
                                      <option value="0" <?php if($data['albumStatus']==0){ echo "selected"; } ?>>Inactive</option>
                                </select>
          </div>
          <div class="col-xs-3">&nbsp;</div>
         </div>
         <!--<div class="addphoto_area1">
          <label>Add Album Name</label><br /> 
          <input type="text" name="imagename" id="imagename" class="text-box"   />
         </div>-->
        </div>
         <div><input type="submit" name="submit" class="btn" />&nbsp;&nbsp;<input type="reset" name="Cancel" value="Cancel" class="btn btn1" /></div>
        </form>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
<!------------>
</div>
<!--<script>
window.onload = function(){
        
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("files");
        
        filesInput.addEventListener("change", function(event){
            
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                
                //Only pics
                if(!file.type.match('image'))
                  continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){
                    
                    var picFile = event.target;
                    
                    var div = document.createElement("div");
                    
                    div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/>";
                    
                    output.insertBefore(div,null);            
                
                });
                
                 //Read the image
                picReader.readAsDataURL(file);
            }                               
           
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}
    
</script>-->
<!------------->
</div>
<?php include 'footer.php'; ?>
</body>
</html>