test: unit

unit:
	@echo 'Running unit tests...'
	@phpunit --verbose --colors --syntax-check tests
	@echo 'Done.'
