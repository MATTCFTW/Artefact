--CREATE SCRIPTS
--creates all of the tables for the database.
--inserts necessary data

--users table
CREATE TABLE users
(
	users_id INT (5) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	firstName VARCHAR (60) NOT NULL,
  lastName VARCHAR (60) NOT NULL,
  email VARCHAR (60) NOT NULL,
	pass VARCHAR (255) NOT NULL,
	role_id VARCHAR (1) NOT NULL
);

--doctors table
CREATE TABLE doctor
(
  doctor_id INT (11) PRIMARY KEY NOT NULL,
  first_name VARCHAR (50) NOT NULL,
  last_name VARCHAR (50) NOT NULL,
  email VARCHAR (50) NOT NULL,
  expertise VARCHAR (256) NOT NULL,
	biography VARCHAR (1024) NOT NULL
);
--doctor data
INSERT INTO doctor (doctor_id, first_name, last_name, email, expertise, biography) VALUES
(1, 'Johnathan', 'Deo', 'johnathandeon@moltran.com', 'Injuries', 'Dr. Deo is the medical office specializing in delivering high-quality urgent care medicine. He’s a board-certified medical doctor, specializing in family practise. Dr. Deo was born in Nova Scotia and raised in British Columbia, CA. He graduated from McMaster University, and attended medical school at the University of California, Irvine.'),
(2, 'Jason', 'Kim', 'jason@geraldton.com', 'Sport Injuries', 'Chiropractor, Dr Jason is an integrative health care practitioner who values patient centered, evidence based care that emphasizes whole body health. She strongly believes in working together with her patients to optimize their overall health and well-being, all of which is achieved through healthy communication.'),
(3, 'Margaret' , 'Wilding', 'margaret@gmail.com', 'Physiotherapist', 'Margaret is a Physiotherapist registered with The College of Physiotherapists of Ontario and a member of the Canadian Physiotherapy Association in good standing.');


--times table
CREATE TABLE times  (
  time_id INT (20) PRIMARY KEY NOT NULL,
  time_slot VARCHAR (255) NOT NULL
);

--times data
INSERT INTO times (time_id, time_slot) VALUES
(1, 'Morning'),
(2, 'Afternoon'),
(3, 'Evening');

--user appointments
CREATE TABLE appointments (
  appointment_id INT (20) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  doctor_id INT (20) NOT NULL FOREIGN KEY REFERENCES doctor(doctor_id),
  patient_id INT (20) NOT NULL FOREIGN KEY REFERENCES users(users_id),
  date_chosen DATE NOT NULL,
  time_slot_id INT (20) NOT NULL FOREIGN KEY REFERENCES times(time_id),
  option_chosen VARCHAR(255) NOT NULL
) 

--doctor reviews
CREATE TABLE reviews (
  review_id INT (11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  doctor_id INT (11) NOT NULL,
  know INT (11) NOT NULL COMMENT 'Knowledge Rating',
  prof INT (11) NOT NULL COMMENT 'Professional Rating',
  friendly INT (11) NOT NULL COMMENT 'friendliness Rating',
  FOREIGN KEY (doctor_id) REFERENCES doctor(doctor_id)
)