<?php
	//berlaku untuk admin maupun user//
	class penjualan extends CI_Model
	{
		function caritgl($start, $end){
			$query = $this->db->query("select * from penjualan_masuk where Tanggal_Penjualan_Masuk between '".$start."' and '".$end."'");
			return $query->result_array();
		}
		function inputpenjualan($data) //memasukkan data ke dalam database
		{
			$this->db->insert('penjualan_masuk',$data);
		}
		
		function ambil_data() //ambil data dari tabel penjualan masuk
		{
			$this->db->select()->from('penjualan_masuk');
			$query=$this->db->get();
			return $query->result_array();
		}
		
		function ambil_id($id_Penjualan_Masuk) //ambil id penjualan masuk
		{
			$this->db->select()->from('penjualan_masuk')->where(array('id_Penjualan_Masuk'=>$id_Penjualan_Masuk))->order_by('id_Penjualan_Masuk','asc');
			$query=$this->db->get();
			return $query->first_row('array');
		}
		
		function update($id_Penjualan_Masuk,$data)
		{
			$this->db->where('id_Penjualan_Masuk',$id_Penjualan_Masuk);
			$this->db->update('penjualan_masuk',$data);
		}
		
		function hapus($id_Penjualan_Masuk)
		{
			$this->db->where('id_Penjualan_Masuk',$id_Penjualan_Masuk);
			$this->db->delete('penjualan_masuk');
		}

		function ambil_id_penjualan($id_Penjualan) //ambil id penjualan
		{
			$this->db->select()->from('penjualan')->where(array('id_Penjualan'=>$id_Penjualan))->order_by('id_Penjualan','asc');
			$query=$this->db->get();
			return $query->first_row('array');
		}
	}
?>