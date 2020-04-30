<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat:400,600|Open+Sans|Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("assets/");?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url("assets/");?>css/style.css">
    <link rel="stylesheet" href="<?= base_url("assets/");?>css/sidebar.css">
    <title>Login</title>
</head>
<body>
    
     <?=$this->session->flashdata('notif');?>


     <div class="container">
        <div class="card-login">
        <img src="<?= base_url("assets/");?>img/logo_im3.svg" alt="">
             <form class="user" method="post" action="<?= base_url('Auth');?>">
                 <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" placeholder="Enter Email Address..." name="email" value="<?= set_value('email');?>">
                     <?= form_error('email','<small class="text-danger pl-3">','</small>');?>
                   </div>
                   <div class="form-group">
                     <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                     <?= form_error('password','<small class="text-danger pl-3">','</small>');?>
                   </div>
                   <button  type="submit " class="btn btn-primary btn-user btn-block">
                     Login
                   </button>
                 </form>
                 </div>
                 </div>
                 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/');?>js/jquery.js">   </script>
<script src="<?= base_url('assets/');?>js/popper.min.js">   </script>
<script src="<?= base_url('assets/');?>js/bootstrap.js">   </script>
<script src="<?= base_url('assets/');?>js/sidebar.js">   </script>
</body>
</html>