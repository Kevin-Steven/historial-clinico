<!-- Ultra Modern Sidebar -->
<div class="ultra-modern-sidebar" id="sidebar">
    <!-- Sidebar Background Effects -->
    <div class="sidebar-bg-effects">
        <div class="bg-gradient"></div>
        <div class="floating-particles">
            <div class="particle" style="--delay: 0s; --duration: 8s;"></div>
            <div class="particle" style="--delay: 2s; --duration: 10s;"></div>
            <div class="particle" style="--delay: 4s; --duration: 12s;"></div>
            <div class="particle" style="--delay: 6s; --duration: 14s;"></div>
        </div>
    </div>
    
    <!-- Sidebar Header -->
    <div class="modern-sidebar-header">
        <div class="header-content">
            <div class="logo-container">
                <div class="logo-glow-effect">
                    <img src="../../images/heart.png" alt="Logo" class="modern-sidebar-logo">
                </div>
                <div class="brand-info">
                    <h4 class="brand-name">Unidad de Salud</h4>
                    <p class="brand-tagline">Sistema Médico</p>
                </div>
            </div>
            <button class="modern-close-btn" id="sidebarClose">
                <i class='bx bx-x'></i>
            </button>
        </div>
        <div class="header-divider"></div>
    </div>
    
    <!-- Navigation Menu -->
    <nav class="modern-sidebar-nav">
        <div class="nav-section">
            <h6 class="nav-section-title">Navegación Principal</h6>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="inicio.php#inicio" class="modern-nav-link active">
                        <div class="link-icon">
                            <i class='bx bx-home'></i>
                        </div>
                        <span class="link-text">Inicio</span>
                        <div class="link-indicator"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../pages/formIngresoPaciente.php" class="modern-nav-link">
                        <div class="link-icon">
                            <i class='bx bx-file-blank'></i>
                        </div>
                        <span class="link-text">Formulario</span>
                        <div class="link-indicator"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../pages/tablaPacientes.php" class="modern-nav-link">
                        <div class="link-icon">
                            <i class='bx bx-group'></i>
                        </div>
                        <span class="link-text">Pacientes</span>
                        <div class="link-indicator"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../pages/reportes.php" class="modern-nav-link">
                        <div class="link-icon">
                            <i class='bx bx-bar-chart-alt-2'></i>
                        </div>
                        <span class="link-text">Reportes</span>
                        <div class="link-indicator"></div>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="nav-section">
            <h6 class="nav-section-title">Sistema</h6>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="modern-nav-link logout-link" id="logout-sidebar">
                        <div class="link-icon">
                            <i class='bx bx-log-out'></i>
                        </div>
                        <span class="link-text">Cerrar Sesión</span>
                        <div class="link-indicator"></div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-avatar">
                <i class='bx bx-user'></i>
            </div>
            <div class="user-details">
                <p class="user-name">Sistema Médico</p>
                <p class="user-status">En línea</p>
            </div>
        </div>
    </div>
</div>

<!-- Modern Toggle Button -->
<button class="ultra-modern-toggle" id="sidebarToggle">
    <div class="toggle-icon">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
    </div>
    <div class="toggle-ripple"></div>
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
