<?php
    include "../conexao.php";

    $nome = $_REQUEST['nome'];
    $salario = $_REQUEST['salario'];
    $data_nascimento = $_REQUEST['data_nascimento'];
    $cpf = $_REQUEST['cpf'];
    $cidade = $_REQUEST['cidade'];
    $profissao = $_REQUEST['profissao'];
    $status = $_REQUEST['status'];
    $contato = $_REQUEST['contato'];
    $endereco = $_REQUEST['endereco'];
    $data_contratacao = $_REQUEST['data_contratacao'];

    // echo "Teste $nome $cpf $senha";

    $sql = "INSERT INTO funcionario(nome,salario,data_nascimento,cpf,cidade,profissao,status,contato,endereco,data_contratacao)
    VALUES ('$nome','$salario','$data_nascimento','$cpf','$cidade','$profissao','$status','$contato','$endereco','$data_contratacao')";
    //executar sql
    $resultado = mysqli_query($conexao, $sql);

    //manda a pessoa para a página inicial
    header("Location:../funcionario.php");

?>