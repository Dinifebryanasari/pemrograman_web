# Masuk ke container Docker
docker exec -it pemweb bash -c

# Install project Fila Starter
composer create-project --prefer-dist raugadh/fila-starter . &&

# Bersihkan semua file dan folder
rm -rf * && rm -rf .[^.]* &&

# Set izin folder storage (buat dulu folder storage kalau belum ada)
mkdir -p storage && chown -R www-data:www-data storage &&

# Buat file .env dari .env.example
cp .env.example .env &&

# Edit konfigurasi .env (pakai echo untuk override cepat)
sed -i \"s|^APP_NAME=.*|APP_NAME=\\\"PemWeb\\\"|\" .env
sed -i \"s|^APP_TIMEZONE=.*|APP_TIMEZONE='Asia/Jakarta'|\" .env
sed -i \"s|^APP_URL=.*|APP_URL=http://localhost|\" .env
sed -i \"s|^ASSET_URL=.*|ASSET_URL=http://localhost|\" .env
sed -i \"s|^DB_CONNECTION=.*|DB_CONNECTION=mysql|\" .env
sed -i \"s|^DB_HOST=.*|DB_HOST=db_pemweb|\" .env
sed -i \"s|^DB_PORT=.*|DB_PORT=3306|\" .env
sed -i \"s|^DB_DATABASE=.*|DB_DATABASE=db_pemweb|\" .env
sed -i \"s|^DB_USERNAME=.*|DB_USERNAME=root|\" .env
sed -i \"s|^DB_PASSWORD=.*|DB_PASSWORD=p455w0rd|\" .env &&

# Generate key
php artisan key:generate &&

# Jalankan migrasi dan seeding
php artisan migrate:fresh &&
php artisan db:seed --force &&

# Generate Shield dan Inisialisasi Proyek
php artisan shield:generate --all &&
php artisan project:init &&

# Set permission storage dan bootstrap
chmod -R 777 storage && chmod -R 777 bootstrap &&

# Buat komponen Livewire
php artisan make:livewire ShowHomePage
