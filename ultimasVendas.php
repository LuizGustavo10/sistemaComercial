<?php
include "conexao.php";

// Consulta com joins para obter os dados completos da compra
$sql = "
  SELECT *,
    ca.id,
    ca.data_compra,
    pf.nome AS ponto_focal_nome,
    pf.tipo,
    a.nome AS area_nome,
    c.nome AS cidade_nome,
    r.nome AS regiao_nome
  FROM compra_area ca INNER JOIN ponto_focal pf 
  ON pf.id = ca.ponto_focal_id
  INNER JOIN area a 
  ON a.id = ca.area_curso_id
  INNER JOIN cidade c 
  ON pf.cidade_id = c.id
  INNER JOIN regiao r 
  ON c.regiao_id = r.id
  ORDER BY ca.data_compra DESC
";

$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Relatório de Vendas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
  <div class="container-fluid mt-4">
    <h2> Relatório de Vendas de Áreas</h2>

    <!-- Filtros -->
    <div class="row g-3 my-3">
      <div class="col-md-2">
        <label class="form-label">Região</label>
        <select id="filtro_regiao" class="form-select">
          <option value="">Todas</option>
          <?php
          $regioes = mysqli_query($conexao, "SELECT nome FROM regiao ORDER BY nome");
          while ($r = mysqli_fetch_assoc($regioes)) {
            echo "<option>{$r['nome']}</option>";
          }
          ?>
        </select>
      </div>

      <div class="col-md-2">
        <label class="form-label">Cidade</label>
        <select id="filtro_cidade" class="form-select">
          <option value="">Todas</option>
          <?php
          $cidades = mysqli_query($conexao, "SELECT nome FROM cidade ORDER BY nome");
          while ($c = mysqli_fetch_assoc($cidades)) {
            echo "<option>{$c['nome']}</option>";
          }
          ?>
        </select>
      </div>

      <div class="col-md-2">
        <label class="form-label">Ponto Focal</label>
        <select id="filtro_ponto" class="form-select">
          <option value="">Todos</option>
          <?php
          $pontos = mysqli_query($conexao, "SELECT nome FROM ponto_focal ORDER BY nome");
          while ($p = mysqli_fetch_assoc($pontos)) {
            echo "<option>{$p['nome']}</option>";
          }
          ?>
        </select>
      </div>

      <div class="col-md-2">
        <label class="form-label">Área de Curso</label>
        <select id="filtro_area" class="form-select">
          <option value="">Todas</option>
          <?php
          $areas = mysqli_query($conexao, "SELECT nome FROM area ORDER BY nome");
          while ($a = mysqli_fetch_assoc($areas)) {
            echo "<option>{$a['nome']}</option>";
          }
          ?>
        </select>
      </div>

      <div class="col-md-2">
        <label class="form-label">Público ou Privado</label>
        <select id="filtro_tipo" class="form-select">
          <option value="">Todos</option>
          <option>Pública</option>
          <option>Privada</option>
        </select>
      </div>
    </div>

    <!-- Tabela -->
    <div class="table-responsive">
      <table id="tabela_vendas" class="display nowrap table table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>Região</th>
            <th>Cidade</th>
            <th>Ponto Focal</th>
            <th>Tipo</th>
            <th>Área de Curso</th>
            <th>Data da Compra</th>
            <th>Origem</th>
            <th>Observação</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
              <td><?= $linha['regiao_nome'] ?></td>
              <td><?= $linha['cidade_nome'] ?></td>
              <td><?= $linha['ponto_focal_nome'] ?></td>
              <td><?= $linha['tipo'] ?></td>
              <td><?= $linha['area_nome'] ?></td>
              <td><?= date("d/m/Y", strtotime($linha['data_compra'])) ?></td>
              <td><?= $linha['origem'] ?></td>
              <td><?= $linha['observacao_origem'] ?></td>
              <td>
                <a href="./venda/excluir.php?id=<?= $linha['id'] ?>" class="text-danger" onclick="return confirm('Tem certeza que deseja excluir esta venda?')">
                  <i class="fa-solid fa-trash-can"></i>
                </a>
            
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

      <a href="./principal.php" class="btn btn-primary"> Voltar </a>
    </div>
  </div>

<!-- 
dataTables.buttons.min.js: é o painel com os botões.
buttons.html5.min.js: é o scanner que envia pra e-mail (CSV, Excel).
buttons.print.min.js: é o botão de imprimir na hora.
jszip.min.js: é o motor que comprime pra gerar Excel.
pdfmake.min.js: é o módulo que cria PDF do zero.
vfs_fonts.js: são as fontes tipográficas embutidas no PDF.
-->

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

  <script>
    $(document).ready(function() {
      var tabela = $('#tabela_vendas').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        responsive: true,
        language: {
          url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
        }
      });

      $('#filtro_regiao').on('change', function () {
        tabela.column(0).search(this.value).draw();
      });
      $('#filtro_cidade').on('change', function () {
        tabela.column(1).search(this.value).draw();
      });
      $('#filtro_ponto').on('change', function () {
        tabela.column(2).search(this.value).draw();
      });
      $('#filtro_tipo').on('change', function () {
        tabela.column(3).search(this.value).draw();
      });
      $('#filtro_area').on('change', function () {
        tabela.column(4).search(this.value).draw();
      });
    });
  </script>
</body>
</html>
