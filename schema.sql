CREATE SCHEMA car_rental;
use car_rental;

CREATE TABLE car(
    plate_id varchar(50) NOT NULL,
    model varchar(100),
    `year` YEAR,
    price float,
    PRIMARY KEY (plate_id)
);

CREATE TABLE car_status(
    plate_id varchar(50) NOT NULL,
    today date,
    `status` varchar(50),
    reserved varchar(50),
    PRIMARY KEY (plate_id,today),
     FOREIGN KEY (plate_id)  REFERENCES car(plate_id)
);

CREATE TABLE `user`(
    user_id int NOT NULL auto_increment,
    `name` varchar(15),
    email varchar(100),
    `password` varchar(100),
    birthdate date,
    license varchar(100),
    PRIMARY KEY (user_id)
);

CREATE table admin(
    id int(15),
    email varchar(100),
	name varchar(15),
    `password` varchar(50),
    PRIMARY KEY (id)
);
CREATE TABLE reservation(
	reserve_date date,
    pickup_date date,
    return_date date,
    user_id int NOT null AUTO_INCREMENT,
    reservation_number varchar(100) unique,
    payment varchar(50),
    plate_id varchar(50) NOT null,
    PRIMARY KEY(user_id,plate_id),
    FOREIGN KEY (plate_id)  REFERENCES car(plate_id),
    FOREIGN KEY (user_id )REFERENCES user(user_id)
);
