CREATE DATABASE IF NOT EXISTS trupendb;
use trupendb;
CREATE TABLE IF NOT EXISTS user
            (username varchar(120) PRIMARY KEY,
            passcode varchar(120),
            firstname varchar(120),
            lastname varchar(120),
            email varchar(120) unique,
            gender varchar(120),
            birthday varchar(120),
            bio varchar(800),
            img_dir varchar(120),
            cost smallint(6)
            );

INSERT INTO user(username, passcode, firstname, lastname, email, gender, birthday, bio,img_dir, cost) VALUES ('user', 'pass', 'foo', 'bar', 'user@gmail.com', 'male','2000-08-14', 'fantastic person', '../profile_pic/student/user.jpg', '0');


INSERT INTO user(username, passcode, firstname, lastname, email, gender, birthday,bio, img_dir, cost) VALUES ('eval', 'eva', 'eval', 'eva', 'eval@gmail.com', 'female','2003-05-17', 'cool person', '../profile_pic/student/eval.jpg', '0');
       
CREATE TABLE IF NOT EXISTS teacher
            (username varchar(120) PRIMARY KEY,
            passcode varchar(120),
            firstname varchar(120),
            lastname varchar(120),
            email varchar(120) unique,
            gender varchar(120),
            birthday varchar(120),
            subject varchar(120),
            img_dir varchar(120),
            cost smallint(6)
            );


INSERT INTO teacher(username, passcode, firstname, lastname, email, gender, birthday, subject, img_dir, cost) VALUES ('user', 'pass', 'foo', 'bar', 'user@gmail.com', 'male', '2000-08-14', 'MA101', '../profile_pic/teacher/user.jpg', '0');

CREATE TABLE IF NOT EXISTS office
            (username varchar(120) PRIMARY KEY,
            passcode varchar(120),
            firstname varchar(120),
            lastname varchar(120),
            email varchar(120) unique,
            gender varchar(120),
            birthday varchar(120),
            img_dir varchar(120)
            );

INSERT INTO office(username, passcode, firstname, lastname, email, gender, birthday, img_dir) VALUES ('user', 'pass', 'foo', 'bar', 'user@gmail.com', 'male', '2000-08-14', '../profile_pic/office/user.jpg');


CREATE TABLE IF NOT EXISTS quiz
            (name varchar(120),
            subject varchar(120),
		time varchar(120),
            time_limit smallint(6),
            no_questions smallint(6),
            total smallint(6),
            UNIQUE(name, subject)
            );

CREATE TABLE IF NOT EXISTS print
            (No int NOT NULL AUTO_INCREMENT,
            person varchar(120),
            user varchar(120),
            location varchar(120),
            copies smallint(6),
            type varchar(120),
            status smallint(6),
            comment varchar(120),
		reason varchar(120),
            PRIMARY KEY (No)
            );

CREATE TABLE IF NOT EXISTS notifications
            (No int NOT NULL AUTO_INCREMENT,
            type_to varchar(120),
            type_from varchar(120),
            note varchar(3000),
            time varchar(120),
            PRIMARY KEY (No)
            );
