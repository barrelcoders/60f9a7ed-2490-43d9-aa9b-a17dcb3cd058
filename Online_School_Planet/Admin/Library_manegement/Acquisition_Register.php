<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Library Management</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
   <script src="../js/dataTables-data.js"></script>
</head>
<style>
.librarysetup_input2 .col-xs-3:nth-child(odd){text-transform:capitalize;}
</style>
<body>
<div id="container">
<!----Header--------->
<div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="Acquisition_Add.php"><button class="btnmanu">Acquire a Book </button></a></li>
   <li><a href="Purchase_Order.php"><button class="btnmanu">Purchase Orders </button></a></li>
   <li class="active"><a href="Acquisition_Register.php"><button class="btnmanu">Acquisition Register Jiva </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  	<div class="librarysetup">
    	<div class="librarysetup_head">Book Information</div>
        <div class="librarysetup_input2">
        	<form action="" method="post">
            	<div class="head">Book Information</div>
                <div class="row">
                	<div class="col-xs-3">Book Series: </div>
                    <div class="col-xs-3"><Select name="bookSeries" id="bookSeries" class="text-box">
                    					  	<option value="">Select One</option>
                                          </Select>
                    </div>
                    <div class="col-xs-6">&nbsp;</div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Select Library:</div>
                    <div class="col-xs-3"><Select name="LibraryName" id="LibraryName" class="text-box">
                    					  	<option value="">Select Library</option>
                                          </Select>
                    </div>
                    <div class="col-xs-3">Location Code: </div>
                    <div class="col-xs-3"><input type="text" name="locationCode" id="locationCode" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Date: </div>
                	<div class="col-xs-3"><input type="date" name="date" id="date" class="text-box" value=""></div>
                	<div class="col-xs-3">Source(/Weed Out)</div>
                	<div class="col-xs-3"><input type="text" name="sourceWeedout" id="sourceWeedout" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3"><b>Responsibility (ed, ill, tr and comp) :</b></div>
                    <div class="col-xs-3"><input type="text" name="responsibility" id="responsibility" class="text-box" value=""></div>
                	<div class="col-xs-3">MI and MN: </div>
                	<div class="col-xs-3"><input type="text" name="miMn" id="miMn" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Class No.:</div>
                    <div class="col-xs-3"><input type="text" name="classNo" id="classNo" class="text-box"></div>
                	<div class="col-xs-3">Student Class: </div>
                	<div class="col-xs-3"><input type="text" name="studentClass" id="studentClass" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Book No.:</div>
                	<div class="col-xs-3"><input type="text" name="bookNo" id="bookNo" class="text-box" value=""></div>
                	<div class="col-xs-3">Vol. No. Vol Title: </div>
                	<div class="col-xs-3"><input type="text" name="volNoTitle" id="volNoTitle" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Subject Name: </div>
                	<div class="col-xs-3"><input type="text" name="subjectName" id="subjectName" class="text-box" value=""></div>
                	<div class="col-xs-3">Keywords: </div>
                	<div class="col-xs-3"><input type="text" name="keywords" id="keywords" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Hindi Books (Author/ Title): </div>
                	<div class="col-xs-3"><input type="text" name="hindiBook" id="hindiBook" class="text-box" value=""></div>
                	<div class="col-xs-3">Pagination: </div>
                	<div class="col-xs-3"><input type="text" name="pagination" id="pagination" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Title: </div>
                	<div class="col-xs-3"><input type="text" name="title" id="title" class="text-box" value=""></div>
                	<div class="col-xs-3">Sub Title: </div>
                	<div class="col-xs-3"><input type="text" name="subTitle" id="subTitle" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Author 1: </div>
                	<div class="col-xs-3"><input type="text" name="author1" id="author1" class="text-box" value=""></div>
                	<div class="col-xs-3">Author 2: </div>
                	<div class="col-xs-3"><input type="text" name="author2" id="author2" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Author 3: </div>
                	<div class="col-xs-3"><input type="text" name="author3" id="author3" class="text-box" value=""></div>
                	<div class="col-xs-3">Corporate Author: </div>
                    <div class="col-xs-3"><input type="text" name="corporateAuthor" id="corporateAuthor" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Place: </div>
                	<div class="col-xs-3"><input type="date" name="place" id="place" class="text-box" value=""></div>
                	<div class="col-xs-3">Publisher: </div>
                	<div class="col-xs-3"><input type="text" name="publisher" id="publisher" class="text-box" value=""></div>
                </div>
                <div class="head">Additional Information</div>
	        	<div class="row">
                	<div class="col-xs-3">Year Of Edition: </div>
                    <div class="col-xs-3"><input type="text" name="editioYear" id="editioYear" class="text-box" value=""></div>
                	<div class="col-xs-3">Edition Of Book:</div>
                	<div class="col-xs-3"><input type="text" name="editionBook" id="editionBook" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">ISBN No.:</div>
                	<div class="col-xs-3"><input type="text" name="isbnNo" id="isbnNo" class="text-box" value=""></div>
                	<div class="col-xs-3">Series Title </div>
                    <div class="col-xs-3"><input type="text" name="seriesTitle" id="seriesTitle" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Bill Date:</div>
                	<div class="col-xs-3"><input type="date" name="billDate" id="billDate" class="text-box" value=""></div>
                	<div class="col-xs-3">Bill No.:</div>
                    <div class="col-xs-3"><input type="text" name="billNo" id="billNo" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Price (COST):</div>
                	<div class="col-xs-3"><input type="text" name="price" id="price" class="text-box" value=""></div>
                	<div class="col-xs-3">Remarks:</div>
                	<div class="col-xs-3"><input type="text" name="remarks" id="remarks" class="text-box" value=""></div>
                </div>
	        	<div class="row">
                    <div class="col-xs-12" align="center"><input type="submit" name="submit" id="submit" class="btn"></div>
                </div>
                <div id="a"></div>
            </form>                
        </div>
 	</div>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
<?php include'../footer.php'; ?>
 
 
 
 




