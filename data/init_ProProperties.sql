/*************************
	Create Database
**************************/

drop database if exists ProProperties;
create database ProProperties;
use ProProperties;

create table address (
	ID int not null auto_increment, /* auto increment PK to avoid duplication errors */
    line1 varchar(255) not null,
    line2 varchar(255),
    line3 varchar(255),
    countyCity varchar(255),
    eircode varchar(20),
    primary key(ID));
    
create table person (
	ID int not null auto_increment,
    firstName varchar(255) not null,
    surname varchar(255) not null,
    addressID int,
    primary key(ID),
    foreign key(addressID) references address(ID));

create table authorization (
	ID int not null auto_increment,
    level varchar(255) not null,
    primary key(ID));
    
create table account (
	ID int not null auto_increment,
    email varchar(255) not null,
    password varchar(20) not null,
    personID int not null,
    authorizationID int not null,
    primary key(ID),
    foreign key(personID) references person(ID),
    foreign key(authorizationID) references authorization(ID));
    
create table energyRating (
	ID int not null auto_increment,
    rating char(1) not null,
    primary key(ID));
    
create table property (
	ID int not null auto_increment,
    price double,
    beds int(6), 
    baths int(6),
    footage int(200),
    addressID int not null,
    energyRatingID int not null,
    primary key(ID),
    foreign key(addressID) references address(ID),
    foreign key(energyRatingID) references energyRating(ID));
    
create table booking (
	ID int not null auto_increment,
    date date not null,
    time time not null,
    propertyID int not null,
    personID int not null,
    primary key(ID),
    foreign key(propertyID) references property(ID),
    foreign key(personID) references person(ID));
    
/*************************
	Populate Database
**************************/

/* some data hand created, others generated using mockaroo.com */

insert into address (line1, line2, line3, countyCity, eircode) values ('398 Anderson Place', 'Finglas', '', 'Dublin 17', 'D17 F5P4')
,('412 Oakwood Avenue', 'Rathmines', '', 'Dublin 6', 'D06 R5P9')
,('12 Elm Street', 'Drimnagh', '', 'Dublin 12', 'D12 P3K2')
,('289 Willow Crescent', 'Tallaght', '', 'Dublin 24', 'D24 X3F7')
,('61 Maple Drive', 'Clontarf', '', 'Dublin 3', 'D03 B9A8')
,('87 Birch Road', 'Phibsborough', '', 'Dublin 7', 'D07 C9R6')
,('24 Pine View', 'Portobello', '', 'Dublin 8', 'D08 A1F3')
,('56 Cedar Walk', 'Dundrum', '', 'Dublin 16', 'D16 K2W1')
,('37 Ashfield Lane', 'Donaghmede', '', 'Dublin 13', 'D13 P3F7')
,('10 Chestnut Grove', 'Templeogue', '', 'Dublin 6W', 'D6W T3A1');

insert into person (firstname, surname, addressID) values ('John', 'Doe', 4)
,('Emma', 'Smith', 7)
,('Liam', 'Johnson', 2)
,('Olivia', 'Brown', 9)
,('Noah', 'Davis', 5)
,('Ava', 'Miller', 3)
,('Ethan', 'Wilson', 8)
,('Sophia', 'Moore', 6)
,('James', 'Taylor', 1)
,('Isabella', 'Anderson', 10);

insert into authorization (level) values ('user')
,('staff')
,('admin');

insert into account (email, password, personID, authorizationID) values ('admin@email.com', 'admin', 1, 3)
,('emmasmith7@email.com', 'staff', 2, 2)
,('liamjohnson2@email.com', 'staff', 3, 2)
,('oliviabrown9@email.com', 'user', 4, 1)
,('noahdavis5@email.com', 'user', 5, 1)
,('avamiller3@email.com', 'Ava@789Pass', 6, 1)
,('ethanwilson8@email.com', 'Ethan456Pass@', 7, 1)
,('sophiamoore6@email.com', 'Sophia#1234Pass', 8, 1)
,('jamestaylor1@email.com', 'JamesPass2021!', 9, 1)
,('isabellaanderson10@email.com', 'Isabella@987!Pass', 10, 1);

insert into energyRating (rating) values ('A')
,('B')
,('C')
,('D')
,('E')
,('F');

insert into property (price, beds, baths, footage, addressID, energyRatingID) values ('250000', 2, 1, 58, 1, 3)
,('320000', 4, 2, 98, 2, 5)
,('420000', 1, 1, 45, 3, 2)
,('550000', 4, 3, 110, 4, 6)
,('610000', 6, 3, 140, 5, 1)
,('430000', 2, 1, 76, 6, 4)
,('380000', 3, 2, 88, 7, 3)
,('490000', 5, 3, 132, 8, 6)
,('670000', 6, 4, 190, 9, 2)
,('530000', 4, 2, 152, 10, 5);

insert into booking (date, time, propertyID, personID) values ('2025-03-17', '09:15:00', 1, 3)
,('2025-03-18', '11:30:00', 2, 5)
,('2025-03-19', '14:00:00', 3, 8)
,('2025-03-20', '10:45:00', 1, 7)
,('2025-03-21', '16:30:00', 2, 6);




