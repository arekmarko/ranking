create table test_tabela(
    id int primary key,
    nazwa varchar(255)
);

insert into test_tabela values (1, 'siemanko');

create table elements(
    id int primary key auto_increment,
    title varchar(255) not null,
    filename varchar(255) not null
);

insert into elements (title, filename) values ('Kot numer 1', 'kot_1.jpg');
insert into elements (title, filename) values ('Kot numer 2', 'kot_2.jpg');
insert into elements (title, filename) values ('Kot numer 3', 'kot_3.jpg');
insert into elements (title, filename) values ('Kot numer 4', 'kot_4.jpg');
insert into elements (title, filename) values ('Kot numer 5', 'kot_5.jpg');
insert into elements (title, filename) values ('Kot numer 6', 'kot_6.jpg');

create table votes(
    id int primary key auto_increment,
    voter_ip varchar(50) not null,
    vote_val int not null,
    vote_datetime datetime default current_timestamp,
    element_id int,
    foreign key (element_id) references elements(id)
);

insert into votes (voter_ip, vote_val, element_id) values ('test', 4, 1);
insert into votes (voter_ip, vote_val, element_id) values ('test', 3, 1);
insert into votes (voter_ip, vote_val, element_id) values ('test', 1, 1);

insert into votes (voter_ip, vote_val, element_id) values ('test', 1, 2);
insert into votes (voter_ip, vote_val, element_id) values ('test', 4, 2);
insert into votes (voter_ip, vote_val, element_id) values ('test', 4, 2);

insert into votes (voter_ip, vote_val, element_id) values ('test', 4, 3);
insert into votes (voter_ip, vote_val, element_id) values ('test', 1, 3);
insert into votes (voter_ip, vote_val, element_id) values ('test', 1, 3);
