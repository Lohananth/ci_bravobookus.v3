<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'third_party\dompdf\autoload.inc.php');
use Dompdf\Dompdf;

class Pdf_Library extends DOMPDF {

  public function pdf_creator($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait"){
    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }



   public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
}