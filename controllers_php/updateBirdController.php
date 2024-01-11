<?php
require_once('../bd.php');
if (isset($_GET['id'], $_GET['nom'] , $_GET['nomComu'], $_GET['idOr'])) {
    updateBirdById((int) $_GET['id'], $_GET['nom'], $_GET['nomComu'], (int) $_GET['idOr']);
    header('Location: ../visualitzarOcells.php');
}
?>