<?php
/**
 * SRTRINGS PART 3
 * 
 * strpos(string $string, string $substring, [int $offset])
 * This method returns the index of the first case sensitive instance of the $substring insde of the $string.  $offset can be used to ignore the first $offset number of characters
 */

//  $str ='big, bigger, biggest, Biggggg';
//  echo strpos($str, 'big'), PHP_EOL; // 0 since 'big' starts at the 0th character
//  echo strpos($str, 'big', 1), PHP_EOL; // 5 since that is the first instance of 'big' starting on the 1st character.
//  echo strpos($str, 'big', 10), PHP_EOL;
//  echo strpos($str, 'big', 15), PHP_EOL; // false since there is no instance of 'big' after the 15th character

 /**
  * strrpos(string $string, string $substring, [int $offset]) 
  * just like strpos() but an extra 'r' for REVERSE.  note.  the return value  is a standard index (from the beginning) just that the searching starts at the end of the string.
  *
  * stripos(string $string, string $substring, [int $offset]) 
  * just like strpos() but 'i' stands for case INSENSITIVE.  this time it doesn't care if letters are capitalized.
  * 
  * strripos(string $string, string $substring, [int $offset])
  * yes this is the combination of the previous two.  this method starts from the 
  */

// $str ='big, bigger, biggest, Biggggg';
// echo strrpos($str, 'big'), PHP_EOL; // 0 since 'big' starts at the 0th character
// echo strrpos($str, 'big', 10), PHP_EOL;

// echo stripos($str, 'big'), PHP_EOL; // 0 since 'big' starts at the 0th character
// echo stripos($str, 'big', 1), PHP_EOL; // 5 since that is the first instance of 'big' starting on the 1st character.
// echo stripos($str, 'big', 10), PHP_EOL;
// echo stripos($str, 'big', 15), PHP_EOL; // 22 because stripos doesnt care that Biggest is capitalized.

/**
 * substr(string $string, int $start, [int $length]):string
 * the substring function returns a portion of the $string starting from the $start index for $length characters.  $length is an optional argument adn the default is to return the remainder of the string from the $start index;
 * 
 */

//  $str = 'piece';
//  echo substr($str, 0), PHP_EOL; //base useage returns piece
//  echo substr($str, 0, 3), PHP_EOL; //tastier useage returns pie

 //typical useage example
//  $email ='john.jingleheimerschmidt@childrenssongs.com';
//  $userName = substr($email, 0, strpos($email, '@'));
//  $domain = substr($email, strpos($email, '@')+1);
//  $noDotCom = substr($email, strpos($email, '@') + 1, strrpos($email, '.') - 1 - strpos($email, '@'));
//  $topLevelDomain = substr($email, strrpos($email, '.')); 
//  echo $email, PHP_EOL;
//  echo $userName, PHP_EOL;
//  echo $domain, PHP_EOL;
//  echo $noDotCom, PHP_EOL;
//  echo $topLevelDomain, PHP_EOL;

 /**
  * substr_replace(string $string, string $replacement, int $start, [int $length]):string 
  * this method is like the substr method but instead of returning a portion of the original string, it returns the full string replaced with the new $replacement string;
  * 
  * NOTE:  this method will replace all of the $length letters with exactly the $replacement characters.  even if they are not the same length
  */

//   $str = 'Holy crap what happened to you?';
//   echo substr_replace($str, '****', 5, 4), PHP_EOL; //make normal sentences seem not normal
//   echo substr_replace($str, '*', 5, 4), PHP_EOL; //this one kinda makes sense still
//   echo substr_replace($str, '****', 5), PHP_EOL; //well now this just is a whole different sentence

//   //NOTE  NEGATIVE INDEXES WORK WITH ALL THESE STRING FUCTIONS AS WELL
//   echo substr_replace($str, '*****', -4, 3), PHP_EOL; //who!?!?! what happened to WHO???

  /**
   * substr_count(string $string, string $substring, [int $offset, int $length]):int
   * this method returns the number of times a substring occurs inside of the $string.  This method is case sensitive.  $offset ad $length are the same optional parameters we have seen already.   
   * 
   */

//    $str = "How much wood would a wood chuck chuck if a wood chuck could chuck wood?";
//    echo substr_count($str, 'wood'), PHP_EOL; //normal useage.  return 4
//    echo substr_count($str, 'wood', 15), PHP_EOL; //offset of 15 characters causes it to skip the first 'wood'
//    echo substr_count($str, 'wood', 0, 30), PHP_EOL; //a length of 30 characters causes it to stop before it reaches the last two instaces of 'wood'
//    echo substr_count($str, 'Wood'), PHP_EOL; //it is case sensitive

  /**
   * Accessing individual characters 
   * in php you can access individual characters in a string same as you would an array.  with the bracket and index syntax. 
   */

//    $str = 'Hello';
//    echo $str[1], PHP_EOL; 

/**
 * addslashes(strign $string):string
 * this method will automatically add slashes in a string before single quotes, double quotes, back slashes and NUL characters
 * 
 * addcslashes(string, $string, string $characters):string
 * this method is the same as addslashes but you get to dictate the characters that are being escaped.  IT DOES NOT also automatically escape the characters from addslashes.  
 * 
 * stripslashes(string $string):string
 * this method is the opposite of addslashes.  it removes salshes where they are used, and if it is a double slash, they become single slashes.  this method is useful if you want to display form data directly rather than sending it to a database.
 * 
 * stripcslashes(string $string):string
 * this method like strip slashes removes slashes but it also recognizes C based charters such as \r \n \t
 */

//  $str = "I can't help you with that";
//  $slashes = addslashes($str);
//  $cSlashes = addcslashes($str, "cn");

//  echo $str, PHP_EOL;
//  echo $slashes, PHP_EOL;
//  echo $cSlashes, PHP_EOL;
 

//  //typical useage example
//  //a form is submitted and the value for username is ...
//  $userName = "O'Conner";
//  //dumping this directly into a SQL query is potentially dangerous.  what if instead of O' Conner, the user name was..
//  $userName = "Johnson'; DROP TABLE users;";
//  //say goodbye to your users table and all of your database integrity
//  $userName = addcslashes(addslashes($userName), ';');
//  echo $userName, PHP_EOL; // this is not safer to use in your SQL queries
//  echo stripslashes($userName), PHP_EOL;

/**
 * htmlspecialchars(string $string):string
 * this method converts special html characters to html entities.  for example '<' becomes &lt.  This is incredibly usefule for sanitzing form input and fighting against attacks on the website such as cross site scripting or sql injection
 * 
 * htmlentities(string $string):string
 * this method is EXACTLY the same as htmlspecialchars() except htmlentities will convert ALL characters that have an html significance.
 * 
 * the difference between them is ALL(entities) or the SPECIAL characters(specialcharacters). 
 * 
 * accent characters for example will not be converted by specialcharacters, while the will be with entities.
 * 
 * htmlspecialchars_decode(strign $string):string
 * this method is the opposite of special characters.  it converts the entities back into special characters.  ie.. &lt => '<'
 * this is useful for dispalying database data.  it is unsafe to store strings in a database that have excutable code in them.  so you would convert the string with htmlspecialchars()  and then when you are going to display it, you would use htmlspecialchars_decode() to display the html again.
 */
?>