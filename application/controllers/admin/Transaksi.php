<?php 

class Transaksi extends CI_Controller {
	public function index() {
		$this->load->model('Model_admin');
		$data['transaksi'] = $this->Model_admin->get_transaksi();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/vtransaksi', $data);
		$this->load->view('templates_admin/footer');
	}

	public function transaksi_batal($id_transaksi, $id_alatbayi) {
		$this->load->model('Model_admin');
		$this->db->set('status', 1);
		$this->db->where('id_alatbayi', $id_alatbayi);
		$this->db->update('alat_bayi');

		$result = $this->Model_admin->hapus($id_transaksi, 'transaksi', 'id_rental');
		if ($result > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaki berhasil dibatalkan.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/Transaksi');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal dibatalan.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/Transaksi');
		}
	}

	public function transaksi_selesai($id) {
		$this->load->model('Model_admin');
		$data['transaksi'] = $this->Model_admin->where_Transaksi($id);

		$this->form_validation->set_rules('status_pengembalian', 'Pengembalian', 'trim|required');
		$this->form_validation->set_rules('status_rental', 'Rental', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/vtransaksi_selesai', $data);
			$this->load->view('templates_admin/footer');
		} else {
			$tanggal = $this->input->post('tanggal_kembali');
			$status_pengembalian = $this->input->post('status_pengembalian');
			$status_rental = $this->input->post('status_rental');
			$data1 = array(
				'tanggal_pengembalian'     => $tanggal,
				'status_pengembalian' => $status_pengembalian,
				'status_rental'       => $status_rental
			);

			if ($status_pengembalian == 1) {
				$data2 = array('status' => 1);
			}else {
				$data2 = array('status' => 0);
			}
			$result = $this->Model_admin->update_transaksi($id, $data1);
			$this->db->where('id_alatbayi', $data['transaksi']['id_alatbayi']);
			$this->db->update('alat_bayi', $data2);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi berhasil diupdate.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/Transaksi');
		}		
	}

	public function konfirmasi_pembayaran($id) {
		$this->load->model('Model_admin');
		$data['konfirmasi'] = $this->Model_admin->konfirmasi_pembayaran($id);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/vkonfirmasiPembayaran', $data);
		$this->load->view('templates_admin/footer');
	}

	public function download_bukti($id) {
		$this->load->model('Model_admin');
		$this->load->helper('download');
		$filePembayaran = $this->Model_admin->konfirmasi_pembayaran($id);
		$file = 'assets/img/bukti_pembayaran/'.$filePembayaran['bukti_pembayaran'];
		force_download($file, NULL);
	}

	public function konfirmasi($id) {
		$this->load->model('Model_admin');
		$transaksi = $this->Model_admin->transaksi_where($id);
		$id_alatbayi = $transaksi['id_alatbayi'];
		$konfirmasi = $this->input->post('konfirmasi');
		$this->db->set('status_pembayaran', $konfirmasi);
		$this->db->where('id_rental', $id);
		$this->db->update('transaksi');
		if ($konfirmasi == 1) {
			$this->db->set('status', 0);
		} else {
			$this->db->set('status', 1);
		}
		$this->db->where('id_alatbayi', $id_alatbayi);
		$this->db->update('alat_bayi');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Pembayaran sudah dikonfirmasi.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/Transaksi');
	}
}
?>