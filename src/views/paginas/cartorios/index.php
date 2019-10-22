<?php 
// dd($_SESSION);
?>
<!DOCTYPE html>
<html>
<?php include appbasepath() . '/src/views/paginas/pieces/head.php'; ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php include appbasepath() . '/src/views/paginas/pieces/navbar.php'; ?>

    <!-- Main Sidebar Container -->
    <?php //echo getPageContent('pieces/sidebar'); 
    includeViewPiece('pieces/sidebar', ['teste' => 'minha var']);
    // include appbasepath() . '/src/views/paginas/pieces/sidebar.php';
    ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Cartórios</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo appbaseurl(); ?>">Início</a></li>
                <li class="breadcrumb-item active">Cartórios</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <a class="btn btn-info" href="cartorios/cadastrar"><i class="fa fa-edit"></i> Cadastrar Novo Cartório</a>
                <button class="btn btn-info" onclick="btn_upload_xml.click();"><i class="fa fa-upload"></i> Importar XML</button>
                <form id="form_upload_xml" action="cartorios/enviar-xml" enctype="multipart/form-data" method="post" style="display:none;">
                <input type="file" name="arquivo_xml" id="btn_upload_xml" onchange="form_upload_xml.submit()">
                </form>
                <a class="btn btn-info" href="cartorios/exportar-excel"><i class="fa fa-download"></i> Exportar cartórios para excel</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Cartórios cadasatrados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dt_cartorios" class="table table-bordered table-striped">
                  <thead>
                    <tr>

                      <th>id</th>
                      <th>nome_cartorio</th>
                      <th>documento</th>
                      <th>nome_tabeliao</th>
                      <th>telefone</th>
                      <th>email</th>
                      <th>uf</th>
                      <th>ativo</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    foreach ($cartorios as $cartorio) {
                      ?>
                      <tr>
                        <td><?php echo $cartorio->id ?? ''; ?></td>
                        <td><?php echo $cartorio->nome_cartorio ?? ''; ?></td>
                        <td><?php echo $cartorio->documento ?? ''; ?></td>
                        <td><?php echo $cartorio->nome_tabeliao ?? ''; ?></td>
                        <td><?php echo $cartorio->telefone ?? ''; ?></td>
                        <td><?php echo $cartorio->email ?? ''; ?></td>
                        <td><?php echo $cartorio->uf ?? ''; ?></td>
                        <td>
                          <a href="cartorios/editar/<?php echo $cartorio->id ?? ''; ?>" class="btn btn-warning">
                          <i class="fa fa-edit"></i>
                        </a>
                          </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>id</th>
                      <th>nome_cartorio</th>
                      <th>documento</th>
                      <th>nome_tabeliao</th>
                      <th>telefone</th>
                      <th>email</th>
                      <th>uf</th>
                      <th>ativo</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <?php include appbasepath() . '/src/views/paginas/pieces/footer.php'; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php include appbasepath() . '/src/views/paginas/pieces/scripts.php'; ?>

 
  <script type="text/javascript">
  $(document).ready(function(){
    $("#dt_cartorios").DataTable({
      // "processing": true,
      //   "serverSide": true,
      //   "ajax": "cartorios/dt-server-side"
    });
  });
  </script>

</body>

</html>