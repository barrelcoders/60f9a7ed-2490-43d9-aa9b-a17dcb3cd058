<?php session_start();
 include '../connection.php';
 
 


 
if(isset($_POST['submit'])){
    
   $albumName=$_POST['albumName'];
   $albumDescription=$_POST['albumDescription'];
    $albumIcon=$_FILES['albumIcon']['name'];
   $albumStatus=$_POST['albumStatus'];
  
   $albumSQL="INSERT INTO dps_album(albumName,albumDescription,albumIcon,albumStatus) value('$albumName','$albumDescription','$albumIcon','$albumStatus')";
  $resut=  mysql_query($albumSQL);
  if($resut){
      
      $targetDirectory="album_icons/";
      $target_file = $targetDirectory.basename($_FILES["albumIcon"]["name"]);
      $upload= move_uploaded_file($_FILES["albumIcon"]["tmp_name"], $target_file);
      if($upload){
         
          $message= "album has been created";
          $_SESSION['message']=$message;
          
          
      }
          
     
  }
  }


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
    <div class="photogallery_head">Add Album To Gallery</div>
    <?php if(isset($_SESSION['message']) && !empty($_SESSION['message'])){ ?>
  <div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success!</strong> <?php echo $_SESSION['message']; ?>
  </div>
    <?php } unset($_SESSION['message']);  ?>
    <div class="addphotogallery_inner">
     <div class="addphoto_gallary">
       <div class="addphoto_add">
           <form action="#" method="post" enctype="multipart/form-data" >
         <div class=" apa1">
          <div class="row">
          <div class="col-xs-3">Album Name</div>
          <div class="col-xs-6"><input type="text" name="albumName" id="albumName" class="text-box" ></div>
          <div class="col-xs-3">&nbsp;</div>
         </div>
           <div class="row">
          <div class="col-xs-3">Album Description</div>
          <div class="col-xs-6"><textarea type="text" name="albumDescription" id="albumDescription" class="text-box" rows="3"></textarea></div>
          <div class="col-xs-3">&nbsp;</div>
         </div>
        <div class="row">
          <div class="col-xs-3">Uplode Album Icon</div>
          <div class="col-xs-6"><input type="file" name="albumIcon" id="albumIcon" class="text-box"></div>
          <div class="col-xs-3">&nbsp;</div>
         </div> 
        <div class="row">
          <div class="col-xs-3">Album Status</div>
          <div class="col-xs-6"><select name="albumStatus" id="albumStatus" class="text-box">
         					   		<option value="">--------Select album status---------</option>
                                    <option value="1">Active</option>
                                      <option value="0">Inactive</option>
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