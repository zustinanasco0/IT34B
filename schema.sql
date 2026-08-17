CREATE TABLE user  (
    user_id  INT AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(255) NOT NULL UNIQUE,
    user_password VARCHAR(255) NOT NULL,
    user_role ENUM('admin', 'manager', 'user') NOT NULL DEFAULT 'user',


    user_is_verified TINYINT(1) NOT NULL DEFAULT 0,
    user_verification_token VARCHAR(255) DEFAULT NULL,
    user_email_verification_expires DATETIME DEFAULT NULL,


    user_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP


    CREATE TABLE IF NOT EXISTS user_activity_logs (
        user_activity_log_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        user_email VARCHAR(255) NOT NULL,
        user_activity_log_action VARCHAR(255) NOT NULL,
        user_acitivity_log_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,


        INDEX idx_user_id (user_id),
        INDEX idx_action (user_activity_log_action),
        INDEX idx_cretaed_at (user_acitivity_log_created_at),
    )  ENGINE =InnoDB DEFAULT CHARSET=utf8mb4;

);
