<?php
/**
 * In CLass Work Night
 * 
 * if you have xampp or some other local mysql server on your machine, you are free to complete tonights work on your local machine.  However if you don't, you will want to shell into the BSU servers and do all of tonights work in nano.  Otherwise, you will spend a great deal of time uploading to the server to test, then make fixes and re upload.  it can be a hassle.
 * 
 * Creating a database via php
 * 1) create a new file in your directory.  This doesnt need to be your www directory or any of the ones that go online.  This file will not be ran from the website anyways.
 * 2) Create a Database class that will interact with the database
 * 2) create some constants/private variables $DB_USER, $DB_PASSWORD, $DB_HOST, $DB_NAME.  these are your username, password, 'localhost' and the name of the DB you are using.
 * 3) in the constructor, use PDO to connect with the database.
 * 4) confirm with me that this part works before moving on.
 * 5) create 3 tables.  Projects, Posts, and Users
 * 5a) The command in PDO for doing is is query().  Feel free to use the example from last class to help with this.
 * 5b) all three tables must have the core fields of _id, _created_date, _modified_date, _deleted_date
 * 5c) _id is an int, it should auto increment, and is the primary key
 * 5d) the three date fields are all datetime, created and modified should have a default of current timestamp, and modified should have an on modified of current timestamp
 * 5e) projects should have title, descriptions, languages, and url fields
 * 5f) posts should have title, author, content, and status (published, draft) fields
 * 5g) users should have first name, last name, email fields
 * 6) once your code complies and creates all three of these tables, show me to confirm before moving on.
 * 7) delete all 3 of those tables from your mysql terminal
 * 8) update your code to check if a table exists and only create one if it doesn't.  I haven't taught you this directly and there are multiple ways to do it.  feel free to use google if you get stuck.
 * 9) insert some fake data into the projects table.
 * 10) create a method called get().  it will take a string $query which is a valid SQL query and returns an array of results from the database.
 * 11) create 3 different queries that shows you can write a valid select querie and your get method returns the expected results
 * 12) create a method post() that takes a string $table, array $values (associative array) and posts it to the correct table
 * 13) create 2 querires that demonstarte this method is working correctly
 * 14) create a method delete() that takes a string $table, and array $condition (associative array) and performs a soft delete on the correct entry in the table. 
 * 14a) ideally you would use the key and value from the array as part of the where clause to accomplish this.
 */