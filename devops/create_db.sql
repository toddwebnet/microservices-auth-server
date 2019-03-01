
CREATE USER 'auth'@'%' IDENTIFIED BY '4M3wBNCKyE4R4xTYSDVcebJKdg9kk9rw';
CREATE DATABASE IF NOT EXISTS `auth`;
GRANT ALL PRIVILEGES ON `auth`.* TO 'auth'@'%';
GRANT ALL PRIVILEGES ON `auth\_%`.* TO 'auth'@'%';
flush privileges;
--
-- CREATE USER 'testauth'@'%' IDENTIFIED BY '4M3wBNCKyE4R4xTYSDVcebJKdg9kk9rw';
-- CREATE DATABASE IF NOT EXISTS `testauth`;
-- GRANT ALL PRIVILEGES ON `testauth`.* TO 'testauth'@'%';
-- GRANT ALL PRIVILEGES ON `testauth\_%`.* TO 'testauth'@'%';
-- flush privileges;
