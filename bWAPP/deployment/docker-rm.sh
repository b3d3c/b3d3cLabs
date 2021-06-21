docker stop $(docker ps -a -q --filter ancestor=bwapp --format="{{.ID}}")
