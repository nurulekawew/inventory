<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends MY_Controller {

	protected $base = "barang";

    public function __construct()
	{
		parent::__construct();
		$this->load->library('template'); 
		$this->load->library('upload_handler'); 
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
		
		$file_path = FCPATH . "upload/" . $this->barang->_filePath . "/" . $data->foto_barang; 
		if (file_exists($file_path)) {
			unlink($file_path);
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

		if (!empty($_FILES["foto_barang"]["name"])) {
			$file_name = $_FILES["foto_barang"]["name"];
			$ext = pathinfo($file_name, PATHINFO_EXTENSION);

			$input->foto_barang = $input->kode_barang . "." . $ext;
			// $this->_dumpexit($input->foto_barang . " ===  $file_name");

			if($this->barang->validate()){
				$folder = $this->barang->_filePath;
				$isUpload = $this->upload_handler->do_upload($input->foto_barang, $folder); 
				if($isUpload->status)
				{
					if ($this->barang->insertNotReturnID($input)) { 
						$this->session->set_flashdata('success', '<strong>Success</strong>, Data berhasil disimpan.'); 
						redirect(base_url($this->base));
					}else {  
						$this->session->set_flashdata('error', '<strong>Failed</strong>, ' . $isUpload->message); 
						$this->create(); 
					}
				}else{ 
					$this->session->set_flashdata('error', '<strong>Failed</strong>, ' . $isUpload->message); 
					$this->create(); 
				}
			}else{
				$this->create(); 
			}
		}else{
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
	}  


	public function edit($id = null)
	{ 
		$id = base64_decode($id); 
		$data = (object) $this->barang->where('kode_barang', $id)->get();
		$file_path = base_url("upload/" . $this->barang->_filePath . "/" . $data->foto_barang); 
		$data->location = $file_path; 
		$show = [
			'title' => "Edit " . $this->base,
			'data' => $data,
			'action' => $this->base . "-update"
		];  
		$this->template->admthemes($this->base . '/edit',$show);
	}

	public function update()
	{
		$_id = $this->input->post('id_barang');
		$id = base64_decode($this->input->post('id_barang'));

		if (!$_POST) {
			$input = (object) $this->barang->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
			$input->id_barang = $id;
		}   

		
		$existing = $this->barang->where('id_barang', $input->id_barang)->get(); 
		if($existing == null || $existing->id_barang == "" || $existing->id_barang == null){
			$this->session->set_flashdata('error', '<strong>Not Found</strong>, Data tidak ditemukan.');
			redirect(base_url($this->base));
		}

		if (!empty($_FILES["foto_barang"]["name"])) {
			$file_name = $_FILES["foto_barang"]["name"];
			$ext = pathinfo($file_name, PATHINFO_EXTENSION);

			$input->foto_barang = $existing->kode_barang . "." . $ext;

			if($this->barang->validate()){
				$folder = $this->barang->_filePath;				

				$file_path = FCPATH . "upload/" . $this->barang->_filePath . "/" . $data->foto_barang; 
				if (file_exists($file_path)) {
					unlink($file_path);
				}

				$isUpload = $this->upload_handler->do_upload($input->foto_barang, $folder); 
				if($isUpload->status)
				{
					if ($this->barang->where('id_barang', $input->id_barang)->update($input)) { 
						$this->session->set_flashdata('success', '<strong>Success</strong>, Data berhasil disimpan.'); 
						redirect(base_url($this->base));
					}
				}				
					
				$this->session->set_flashdata('error', '<strong>Failed</strong>, ' . $isUpload->message); 
				$this->edit($_id);
			}else{
				$this->edit($_id);
			}
		}else{
			if($this->barang->validate()){
				if ($this->barang->where('id_barang', $input->id_barang)->update($input)) { 
					$this->session->set_flashdata('success', '<strong>Success</strong>, Data berhasil disimpan.'); 
					redirect(base_url($this->base));
				}
			}
			$this->session->set_flashdata('error', '<strong>Error</strong>, Data gagal disimpan.'); 
			$this->edit($_id);
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
