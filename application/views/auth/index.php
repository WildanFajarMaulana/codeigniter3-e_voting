<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">

    <!-- Goole fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Montserrat:wght@500;600&display=swap" rel="stylesheet">

    <title>Page Index</title>
  </head>
  <body>
    <div class="flash-data" data-logout="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="container">
     <div class="bulet"></div>
     <div class="bulet2"></div>
      <div class="card-body">    
        <div class="row main">
          <div class="colom-half">
          	<div class="jueduel">
	            <h1 class="display-3 mt-5">Voting <span> Untuk </span></h1>
	            <h1 class="display-3">Kandidat <span>Baru</span></h1>
          	</div>
            <p>
              Pemimpin merupakan seseorang yang dapat menjaga sebuah amanah dengan baik. Hak pilih anda akan menentukan sebuah periode kepemimpinan yang baru. Gunakan hak pilih anda secara bijak demi kebaikan kita bersama..
            </p>
            
            <div class="dropdown">
                <button class="button first mt-4 dropdown-togle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Login Ke</button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                	<li><a class="dropdown-item" href="<?= base_url('auth/login'); ?>">Login</a></li>
                
                </ul>
            </div>
                  
          </div>
          <div class="img">
            <img src="<?= base_url('assets/'); ?>img/vote.png" alt="" class="bg-img">  
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
     <script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url();?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url();?>assets/js/scriptalert.js"></script>
  </body>
</html>