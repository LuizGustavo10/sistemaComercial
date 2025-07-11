<!DOCTYPE html>
<html lang="pt-br">
<?php

include "validacao.php";
include "conexao.php";

//destino do formulário
$destino = './cidade/inserir.php';

//se veriavel idAlt for diferente de vazio na url - se existir a variavel idAlt na URL
if (!empty($_GET['idAlt'])) {
  $id = $_GET['idAlt'];
  $sql = "SELECT * FROM cidade WHERE id='$id' ";

  //busca os o usuário para editar de acordo com o id
  $dados = mysqli_query($conexao, $sql);

  //separa os dados por coluna, pronto para uso
  $dadosAlt = mysqli_fetch_assoc($dados);

  //nesse caso o formulario vai enviar os dados para o alterar.php
  $destino = './cidade/alterar.php';

}


?>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Sistema </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="./recursos/estilo.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />



</head>

<body>

  <?php include './menusuperior.php'; ?>
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-3 menu">
        <?php include './menulateral.php'; ?>
      </div>

      <div class="col-md-9">

        <div class="row">

          <div class="col-md-4 card">
            Cadastro
            <form action="<?= $destino ?>" method="post">
              <div class="form-group">
                <label>ID: </label>
                <input readonly value="<?php echo isset($dadosAlt) ? $dadosAlt['id'] : '' ?>" type="text" name="id"
                  class="form-control" placeholder="Seu id">
              </div>

              <div class="form-group">
                <label>Nome: </label>
                <input required value="<?php echo isset($dadosAlt) ? $dadosAlt['nome'] : '' ?>" type="text" name="nome"
                  class="form-control" placeholder="Nome da Cidade">
              </div>

              <div class="form-group">
                <label>Cep: </label>
                <input value="<?php echo isset($dadosAlt) ? $dadosAlt['cep'] : '' ?>" type="text" name="cep"
                  class="form-control cep" placeholder="CEP">
              </div>

              <div class="form-group">
                <label>Estado</label>
                <input value="<?php echo isset($dadosAlt) ? $dadosAlt['estado'] : '' ?>" type="text" name="estado"
                  class="form-control" placeholder="Estado">
              </div>

              <button type="submit" class="btn btn-primary"> Salvar </button>
            </form>

          </div>

          <div class="col-md-7 card"> Listagem

            <table class="table table-striped table-bordered " id="tabela">
              <thead>
                <tr>
                  <th scope="col"> id</th>
                  <th scope="col"> nome </th>
                  <th scope="col"> cep</th>
                  <th scope="col"> Estado</th>
                  <th scope="col"> opções </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = 'SELECT * FROM cidade';
                $resultado = mysqli_query($conexao, $sql);
                //looping que vai imprimir cada pessoa na tabela
                while ($colunas = mysqli_fetch_assoc($resultado)) {
                  ?>
                  <tr>
                    <th scope="row"> <?php echo $colunas['id'] ?> </th>
                    <td> <?php echo $colunas['nome'] ?> </td>
                    <td> <?php echo $colunas['cep'] ?> </td>
                    <td> <?php echo $colunas['estado'] ?> </td>
                    <td>
                      <a href="cidade.php?idAlt=<?= $colunas['id'] ?>"> <i class="fa-solid fa-pen-to-square mr-3"></i>
                      </a>
                      <a href="<?php echo './cidade/excluir.php?id=' . $colunas['id']; ?>"> <i
                          class="fa-solid fa-trash-can" style="color:red"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

        </div>

      </div>
    </div>

    <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-body-secondary">© 2024 Company, Inc</p>
    </footer>

  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
    integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
    integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
  <script src="./recursos/script.js"></script>
</body>

</html>