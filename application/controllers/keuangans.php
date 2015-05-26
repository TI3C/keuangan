<?php
	//berlaku untuk admin maupun user//
	class Keuangans extends CI_Controller
	{
		function cek(){
			if(!$this->session->userdata('id_karyawan')){
				redirect(base_url());
			}
		}
		function index()
		{
			$data['error']=0;
			if($_POST)
			{
				$this->load->model('keuangan');
				$username=$this->input->post('username',true);
				$password=$this->input->post('password',true);
				
				$user=$this->keuangan->login($username,$password);

				if(!$user)
				{
					echo "asdf";
					$data['error']=1;
				}
				else
				{
					echo "asdf";
					$this->session->set_userdata('id_karyawan',$user['id_Karyawan']);
					redirect(base_url());
				}
			}
			if(!$this->session->userdata('id_karyawan')) //untuk login 
			{
				$this->load->view('header');
				$this->load->view('login',$data);
			}
			else{
				$this->load->view('menu_admin',$data);
				$this->load->view('gambar_home');
			}
			$this->load->view('footer');
		}
		function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}
		function inputhutang() //untuk input data hutang
		{
			$data['errors']='';
			if($_POST)
			{
				$config=array(
					array(
						'field'=>'Tahun','Bulan','Tanggal',
						'label'=>'Tanggal',
						'rules'=>'required'
					),
					array(
						'field'=>'Nominal',
						'label'=>'Nominal',
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
				if(strtolower($this->session->userdata('captcha')) != strtolower($_POST['captcha']))
				{
					echo"<p><center>Kode Captcha yang Anda masukkan salah! Kamu mengetikkan < ".$_POST['captcha']." > seharusnya kode itu ".
					$this->session->userdata('captcha')."</center></p>";	
				} 
				else {
					$data_hutang=array(
					'Tanggal'=>$_POST['Tahun']."-".$_POST['Bulan']."-".$_POST['Tanggal'],
					'Nominal'=>$_POST['Nominal'],
					'Keterangan'=>$_POST['Keterangan'],
					);
					
					$this->load->model('keuangan');
					$userid=$this->keuangan->inputhutang($data_hutang);
					redirect(base_url().'keuangans/inputhutang');
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
			$this->load->view('menu_admin');
			$this->load->view('input_hutang',$data);
			$this->load->view('footer');
		}
		
		function datahutang() //untuk tampil data hutang //BERES
		{
			$this->load->view('menu_admin');
			$this->load->model('keuangan');
			$this->load->helper('form');
			$data['keuangan']=$this->keuangan->ambil_data();
			if($_POST){
				$data['keuangan'] = $this->keuangan->caritgl($_POST['tgl-awal'],$_POST['tgl-akhir']);
			}
			$this->load->view('table_data_hutang',$data);
			$this->load->view('footer');
		}
		
		function edithutang($id_hutang)
		{
			$this->cek();
			$data['success']=0;
			if($_POST)
			{
				$data=array(
					'Tanggal'=>$_POST['Tahun']."-".$_POST['Bulan']."-".$_POST['Tanggal'],
					'Nominal'=>$_POST['Nominal'],
					'Keterangan'=>$_POST['Keterangan'],
				);
				$this->load->model('keuangan');
				$this->keuangan->update($id_hutang,$data);
				$data['success']=1;
				redirect(base_url().'keuangans/datahutang/');
			}
			$this->load->model('keuangan');
			$data['terserah']=$this->keuangan->ambil_id($id_hutang);
			$this->load->helper('form');
			$this->load->view('menu_admin');
			$this->load->view('edit_hutang',$data);
			$this->load->view('footer');
		}
		
		function hapushutang($id_Hutang)
		{
			$this->cek();
			$this->load->model('keuangan');
			$this->keuangan->hapus($id_Hutang);
			redirect(base_url().'keuangans/datahutang');
		}
	}
?>