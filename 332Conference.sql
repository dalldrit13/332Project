drop table if exists job_posting;
drop table if exists Sponsor;
drop table if exists company;
drop table if exists Professional;
drop table if exists Student;
drop table if exists Room;
drop table if exists IsSpeaker;
drop table if exists attendees;
drop table if exists session;

create table if not exists company(
  name              varchar(20) not null,
  sponsorship_level varchar(8) not null,
  remaining_emails  int,
  primary key(name)
);

create table if not exists job_posting(
  company_name      varchar(20) not null,
  job_title         varchar(32) not null,
  city              varchar(20) not null,
  province          varchar(20) not null,
  pay_h             int,
  foreign key(company_name) references company(name) on delete cascade
);

create table attendees(
  first_name  varchar(30) not null,
  last_name   varchar(30) not null,
  primary key(first_name, last_name)
);
create table Professional(
  first_name  varchar(30) not null,
  last_name   varchar(30) not null,
  primary key(first_name, last_name),
  foreign key(first_name, last_name) references attendees(first_name, last_name) on delete cascade
);

create table Sponsor(
  first_name  varchar(30) not null,
  last_name   varchar(30) not null,
  company_name varchar(20) not null,
  primary key(first_name, last_name),
  foreign key(first_name, last_name) references attendees(first_name, last_name) on delete cascade,
  foreign key(company_name) references company(name)
);

create table Room(
  room_number int not null,
  number_beds int not null,
  occupancy int,
  primary key (room_number)
);

create table Student(
  first_name  varchar(30) not null,
  last_name   varchar(30) not null,
  room_number int,
  primary key (first_name, last_name),
  foreign key(first_name, last_name) references attendees(first_name, last_name) on delete cascade,
  foreign key(room_number) references Room(room_number)
);

create table session(
  session_name  varchar(32) not null,
  start_time    time,
  end_time      time,
  location      varchar(32),
  day           int,
  primary key(session_name, start_time, day)
);
create table IsSpeaker(
  first_name    varchar(30) not null,
  last_name     varchar(30) not null,
  session_name  varchar(32) not null,
  start_time    time not null,
  day           int not null,
  primary key(first_name, last_name, session_name, start_time, day),
  foreign key (first_name, last_name) references attendees(first_name, last_name) on delete cascade,
  foreign key(session_name, start_time, day) references session(session_name, start_time, day) on delete cascade
);
