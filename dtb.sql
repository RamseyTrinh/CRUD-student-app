create database student_db;
use student_db;
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address TEXT NOT NULL
);

CREATE USER 'hoang'@'%' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON *.* TO 'hoang'@'%';
FLUSH PRIVILEGES;
