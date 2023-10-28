<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter DomPDF Library
 *
 * Generate PDF's from HTML in CodeIgniter
 *
 * @packge        CodeIgniter
 * @subpackage        Libraries
 * @category        Libraries
 * @author        Ardianta Pargo
 * @license        MIT License
 * @link        https://github.com/ardianta/codeigniter-dompdf
 */
use Dompdf\Dompdf;
use Dompdf\Options;
class Pdflib extends Dompdf{
    /**
     * PDF filename
     * @var String
     */
    public $filename;
    public function __construct(){
        parent::__construct();
        $this->filename = "laporan.pdf";
    }
    /**
     * Get an instance of CodeIgniter
     *
     * @access    protected
     * @return    void
     */
    protected function ci()
    {
        return get_instance();
    }
    /**
     * Load a CodeIgniter view into domPDF
     *
     * @access    public
     * @param    string    $view The view to load
     * @param    array    $data The view data
     * @return    void
     */
    // public function load_view($view, $data = array()){
	// 	$html = ob_get_clean();
    //     $html = $this->ci()->load->view($view, $data, TRUE);
	// 	// var_dump($html);
	// 	// exit;
    //     $this->load_html($html);
    //     // Render the PDF
    //     $this->render();
    //         // Output the generated PDF to Browser
    //            $this->stream($this->filename, array("Attachment" => false));
    // }

	public function load_view($view, $data = array()){
		 // Load the Dompdf library
		 $options = new Options();
		 $options->set('isHtml5ParserEnabled', true);
		 $options->set('isPhpEnabled', true);
		 $dompdf = new Dompdf($options);
 
		 // Load your HTML content (including CSS)
		 $html = ob_get_clean();
         $html = $this->ci()->load->view($view, $data, TRUE); 

		//  var_dump($html);
		//  exit;
 
		 // Load and render HTML content to PDF
		 $dompdf->loadHtml($html);
		 $dompdf->setPaper('A4', 'portrait');
		 $dompdf->render();
 
		 // Output the PDF (download or display)
		//  $dompdf->stream("report.pdf");
		$dompdf->stream($this->filename, array("Attachment" => false));
	}
}
