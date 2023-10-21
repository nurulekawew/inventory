<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_Model extends MY_Model {
 

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'id_inventory',
                'label' => 'Id Inventory',
                'rules' => 'trim|required|min_length[3]|max_length[100]'
            ],
            [
                'field' => 'kode_barang',
                'label' => 'Kode Barang',
                'rules' => 'trim|required|min_length[4]|max_length[100]'
            ],
            [
                'field' => 'jumlah_unit',
                'label' => 'Jumlah Unit',
                'rules' => 'trim|required|min_length[11]|max_length[10]'
            ],
            [
                'field' => 'id_toko',
                'label' => 'Id Toko',
                'rules' => 'trim|required|min_length[11]|max_length[12]'
            ],
            [
                'field' => 'status_barang',
                'label' => 'Status Barang',
                'rules' => 'trim|required|min_length[11]|max_length[12]'
            ],
        ];

        return $validationRules;
    }
    

}

/* End of file ModelName.php */