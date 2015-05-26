<?php
	//berlaku untuk admin maupun user//
	class pembiayaan_divisi extends CI_Model
	{
		function caritgl($start, $end){
			$query = $this->db->query("select * from pembiayaan_divisi where Tanggal between '".$start."' and '".$end."'");
			return $query->result_array();
		}
		function inputpembiayaan($data) //memasukkan data ke dalam database
		{
			$this->db->insert('pembiayaan_divisi',$data);
		}
		
		function ambil_data() //ambil data dari tabel pembiayaan_divisi
		{
			$this->db->select()->from('pembiayaan_divisi');
			$query=$this->db->get();
			return $query->result_array();
		}
		
		function ambil_id($id_Pembiayaan)
		{
			$this->db->select()->from('pembiayaan_divisi')->where(array('id_Pembiayaan'=>$id_Pembiayaan))->order_by('id_Pembiayaan','asc');
			$query=$this->db->get();
			return $query->first_row('array');
		}
		
		function update($id_Pembiayaan,$data)
		{
			$this->db->where('id_Pembiayaan',$id_Pembiayaan);
			$this->db->update('pembiayaan_divisi',$data);
		}
		
		function hapus($id_Pembiayaan)
		{
			$this->db->where('id_Pembiayaan',$id_Pembiayaan);
			$this->db->delete('pembiayaan_divisi');
		}

		function ambil_id_pembiayaan($id_Kepentingan)
		{
			$this->db->select()->from('kepentingan')->where(array('id_Kepentingan'=>$id_Kepentingan))->order_by('id_Kepentingan','asc');
			$query=$this->db->get();
			return $query->first_row('array');
		}
	}
?>