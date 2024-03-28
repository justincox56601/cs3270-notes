<?php

/**
 * March 28th IN class activity
 * 
 * 1) Create a table and give it some data
 * 1.1) shell into your bsu account, make a directory (mkdir) called mar28, cd into mar28 and create a file called create-friends.php (touch create-friends.php), then open open it (nano create-friends.php).
 * 1.2) create the varaibles $DB_NAME, $DB_HOST, $DB_USER, $DB_PASS.  these are your databse name, 'localhost', your mysql username, and mysql password respectively.
 * 1.3) connect to your database with the command below.
 * 1.4) create a varaible called $query.  then set it equal to the command to create a new table (create table TABLENAME( ... columns);). this table will have the follwoing columns
 * -- id int auto increment primary key
 * -- _created_date datetime default current timestamp
 * -- _deleted_date datetime
 * -- first_name varchar(255) not null
 * -- last_name varchar(255) not null
 * -- phone_number varchar(255)
 * 1.5) create the command to run the query.  command is below
 * 1.6) create an associative array called friends ['firstName', 'lastName', 'phoneNumber'] and fill it with 5 friends (real or fake)
 * 1.7) create a way to loop through your array and insert each friend into the database.  query below
 * 1.8) in a new terminal shell into your BSU account, cd into mar28 and run your file (php create-firends.php)
 * 1.9) if you got an error, you will need to debug it and fix it
 * 1.10) in a new terminal, shell into your bsu account, log into your mysql account, and confirm the new table is created and populated
 * 1.11) SHOW ME THIS BEFORE MOVING ON
 * 
 * 2) createa a new single page website
 * 2.1) close out of nano (ctrl-s then ctrl-x)
 * 2.2) cd into your www folder and create a new folder called friends-app
 * 2.3) cd into friends-app, create a file called index.php and open it in nano.
 * 2.4) write out some html boilerplate (see below), add an h1 tag with Hello World to the body
 * 2.5) after saving, confirm the page works by going to https://cs.bemidjistate.edu/{starId}/friends-app.  if it doesn't work, fix it before moving on
 * 2.6) edit your file to add PHP opening and closing tags at the top.
 * 2.7) add the same $DB_  variables to this file as you did in your other file, then make a new connection just like you did earlier.
 * 2.8) make a new variable called $query that holds the query string to select all from friends
 * 2.9) make a new variable called $friends that holds the result of running that query
 * 2.10) replace your h1 with the following html in order to print out your friends
 *  <pre>
 *      <php print_r($friends); ?>
 *  </pre>
 * 2.11) SHOW ME THIS BEFORE MOVING ON
 * 2.12) update your query to only return the first name, last name, and phone number or yoru friends
 * 2.13) replace your <pre>...</pre> with a table to display all of your friends.  Template below
 * 2.14) SHOW ME YOUR TABLE BEFORE MOVING ON
 * 
 * 3) do all this again with a new table and page of your choice
 * 
 * 
 * 
 * 
 * 
 * CONNECT TO THE DATABASE
 * $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);
 * $conn->setAttribute(PDO::ATT_ERRMODE, PDO::ERRMODE_EXCEPTION);
 * 
 * RUN A QUERY
 * $results = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
 * 
 * INSERT QUERY
 * insert into TABLENAME (...columns) VALUES(...values)
 * 
 * HTML BOILERPLATE
 *  <!DOCTYPE html>
 *  <html lang="en">
 *  <head>
 *     <meta charset="UTF-8">
 *     <meta name="viewport" content="width=device-width, initial-scale=1.0">
 *     <title>Document</title>
 *  </head>
 *  <body>
 *     
 *  </body>
 *  </html>
 * 
 * 
 * TABLE TEMPLATE
 *  <table>
 *      <TR>
 *          <TH>First Name</TH>
 *          <TH>Lastt Name</TH>
 *          <TH>Phone Number</TH>
 *      </TR>
 *      LOOP THROUGH YOUR ARRAY HERE TO CREATE A ROW (TR) AND CELLS (TD)
 *  </table>
 */

