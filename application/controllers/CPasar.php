<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CPasar extends CI_Controller{
    private $data;
    private $refresh;

    public function __construct(){
        parent::__construct();
        $this->load->model('MPasar');
        $this->load->model('MKomoditas');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index(){
        $data['active'] = "Pasar";
        $data['pasar'] = $this->MPasar->getPasar();
        $data['active_menu'] = 'Pasar';
        $data['provinsi'] = $this->MPasar->getData('tb_provinsi');
        $data['kota'] = $this->MPasar->getData('tb_kota');
        $this->load->view('VDataPasar',$data);
    }
    
    public function getPasarbyKotaandProvinsi(){
        if(isset($_POST['kotPasar'])){
            $id_kota = $this->input->post('kotPasar');
            $id_provinsi = $this->input->post('provPasar');
            $dataPasar = $this->MPasar->getPasarbyKotaandProvinsi($id_kota,$id_provinsi);
           //echo "<script src=http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js></script>";
            echo "<thead>
                <tr>
                  <th width=20px>#</th>
                  <th>Nama Pasar</th>
                </tr>
              </thead>
              <tbody>";
        $i=1; 
        foreach($dataPasar as $row) {
            echo"<tr>
                <td>".$i."</td>
                <td>".$row['nama']."</td>";
                $i++; 
            }
                echo "</tbody>";
        }
    }
    
    public function infoPasar(){
        $data['active'] = "Daily Info Pasar";
        //$data['rows'] = $this->MPasar->getInfoPasar();
        $data['active_menu'] = "Daily Info Pasar";
        
        $day = date('d');
        $tampRef = $this->MPasar->getKetRefresh();
        if($tampRef){
            $this->refresh = $tampRef['refresh'];
        }else {
            $this->MPasar->insertKetRefresh(); 
            $this->refresh = 'belum';
        }
        
        $data['id_hari'] = date('w');
        $data['id_tanggal']['today'] = date('Y-m-d');
        $jamSekarang = date('H:i:s', time());
        if($jamSekarang>='16:00:00' and $this->refresh=='belum'){
            $this->getDailyInfo();
            $this->MPasar->updateKetRefresh();
        } else if($jamSekarang<="16:00:00") {
            $day--;
            $data['id_hari']--;
            $data['id_tanggal'] = $this->MPasar->getTime($data['id_tanggal']['today']);
        }
        $data['id_hari'] %=7;
        $data['daily'] = $this->MPasar->getInfoDaily($day);
        
        $this->load->view('VInfoPasar',$data);
    }
    
    public function getDailyInfo(){
        $listKomoditas = $this->MKomoditas->getKomoditas();
        //print_r($listKomoditas);
        foreach($listKomoditas as $list){
            $tempMax = -9999999;
            $tempMin = 9999999999999;
            $datas = $this->MPasar->getInfoPasarByKomoditas($list['id_Komoditas']);
            //echo "<br>".$list['id_Komoditas']." = ".print_r($datas)."<br>";
            // tanggal hari ini
            $tahun = date('Y');
            $bulan = date('m');
            $hari = date('d');
            $hasil['tanggal'] = $tahun."-".$bulan."-".$hari;
            
            //id Komoditas
            $hasil['id_Komoditas'] = $list['id_Komoditas'];
            
            //get harga max
            if($datas){
                foreach($datas as $data){
                    if($data['harga_Komoditas']>$tempMax) $tempMax = $data['harga_Komoditas'];
                }
                $hasil['harga_max'] = $tempMax;
            }else $hasil['harga_max'] = 0;
            
            //get harga min
            if($datas){
                foreach($datas as $data){
                    if($data['harga_Komoditas']<$tempMin) $tempMin = $data['harga_Komoditas']; 
                }
                $hasil['harga_min'] = $tempMin;
            }else $hasil['harga_min'] = 0;
            
            //get rata-rata harga Komoditas
            $hasil['harga_avg'] = ($hasil['harga_min']+ $hasil['harga_max'])*0.5;
            
            // get last harga
            if($datas) $hasil['last_harga'] = $datas[0]['harga_Komoditas'];
            else $hasil['last_harga'] = 0;
            //print_r($hasil);
            $this->MPasar->insertDailyInfoPasar($hasil);
        }
    }
    
    public function history(){
        $data['active'] = "History Info Pasar";
        $data['rows'] = $this->MPasar->getInfoPasar();
        $data['komoditas'] = $this->MKomoditas->getKomoditas();
        $data['active_menu'] = "History Info Pasar";
        
        $this->load->view('VHistory',$data);    
    }
    
    public function add(){
      //  if(isset($_POST['id']) and isset($_POST['namaPasar']) and isset($_POST['provinsiPasar'])){
            $data['id_admin']= $this->session->userdata('id');
            $data['nama']= $this->input->post('namaPasar');
            $data['provinsi'] = $this->input->post('provinsiPasar');
            $data['kota'] = $this->input->post('kotaPasar');
            $this->MPasar->insertPasar($data);
            echo "<script type='text/javascript'>alert('Pasar berhasil ditambahkan')
                            window.location = '".site_url('CPasar')."';
                            </script>";
        /*} else {
            echo "<script type='text/javascript'>alert('Data tidak boleh kosong')
                            window.location = '".site_url('CPasar')."';
                            </script>";
        }*/
    }
    
    public function edit(){
        if(isset($_POST['editPasar'])){
            $data['nama'] = $this->input->post('namaPasar');
            $data['provinsi'] = $this->input->post('provinsiPasar');
            $data['kota'] = $this->input->post('kotaPasar');
            $id = $this->input->post('id');
            $this->MPasar->updatePasar($data,$id);
            echo "<script type='text/javascript'>alert('Data Pasar berhasil Diubah')
                        window.location = '".site_url('CPasar')."';
                        </script>";
        }else if(isset($_POST['deletePasar'])){
            $id = $this->input->post('id');
            $this->MPasar->deletePasar($id);
            echo "<script type='text/javascript'>alert('Data Pasar berhasil dihapus')
                        window.location = '".site_url('CPasar')."';
                        </script>";
        }  
    }
    
    public function getKota(){
        if($_POST['id_provinsi']){
            $id_prov = $this->input->post('id_provinsi');
            $kota = $this->MPasar->getKota($id_prov);
            echo "<option value=''>Pilih Kota</option>";
            foreach($kota as $row){
                echo '<option value='.$row['id_kota'].'>'.$row['nama'].'</option>';        
            }
        }else if ($_POST['provPasar']){
            $id_prov = $this->input->post('provPasar');
            $kota = $this->MPasar->getKota($id_prov);
            echo "<option value=''>Pilih Kota</option>";
            foreach($kota as $row){
                echo '<option value='.$row['id_kota'].'>'.$row['nama'].'</option>';        
            }
        }
    }

    public function getInfoPasar(){
        $id_kom = $this->input->post('id_komoditas');
        $info = $this->MPasar->getInfoByKomoditas($id_kom);
        /*echo "<script type='text/javascript'>alert('Data Pasar berhasil Diubah - ".$id_kom."')
                        window.location = '".site_url('CPasar')."';
                        </script>";*/
        echo "<thead>
                <tr>
                  <th width=20px>#</th>
                  <th>Waktu</th>
                  <th width=100px>Harga (Rp/Kg)</th>
                  <th>Pasar</th>
                </tr>
              </thead>
              <tbody>";
        $i=1; 
        foreach($info as $row) {
            echo"<tr>
                <td>".$i."</td>
                <td>".$row['waktu']."</td>
                <td align='right'>".$this->format_rupiah($row['harga_Komoditas'])."</td>
                <td>".$row['pasar'].", ".$row['kota'].", ".$row['provinsi']."</td>
                </tr>";
                $i++; 
        }
                echo "</tbody>";
    }
    private function format_rupiah($angka){
        $rupiah=number_format($angka,0,',','.');
        return $rupiah;
    }
    
    public function getChart(){
    if($_POST['kom']==""){
        echo "<script type='text/javascript'>alert('Komoditas tidak boleh kosong')
                        window.location = '".site_url('CPasar/history')."';
                        </script>";
    }
    else if ($_POST['namaBulan']==""){
        echo "<script type='text/javascript'>alert('Periode bulan tidak boleh kosong')
                        window.location = '".site_url('CPasar/history')."';
                        </script>";
    }
    else if($_POST['idx_week']==""){
        echo "<script type='text/javascript'>alert('Indeks Minggu tidak boleh kosong')
                        window.location = '".site_url('CPasar/history')."';
                        </script>";
    }
        $id_kom = $this->input->post('kom');
        $id_bulan = $this->input->post('namaBulan');
        $id_week = $this->input->post('idx_week');
        $this_year = date('Y');
        
        $data['active'] = "Grafik Harga Pasar";
        $namaKomoditas = $this->MKomoditas->getKomoditasbyIndex($id_kom);
        $data['Komoditas'] = $namaKomoditas['nama_Komoditas'];
        for($i=1;$i<=7;$i++){
            $result = $this->MPasar->getDatatoChart($id_kom,$id_bulan,$id_week,$this_year,$i);
            if($result){
                $n = 0;
                $tamp = 0;
                foreach($result as $res){
                    $tamp += $res['harga_avg'];
                    $n++;
                }
                $data['hari'.$i] = $tamp/$n;
            }else $data['hari'.$i] = 0;
        }        
        
        
        $data['active_menu'] = "Grafik Harga <strong>".$namaKomoditas['nama_Komoditas']."</strong> Bulan <strong>".$this->getBulan($id_bulan)." - ".$this_year."</strong>";
        
        $this->load->view('grafikPasar',$data); 
        
    }
    
    private function getBulan($bulan){
                  if($bulan==1)return "Januari";
                  else if($bulan==2) return "Februari";
                  else if($bulan==3) return "Maret";
                  else if($bulan==4) return "April";
                  else if($bulan==5) return "Mei";
                  else if($bulan==6) return "Juni";
                  else if($bulan==7) return "Juli";
                  else if($bulan==8) return "Agustus";
                  else if($bulan==9) return "September";
                  else if($bulan==10) return "Oktober";
                  else if($bulan==11) return "November";
                  else if($bulan==12) return "Desember";
                }

}

/* End of file CPasar.php */
/* Location: ./application/controllers/CPasar.php */