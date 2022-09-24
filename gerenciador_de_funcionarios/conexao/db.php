<?php 
$host = "localhost";
$username= "root";
$password ="";
$dbname="gerenciamento_de_funcionarios";

$conn = mysqli_connect($host,$username,$password,$dbname);
if(mysqli_connect_errno()){
    echo "Ocorreu um erro na conexão com o banco de dados...." . mysqli_connect_error();
    exit;
}
