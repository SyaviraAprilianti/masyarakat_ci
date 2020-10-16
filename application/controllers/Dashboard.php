<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    // session
   
    public function isii(){
        $data = $this->db->query("SELECT * FROM masyarakat ORDER BY id Desc")->result_array();
		$senddata = array(
		"masyarakat" => $data,
		);
		$this->load->view('login', $senddata, false);
    }

	 public function tanggapan(){
        $data = $this->db->query("SELECT * FROM masyarakat ORDER BY id Desc")->result_array();
		$senddata = array(
			"masyarakat" => $data,
		);
		$this->load->view('tanggap', $senddata, false);
     }

     public function form(){
        // $data = $this->db->query("SELECT * FROM masyarakat ORDER BY id Desc")->result_array();
		$senddata = array(
			// "masyarakat" => $data,
		);
		$this->load->view('form', $senddata, false);
     }
}
