<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MAdmin extends CI_Model{
    private $info_pasar;

    public function __construct(){
        parent::__construct();
        $this->info_pasar = $this->load->database('info_pasar',TRUE);
    }

    public function getUser($email,$password){
        $this->info_pasar->select('*');
        $this->info_pasar->from('tb_admin');
        $this->info_pasar->where('email',$email);
        $this->info_pasar->where('password',$password);
        $query = $this->info_pasar->get();
    return $query->row_array();
    }

}

/* End of file Madmin.php */
/* Location: ./application/models/Madmin.php */