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
    today datetime,
    `status` varchar(50),
    reserved varchar(50),
    PRIMARY KEY (plate_id,today),
    FOREIGN KEY (plate_id)  REFERENCES car(plate_id) ON DELETE CASCADE
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
	reserve_date datetime,
    user_id int NOT null,
    reservation_number int NOT null AUTO_INCREMENT unique,
    plate_id varchar(50) NOT null,
    PRIMARY KEY(user_id,plate_id),
    FOREIGN KEY (plate_id)  REFERENCES car(plate_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id )REFERENCES user(user_id) ON DELETE CASCADE
);
CREATE TABLE payment(
    reservation_number int NOT null AUTO_INCREMENT,
    user_id int NOT null,
    payment_time datetime,
    amount varchar(100),
    method varchar(100),
    PRIMARY KEY(reservation_number,user_id),
    FOREIGN KEY (reservation_number)  REFERENCES reservation(reservation_number) ON DELETE CASCADE,
    FOREIGN KEY (user_id )  REFERENCES reservation(user_id) ON DELETE CASCADE
);

CREATE TABLE reserve_status(
    plate_id varchar(50) NOT NULL,
    reservation_number int NOT null,
    pickup_date datetime,
    return_date datetime,
    PRIMARY KEY (plate_id,reservation_number),
    FOREIGN KEY (plate_id,pickup_date)  REFERENCES car_status(plate_id,today) ON DELETE CASCADE,
    FOREIGN KEY (plate_id,return_date)  REFERENCES car_status(plate_id,today) ON DELETE CASCADE,
    FOREIGN KEY (reservation_number)  REFERENCES reservation(reservation_number) ON DELETE CASCADE
);
