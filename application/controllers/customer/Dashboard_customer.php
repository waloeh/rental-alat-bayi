<?php
class Dashboard_customer extends CI_Controller {
	public function index() {
		$this->load->model('Model_admin');
		$data['alatBayi'] = $this->Model_admin->get_data();
		$this->load->view('templates_custommer/header');
		$this->load->view('customer/vdashboard_customer', $data);
		$this->load->view('templates_custommer/footer');
	}
}
