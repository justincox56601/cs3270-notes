<?php
/**
 * CONDITIONALS AND LOOPS
 * 
 * if statements and loops work the same in PHP as they do in all of the other languages you have learned up to this point.  It is important to keep that base knowloedge and focus on updating it with the syntax for PHP.
 * 
 * If(){}
 * if(){}else{}
 * if(){}elsseif(){}else
 * 
 * The if() part is the conditional.  if the conditional resolves to truthy, the following block of code will be executed.
 */

//  $test1 = 2>1; 
//  $test2 = false; 
//  $test3 = 1; 
//  $test4 = 'hello'; 
//  $test5 = null; 
//  if($test1){echo 'test1 was truthy', PHP_EOL;}
//  if($test2){echo 'test2 was truthy', PHP_EOL;}
//  if($test3){echo 'test3 was truthy', PHP_EOL;}
//  if($test4){echo 'test4 was truthy', PHP_EOL;}
//  if($test5){echo 'test5 was truthy', PHP_EOL;}

/**
 * If statements that do not have / need an else statement are referred to as 'non branching or self terminating'  In general, you want to design your code in such as way as to use primarily these types of if statements.  It goes back to when processing power was not as strong as it is today, so usinging non branchng statements was considered better code since the cpu didn't have to calculate both branches.  Today it is just one of those things we hold on to.  It won't break your code, but is considered cleaner.
 */

//common non branching if statements example: early exits
// $count = 0;
// while($count < 10){
//     if($count === 4){break;}
//     echo $count;
//     $count ++;
// }
//in the example above, once count hits 4, the if statement is true, the break command fires and the rest of the code block is skipped for that loop.
// function array_length(array $nums):int{
//     if($nums==null){return 0;}
//     return count($nums);
// }
//in this example, there is a check right away to confirm the $nums array isn't null.  and if it is, the function returns early and none of the code below that is executed.  Could this have been an if/else  statement?  Yes.  But it is considered cleaner to not use if/else if we don't have to.

/**
 * if/elseif/else 
 * in PHP the syntax is elseif.  one word.  in python it is elif, in javascript it is else if (two words).  in PHP it is elseif (one word).  This is not new bahavior, just need to get used to the syntax.
 * 
 *an elseif conditional will ONLY be evaluated if the preceeding conditional is falsey.  It doesn't matter how long the chain of elseif statements is, once one of them evaluates to true, the rest are skipped.   
 * 
 * You can string as many elseif satements together as you want.  However this is generally considered not best practice.  A cleaner solution is called the switch statement.
 * 
 * SWITCH STATEMENT
 * the switch statement is a cleaner version of the multiple elseif statements.  It uses the following syntax
 * switch(expression){
 *      case label:
 *          statement(s);
 *          break;
 *      case label:
 *          satement(s);
 *          break;
 *      default:
 *          statement(s);
 *          break; * 
 * }
 */

//  $color = 'red'; //try changing the color and see what gets displayed
//  switch($color){
//     case 'red':
//         echo "Red is a hot color", PHP_EOL;
//         break;
//     case 'blue':
//         echo 'Blue is a cold color', PHP_EOL;
//         break;
//     default:
//         echo "you can have as many case satements as you want, but keep in mind that they are evaluated in order", PHP_EOL;
//  }

/**
 * TERNARY OPERATOR
 * The ternary operator is a single line if else satement and has a speecial syntax. 
 *  
 * (expression) ? trueStatement : falseStatement;
 * 
 * It is used quite often in assigning varaibles aor property values
 */

//  function tenary_example(int $num):void{
//     $message = ($num > 5)? "You are passing." : "We need to work a little harder.";
//     echo $message, PHP_EOL;
//  }

/**
 * LOOPS
 * There are several loop structures in PHP, while loops, and for loops.  Again, these behave just like loop structures in other languages.  They will repeat the same block of code until the conditional evaluates to false;
 * 
 * While Loop
 * while(conditional){statements; }
 */

//  $count = 0;
//  while($count < 10){
//     echo $count, PHP_EOL;
//     $count++;
//  }

//  $count = 0;
//  do{
//     echo $count, PHP_EOL;
//     $count++
//  }while($count < 10);

 //whats the difference between these two loops?  when might you use one over the other?

/**
 * FOR LOOPS
 * For loops in PHP come in two varieties.  the standard sentinal controlled for loop and the foreach loop.
 * 
 * for($i=0; $i < count($myArr); $i++){
 *  $myArr[i] = do stuff
 * }
 * 
 * this is called a sentinal controlled loop because the $i acts as a sentinal where it controls when the loops ends.  Yes, technically this for loop is a shorthand while loop.  Instead of taking care of the initalizing, conditional, and increment on separate lines, the for loop handles it in one line (technically 3 statements since there is a semicolon separting them).  And yes, the while loop above is called a sentinal controlled loop.  $count is the sentinal.
 */

//  $arr = [1,2,3,4];
//  print_r($arr);
//  for($i=0; $i<count($arr); $i++){
//     echo $arr[$i], PHP_EOL;
//  }
//  foreach($arr as $num){
//     echo $num, PHP_EOL;
//  }

//  $arr1 = [1,2,3,4];
//  $arr2 = [1,2,3,4];

//  for($i=0; $i<count($arr1); $i++){
//     $arr1[$i] = $arr1[$i] * $arr1[$i];
//     echo $arr1[$i], PHP_EOL;
//  }

//  foreach($arr2 as $num){
//     $num = $num * $num;
//     echo $num, PHP_EOL;
//  }
//  print_r($arr1);
//  echo PHP_EOL;
//  print_r($arr2);
//  echo PHP_EOL;

 //What happened here?  Was the output what you expected it to be?  What is the difference between the two versions of for loop?

/**
 * Alternative syntax for the foreach loop;
 * foreach($array as $val):
 *  //do stuff
 * endforeach
 * 
 * this is used when mixing PHP and HTML.
 * 
 * <?php foreach($articles as $article): ?>
 *      <h2 <?php echo $article['title'] ?> </h2>
 *      <p <?php echo $article['description'] ?> </p>
 *      <p <?php echo $article['author'] ?> </p>
 * <?php endforeach; ?>
 * 
 * 
 * CONTINUE and BREAK
 * continue and break are two special commands used in loops.  the continue command will skip the current iteration of the loop.  the break command exits the loop entirely.
 */

// for($i=0; $i<5; $i++){
//     if($i === 3){continue;}
//     echo $i, ', ';
// }
// echo PHP_EOL;

// for($i=0; $i<5; $i++){
//     if($i === 3){break;}
//     echo $i, ', ';
// }
// echo PHP_EOL;

// $nums = [1,2,3,4,5];
// foreach($nums as $num){
//     if($num === 3){continue;}
//     echo $num, ', ';
// }
// echo PHP_EOL;

// foreach($nums as $num){
//     if($num === 3){break;}
//     echo $num, ', ';
// }
?>