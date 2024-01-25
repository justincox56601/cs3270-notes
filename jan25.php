<?php
/**
 * STINGS - sort of ... 
 * PHP has over 100 different string methods.  We wont be going over all of them in class. In
 * this situation, w3schools and the MDN docs are going to be your friends.  Generally if
 * there is some operation or something you want to accomplish with a string, there is a method
 * for it.  Today, we are going to go over a few of the more common ones you will find yourself
 * using.
 * 
 * CONCATENATION
 * concatenation in php is done with the '.' operator.  
 * example: 
 * $id = "ab1234yz";
 * echo 'https://cs.bemidjistate.edu/' . $id . '/about.php';
 * 
 * ""  VS ''
 * in PHP "" and '' both are used to wrap around strings.  But they are not exactly the same.
 * using "" allows you to insert variables into your string , while using '' is considered a 
 * string literal and will be exactly what is in between them.  Look at the examples below
 * 
 * using "" also allows you to use ' inside of your string.  if you use '' you would need to escape 
 * your ' before you can use it.
 */

//  $id = "ab1234yz";
//  echo 'https://cs.bemidjistate.edu/$id/about.php', PHP_EOL;
//  echo "https://cs.bemidjistate.edu/$id/about.php", PHP_EOL;


//echo 'You can't do this. it causes an error' . PHP_EOL;
//echo "You can do this though.  It's fine", PHP_EOL;
//echo 'You can also do it this what.  That\'s fine too.', PHP_EOL;

/**
 * == VS ===
 * We talked abot this during the last class how the difference between being equivalent and 
 * identical.  for a quick recap take a look below
 */

//  function equivalent(string $str1, string $str2):void{
//      echo ($str1 == $str2) ? "\"$str1\" is EQUIVALENT to \"$str2\"" : "\"$str1\" is NOT EQUIVALENT to \"$str2\"";
//      echo PHP_EOL;
//      echo ($str1 === $str2)? "\"$str1\" is IDENTICAL to \"$str2\"" : "\"$str1\" is NOT IDENTICAL to \"$str2\"";
//      echo PHP_EOL;
  
//  }

//  equivalent('hello', 'Hello');

/**
 * FORMATTING STRINGS
 * PHP has multiple ways to print and format strings.
 * echo
 * print
 * printf - prints a formatted string
 * sprintf - saves the formatted string to a variable
 * fprintf - prints the formatted string to a file
 * number_format() - formats a number as a string
 */

//  $pi = 3.14159;
//  echo $pi , PHP_EOL;
//  print($pi . PHP_EOL);
//  printf("The value of pi to 2 decimals is %.2f" . PHP_EOL, $pi);
//  printf("The value of pi to 3 decimals is %.3f" . PHP_EOL, $pi);
//  printf("The value of pi to 4 decimals is %.4f" . PHP_EOL, $pi);
//  $s = sprintf("The value of pi to 5 decimals is %.5f" . PHP_EOL, $pi);
//  echo 'echo s: ', $s, PHP_EOL;

//  printf("there are 15 spaces between these %-15s %s", "two", "words");
//  echo PHP_EOL;

//  $data = [
//     ["fName" => 'Brock', 'lName' => 'Rockson', 'grade'=>'A'],
//     ["fName" => 'Misty', 'lName' => 'Watersen', 'grade'=>'B'],
//     ["fName" => 'Lt', 'lName' => 'Surge', 'grade'=>'C'],
//     ["fName" => 'Erica', 'lName' => 'Lilly', 'grade'=>'A'],
//     ["fName" => 'Sabrina', 'lName' => 'Psi', 'grade'=>'B+'],
//  ];

//  function print_grades(string $fName, string $lName, string $grade):void{
//     printf("%-20s%-20s%-20s", $fName, $lName, $grade);
//     echo PHP_EOL;
//  }

//  print_grades('First Name', 'Last Name', 'Grade');
//  foreach($data as $d){
//     print_grades($d['fName'], $d['lName'], $d['grade']);
//  }

//  printf("I am going to pad %05d with zeros to make sure it is 5 digits long", 131);
//  echo PHP_EOL;
//  printf("Or maybe I pad %'.8s with periods to make sure it is 8 charracters long", 131);
//  echo PHP_EOL;

//  $myNum = 1808957.561432;

//  //as a whole number
//  echo 'As a whole number: ', number_format($myNum), PHP_EOL;

//  //with decimals
//  echo 'with decimals: ', number_format($myNum, 2), PHP_EOL;
//  echo 'with decimals: ', number_format($myNum, 4), PHP_EOL;

//  //changing the decimal point
//  echo 'changing the decimal point: ', number_format($myNum, 2, '-'), PHP_EOL;

//  //changing the  thousands separator
//  echo 'changing the  thousands separator: ', number_format($myNum, 2, '-', '#'), PHP_EOL;
 
?>