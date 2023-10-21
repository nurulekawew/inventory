<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Model extends MY_Model {
 

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[3]|max_length[100]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[4]|max_length[100]'
           
                
            ],
        ];

        return $validationRules;
    }
    

}

/* End of file ModelName.php */
