<?php 
class DataCustomer extends CI_Controller {
	public function index() {
		$this->load->model('Model_admin');
		$data['customer'] = $this->Model_admin->get_DataCustomer();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/vdataCustomer', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahCustomer() {
		$this->load->model('Model_admin');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Passowrd', 'trim|required');
		$this->form_validation->set_rules('password2', 'Password', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('ktp', 'Ktp', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_kelamin', 'trim|required');

		if($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/vtambahCustomer');
			$this->load->view('templates_admin/footer');
		} else {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			$ktp = $this->input->post('ktp');
			$jenis_kelamin = $this->input->post('jenis_kelamin');

			$data = array(
				'nama_customer'  => $nama,
				'username'       => $username,
				'password'       => password_hash($password, PASSWORD_DEFAULT),
				'alamat'         => $alamat,
				'no_tlp'         => $telepon,
				'no_ktp'         => $ktp,
				'jenis_kelamin'  => $jenis_kelamin,
				'role_id'        => 2
			);

			$this->Model_admin->insert_data($data, 'customer');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambahkan.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/DataCustomer');
		}
	}

	public function editCustomer($id) {
		$this->load->model('Model_admin');
		$data['customer'] = $this->Model_admin->dataCustomerById($id);

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Passowrd', 'trim|required');
		$this->form_validation->set_rules('password2', 'Password', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('ktp', 'Ktp', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_kelamin', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/veditCustomer', $data);
			$this->load->view('templates_admin/footer');
		} else {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			$ktp = $this->input->post('ktp');
			$jenis_kelamin = $this->input->post('jenis_kelamin');

			$data = array(
				'nama_customer'  => $nama,
				'username'  	 => $username,
				'password'  	 => password_hash($password, PASSWORD_DEFAULT),
				'alamat'  	     => $alamat,
				'no_tlp'         => $telepon,
				'no_ktp'         => $ktp,
				'jenis_kelamin'  => $jenis_kelamin
			);

			$result = $this->Model_admin->editCustomerId($id, $data);
			if ($result > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diubah.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/DataCustomer');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/DataCustomer');
			}
		}
	}

	public function hapusDataCustomer($id) {
		$this->load->model('Model_admin');
		$result = $this->Model_admin->hapus($id, 'customer', 'id_customer');
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/DataCustomer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal dihapus.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/DataCustomer');
		}
	}
}
?>