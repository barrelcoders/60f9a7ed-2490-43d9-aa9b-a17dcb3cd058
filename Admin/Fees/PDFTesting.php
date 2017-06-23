<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */


// get the HTML
   
    $content='<TABLE borderColor=black cellSpacing=1 cellPadding=1 width="100%" border=1>  
  <TR>
    <TD>
      <P align=center>Inder</P></TD>
    <TD>
      <P align=center>Prakash</P></TD>
    <TD>
      <P align=center>Verma</P></TD></TR>
  <TR>
    <TD></TD>
    <TD></TD>
    <TD></TD></TR>
  <TR>
    <TD></TD>
    <TD></TD>
    <TD></TD></TR></TABLE>';
    
    
    // convert in PDF
    
    require_once('/html2pdf_v4.03/html2pdf.class.php');
    try
    {
    	echo "Ok";
    	exit();
    	
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('exemple01.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>