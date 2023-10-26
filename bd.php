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
function insertBird($nom_llati, $nom_comu, $cognom2, $id_ordre, $img){
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
?>