use Conference_332;
drop table if exists ismember;
drop table if exists Subcommittee;
drop table if exists Committee_Member;
drop table if exists job_posting;
drop table if exists isSpeaker;
drop table if exists sponsor;
drop table if exists company;
drop table if exists professional;
drop table if exists isInRoom;
drop table if exists student;
drop table if exists room;
drop table if exists attendees;
drop table if exists session;

create table Committee_Member(
  fname varchar(30) not null,
  lname varchar(30) not null,
  primary key(fname,lname)

);

create table Subcommittee(
  name varchar(20) not null primary key,
  chair_fname varchar(30) not null,
  chair_lname varchar(30) not null,
  foreign key (chair_fname, chair_lname) references Committee_Member (fname, lname) on delete cascade
);


create table ismember(
  firstname varchar(30) not null,
  lastname varchar(30) not null,
  committeename varchar(30) not null,
  primary key(firstname, lastname, committeename),
  foreign key (firstname, lastname) references Committee_Member(fname, lname) on delete cascade,
  foreign key (committeename) references Subcommittee(name) on delete cascade
);

create table company(
  name              varchar(20) not null,
  sponsorship_level varchar(8) not null,
  remaining_emails  int,
  primary key(name)
);

create table job_posting(
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

create table professional(
  first_name  varchar(30) not null,
  last_name   varchar(30) not null,
  primary key(first_name, last_name),
  foreign key(first_name, last_name) references attendees(first_name, last_name) on delete cascade
);

create table sponsor(
  first_name  varchar(30) not null,
  last_name   varchar(30) not null,
  company_name varchar(20) not null,
  primary key(first_name, last_name),
  foreign key(first_name, last_name) references attendees(first_name, last_name)on delete cascade,
  foreign key(company_name) references company(name) on delete cascade
);

create table student(
  first_name  varchar(30) not null,
  last_name   varchar(30) not null,
  primary key (first_name, last_name),
  foreign key(first_name, last_name) references attendees(first_name, last_name) on delete cascade
);

create table room(
  room_number int not null,
  occupancy int,
  primary key (room_number)
);

create table isInRoom(
  first_name  varchar(30) not null,
  last_name   varchar(30) not null,
  room_number int,
  primary key(first_name, last_name, room_number),
  foreign key(first_name, last_name) references student(first_name, last_name)on delete cascade,
  foreign key(room_number) references room(room_number)
);

create table session(
  session_name  varchar(32) not null,
  start_time    time,
  end_time      time,
  location      varchar(32),
  day           int,
  primary key(session_name, start_time, day)
);
create table isSpeaker(
  first_name    varchar(30) not null,
  last_name     varchar(30) not null,
  session_name  varchar(32) not null,
  start_time    time not null,
  day           int not null,
  primary key(first_name, last_name, session_name, start_time, day),
  foreign key (first_name, last_name) references attendees(first_name, last_name) on delete cascade,
  foreign key(session_name, start_time, day) references session(session_name, start_time, day) on delete cascade
);

/*========================= Comittee Member ============================*/
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

 /*========================== SubComittee ==============================*/
insert into Subcommittee values ('Program','Abigail','Kozma');
insert into Subcommittee values ('Registration','Matt','Kruzich');
insert into Subcommittee values ('Sponsors','Devin','Alldrit');
insert into Subcommittee values ('Room_Assignment','Tamara','Djukic');
insert into Subcommittee values ('Finance','Molly','White');

/*=========================== is member ===============================*/
insert into ismember values ('Abigail','Kozma', 'Program');
insert into ismember values ('Matt','Kruzich', 'Registration');
insert into ismember values ('Brad','Pitt','Sponsors');
insert into ismember values ('Devin','Alldrit','Sponsors');
insert into ismember values ('Tamara','Djukic', 'Room_Assignment');
insert into ismember values ('Maddie','Leranbaum','Sponsors');
insert into ismember values ('Molly','White', 'Finance');
insert into ismember values ('Sarah','Smith','Sponsors');
insert into ismember values ('Sydney','Wilson','Finance');
insert into ismember values ('Kevin','Glasek','Finance');
insert into ismember values ('Jacob','Glasek','Sponsors');
insert into ismember values ('Sam','Marchetti','Program');
insert into ismember values ('Carie','Trimble','Program');
insert into ismember values ('Jordan','Rogers','Sponsors');

/*=================== add sponsor compnanies ==========================*/
insert into company values('Google', 'Platinum', 5);
insert into company values('Facebook', 'Gold', 4);
insert into company values('AudienceView', 'Bronze', 0);
insert into company values('Microsoft','Silver',3);
insert into company values('OrangeGate','Platinum',5);
insert into company values('ecobee', 'Bronze', 0);

/*================================ add job postings =====================================*/
insert into job_posting values('Google', 'Software Dev', 'Toronto', 'Ontario', 20);
insert into job_posting values('Google', 'Software Analyst', 'Toronto', 'Ontario', 15);
insert into job_posting values('Microsoft', 'Full Stack Dev', 'Toronto', 'Ontario', 15);
insert into job_posting values('Microsoft', 'Software Dev', 'Toronto', 'Ontario', 18);
insert into job_posting values('OrangeGate', 'Robotics Engineer', 'Toronto', 'Ontario', 17);
insert into job_posting values('ecobee', 'Embedded Systems Dev', 'Toronto', 'Ontario', 19);
insert into job_posting values('Google', 'C++ Programmer', 'Toronto', 'Ontario', 21);
insert into job_posting values('Facebook', 'DataBase Dev', 'Toronto', 'Ontario', 16);

/*================================= fill in students ====================================*/
insert into attendees values('Hermione', 'Granger');
insert into attendees values('Harry', 'Potter');
insert into attendees values('Lord', 'Voldemort');
insert into attendees values('Albus', 'Dumbledore');
insert into attendees values('Severus', 'Snape');
insert into attendees values('Drarco', 'Malfoy');
insert into attendees values('Ron', 'Weasley');
insert into attendees values('Dobby', 'Elf');
insert into attendees values('Rubeus', 'Hagrid');
insert into attendees values('Sirius', 'Black');
insert into attendees values('Luna', 'Lovegood');
insert into attendees values('Gellert', 'Grindelwald');
insert into attendees values('Ginny', 'Weasley');
insert into attendees values('Newt', 'Scamander');
insert into attendees values('Remus', 'Lupin');
insert into attendees values('James', 'Potter');
insert into attendees values('Peter', 'Pettigrew');
insert into attendees values('Regulus', 'Black');
insert into attendees values('Lavender', 'Brown');
insert into attendees values('Oliver', 'Wood');
insert into attendees values('Nicholas', 'Flamel');
insert into attendees values('Gregory', 'Goyle');

insert into student values('Hermione', 'Granger');
insert into student values('Harry', 'Potter');
insert into student values('Lord', 'Voldemort');
insert into student values('Albus', 'Dumbledore');
insert into student values('Severus', 'Snape');
insert into student values('Drarco', 'Malfoy');
insert into student values('Ron', 'Weasley');
insert into student values('Dobby', 'Elf');
insert into student values('Rubeus', 'Hagrid');
insert into student values('Sirius', 'Black');
insert into student values('Luna', 'Lovegood');
insert into student values('Gellert', 'Grindelwald');
insert into student values('Ginny', 'Weasley');
insert into student values('Newt', 'Scamander');
insert into student values('Remus', 'Lupin');
insert into student values('James', 'Potter');
insert into student values('Peter', 'Pettigrew');
insert into student values('Regulus', 'Black');
insert into student values('Lavender', 'Brown');
insert into student values('Oliver', 'Wood');
insert into student values('Nicholas', 'Flamel');
insert into student values('Gregory', 'Goyle');

/*======================== fill in room =========================*/
insert into room values(201,4);
insert into room values(202,4);
insert into room values(203,2);
insert into room values(204,2);
insert into room values(205,4);

insert into isInRoom values('Harry', 'Potter', 201);
insert into isInRoom values('Lord', 'Voldemort', 201);
insert into isInRoom values('Albus', 'Dumbledore', 201);
insert into isInRoom values('Ron', 'Weasley', 201);
insert into isInRoom values('Dobby', 'Elf', 202);
insert into isInRoom values('Sirius', 'Black', 202);
insert into isInRoom values('Luna', 'Lovegood', 202);
insert into isInRoom values('Gellert', 'Grindelwald', 202);
insert into isInRoom values('Ginny', 'Weasley', 203);
insert into isInRoom values('Newt', 'Scamander', 203);
insert into isInRoom values('James', 'Potter', 204);
insert into isInRoom values('Peter', 'Pettigrew', 204);
insert into isInRoom values('Regulus', 'Black', 205);
insert into isInRoom values('Lavender', 'Brown', 205);
insert into isInRoom values('Oliver', 'Wood', 205);
insert into isInRoom values('Nicholas', 'Flamel', 205);

update room set occupancy = 0; 


/*===================== sponsors ---------------------------------*/
insert into attendees values('Harold', 'Choy');
insert into attendees values('Henry', 'Thompson');
insert into attendees values('Susie', 'Lung');
insert into attendees values('Serena', 'Annirood');
insert into attendees values('Peter', 'Alber');
insert into attendees values('Ali', 'Koasd');
insert into attendees values('Grant', 'Geof');

insert into sponsor values('Harold', 'Choy', 'Google');
insert into sponsor values('Henry', 'Thompson', 'Google');
insert into sponsor values('Susie', 'Lung', 'OrangeGate');
insert into sponsor values('Serena', 'Annirood', 'Microsoft');
insert into sponsor values('Peter', 'Alber', 'Facebook');
insert into sponsor values('Ali', 'Koasd', 'ecobee');
insert into sponsor values('Grant', 'Geof', 'AudienceView');
/*========================= Professionals ========================*/
insert into attendees values('John','Johnson');
insert into attendees values('Jack', 'Johnson');
insert into attendees values('Muhamed', 'Afashi');
insert into attendees values('Onkar', 'Judge');
insert into attendees values('Jahgdeep', 'Singh');
insert into attendees values('Jerry', 'Springer');
insert into attendees values('Maury', 'Pauvich');

insert into professional values('John','Johnson');
insert into professional values('Jack', 'Johnson');
insert into professional values('Muhamed', 'Afashi');
insert into professional values('Onkar', 'Judge');
insert into professional values('Jahgdeep', 'Singh');
insert into professional values('Jerry', 'Springer');
insert into professional values('Maury', 'Pauvich');

/*======================== Sessions ===============================*/
insert into session values('Networking','12:00:00','13:00:00', 'Gym 1',1);
insert into session values('LinkedIn Intro','13:00:00','14:30:00', 'Room 220',1);
insert into session values('Keynote Speech','16:00:00','17:30:00', 'Gym 2',1);
insert into session values('Resume Workshop','17:00:00','18:30:00', 'Room 112',1);
insert into session values('Networking','11:00:00','12:00:00', 'Gym 2',2);
insert into session values('Cover Letter Workshop','9:00:00','11:30:00', 'Auditorium',2);
insert into session values('Networking','14:00:00','15:00:00', 'Room 220',2);
insert into session values('Interview Help','15:00:00','15:45:00', 'Gym 1',2);
insert into session values('Closing Speech','18:00:00','19:30:00', 'Auditorium',2);

/*======================== Speakers ================================*/
insert into isSpeaker values('Harold','Choy','Networking','12:00:00',1);
insert into isSpeaker values('Jack','Johnson','Networking','12:00:00',1);
insert into isSpeaker values('Jahgdeep','Singh','LinkedIn Intro','13:00:00',1);
insert into isSpeaker values('Maury','Pauvich','Keynote Speech','16:00:00',1);
insert into isSpeaker values('Harold','Choy', 'Resume Workshop','17:00:00',1);
insert into isSpeaker values('Onkar','Judge', 'Resume Workshop','17:00:00',1);
insert into isSpeaker values('Jerry','Springer', 'Networking','11:00:00',2);
insert into isSpeaker values('Hermione','Granger', 'Cover Letter Workshop','9:00:00',2);
insert into isSpeaker values('James','Potter', 'Networking','14:00:00',2);
insert into isSpeaker values('Serena','Annirood', 'Interview Help','15:00:00',2);
insert into isSpeaker values('Grant','Geof', 'Interview Help','15:00:00',2);
insert into isSpeaker values('John','Johnson', 'Closing Speech','18:00:00',2);
