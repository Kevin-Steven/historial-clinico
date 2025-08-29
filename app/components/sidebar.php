<!-- Ultra Modern Sidebar -->
<div class="ultra-modern-sidebar" id="sidebar">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <a href="../pages/inicio.php" class="sidebar-brand">
            <div class="brand-icon">
                <i class='bx bx-heart'></i>
            </div>
            <div class="brand-text">
                <h5>Historial Clínico</h5>
                <small>Sistema Médico</small>
            </div>
        </a>
    </div>
    
<?php
// Obtener el nombre del archivo actual
$current_page = basename($_SERVER['PHP_SELF']);
?>
    <!-- Navigation Menu -->
    <div class="sidebar-menu-section">
        <h6 class="menu-section-title">Principal</h6>
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="../pages/inicio.php" class="sidebar-nav-link <?php echo ($current_page == 'inicio.php') ? 'active' : ''; ?>">
                    <div class="nav-link-icon"><i class='bx bx-home'></i></div>
                    <span class="nav-link-text">Inicio</span>
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="../pages/formIngresoPaciente.php" class="sidebar-nav-link <?php echo ($current_page == 'formIngresoPaciente.php') ? 'active' : ''; ?>">
                    <div class="nav-link-icon"><i class='bx bx-user-plus'></i></div>
                    <span class="nav-link-text">Nuevo Paciente</span>
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="../pages/tablaPacientes.php" class="sidebar-nav-link <?php echo ($current_page == 'tablaPacientes.php' || $current_page == 'editarPaciente.php') ? 'active' : ''; ?>">
                    <div class="nav-link-icon"><i class='bx bx-group'></i></div>
                    <span class="nav-link-text">Pacientes</span>
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="../pages/reportes.php" class="sidebar-nav-link <?php echo ($current_page == 'reportes.php') ? 'active' : ''; ?>">
                    <div class="nav-link-icon"><i class='bx bx-file-blank'></i></div>
                    <span class="nav-link-text">Reportes</span>
                </a>
            </li>
        </ul>
    </div>
    
    <div class="sidebar-menu-section">
        <h6 class="menu-section-title">Sistema</h6>
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="#" class="sidebar-nav-link logout-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <div class="nav-link-icon"><i class='bx bx-log-out'></i></div>
                    <span class="nav-link-text">Cerrar Sesión</span>
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
        <div class="sidebar-user-info">
            <div class="user-avatar">
                <i class='bx bx-user'></i>
            </div>
            <div class="user-details">
                <p class="user-name"><?php echo isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : 'Usuario'; ?></p>
                <p class="user-role">Médico</p>
            </div>
        </div>
    </div>
</div>

<!-- Toggle Button (Mobile Only) -->
<button class="ultra-modern-toggle" id="sidebarToggle">
    <i class='bx bx-menu'></i>
</button>

<!-- Enhanced Overlay -->
<div class="modern-sidebar-overlay" id="sidebarOverlay"></div>

<!-- Modal de Confirmación -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Unidad de Salud</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea salir?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="../logic/logout.php" class="btn btn-primary">Aceptar</a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarClose = document.getElementById('sidebarClose');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const logoutLink = document.getElementById('logout-sidebar');

    // Toggle sidebar
    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.add('active');
        sidebarOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    // Close sidebar
    function closeSidebar() {
        sidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    sidebarClose.addEventListener('click', closeSidebar);
    sidebarOverlay.addEventListener('click', closeSidebar);

    // Close sidebar when clicking on links
    document.querySelectorAll('.sidebar-nav-link').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                closeSidebar();
            }
        });
    });

    logoutLink.addEventListener('click', function(e) {
        e.preventDefault();
        var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
        logoutModal.show();
        closeSidebar();
    });
});
</script>
