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
              <h1>Comunicados</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo appbaseurl(); ?>">Início</a></li>
                <li class="breadcrumb-item active">Criar comunicado</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Crie um e-mail para ser enviado para todos os cartórios
                </h3>
                <!-- tools box -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pad">
                <div class="mb-3">
                  <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </div>
              <div class="card-footer">
                <button type="button" onclick="enviarMensagem(); return false;" id="btn_salvar_senha" class="btn btn-lg btn-primary float-right">Enviar &nbsp;<i class="fa fa-paper-plane"></i></button>
              </div>
            </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- ./row -->
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
    $(function() {
      // Summernote
      $('.textarea').summernote();
    });

    function enviarMensagem() {
      var markup = $('.textarea').summernote('code');
      alert(markup);
      $.post('', {
        "text": markup
      }).done(function(retorno) {
        if (retorno.status) {
          toastr.success("Comunicado enviado com sucesso!");
        } else {
          for (let i = 0; i < retorno.errors.length; i++) {
            toastr.error(retorno.errors[i]);
            
          }
          
        }
        
      })
    }
  </script>

</body>

</html>