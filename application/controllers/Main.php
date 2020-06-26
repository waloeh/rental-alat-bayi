<!-- cara supaya bisa menggunakan folder ketika di panggil di routes -->
<?php  
class Main extends CI_Controller {
	public function index() {
		redirect('customer/Dataalatbayi');
	}
}
?>