<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function index()
    {
        //path views/home.php
        //home is a templatefile name.
        $this->load->view('home'); 
    }
    public function demo()
    {
        $this->load->view('demo');
    }
}