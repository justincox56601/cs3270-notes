<?php
/**
 * MORE STRING FUNCTIONS
 * 
 * strlen(string $string):int - returns the length of a string.  this includes whitespaces
 * trim(string $string, string $characters = "\n\r\t\v\x00")string - removes whitespace and other predefined characters from a string; 
 * ltrim() & rtrim() - same as trim but only the left and right sides respectively
 * str_pad(string $string, int length, [string $padString, string $padType]) - adds padding to the string.  To opposite function of trim.  
 * 
 * str_pad and trim  both return a new string, they do not mutate the old string;
 * str_pad must be longer than the original string
 * 
 */

// $str = "     hello";
// $str1 = 'hello';
// $str2 = "     hello     ";
// echo strlen($str), PHP_EOL; //this equals 10
// echo strlen($str1), PHP_EOL; //this equals 5
// echo strlen($str2), PHP_EOL; //this equals 15
// echo strlen(trim($str)), PHP_EOL; // now this equals 5 again
// echo strlen(ltrim($str2)), PHP_EOL; // now this equals 10
// echo strlen(rtrim($str2)), PHP_EOL; // now this equals 10
// echo strlen(str_pad($str1, 5)), PHP_EOL; //added 5 whitespace characters to the right side of $str1
// echo strlen($str1), PHP_EOL; //still 5 because str_pad does not mutate the string;
// echo str_pad($str1, 10, '#'), PHP_EOL; // adds 5 ! to the end of the string - default position
// echo str_pad($str1, 10, '#', STR_PAD_RIGHT), PHP_EOL; //STR_PAD_RIGHT is default
// echo str_pad($str1, 10, '#', STR_PAD_LEFT), PHP_EOL; //STR_PAD_LEFT is the beginning of the string
// echo str_pad($str1, 15, '#', STR_PAD_BOTH), PHP_EOL; //STR_PAD_BOTH for both sides

//exercise: can you make a function that takes in the same parameters as str_pad() but will add the desired number of characters regardless of the length of the string?


/**
 * str_word_count(string $sting, [int $format, string $character]):array | int
 * this method returns either an array or an integer depending on the parameters you pass.
 * it returns the number of words in a string and is LOCALE dependent
 */

//  $countStr = 'Well hello there fri3nd!';
//  echo str_word_count($countStr), PHP_EOL; //defaul behavior  returns 5?!?!  - because 3 is not an english letter;
//  echo str_word_count($countStr, 0), PHP_EOL; //default behavior return number of words;
//  print_r(str_word_count($countStr, 1)); // 1 makes this return an array of the words in the string
// print_r(str_word_count($countStr, 2)); //2 make this return an array of words in the string index by where each word starts
//  print_r(str_word_count($countStr, 1, '3')); // the final parameter is a string with all of the characters that should be accepted.  here adding the '3' turns 'fri3nd' from 2 words back to 1 word

 /**
  * strtoupper() - changes all of the letters to uppercase 
  * strtolower() - changes all of the letters to lowercase
  * ucfirst() - changes the first letter in a string to upper case
  * ucwords() - changes the first letter in each word to upper case
  */

//   $upperStr = "hello darkness my old friend";
//   echo strtoupper($upperStr), PHP_EOL;
//   echo strtolower($upperStr), PHP_EOL;
//   echo ucfirst($upperStr), PHP_EOL;
//   echo ucwords($upperStr), PHP_EOL;

  //EXERCISE: can you identify a time where each of these methods would be good to use?

  /**
   * str_split(string $string, [int $size=1]):array - splits a string into an array of elements.  you can specify the size of each element.
   * explode(string $delimiter, string $string, [int $limit=PHP_INT_MAX]):array - splits  a string into an array using a delimiter to determine where to split the string.  limit is used to determine maximum size of return array
   * implode(string: $separator, array $array):string - joins an array together using the separator
   */

  //  $strWords = 'We will we will rock you';
  //  $strArry = ['We', 'will', 'we', 'will', 'rock', 'you'];
  //  print_r(str_split($strWords)); //
  //  print_r(str_split($strWords, 1)); //default size
  //  print_r(str_split($strWords, 4)); //4 charactes per word
  //  print_r(explode(" ", $strWords));
  //  echo implode(" ", $strArry), PHP_EOL;

  /**
   * str_replace(
   *  array | string $serach,
   *  array | string $replace,
   *  array | string $subject,
   * [int &$count = null]
   * )array | string
   * 
   * the string replace method searches for the $search inside of the $subject and replaces it with the $replace.  The optional count paramater is for how many times you want this to happen.  the default is null.  This method is CASE SENSITIVE
   * 
   * str_ireplace() - is the same method but NOT case sensitive
   */

   $search = 'needle';
   $replace = 'HERE';
   $subject = "This method id like trying to find a needle in a haystack.  However NEEDLE and needle aren't always the same thing.";
   $count = 1;

   echo str_replace($search, $replace, $subject), PHP_EOL; // standard usaeage - notice how it doesn't replace NEEDLE
   echo str_replace($search, $replace, $subject, $count), PHP_EOL; // passing in the option count to only change the first occurrence of needle.  count HAS to be passed by reference.
   echo str_ireplace($search, $replace, $subject), PHP_EOL; // notice how it changed both the lower case and uppercase needles

   //remove vowels
   $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
   $replace = '_';
   $subject = "The quick brown fox jumps over the lazy dog.";
   echo str_replace($vowels, $replace, $subject), PHP_EOL;


?>