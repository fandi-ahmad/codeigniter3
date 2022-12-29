<?php
class Pembelian_model extends CI_Model{
	// public function __construct(){
	// 	$this -> table = 'pembelian';
	// 	$this -> id = 'idpembelian';
	// }

	// ====================================

	public function insert($data){
		$this->db->insert($this->table, $data);
	}

	public function insert_detil($data){
		$this -> db -> insert('detailpembelian', $data);
	}

	// public function delete_detil($id_produk) {
	public function delete_detil($iddetailpembelian) {
		$this->db->where('iddetailpembelian', $iddetailpembelian);
		$this->db->delete('detailpembelian');
	}

	public function select_detil($key=null){
		if($key != null){
			$this -> db -> where($key);
		}
		$this -> db -> join('produk', 'produk.id = detailpembelian.idproduk');
		return $this->db->get('detailpembelian')->result_array();
	}


	// =====================================


	public function select($key=null){
		if($key != null){
			$this->db->where($key);
		}
		return $this->db->get('pembelian')->result_array();
	}

	public function update($key, $data){
		$this->db->where($key);
		// $this->db->update($this -> table, $data);
		$this->db->update('pembelian', $data);
	}

	public function delete($id_produk) {
		$this->db->where('idpembelian', $id_produk);
		$this->db->delete('pembelian');
	}
}