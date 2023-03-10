#! /bin/sh
docker stop $(docker ps -aq);
docker rm $(docker ps -aq);
rm -rfd laravel;
rm -rfd MemoryStay;
git clone https://github.com/MemoryStayAPP/laravel.git;
git clone https://github.com/MemoryStayAPP/MemoryStay.git;
mv laravel/Memory_Stay .;
rm -rfd laravel;
mv Memory_Stay laravel;
cd laravel;
chmod 777 -R ./*;
cp .env.example .env;
composer update -n;
# docker network create --driver bridge web
./vendor/bin/sail up -d;
cd ../MemoryStay/src;
npm install;
cd ..;
npm run build;
docker-compose up -d;
#docker run -d --name docker-nginx --label "traefik.http.routers.nginx.rule=Host(`app.memorystay.pl`)" -v ./build:/usr/share/nginx/html -p 8081:80 nginx;
cd ..;
docker-compose up -d;