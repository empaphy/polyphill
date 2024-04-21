include makephile.mk

.SHELLFLAGS := -ce
SHELL       := bash

VENDOR_DIR ?= var/www/${PHP_VERSION}/html/vendor

export PHP_VERSION ?= 5.6

##
# Build Docker images (for testing)
#
.PHONY: build
build:
	$(phil_target_info)
	@docker compose build

.PHONY: clean
clean:
	$(phil_target_info)
	git clean -d -X --force

.PHONY: down
down:
	$(phil_target_info)
	@docker compose down --volumes --remove-orphans

##
# Run unit tests
#
.PHONY: test
test: $(VENDOR_DIR)
	$(phil_target_info)
	@docker compose run --rm php vendor/bin/phpunit

.PHONY: tests
tests:
	$(phil_target_info)
	@$(MAKE) test PHP_VERSION=5.6
	@$(MAKE) test PHP_VERSION=7.0
	@$(MAKE) test PHP_VERSION=7.1
	@$(MAKE) test PHP_VERSION=7.2
	@$(MAKE) test PHP_VERSION=7.3
	@$(MAKE) test PHP_VERSION=7.4
	@$(MAKE) test PHP_VERSION=8.0
	@$(MAKE) test PHP_VERSION=8.1
	@$(MAKE) test PHP_VERSION=8.2
	@$(MAKE) test PHP_VERSION=8.3

##
# Update composer dependencies.
#
$(VENDOR_DIR):
	$(phil_target_info)
	@docker compose run --rm php composer update
