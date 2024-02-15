<?php
/**
 * ARRAYS PART TWO  - ELECTRIC BOOGALOO
 * 
 * /**
 * sorting arrays
 * there are multiple ways to sort arrays here are a few of common ones
 * sort(array $array, int $flags = SORT_REGUAR):true - sorts in ascending order, SORT_NUMERIC, SORT_STRING
 * rsort(array $array, int $flags = SORT_REGUAR):true - sorts in reverse order
 * asort(array $array, int $flags = SORT_REGUAR):true - sorts by VLAUE and maintains index association
 * arsort(array $array, int $flags = SORT_REGUAR):true - resverse sorts by VALUE and maintains index association
 * ksort(array $array, int $flags = SORT_REGUAR):true - sorts by KEY and maintains index association
 * krsort(array $array, int $flags = SORT_REGUAR):true - resverse sorts by KEY and maintains index association
 * 
 * flags:
 * SORT_REGULAR = standard alphabetical sorting
 * SOTT_NUMERIC = sorting values as a number value
 * SORT_STRING = sort items as strings
 * SORT_LOCALE_STRING = sort items as string, but changes based on lacation of system
 * SORT_NATURAL = sorts items as string using 'natural ordering' for example, this makes 2 before 10, even though the 1 would come first in computer ordering
 * SORT_FLAG_CASE = used to make the sort case insensitive.
 * 
 * PHP uses the quick sort algoritm to sort it's arrays. 
 * 
 */

 $colors = ['red', 'Blue', 'Yellow', 'green'];
 $strNums =['one', 'two', 'three', 'four'];
 $numNums =[43, 10, 19, 7, 2];
 $oranges = ['orange4', 'orange2', 'orange10', 'orange20'];

//  print_r(sort($colors)); //why does this print out a 1?  why not the array?
// sort($colors); //base useage  alphabetical ascending, 
// sort($strNums);
// sort($numNums);
// sort($oranges);
// print_r($colors);
// print_r($strNums);
// print_r($numNums);
// print_r($oranges);

//SORT_STRING evaluates everything as a string
// sort($colors, SORT_STRING); 
// sort($strNums, SORT_STRING);
// sort($numNums, SORT_STRING);
// sort($oranges, SORT_STRING);
// print_r($colors);
// print_r($strNums);
// print_r($numNums);
// print_r($oranges);

//SORT_NUMERIC evaluates everything as a number
// sort($colors, SORT_NUMERIC);
// sort($strNums, SORT_NUMERIC);
// sort($numNums, SORT_NUMERIC);
// sort($oranges, SORT_NUMERIC);
// print_r($colors);
// print_r($strNums);
// print_r($numNums);
// print_r($oranges);

//SORT_NATURAL evaluates using 'natural order'
//  sort($colors, SORT_NATURAL); 
//  sort($strNums, SORT_NATURAL);
//  sort($numNums, SORT_NATURAL);
//  sort($oranges, SORT_NATURAL);
//  print_r($colors);
//  print_r($strNums);
//  print_r($numNums);
//  print_r($oranges);

 //SORT_FLAG_CASE makes the sort not consider case.
// sort($colors, SORT_STRING | SORT_FLAG_CASE); 
// sort($strNums, SORT_STRING | SORT_FLAG_CASE);
// sort($numNums, SORT_STRING | SORT_FLAG_CASE);
// sort($oranges, SORT_STRING | SORT_FLAG_CASE);
// print_r($colors);
// print_r($strNums);
// print_r($numNums);
// print_r($oranges);

// $assocArr =[
//     'color' => 'red',
//     'id' => 457,
//     'model' => 'mustang',
//     'make' => 'ford'
// ];

// sort($assocArr);
// print_r($assocArr); // what just happened here?
// asort($assocArr);
// print_r($assocArr); //why is it still not working?
// comment out the first sort and print on lins 88 and 89.  Now what happens?

// ksort($assocArr); //now I am sorting by the key instead of the value
// print_r($assocArr);

/**
 * usort(array $array callable $callback): true
 * this method takes in an $array and a user defined $callback.  The array is sorted in place usng the user defined callback.
 */

// $cars = [
//     [
//         'make'=>'ford',
//         'model' => 'mustang',
//         'rating' => 5
//     ],
//     [
//         'make'=>'chevy',
//         'model' => 'camero',
//         'rating' => 10
//     ],
//     [
//         'make'=>'dodge',
//         'model' => 'charger',
//         'rating' => 9
//     ]
//     ];

// function sort_by_rating(array $a, array $b){
//     return $a['rating'] > $b['rating'];
// }

// usort($cars, 'sort_by_rating');
// print_r($cars);

// usort($cars, function($a, $b){
//     return $a['rating'] < $b['rating'];
// });
// print_r($cars);

/**
 * array_rand(array $array, [int $integer=1]): element | array $elements
 * this function accepts an array and will return 1 random KEY from the array.  If the optional integer parameter is specified, it will return an array of that many random elements.  NOTE that the return value is the key / key[]  not the actual values associated with those keys.
 * 
 */

// $pets = ['cat', 'dog', 'fish', 'lizard', 'spider'];
// print_r(array_rand($pets));
// echo PHP_EOL;
// print_r(array_rand($pets, 1));
// echo PHP_EOL;
// print_r(array_rand($pets, 2));

/**
 * shuffle(array $array) array
 * this method shuffles the order of an indexed array.  It will work on an associative array, but it destroys the associations and returns an indexed array.
*/

// $pets = ['cat', 'dog', 'fish', 'lizard', 'spider'];
// print_r($pets);
// shuffle($pets);
// print_r($pets);

/**
 * array_intersect(array $needle, array ...$haystacks):array
 * this method takes a minimum of 2 arrays and returns an array containing all of the elements in the $needle that are also present in the $haystacks.
 * 
 * array_intersect_assoc(array $needle, array ...$haystacks):array
 * Same as array_intersect but checks for key - value pairs.
 */

// $needle = [0,3,6,9,12];
// $haystack = [0,2,4,6,8,10];
// $h2 = [6, 12];
// $h3 = [12, 15, 21];
// print_r(array_intersect($needle, $haystack));  //returns [0,6] because they are in both arrays
// print_r(array_intersect($needle, $haystack, $h2)); // only returns [6] since that is the only element in ALL of the arrays
// print_r(array_intersect($needle, $haystack, $h3)); // returns an empty array because there are no elements that are in ALL of the arrays.

// $array1 = ["a" => "green", "b" => "brown", "c" => "blue", "red"];
// $array2 = ["a" => "green", "b" => "yellow", "blue", "red"];
// print_r(array_intersect_assoc($array1, $array2)); //only returns [a]=>'green' because that is the only element the same in both arrays.  'red' is not returned because in $array1 its index is 0, while in $array2 its index is 1;

/**
 * Modifying arrays
 * unset(mixed $var):void - deletes the $var from memory.  Not array specific
 * array_pop(array $array): mixed - removes and returns the last element of the array.  the original array is shortened by 1 element
 * array_shift(array $array):mixed - removes and returns the first element of an array.  the array is lengthened by 1 elemet
 * array_splice(array $array, int $offset, [int $length = null, mixed $replacement]):array - this method will replace $length items from the $array starting at $offset position with $replacement.  This is a versitile method
 * array_unique(array $array):array - removes the duplicates from the array
 * array_slice()
 */

// $var = [1,2,3];
// print_r($var);
// unset($var);
// print_r($var); // this no longer exists.

// $poppers = [1,2,3,4,5];
// print_r($poppers);
// $popped = array_pop($poppers);
// print_r($popped);
// print_r($poppers);

// $shifted = array_shift($poppers);
// print_r($shifted);
// print_r($poppers);

// array_splice($poppers, 2, 0, [$popped, $shifted]);
// print_r($poppers);


//more fun with array splice
// $base = [1,3,5,7,9];
// print_r($base);

// array_splice($base, -2, 1); //removing the second item from the end
// print_r($base);

// array_splice($base, 2, 0, 2); //not removing anything, adding the number 2 at the second index
// print_r($base);

// array_splice($base, 3); //without the length parameter, it will remove the rest of the array
// print_r($base);

/**
 * array_slice(array $array, int $offset, [int $length, bool $preserve_keys]):array
 * array slice is similar to array aplice except that array slice DOES NOT mutate the original array.  instead if copies a slice of the original array and returns it as a new array.
 */

// $base = [1,2,3,4,5];
// print_r(array_slice($base, 2, 2));  //2 elements starting from the second element
// print_r(array_slice($base, 2)); //with no $length, parameter, it automatically returns the rest of the array
// print_r(array_slice($base, -2, 2)); //negaitve indexing works
// print_r(array_slice($base, -2, -2)); // negative indexing and negative length
// print_r(array_slice($base, 2, 2, true)); //preserving the keys - witout this, the slice function will automatically re index the response array.

/**
 * array_combine(array $keys,  array $values):array
 * this method comines two arrays into an associative array, with the first parameter being the keys, and the second parameter being the values.  This method will throw an error if they two arrays are not the same size.
 */

// $key1 = ['apple', 'bananna', 'kiwi'];
// $key2 = ['apple', 'bananna', 'kiwi', 'pear'];
// $val1 = [1,2,3];
// $val2 =[1,2,3,4];

// print_r(array_combine($key1, $val1));
// print_r(array_combine($key2, $val1)); //this throws an error
// print_r(array_combine($key1, $val2)); //this also throws an error

/**
 * array_merge(array ...$arrays):array
 * this method takes in any number of arrays and merges them into a single array.  any overlapping indices will take the value of the last array.
 */

// $arr1 =[1,2,3];
// $arr2 = [3,4,5];
// $arr3 = ['cat'=>'timmy', 'dog'=>'frank'];
// $arr4 = ['dog'=>'Bella', 'gecko'=>'spot'];

// print_r(array_merge($arr1, $arr2)); //notice that $arr1[2] and $arr2[0], are both the value 3 but they were not merged together
// print_r(array_merge($arr3, $arr4)); //notice that the 'dog' key has the value 'Bella' that it got from the last array in the method
// print_r(array_merge($arr1, $arr2, $arr3, $arr4)); //php arrays don't care... 

// //Can you think of a common instance for using array merge with two associative arrays to purposely have values overwritten?

// print_r(array_merge_recursive($arr3, $arr4)); //instead of overriding the 'dog' value, array_merge_recursive turns the dog key into an array holding ALL the values associated with the key 'dog.

/**
 * array operators
 */

// $arrA = ['cat'=>'timmy', 'dog'=>'frank'];
// $arrB = ['dog'=>'Bella', 'gecko'=>'spot'];
// $arrC = [ 'dog'=>'frank', 'cat'=>'timmy',];

// print_r($arrA + $arrB); //union.  +  same as array merge
// echo ($arrA == $arrB) ? 'true' : 'false', PHP_EOL; //equivalence - are the two arrays equivalent?  same key/value pairs
// echo ($arrA == $arrC) ? 'true' : 'false', PHP_EOL; 
// echo ($arrA === $arrC) ? 'true' : 'false', PHP_EOL; //equality - are the two arrays equal?  same key/value pairs in the same order
// echo ($arrA !== $arrC) ? 'true' : 'false', PHP_EOL; //not operator works here as well
// echo ($arrA <> $arrC) ? 'true' : 'false', PHP_EOL; //not operator works here as well

/**
 * extract()
 * extract is a method that will take all of the key/value pairs in an associative array and turn them into individual variables where the variable name is the key and the value is the value
 */

//  $ex = [
//     'make'=>'ford',
//     'model' => 'mustang',
//     'rating' => 5
//  ];

//  extract($ex);
//  print_r($ex);
//  echo $make, PHP_EOL;
//  echo $model, PHP_EOL;
//  echo $rating, PHP_EOL;

 ?>