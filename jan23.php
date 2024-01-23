<?php
/**
 * In class task.  Finish refactor from last thursday and push changes to cs servers
 * 
 * NOTES:
 * OPERATIONS AND EXPRESSIONS
 * order of operations.
 * what does result equal in this equation?
 * $result = 5 + 4 * 12 / 4
 * 
 * run it below and see.  is it what you expect?  is it what you want it to be?
 */
// run $result here

/**
 * PHP will attemp to adhere to PEMDAS.  Meaning in the above example, PHP multiplied 4 * 12 (48),
 * then divided by 4 (12) adn finally added 5 to get 17.  But is that the answer we actually wnated?
 * 
 * The formula above is poorly formated and vague.  The proper answer is 17, but as programmers it is
 * best practice to be explicit about our desired order of operations.  The two equations 
 * below give the same answer.  Which one is more readily apparent and easier to read?
 * 
 * $result = 5 + 4 * 12 / 4 
 * $result = ( 4 * 12 ) / 4 ) + 5
 */

/**
 * ARITHMETIC OPERATORS: 
 * X + Y = ?
 * X - Y = ?
 * X * Y = ?
 * X / Y = ?
 * X % Y = ?
 * 
 * in PHP there is no integer division operator but there is a method for it. 
 * intdiv($num1, $num2)
 */

/**
 * ASSIGNMENT OPERATORS:
 * = = ?
 * += = ?
 * -= = ?
 * *= = ?
 * /= = ?
 * %= =?
 */

/**
 * AUTO INCREMENT OPERATORS
 * $x++, ++$x, $x--, --$x
 * 
 * What is the difference between the pre and post incredment/decrement?
 * look at the statements below, what do you think the output will be?
 */
// $a = 7;
// $b = $a++;
// $c = 4;
// $d = ++$c;

// echo $a, $b, $c, $d;

/**
 * COMPARISON OPERATORS
 * $x == $y  = ?
 * $x != $y = ?
 * $x > $y = ?
 * $x < $y =?
 * $x >= $y = ?
 * $x <= $y =? 
 * $x === $y = ?
 * $x !== $y =?
 * 
 * Excercise:  look at the statements below.  indicate with an inline comment what you think the 
 * output will be.  Then run the statements.
 */

//  echo '1: ', 4 == '4', PHP_EOL;
//  echo '2: ', 4 === '4', PHP_EOL;
//  echo '3: ', 'William' == 'william', PHP_EOL;
//  echo '4: ', 'William' === 'william', PHP_EOL;
//  echo '5: ', 5 == 5.0, PHP_EOL;
//  echo '6: ', 5 === 5.0, PHP_EOL;
//  echo '7: ', true == 1, PHP_EOL;
//  echo '8: ', true === 1, PHP_EOL;
//  echo '9: ', null == "", PHP_EOL;
//  echo '10: ', null === "", PHP_EOL;

/**
 * LOGICAL OPEATORS
 * $x && $y = ?
 * $x || $y = ?
 * $x and $y = ?
 * $x or $y = ?
 * $x xor $y = ?
 * !$x = ?
 * 
 * Warning:  logical operators are 'truthy'  take a look at the two 
 * statements below.  in 1, the string is empty so it evaluates to false.
 * resulting to the expression being false.  in 2, the strign isn't empty
 * so it evaluates to true and the statement evaluates to true.
 * 
 * Can you think of an instance where this feature can help?  How can it
 * come back to bite you in the butt?  what do you think is best practice
 * with logical operators? 
 */

//  echo '1: ', "" && true, PHP_EOL;
//  echo '2: ', "hello" && true, PHP_EOL;
?>