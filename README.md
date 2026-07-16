## Comandos del proyecto

### Configuración inicial
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
```

### Desarrollo
```bash
php artisan serve --host=0.0.0.0 --port=8000
composer run format
./vendor/bin/pest
```

### Colas y notificaciones
```bash
php artisan queue:work
mailpit --listen 0.0.0.0:8025 --smtp 0.0.0.0:1025
```

### Despliegue

El proceso de despliegue a producción (Laravel Forge) se documenta sin ejecutar en [Deploy And Then Implement A Feature Request](./docs/final-project/deploy-and-then-implement-a-feature-request.md), conforme a la observación del entregable que no exige contratar servicios externos.