-- ============================================================
-- Tasks for Today Management System (TFTMS) - Database Setup
-- ============================================================

CREATE DATABASE IF NOT EXISTS tftms_db;
USE tftms_db;

-- -----------------------------------------------------------
-- Tasks Table
-- -----------------------------------------------------------
CREATE TABLE IF NOT EXISTS tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  status VARCHAR(20) NOT NULL DEFAULT 'pending',
  task_date DATE NOT NULL,
  created_at DATETIME NOT NULL
);

-- -----------------------------------------------------------
-- Users Table
-- -----------------------------------------------------------
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  created_at DATETIME NOT NULL
);

-- -----------------------------------------------------------
-- Seed: 8 task records across 3+ dates (including today)
-- -----------------------------------------------------------
INSERT INTO tasks (title, status, task_date, created_at) VALUES
('Complete CI4 project setup',        'completed', CURDATE(),                    NOW()),
('Write unit tests for TaskModel',    'pending',   CURDATE(),                    NOW()),
('Review pull request #42',           'pending',   CURDATE(),                    NOW()),
('Deploy staging server',             'completed', DATE_SUB(CURDATE(), INTERVAL 1 DAY), NOW()),
('Fix login page CSS bug',            'pending',   DATE_SUB(CURDATE(), INTERVAL 1 DAY), NOW()),
('Database schema migration',         'completed', DATE_SUB(CURDATE(), INTERVAL 3 DAY), NOW()),
('Team standup meeting notes',        'completed', DATE_SUB(CURDATE(), INTERVAL 3 DAY), NOW()),
('Prepare sprint retrospective',      'pending',   DATE_SUB(CURDATE(), INTERVAL 5 DAY), NOW());

-- -----------------------------------------------------------
-- Seed: 1 demo user record
-- -----------------------------------------------------------
INSERT INTO users (username, full_name, email, created_at) VALUES
('jisantiago', 'Joaquin Santiago', 'jisantiago@fit.edu.ph', NOW());
