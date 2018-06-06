/*
	Rohan Panuganti and Ari Eisips
	MILESTONE 2
	5/13/2018
*/
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS college;
DROP TABLE IF EXISTS term;
DROP TABLE IF EXISTS student_type;
DROP TABLE IF EXISTS degree;
DROP TABLE IF EXISTS major;
DROP TABLE IF EXISTS application;
DROP TABLE IF EXISTS gender;
DROP TABLE IF EXISTS veteran;
DROP TABLE IF EXISTS military;
DROP TABLE IF EXISTS state;
DROP TABLE IF EXISTS personal_info;
DROP TABLE IF EXISTS app_info;
DROP TABLE IF EXISTS education;
DROP TABLE IF EXISTS employment;
DROP TABLE IF EXISTS test;
DROP TABLE IF EXISTS app_test;
DROP TABLE IF EXISTS ethnicity;
DROP TABLE IF EXISTS app_ethnicity;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE user (
	user_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	user_name VARCHAR(20) NOT NULL UNIQUE,
	password CHAR(32) NOT NULL,
	PRIMARY KEY(user_id)
);

CREATE TABLE college (
	college_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	college_name VARCHAR(50) NOT NULL UNIQUE,
	PRIMARY KEY(college_id)
);

INSERT INTO college (college_name)
VALUES ('College of Science and Engineering'),
('Albers School of Business'),
('College of Arts and Sciences'),
('College of Nursing'),
('School of Theology and Ministry');


CREATE TABLE term (
	term_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	term_name VARCHAR(30) NOT NULL UNIQUE,
	PRIMARY KEY(term_id)
);

INSERT INTO term (term_name)
VALUES ('Spring 2018'),
('Winter 2018'),
('Fall 2018'),
('Summer 2018'),
('Spring 2019'),
('Winter 2019'),
('Fall 2019'),
('Summer 2019');

CREATE TABLE student_type (
	student_type_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	student_type_name VARCHAR(30) NOT NULL,
	PRIMARY KEY(student_type_id)
);

INSERT INTO student_type (student_type_name)
VALUES ('Graduate'),
('Graduate Non-Matriculated'),
('Graduate Readmission');

CREATE TABLE degree (
	degree_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	degree_name VARCHAR(30) NOT NULL,
	PRIMARY KEY(degree_id)
);

INSERT INTO degree (degree_name)
VALUES ('Certificates'),
('Masters');

CREATE TABLE major (
	major_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	major_name VARCHAR(50) NOT NULL,
	PRIMARY KEY(major_id)
);

INSERT INTO major (major_name)
VALUES ('Certificate in Computer Science Fundamentals'),
('Certificate in Software Architecture and Design'),
('Certificate in Software Project Management'),
('Master of Science in Computer Science'),
('Master of Science in Mechanical Engineering'),
('Master of Science in Structural Engineering');

CREATE TABLE application (
	app_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	user_id INT NOT NULL,
	college_id INT NOT NULL,
	term_id INT NOT NULL,
	student_type_id INT NOT NULL,
	degree_id INT NOT NULL,
	major_id INT NOT NULL,
	PRIMARY KEY(app_id),
	FOREIGN KEY(user_id) REFERENCES user (user_id),
	FOREIGN KEY(college_id) REFERENCES college (college_id),
	FOREIGN KEY(term_id) REFERENCES term (term_id),
	FOREIGN KEY(student_type_id) REFERENCES student_type (student_type_id),
	FOREIGN KEY(degree_id) REFERENCES degree (degree_id),
	FOREIGN KEY(major_id) REFERENCES major (major_id)
);

CREATE TABLE gender (
	gender_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	gender_name VARCHAR(30) NOT NULL,
	PRIMARY KEY(gender_id)
);

INSERT INTO gender(gender_name)
VALUES ('Male'),
('Female'),
('Non-Binary');

CREATE TABLE veteran (
	veteran_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	veteran_name VARCHAR(30) NOT NULL,
	PRIMARY KEY(veteran_id)
);

INSERT INTO veteran(veteran_name)
VALUES ('Not a veteran'),
('Currently serving'),
('Previously served'),
('Currently dependent');


CREATE TABLE military (
	military_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	military_name VARCHAR(30) NOT NULL,
	PRIMARY KEY (military_id)
);

INSERT INTO military (military_name)
VALUES ('None'), 
('Army'),
('Marine Corp'),
('Navy'),
('Air Force'),
('Coast Guard');

CREATE TABLE state (
	state_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	state_code CHAR(2) NOT NULL,
	state_name VARCHAR(30) NOT NULL,
	PRIMARY KEY (state_id)
);

INSERT INTO state (state_name, state_code)
VALUES
('Alabama', 'AL'),
('Alaska', 'AK'),
('Arizona', 'AZ'),
('Arkansas', 'AR'),
('California', 'CA'),
('Colorado', 'CO'),
('Connecticut', 'CT'),
('Delaware', 'DE'),
('Florida', 'FL'),
('Georgia', 'GA'),
('Hawaii', 'HI'),
('Idaho', 'ID'),
('Illinois', 'IL'),
('Indiana', 'IN'),
('Iowa', 'IA'),
('Kansas', 'KS'),
('Kentucky', 'KY'),
('Louisiana', 'LA'),
('Maine', 'ME'),
('Maryland', 'MD'),
('Massachusetts', 'MA'),
('Michigan', 'MI'),
('Minnesota', 'MN'),
('Mississippi', 'MS'),
('Missouri', 'MO'),
('Montana', 'MT'),
('Nebraska', 'NE'),
('Nevada', 'NV'),
('New Hampshire', 'NH'),
('New Jersey', 'NJ'),
('New Mexico', 'NM'),
('New York', 'NY'),
('North Carolina', 'NC'),
('North Dakota', 'ND'),
('Ohio', 'OH'),
('Oklahoma', 'OK'),
('Oregon', 'OR'),
('Pennsylvania', 'PA'),
('Rhode Island', 'RI'),
('South Carolina', 'SC'),
('South Dakota', 'SD'),
('Tennessee', 'TN'),
('Texas', 'TX'),
('Utah', 'UT'),
('Vermont', 'VT'),
('Virginia', 'VA'),
('Washington', 'WA'),
('West Virginia', 'WV'),
('Wisconsin', 'WI'),
('Wyoming', 'WY');

CREATE TABLE personal_info (
	personal_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	app_id INT NOT NULL,
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	pref_name VARCHAR(50),
	birth_date DATE NOT NULL,
	address VARCHAR(50) NOT NULL,
	city VARCHAR(50) NOT NULL,
	state_id INT NOT NULL,
	postal_code CHAR(5) NOT NULL,
	us_citizen ENUM('yes', 'no') NOT NULL,
	english_native ENUM('yes', 'no') NOT NULL,
	gender_id INT NOT NULL,/*table*/
	veteran_id INT NOT NULL,
	military_id INT NOT NULL,
	hisp_latino ENUM('yes', 'no') NOT NULL,
	PRIMARY KEY(personal_id),
	FOREIGN KEY(app_id) REFERENCES application (app_id),
	FOREIGN KEY(state_id) REFERENCES state (state_id),
	FOREIGN KEY(gender_id) REFERENCES gender (gender_id),
	FOREIGN KEY(veteran_id) REFERENCES veteran (veteran_id),
	FOREIGN KEY(military_id) REFERENCES military (military_id)
);

CREATE TABLE app_info(
	app_info_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	app_id INT NOT NULL,
	financial_aid ENUM('yes', 'no') NOT NULL,
	tuition_assistance ENUM('yes', 'no') NOT NULL,
	other_programs ENUM('yes', 'no') NOT NULL,
	convictions ENUM('yes', 'no') NOT NULL,
	probation ENUM('yes', 'no') NOT NULL,
	PRIMARY KEY (app_info_id),
	FOREIGN KEY(app_id) REFERENCES application (app_id)
);

CREATE TABLE education(
	education_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	app_id INT NOT NULL,
	institution VARCHAR(50) NOT NULL,
	start_month INT NOT NULL,
	start_year INT NOT NULL,
	end_month INT NOT NULL,
	end_year INT NOT NULL,
	degree_earned VARCHAR(50) NOT NULL,
	major_earned VARCHAR(50) NOT NULL,
	date_earned DATE NOT NULL,
	PRIMARY KEY (education_id),
	FOREIGN KEY(app_id) REFERENCES application (app_id)
);

CREATE TABLE employment(
	employment_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	app_id INT NOT NULL,
	org_name VARCHAR(50) NOT NULL,
	address VARCHAR(50) NOT NULL,
	city VARCHAR(50) NOT NULL,
	state_id INT NOT NULL,
	postal_code CHAR(5) NOT NULL,
	org_phone VARCHAR(10) NOT NULL,
	current_status ENUM('yes', 'no') NOT NULL,
	job_title VARCHAR(50) NOT NULL,
	start_month INT NOT NULL,
	start_year INT NOT NULL,
	end_month INT NOT NULL,
	end_year INT NOT NULL,
	PRIMARY KEY (employment_id),
	FOREIGN KEY(app_id) REFERENCES application (app_id),
	FOREIGN KEY(state_id) REFERENCES state (state_id)
	/*part time/full time*/
);

CREATE TABLE test (
	test_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	test_name VARCHAR(15) NOT NULL,
	PRIMARY KEY (test_id)
);

INSERT INTO test (test_name)
VALUES ('CBEST'),
('GMAT'),
('GRE General'),
('IELTS'),
('MAT'),
('PRAXIS'),
('TOEFL'),
('WEST B'),
('WEST E');

CREATE TABLE app_test (
	app_test_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	app_id INT NOT NULL,
	test_id INT NOT NULL,
	test_month INT NOT NULL,
	test_year INT NOT NULL,
	PRIMARY KEY (app_test_id),
	FOREIGN KEY (app_id) REFERENCES application(app_id),
	FOREIGN KEY (test_id) REFERENCES test(test_id)
);

CREATE TABLE ethnicity (
	ethnicity_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	ethnicity_name VARCHAR(35) NOT NULL,
	PRIMARY KEY (ethnicity_id)
);

INSERT INTO ethnicity (ethnicity_name)
VALUES ('Asian'),
('Black/African American'),
('Native Hawaiian/Pacific Islander'),
('Native American'),
('White/Middle Eastern');

CREATE TABLE app_ethnicity(
	app_ethnicity_id INT NOT NULL AUTO_INCREMENT UNIQUE,
	ethnicity_id INT NOT NULL,
	app_id INT NOT NULL,
	PRIMARY KEY(app_ethnicity_id),
	FOREIGN KEY(app_id) REFERENCES application(app_id),
	FOREIGN KEY(ethnicity_id) REFERENCES ethnicity(ethnicity_id)
);
