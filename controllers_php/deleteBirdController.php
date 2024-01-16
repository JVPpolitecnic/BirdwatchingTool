<?php
session_start();
require_once('../bd.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if(isset($_SESSION['error'])){
        header('Location: ../visualitzarOcells.php');
}else{
    deleteBirds($id);
    header('Location: ../visualitzarOcells.php');
}
    
}
?>