<?php 

    Class Model_system extends CI_Model{
        

        public function edit_data($where, $table)
        {
            return $this->db->get_where($table,$where);
        }

        public function edit($where, $table)
        {
            return $this->db->get_where($table,$where);
        }

        function update_data($id,$data)
        {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('masyarakat');
        }	

        function update_datapeng($id,$data)
        {
            $this->db->set($data);
            $this->db->where('id_pengaduan', $id);
            $this->db->update('pengaduan');
        }	

        function update_datapetugas($id,$data)
        {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('petugas');
        }	

        public function simpan_db()
        {
            $data= array(
                'id'=>"",
                'nama' => $this->input->post('nama'),
                'username' =>$this->input->post('username'),
                'password'=>$this->input->post('password'),
                'telp'=>$this->input->post('telp'), 
            );

            $this->db->insert('masyarakat', $data);
            header("location",base_url().'pir/yulogin');
        }

        // pdf
        function getData()
	    {
		    $data_masyarakat = $this->db->get('masyarakat');
		    return $data_masyarakat->result();
	    }

        function hapus_data($where,$table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function hapus_datapengaduan($where,$table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function hapus($where,$table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function cek_login($table, $login)
        {
            return $this->db->get_where($table, $login);
        }

        public function buat_aduan(){
            $foto = $_FILES['foto']['tmp_name'];

        if($foto == ""){
            echo "image kosong";
            die();
        }else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library("upload");
            $this->upload->initialize($config);
            if($this->upload->do_upload('foto')){
                $foto = $this->upload->data('file_name');
                $dataa = array(
                    'id_pengaduan'=>"",
                    'tgl_pengaduan'=>$this->input->post('tgl'),
                    'nama'=>$this->input->post('nama'),
                    'aduan'=>$this->input->post('aduan'),
                    'bukti'=> $foto
                );  
                $this->db->insert('pengaduan', $dataa);
            }else { 
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                die();
            }
        }
        }
        
        public function get_petugas(){
            $dataa = $this->db->get('petugas');
            return $dataa->result();
        }

        public function count_petugas(){
            $dataa = $this->db->get('masyarakat');
            return $dataa->num_rows();
        }

        public function get_adu(){
            $dataa = $this->db->get('pengaduan');
            return $dataa->result();
        }

        

        public function get_masyarakat(){
            $dataa = $this->db->get('masyarakat');
            return $dataa->result();
        }

        public function count_masyarakat(){
            $dataa = $this->db->get('masyarakat');
            return $dataa->num_rows();
        } 

        public function count_adu(){
            $dataa = $this->db->get('pengaduan');
            return $dataa->num_rows();
        } 


        function auth_masyarakat($username, $password)
        {
            $query=$this->db->query("SELECT * FROM masyarakat WHERE username='$username' AND password='$password' LIMIT 1");
            return $query;
        }

        function auth_admin($username, $password)
        {
            $query=$this->db->query("SELECT * FROM petugas WHERE username='$username' AND password='$password' LIMIT 1
            ");
            return $query;
        }
        // cek login
        // public function cek_login($akun) {
        //     $petugas = $this->db->get_where('petugas',$akun);
        //     $masyarakat = $this->db->get_where('masyarakat',$akun);
        //     if ($petugas->result() == null) {
        //         return $masyarakat;
        //     }else{
        //         return $petugas;
        //     }
        // }


      // AJAX
      public function getAllUser()
      {
          return $this->db->get('petugas')->result();
      }
  
      public function inputData()
      {
          $data = [
              "nama" => $this->input->post('nama', true), 
              "username" => $this->input->post('username', true),
              "password" => $this->input->post('password', true),
              "level" => $this->input->post('level', true)

          ];
          return $this->db->insert('petugas', $data);
      }
      
      function updateDataajax()
      {
          $id = $this->input->post('id'); 
          $nama = $this->input->post('nama', true);
          $username = $this->input->post('username', true);
          $password = $this->input->post('password', true);
          $level = $this->input->post('level', true);
          $this->db->set('nama', $nama);
          $this->db->set('username', $username);
          $this->db->set('level', $level);
          $this->db->where('id', $id);
          return $this->db->update('petugas');
      }
      
     // data delete petugas
     public function hapusData()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        return $this->db->delete('petugas');
    }

    public function hapusdatapengaduan()
    {
        $id_pengaduan = $this->input->post('id_pengaduan');
        $this->db->where('id_pengaduan', $id_pengaduan);
        return $this->db->delete('pengaduan');
    }
    // function delete_data($where, $table)
	// {
	// 	$this->db->where($where);
	// 	$this->db->delete($table);
    // }
    
    function repl($id,$data)
    {
        // 'id_pengaduan' => $id_pengaduan,
		// 	'tgl_pengaduan' => $tgl_pengaduan,
		// 	'aduan' => $aduan,
		// 	'tanggal_reply' => $tanggalrp,
            // 'reply' => $reply
            // mksd gua field ny doang wkwkwkwkwk
        // ydauda dah ketikk dl , ikutin sm yg atas ya 
            $data= array(
                'id_pengaduan'=>  $this->input->post('id_pengaduan'),
                'tgl_pengaduan' => $this->input->post('tgl_pengaduan'),
                'aduan' =>$this->input->post('aduan'),
                'tanggal_reply'=>$this->input->post('tanggalrp'),
                'reply'=>$this->input->post('reply'), 
            );

            $this->db->insert('rep', $data);
            header("location",base_url().'pir/tanggap');
        
    }	
    public function reply($data){
        $this->db->insert('rep', $data);
        header("location",base_url().'pir/tanggap');
    }
    public function updet($id_pengaduan, $data){
        $this->db->set($data);
        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->update('pengaduan');
    }

    public function get_datarep($where, $table)
    {
            return $this->db->get_where($table,$where);
    }
      
  }
    
    

  

?>