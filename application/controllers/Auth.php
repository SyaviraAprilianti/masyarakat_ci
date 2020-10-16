<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	// public function login()
	// {
	// 	$username = $this->input->post('username');
    //     $password = md5($this->input->post('password'));
        
    //     $query = $this->db->query("SELECT * FROM masyarakat WHERE username = '$username' AND password='$password' LIMIT 1")->result_array();

    //     if(!empty($query)){
    //         $session = array(
    //             "id" => $query[0]['id'],
    //             "nama" => $query[0]['nama'],
    //             "username" => $query[0]['username'],
    //             "telp" => $query[0]['telp'],
    //             "login" => true
    //         );
    //         $this->session->set_userdata($session);
    //         redirect('dashboard', 'refresh');
    //     }else{
    //         echo "<script>alert('Username Atau Password Salah!');</script>";
    //         redirect('/pir/login', 'refresh');
    //     }
    // }

    public function regist(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = ($this->input->post('password'));
        $telp = $this->input->post('telp');

        $checkuser = $this->db->query("SELECT COUNT(id) as total FROM masyarakat WHERE username = '$username' LIMIT 1")->result_array();

        if($checkuser[0]['total'] <= 1){
            $data = array(
                "nama" => $nama,
                "username" => $username,
                "password" => $password,   
                "telp" => $telp,          
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

    public function logout(){
        $this->session->sess_destroy();
        redirect('', 'refresh');
    }
}