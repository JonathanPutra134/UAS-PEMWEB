<?php

class ErrorHandler extends CI_Controller
{
 
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','html'));
        $this->load->library('session');
        $this->load->database(); 
    }

    public function index()
    {
        $this->load->view('include/javascript.php');
        $this->load->view('include/css.php');
        $this->load->view('pages/pagenotfound');
    }

    public function ErrorMessage()
    {
        $this->load->view('include/javascript.php');
        $this->load->view('include/css.php');
        $this->load->view('pages/errorview');
    }

      
    }
?>