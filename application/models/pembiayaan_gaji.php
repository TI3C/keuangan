<?php
	//berlaku untuk admin maupun user//
	class pembiayaan_gaji extends CI_Model
	{
		function cariperiode($start, $end){
			$query = $this->db->query("select * from pembiayaan_gaji where Periode between '".$start."' and '".$end."'");
			return $query->result_array();
		}
		function inputgaji($data) //memasukkan data ke dalam database
		{
			$this->db->insert('pembiayaan_gaji',$data);
		}
		
		function ambil_data() //ambil data dari tabel pembiayaan_gaji
		{
			$this->db->select()->from('pembiayaan_gaji');
			$query=$this->db->get();
			return $query->result_array();
		}
		
		function ambil_id($id_Gaji)
		{
			$this->db->select()->from('pembiayaan_gaji')->where(array('id_Gaji'=>$id_Gaji))->order_by('id_Gaji','asc');
			$query=$this->db->get();
			return $query->first_row('array');
		}
		
		function update($id_Gaji,$data)
		{
			$this->db->where('id_Gaji',$id_Gaji);
			$this->db->update('pembiayaan_gaji',$data);
		}
		
		function hapus($id_Gaji)
		{
			$this->db->where('id_Gaji',$id_Gaji);
			$this->db->delete('pembiayaan_gaji');
		}

		function ambil_id_pegawai($id_Pegawai)
		{
			$this->db->select()->from('pegawai')->where(array('id_Pegawai'=>$id_Pegawai))->order_by('id_Pegawai','asc');
			$query=$this->db->get();
			return $query->first_row('array');
		}
	}
?>