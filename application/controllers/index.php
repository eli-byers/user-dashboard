<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index(){
		$this->load->view('nav_default');
		$this->load->view('home');
	}

	public function register(){
		$this->load->view('nav_default');
		$this->load->view('register_page');
	}

	public function login(){
		$this->load->view('nav_default');
		$this->load->view('login_page');
	}

}
