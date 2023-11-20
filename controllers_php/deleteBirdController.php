<?php
require_once('../bd.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteBirds($id);
    header('Location: ../visualitzarOcells.php');
}
?>