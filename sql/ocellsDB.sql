use birdwatchingtool;

create table ordre_cientific (
id_ordre_cientific int not null auto_increment,
nom_ordre_cientific varchar(50) not null,
img_ordre_cientific longblob not null,
PRIMARY KEY (id_ordre_cientific)
);


create table ocells (
id_ocell int not null auto_increment,
nom_llati varchar(50) not null,
nom_comu varchar(50) not null,
id_ordre_cientific int not null,
img_ocell longblob not null,
PRIMARY KEY (id_ocell),
FOREIGN KEY (id_ordre_cientific) REFERENCES ordre_cientific(id_ordre_cientific)
);

create table birdwatcher (
id_birdwatcher int not null auto_increment,
nom varchar(100) not null,
cognom1 varchar(100) not null,
cognom2 varchar(100),
correu_electronic varchar(100) not null,
contrasenya varchar(100) not null,
PRIMARY KEY (id_birdwatcher)
);
use birdwatchingtool;
create table avistaments (
id_avistament int not null auto_increment,
id_birdwatcher_fk int not null,
id_ocell_fk int not null,
FOREIGN KEY (id_birdwatcher_fk) REFERENCES birdwatcher(id_birdwatcher),
FOREIGN KEY (id_ocell_fk) REFERENCES ocells(id_ocell),
PRIMARY KEY (id_avistament)
);