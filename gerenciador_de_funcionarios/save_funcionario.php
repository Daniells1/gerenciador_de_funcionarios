<?php 
//trim retira espaços em branco do inicio e fim da string
$nome = trim($_POST["nome"]);
$cpf = trim($_POST["cpf"]);
$email = trim($_POST["email"]);
$dtnascimento = trim($_POST["dtnascimento"]);
$salario =trim($_POST["salario"]);
$cargo =trim($_POST["cargo"]);
$cidade =trim($_POST["cidade"]);
$cep =trim($_POST["cep"]);
$estado =trim($_POST["estado"]);

if($nome ==""|| $cpf == ""|| $cargo =="" ){
    echo "Preencha todos os campos obrigatórios.";
    exit;
}

require_once "conexao/db.php";
require_once "util/funcao.php";

$dtNascimento = convertDateToDb($dtnascimento);
$salarioDb= convertDoubleToDb($salario);

//10/02/1990 ---input do usuario
//1990-02-10 ---valor do banco de dados

mysqli_autocommit($conn,false);
//1 gravar na tabela funcionários

$sql ="INSERT INTO funcionarios VALUES(NULL,'".$nome."','".$cpf."','".$email."','".$dtNascimento."',".$salarioDb.",".$cargo.")";
$message ="";
$save = true;
if(mysqli_query($conn,$sql)){
    $message = "Funcionário não cadastrado";
    $save =false;
}

$idfuncionario = mysqli_insert_id($conn);
//gravou o funcionário --- gravar o endereço
$sqlEndereco = "INSERT INTO enderecos values(NULL,'".$cidade."','".$cep."','".$estado."',$idfuncionario)";
if($save && !mysqli_query($conn,$sqlEndereco)){ 
    $message = "Endereço não cadastrado.";
    $save =false;
}
if($save){

    mysqli_commit($conn);
    $message = "Dados cadastrados com sucesso!";

}else{
    mysqli_rollback($conn);
   
}
mysqli_close($conn);

$message = base64_encode($message);
header("location: cadastrar.php?m=" . $message);
/*if(mysqli_query($conn,$sql)){

    //Retornar o ID gerado pelo banco de dados  
    $idfuncionario = mysqli_insert_id($conn);

    //gravou o funcionário --- gravar o endereço
    $sqlEndereco = "INSERT INTO enderecos values(NULL,'".$cidade."','".$cep."','".$estado."',$idfuncionario)";
    if(mysqli_query($conn,$sqlEndereco)){ 
        echo "Dados cadastrados com sucesso!";
        //apenas com o commit que os dados serão cadastrados no banco de dados
        mysqli_commit($conn);

    }else{
        echo "Endereço não cadastrado.";
        mysqli_rollback($conn);
    }
}else{
    echo "Funcionário não cadastrado.";
}
mysqli_close($conn);*/

