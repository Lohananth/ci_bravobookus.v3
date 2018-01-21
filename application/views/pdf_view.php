<?php
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Applephagna');
$pdf->SetTitle('tcpdf_generator');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}
// ---------------------------------------------------------
// set font
$pdf->SetFont('dejavusans', '', 10);
// add a page
// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table
// add a page
$pdf->AddPage();
// Print some HTML Cells
$heading = <<<EDO
	<h3>List of Vechicle Schedule</h3>
EDO;
$pdf->writeHTMLCell(0, 0, '', '', $heading, 0, 1, 0, true, 'C', true);
$pdf->Ln(5);
$table = '<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped table-condensed">
		<thead>
			<tr>
				<th>No.</th>
				<th>Origin</th>
				<th>Destination</th>
				<th>Vechicle Name</th>
				<th>Departure Time</th>
				<th>Duration</th>
				<th>Local Price</th>
				<th>Foreign Price</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>';
$pdf->writeHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);
// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
ob_clean();
$pdf->Output('tcpdf_generator.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
