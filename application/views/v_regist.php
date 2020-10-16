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
        /* background-image:url(assets/gambarDesain/439.jpg); */
        overflow-x:hidden;
        margin-bottom:-50px;
        height:890px;
        background-size: cover;
        background-color: #ffcc99;
    }

    .contain form input{
            margin-top:20px;
            width:40%;
            margin : 2% auto;
            border-radius:20px;
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
        <a href="<?php echo base_url()."pir/datamasyarakat" ?>"><img src="<?php echo base_url('assets/gambarDesain/back.png')?>" alt=""></a>
        <h2>berikan Aspirasi anda</h2>
    </div>
    <div class="contain text-center">
    
    <?php foreach($masyarakat as $u){ ?>

        <div class="card" style="width: 18rem; margin-left: 40%;">
<form action="<?php echo base_url(). 'Pir/update'; ?>" method="post">
    <input type="hidden" name="ids" value="<?php echo $u->id ?>">
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control"  name="namas" value="<?php echo $u->nama ?>">
  </div>
  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control"  name="usernames" value="<?php echo $u->username ?>">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control"  name="passwords" value="<?php echo $u->password ?>">
  </div>
  <div class="form-group">
    <label>Telpon</label>
    <input type="text" class="form-control"  name="telps" value="<?php echo $u->telp ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
	<?php } ?>
    </div>

    <hr>

</div>
</body>
</html>