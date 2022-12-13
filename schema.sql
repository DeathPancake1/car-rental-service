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

CREATE TABLE `user`(
    user_id int NOT NULL auto_increment,
    email varchar(100),
    `password` varchar(100),
    birthdate date,
    licence varchar(100),
    PRIMARY KEY (user_id)
);
CREATE table admin(
    id int(15),
	name varchar(15),
    username varchar(15),
    `password` varchar(15),
    PRIMARY KEY (id)
);
CREATE TABLE reservation(
	reservedate date,
    pickupdate date,
    returndate date,
    user_id int NOT null AUTO_INCREMENT,
    plate_id varchar(50) NOT null,
    PRIMARY KEY(user_id,plate_id),
    FOREIGN KEY (plate_id)  REFERENCES car(plate_id),
    FOREIGN KEY (user_id )REFERENCES user(user_id)
);
