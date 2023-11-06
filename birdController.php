<?php
    require_once('./bd.php');
    if(isset($_POST['submit'])) {
      
        $file = $_FILES['birdImg'];
        $fileName = $_FILES['birdImg']['tmp_name'];
        print_r($file);
    
     


        $targetDirectory = "C:/xampp/htdocs/aplicacioOcells/resources/ocellsImg/";
       
          $fileName = $_FILES["birdImg"]["name"];
          $fileTmpName = $_FILES["birdImg"]["tmp_name"];
          $fileSize = $_FILES["birdImg"]["size"];
          $fileError = $_FILES["birdImg"]["error"];
          
          // Check if the file was uploaded without errors
          if ($fileError === 0) {
              $destinationPath = $targetDirectory . $fileName;
              
              // Move the uploaded file to the destination folder
              if (move_uploaded_file($fileTmpName, $destinationPath)) {
                  echo "File uploaded and moved successfully.";
              } else {
                  echo "Error moving file to the destination folder.";
              }
          } else {
              echo "File upload failed with error code: " . $fileError;
          }

          insertBird($_POST['nom'], $_POST['nomComu'], $_POST['idOr'], $destinationPath); 
        exit();

      }
      
      
?>