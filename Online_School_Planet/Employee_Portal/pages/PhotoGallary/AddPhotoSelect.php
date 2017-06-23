<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Employee Portal</title><link rel="icon" href="../../images/l1.png" type="image/x-icon">
   
   <link rel="stylesheet" href="Style.css" />
   <link rel="stylesheet" href="nexus.css" />
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
   <li ><a href="PhotoGallary.php"><button class="btnmanu"> Photo Gallery</button> </a></li>
   <li class="active"><a href="AddPhotoSelect.php"><button class="btnmanu"> Add Photos</button> </a></li>
   <li><a href="AddAlbumSelect.php"><button class="btnmanu"> Add Album</button> </a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="photogallery">
   <div class="photogallery_outer">
    <div class="photogallery_head">Add Album To Gallery</div>
    <div class="addphotogallery_inner">
     <div class="addphoto_gallary">
       <div class="addphoto_add">
        <form action="#" method="post">
         <div class="row">
          <div class="col-xs-3">Select Album</div>
          <div class="col-xs-3"><select name="selectalbum" id="selectalbum" class="text-box">
         					   		<option value="">Select One</option>
                                </select>
          </div>
          <div class="col-xs-6">&nbsp;</div>
         </div>
         <div class="addphoto_area">
          <article>
            <label for="files">Select photos (64M max per file)....</label>
            <input id="files" type="file" multiple/>
            <output id="result" />
          </article>
         </div>
         <div class="addphoto_area1">
          <label>Add Tags in all Album Image</label><br /> 
          <input type="text" name="imagename" id="imagename" class="text-box"   />
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
<script>
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
    
</script>
<!------------->
</div>
<?php include 'footer.php'; ?>
</body>
</html>