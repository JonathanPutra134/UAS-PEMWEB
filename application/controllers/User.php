<?php
defined('BASEPATH') or exit('No direct script access allowed');
//CONTROLLER KHUSUS Halaman ADMIN
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library("session");
        $this->load->model("Model");
    }
    public function index()
    {
        $this->Model->CheckUser();
        $data['facilities'] = $this->Model->ShowFacilities();
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pagesuser/header.php', NULL, TRUE);
        $this->load->view('pagesuser/user.php', $data);
    }
    public function ShowDetails()
    {
        $this->Model->CheckUser();
        $id = $_GET["id"];
        $data['details'] = $this->Model->FacilitiesDetails($id);
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['header'] = $this->load->view('pagesuser/header.php', NULL, TRUE);
        $this->load->view('pagesuser/facilitiesdetails.php', $data);
    }

    public function BookForm()
    {
        $this->Model->CheckUser();
        $id = $_GET["id"];
        $data['details'] = $this->Model->FacilitiesDetails($id);
        $data['header'] = $this->load->view('pagesuser/header.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pagesuser/bookform.php', $data);
    }
    public function BookingList()
    {
        
         $this->Model->CheckUser();
        $UserID = $_GET["UserID"];


        $data['request'] = $this->Model->RequestListUser($UserID);
        $data['header'] = $this->load->view('pagesuser/header.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pagesuser/bookinglist.php', $data);
    }
    public function BookingSuccess()
    {
        $this->Model->CheckUser();
        $data['header'] = $this->load->view('pagesuser/header.php', NULL, TRUE);
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pagesuser/bookingsuccess.php', $data);
    }
    public function GetFacilitiesName($id) //UNTUK MENAMPILKAN NAMA FASILITAS DI REQUEST LIST
    {

        $query = $this->db->query("SELECT * FROM facilities WHERE id_facilities = $id");
        return $query->result_array();
    }
    


    public function RequestBooking()
    {
         $this->Model->CheckUser();
        $UserID = $_GET['id_user'];
        $FacilityID = $_GET['id_facilities'];
        $data['details'] = $this->Model->FacilitiesDetails($FacilityID);
        $rules = array(
            array(
                'field' => 'ReservationDate',
                'label' => 'Date',
                'rules' => 'required|callback_date_valid',
                 'errors' => ["required" => "Reservation date must be required", "date_valid" => "Tidak bisa membuat reservasi di waktu yang sudah berlalu!/Reservasi tidak boleh kosong!"]
            ),
            array(
                'field' => 'StartTime',
                'label' => 'Time',
                'rules' => 'required',
                "errors" => ["required" => "Tolong masukkan jam mulai pemakaian!"]
            ),
            array(
                'field' => 'EndTime',
                'label' => 'Name',
                'rules' => 'required',
                "errors" => ["required" => "Tolong masukkan jam berakhir pakai!"]
            )


        );
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() != false) { //jika validation benar

            $ReservationDate = $this->input->post('ReservationDate');
            $StartTime = $this->input->post('StartTime');
            $EndTime = $this->input->post('EndTime');




            $this->Model->RequestBooking($FacilityID, $ReservationDate, $StartTime, $EndTime, $UserID);


            redirect("User/BookingSuccess");
        } else { //jika ada data yang tidak valid

            $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
            $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
            $data['css'] = $this->load->view('include/css.php', NULL, TRUE);

            $this->load->view('pagesuser/bookform', $data);
            
        }
        
        
        
    }
    public function date_valid() {
   return (strtotime(implode("-", explode("/", $_POST['ReservationDate']))) < strtotime("now")) ? false : true;
 }

}