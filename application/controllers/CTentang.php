<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CTentang extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
    }

    public function index(){
        $data['active_menu'] = "Tentang aplikasi ini";
        $this->load->view('tentang',$data);
    }
}

/* End of file CTentang.php */
/* Location: ./application/controllers/CTentang.php */