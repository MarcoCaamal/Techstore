#!/bin/bash

# Exit on any error
set -e

# Function to wait for database
wait_for_db() {
    echo "Waiting for database..."
    while ! nc -z mysql 3306; do
        sleep 1
    done
    echo "Database is ready!"
}

# Create database.sqlite if it doesn't exist
if [ ! -f /var/www/html/database/database.sqlite ]; then
    echo "Creating SQLite database..."
    touch /var/www/html/database/database.sqlite
    chmod 664 /var/www/html/database/database.sqlite
    chown www-data:www-data /var/www/html/database/database.sqlite
fi

# Set proper permissions
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html
chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache

# Generate application key if not exists
if [ ! -f /var/www/html/.env ]; then
    echo "Creating .env file..."
    cp /var/www/html/.env.example /var/www/html/.env
fi

# Generate app key if not set
if ! grep -q "APP_KEY=.*[^[:space:]]" /var/www/html/.env; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Clear caches
echo "Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Run migrations (commented out for safety - uncomment if needed)
# echo "Running migrations..."
# php artisan migrate --force

# Create storage link
if [ -L /var/www/html/public/storage ]; then
    echo "Removing existing storage link..."
    rm -f /var/www/html/public/storage
fi

if [ ! -L /var/www/html/public/storage ]; then
    echo "Creating storage link..."
    php artisan storage:link
fi

# Start Apache in foreground
echo "Starting Apache..."
apache2-foreground
