## Cara Instalasi

1. Clone Repositori : `git clone https://github.com/AlvinDaeli748/Dashboard_Mitra.git`
2. Akses Folder Repositori : `cd Dashboard_Mitra`
3. Jalankan Composer : `composer install`
4. Copy env dan konfigurasi : `cp env .env`
    * Uncomment `CI_ENVIRONMENT`
    * Isi informasi database 
        * `CI_ENVIRONMENT = production`
        * `database.default.database = nama_db_anda`
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
6. Tambah Database di Phpmyadmin dengan nama database `nama_db_anda`
    * Database berupa MySQL, dapat menggunakan XAMPP untuk akses ke `localhost/phpmyadmin`
7. Start Website : `php spark serve`
    * Website dapat diakses dengan link `http://localhost:8080`
