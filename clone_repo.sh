#! /bin/sh
rm -rfd laravel
rm -rfd MemoryStay

git clone https://github.com/MemoryStayAPP/laravel.git
git clone https://github.com/MemoryStayAPP/MemoryStay.git

mv laravel/Memory_Stay .
rm -rfd laravel
mv Memory_Stay laravel

