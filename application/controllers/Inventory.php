<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends MY_Controller {

	protected $barang_masuk = 1;
	protected $barang_keluar = 2;

    public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}
    
    // public function index()
    // {
        
	// 	$data['title'] = "Managemen Toko";
	// 	$data['data'] = $this->inventory->getAll();
	// 	$this->template->admthemes('inventory/index',$data);
    // } 
    
    public function index_masuk()
    {        
		$data['title'] = "Managemen Toko";
		$data['data'] = $this->inventory->where('status_barang', $this->barang_masuk)->getAll(); 
		$this->template->admthemes('inventory/masuk/index',$data);
    } 
    
    public function index_keluar()
    {        
		$data['title'] = "Managemen Toko"; 
		$data['data'] = $this->inventory->where('status_barang', $this->barang_keluar)->getAll(); 
		$this->template->admthemes('inventory/keluar/index',$data);
    } 

}

/* End of file Inventory.php */
