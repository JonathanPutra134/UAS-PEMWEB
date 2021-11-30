<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//CONTROLLER KHUSUS Halaman ADMIN
class Admin extends CI_Controller{
    public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library("session");
        $this->load->model("Model");
	
	}
    public function index(){
        $data['user'] = $this->Model->ShowUser();
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $this->load->view('pages/admin.php', $data);
    }
    public function Facilities(){
        $data['facilities'] = $this->Model->ShowFacilities();
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $this->load->view('pages/facilities.php', $data);
    }
    public function AddFacilitiesPage(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $this->load->view('pages/addfacilities.php', $data);
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
        redirect("Admin/Facilities");
    }else {
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pages/addfacilities.php', $data);

    }
    }


    public function Delete()
    {
     	$id = $_GET["id"];
		$this->db->delete('user', array('id_user' => $id)); 
	    redirect("Admin");

    }
    public function DeleteFacilities()
    {
     	$id = $_GET["id"];
		$this->db->delete('facilities', array('id_facilities' => $id)); 
	    redirect("Admin/Facilities");
    }
 public function Edit()
 {
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pages/edit.php', $data);
}

    
    
    
}