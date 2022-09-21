use laravel;

drop table if exists tagged_articles;
drop table if exists articles;
drop table if exists categories;
drop table if exists tags;

create table tags (
	id int auto_increment,
	tag_name varchar(255),
	primary key (id),
	index (tag_name)
);

insert into tags (tag_name)
values ('AI'), ('Google'), ('High-Performance Computing'), ('Singularity'), ('Laravel'), ('ExpressJS'),
	('Windows 11'), ('Linux'), ('AMD Ryzen 5'), ('Back-End Frameworks');

create table categories (
	id int auto_increment,
	category_name varchar(255),
	primary key (id),
	index (category_name)
);

insert into categories (category_name)
values ('Tech News'), ('Software Reviews'), ('Hardware Reviews'), ('Opinion Pieces'), ('Community Feedback');

create table articles (
	id int auto_increment,
	title varchar(255),
	content text,
	created datetime default CURRENT_TIMESTAMP,
	category_id int,
	primary key (id),
	foreign key (category_id) references categories(id),
	index (created)
);

insert into articles (title, content, category_id)
values ('Everything to know about Java 17', 'Blah blah blah... lots of new facts about Java 17...', 1),
	('Laravel vs ExpressJS', 'Blah blah... some stuff about Laravel... <br>Blah blah blah... some stuff about ExpressJS...', 2),
	('Is Windows 11 worth it?', 'Blah blah... lots of opinions about Windows 11...', 4),
	('Do developers really prefer Linux machines?', 'Blah blah blah... lots of feedback from developers about Linux...', 5),
	('Is an AMD Ryzen 5 5600x Processor good enough for gaming?','Blah blah... stuff about framerates... \nBlah blah blah... stuff about graphics...',3),
	('PS5 vs Xbox Series X/S', 'Blah blah... facts about PS5... \r\nBlah blah... facts about Xbox...', 3);

create table tagged_articles (
	id int auto_increment,
	article_id int,
	tag_id int,
	primary key (id),
	foreign key (article_id) references articles(id),
	foreign key (tag_id) references tags(id)
);

insert into tagged_articles (article_id, tag_id)
values (1, 5), (1, 6), (1, 10), (3, 7), (4, 8), (5, 3), (5, 9), (6, 3);