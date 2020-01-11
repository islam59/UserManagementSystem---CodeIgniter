<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct(); 
		/*----------------------------------*/
		$this->load->model('User_model'); 
		/*----------------------------------*/
	}

	public function index()
	{
        if(isset($_SESSION['userid'])){
            redirect('Dashboard');         
        }
	}	


	public function Logout(){
		$data = array();
		//$data['active_menu'] = 'logout';  
		/*----------------------------------------------------------*/
		$data['content'] = $this->load->view('Files/Login.php',$data); 
		/*---------------------------------------------------------*/
		$this->load->view('index',$data); 
	}//end of logouts..	

	public function Login(){
		$table = 'rest_tb_user';
		$data = array(
			'userid' => $this->input->post('userid'),
			'password' => $this->input->post('password')
		);

		if(empty($data['userid']) OR empty($data['password'])){
			$sdata = array();
			$sdata['msg'] = '<span style="color:red;">Login Failed !</span>'; 
			$this->session->set_flashdata($sdata);
			redirect('User/Logout/',$sdata); 
		}else{
			$sdata = array();
			$check = $this->User_model->userLogin($data,$table);
			if($check){
				$sdata = array(); 
				$sdata['userid'] = $check->userid;  
				$sdata['type'] = $check->type;
				$sdata['userlogin'] = TRUE; 
				$this->session->set_userdata($sdata);//set as session... 
				 
				redirect('Dashboard/',$sdata);
			}else{
				$sdata = array();
				$sdata['msg'] = '<span style="color:red;">Invalid Username or Password !</span>'; 
				$this->session->set_flashdata($sdata);
				redirect('User/Logout/',$sdata); 
			}
		}		
	}//end of login method.. 

	public function UserOptions(){
		$tableUser = 'rest_tb_user';
		$systemData = array(
			'allUser' => $this->User_model->getAllUser($tableUser),
			//'editableUser' => $this->User_model->GetUserDataById($tableUser,$id)
		); 
		$siteData = array(
			'header' => $this->load->view('Php/Header.php',$systemData),
			'content' => $this->load->view('Php/Useroptions.php',$systemData),
			'footer' => $this->load->view('Php/Header.php',$systemData)
		); 
		/*------------------------------------------*/
		$this->load->view('index',$siteData); 
	}

	public function UserOptionsEdit($id){
		$tableUser = 'rest_tb_user';
		$systemData = array(
			'allUser' => $this->User_model->getAllUser($tableUser),
			'editableUser' => $this->User_model->GetUserDataById($tableUser,$id)
		); 
		$siteData = array(
			'header' => $this->load->view('Php/Header.php',$systemData),
			'content' => $this->load->view('Php/Useroptions.php',$systemData),
			'footer' => $this->load->view('Php/Header.php',$systemData)
		); 
		/*------------------------------------------*/
		$this->load->view('index',$siteData); 
	}	

	public function AddUser(){
		$table = 'rest_tb_user'; 
		$systemData = array(
			'userid' => $this->input->post('userid'),
			'type' => $this->input->post('type'),
			'password' => md5('1234')
		);

		if(empty($systemData['userid']) OR empty($systemData['type'])){
			$sdata = array();
			$sdata['msg'] = '<span style="color:red;">Login Failed !</span>'; 
			$this->session->set_flashdata($sdata);
			redirect('User/UserOptions/',$sdata); 
		}else{
			$this->User_model->addUser($systemData,$table);
			$sdata['msg'] = '<span style="color:green;">Added Successfully !</span>'; 
			$this->session->set_flashdata($sdata);
			redirect('User/UserOptions/',$sdata); 
		}
	}//add user 

	public function UpdateUser(){
		$table = 'rest_tb_user'; 
		$systemData = array(
			'id' =>$this->input->post('id'),
			'userid' => $this->input->post('userid'),
			'type' => $this->input->post('type'),
			'password' => md5('1234')
		);

		if(empty($systemData['userid']) OR empty($systemData['type'])){
			$sdata = array();
			$sdata['msg'] = '<span style="color:red;">Failed To Update !</span>'; 
			$this->session->set_flashdata($sdata);
			redirect('User/UserOptions/',$sdata); 
		}else{
			$this->User_model->UpdateUserProfileById($table, $systemData);
			$sdata['msg'] = '<span style="color:green;">Updated Successfully !</span>'; 
			$this->session->set_flashdata($sdata);
			redirect('User/UserOptions/',$sdata); 
		}
	}//add user 	

	public function RemoveUserById($id){
		$table = 'rest_tb_user';
		$id = $id; 
		$this->User_model->DeletUserByUserId($table,$id); 
		redirect('User/UserOptions/'); 
	}

}