## Cara Instalasi

1. Clone Repositori : `git clone https://github.com/AlvinDaeli748/DashboardProject.git`
2. Akses Folder Repositori : `cd DashboardProject`
3. Jalankan Composer : `composer install`
4. Copy env dan konfigurasi : `cp env .env`
    * Uncomment `CI_ENVIRONMENT`
    * Isi informasi database 
        * `CI_ENVIRONMENT = production`
        * `database.default.database = dbproject`
        * `database.default.username = `    
        * `database.default.password = `         
        * `database.default.DBDriver = MySQLi`
   * Contoh tampilan .env :
   * ![tampilan_env](https://github.com/user-attachments/assets/327641c6-c3bc-4d3e-8da7-b0a46692ef7e)
5. Pastikan ekstensi berikut aktif pada `php.ini` dengan cara uncomment ekstensi berikut:
    * intl
    * mbstring
    * mysqli
    * fileinfo
    * gd
    * zip
    * openssl
    * json
    * mysqlnd
    * extension_dir="ext"
        * Jalankan `php --ini` untuk mengecek lokasi file `php.ini` yang digunakan.
        * Jalankan `php -m` untuk memeriksa ekstensi aktif.
6. Tambah Database di Phpmyadmin dengan nama database `dbproject`
    * Database berupa MySQL, dapat menggunakan XAMPP untuk akses ke `localhost/phpmyadmin`
7. Export database dan seed data : `php spark migrate -all`
    * Apabila ingin menambah data, jalankan `php spark db:seed DataSeeder` untuk menambah dummy data sebanyak 500 data.
8. Start Website : `php spark serve`
    * Website dapat diakses dengan link `http://localhost:8080`
9. Data untuk Login terdapat pada `Akun_Admin.txt`
