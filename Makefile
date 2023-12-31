go:
	php spark serve
PORT ?= 6985
start:
	PHP_CLI_SERVER_WORKERS=5 php -S 0.0.0.0:$(PORT)  -t public
install:
	composer install
validate:
	composer validate
lint:
	composer exec --verbose phpcs -- --standard=PSR12 app tests --ignore=public/