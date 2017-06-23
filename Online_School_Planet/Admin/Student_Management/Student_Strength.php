<?php session_start();?>
<html lang=''><head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Student Management</title>
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>
<style>
.popup .content{overflow:hidden;}
.row{padding:1% 3%; margin:0; cursor:default;}.active{background:#0b462d; }
 .progress{margin:5px 0 !important; height:20px; width:300px; margin-left: 5%; background-color: rgb(64, 245, 168) !important;} 
 .progress-bar{ line-height:20px; color:#FFFFFF; background-color:#097b4d!important;}
 .row_new{padding:0 13%; cursor:default; margin-bottom:1%; }  .row_new .col-md-3, .row_new .col-md-1{background:#0b462d;}
 .row_new .col-md-3{ padding:1.5%; text-align:center; color:#FFFFFF;}
 .row_new .col-md-1 .img-responsive{ width:55%;} 
 .pb{max-width:100%;} .pb1{max-width:300px;}
 .col1{background:#0b462d; color:#FFFFFF; border:1px solid #0b462d;}
table td{width:130px!important;}
.col td{padding:0.5% 0; text-align:center; border:2px solid #FFF; font-size:15px; } td.col2{width:300px!important;}
.tbl-accordion td{} .tbl-accordion-nested td{border:1px solid #0b462d; padding:0%; cursor: pointer; font-size:14px;  text-align:center;}
.tbl-accordion-nested tbody td{background:#0b462d; cursor:default; color:#FFF;}
.tbl-accordion-section{width:10%;} .tbl-accordion .tbl-accordion-nested .col2{width:11%; text-align: -webkit-center;}
.tbl-accordion{ margin: 0 auto; width: 100%; } 
/*---------*/
td:first-child{font-weight:800;}
tbody tr.info td:hover {
  background-color: #266080;
  color: #fff;
  -webkit-transition-duration: 5s;
  -moz-transition-duration: 5s;
  -o-transition-duration: 5s;
  transition-duration: 5s;
  cursor: pointer;
}
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
   <li><a href="ExistingStudent_StudentMaster.php"><button class="btnmanu">Student Master</button></a></li>
   <li><a href="Allot_Transpoart.php"><button class="btnmanu">Allot Transport</button></a></li>
   <li class="active"><a href="Student_Strength.php"><button class="btnmanu">Student Strength</button></a></li>
   <li><a href="Student_Promotion.php"><button class="btnmanu">Student Promotion</button></a></li>
   <li><a href="Student_DossierL1.php"><button class="btnmanu">Student Dossier Approval Level </button></a></li>
   <li><a href="Student_ICard.php"><button class="btnmanu">Student I-card data</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="studentstrength">
   <div class="studentstrength_head">Section wise Student Strength</div>
   <div class="studentstrength_show" id="show">
     <table class="tbl-accordion" >
      <thead>
        <tr class="col"> <td class="col1" >Class</td> <td  class="col1">Old Students</td> <td class="col1">New Students</td> <td class="col1">Total Students</td> <td class="col1 col2">Bar</td>	</tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
               <tr> <td class="tbl-accordion-section" >Nursery</td>  <td >100</td>  <td>80</td>  <td>180</td>         
                 <td  class="col2"><div class="progress pb">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><?php echo $x; ?> Student in Nursery</div>
                 </div></td></tr>
              </thead>
              <tbody>
                <tr>  <td>Nursery A</td>   <td>25</td>   <td>20</td> <td>45</td>
                 <td class="col2"><div class="progress pb1">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=30; echo $y=$x * 6; ?>"><font><?php echo $y; ?> Student in Nursery A</font></div>
                 </div></td>	</tr>					
                <tr>  <td>Nursery B</td>   <td>25</td>   <td>20</td> <td>45</td>    
                 <td class="col2"><div class="progress pb1">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=25; echo $y=$x * 6; ?>"><font><?php echo $y; ?> Student in Nursery B</font></div>
                 </div></td>	</tr>					
                <tr>  <td>Nursery C</td>   <td>25</td>   <td>20</td> <td>45</td>    
                 <td class="col2"><div class="progress pb1">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=28; echo $y=$x * 6; ?>"><font><?php echo $y; ?> Student in Nursery C</font></div>
                 </div></td>	</tr>
                <tr>  <td>Nursery D</td>   <td>25</td>   <td>20</td> <td>45</td>    
                 <td class="col2"><div class="progress pb1">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y=$x * 6; ?>"><font><?php echo $y; ?> Student in Nursery D</font></div>
                 </div></td>	</tr>           
              </tbody>
             </table>
           </td>
        </tr>
        <tr>
          <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
                <tr> <td class="tbl-accordion-section">Prep</td>  <td>100</td>  <td>80</td>  <td>180</td>
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><font><?php echo $x; ?> Student in Prep</font></div>
                 </div></td>	</tr>
              </thead>
              <tbody>
                <tr>  <td>Prep A</td>   <td>25</td>   <td>20</td> <td>45</td>
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y=$x * 6; ?>"><font><?php echo $y; ?> Student in Prep A</font></div>
                 </div></td>    </tr>					
                <tr>  <td>Prep B</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y=$x * 6; ?>"><font><?php echo $y; ?> Student in Prep B</font></div>
                 </div></td>  </tr>					
                <tr>  <td>Prep C</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y=$x * 6; ?>"><font><?php echo $y; ?> Student in Prep C</font></div>
                 </div></td>   </tr>
                <tr>  <td>Prep D</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y=$x * 6; ?>"><font><?php echo $y; ?> Student in Prep D</font></div>
                 </div></td>  </tr>           
              </tbody>
            </table>
          </td>
        </tr>				
        <tr>
        <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
                <tr> <td class="tbl-accordion-section">1<sup>st</sup></td>  <td>100</td>  <td>80</td>  <td>180</td>      
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><font><?php echo $x; ?> Student in 1<sup>st</sup></font></div>
                  </div></td>    </tr>
              </thead>
              <tbody>
                <tr>  <td>1 A</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 1<sup>st</sup> A</font></div>
                 </div></td>   </tr>					
                <tr>  <td>1 B</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 1<sup>st</sup> B</font></div>
                 </div></td>  </tr>					
                <tr>  <td>1 C</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 1<sup>st</sup> C</font></div>
                 </div></td>   </tr>
                <tr>  <td>1 D</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 1<sup>st</sup> D</font></div>
                 </div></td>  </tr>           
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
                <tr> <td class="tbl-accordion-section">2<sup>nd</sup></td>  <td>100</td>  <td>80</td>  <td>180</td>    
                <td class="col2"><div class="progress">
                   <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><font><?php echo $x; ?> Student in 2<sup>nd</sup></font></div>
                 </div></td>      </tr>
              </thead>
              <tbody>
                <tr>  <td>2 A</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 2<sup>nd</sup> A</font></div>
                 </div></td>  </tr>					
                <tr>  <td>2 B</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 2<sup>nd</sup> B</font></div>
                 </div></td>  </tr>					
                <tr>  <td>2 C</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 2<sup>nd</sup> C</font></div>
                 </div></td>   </tr>
                <tr>  <td>2 D</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 2<sup>nd</sup> D</font></div>
                 </div></td>  </tr>           
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
                <tr> <td class="tbl-accordion-section">3<sup>rd</sup></td>  <td>100</td>  <td>80</td>  <td>180</td>    
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><font><?php echo $x; ?> Student in 3<sup>rd</sup></font></div>
                 </div></td>      </tr>
              </thead>
              <tbody>
                <tr>  <td>3 A</td>   <td>25</td>   <td>20</td> <td>45</td>   
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 3<sup>rd</sup> A</font></div>
                 </div></td> </tr>					
                <tr>  <td>3 B</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 3<sup>rd</sup> B</font></div>
                 </div></td>  </tr>					
                <tr>  <td>3 C</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 3<sup>rd</sup> C</font></div>
                 </div></td>  </tr>
                <tr>  <td>3 D</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 3<sup>rd</sup> D</font></div>
                 </div></td>   </tr>           
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
                <tr> <td class="tbl-accordion-section">4<sup>th</sup></td>  <td>100</td>  <td>80</td>  <td>180</td>     
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><font><?php echo $x; ?> Student in 4<sup>th</sup></font></div>
                 </div></td>     </tr>
              </thead>
              <tbody>
                <tr>  <td>4 A</td>   <td>25</td>   <td>20</td> <td>45</td>   
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 4<sup>th</sup> A</font></div>
                 </div></td> </tr>					
                <tr>  <td>4 B</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 4<sup>th</sup> B</font></div>
                 </div></td>  </tr>					
                <tr>  <td>4 C</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 4<sup>th</sup> C</font></div>
                 </div></td>   </tr>
                <tr>  <td>4 D</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 4<sup>th</sup> D</font></div>
                 </div></td>  </tr>
                 <tr>  <td>4 E</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 4<sup>th</sup> E</font></div>
                 </div></td>  </tr>           
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
                <tr> <td class="tbl-accordion-section">5<sup>th</sup></td>  <td>100</td>  <td>80</td>  <td>180</td>   
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><font><?php echo $x; ?> Student in 5<sup>th</sup></font></div>
                 </div></td>       </tr>
              </thead>
              <tbody>
                <tr>  <td>5 A</td>   <td>25</td>   <td>20</td> <td>45</td>   
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 5<sup>th</sup> A</font></div>
                 </div></td> </tr>					
                <tr>  <td>5 B</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 5<sup>th</sup> B</font></div>
                 </div></td>  </tr>					
                <tr>  <td>5 C</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 5<sup>th</sup> C</font></div>
                 </div></td>   </tr>
                <tr>  <td>5 D</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 5<sup>th</sup> D</font></div>
                 </div></td>  </tr>
                 <tr>  <td>5 E</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 5<sup>th</sup> E</font></div>
                 </div></td>  </tr>           
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
                <tr> <td class="tbl-accordion-section">6<sup>th</sup></td>  <td>100</td>  <td>80</td>  <td>180</td>     
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><font><?php echo $x; ?> Student in 6<sup>th</sup></font></div>
                 </div></td>     </tr>
              </thead>
              <tbody>
                <tr>  <td>6 A</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 6<sup>th</sup> A</font></div>
                 </div></td>  </tr>					
                <tr>  <td>6 B</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 6<sup>th</sup> B</font></div>
                 </div></td>  </tr>					
                <tr>  <td>6 C</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 6<sup>th</sup> C</font></div>
                 </div></td>  </tr>
                <tr>  <td>6 D</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 6<sup>th</sup> D</font></div>
                 </div></td>   </tr>   
                 <tr>  <td>6 E</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 6<sup>th</sup> E</font></div>
                 </div></td>   </tr>           
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
                <tr> <td class="tbl-accordion-section">7<sup>th</sup></td>  <td>100</td>  <td>80</td>  <td>180</td>   
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><font><?php echo $x; ?> Student in 7<sup>th</sup></font></div>
                 </div></td>       </tr>
              </thead>
              <tbody>
                <tr>  <td>7 A</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 7<sup>th</sup> A</font></div>
                 </div></td>  </tr>					
                <tr>  <td>7 B</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 7<sup>th</sup> B</font></div>
                 </div></td>  </tr>					
                <tr>  <td>7 C</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 7<sup>th</sup> C</font></div>
                 </div></td>  </tr>
                <tr>  <td>7 D</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 7<sup>th</sup> D</font></div>
                 </div></td>   </tr>   
                 <tr>  <td>7 E</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 7<sup>th</sup> E</font></div>
                 </div></td>   </tr>          
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
                <tr> <td class="tbl-accordion-section">8<sup>th</sup></td>  <td>100</td>  <td>80</td>  <td>180</td>     
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><font><?php echo $x; ?> Student in 8<sup>th</sup></font></div>
                 </div></td>     </tr>
              </thead>
              <tbody>
                <tr>  <td>8 A</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 8<sup>th</sup> A</font></div>
                 </div></td>  </tr>					
                <tr>  <td>8 B</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 8<sup>th</sup> B</font></div>
                 </div></td>   </tr>					
                <tr>  <td>8 C</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 8<sup>th</sup> C</font></div>
                 </div></td>   </tr>
                <tr>  <td>8 D</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 8<sup>th</sup> D</font></div>
                 </div></td>  </tr>   
                  <tr>  <td>8 E</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 8<sup>th</sup> E</font></div>
                 </div></td>  </tr>           
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
                <tr> <td class="tbl-accordion-section">9<sup>th</sup></td>  <td>100</td>  <td>80</td>  <td>180</td>    
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><font><?php echo $x; ?> Student in 9<sup>th</sup></font></div>
                 </div></td>      </tr>
              </thead>
              <tbody>
                <tr>  <td>9 A</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 9<sup>th</sup> A</font></div>
                 </div></td>   </tr>					
                <tr>  <td>9 B</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 9<sup>th</sup> B</font></div>
                 </div></td>  </tr>					
                <tr>  <td>9 C</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 9<sup>th</sup> C</font></div>
                 </div></td>  </tr>
                <tr>  <td>9 D</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 9<sup>th</sup> D</font></div>
                 </div></td>   </tr>      
                 <tr>  <td>9 E</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 9<sup>th</sup> E</font></div>
                 </div></td>   </tr>           
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
                <tr> <td class="tbl-accordion-section">10<sup>th</sup></td>  <td>100</td>  <td>80</td>  <td>180</td>   
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><font><?php echo $x; ?> Student in 10<sup>th</sup></font></div>
                 </div></td>       </tr>
              </thead>
              <tbody>
                <tr>  <td>10 A</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 10<sup>th</sup> A</font></div>
                 </div></td>  </tr>					
                <tr>  <td>10 B</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 10<sup>th</sup> B</font></div>
                 </div></td>  </tr>					
                <tr>  <td>10 C</td>   <td>25</td>   <td>20</td> <td>45</td>   
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 10<sup>th</sup> C</font></div>
                 </div></td> </tr>
                <tr>  <td>10 D</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 10<sup>th</sup> D</font></div>
                 </div></td>  </tr>
                  <tr>  <td>10 E</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 10<sup>th</sup> E</font></div>
                 </div></td>  </tr>           
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
                <tr> <td class="tbl-accordion-section">11<sup>th</sup></td>  <td>100</td>  <td>80</td>  <td>180</td>   
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><font><?php echo $x; ?> Student in 11<sup>th</sup></font></div>
                 </div></td>       </tr>
              </thead>
              <tbody>
                <tr>  <td>11NMED A</td>   <td>25</td>   <td>20</td> <td>45</td>   
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 11<sup>th</sup> A</font></div>
                 </div></td> </tr>					
                <tr>  <td>11MED B</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 11<sup>th</sup> B</font></div>
                 </div></td>  </tr>					
                <tr>  <td>11COM C</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 11<sup>th</sup> C</font></div>
                 </div></td>   </tr>
                <tr>  <td>11COM D</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 11<sup>th</sup> D</font></div>
                 </div></td>  </tr>
                <tr>  <td>12ARTS E</td>   <td>25</td>   <td>20</td> <td>45</td> 
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 11<sup>th</sup> E</font></div>
                 </div></td>   </tr>           
              </tbody>
            </table>
          </td>
        </tr>	 
        <tr>
          <td colspan="5">
            <table class="tbl-accordion-nested" width="100%">
              <thead>
                <tr> <td class="tbl-accordion-section">12<sup>th</sup></td>  <td>100</td>  <td>80</td>  <td>180</td>     
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=180; echo $x; ?>"><font><?php echo $x; ?> Student in 12<sup>th</sup></font></div>
                 </div></td>     </tr>
              </thead>
              <tbody>
                <tr>  <td>12NMED A</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 12<sup>th</sup> A</font></div>
                 </div></td>  </tr>					
                <tr>  <td>12MED B</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 12<sup>th</sup> B</font></div>
                 </div></td>  </tr>					
                <tr>  <td>12COM C</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 12<sup>th</sup> C</font></div>
                 </div></td>  </tr>
                <tr>  <td>12COM D</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 12<sup>th</sup> D</font></div>
                 </div></td>  </tr>
                <tr>  <td>12ARTS E</td>   <td>25</td>   <td>20</td> <td>45</td>  
                <td class="col2"><div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php $x=35; echo $y = $x * 6; ?>"><font><?php echo $y; ?> Student in 12<sup>th</sup> E</font></div>
                 </div></td>  </tr>           
              </tbody>
            </table>
          </td>
        </tr>		
      </tbody>
    </table>	
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
    <script>
    $('.tbl-accordion-nested').each(function(){
      var thead = $(this).find('thead');
      var tbody = $(this).find('tbody');
      
      tbody.hide();
      thead.click(function(){
        tbody. slideToggle();
      })
     
    })
    </script> 						
						

 
 
 
 




