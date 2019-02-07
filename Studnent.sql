create table Student(
  fname varchar(30) not null,
  lname varchar(30) not null, 
  primary key (fname, lname)
);


create table Room(
  room_number int not null primary key,
  number_beds int not nuss,
  occupancy int
  );
