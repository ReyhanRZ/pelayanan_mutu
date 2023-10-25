<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

extract($_POST);

if (isset($download)) {
    // $dompdf = new Dompdf();

    // $html = '<h1 style="color:blue;">Hello this is from DOM PDF to convert html to PDF</h1>';

    // //$html = file_get_contents('v_mutu.php');

    // $dompdf->loadHtml($html);

    // $dompdf->setPaper('A4', 'potrait');

    // $dompdf->render();

    // $dompdf->stream("new file", array('Attachment' => 0));
    $dompdf = new DOMPDF();
    ob_start();
    require("../views/cuci_tangan/v_mutu.php");
    $html = ob_get_contents();
    ob_get_clean();
    // $path = "../views/cuci_tangan/v_mutu.php";

    $dompdf->loadHtml($html);
    $dompdf->render();
    //$dompdf->stream("file.pdf");
    // $dompdf = new Dompdf();
    // ob_start();
    // include '../views/cuci_tangan/v_mutu.php';
    // $return  = ob_get_contents();
    // ob_end_clean();
    // $return = stripslashes($return);
    // $dompdf->loadHtml($return);

    // // (Optional) Setup the paper size and orientation
    // $dompdf->setPaper('A4', 'potrait');

    // // Render the HTML as PDF
    // $dompdf->render();

    // // Output the generated PDF to Browser
    // //$dompdf->stream();

    // // Output the generated PDF (1 = download and 0 = preview)
    $dompdf->stream("codex", array("Attachment" => 0));
}
