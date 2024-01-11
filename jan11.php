<?php
/**
 * Php is a loosely typed language just like Python.
 * this means variables and parameters don't NEED to ahve a type.
 * Unlike Python, you CAN use types in PHP
 * 
 * if you use types with PHP, PHP will try to coerce variable and parameters
 * into the correct type.  If a string is expected, but an integer received
 * for example, the int will be converted.  UNLESS you declare strict mode.
 * This needs to be done a file by file basis
 */

// declare(strict_types=1);
// function echo_name($name){
//     echo $name . PHP_EOL;
// }

// function echo_name_typed(string $name){
//     echo $name . PHP_EOL;
// }

// echo_name('Justin Cox');
// echo_name_typed('Justin Cox');
// echo_name(4);
// echo_name_typed(7);

/**
 * Variable types, setting (casting) and getting
 * 1) Boolean 
 * 2) Integer 
 * 3) Float 
 * 4) String
 * 5) Numeric String *
 * 6) Array 
 * 7) Object
 * 9) Resourse *
 * 9) Enumeration *
 * 10) NULL
 * 
 * NUll is also a value for uninitialized variables
 */

// class Foo{
//     public function bar():void{
//         echo 'FooBar';
//     }
// }
// $foo = new Foo();
// enum CardSuits{
//     case HEARTS;
//     case DIAMONDS;
//     case SPADES;
//     case CLUBS;
// }

// echo gettype(true) . PHP_EOL;                       //Boolean
// echo gettype(4) . PHP_EOL;                          //Integer
// echo gettype(3.14159) . PHP_EOL;                    //Float
// echo gettype('I think therefore I am') . PHP_EOL;   //String
// echo gettype('4787112') . PHP_EOL;                  //Numeric String
// echo gettype([1, 2, 3]) . PHP_EOL;                  //Array
// echo gettype($foo) . PHP_EOL;                       //Object
// echo gettype(CardSuits::HEARTS) . PHP_EOL;          //Enumerations
// echo gettype(NULL) . PHP_EOL;                       // NULL


/**
 * PHP files and snippets ALWAYS need to open with <?php and close with ?>
 * Note to opening tag at the beginning of this file.  If I were to remove that,
 * This page will crash.  Try removing the opening and closing tags..
 * 
 * Turns out I lied.  When working in an ONLY php file, (one with no intermingled HTML)
 * the closing tag is completely optional, and generally considerend best practice. Files
 * that only contain a class definition are a good candidate for this.
 * 
 * The reason is, leaving off the closing tags prevents the interpreter from accidentally 
 * sending whitespace to the client before the headers are ready.
 */

/**
 * PHP is a ; terminated language.  Like C based languages (C, C++, ...) all satements
 * have to be terminated with a semi colon.  Indentation does not matter
 */

//  echo 'this works' . PHP_EOL;
//                             echo 'So does this' . PHP_EOL;
//  echo 'This might work...? '; echo 'Yup this works too! '; echo 'Look!  I can keep doing it too as long as I teminate each statement with a ; '. PHP_EOL; 
 //echo 'But this does not work.  It will throw an error ... wait what!?!? '
 //echo 'What if I do this?';

/**
 * Code blocks are all enclosed in { }
 * This is the same as all C based langauges.
 */

//  function foo():void{
//     echo "BAR" . PHP_EOL;
//  }

//  foo();

//  for($i=0; $i<10; $i++){
//     echo $i . PHP_EOL;
//  }

/**
 * In PHP all variables and paramters start with $.  This isn't
 * a naming convention its a requirement.
 * 
 * After the $ the next character needs to be a letter (case doesn't matter) or an underscore ( _ )
 */

// $name = 'Justin 1'; //this works
// $Name = 'Justin 2'; //this works too and is technically a different variable;
// $_name = 'Justin 3'; //This will also work
// $_ = 'Justin 4'; //this even works
// $1 = 'Justin 5'; //this is trash don't do this.  it will crash
// echo $name . PHP_EOL;
// echo $Name . PHP_EOL;
// echo $_name . PHP_EOL;
// echo $_ . PHP_EOL;
// echo $1 . PHP_EOL;

/**
 * Naming Conventions
 * In all honesty, the PHP police wont break down your door if you don't use the following
 * naming conventions.  But it is standard practice.  For this class I won't hold you to it
 * but I would appreciate it
 * 
 * variables - Camel Case
 * functions - Snake Case
 * classes - Pascal Case
 * class private methods and variables - prefixed with an underscore
 * 
 * use descriptive names.  resist the urge to call a function func() or f().
 * Also use action names.  get_id() or set_id()  these tell you what the method
 * is doing.  Using action names and descriptive names creates self documenting
 * code.  I should know just from reading the variable name or the method name
 * what it is used for and what it is doing.
 * 
 */

// $myVariable = 'some variable'; //camel case first word is lower case the rest are capitalized

// function my_function_name(){} //snake case underscore between each word


// class MyClass{ //pascal case every word is capitalized
//     private $_id;
//     private string $_myOtherPrivateProperty;
//     public $name;
//     public int $someIntegerThatIsReallyImportant;
    
//     function __constructor(){} //the constructor specifically is prefixed with a dunder (double underscore).  That is a PHP requirement

//     private function _init_on_load(){}

//     public function get_id():void{}


// }

// $cellId = 47; //I know that I am looking at cell id.  there is no confusion what this for
// $n = 47;  //WTF does n repsent?

// function get_class_size():int{
//     //this tells me that I should expect an integer back and that it represents the class size 
// } 
// function set_class_size(int $classSize):void{
//     // 'set' tells me I am setting a value and that I souldn't expect a return
//     // 'void' also tells me I won't be receiving a retrn value
//     // '$classSize' tells me that the integer i pass as a parameter represents the class size
// }

// function scs($num){
//     //this function technically could do the same as set_class_size but I have no idea
//     //unless I look at the code in the function to see what it is doing.
//     //Don't do this.
// } 

/**
 * Docstrings in PHP start with /** and end with * /
 * You can see them all trough this document.
 * 
 * Single line comments use // at the beginning of the line
 * 
 * shotcut: putting your curser at the start of the line or highlighing
 * a block of code and then pressing ctrl + / will comment out the whole block
 */

/**
 * Sting Manipulation
 * Strings are wrapped in either single quotes ( ' ) or double quotes (")
 * the both enclose strings but they are not the same.
 * single quotes will result in exactly what is in between them.  While doube 
 * quotes are interpreted.  Just like string literals in JavaScript.
 * 
 * String concatenation uses the . operator instead of the + operator like in 
 * Python or JavaScript.  
 * 
 * The . PHP_EOL that has been in all of the echo statements
 * is simply appending the end of line constant to each string.  It forces the 
 * terminal to add a line break but is not required.
 * 
 * there are some special characters that have meaning and cant be written normally.
 * They need to be escaped with the \ character.
 * single quote \'
 * double quate \"
 * tab \t
 * new line \n
 * return to line start \r
 * dollar sign \$
 */

// $name = 'Justin';
// echo 'Hello $name' . PHP_EOL;
// echo "Hello $name" . PHP_EOL;

// echo 'This is me';
// echo 'without a line break';
// echo 'This time I' . PHP_EOL;
// echo 'am using the eol' . PHP_EOL;
// echo 'I can even use concatenation to say my name. ' . $name . ' See how cool that is?!?!' . PHP_EOL;

// echo "Hey $name what are you drinking that cup?" . PHP_EOL;
// echo "Hey \$name what are you drinking in that cup?" . PHP_EOL;

// echo "It's Gatorade.  Thanks for asking." . PHP_EOL;
// //echo 'It's Gatorade. Thanks for asking.' . PHP_EOL;
// echo 'It\'s Gatorade. Thanks for asking.' .PHP_EOL;

// $question = "Hey $name, \n\rwhat are you up to this weekend?";
// $response = "Nothing much, just grading web pages.\n\rSincerely, \n\rJustin";
// echo $question . PHP_EOL;
// echo $response .PHP_EOL;


/**
 * Printing to the screen
 * There are several commands that will print to the screen
 * echo - I have been using it this whole time, standard way to print 
 * print() - same a s echo but this will return a value of 1. 
 * prnit_r() - for printing arrays
 * printf() - for printing f strings
 */

//  $message = "This seems like a really cool message";
//  $fib = [0,1,1,2,3,5,8,13];
//  $associatedArray = ['color'=>"blue", "make"=>'Ford', 'Model'=>'Mustang'];
//  $when ='tomrrow';
//  $time = 1;

//  echo $message . PHP_EOL;  //echo doesn't need parenthases
//  echo($message . PHP_EOL); //But it can use them
//  echo $message, $when, $time, PHP_EOL; //echo can even take a comma separated list of arguments

//  print($message . PHP_EOL); //Print needs parenthases

//  //echo $fib;
//  print_r($fib); //print_r is for printing out arrays
//  print_r($associatedArray);

//  printf('what are you doing %s at %.u', $when, $time);  //printf is for fstrings
?>
