# target: help                    - Displays help with targets available.
.PHONY:  help
help:
	@echo "Usage:"
	@echo " make [target] ..."
	@echo "target:"
	@egrep "^# target:" Makefile | sed 's/# target: / /g'



# target: publish                - Updates, builds and publishes homepage
.PHONY: publish
publish: build
	rsync -av output/ efo@emilfolino.se:/var/www/emilfolino.se/html/
	/usr/bin/php sitemap/sitemap-generator.php
	rsync -av sitemap.xml efo@emilfolino.se:/var/www/emilfolino.se/html/


# target: update                    - Updates repo and composer modules
.PHONY: update
update:
	git pull
	composer install
	composer update



# target: build                    - Builds scss and html pages
.PHONY: build
build:
	rm -rf output/*
	mkdir -p output/articles/
	mkdir -p output/static/
	cp -r fonts output/
	cp -r img output/
	cp -r favicon/* output/
	cp -r pubs output/
	cp -r static/* output/static/
	cp robots.txt output/
	sass base.scss output/style.min.css --style compressed
	/usr/bin/php compiler.php
