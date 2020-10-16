<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') OR exit('No direct script access allowed');

class Pir extends CI_Controller {
	// session
    public function __construct(){
        parent::__construct();
		$this->load->model('model_system');
	}

	// template
	public function admin(){
		$this->load->view('template/admin');
	}

	//particial template
	public function patem(){
		$this->load->view('template/dadmin');
	}

	public function start(){
		$this->load->view('template/startpg');
	}

	
	//admin
	public function dashboardadmin(){
		$this->load->view('dashboardadmin');
	}

	//petugas
	public function dashboarduser(){
		$this->load->view('dashboarduser');
	}


	// public function form(){
	// 	if ($this->session->userdata('status') == 'login') {
	// 		$this->load->view('form');
	// 	   } else if ($this->session->userdata('status') != 'login') {
	// 		redirect('pir/login');
	// 	   }
		
	//  }

	

	 public function regist(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $telp = $this->input->post('telp');

        $checkuser = $this->db->query("SELECT COUNT(id) as total FROM masyarakat WHERE username = '$username' LIMIT 1")->result_array();

        if($checkuser[0]['total'] <= 1){
            $data = array(
                "nama" => $nama,
                "username" => $username,
                "telp" => $telp,               
                "password" => $password,               
            );
            $insertUser = $this->db->insert('masyarakat', $data);
            if($insertUser) {
                echo "<script>alert('Registrasi Berhasil Silahkan Login!');</script>";
            redirect('/pir/regist', 'refresh');
        }else{
                echo "<script>alert('Registrasi Gagal!');</script>";
            redirect('/pir/regist', 'refresh');
        }
        }else{
            echo "<script>alert('Username Sudah Digunakan!');</script>";
            redirect('/pir/regist', 'refresh');
        }
    }
	
	 public function tanggap(){
		$data = $this->db->query("SELECT * FROM masyarakat ORDER BY id Desc")->result_array();
		$datapeng = $this->db->query("SELECT * FROM pengaduan ORDER BY id_pengaduan Desc")->result_array();
		$datapetugas = $this->db->query("SELECT * FROM petugas ORDER BY id Desc")->result_array();
		$senddata = array(
			"masyarakat" => $data,
			"pengaduan" => $datapeng,
			"petugas" => $datapetugas

		);
		$this->load->view('tanggap', $senddata, false);
	}

	public function tanggapanuser(){
		$data = $this->db->query("SELECT * FROM masyarakat ORDER BY id Desc")->result_array();
		$datapeng = $this->db->query("SELECT * FROM pengaduan ORDER BY id_pengaduan Desc")->result_array();
		$datapetugas = $this->db->query("SELECT * FROM petugas ORDER BY id Desc")->result_array();
		$senddata = array(
			"masyarakat" => $data,
			"pengaduan" => $datapeng,
			"petugas" => $datapetugas

		);
		$this->load->view('tanggapanuser', $senddata, false);
	}


	
	public function datamasyarakat(){
		$data = $this->db->query("SELECT * FROM masyarakat ORDER BY id Desc")->result_array();
		$datapetugas = $this->db->query("SELECT * FROM petugas ORDER BY id Desc")->result_array();
		$senddata = array(
			"masyarakat" => $data,
			"petugas" => $datapetugas

		);
		$this->load->view('datauser', $senddata, false);
    }
	
	public function index()
	{
		$this->load->view('template/startpg');
	}

	public function form()
	{
		$this->load->view('form');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function regist2()
	{
		$data = $this->db->query("SELECT * FROM masyarakat ORDER BY id Desc")->result_array();
		$senddata = array(
			"masyarakat" => $data,
		);
		$this->load->view('regist', $senddata, false);
	}

	public function edit($id){
			$where = array('id' => $id);
			$data['masyarakat'] = $this->model_system->edit_data($where,'masyarakat')->result();
			$this->load->view('v_regist',$data);
	}

	public function editpetugas($id){
		$where = array('id' => $id);
		$data['petugas'] = $this->model_system->edit($where,'petugas')->result();
		$this->load->view('petugas',$data);
}

	

	public function update(){
		$id = $this->input->post('ids');
		$name = $this->input->post('namas');
		$username = $this->input->post('usernames');
		$password = $this->input->post('passwords');
		$telp = $this->input->post('telps');

		$data = array(
			'id' => $id,
			'nama' => $name,
			'username' => $username,
			'password' => $password,
			'telp' => $telp
	
		);
		$this->model_system->update_data($id,$data);
		redirect('Pir/datamasyarakat');
	}

	public function update_petugas(){
		$id = $this->input->post('idss');
		$name = $this->input->post('namass');
		$username = $this->input->post('usernamess');
		$password = $this->input->post('passwordss');
		$level = $this->input->post('levelss');

		$data = array(
			'id' => $id,
			'nama' => $name,
			'username' => $username,
			'password' => $password,
			'level' => $level
	
		);
		$this->model_system->update_datapetugas($id,$data);
		redirect('Pir/tanggap');
	}
	public function simpan_data()
	{
		$this->model_system->simpan_db();
	  $this->load->view('login');
	}
	
	public function simpan_aduan()
	{
		$this->model_system->buat_aduan();
		redirect('Pir/form');
	}

	function hapus($id){
		$where = array('id' => $id);
		$this->model_system->hapus_data($where,'masyarakat');
		redirect('pir/datamasyarakat');
	}

	function hapus_petugas($id){
		$where = array('id' => $id);
		$this->model_system->hapus($where,'petugas');
		redirect('pir/tanggap');
	}

	function hapus_adu($id_pengaduan){
		$where = array('id_pengaduan' => $id_pengaduan);
		$this->model_system->hapus_datapengaduan($where,'pengaduan');
		redirect('pir/tanggap');
	}

	
	public function yulogin(){
		$user = $this->input->post('usernamess');
		$pass = $this->input->post('passwordss');
		$login = array(
			'username' => $user,
			'password' => $pass,

		);
		$cekdl = $this->model_system->cek_login('masyarakat',$login)->num_rows();

		if($cekdl > 0 ){
			$data_session = array(
				'username' => $user,
				'status' =>'login'
			);

			$this->session->set_userdata($data_session);

			if($this->session->userdata('status')=='login'){
				header("Location:".base_url().'pir/form');
			}else{
				echo "asdfghjkl";
			}


		}else{
			echo "Wrong username and password, please check again";
		}
	}
	
	public function cetak()
	{
		$this->load->model('model_system');
		$data['masyarakat'] = $this->model_system->getData();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data-masyarakat.pdf";
		$this->pdf->load_view('preview_pdf', $data);
	}


	public function cetakadu()
	{
		$this->load->model('model_system');
		$data['pengaduan'] = $this->model_system->get_adu();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data-pengaduan.pdf";
		$this->pdf->load_view('pdfadu', $data);
	}

	public function cetakpetugas()
	{
		$this->load->model('model_system');
		$data['petugas'] = $this->model_system->get_petugas();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data-petugas.pdf";
		$this->pdf->load_view('pdfpetugas', $data);
	}

	


	public function cetak_excel()
	{
		
		$data = $this->model_system->get_masyarakat();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		
        $sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Nama');
		$sheet->setCellValue('C1', 'Usename');
	    $sheet->setCellValue('D1', 'Telpon');




		$rexcel = 2;
		
        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rexcel, $row->id);
            $sheet->setCellValue('B' . $rexcel, $row->nama);
			$sheet->setCellValue('C' . $rexcel, $row->username);
			$sheet->setCellValue('D' . $rexcel, $row->telp);
            $rexcel++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-excel';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
	}

	//excel petugas
	public function cetak_exc()
	{
		
		$data = $this->model_system->get_petugas();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		
        $sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Nama');
		$sheet->setCellValue('C1', 'Username');
	    $sheet->setCellValue('D1', 'Level');




		$rexcel = 2;
		
        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rexcel, $row->id);
            $sheet->setCellValue('B' . $rexcel, $row->nama);
			$sheet->setCellValue('C' . $rexcel, $row->username);
			$sheet->setCellValue('D' . $rexcel, $row->level);
            $rexcel++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-excelpetugas';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
	}

	//excel pengaduan
	public function cetak_exce()
	{
		
		$data = $this->model_system->get_adu();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		
        $sheet->setCellValue('A1', 'ID Pengaduan');
		$sheet->setCellValue('B1', 'Tanggal Pengaduan');
		$sheet->setCellValue('C1', 'Nama');
		$sheet->setCellValue('D1', 'Aduan');
		$sheet->setCellValue('E1', 'Status');
		





		$rexcel = 2;
		
        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rexcel, $row->id_pengaduan);
            $sheet->setCellValue('B' . $rexcel, $row->tgl_pengaduan);
			$sheet->setCellValue('C' . $rexcel, $row->nama);
			$sheet->setCellValue('D' . $rexcel, $row->aduan);
			$sheet->setCellValue('E' . $rexcel, $row->status);
            $rexcel++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-excelpengaduan';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
	}


	function auth()
 {
  $username = $this->input->post('username');
  $password = $this->input->post('password');

  $cek_admin=$this->model_system->auth_admin($username, $password);
  if($cek_admin->num_rows() > 0){
   $data=$cek_admin->row_array();
   $this->session->set_userdata('masuk',TRUE);
    if($data['level']=='1'){
     $this->session->set_userdata('akses','1');
     $this->session->set_userdata('ses_username',$data['username']);
                    $this->session->set_userdata('ses_password',$data['password']);
                    redirect('pir/dashboardadmin');
    }else{ 
                    $this->session->set_userdata('akses','2');
                    $this->session->set_userdata('ses_username',$data['username']);
                    $this->session->set_userdata('ses_password',$data['password']);
                    redirect('pir/dashboarduser');
                 }
  }else{ 
   $cek_masyarakat=$this->model_system->auth_masyarakat($username,$password);
   if($cek_masyarakat->num_rows() > 0){
     $data=$cek_masyarakat->row_array();
   $this->session->set_userdata('masuk',TRUE);
     $this->session->set_userdata('akses','3');
     $this->session->set_userdata('ses_id',$data['usernames']);
     $this->session->set_userdata('ses_nama',$data['passwords']);
     redirect('pir/dashboarduser');
   }else{  
     redirect('pir/login');
   }

  }

 }
 
  ////AJAX petugas

 public function ajax()
    {
        $this->load->view('ajax/ajaxpetugas');
    }

    public function tampilkanData()
    {
        $data = $this->model_system->getAllUser();
        echo json_encode($data);
    }

    public function simpanData()
    {
        $data = $this->model_system->inputData();
        echo json_encode($data);
    }

    public function updateDataajax()
    {
        $data = $this->model_system->updateDataajax();
        echo json_encode($data);
    }

   //ajax delete data petugas
   public function hapusDataajax()
     {
         $data = $this->model_system->hapusData();
         echo json_encode($data);
	 }

	 //reply
	 public function repl(){
		$data = array(
			'id_pengaduan'=>  $this->input->post('id'),
                'tgl_pengaduan' => $this->input->post('tgl_aduan'),
                'aduan' =>$this->input->post('aduan'),
                'tanggal_reply'=>$this->input->post('tgl_reply'),
                'reply'=>$this->input->post('reply'), 
	
		);
		$this->model_system->reply($data);
		$id_pengaduan = $this->input->post('id');
		
			$data = array(
				'status' => 'selesai',
			);
		
			$this->model_system->updet($id_pengaduan,$data);
			redirect('pir/tanggap');

		redirect('Pir/tanggap');
	}

	public function reply($id_pengaduan){
		$where = array('id_pengaduan' => $id_pengaduan);
		$data['c_pengaduan'] = $this->model_system->count_adu();
		$data['penaduan'] = $this->model_system->get_adu();
		$data['pengaduan'] = $this->model_system->get_datarep($where,'pengaduan')->result();
		$this->load->view('reply' , $data);
	}
	
	


}

