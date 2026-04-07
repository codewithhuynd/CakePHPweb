# 📚 Thư Viện Sách - CakePHP Framework
> Lập Trình PHP | Giữa Kỳ

---

## 🛠️ Yêu cầu hệ thống

| Công cụ | Version |
|---------|---------|
| PHP | 8.1 trở lên |
| MySQL | 5.7 trở lên |
| Composer | 2.x |
| XAMPP | 8.1+ |

---

## 🚀 Hướng dẫn cài đặt (cho XAMPP)

### Bước 1: Cài Composer

Tải và cài:
```
https://getcomposer.org/Composer-Setup.exe
```

Mở **Command Prompt** kiểm tra:
```bash
composer --version
```

### Bước 2: Kiểm tra PHP version

```bash
php -v
```


❌ Nếu không nhận PHP → Làm như sau:
```
1. Nhấn Win + S → tìm "Environment Variables"
2. System Variables → Path → Edit → New
3. Thêm vào: C:\xampp\php
4. OK → OK → OK
5. Mở lại Command Prompt → kiểm tra lại
```

---

### Bước 3: Clone project về máy

Mở **Command Prompt**, chạy từng lệnh:
```bash
cd C:\xampp\htdocs
git clone https://github.com/codewithhuynd/CakePHPweb.git
cd CakePHPweb
```


Nếu chưa có Git, tải tại:
```
https://git-scm.com/download/win
```

---

### Bước 4: Cài dependencies

```bash
composer install
```

✅ Thấy dòng `Generating autoload files` = Thành công

---

### Bước 5: Tạo file cấu hình

Chạy 2 lệnh sau trong Command Prompt:
```bash
copy .env.example .env
copy config\app_local.example.php config\app_local.php
```

---

### Bước 6: Sửa file .env

Mở file `.env` bằng Notepad hoặc VSCode

Sửa lại toàn bộ nội dung thành:
```ini
APP_FULL_BASE_URL="http://localhost/TEN_REPO"
APP_DEFAULT_DATASOURCE_HOST=localhost
APP_DEFAULT_DATASOURCE_USERNAME=root
APP_DEFAULT_DATASOURCE_PASSWORD=
APP_DEFAULT_DATASOURCE_DATABASE=project-app_db
SECURITY_SALT=projectapp2026GiuaKyCakeFrameworkLapTrinhPHP
DEBUG=true
```

> ⚠️ Thay `TENREPO` bằng tên thư mục thật
> Ví dụ nếu clone vào `C:\xampp\htdocs\project-app`
> thì sửa thành `APP_FULL_BASE_URL="http://localhost/project-app"`

---

### Bước 7: Tạo Database

```
1. Mở XAMPP Control Panel
2. Click Start cạnh Apache
3. Click Start cạnh MySQL
4. Mở trình duyệt vào: http://localhost/phpmyadmin
5. Bên trái click "New"
6. Database name: project-app_db
7. Charset: utf8mb4_unicode_ci
8. Click "Create"
```

---

### Bước 8: Import dữ liệu vào Database

```
1. Click vào "project-app_db" bên trái
2. Click tab "SQL" trên thanh menu
3. Dùng file .sql đã gửi
4. Copy toàn bộ nội dung file đó
5. Paste vào ô SQL trên phpMyAdmin
6. Click "Go"
```

✅ Thấy 4 bảng xuất hiện bên trái:
```
project-app_db
├── books
├── borrows
├── categories
└── users
```

---

### Bước 9: Cấu hình .htaccess

Mở file `webroot\.htaccess` bằng Notepad hoặc VSCode

Tìm dòng:
```
RewriteBase /
```

Sửa thành:
```
RewriteBase /TEN_REPO/
```

> ⚠️ Thay `TENREPO` bằng tên thư mục thật
> Ví dụ: `RewriteBase /project-app/`

Lưu file lại

---

### Bước 10: Bật mod_rewrite trong XAMPP

```
1. Mở XAMPP Control Panel
2. Click "Config" cạnh chữ Apache
3. Chọn "httpd.conf"
4. File mở ra → nhấn Ctrl + F tìm:
   #LoadModule rewrite_module
5. Xóa dấu # ở đầu dòng đó:
   LoadModule rewrite_module modules/mod_rewrite.so
6. Lưu file (Ctrl + S)
7. Quay lại XAMPP → Click "Stop" Apache
8. Click "Start" Apache lại
```

---

### Bước 11: Kiểm tra hoạt động

Mở trình duyệt, truy cập:
```
http://localhost/TEN_REPO/books
```

✅ Thấy trang danh sách sách = Cài đặt thành công

---

## 🔌 API Endpoints

Truy cập trực tiếp trên trình duyệt:

| Method | URL | Chức năng |
|--------|-----|-----------|
| GET | `/api/books.json` | Danh sách sách |
| GET | `/api/books/{id}.json` | Chi tiết 1 sách |
| GET | `/api/categories.json` | Danh sách danh mục |

---

## Các lỗi thường gặp

**Lỗi 1: Trang trắng hoặc 404**
```
→ Kiểm tra lại Bước 9 và Bước 10
→ Đảm bảo mod_rewrite đã bật
→ Đảm bảo RewriteBase đúng tên thư mục
```

**Lỗi 2: Không kết nối được Database**
```
→ Kiểm tra XAMPP đã Start MySQL chưa
→ Kiểm tra file .env đúng tên database chưa
→ Kiểm tra đã tạo database project-app_db chưa
```

**Lỗi 3: composer install báo lỗi PHP version**
```
→ Kiểm tra lại Bước 2
→ Đảm bảo PHP trong PATH là của XAMPP
→ Path: C:\xampp\php
```

**Lỗi 4: Not Found khi click menu**
```
→ Kiểm tra lại file .env
→ APP_FULL_BASE_URL phải đúng tên thư mục
```

---

## 📁 Cấu trúc thư mục quan trọng

```
project/
├── .env.example          ← Copy thành .env rồi sửa
├── config/
│   ├── app.php           ← Không sửa
│   ├── app_local.php     ← Tự động tạo ở Bước 5
│   └── app_local.example.php ← File mẫu
├── src/
│   └── Controller/       ← Code xử lý
├── templates/            ← Giao diện
└── webroot/
    └── .htaccess         ← Sửa RewriteBase ở Bước 9
```

---
