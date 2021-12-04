<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//CONTROLLER KHUSUS ADMIN + REGISTER + LOGIN
class Home extends CI_Controller{
    public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library("session");
        $this->load->model("Model");
	
	}
    public function index(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $this->load->view('pages/home.php', $data);
    }

    public function logout() {
        session_destroy();
        session_unset();
        redirect('home/login');
    }
   

    public function Login(){
        if(isset($_SESSION['loggedInAccount'])) {
             if($_SESSION['loggedInAccount']['Role'] == "admin") {
                    redirect("Admin");
                 }else if($_SESSION['loggedInAccount']['Role'] == "management") {
                    redirect("Management");
                 }else {
                    redirect("User");
                 }
                }

        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);

        $this->form_validation->set_rules('email', "Email", "valid_email");

        if(!$this->form_validation->run()) { //gagal login, data salah
            $this->load->view('pages/login.php', $data);
        } else { //form validation berhasil
            if($this->Model->loginAuthentication($this->input->post('Email'), $this->input->post("Password")))
                {
                 if($_SESSION['loggedInAccount']['Role'] == "admin") {
                    redirect("Admin");
                 }else if($_SESSION['loggedInAccount']['Role'] == "management") {
                    redirect("Management");
                 }else {
                    redirect("User");
                 }
               } else 
                 {
                redirect("Home/login");
                 }
        }
    }
    public function Register(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pages/register.php', $data);

    }
     public function AddData(){
        $rules = array(
            array(
        'field' => 'Name',
        'label' => 'Name',
        'rules' => 'required',
        "errors" => ["required" => "Tolong masukkan nama!"]
      ),
            array(
        'field' => 'Email',
        'label' => 'Email',
        'rules' => ['required', 'valid_email'],
        "errors" => ["valid_email" => "Please enter an valid email!",
                    "required" => "Tolong masukkan emaiL!"
                    ]
            ),
            array(
        'field' => 'Password',
        'label' => 'Name',
        'rules' => 'required',
        "errors" => ["required" => "Tolong masukkan Password!"]
      )

           
       
    
	    
    );
        $config['upload_path'] = './assets/images';
		  $config['allowed_types'] = 'jpg|png|jpeg';
		  $config['max_size'] = '5000';
          $this->load->library('upload', $config);
     
          $status = $this->upload->do_upload("ProfilePicture");
    $this->form_validation->set_rules($rules);
      $data['error'] = $this->upload->display_errors();
 
     
    if($this->form_validation->run() != false){ //jika validation benar
      
         
          $Name = $this->input->post('Name');
          $Email = $this->input->post('Email');
          $Password = password_hash($this->input->post('Password'), PASSWORD_DEFAULT);
          $ProfilePicture = $this->upload->data();
          $ProfilePicture = "assets/images/" . $ProfilePicture['file_name']; 
          $Role = 'user';
     $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
       
            $userIp=$this->input->ip_address();
         
            $secret='6Le0yHUdAAAAADOscmECNGqJQ3SPKrSz26KCa4jA';
       
            $credential = array(
            'secret' => $secret,
            'response' => $this->input->post('g-recaptcha-response')
        );
 
      $verify = curl_init();
      curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
      curl_setopt($verify, CURLOPT_POST, true);
      curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
      curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($verify);
 
      $status= json_decode($response, true);
          
      if($status['success']){
         $this->Model->AddData($Name, $Email, $Password, $ProfilePicture, $Role);
        redirect("Home/Login");
      }else
        {
          $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pages/register.php', $data);
        }
    
    
     
    } else {
        
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pages/register.php', $data);

    }
  
 

    
}



    
}