<?php

require_once('../bd.php');
session_start();
if(isset($_POST['submit'])) {

    
$userName = $_POST['mail'];
$psswd = $_POST['passwd'];
$passwords = getPasswordByEmails($userName);


    if($psswd == $passwords["contrasenya"]){
        $id = getIDByEmails($userName);
        $_SESSION['user_id'] = $id["id_birdwatcher"];
        
        header('Location: ../visualitzarOcells.php');
      
    } else {
        echo "false";
    }

}

?>