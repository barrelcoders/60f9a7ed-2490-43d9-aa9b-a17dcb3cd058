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
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> <?php echo $Header;?></span><span class="label label-important"> <?php echo mysql_num_rows($rsMenuItem);?> </span></a>
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
				