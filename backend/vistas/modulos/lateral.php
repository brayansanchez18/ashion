<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?=$backend?>" class="brand-link">
    <img src="vistas/img/icono.png" alt="Ashion" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Ashion</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="vistas/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a class="d-block">Alexander Pierce</a>
        <br>
        <div>
          <a href="<?=$backend?>perfil"><button type="button" class="btn btn-primary">Editar</button></a>
          <a href="<?=$backend?>salir"><button type="button" class="btn btn-danger">Salir</button></a>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?=$backend?>inicio" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Inicio</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?=$backend?>comercio" class="nav-link">
            <i class="nav-icon fas fa-store"></i>
            <p>Gestor Comercio</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?=$backend?>banner" class="nav-link">
            <i class="nav-icon fas fa-ellipsis-h"></i>
            <p>Gestor Banner</p>
          </a>
        </li>

        <li class="nav-item">
          <a style="cursor:pointer;" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Gestor Categorías
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=$backend?>categorias" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Categorías</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=$backend?>subcategorias" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Subcategorías</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="<?=$backend?>productos" class="nav-link">
            <i class="nav-icon fas fa-boxes"></i>
            <p>Gestor Productos</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?=$backend?>ventas" class="nav-link">
            <i class="nav-icon fas fa-dollar-sign"></i>
            <p>Gestor Ventas</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?=$backend?>usuarios" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Gestor Usuarios</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?=$backend?>mensajes" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>Gestor Mensajes</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?=$backend?>perfiles" class="nav-link">
            <i class="nav-icon fas fa-user-lock"></i>
            <p>Gestor Perfiles</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>