<?php
include "validacao.php";
include "conexao.php";

$destino = './pontofocal/inserir.php';

if (!empty($_GET['idAlt'])) {
  $id = $_GET['idAlt'];
  $sql = "SELECT * FROM ponto_focal WHERE id='$id'";
  $dados = mysqli_query($conexao, $sql);
  $dadosAlt = mysqli_fetch_assoc($dados);
  $destino = './pontofocal/alterar.php';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Ponto Focal</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="./recursos/estilo.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
          <div class="col-md-5">
            <h5 class="mt-2">Cadastro de Ponto Focal</h5>
            <form action="<?= $destino ?>" method="post">
              <input type="hidden" name="id" value="<?= $dadosAlt['id'] ?? '' ?>">
              <div class="form-group">
                <label>Nome:</label>
                <input required name="nome" class="form-control" value="<?= $dadosAlt['nome'] ?? '' ?>">
              </div>
              <div class="form-group">
                <label>Razão Social:</label>
                <input name="razao_social" class="form-control" value="<?= $dadosAlt['razao_social'] ?? '' ?>">
              </div>
              <div class="form-group">
                <label>Tipo:</label>
                <input name="tipo" class="form-control" value="<?= $dadosAlt['tipo'] ?? '' ?>">
              </div>
              <div class="form-group">
                <label>CNPJ/CPF:</label>
                <input name="cnpj_cpf" class="form-control" value="<?= $dadosAlt['cnpj_cpf'] ?? '' ?>">
              </div>
              <div class="form-group">
                <label>Endereço:</label>
                <input name="endereco" class="form-control" value="<?= $dadosAlt['endereco'] ?? '' ?>">
              </div>
              <div class="form-group">
                <label>Telefone:</label>
                <input name="telefone" class="form-control" value="<?= $dadosAlt['telefone'] ?? '' ?>">
              </div>
              <div class="form-group">
                <label>Celular:</label>
                <input name="celular" class="form-control" value="<?= $dadosAlt['celular'] ?? '' ?>">
              </div>
              <div class="form-group">
                <label>Email:</label>
                <input name="email" class="form-control" value="<?= $dadosAlt['email'] ?? '' ?>">
              </div>
              <div class="form-group">
                <label>Cidade:</label>
                <select name="cidade_id" class="form-control">
                  <option value="">Selecione</option>
                  <?php
                  $cidadeSql = "SELECT * FROM cidade ORDER BY nome";
                  $cidades = mysqli_query($conexao, $cidadeSql);
                  $cidadeSelecionada = $dadosAlt['cidade_id'] ?? '';
                  while ($c = mysqli_fetch_assoc($cidades)) {
                    $selected = ($cidadeSelecionada == $c['id']) ? 'selected' : '';
                    echo "<option value='{$c['id']}' $selected>{$c['nome']}</option>";
                  }
                  ?>
                </select>
              </div>
              <button class="btn btn-primary" type="submit">Salvar</button>
            </form>
          </div>

          <div class="col-md-6">
            <h5 class="mt-2">Lista de Pontos Focais</h5>
            <?php
            $sql = "SELECT pf.*, c.nome AS cidade_nome FROM ponto_focal pf LEFT JOIN cidade c ON pf.cidade_id = c.id";
            $resultado = mysqli_query($conexao, $sql);
            ?>
            <table class="table table-bordered table-striped" id="tabela">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Razão Social</th>
                  <th>Tipo</th>
                  <th>Telefone</th>
                  <th>Cidade</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($coluna = mysqli_fetch_assoc($resultado)) { ?>
                  <tr>
                    <td><?= $coluna['nome'] ?></td>
                    <td><?= $coluna['razao_social'] ?></td>
                    <td><?= $coluna['tipo'] ?></td>
                    <td><?= $coluna['telefone'] ?></td>
                    <td><?= $coluna['cidade_nome'] ?></td>
                    <td>
                      <a href="pontofocal.php?idAlt=<?= $coluna['id'] ?>"><i class="fa-solid fa-pen"></i></a>
                      <a href="./pontofocal/excluir.php?id=<?= $coluna['id'] ?>" class="text-danger"><i class="fa-solid fa-trash"></i></a>
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

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
</body>
</html>
