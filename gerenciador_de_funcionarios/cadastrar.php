<?php require_once "components/topo.php";?>
<?php require_once "conexao/db.php";
$sql = "select * from cargos order by nomecargo";
$resultSetCargo = mysqli_query($conn, $sql);

?>
<h2>CADASTRAR FUNCIONÁRIO</h2>
<form action="save_funcionario.php" method="POST">
    <div class="w-100">
        <label for="nome">Nome:</label>
        <input type="text" name ="nome" class="field-form">
    </div>
  
    <div class="w-50">
        <label for="cpf">CPF:</label>
        <input type="text" name ="cpf" class="field-form">
    </div>
    
    <div class="w-50">
        <label for="email">E-mail:</label>
        <input type="text" name ="email" class="field-form">
    </div>
    
    <div class="w-50">
        <label for="dtnascimento">Data Nascimento:</label>
        <input type="text" name ="dtnascimento" class="field-form">
    </div>
    
    <div class="w-50">
        <label for="salario">Salário:</label>
        <input type="text" name ="salario" class="field-form">
    </div>
    
    <div class="w-50">
        <label for="cargo">Cargo:</label>
        <select name="cargo" id="cargo" class="field-form">
            <option value=""></option>
            <?php
            if(mysqli_num_rows($resultSetCargo)>0){
                while($registroCargo = mysqli_fetch_assoc($resultSetCargo)){
                    echo "<option value='".$registroCargo["idcargo"]."'>". $registroCargo["nomecargo"]. "</option> ";

                }
            }
            ?>
        </select>
    </div>
    
    <div class="w-50">
        <label for="cidade">Cidade:</label>
        <input type="text" name ="cidade" class="field-form">
    </div>
    <div class="clear">

    </div>
    <div class="w-50">
        <label for="cep">CEP:</label>
        <input type="text" name ="cep" class="field-form">
    </div>
    
    <div class="w-50">
        <label for="estado">Estado:</label>
       <select name="estado" id="estado" class="field-form">
       <option value=""></option>
       <option value="RJ">RJ</option>
       <option value="SP">SP</option>
       <option value="ES">ES</option>
       <option value="MG">MG</option>
       <option value="AM">AM</option>
       <option value="TO">TO</option>
       
       </select>
    </div>
    <div class="clear">

    </div>
    <input type="submit" value="Cadastrar Funcionário" class="btn btn-save">
</form>
           
<?php require_once "components/rodape.php";?>      