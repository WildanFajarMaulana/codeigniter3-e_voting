<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
   
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        acces();
             
        
           
        
}
     

    
        
    
     public function cekData($url){
     $apiUser = "admin";
     $apiPass = "1234"; 

     $datamhs=[
            'id_kampus'=>$_SESSION['id_kampus'],
            'nim'=>$_SESSION['nim']
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
    public function index(){
        $data['aturan'] = $this->db->get('tb_aturan')->result_array();
        $data['jadwal'] = $this->db->get('tb_jadwal')->result_array();
        $data['title']='Beranda';
        $data['periode'] = $this->db->get_where('tb_periode',['gate' => 1])->result_array();
        $data['css'] = 'info.css';
        
         $data['datadashboard']=$this->cekData('https://siakad.poltekkesmamuju.ac.id/android/dashboardMahasiswa');
       
        $this->load->view('template/template_header',$data);
        $this->load->view('user/index',$data);
        $this->load->view('template/template_footer',$data);
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
    public function cekDataMahasiswa($url,$datacek){
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

    public function editkandidat(){
        $this->form_validation->set_rules('visi','visi','required|trim');
        $this->form_validation->set_rules('misi','misi','required|trim');
        if($this->form_validation->run()==false){
             $visi=$this->input->post('visi');
           $misi=$this->input->post('misi');
           $program_kerja=$this->input->post('program_kerja');
           $id_kandidat=$this->input->post('id_kandidat');
           $this->db->set('program_kerja',$program_kerja);
           $this->db->set('visi',$visi);
           $this->db->set('misi',$misi);

            $this->db->where('id_kandidat',$id_kandidat);
            $this->db->update('tb_kandidat');
            
            redirect('user/vote_page');
        }else{
           $visi=$this->input->post('visi');
           $misi=$this->input->post('misi');
           $program_kerja=$this->input->post('program_kerja');
           $id_kandidat=$this->input->post('id_kandidat');
           $this->db->set('program_kerja',$program_kerja);
           $this->db->set('visi',$visi);
           $this->db->set('misi',$misi);

            $this->db->where('id_kandidat',$id_kandidat);
            $this->db->update('tb_kandidat');
            
            redirect('user/vote_page');
                
        }
    }
    public function vote_page(){
        $data['datadashboard']=$this->cekData('https://siakad.poltekkesmamuju.ac.id/android/dashboardMahasiswa');

        $apiUser = "admin";
        $apiPass = "1234";

        //
        $nim=$this->session->userdata('nim');



        $datacek=[
        'id_kampus'=> 'GlZ7Dh0b',
        'nim'=> parseData($nim)


        ];
        $data['nim_login']=$datacek['nim'];
        // var_dump($datacek);
        // die;
       
        $data['periode'] = $this->db->get_where('tb_periode',['gate' => 1])->result_array();
        $data['periode_grafik'] = $this->db->get_where('tb_periode',['publish' => 1])->result_array();
        $data['pemilihankandidat']=[
                'golput'=> 'kotak kosong'
        ];
        $data['datapilih']=$this->db->get_where('tb_pilih',['nim'=>$this->session->userdata('nim')])->row_array();
        $data['title']='Voting Kandidat';
        $data['css'] = 'candidate.css';
        $this->load->view('template/template_header',$data);
        $this->load->view('user/voting', $data);
        $this->load->view('template/template_footer',$data);
    }



    public function vote(){
        $data['datadashboard']=$this->cekData('https://siakad.poltekkesmamuju.ac.id/android/dashboardMahasiswa');

		if (isset($_POST['pilih'])) {
            $kandidat_id = $this->input->post('kandidat_id');
            $name = $this->input->post('name');
            $data = [
				'kandidat_id' 			=> $kandidat_id,
                'nama_pemilih'          => $name, 
                'nama_univ'             =>$this->session->userdata('id_kampus'),
                'periode_id'            =>$this->input->post('periode_id'),
                'nim'                   =>$this->session->userdata('nim'),
                'prodi'                 =>$this->session->userdata('program_studi')
                
			];

		$cek = $this->db->insert('tb_pilih', $data);
       $this->session->set_flashdata('message','thank you for running the election!');
      redirect('user/vote_page');
		}else{
			echo "Error";
		}
    }


    // Ii Gae Nyeluk Modal

    public function getDataKandidatForUser(){
        $id = $_POST['id'];
        $show = $this->db->get_where('tb_kandidat',['id_kandidat' => $id])->row_array();
        echo json_encode($show);
    }
    public function live_count(){
        $data['title']='Grafik Pemilihan';
        $data['periode'] = $this->db->get_where('tb_periode',['gate' => 1])->result_array();
        $data['periode_grafik']=$this->db->get_where('tb_periode',['publish'=>1])->result_array();
        $data['css'] = 'chart.css';
        $this->load->view('template/template_header',$data);
        $this->load->view('user/livecount',$data);
        $this->load->view('template/template_footer',$data);
    }
}