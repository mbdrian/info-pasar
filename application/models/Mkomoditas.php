<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MKomoditas extends CI_Model{
	
	private $info_pasar;
	
	public function __construct(){
		parent::__construct();
		$this->info_pasar = $this->load->database('info_pasar',TRUE);
	}
	//get data Komoditas
	public function getKomoditas(){
		$this->info_pasar->select('id_Komoditas');	
		$this->info_pasar->select('nama_Komoditas');
		$this->info_pasar->select('tb_admin.nama');
		$this->info_pasar->from('tb_dataKomoditas');
		$this->info_pasar->join('tb_admin','tb_admin.id_admin = tb_dataKomoditas.id_admin','left');
		$this->info_pasar->order_by('id_Komoditas','desc');
		$query = $this->info_pasar->get();
		return $query->result_array();
	}
	//insert data Komoditas
	public function insertKomoditas($data){
		$this->info_pasar->insert('tb_dataKomoditas',$data);		
	}
	//update data Komoditas
	public function updateKomoditas($data,$id){
		$this->info_pasar->where('id_Komoditas',$id);
		$this->info_pasar->update('tb_dataKomoditas',$data);
	}
	//delete data Komoditas
	public function deleteKomoditas($id){
		$this->info_pasar->where('id_Komoditas',$id);
		$this->info_pasar->delete('tb_dataKomoditas');
	}	
	
	public function getKomoditasbyIndex($id){
		$this->info_pasar->select('*');
		$this->info_pasar->from('tb_dataKomoditas');
		$this->info_pasar->where('id_Komoditas',$id);
		$query = $this->info_pasar->get();
		return $query->row_array();
	}
}

/* End of file MKomoditas.php */
/* Location: ./application/models/MKomoditas.php */
?>

