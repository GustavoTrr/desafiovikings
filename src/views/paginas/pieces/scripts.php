
<!-- jQuery -->
<script src="<?php echo appbaseurl() . '/'; ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo appbaseurl() . '/'; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo appbaseurl() . '/'; ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo appbaseurl() . '/'; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Toastr -->
<script src="<?php echo appbaseurl() . '/'; ?>plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo appbaseurl() . '/'; ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo appbaseurl() . '/'; ?>js/demo.js"></script>
<!-- Summernote -->
<script src="<?php echo appbaseurl() . '/'; ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- page script -->
<script type="text/javascript">
  $(function () {
    <?php 
      if (isset($errors) || (!empty($_SESSION['errors']))) {
        $arrErros = array_merge($errors ?? [], $_SESSION['errors'] ?? []);
        foreach ($arrErros as $indice => $error) {
          $segundos = $indice==0 ? 0 : $indice + 1;
          echo 'setTimeout(function(){ toastr.error("'.$error.'"); },'.($segundos).'000);';
        }
        unset($_SESSION['errors']);
      }
    ?>
  });
</script>