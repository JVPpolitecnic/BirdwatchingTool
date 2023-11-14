<?php

require_once('./bd.php');
if(isset($_POST['submit'])) {
$users = getUserEmails();

$userName = $_POST['mail'];
$psswd = $_POST['passwd'];

    if(in_array($userName, $users)){
            if(in_array($userName, $psswd)){
                header('Location: ./adminOcells.php');
            }

    } else {

    }

}

?>