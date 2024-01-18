<?php

require_once('./bd.php');

if (isset($_POST['insert'])) { 
    insertBirdWatcher($_POST['nom'], $_POST['cognom1'], $_POST['cognom2'], $_POST['email'], $_POST['password']); 

    if(isset($_SESSION['error'])){
        header('Location: ./afageixBirdwatcher.php'); 
    } else {
        header('Location: ./index.php');
    exit();
    }
    
}

?>