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
  foriegn key(firstname, lastname) references Committee_Member(fname, lname),
  foriegn key(comitteename) referneces Subcomittee(name)
  
  );

