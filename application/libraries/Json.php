<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * JavaScript Object Notation Library.
 *
 * This library is developed for auto create json message quickly and easily.
 * Json is easily to read and use to any program languages.
 *
 * @package		CodeIgniter
 * @subpackage	UDSync
 * @category	Libraries
 * @link 		https://github.com/a20968/UDSync
*/

class Json
{
	function create_message( $status = null , $message = null ) //$status = 1(error) , 0(success) , 2(other) , 3(Unauthorized access)
	{
		$json = array( 'status'=>$status , 'message'=>$message );
		return json_encode( $json );
	}
}