#!/bin/bash
set -e

PORT="${PORT:-8080}"
sed -i "s/PORT_PLACEHOLDER/${PORT}/" /etc/nginx/http.d/default.conf

cd /var/www/html
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true

if [ -z "$APP_KEY" ]; then
    echo "WARNING: APP_KEY not set. Generating a temporary one for this run."
    echo "         Set a permanent APP_KEY in your host environment variables!"
    export APP_KEY=$(php artisan key:generate --show --no-interaction 2>/dev/null | tr -d '\r\n')
fi

php artisan config:cache || true
php artisan route:cache  || true
php artisan view:cache   || true

php artisan migrate --force || echo "WARNING: migration failed — starting anyway" >&2

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
