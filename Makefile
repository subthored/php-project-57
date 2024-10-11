start:
	php artisan serve --host 0.0.0.0

start-frontend:
	npm run dev

setup:
	composer install

migrate:
	php artisan migrate

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml

lint:
	composer exec --verbose phpcs

lint-fix:
	composer exec -verbose phpcbf
