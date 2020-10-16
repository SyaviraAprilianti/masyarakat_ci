<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaduan</title>

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">

</head>

<style>
    body{
        overflow:hidden;
        margin-top:0px;
        background-image: url(http://localhost/masyarakat_ci/assets/gambarDesain/bg.jpg); 
        background-size: cover;
    }
    .collapse{
        margin-left:75%;
    }
    .button{
        margin-left:43%;
        margin-top:20%;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ff884d;">
        <a class="navbar-brand" href="#" style="color: black;"><font face="Garamond"><b>Pengaduan</b></font></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url()."pir/regist2"?>"><u><b>Registrasi</b></u></a>
            </li>
            <li class="nav-item active" >
                <a class="nav-link" href="<?php echo base_url()."pir/login"?>"><u><b>Login</b></u></a>
            </li>
            </ul>
        </div>
    </nav>  
    
    <div class="button">
        <a href="<?php echo base_url()."pir/login"?>" style="color:black; "><button type="button" class="btn btn-light">laporkan segera!</button></a>
    </div>

</body>
</html>