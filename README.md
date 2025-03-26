## Quy trình chạy dự án

**Bước 1:**
Clone dự án từ github

```bash
git clone https://github.com/regN97/xuong_laravel_SP25.git
```

**Bước 2:**
Cài đặt toàn bộ thư viện JS

```bash
# create node_modules folder
npm i
```

**Bước 3:**
Cài đặt toàn bộ thư viện PHP

```bash
# create vendor folder
composer update
```

**Bước 4:**
Tạo file `.env`

-   Copy file `.env.example` => `.env`
-   Cấu hình file `.env`

**Bước 5:**
Build css,js qua thư mục public

```bash
npm run build
```

**Bước 6:**
Tạo DB và tạo bảng trong DB

```bash
php artisan migrate
```

**Bước 7:**
Tạo dữ liệu mẫu

```bash
php artisan db:seed
```

**Bước 8: Generate key**

```bash
# APP_KEY
php artisan key:generate
```

**Bước 9:**
Khởi chạy dự án

-   Cách 1:

```bash
# chạy JS library
npm run dev
# chạy PHP serve
php artisan serve
```

-   Cách 2:

```bash
composer run dev
```