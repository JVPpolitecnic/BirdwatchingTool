<?php 
require_once('./bd.php');

if (isset($POST['insert']))
{
    insertBirdWatcher($_POST['nom'], $_POST['cognom1'], $_POST['cognom2'], $_POST['email'], $POST['password']);
    header('Location: ../index.php');
    exit();
}

?>