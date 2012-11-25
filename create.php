
CREATE TABLE usuarios ( 
      id bigint(7) NOT NULL auto_increment, 
      nick char(100) NOT NULL, 
      password char(100) NOT NULL, 
      nombre char(255) default NULL, 
      email char(100) default NULL, 
      KEY id (id))  