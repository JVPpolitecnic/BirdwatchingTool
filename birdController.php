<?php
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
            insertBirdWatcher($_POST['nom'], $_POST['cognom1'], $_POST['cognom2'], $_POST['email'], $_POST['password']); 
            header('Location: ./index.php');
            exit();
        }
      } 
?>