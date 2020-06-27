help: list

list:
	@echo "Makefile Commands:"
	@echo "- 'make ext-build'        Rebuilds the chrome extension for local testing"

web-build:
	cd website && ng build --prod --output-path ../docs --base-href=https://prairiewatch.dog/
	cd ..
	cp docs/index.html docs/404.html
	printf "prairiewatch.dog" > docs/CNAME

api-build:
	cd api/phptesting && php -S localhost:9090 -t public public/index.php
