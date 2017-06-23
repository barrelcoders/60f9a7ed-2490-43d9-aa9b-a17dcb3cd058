<?php
error_reporting(0);
//include('MPDF57/mpdf.php');
//$merchantFirstName=$merchantDetail['merchantFirstName'];
//$merchantLastName=$merchantDetail['merchantLastName'];
//$invoiceDetailId=$invoiceRecord['invoiceId'];
//$invoiceCreatedDate=$invoiceRecord['invoiceDate'];
//$invoiceAmount=$invoiceRecord['totalAmount'];
//$time=strtotime($invoiceCreatedDate);
//$month=date("F",$time);
//$year=date("Y",$time);
//
//
//$subTotalAmountForHeading="";
//
//    foreach($invoiceDetail as $value){
//
//    $subTotalAmountForHeading+=$value['totalPrice'];
//    }
//
//echo "<pre />";print_r($invoiceRecord);die;
//die;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style type="text/css">
* { margin:0; padding:0 }
#templateContent { width:100%; }
.invoicewrapper { float:left; width:100%; margin:0; padding:0; }
.invoicewrapper table td { empty-cells:show }
.invoicewrapper .template1_first_row { width:907px; margin-left:6px; padding:0; }
.invoicewrapper .template1_first_row .title { float:right; width:100%; text-align:center; padding:10px 0 10px 0; font:bold 20px/24px Arial, sans-serif; color:#000; }
.invoicewrapper .template1_first_row .field { float:left; width:129px; background:url(../images/combo_bg.gif) no-repeat 0 0; border:none; color:#505050; font-size:11px; line-height:17px; height:19px; margin:0 0 0 2px; display:inline; padding:3px 22px 0 3px; }
.invoicewrapper .template1_first_row label { float:left; width:auto; padding:0 21px 0 6px; text-align:right; color:#505050; font-size:11px; line-height:18px; }
table tbody { margin:0; padding:0 }
.invoicewrapper .table_width { width:907px; font:11px/18px Arial, Helvetica, sans-serif; }
.invoicewrapper .blue_boder_top { background:#707070; }
.invoicewrapper .gray_boder_top { background:#707070; }
.invoicewrapper .table_border2 { width:100%; position:relative; padding-bottom:12px; font:11px/18px Arial, Helvetica, sans-serif; }
.invoicewrapper .company_logo { padding:15px 0 15px 15px; }
.invoicewrapper .left_colum { padding:15px 0 0 10px; }
.invoicewrapper .para_comp_name { font:bold 13px/18px Arial, Helvetica, sans-serif; }
.invoicewrapper .left_para2 { font:11px/18px Arial, Helvetica, sans-serif; }
.invoicewrapper .second_colum { padding:15px 0 0 0; position:relative; }
.invoicewrapper .invoice_row_top3 .second_colum a { float:left; width:auto; text-decoration:none; }
.invoicewrapper .invoice_row_top3 .second_colum a:hover { text-decoration:none; }
.invoicewrapper .right_text { padding:0; font:24px/32px Arial, Helvetica, sans-serif; }
.invoicewrapper .right_text2 { padding:0 5px 0 0; font:11px/18px Arial, Helvetica, sans-serif; }
.invoicewrapper .right_text2 .company_name { font:bold 13px Arial, Helvetica, sans-serif; color:#000; float:left; }
.invoicewrapper .tablebg3 { color:#000; font:11px/18px Arial, Helvetica, sans-serif; border-right:1px solid #848284; border-left:none; text-align:left; padding:7px 0 7px 10px; }
.invoicewrapper .tablebg { color:#000; font:11px/18px Arial, Helvetica, sans-serif; border-right:1px solid #848284; border-left:none; text-align:right; padding:7px 10px 7px 0; }
.invoicewrapper table.invdetail { border-left:1px solid #848284; border-bottom:1px solid #848284; width:907px!important; font:11px Arial, Helvetica, sans-serif; color:#000; }
.invoicewrapper table.invdetail td { padding:7px 5px; }
.invoicewrapper table.invdetail tr.head { background:none; height:30px!important; padding:7px 5px; }
.invoicewrapper table.invdetail .right_align { text-align:right }
.invoicewrapper table.invdetail .left_align { text-align:left }
.invoicewrapper .table_border { border-left:1px solid #848284; width:100%; }
.invoicewrapper .table_border3 { border:none; width:907px!important; }
.invoicewrapper .td_border1 { border-left:1px solid #848284; width:50%; }
.invoicewrapper .td_border2 { border-right:1px solid #848284; width:50%; }
.invoicewrapper .table_width2 { float:left; width:907px; }
.invoicewrapper .table_border4 { border-left:1px solid #848284; }
.invoicewrapper .table_border5 { border-right:1px solid #848284; }
.invoicewrapper .in_temp_gridrow1 { background:#1963aa; height:30px !important; padding:7px 5px; }
.invoicewrapper .tableheading2 { color:#000; font:11px/18px Arial, Helvetica, sans-serif; font-weight:bold; border:1px solid #848284; border-left:none; }
.invoicewrapper .tableheading { color:#000; font:11px/18px Arial, Helvetica, sans-serif; font-weight:bold; border:1px solid #848284; border-left:none; }
.invoicewrapper .total_padding { color:#000; font:11px/18px Arial, Helvetica, sans-serif; padding:0; }
.invoicewrapper .total_headings { color:#000; font:11px/18px Arial, Helvetica, sans-serif; border-bottom:none; padding:4px 0; }
.invoicewrapper .total_amounts { color:#000; font:11px/18px Arial, Helvetica, sans-serif; border-bottom:none; padding:4px 7px 4px 0; }
.invoicewrapper .total_headings2 { color:#000; font:11px/18px Arial, Helvetica, sans-serif; border-bottom:none; padding:4px 0; }
.invoicewrapper .total_headings3 { color:#000; font:11px/18px Arial, Helvetica, sans-serif; font-weight:bold; border-bottom:1px solid #848284; padding:4px 0; border-bottom:3px double #808080 }
.invoicewrapper .price_nw { font-size:18px; line-height:30px; color:#515151; font-weight:bold; border-bottom:1px solid #848284; padding:4px 8px; text-align:right; border-bottom:3px double #808080 }
.invoicewrapper .bouble_border_space { margin:0; }
.invoicewrapper .grey_bg_bot { background:#f0f0f0; padding:6px 10px 10px 10px; text-align:left }
.invoicewrapper .grey_bg_bot h5 { float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:18px; font-weight:bold; padding:0 0 6px 0; margin:0; }
.invoicewrapper .grey_bg_bot p { float:left; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:11px; line-height:18px; margin:0; padding:0; }
.boder_top { border-top:6px solid #707070; }
.outer_footer { width:100%; }
.outer_footer font { width:100%; font:11px/18px Arial, Helvetica, sans-serif; color:#000; }
</style>
<body>
<table border="0" cellpadding="0" cellspacing="0" class="invoicewrapper">
  <tbody>
     <tr>
      <td align="center" class="right_text" valign="middle" width="100%" style="font-size:24px!important;font-weight:bold;font-family:Arial;padding-bottom:10px;">Invoice for  '.$month.'  '.$year.'</td>
      </tr>
      <tr>
      <td align="center" class="right_text" valign="middle" width="100%" style="border-top:10px solid #de6300;margin-top:10px;">&nbsp;</td>
      </tr>
    <tr>
      <td id="templateContent"><table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" class="td_rel_position" width="907">
                  <tbody>
                    <tr>
                      <td><table border="0" cellpadding="0" cellspacing="0" class="table_border2" style="width:100%;" width="100%">
                          <tbody>
                            <tr>
                              <td align="left" class="company_logo" style="width:250;" valign="top"><img src="../promosol_new/images/brand.png" alt="" /></td>
                              <td align="left" class="left_colum" style="width: 300px; padding-left: 10px;" valign="top"><table border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td class="para_comp_name"> Awoofde</td>
                                    </tr>
                                    <tr>
                                      <td class="left_para2">Quisque euismod convallis eros, quis</td>
                                    </tr>
                                    <tr>
                                      <td class="left_para2"><strong>Phone:</strong>Phone: 9876543212</td>
                                    </tr>
                                    <tr>
                                      <td class="left_para2"><strong>Fax: </strong>Email: awoofde@gmail.com</td>
                                    </tr>

                                  </tbody>
                                </table></td>
                              <td width="950" align="right" valign="top" class="second_colum">
                              <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td align="right" class="right_text" valign="middle"> <font style="font:bold 16px Arial,Helvetica,sans-serif">Bill To: </font></td>
                                     </tr>
                                    <tr>
                                      <td align="right" class="right_text" valign="middle">Merchant Name : '.$merchantFirstName.' '.$merchantLastName.'  </td></tr>
                                    <tr>
                                      <td align="right" class="right_text" valign="middle">Invoice : '.$invoiceDetailId.' </td></tr>

                                    <tr>
                                    <tr>
                                      <td align="right" class="right_text" valign="middle">Invoice : '.$subTotalAmountForHeading.' </td></tr>

                                     <tr>
                                      <td align="right" class="right_text" valign="middle">Date: '.$invoiceCreatedDate.'</td>
                                     </tr>



                                  </tbody>
                                  <tbody id="additionalField">
                                  </tbody>
                                </table></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>

                <tr>
                  <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" class="td_rel_position" width="907">
                    <tbody>
                            <tr>
                                <td valign="top" align="left" width="539">&nbsp;</td>
                                <td valign="top" align="left" width="52">&nbsp;</td>
                                <td valign="top" align="left" width="655">&nbsp;</td>
                            </tr>
                            <tr><td valign="top" align="left" colspan="3" height="27">&nbsp;</td></tr>
                            <tr><td valign="top" align="left" colspan="3" height="27">&nbsp;</td></tr>

                    </tbody>
                  </table>
                </td>
              </tr>


            <tr>
              <td align="center" valign="top" width="100%"><table border="0" cellpadding="0" cellspacing="0" class="td_rel_position invdetail" width="907">
                  <tbody>
                    <tr class="head">
                      <td align="left" valign="top" class="tableheading" style="width:300px ;"> ID</td>
                      <td align="left" valign="top" class="tableheading" style="width:300px ;"> Name</td>
                      <td align="right" valign="top" class="tableheading" style="width: 300px;">Category</td>
                      <td align="right" valign="top" class="tableheading" style="width: 300px;"> No. of People who bought this deal</td>
                      <td align="right" valign="top" class="tableheading" style="width: 300px;"> Total Amount</td>

                    </tr>
                  </tbody>
                  <tbody id="itemsRow">'; ?>

<?php
$subTotal="";

    foreach($invoiceDetail as $value){
    $data1= $value['dealData']['dealID'];
    $data2= $value['dealData']['dealName'];
    $data3= $value['dealData']['categoryName'];
    $data4= $value['TotalOrder'];
    $data5= $value['totalPrice'];
    $subTotal+=$value['totalPrice']
    ?>


                  <tr class="in_temp_gray">
                      <td class="tablebg3 left_align" valign="top" style="width: 300px;"> '.$data1.' </td>
                      <td class="tablebg right_align" valign="top" style="width: 265px;">'.$data2.' </td>
                      <td class="tablebg right_align" valign="top" style="width: 200px;">'.$data3.' </td>
                      <td class="tablebg right_align" valign="top" style="width: 200px;">'.$data4.' </td>
                      <td class="tablebg right_align" valign="top" style="width: 200px;">'.$data5.' </td>
                    </tr>

<?php } ?>


               </tbody>
                  <tbody id="blankRows">
                    <tr class="in_temp_white">
                      <td class="tablebg3 left_align" valign="top">&nbsp;</td>
                      <td class="tablebg right_align" valign="top">&nbsp;</td>
                      <td class="tablebg right_align" valign="top">&nbsp;</td>
                      <td class="tablebg right_align" valign="top">&nbsp;</td>
                      <td class="tablebg right_align" valign="top">&nbsp;</td>
                    </tr>
                    <tr class="in_temp_gray">
                      <td class="tablebg3 left_align" valign="top">&nbsp;</td>
                      <td class="tablebg right_align" valign="top">&nbsp;</td>
                      <td class="tablebg right_align" valign="top">&nbsp;</td>
                      <td class="tablebg right_align" valign="top">&nbsp;</td>
                      <td class="tablebg right_align" valign="top">&nbsp;</td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center" style="margin:0; padding:0;" valign="top"><table border="0" cellpadding="0" cellspacing="0" class="table_border3" style="width:906px;">
                  <tbody>
                    <tr>
                      <td align="right" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              </td>
                              <td align="right" class="total_padding" style="margin:0;padding:0px 0 14px 0;" valign="top" width="41%"><table align="right" border="0" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                    <tr>
                                      <td align="left" class="total_headings" width="200"><strong>Total:</strong></td>
                                      <td align="right" class="total_amounts" width="200"> '.$subTotal.'</td>
                                    </tr>
                                  </tbody>
                                  <tbody id="taxRow">
                                    <tr>
                                      <td align="left" style="background:#f7f7f7" class="total_headings2">TAX</td>
                                      <td align="right" class="total_amounts" style="background:#f7f7f7"> 0.00</td>
                                    </tr>
                                  </tbody>
                                  <tbody>
                                  </tbody>
                                  <tbody>
                                  </tbody>
                                  <tbody id="additionalChargesRow">
                                  </tbody>
                                  <tbody>
                                    <tr>
                                      <td align="left" class="total_headings" style="background:#dedfde"><strong>Total</strong></td>
                                      <td align="right" class="total_amounts" style="background:#dedfde"> '.$subTotal.'</td>
                                    </tr>
                                  </tbody>
                                  <tbody>
                                  </tbody>
                                </table></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>

                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td valign="top" align="left" width="906" height="60"></td>
    </tr>

    <tr>
      <td valign="top" align="left" width="906" height="55"></td>
    </tr>
    <tr>
      <td align="center" class="right_text" valign="middle" width="100%" style="border-top:10px solid #de6300;margin-top:10px;">&nbsp;</td>
      </tr>
    <tr>
      <td id="outer_footer" align="center" style="margin:0; padding:0;" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="907">
          <tbody>
            <tr>
              <td align="left" valign="top" colspan="5" height="3"></td>
            </tr>
            <tr>
              <td style="width: 33%;" valign="top" width="33%"><font style="font:11px/18px Arial,Helvetica,sans-serif; color:#000;">Terms & condition</font></td>
 <td style="width: 33%;" valign="top" width="33%"><font style="font:11px/18px Arial,Helvetica,sans-serif; color:#000;">Thanks you for your business</font></td>
<td valign="top" width="20%"><font style="font:11px/18px Arial,Helvetica,sans-serif; color:#000;"> email:info@promosol.com</font></td>
              <td valign="top" width="20%"><font style="font:11px/18px Arial,Helvetica,sans-serif; color:#000;"> PH: 5977-4364</font></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
<?php


//$mpdf=new mPDF();
//$mpdf->WriteHTML($html);
//$mpdf->SetDisplayMode('fullpage');
//
//$mpdf->Output();

echo $html;
die;
?>