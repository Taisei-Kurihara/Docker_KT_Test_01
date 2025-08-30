CREATE USER IF NOT EXISTS 'data_user'@'%' IDENTIFIED BY 'data';
GRANT ALL PRIVILEGES ON * . * TO 'data_user'@'%';

/* 初期化用 */
DROP DATABASE IF EXISTS db_Neko;
CREATE DATABASE IF NOT EXISTS db_Neko;

use db_Neko;

DROP TABLE IF EXISTS table_Neko;
CREATE TABLE IF NOT EXISTS table_Neko (
    id INT PRIMARY KEY,
    name VARCHAR(255),
    Age INT,
    example_message VARCHAR(255)
);

insert into table_Neko (id, name, Age, example_message) values (1, 'sham', 10, 'message1');
insert into table_Neko (id, name, Age, example_message) values (2, 'Arabia', 20, 'message2');
insert into table_Neko (id, name, Age, example_message) values (3, 'tiger', 30, 'message3');