<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Link CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/login.css">

    <!-- Fonts awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>fontawesome/css/all.css">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Montserrat:wght@500;600&display=swap" rel="stylesheet">

    <title>Login Page</title>
  </head>
  <body>
  	<style type="text/css">
  		.bulet-gede{
  			position: absolute;
  			min-width: 1000px;
  			min-height: 1000px;
  			max-width: 1300px;
  			max-height: 1300px;
  			background-color: #6C63FF;
			opacity: 20%;
			z-index: -2;
			border-radius: 100%;
			bottom: -600px;
			right: -400px;
  		}
  	</style>
    
  	<div class="bulet-gede"></div>
    <section class="mainn">
      <div class="login-container">
        <p class="title">Login Admin</p>
        <div class="seperator"></div>
         <?= $this->session->flashdata('message'); ?>
        <form class="login-form was-validated" action="<?= base_url('auth/login_admin'); ?>" method="post">
          <div class="form-control" style="background-color: transparent;">
            <input type="text" name="username" placeholder="username"  style="border: 1px solid #fff;">
            <div class="icon">
            	<i class="fas fa-user"></i>
            </div>
            <div class="content-error">		
           	 	
              <small class="error-text" style="color: red;"><?= form_error('username'); ?></small>
            </div>
          </div>
          <div class="form-control" style="background-color: transparent;">
            <input type="password" name="password" placeholder="Password"  style="border: 1px solid #fff;">
            <div class="icon">
            	<i class="fas fa-lock"></i> 	
            </div>
            <div class="content-error">
           
             <small class="error-text" style="color: red;"><?= form_error('password'); ?></small>
            </div>
          </div>
          <button class="submit" name="submit" type="submit">Login</button>
        </form>
      </div>
    </section>

    <section class="side">
      <img src="<?= base_url('assets/'); ?>img/login_admin_dua.svg" alt="">
    </section>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>