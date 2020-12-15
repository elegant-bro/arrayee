[![Build Status](https://travis-ci.com/elegant-bro/arrayee.svg?branch=master)](https://travis-ci.com/elegant-bro/arrayee)
# Work with arrays in elegant way

## For contributors 

**Pass all tests locally before create pull request.**

Build container
```shell
docker build --build-arg VERSION=7.4 --tag elegant-bro/arrayee:7.4 ./docker/
```
Install dependencies
```shell
docker run --rm -ti -v $PWD:/app elegant-bro/arrayee:7.4 composer install
```

Run tests
```shell
docker run --rm -ti -v $PWD:/app -w /app elegant-bro/arrayee:7.4 vendor/bin/phpunit
```

Ensure coverage is 100%
```shell
docker run --rm -ti -v $PWD:/app -w /app elegant-bro/arrayee:7.4 php check-coverage.php coverage.xml 100
```

Test code style
```shell
docker run --rm -ti -v $PWD:/app -w /app elegant-bro/arrayee:7.4 vendor/bin/ecs --level psr12 check src
```

All tests
```shell
docker run --rm -ti -v $PWD:/app -w /app elegant-bro/arrayee:7.4 vendor/bin/phpunit && php check-coverage.php coverage.xml 100 && vendor/bin/ecs --level psr12 check src
```
