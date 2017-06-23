<style>
.north {transform:rotate(0deg); -ms-transform:rotate(0deg); /* IE 9 */ -webkit-transform:rotate(0deg); /* Safari and Chrome */ width:300px; height:230px;
margin-top:1%;}
.west {transform:rotate(90deg);-ms-transform:rotate(90deg); /* IE 9 */-webkit-transform:rotate(90deg); /* Safari and Chrome */width:230px; height:230px;margin-top:1%;}
.south {transform:rotate(180deg);-ms-transform:rotate(180deg); /* IE 9 */-webkit-transform:rotate(180deg); /* Safari and Chrome */width:300px; height:230px;margin-top:1%;}
.east {transform:rotate(270deg);-ms-transform:rotate(270deg); /* IE 9 */-webkit-transform:rotate(270deg); /* Safari and Chrome */width:230px; height:230px;margin-top:1%;}
.rotate{margin-top:-200px; position:absolute; margin-left:50px;}
.rotate #inputr{ background:#097b4d; color:#fff; border:1px solid transparent; border-radius:5px;}
.rotate #inputr:hover{ background:#0b462d;}
</style>
<div class="addphoto_outer">
 <div class="addphoto_inner">
  <div class="addphoto_head">Edit Photos To Gallery</div>
  <div class="addphoto_add">
   <h3>Image</h3>
   <form action="#" method="post">
    <div class="addphoto_area">
     <img src="photos/1.jpg" class="img-reponsive north" id="image1" />
    </div>
     <div class="rotate"><img src=""><input type="button" value="90' Rotate" id="inputr"></div>
    <div class="addphoto_area1">
     <label>Edit Image Name</label><br /> 
     <input type="text" name="imagename" id="imagename" class="text-box"   />
    </div></form>
    <div><input type="submit" name="submit" class="btn" />&nbsp;&nbsp;<a href="Subgallery.php" class="btn btn1" />Cancel</a></div>
   </form>
  </div>
 </div>
</div>
<script>
$('#inputr').click(function(){
    var img = $('#image1');
    if(img.hasClass('north')){
        img.attr('class','west');
    }else if(img.hasClass('west')){
        img.attr('class','south');
    }else if(img.hasClass('south')){
        img.attr('class','east');
    }else if(img.hasClass('east')){
        img.attr('class','north');
    }
});
</script>