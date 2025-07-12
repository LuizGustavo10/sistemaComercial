<?php
include '../conexao.php';

// recebendo valores do formulário
$id = $_REQUEST['id'];
$nome = $_REQUEST['nome'];
$razao_social = $_REQUEST['razao_social'];
$tipo = $_REQUEST['tipo'];
$cnpj_cpf = $_REQUEST['cnpj_cpf'];
$endereco = $_REQUEST['endereco'];
$telefone = $_REQUEST['telefone'];
$celular = $_REQUEST['celular'];
$email = $_REQUEST['email'];
$cidade_id = $_REQUEST['cidade_id'];

// comando de atualização incluindo todos os campos
$sql = "UPDATE ponto_focal SET 
            nome='$nome',
            razao_social='$razao_social',
            tipo='$tipo',
            cnpj_cpf='$cnpj_cpf',
            endereco='$endereco',
            telefone='$telefone',
            celular='$celular',
            email='$email',
            cidade_id='$cidade_id'
        WHERE id='$id'";

// executa SQL
$resultado = mysqli_query($conexao, $sql);

// redireciona de volta à tela principal
header("Location:../pontofocal.php");
?>