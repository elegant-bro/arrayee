docker:=docker run --rm -u=$(shell id -u):$(shell id -g) -v $(CURDIR):/app -w /app elegant-bro/arrayee:7.4

build:
	docker build --build-arg VERSION=7.4 --tag elegant-bro/arrayee:7.4 ./docker/

exec:
	docker run --rm -ti -u=$(shell id -u):$(shell id -g) -v $(CURDIR):/app:rw -w /app elegant-bro/arrayee:7.4 sh

install:
	$(docker) composer install

install-no-dev:
	$(docker) composer install --no-dev

style-check:
	$(docker) vendor/bin/ecs --level psr12 check src

unit:
	$(docker) -dzend_extension=xdebug.so -dxdebug.mode=coverage  vendor/bin/phpunit

coverage:
	$(docker) php check-coverage.php coverage.xml 100

all: build install style-check unit coverage
