<meta http-equiv="" content="0" />
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  
<title>logo</title><link rel="icon" href="image/l1.png" type="image/x-icon">

<link rel="stylesheet" href="Bootstrap/bootstrap.min.css" />
<script src="Bootstrap/bootstrap.min.js"></script>
<script type="text/javascript">
    function clickIE4(){
    if (event.button==2){
    return false;
    }
    }
    function clickNS4(e){
    if (document.layers||document.getElementById&&!document.all){
    if (e.which==2||e.which==3){
    return false;
    }
    }
    }
    if (document.layers){
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown=clickNS4;
    }
    else if (document.all&&!document.getElementById){
    document.onmousedown=clickIE4;
    }
    document.oncontextmenu=new Function("return false")
    function disableselect(e){
    return false
    }
    function reEnable(){
    return true
    }
    //if IE4+
    document.onselectstart=new Function ("return false")
    //if NS6
    if (window.sidebar){
    document.onmousedown=disableselect
    document.onclick=reEnable
    }
    document.onkeydown = function(e) {
        if (e.ctrlKey &&
            (e.keyCode === 67 ||
             e.keyCode === 86 ||
             e.keyCode === 85 ||
             e.keyCode === 117)) {
            alert('not allowed');
            return false;
        } else {
            return true;
        }
};
</script>

</head>

<style>
 .aa11 span{    display: block; width: 30px;  height: 30px;  text-indent: -9999px;  background-image: url(image/ring.png);     background-position: -5px 0px; } .aa11 span:hover{     background-position: 28px 0px; } .radio1 td a{float:left; } .radio1 .font1{ margin-top:6px; text-decoration:none; cursor:pointer; } #header{ font-family:Cambria;}
 @media only screen and (min-width:1280px) and (max-width: 1920px){
  .a .img-responsive{ margin-left:5%; width:30%;  }
 ul{ line-height:2 ; }
 .aa11{ margin:7% 5% 0 5% ; }
 .aa11 .table-responsive{ width:30%; height:50%; background:rgb(249,249,249); margin-left:33%; }
 .table-responsive .img-responsive{ margin-left:42% ; margin-top:-4% ; margin-bottom:3% ; }
 .aa11 .table-responsive tr td h3{ }
 .aa11 .table-responsive tr td{ padding-left:9%; padding-top:10%; }
 .aa11 tr td a .img-responsive{float:left;  margin-left:10% ; margin-top:10% ; margin-bottom:3% ; }
 }
 @media only screen and (min-width:980px) and (max-width: 1280px){
 
  .a .img-responsive{ margin-left:5%;  }
 ul{ line-height:2 ; }
 .aa11{ margin:7% 5% 0 5% ; }
 .aa11 .table-responsive{ width:50%; height:50%; background:rgb(249,249,249); margin-left:25%; }
 .table-responsive .img-responsive{ margin-left:42% ; margin-top:-4% ; margin-bottom:3% ; }
 .aa11 .table-responsive tr td h3{ }
 .aa11 .table-responsive tr td{ padding-left:14%; padding-top:10%; }
 .aa11 tr td a .img-responsive{float:left;  margin-left:10% ; margin-top:10% ; margin-bottom:3% ; }


}
@media only screen and (min-width:768px) and (max-width: 980px){

  .a .img-responsive{ margin-left:5%; width:50%; }
 ul{ line-height:2 ; }
 .aa11{ margin:7% 5% 0 5% ; }
 .aa11 .table-responsive{ width:50%; height:50%; background:rgb(249,249,249); margin-left:25%; }
 .table-responsive .img-responsive{ margin-left:42% ; margin-top:-5% ; margin-bottom:3% ; }
 .aa11 .table-responsive tr td h3{ }
 .aa11 .table-responsive tr td{ padding-left:8%; padding-top:10%; }
 .aa11 tr td a .img-responsive{float:left;  margin-left:10% ; margin-top:10% ; margin-bottom:3% ; }
}
@media only screen and (min-width:480px) and (max-width: 768px){
  .a .img-responsive{ margin-left:5%; width:60%;  }
 ul{ line-height:2 ; }
 .aa11{ margin:7% 5% 0 5% ; }
 .aa11 .table-responsive{ width:90%; height:50%; background:rgb(249,249,249); margin-left:5%; }
 .table-responsive .img-responsive{ margin-left:42% ; margin-top:-5% ; margin-bottom:3% ; }
 .aa11 .table-responsive tr td h3{ }
 .aa11 .table-responsive tr td{ padding-left:14%; padding-top:10%; }
 .aa11 tr td a .img-responsive{float:left;  margin-left:10% ; margin-top:10% ; margin-bottom:3% ; }
}

@media only screen and (min-width:240px) and (max-width: 480px){
  .a .img-responsive{ margin-left:5%; width:70%;  }
 ul{ line-height:2 ; }
 .aa11{ margin:7% 5% 0 5% ; }
 .aa11 .table-responsive{ width:90%; height:50%; background:rgb(249,249,249); margin-left:4%; }
 .table-responsive .img-responsive{ margin-left:42% ; margin-top:-5% ; margin-bottom:3% ; }
 .aa11 .table-responsive tr td h3{ }
 .aa11 .table-responsive tr td{ padding-left:3%; padding-top:10%; }
 .aa11 tr td a .img-responsive{float:left;  margin-left:10% ; margin-top:10% ; margin-bottom:3% ; }
}
 @media only screen and (min-width:240px) and (max-width: 400px){
  .a .img-responsive{ margin-left:5%; width:70%;  }
 ul{ line-height:2 ; }
 .aa11{ margin:7% 5% 0 5% ; }
 .aa11 .table-responsive{ width:95%; height:50%; background:rgb(249,249,249); margin-left:3%; }
 .table-responsive .img-responsive{ margin-left:42% ; margin-top:-7% ; margin-bottom:3% ; }
 .aa11 .table-responsive tr td{ padding-left:3%; padding-top:3%; }
 .aa11 tr td a .img-responsive{float:left;  margin-left:10% ; margin-top:10% ; margin-bottom:3% ; }
}
</style>


<body>

<!--header-->
<div id="container"> 
 <div style="background:rgba(11,70,45,0.6)" class="a"> <img src="image/dpslogo.png" class="img-responsive" /></div>
 
<!---Container-->
   <div class="aa11">
   <table class="table-responsive" style="background:rgba(11,70,45,0.1)">
	   <thead style="background:rgba(11,70,45,0.84)">
	   	<th colspan="2"><img src="image/m.png" class="img-responsive"></th>
	   </thead>
   	   <tr>
   	   	<td colspan="2" style="padding:0;"> <h3 align="center" style="color:rgba(11,70,45,0.84)">LOGIN</h3></td>
   	   </tr>
	   <tr class="radio1">	 
		<td> <a href="studentlogin.php"><span></span></a><a class="font1">Student Login</a></td>
		<td> <a href="HRM_New/Login.php"><span></span></a><a class="font1">Staff Login</a></td>
           </tr>
    
	<tr>
		<div class="i">
		      	<td colspan="2">
		      	<a href="https://www.facebook.com/pages/Delhi-Public-School-Faridabad/1660756614156230"><img src="image/f.png" class="img-responsive"></a>
		      	<a href="#linkedln.com"><img src="image/i.png" class="img-responsive"></a>
		      	<a href="#globle.com"><img src="image/w.png" class="img-responsive"></a></td>
	    	</div>
  	</tr>
   </table>
  </div>
</div>
</body>
</html>
