<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//CONTROLLER KHUSUS MANAGEMENT
class Management extends CI_Controller{
    public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library("session");
        $this->load->model("Model");
	
	}
    public function index(){
         $data['facilities'] = $this->Model->ShowFacilities();
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pagesmanagement/header.php', NULL, TRUE);
        $this->load->view('pagesmanagement/management.php', $data);
    }
  
    public function AddFacilitiesPage(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pagesmanagement/header.php', NULL, TRUE);
        $this->load->view('pagesmanagement/addfacilities.php', $data);
    }
    public function AddFacilities()
    {
        $rules = array(
        array(
        'field' => 'Name',
        'label' => 'Name',
        'rules' => 'required',
        "errors" => ["required" => "Tolong masukkan nama!"]
        )

    );
     $this->form_validation->set_rules($rules);
     if($this->form_validation->run() != false){
        $this->Model->AddFacilities();
        redirect("Management/Facilities");
    }else {
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pagesmanagement/addfacilities.php', $data);

    }
    }

    public function logout() {
        session_destroy();
        session_unset();
        redirect('home/login');
    }
   
  
  
 

    


    
}