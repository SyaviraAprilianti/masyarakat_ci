<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<style>
body{
    margin-left:40%;
    margin-top:100px;
    background-color:aqua;
}
</style>
<body>
<p><b>REPLAY PENGADUAN<b></p>
<div class="card" style="width: 18rem;">
    
        <?php 
            if(!empty($pengaduan)){
                foreach($pengaduan as $u){
        ?>  
  <div class="card-body">
  <form action="<?php echo base_url("pir/repl"); ?>" method="post">
  
        <input type="hidden" class="form-control" name="id" value="<?php echo $u->id_pengaduan; ?>">
        <p>Tanggal Aduan : </p><input type="text" class="form-control" name="tgl_aduan" value="<?php echo $u->tgl_pengaduan; ?>"><br>
        <p>Aduan : </p><input type="text" class="form-control" name="aduan" value="<?php echo $u->aduan; ?>"><br>
        <p>Tanggal Reply : </p><input type="date" class="form-control" name="tgl_reply"><br>
        <p>Reply : </p><input type="text-area" class="form-control" name="reply" placeholder="
            write a reply here">
        <br><button type="submit" class="btn btn-success" style="margin-right:10px"  >send</button> 
                    
        </form>
        <?php   }       
        }   else   {
            ?>
            <tr>
                <td colspan="8"><center> Data Kosong </center></td>
            </tr>
            <?php
        }
            ?>
  </div>
</div>
</body>
</html>