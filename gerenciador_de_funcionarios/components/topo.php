<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Funcionários</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        #resposta{
    padding:10px;
    border-radius: 5px;
    border: 1px solid rgb(51, 162, 170);
    color:#FFF;
    background-color: rgb(51, 162, 170, 0.6);

}

    </style>
</head>
<body>
    <div class="container">
        <header id="topo">
            <h1>GER FUNCIONÁRIOS</h1>
        </header>
        <nav id="menu">
            
               <a href="index.php">HOME</a>
               <a href="cadastrar.php">CADASTRAR FUNCIONÁRIO</a>
               <a href="buscar.php">BUSCAR FUNCIONÁRIO</a>
               <a href="cargos.php">CARGOS</a>
            
        </nav>
        <main id="conteudo">
        <?php 
if(isset($_GET["m"])){
    //base64_encode criptografa,decode descriptografa
    echo "<div id='resposta'>". base64_decode($_GET["m"]) . "</div>";
}
?>                   