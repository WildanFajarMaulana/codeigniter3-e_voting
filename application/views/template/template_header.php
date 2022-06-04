<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <!-- Link Js (Kalau Ada) -->
    <?php if ($title == "Grafik Pemilihan"): ?>
      <script type="text/javascript" src="<?= base_url("assets/") ?>chartjs/Chart.js"></script>
    <?php endif ?>
    <!-- Link CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>css/<?= $css; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>css/kosong.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>css/scroll.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Montserrat:wght@500;600&display=swap" rel="stylesheet">
       <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     <script src="https://kit.fontawesome.com/ee000af8d9.js" crossorigin="anonymous"></script>

    <title><?= $title; ?></title>

  </head>
  <body style="overflow-x: hidden;">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="#">E - Voting</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link <?php if($title == 'Beranda'){echo "active";} ?>" href="<?= base_url('user/index'); ?>" >Beranda</a>
                <a class="nav-link <?php if($title == 'Voting Kandidat'){echo "active";} ?>" href="<?= base_url('user/vote_page'); ?>">Voting Kandidat</a>
                <a class="nav-link <?php if($title == 'Grafik Pemilihan'){echo "active";} ?>" href="<?= base_url('user/live_count'); ?>">Grafik Pemilihan</a>
                <a href="<?= base_url('auth/logout'); ?>" class="nav-link tombol-logout">Keluar</a>
            </div>
          </div>
        </div>
      </nav>