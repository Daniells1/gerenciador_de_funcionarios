<?php require_once "components/topo.php";
require_once "conexao/db.php";
?>
<h2>BUSCAR FUNCIONÁRIO</h2>
<form action="buscar.php" method="POST">
    <div class="w-50">
    <label for="nome">Nome do funcionário:</label>
    <input type="text" name="nome" id="nome" class="field-form">
    </div>
    <div class="w-50">
    <label for="cargo">Cargo</label>
        <select name="cargo" id="cargo" class="field-form">
            <option value="">TODOS</option>
            <?php 
            $sqlCargo = "select idcargo, nomecargo from cargos order by nomecargo";
            $resultSetCargo = mysqli_query($conn,$sqlCargo);
            if(mysqli_num_rows($resultSetCargo)>0){
                while($registroDbCargo = mysqli_fetch_assoc($resultSetCargo)){
                    echo "<option value=" .$registroDbCargo["idcargo"].">". $registroDbCargo["nomecargo"]."</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="clear"></div>
    <input type="submit" value="Buscar" class="btn btn-find">

</form>
<?php

if($_POST){
    $nome =$_POST["nome"];
    $cargo = $_POST["cargo"];


$sql = "SELECT f.idfuncionario, f.nome, f.salario, c.nomecargo, e.estado 
FROM funcionarios f INNER JOIN enderecos e ON e.funcionario_idfuncionario = f.idfuncionario 
INNER JOIN cargos c ON f.cargos_idcargo = c.idcargo WHERE f.nome LIKE '".$nome."%' ";

if($cargo != ""){
    //$sql = $sql. "AND cargo =".$cargo;
    $sql .= "AND c.idcargo =".$cargo;
}

$resultSet = mysqli_query($conn,$sql);
if(mysqli_num_rows($resultSet)>0){
?>
<table class="my-table">
    <thead>
        <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>SALÁRIO</th>
        <th>NOME DO CARGO</th>
        <th>ENDEREÇO</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($registroDb = mysqli_fetch_assoc($resultSet)) {?>
            <tr>
                <td><?=$registroDb["idfuncionario"]?></td>
                <td><?=$registroDb["nome"]?></td>
                <td>R$<?=number_format($registroDb["salario"],2,",",".")?></td>
                <td><?=$registroDb["nomecargo"]?></td>
                <td><?=$registroDb["estado"]?></td>
            </tr>
        <?php  }?>    
    </tbody>
</table>
<?php }
} ?>
<?php require_once "components/rodape.php";?>      