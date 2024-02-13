<?php

/**
 * ARRAYS
 * in PHP arrays come in two flavors, indexed and associative.  Indexed arrays are the same as lists in Python or ArrayLists in Java.  Associative arrays are the same as dictionaries, where you have key-value pairs.
 * 
 * Indexed Arrays
 * Just like other languages, PHP has 0 indexed arrays, meaning the first item is at index 0.  fun fact, if you didn't know the reason why, it has to do with how arrays are held and accessed in memory.  The array head is a pointer to an address, while the index is the number of offsets needed from the head to the value you are looking for.  
 * 
 * For example if the head of the array was at memory addres 0x0014 and the size of each array 'slot' was 8bytes, the address of array[1] would be 0x0022.
 * 
 * Creating an Array
 * array(mixed ...$values) - this method creates a new array.  it takes a comma separated list of values to fill in the array.
 * [] - this will create an empty array.
 * unlike other languages, PHP is not picky about what gets put in the array.  There is no concept of a string[]  or array<int>. This is done on purpose as PHP wants its arrays to be VERY flexible.
 */

//  $arr1 = array(); //this creates an empty array
//  $arr2 = array(1,4, 'test', []); // this creates an array with the items provided.
//  $arr3 = []; //this creates an empty array

//  print_r($arr1);
//  print_r($arr2);
//  print_r($arr3);

//exercise.  Since there is no type checking for arrays in PHP, could you come up with a custom function or class to do this?  

/**
 * Adding elements to arrays
 * [] - this will add a new element to the end of the array
 * [3] - this will overwrite the element at index 3 in the array
 * array_push(array $array, mixed $val(s)) - this will add the $val as a new element to the end of the $array
 */

//  $myArray = [];
//  echo 'starting array', PHP_EOL;
//  print_r($myArray);
//  $myArray[] = 1; //addes 1 to the array (0th index in this case)
//  $myArray[] = 4; //adds 4 to the next index in the array (1st index in this case)
//  echo 'added 1 then 4 to the array', PHP_EOL;
//  print_r($myArray);
//  $myArray[3] = 6; //this sets index 3 to the value 6;  Note that we never set index 2...  this can be a dangerous operation if you don't pay attention.
//  echo "notice how index 2 was skipped", PHP_EOL;
//  print_r($myArray);
//  array_push($myArray, 10); //adds 10 to the next index in the array - note it is the 4th index, because we set the 3rd index, skipping 2
//  array_push($myArray, 11); //note in this case where we are adding a single value it is cheaper, faster, and better to use []= instead
//  echo "notice how index 2 is STILL skipped", PHP_EOL;
//  print_r($myArray);
//  array_push($myArray, 20, 21, 22, 23);  //the real benefit of array_push is having multiple items being pushed
//  echo 'that was a lot faster', PHP_EOL;
//  print_r($myArray);
//  array_push($myArray, ...[25, 26, 27, 28]);
//  echo "It even works with the spread syntax!", PHP_EOL;
//  print_r($myArray);

 //exercise:  can you think of a situation where we would want to use array_push instead of []= ?  Where would the spread syntax come into play here?

/**
 * Accessing array indices
 * $myArray[1] - this accesses the 1 index of the $myArray
 * $myAssocArray['users'] - this accesses the 'users' key of an associative array
 * 
 * Other ways to create arrays
 * range(mixed $low, mixed $high, [int $steps]) - creates an array consisting of elements between the $low and $high of the range
 * array_fill(int $start, int $num, mixed $value) - declares and fills an array in one step
 * array_pad(array $array, int $length, mixed $value) - copies and returns an array padded to the new length.  negative length pads the start of the array
 */

//  $arr1 = [1,3,6,9];
//  $arr2 = ['users'=>10, 'expired'=>5];
//  echo 'The 2nd index of $arr1 is ', $arr1[2], PHP_EOL;
// echo "The value is ", $arr2['users'], " in the 'users' index of arr2", PHP_EOL;

// $arr3 = range(0,10); //creates an array with the numbers 0-10 inclusive start and finish
// $arr4 = range(0,10,2); //creates an array of 0-10 with steps of 2
// $arr5 = range('a', 'z'); //it tries to be smart and recognizes this is the alphabet
// print_r($arr3);
// print_r($arr4);
// print_r($arr5);

// $arr6 = array_fill(0, 5, 'xyz'); //creates a five element array and fills it with 'xyz' at each slot
// $arr7 = array_fill(2, 5, 'abc');  //creates a 5 element array starting with index 2 and 'abc' in each slot
// print_r($arr6);
// print_r($arr7);

// $arr8 = [1, 2, 3, 4, 5];
// print_r(array_pad($arr8, 8, 'new Val'));  //makes the array 8 items and sets the value of the items at the end to 'new Val'
// print_r(array_pad($arr8, -8, 'new Val')); //makes the array 8 items and sets the value of the items at the start to 'new Val'
// print_r(array_pad($arr8, 3, 'new Val')); //does nothing since 3 is less than the length of the original array.

/**
 * Indexed and associative indices can be mixed!  adding an associative index to an indexed array has no impact on the numeric indexs.
 */

//  $test = [1,5, 10];
//  echo 'base array', PHP_EOL;
//  print_r($test);
//  $test[] = 15;
//  echo 'this added 15 as the next index in the array', PHP_EOL;
//  print_r($test);
//  $test['color'] = 'Magenta';
//  $test['subArray'] = ['3,6,9', 'damn', 'she', 'fine'];
//  echo "Associative indexes can be mixed in!", PHP_EOL;
//  print_r($test);
//  $test[] = 20;
//  echo 'And it has no impact on the numeric indices', PHP_EOL;
//  print_r($test);

 /**
  * WARNING: Becareful when it comes to mixing quotation marks.  it is common when working with arrays to end up in situations where you try to include an associative index inside of a double quoted string. it wont work
  */

//   $arr1 = [1,2,3];
//   $arr2 =['bread'=>'white', 'meat'=>'ham', 'cheese'=>'swiss'];
//   echo "This works fine. the 1 index is $arr1[1]", PHP_EOL;
//   //echo "But this doesn't.  I use $arr2['bread'] bread on my sandwhich", PHP_EOL;
//   echo "But this does work... I use {$arr2['bread']} bread on my sandwhich", PHP_EOL;
//   echo "This is typically how you want to handle it though.  I use " . $arr2['bread'] . " bread on my sandwiches", PHP_EOL;

/**
 * Using loops to modify arrays
 * last class we talked about how the foreach sholuldn't be used to modify array elements.  But I lied. inside of foreach loops we need to use the reference operator if we want to make changes.  If you remember the reference or alias (&) operator makes the the new varaible an alias (sharing the same memory location) as the original.  Look at the example below to see it in action
 */

 //using numeric indexes
//  $test = [1,2,3,4,5];
//  echo 'Before', PHP_EOL;
//  print_r($test);
//  for($i=0; $i<count($test); $i++){
//     $test[$i] = $test[$i]*$test[$i];
//  }
//  echo 'after', PHP_EOL;
//  print_r($test);

//  $assoc = ['bread'=>'white', 'meat'=>'ham', 'cheese'=>'swiss'];
//  echo 'associative array can\'t use normal indexes', PHP_EOL;
//  print_r($assoc);
//  foreach($assoc as $item){
//     $item = 'banana';
//  }
//  echo "even though you set item to 'banana', the actually array didn't change", PHP_EOL;
//  print_r($assoc);

//  foreach($assoc as &$item){
//     $item = 'banana';
//  }
//  echo "now that we are using aliasing it works", PHP_EOL;
//  print_r($assoc);

/**
 * Checking if an array exists
 * array_key_exists($key, $array):boolean - checks to see if the $key or index is present in the given $array
 * is_array($array):boolean - returns true if the $array is an array
 * in_array($value, $array, bool $strict=false):boolean - returns true if the $value is in the $array.  it uses loose ( == ) comparison unless $strict is set to true
 * 
 * Creating strings
 * explode(string $separator, string $string): array - converts a string into an array using the $separator to decide where to split
 * implode(string $glue, array $array):string - opposite of explode.  converts an array to a string using $glue between each item
 * join(string $glue, array $array):string - alias for implode
 */

//  $arr1 = [4, 6, 7];
//  $arr2 = ['bread'=>'white', 'meat'=>'ham', 'cheese'=>'swiss'];
//  echo array_key_exists(1, $arr1), PHP_EOL;
//  echo array_key_exists('cheese', $arr2), PHP_EOl;
//  echo array_key_exists(1, $arr2), PHP_EOL;

//  echo (is_array($arr2)) ? "Arr2 is an array" : "Arr2 is NOT an array", PHP_EOL;
//  echo (in_array(4, $arr1)) ? "the value 4 is in arr1" : "The value 4 is NOT in arr1", PHP_EOL;

//  echo "exploding a string", PHP_EOL;
//  print_r(explode(' ', "This is a sentence"));
//  echo "imploding an Array", PHP_EOL, implode(" ", ["this", 'used', 'to', 'be', 'an', 'array']);

/**
 * filtering an array
 * array_filter(array $array, callable $callback): array - iterates over each value in the $array passing them to the $callback function.  if the $callback returns true, the value is returned in the result array
 */

//  $arr1 = [1,2,3,4,5,6,7,8,9,10];
// function isEven($num){
//     return $num % 2 ==0;
// }

// $arr2 = array_filter($arr1, 'isEven');
// $arr3 = array_filter($arr1, function($num){return $num % 2 === 0;});
// print_r($arr1);
// print_r($arr2);
// print_r($arr3);

/**
 * array_values()
 * array_keys()
 * extract()
 */

 //examples

/**
 * sorting arrays
 * there are multiple ways to sort arrays here are a few of common ones
 * sort() - sorts in ascending order, SORT_NUMERIC, SORT_STRING
 * rsort() - sorts in reverse order
 * asort() - sorts and maintains index association
 * arsort() - resverse sorts and maintains index association
 * usort() - sorts using a user defined comparison function
 */