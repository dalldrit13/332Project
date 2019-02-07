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
insert into Student ('Hermione', 'Granger','1');
insert into Student ('Harry', 'Potter','1');
insert into Student ('Lord', 'Voldemort','1');
insert into Student ('Albus', 'B'Dumbledore'1');
insert into Student ('Severus', 'Snape','1');
insert into Student ('Drarco', 'Malfoy','1');
insert into Student ('Ron', 'Weasley','1');
insert into Student ('Dobby', 'Elf','1');
insert into Student ('Rubeus', 'Hagrid','1');
insert into Student ('Sirius', 'Black','1');
insert into Student ('Luna', 'Lovegood','1');
insert into Student ('Gellert', 'Grindelwald','1');
insert into Student ('Ginny', 'Weasley','1');
insert into Student ('Newt', 'Scamander','1');
insert into Student ('Remus', 'Lupin','1');
insert into Student ('James', 'Potter','1');
insert into Student ('Peter', 'Pettigrew','1');
insert into Student ('Regulus', 'Black','1');
insert into Student ('Lavender', 'Brown','1');
insert into Student ('Oliver', 'Wood','1');
insert into Student ('Nicholas', 'Flamel','1');
insert into Student ('Gregory', 'Goyle','1');


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
