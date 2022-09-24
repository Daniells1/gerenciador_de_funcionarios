<?php
require_once "conexao/db.php";
$nomecargo = $_POST["nomecargo"];
//validação de segunda camada,
//1- ve se o cargo já foi digitado
//2- ver se o cargo já existe no banco

$sql ="insert into cargos values(NULL,'".$nomecargo."')";
$message ="";
if(mysqli_query($conn, $sql)){
    $message = "Cargo cadastrado com sucesso!";
}else{
    $message = "Cargo não cadastrado.";
}
mysqli_close($conn);

header("location: cargos.php?m= ". base64_encode($message));
