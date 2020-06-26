<?php 
class Dataalatbayi extends CI_Controller {
	public function index() {
		$this->load->model('Model_admin');
		$data['alatbayi'] = $this->Model_admin->get_data();
		$this->load->view('templates_custommer/header');
		$this->load->view('customer/vdataAlatBayi', $data);
		$this->load->view('templates_custommer/footer');
	}

	public function detailAlat($id) {
		$this->load->model('Model_admin');
		$data['detail'] = $this->Model_admin->get_datById($id);
		$this->load->view('templates_custommer/header');
		$this->load->view('customer/vdetailAlat', $data);
		$this->load->view('templates_custommer/footer');
	}
}
 ?>
