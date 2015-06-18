<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CLogin extends CI_Controller{

    private $email;
    private $password;
    private $user;

    public function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('VLogin');
    }
    
    public function getLogin(){
         if(isset($_POST['login'])){
            if($this->masuk()){
                if($this->setSession()){
                    $data['active'] = 'Beranda';
                    $this->load->view('welcome',$data);
                    }else{
                        $data['error'] = TRUE;
                        $this->load->view('VLogin', $data);
                    }
                }
            }else{
                    $data['error'] = TRUE;
                    $this->load->view('VLogin', $data);
            }
    }

    private function masuk(){
        if($this->formValidation()){
        $data['active'] = 'Beranda';
            $this->email = $this->input->post('email',TRUE);
            $password = $this->input->post('passwd',TRUE);
            $this->password = sha1($password);

            if($this->check()){
                    return TRUE;
            }
        }
    }

    private function formValidation(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('passwd','Password','required');
        if($this->form_validation->run()){
        return TRUE;
        }
    }

    private function check(){
        $this->load->model('Madmin');

        $this->user = $this->Madmin->getUser($this->email,$this->password);
        if($this->user){
        return TRUE;
        }
    }

    private function setSession(){
        $data_session = array(
            'id' => $this->user['id_admin'],
            'email' => $this->email,
            'password' => $this->password,
            'login' => TRUE,
            'kota'=>$this->user['kota'],
            'provinsi'=>$this->user['provinsi']
            );

        $this->session->set_userdata($data_session);
        return TRUE;
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('CLogin');
    }
}

/* End of file CLogin.php */
/* Location: ./application/controllers/CLogin.php */