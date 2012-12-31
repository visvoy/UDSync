<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Session data query API
 *
 * This controller is design for match/destroy sessions.
 * The "session" doesn't saved on server/client or browser.
 * It was encode and encrypt saved in database , so it's very safe.
 *
 * @package		CodeIgniter
 * @subpackage	UDSync
 * @author 		a20968
 * @category	Controller
 * @link 		https://github.com/a20968/UDSync
*/

class Session extends CI_Controller
{
	function session_match( $hash = null ) //Set deafult value
	{
		if( !$hash ) //Verify value is exist
		{
			echo $this->json->create_message('1','Value error'); //Returned an error message
			exit; //Stop script running
		}

		$this->load->model('Session_data'); //Load session model
		$match = $this->Session_data->match_session( $hash );

		if( $this->Session_data->match_session( $hash ) == FALSE )
		{
			echo $this->json->create_message('2','No match'); //Returned level 2 message(other)
			exit; //Stop script running
		} else {
			echo $this->json->create_message('0',$match);
			exit; //Stop script running
		}
	}
}