# Proyecto 1 - Entregable 1 — ISW-811 Aplicaciones Web con Software Libre

**Estudiante:** Xavier Fernández Zúñiga
**Docente:** Misael Matamoros Soto
**Universidad Técnica Nacional (Costa Rica)**
**Curso:** ISW-811 Aplicaciones Web con Software Libre

## Descripción

Este repositorio documenta mi avance por el curso en línea *Laravel From Scratch 2026* de Jeffrey Way (Laracasts), como parte del Proyecto 1 del curso ISW-811. Cada episodio del curso fue implementado en este proyecto Laravel real, documentado individualmente en la carpeta `docs/`, y subido con un commit independiente por episodio.

La aplicación es un gestor simple de ideas ("IdeasManager") con registro de usuarios, autenticación, y operaciones CRUD sobre ideas asociadas a cada usuario mediante relaciones de Eloquent.

## Documentación

Toda la documentación detallada de cada episodio, incluyendo explicaciones, código relevante, problemas encontrados y capturas de evidencia, está disponible en:

- [`docs/entregable01.md`](docs/entregable01.md) — índice general
- [`docs/the-fundamentals/`](docs/the-fundamentals/) — episodios 1 al 13
- [`docs/authentication-authorization/`](docs/authentication-authorization/) — episodios 14 al 16

## Requisitos previos

- PHP 8.2 o superior
- Composer
- Node.js y npm (para assets, si aplica)
- MariaDB o MySQL
- Servidor web (puede usarse el servidor de desarrollo de Laravel)

## Instrucciones para ejecutar el proyecto

### 1. Clonar el repositorio

```bash
git clone https://github.com/xaviferzun/lfs.ISW811.xyz.git
cd lfs.ISW811.xyz
```

### 2. Instalar dependencias de PHP

```bash
composer install
```

### 3. Configurar el entorno

Copiar el archivo de ejemplo y generar la clave de aplicación:

```bash
cp .env.example .env
php artisan key:generate
```

Editar el archivo `.env` con los datos de tu base de datos MariaDB/MySQL:

```env
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

> **Nota:** evitar puntos (`.`) en el nombre de la base de datos en MariaDB, ya que pueden causar errores de sintaxis en comandos como `migrate:fresh`. Se recomienda usar guiones bajos (`_`) en su lugar.

### 4. Ejecutar las migraciones

```bash
php artisan migrate
```

### 5. Levantar el servidor de desarrollo

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

La aplicación quedará disponible en `http://localhost:8000` (o en la IP correspondiente si se ejecuta dentro de una máquina virtual).

## Flujo de uso de la aplicación

1. Visitar `/register` para crear una cuenta nueva.
2. Tras registrarse, el usuario queda autenticado automáticamente y es redirigido a `/ideas`.
3. Desde `/ideas` se pueden crear, ver, editar y eliminar ideas propias.
4. Cada usuario ve únicamente sus propias ideas (relación `User` ↔ `Idea` mediante Eloquent).
5. El botón "Log Out" en el navbar cierra la sesión y redirige a `/login`.

## Estructura relevante del proyecto
lfs.ISW811.xyz/

├── app/

│   ├── Http/Controllers/        (IdeaController, controladores de Auth)

│   ├── Http/Requests/           (IdeaRequest)

│   └── Models/                  (Idea, User)

├── database/migrations/         (creación de tablas ideas, users, etc.)

├── docs/                        (documentación por episodio)

├── resources/views/             (vistas Blade, componentes y layout)

└── routes/web.php               (definición de rutas)

## Tecnologías utilizadas

- Laravel 12
- PHP 8.2
- MariaDB
- TailwindCSS
- DaisyUI
- Blade Components