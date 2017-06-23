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
   <li><a href="BookIssue_Return.php"><button class="btnmanu">Book Issue </button></a></li>
   <li><a href="Book_Return.php"><button class="btnmanu">Book Return </button></a></li>
   <li class="active"><a href=""><button class="btnmanu">Book Lost </button></a></li>
   <li><a href="Search_Book.php"><button class="btnmanu">Search a Book  </button></a></li>
   <li><a href="Book_Issue_Staff.php"><button class="btnmanu">Book Issue To Staff  </button></a></li>
   <li><a href="Write_Book.php"><button class="btnmanu">Write Off Book  </button></a></li>
   <li><a href="Reactive_Write_Book.php"><button class="btnmanu">Reactive Write off Book  </button></a></li>
   <li><a href="Search_Book_Jiva.php"><button class="btnmanu">Search a Book Jiva  </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  	<div class="librarysetup">
    	<div class="librarysetup_head">Book Return To Library</div>
        <div class="librarysetup_input2">
        	<form action="" method="post">
	        	<div class="row">
                	<div class="col-xs-12 h">Student Information :-</div>
                </div>
                <div class="row">
                	<div class="col-xs-3"><b>Admission No.:</b></div>
                    <div class="col-xs-3"><input type="text" name="admissionNo" id="admissionNo" class="text-box" value=""></div>
                	<div class="col-xs-3"><b>Student Name:</b></div>
                    <div class="col-xs-3"><input type="text" name="studentName" id="studentName" class="text-box" value=""></div>
                </div>
	        	<div class="row">
                	<div class="col-xs-3"><b>Class:</b></div>
                    <div class="col-xs-3"><input type="text" name="class" id="class" class="text-box" value=""></div>
                	<div class="col-xs-3"><b>Roll No:</b></div>
                    <div class="col-xs-3"><input type="text" name="rollNo" id="rollNo" class="text-box" value=""></div>
                </div>
	        	<div class="row" style="border-top:1px solid #0b462d; padding-top:1%; margin-top:0.5%;">
                	<div class="col-xs-12 h">Book Information :-</div>
                </div>
	        	<div class="row">
                	<div class="col-xs-3"><b>Book ID.:</b></div>
                    <div class="col-xs-3"><input type="text" name="bookId" id="bookId" class="text-box" value=""></div>
                	<div class="col-xs-3"><b>Book Name:</b></div>
                    <div class="col-xs-3"><input type="text" name="bookName" id="bookName" class="text-box" value=""></div>
                </div>
	        	<div class="row">
                	<div class="col-xs-3"><b>Book Author:</b></div>
                    <div class="col-xs-3"><input type="text" name="bookAuthor" id="bookAuthor" class="text-box" value=""></div>
                	<div class="col-xs-3"><b>Book subject:</b></div>
                    <div class="col-xs-3"><input type="text" name="bookSubject" id="bookSubject" class="text-box" value=""></div>
                </div>
	        	<div class="row">
                	<div class="col-xs-3"><b>Book Issue Date:</b></div>
                    <div class="col-xs-3"><input type="date" name="bookIssueDate" id="bookIssueDate" class="text-box" value=""></div>
                	<div class="col-xs-3"><b>Book Return Date:</b></div>
                    <div class="col-xs-3"><input type="date" name="bookReturnDate" id="bookReturnDate" class="text-box" value=""></div>
                </div>
	        	<div class="row">
                    <div class="col-xs-12" align="center"><input type="submit" name="submit" id="submit" class="btn"></div>
                </div>
                <div id="a"></div>
            </form>                
        </div>
        <div class="librarysetup_table2">
        	<form action="" method="post">
                <table class="table-responsive" >
                    <tr class="col">
                        <td width="10px">Sr. No.</td>
                        <td width="50px">Admission No.</td>
                        <td width="130px">Name</td>
                        <td width="50px">Class</td>
                        <td width="50px">Roll No</td>
                        <td width="50px">Book No</td>
                        <td width="110px">Book Name</td>
                        <td width="110px">Author</td>
                        <td width="110px">Subject</td>
                        <td width="90px">Issue Date</td>
                        <td width="90px">Issued till Date</td>
                        <td width="50px">Fine</td>
                        <td width="50px">Fine discount</td>
                        <td width="80px">Status</td>
                        <td width="80px">Action</td>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td width="50px"><input type="text" name="admisiionNo1" id="admissionNo1" class="tb" value="A-101" readonly></td>
                        <td width="130px"><textarea name="sName1" id="sName1" class="tb" readonly>wsdfjiko</textarea></td>
                        <td width="50px"><input type="text" name="sClass1" id="sClass1" class="tb" value="1" readonly></td>
                        <td width="50px"><input type="text" name="sRollNo1" id="sRollNo1" class="tb" value="101" readonly></td>
                        <td width="50px"><input type="text" name="bookNo1" id="bookNo1" class="tb" value="111" readonly></td>
                        <td width="110px"><textarea name="bookName1" id="bookName1" class="tb" readonly>setdrtyfuyguihijkop rfhjko</textarea></td>
                        <td width="110px"><textarea name="bookAuthor1" id="bookAuthor1" class="tb" readonly>wedfghj</textarea></td>
                        <td width="110px"><textarea name="Subject1" id="Subject1" class="tb" readonly>zxcfgvbhn wertyui</textarea></td>
                        <td width="90px"><input type="text" name="issueDate1" id="issueDate1" class="tb" value="24-01-2017" readonly></td>
                        <td width="90px"><input type="text" name="issueTillDate1" id="issueTillDate1" class="tb" value="31-01-2017" readonly></td>
                        <td width="50px"><input type="text" name="sFine1" id="sFine1" class="tb" value="0" readonly></td>
                        <td width="50px"><input type="text" name="sFineDiscount1" id="sFineDiscount1" class="tb" value="0" readonly></td>
                        <td width="50px"><input type="text" name="status1" id="status1" class="tb" value="Issued" readonly></td>
                        <td width="80px"><input type="submit" name="submit" id="submit" class="btn" value="Return"></td>
                    </tr>
                </table>
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
<?php include '../footer.php' ?>
<script>

var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();
if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;
var today = year + "-" + month + "-" + day;
document.getElementById('bookIssueDate').value = today;


</script>

 
 
 
 




