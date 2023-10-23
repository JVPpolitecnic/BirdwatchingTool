<?php 
require_once('./bd.php');

if (isset($POST['send']))
{
    insertCadena($_POST['nom'], $_POST['cognom1'], $_POST['cognom2'], $_POST['email'], $POST['password']);
    exit();
}

?>