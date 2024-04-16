<?php
/**
 * FILE SYSTEM
 * We have already been using the file system throughout the entire semseter.  
 * include()
 * include_once()
 * require()
 * require_once()
 * dirname()
 * __DIR__
 * __FILE__
 * 
 * These are all methods we have been using all semester to access and work with the file system.  Lets take a look at a few more methods used for manipulating files
 * 
 * file_exists(string $filename):bool
 * This is a simple method. you pass it the path to a file, and it will return a boolean of whether the file exists.  At first, this may seem like a worthless method because of course you can always check your directories before you write the code right?  Well that really only applies to smaller projects. As your project starts to grow, or if you use dynamic content, you will quickly run into situations where you cant be certain until runtime if a file is present.  Trying to access a file that doesn't exist will result in a crash.  This method prevents that crash from happening. 
 * 
 */

 
// $dir = __DIR__; //get the current directory
// if(file_exists($dir . '/filesystem.php')){
// echo "I exist!";
// }else{
// echo 'huh... well this is embarassing...';
// }

/**
 * YOUR TURN
 * 1) using the above as a template, check the filesystem directory for the existence of existcheck.php
 * 2) using the above as a template, check the filesystem directory for the existence of nothere.php
 */

/**
 * file_get_contents(
 *     string $filename,
 *     bool $use_include_path = false,
 *     ?resource $context = null,
 *     int $offset = 0,
 *     ?int $length = null
 * ): string|false
 * This nifty little function does exactly what the name says.  it will return to you the contents of a file.  We actually used this before with the applicant project.  we used a json document to store the data, then we retrieved that data with file_get_contents().
 * 
 * this method is the preferred way to get file contents as a string.
 */

//  $dir = __DIR__; //get the current directory
//  $content = file_get_contents($dir . '/filesystem/adv-web.txt');
//  echo $content;

/**
 * YOUR TURN
 * 1) Using the above as a template, try grabbing the content of any of the other notes files in this direcotry
 */

/**
 * file_put_contents(
 *     string $filename,
 *     mixed $data,
 *     int $flags = 0,
 *     ?resource $context = null
 * ): int|false
 * This method is the exact opposite of file_get_contents().  you supply it with a file path and some data, and it writes it to the file for you.  
 * 
 * If the file path you supplied doesn't exist, it will be created.
 */

//  $dir = __DIR__ . '/filesystem';
//  $data = [
//     'first_name' => "Justin",
//     'last_name' => 'Cox',
//     'age' => 39
//  ];

// file_put_contents($dir . '/data.json', json_encode($data));

/**
 * Fun fact.  file_put_contents overwrites any existing data.  run the code below and check out your file system director
 */

//  $dir = __DIR__ . '/filesystem';
//  $data = [
//     'first_name' => "Babe",
//     'last_name' => 'Ruth',
//     'profession' => 'Baseball Player'
//  ];

// file_put_contents($dir . '/data.json', json_encode($data));

/**
 * YOUR TURN
 * 1) create a new file in the filesystem directory using file_put_contents
 * 2) update that file with a second use of file_put_contents
 */

/**
 * file_put_contents is actually the equivaluent of the next 3 methods combined
 * fopen()
 * fwrite()
 * fclose()
 * 
 * fopen(
 *     string $filename,
 *     string $mode,
 *     bool $use_include_path = false,
 *     ?resource $context = null
 * ): resource|false
 * 
 * fopen() does exactly that. you pass it a filepath, and a mode and it opens a file for you. What is valuable with this method is the mode flag.  This determines what you can actually do with the file once you ahve opened it.  The most common flags are:
 * r - read only
 * r+ - reading writing with the pointer at the beginning of the file
 * w - writing only, if file doesn't exist attempts to create it, truncates file length to 0
 * w+ - reading and writing, if file doesn't exist attempts to create it, truncates file length to 0
 * a - append, if file doesn't exist attempts to create it
 * a+ - reading and appending, if file doesn't exist attempts to create it
 * 
 * fwrite(resource $stream, string $data, ?int $length = null): int|false
 * This method writes to the file you just opened if the mode allows for writing
 * 
 * fread(resource $stream, int $length): string|false
 * This method reads up to the $length in bytes from the file pointer set in fopen()
 * 
 * if all you need is the contents as a string, file_get_contents() is preferred to this method.
 * 
 * fclose(resource $stream): bool
 * This method closes the file you just opened.  ALWAYS close your files as soon as you are done using them.  This can lead to memory leaks or file corruptions.
 */

//  $dir = __DIR__ . '/filesystem';
//  $str = ' Well actually, it\'s pretty mediocre.';
//  $file = fopen($dir . '/adv-web.txt', 'a');
//  fwrite($file, $str);
//  fclose($file);

/**
 * YOUR TURN
 * 1) create a file in the file system directory using fopen() with the 'w' flag
 * 2) add content to it
 * 3) close that file
 * 4) use file_get_contents() to echo it back out.
 * 5) open the file again but with the append flag this time
 * 6) append new data to the file
 * 7) close it and use file_get_contents() to echo out the updated file
 */

/**
 * scandir(string $directory, int $sorting_order = SCANDIR_SORT_ASCENDING, ?resource $context = null): array|false
 * scandir takes in a directory path, and returns to you all of the files that are in it.  This is really useful in situations where you can't be sure what all files are in a directory, so you cant hardcode your includes.  
 */

//  $dir = __DIR__ . '/filesystem';
//  $files = scandir($dir);
//  print_r($files);

/**
 * notice how the $files array includes the . and the .. 
 * Let's get rid of them
 */

//  $dir = __DIR__ . '/filesystem';
//  $files = array_diff(scandir($dir), ['.', '..']);
//  print_r($files);

/**
 * lets extend this a little bit and make it a bit more useful
 */

//  $dir = __DIR__ .'/filesystem/jobs';
//  $files = array_diff(scandir($dir), array('.', '..'));
 
//  foreach($files as $file){
//     $file = substr($file, 0, strlen('.php'));
//     include_once($dir . '/' . $file . '.php');
//     $job = new $file();
//     $job->run();
//  }

/**
 * IN CLASS ASSIGNMENT
 * using the above as a template
 * 1) create a new directory called MyJobs
 * 2) in that directory create an interface called JobInterface.  it will have 1 method called run():void;
 * 3) create 3 job files.  Each with a class that implements the JobInterface
 * 4) have each of the jobs just echo something out in the run method.  just so you can see it working.
 * 5) create a quick script / functin in this file to scan your new directory and run all of those jobs
 * hint:  spelling matters.  That is why my Job1, Job2, and Job3 files are all capitalized.  Because the class name is capitalized.  if yours are not, you will need to use string manipulation to make it work
 * hint: you will also want to make sure you remove the . and .. files from yoru scandir results
 * hint: you will need to remove the JobInterface file from your scandir result.  or somehow check for it in your loop so you don't try to run that file
 */
