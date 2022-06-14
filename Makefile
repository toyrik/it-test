up: docker-up
down: docker-down
restart: docker-down docker-up
init: docker-down-clear docker-pull docker-build docker-up bookshelf-init

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

bookshelf-init: bookshelf-composer-install bookshelf-migrations

bookshelf-composer-install:
	docker-compose run --rm php-cli composer install

bookshelf-migrations:
	docker-compose run --rm php-cli php bin/console doctrine:migrations:migrate --no-interaction
	docker-compose run --rm php-cli chmod 777 var/data.db