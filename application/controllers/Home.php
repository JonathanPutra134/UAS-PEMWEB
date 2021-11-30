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
    public function admin() {
        $data['user'] = $this->Model->ShowUser();
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $this->load->view('pages/admin.php', $data);
    }

    public function Login(){
        if(isset($_SESSION['loggedInAccount'])) {
            redirect("home/admin");
        }

        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);

        $this->form_validation->set_rules('email', "Email", "valid_email");

        if(!$this->form_validation->run()) { //gagal login, data salah
            $this->load->view('pages/login.php', $data);
        } else { //form validation berhasil
            if($this->Model->loginAuthentication($this->input->post('Email'), $this->input->post("Password"))) {
                redirect("home/admin");
            } else {
                redirect("home/login");
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
        'rules' => 'valid_email',
        "errors" => ["valid_email" => "Please enter an valid email!"]
      )
       
         
	    
    );
     $this->form_validation->set_rules($rules);
     if($this->form_validation->run() != false){
        $this->Model->AddData();
    }else {
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pages/register.php', $data);

    }
  
 

    
}
    
}