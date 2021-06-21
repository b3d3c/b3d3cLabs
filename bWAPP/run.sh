echo "Starting docker..."
sh deployment/docker-rm.sh
docker build -t bwapp .
docker run -d -p 5000:80 bwapp
echo "Configuring DB..."
sleep 10
sh deployment/startdb.sh
