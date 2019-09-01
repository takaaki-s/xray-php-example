docker-compose exec php composer --working-dir=/var/www/html/xray install
docker-compose exec php cp /var/www/html/xray/.env.development /var/www/html/xray/.env
docker-compose exec php php /var/www/html/xray/artisan key:generate
docker-compose exec php php /var/www/html/xray/artisan migrate:refresh --seed
