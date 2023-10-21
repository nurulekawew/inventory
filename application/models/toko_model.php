<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko_Model extends MY_Model {
 

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'nama_toko',
                'label' => 'Nama Toko',
                'rules' => 'trim|required|min_length[3]|max_length[100]'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required|min_length[4]|max_length[100]'
            ],
            [
                'field' => 'nomer_handphone',
                'label' => 'Telp',
                'rules' => 'trim|required|min_length[11]|max_length[12]'
            ],
        ];

        return $validationRules;
    }

	public function getDefaultValues()
    {
        return [
            'nama_toko'    => '',
            'alamat'  => '',
            'nomer_handphone'      => '',         
        ];
    }
    

}

/* End of file ModelName.php */
