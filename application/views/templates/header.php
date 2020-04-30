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
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url("assets/");?>img/logo_im3.svg">
    <title><?= $judul;?></title>

</head>
<body>
<div class="container" id="navcontainer">
<nav class="navbar navbar-expand-lg"  >
  <a class="navbar-brand" href="<?= base_url('home/');?>" id="logo_im3"><img src="<?= base_url('assets/');?>img/logo_im3.svg" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" id="btn_navbar" >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Address</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">PIC</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">FAQ</a>
      </li>
    </ul>
  </div>
</nav>
</div>
<div class="content_utama">