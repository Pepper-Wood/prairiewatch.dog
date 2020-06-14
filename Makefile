help: list

list:
	@echo "Makefile Commands:"
	@echo "- 'make ext-build'        Rebuilds the chrome extension for local testing"

ext-build:
	@echo "Run the following commands:"
	@echo "- yarn run start"
	@echo "- go to chrome://extensions"
	@echo "- Click on 'Load unpacked' and select the generated 'extension/build' folder"

web-build:
	cd website && ng build --prod --output-path ../docs --base-href=https://prairiewatch.dog/
	cd ..
	cp docs/index.html docs/404.html
	printf "prairiewatch.dog" > docs/CNAME
