PWD = $(shell pwd)
BASENAME_LOWER = $(shell basename $(PWD) | tr '[:upper:]' '[:lower:]')

install: build up dbmigrate composer_install
	
build:
	docker-compose build
	
up:
	docker-compose up -d
	
composer_install: 
	docker run --rm -v $(shell pwd):/app composer/composer install

composer_update:
	docker run --rm -v $(shell pwd):/app composer/composer update

wait_for_mysql:
	docker run --rm \
	--net $(BASENAME_LOWER)_default \
	--link worldmariadb:mysql \
	-v $(shell pwd)/docker/mariadb/sh:/app \
	busybox sh -c "chmod +x /app/wait.sh; /app/wait.sh"
	

dbmigrate: wait_for_mysql
	docker run --rm \
	--net $(BASENAME_LOWER)_default \
	--link worldmariadb:mysql \
	-v $(shell pwd)/docker/flyway/conf:/flyway/conf \
	-v $(shell pwd)/docker/flyway/migrations:/flyway/sql \
	jyore/flyway migrate
	
destroy: 
	docker-compose kill
	docker-compose rm -f
