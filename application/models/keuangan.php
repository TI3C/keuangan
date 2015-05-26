<?php
	//berlaku untuk admin maupun user//
	class Keuangan extends CI_Model
	{
		function caritgl($start, $end){
			$query = $this->db->query("select * from hutang where Tanggal between '".$start."' and '".$end."'");
			return $query->result_array();
		}
		function inputhutang($data) //memasukkan data ke dalam database
		{
			$this->db->insert('hutang',$data);
		}
		
		function login($username,$password) //ambil data untuk pencocokan data dengan database
		{
			$where=array
			(
				'username'=>$username,
				'password'=>$password
			);
			$this->db->select()->from('karyawan')->where($where);
			$query=$this->db->get();
			return $query->first_row('array');
		}
		
		function ambil_data() //ambil data dari tabel hutang
		{
			$this->db->select()->from('hutang');
			$query=$this->db->get();
			return $query->result_array();
		}
		
		function ambil_id($id_Hutang)
		{
			$this->db->select()->from('hutang')->where(array('id_Hutang'=>$id_Hutang))->order_by('id_Hutang','asc');
			$query=$this->db->get();
			return $query->first_row('array');
		}
		
		function update($id_Hutang,$data)
		{
			$this->db->where('id_Hutang',$id_Hutang);
			$this->db->update('hutang',$data);
		}
		
		function hapus($id_Hutang)
		{
			$this->db->where('id_Hutang',$id_Hutang);
			$this->db->delete('hutang');
		}
	}
?>