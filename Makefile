all: test

test: unit

unit:
	@echo 'Running unit tests...'
	@phpunit --no-configuration --verbose --colors --syntax-check --bootstrap tests/bootstrap.php tests

doc:
	@echo 'Building the docs...'
	@cd docs && make html
