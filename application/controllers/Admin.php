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
       $this->Model->CheckAdmin();
        $data['user'] = $this->Model->ShowUser();
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $this->load->view('pages/admin.php', $data);
    }
    public function Facilities(){
       $this->Model->CheckAdmin();
        $data['facilities'] = $this->Model->ShowFacilities();
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $this->load->view('pages/facilities.php', $data);
    }
    public function AddFacilitiesPage(){
       $this->Model->CheckAdmin();
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $this->load->view('pages/addfacilities.php', $data);
    }
    

    public function AddFacilities()
    {
       $this->Model->CheckAdmin();
      $rules = array(
        array(
        'field' => 'Name',
        'label' => 'Name',
        'rules' => 'required',
        "errors" => ["required" => "Tolong masukkan nama!"]
        ),
       
            array(
        'field' => 'Description',
        'label' => 'Name',
        'rules' => 'required',
        "errors" => ["required" => "Tolong masukkan Deskripsi!"]
            ),
              array(
        'field' => 'StartTime',
        'label' => 'Name',
        'rules' => 'required',
        "errors" => ["required" => "Tolong masukkan waktu tersedianya fasilitas!"]
        ),
       
            array(
        'field' => 'EndTime',
        'label' => 'Name',
        'rules' => 'required',
        "errors" => ["required" => "Tolong masukkan waktu tersedianya fasilitas!"]
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
        $StartTime = $this->input->post('StartTime');
            $EndTime = $this->input->post('EndTime');
       $Description = $this->input->post('Description');
       if(empty($Image)){
       $Image = $this->upload->data();
       $Image = "assets/images/" . $Image['file_name']; 
       }
       $this->Model->AddFacilities($Name, $Description, $Image, $StartTime, $EndTime);
      
        redirect("Admin/Facilities");
    }else { //jika ada data yang tidak valid
      
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
      
        $this->load->view('pages/addfacilities.php', $data);

    }
    }


    public function Delete()
    {
       $this->Model->CheckAdmin();
     	$id = $_GET["id"];
		$this->db->delete('user', array('id_user' => $id)); 
	    redirect("Admin");

    }
    public function DeleteFacilities()
    {
       $this->Model->CheckAdmin();
     	$id = $_GET["id"];
		$this->db->delete('facilities', array('id_facilities' => $id)); 
	    redirect("Admin/Facilities");
    }
    public function DeleteRequest()
    {
       $this->Model->CheckAdmin();
     	$id = $_GET["id"];
      
		$this->db->delete('request', array('id_request' => $id)); 
	    redirect("Admin/BookingList");

    }
 public function Edit()
 {
    $this->Model->CheckAdmin();
        $id = $_GET["id"];
        $data['user'] = $this->Model->UserDetails($id);
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pages/edit.php', $data);
}
public function UpdateUser()//MASIH ERROR
{
 
     $id = $_GET["id"];//DAPET ID dari editfacilities.php
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
         )

	    
    );
     $config['upload_path'] = './assets/images';
	   $config['allowed_types'] = 'jpg|png|jpeg';
	   $config['max_size'] = '5000';
     $this->load->library('upload', $config);
     $this->form_validation->set_rules($rules);
    $status = $this->upload->do_upload("ProfilePicture");
    $data['error'] = $this->upload->display_errors();
    $query = $this->db->query("SELECT ProfilePicture from user WHERE id_user = '$id'");
    $query = $query->row_array();
      if ($status == 0 && $data['error'] == "<p>You did not select a file to upload.</p>") {
            $ProfilePicture = $query['ProfilePicture'];
          
            $status = 1;
       }
      
    
     if($this->form_validation->run() != false && $status){ //jika validation benar
       $Name = $this->input->post('Name');
       $Email = $this->input->post('Email');
       if(empty($ProfilePicture)){
       $ProfilePicture = $this->upload->data();
       $ProfilePicture = "assets/images/" . $ProfilePicture['file_name']; 
       }
       
       $this->Model->UpdateUser($id, $Name, $Email, $ProfilePicture);
       redirect("Admin");
    }else { //jika ada data yang tidak valid
        $data['user'] = $this->Model->UserDetails($id);
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        
        $this->load->view('pages/edit.php', $data); 

    }
 }

 
public function EditFacilities()
 {
    $this->Model->CheckAdmin();
        $id = $_GET["id"];//DAPET ID dari facilities.php
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $data['details'] = $this->Model->FacilitiesDetails($id);
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pages/editfacilities.php', $data);
 }
 public function UpdateFacilities()
 {
    $this->Model->CheckAdmin();
       $id = $_GET["id"];//DAPET ID dari editfacilities.php
      $rules = array(
        array(
        'field' => 'Name',
        'label' => 'Name',
        'rules' => 'required',
        "errors" => ["required" => "Tolong masukkan nama!"]
        ),
       
            array(
        'field' => 'Description',
        'label' => 'Name',
        'rules' => 'required',
        "errors" => ["required" => "Tolong masukkan Deskripsi!"]
            ),
              array(
        'field' => 'StartTime',
        'label' => 'Name',
        'rules' => 'required',
        "errors" => ["required" => "Tolong masukkan waktu tersedianya fasilitas!"]
        ),
       
            array(
        'field' => 'EndTime',
        'label' => 'Name',
        'rules' => 'required',
        "errors" => ["required" => "Tolong masukkan waktu tersedianya fasilitas!"]
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
        $StartTime = $this->input->post('StartTime');
        $EndTime = $this->input->post('EndTime');
       $Description = $this->input->post('Description');
       if(empty($Image)){
       $Image = $this->upload->data();
       $Image = "assets/images/" . $Image['file_name']; 

       }
       $this->Model->UpdateFacilities($id, $Name, $Description, $Image, $StartTime, $EndTime);
      
        redirect("Admin/Facilities");
    }else { //jika ada data yang tidak valid
         $data['details'] = $this->Model->FacilitiesDetails($id);
         $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
      
        $this->load->view('pages/editfacilities.php', $data);

    }
 }

 public function BookingList()
 {
       
       
 $this->Model->CheckAdmin();
        $data['request'] = $this->Model->RequestListAll();
        $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pages/bookinglist.php', $data);
 }
 public function GetFacilitiesName($id)//UNTUK MENAMPILKAN NAMA FASILITAS DI REQUEST LIST
 {
     
        $query = $this->db->query("SELECT * FROM facilities WHERE id_facilities = $id");
        return $query->result_array();
 }
  public function RequesterName($id)//UNTUK MENAMPILKAN NAMA USER DI REQUEST LIST
 {
        
        $query = $this->db->query("SELECT * FROM user WHERE id_user = $id");
        return $query->result_array();
 }




    
    
    
}