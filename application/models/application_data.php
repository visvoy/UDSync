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

class Application_data extends CI_Model
{
	function match_app ( $id = null , $key = null ) //Set deafult value
	{
		$this->db->select('*')->from('ud_applications')->where('app_id' , $id)->where('app_key' , $key); //Create query command
		$query = $this->db->get(); //Process query
		return $query->num_rows; //Returned a number to make sure app and key is match
	}
}