<?php
class Model_admin extends CI_Model {
	public function get_data() {
		$query = "SELECT * FROM alat_bayi JOIN type ON alat_bayi.kode_type=type.kode_type";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	public function get_datById($id) {
		$query = "SELECT * FROM alat_bayi JOIN type ON alat_bayi.kode_type=type.kode_type WHERE id_alatbayi=$id";
		$result = $this->db->query($query)->row_array();
		return $result;
	}

	public function get_type() {
		$this->db->from('type');
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function get_transaksi() {
		$query = "SELECT * from transaksi JOIN alat_bayi ON transaksi.id_alatbayi=alat_bayi.id_alatbayi JOIN customer ON transaksi.id_customer=customer.id_customer";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	public function insert_data($data, $table) {
		$result = $this->db->insert($table, $data);
		return $result;
		
	}

	public function hapus($id, $table, $field) {
		$this->db->where($field, $id);
		$result = $this->db->delete($table);
		return $result;
	}

	public function get_where($id) {
		$this->db->where('id_type', $id);
		$result = $this->db->get('type')->row_array();
		return $result;
	}

	public function updateType($id, $data) {
		$this->db->where('id_type', $id);
		$result = $this->db->update('type', $data);
		return $result;
	}

	public function get_DataCustomer() {
		$this->db->from('customer');
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function dataCustomerById($id) {
		$this->db->from('customer');
		$this->db->where('id_customer', $id);
		$result = $this->db->get()->row_array();
		return $result;
	}

	public function editCustomerId($id, $data) {
		$this->db->where('id_customer', $id);
		$result = $this->db->update('customer', $data);
		return $result;
	}

	public function editPassword($id, $data) {
		 $this->db->where('id_customer', $id);
		 $result = $this->db->update('customer', $data);
		 return $result;
	}

	public function get_transaksiById($id) {
		$query = "SELECT * FROM transaksi JOIN alat_bayi ON transaksi.id_alatbayi=alat_bayi.id_alatbayi JOIN customer ON transaksi.id_customer=customer.id_customer WHERE customer.id_customer='$id' ORDER BY transaksi.id_rental DESC";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	public function where_Transaksi($id) {
		$query = "SELECT * FROM transaksi JOIN customer ON transaksi.id_customer=customer.id_customer JOIN alat_bayi ON transaksi.id_alatbayi=alat_bayi.id_alatbayi WHERE id_rental='$id'";
		$result = $this->db->query($query)->row_array();
		return $result;
	}

	public function transaksi_where($id) {
		$query = "SELECT * FROM transaksi JOIN alat_bayi ON transaksi.id_alatbayi=alat_bayi.id_alatbayi WHERE transaksi.id_rental='$id'";
		$result = $this->db->query($query)->row_array();
		return $result;
	}

	public function update_pembayaran($id, $file) {
		$this->db->set('bukti_pembayaran', $file);
		$this->db->where('id_rental', $id);
		$result = $this->db->update('transaksi');
		return $result;
	}

	public function konfirmasi_pembayaran($id) {
		$result = $this->db->get_where('transaksi', array('id_rental' => $id))->row_array();
		return $result;
	}

	public function data_invoice($id) {
		$query = "SELECT * FROM transaksi JOIN customer ON transaksi.id_customer=customer.id_customer JOIN alat_bayi ON transaksi.id_alatbayi=alat_bayi.id_alatbayi WHERE id_rental='$id'";
		$result = $this->db->query($query)->row_array();
		return $result;
	}

	public function update_transaksi($id, $data) {
		$this->db->where('id_rental', $id);
		$result = $this->db->update('transaksi', $data);
		return $result;
	}

	public function get_laporan($dari='0000-00-00', $sampai='0000-00-00') {
		$query = "SELECT * FROM transaksi JOIN customer ON transaksi.id_customer=customer.id_customer JOIN alat_bayi ON transaksi.id_alatbayi=alat_bayi.id_alatbayi WHERE transaksi.tanggal_rental>='$dari' AND transaksi.tanggal_rental<='$sampai'";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	public function jml_customer() {
		$query = "SELECT * FROM customer WHERE role_id='2'";
		$result = $this->db->query($query)->num_rows();
		return $result;
	}

	public function jml_admin() {
		$query = "SELECT * FROM customer WHERE role_id='1'";
		$result = $this->db->query($query)->num_rows();
		return $result;
	}

	public function jml_alatBayi() {
		$query = "SELECT * FROM alat_bayi";
		$result = $this->db->query($query)->num_rows();
		return $result;
	}

	public function jml_transaksi() {
		$query = "SELECT * FROM transaksi";
		$result = $this->db->query($query)->num_rows();
		return $result;
	}
}
