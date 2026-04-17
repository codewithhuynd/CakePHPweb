SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;

-- Users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','user') DEFAULT 'user',
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
             ON UPDATE CURRENT_TIMESTAMP
);

-- Categories
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
             ON UPDATE CURRENT_TIMESTAMP
);

-- Books
CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    user_id INT,
    title VARCHAR(200) NOT NULL,
    author VARCHAR(100) NOT NULL,
    description TEXT,
    quantity INT DEFAULT 1,
    status ENUM('available','unavailable') DEFAULT 'available',
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
             ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id)
        REFERENCES categories(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id)
        REFERENCES users(id) ON DELETE SET NULL
);

-- Borrows
CREATE TABLE IF NOT EXISTS borrows (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    book_id INT NOT NULL,
    borrow_date DATE NOT NULL,
    return_date DATE,
    status ENUM('borrowing','returned') DEFAULT 'borrowing',
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
             ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id)
        REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (book_id)
        REFERENCES books(id) ON DELETE CASCADE
);

-- data mẫu Categories
INSERT INTO categories (name, description) VALUES
('Khoa học', 'Sách về khoa học tự nhiên'),
('Văn học', 'Tiểu thuyết và truyện ngắn'),
('Công nghệ', 'Sách về IT và lập trình'),
('Lịch sử', 'Sách lịch sử Việt Nam và thế giới');

-- data mẫu Books
INSERT INTO books (category_id, title, author, quantity) VALUES
(3, 'Clean Code', 'Robert Martin', 5),
(3, 'PHP & MySQL', 'Jon Duckett', 3),
(2, 'Dế Mèn Phiêu Lưu Ký', 'Tô Hoài', 10),
(1, 'Vật Lý Đại Cương', 'Lương Duyên Bình', 7);

-- tài khoản admin mặc định
INSERT INTO users (username, email, password, role, created, modified)
VALUES (
    'admin',
    'admin@admin.com',
    'admin123',
    'admin',
    NOW(),
    NOW()
);

ALTER TABLE borrows
MODIFY COLUMN status
ENUM('borrowing','returned','late')
DEFAULT 'borrowing';