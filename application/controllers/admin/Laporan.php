<?php  
class Laporan extends CI_Controller {
	public function index() {
		$this->load->model('Model_admin');
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$data['laporan'] = $this->Model_admin->get_laporan($dari, $sampai);
		$this->form_validation->set_rules('dari', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('sampai', 'Tanggal', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/vlaporan', $data);
			$this->load->view('templates_admin/footer');
		} else {
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/vlaporan', $data);
			$this->load->view('templates_admin/footer');	
		}
	}
}
?>