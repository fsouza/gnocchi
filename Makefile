all: test

test: unit

unit:
	@echo 'Running unit tests...'
	@phpunit --no-configuration --verbose --colors --syntax-check --bootstrap tests/bootstrap.php tests
	@echo 'Done.'
