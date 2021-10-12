<!-- Notifications Dropdown Menu -->
<li class="nav-item dropdown">
  <a class="nav-link" data-toggle="dropdown" style="cursor:pointer;">
    <i class="far fa-bell"></i>
    <span class="badge badge-warning navbar-badge">3</span>
  </a>
  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <span class="dropdown-item dropdown-header">3 Notificaciones</span>

    <div class="dropdown-divider"></div>
    <a href="<?=$backend?>usuarios" class="dropdown-item">
      <i class="fas fa-users mr-2"></i> 5 nuevos usuarios registrados hoy
    </a>

    <div class="dropdown-divider"></div>
    <a href="<?=$backend?>ventas" class="dropdown-item">
      <i class="fas fa-dollar-sign mr-2"></i> 3 nuevas ventas hoy
    </a>

    <div class="dropdown-divider"></div>
    <a href="<?=$backend?>vistas" class="dropdown-item">
      <i class="far fa-eye mr-2"></i> 55 nuevas vistas hoy
    </a>
  </div>
</li>