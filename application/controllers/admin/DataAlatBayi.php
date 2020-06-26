<?php
class DataAlatBayi extends CI_Controller {
	public function index() {
		$this->load->model('Model_admin');
		$data['dataAlatBayi'] = $this->Model_admin->get_data();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/vdataAlatBayi', $data);
		$this->load->view('templates_admin/footer');
	}

	public function dataAll() {
		$this->load->model('Model_admin');
		$result = $this->Model_admin->get_data('alat_bayi');
		echo json_encode(array('data' => $result));
	}

	public function formTambahAlatBayi() {
		$this->load->model('Model_admin');
		$this->form_validation->set_rules('type', 'Type', 'trim|required');
		$this->form_validation->set_rules('merk', 'Merk', 'trim|required');
		$this->form_validation->set_rules('warna', 'Warna', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('denda', 'Denda', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['type'] = $this->Model_admin->get_type();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/vtambahAlatBayi', $data);
			$this->load->view('templates_admin/footer');
		} else {
			$type = $this->input->post('type');
			$merk = $this->input->post('merk');
			$warna = $this->input->post('warna');
			$tahun = $this->input->post('tahun');
			$status = $this->input->post('status');
			$harga = $this->input->post('harga');
			$denda = $this->input->post('denda');
			//cek jika ada gambar yang di upload
			$upload_image = $_FILES['gambar']['name']; 
			if ($upload_image) {
				$config['allowed_types'] = 'jpg|jpeg|png'; //gambar yang bisa di upload
				// $config['max_size'] = '2048'; //2mb
				$config['upload_path'] = './assets/img'; //tempat gambar disimpan
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					echo "Gambar gagal diupload";
				} else {
					$gambar = $this->upload->data('file_name');
				}
			} else {
				echo "
 					<script>
 					  alert('pilih gambar!');
 					  document.location.href = '';
 					</script>
				"; 
			}
			$data = array(	'kode_type' => $type,
							'merk'      => $merk,
							'warna'     => $warna,
							'tahun'     => $tahun,
							'status'    => $status,
							'gambar'    => $gambar,
							'harga'    => $harga,
							'denda'    => $denda
					);
			$this->Model_admin->insert_data($data, 'alat_bayi');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambahkan.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/DataAlatBayi');	
		}
	}

	public function detailAlatBayi($id) {
		$this->load->model('Model_admin');
		$data['alatbayi'] = $this->Model_admin->get_datById($id);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/vdetaiAlatBayi', $data);
		$this->load->view('templates_admin/footer');
	}

	public function formEditAlatBayi($id) {
		$this->load->model('Model_admin');
		$data['type'] = $this->Model_admin->get_type();
		$data['alatBayi'] = $this->Model_admin->get_datById($id);
		$this->form_validation->set_rules('type', 'Type', 'trim|required');
		$this->form_validation->set_rules('merk', 'Merk', 'trim|required');
		$this->form_validation->set_rules('warna', 'Warna', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('denda', 'Denda', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/veditAlatBayi', $data);
			$this->load->view('templates_admin/footer');		
		} else {
			$type = $this->input->post('type');
			$merk = $this->input->post('merk');
			$warna = $this->input->post('warna');
			$tahun = $this->input->post('tahun');
			$status = $this->input->post('status');
			$harga = $this->input->post('harga');
			$denda = $this->input->post('denda');
			//get gambar baru
			$upload_image = $_FILES['gambar']['name'];
			$gambar_lama = $data['alatBayi']['gambar'];
			//cek apakah ada yang diupload 
			if ($upload_image) {
				$config['allowed_types'] = 'jpg|jpeg|png'; //gambar yang bisa di upload
				// $config['max_size'] = '2048'; //2mb
				$config['upload_path'] = './assets/img'; //tempat gambar disimpan
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$gambar_baru = $this->upload->data('file_name');
					//set field image di table alat_bayi
					$this->db->set('gambar', $gambar_baru);
					//hapus gambar lama
					unlink(FCPATH . 'assets/img/'. $gambar_lama);
				} else {
					echo $this->upload->display_error();
				}
			} else {
				$this->db->set('gambar', $gambar_lama);
			}
			//update table alat_bayi
			$this->db->set('kode_type', $type);
			$this->db->set('merk', $merk);
			$this->db->set('warna', $warna);
			$this->db->set('tahun', $tahun);
			$this->db->set('status', $status);
			$this->db->set('harga', $harga);
			$this->db->set('denda', $denda);
			$this->db->where('id_alatbayi', $id);
			$this->db->update('alat_bayi');
			
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diubah.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/DataAlatBayi');
		}
	}

	public function hapusAlatBayi($id) {
		$this->load->model('Model_admin');
		$result = $this->Model_admin->hapus($id, 'alat_bayi', 'id_alatbayi');
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/DataAlatBayi');
		}else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal dihapus.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/DataAlatBayi');
		}
	}
}
?>
