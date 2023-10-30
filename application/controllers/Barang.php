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
		$data['create_url'] = $this->base . "/create";
        $data['edit_url'] = $this->base . "/edit";
        $data['delete_url'] = $this->base . "/delete";   
		$data['title'] = "Managemen Barang";
		$data['data'] = $this->barang->getAll();
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

		redirect(base_url($this->$base));
	}

	public function create()
	{
		$data['title'] = "Create Barang";		
		$data['action'] = $this->base . "/insert";

		$this->template->admthemes($this->base . '/create',$data);
	}

	public function insert()
	{
		if (!$_POST) {
			$input = (object) $this->barang->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
		}  

		if($this->barang->validate()){
			if ($this->barang->insert($input)) { 
				$this->session->set_flashdata('success', '<strong>Success</strong>, Data berhasil disimpan.'); 
				redirect('barang');
			}else {  
				$this->session->set_flashdata('success', '<strong>Success</strong>, Data gagal disimpan.');  
			}
		}else{
			$this->create();
		}
	} 

	public function faker($jumlah = 5)
	{
		for ($i=0; $i < $jumlah; $i++) {			
			$data = $this->barang->FakeToko(); 
			$this->toko->insert($data);
		}
		$this->session->set_flashdata('success', '<strong>Success</strong>, Data berhasil digenerate.'); 
		redirect('barang');
		
	}
}

/* End of file Barang.php */
