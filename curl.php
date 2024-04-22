<?php
/**
 * cURL
 * 
 * cURL is how php natively handles connecting with APIs.  if you follow this link 
 *  https://www.php.net/manual/en/function.curl-init.php 
 * you can see that there are A LOT of options and settings for working with cURL.  Most of which are outside the scope of this class and I fully encourage you to explore them.  
 * 
 * For us, there are basically 4 commands we need to know:
 * 1) curl_init()
 * 2) curl_setopt()
 * 3) curl_exec()
 * 4) curl_close()
 * 
 * curl_init(string $url)
 * this is the command that creates a curl resource.  THe url is optional, and can be set manually with the curl_setopt() method.
 * 
 * curl_setopt(CurlHandle $handle, int $option, mixed $value)
 * For us, this is the heavy hitter.  this is where you will be setting the headers, whether it is a GET/POST/PUT/DELETE command, and possibly the url.
 * The $handle is a reference to the curlHandle we created with the curl_init() method, the $option is one of the many, predefined options in the cURL library, and the $value is the value to set for that option. 
 * 
 * curl_exec(CurlHandle $handle)
 * This is the command that actually performs the API call.
 * 
 * curl_close(CurlHandle $handle)
 * This command closes the connection.  It should ALWAYS be run when you finish your command.
 * 
 * Lets take a look at a basic example using the free open API JsonPlaceholder
 */

$url ='https://jsonplaceholder.typicode.com/posts';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0); //doesn't include the header as part of the repsonse
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //sets the return value as a string instead of just echoing it directly
$response = curl_exec($ch); //response is a string
curl_close($ch);
$response = json_decode($response, true); //json_decode(string $json, true) will convert a json string into an array if the true flag is present.
print_r($response);

/**
 * explore on your own at https://jsonplaceholder.typicode.com/
 * create 2-3 api calls to this API and test the response.
 * 
 * COMPLEX URLS
 * Sometimes, actually most of the time, you do not want ALL of the responses from a specific resource.  Maybe yyou want to filter by userId, or maybe you need to add your API key so that yoru request can be authenticated. To do that, we create an array of options we want to set, then use the php method http_build_query() method.
 * 
 * NOTE:  you will have to referr to the documentation for an individual API to discover exactly what parameters can be set and what shape they should take.
 */

//  $base ='https://jsonplaceholder.typicode.com/posts';
//  $params = http_build_query([
//     'userId'=>1,
//     'apiKey' => 'xdrftgyhjnmkolp123kj123',
//  ]);
 
// //echo "$base?$params", PHP_EOL; //uncomment this line if you want to see the resulting url
// $ch = curl_init("$base?$params");
// curl_setopt($ch, CURLOPT_HEADER, 0); 
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
// $response = curl_exec($ch); 
// curl_close($ch);
// $response = json_decode($response, true); 
// print_r($response);


/**
 * POST
 * doing a get request is cool and all but what about a POST request?  OR for that matter any GET request that requires adding content to the header instead of the url?
 * 
 * TO accomplish that, we will use the curl_setopt() method.
 */

//  $base ='https://jsonplaceholder.typicode.com/posts';
//  $params = http_build_query([
//     'title' => "My first API post",
//     'body' => 'this is the body of my posts content',
//     'userId' => 189,
//  ]);

//  $ch = curl_init($base);
//  curl_setopt($ch, CURLOPT_HEADER, 0); 
//  curl_setopt($ch, CURLOPT_POST, true);
//  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
//  curl_setopt($ch, CURLOPT_HTTPHEADER, [
//     'Content-Length: ' . strlen($params),
//     "Content-Type: text/xml; charset=utf-8",
//     "Accept: application/json"
//  ]);
//  $response = curl_exec($ch); 
// curl_close($ch);
// $response = json_decode($response, true); 
// print_r($response);  