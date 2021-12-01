<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//CONTROLLER KHUSUS Halaman ADMIN
class User extends CI_Controller{
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
        $data['header'] = $this->load->view('pagesuser/header.php', NULL, TRUE);
        $this->load->view('pagesuser/user.php', $data);
    }
    public function ShowDetails(){
        $id = $_GET["id"];
        $data['details'] = $this->Model->FacilitiesDetails($id);
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $this->load->view('pagesuser/facilitiesdetails.php', $data);
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
       $config['upload_path'] = './assets/images';
	   $config['allowed_types'] = 'jpg|png|jpeg';
	   $config['max_size'] = '5000';
       $this->load->library('upload', $config);

       $this->form_validation->set_rules($rules);
       $status = $this->upload->do_upload("Image");
         $data['error'] = $this->upload->display_errors();
    
  
     if($this->form_validation->run() != false && $status){ //jika validation benar
     
       $Name = $this->input->post('Name');

       $Description = $this->input->post('Description');
       if(empty($Image)){
       $Image = $this->upload->data();
       $Image = "assets/images/" . $Image['file_name']; 
       }
       $this->Model->AddFacilities($Name, $Description, $Image);
      
        redirect("Admin/Facilities");
    }else { //jika ada data yang tidak valid
      
       
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
 public function EditFacilities()
 {
        $id = $_GET["id"];//DAPET ID dari facilities.php
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pages/editfacilities.php', $data);
 }
 public function UpdateFacilities()
 {
       $id = $_GET["id"];//DAPET ID dari editfacilities.php
      $rules = array(
        array(
        'field' => 'Name',
        'label' => 'Name',
        'rules' => 'required',
        "errors" => ["required" => "Tolong masukkan nama!"]
        )

    );
       $config['upload_path'] = './assets/images';
	   $config['allowed_types'] = 'jpg|png|jpeg';
	   $config['max_size'] = '5000';
       $this->load->library('upload', $config);

       $this->form_validation->set_rules($rules);
       $status = $this->upload->do_upload("Image");
         $data['error'] = $this->upload->display_errors();
       $query = $this->db->query("SELECT Image from facilities WHERE id_facilities = '$id'");
       $query = $query->row_array();
      if ($status == 0 && $data['error'] == "<p>You did not select a file to upload.</p>") {
            $Image = $query['Image'];
        
            $status = 1;
      }

    //di controller ini harusnya ada library 'form_validation' + 'uploading_file'
    
    

     if($this->form_validation->run() != false && $status){ //jika validation benar
     
       $Name = $this->input->post('Name');

       $Description = $this->input->post('Description');
       if(empty($Image)){
       $Image = $this->upload->data();
       $Image = "assets/images/" . $Image['file_name']; 
       }
       $this->Model->UpdateFacilities($id, $Name, $Description, $Image);
      
        redirect("Admin");
    }else { //jika ada data yang tidak valid
      
       
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
      
        $this->load->view('pages/editfacilities.php', $data);

    }
 }
 public function BookForm()
 {
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pagesuser/bookform.php', $data);
 }


    
    
    
}