<!DOCTYPE html>
<html>
 <head>
		<title>Upload Multiple Images Using jquery and PHP</title>
		<!-------Including jQuery from google------>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="script.js"></script>
		
		<!-------Including CSS File------>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../Style.css" />
        <script src="../../js/bootstrap.min.js"></script>
 </head>
<body>
<div id="container">
<!----Header--------->
<div><?php include '../header1.php'; ?></div>
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
        <div id="maindiv">

            <div id="formdiv">
               
                <form enctype="multipart/form-data" action="" method="post">
                    <div class="col-xs-3">Select Album Name</div>
                    <div class="col-xs-3">  <Select name="galleryName" id="galleryName" class="text-box" >
                        						<option value="">------Select Album Name------</option>
                     						</Select>
                    </div>
                    <div class="col-xs-6">&nbsp;</div>
                    <div class="filediv1">
                     <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
                    </div>  
                    <input type="button" id="add_more" class="upload" value="Add More Files"/>
                    <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
                </form>
                <br/>
                <br/>
				<!-------Including PHP Script here------>
                <?php include "upload.php"; ?>
            </div>
           
		   <!-- Right side div -->
           
        </div>
 </div>
</div>
</div>
</div>
</body>
</html>