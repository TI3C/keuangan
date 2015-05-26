<?php
	//berlaku untuk admin maupun user//
	class pembiayaan_gajis extends CI_Controller
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
		
		function inputgaji_a() //untuk input data gaji
		{
			$data['errors']='';
			if($_POST)
			{
				$config=array(
					array(
						'field'=>'id_Pegawai',
						'label'=>'id_Pegawai',
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
					$data_gaji=$_POST['id_Pegawai']; //sama dengan ntr yang ada di input pembiayaan divisi a
					
					$this->load->model('pembiayaan_gaji');
					$userid=$this->pembiayaan_gaji->ambil_id_pegawai($data_gaji);
					if(!$userid){
						$data['errors'] = '
						<div style="background:red;">
						<p>ID Tidak ada.</p>
						</div>';
					}else{
						redirect(base_url().'pembiayaan_gajis/inputgaji_b/'.$_POST['id_Pegawai']);
					}
				}
			}
			$this->load->helper('form');
			$this->load->view('menu_admin');
			$this->load->view('input_pembiayaan_gaji_a',$data);
			$this->load->view('footer');
		}

		function inputgaji_b($id_Pegawai) //untuk input data penjualan
		{
			$data['errors']='';
			if($_POST)
			{
				$config=array(
					array(
						'field'=>'id_Pegawai',
						'label'=>'id_Pegawai',
						'rules'=>'required'
					),
					array(
						'field'=>'Periode',
						'label'=>'Periode',
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
					$data_gaji=array(
					'id_Pegawai'		=>$_POST['id_Pegawai'],
					'Periode'=>$_POST['Periode'],	
					'Tanggal'=>$_POST['Tahun']."-".$_POST['Bulan']."-".$_POST['Tanggal'],
					'Nominal'=>$_POST['Nominal']
					);
					
					$this->load->model('pembiayaan_gaji');
					$userid=$this->pembiayaan_gaji->inputgaji($data_gaji);
					redirect(base_url().'pembiayaan_gajis/inputgaji_a');
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
					$data['id_Pegawai'] = $id_Pegawai; //sama dengan yang ada di input pembiayaan divisi b
			$this->load->view('menu_admin');
			$this->load->view('input_pembiayaan_gaji_b',$data);
			$this->load->view('footer');
		}
		
		function datagaji() //untuk tampil data gaji //BERES
		{
			$this->load->view('menu_admin');
			$this->load->model('pembiayaan_gaji');
			$this->load->helper('form');
			$data['pembiayaan_gaji']=$this->pembiayaan_gaji->ambil_data();
			if($_POST){
				$data['pembiayaan_gaji'] = $this->pembiayaan_gaji->cariperiode($_POST['awal'],$_POST['akhir']);
			}
			$this->load->view('table_data_pembiayaan_gaji',$data);
			$this->load->view('footer');
		}
		
		function editgaji($id_Gaji)
		{
			$this->cek();
			$data['success']=0;
			if($_POST)
			{
				$data=array(
					'id_Gaji'=>$_POST['id_Gaji'],
					'id_Pegawai'=>$_POST['id_Pegawai'],
					'Periode'=>$_POST['Periode'],
					'Tanggal'=>$_POST['Tahun']."-".$_POST['Bulan']."-".$_POST['Tanggal'],
					'Nominal'=>$_POST['Nominal']
				);
				$this->load->model('pembiayaan_gaji');
				$this->pembiayaan_gaji->update($id_Gaji,$data);
				$data['success']=1;
				redirect(base_url().'pembiayaan_gajis/datagaji/');
			}
			$this->load->model('pembiayaan_gaji');
			$data['terserah']=$this->pembiayaan_gaji->ambil_id($id_Gaji);
			$this->load->helper('form');
			$this->load->view('menu_admin');
			$this->load->view('edit_pembiayaan_gaji',$data);
			$this->load->view('footer');
		}
		
		function hapusgaji($id_Gaji)
		{
			$this->cek();
			$this->load->model('pembiayaan_gaji');
			$this->pembiayaan_gaji->hapus($id_Gaji);
			redirect(base_url().'pembiayaan_gajis/datagaji');
		}
	}
?>