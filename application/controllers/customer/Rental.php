<?php 
class Rental extends CI_Controller {
	public function tambahRental($id) {
		$this->load->model('Model_admin');
		$data['alatbayi'] = $this->Model_admin->get_datById($id);

		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('denda', 'Denda', 'trim|required');
		$this->form_validation->set_rules('tanggal_rental', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('tanggal_kembali', 'Tangal', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates_custommer/header');
			$this->load->view('customer/vtambahRental', $data);
			$this->load->view('templates_custommer/footer');
		}  else {
			$harga = $this->input->post('harga');
			$denda = $this->input->post('denda');
			$tanggal_kembali = $this->input->post('tanggal_kembali');
			$tanggal_rental = $this->input->post('tanggal_rental');
			$id_customer = $this->session->userdata('id_customer');
			$id_alatbayi = $id;


			$data = array(
					'id_customer'    		=> $id_customer,
					'id_alatbayi'    		=> $id_alatbayi,
					'tanggal_rental' 		=> $tanggal_rental,
					'tanggal_kembali'		=> $tanggal_kembali,
					// 'tanggal_pengmbalian' 	=> date(),
					'harga'					=> $harga,
					'status_rental'			=> 1,
					'status_pengembalian'	=> 0
			);
			$result = $this->Model_admin->insert_data($data, 'transaksi');
			if ($result > 0) {
				// $this->db->set('status', 0);
				// $this->db->where('id_alatbayi', $id_alatbayi);
				// $this->db->update('alat_bayi');
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Barang berhasil disewa, Barang segera di antar.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('customer/Dataalatbayi');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Barang gagal disewa.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('customer/Dataalatbayi');
			}
		}		
	}
}

?>