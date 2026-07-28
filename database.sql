-- قاعدة البيانات: users_db (غيّر الاسم حسب اسم قاعدة البيانات التي أنشأتها على InfinityFree)
-- استورد هذا الملف من phpMyAdmin داخل حسابك في InfinityFree

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    status TINYINT(1) NOT NULL DEFAULT 0
);
