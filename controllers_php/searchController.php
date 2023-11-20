<?php
require_once('./bd.php');
if(isset($_GET['search_query'])) {

    $search_query = $_GET['search_query'];

    $results = searchBirds($search_query);
    foreach ($results as $result) {
        "<div class='container'>".
        "<div class='row mt-4'>".
        "<div class='col-md-4'>".
        "<div class='card special my-4' style='width: 18rem;'>".
        
        "<div class='card-body'>".
        "<img src='". $row['img_ocell'] ."' class='card-img-top special-img' alt='".$row['nom_comu']."'>".
          "<h2 class='special-h2'>". $row['nom_comu'] ."</h2>
          <p class='special-p'>".$row['nom_llati']."</p>".
          "<a href='deleteBirdController.php?id=".$row['id_ocell']."' class='btn btn-outline-danger'>elimina</a>".
          "<a href'#'=".$row['id_ocell']."' class='btn btn-outline-success'>edita</a>".
        "</div>".
        "</div>".
      "</div>".
      "</div>".
        "</div>";
    }
}


?>