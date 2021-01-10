
create table questions1(
	id int PRIMARY key not null,
    question varchar(50)
);
insert into questions1 values('1', "Your first school's name");
insert into questions1 values('2', "your pet's name");
insert into questions1 values('3', "your favorite teacher's namee");
insert into questions1 values('4', "your favorite friend's name");

create table users( idUsers int AUTO_INCREMENT PRIMARY key NOT null,
uidUsers varchar(256) not null,
emailUsers varchar(256) not null,
pwdUsers varchar(256) not null,
question1 int not null ,
answer1 varchar(50) not null 
);
ALTER TABLE `users` ADD FOREIGN KEY (`question1`) REFERENCES `users`(`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO users(`uidUsers`,`emailUsers`,`pwdUsers`,`question1`,`answer1`) VALUES ('test', 'test@yahoo.com', 'test',1, 'test');


SELECT * FROM users u JOIN questions1 q WHERE u.question1 =q.id

create table pwdreset ( pwdResetId int(11) PRIMARY key AUTO_INCREMENT not null, 
pwdResetEmail text not null, 
pwdResetSelector text not null,
 pwdResetToken longtext not null, 
 pwdResetExpires text not null )