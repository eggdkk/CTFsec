CREATE DATABASE flllllaggg;
use flllllaggg;
create table `s3c`(`key` char(100));
insert into s3c  values('35fbf008d6c22443f4933cb25af3a689');
create table `sec`(`ip` char(255),`time_read` char(255));
INSERT into sec(`ip`,`time_read`) VALUES ('127.0.0.1','2000.0.0');
CREATE USER 'ctf' IDENTIFIED BY '123456';
GRANT select, insert, update, delete ON flllllaggg.* TO 'ctf'@'%';
FLUSH PRIVILEGES;