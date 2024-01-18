<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eina del Birwatcher del Prat del LLobregat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">L'eina del Birdwatcher</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Control usuaris</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Control ocells</a>
              </li>
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
      Afegeix nou usuari
    </div>
    <?php require_once('partials_php/messages.php') ?>
    <div class="card-body">
        <form action="controllers_php/birdwatcherController.php" method="POST">
            <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" class="form-control" name="nom" aria-describedby="name" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="cognom1">1er Cognom</label>
                <input type="text" class="form-control" name="cognom1" aria-describedby="name" placeholder="2n Cognom">
              </div>
              <div class="form-group">
                <label for="cognom2">2n Cognom</label>
                <input type="text" class="form-control" name="cognom2" aria-describedby="name" placeholder="1er Cognom">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nom d'usuari</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Correu electronic">
                <small id="emailHelp" class="form-text text-muted">Aquest correu servira per identificar-vos juntament amb la vostra contrasenya</small>
              </div>
            <div class="form-group">  
            
              <label for="exampleInputPassword1">Contrasenya</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-outline-success mt-4" name="insert">Afegeix</button>
          </form>
    </div>
  </div>
 </div>
      
</body>
</html>
