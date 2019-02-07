create table Subcommittee(
  name varchar(20) not null primary key
  chairfname varchar(30) not null, 
  chairlname varchar(3)) not null,
  foriegn key (chairfname, chairlname) references Committee_Member (fname, lname)
);



create table Comimittee_Member(
  fname varchar(30) not null,
  lname varchar(30) not null,
  primary key(fname,lname)
 
);

