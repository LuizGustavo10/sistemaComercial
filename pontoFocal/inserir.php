<?php
include "../conexao.php";

$nome = $_REQUEST['nome'];
$razao_social = $_REQUEST['razao_social'];
$tipo = $_REQUEST['tipo'];
$cnpj_cpf = $_REQUEST['cnpj_cpf'];
$endereco = $_REQUEST['endereco'];
$telefone = $_REQUEST['telefone'];
$celular = $_REQUEST['celular'];
$email = $_REQUEST['email'];
$cidade_id = $_REQUEST['cidade_id'];

// Monta a query de inserção considerando todos os campos
$sql = "INSERT INTO ponto_focal (nome, razao_social, tipo, cnpj_cpf, endereco, telefone, celular, email, cidade_id) 
        VALUES ('$nome', '$razao_social', '$tipo', '$cnpj_cpf', '$endereco', '$telefone', '$celular', '$email', '$cidade_id')";

$resultado = mysqli_query($conexao, $sql);

// Redireciona para a lista de pontos focais
header("Location:../pontofocal.php");
?>