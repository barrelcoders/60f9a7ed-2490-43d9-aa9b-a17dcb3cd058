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
   <li class="active"><a href="Acquisition_Add.php"><button class="btnmanu">Acquire a Book </button></a></li>
   <li><a href="Purchase_Order.php"><button class="btnmanu">Purchase Orders </button></a></li>
   <li><a href="Acquisition_Register.php"><button class="btnmanu">Acquisition Register Jiva </button></a></li>
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
                	<div class="col-xs-3">Select Library:</div>
                    <div class="col-xs-3"><Select name="LibraryName" id="LibraryName" class="text-box" value="">
                    					  	<option value="">Select Library</option>
                                          </Select>
                    </div>
                	<div class="col-xs-3">Select Class:</div>
                    <div class="col-xs-3"><Select name="class" id="class" class="text-box" value="">
                    					  	<option value="">Select Class</option>
                                          </Select>
                    </div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Book Code:</div>
                    <div class="col-xs-3"><input type="text" name="bookCode" id="bookCode" class="text-box"></div>
                    <div class="col-xs-6">&nbsp;</div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Subject:</div>
                	<div class="col-xs-3"><Select name="subject" id="subject" class="text-box">
                    					  	<option value="">Select Subject</option>
                                          </Select>
                    </div>
                	<div class="col-xs-3">Subject-Sub category:</div>
                	<div class="col-xs-3"><Select name="subjectSubCategory" id="subjectSubCategory" class="text-box">
                    					  	<option value="">Select One</option>
                                          </Select>
                    </div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Book Name:</div>
                	<div class="col-xs-3"><input type="text" name="bookName" id="bookName" class="text-box" value=""></div>
                	<div class="col-xs-3">Sub-Title:</div>
                	<div class="col-xs-3"><input type="text" name="subTitle" id="subTitle" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Author:</div>
                	<div class="col-xs-3"><Select name="author" id="author" class="text-box">
                    					  	<option value="">Select One</option>
                                          </Select>
                    </div>
                	<div class="col-xs-3">Publisher:</div>
                	<div class="col-xs-3"><Select name="publisher" id="publisher" class="text-box">
                    					  	<option value="">Select One</option>
                                          </Select>
                    </div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Vendor:</div>
                	<div class="col-xs-3"><Select name="vendor" id="vendor" class="text-box">
                    					  	<option value="">Select One</option>
                                          </Select>
                    </div>
                	<div class="col-xs-3">Donated Book:</div>
                	<div class="col-xs-3"><Select name="donatedBook" id="donatedBook" class="text-box">
                    					  	<option value="">Select One</option>
                                          </Select>
                    </div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Shelf-Rack:</div>
                	<div class="col-xs-3"><Select name="shelfRack" id="shelfRack" class="text-box">
                    					  	<option value="">Select One</option>
                                          </Select>
                    </div>
                	<div class="col-xs-3">Shelf-Row:</div>
                	<div class="col-xs-3"><Select name="shelfRow" id="shelfRow" class="text-box">
                    					  	<option value="">Select One</option>
                                          </Select>
                    </div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Book type:</div>
                	<div class="col-xs-3"><Select name="bookType" id="bookType" class="text-box">
                    					  	<option value="">Select One</option>
                                          </Select>
                    </div>
                	<div class="col-xs-3">Language:</div>
                	<div class="col-xs-3"><Select name="language" id="language" class="text-box">
                    					  	<option value="">Select One</option>
                                          </Select>
                    </div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Purchasing Date:</div>
                	<div class="col-xs-3"><input type="date" name="purchasingDate" id="purchasingDate" class="text-box" value=""></div>
                	<div class="col-xs-3">ISBN No.:</div>
                	<div class="col-xs-3"><input type="text" name="isbnNo" id="isbnNo" class="text-box" value=""></div>
                </div>
                <div class="head">Additional Information</div>
                <div class="row">
                	<div class="col-xs-3">Bill Date:</div>
                	<div class="col-xs-3"><input type="date" name="billDate" id="billDate" class="text-box" value=""></div>
                	<div class="col-xs-3">Bill No.:</div>
                    <div class="col-xs-3"><input type="text" name="billNo" id="billNo" class="text-box" value=""></div>
                </div>
	        	<div class="row">
                	<div class="col-xs-3">Volume:</div>
                    <div class="col-xs-3"><input type="text" name="volume" id="volume" class="text-box" value=""></div>
                	<div class="col-xs-3">Purchase Order No.:</div>
                	<div class="col-xs-3"><input type="text" name="purchaseOrderNo" id="purchaseOrderNo" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Edition No.:</div>
                	<div class="col-xs-3"><input type="text" name="editionNo" id="editionNo" class="text-box" value=""></div>
                	<div class="col-xs-3">Remarks:</div>
                	<div class="col-xs-3"><input type="text" name="remarks" id="remarks" class="text-box" value=""></div>
                </div>
                <div class="row">
                	<div class="col-xs-3">Price:</div>
                	<div class="col-xs-3"><input type="text" name="price" id="price" class="text-box" value=""></div>
                	<div class="col-xs-6">&nbsp;</div>
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
 
 
 
 




