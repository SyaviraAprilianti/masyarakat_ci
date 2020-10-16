<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <title>Document</title>
</head>

<style>
    body{
        background-image: url(http://localhost/masyarakat_ci/assets/gambarDesain/awan.png); 
        overflow-x:hidden;
        height:890px;
        background-size: cover;
        
    }

    .contain form input{
            margin-top:20px;
            margin : 2% auto;
            border-radius:20px;
            width:40%;
    }
    .contain{
        margin-top:10%;
    }
    h5{
        color:black;
    }
    .tulis{
        text-align:center;
    }
    input{
        text-align:center;
    }
    .row{
        margin-top:6px;
    }
    img{
        margin-left:50px;
        width:10%;
    }
    h2{
        margin-left:28%;
    }

</style>

<body>

    <div class="row"><br>
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/gambarDesain/bk.png')?>" alt=""style="width:50px;  margin-top:6px;"></a>
       
    </div>
    <div class="contain text-center">
        <form method="post" action="<?php echo site_url('pir/simpan_data')?>">
            <br>
            <h1><b><font face="Arial">Registrasi</font></b></h1>
            <input type="text" class="form-control" name="nama" placeholder="Nama" required="">
            <input type="text" class="form-control" name="username" placeholder="Username" required="">
            <input type="password" class="form-control" name="password" placeholder="Password" required="">
            <input type="number" class="form-control" name="telp" placeholder="No Telp" required="">
            <button type="submit" class="btn btn-danger">Regist</button>
        </form>
    </div>

  
</body>
</html>