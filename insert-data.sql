CREATE SCHEMA `touche-pas-au-klaxon` ;
USE `touche-pas-au-klaxon`;
CREATE TABLE  agencies (
  id_agency INT NOT NULL AUTO_INCREMENT,
  name_agency VARCHAR(45) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id_agency)
)

CREATE TABLE employees (
  id_employee INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  phone VARCHAR(50),
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_employee)
)

CREATE TABLE users (
  id_user INT NOT NULL,
  employee_id INT NOT NULL,
  role ENUM('user','admin') NOT NULL DEFAULT 'user',
  password VARCHAR(255) NOT NULL
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id_user),
  FOREIGN KEY (employee_id) REFERENCES employees(id_employee) ON DELETE CASCADE
)

CREATE TABLE trips (
  id_trip INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  departure_agency_id INT NOT NULL,
  arrival_agency_id INT NOT NULL,
  departure_datetime DATETIME NOT NULL,
  arrival_datetime DATETIME NOT NULL,
  total_seats INT NOT NULL,
  available_seats INT NOT NULL,
 contact_email VARCHAR(255),
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id_trip),
  FOREIGN KEY (user_id) REFERENCES users(id_user) ON DELETE CASCADE,
  FOREIGN KEY (departure_agency_id) REFERENCES agencies(id_agency) ON DELETE CASCADE,
  FOREIGN KEY (arrival_agency_id) REFERENCES agencies(id_agency) ON DELETE CASCADE,
  CHECK (departure_agency_id <> arrival_agency_id),
  CHECK (arrival_datetime > departure_datetime),
  CHECK (available_seats <= total_seats)
)

INSERT INTO `touche-pas-au-klaxon`.`agencies` (`name_agency`) VALUES ('Paris');
INSERT INTO `touche-pas-au-klaxon`.`agencies` (`name_agency`) VALUES ('Lyon');
INSERT INTO `touche-pas-au-klaxon`.`agencies` (`name_agency`) VALUES ('Marseille');
INSERT INTO `touche-pas-au-klaxon`.`agencies` (`name_agency`) VALUES ('Toulouse');
INSERT INTO `touche-pas-au-klaxon`.`agencies` (`name_agency`) VALUES ('Nice');
INSERT INTO `touche-pas-au-klaxon`.`agencies` (`name_agency`) VALUES ('Nantes');
INSERT INTO `touche-pas-au-klaxon`.`agencies` (`name_agency`) VALUES ('Strasbourg');
INSERT INTO `touche-pas-au-klaxon`.`agencies` (`name_agency`) VALUES ('Montpellier');
INSERT INTO `touche-pas-au-klaxon`.`agencies` (`name_agency`) VALUES ('Bordeaux');
INSERT INTO `touche-pas-au-klaxon`.`agencies` (`name_agency`) VALUES ('Lilles');
INSERT INTO `touche-pas-au-klaxon`.`agencies` (`name_agency`) VALUES ('Rennes');
INSERT INTO `touche-pas-au-klaxon`.`agencies` (`name_agency`) VALUES ('Reims');

LOAD DATA INFILE '/Applications/XAMPP/TPAK/users.txt'
INTO TABLE employees
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
(last_name, first_name, phone, email);

INSERT INTO `users`(id_user, employee_id, role, password, created_at, updated_at)
VALUES (2, 2, 'user', '$2y$10$PzvPMi6.5/ERiZb/vd9bCOjn5xwcAfbQom9ceM4eHEzB/xtKEj7Jm', NOW(), NOW());
INSERT INTO `users`(id_user, employee_id, role, password, created_at, updated_at)
VALUES (3, 3,'admin', '$2y$10$CzMIqSuBeevfLvLHYotWru1vizYsnZ0uyWz8JgoPVIFXfWaZYfetO', NOW(), NOW());
