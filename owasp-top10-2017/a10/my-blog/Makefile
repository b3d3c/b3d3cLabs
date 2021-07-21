.SILENT:
.DEFAULT_GOAL := help

COLOR_RESET = \033[0m
COLOR_COMMAND = \033[36m
COLOR_YELLOW = \033[33m
COLOR_GREEN = \033[32m
COLOR_RED = \033[31m

PROJECT := A10 - MyBlog
PORT := 80
SLEEPUNTILAPPSTARTS := 45

## Installs a development environment using docker-compose
install: rm compose  msg

## Run project using docker-compose
compose:
	#rm -r wordpress/index.php wordpress/license.txt wordpress/readme.html wordpress/wp-activate.php wordpress/wp-admin/ wordpress/wp-blog-header.php  wordpress/wp-comments-post.php wordpress/wp-config.php  wordpress/wp-config-sample.php wordpress/wp-cron.php wordpress/wp-includes/ wordpress/wp-links-opml.php wordpress/wp-load.php wordpress/wp-login.php wordpress/wp-mail.php wordpress/wp-settings.php wordpress/wp-trackback.php wordpress/xmlrpc.php wordpress/wp-signup.php wordpress/wp-content/index.php
	#cp -r tmp/wp-config.php wordpress/wp-config.php
	docker-compose -f deployments/docker-compose.yml down -v --remove-orphans
	docker-compose -f deployments/docker-compose.yml up -d --build --force-recreate

rm:
	chmod +x deployments/rm.sh
	deployments/rm.sh

## Prints initialization message after compose phase
msg:
	chmod +x deployments/check-init.sh
	deployments/check-init.sh

## Prints help message
help:
	printf "\n${COLOR_YELLOW}${PROJECT}\n------\n${COLOR_RESET}"
	awk '/^[a-zA-Z\-\_0-9\.%]+:/ { \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":")); \
			helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			printf "${COLOR_COMMAND}$$ make %s${COLOR_RESET} %s\n", helpCommand, helpMessage; \
		} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST) | sort
	printf "\n"
