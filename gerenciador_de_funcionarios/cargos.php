<?php require_once "components/topo.php";?>
<h2>CARGOS</h2>


<form action="save_cargo.php" method ="POST">
    <div class="w-100">
        <label for="cargo" >
         Nome do Cargo
        </label>
        <input type="text" name="nomecargo" id="nomecargo" class="field-form">
    </div>
    <div class="clear"></div>
    <input type="submit" value="Salvar Cargo" class="btn btn-save">
</form>

<?php
require_once "conexao/db.php";
$sql = "select * from cargos ORDER BY nomecargo";
$result = mysqli_query($conn,$sql);
$totalRegistros = mysqli_num_rows($result);

if($totalRegistros > 0 ){


?>

<table class="my-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME CARGO</th>
        </tr>
    </thead>
    <tbody>
    <?php while($registro = mysqli_fetch_assoc($result)){?>
        <tr>
            <td><?=$registro["idcargo"]?></td>
            <td><?=$registro["nomecargo"]?></td>
        </tr>
        
        <?php }?>
    </tbody>


</table>
<?php } ?>
           
<?php require_once "components/rodape.php";?>      