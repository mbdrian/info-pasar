<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPasar extends CI_Model{
	
	private $info_pasar;
	
	public function __construct(){
		parent::__construct();
		$this->info_pasar = $this->load->database('info_pasar',TRUE);
	}
	
	public function getData($table){
		$this->info_pasar->select('*');
		$this->info_pasar->from($table);
		$query = $this->info_pasar->get();
		return $query->result_array();
	}
	
	public function getPasar(){
		$this->info_pasar->select('tb_dataPasar.nama as nama');
		$this->info_pasar->select('id_pasar');
		$this->info_pasar->select('tb_kota.nama as kota');
		$this->info_pasar->select('tb_provinsi.nama as provinsi');
		$this->info_pasar->from('tb_dataPasar');
		$this->info_pasar->join('tb_kota','tb_kota.id_kota=tb_dataPasar.kota');
		$this->info_pasar->join('tb_provinsi','tb_provinsi.id_provinsi=tb_dataPasar.provinsi');
		$this->info_pasar->order_by('provinsi','asc');
		$this->info_pasar->order_by('kota','asc');
		$this->info_pasar->order_by('nama','asc');
		$query = $this->info_pasar->get();
		return $query->result_array();
	}
	
	public function getInfoPasar(){
		$this->info_pasar->select('id_infoPasar');
		$this->info_pasar->select('harga_Komoditas');
		$this->info_pasar->select('waktu');
		$this->info_pasar->select('tb_dataPasar.nama as pasar');
		$this->info_pasar->select('tb_provinsi.nama as provinsi');
		$this->info_pasar->select('tb_kota.nama as kota');
		$this->info_pasar->select('tb_dataKomoditas.nama_Komoditas as Komoditas');
		$this->info_pasar->from('tb_infoPasar');
		$this->info_pasar->join('tb_dataPasar','tb_dataPasar.id_pasar = tb_infoPasar.id_pasar','left');
		$this->info_pasar->join('tb_dataKomoditas','tb_dataKomoditas.id_Komoditas = tb_infoPasar.id_Komoditas','left');
		$this->info_pasar->join('tb_provinsi','tb_provinsi.id_provinsi=tb_dataPasar.provinsi','left');
		$this->info_pasar->join('tb_kota','tb_kota.id_kota=tb_dataPasar.kota','left');
		$this->info_pasar->order_by('waktu','desc');
		$query = $this->info_pasar->get();
		return $query->result_array();
	}
	
	public function getInfoDaily($day){
		$this->info_pasar->select('nama_Komoditas as Komoditas');
		$this->info_pasar->select('harga_max as max');
		$this->info_pasar->select('harga_min as min');
		$this->info_pasar->select('harga_avg as avg');
		$this->info_pasar->select('last_harga as last');
		$this->info_pasar->from('tb_historyInfoPasar');
		$this->info_pasar->join('tb_dataKomoditas','tb_dataKomoditas.id_Komoditas=tb_historyInfoPasar.id_Komoditas');
		$this->info_pasar->where('day(tanggal)',$day);
		$query = $this->info_pasar->get();
		return $query->result_array();
	}
	
	public function getInfoPasarByKomoditas($Komoditas){
		$tahun = date('Y');
		$bulan = date('m');
		$hari = date('d');
		$this->info_pasar->select('*');
		$this->info_pasar->from('tb_infoPasar');
		$this->info_pasar->where('id_Komoditas',$Komoditas);
		$this->info_pasar->where('waktu <=',$tahun."-".$bulan."-".$hari." 16:00:00");
		$this->info_pasar->where('waktu >=',$tahun."-".$bulan."-".($hari-1)." 16:00:00");
		$this->info_pasar->order_by('waktu','desc');
		$query = $this->info_pasar->get();
		return $query->result_array();
	}
	
	// insert data info pasar setiap hari
	public function insertDailyInfoPasar($data){
		$this->info_pasar->insert('tb_historyInfoPasar',$data);
	}
	
	// insert data pasar
	public function insertPasar($data){
		$this->info_pasar->insert('tb_dataPasar',$data);
	}
	
	public function getKota($id_prov){
		$this->info_pasar->select('*');
		$this->info_pasar->from('tb_kota');
		$this->info_pasar->where('id_prov',$id_prov);
		$query = $this->info_pasar->get();
		return $query->result_array();
	}
	//update data pasar
	public function updatePasar($data,$id){
		$this->info_pasar->where('id_pasar',$id);
		$this->info_pasar->update('tb_dataPasar',$data);
	}
	//delete data pasar
	public function deletePasar($id){
		$this->info_pasar->where('id_pasar',$id);
		$this->info_pasar->delete('tb_dataPasar');
	}	
	
	public function getKetRefresh(){
		$tanggal = date('Y-m-d');
		$this->info_pasar->select('tanggal');
		$this->info_pasar->select('refresh');
		$this->info_pasar->from('tb_ketRefresh');
		$this->info_pasar->where('tanggal',$tanggal);
		$query = $this->info_pasar->get();
		return $query->row_array();
	}
	
	public function insertKetRefresh(){
		$data['tanggal'] = date('Y-m-d');
		$data['refresh'] = 'belum';
		$this->info_pasar->insert('tb_ketRefresh',$data);
	}
	
	public function updateKetRefresh(){
		$tanggal = date('Y-m-d');
		$data['refresh'] = 'Sudah';
		$this->info_pasar->where('tanggal',$tanggal);
		$this->info_pasar->update('tb_ketRefresh',$data);
	}
	
	public function getTime($today){
		$this->info_pasar->select("date_add('".$today."', interval -1 day) as today",false);
		$query = $this->info_pasar->get();
		return $query->row_array();
	}
	
	public function getInfoByKomoditas($id_kom){
		$this->info_pasar->select('id_infoPasar');
		$this->info_pasar->select('harga_Komoditas');
		$this->info_pasar->select('waktu');
		$this->info_pasar->select('tb_dataPasar.nama as pasar');
		$this->info_pasar->select('tb_provinsi.nama as provinsi');
		$this->info_pasar->select('tb_kota.nama as kota');
		$this->info_pasar->select('id_Komoditas as Komoditas');
		$this->info_pasar->from('tb_infoPasar');
		$this->info_pasar->join('tb_dataPasar','tb_dataPasar.id_pasar = tb_infoPasar.id_pasar','left');
		$this->info_pasar->join('tb_provinsi','tb_provinsi.id_provinsi=tb_dataPasar.provinsi','left');
		$this->info_pasar->join('tb_kota','tb_kota.id_kota=tb_dataPasar.kota','left');
		//$this->info_pasar->join('tb_dataKomoditas','tb_dataKomoditas.id_Komoditas = tb_infoPasar.id_Komoditas');
		$this->info_pasar->order_by('waktu','desc');
		$this->info_pasar->where('id_Komoditas',$id_kom);
		$query = $this->info_pasar->get();
		return $query->result_array();	
	}
	
	public function getDatatoChart($id_kom,$id_bulan,$idx_week,$year,$hari){
		$this->info_pasar->select('harga_avg');
		$this->info_pasar->from('tb_historyInfoPasar');
		$this->info_pasar->where('id_Komoditas',$id_kom);
		$this->info_pasar->where('month(tanggal)',$id_bulan);
		$this->info_pasar->where('(day(tanggal)/7) >=',($idx_week-1));
		$this->info_pasar->where('(day(tanggal)/7) <',($idx_week));
		$this->info_pasar->where('year(tanggal)',$year);
		$this->info_pasar->where('dayofweek(tanggal)',$hari);
		$query = $this->info_pasar->get();
		return $query->result_array();
	}
	
	public function getPasarbyKotaandProvinsi($id_kota,$id_provinsi){
		$this->info_pasar->select('*');
		$this->info_pasar->from('tb_dataPasar');
		$this->info_pasar->where('provinsi',$id_provinsi);
		$this->info_pasar->where('kota',$id_kota);
		$query = $this->info_pasar->get();
		return $query->result_array();
	}
}
/* End of file Mpasar.php */
/* Location: ./application/models/Mpasar.php */
?>