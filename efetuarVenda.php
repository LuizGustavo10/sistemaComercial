<?php include "conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Compra de Áreas - Sistema</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">
<div class="container mt-4">
  <h2>Compra de Áreas</h2>

  <form action="./venda/compra_area_salvar.php" method="post">
    <div class="row">
      <!-- REGIÃO -->
      <div class="col-md-4">
        <label>Região</label>
        <select class="form-select" name="regiao_id" id="regiao_id" required>
          <option value="">Selecione</option>
          <?php
          $regioes = mysqli_query($conexao, "SELECT * FROM regiao ORDER BY nome");
          while ($r = mysqli_fetch_assoc($regioes)) {
            echo "<option value='{$r['id']}'>{$r['nome']}</option>";
          }
          ?>
        </select>
      </div>

      <!-- CIDADE -->
      <div class="col-md-4">
        <label>Cidade</label>
        <select class="form-select" name="cidade_id" id="cidade_id" required>
          <option value="">Selecione a Região primeiro</option>
        </select>
      </div>

      <!-- PONTO FOCAL -->
      <div class="col-md-4">
        <label>Ponto Focal</label>
        <select class="form-select" name="ponto_focal_id" id="ponto_focal_id" required>
          <option value="">Selecione a Cidade primeiro</option>
        </select>
      </div>
    </div>

    <!-- ÁREA, DATA, ORIGEM -->
    <div class="row mt-3">
      <div class="col-md-6">
        <label>Área do Curso</label>
        <select class="form-select" name="area_curso_id" required>
          <option value="">Selecione</option>
          <?php
          $areas = mysqli_query($conexao, "SELECT * FROM area ORDER BY nome");
          while ($a = mysqli_fetch_assoc($areas)) {
            echo "<option value='{$a['id']}'>{$a['nome']}</option>";
          }
          ?>
        </select>
      </div>

      <div class="col-md-3">
        <label>Data da Compra</label>
        <input type="date" name="data_compra" class="form-control" required>
      </div>

      <div class="col-md-3">
        <label>Origem</label>
        <input type="text" name="origem" class="form-control" placeholder="Instagram, Feira, etc.">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col">
        <label>Observação</label>
        <textarea class="form-control" name="observacao_origem" rows="2"></textarea>
      </div>
    </div>

    <div class="mt-4 d-flex justify-content-end">
      <button type="submit" class="btn btn-success">Salvar Compra</button>
      <a href="./principal.php" class="btn btn-primary"> Voltar  </a>
    </div>
     
  </form>
</div>

<!-- SCRIPTS DE FILTRO DINÂMICO -->
<script>
  $('#regiao_id').on('change', function () {
    var regiaoId = $(this).val();
    $('#cidade_id').html('<option>Carregando...</option>');
    $('#ponto_focal_id').html('<option>Selecione a Cidade primeiro</option>');

    $.post('./venda/buscar_cidades.php', { regiao_id: regiaoId }, function (data) {
      $('#cidade_id').html(data);
    });
  });

  $('#cidade_id').on('change', function () {
    var cidadeId = $(this).val();
    $('#ponto_focal_id').html('<option>Carregando...</option>');

    $.post('./venda/buscar_pontos_focais.php', { cidade_id: cidadeId }, function (data) {
      $('#ponto_focal_id').html(data);
    });
  });
</script>
</body>
</html>
