use phpsandbox;

drop table if exists photoman_album_image;
drop table if exists photoman_album;
drop table if exists photoman_image;

create table photoman_album (
	album_id int not null auto_increment,
	name text not null,
	primary key (album_id)
);

create table photoman_image (
	image_id int not null auto_increment,
	folder text not null,
	filename varchar(255) not null,
	md5sum varchar(100) not null unique,
	primary key (image_id)
);

create index photoman_image_filename on 
	photoman_image(filename);

create table photoman_album_image (
	album_id int not null,
	image_id int not null,
	primary key (album_id, image_id)
);



