<?php
class Dashboard_admin extends CI_Controller {
	public function index() {
		$this->load->model('Model_admin');
		$data['customer'] = $this->Model_admin->jml_customer();
		$data['admin'] = $this->Model_admin->jml_admin();
		$data['alat_bayi'] = $this->Model_admin->jml_alatBayi();
		$data['transaksi'] = $this->Model_admin->jml_transaksi();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/vdashboard_admin', $data);
		$this->load->view('templates_admin/footer');
	}
}
