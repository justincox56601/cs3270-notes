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
 * first line create table TABLENAME(  we are telling mysql to create a new table called TABLENAME.  The next few lines will tell mysql what type of columns to add.
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
 * Here is an example output from my grades table
 * 
 * mysql> show columns in grades;
 * +-------------------+----------+------+-----+-------------------+-------------------+
 * | Field             | Type     | Null | Key | Default           | Extra             |
 * +-------------------+----------+------+-----+-------------------+-------------------+
 * | id                | int      | NO   | PRI | NULL              | auto_increment    |
 * | created_on        | datetime | YES  |     | CURRENT_TIMESTAMP | DEFAULT_GENERATED |
 * | fk_students_id    | int      | NO   | MUL | NULL              |                   |
 * | fk_assignments_id | int      | NO   | MUL | NULL              |                   |
 * | grade             | int      | YES  |     | NULL              |                   |
 * +-------------------+----------+------+-----+-------------------+-------------------+
 * 5 rows in set (0.00 sec)
 * 
 * you can see that it has 5 columns id, created_on, fk_students_id, fk_assignments_id, and grade.  You can see the datatypes, if they are allowed to be null, if they are a primary or foreign key, as well as defaults and extra key words.
 * 
 * Let's get some data into your table!!!
 * INSERT INTO TBALENAME (column1, column2...) VALUES (value1, value2...);
 * 
 * in the example we have started, since id is auto incremented, and created_on has a default value, we only need to pass in the name value.
 * INSERT INTO myFirstTable (name) VALUES ('Jon Souls');
 * INSERT INTO myFirstTable (name) VALUES ('Mary Sue');
 * INSERT INTO myFirstTable (name) VALUES ('Gary TheSnail');
 * 
 * boom!  Easy as that, you have added 3 new names to your table. 
 * Lets take a look at them!
 * SELECT * FROM myFirstTable;
 * 
 * 
 */