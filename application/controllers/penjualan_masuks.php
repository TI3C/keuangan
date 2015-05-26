<?php
	class penjualan_masuks extends CI_Controller
	{
		function cek()
		{
			if(!$this->session->userdata('id_karyawan'))
			{
				redirect(base_url());
			}
		}
		
		function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}
		
		function inputpenjualan_a() //untuk input data penjualan
		{
			$data['errors']='';
			if($_POST)
			{
				$config=array(
					array(
						'field'=>'id_Penjualan',
						'label'=>'Tanggal',
						'rules'=>'required'
					)
				);
				
				$this->load->library('form_validation');
				$this->form_validation->set_rules($config);
				if($this->form_validation->run() == FALSE)
				{
					$data['errors']=validation_errors();
				}
				else {
					$data_penjualan=$_POST['id_Penjualan'];
					
					$this->load->model('penjualan');
					$userid=$this->penjualan->ambil_id_penjualan($data_penjualan);
					if(!$userid){
						$data['errors'] = '
						<div style="background:red;">
						<p>ID Tidak ada.</p>
						</div>';
					}else{
						redirect(base_url().'penjualan_masuks/inputpenjualan_b/'.$_POST['id_Penjualan']);
					}
				}
			}
			$this->load->helper('form');
			$this->load->view('menu_admin');
			$this->load->view('input_penjualan_masuk_a',$data);
			$this->load->view('footer');
		}

		function inputpenjualan_b($id_Penjualan) //untuk input data penjualan
		{
			$data['errors']='';
			if($_POST)
			{
				$config=array(
					array(
						'field'=>'id_Penjualan',
						'label'=>'Tanggal',
						'rules'=>'required'
					),
					array(
						'field'=>'Tahun','Bulan','Tanggal',
						'label'=>'Tanggal',
						'rules'=>'required'
					),
					array(
						'field'=>'Nominal',
						'label'=>'Nominal',
						'rules'=>'required'
					)
				);
				
				$this->load->library('form_validation');
				$this->form_validation->set_rules($config);
				if($this->form_validation->run() == FALSE)
				{
					$data['errors']=validation_errors();
				}
				else if(strtolower($this->session->userdata('captcha')) != strtolower($_POST['captcha']))
				{
					echo"<p><center>Kode Captcha yang Anda masukkan salah! Kamu mengetikkan < ".$_POST['captcha']." > seharusnya kode itu ".
					$this->session->userdata('captcha')."</center></p>";	
				} 
				else {
					$data_penjualan=array(
					'id_Penjualan'		=>$_POST['id_Penjualan'],
					'Tanggal_Penjualan_Masuk'	=>$_POST['Tahun']."-".$_POST['Bulan']."-".$_POST['Tanggal'],
					'Nominal'=>$_POST['Nominal'],	
					);
					
					$this->load->model('penjualan');
					$userid=$this->penjualan->inputpenjualan($data_penjualan);
					redirect(base_url().'penjualan_masuks/inputpenjualan_a');
				}
			}
			$this->load->helper('form');
			$this->load->helper('captcha');
					$vals=array(
						'img_path'=>'./captcha/',
						'img_url'=>base_url().'captcha/',
						'img_width'=>150,
						'img_height'=>30
					);
					$cap = create_captcha($vals);
					$this->session->set_userdata('captcha',$cap['word']);
					$data['captcha']=$cap['image'];
					$data['id_Penjualan'] = $id_Penjualan;
			$this->load->view('menu_admin');
			$this->load->view('input_penjualan_masuk_b',$data);
			$this->load->view('footer');
		}
		
		function datapenjualan() //untuk tampil data hutang //BERES
		{
			$this->load->view('menu_admin');
			$this->load->model('penjualan');
			$this->load->helper('form');
			$data['penjualan']=$this->penjualan->ambil_data();
			if($_POST){
				$data['penjualan'] = $this->penjualan->caritgl($_POST['tgl-awal'],$_POST['tgl-akhir']);
			}
			$this->load->view('table_data_penjualan_masuk',$data);
			$this->load->view('footer');
		}
		
		function editpenjualan($id_Penjualan_Masuk)
		{
			$this->cek();
			$data['success']=0;
			if($_POST)
			{
				$data=array(
					'Tanggal_Penjualan_Masuk'=>$_POST['Tahun']."-".$_POST['Bulan']."-".$_POST['Tanggal'],
					'Nominal'=>$_POST['Nominal']
				);
				$this->load->model('penjualan');
				$this->penjualan->update($id_Penjualan_Masuk,$data);
				$data['success']=1;
				redirect(base_url().'penjualan_masuks/datapenjualan/');
			}
			$this->load->model('penjualan');
			$data['terserah']=$this->penjualan->ambil_id($id_Penjualan_Masuk);
			$this->load->helper('form');
			$this->load->view('menu_admin');
			$this->load->view('edit_penjualan_masuk',$data);
			$this->load->view('footer');
		}
		
		function hapuspenjualan($id_Penjualan_Masuk)
		{
			$this->cek();
			$this->load->model('penjualan');
			$this->penjualan->hapus($id_Penjualan_Masuk);
			redirect(base_url().'penjualan_masuks/datapenjualan');
		}
	}
?>