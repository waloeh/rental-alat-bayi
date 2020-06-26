<?php 
class DataType extends CI_Controller {
	public function index()
	{
		$this->load->model('Model_admin');
		$data['type'] = $this->Model_admin->get_type();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/vdataType', $data);
		$this->load->view('templates_admin/footer');
	}

	public function type_where($id) {
		$this->load->model('Model_admin');
		$result = $this->Model_admin->get_where($id);
		echo json_encode($result);
	}

	public function allType() {
		$this->load->model('Model_admin');
		$result = $this->Model_admin->get_dataType();
		echo json_encode(array('data' => $result));
	}

	public function tambahType() {
		$this->load->model('Model_admin');
		$this->form_validation->set_rules('kode', 'Kode Type', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Type', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['type'] = $this->Model_admin->get_dataType();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/vdataType', $data);
			$this->load->view('templates_admin/footer');
		} else {
			$kode = $this->input->post('kode');
			$nama = $this->input->post('nama');
			$data = array(	'kode_type' => $kode,
						'nama_type' => $nama
				);
			$this->Model_admin->insert_data($data, 'type');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambahkan.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/DataType');	
		}
	}

	public function hapusDataType($id) {
		$this->load->model('Model_admin');
		$result = $this->Model_admin->hapus($id, 'type', 'id_type');
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/DataType');
		} else {
			$this->session->set_flashdata('mesage', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/DataType');
		}
	}

	public function editType() {
		$this->load->model('Model_admin');
		$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['type'] = $this->Model_admin->get_type();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/vdataType', $data);
			$this->load->view('templates_admin/footer');
		} else {
			$id = $this->input->post('id');
			$kode = $this->input->post('kode');
			$nama = $this->input->post('nama');
			$data = array(
				'kode_type' => $kode,
				'nama_type' => $nama
			);
			$result = $this->Model_admin->updateType($id, $data);
			if ($result > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diubah.
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/DataType');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal diubah.
	  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    			<span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/DataType');
			}
		}
	}
}
?>