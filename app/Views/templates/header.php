
<!DOCTYPE html>
<html>
  <head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <title>Code Igniter Tutorial</title>
    <link rel="stylesheet"
          href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"
          type="text/css" />
    <link rel="stylesheet"
          href="<?php echo base_url('assets/css/style.css') ?>"
          type="text/css"/>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?= esc($title) ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="/#">Acceuil<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="<?php echo base_url('/calendar')?>">Calendar</a>
      
    </div>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" id="nav_right_elements">
        <a class="nav-item nav-link" href="<?php echo base_url('/login')?>">Connexion</a>
        <a class="nav-item nav-link" href="<?php echo base_url('/members/create')?>">Inscription</a>
      </div>
  </div>
</nav>
    <div class="container" id=mainContainer>
      <div class="row justify-content-md-center">
