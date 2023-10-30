<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends MY_Controller {

	protected $base = "barang";

    public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}
    
    public function index()
    {
		$data = [
			'data' => $this->barang->getAll(),
			'title' => 'Managemen Barang',
			'urls' => [
				'create' => $this->base . "-create",
				'edit' => $this->base . "-edit",
				'delete' => $this->base . "-delete",
			]
		];
		
		$this->template->admthemes('barang/index',$data);
    } 

	public function delete($id = null)
	{
		$id= base64_decode($id);

		$data = $this->barang->where('kode_barang', $id)->get();
        if (!$data) {
            $this->session->set_flashdata('warning', 'Data tidak ada.');
        }

        if ($this->barang->where('kode_barang', $id)->delete()) {
			$this->session->set_flashdata('success', '<strong>Success</strong>, Data berhasil dihapus.');
		} else {
            $this->session->set_flashdata('error', '<strong>Error</strong>, Data gagal dihapus.');
        }

		redirect(base_url($this->base));
	}

	public function create()
	{
		$data = [
			'title' => "Create Barang", 
			'action' => $this->base . "-store"
		]; 

		$this->template->admthemes($this->base . '/create',$data);
	}

	public function store()
	{
		if (!$_POST) {
			$input = (object) $this->barang->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
			$input->kode_barang = "B-" . $this->barang->nomorRdm;
			$input->stok_barang = 0;
		}  

		if($this->barang->validate()){
			if ($this->barang->insertNotReturnID($input)) { 
				$this->session->set_flashdata('success', '<strong>Success</strong>, Data berhasil disimpan.'); 
				redirect(base_url($this->base));
			}else {  
				$this->session->set_flashdata('error', '<strong>Error</strong>, Data gagal disimpan.'); 
				$this->create(); 
			}
		}else{
			$this->create();
		}
	} 

	public function faker($jumlah = 5)
	{
		for ($i=0; $i < $jumlah; $i++) {			
			$data = $this->barang->Fake(); 
			$this->barang->insert($data);
		}
		$this->session->set_flashdata('success', '<strong>Success</strong>, Data berhasil digenerate.'); 
		redirect(base_url($this->base));		
	}
}

/* End of file Barang.php */
