<?php
require_once('TCPDF/tcpdf.php');

// Create a new TCPDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Smart Inspector System');
$pdf->SetTitle('Task Report PDF');
$pdf->SetSubject('Task Report');

// Add a page
$pdf->AddPage();

// Generate PDF content
ob_start();
include('between-date-reprtsdetails.php'); // Replace with the actual filename of your report page
$html = ob_get_contents(); // Use ob_get_contents() to capture the output buffer's content
ob_end_clean(); // Clear the output buffer

// Output the HTML content as PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF
$pdf->Output('task_report.pdf', 'D'); // 'D' will force a download
?>
