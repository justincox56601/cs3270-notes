<?php
/**
 * MySQL!!!
 * Now we can really start getting into creating dynamic websites.  Until now, we have been storing all of our data in a simple data object or associative array.  But now, we can start migrating all of that away from our pages and storing it properly in a database. Lets get started!
 * 
 * First open up a terminal and ssh into the cs server.  Then run the following command:
 * mysql -u YOURUSERNAME -p
 * this will prompt you for  a password.  since it is a password fields, all of the characters will either be starred out or not shown depening on the server.  enter your password.
 * 
 * If you entered everyting correctly, you will get a little welcome message and your terminal line will now say mysql> instead of your name.
 * 
 * first lets see what databases you have access to.
 * 
 * show databases;  <- the semi colon is important.  you will forget it a alot dont worry.  
 * Here is the output from my mysql server at home.  you can see I only have a couple of tables.  
 * +--------------------+
 * | Database           |
 * +--------------------+
 * | gidakiim           |
 * | information_schema |
 * | mysql              |
 * | performance_schema |
 * | sakila             |
 * | sys                |
 * | voyageurs          |
 * | world              |
 * +--------------------+
 * 
 * 
 * 
 * create table; -- creates a table
 * show tables; -- show all of the tables in a database
 * alter table; -- add, modify, delete columns
 * drop table; -- deletes a table;
 * 
 * 
 */