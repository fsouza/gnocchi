test: unit

unit:
	@echo 'Running unit tests...'
	@phpunit --verbose --colors --syntax-check --bootstrap tests/bootstrap.php tests
	@echo 'Done.'
