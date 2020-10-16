<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tanggapan</title>

    <link rel="stylesheet" href="<?php echo base_url('/assets/css/bootstrap.min.css')?>">
</head>
<style>
    body{
        overflow: auto;
        overflow:scroll;
        height:4000%;
    }
</style>
<body>
    <?php $this->load->view('navbar')?>;

    <div class="container">
    <button><a href="<?= site_url('pir/cetak')?>">Cetak PDF</a></button>
    <button><a href="<?= site_url('pir/cetak_excel')?>">Cetak excel</a></button>

        <font face="Tahoma">Silahkan verifikasi pesan pesan di bawah ini

        <table class="table" style="text-align:center;">
        <thead class="">
            <tr>
                <th scope="col">Id_pengaduan</th>
                <th scope="col">Tanggal_pengaduan</th>
                <th scope="col">Nama</th>
                <th scope="col">Aduan</th>
                <th scope="col">Bukti</th>
                
               
            </tr>
        </thead>
        <tbody>
        <?php 
            if(!empty($pengaduan)){
                foreach($pengaduan as $datas){
        ?>  
                    <tr>
                        <td><?php echo $datas['id_pengaduan']; ?></td>
                        <td><?php echo $datas['tgl_pengaduan']; ?></td>
                        <td><?php echo $datas['nama']; ?></td>
                        <td><?php echo $datas['aduan']; ?></td>
                        <td><img style="width:10%; height:5%;" src="../uploads/<?php echo $datas['bukti']; ?>" alt=""></td>
                        
                        <td>
                        
                        </td>
                    </tr> 
        <?php   }       
        }   else   {
            ?>
            <tr>
                <td colspan="8"><center> Data Kosong </center></td>
            </tr>
            <?php
        }
            ?>
        
        </tbody>


    </table>
    </div>

    <hr>

<div class="container">
    <table class="table" style="text-align:center;">
        <thead class="">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">telp</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            if(!empty($masyarakat)){
                foreach($masyarakat as $datas){
        ?>  
                    <tr>
                        <td><?php echo $datas['id']; ?></td>
                        <td><?php echo $datas['nama']; ?></td>
                        <td><?php echo $datas['username']; ?></td>
                        <td><?php echo $datas['password']; ?></td>
                        <td><?php echo $datas['telp']; ?></td>
                        
                        <td>
                        <div class="col-12">
                        <?php echo anchor('pir/edit/'.$datas['id'],'<button type="button" class="btn btn-success" style="width:50%;">Edit</button>'); ?>
                        </div>
                        <div class="col-12 mt-2">
                            <?php echo anchor('pir/hapus/'.$datas['id'],'<button type="button" class="btn btn-danger" style="width:50%;">Delete</button>'); ?>
                            
                        </div>
                        </td>
                    </tr> 
        <?php   }       
        }   else   {
            ?>
            <tr>
                <td colspan="8"><center> Data Kosong </center></td>
            </tr>
            <?php
        }
            ?>
        
        </tbody>


    </table>
   </div>

   <div class="container">
    <table class="table" style="text-align:center;">
        <thead class="">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">level</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            if(!empty($petugas)){
                foreach($petugas as $datas){
        ?>  
                    <tr>
                        <td><?php echo $datas['id']; ?></td>
                        <td><?php echo $datas['nama']; ?></td>
                        <td><?php echo $datas['username']; ?></td>
                        <td><?php echo $datas['password']; ?></td>
                        <td><?php echo $datas['level']; ?></td>
                        
                        <td>
                        <div class="col-12">
                        <?php echo anchor('pir/editpetugas/'.$datas['id'],'<button type="button" class="btn btn-success" style="width:50%;">Edit</button>'); ?>
                        </div>
                        <div class="col-12 mt-2">
                            <?php echo anchor('pir/hapus_petugas/'.$datas['id'],'<button type="button" class="btn btn-danger" style="width:50%;">Delete</button>'); ?>
                            
                        </div>
                        </td>
                    </tr> 
        <?php   }       
        }   else   {
            ?>
            <tr>
                <td colspan="8"><center> Data Kosong </center></td>
            </tr>
            <?php
        }
            ?>
        
        </tbody>


    </table>
   </div>

</body>
</html>