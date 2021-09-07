install: start init assets-install migrate assets-dev

init:
	docker-compose run --rm app composer install
	sudo chmod -R 777 storage/
	cp .env.example .env
	docker-compose run --rm app php artisan key:generate

start:
	docker-compose up -d

down:
	docker-compose down -v

restart: down
	docker-compose up -d --build

migrate:
	docker-compose run --rm app php artisan migrate -n

test:
	docker-compose run --rm app vendor/bin/phpunit

assets-install:
	docker-compose run --rm node npm install

assets-dev:
	docker-compose run --rm node npm run dev

assets-watch:
	docker-compose run --rm node npm run watch
