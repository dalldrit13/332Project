drop table if exists job_posting;
drop table if exists company;
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
  pay/h             int,
  foreign key(company_name) references company(name) on delete cascade
);

  insert into company values('Google', 'Platinum', 5);
  insert into company values('Google', 'Platinum', 5);
  insert into company values('Facebook', 'Gold', 4);
  insert into company values('AudienceView', 'Bronze', 0);
  insert into company values('Microsoft','Silver',3);
  insert into company values('OrangeGate','Platinum',5);
  insert into company values('ecobee', 'Bronze', 0);

  insert into job_posting values('Google', 'Software Dev', 'Toronto', 'Ontario', 20);
  insert into job_posting values('Google', 'Software Analyst', 'Toronto', 'Ontario', 15);
  insert into job_posting values('Microsoft', 'Full Stack Dev', 'Toronto', 'Ontario', 15);
  insert into job_posting values('Microsoft', 'Software Dev', 'Toronto', 'Ontario', 18);
  insert into job_posting values('OrangeGate', 'Robotics Engineer', 'Toronto', 'Ontario', 17);
  insert into job_posting values('ecobee', 'Embedded Systems Dev', 'Toronto', 'Ontario', 19);
  insert into job_posting values('Google', 'C++ Programmer', 'Toronto', 'Ontario', 21);
  insert into job_posting values('Facebook', 'DataBase Dev', 'Toronto', 'Ontario', 16);
