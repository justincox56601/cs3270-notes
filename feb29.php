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
 * Lets create your first database
 * create database DATABASENAME; 
 * use database DATABASENAME; 
 * 
 * You are now in your database.  Think of your database as an excel workbook.  each table is a page of the workbook, and can have whatever data you want in it.  Because everything is standardized, we do need to define the type and structure of our data.  Let's create our first table. 
 * 
 * create table TABLENAME ( 
 *      id int AUTO_INCREMENT PRIMARY KEY,
 *      created_on DATETIME DEFAULT CURRENT_TIMESTAMP,
 *      name varchar(255) NOT NULL
 * );
 * 
 * Lets take a look at what we did here.
 * first line create table TABLENAME(  we are telling mysql to create a new table called TABLENAME, I called mine names for now, we will delete this table soon so don't put too much thought into it.  The next few lines will tell mysql what type of columns to add.
 * 
 * id int AUTO_INCREMENT PRIMARY KEY - the first column is called 'id', it is of type int (integer) we gave it the auto increment flag, so it will set ids for us, and we set it as the primary key.  Generally the id column is the priimary key of a table.  The primary key is a column that acts as an unique identifier for every row of data.  ID makes a good candidate for this, though it is not required, and sometimes worth using something else.
 * 
 * created_on DATETIME DEFAULT CURRENT_TIMESTAMP - this column is called 'created_on'.  Notice the snake case for multiple word names.  This column is of type date time  (YYYY-MM-DD HH:MI:SS) and we are setting a default value of the current timestamp as its value.  Using the default keyword means that mysql will fill in that value for us if we don't provide it when we make an insertion.  CURRENT_TIMESTAMP is a built in keyword for mysql that just returns the current timestamp.  we don't have to do anything here, it will be handled automatically.
 * 
 * name varchar(255) NOT NULL - this last column is called name.  It is of type varchar (Variable Characters - mix of number, letters, and symbols) and has a max length of 255 characters.  We could set this to 100, or 10, or even 2 if we wanted.  Usually it is good to set this to a known value but in the case of names, while we can make safe assumptions, we can't be sure of what we are actually going to store, so 255 if kind of a default value when you are unsure of what to put there.  Just remember, that it will keep 255 characters worth of space stored for that table entry, even if the actual entry is only 3 characters long.  The NOT NULL keywords tell SQL, that this columns cannot be null.  We HAVE to pass in a value for it.  If we don't we will get an error.
 * 
 * Once you ahve done that you can see what you have just created with the following command.
 * show columns in TABLENAME;
 * 
 * Here is an example output from my names table
 * 
 * mysql> show columns in names;
* +--------------+--------------+------+-----+-------------------+-------------------+
* | Field        | Type         | Null | Key | Default           | Extra             |
* +--------------+--------------+------+-----+-------------------+-------------------+
* | id           | int          | NO   | PRI | NULL              | auto_increment    |
* | created_on | datetime     | YES  |     | CURRENT_TIMESTAMP | DEFAULT_GENERATED |
* | name         | varchar(255) | NO   |     | NULL              |                   |
* +--------------+--------------+------+-----+-------------------+-------------------+
* 3 rows in set (0.01 sec)
 * 
 * you can see that it has 3 columns id, created_on, and name.  You can see the datatypes, if they are allowed to be null, if they are a primary or foreign key, as well as defaults and extra key words.
 * 
 * Let's get some data into your table!!!
 * INSERT INTO TBALENAME (column1, column2...) VALUES (value1, value2...);
 * 
 * in the example we have started, since id is auto incremented, and created_on has a default value, we only need to pass in the name value.
 * INSERT INTO names (name) VALUES ('Jon Souls');
 * INSERT INTO names (name) VALUES ('Mary Sue');
 * INSERT INTO names (name) VALUES ('Gary TheSnail');
 * 
 * boom!  Easy as that, you have added 3 new names to your table. 
 * Lets take a look at them!
 * SELECT * FROM names;
 * 
 * mysql> select * from names;
 * +----+---------------------+---------------+
 * | id | created_on          | name          |
 * +----+---------------------+---------------+
 * |  1 | 2024-02-29 08:54:13 | John Souls    |
 * |  2 | 2024-02-29 08:54:29 | Mary Sue      |
 * |  3 | 2024-02-29 08:54:47 | Gary TheSnail |
 * +----+---------------------+---------------+
 * 3 rows in set (0.00 sec)
 * 
 * notice that we did not pass in values for id or created_on.  Because we set Auto increment on the id, and set a default value for created on, we only needed to pass in the value we wanted for name.  The rest was taken care of.
 * 
 * Lets take a look at the command we just used:
 * select * from names;
 * SELECT tells MySql what fields you want returned.  Here we used the * (splat, star, asterisk) to tell myql that we want all of fields.  We could have used a comma separated list to get just the columns we wanted.  for example: 
 * 
 * * mysql> select id, name from names;
 * +----+---------------+
 * | id | name          |
 * +----+---------------+
 * |  1 | John Souls    |
 * |  2 | Mary Sue      |
 * |  3 | Gary TheSnail |
 * +----+---------------+
 * 3 rows in set (0.00 sec)
 * 
 * FROM - this tells mysql which table you want to use to get your information from.  here we are only using the name table.  But as you learn more sql, you can have multiple tables in a single query
 * 
 * What if you make a mistake?  maybe you mispelled a column name or a column entry.  what do we do then?  The answer is ALTER.
 * 
 * lets say  our table called names  needs to be capitalized for some reason.  The company we work for uses all caps for table names and we weren't payig attention when we typed it out.  luckily ALTER to the rescue.
 * 
 * ALTER TABLE names RENAME NAMES;
 * here we are tring to rename the table called 'names'  to 'NAMES'
 * 
 * mysql> ALTER TABLE names RENAME NAMES;
 * Query OK, 0 rows affected (0.01 sec)
 * 
 * mysql> show tables;
 * +----------------------------+
 * | Tables_in_s24_cs3270       |
 * +----------------------------+
 * | NAMES                      |
 * | assignments                |
 * | grades                     |
 * | notes                      |
 * | students                   |
 * | students_assignments_notes |
 * +----------------------------+
 * 6 rows in set (0.01 sec)
 * 
 * as you can see, when i run the show tables command, we now have a new table called NAMES.  Lets change it back real quick, I don't like having it all cpas like that.
 * 
 * EXERCISE:  do this one on your own.
 * 
 * but what if we wanted to change a column name?  Say change name to name_1? Same idea
 * 
 * ALTER TABLE names RENAME COLUMN name TO name_1
 * ALTER TABLE - tells mysql we are going to alter a table, in this case names.
 * RENAME COLUMN tells mysql we are specifically renaming a column name.
 * name TO name_1 - our old name to our new name
 * 
 * 
 * mysql> ALTER TABLE names RENAME COLUMN name TO name_1;
 * Query OK, 0 rows affected (0.01 sec)
 * Records: 0  Duplicates: 0  Warnings: 0
 * 
 * mysql> show columns in names;
 * +------------+--------------+------+-----+-------------------+-------------------+
 * | Field      | Type         | Null | Key | Default           | Extra             |
 * +------------+--------------+------+-----+-------------------+-------------------+
 * | id         | int          | NO   | PRI | NULL              | auto_increment    |
 * | created_on | datetime     | YES  |     | CURRENT_TIMESTAMP | DEFAULT_GENERATED |
 * | name_1     | varchar(255) | NO   |     | NULL              |                   |
 * +------------+--------------+------+-----+-------------------+-------------------+
 * 3 rows in set (0.00 sec)
 * 
 * and now our name column has been changed to name_1. 
 * 
 * But want about a column entry?  is that just as easy?  prtty close actually.  pretty close.
 * When updating a value, we want to use the UPDATE command.  we are updating a value instead of altering the structure of the table.  
 * 
 * Lets say we messed up and 'John Souls' is supposed to be 'Jon Souls'.  adding that extra h in Jon is pretty common and we just weren't paying attention when we entered it.
 * 
 * syntax:
 * UPDATE tablename SET column_name = newValue WHERE CONDITIONAL
 * 
 * example: 
 * UPDATE names SET name_1 = 'Jon Souls' WHERE name_1 = 'John Souls'
 * 
 * UPDATE names - we are telling mysql that we want to update a value(s) in the names table. 
 * SET name_1 = 'Jon Souls' - we are telling mysql that we want to set the name_1 column to 'Jon Souls wherever the conditional is true.
 * WHERE name_1 = 'John Souls' - this is the conditional we are checking against.  Our update will only happen  where name_1 has a value of 'John Souls'
 * 
 * mysql> UPDATE names SET name_1 = 'Jon Souls' WHERE name_1 = 'John Souls';
 * Query OK, 1 row affected (0.00 sec)
 * Rows matched: 1  Changed: 1  Warnings: 0
 * 
 * mysql> select * from names;
 * +----+---------------------+---------------+
 * | id | created_on          | name_1        |
 * +----+---------------------+---------------+
 * |  1 | 2024-02-29 08:54:13 | Jon Souls     |
 * |  2 | 2024-02-29 08:54:29 | Mary Sue      |
 * |  3 | 2024-02-29 08:54:47 | Gary TheSnail |
 * +----+---------------------+---------------+
 * 3 rows in set (0.00 sec)
 * 
 * It is important to note that the conditional could be false all the time and result in no changes.  if we accidentally typed in WHERE name_1 = 'John SOuls'  (mispelling in souls) it never would have fired because it never would have been true.
 * 
 * Also, the conditional is technically optional.
 * 
 * Exercise: use the following command and see what happens;
 * UPDATE names SET name_1 = 'Steve';
 * 
 * You know what?  this table has servied its purpose and I no longer have a need for it.  We really should clean it up.  How do we do that?  With the most dangerous command in SQL that is how. DROP TABLE
 * 
 * syntax:
 * DROP TABLE tableName;
 * 
 * example: 
 * DROP TABLE names;
 * 
 * mysql> DROP TABLE names;
 * Query OK, 0 rows affected (0.01 sec)
 * 
 * mysql> show tables;
 * +----------------------------+
 * | Tables_in_s24_cs3270       |
 * +----------------------------+
 * | assignments                |
 * | grades                     |
 * | notes                      |
 * | students                   |
 * | students_assignments_notes |
 * +----------------------------+
 * 5 rows in set (0.00 sec)
 * 
 * RECAP:
 * 
 * to show databases you have access to:
 * SHOW DATABASES;
 * 
 * to use a specific database:
 * USE databaseName;
 * 
 * to show all tables in a database:
 * SHOW TABLES;
 * 
 * to see all of the columns and datatypes in a table:
 * SHOW COLUMNS IN tableName;
 * 
 * to create a new database;
 * CREATE DATABASE databaseName;
 * 
 * to create a new table:
 * CREATE TABLE tableName(columnInfo);
 * 
 * columnInfo:
 * columnName dataType&size keywords  - example name varchar(255) NOT NULL
 * 
 * 
 */

