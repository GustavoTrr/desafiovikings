<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page" style="background-color:#000">
  <div class="login-box">
    <div class="login-logo">
      <img src="img/vikingslogo160.png" alt="" style="max-width: -webkit-fill-available;">
      <!-- <a href="index2.html"><b>Vi</b>Kings</a> -->
    </div>
    <!-- /.login-logo -->
    <?php if ($erroDeCredencial ?? false) { ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation"></i> Email não encontrado!</h5>
      </div>
    <?php } ?>
    <?php if (!empty($msgDeSucesso)) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> <?php echo $msgDeSucesso; ?></h5>
      </div>
    <?php } ?>
    <div class="card">
      <div class="card-body login-card-body" style="background-color: #2b2b2b;background-image: linear-gradient(#000,#2b2b2b);">

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="social-auth-links text-center mb-3">
          <button type="submit" class="btn btn-block btn-primary">
            <i class="fa fa-reload"></i> Recuperar minha senha
          </button>
        </div>
        </form>
        <div class="row">
            <div class="col-md-12">
            <a href="login" class="btn btn-primary float-right"> Voltar para Login</a>
            </div>
              
            
            <!-- /.col -->
          </div>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/adminlte.min.js"></script>

</body>

</html>