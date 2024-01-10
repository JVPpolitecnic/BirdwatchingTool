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
require_once('bd.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
}

$birds = selectBirdsById($id);

?>

<div class="card col-sm-6 mx-auto">
    <div class="card-header text-bg-success">
      Editar ocell
    </div>
      <div class="card-body">
        <form action="controllers_php/birdController.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nom">Nom llatí</label>
              <input type="text" class="form-control" name="nom" aria-describedby="name" value=<?php echo '"'. $birds[0]['nom_llati'] . '"' ?>>
            </div>
            <div class="form-group">
                <label for="cognom1">Nom comú</label>
                <input type="text" class="form-control" name="nomComu" aria-describedby="name" value=<?php echo '"'. $birds[0]['nom_comu'] . '"' ?>>
              </div>
              <div class="form-group">
                <label for="cognom2">Id Ordre</label>
                <select class="form-control" id="idOrdre" name="idOr">
                <?php 
                
                $optionList = selectIdOrdre();
                
                 foreach($optionList as $row){
                    echo "<option value='".$row["id_ordre_cientific"] . "'>".$row['nom_ordre_cientific']."</option>";
                  }
                  ?>  
                 
                </select>
              </div>
           
                <div class="form-group">
                  <label for="exampleFormControlFile1">Imatge Ocell</label>
                  <input type="file" class="form-control-file" id="img" name="birdImg">
                </div>
            
            <a class="btn btn-outline-success mt-4" href="" name="submit">Edita</a>
          </form>
    </div>
                </div>
        </div>