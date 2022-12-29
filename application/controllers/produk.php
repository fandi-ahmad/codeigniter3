<?php
class Produk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
	}

	function index(){
		$produks = $this->produk_model->select();
		// $data['produks'] = $this->produk_model->select();
		$data['produks'] = null;
		foreach ($produks as $prd) {
			$prd['url'] = anchor('produk/edit/'.$prd['id'],'EDIT','class="btn btn-sm btn-warning"').
						anchor('produk/hapus/'.$prd['id'],'HAPUS','class="btn btn-sm btn-danger ms-2"');
			$data['produks'][]=$prd;
		}
		$this->load->view('produk',$data);
	}

	function edit($id){
		$key['id']=$id;
		$produk = $this->produk_model->select($key);
		$produks = $this->produk_model->select();

		$data['produk'] = $produk[0];

		$data['produks'] = null;
		foreach ($produks as $prd) {
			$prd['url'] = anchor('produk/edit/'. $prd['id'], 'EDIT', 'class="btn btn-sm btn-warning"').
						anchor('produk/hapus/'. $prd['id'], 'HAPUS', 'class="btn btn-sm btn-danger ms-2"');
			$data['produks'][]=$prd;
		}
		$this->load->view('produk', $data);
	}

	function simpan(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('namaproduk', "NAMA PRODUK", 'required');
		$this->form_validation->set_rules('barcode', "BARCODE", 'required|numeric');

		$data['namaproduk'] = $this->input->post('namaproduk');
		$data['barcode'] = $this->input->post('barcode');
		if($this -> form_validation -> run()) {
			$data['namaproduk'] = $this -> input -> post ('namaproduk');
			$data['barcode'] = $this -> input -> post ('barcode');
			if ($this->input->post('update')) {
				$key['id'] = $this->input->post('id');
				$this->produk_model->update($key, $data);
			} else {
				$this->produk_model->insert($data);
				return redirect('produk');
			}
		}
		$this->index();
	}

	function hapus($id) {
		$this->produk_model->delete($id);
		$this->index();
	}
}