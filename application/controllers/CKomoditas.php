<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CKomoditas extends CI_Controller{
    private $data;
    
    public function __construct(){
        parent::__construct();

         $this->load->model('MKomoditas');
         $this->load->helper('url_helper');
        $this->load->library('session');
        //$this->load->view('VInputKomoditas');
    }

    public function index(){
    
        $data['active'] = "Lihat Data";
        $data['rows'] = $this->MKomoditas->getKomoditas();
        $data['active_menu'] = 'Daftar Komoditas';
        $this->load->view('VInputKomoditas',$data);
    }
    
    public function add(){
        if(isset($_POST['newKomoditas'])){
            $data['id_admin']= $this->session->userdata('id');
            $data['nama_Komoditas']= $this->input->post('newKomoditas');
            $this->MKomoditas->insertKomoditas($data);
            echo "<script type='text/javascript'>alert('Komoditas berhasil ditambahkan')
                            window.location = '".site_url('CKomoditas')."';
                            </script>";        
        }else {
            echo "<script type='text/javascript'>alert('Data tidak boleh kosong')
                            window.location = '".site_url('CKomoditas')."';
                            </script>";
        }
    }
    
    public function edit(){
        if(isset($_POST['editKomoditas'])){
            $data['nama_Komoditas'] = $this->input->post('KomoditasBaru');
            $id = $this->input->post('id');
            $this->MKomoditas->updateKomoditas($data,$id);
            echo "<script type='text/javascript'>alert('Komoditas berhasil Diubah')
                        window.location = '".site_url('CKomoditas')."';
                        </script>";
        }else if(isset($_POST['deleteKomoditas'])){
            $id = $this->input->post('id');
            $this->MKomoditas->deleteKomoditas($id);
            echo "<script type='text/javascript'>alert('Komoditas berhasil dihapus')
                        window.location = '".site_url('CKomoditas')."';
                        </script>";
        }  
    }
}

/* End of file CKomoditas.php */
/* Location: ./application/controllers/CKomoditas.php */