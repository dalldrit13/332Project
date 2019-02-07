create table Student(
  fname varchar(30) not null,
  lname varchar(30) not null,
  roomnum int,
  primary key (fname, lname),
  foreign key (roomnum) References Room (room_number)
  
);


create table Room(
  room_number int not null primary key,
  number_beds int not nuss,
  occupancy int
  );

/*fill in students*/
insert into Student ('harry', 'Potter','1');


/*fill in Room*/
insert into Room values ('1','2', );
insert into Room values ('2','2', );
insert into Room values ('3','2', );
insert into Room values ('4','2', );
insert into Room values ('5','2', );
insert into Room values ('6','1', );
insert into Room values ('7','1', );
insert into Room values ('8','1', );
insert into Room values ('9','1', );
insert into Room values ('10','1', );
