<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends MY_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}
    
    public function index()
    {
        
		$data['title'] = "Managemen Barang";
		$data['data'] = $this->barang->getAll();
		$this->template->admthemes('barang/index',$data);
    } 

}

/* End of file Barang.php */
