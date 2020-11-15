CREATE DATABASE ctf;
use ctf;
CREATE TABLE `file` (
    `id` INT UNSIGNED AUTO_INCREMENT,
    `code` VARCHAR(100) NOT NULL, 
    `url` VARCHAR(100) NOT NULL, 
    PRIMARY KEY ( `id` )
);
CREATE TABLE `flag` (
    `flag` VARCHAR(100) NOT NULL
);

INSERT INTO flag(flag) VALUES ('flag{dkktest}');


INSERT INTO file(id,code,`url`) VALUES (1,'114514',"https://blog.dkkkkk.com/");
INSERT INTO file(id,code,`url`) VALUES (2,'233333',"https://blog.dkkkkk.com/");
INSERT INTO file(id,code,`url`) VALUES (3,'666666',"https://blog.dkkkkk.com/");

FLUSH PRIVILEGES;