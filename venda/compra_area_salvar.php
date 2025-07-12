<?php
include "../conexao.php";

// Receber os dados
$ponto_focal_id = $_POST['ponto_focal_id'];
$area_curso_id = $_POST['area_curso_id'];
$data_compra = $_POST['data_compra'];
$origem = $_POST['origem'];
$observacao_origem = $_POST['observacao_origem'];

// Inserir no banco
$sql = "INSERT INTO compra_area (
    ponto_focal_id, area_curso_id, data_compra, origem, observacao_origem
) VALUES (
    '$ponto_focal_id', '$area_curso_id', '$data_compra', '$origem', '$observacao_origem'
)";

if (mysqli_query($conexao, $sql)) {
  header("Location: ./ultimasVendas.php?success=1");
} else {
  echo "Erro ao inserir: " . mysqli_error($conexao);
}