create database learnen;
use learnen;

create table if not exists eventlocal(
keyname varchar(50) not null,
keytarget varchar(1000) not null,
pressdate varchar(225)
);

drop table eventlocal;
select * from eventlocal;