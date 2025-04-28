# 🚀 Langkah Setup Proyek PemWeb dengan Fila Starter

## 📦 1. Masuk ke Container dan Install Proyek

```bash
docker exec -it pemweb bash
composer create-project --prefer-dist raugadh/fila-starter .
```

## 🧹 2. Bersihkan File Tidak Diperlukan (Opsional)

```bash
rm -rf *
rm -rf .*
```

## 🛠️ 3. Set Permission Folder

```bash
chown -R www-data:www-data storage/*
chmod 777 -R storage/*
chmod 777 bootstrap/*
```

## ⚙️ 4. Konfigurasi File `.env`

Edit file `.env` dan sesuaikan isinya seperti berikut:

```env
APP_NAME="PemWeb"
APP_ENV=local
APP_KEY=base64:ymhs13QXII9mFx4RXlC47PjEo6oF8DLPbUdf101zmQA=
APP_DEBUG=true
APP_TIMEZONE='Asia/Jakarta'
APP_URL=http://localhost
ASSET_URL=http://localhost
DEBUGBAR_ENABLED=false
ASSET_PREFIX=
# ASSET_PREFIX=/dev/kit/public example incase deployed inside a folder

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=db_pemweb
DB_PORT=3306
DB_DATABASE=db_pemweb
DB_USERNAME=root
DB_PASSWORD=p455w0rd

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=true
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
# CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"


> Pastikan kamu sudah menyimpan file `.env`.

## 🗄️ 5. Migrasi dan Seeder Database

```bash
php artisan migrate
php artisan migrate:fresh
php artisan db:seed --force
```

## 🛡️ 6. Generate Shield & Inisialisasi Project

```bash
php artisan shield:generate --all
php artisan project:init
```

## 🌐 7. Akses Aplikasi di Browser

Buka browser dan akses alamat berikut:

```
http://localhost
```

Gunakan kredensial login berikut:

- **Username:** `admin@admin.com`
- **Password:** `password`

## ✨ 8. Tambahan: Buat Komponen Livewire

```bash
php artisan make:livewire ShowHomePage
```

---

✅ Aplikasi siap digunakan!  
Jika ada error, pastikan semua service container aktif dan port tidak bentrok.
