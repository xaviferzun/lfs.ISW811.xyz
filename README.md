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