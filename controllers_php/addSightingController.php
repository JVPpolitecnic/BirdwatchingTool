<?php

require_once('../bd.php');
session_start();
if(isset($_POST['submit'])) {

    if (isset($_SESSION['user_id'])) {
        // User is logged in
      
      
       

        insertAvistament((int)$_SESSION['user_id'], (int)$_POST['ocell'], $_POST['data'], $_POST['hora'], $_POST['zona']);

        header('Location: ../afegirAvistament.php');
    } 

}

?>