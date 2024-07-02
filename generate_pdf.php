<?php
require_once('TCPDF/tcpdf.php');

// Create a new TCPDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Fatigue Monitoring System');
$pdf->SetTitle('Violations Report PDF');
$pdf->SetSubject('Report');

// Define inline CSS styles for title and subject
$titleStyle = 'color: black; font-size: 18pt; margin-bottom: 10px;';
$subjectStyle = 'color: black; font-size: 14pt; margin-bottom: 20px;';

// HTML content for title and subject
$title = '<h1 style="' . $titleStyle . '">Violations Report</h1>';
$subject = '<p style="' . $subjectStyle . '">Report generated on ' . date('Y-m-d') . '</p>';

// Combine title and subject HTML content
$titleAndSubject = $title . $subject;

// Add a page
$pdf->AddPage();

// Get the content of between-date-reprtsdetails.php
ob_start();
include('violations_pdf.php');
$content = ob_get_clean();


// Output the content as PDF
$pdf->writeHTML($content, true, false, true, false, '');

// Close and output PDF
$pdf->Output('task_report.pdf', 'D'); // 'D' will force a download
?>
