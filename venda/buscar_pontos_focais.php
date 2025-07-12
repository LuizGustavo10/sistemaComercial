<?php
include "../conexao.php";

$cidade_id = $_POST['cidade_id'];
$pontos = mysqli_query($conexao, "SELECT * FROM ponto_focal WHERE cidade_id = '$cidade_id' ORDER BY nome");

echo '<option value="">Selecione</option>';
while ($p = mysqli_fetch_assoc($pontos)) {
  echo "<option value='{$p['id']}'>{$p['nome']}</option>";
}