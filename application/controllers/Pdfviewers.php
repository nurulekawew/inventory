<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfviewers extends CI_Controller {

	public function index()
	{
		// $data = array(
		// 	"dataku" => array(
		// 		"nama" => "Petani Kode",
		// 		"url" => "http://petanikode.com"
		// 	)
		// );
	
		// $this->load->library('pdf');
	
		// $this->pdf->setPaper('A4', 'potrait');
		// $this->pdf->filename = "laporan-petanikode.pdf";
		// $this->pdf->load_view('laporan_pdf', $data);
		$this->load->view('laporan_pdf');
		
	}

}

/* End of file PdfViewers.php */
