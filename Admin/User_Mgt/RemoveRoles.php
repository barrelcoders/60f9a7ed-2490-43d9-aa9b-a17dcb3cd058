<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>User Management</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>

<body>
 <div id="container">
 <!----Header--------->
  <div><?php include 'header.php'; ?></div>
  
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />   
   <script src="../js/jquery.dataTables.min.js"></script>
   <script src="../js/dataTables-data.js"></script>
  <!---------containt---------->
  <div class="c1">
   <div class="row c">
    <div class="col-md-2 hris1"> 
     <h4>SELF SERVICE</h4>
     <ul>
      <li><a href="StaffUser_AssignRoles.php"><button class="btnmanu">Assign Roles </button></a></li>
      <li class="active"><a href="RemoveRoles.php"><button class="btnmanu">Remove Roles </button></a></li>
      <li><a href="UserPermissionList.php"><button class="btnmanu">List of User Permissions </button></a></li>
     </ul>
    </div>
<!--------------Details------------------>
    <div class="col-md-10">
     <form action="#" method="post">
      <div class="assignrole">
       <div class="assignrole_outer">  <!---Start Containt-->
        <div class="assignrole_head">Employee Role & Responsibility</div>
        <div class="assignrole_inner11">
         <!-- Row -->
				<div class="row">
					<div class="col-sm-12" style="padding:0;">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Emp.Id.</th>
														<th>Application Name</th>
														<th>Master Menu</th>
														<th>Menu</th>
														<th>Page URL</th>
                                                        <th>Base URL</th>
                                                        <th>Status</th>
                                                        <th>Remove Role</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>W-101</td>
														<td>Edinburgh</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-102</td>
														<td>Tokyo</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-103</td>
														<td>San Francisco</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-104</td>
														<td>Edinburgh</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-105</td>
														<td>Tokyo</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-106</td>
														<td>New York</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-107</td>
														<td>San Francisco</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-108</td>
														<td>Tokyo</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-109</td>
														<td>San Francisco</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-110</td>
														<td>Edinburgh</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-111</td>
														<td>London</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-112</td>
														<td>Edinburgh</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-113</td>
														<td>San Francisco</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-114</td>
														<td>London</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-115</td>
														<td>London</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-116</td>
														<td>London</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
													<tr>
														<td>W-117</td>
														<td>New York</td>
														<td>asdfghjqwertyu sdftgyhujk</td>
														<td>asdfghjkl;; ;;lkjh</td>
                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>                                                        <td>asdfgh/jklasdfghj/klsdfghj/klasdfgh/jkl/;dfghjk.php</td>
                                                        <td>Active</td>
                                                        <td><a href="#">Remove Role</a></td>
													</tr>
																							
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			<!-- /Row -->	
        </div>
       </div>
      </div>
     </form>
    </div>
   </div>
 <!----------------->
  </div>
<!----------------->
 </div>
</body>
</html>
