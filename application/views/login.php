<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
<style>
        body{
            background-image: url('img/tbb7.jpg');
            background-size: cover;
            overflow:hidden;
        }
        .contain{
                 margin:10% auto;
            width: 45%;
            background-color:white;
            padding: 5%;
            margin-top:7%;
        }
        .contain form input{
            border-radius:20px;
            margin-bottom:5%;
        }

        .contain form button{
            border-radius:20px;
            width:30%;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <div class="row">
        
        <div class="contain text-center">
            <div class="back" style="margin-top:-90px;">
                <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/gambarDesain/bk.png')?>" alt="" style="width:10%; margin-left:-500px; margin-top:-50px;"></a>
            </div>
            <h2><font face="Times new roman"><b>Silahkan bergabung dan sampaikan aspirasi anda</b></font></h2>
            <br>
            <form  style="margin-top:50px;" method="post" action="<?php echo site_url('Pir/auth')?>">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <button type="submit" class="btn btn-info">Login</button>
            </form>
           
        </div> 
        <img src="<?php echo base_url('assets/gambarDesain/login.jpg')?>" alt="" style="width:50%;">
    </div>

    

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>