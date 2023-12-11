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
          <a class="navbar-brand" href="#">Visualitzar Ocell</a>
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
       <?php 
       $session_id = $_SESSION['user_id'];
       require_once 'bd.php';
       $ricarda = getNumberAvistamentByUserIdAndZone($session_id, 2);
       $margarola = getNumberAvistamentByUserIdAndZone($session_id, 1);
       $platja = getNumberAvistamentByUserIdAndZone($session_id, 3);
       ?>
    
      <div id="mapaDiv" class="container">
   
      <button id="ricarda" class="btn btn-success btn-circle" 
      data-bs-trigger="hover" 
      data-bs-toggle="popover"
      data-bs-title="LLaguna de la Ricarda"
      data-bs-content="La Ricarda es un humedal mediterráneo costero que se sitúa en el NE de la
Península Ibérica, muy cercano al Aeropuerto de Barcelona-El Prat Josep
Tarradellas dentro del municipio de El Prat de Llobregat."><?php echo $ricarda['cantidad']; ?>
      </button>

<button id="margarola" class="btn btn-success btn-circle"
 data-bs-trigger="hover"
  data-bs-toggle="popover"
 data-bs-title="LLaguna de la Margarola" 
 data-bs-content="La llaguna de la Magarola es una pequeña laguna litoral situada cerca del edificio del Semàfor en la zona del Delta del Llobregat.">
 <?php echo $margarola['cantidad']; ?>
</button>

<button id="platja" class="btn btn-success btn-circle"
 data-bs-trigger="hover"
  data-bs-toggle="popover"
 data-bs-title="Zona de la platja" 
 data-bs-content="Zona de la platja, amb un mirador cap a aquesta">
 <?php echo $platja['cantidad']; ?>
</button>

        <div class="row mt-4">

        <img src="resources/mapa.jpg" id="map" alt="mapa del prat">
    <?php 

 

    $birds = selectBirds();
      
   

        ?>
        </div>
        </div>

        <script>
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
</script>