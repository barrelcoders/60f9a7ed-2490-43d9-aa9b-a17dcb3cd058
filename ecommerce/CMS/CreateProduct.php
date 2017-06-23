<?php
include '../../connection.php';
session_start();
?>
<?php
if(isset($_POST['submit']))
{
      $Supplier=$_POST['txtSupplier'];
      $ProductId=$_POST['txtProductId'];
      $Category=$_POST['txtCategory'];
      $SubCategory=$_POST['txtSubCategory'];
     $SubCategoryone=$_POST['txtSubCategoryone'];
     $SubCategoryParameter=$_POST['txtParameter'];
     $ProductName=$_POST['txtProductName'];
      $ProductPhoto=$_POST['txtProductPhoto'];
      $Quantity=$_POST['txtQuantity'];
      $sclass=$_POST['txtsclass'];
      $UnitPrice=$_POST['txtUnitPrice'];
      $CourierCharges=$_POST['txtCourierCharges'];
      $Weight=$_POST['txtWeight'];
      $Description=$_POST['txtDescription'];
      
       			$t=time();				
			  $extension = end(explode(".", $_FILES["txtProductPhoto"]["name"]));
			  
			  $ProductPhoto="";
			  if($_FILES["txtProductPhoto"]["name"] !="")
			  {
			      $ProductPhoto="ProductPhoto".$t.$_FILES["txtProductPhoto"]["name"];
			      /*
			      if ($_FILES['F1']['size'] > 250000) 
			      {
			      	echo "<br><br><center>Please check the size of Certificate image,maximum file size allowed is 250 Kb<br>Plese click <a href='StudentRegistration.php'>here</a> to restart the registration process again";
			      	exit();
			      }
			      */
			  }
		      
		      move_uploaded_file($_FILES["txtProductPhoto"]["tmp_name"],"../images/ProductPhotos/ProductPhoto".$t.$_FILES["txtProductPhoto"]["name"]);

      
   mysql_query("INSERT INTO `Commerce_Product`(`Supplier`, `ProductId`, `Category`, `SubCategory`, `SubCategory1`, `Parameter`, `ProductName`, `ProductPhoto`, `Quantity`, `sclass`, `UnitPrice`, `CourierCharges`,`Weight`, `Description`) VALUES('$Supplier','$ProductId','$Category','$SubCategory','$SubCategoryone','$SubCategoryParameter','$ProductName','$ProductPhoto','$Quantity','$sclass','$UnitPrice','$CourierCharges','$Weight','$Description')");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
      body { font-size: 80%; font-family: 'Lucida Grande', Verdana, Arial, Sans-Serif; }
      ul#tabs { list-style-type: none; margin: 30px 0 0 0; padding: 0 0 0.3em 0; }
      ul#tabs li { display: inline; }
      ul#tabs li a { color: #42454a; background-color: #dedbde; border: 1px solid #c9c3ba; border-bottom: none; padding: 0.3em; text-decoration: none; }
      ul#tabs li a:hover { background-color: #f1f0ee; }
      ul#tabs li a.selected { color: #000; background-color: #f1f0ee; font-weight: bold; padding: 0.7em 0.3em 0.38em 0.3em; }
      div.tabContent { border: 1px solid #c9c3ba; padding: 0.5em; background-color: #f1f0ee; }
      div.tabContent.hide { display: none; }
    </style>
	<script type="text/javascript">
    //<![CDATA[

    var tabLinks = new Array();
    var contentDivs = new Array();

    function init() {

      // Grab the tab links and content divs from the page
      var tabListItems = document.getElementById('tabs').childNodes;
      for ( var i = 0; i < tabListItems.length; i++ ) {
        if ( tabListItems[i].nodeName == "LI" ) {
          var tabLink = getFirstChildWithTagName( tabListItems[i], 'A' );
          var id = getHash( tabLink.getAttribute('href') );
          tabLinks[id] = tabLink;
          contentDivs[id] = document.getElementById( id );
        }
      }

      // Assign onclick events to the tab links, and
      // highlight the first tab
      var i = 0;

      for ( var id in tabLinks ) {
        tabLinks[id].onclick = showTab;
        tabLinks[id].onfocus = function() { this.blur() };
        if ( i == 0 ) tabLinks[id].className = 'selected';
        i++;
      }

      // Hide all content divs except the first
      var i = 0;

      for ( var id in contentDivs ) {
        if ( i != 0 ) contentDivs[id].className = 'tabContent hide';
        i++;
      }
    }

    function showTab() {
      var selectedId = getHash( this.getAttribute('href') );

      // Highlight the selected tab, and dim all others.
      // Also show the selected content div, and hide all others.
      for ( var id in contentDivs ) {
        if ( id == selectedId ) {
          tabLinks[id].className = 'selected';
          contentDivs[id].className = 'tabContent';
        } else {
          tabLinks[id].className = '';
          contentDivs[id].className = 'tabContent hide';
        }
      }

      // Stop the browser following the link
      return false;
    }

    function getFirstChildWithTagName( element, tagName ) {
      for ( var i = 0; i < element.childNodes.length; i++ ) {
        if ( element.childNodes[i].nodeName == tagName ) return element.childNodes[i];
      }
    }

    function getHash( url ) {
      var hashPos = url.lastIndexOf ( '#' );
      return url.substring( hashPos + 1 );
    }

    //]]>
    </script>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>New Product</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body onload="init()">
		<!-- start: Header -->
		
		<?php include 'Header.php'; ?>
		
		<!-- start: Header -->
		
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<?php
						$ssql="SELECT distinct `Menu` FROM `user_menu_master` WHERE `ApplicationName`='E-Commerce Portal' and `Menu`=`MasterMenu` and `EmpId`='Admin'";
						$rsMainMenu= mysql_query($ssql);
						 while($row1 = mysql_fetch_row($rsMainMenu))
						 {
						 	$Header=$row1[0];
						 	$rowcount=$rowcount + 1;
						 	$ssql="SELECT distinct `Menu`,`PageURL` FROM `user_menu_master` WHERE `ApplicationName`='E-Commerce Portal' and `MasterMenu`='$Header' and `Menu` !=`MasterMenu` and `EmpId`='Admin'";
							//echo $ssql;
							//exit();
							$rsMenuItem= mysql_query($ssql);
						?>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> 
							<p> <?php echo $Header;?></span><span class="label label-important"> <?php echo mysql_num_rows($rsMenuItem);?> </span></a>
							<ul>
								<?php
								if(mysql_num_rows($rsMenuItem)>0)
								{
									while($rowS=mysql_fetch_row($rsMenuItem))
									{
										$SubMenu=$rowS[0];
										$PageURL=$rowS[1];
								?>
								<li><a class="submenu" href="<?php echo $PageURL;?>"><i class="icon-file-alt"></i><span class="hidden-tablet"> <?php echo $SubMenu;?></span></a></li>
								<?php
									}
								}
								?>								
							</ul>	
						</li>
						<?php
						}
						?>						
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			<div class="box span12">
			
    <ul id="tabs">
      <li><a href="General">General</a></li>
      <li><a href="#Data">Data</a></li>
      <li><a href="#Images">Images</a></li>
    </ul>

    <div class="tabContent" id="General">
      <h2>General</h2>
      <div class="box-content" style="left: 0px; top: 0px">
						<form class="form-horizontal" method ="post" enctype="multipart/form-data">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Supplier</label>
							  <div class="controls">
							  <select name="txtSupplier"  id="typeahead" class="span6 typeahead">
								<option selected="" value="Select One">Select One</option>
								 <?php
									$ssqlName="SELECT distinct `suppliername` FROM `Commerce_supplier_master`";
									$rsName= mysql_query($ssqlName);
									
									while($row1 = mysql_fetch_row($rsName))
									{
											$Name=$row1[0];
									?>
								 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
								 <?php 
									}
									?>
								</select></font></b>								
								
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" >Product Id</label>
							  <div class="controls">
								<input type="text" name="txtProductId"class="span6 typeahead" id="typeahead">
							  </div>
							</div>
                             <div class="control-group">
							  <label class="control-label" for="typeahead">Category</label>
							  <div class="controls">
							  <select name="txtCategory"  id="typeahead" class="span6 typeahead">
								<option selected="" value="Select One">Select One</option>
								 <?php
									$ssqlName="SELECT distinct `Category` FROM `Commerce_Category`";
									$rsName= mysql_query($ssqlName);
									
									while($row1 = mysql_fetch_row($rsName))
									{
											$Name=$row1[0];
									?>
								 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
								 <?php 
									}
									?>
								</select></font></b>								
								
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Sub-Category</label>
							  <div class="controls">
							  <select name="txtSubCategory"  id="typeahead" class="span6 typeahead">
								<option selected="" value="Select One">Select One</option>
								 <?php
									$ssqlName="SELECT distinct `SubCategory` FROM `Commerce_SubCategory`";
									$rsName= mysql_query($ssqlName);
									
									while($row1 = mysql_fetch_row($rsName))
									{
											$Name=$row1[0];
									?>
								 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
								 <?php 
									}
									?>
								</select></font></b>								
								
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Sub Category-1</label>
							  <div class="controls">
							  <select name="txtSubCategoryone"  id="typeahead" class="span6 typeahead">
								<option selected="" value="Select One">Select One</option>
								 <?php
									$ssqlName="SELECT distinct `SubCategory_one` FROM `Commerce_SubCategory_One`";
									$rsName= mysql_query($ssqlName);
									
									while($row1 = mysql_fetch_row($rsName))
									{
											$Name=$row1[0];
									?>
								 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
								 <?php 
									}
									?>
								</select></font></b>								
								
							  </div>
							</div>

                             <div class="control-group">
							  <label class="control-label" for="typeahead">Parameter</label>
							  <div class="controls">
							  <select name="txtParameter"  id="typeahead" class="span6 typeahead">
								<option selected="" value="Select One">Select One</option>
								 <?php
									$ssqlName="SELECT distinct `Parameter` FROM `Commerce_Parameter`";
									$rsName= mysql_query($ssqlName);
									
									while($row1 = mysql_fetch_row($rsName))
									{
											$Name=$row1[0];
									?>
								 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
								 <?php 
									}
									?>
								</select></font></b>								
								
							  </div>
							</div>
                           <div class="control-group">
							  <label class="control-label" >Product Name</label>
							  <div class="controls">
								<input type="text" name="txtProductName" class="span6 typeahead" id="typeahead">
							  </div>
							</div>
                              <div class="control-group">
							  <label class="control-label" >Quantity</label>
							  <div class="controls">
								<input type="text"  name="txtQuantity" class="span6 typeahead" id="typeahead">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" >Class</label>
							  <div class="controls">
								<input type="txtsclass" class="span6 typeahead" id="typeahead">
							  </div>
							</div>
                             <div class="control-group">
							  <label class="control-label" >Unit Price</label>
							  <div class="controls">
								<input type="text"  name="txtUnitPrice" class="span6 typeahead" id="typeahead">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" >Courier Charges</label>
							  <div class="controls">
								<input type="text" name="txtCourierCharges" class="span6 typeahead" id="typeahead">
							  </div>
							</div>
                             <div class="control-group">
							  <label class="control-label" >Weight</label>
							  <div class="controls">
								<input type="text" name="txtWeight" class="span6 typeahead" id="typeahead">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Photo</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="txtProductPhoto" id="fileInput" type="file">
							  </div>
							</div>          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" name="txtDescription" rows="3"></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <input type="submit" name="submit" value="Submit" class="btn">
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
    </div>

    <div class="tabContent" id="Data">
      <h2>Data</h2>
      <div class="box-content">
						<form class="form-horizontal">
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Photo</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput"  name="txtProductPhoto1" type="file">
							  </div>
							</div>          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="txtProductDescription"></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <input type="submit" name="submit" value="Submit" class="btn">
							 <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>    </div>

    <div class="tabContent" id="Images">
      <h2>Images</h2>
      <div class="box-content">
						<form class="form-horizontal">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Photo</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput"  name="txtProductPhoto2" type="file">
							  </div>
							</div>  
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" name="txtProductDescription" rows="3"></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <input type="submit" name="submit" value="Submit" class="btn">
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>    </div>

    <p><a href="/articles/javascript-tabs/">Return to the JavaScript Tabs article</a></p>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					
				</div><!--/span-->

			</div><!--/row-->
</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

			
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
