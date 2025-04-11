up:
	docker compose up -d

stop:
	docker compose stop

down:
	docker compose down

up_build:
	docker compose up -d --build

cli:
	docker compose exec php_user_service bash

tinker:
	docker compose exec -u 0 php_user_service php artisan tinker

npm-dev:
	docker compose exec node_carsharing npm run dev

npm-build:
	docker compose exec node_carsharing npm run build

npm-install:
	docker compose exec node_carsharing npm install
