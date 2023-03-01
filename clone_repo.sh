#! /bin/sh
docker stop $(docker ps -aq)
docker rm $(docker ps -aq)
rm -rfd laravel
rm -rfd MemoryStay

git clone https://github.com/MemoryStayAPP/laravel.git
git clone https://github.com/MemoryStayAPP/MemoryStay.git

mv laravel/Memory_Stay .
rm -rfd laravel
mv Memory_Stay laravel

cd laravel

cp .env.example .env

composer update
./vendor/bin/sail up -d
cd ../MemoryStay/src
npm install
cd ..
npm run build
docker-compose up -d
cd ..
docker-compose up -d



