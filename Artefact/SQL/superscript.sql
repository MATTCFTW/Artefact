--CREATE SCRIPTS
--creates all of the tables for the database.
CREATE TABLE users
(
	users_id INT (5) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	firstName VARCHAR (60) NOT NULL,
  lastName VARCHAR (60) NOT NULL,
  email VARCHAR (60) NOT NULL,
	pass VARCHAR (60) NOT NULL,
	role_id VARCHAR (1) NOT NULL
);