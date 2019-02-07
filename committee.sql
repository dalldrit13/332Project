create table Committee_Member(
  fname varchar(30) not null,
  lname varchar(30) not null,
  primary key(fname,lname)
 
);

create table Subcommittee(
  name varchar(20) not null primary key
  chair_fname varchar(30) not null, 
  chair_lname varchar(3)) not null,
  foriegn key (chair_fname, chair_lname) references Committee_Member (fname, lname)
);


create table ismember(
  firstname varchar(30),
  lastname varchar(30),
  committeename varchar(30),
  foriegn key(firstname, lastname) references Committee_Member(fname, lname) on delete cascade,
  foriegn key(comitteename) referneces Subcomittee(name) on delete cascade
  
  );

/* Comittee Member */
insert info Committee_Member values ('Abigail','Kozma');
insert info Committee_Member values ('Matt','Kruzich');
insert info Committee_Member values ('Brad','Pitt');
insert info Committee_Member values ('Devin','Alldrit');
insert info Committee_Member values ('Tamara','Djukic');
insert info Committee_Member values ('Maddie','Leranbaum');
insert info Committee_Member values ('Molly','White');
insert info Committee_Member values ('Sarah','Smith');
insert info Committee_Member values ('Sydney','Wilson');
insert info Committee_Member values ('Kevin','Glasek');
insert info Committee_Member values ('Jacob','Glasek');
insert info Committee_Member values ('Sam','Marchetti');
insert info Committee_Member values ('Carie','Trimble');
insert info Committee_Member values ('Jordan','Rogers');
  
  
 /* SubComittee */
insert info Subcommittee values ('Program','Abigail','Kozma');  
insert info Subcommittee values ('Registration','Matt','Kruzich');  
insert info Subcommittee values ('Sponsors','Devin','Alldrit');
insert info Subcommittee values ('Room_Assignment','Tamara','Djukic');
insert info Subcommittee values ('Finance','Molly','White');

  
/* is member */
insert info ismember values ('Abigail','Kozma', 'Program');
insert info ismember values ('Matt','Kruzich', 'Registration');
insert info ismember values ('Brad','Pitt','Sponsors');
insert info ismember values ('Devin','Alldrit','Sponsors');
insert info ismember values ('Tamara','Djukic', 'Room_Assignment');
insert info ismember values ('Maddie','Leranbaum',,'Sponsors');
insert info ismember values ('Molly','White', 'Finance');
insert info ismember values ('Sarah','Smith','Sponsors');
insert info ismember values ('Sydney','Wilson','Finance');
insert info ismember values ('Kevin','Glasek','Finance');
insert info ismember values ('Jacob','Glasek','Sponsors');
insert info ismember values ('Sam','Marchetti','Program');
insert info ismember values ('Carie','Trimble','Program');
insert info ismember values ('Jordan','Rogers',,'Sponsors');
  
