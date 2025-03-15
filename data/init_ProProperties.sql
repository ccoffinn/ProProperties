/*************************
	Create Database
**************************/

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

insert into authorization (level) values ('user')
,('staff')
,('admin');

insert into energyRating (rating) values ('A')
,('B')
,('C')
,('D')
,('E')
,('F');