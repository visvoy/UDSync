<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User data query API
 *
 * This is a json API of user data SQL query.
 * In fact,Restful service is not simple to develop and use.If you can,try it yourself.
 *
 * @package		CodeIgniter
 * @subpackage	UDSync
 * @author		a20968
 * @category	Controller
 * @link 		https://github.com/a20968/UDSync
*/

Class User extends CI_Controller
{
	function user_login( $id = null , $password = null , $user_ipadress = null , $user_agent = null) //Set deafult value
	{
		if( !$id || !$password || !$user_ipadress || !$user_agent) //Verify value is exist
		{
			echo $this->json->create_message('1','Value error'); //Returned an error message
			exit; //Stop script running
		}

		$this->load->model('User_data'); //Load user data model
		$this->load->model('Session_data'); //Load user data model

		if($this->User_data->user_login( $id , $password ) == 1) //Access database
		{
			echo $this->json->create_message('0','Login success'); //Returned a success message
			$this->Session_data->create_session( $id , $user_ipadress , $user_agent);
			echo urlencode("brian6417@gmail.com");
			//echo sha1($this->input->ip_address().$this->input->user_agent());
			exit; //Stop script running
		} else {
			echo $this->json->create_message('2','Login faild'); //Returned a faild message,Status code is 2
			exit; //Stop script running
		}
	}

	function user_logout( $id = null )
	{
		if( !$id ) //Verify value is exist
		{
			echo $this->json->create_message('1','Value error'); //Returned an error message
			exit; //Stop script running
		}

		$this->load->model('Session_data'); //Load session model

		$this->Session_data->destroy_session( $id ); //Destroy session
		echo $this->json->create_message('0','Session destroyed'); //Returned success message
		exit; //Stop script running
	}

	function user_create( $id = null , $email = null , $password = null ) //Set deafult value
	{
		if( !$id || !$email || !$password) //Verify value is exist
		{
			echo $this->json->create_message('1','Value error'); //Returned an error message
			exit; //Stop script running
		}

		$this->load->model('User_data'); //Load user model

		if( $this->User_data->user_register( $id , urldecode($email) , $password ) !== FALSE ) //Verify return is TURE
		{
			echo $this->json->create_message('0','Register success'); //Returned success message
			exit; //Stop script running
		} else {
			echo $this->json->create_message('2','User already exist'); //Returned an error message
			exit; //Stop script running
		}
	}
}