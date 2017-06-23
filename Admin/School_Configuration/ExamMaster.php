<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>School Configuration</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>
<style>
table.footable-editing button.footable-add{display:block !important; float:left;}
.panel-title {font-weight:bold;}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{padding:5px 5px !important; font-size:14px !important; width:20% !important;}
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
   <li><a href="AcademicSetup_ClassMaster.php"><button class="btnmanu">Class Master </button></a></li>
   <li class="active"><a href="ExamMaster.php"><button class="btnmanu">Exam Master </button></a></li>
   <li><a href="SubjectMaster.php"><button class="btnmanu">Subject Master </button></a></li>
   <li><a href="AddSubjectForMarksE.php"><button class="btnmanu">Add Subject for Marks Entry </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="academicsetup">
   <!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Complete Exam Master</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="table-wrap">
											<table id="footable_2" class="table" data-paging="true" data-filtering="true" data-sorting="true">
												<thead>
												<tr>
													<th data-name="id" data-breakpoints="xs" data-type="number">Sr. No.</th>
													<th data-name="class">Class</th>
													<th data-name="examType">Exam Type</th>
													<th data-name="status" data-breakpoints="xs">Status <br>[1= Active / 0= Inactive]</th>
												</tr>
												</thead>
												<tbody>
												<?php 
$sql="SELECT `srno`, `MasterClass`, `class`, `status`, `datetime` FROM `class_master` WHERE 1=1";

												  $result = $conn->query($sql);												  
												  if ($result->num_rows > 0) {
												  // output data of each row
												  while($row = $result->fetch_assoc()) {
													
												  ?>
												<tr data-expanded="true">
                                                   <td><?php echo $row['srno'];?></td>
                                                   <td><?php echo $row['MasterClass'];?></td>
                                                   <td><?php echo $row['class'];?></td>
                                                   <td><?php echo $row['status'];?></td>
                                                  </tr>    
                                                                              
                                                  <?php
                                                      } }
                                                  ?>
												</tbody>
											</table>

											<!--Editor-->
											<div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">
											
											<div class="modal-dialog" role="document">
												<form class="modal-content form-horizontal" id="editor">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
														<h5 class="modal-title" id="editor-title">Add New Exam</h5>
													</div>
													<div class="modal-body">
														<input type="number" id="id" name="id" class="hidden"/>
														<div class="form-group required">
															<label for="class" class="col-sm-3 control-label">Select Class</label>
															<div class="col-sm-9">
																<select class="form-control" id="class" name="class" required>
                                                                  <option value="">Select One</option>                                                         <?php
													             $result = $conn->query($sql);												  
												  				 if ($result->num_rows > 0) {
				    											 // output data of each row
												  				 while($row = $result->fetch_assoc()) {
													
												          ?>
                                                                  <option value="<?php echo $row['MasterClass'];?>"><?php echo $row['MasterClass'];?></option>
                                                          <?php
                                                             } } 
                                                            ?>
                                                                </select>
															</div>
														</div>
														<div class="form-group required">
															<label for="examType" class="col-sm-3 control-label">Enter Exam Type</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" id="examType" name="examType" placeholder="Exam Type" required>
                                                                </select>
															</div>
														</div>
														<div class="form-group">
															<label for="status" class="col-sm-3 control-label">Status</label>
															<div class="col-sm-9">
																<select class="form-control" id="status" name="status" >
                                                                 <option value="1">1</option>
                                                                 <option value="0">0</option>
                                                                </select>
															</div>
														</div>														
													</div>
													<div class="modal-footer" id="updaterow">
													 <input type="submit" id="update" class="btn btn-primary" value="Save Changes"></button>
													 <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></button>
													</div>
                                                    <div class="modal-footer" id="addnew">
													 <input type="submit" id="add" class="btn btn-primary" value="Save Changes"></button>
													 <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></button>
													</div>
												</form>
											</div>
										</div>
										<!--/Editor-->
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
<!----------------->
</div>
<!----------------->
</div>
		<script src="../js/moment.min.js"></script>
  <link rel="stylesheet" href="../css/footable.bootstrap.min.css" />  
   <script src="../js/footable.min.js"></script>
</body>
</html>
<script>
$(function () {
	"use strict";
	
	/*Init FooTable*/
	$('#footable_1,#footable_3').footable();
	
	/*Editing FooTable*/
	
	var $modal = $('#editor-modal'),
	$editor = $('#editor'),
	$editorTitle = $('#editor-title'),
	ft = FooTable.init('#footable_2', {
		editing: {
			enabled: true,
			addRow: function(){
				$modal.removeData('row');
				$editor[0].reset();
				$editorTitle.text('Add New Exam Type');
				$modal.modal('show');
				document.getElementById("updaterow").style.display="none";
				document.getElementById("addnew").style.display="block";
			},
			editRow: function(row){
				var values = row.val();
				$editor.find('#id').val(values.id);
				$editor.find('#class').val(values.class);
				$editor.find('#examType').val(values.examType);
				$editor.find('#status').val(values.status);
				
				$modal.data('row', row);
				$editorTitle.text('Edit Sr. No. #' + values.id);
				$modal.modal('show');
				document.getElementById("updaterow").style.display="block";
				document.getElementById("addnew").style.display="none";
			},
			deleteRow: function(row){
				if (confirm('Are you sure you want to delete the row?')){
					row.delete();
				}
			}
		}
	}),
	uid = 10;

	$editor.on('submit', function(e){
		if (this.checkValidity && !this.checkValidity()) return;
		e.preventDefault();
		var row = $modal.data('row'),
			values = {
				id: $editor.find('#id').val(),
				class: $editor.find('#class').val(),
				examType: $editor.find('#examType').val(),
				status: $editor.find('#status').val(),
			};

		if (row instanceof FooTable.Row){
			row.val(values);
		} else {
			values.id = uid++;
			ft.rows.add(values);
		}
		$modal.modal('hide');
	});
});
</script>