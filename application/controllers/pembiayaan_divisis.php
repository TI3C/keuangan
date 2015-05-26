<?php
	//berlaku untuk admin maupun user//
	class pembiayaan_divisis extends CI_Controller
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
		
		function inputpembiayaan_a() //untuk input data penjualan
		{
			$data['errors']='';
			if($_POST)
			{
				$config=array(
					array(
						'field'=>'id_Kepentingan',
						'label'=>'id_Kepentingan',
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
					$data_pembiayaan=$_POST['id_Kepentingan']; //sama dengan ntr yang ada di input pembiayaan divisi a
					
					$this->load->model('pembiayaan_divisi');
					$userid=$this->pembiayaan_divisi->ambil_id_Pembiayaan($data_pembiayaan);
					if(!$userid){
						$data['errors'] = '
						<div style="background:red;">
						<p>ID Tidak ada.</p>
						</div>';
					}else{
						redirect(base_url().'pembiayaan_divisis/inputpembiayaan_b/'.$_POST['id_Kepentingan']);
					}
				}
			}
			$this->load->helper('form');
			$this->load->view('menu_admin');
			$this->load->view('input_pembiayaan_divisi_a',$data);
			$this->load->view('footer');
		}

		function inputpembiayaan_b($id_Kepentingan) //untuk input data penjualan
		{
			$data['errors']='';
			if($_POST)
			{
				$config=array(
					array(
						'field'=>'Divisi',
						'label'=>'Divisi',
						'rules'=>'required'
					),
					array(
						'field'=>'Nominal',
						'label'=>'Nominal',
						'rules'=>'required'
					),
					array(
						'field'=>'id_Kepentingan',
						'label'=>'id_Kepentingan',
						'rules'=>'required'
					),
					array(
						'field'=>'Keterangan',
						'label'=>'Keterangan',
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
					$data_pembiayaan=array(
					'id_Kepentingan'		=>$_POST['id_Kepentingan'],
					'Divisi'=>$_POST['Divisi'],	
					'Nominal'=>$_POST['Nominal'],
					'Keterangan'=>$_POST['Keterangan']
					);
					
					$this->load->model('pembiayaan_divisi');
					$userid=$this->pembiayaan_divisi->inputpembiayaan($data_pembiayaan);
					redirect(base_url().'pembiayaan_divisis/inputpembiayaan_a');
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
					$data['id_Kepentingan'] = $id_Kepentingan; //sama dengan yang ada di input pembiayaan divisi b
			$this->load->view('menu_admin');
			$this->load->view('input_pembiayaan_divisi_b',$data);
			$this->load->view('footer');
		}
		
		function datapembiayaan() //untuk tampil data hutang //BERES
		{
			$this->load->view('menu_admin');
			$this->load->model('pembiayaan_divisi');
			$this->load->helper('form');
			$data['pembiayaan_divisi']=$this->pembiayaan_divisi->ambil_data();
			if($_POST){
				$data['pembiayaan_divisi'] = $this->pembiayaan_divisi->caritgl($_POST['tgl-awal'],$_POST['tgl-akhir']);
			}
			$this->load->view('table_data_pembiayaan_divisi',$data);
			$this->load->view('footer');
		}
		
		function editpembiayaan($id_Pembiayaan)
		{
			$this->cek();
			$data['success']=0;
			if($_POST)
			{
				$data=array(
					'Divisi'=>$_POST['Divisi'],
					'Nominal'=>$_POST['Nominal'],
					'id_Kepentingan'=>$_POST['id_Kepentingan'],
					'Keterangan'=>$_POST['Keterangan'],
				);
				$this->load->model('pembiayaan_divisi');
				$this->pembiayaan_divisi->update($id_Pembiayaan,$data);
				$data['success']=1;
				redirect(base_url().'pembiayaan_divisis/datapembiayaan/');
			}
			$this->load->model('pembiayaan_divisi');
			$data['terserah']=$this->pembiayaan_divisi->ambil_id($id_Pembiayaan);
			$this->load->helper('form');
			$this->load->view('menu_admin');
			$this->load->view('edit_pembiayaan_divisi',$data);
			$this->load->view('footer');
		}
		
		function hapuspembiayaan($id_Pembiayaan)
		{
			$this->cek();
			$this->load->model('pembiayaan_divisi');
			$this->pembiayaan_divisi->hapus($id_Pembiayaan);
			redirect(base_url().'pembiayaan_divisis/datapembiayaan');
		}
	}
?>