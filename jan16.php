<?php
/**
 * SCOPE:
 * Like any other language, PHP has scope.  Variables can be scoped to the 
 * global scope or the local scope.  try the example below.  Before you run this 
 * script, what do you think will happen?
 */

//  $myVar = 47;

//  function print_my_var():void{
// 	$myVar = 'this is not a number';
// 	echo $myVar . PHP_EOL;
//  }

//  function print_my_other_var($myVar){
// 	echo $myVar . PHP_EOL;
//  }

//  echo $myVar . PHP_EOL;
//  print_my_var();
//  print_my_other_var(119);
//  echo print_my_var();

/**
 * GLOBALS and CONSTANTS
 * the 'global' keyword declares a variable that is available to the ENTIRE
 * program. using the define function does the same thing.  Global is for variables
 * and define is for constants.  
 * 
 * constants CANNOT be changed and should be upper cased.  Notice, the constant
 * below does not have the $ prefix.
 * 
 * notice that the declaration of the global $user and the definition of $user are
 * not on the same line.  Why did I not do it all on the same line?
 */

// global $user;
// $user = [
// '_id' => 142345,
// 'firstName' => 'John',
// 'lastName' => 'Doe',
// ];

// define('URL_ROOT', 'https://cs.bemidjistate.edu/jcox/cs3270');

// echo URL_ROOT . PHP_EOL;
// print_r($user)

/**
 * REFERENCE
 * Prepending an '&' to a variable will create a reference to that
 * variable.
 * 
 * in the example below, 'Fido' is stored as $dog.  $cat is a reference
 * to $dog and $hamster is a 'copy' of $dog.  $cat is a reference to 
 * the memory location of $dog and any changes to $cat will be reflected
 * in $dog.  While in $hamster it isn't.
 * 
 * What is the value in Gecko?
 */

//  $dog = 'Fido';
//  $cat = &$dog;
//  $hamster = $dog;
//  $cat = 'Mittens';
//  $gecko = $dog;

//  echo $dog . PHP_EOL;
//  echo $hamster . PHP_EOL;
//  echo $gecko . PHP_EOL;

// //exercise, update the variable $dog below this line and see
// //how that effects the other pets/

/**
 * DYNAMIC VARIABLES
 * a dynmaic variable is a varibale that holds the NAME of another variable.
 * take a look at the example below.  What do you think will be printed?
 * 
 * When is a situation where this might be used?
 */

// $pet = 'fido';
// $clown = 'pet';
// echo $clown . PHP_EOL;
// echo ${$clown} . PHP_EOL;

/**
 * IN CLASS EXERCISE - user login / sign up
 * Open a new file, this one does not have to go on GitHub.
 * 1) create a simple HTML page with a form in it asking for
 * the user to enter their name, email address, and a password
 * 2) use the define method to create a constant PAGE_NAME and insert
 * it into the web page
 * 3)using the $_REQUEST[] gloabl variable and the extract() method get the 
 * values from your form and display them to the page.
 * 4) user enters name, email, password, etc.. and submits.  After submit, 
 * the page refreshes and displays the data just passed in.
 * 5) Make the info display page a separate page.
 * 
 * 
 * EXERCISE 2 - Book store balance sheet
 * Create a new page with a form with the following fields
 * Sales, rent, salaries, supplies
 * Once the user sumbits, either on the same page or a different page
 * output a page that lists out revenue, expenses (each of them and the total),
 * and net revenue.
 * 
 * create a global in the previous page to hold the user and then add a 
 * welcome user message to the top of this page.  
 * 
 * link all of the pages together and wrap up a simple 2-4 page website. 
 */
?>