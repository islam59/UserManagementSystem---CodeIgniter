<?php
	class User_model extends CI_Model{
		
/********************************************************************
*USER LOGIN METHOD... 
*/
	public function userLogin($data,$table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('userid',$data['userid']);
		$this->db->where('password',md5($data['password']));
		//$this->db->where('access','1');
		$qresult = $this->db->get(); 
		$has  = $qresult->num_rows(); 
		if($has === 1){
			$result = $qresult->row(); 
			return $result; 
		}
	}
/********************************************************************
*ADD USER METHOD...
*/
	public function addUser($systemData,$table) {
		$this->db->insert($table,$systemData);
	}
/********************************************************************
*GET ALL USER METHOD...
*/
	public function getAllUser($table){
		$this->db->select('*');
		$this->db->from($table);
		$result = $this->db->get();
		$result = $result->result();
		return $result;
	}
/********************************************************************
*REMOVE USER BY ID...
*/
	public function DeletUserByUserId($table,$id){
			$this->db->where('id',$id);
			$this->db->delete($table);
	}
/********************************************************************
*GET USER DATA BY ID...
*/	
	public function GetUserDataById($table, $id){
		$this->db->select('*'); 
		$this->db->from($table); 
		$this->db->where('id',$id);
		$result = $this->db->get(); 
		$result = $result->row();
		return $result; 
	}
/********************************************************************
*USER PROFILE UPDATE BY ID...
*/	
	public function UpdateUserProfileById($table, $data){
		$this->db->set('userid',$data['userid']);
		$this->db->set('type',$data['type']);
		$this->db->set('type',$data['type']);
		$this->db->where('id',$data['id']);
		$this->db->update($table);
	}
/********************************************************************
*USER PASSWORD CHANGED BY USER ID...
*/	
	public function UpdateUserPasswordById($data){
		$this->db->set('password',$data['password']);
		$this->db->where('user_id',$data['user_id']);
		$this->db->where('password',$data['old_password']); 
		$this->db->update('tb_user');
	}
/********************************************************************
*USER LOGIN METHOD...
*/
	public function function_name($id){
			$this->db->set('access','1');
			$this->db->where('user_id',$id);
			$this->db->update('tb_user');
	}


}//end of user model...
?>