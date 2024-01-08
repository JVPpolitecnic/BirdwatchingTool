<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Avistaments Zona Platja</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="afegirAvistament.php">Afegir Avistament</a>
              </li>     
              <li class="nav-item">
                <a class="nav-link" href="visualitzarAvistaments.php">Veure els Avistaments</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
              <a href="index.php" class="btn btn-outline-success">Sortir</a>
            </form>
          </div>
        </div>
      </nav>
       

      <div class="container">
        <div class="row mt-4">
    <?php 

    require 'bd.php';
    $session_id = $_SESSION['user_id'];
    $avistaments = getAvistamentsByUserIdAndZone($session_id, 3);
    foreach($avistaments as $avistament){
        $birds = selectBirdsById($avistament['id_ocell_fk']);
        echo 
        "<div class='col-md-4'>".
        "<div class='card special my-4' style='width: 18rem;'>".
        
        "<div class='card-body'>".
        "<img src='". $birds[0]['img_ocell'] ."' class='card-img-top special-img' alt='".$birds[0]['nom_comu']."'>".
            "<h2 class='special-h2'>". $birds[0]['nom_comu'] ."</h2>".
            "<h2 class='special-h1'>"."hora:". $avistament['hora'] ."</h1>" .
            "<h2 class='special-h1'>"."data:". $avistament['data'] ."</h1>".
            "<p class='special-p'>".$birds[0]['nom_llati']."</p>".
        "</div>".
        "</div>".
        "</div>";
    }

   
        ?>
        </div>
        </div>