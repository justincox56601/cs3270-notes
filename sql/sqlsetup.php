<?php
/**
 * Example for setting up database tables in your website.  
 * The biggest problem here is that th sql set up code needs to be separate from your website.
 * If the sql code is in the same www directory as your website, then it is available to the 
 * whole internet and that is bad.
 * 
 * we are going to set this up so that we can run this file by itself from the console.
 */

 //these are supposed to be int he config.ini file but this is an example
 $DB_USER = 'username';
 $DB_PASS = 'password';
 $DB_HOST = 'localhost';
 $DB_NAME = 'databasename';

 //$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS); //no need to do a try catch.  This will crash if it doesn't succeed anyways.

 $tables = array_diff(scandir('./tables'), array('.', '..'));

 foreach($tables as $table){
    include_once("./tables/$table");
    $table = explode('.', $table);
    $table = ucfirst($table[0] . ucfirst($table[1]));
    
    $table = new $table();
    $table->run(''); //we should pass $conn here, but i have it commented out for the demonstration

 }