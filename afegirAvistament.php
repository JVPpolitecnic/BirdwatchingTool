<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Afagir Avistament</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="visualitzarAvistaments.php">Visualitzar avistaments</a>
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
 
      <div class="row-sm-6">

<div class="card col-sm-6 mx-auto">
  <div class="card-header text-bg-success">
    Afegeix avistament
  </div>
                  <div class="card-body">
                        <form action="controllers_php/addSightingController.php" method="POST" enctype="multipart/form-data">
                          
                                        <div class="form-group">
                                          <label for="cognom2">Ocell Avistat</label>
                                          <select class="form-control" name="ocell">
                                          <?php 
                                          require 'bd.php';
                                          $optionList = selectBirds();
                                          
                                          foreach($optionList as $row){
                                              echo "<option value='".$row["id_ocell"] . "'>".$row['nom_comu']."</option>";
                                            }
                                            ?>  
                                          
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="cognom2">Data</label>
                                          <input type="date" id="data" name="data" required>
                                        </div>

                                        <div class="form-group">
                                          <label for="cognom2">Hora</label>
                                          <input type="time" id="hora" name="hora" required>
                                        </div>

                                        <div class="form-group">
                                          <label for="cognom2">Zona d'avistament</label>
                                          <select class="form-control" name="zona">
                                          <?php 
                                          $optionList2 = selectZones();
                                          
                                          foreach($optionList2 as $row){
                                              echo "<option value='".(int)$row["id_lloc"] . "'>".$row['zona']."</option>";
                                            }
                                            ?>  
                                          </select>
                                        </div>
                                      <button type="submit" class="btn btn-outline-success mt-4" name="submit">Afegeix</button>

                      </form>
                                          </div>
                  </div>
                </div>
  
     
</body>
</html>