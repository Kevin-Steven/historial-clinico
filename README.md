# Sistema de Gestión de Historiales Clínicos

## 📋 Descripción General

Sistema web completo para la gestión integral de historiales clínicos y datos de pacientes, desarrollado específicamente para unidades de salud. Permite el registro, consulta, edición y generación de reportes médicos de manera eficiente y segura.

## ✨ Características Principales

### 🏥 Gestión de Pacientes
- **Registro Completo**: Formulario integral para datos personales, contacto y información médica
- **Búsqueda y Filtrado**: Sistema de búsqueda avanzada para localizar pacientes rápidamente
- **Edición de Datos**: Actualización segura de información de pacientes existentes
- **Eliminación Controlada**: Sistema de confirmación para eliminación de registros

### 📊 Historiales Médicos
- **Examen Físico Completo**: Registro detallado de signos vitales y examen por sistemas
- **Antecedentes Patológicos**: Gestión de historial médico familiar y personal
- **Antecedentes de Discapacidad**: Registro especializado para casos de discapacidad
- **Diagnósticos**: Sistema de registro y seguimiento de diagnósticos médicos
- **Tratamientos**: Documentación de planes terapéuticos y medicamentos

### 📈 Reportes y Análisis
- **Reportes Rápidos**: Generación instantánea de estadísticas básicas
- **Reportes por Enfermedades**: Análisis epidemiológico por patologías
- **Exportación PDF**: Generación de informes profesionales en formato PDF
- **Dashboard Interactivo**: Panel principal con métricas en tiempo real

### 🔐 Seguridad y Autenticación
- **Sistema de Login**: Autenticación segura de usuarios
- **Gestión de Sesiones**: Control de acceso y timeouts automáticos
- **Protección de Datos**: Validación y sanitización de datos de entrada

## 🛠️ Tecnologías Utilizadas

### Backend
- **PHP 7.4+**: Lógica del servidor y procesamiento de datos
- **MySQL 5.7+**: Base de datos relacional para almacenamiento
- **FPDF**: Generación de documentos PDF

### Frontend
- **HTML5**: Estructura semántica de páginas
- **CSS3**: Diseño moderno con gradientes y animaciones
- **Bootstrap 5.3.3**: Framework responsive y componentes UI
- **JavaScript**: Interactividad y validaciones del lado cliente
- **Boxicons**: Iconografía moderna y consistente

### Herramientas de Desarrollo
- **Git**: Control de versiones
- **Responsive Design**: Adaptable a dispositivos móviles y desktop

## 📁 Estructura del Proyecto

```
Historial-Clinico/
├── app/
│   ├── components/          # Componentes reutilizables
│   │   ├── sidebar.php     # Menú lateral de navegación
│   │   └── footer.php      # Pie de página
│   ├── config/             # Configuración del sistema
│   │   └── config.php      # Conexión a base de datos
│   ├── logic/              # Lógica de negocio
│   │   ├── pdf/           # Generación de PDFs
│   │   ├── procesarFormulario.php
│   │   ├── eliminarPaciente.php
│   │   ├── actualizarDatos.php
│   │   └── logout.php
│   └── pages/              # Páginas principales
│       ├── login.php       # Página de inicio de sesión
│       ├── inicio.php      # Dashboard principal
│       ├── formIngresoPaciente.php
│       ├── tablaPacientes.php
│       ├── editarPaciente.php
│       └── reportes.php
├── css/                    # Estilos del sistema
│   ├── estilos.css        # Estilos principales
│   ├── sidebar.css        # Estilos del menú lateral
│   ├── dashboard.css      # Estilos del dashboard
│   └── base.css           # Estilos base
├── db/                     # Base de datos
│   └── historialClinico.sql
├── images/                 # Recursos gráficos
│   ├── LogoISTJBA.png
│   ├── heart-beats.png
│   └── Unidad-de-Salud-logo.png
├── fpdf/                   # Librería PDF
└── README.md
```

## 🚀 Instalación y Configuración

### Requisitos del Sistema
- **Servidor Web**: Apache 2.4+ o Nginx
- **PHP**: Versión 7.4 o superior
- **MySQL**: Versión 5.7 o superior
- **Extensiones PHP**: mysqli, session, date

### Pasos de Instalación

1. **Clonar el Repositorio**
   ```bash
   git clone [URL_DEL_REPOSITORIO]
   cd Historial-Clinico
   ```

2. **Configurar Base de Datos**
   ```sql
   -- Crear base de datos
   CREATE DATABASE historial_clinico;
   
   -- Importar estructura
   mysql -u usuario -p historial_clinico < db/historialClinico.sql
   ```

3. **Configurar Conexión**
   ```php
   // Editar app/config/config.php
   $servername = "localhost";
   $username = "tu_usuario";
   $password = "tu_contraseña";
   $dbname = "historial_clinico";
   ```

4. **Configurar Servidor Web**
   - Apuntar el DocumentRoot a la carpeta del proyecto
   - Asegurar permisos de escritura en directorios necesarios

5. **Acceder al Sistema**
   - URL: `http://localhost/Historial-Clinico/app/pages/login.php`
   - Crear usuario administrador en la base de datos

## 📱 Funcionalidades por Módulo

### Dashboard (inicio.php)
- Estadísticas en tiempo real de pacientes
- Acciones rápidas para funciones principales
- Lista de pacientes recientes con avatares
- Indicadores de estado del sistema

- <img width="1919" height="906" alt="image" src="https://github.com/user-attachments/assets/fd9e6fe0-5aa3-4fa9-b6af-cf484301bfbb" />


### Gestión de Pacientes (tablaPacientes.php)
- Tabla responsive con todos los pacientes
- Acciones de editar, eliminar y generar PDF
- Modal moderno de confirmación para eliminaciones
- Búsqueda y filtrado de registros

### Formularios (formIngresoPaciente.php, editarPaciente.php)
- Formularios multi-sección organizados
- Validación en tiempo real
- Diseño moderno con iconos y grupos de entrada
- Guardado automático y confirmaciones

### Reportes (reportes.php)
- Generación de reportes rápidos
- Filtros por fechas y criterios
- Exportación a PDF
- Visualización de estadísticas

## 🎨 Características de Diseño

### Interfaz de Usuario
- **Diseño Moderno**: Interfaz limpia con gradientes y sombras suaves
- **Responsive**: Adaptable a dispositivos móviles y tablets
- **Iconografía Consistente**: Uso de Boxicons para iconos uniformes
- **Animaciones Suaves**: Transiciones CSS para mejor experiencia

### Sistema de Colores
- **Primario**: Azul (#0041f2) para elementos principales
- **Secundario**: Gris (#6c757d) para elementos secundarios
- **Éxito**: Verde para confirmaciones
- **Peligro**: Rojo para eliminaciones y errores
- **Advertencia**: Amarillo para alertas

### Componentes UI
- **Sidebar Moderno**: Menú lateral con navegación intuitiva
- **Cards Elegantes**: Tarjetas con sombras y bordes redondeados
- **Botones Estilizados**: Botones con efectos hover y estados
- **Modales Avanzados**: Ventanas modales con animaciones

## 🔧 Mantenimiento y Soporte

### Logs del Sistema
- Errores PHP registrados en logs del servidor
- Validaciones de entrada documentadas
- Seguimiento de sesiones de usuario

### Backup y Seguridad
- Respaldo regular de base de datos recomendado
- Validación de datos en frontend y backend
- Protección contra inyección SQL

### Actualizaciones
- Estructura modular facilita actualizaciones
- CSS organizado por componentes
- JavaScript separado por funcionalidad

## 👨‍💻 Desarrollado por

**Kevin Barzola Villamar**
- Email: kbarzolav.istjba@gmail.com
- Institución: Instituto Superior Tecnológico Juan Bautista Aguirre

## 📄 Licencia

Este proyecto está desarrollado para uso académico y profesional en el sector salud.

---

*Sistema desarrollado con ❤️ para mejorar la gestión de historiales clínicos en unidades de salud.*
