create table Committee_Member(
  fname varchar(30) not null,
  lname varchar(30) not null,
  primary key(fname,lname)
 
);

create table Subcommittee(
  name varchar(20) not null primary key,
  chair_fname varchar(30) not null, 
  chair_lname varchar(30) not null,
  foreign key (chair_fname, chair_lname) references Committee_Member (fname, lname)
);


create table ismember(
  firstname varchar(30) not null,
  lastname varchar(30) not null,
  committeename varchar(30) not null,
  primary key(firstname, lastname, committeename),
  foreign key (firstname, lastname) references Committee_Member(fname, lname) on delete cascade,
  foreign key (committeename) references Subcommittee(name) on delete cascade
  
  );

/* Comittee Member */
insert into Committee_Member values ('Abigail','Kozma');
insert into Committee_Member values ('Matt','Kruzich');
insert into Committee_Member values ('Brad','Pitt');
insert into Committee_Member values ('Devin','Alldrit');
insert into Committee_Member values ('Tamara','Djukic');
insert into Committee_Member values ('Maddie','Leranbaum');
insert into Committee_Member values ('Molly','White');
insert into Committee_Member values ('Sarah','Smith');
insert into Committee_Member values ('Sydney','Wilson');
insert into Committee_Member values ('Kevin','Glasek');
insert into Committee_Member values ('Jacob','Glasek');
insert into Committee_Member values ('Sam','Marchetti');
insert into Committee_Member values ('Carie','Trimble');
insert into Committee_Member values ('Jordan','Rogers');
  
  
 /* SubComittee */
insert into Subcommittee values ('Program','Abigail','Kozma');  
insert into Subcommittee values ('Registration','Matt','Kruzich');  
insert into Subcommittee values ('Sponsors','Devin','Alldrit');
insert into Subcommittee values ('Room_Assignment','Tamara','Djukic');
insert into Subcommittee values ('Finance','Molly','White');

  
/* is member */
insert into ismember values ('Abigail','Kozma', 'Program');
insert into ismember values ('Matt','Kruzich', 'Registration');
insert into ismember values ('Brad','Pitt','Sponsors');
insert into ismember values ('Devin','Alldrit','Sponsors');
insert into ismember values ('Tamara','Djukic', 'Room_Assignment');
insert into ismember values ('Maddie','Leranbaum',,'Sponsors');
insert into ismember values ('Molly','White', 'Finance');
insert into ismember values ('Sarah','Smith','Sponsors');
insert into ismember values ('Sydney','Wilson','Finance');
insert into ismember values ('Kevin','Glasek','Finance');
insert into ismember values ('Jacob','Glasek','Sponsors');
insert into ismember values ('Sam','Marchetti','Program');
insert into ismember values ('Carie','Trimble','Program');
insert into ismember values ('Jordan','Rogers','Sponsors');
