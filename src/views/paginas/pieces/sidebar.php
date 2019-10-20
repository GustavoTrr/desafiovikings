<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo appbaseurl(); ?>" class="brand-link">
      <img src="img/logocircle.png"
           alt="Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo getconfig('APP_NAME');?></span>
    </a>
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/user-profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo authuser()->nome; ?></a>
        </div>
      </div>
<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Cartórios
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="cartorios" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Listar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="cartorios/cadastrar" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Cadastrar</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="comunicado/enviar-email" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Enviar Mensagem
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="alterar-senha" class="nav-link">
                <i class="nav-icon fas fa-key"></i>
                <p>
                    Alterar Senha
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
      
    </div>
    <!-- /.sidebar -->
  </aside>