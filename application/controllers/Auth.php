<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();

        
    }
    public function index(){
        $this->load->view('auth/index');
        if (!empty($this->session->userdata('nim'))) {
            $pindah = $this->session->userdata('role');
            redirect($pindah);
        }
    }
    public function login(){
        if (!empty($this->session->userdata('nim'))) {
            $pindah = $this->session->userdata('role');
            redirect($pindah);
        }
        $this->form_validation->set_rules('username','username','trim|required',[
            'required' => 'Maaf, Nama tidak boleh kosong !']);
        $this->form_validation->set_rules('password','password','trim|required',[
            'required' => 'Maaf, Password tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
   //          
            
        }else{
            $this->proses_login();
        }
    }
    public function url($url){
     $apiUser = "admin";
     $apiPass = "1234"; 

  //
     $username=htmlspecialchars($this->input->post('username'));
     $password=htmlspecialchars($this->input->post('password'));
    
     $datamhs=[
            'id_kampus'=>'GlZ7Dh0b',
            'username'=>$username,
            'password'=>$password
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
   private function proses_login(){
             $username=$this->input->post('username');
             $password=$this->input->post('password');

            $hasil=$this->url('https://siakad.poltekkesmamuju.ac.id/android/ValidasiLogin');                                                                   
            $admindata=$this->db->get_where('tb_admin',['nim'=>$username,'password'=>$password])->row_array();
            if ($hasil->STATUS == 'TRUE') {

                $datacek=[
                    'id_kampus'=>$hasil->ID_KAMPUS,
                    'nim'=>$hasil->NIM

                    
                ];
                $cek=$this->cekNimUrl('https://siakad.poltekkesmamuju.ac.id/android/cek_nim_mahasiswa',$datacek);

                if ($cek->STATUS=='TRUE'){
                    $datadashboard=$this->cekData('https://siakad.poltekkesmamuju.ac.id/android/dashboardMahasiswa',$datacek);
                    if ($datadashboard->STATUS=='TRUE') {
                    	 if ($datadashboard->MESSAGE->STATUS_AKTIVITAS == 'A') {
                    		 $datasessionmhs=[
                            'id_kampus'=>$hasil->ID_KAMPUS,
                            'nim'=>$hasil->NIM,
                            'program_studi'=>$datadashboard->MESSAGE->PROGRAM_STUDI,
                            'role'=>'user'
	                        ];
	                        //  'nim'=>$datadashboard->MESSAGE->NIM,
	                        //  'nama_mahasiswa'=>$datadashboard->MESSAGE->NAMA_MAHASISWA,
	                        //  'program_studi'=>$datadashboard->MESSAGE->PROGRAM_STUDI
	                        // ];
	                        $this->session->set_userdata($datasessionmhs);
	                        
	                        redirect('user');

                    	}else{
                             $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                            login gagal
                            </div>');
                    		redirect('auth/login');
                    	}
                       
                    }
                }
            
            }else if($admindata){
                 $data = [
                          
                            'role' => $admindata['role'],
                            'id_kampus'=>'GlZ7Dh0b',
                            'nim'=>$username,
                           
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
            }
            else {
                
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    login gagal
                    </div>');
                redirect('auth/login');
            }

    }
    public function login_admin(){
        if (!empty($this->session->userdata('nim'))) {
            $pindah = $this->session->userdata('role');
            redirect($pindah);
        }
        if (isset($_POST['submit'])) {
            
             $admindata=$this->db->get_where('tb_admin',['nim'=>$username,'password'=>$password])->row_array();
                if ($admindata ) {
                    $data = [
                          
                            'role' => $admindata['role'],
                            'id_kampus'=>'GlZ7Dh0b',
                            'nim'=>$username,
                           
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    login gagal
                    </div>');
                    redirect('auth/login_admin');
                }
        }
       
        
        $this->load->view('admin/login');
    }
    public function blocked(){
        $data['pindah'] = $this->session->userdata('role'); 
        $this->load->view('auth/blocked',$data);
    }
    public function logout(){
        $this->session->unset_userdata('nim');
        $this->session->unset_userdata('id_kampus');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message','Terima kasih telah mengunjungi dan berpartisipasi');
            redirect('auth');
    }
}