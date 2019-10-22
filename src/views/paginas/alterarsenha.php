<!DOCTYPE html>
<html>
<?php include appbasepath() . '/src/views/paginas/pieces/head.php'; ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include appbasepath() . '/src/views/paginas/pieces/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php includeViewPiece('pieces/sidebar', ['teste' => 'minha var']); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Alteração de senha</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo appbaseurl(); ?>">Início</a></li>
                                <li class="breadcrumb-item active">Alterar senha</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Alterar senha</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Senha atual</label>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="cursor:pointer;">
                                                            <span class="input-group-text"><i class="fas fa-eye toggle-password" toggle="#senha_antiga"></i></span>
                                                        </div>
                                                        <input type="password" class="form-control senhas-equivalentes" id="senha_antiga" name="senha_antiga">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Nova senha</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="cursor:pointer;">
                                                            <span class="input-group-text"><i class="fas fa-eye toggle-password" toggle="#senha_nova"></i></span>
                                                        </div>
                                                        <input type="password" class="form-control senhas-equivalentes" id="senha_nova" name="senha_nova">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" id="btn_salvar_senha"  class="btn btn-lg btn-primary float-right" disabled>Salvar nova senha</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->

                        </div>

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
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
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            console.log(input);
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        $(".senhas-equivalentes").change(function(){
            if (($("#senha_antiga").val()!= "") && ($("#senha_antiga").val() == $("#senha_nova").val())) {
                $("#btn_salvar_senha").prop('disabled',false);
            } else {
                $("#btn_salvar_senha").prop('disabled',true);
            }
        });
    </script>
</body>

</html>