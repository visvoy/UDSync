<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Session data SQL query process
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

class Session_data extends CI_Model
{
	function create_session( $id = null , $user_ipadress = null , $user_agent = null)
	{
		$this->db->select('*')->from('ud_sessions')->where('ud_username' , $id)->limit(1); //Create query command
		$query = $this->db->get(); //Process query
		if( $query->num_rows == 0)
		{
			$timestamp = date('Y-m-d H:i:s',strtotime("+1 day")); //define timestamp
			$hash = sha1($user_ipadress.$user_agent); //define hash by sha1
			$data = array('ud_username' => $id ,'ud_timestamp' => $timestamp ,'ud_hash' => $hash);
			$this->db->insert('ud_sessions', $data); //insert data to database
			return; //Stop function
		} else {
			$timestamp = date('Y-m-d H:i:s',strtotime("+1 day")); //define timestamp
			$hash = sha1($user_ipadress.$user_agent); //define hash by sha1
			$data = array('ud_username' => $id ,'ud_timestamp' => $timestamp ,'ud_hash' => $hash);
			$this->db->where('ud_username', $id);
			$this->db->update('ud_sessions', $data); 
			return; //Stop function
		}

	}

	function match_session ( $hash = null )
	{
		$this->db->select('ud_username')->from('ud_sessions')->where('ud_hash' , $hash)->where('ud_timestamp' , date('Y-m-d',strtotime("+1 day")) )->limit(1); //Create query command
		$query = $this->db->get(); //Process query
		if( $query->num_rows == 1 ) //if mysql result is exist
		{
			foreach ($query->result() as $v) { //Get query result
				return $v->ud_username; //return username
			}
		} else {
			return FALSE; //return "no result"
		}
	}

	function destroy_session ( $id = null )
	{
		$this->db->delete('ud_sessions', array('ud_username' => $id)); 
		return;
	}
}