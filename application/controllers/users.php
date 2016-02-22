<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler();
		$this->load->model('user_model');
	}

	public function register(){
		if($this->user_model->add($this->input->post())){
			// auto login
			$user = $this->user_model->get_by_email($this->input->post('email'));
			$user_data = array(
				'user_id' => $user['id'],
				'user_email' => $user['email'],
				'user_first_name' => $user['first_name'],
				'user_last_name' => $user['last_name'],
				'is_logged_in' => TRUE
				);
			$this->session->set_userdata($user_data);
			if($user['user_level']){
				redirect("dashboard/admin");
			} else {
				redirect("dashboard");
			}
		}
		$this->session->set_flashdata("reg_error", TRUE); 	// errors
		redirect("register");
	}


	// public function register(){
	// 	$this->load->library('form_validation');
	//
	// 	$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
	// 	$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
	// 	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
	// 	$this->form_validation->set_rules('pass_1', 'Password', 'required|trim|matches[pass_2]|min_length[8]|md5');
	// 	$this->form_validation->set_rules('pass_2', 'Password Confirmation', 'required|trim');
	//
	// 	if($this->form_validation->run()){
	// 		$user = array(
	// 			'first_name' => $this->input->post('first_name'),
	// 			'last_name' => $this->input->post('last_name'),
	// 			'email' => $this->input->post('email'),
	// 			'password' => $this->input->post('pass_1')
	// 		);
	// 		if($this->user_model->add($user)){
	// 			// auto login
	// 			$user = $this->user_model->get_by_email($user['email']);
	// 			$user_data = array(
	// 				'user_id' => $user['id'],
	// 				'user_email' => $user['email'],
	// 				'user_name' => $user['first_name'].' '.$user['last_name'],
	// 				'is_logged_in' => true
	// 			);
	// 			$this->session->set_userdata($user_data);
	// 			redirect("profile");
	// 		}
	// 	}
	// 	$this->session->set_flashdata("reg_error", TRUE); 	// errors
	// 	redirect("/");
	// }

	public function login(){
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		if($email && $password){
			$user = $this->user_model->get_by_email($email);
			if($user && $user['password'] == $password){
				$user_data = array(
					'user_id' => $user['id'],
					'user_email' => $user['email'],
					'user_first_name' => $user['first_name'],
					'user_last_name' => $user['last_name'],
					'user_level' => $user['user_level'],
					'is_logged_in' => TRUE
					);

				$this->session->set_userdata($user_data);
				if($user['user_level']){
					redirect("dashboard/admin");
				} else {
					redirect("dashboard");
				}
			}
		}
		$this->session->set_flashdata("login_error", TRUE);
		redirect("login");
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("/");
	}

	public function admin_dashboard(){
		$users = $this->user_model->get_all();
		$this->load->view('nav_sgnin');
		if($this->session->userdata('user_level')){
			$this->load->view('admin_dashboard', array('users' => $users));
		} else {
			$this->load->view('dashboard', array('users' => $users));
		}
	}

	public function dashboard(){
		$users = $this->user_model->get_all();
		$this->load->view('nav_sgnin');
		$this->load->view('dashboard', array('users' => $users));
	}

	public function profile(){
		if($this->session->userdata('is_logged_in')){
			$this->load->view('nav_sgnin');
			$this->load->view('user_profile');
		} else {
			redirect("/");
		}
	}

	public function create_users (){
		$this->load->view('nav_sgnin');
		if($this->user_model->add($this->input->post())){
			$this->load->view('admin_dashboard');
		} else {
			$this->load->view('new_user');
		}
	}

}
