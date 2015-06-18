<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


    public function index()
    {
        //$this->model_security->getsecurity();
        $data['active'] = 'Beranda';
        $this->load->view('welcome',$data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Clogin');
    }
}
