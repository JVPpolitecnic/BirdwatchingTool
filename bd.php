<?php 
function openBD()
{
$servername = "localhost";
$username = "root";
$password = "";
  $conn = new PDO("mysql:host=$servername;dbname=birdwatchingtool", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec("set names utf8");
return $conn;
}

function closeBD(){
    return null;
}
function insertBirdWatcher($nom, $cognom1, $cognom2, $correuElectronic, $contrasenya){
  try {
$conexion = openBD();

  
$sentenciaTxt = "insert into birdwatcher (nom, cognom1, cognom2, correu_electronic, contrasenya) values (:nom, :cognom1, :cognom2, :correu_electronic, :contrasenya)";
$sentencia = $conexion->prepare($sentenciaTxt);
$sentencia->bindParam(':nom', $nom);
$sentencia->bindParam(':cognom1', $cognom1);
$sentencia->bindParam(':cognom2', $cognom2);
$sentencia->bindParam(':correu_electronic', $correuElectronic);
$sentencia->bindParam(':contrasenya', $contrasenya);

$sentencia->execute();
$conexion = closeBD();
} catch (PDOException $e) {
  $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
  }
}



function insertBird($nom_llati, $nom_comu, $id_ordre, $img){
  try {
  $conexion = openBD();

  $sentenciaTxt = "insert into ocells (nom_llati, nom_comu, id_ordre_cientific, img_ocell) values (:nom, :nomComu, :idOrdre, :img)";
$sentencia = $conexion->prepare($sentenciaTxt);
$sentencia->bindParam(':nom', $nom_llati);
$sentencia->bindParam(':nomComu', $nom_comu);
$sentencia->bindParam(':idOrdre', $id_ordre);
$sentencia->bindParam(':img', $img);
  $sentencia->execute();
  $conexion = closeBD();
} catch (PDOException $e) {
  $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
  }
}


function insertAvistament($id_birdwatcher, $id_ocell, $data, $hora, $zona){
  try {
  $conexion = openBD();

  $sentenciaTxt = "insert into avistaments (id_birdwatcher_fk, id_ocell_fk, data, hora, zona) values (:id_birdwatcher, :id_ocell, :data, :hora, :zona)";
$sentencia = $conexion->prepare($sentenciaTxt);
$sentencia->bindParam(':id_birdwatcher', $id_birdwatcher);
$sentencia->bindParam(':id_ocell', $id_ocell);
$sentencia->bindParam(':data', $data);
$sentencia->bindParam(':hora', $hora);
$sentencia->bindParam(':zona', $zona);
  $sentencia->execute();
  $conexion = closeBD();
} catch (PDOException $e) {
$_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
}
}


  function selectIdOrdre(){
    try {
    $conexion = openBD();
    $sentenciaTxt = "select * from ordre_cientific"; 
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll();
    echo "entrado";

    $conexion = closeBD();
    return $resultado;
  } catch (PDOException $e) {
    $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
    }
  }

  function selectBirds(){
    try {
    $conexion = openBD();
    $sentenciaTxt = "select * from birdwatchingtool.ocells"; 
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll();
    $conexion = closeBD();
    return $resultado;
  } catch (PDOException $e) {
    $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
    }
  }
  function selectBirdsById($id){
    try{
    $conexion = openBD();
    $sentenciaTxt = "select * from birdwatchingtool.ocells where id_ocell = :id"; 
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia->bindParam(':id', $id);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll();
    $conexion = closeBD();
    return $resultado;
  } catch (PDOException $e) {
    $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
    }
  }
  function selectZones(){
    try{
    $conexion = openBD();
    $sentenciaTxt = "select * from birdwatchingtool.zones"; 
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll();
    $conexion = closeBD();
    return $resultado;
  } catch (PDOException $e) {
    $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
    }
  }
  function deleteBirds($id){
    try{
    $conexion = openBD();
    $sentenciaTxt = "delete from birdwatchingtool.ocells where id_ocell =". $id; 
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll();
    $conexion = closeBD();
    return $resultado;
  } catch (PDOException $e) {
    $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
    }
  }

  function searchBirds($search){
    try{
    $conexion = openBD();
    $sentenciaTxt = "select * from birdwatchingtool.ocells where nom_ocell =%:search%OR nom_llati=%:search%"; 
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia->bindParam(':search', $search);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll();
    $conexion = closeBD();
    return $resultado;
  } catch (PDOException $e) {
    $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
    }
  }
function updateBirdById($idBirdToUpdate, $nomLLati, $nomComu, $idOrdre){
  try{
  $conexion = openBD();
  $sentenciaTxt = "UPDATE ocells SET nom_llati = :nomLLati , nom_comu = :nomComu , id_ordre_cientific = :ordre
  WHERE id_ocell = :id";
  $sentencia = $conexion->prepare($sentenciaTxt);
  $sentencia->bindParam(':id', $idBirdToUpdate);
  $sentencia->bindParam(':nomLLati', $nomLLati);
  $sentencia->bindParam(':nomComu', $nomComu);
  $sentencia->bindParam(':ordre', $idOrdre);
  $sentencia -> execute();
  $conexion = closeBD();
} catch (PDOException $e) {
  $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
  }  
}
  function getPasswordByEmails($email){
    try{
    $conexion = openBD();
    $sentenciaTxt = "select contrasenya from birdwatchingtool.birdwatcher where correu_electronic = :email";
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia->bindParam(':email', $email);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $conexion = closeBD();
    return $resultado[0];
  } catch (PDOException $e) {
    $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
    }
  }

  function getIDByEmails($email){
    try{
    $conexion = openBD();
    $sentenciaTxt = "select id_birdwatcher from birdwatchingtool.birdwatcher where correu_electronic = :email";
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia->bindParam(':email', $email);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $conexion = closeBD();
    return $resultado[0];
  } catch (PDOException $e) {
    $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
    }
  }

  function getUserPasswords(){
    try{
    $conexion = openBD();
    $sentenciaTxt = "select contrasenya from birdwatchingtool.birdwatcher";
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $conexion = closeBD();
    return $resultado[0];
  } catch (PDOException $e) {
    $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
    }
  }

  function getNumberAvistamentByUserIdAndZone($userId, $zone){
    try{
    $conexion = openBD();
    $sentenciaTxt = "select COUNT(id_avistament) as cantidad FROM birdwatchingtool.avistaments where id_birdwatcher_fk = :idUser AND zona = :zone";
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia->bindParam(':idUser', $userId);
    $sentencia->bindParam(':zone', $zone);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $conexion = closeBD();
    return $resultado[0];
  } catch (PDOException $e) {
    $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
    }
  }

  function getAvistamentsByUserIdAndZone($userId, $zone){
    try{
    $conexion = openBD();
    $sentenciaTxt = "select * FROM birdwatchingtool.avistaments where id_birdwatcher_fk = :idUser AND zona = :zone";
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia->bindParam(':idUser', $userId);
    $sentencia->bindParam(':zone', $zone);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $conexion = closeBD();
    return $resultado;
  } catch (PDOException $e) {
    $_SESSION['error'] = $e->getCode() . '-' . $e->getMessage();
    }
  }
  
?>