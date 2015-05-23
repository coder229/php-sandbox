use phpsandbox;

grant all on phpsandbox.* to 'phpsandbox'@'%' identified by 'phpsandbox';
flush privileges;

drop table if exists photoman_album_image;
drop table if exists photoman_album;
drop table if exists photoman_image;
drop table if exists photoman_user;

create table photoman_user (
	user_id int not null auto_increment,
	username varchar(255) not null,
	password varchar(255) not null,
	access_token varchar(255),
	access_expires int,
	enabled char(1) default 'Y',
	primary key(user_id)
);

create table photoman_album (
	album_id int not null auto_increment,
	user_id int not null,
	name varchar(255) not null,
	primary key (album_id)
);

create index idx_photoman_album_1 on 
	photoman_album(user_id, name);

create table photoman_image (
	image_id int not null auto_increment,
	user_id int not null,
	folder varchar(1024) not null,
	filename varchar(255) not null,
	md5sum varchar(100) not null unique,
	primary key (image_id)
);

create index idx_photoman_image_1 on 
	photoman_image(user_id, filename);

create table photoman_album_image (
	album_id int not null,
	image_id int not null,
	primary key (album_id, image_id)
);
