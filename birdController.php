<?php
    require_once('./bd.php');
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
        
        if (isset($_POST['insert'])) { 
            insertBird($_POST['nom'], $_POST['nomComu'], $_POST['idOrdre'], $_POST['imgOcell']); 
            header('Location: ./index.php');
            exit();
        }
      } 
?>