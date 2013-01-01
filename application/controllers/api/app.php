<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * App data query API
 *
 * This controller is design for access Apps data
 * Only registered Apps can access API , Or you will get "Unauthorized access" Message
 * When you develop a new program work with UDSync , Don't forget add a "APP_KEY"
 *
 * @package		CodeIgniter
 * @subpackage	UDSync
 * @author 		a20968
 * @category	Controller
 * @link 		https://github.com/a20968/UDSync
*/

class App extends CI_Controller
{
	function install( $admin = null , $password = null , $domain = null , $app_key = null ) //Set default value ($_SERVER['HTTP_HOST'];)
	{
		if( !$admin || !$password || !$domain || !$app_key) //Verify value is exist
		{
			echo $this->json->create_message('1','Value error'); //Returned an error message
			exit; //Stop script running
		}

		$this->load->model('User_data'); //Load user model
		$this->load->model('Admins_data'); //Load admins model
		$this->load->model('Application_data'); //Load app model

		if( $this->User_data->user_login( $admin , $password ) == 1 && $this->Admins_data->admin_instauth( $admin , $password ) == 1 && $this->Application_data->install_app( $domain , $app_key ) == 1 ) //Verify admin access
		{
			echo $this->json->create_message('0','Suceess'); //Returned success message
			exit; //Stop script running
		} else {
			echo $this->json->create_message('2','No enough access or App is exist'); //Returned an error message
			exit; //Stop script running
		}
	}
}