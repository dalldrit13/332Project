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
  primary key(company_name),
  foreign key(company_name) references company(name) on delete cascade
);

insert into company values('Google', 'Platinum', 5);
insert into job_posting values('Google', 'Software Dev', 'Toronto', 'Ontario');
