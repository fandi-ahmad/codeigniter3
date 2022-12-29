<?php
class Pembelian extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this -> load -> model('produk_model');
		$this -> load -> model('pembelian_model');
	}

	function index(){
		$key['status'] = 'y';
        $pembelian = $this -> pembelian_model -> select($key);
        if(count($pembelian) == 0) {
            unset($pembelian);
            $pembelian['tanggal'] = date('Y-m-d');
            $pembelian['status'] = 'y';
            $this -> pembelian_model -> insert ($pembelian);
        }
        $pembelian = $this -> pembelian_model -> select($key)[0];
        $key_detil['idpembelian'] = $pembelian ['idpembelian'];
        $data['detils'] = $this -> pembelian_model -> select_detil($key_detil);
        $data['produks'] = $this -> produk_model -> select();
        $data['pembelian'] = $pembelian;
        $this -> load -> view('transaksi', $data);
	}

	function simpan(){
		$detil['idpembelian'] = $this -> input -> post('idpembelian');
		$detil['idproduk'] = $this -> input -> post('idproduk');
		$detil['jumlah'] = $this -> input -> post('jumlah');
        $this -> pembelian_model -> insert_detil($detil);
        redirect(site_url('pembelian'));
	}

	function hapus($id) {
        $this -> pembelian_model -> delete_detil($id);
        redirect(site_url('pembelian'));
	}
}