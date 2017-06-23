<?php 
error_reporting(0);
session_start();
 include '../connection.php';
 
if(isset($_POST['submit'])){
   

     $albumID=$_POST['albumID'];
     $tagName=$_POST['tagName'];
     $status=1;
   
      $j = 0; //Variable for indexing uploaded image 
    
	$target_path1 = "PhotoGallary/"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png",".JPG","JPEG");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
        
        $uniqNo="DPSROH".rand(10,100000);
		$target_path =$target_path1 .basename($uniqNo.$_FILES['file']['name'][$i]) ;//set the target path with a new name of image
                
               
                $galleryImage= basename($uniqNo.$_FILES['file']['name'][$i]);
              
                 $albumSQL=mysql_query("INSERT INTO dps_gallery_images(albumID,tagName,status,galleryImage) value('$albumID','$tagName','$status','$galleryImage')");
 
                
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
     move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path);
    }
  }


?>
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
 <?php include 'GallerySideMenu.php'; ?>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="photogallery">
   <div class="photogallery_outer">
    <div class="photogallery_head">Add Album To Gallery</div>
    <div class="addphotogallery_inner">
     <div class="addphoto_gallary">
       <div class="addphoto_add">
           <?php  $albumData=mysql_query("SELECT * FROM dps_album WHERE albumStatus=1"); ?>
           <form action="#" method="post" enctype="multipart/form-data">
         <div class="row">
          <div class="col-xs-3">Select Album</div>
          <div class="col-xs-3"><select name="albumID" id="albumID" class="text-box">
                                <option value="">----------Select Album------------------</option>
                                <?php while($galleryData=  mysql_fetch_array($albumData)){ ?>
                                <option value="<?php echo $galleryData['id'];  ?>"><?php echo $galleryData['albumName'];  ?></option>
                                <?php } ?>
                                </select>
          </div>
          <div class="col-xs-6">&nbsp;</div>
         </div>
          <div class="row">
          <div class="col-xs-3">Add Tags in all Album Image</div>
            <input type="text" name="tagName" id="tagName" class="text-box"   />
          <div class="col-xs-6">&nbsp;</div>
         </div>
           
         <div class="addphoto_area">
          <article>
            <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           
                    <input type="button" id="add_more" class="upload" value="Add More Files"/>
                    <input type="submit" value="submit" name="submit" id="upload" class="upload"/>
          </article>
         </div>
         
        
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
            alert(files);
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
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
var abc = 0; //Declaring and defining global increement variable

$(document).ready(function() {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
    $('#add_more').click(function() {
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'file[]', type: 'file', id: 'file'}),        
                $("<br/><br/>")
                ));
    });

//following function will executes on change event of file input to select different file	
$('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {
                 abc += 1; //increementing global variable by 1
				
				var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
               
			    var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
               
			    $(this).hide();
                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: 'x.png', alt: 'delete'}).click(function() {
                $(this).parent().parent().remove();
                }));
            }
        });

//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});
</script>