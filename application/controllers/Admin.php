<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
     public function __construct(){
        parent::__construct();
        acces();
        
        
    }
    
    //Iki Gae Load View tok 
    public function index(){
        $data['user_session'] = $this->db->get_where('tb_admin',['nim' => $this->session->userdata('nim')])->row_array();
        $data['role'] = "Admin | ";
        $data['page'] = "Dashboard";
        $data['periode_grafik'] = $this->db->get_where('tb_periode',['publish' => 1])->result_array();
        $data['layout_style_grafik'] = $this->db->get_where('tb_periode',['publish' => 1])->num_rows();
        $data['periode'] = $this->db->query('SELECT * FROM tb_periode ORDER BY id_periode DESC')->result_array();
        
        $this->load->view('template/admin_temp/header', $data);
        $this->load->view('template/admin_temp/sidebar', $data);
        $this->load->view('template/admin_temp/topbar',$data);
        $this->load->view('admin/index' ,$data);
        $this->load->view('template/admin_temp/footer');
    }
    public function periode(){
        $data['user_session'] = $this->db->get_where('tb_admin',['nim' => $this->session->userdata('nim')])->row_array();
        $data['role'] = "Admin | ";
        $data['page'] = "Periode";
        $data['periode'] = $this->db->query('SELECT * FROM tb_periode ORDER BY id_periode DESC')->result_array();
            
        $this->load->view('template/admin_temp/header', $data);
        $this->load->view('template/admin_temp/sidebar', $data);
       	$this->load->view('template/admin_temp/topbar',$data);
        $this->load->view('admin/periode', $data);
        $this->load->view('template/admin_temp/footer');
    }
    public function rsmanage(){
        $data['user_session'] = $this->db->get_where('tb_admin',['nim' => $this->session->userdata('nim')])->row_array();
        $data['role'] = "Admin | ";
        $data['page'] = "Aturan & Jadwal";
        $data['aturan'] = $this->db->get('tb_aturan')->result_array();
        $data['jadwal'] = $this->db->query('SELECT * FROM tb_jadwal ORDER BY date')->result_array();
            
        $this->load->view('template/admin_temp/header', $data);
        $this->load->view('template/admin_temp/sidebar', $data);
        $this->load->view('template/admin_temp/topbar',$data);
        $this->load->view('admin/rsmanage', $data);
        $this->load->view('template/admin_temp/footer');
    }
    public function search_nim(){
             $apiUser = "admin";
             $apiPass = "1234"; 

          //
             $nim=$_POST['nim'];
             
            
           
                $datacek=[
                    'id_kampus'=> 'GlZ7Dh0b',
                    'nim'=> hashData($nim)

                    
                ];
                 $cek=$this->cekNimUrl('https://siakad.poltekkesmamuju.ac.id/android/cek_nim_mahasiswa',$datacek);
                  if ($cek->STATUS=='TRUE'){
                 
                             $datauntuknim =$this->cekData('https://siakad.poltekkesmamuju.ac.id/android/dashboardMahasiswa',$datacek);
                                    if ($datauntuknim->MESSAGE->FOTO == NULL) {
                                        $foto = base_url('assets/img/DEFAULT.jpg');
                                    }else{
                                        $foto = $datauntuknim->MESSAGE->FOTO;
                                    }
                                     if ($datauntuknim->STATUS=='TRUE') {
                                            $data = array(
	                                    	'nama' => $datauntuknim->MESSAGE->NAMA_MAHASISWA,
	                                    	'foto'	=> $foto,
                                            'nim'   => $datauntuknim->MESSAGE->NIM
	                                    );
                                        $data['success'] = true;
                                        $data['notif']  = '<div class="alert alert-success">
                                          <i class="fa fa-check"></i> NIM ditemukan
                                        </div>';

                                    }else {
                                         $data['success'] = false;
                                    }
                                    return $this->output->set_output(json_encode($data));
                                            
                                    }


                  }
           
            
     
    public function kandidat($id = NULL, $pa = NULL, $ph = NULL){
    	$access_cek = $this->db->get_where('tb_periode',['id_periode'=>$id,'periode_awal' => $pa,'periode_akhir' => $ph])->row_array();
        if ($id == NULL || $pa == NULL || $ph == NULL) {
            redirect('admin/periode');
        }else if (!$access_cek) {
        	redirect('admin/periode');
        }else{
           
            
           
            $data['dt'] = $this->db->get_where('tb_periode',['id_periode' => $id])->row_array();

            if ($data['dt']['gate'] == 0) {
                $data['style_gate'] = "btn-secondary";
                $data['link_gate'] = "admin/open_gate/".$data['dt']['id_periode'];
                $data['gate'] = "Voting Di tutup";
            }else{
                $data['style_gate'] = "btn-success";
                $data['link_gate'] = "admin/close_gate/".$data['dt']['id_periode'];
                $data['gate'] = "Voting Terbuka";
            }
            if ($data['dt']['publish'] == 0) {
                $data['style_publish'] = "alert-danger";
                $data['link_publish'] = "admin/public_hasil/".$data['dt']['id_periode'];
                $data['publish'] = "Status Private";
            }else{
                $data['style_publish'] = "alert-success";
                $data['link_publish'] = "admin/private_hasil/".$data['dt']['id_periode'];
                $data['publish'] = "Status Public";
            }
            $this->db->select('*');
            $this->db->from('tb_kandidat');
            $this->db->join('tb_periode', 'tb_kandidat.periode_id = tb_periode.id_periode');
            $this->db->where('tb_periode.id_periode',$data['dt']['id_periode']);
            $data['diagram'] = $this->db->get()->result_array();

            $data['access_active'] = $this->db->get_where('tb_periode',['gate' => 1])->row_array();
            $data['access_publish'] = $this->db->get_where('tb_periode',['publish' => 1])->row_array();
            $data['subTitle'] = $data['dt']['judul']." Periode ".$pa.'/'.$ph;
            $data['kandidat'] = $this->db->get_where('tb_kandidat',['periode_id' => $id])->result_array();
            $data['role'] = "Admin | ";
            $data['page'] = "Kandidat";
            $data['pemilihankandidat']=[
            		'golput'=>'kotak kosong',
            		'mahasiswa'=>'ada'
            ];
                // $data['datadashboard']=$this->cekData('https://siakad.poltekkesmamuju.ac.id/android/dashboardMahasiswa',$dataambil);
                $data['user_session'] = $this->db->get_where('tb_admin',['nim' => $this->session->userdata('nim')])->row_array();
            $dp=[
                'id_kampus'=>'GlZ7Dh0b'
            ];
            $data_prodi = $this->ambil_data_prodi('https://siakad.poltekkesmamuju.ac.id/android/tampilProdi',$dp);
            if ($data_prodi->STATUS == TRUE) {
                $data['tabel_prodi'] = $data_prodi->PROGRAM_STUDI;
            }
            $this->load->view('template/admin_temp/header', $data);
            $this->load->view('template/admin_temp/sidebar', $data);
            $this->load->view('template/admin_temp/topbar',$data);
            $this->load->view('admin/kandidat', $data);
            $this->load->view('template/admin_temp/footer');
        }
    }    
    public function ambil_data_prodi($url,$dp){
    $apiUser = "admin";
    $apiPass = "1234"; 
     
    
    
    $curl=curl_init();
     
     curl_setopt($curl, CURLOPT_URL,$url);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
     curl_setopt($curl, CURLOPT_USERPWD, "$apiUser:$apiPass");
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $dp);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    $result=curl_exec($curl);
    curl_close($curl);

    return json_decode($result) ;

    }
    public function url($url){
     $apiUser = "admin";
     $apiPass = "1234"; 

  //
     $nim_ketua=htmlspecialchars($this->input->post('nim_ketua'));
     
    
     $datamhs=[
            'id_kampus'=>'GlZ7Dh0b',
            'nim_ketua'=>$nim_ketua,
            
     ];
     $curl=curl_init();
     
     curl_setopt($curl, CURLOPT_URL,$url);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
     curl_setopt($curl, CURLOPT_USERPWD, "$apiUser:$apiPass");
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $datamhs);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    $result=curl_exec($curl);
    curl_close($curl);

    return json_decode($result) ;

    }

    public function cekNimUrl($url,$datacek){
     $apiUser = "admin";
     $apiPass = "1234"; 

  
    
     $curl=curl_init();
     
     curl_setopt($curl, CURLOPT_URL,$url);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
     curl_setopt($curl, CURLOPT_USERPWD, "$apiUser:$apiPass");
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $datacek);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    $result=curl_exec($curl);
    curl_close($curl);

    return json_decode($result) ;
    
    }
    public function cekData($url,$datacek){
     $apiUser = "admin";
     $apiPass = "1234"; 

    
    
     $curl=curl_init();
     
     curl_setopt($curl, CURLOPT_URL,$url);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
     curl_setopt($curl, CURLOPT_USERPWD, "$apiUser:$apiPass");
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $datacek);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    $result=curl_exec($curl);
    curl_close($curl);

    return json_decode($result) ;
    
    }



    //Iki Proses Input/insert

    public function tambah_periode(){
    	$judul = $this->input->post('judul');
        $paw = $this->input->post('paw');
        $pak = $this->input->post('pak');
        $cek_periode = $this->db->get_where('tb_periode',['judul' => $judul, 'periode_awal' => $paw, 'periode_akhir' => $pak])->row_array();
        if (!$cek_periode) {
            $data = [
            	'judul'			=> $judul,
                'periode_awal' => $paw,
                'periode_akhir' => $pak,
                'gate'    => 0,
                'publish' => 0
            ];

            $this->db->insert('tb_periode',$data);
            $this->session->set_flashdata('message','Periode');
            redirect('admin/periode');   
        }else{ 

            $this->session->set_flashdata('message_gagal','Menambah Periode');
            $this->session->set_flashdata('message_alasan_gagal','Periode Yang Anda Inputkan Telah Tersedia Di Dalam Sistem!');
            redirect('admin/periode'); 
        }
    }
     public function tambah_jadwal(){
        $data = [
            'date'          => $this->input->post('tanggal'),
            'jadwal'           => $this->input->post('jadwal')
        ];

        $insert = $this->db->insert('tb_jadwal', $data);
        if ($insert) {
            $this->session->set_flashdata('message','Jadwal');
            redirect('admin/rsmanage');
        }else{
            $this->session->set_flashdata('message','Jadwal');
            redirect('admin/rsmanage');
        }
    }
    public function tambah_aturan(){
    	 $i = 0; // untuk loopingnya
        $a = $this->input->post('rule');
        if ($a[0] !== null){
          foreach ($a as $row) 
          {
            $data = [
              'aturan'=>$a[$i]
            ];

            $insert = $this->db->insert('tb_aturan', $data);
            if ($insert) {
              $i++;
            }
          }
        $data['berhasil'] = true;
        $data['alert']  = 'Rule';
        return $this->output->set_output(json_encode($data));
        }
    }
    public function tambah_kandidat_golput(){

        $id_periode = $this->input->post('id_periode');
        $pa = $this->input->post('periode_awal');
        $ph = $this->input->post('periode_akhir');
        // if ($this->input->post('foto_ketua') == NULL) {
        //  $foto_ketua = base_url('assets/img/DEFAULT.jpg');
        // }else{
        //  $foto_ketua = $this->input->post('foto_ketua');
        // }

        // if ($this->input->post('foto_wakil') == NULL) {
        //  $foto_wakil = base_url('assets/img/DEFAULT.jpg');
        // }else{
        //  $foto_wakil = $this->input->post('foto_wakil');
        // }
       


        $data = [
            'periode_id'          => $id_periode,
            'nim_ketua'           => 'kotak kosong',
            'nama_ketua'           => 'kotak kosong',
            'foto_ketua'           =>'http://localhost/e-voting/assets/img/DEFAULT.jpg',
            'nim_wakil'           => 'kotak kosong',
            'nama_wakil'           => 'kotak kosong',
            'foto_wakil'           => 'http://localhost/e-voting/assets/img/DEFAULT.jpg',
            'visi'                => '',
            'misi'                => '',
            'program_kerja'     => '',
        ];

        $insert = $this->db->insert('tb_kandidat', $data);
        if ($insert) {
            $this->session->set_flashdata('message','Kandidat');
            redirect('admin/kandidat/'.$id_periode.'/'.$pa.'/'.$ph);
        }else{
            $this->session->set_flashdata('message','Kandidat');
            redirect('admin/kandidat'.$id_periode.'/'.$pa.'/'.$ph);
        }

    }
    public function tambah_kandidat(){
    	$id_periode = $this->input->post('id_periode');
        $pa = $this->input->post('periode_awal');
        $ph = $this->input->post('periode_akhir');
        $query = $this->db->get_where('tb_periode',['periode_awal' => $pa,'periode_akhir' => $ph])->row_array();
       


        $data = [
            'periode_id'          => $id_periode,
            'nim_ketua'           => $this->input->post('nim_ketua'),
            'nama_ketua'           => $this->input->post('nama_ketua'),
            'foto_ketua'           => $this->input->post('foto_ketua'),
            'nim_wakil'           => $this->input->post('nim_wakil'),
            'nama_wakil'           => $this->input->post('nama_wakil'),
            'foto_wakil'           => $this->input->post('foto_wakil'),
            'visi'                => '',
            'misi'                => '',
            'program_kerja'		=> '',
        ];

        $insert = $this->db->insert('tb_kandidat', $data);
        if ($insert) {
            $this->session->set_flashdata('message','Kandidat');
            redirect('admin/kandidat/'.$id_periode.'/'.$pa.'/'.$ph);
        }else{
            $this->session->set_flashdata('message','Kandidat');
            redirect('admin/kandidat'.$id_periode.'/'.$pa.'/'.$ph);
        }
    }


    // Inu Function Buat Update

    public function ubah_jadwal(){

        $this->db->set('date',$this->input->post('tanggal'));
        $this->db->set('jadwal',$this->input->post('jadwal'));
        $this->db->where('id',$this->input->post('id_jadwal'));
        $check = $this->db->update('tb_jadwal');

        $this->session->set_flashdata('message_ubah','Jadwal');
        redirect('admin/rsmanage');
    }
    public function ubah_aturan(){
        $this->db->set('aturan',$this->input->post('aturan'));
        $this->db->where('id',$this->input->post('id_aturan'));
        $check = $this->db->update('tb_aturan');

        $this->session->set_flashdata('message_ubah','Aturan');
        redirect('admin/rsmanage');
    }
    public function ubah_periode(){
        $this->db->set('periode_awal',$this->input->post('paw'));
        $this->db->set('periode_akhir',$this->input->post('pak'));
        $this->db->set('judul',$this->input->post('judul'));
        $this->db->where('id_periode',$this->input->post('id_periode'));
        $check = $this->db->update('tb_periode');

        $this->session->set_flashdata('message_ubah','Periode');
        redirect('admin/periode');
    }
    public function ubah_pemilihan(){
        $this->db->set('judul',$this->input->post('pemilihan'));
        $this->db->where('id',$this->input->post('id_judul'));
        $this->db->update('tb_judul');

        $this->session->set_flashdata('message_ubah','Pemilihan');
        redirect('admin/periode');
    }
    public function ubah_kandidat(){
    	$id_periode = $this->input->post('id_periode');
        $pa = $this->input->post('periode_awal');
        $ph = $this->input->post('periode_akhir');
        $this->db->set('nim_ketua',$this->input->post('nim_ketua'));
        $this->db->set('nama_ketua',$this->input->post('nama_ketua'));
        $this->db->set('foto_ketua',$this->input->post('foto_ketua'));
        $this->db->set('nim_wakil',$this->input->post('nim_wakil'));
        $this->db->set('nama_wakil',$this->input->post('nama_wakil'));
        $this->db->set('foto_wakil',$this->input->post('foto_wakil'));
        $this->db->where('id_kandidat',$this->input->post('id_kandidat'));
        $check = $this->db->update('tb_kandidat');

        $this->session->set_flashdata('message_ubah','Kandidat');
        redirect('admin/kandidat/'.$id_periode.'/'.$pa.'/'.$ph);
    }


    // Ini Function Buat Delete

    public function hapus_jadwal($id){
        $this->db->where('id',$id);
        $hapus_jadwal = $this->db->delete('tb_jadwal');
        if ($hapus_jadwal) {
            $this->session->set_flashdata('message_delete','Jadwal');
            redirect('admin/rsmanage');
        }else{
            $this->session->set_flashdata('message_delete','Jadwal');
            redirect('admin/rsmanage');
        }
    }
    public function hapus_aturan($id){
        $this->db->where('id',$id);
        $hapus_aturan = $this->db->delete('tb_aturan');
        if ($hapus_aturan) {
            $this->session->set_flashdata('message_delete','Aturan');
            redirect('admin/rsmanage');
        }else{
            $this->session->set_flashdata('message_delete','Aturan');
            redirect('admin/rsmanage');
        }
    }
    public function hapus_aturan_banyak() {
      $id = $this->input->post('checkbox_value');
      if($id)
      {
       for($count = 0; $count < count($id); $count++)
       {
        $this->db->where('id', $id[$count]);
        $this->db->delete('tb_aturan');
        // $this->multiple_delete_model->delete($id[$count]);
       }
      }
    }
    public function hapus_jadwal_banyak() {
      $id = $this->input->post('checkbox_value');
      if($id)
      {
       for($count = 0; $count < count($id); $count++)
       {
        $this->db->where('id', $id[$count]);
        $this->db->delete('tb_jadwal');
        // $this->multiple_delete_model->delete($id[$count]);
       }
      }
    }
    public function hapus_kandidat(){
    	$id_periode = $this->input->post('id_periode');
        $pa = $this->input->post('periode_awal');
        $ph = $this->input->post('periode_akhir');
        $id_kandidat = $this->input->post('id_kandidat');
        $query = $this->db->get_where('tb_periode',['periode_awal' => $pa,'periode_akhir' => $ph])->row_array();
        $this->db->where('id_kandidat',$id_kandidat);
        $hapus_kandidat = $this->db->delete('tb_kandidat');
        if ($hapus_kandidat) {
            $this->db->where('kandidat_id',$id_kandidat);
            $this->db->delete('tb_pilih');
            $this->session->set_flashdata('message_delete','Kandidat');
            redirect('admin/kandidat/'.$id_periode.'/'.$pa.'/'.$ph);
        }else{
            $link = $this->input->post('uri');
            $this->session->set_flashdata('message_delete','Kandidat');
            redirect('admin/kandidat/'.$id_periode.'/'.$pa.'/'.$ph);
        }
    }
    public function hapus_periode($id){
        $this->db->where('id_periode',$id);
        $cek = $this->db->delete('tb_periode');
        if ($cek) {
            $this->db->where('periode_id',$id);
            $this->db->delete('tb_kandidat');
            $this->db->where('periode_id',$id);
            $this->db->delete('tb_pilih');
            $link = $this->input->post('uri');
            $this->session->set_flashdata('message_delete','Periode');
            redirect('admin/periode');
        }else{
            $link = $this->input->post('uri');
            $this->session->set_flashdata('message_delete','Periode');
            redirect('admin/periode');
        }
    }



    //Ini Function Buat Ambil data.. buat modal (ajax)
    public function getDataJadwal(){
        $id = $_POST['id'];
        $show = $this->db->get_where('tb_jadwal',['id' => $id])->row_array();
        echo json_encode($show);
    }
    public function getDataAturan(){
        $id = $_POST['id'];
        $show = $this->db->get_where('tb_aturan',['id' => $id])->row_array();
        echo json_encode($show);
    }
    public function getDataPeriode(){
        $id = $_POST['id'];
        $show = $this->db->get_where('tb_periode',['id_periode' => $id])->row_array();
        echo json_encode($show);
    }
     public function getDataKandidat(){
        $id = $_POST['id'];
        $data = $this->db->get_where('tb_kandidat',['id_kandidat' => $id])->row_array();
        $data['success'] = true; 
        echo json_encode($data);
    }





    // Function Tambahan (pelengkap)

    public function open_gate($id){
            $ambil_periode = $this->db->get_where('tb_periode',['id_periode' => $id])->row_array();
            $this->db->set('gate',1);
            $this->db->set('publish',1);
            $this->db->where('id_periode',$id);
            $this->db->update('tb_periode');
            redirect('admin/kandidat/'.$ambil_periode['id_periode'].'/'.$ambil_periode['periode_awal'].'/'.$ambil_periode['periode_akhir']);

    }
    public function close_gate($id){
        $ambil_periode = $this->db->get_where('tb_periode',['id_periode' => $id])->row_array();
        $this->db->set('gate',0);
        $this->db->set('publish',0);
        $this->db->where('id_periode',$id);
        $this->db->update('tb_periode');
        redirect('admin/kandidat/'.$ambil_periode['id_periode'].'/'.$ambil_periode['periode_awal'].'/'.$ambil_periode['periode_akhir']);
    }
    public function changeOpen($id){
    	$mati = $this->db->get_where('tb_periode',['gate' => 1])->row_array();
    	$this->db->set('gate',0);
    	$this->db->set('publish',0);
    	$this->db->where('id_periode',$mati['id_periode']);
    	$cek_mati = $this->db->update('tb_periode');
    	if ($cek_mati) {
    		$db = $this->db->get_where('tb_periode',['id_periode' => $id])->row_array();
    		$this->db->set('gate',1);
    		$this->db->set('publish',1);
	    	$this->db->where('id_periode',$id);
	    	$this->db->update('tb_periode');
	    	redirect('admin/kandidat/'.$db['id_periode'].'/'.$db['periode_awal'].'/'.$db['periode_akhir']);
    	}
    }
    public function private_hasil($id){
        $ambil_periode = $this->db->get_where('tb_periode',['id_periode' => $id])->row_array();
        $this->db->set('publish',0);
        $this->db->where('id_periode',$id);
        $this->db->update('tb_periode');

        redirect('admin/kandidat/'.$ambil_periode['id_periode'].'/'.$ambil_periode['periode_awal'].'/'.$ambil_periode['periode_akhir']);
    }
    public function public_hasil($id){
        $ambil_periode = $this->db->get_where('tb_periode',['id_periode' => $id])->row_array();
        $this->db->set('publish',1);
        $this->db->where('id_periode',$id);
        $this->db->update('tb_periode');

        redirect('admin/kandidat/'.$ambil_periode['id_periode'].'/'.$ambil_periode['periode_awal'].'/'.$ambil_periode['periode_akhir']);
    }

     public function getDataMahasiswa(){
        $nis = $_POST['nis'];
        $cek_nis = $this->db->get_where('tb_user',['nis' => $nis])->row_array();
        if (!$cek_nis) {
            $arr['success'] = false;
        }else{
            $arr['success'] = true;
            $arr['notif']  = '<div class="alert alert-success">
              <i class="fa fa-check"></i> NIS Ditemukan
            </div>';
        }
        
        return $this->output->set_output(json_encode($arr));   
    }
}