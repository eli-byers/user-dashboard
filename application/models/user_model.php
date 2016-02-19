<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {



	function get_all(){
		$query = "SELECT * FROM users";
        return $this->db->query($query)->result_array();
    }

	function get_by_email($email){
		$query = "SELECT * FROM users WHERE email = ?";
		return $this->db->query($query, $email)->row_array();
	}

	function get_by_id($user_id){
		$query = "SELECT * FROM users WHERE id = ?";
		return $this->db->query($query, $user_id)->row_array();
	}

	function add($post){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('pass_1', 'Password', 'required|trim|matches[pass_2]|min_length[8]');
		$this->form_validation->set_rules('pass_2', 'Password Confirmation', 'required|trim');

		if($this->form_validation->run()){
			$query = "INSERT INTO users (first_name, last_name, email, password,
				description, user_level, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?)";
			$post['description'] = "";
			if(empty($this->get_all())){		// if first user make admin
				$post['user_level'] = True;
			} else {
				$post['user_level'] = False;
			}
			$values = array($post['first_name'],$post['last_name'],$post['email'],md5($post['pass_1']),
				$post['description'],$post['user_level'],date("Y-m-d, H:i:s"),date("Y-m-d, H:i:s"));
			return $this->db->query($query, $values);
		}
		return false;
	}


	// function add($user){
	// 	$query = "INSERT INTO users
	// 		(first_name, last_name, email, password,
	// 		description, user_level, created_at, updated_at)
	// 		VALUES (?,?,?,?,?,?,?,?)";
	// 	$values = array(
	// 		$user['first_name'],$user['last_name'],$user['email'],$user['password'],
	// 		$user['description'],$user['user_level'],date("Y-m-d, H:i:s"),date("Y-m-d, H:i:s"));
	// 	return $this->db->query($query, $values);
	// }

	function update($product){
        $query = "UPDATE users SET first_name = ?, last_name = ?, email = ?,
			password = ?, user_level = ?, updated_at = ? WHERE id = ?";
        $values = array($product['name'],$product['description'],$product['price'],$product['id']);
        return $this->db->query($query, $values);
    }

	function delete($user_id){
        $query = "DELETE FROM users WHERE id = ?";
        return $this->db->query($query, $user_id);
    }
}
