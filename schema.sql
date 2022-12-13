CREATE SCHEMA car_rental;
use car_rental;

CREATE TABLE car(
    plate_id varchar(50) NOT NULL,
    model varchar(100),
    `year` YEAR,
    `status` varchar(50),
    price float,
    PRIMARY KEY (plate_id)
);

CREATE TABLE user(
    user_id int NOT NULL auto_increment,
    email varchar(100),
    `password` varchar(100),
    birthdate date,
    licence varchar(100),
    PRIMARY KEY (user_id)
);