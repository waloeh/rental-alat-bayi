<?php 
class Register extends CI_Controller {
	public function index() {
		$this->load->model('Model_admin');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Almat', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_kelamin', 'trim|required');
		$this->form_validation->set_rules('no_telepon', 'No Telepon', 'trim|required');
		$this->form_validation->set_rules('no_ktp', 'No Ktp', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header');
			$this->load->view('customer/vregister');
			$this->load->view('templates_admin/footer');
		} else {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$alamat = $this->input->post('alamat');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$no_tlp = $this->input->post('no_telepon');
			$no_ktp = $this->input->post('no_ktp');
			$password = $this->input->post('password');

			$data = array(
				'nama_customer'  => $nama,
				'username'       => $username,
				'alamat'		 => $alamat,
				'jenis_kelamin'	 => $jenis_kelamin,
				'no_ktp'		 => $no_ktp,
				'no_tlp'		 => $no_tlp,
				'password' 		 => password_hash($password, PASSWORD_DEFAULT),
				'role_id'		 => '2'
			);

			$this->Model_admin->insert_data($data, 'customer');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Register Berhasil, Silahkan Login.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
			redirect('customer/Register/login');
		}		
	}

	public function login() {
		$this->load->model('Model_admin');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header');
			$this->load->view('customer/vlogin');
			$this->load->view('templates_admin/footer');	
		} else {
			$this->_login();
		}
	}

	private function _login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->get_where('customer', ['username' => $username])->row_array();
		//jika user ada isinya
		if ($user != NULL) {
			if ($password == password_verify($password, $user['password'])) {
				$data = [
							'nama'        => $user['username'],
							'role_id'     => $user['role_id'],
							'id_customer' => $user['id_customer']
						];
				$this->session->set_userdata($data);
				if ($user['role_id'] == 1) {
					redirect('admin/Dashboard_admin');
				} else {
					redirect('customer/Dataalatbayi');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password salah.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button></div>');
				redirect('customer/Register/login');	
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username salah.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
			redirect('customer/Register/login');
		}
	}

	public function logout() {
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('role_id');

		redirect('customer/Dataalatbayi');
	}

	public function gantiPassword() {
		$this->load->model('Model_admin');
		$this->form_validation->set_rules('password_baru', 'Password', 'trim|required|matches[ulang_password]');
		$this->form_validation->set_rules('ulang_password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header');
			$this->load->view('customer/vgantiPassword');
			$this->load->view('templates_admin/footer');
		} else {
			$pass_baru = $this->input->post('password_baru');
			$id = $this->session->userdata('id_customer');
			
			$data = array(
				'password' => password_hash($pass_baru, PASSWORD_DEFAULT)
			);
			$result = $this->Model_admin->editPassword($id, $data);
			if ($result > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password berhasil diubah, Silahkan Login!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('customer/Register/login');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password gagal diubah.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('customer/Register/login');
			}
		}		
	}
}
?>
