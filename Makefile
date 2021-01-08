default_php_version:=7.4
php_version:=$(PHP_VERSION)
ifndef PHP_VERSION
	php_version:=$(default_php_version)
endif
docker:=docker run --rm -u=$(shell id -u):$(shell id -g) -v $(CURDIR):/app -w /app elegant-bro/arrayee:$(php_version)

build:
	docker build --build-arg VERSION=$(php_version) --tag elegant-bro/arrayee:$(php_version) ./docker/

exec:
	docker run --rm -ti -u=$(shell id -u):$(shell id -g) -v $(CURDIR):/app:rw -w /app elegant-bro/arrayee:$(php_version) sh

install:
	$(docker) composer install

install-no-dev:
	$(docker) composer install --no-dev

style-check:
	$(docker) vendor/bin/phpcs -p --standard=PSR12 src

style-fix:
	$(docker) vendor/bin/phpcbf -p --standard=PSR12 src

unit:
	$(docker) -dzend_extension=xdebug.so -dxdebug.mode=coverage  vendor/bin/phpunit

coverage:
	$(docker) php check-coverage.php coverage.xml 100

all: build install style-check unit coverage
