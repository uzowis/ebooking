<?php
require ('vendor/autoload.php');
//use vendor\Spipu\Html2Pdf\src\Html2Pdf;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

$html = file_get_contents('myhtml.html');
$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($html);
$html2pdf->output('booking_invoice.pdf'); // Generate and load the PDF in the browser.

?>