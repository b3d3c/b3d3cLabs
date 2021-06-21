.SILENT:
.DEFAULT_GOAL := help

COLOR_RESET = \033[0m
COLOR_COMMAND = \033[36m
COLOR_YELLOW = \033[33m
COLOR_GREEN = \033[32m
COLOR_RED = \033[31m

PROJECT := bWAPP
PORT := 5000

## Installs a development environment using docker-compose
install: compose msg

## Run project using docker-compose
compose:
	chmod +x docker-rm.sh
	./docker-rm.sh
	docker build -t bwapp .
	docker run -d -p 5000:80 bwapp
	sleep 10
	chmod +x startdb.sh
	./startdb.sh

## Prints help message
help:
#	printf "\n${COLOR_YELLOW}${PROJECT}\n------\n${COLOR_RESET}"
#	awk '/^[a-zA-Z\-\_0-9\.%]+:/ { \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":")); \
			helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			printf "${COLOR_COMMAND}$$ make %s${COLOR_RESET} %s\n", helpCommand, helpMessage; \
		} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST) | sort
#	printf "\n"
