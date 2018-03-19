# target: help					- Displays help with targets available.
.PHONY:  help
help:
	@echo "Usage:"
	@echo " make [target] ..."
	@echo "target:"
	@egrep "^# target:" Makefile | sed 's/# target: / /g'



# target: publish				- Updates, builds and publishes homepage
.PHONY: publish
publish: build
	rsync -av output/ efo@emilfolino.se:/var/www/emilfolino.se/html/



# target: update					- Updates repo and composer modules
.PHONY: update
update:
	git pull
	composer install
	composer update



# target: build					- Builds scss and html pages
.PHONY: build
build:
	rm -rf output/*
	mkdir -p output/articles/
	cp -r fonts output/
	cp -r img output/
	cp -r favicon/* output/
	sass base.scss output/style.min.css --style compressed
	/usr/bin/php compiler.php
