<?php 
class Transaksi extends CI_Controller
{
	public function index() {
		$this->load->model('Model_admin');
		$id = $this->session->userdata('id_customer');
		$data['transaksi'] = $this->Model_admin->get_transaksiById($id);
		$this->load->view('templates_custommer/header');
		$this->load->view('customer/vtransaksi.php', $data);
		$this->load->view('templates_custommer/footer');
	}

	public function pembayaran($id) {
		$this->load->model('Model_admin');
		$data['pembayaran'] = $this->Model_admin->where_Transaksi($id);
		$this->load->view('templates_custommer/header');
		$this->load->view('customer/vpembayaran', $data);
		$this->load->view('templates_custommer/footer');
	}

	public function bukti_pembayaran($id) { 
		$this->load->model('Model_admin');
		$fileUpload = $_FILES['file']['name'];
		if (!$fileUpload == '') {
			$config['allowed_types'] = 'jpg|jpeg|png|pdf'; //gambar yang bisa di upload
			// $config['max_size'] = '2048'; //2mb
			$config['upload_path'] = './assets/img/bukti_pembayaran'; //tempat gambar disimpan
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal dikirim, patikan format jpg, jpeg, png, pdf !
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('customer/Transaksi/pembayaran/'.$id);
			} else {
				$file = $this->upload->data('file_name');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">File kosong dan gagal diupload.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('customer/Transaksi/pembayaran/'.$id);
		}
		$result = $this->Model_admin->update_pembayaran($id, $file);
		if ($result) {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">File berhasil di kirim, Tunggu konfirmasi oleh admin.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('customer/Transaksi/pembayaran/'.$id);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal dikirim, patikan format jpg, jprg, png !
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('customer/Transaksi/pembayaran/'.$id);
		}
	}

	public function print_invoice($id) {
		$this->load->model('Model_admin');
		$data['invoice'] = $this->Model_admin->data_invoice($id);
		$this->load->view('customer/vinvoice', $data);
	}

	public function transaksi_batal($id) {
		$this->load->model('Model_admin');
		$this->Model_admin->hapus($id, 'transaksi', 'id_rental');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi berhasi dibatalkan.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
		redirect('customer/Transaksi');
	}
}
?>