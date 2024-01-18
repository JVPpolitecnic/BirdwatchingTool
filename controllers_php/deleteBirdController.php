<?php

require_once('../bd.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteBirds($id);
    
    if(isset($_SESSION['error'])){
        header('Location: ../visualitzarOcells.php');
}else{
    header('Location: ../visualitzarOcells.php');
}
    
}
?>