api-build:
	cd api && php -S localhost:9090 -t public public/index.php

api2-build:
	cd api2 && php -S localhost:9090 -t public public/index.php

slimmy:
	cd slim4-tutorial-master && php -S localhost:9090 -t public public/index.php
