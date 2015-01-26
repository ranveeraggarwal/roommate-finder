roommate-finder
===============

A small app for incoming freshies to find their roommates.

UPDATE-Sumith(sumith1896@gmail.com)---MySQL support

1.Copy the mysqli_connect.php outside this folder alongside roommate-finder2.0

2.Adjust this file accordingly.By default,the database name is 'test' with tablename 'data',user of 
complete mysql access,username- 'studentweb' password- 'turtledove'.

Table creation-
CREATE TABLE data(id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,host INT UNSIGNED NOT NULL,room VARCHAR(20) NOT NULL,noofoccupants INT UNSIGNED,name1 VARCHAR(30) NOT NULL,dept1 VARCHAR(50) NOT NULL,fblink1 VARCHAR(50) NULL,name2 VARCHAR(30) NOT NULL,dept2 VARCHAR(50) NOT NULL,fblink2 VARCHAR(50) NULL);

