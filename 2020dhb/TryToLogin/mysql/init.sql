CREATE DATABASE ctf;
use ctf;
CREATE TABLE `user` (
    `id` INT UNSIGNED AUTO_INCREMENT,
    `username` VARCHAR(100) NOT NULL, 
    `password` VARCHAR(100) NOT NULL, 
    PRIMARY KEY ( `id` )
);
create table `fl4g`(`flaa44gg9ggg` char(255));

INSERT INTO fl4g(flaa44gg9ggg) VALUES ('flag{dkktest}');

INSERT into user(`id`,`username`,`password`) VALUES (1,'admin','123456');
INSERT into user(`id`,`username`,`password`) VALUES (2,'test','test');

FLUSH PRIVILEGES;