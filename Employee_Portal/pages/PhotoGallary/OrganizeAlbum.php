<style>
   .rating {
          overflow: hidden;
          display: inline-block;
      }
      .rating-input {
          position: absolute;
          left: 0;
          top: -50px;
      }
      .rating-star {        
          display: block;
          float: right;        
          width: 16px;
          height: 16px;
		  margin-left:8px;
		    background: url('photos/star.png') 0 -16px;
          /*background: url('http://kubyshkin.ru/samples/star-rating/star.png') 0 -16px;*/
      }
      .rating-star:hover,
      .rating-star:hover ~ .rating-star,
      .rating-input:checked ~ .rating-star {
          background-position: 0 0;
      }

</style>
<div class="addphoto_outer">
 <div class="addphoto_inner">
  <div class="addphoto_head">Organize Album To Gallery</div>
  <div class="addphoto_add">
   <h3>Album</h3>
   <form action="#" method="post">
    <div class="addphoto_area">
     <img src="photos/album1.png" class="img-reponsive" style="width:220px; margin-top:1%;" />
    </div>
    <div class="addphoto_area1">
     <label>Album Name</label><br />  
     <span class="rating">
        <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1"/>
        <label for="rating-input-1-5" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1" checked="checked"/>
        <label for="rating-input-1-4" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1"/>
        <label for="rating-input-1-3" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1"/>
        <label for="rating-input-1-2" class="rating-star"></label>
        <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1"/>
        <label for="rating-input-1-1" class="rating-star"></label>
     </span>
    </div></form>
    <div><input type="submit" name="submit" class="btn" />&nbsp;&nbsp;<a href="PhotoGallary.php" class="btn btn1" />Cancel</a></div>
   </form>
  </div>
 </div>
</div>