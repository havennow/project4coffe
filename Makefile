MAKE_BUILD=./.docker/build.sh

NIX_OS := $(shell uname -s)

ifeq ($(OS),Windows_NT)
	EXECUTABLE=winpty
else
	EXECUTABLE=
endif

build: ## Build containers images
	make env && $(MAKE_BUILD)

migrate: ## Build containers images
	clear && $(EXECUTABLE) docker run -it -v $(PWD):/var/www phpinstallp4c bash -c "php artisan migrate && php artisan db:seed && php artisan route:clear"

install: ## Run composer, install vendor
	clear && docker-compose up -d
	rm -rf vendor node_modules;\
	docker run -it -v $(PWD):/var/www phpinstallp4c bash -c "composer install && yarn install"

clear: ## Run composer, install vendor
	docker-compose down && clear && $(EXECUTABLE) docker run -it -v $(PWD):/var/www phpinstallp4c bash -c "php artisan config:clear && php artisan cache:clear && php artisan route:clear"

start: ## Up containers with fpm
	export WEBSERVER_MODE=artisan ; \
	make env && docker-compose up -d

stop: ## Stop containers
	docker-compose stop

ps: ## PS docker
	docker-compose ps

logs: ## PS docker
	docker-compose logs -f $(container)

env: ## Copy .env.example to .env
	if [ ! -f .env ] ; \
    then \
         cp .env.example .env ; \
    fi;

orphan-clear: ## Remove orphan container
	docker-compose up -d --remove-orphan

shell: ## Access bash in, core container
	clear && $(EXECUTABLE) docker run -it -v $(PWD):/var/www phpinstallp4c bash

shell-container: ## Access bash in, core container
	clear && $(EXECUTABLE) docker-compose exec app bash

help: ## This help.
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.DEFAULT_GOAL := help
