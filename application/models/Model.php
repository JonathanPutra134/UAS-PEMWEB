<?php 

	defined('BASEPATH') OR exit('No direct script access allowed !');

	class Model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
         
		}



    public function loginAuthentication($email, $password) {
      $query = $this->db->get_where('admin', array('Email' => $email));

      if(!empty($query->row_array())) { //data berhasil ditangkap dari database
        $query = $query->row_array();
      } else { //email tidak terdaftar di database
        $_SESSION['gagalLogin'] = "Maaf, email / password salah!";
        redirect('home/login');
      }
      
      if(!empty($query) && $email == $query['Email'] && password_verify($password, $query['Password']) == true) {
        $_SESSION['loggedInAccount'] = $query; 
        return 1; //data match
      } else { //email bener tapi password salah
        $_SESSION['gagalLogin'] = "Maaf, email / password salah!";
        redirect('home/login');
      }
    }

		public function AddData()
		{
		  $this->db->trans_begin();
          $config['upload_path'] = './assets/images';
		  $config['allowed_types'] = 'jpg|png|jpeg';
		  $config['max_size'] = '5000';
          $this->load->library('upload', $config);
          $status = $this->upload->do_upload("ProfilePicture");
         
          $Name = $this->input->post('Name');
          $Email = $this->input->post('Email');
          $Password = password_hash($this->input->post('Password'), PASSWORD_DEFAULT);
          $ProfilePicture = $this->upload->data();
          $ProfilePicture = "assets/images/" . $ProfilePicture['file_name']; 
    
        
          $query = $this->db->insert("admin", [
            "Name" => $Name,
            "Email" => $Email,
            "Password" => $Password,
            "ProfilePicture" => $ProfilePicture


           ]);
     
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      echo "gagal";
    } else {
      return $query;
    }
			
			 
		}

		
		
	
	}

?>