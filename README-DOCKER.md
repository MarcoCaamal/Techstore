# TechStore - Docker Setup

Este proyecto incluye una configuración completa de Docker para desarrollar y desplegar la aplicación TechStore.

## 🚀 Inicio Rápido

### Prerrequisitos
- Docker
- Docker Compose
- Make (opcional, para comandos simplificados)

### Configuración Inicial

1. **Clonar el repositorio y navegar al directorio:**
   ```bash
   cd techstore-backend
   ```

2. **Copiar el archivo de configuración:**
   ```bash
   cp .env.docker .env
   ```

3. **Construir las imágenes:**
   ```bash
   docker-compose build
   # O usando Make:
   make build
   ```

4. **Iniciar los contenedores:**
   ```bash
   docker-compose up -d
   # O usando Make:
   make up
   ```

5. **Generar la clave de la aplicación:**
   ```bash
   docker-compose exec app php artisan key:generate
   # O usando Make:
   make key
   ```

6. **Ejecutar migraciones (opcional):**
   ```bash
   docker-compose exec app php artisan migrate
   # O usando Make:
   make migrate
   ```

7. **Ejecutar seeders (opcional):**
   ```bash
   docker-compose exec app php artisan db:seed
   # O usando Make:
   make seed
   ```

## 📋 Servicios Disponibles

### Aplicación Laravel
- **URL**: http://localhost:8000
- **Contenedor**: `techstore_app`
- **Base de datos**: SQLite (por defecto)

### MySQL (Opcional)
- **Puerto**: 3306
- **Usuario**: techstore_user
- **Contraseña**: techstore_password
- **Base de datos**: techstore

### Redis (Opcional)
- **Puerto**: 6379

## 🛠️ Comandos Útiles

### Usando Docker Compose

```bash
# Iniciar contenedores
docker-compose up -d

# Ver logs
docker-compose logs -f app

# Acceder al shell del contenedor
docker-compose exec app bash

# Ejecutar comandos de Artisan
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
docker-compose exec app php artisan cache:clear

# Ejecutar tests
docker-compose exec app php artisan test

# Instalar dependencias
docker-compose exec app composer install
docker-compose exec app npm install

# Detener contenedores
docker-compose down
```

### Usando Make (Más Simple)

```bash
# Ver todos los comandos disponibles
make help

# Comandos principales
make build      # Construir imágenes
make up         # Iniciar contenedores
make down       # Detener contenedores
make logs       # Ver logs
make shell      # Acceder al shell
make migrate    # Ejecutar migraciones
make seed       # Ejecutar seeders
make test       # Ejecutar tests
make clean      # Limpiar recursos Docker
```

## 🔧 Configuración de Base de Datos

### SQLite (Por Defecto)
La configuración por defecto usa SQLite, que es más simple para desarrollo:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/var/www/html/database/database.sqlite
```

### MySQL (Opcional)
Si prefieres usar MySQL, modifica el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=techstore
DB_USERNAME=techstore_user
DB_PASSWORD=techstore_password
```

## 📁 Estructura de Archivos Docker

```
├── Dockerfile                 # Imagen principal de Laravel
├── docker-compose.yml         # Configuración de servicios
├── .dockerignore              # Archivos a ignorar en Docker
├── .env.docker                # Configuración de ejemplo
├── Makefile                   # Comandos simplificados
├── docker/
│   ├── apache/
│   │   └── 000-default.conf   # Configuración de Apache
│   └── entrypoint.sh          # Script de inicio
└── README-DOCKER.md           # Esta documentación
```

## 🚀 Despliegue en Producción

Para producción, modifica las siguientes configuraciones:

1. **Variables de entorno:**
   ```env
   APP_ENV=production
   APP_DEBUG=false
   ```

2. **Base de datos:**
   Usa MySQL o PostgreSQL en lugar de SQLite

3. **Volúmenes:**
   Configura volúmenes persistentes para la base de datos

4. **Seguridad:**
   - Usa contraseñas seguras
   - Configura SSL/TLS
   - Restringe puertos expuestos

## 🐛 Solución de Problemas

### Problemas de Permisos
```bash
# Corregir permisos de storage
docker-compose exec app chown -R www-data:www-data /var/www/html/storage
docker-compose exec app chmod -R 775 /var/www/html/storage
```

### Limpiar Caché
```bash
make cache-clear
# O manualmente:
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan view:clear
```

### Reconstruir Completamente
```bash
make clean
make build
make up
```

## 📝 Notas Adicionales

- Los archivos de la aplicación se montan como volumen para desarrollo
- Los logs están disponibles en `storage/logs/`
- Para desarrollo, mantén `APP_DEBUG=true`
- Para producción, asegúrate de tener `APP_DEBUG=false`

¡Tu aplicación TechStore estará disponible en http://localhost:8000! 🎉
