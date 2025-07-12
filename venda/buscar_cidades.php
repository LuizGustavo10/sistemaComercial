<?php
include "../conexao.php";

$regiao_id = $_POST['regiao_id'];
$cidades = mysqli_query($conexao, "SELECT * FROM cidade WHERE regiao_id = '$regiao_id' ORDER BY nome");

echo '<option value="">Selecione</option>';
while ($c = mysqli_fetch_assoc($cidades)) {
  echo "<option value='{$c['id']}'>{$c['nome']}</option>";
}