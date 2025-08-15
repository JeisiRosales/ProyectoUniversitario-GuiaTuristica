# PROYECTO UNIVERSITARIO
## Guia Turistica - Julio 2025

### 📖 Descripción del Proyecto

Este proyecto es una **aplicación web de guía turística**, desarrollada como parte de la asignatura Sistemas de información I. El objetivo principal fue construir parte de un sistema de información completo y funcional que permita a los usuarios explorar puntos de interés de una determinada región, consultando detalles, ubicaciones y otros datos relevantes. En este caso, las agencias y los servicios que estas ofrecen.

La aplicación fue desarrollada siguiendo un enfoque de ingeniería de software, desde el diseño y modelado con diagramas UML y Entidad-Relación, hasta la implementación de una arquitectura cliente-servidor con un backend robusto en PHP conectado a una base de datos en SQL Server.

---

## ✨ Características Principales

* **Listado de Puntos de Interés:** Cargados dinámicamente desde la base de datos.
* **Búsqueda y Filtros:** Funcionalidad para buscar o filtrar.
* **Interfaz Interactiva:** Uso de JavaScript y JSON para mejorar la experiencia de usuario y cargar datos de forma asíncrona.
* **Diseño Responsivo:** Interfaz adaptada para una correcta visualización en dispositivos móviles y de escritorio.

---

## 🛠️ Tecnologías Utilizadas

### Backend
* **Lenguaje:** PHP 
* **Servidor:** WampServer
* **Base de Datos:** Microsoft SQL Server

### Frontend
* **Estructura:** HTML5
* **Estilos:** CSS3
* **Interactividad:** JavaScript

### Formato de Datos
* **JSON:** Utilizado para el intercambio de datos entre el cliente y el servidor.

### Documentación y Diseño
* Diagrama de Entidad-Relación
* Diagrama de Casos de Uso
* Diagrama de Clases
* Diagrama de Interacción

---

## 🚀 Puesta en Marcha

Para ejecutar este proyecto en tu entorno local, sigue estos pasos:

### Prerrequisitos
* Tener instalado [WampServer](https://www.wampserver.com/en/) (o un entorno similar como XAMPP que soporte PHP y se pueda conectar a SQL Server).
* Tener una instancia de SQL Server en ejecución.
* Contar con una herramienta de gestión de base de datos como SQL Server Management Studio (SSMS).

### Pasos
1.  **Clonar el repositorio:**
    ```bash
    git clone https://github.com/JeisiRosales/ProyectoUniversitario-GuiaTuristica.git
    ```
2.  **Mover el proyecto:**
    Copia la carpeta del proyecto dentro del directorio `www` de tu instalación de WampServer.

3.  **Configurar la Base de Datos:**
    * Abre SSMS y conéctate a tu instancia de SQL Server.
    * Crea una nueva base de datos llamada `infomargarita`.
    * Restaura la base de datos usando el archivo `.bak` que se encuentra en la carpeta `/database` o ejecuta el script `.sql` para crear las tablas y poblar los datos.

4.  **Configurar la conexión:**
    * Busca el archivo de configuración de la base de datos en el proyecto (ej: `config.php` o `conexion.php`).
    * Actualiza las credenciales de conexión (servidor, nombre de la base de datos, usuario y contraseña) para que coincidan con tu configuración local.

5.  **Iniciar el servidor:**
    * Inicia todos los servicios de WampServer.
    * Abre tu navegador y ve a `http://localhost/ProyectoUniversitario-GuiaTuristica/`.

---

## 📄 Documentación

Toda la documentación relacionada con el análisis y diseño del sistema, incluyendo los diagramas de **Entidad-Relación, Casos de Uso, Clases e Interacción**, se encuentra en la carpeta `/documentacion`.
