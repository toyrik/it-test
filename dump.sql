create table links(
  id int not null primary key auto_increment,
  url varchar(255),
  code varchar(12),
  created datetime
);