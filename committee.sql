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
  
  
  
/* is member */
  
