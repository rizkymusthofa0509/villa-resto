<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Cart extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		/*Load session*/
		$this->load->library('session');
		/*Model*/
		$this->load->model(array('M_account', 'M_product', 'M_transaction', 'M_transaction_detail'));


		$this->base_url = 'apps';
		login_app();
	}

	public function index()
	{

		$token = session('TOKEN');
		$cek_token = $this->db->query("SELECT * FROM `transaction` WHERE TOKEN='$token' ")->row_array();
		if (!empty($cek_token['id'])) {
			$id = $cek_token['id'];
		} else {
			$id = 0;
		}
		$token = session('TOKEN');
		$cek_token = $this->db->query("SELECT * FROM `transaction` WHERE TOKEN='$token' ")->row_array();
		$detail    = $this->db->query("SELECT SUM(total_price) as total_price FROM `transaction_detail` WHERE transaction_id='$cek_token[id]' ")->row_array();
		$data['total'] = $detail['total_price'];
		$data['checkout'] = session('checkout');
		$data['cart'] = $this->M_transaction_detail->getWhere($id);
		$data['villa'] = $this->db->query("SELECT * FROM villa");
		$this->load->view('cart/cart', $data);
	}

	public function pesan()
	{
		$token = post('token');
		$id = post('id');
		$product = $this->db->query("SELECT * FROM `product` WHERE id='$id'")->row_array();
		$cek_token = $this->db->query("SELECT * FROM `transaction` WHERE TOKEN='$token' ");
		if ($cek_token->num_rows() > 0) {
			//Pesanan Sudah ada. tinggal masukin produk
			$transaksi_id = $cek_token->row_array();
			$data_pesanan = [
				'transaction_id' => $transaksi_id['id'],
				'product_id' => $id,
				'qty' => 1,
				'total_price' => $product['price'],
				'notes' => '',
				'created_at' => created_at(),
				'updated_at' => created_at(),
			];
			$this->db->insert('transaction_detail', $data_pesanan);
		} else {
			//Pesanan Belum ada. masukan transaksi dan lakukan tambahan data produk
			//Masukan data ke table transaksi
			$data_transaksi = [
				'name' => '',
				'villa_id' => '',
				'status' => 'dipesan',
				'TOKEN' => session('TOKEN'),
				'created_at' => created_at(),
				'updated_at' => created_at(),
			];
			$this->db->insert('transaction', $data_transaksi);
			$token = post('token');
			$cek_token = $this->db->query("SELECT * FROM `transaction` WHERE TOKEN='$token' ");
			$transaksi_id = $cek_token->row_array();
			//Masukan data ke table transaksi detail
			$data_pesanan = [
				'transaction_id' => $transaksi_id['id'],
				'product_id' => $id,
				'qty' => 1,
				'total_price' => $product['price'],
				'notes' => '',
				'created_at' => created_at(),
				'updated_at' => created_at(),
			];
			$this->db->insert('transaction_detail', $data_pesanan);
		}

		echo "Berhasil menambahkan kedalam keranjang.";
	}

	public function update_pesanan()
	{
		$field = post('field');
		$id = post('id');
		$update = post('update');
		$this->db->query("UPDATE transaction_detail SET $field='$update' WHERE id='$id' ");
		echo "Success";
	}
	public function update_qty()
	{
		$id = post('id');
		$tipe = post('tipe');
		$cek = $this->db->query("SELECT * FROM transaction_detail WHERE id='$id' ")->row_array();
		$no = $cek['qty'];
		if ($tipe == '+') {
			$no = $no + 1;
		} else {
			$no = $no - 1;
		}

		//Cek Harga produk
		if ($no < 0) {
			echo "NO";
		} else {
			$product_id = $cek['product_id'];
			$produk = $this->db->query("SELECT * FROM product WHERE id='$product_id' ")->row_array();
			$total_price = $produk['price'] * $no;

			$this->db->query("UPDATE transaction_detail SET qty='$no',total_price='$total_price' WHERE id='$id' ");
			echo $no;
		}
	}

	public function total_price()
	{
		$token = session('TOKEN');
		$cek_token = $this->db->query("SELECT * FROM `transaction` WHERE TOKEN='$token' ")->row_array();
		$detail    = $this->db->query("SELECT SUM(total_price) as total_price FROM `transaction_detail` WHERE transaction_id='$cek_token[id]' ")->row_array();
		echo rp($detail['total_price']);
	}

	public function update_transaksi()
	{
		$field = post('field');
		$id = post('id');
		$update = post('update');
		$this->db->query("UPDATE transaction SET $field='$update' WHERE TOKEN='$id' ");
		echo "Success";
	}

	public function hapus_pesanan()
	{
		$id = post('id');
		$this->db->query("DELETE FROM transaction_detail WHERE id='$id' ");
		echo "Berhasil dihapus";
	}

	public function checkout()
	{
		$token = session('checkout');
		$this->session->set_userdata('checkout', '1');
		return redirect('apps/order?status=diproses');
	}
}
