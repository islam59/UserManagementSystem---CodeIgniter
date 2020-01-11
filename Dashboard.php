<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct(); 
	}

	public function index()
	{
        if(isset($_SESSION['userid'])){
            $this->Home();         
        } else {
            redirect('User/Logout/'); 
        }
	}

	public function Home(){
		//Load the target files or folder..
	}
}