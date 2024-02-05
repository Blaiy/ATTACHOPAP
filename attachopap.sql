-- Students table
CREATE TABLE students (
    studentid INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    course VARCHAR(255) NOT NULL,
    institution VARCHAR(255) NOT NULL
);

-- Password reset
CREATE TABLE pwdreset (
    pwdResetId INT(11) AUTO_INCREMENT PRIMARY KEY,
    pwdResetEmail VARCHAR(255) NOT NULL,
    pwdResetSelector TEXT NOT NULL,
    pwdResetToken LONGTEXT NOT NULL,
    pwdResetExpires TEXT NOT NULL
);

