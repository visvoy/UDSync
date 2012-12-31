<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User data SQL query process
 *
 * This model is created for access Database safely and quickly by Active Record class.
 * But I think the database can running faster just need more optimization.
 * DO NOT USE $this->db->query('something') It's may be an SQL injection security bug.
 * Remember use "Query Bindings".If you need to use your own SQL query command.
 *
 * @package		CodeIgniter
 * @subpackage 	UDSync
 * @author 		a20968
 * @category 	Model
 * @link 		https://github.com/a20968/UDSync
*/

class User_data extends CI_Model
{
	function user_login( $id = null , $password = null )
	{
		$this->db->select('*')->from('ud_users')->where('user_name' , $id)->where('user_password' , $password)->limit(1); //Create query command
		$query = $this->db->get(); //Process query
		return $query->num_rows; //Return a number to make sure user is exist and password is correct
	}

	function user_register( $id = null , $email = null , $password = null )
	{
		$this->db->select('*')->from('ud_users')->where('user_name' , $id)->where('user_email' , $email)->where('user_password' , $password)->limit(1); //Create query command
		$query = $this->db->get(); //Process query
		if( $query->num_rows == 0 )
		{
			$data = array('user_name' => $id ,'user_email' => $email ,'user_password' => $password , 'user_register_date' => date("Y-m-d"));
			$this->db->insert('ud_users', $data); 
			return;
		} else {
			return FALSE;
		}
	}
}