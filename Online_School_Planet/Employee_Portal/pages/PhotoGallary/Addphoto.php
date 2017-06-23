<div class="addphoto_outer">
 <div class="addphoto_inner">
  <div class="addphoto_head">Add Photos To Gallery</div>
  <div class="addphoto_add">
   <h3>Gallery</h3>
   <form action="#" method="post">
    <div class="addphoto_area">
     <article>
        <label for="files">Select photos (64M max per file)....</label>
        <input id="files" type="file" multiple/>
        <output id="result" />
    </article>
    </div>
    <div class="addphoto_area1">
     <label>Add Tags All Uploaded Image</label><br /> 
     <input type="text" name="imagename" id="imagename" class="text-box"   />
    </div></form>
    <div><input type="submit" name="submit" class="btn" />&nbsp;&nbsp;<a href="Subgallery.php" class="btn btn1" />Cancel</a></div>
   </form>
  </div>
 </div>
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