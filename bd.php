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
}



function insertBird($nom_llati, $nom_comu, $id_ordre, $img){
  $conexion = openBD();

  $sentenciaTxt = "insert into ocells (nom_llati, nom_comu, id_ordre_cientific, img_ocell) values (:nom, :nomComu, :idOrdre, :img)";
$sentencia = $conexion->prepare($sentenciaTxt);
$sentencia->bindParam(':nom', $nom_llati);
$sentencia->bindParam(':nomComu', $nom_comu);
$sentencia->bindParam(':idOrdre', $id_ordre);
$sentencia->bindParam(':img', $img);
  $sentencia->execute();
  $conexion = closeBD();

}


function insertAvistament($id_birdwatcher, $id_ocell, $data, $hora, $zona){
  $conexion = openBD();

  $sentenciaTxt = "insert into avistaments (id_birdwatcher_fk, id_ocell_fk, data, hora) values (:id_birdwatcher, :id_ocell, :data, :zona)";
$sentencia = $conexion->prepare($sentenciaTxt);
$sentencia->bindParam(':id_birdwatcher', $id_birdwatcher);
$sentencia->bindParam(':id_ocell', $id_ocell);
$sentencia->bindParam(':data', $data);
$sentencia->bindParam(':zona', $zona);
  $sentencia->execute();
  $conexion = closeBD();

}


  function selectIdOrdre(){
    $conexion = openBD();
    $sentenciaTxt = "select * from ordre_cientific"; 
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll();
    echo "entrado";

    $conexion = closeBD();
    return $resultado;

  }

  function selectBirds(){
    $conexion = openBD();
    $sentenciaTxt = "select * from birdwatchingtool.ocells"; 
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll();
    $conexion = closeBD();
    return $resultado;
  }
  function selectBirdsById($id){
    $conexion = openBD();
    $sentenciaTxt = "select * from birdwatchingtool.ocells where id_ocell = :id"; 
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia->bindParam(':id', $id);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll();
    $conexion = closeBD();
    return $resultado;
  }
  function selectZones(){
    $conexion = openBD();
    $sentenciaTxt = "select * from birdwatchingtool.zones"; 
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll();
    $conexion = closeBD();
    return $resultado;
  }
  function deleteBirds($id){
    $conexion = openBD();
    $sentenciaTxt = "delete from birdwatchingtool.ocells where id_ocell =". $id; 
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll();
    $conexion = closeBD();
    return $resultado;
  }

  function searchBirds($search){
    $conexion = openBD();
    $sentenciaTxt = "select * from birdwatchingtool.ocells where nom_ocell =%:search%OR nom_llati=%:search%"; 
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia->bindParam(':search', $search);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll();
    $conexion = closeBD();
    return $resultado;
  }

  function getPasswordByEmails($email){
    $conexion = openBD();
    $sentenciaTxt = "select contrasenya from birdwatchingtool.birdwatcher where correu_electronic = :email";
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia->bindParam(':email', $email);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $conexion = closeBD();
    return $resultado[0];
  }

  function getIDByEmails($email){
    $conexion = openBD();
    $sentenciaTxt = "select id_birdwatcher from birdwatchingtool.birdwatcher where correu_electronic = :email";
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia->bindParam(':email', $email);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $conexion = closeBD();
    return $resultado[0];
  }

  function getUserPasswords(){
    $conexion = openBD();
    $sentenciaTxt = "select contrasenya from birdwatchingtool.birdwatcher";
    $sentencia = $conexion->prepare($sentenciaTxt);
    $sentencia -> execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $conexion = closeBD();
    return $resultado[0];
  }
  
?>