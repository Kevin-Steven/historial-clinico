<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src="../images/heart.png" alt="Logo" class="sidebar-logo">
        <h5 class="sidebar-title">Unidad de Salud</h5>
        <button class="sidebar-close" id="sidebarClose">&times;</button>
    </div>
    
    <nav class="sidebar-nav">
        <a href="inicio.php#inicio" class="sidebar-link">
            <i class='bx bx-home'></i>
            <span>Inicio</span>
        </a>
        <a href="inicio.php#form" class="sidebar-link">
            <i class='bx bx-file-blank'></i>
            <span>Formulario</span>
        </a>
        <a href="inicio.php#pacientes" class="sidebar-link">
            <i class='bx bx-group'></i>
            <span>Pacientes</span>
        </a>
        <a href="inicio.php#reportes" class="sidebar-link">
            <i class='bx bx-bar-chart-alt-2'></i>
            <span>Reportes</span>
        </a>
        <a href="#" class="sidebar-link" id="logout-sidebar">
            <i class='bx bx-log-out'></i>
            <span>Salir</span>
        </a>
    </nav>
</div>

<!-- Sidebar Toggle Button -->
<button class="sidebar-toggle" id="sidebarToggle">
    <i class='bx bx-menu'></i>
</button>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

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
                <a href="logout.php" class="btn btn-primary">Aceptar</a>
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
    document.querySelectorAll('.sidebar-link:not(#logout-sidebar)').forEach(link => {
        link.addEventListener('click', closeSidebar);
    });

    // Logout modal
    logoutLink.addEventListener('click', function(e) {
        e.preventDefault();
        var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
        logoutModal.show();
        closeSidebar();
    });
});
</script>
